<?php 

include 'connessione.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeStoria = $_POST['nomeStoria'];
    $storia = $_POST['storia'];

    if ($nomeStoria && $storia) {
        echo "
                <div class='cnt-leggiStorie'>
                    <h2 class='h2-leggiStoria'>{$nomeStoria}</h2>
                    <p class='p-leggiStoria'>{$storia}</p>
                </div>
        ";
    }

    $eliminaStoria = isset($_POST['eliminaStoria']);
    if ($eliminaStoria) {
        $stmt = $conn->prepare("DELETE FROM storie WHERE storia = ? AND nomeStoria = ?");
        $stmt->bind_param("ss", $storia, $nomeStoria);

        // Eseguire la query di eliminazione
        if ($stmt->execute()) {
            header('Location: scriviStoria.php');
        }

        header('Location: scriviStoria.php');
        exit();
    }
}

?>
