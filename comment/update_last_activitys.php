<?php
include '../inc/database.php';
session_start();
$sql = "UPDATE login_details
set last_activity = now()
where user_name = '".$_SESSION['userID']."';

";

mysqli_query($conn,$sql);
?>