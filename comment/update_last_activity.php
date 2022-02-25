<?php
include 'database.php';
session_start();

$sql = "INSERT INTO login_details  values(2,'sexy','2018-11-30 10:28:3','no')

";
$result = mysqli_query($conn,$sql);

?>