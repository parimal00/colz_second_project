<?php
include "../../../includes/connect.php";
$id = $_GET['id'];
mysqli_query($conn, "Update student_registration set status='no' where id = $id");
header("Location: display_stu_info.php");


 ?>
