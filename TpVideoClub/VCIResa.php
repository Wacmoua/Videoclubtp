<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Page 1</title>
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
            Selectionnez le type de film que vous recherchez :
            <form method="POST" Action="VCIResa2.php">
                <select name="option" id="option">
                    <option value="">Selectionnez le type recherché</option>
                    <option value="ACT">Action</option>
                    <option value="ANI">Animation</option>
                    <option value="COM">Comédie</option>
                    <option value="HOR">Horreur</option>
                    <option value="POL">Policier</option>
                    <option value="SCF">Science Fiction</option>
                </select>
                <input type="submit" value="Rechercher">
            </form>
        </div>
    </div>
</body>

</html>