<?php
include_once('conn.php');

// fetch records
$sql = "SELECT * from sms_cadastro WHERE sms_status != 'DELETED'";
$result = mysqli_query($mysqli, $sql);

while($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

$dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array,

    
);

echo json_encode($dataset);
?>