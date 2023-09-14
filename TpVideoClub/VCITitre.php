<!DOCTYPE html>
<html>

<head>
    <title>Vidéo-Club</title>
</head>

<body>
    <div id="titleContainer">
        <a href="VCIAccueil.php"><img src="./img/logo_videoclub_extra.png" alt="Logo Vidéo-Club" height="100px"
                width="100px"></a>
        <div id="titleText">
            <h1>Vidéo-Club</h1>
            <p>... et si on se faisait une folie, à la maison ?</p>
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
            <a href="#" id="adminLink">Admin</a>
        </div>
    </div>

    <div id="loginOverlay"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.7);">
        <div
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border-radius: 5px;">
            <?php
            date_default_timezone_set("Europe/Paris");

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "tpvideoclub";

            $connexion = new mysqli($servername, $username, $password, $dbname);

            if ($connexion->connect_error) {
                die("Connection failed: " . $connexion->connect_error);
            }

            $login = "";
            $password = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM admin WHERE LOGIN_ADMIN = ? LIMIT 1";
                $stmt = $connexion->prepare($sql);
                $stmt->bind_param("s", $login);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();

                    if ($password === $row['PASS_ADMIN']) {
                        header("Location: VCIAdmin.php");
                        exit;
                    } else {
                        echo "Login failed. Please try again.";
                    }
                } else {
                    echo "Login failed. Please try again.";
                }

                $stmt->close();
            }
            ?>
            <h2>Login</h2>
            <form method="post" action="">
                <label for="login">Login :</label>
                <input type="text" name="login" id="login" required><br>
                <label for="password">Pass :</label>
                <input type="password" name="password" id="password" required><br>
                <input type="submit" value="Go !">
                <button type="button" id="closeLogin">Retour</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('adminLink').addEventListener('click', function () {
            document.getElementById('loginOverlay').style.display = 'block';
        });

        document.getElementById('closeLogin').addEventListener('click', function () {
            document.getElementById('loginOverlay').style.display = 'none';
        });
    </script>
</body>

</html>