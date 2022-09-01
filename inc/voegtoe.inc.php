<?php
require("config.php");
$target_dir = "../public/img/cars/";
function generateRandomString() {
    $length = 32;
    $characters = '0123456789abcd';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



if(isset($_POST['submit'])) {
    $merk = $conn->real_escape_string($_POST['merk']);
    $type = $conn->real_escape_string($_POST['type']);
    $prijs = $conn->real_escape_string($_POST['prijs']);
    $datum = date("Y-m-d");
    $query = "INSERT INTO `autos`( `merk`, `type`, `prijs`, `datum_toegevoegd`) VALUES ('{$merk}','{$type}','{$prijs}','{$datum}')";
    $result = $conn->query($query);
    if($result) {
        $lastID = $conn->insert_id;
        $query2 = "INSERT INTO `auto_fotos`(`auto_id`, `foto`, `card_foto`) VALUES";

        $count = count($_FILES['fotos']['name']);
        for($i = 0; $i < $count; ++$i) {
            $imageFileType = pathinfo($_FILES['fotos']['name'][$i], PATHINFO_EXTENSION);
            $randomName = generateRandomString().".".$imageFileType;
            $target_file = $target_dir . $randomName;
            if ($i == 0) {
                $query2 .= " ({$lastID}, '{$randomName}', 1),";
            }
            else {
                $query2 .= " ({$lastID}, '{$randomName}', 0),";
            }
           move_uploaded_file($_FILES["fotos"]["tmp_name"][$i], $target_file);
        }
        $query2 = substr($query2, 0, -1);
        $result2 = $conn->query($query2);
        if ($result2) {
            $kleur = $conn->real_escape_string($_POST['kleur']);
            $km = $conn->real_escape_string($_POST['km']);
            $brandstof = $conn->real_escape_string($_POST['brandstof']);
            $vermogen = $conn->real_escape_string($_POST['vermogen']);
            $topsnelheid = $conn->real_escape_string($_POST['topsnelheid']);
            $carrosserie = $conn->real_escape_string($_POST['carrosserie']);
            $verbruik = $conn->real_escape_string($_POST['verbruik']);
            $transmissie = $conn->real_escape_string($_POST['transmissie']);
            $accelerattie = $conn->real_escape_string($_POST['accelerattie']);
            $zitplaatsen = $conn->real_escape_string($_POST['zitplaatsen']);
            $tankinhoud = $conn->real_escape_string($_POST['tankinhoud']);
            $energie = $conn->real_escape_string($_POST['energie']);

            $query3 = "INSERT INTO `auto_specificaties`(`auto_id`, `Kleur`, `Kilometerstand`, `Brandstof`, `Topsnelheid`, `Vermogen`, `Carrosserie`, `Verbruik`, `Transmissie`, `Accelerattie`, `Zitplaatsen`, `Tankinhoud`, `Energielabel`) VALUES ({$lastID},'{$kleur}','{$km}','{$brandstof}','{$topsnelheid}','{$vermogen}','{$carrosserie}','{$verbruik}','{$transmissie}','{$accelerattie}','{$zitplaatsen}','{$tankinhoud}','{$energie}')";
            $result3 = $conn->query($query3);
            if ($result3) {
                header("Location: ../details.php?id={$lastID}");
                exit();
            }
        }
    }
}

