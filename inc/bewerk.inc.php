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
    $autoID = $_POST['id'];
    $merk = $conn->real_escape_string($_POST['merk']);
    $type = $conn->real_escape_string($_POST['type']);
    $prijs = $conn->real_escape_string($_POST['prijs']);
    $query = "UPDATE `autos` SET `merk`='{$merk}',`type`='{$type}',`prijs`='{$prijs}' WHERE auto_id = {$autoID}";
    if($conn->query($query)) {
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

        $query2 = "UPDATE `auto_specificaties` SET `Kleur`='{$kleur}',`Kilometerstand`='{$km}',`Brandstof`='{$brandstof}',`Topsnelheid`='{$topsnelheid}',`Vermogen`='{$vermogen}',`Carrosserie`='{$carrosserie}',`Verbruik`='{$verbruik}',`Transmissie`='{$transmissie}',`Accelerattie`='{$accelerattie}',`Zitplaatsen`='{$zitplaatsen}',`Tankinhoud`='{$tankinhoud}',`Energielabel`='{$energie}' WHERE auto_id = {$autoID}";
        if($conn->query($query2)) {
            if($_FILES['foto']['size'] > 0) {
                $query3 = "SELECT foto FROM auto_fotos WHERE auto_id = {$autoID} AND card_foto = 1";
                $result = $conn->query($query3);
                $oudeFoto = $result->fetch_array();
                if(unlink($target_dir.$oudeFoto[0])){
                    $imageFileType = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                    $randomName = generateRandomString().".".$imageFileType;
                    $target_file = $target_dir . $randomName;
                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
                    $query4 = "UPDATE `auto_fotos` SET `foto`='{$randomName}' WHERE auto_id = {$autoID} AND card_foto = 1";
                    if($conn->query($query4)) {
                        header("Location: ../details.php?id={$autoID}");
                        exit();
                    }else {
                        header("Location: ../admin/bewerk.php?id={$autoID}");
                        exit();
                    }
                }else {
                    header("Location: ../admin/bewerk.php?id={$autoID}");
                    exit();
                }

            }
            else {
                header("Location: ../details.php?id={$autoID}");
                exit();
            }
        }
    }
}
