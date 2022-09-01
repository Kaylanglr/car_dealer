<?php
require('config.php');
session_start();


if(isset($_POST['submit'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $wachtwoord = $conn->real_escape_string($_POST['wachtwoord']);

    if ($wachtwoord != "" && $email != "") {
        $query = "SELECT medewerkers.medewerker_id, medewerkers.voornaam, medewerkers.achternaam, medewerkers.email, medewerkers.telefoonnummer, users.wachtwoord, users.rechten FROM medewerkers INNER JOIN users ON medewerkers.user_id = users.user_id WHERE medewerkers.email = '{$email}'";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            $medewerker = $result->fetch_array();
            if(password_verify($wachtwoord, $medewerker[5])) {
                $_SESSION['id'] = $medewerker[0];
                $_SESSION['rechten'] = $medewerker[6];
                $_SESSION['naam'] = $medewerker[1].' '.$medewerker[2];
                $_SESSION['email'] = $medewerker[3];
                $_SESSION['telefoon'] = $medewerker[4];

                header("Location: ../index.php");
                exit();
            }
            else {
                header("Location: ../login.php?login=invalid");
                exit();
            }

        }
        else {
            $query = "SELECT klanten.klant_id, klanten.voornaam, klanten.achternaam, klanten.email, klanten.telefoonnummer, users.wachtwoord, users.rechten FROM klanten INNER JOIN users ON klanten.user_id = users.user_id WHERE klanten.email = '{$email}'";
            $result = $conn->query($query);
            if($result->num_rows > 0) {
                $klant = $result->fetch_array();
                if(password_verify($wachtwoord, $klant[5])) {
                    $_SESSION['id'] = $klant[0];
                    $_SESSION['rechten'] = $klant[6];
                    $_SESSION['naam'] = $klant[1].' '.$klant[2];
                    $_SESSION['email'] = $klant[3];
                    $_SESSION['telefoon'] = $klant[4];

                    header("Location: ../index.php");
                    exit();
                }
                else {
                    header("Location: ../login.php?login=invalid");
                    exit();
                }
            }
            else {
                header("Location: ../login.php?login=invalid");
                exit();
            }
        }
    }
    else {
        header("Location: ../login.php?login=empty");
        exit();
    }

}
else {
    header("Location: ../login.php");
    exit();
}