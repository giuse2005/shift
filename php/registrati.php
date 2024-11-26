
<?php

include 'connessione.php';

$stmt = $conn->prepare("INSERT INTO utenti (nome, cognome, nickname, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $cognome, $nickname, $hashed_password);


if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['nickname']) && isset($_POST['password'])){
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $nickname = $_POST['nickname'];
        $pass = $_POST['password'];
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $stmt->execute();

        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['nickname'] = $nickname;
        header('Location: ../shift.php');
        exit();
    }else{
        header('Location: ../registrati.php');
    }

}else{
    header('Location: ../registrati.php');
}

$conn->close()

?>