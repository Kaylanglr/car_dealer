<?php
session_start();
require 'config.php';


if(isset($_POST['submit'])) {
    $voornaam = $conn->real_escape_string($_POST['voornaam']);
    $achternaam = $conn->real_escape_string($_POST['achternaam']);
    $telefoon = $conn->real_escape_string($_POST['telefoon']);
    $email = $conn->real_escape_string($_POST['email']);
    $wachtwoord1 = $conn->real_escape_string($_POST['wachtwoord1']);
    $wachtwoord2 = $conn->real_escape_string($_POST['wachtwoord2']);

    if ($voornaam != "" && $achternaam != "" && $telefoon != "" && $email != "" && $wachtwoord1 != "" && $wachtwoord2 != "") {
        if ($wachtwoord1 == $wachtwoord2) {
            $hash = password_hash($wachtwoord1, PASSWORD_DEFAULT);
            $query = "INSERT INTO `users`(`wachtwoord`, `rechten`) VALUES ('{$hash}', 0)";
            if($conn->query($query)) {
                $user_id = $conn->insert_id;
                $query = "INSERT INTO `klanten`(`user_id`, `voornaam`, `achternaam`, `email`, `telefoonnummer`) VALUES ({$user_id}, '{$voornaam}', '{$achternaam}', '{$email}', '{$telefoon}')";
                if($conn->query($query)) {
                    $_SESSION['id'] = $conn->insert_id;
                    $_SESSION['rechten'] = 0;
                    $_SESSION['naam'] = $voornaam.' '.$achternaam;
                    $_SESSION['email'] = $email;
                    $_SESSION['telefoon'] = $telefoon;

                    header("Location: ../index.php");
                    exit();
                }
                else {
                    header("Location: ../registreer.php?registreer=error");
                    exit();
                }
            }
            else {
                header("Location: ../registreer.php?registreer=error");
                exit();
            }
        }
        else {
            header("Location: ../registreer.php?registreer=password");
            exit();
        }
    }
    else {
        header("Location: ../registreer.php?registreer=empty");
        exit();
    }
}
else {
    header("Location: ../registreer.php");
    exit();
}
