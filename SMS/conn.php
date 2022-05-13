<?php
$servername = "localhost";
$database = "sms";
$username = "root";
$password = "";

$mysqli = new mysqli($servername, $username, $password, $database);
$query = mysqli_query($mysqli, "SELECT * FROM sms_cadastro WHERE sms_status = '' ");

?>