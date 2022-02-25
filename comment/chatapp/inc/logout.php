<?php
include 'database.php';
if(isset($_POST['logout'])){
    session_start();
    $sql = "DELETE FROM login_details WHERE user_name ='".$_SESSION['userID']."' ";
    mysqli_query($conn,$sql);
    session_unset();
    session_destroy();
   header("Location: ../index.php");
  
}

?>