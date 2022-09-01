<?php
    require("inc/config.php");
    session_start();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM autos WHERE auto_id = {$id}";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            $auto = $result->fetch_array();

            //fotos
            $query2 = "SELECT * FROM `auto_fotos` WHERE auto_id = {$id} ORDER BY card_foto DESC";
            $result2 = $conn->query($query2);
            $count = 1;
            while ($fotos = $result2->fetch_array()) {
                $fotosArray[] = [$count, $fotos[2]];
                $count++;
            }

            //specificaties
            $query3 = "SELECT * FROM `auto_specificaties` WHERE auto_id = {$id} ORDER BY specificatie_id DESC";
            $result3 = $conn->query($query3);
            $specificaties = $result3->fetch_array();

        }
        else {
            header("Location: collectie.php");
            exit();
        }
    }else {
        header("Location: collectie.php");
        exit();
    }
?>

<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $auto[1]." ". $auto[2] ?></title>
    <link rel="stylesheet" href="public/css/details.style.css">
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
    <div class="auto">
        <h1><?php echo $auto[1]." ". $auto[2] ?></h1>
        <?php
        if ($_SESSION['rechten'] == 1) {
            ?>
            <div class="admin-buttons">
                <a href="admin/bewerken.php?id=<?php echo $auto[0] ?>" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <a id="verwijder" class="edit"><i class="fa-solid fa-trash"></i></a>
            </div>
            <?php
        }

        ?>
    </div>
    <div class="fotos">
        <div class="slider">
            <div class="slide">
                <img src="public/img/cars/<?php echo $fotosArray[1][1] ?>" alt="">
            </div>
            <?php
            foreach ($fotosArray as $foto) {
                if ($foto[0] != 2) {
                    ?>
                    <div class="slide">
                        <img src="public/img/cars/<?php echo $foto[1] ?>" alt="">
                    </div>
                    <?php
                }
            }
            ?>
            <button class="btn btn-next"><i class="fa-solid fa-angle-right"></i></button>
            <button class="btn btn-prev"><i class="fa-solid fa-angle-left"></i></button>
        </div>
    </div>
    <div class="details">
        <h2>Specificaties</h2>
        <div class="wrapper">
            <div class="specificaties">
                <table>
                    <tr>
                        <td class="title">Kleur:</td>
                        <td><?php echo $specificaties[2] ?></td>
                    </tr>
                    <tr>
                        <td class="title">Kilometerstand:</td>
                        <td><?php echo $specificaties[3] ?></td>
                    </tr>
                    <tr>
                        <td class="title">Brandstof:</td>
                        <td><?php echo $specificaties[4] ?></td>
                    </tr>
                    <tr>
                        <td class="title">Vermogen:</td>
                        <td><?php echo $specificaties[6] ?> pk</td>
                    </tr>
                    <tr>
                        <td class="title">Topsnelheid:</td>
                        <td><?php echo $specificaties[5] ?> km/u</td>
                    </tr>
                    <tr>
                        <td class="title">Carrosserie:</td>
                        <td><?php echo $specificaties[7] ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td class="title">Verbuik:</td>
                        <td><?php echo $specificaties[8] ?> liter / 100 km</td>
                    </tr>
                    <tr>
                        <td class="title">Transmissie:</td>
                        <td><?php echo $specificaties[9] ?></td>
                    </tr>
                    <tr>
                        <td class="title">Accelerattie:</td>
                        <td><?php echo $specificaties[10] ?> s</td>
                    </tr>
                    <tr>
                        <td class="title">Zitplaatsen:</td>
                        <td><?php echo $specificaties[11] ?></td>
                    </tr>
                    <tr>
                        <td class="title">Tankinhoud:</td>
                        <td><?php echo $specificaties[12] ?> liter</td>
                    </tr>
                    <tr>
                        <td class="title">Energielabel:</td>
                        <td><?php echo $specificaties[13] ?></td>
                    </tr>
                </table>
            </div>
            <div class="prijs">
                <h2>Prijs</h2>
                <div class="prijs-box">
                    <h3>€ <?php echo $auto[3]; ?>,- incl. BTW</h3>
                    <p><?php echo $auto[1]." ".$auto[2] ?></p>
                </div>
            </div>

            <div class="afspraak">
                <?php
                    if($_SESSION['rechten'] != 1) {
                        ?>
                        <a href="afspraak.php?id=<?php echo $auto[0] ?>">
                            Maak een afspraak
                        </a>
                        <?php
                    }
                ?>
            </div>
        </div>


        <div id="delete-confirm" class="modal">
            <div class="modal-content delete-box">
                <div id="h1">
                    <h1>Weet je het zeker?</h1>
                </div>
                <div class="delete-buttons">
                    <a href="inc/delete.inc.php?id=<?php echo $auto[0]?>" id="confirm" class="deleteBtn"><i class="fa-solid fa-check"></i></a>
                    <a id="cancel" class="deleteBtn"><i class="fa-solid fa-xmark"></i></a>
                </div>
            </div>
        </div>
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
<script src="public/js/carousel.js"></script>
<script src="public/js/modal.js"></script>
</html>
