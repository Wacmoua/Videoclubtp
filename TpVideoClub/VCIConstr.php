<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page en construction</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="header">
        <?php include './VCITitre.php'; ?>
    </div>
    <div class="sidebarContenu">
        <div id="sidebar">
            <?php include './VCIMenu.html'; ?>
        </div>
        <div class="content">
            <img src="./img/Cone-chantier-travaux_image_full.png" width="50px" height="50px" alt="">
            <span>Site en construction : <br> merci de repasser plus tard</span>
        </div>
    </div>
    <?php
    header("Refresh: 3;URL=VCIAccueil.php");
    ?>
</body>

</html>