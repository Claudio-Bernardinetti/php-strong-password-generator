<?php

function generatePassword($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomPassword;
}

$password = '';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($_GET["length"])) {
        $length = $_GET["length"];
        if (is_numeric($length)) {
            $password = generatePassword($length);
        }
    }
}
?>