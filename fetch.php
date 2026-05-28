<?php
include 'db.php';

$sql = "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 5";
$result = mysqli_query($conn, $sql);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>