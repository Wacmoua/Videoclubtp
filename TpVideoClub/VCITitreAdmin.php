<!DOCTYPE html>
<html>
<head>
    <title>Vidéo-Club</title>
</head>
<body class="bodyAdmin">
<div class="adminContainer">
    <a href="VCIAccueil.php"><img src="./img/logo_videoclub_extra.png" alt="Logo Vidéo-Club" height="100px" width="100px"></a>
    <div id="titleText">
        <h1>Vidéo-Club</h1>
        <p>Administration</p>
    </div>
    <div class="date">
        <?php
        $date = getdate();
        $jour = $date['mday'];
        $mois = $date['mon'];
        $annee = $date['year'];

        if ($jour < 10) {
            $jour = "0" . $jour;
        }

        if ($mois < 10) {
            $mois = "0" . $mois;
        }

        echo $jour . "/" . $mois . "/" . $annee . "<br>";
        ?>
        <a href="VCIAccueil.php" >Site</a>
    </div>
</div>