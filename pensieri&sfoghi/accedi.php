

<?php 

error_reporting(0);

session_start();

if($_SESSION['logged'] == true){
    header('Location: paginaPrivata.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Giuseppe Giannino">

        <script src="https://kit.fontawesome.com/030104b296.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/form.css">
        <link rel="icon" href="favicon/favicon.ico" type="image/x-icon">

        <title>SHIFT</title>
    </head>

    <body>

        <header>
            <h2 id="nomeSito">SHIFT</h2>
            <i class="fas fa-cloud"></i>
        </header>

        <div class="cnt-form">
            <form action="php/accedi.php" method="POST">
                <h2 id="txt">Accedi</h2>
                <input class="input-Form" type="text" name="nickname" placeholder="inserire nickname" required>
                <input class="input-Form" type="password" name="password" placeholder="inserire password" required>
                <p id="link-accedi">Non sei già registrato?<a href="registrati.php">Registrati</a></p>
                <input id="invia" type="submit" value="invia">
            </form>
        </div>

    </body>
</html>