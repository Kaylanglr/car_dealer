<?php
require("config.php");

if(isset($_GET['merk']) && $_GET['merk'] != "all") {
    $query = "SELECT autos.auto_id, autos.merk, autos.type, autos.prijs, auto_fotos.foto FROM autos INNER JOIN auto_fotos ON autos.auto_id = auto_fotos.auto_id WHERE autos.merk = '{$_GET['merk']}' AND auto_fotos.card_foto = 1 ORDER BY autos.type";
    $result = $conn->query($query);
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
}
else if (!isset($_GET['merk']) || $_GET['merk'] == "all"){
    $query = "SELECT autos.auto_id, autos.merk, autos.type, autos.prijs, auto_fotos.foto FROM autos INNER JOIN auto_fotos ON autos.auto_id = auto_fotos.auto_id WHERE auto_fotos.card_foto = 1 ORDER BY autos.merk";
    $result = $conn->query($query);
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
}