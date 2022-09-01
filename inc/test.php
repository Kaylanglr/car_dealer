<?php

require('config.php');

$wachtwoord = '#1Geheim';
$hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

$query = "UPDATE `users` SET `wachtwoord`='{$hash}' WHERE 1";
$conn->query($query);