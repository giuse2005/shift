


<?php 

include 'connessione.php';


if($_SERVER['REQUEST_METHOD']){

    $stmt = $conn->prepare("SELECT nomeStoria, storia, nickname FROM storie WHERE nickname = ?");
    $stmt->bind_param("s", $_SESSION['nickname']);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            echo "
                    <div class='cnt-storie'>
                        <!-- Form per leggere la storia -->
                        <form action='leggiStoria.php' method='POST' class='formStoriePP'>
                            <center>
                                <input class='nomeStoria' name='nomeStoria' type='submit' value='{$row['nomeStoria']}'>
                                <br>
                                <textarea name='storia' readonly cols='40' rows='10' class='txt-storia'>{$row['storia']}</textarea>
                            </center>
                        </form>

                        <!-- Form per eliminare la storia -->
                        <form action='leggiStoria.php' method='POST' class='formEliminaStoria'>
                            <input type='hidden' name='nomeStoria' value='{$row['nomeStoria']}'>
                            <input type='hidden' name='storia' value='{$row['storia']}'>
                            <input type='submit' name='eliminaStoria' class='eliminaStoria' value='Elimina storia'>
                        </form>
                    </div>
                ";
        }
    }
}



?>