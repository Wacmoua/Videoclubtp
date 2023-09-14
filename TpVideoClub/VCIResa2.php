<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation page 2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="header">
        <?php include 'VCITitre.php'; ?>
    </div>
    <div class="sidebarContenu">
        <div id="sidebar">
            <?php include 'VCIMenu.html'; ?>
        </div>
        <div class="content">
            <?php
            $serveur = "localhost";
            $utilisateur = "root";
            $motDePasse = "root";
            $baseDeDonnees = "tpvideoclub";

            $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

            if ($connexion->connect_error) {
                die("Échec de la connexion à la base de données : " . $connexion->connect_error);
            }

            $typesDeFilm = [];
            $resultatTypes = $connexion->query("SELECT * FROM typefilm");

            if ($resultatTypes->num_rows > 0) {
                while ($row = $resultatTypes->fetch_assoc()) {
                    $typesDeFilm[$row["CODE_TYPE_FILM"]] = $row["LIB_TYPE_FILM"];
                }
            }
            $resultatTypes->close();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $categorie = $connexion->real_escape_string($_POST["option"]);
                if (!empty($categorie)) {
                    $categorie = $connexion->real_escape_string($categorie);

                    $requete = "SELECT f.ID_FILM, f.TITRE_FILM, f.ANNEE_FILM, s.NOM_STAR, s.PRENOM_STAR, f.REF_IMAGE FROM film f
                    JOIN star s ON f.ID_REALIS = s.ID_STAR
                    WHERE f.CODE_TYPE_FILM = '$categorie'";
                    $resultat = $connexion->query($requete);

                    if ($resultat->num_rows > 0) {
                        echo '<span>Liste des films du type ' . $typesDeFilm[$categorie] . '<br>
                        Sélectionnez le film que vous désirez réserver :</span><br><br>
                        <table><thead><tr><th>Titre du film</th><th>Son année</th><th>Réalisateur</th><th>Affiche</th></tr></thead><tbody>';
                        
                        while ($row = $resultat->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td><a href="VCIResa3.php?movie_id=' . $row["ID_FILM"] . '">' . $row["TITRE_FILM"] . '</a></td>';
                            echo '<td>' . $row["ANNEE_FILM"] . '</td>';
                            echo '<td>' . $row["NOM_STAR"] . ' ' . $row["PRENOM_STAR"] . '</td>';
                            $cheminImage = './img/FilmMiniatures/' . $row["REF_IMAGE"];
                            echo '<td><a href="VCIResa3.php"><img src="' . $cheminImage . '" alt="Affiche du film"</td>';
                            echo '</tr>';
                        }
                        echo '</tbody></table>';
                    } else {
                        echo 'Aucun film trouvé dans la catégorie sélectionnée.';
                    }
                    $resultat->close();
                }
            }

            $connexion->close();
            ?>
        </div>
    </div>
    <div class="buttons">
        <button><a href="VCIResa.php">Autre type de film</a></button>
        <button><a href="VCIAccueil.php">Retour à l'accueil</a></button>
    </div>

</body>

</html>