<?php


include 'connessione.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se sono stati inviati email e password
    if (isset($_POST['nickname']) && isset($_POST['password'])) {
        $nickname = $_POST['nickname'];
        $password = $_POST['password'];

        // Prepara la query per recuperare la password hashata dal database
        $stmt = $conn->prepare("SELECT id, password FROM utenti WHERE nickname = ?");
        $stmt->bind_param("s", $nickname);  // 's' indica che il parametro è una stringa
        $stmt->execute();
        $stmt->store_result();

        // Se c'è un utente con il nickname
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);  // Associa i risultati alle variabili
            $stmt->fetch();

            // Verifica se la password immessa corrisponde a quella hashata
            if (password_verify($password, $hashed_password)) {
                // Password corretta, avvia la sessione
                session_start();
                $_SESSION['logged'] = true;
                $_SESSION['nickname'] = $nickname;
                header('Location: ../shift.php');
                exit();
            } else {
                header('Location: ../accedi.php');
                exit();
            }
        } else {
            header('Location: ../accedi.php');
            exit();
        }

        // Chiudi la dichiarazione e la connessione
        $stmt->close();
    }
}

$conn->close();

?>
