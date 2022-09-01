<?php
session_start();
require("inc/config.php");
if(!isset($_SESSION['id']) || $_SESSION['rechten'] == 1) {
    header("Location: login.php");
    exit();
}
else {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM autos WHERE auto_id = {$id}";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            $auto = $result->fetch_array();
        }
        else {
            header("Location: collectie.php");
            exit();
        }
    }
    else {
        header("Location: collectie.php");
        exit();
    }
}





?>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maak een afspraak</title>
    <link rel="stylesheet" href="public/css/afspraak.style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="public/img/favicon.png">
</head>
<body>
<header id="header">
    <a href="index.php">
        <img src="public/img/logo3.png" alt="">
    </a>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="nav-line">/</li>
            <li><a href="collectie.php">Collectie</a></li>
            <li class="nav-line">/</li>
            <?php
            if (isset($_SESSION['id'])) {
                if($_SESSION['rechten'] == 1) {
                    ?>
                    <li><a href="">Admin</a></li>
                    <?php
                }
                else {
                    ?>
                    <li><a href="">Account</a></li>
                    <?php
                }
                ?>
                <li class="nav-line">/</li>
                <li><a href="inc/loguit.inc.php">Loguit</a></li>
                <?php
            }
            else {
                ?>
                <li><a href="login.php">Login</a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
</header>
<main>
    <div class="afspraak-box">
        <div class="info">
            <h1>Info</h1>
            <div class="info-box">
                <p class="title">openingstijden:</p>
                <p>Maandag t/m Vrijdag: <span class="time">10:00-19:00</span></p>
                <p>Zaterdag t/m Zondag: <span class="time">Op afspraak</span></p>
                <p class="adres">Luxury auto collection:</p>
                <p>Heer Bokelweg 255</p>
                <p>3032 AD Rotterdam</p>
                <p><span class="info-icon"><i class="fa-solid fa-phone"></i></span> +31 6 37498122</p>
                <p><span class="info-icon"><i class="fa-solid fa-at"></i></span> lac@gmail.com</p>
            </div>
        </div>
        <div class="form">
            <h2>Plan je afspraak</h2>
            <div class="afspraak-form">
                <form action="inc/afpsraak.inc.php" method="post">
                    <input type="hidden" name="klantID" value="<?php echo $_SESSION['id']; ?>">
                    <input type="hidden" name="autoID" value="<?php echo $auto[0]; ?>">
                    <table>
                        <tr>
                            <td class="icon"><i class="fa-solid fa-car"></i></td>
                            <td><?php echo $auto[1]." ".$auto[2]; ?></td>
                        </tr>
                        <tr>
                            <td class="icon"><i class="fa-solid fa-user"></i></td>
                            <td><?php echo $_SESSION['naam']; ?></td>
                        </tr>
                        <tr>
                            <td class="icon"><i class="fa-solid fa-at"></i></td>
                            <td><?php echo $_SESSION['email']; ?></td>
                        </tr>
                        <tr>
                            <td class="icon"><i class="fa-solid fa-phone"></i></td>
                            <td><?php echo $_SESSION['telefoon']; ?></td>
                        </tr>
                        <tr>
                            <td class="icon">Datum</td>
                            <td><input type="date" name="datum" required></td>
                        </tr>
                        <tr>
                            <td class="icon">Tijd</td>
                            <td><input type="time" name="tijd" required></td>
                        </tr>
                    </table>
                    <input type="submit" value="verstuur" name="submit">
                </form>
            </div>
        </div>
    </div>
</main>
<footer>
    <div class="footer-top">
        <a href="">
            <img src="public/img/logo2.png" alt="">
        </a>
        <div class="media">
            <div>
                <i class="fa-brands fa-facebook-f"></i>
            </div>
            <div>
                <i class="fa-brands fa-instagram"></i>
            </div>
            <div>
                <i class="fa-brands fa-youtube"></i>
            </div>
            <div>
                <i class="fa-brands fa-snapchat"></i>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        © 2022 Kaylan de Groot
    </div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/ab1ca9801d.js" crossorigin="anonymous"></script>
<script src="public/js/input.js"></script>
</html>
