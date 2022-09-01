<?php
require("inc/config.php");

session_start();
$query = "SELECT autos.auto_id, autos.merk, autos.type, autos.prijs, auto_fotos.foto FROM autos INNER JOIN auto_fotos ON autos.auto_id = auto_fotos.auto_id WHERE auto_fotos.card_foto = 1 ORDER BY autos.merk LIMIT 2";
$result = $conn->query($query);


?>

<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="public/css/main.style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="public/img/favicon.png">
</head>
<body>
    <div class="top">
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
        <div class="down">
            <div class="down-btn">
                <button id="scroll"><i class="fa-solid fa-angles-down"></i></button>
            </div>
        </div>
    </div>
    <main id="main">
        <div class="introductie">
            <div class="wrapper">
                <div class="left">
                    <p class="title">- find & drive your -</p>
                    <h2>dreamcar</h2>
                    <p class="desc">
                        Luxury Auto Collection is een internationaal, onafhankelijk autobedrijf met 's werelds meest luxe, exclusieve, investment & sports cars
                    </p>
                </div>
                <div class="right">
                    <p>
                        Het zoeken, vinden en bezitten van de ultieme sportauto is voor velen een droom die uitkomt. 
                        Een droom die vaak begon met de bekende poster boven het bed. Van poster tot werkelijkheid; het moment van instappen, starten en wegrijden. 
                        Bij L A C weten we hoe bijzonder dat is. Daarom vindt u bij ons auto’s die aan al uw verwachtingen voldoen – en vaak zelfs nog wat meer.
                    </p>
                    <p>
                        Niet voor niets leveren wij uitmuntende, exclusieve auto’s die naadloos aansluiten bij het ideaalplaatje dat u gevormd hebt. 
                        Wij kunnen leunen op een jarenlange ervaring in de automotive branche en dankzij ons internationale netwerk beschikken wij continu over een exclusief assortiment. 
                        Nog zo’n kernmerk: al onze professionals delen dezelfde liefde voor auto’s als u. Alleen zo kunnen wij de service bieden waar we allemaal voor staan. Graag zetten wij die extra stap, op welk vlak dan ook. 
                        Indien gewenst finetunen wij de auto geheel naar uw specifieke wensen. Bij L A C noemen we dat: exclusiviteit met een griffel.
                    </p>
                </div>
            </div>
        </div>
        <div class="brands">
            <div class="logo-wrapper">
                <img src="public/img/brands/bentley.png" alt="">
                <img src="public/img/brands/ferrari.png" alt="">
                <img src="public/img/brands/porsche.png" alt="">
                <img src="public/img/brands/mercedes-benz.png" alt="">
                <img src="public/img/brands/audi.png" alt="">
                <img src="public/img/brands/bmw.png" alt="">
                <img src="public/img/brands/lamborghini.png" alt="">
            </div>
        </div>
        <div class="latest">
            <div class="latest-title">
                <h2>Latest</h2>
            </div>
            <div class="latest-cars">
                <?php
                while ($autos = $result->fetch_array()) {
                    ?>
                    <a href="details.php?id=<?php echo $autos[0] ?>">
                        <div class="card">
                            <div class="img">
                                <img class="car-img" src="public/img/cars/<?php echo $autos[4] ?>" alt="">
                                <div class="more">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                            <div class="info">
                                <h3><?php echo $autos[1]." ".$autos[2] ?></h3>
                                <h4>€ <?php echo $autos[3] ?>,-</h4>
                            </div>
                        </div>
                    </a>
                    <?php
                }
                ?>
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
<script src="public/js/scroll.js"></script>
<script src="public/js/hover.js"></script>
</html>