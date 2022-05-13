<?php
include_once('conn.php');

$sms_id =  $mysqli($mysqli,$_POST["sms_id"]);
$sms_status = "DELETED";
$sms_date_delet = date("d/m/Y");

$sql = "UPDATE sms_cadastro SET
    sms_status = '$sms_status',
   sms_data_delet = '$sms_date_delet' 
    WHERE sms_id = '$sms_id'";

    echo $sql;

if ($mysqli  ->query($sql) === TRUE) {
    header('Location:index.php');
  } else {
    echo "Error updating record: " . $mysqli ->error;
  }
  
  $mysqli ->close();

?>