


<?php 

include 'connessione.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['nickname']) && isset($_POST['password'])){
        $nickname = $_POST['nickname'];
        $password = $_POST['password'];
        $nuovoNickname = $_POST['nuovo_nickname'];

        $sql = "SELECT nickname,password FROM utenti WHERE nickname = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nickname);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){

            $row = $result->fetch_assoc();
            
            if(password_verify($password, $row["password"])){

                $cambioNome = "UPDATE utenti SET nickname = ? WHERE nickname = ?";
                $stmtCambioNome = $conn->prepare($cambioNome);
                $stmtCambioNome->bind_param("ss", $nuovoNickname, $nickname);
                $stmtCambioNome->execute();

                $_SESSION["nickname"] = $nuovoNickname;
                header("Location: ../shift.php");
            
            }else{
                header("Location: ../cambiaNick.php");
            }
        }else{
            header("Location: ../cambiaNick.php");
        }
    }else{
        header('Location: ../cambiaNick.php');
    }
}else{
    header('Location: ../cambiaNick.php');
}

$conn->close();

?>