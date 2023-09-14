<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation page 3</title>
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
            if (isset($_GET["movie_id"])) {
                $filmId = $_GET["movie_id"];

                $serveur = "localhost";
                $utilisateur = "root";
                $motDePasse = "root";
                $baseDeDonnees = "tpvideoclub";

                $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

                if ($connexion->connect_error) {
                    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
                }
                $requete = "SELECT f.TITRE_FILM, f.ANNEE_FILM, s.NOM_STAR, s.PRENOM_STAR, f.REF_IMAGE, f.RESUME FROM film f
                            JOIN star s ON f.ID_REALIS = s.ID_STAR
                            WHERE f.ID_FILM = $filmId";

                $resultat = $connexion->query($requete);

                if ($resultat->num_rows > 0) {
                    $row = $resultat->fetch_assoc();
                    echo '<p>Voici le film que vous avez sélectionné</p>';
                    echo '<table><tr>';
                    $cheminImage = './img/FilmMiniatures/' . $row["REF_IMAGE"];
                    echo '<th><img src="' . $cheminImage . '" alt="Affiche du film"></th>';
                    echo '<td>Titre : ' . $row["TITRE_FILM"] . '<br>';
                    echo 'Année : ' . $row["ANNEE_FILM"] . '<br>';
                    echo 'Réalisateur : ' . $row["NOM_STAR"] . ' ' . $row["PRENOM_STAR"] . '<br>';
                    echo 'Resume : ' . $row["RESUME"] . '</td>';
                    echo '</tr></table>';
                }
                $connexion->close();
            } else {
                echo 'Film non trouvé.';
            }
            ?>

        </div>
    </div>
    <form class="connexion" action="VCIResa4.php" method="GET">
        <input type="hidden" name="nom_film" value="<?php echo $row["TITRE_FILM"]; ?>">
        <input type="hidden" name="movie_id" value="<?php echo $filmId; ?>">
        <span>Veuillez saisir vos coordonnées : <br></span>
        <span>Nom : <input type="text" name="nom_adherent"></span><br>
        <span>N° adhérent : <input type="text" name="numero_adherent"></span><br><br>
        <input type="submit" value="Réserver">
        <button><a href="VCIResa.php">Annuler</a></button>
    </form>


</body>

</html>