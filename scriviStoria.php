<?php 

session_start();

if($_SESSION['logged'] != true){
    header('Location: registrati.php');
    exit();
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Giuseppe Giannino">

        <script src="https://kit.fontawesome.com/030104b296.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/paginaPrivata.css">
        <link rel="icon" href="favicon/favicon.ico" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <title>SHIFT</title>
    </head>


    <body>

        <header>
        
            <h2 id="nomeSito">SHIFT</h2>
            <i class="fas fa-cloud"></i>
            <i class="fa-solid fa-user"></i>
        
        </header>

        <div id="cnt-usericon">
        
            <h3 class="el-ctnUser">
                <?php echo $_SESSION['nickname'] ?>
            </h3>
            
            <h3 class="el-ctnUser">
                <a href="scriviStoria.php" class="link-el-ctnUser">    
                    Scrivi una storia
                </a>
            </h3>

            <h3 class="el-ctnUser">
                <a href="impostazioni" class="link-el-ctnUser">
                    Impostazioni
                </a>
            </h3>
            
            <form action="php/logout.php">
                <input id="btn-logout" type="submit" value="Esci">
            </form>
        
        </div>

        <center>
            <form action="php/scriviStoria.php" method="POST" id="formStorie">
                <h2 style="padding: 10px; color: #34495E;">Scrivi la tua storia</h2>
                <input id="input-titoloStoria" type="text" name="titoloStoria" placeholder="Inserisci il nome della tua storia" required>
                <textarea id="input-scriviStoria" name="storia"placeholder="Inizia a scrivere la tua storia..." required></textarea>
                <br>
                <input type="submit" id="inviaStoria" value="Invia">
            </form>
        </center>



        <h2 id='txt-creatore-storie'>
            Ecco le tue Storie <?php echo $_SESSION['nickname']?>
        </h2>


        <div id="catalogo_storie_scritte">
            <?php include('php/catalogoStorie.php'); ?>
        </div>


        
        <script src="script/script.js"></script>
    </body>
</html>