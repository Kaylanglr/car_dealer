<?php
    session_start();
    if(isset($_SESSION['id'])) {
        if($_SESSION['rechten'] == 1) {

        }
        else {
            header("Location: ../index.php");
            exit();
        }
    }
    else {
        header("Location: ../index.php");
        exit();
    }
?>

<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auto toevoegen</title>
    <link rel="stylesheet" href="../public/css/toevoegen.style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../public/img/favicon.png">
</head>
<body>
<header id="header">
    <a href="../index.php">
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
                    <div class="dropdown">
                        <button class="dropbtn">Admin
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Auto toevoegen</a>
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
<main>
    <form action="../inc/voegtoe.inc.php" method="post" enctype="multipart/form-data">
        <div class="auto">
            <h1 class="title">Auto toevoegen</h1>
            <div class="auto-form">
                <table class="table">
                    <tr>
                        <td>Merk:</td>
                        <td><input type="text" name="merk" required></td>
                    </tr>
                    <tr>
                        <td>type:</td>
                        <td><input type="text" name="type" required></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>Prijs:</td>
                        <td><input type="text" name="prijs" required></td>
                    </tr>
                    <tr>
                        <td>Kaart-foto:</td>
                        <td><input type="file" name="fotos[]" required></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="specificaties">
            <h2 class="title">Specificaties</h2>
            <div class="specificaties-form">
                <table class="table">
                    <tr>
                        <td>Kleur</td>
                        <td><input type="text" name="kleur" required></td>
                    </tr>
                    <tr>
                        <td>Kilometerstand</td>
                        <td><input type="text" name="km" required></td>
                    </tr>
                    <tr>
                        <td>Brandstof</td>
                        <td><input type="text" name="brandstof" required></td>
                    </tr>
                    <tr>
                        <td>Vermogen</td>
                        <td><input type="text" name="vermogen" required></td>
                    </tr>
                    <tr>
                        <td>Topsnelheid</td>
                        <td><input type="text" name="topsnelheid" required></td>
                    </tr>
                    <tr>
                        <td>Carrosserie</td>
                        <td><input type="text" name="carrosserie" required></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>Verbruik</td>
                        <td><input type="text" name="verbruik" required></td>
                    </tr>
                    <tr>
                        <td>Transmissie</td>
                        <td><input type="text" name="transmissie" required></td>
                    </tr>
                    <tr>
                        <td>Accelerattie</td>
                        <td><input type="text" name="accelerattie" required></td>
                    </tr>
                    <tr>
                        <td>Zitplaatsen</td>
                        <td><input type="text" name="zitplaatsen" required></td>
                    </tr>
                    <tr>
                        <td>Tankinhoud</td>
                        <td><input type="text" name="tankinhoud" required></td>
                    </tr>
                    <tr>
                        <td>Energielabel</td>
                        <td><input type="text" name="energie" required></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="fotos">
            <h2 class="title">Fotos</h2>
            <p>Min. 2 / Max. 10</p>
            <div class="fotos-form">
                <button type="button" id="add"><i class="fa-solid fa-plus"></i></button>
                <div class="inputs">
                    <input type="file" name="fotos[]" required>
                    <input type="file" name="fotos[]" required>
                </div>
            </div>
        </div>
        <div class="submit">
            <input type="submit" name="submit" value="voegtoe">
        </div>
    </form>
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
<script src="../public/js/addInput.js"></script>
</html>
