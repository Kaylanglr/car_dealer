<?php

require("config.php");

if(isset($_GET['id'])) {
    $target_dir = "../public/img/cars/";
    $id = $_GET['id'];
    $query = "SELECT foto FROM auto_fotos WHERE auto_id = {$id}";
    $result = $conn->query($query);
    $query2 = "DELETE FROM `autos` WHERE auto_id = {$id}";
    if($conn->query($query2)) {
        while ($fotos = $result->fetch_array()) {
            unlink($target_dir.$fotos[0]);
        }
        header("Location:../collectie.php");
        exit();
    }
    else {
        header("Location:../collectie.php");
        exit();
    }
}
else {
    header("Location:../collectie.php");
    exit();
}