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


        <div id="cnt-formCambiaNome">
            <form id="form-cambiaNome" action="php/cambiaPassword.php" method="POST">
                <h2 id="txt-cambiaNome">Cambia il tuo nickname</h2>
                <input type="text" name="vecchiaPassword" class="input-cambiaNome" placeholder="inserire vecchia password" require>
                <input type="text" name="nuovaPassword" class="input-cambiaNome" placeholder="inserire nuova password" require>
                <input type="submit" class="input-cambiaNome btn-cambianome">
            </form>
        </div>

        
        <script src="script/script.js"></script>
    </body>
</html>