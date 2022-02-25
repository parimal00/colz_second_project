<?php
session_start();
include 'database.php';
$user_name=$_POST['user_name'];
$first=$_POST['first'];
$last=$_POST['last'];
$pass=$_POST['pass'];
$re_pass=$_POST['re_pass'];
$email=$_POST['email'];
if(isset($_POST['signup-button'])){
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    header("Location: ../signup/signup.php?signup=emailerror");    
}

else if($pass==$re_pass){
    if(empty($user_name) or empty($first) or empty($last)or empty($pass)or empty($re_pass)or empty($email))
    {
     
       header("Location: ../signup/signup.php?signup=empty");    
    }
    else{

$sql= "INSERT INTO signup (FIRST,LAST, PASSWORD, rePassword, email,user_name) VALUES ('$first','$last','$pass','$re_pass','$email','$user_name')";
 mysqli_query($conn,$sql);

 echo "<script>";
 echo "alert('You have sucessfully signed Up !! ')";
 echo "</script>";

 header("Location: ../index.php?signup=success");
    }

}
else
{
    
    header("Location: ../signup/signup.php?signup=pass-wrong"); 
}

}

?>