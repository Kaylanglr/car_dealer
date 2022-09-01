<?php
session_start();
if(isset($_SESSION['id'])) {
    header("location: index.php");
    exit();
}
?>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/css/login.style.css">
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
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="login-box">
            <h1>login</h1>
            <?php
                if(isset($_GET['login'])) {
                    if ($_GET['login'] == 'invalid') {
                        $msg = 'Email of wachtwoord klopt niet!';
                    }
                    else if ($_GET['login'] == 'empty') {
                        $msg = 'Niet alle velden zijn ingevuld!';
                    }
                    ?>
                    <div class="msg">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <p><?php echo $msg ?></p>
                    </div>
                    <?php
                }
            ?>
            <form action="inc/login.inc.php" method="post">
                <div class="input">
                    <div>
                        <i class="fa-solid fa-at"></i>
                    </div>
                    <input type="email" placeholder="Email" name="email" autocomplete="off">
                </div>
                <div class="input">
                    <div>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <input type="password" placeholder="Wachtwoord" name="wachtwoord" autocomplete="off">
                </div>
                <div class="bottom">
                    <input type="submit" name="submit" id="" value="login">
                    <p>Nog geen gebruiker? <a href="registreer.php" class="link">Registreer</a></p>
                </div>
            </form>
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
</html>