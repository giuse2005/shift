

<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "pensieriesfoghi";

$conn = mysqli_connect($servername, $username, $password, $db);

if(!$conn){
    die("connesione non riuscita");
}

?>