<?php
include_once('conn.php');

$id = mysqli_escape_string($mysqli ,$_POST['id']);
$msg = mysqli_escape_string($mysqli,$_POST['msg']);
$fone = mysqli_escape_string($mysqli,$_POST['fone']);
$data = mysqli_escape_string($mysqli,$_POST['data']);

$mysqli->query("INSERT INTO sms_cadastro(sms_msg_id, sms_msg, sms_fone, sms_data) VALUES ('{$id}','{$msg}','{$fone}','{$data}')");

?>