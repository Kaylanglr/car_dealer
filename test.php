<?php

function generateRandomString($length = 32) {
    $characters = '0123456789abcd';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

echo generateRandomString();
echo "<br>";
echo generateRandomString();

