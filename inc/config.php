<?php

$db_hostname = 'rdbms.strato.de';
$db_username = 'dbu2478443';
$db_password = '!!Kaylandb77';
$db_database = 'dbs8464828';

$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
