


<?php 


include 'connessione.php';

session_start();

if($_SERVER["REQUEST_METHOD"]){

    if(isset($_POST['titoloStoria']) && $_POST['storia']){

        $nomeStoria = $_POST['titoloStoria'];
        $storia = $_POST['storia'];

        $stmt = $conn->prepare("INSERT INTO storie (nomeStoria, storia, nickname) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $nomeStoria, $storia, $_SESSION['nickname']);
        $stmt->execute();

        $_SESSION['nome_storia'] = $nomeStoria;
        $_SESSION['storia'] = $storia;
        header('Location: ../scriviStoria.php');
    }else{
        header('Location: ../scriviStoria.php');
    }
}else{
    header('Location: ../scriviStoria.php');
}



?>