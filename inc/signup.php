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

/*
echo $first;
echo $last;
echo $username;
echo $password;
echo $re_pass;
echo $email;

echo $semester;
echo $roll_number;
*/
$sql2= "select * from student_registration where username = '$username'";
$result2 = mysqli_query($conn, $sql2);
$count = mysqli_num_rows($result2);


echo $count;


if(isset($_POST['signup-button'])){
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    header("Location: ../signup/signup.php?signup=emailerror");
}

else if($password==$re_pass){
  if(empty($username) or empty($first) or empty($last)or empty($password)or empty($re_pass)or empty($email))
  {

    header("Location: ../signup/signup.php?signup=empty");
    }
    else if($count>0){
      header("Location: ../signup/signup.php?signup=same_username");
    }
    else{

      $sql ="insert into student_registration(firstname,lastname,username,password,email,contact,semester,roll_no,status) values('$first','$last','$username','$password2','$email','1234','$semester','$roll_number','no')";
      mysqli_query($conn,$sql);
      
      // $sql2="insert into student_account(roll_no,name,semester,semester_fee,balance_due,scholarship,bus_fee,total_fee,paid)values('$roll_number','$first','$semester','$semester_fee','0','0','0','0','no')";
      // mysqli_query($conn,$sql2);


 //echo '<script>
 //alert('You have sucessfully signed Up !! ')
//</script>';

 header("Location: ../signup/signup.php?signup=success");
    }

}
else
{

    header("Location: ../signup/signup.php?signup=pass-wrong");
}

}

?>
