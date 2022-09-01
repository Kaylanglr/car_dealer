<?php
session_start();
require("config.php");

if(isset($_POST['submit'])) {
    $klantID = $conn->real_escape_string($_POST['klantID']);
    $autoID = $conn->real_escape_string($_POST['autoID']);
    $datum = $conn->real_escape_string($_POST['datum']);
    $tijd = $conn->real_escape_string($_POST['tijd']);

    $query = "INSERT INTO `afspraken`(`klant_id`, `auto_id`, `datum`, `tijd`) VALUES ({$klantID},{$autoID},'{$datum}','{$tijd}')";
    if($conn->query($query)) {
        ?>
        <html lang="nl">
        <head>
            <meta>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Afspraak bevesting</title>
            <link rel="stylesheet" href="../public/css/bevestiging.style.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
            <link rel="icon" type="image/x-icon" href="../public/img/favicon.png">
        </head>
        <body>
        <header id="header">
            <a href="index.php">
                <img src="../public/img/logo3.png" alt="">
            </a>
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li class="nav-line">/</li>
                    <li><a href="../collectie.php">Collectie</a></li>
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
                        <li><a href="loguit.inc.php">Loguit</a></li>
                        <?php
                    }
                    else {
                        ?>
                        <li><a href="../login.php">Login</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </nav>
        </header>
        <main>
            <div class="bevestiging">
                <i class="fa-solid fa-circle-check"></i>
                <h1>Afspraak bevestigd</h1>
                <a href="../details.php?id=<?php echo $autoID?>">Terug</a>
            </div>
        </main>
        <footer>
            <div class="footer-top">
                <a href="../index.php">
                    <img src="../public/img/logo2.png" alt="">
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
        </html>
        <?php
    }
    else {
        header("Location: ../details.php?id={$autoID}");
        exit();
    }
}else {
    header("Location: ../collectie.php");
    exit();
}