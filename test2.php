<?php

require("inc/config.php");

$query = "SELECT * FROM `auto_fotos` WHERE auto_id = 1 ORDER BY card_foto DESC;";
$result = $conn->query($query);
$count = 1;

while ($autos = $result->fetch_array()) {
    $fotos[] = [$count, $autos[2]];
    $count++;
}

echo $fotos[1][1];
echo "<br>";


foreach ($fotos as $foto) {
    if ($foto[0] != 2) {
        echo $foto[1];
        echo "<br>";
    }
}

