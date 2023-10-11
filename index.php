<?php
session_start(); 
include 'functions.php';

$message = '';

if (isset($_GET['length'])) {
    $length = $_GET['length'];
    
    // Controlla se il campo di input è vuoto
    if ($length == '') {
        $message = "Nessun parametro inserito.";
    } else {
        // Genera una password casuale
        $password = generatePassword($length);
        
        // Controlla se la password soddisfa i criteri
        if (checkPassword($password)) {
            $_SESSION['password'] = $password;
            header('Location: password.php');
            exit();
        } else {
            $message = "<span style='color:red;'>La password generata non soddisfa i criteri. Riprova.</span>";
        }
    }
} else {
    $message = "Nessun parametro valido inserito.";
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
    <!-- Title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap -->
</head>
<body style="background-color:rgb(18, 20, 28);">
    <div class="col-6 offset-3 mt-4 p-5" style="background-color:darkblue;">
        <div class="text-center">
            <h1 style="color: gray;">Strong Password Generator</h1>
            <h2 style="color: white;">Genera una password sicura</h2>
        </div>
        <div class="d-flex align-items-center rounded mt-3 p-2 px-5" style="height: 50px ; background-color:aqua;">
        <?php
         echo $message; 
         ?>
         </div>
        <div class="container flex-wrap bg-light mt-2 rounded p-5">
            <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="d-flex justify-content-between">
                    <label for="length">Lunghezza della password:</label><br>
                    <div class="col-3">
                     <input type="text" class="form-control" id="length" name="length" value="">
                    </div>
                </div>
                <?php

                if (!empty($password) && strlen($password) >= 9) {
                    echo "<p>Password generata: " . $password . "</p>";
                }

                ?>
                <button class="btn btn-primary" type="submit" value="Genera">Invia</button>
                <button class="btn btn-secondary" type="submit" value="Annulla" onclick="document.getElementById('length').value = ''">Annulla</button>
            </form>
        </div>
    </div>
</body>
</html>




