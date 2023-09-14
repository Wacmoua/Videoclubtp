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
            Bienvenue sur le site Administration du Vidéo-Club<br>
            <?php
            $serveur = "localhost";
            $utilisateur = "root";
            $motDePasse = "root";
            $baseDeDonnees = "tpvideoclub";

            $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $film_id = $_POST['film_id'];
                $film_title = $_POST['film_title'];
                $film_type = $_POST['film_type'];
                $film_director = $_POST['film_director'];
                $film_year = $_POST['film_year'];
                $film_poster = $_POST['film_poster'];
                $film_summary = $_POST['film_summary'];

                $sql = "INSERT INTO film (ID_FILM, TITRE_FILM, CODE_TYPE_FILM, ID_REALIS, ANNEE_FILM, REF_IMAGE, RESUME)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $connexion->prepare($sql);
                $stmt->bind_param("ississs", $film_id, $film_title, $film_type, $film_director, $film_year, $film_poster, $film_summary);

                if ($stmt->execute()) {
                    echo "Film $film_title inséré avec succès";
                } else {
                    echo "Erreur lors de l'ajout du film : " . $stmt->error;
                }
                $stmt->close();
            }
            ?>
        </div>
    </div>
</body>

</html>