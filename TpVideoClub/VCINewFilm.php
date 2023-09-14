<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Vidéo-Club</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="header">
        <?php include 'VCITitreAdmin.php'; ?>
    </div>
    <div class="sidebarContenu">
        <div id="sidebar">
            <?php include 'VCIMenuAdmin.html'; ?>
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
            } ?>
            Saisie d'un nouveau film
            <div class="formulaireFilm">
                <form action="VCINewFilm2.php" method="post">
                    <span>Identifiant : <input type="text" name="film_id"></span><br>
                    <span>Titre : <input type="text" name="film_title"></span><br>
                    <span>Type de film :
                        <select name="film_type">
                            <?php
                            $sql = "SELECT CODE_TYPE_FILM, LIB_TYPE_FILM FROM typefilm";
                            $resultat = $connexion->query($sql);
                            while ($row = $resultat->fetch_assoc()) {
                                echo "<option value='" . $row['CODE_TYPE_FILM'] . "'>" . $row['LIB_TYPE_FILM'] . "</option>";
                            }
                            ?>
                        </select>
                    </span><br>
                    <span>Réalisateur :
                        <select name="film_director">
                            <?php
                            $sql = "SELECT ID_STAR, NOM_STAR, PRENOM_STAR FROM star";
                            $resultat = $connexion->query($sql);
                            while ($row = $resultat->fetch_assoc()) {
                                echo "<option value='" . $row['ID_STAR'] . "'>" . $row['NOM_STAR'] . " " . $row['PRENOM_STAR'] . "</option>";
                            }
                            ?>
                        </select>
                    </span><br>
                    <span>Année de sortie : <input type="text" name="film_year"></span><br>
                    <span>Affiche : <input type="text" name="film_poster"></span><br>
                    <span>Résumé : <input type="text" name="film_summary"></span><br>
                    <input type="submit" value="Créer">
                    <input type="reset" value="Recommencer">
                </form>
            </div>
        </div>
    </div>
</body>

</html>