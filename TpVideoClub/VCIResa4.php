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
            <p>Réservation de film</p>
            <?php
            $filmDejaReserve = false;
            function verifierAdherent($nomAdherent, $numAdherent)
            {

                $serveur = "localhost";
                $utilisateur = "root";
                $motDePasse = "root";
                $baseDeDonnees = "tpvideoclub";

                $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

                if ($connexion->connect_error) {
                    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
                }

                $nomAdherent = $connexion->real_escape_string($nomAdherent);
                $numAdherent = $connexion->real_escape_string($numAdherent);
                
                $requete = "SELECT COUNT(*) AS count FROM adherent WHERE NOM_ADHERENT = '$nomAdherent' AND NUM_ADHERENT = '$numAdherent'";
                
                $resultat = $connexion->query($requete);

                if ($resultat) {
                    $row = $resultat->fetch_assoc();
                    $count = $row['count'];

                    $connexion->close();

                    return $count > 0;
                } else {
                    die("Erreur lors de la requête : " . $connexion->error);
                }
            }
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $nomAdherent = $_GET["nom_adherent"];
                $numAdherent = $_GET["numero_adherent"];
                $movieId = $_GET["movie_id"];
                $nomFilm = $_GET["nom_film"];

                $adherentExiste = verifierAdherent($nomAdherent, $numAdherent);

                if ($adherentExiste && !$filmDejaReserve) {

                    $reservationReussie = true;

                    if ($reservationReussie) {
                        echo "Merci $nomAdherent pour votre réservation.<br><br>";
                        echo "Il ne vous reste plus qu'à passer en boutique pour retirer votre exemplaire du film<br> \"$nomFilm\".<br>";
                        echo '<br><button><a href="VCIAccueil.php">Retour au menu</a></button>';
                    } else {
                        echo "Erreur lors de la réservation.";
                        echo '<br><a href="VCIResa3.php?movie_id=' . $movieId . 'Retour</a>';
                    }
                } else {

                    if (!$adherentExiste) {
                        echo "Attention :<br> les coordonnées client saisies sont incorrectes.";
                    } elseif ($filmDejaReserve) {
                        echo "Attention, il y a déjà une réservation du Film \"$nomFilm\".";
                    }
                    echo '<br><button><a href="VCIResa3.php?movie_id=' . $movieId . '&nom_adherent=' . urlencode($nomAdherent) . '&numero_adherent=' . urlencode($numAdherent) . '">Retour</a></button>';
                }
            } else {
                echo "Méthode de demande non autorisée.";
            }
            ?>
        </div>
    </div>
</body>

</html>