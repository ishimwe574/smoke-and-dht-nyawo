
<?php

include 'db.php';

if(isset($_GET['temperature']) &&
   isset($_GET['smoke']))
 {

    $temperature = $_GET['temperature'];
    $smoke = $_GET['smoke'];
    $sql = "INSERT INTO sensor_data(temperature, smoke,)VALUES($temperature, $smoke)";

    if(mysqli_query($conn, $sql)) {
        echo "Inserted Successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    echo "No Data";
}

?>