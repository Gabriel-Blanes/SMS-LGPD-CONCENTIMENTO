<?php
$servername = "nome do serve";
$database = "nome do banco de dados";
$username = "usuario do banco";
$password = "senha do banco";
$port = "3306";

$mysqli = new mysqli($servername, $username, $password, $database, $port);
$query = mysqli_query($mysqli, "SELECT * FROM sms_cadastro WHERE sms_status = '' ");

/*
if ($mysqli->connect_error) {
    echo "erro: " . $mysqli->connect_error;
} else {
    echo "conectado";
}
*/