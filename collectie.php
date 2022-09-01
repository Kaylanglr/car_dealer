<?php
    session_start();
    require("inc/config.php");
    $query = "SELECT DISTINCT merk as automerk FROM autos ORDER BY merk";
    $result = $conn->query($query);
?>

<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/collectie.style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="public/img/favicon.png">
    <title>Onze collectie</title>
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
                    <div class="dropdown">
                        <button class="dropbtn">Admin
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="admin/toevoegen.php">Auto toevoegen</a>
                            <a href="#">Afspraken</a>
                        </div>
                    </div>
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
<div class="select">
    <h1>Nieuw in ons aanbod</h1>
    <div class="select-box">
        <div class="select-input">
            <p class="input-val">Kies een merk</p>
            <i class="fa-solid fa-caret-down"></i>
        </div>
        <ul class="options">
            <?php
            if($result->num_rows > 0) {
                ?>
                <li class="merk" data-merk="all">
                    alle merken
                </li>
                <?php
                while ($autos = $result->fetch_assoc()) {
                    $query2 = "SELECT COUNT(merk) as aantal FROM autos WHERE merk = '{$autos['automerk']}'";
                    $result2 = $conn->query($query2);
                    $count = $result2->fetch_assoc();
                    ?>
                    <li class="merk" data-merk="<?php echo $autos['automerk'] ?>">
                        <?php echo $autos['automerk'] ?>
                        <span><?php echo $count['aantal'] ?></span>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>
<div class="collectie">

</div>
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
<script src="public/js/select.js"></script>
<script src="public/js/collectie.js"></script>
<script src="public/js/hover.js" defer></script>
</html>
