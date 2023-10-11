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
        <div class="container flex-wrap bg-light mt-2 rounded p-5">
            <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="d-flex justify-content-between">
                    <label for="length">Lunghezza della password:</label><br>
                    <div class="col-3">
                     <input type="text" class="form-control" id="length" name="length" value=""><br>
                    </div>
                </div>
                <?php
                if (!empty($password)) {
                    echo "<p>Password generata: " . $password . "</p>";
                }
                ?>
                <button class="btn btn-primary" type="submit" value="Genera">Invia</button>
                <button class="btn btn-secondary" type="submit" value="Genera">Annulla</button>
            </form>
        </div>
    </div>
</body>
</html>



