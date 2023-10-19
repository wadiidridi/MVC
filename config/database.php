<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myproject";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}
?>

