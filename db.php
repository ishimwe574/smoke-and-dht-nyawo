<?php
$host="localhost";
$username="root";
$pass="";
$db="able";
$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn){
    die("failed to connect");
}
?>