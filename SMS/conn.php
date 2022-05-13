<?php
$servername = " nome do serv";
$database = "nome do banco de dados";
$username = "nome do usario";
$password = " senha do susuario";

$mysqli = new mysqli($servername, $username, $password, $database);
$query = mysqli_query($mysqli, "SELECT * FROM sms_cadastro WHERE sms_status = '' ");

?>