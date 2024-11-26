

<?php 


include 'connessione.php';

$seleziono_storie = $conn->prepare("SELECT nomeStoria, storia, nickname FROM storie");
$seleziono_storie->execute();
$result = $seleziono_storie->get_result();

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
        </div>
        ";
    }
}

?>