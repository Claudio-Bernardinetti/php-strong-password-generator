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

function checkPassword($password) {
    // Definisci i criteri che la password deve soddisfare
    $minLength = 9;
    $requireUppercase = true;
    $requireLowercase = true;
    $requireNumber = true;
    $requireSymbol = true;
    
    // Controlla la lunghezza della password
    if (strlen($password) < $minLength) {
        return false;
    }

    // Controlla la presenza di lettere maiuscole
    if ($requireUppercase && !preg_match('/[A-Z]/', $password)) {
        return false;
    }

    // Controlla la presenza di lettere minuscole
    if ($requireLowercase && !preg_match('/[a-z]/', $password)) {
        return false;
    }

    // Controlla la presenza di numeri
    if ($requireNumber && !preg_match('/[0-9]/', $password)) {
        return false;
    }

    // Controlla la presenza di simboli
    if ($requireSymbol && !preg_match('/[\W]/', $password)) {
        return false;
    }
    
    // Se tutti i controlli passano, la password è valida
    return true;
}

?>