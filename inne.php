<?php
include "db.php";
header("Content-Type: application/json");
$data=json_decode(file_get_contents("php://input"),true);
if($data){
    $distance=$data['value'];
    $inser=mysqli_query($conn,"INSERT INTO sensors (value) VALUES ('$value')");
    if($inser){
        echo "Data inserted successfully";
    }
    else{
        echo "Failed";
    }
}
else{
    echo "No data received";
}
?>