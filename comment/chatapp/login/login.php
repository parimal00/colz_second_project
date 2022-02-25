<?php
session_start();
include 'database.php';
$username=$_POST['username'];
$password=$_POST['pass'];

$sql="SELECT * FROM signup where user_name = '$username' and PASSWORD = '$password' ";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if($row==null)
{
    header("Location: ../login/signup.php?signup=empty");    }
else{
    
    header("Location: ../comment/comment.php");
}


?>