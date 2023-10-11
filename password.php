
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
        <div class="container flex-wrap bg-light mt-2 rounded p-5">
                <div class="d-flex justify-content-center bg-dark rounded m-2 p-2">
                    <?php
                    session_start();
                    if (isset($_SESSION['password'])) {
                        echo "<span style='color:red;'>La password generata è: " . $_SESSION['password'] . "</span>";
                    } 
                    ?>
                </div>
                <button class="btn btn-secondary" type="button" onclick="window.location.href='index.php'">Annulla</button>
        </div>
    </div>
</body>
</html>




