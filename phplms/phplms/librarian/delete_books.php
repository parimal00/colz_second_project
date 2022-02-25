<?php
include "../../../includes/connect.php";
$id = $_GET['id'];
$sql = "delete from add_books where id = '$id'";
mysqli_query($conn, $sql);
header("Location: display_books.php");
 ?>
