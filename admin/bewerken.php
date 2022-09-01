<?php
    session_start();
    require("../inc/config.php");
    if(isset($_SESSION['id'])) {
        if($_SESSION['rechten'] == 1) {
            if(isset($_GET['id'])) {
                $autoID = $_GET['id'];
                $query = "SELECT * FROM autos WHERE auto_id = {$_GET['id']}";
                $result = $conn->query($query);
                if($result->num_rows > 0) {
                    $auto = $result->fetch_array();
                    $query2 = "SELECT * FROM `auto_specificaties` WHERE auto_id = {$_GET['id']}";
                    $result2 = $conn->query($query2);
                    if($result2->num_rows > 0) {
                        $specificaties = $result2->fetch_array();
                    }
                }
                else {
                    header("Location: ../collectie.php");
                    exit();
                }
            }
            else {
                header("Location: ../collectie.php");
                exit();
            }
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
    <form action="../inc/bewerk.inc.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $auto[0] ?>">
        <div class="auto">
            <h1 class="title">Auto bewerken</h1>
            <div class="auto-form">
                <table class="table">
                    <tr>
                        <td>Merk:</td>
                        <td><input type="text" name="merk" required value="<?php echo $auto[1] ?>"></td>
                    </tr>
                    <tr>
                        <td>type:</td>
                        <td><input type="text" name="type" required value="<?php echo $auto[2] ?>"></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>Prijs:</td>
                        <td><input type="text" name="prijs" required value="<?php echo $auto[3] ?>"></td>
                    </tr>
                    <tr>
                        <td>Kaart-foto:</td>
                        <td><input type="file" name="foto"></td>
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
                        <td><input type="text" name="kleur" required value="<?php echo $specificaties[2] ?>"></td>
                    </tr>
                    <tr>
                        <td>Kilometerstand</td>
                        <td><input type="text" name="km" required value="<?php echo $specificaties[3] ?>"></td>
                    </tr>
                    <tr>
                        <td>Brandstof</td>
                        <td><input type="text" name="brandstof" required value="<?php echo $specificaties[4] ?>"></td>
                    </tr>
                    <tr>
                        <td>Vermogen</td>
                        <td><input type="text" name="vermogen" required value="<?php echo $specificaties[5] ?>"></td>
                    </tr>
                    <tr>
                        <td>Topsnelheid</td>
                        <td><input type="text" name="topsnelheid" required value="<?php echo $specificaties[6] ?>"></td>
                    </tr>
                    <tr>
                        <td>Carrosserie</td>
                        <td><input type="text" name="carrosserie" required value="<?php echo $specificaties[7] ?>"></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>Verbruik</td>
                        <td><input type="text" name="verbruik" required value="<?php echo $specificaties[8] ?>"></td>
                    </tr>
                    <tr>
                        <td>Transmissie</td>
                        <td><input type="text" name="transmissie" required value="<?php echo $specificaties[9] ?>"></td>
                    </tr>
                    <tr>
                        <td>Accelerattie</td>
                        <td><input type="text" name="accelerattie" required value="<?php echo $specificaties[10] ?>"></td>
                    </tr>
                    <tr>
                        <td>Zitplaatsen</td>
                        <td><input type="text" name="zitplaatsen" required value="<?php echo $specificaties[11] ?>"></td>
                    </tr>
                    <tr>
                        <td>Tankinhoud</td>
                        <td><input type="text" name="tankinhoud" required value="<?php echo $specificaties[12] ?>"></td>
                    </tr>
                    <tr>
                        <td>Energielabel</td>
                        <td><input type="text" name="energie" required value="<?php echo $specificaties[13] ?>"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="submit">
            <input type="submit" name="submit" value="bewerk">
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
</html>
