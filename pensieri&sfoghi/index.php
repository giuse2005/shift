
<?php 

session_start();
var_dump($_SESSION);


if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
    header('Location: shift.php');
    exit();
}else{
    echo "errore";
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Giuseppe Giannino">

        <script src="https://kit.fontawesome.com/030104b296.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="favicon/favicon.ico" type="image/x-icon">

        <title>SHIFT</title>
    </head>


    <body>

        <header>
            <h2 id="nomeSito">SHIFT</h2>
            <i class="fas fa-cloud"></i>
            <a href="registrati.php"><i class="fa-solid fa-user"></i></a>
        </header>

        <div id="cnt-registrazione">
            <div class="box-messaggio box-1">
                <p class="txt-messaggio">
                    <b>Hai una storia da raccontare? Un'emozione da liberare?</b><br>
                    Non c'è giudizio, solo ascolto. Scrivi senza paura, esprimi te stesso senza limiti. Qui puoi essere chi vuoi, senza che nessuno ti conosca. Le parole hanno il potere di liberarti, lascia che le tue volino.
                    Scrivi ora, sfogati anonimamente, e sentiti ascoltato. La tua voce conta.
                </p>
                <button class="button-index btn-1">
                    <a href="registrati.php" class="link-registrati">Scrivi storia</a>
                </button>
            </div>

            <div class="box-messaggio box-2">
                <p class="txt-messaggio">
                    Scrivere permette di liberarsi da emozioni e pensieri che spesso sono difficili da esprimere verbalmente. Ti aiuta a vedere le cose da una prospettiva diversa, a mettere ordine nella mente e a sentirti più leggero. Quando lo fai in modo anonimo, puoi farlo senza paura di essere giudicato, il che rende l'esperienza ancora più liberatoria. Ogni parola che scrivi è un passo verso il benessere emotivo, un'opportunità per farti ascoltare senza alcuna barriera. Questo spazio è pensato per darti quel sollievo, senza preoccupazioni o vincoli.
                </p>
                <button class="button-index btn-2">
                    <a href="registrati.php" class="link-registrati">Registrati</a>
                </button>
            </div>
        </div>

        <div id="cnt-storie">
            <h3 id="txt-storie">Alcune storie</h3>
        </div>

        <div id="catalogo_storie_scritte">
            <?php include 'php/calderoneStorie.php'; ?> 
        </div>

    </body>
</html>