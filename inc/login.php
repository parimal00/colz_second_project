<?php
session_start();
include '../includes/connect.php';
$username=$_POST['username'];
$password=$_POST['pass'];
$password2 = md5($password);
$sql="SELECT * FROM student_registration where username = '$username' and password = '$password2'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if(isset($_POST['submit'])){

    if(empty($username) or empty($password2)){
        header("Location: ../login/1page.php?login=empty");
    }

else if($row==null)
{
    header("Location: ../login/1page.php?login=NoUser");
}
else if($row['status']=='no'){
    header("Location: ../login/1page.php?login=NotApproved");
}
else{
    $_SESSION['id']= $row['id'];
    $_SESSION['userID']=$username;
  //  $query = "INSERT INTO login_details( login_details_id , user_name) VALUES ('".$_SESSION['id']."','".$_SESSION['userID']."')";
    //mysqli_query($conn,$query);
    header("Location: ../phplms/phplms/student/my_issued_books.php");
}
}

?>
