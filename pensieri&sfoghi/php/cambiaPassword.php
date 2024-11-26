<?php 

include 'connessione.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['vecchiaPassword']) && isset($_POST['nuovaPassword'])){

        $vecchia_password = $_POST['vecchiaPassword'];
        $nuova_password = $_POST['nuovaPassword'];

        $selezionoPassword = "SELECT password FROM utenti WHERE nickname = ?"; // Considera di usare il nickname o ID per identificare univocamente l'utente
        $stmtSelezionoPassword = $conn->prepare($selezionoPassword);
        $stmtSelezionoPassword->bind_param("s", $_SESSION['nickname']);  // Usa il nickname dell'utente nella sessione
        $stmtSelezionoPassword->execute();
        $result = $stmtSelezionoPassword->get_result();
        
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            
            if(password_verify($vecchia_password, $row["password"])){

                $cambioPassword = "UPDATE utenti SET password = ? WHERE nickname = ?";  // Devi usare nickname per identificare l'utente
                $stmt_cambio_password = $conn->prepare($cambioPassword);
                $hashed_new_password = password_hash($nuova_password, PASSWORD_DEFAULT);  // Assicurati di fare l'hash della nuova password
                $stmt_cambio_password->bind_param("ss", $hashed_new_password, $_SESSION['nickname']);  // Usa nickname per trovare l'utente
                $stmt_cambio_password->execute();

                header("Location: ../shift.php");
            }else{
                header("Location: ../cambiaPassword.php");
            }
        } else {
            header("Location: ../cambiaPassword.php");
        }

    }else{
        header("Location: ../cambiaPassword.php");
    }
}else{
    header("Location: ../cambiaPassword.php");
}

$conn->close();

?>
