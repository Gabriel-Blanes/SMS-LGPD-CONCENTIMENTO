<?php
include_once('conn.php');

$id = $_POST['id'];
$msg = $_POST['msg'];
$fone = $_POST['fone'];
$data = $_POST['data'];

$mysqli->query("INSERT INTO sms_cadastro(sms_msg_id, sms_msg, sms_fone, sms_data) VALUES ('{$id}','{$msg}','{$fone}','{$data}')");

?>