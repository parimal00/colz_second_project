<?php

include_once '../includes/connect.php';
 ?>


<?php
session_start();

$first = $_POST['first'];
$last = $_POST['last'];
$username = $_POST['user_name'];
$password = $_POST['pass'];

$password2 = md5($password);
$re_pass =$_POST['re_pass'];
$email = $_POST['email'];

$semester_fee = 103000;
$semester = $_POST['semester'];
$roll_number=$_POST['roll_no'];

//checking all the datasa........................


// echo $first;
// echo $last;
// echo $username;
// echo $password;
// echo $re_pass;
// echo $email;

// echo $semester;
// echo $roll_number;


$sql2= "select * from student_registration where username = '$username'";
$result2 = mysqli_query($conn, $sql2);
$count = mysqli_num_rows($result2);




echo $count;


if(isset($_POST['signup-button'])){
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
//  echo "not filter";
    header("Location: ../signup/signup.php?signup=emailerror");
}

else if($password==$re_pass){
  if(empty($username) or empty($first) or empty($last)or empty($password)or empty($re_pass)or empty($email))
  {
    //echo "empty field";
   header("Location: ../signup/signup.php?signup=empty");
    }
    else if($count>0){
     // echo "username exists ";
      header("Location: ../signup/signup.php?signup=same_username");
    }
    else{
     // $sql ="insert into student_registration(firstname,lastname,username,password,email,contact,semester,roll_no,status) values('first','lst','username','password','email','1234','1','$roll_number','016331')";
     $sql ="insert into student_registration(firstname,lastname,username,password,email,contact,semester,roll_no,status,passed_out) values('$first','$last','$username','$password2','$email','1234','$semester','$roll_number','no','0')";
      mysqli_query($conn,$sql);
     // echo "signup success";
      
    
 header("Location: ../signup/signup.php?signup=success");
    }

}
else
{

    header("Location: ../signup/signup.php?signup=pass-wrong");
}

}

?>
