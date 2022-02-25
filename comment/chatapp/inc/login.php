<?php
session_start();
include 'database.php';
$username=$_POST['username'];
$password=$_POST['pass'];

$sql="SELECT * FROM signup where user_name = '$username' and PASSWORD = '$password' ";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if(isset($_POST['submit'])){

    if(empty($username) or empty($password)){
        header("Location: ../login/1page.php?login=empty");
    }
else if($row==null)
{
    header("Location: ../login/1page.php?login=NoUser");
}
else{
    $_SESSION['id']= $row['id'];
    $_SESSION['userID']=$username;
    $query = "INSERT INTO login_details( login_details_id , user_name) VALUES ('".$_SESSION['id']."','".$_SESSION['userID']."')";
    mysqli_query($conn,$query);
    header("Location: ../comment/index.php");
}
}

?>