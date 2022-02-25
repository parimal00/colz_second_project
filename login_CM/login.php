
<?php
include_once '../includes/connect.php' ;
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    echo'
    <form class="" action="" method="post">
      <input type="text"name ="username">
      <input type="text"name="password">
      <button name="btn_login">Login</button>
    </form>';
$count=0;
    if(isset($_POST['btn_login'])){

      $username=$_POST['username'];
      $password=$_POST['password'];
     $sql="select * from student_registration where username = '$username' and password = '$password'and status='yes'";
  //  $sql="select * from student_registration where username='$username'and password='$password'";
  $result= mysqli_query($conn, $sql);
      $count= mysqli_num_rows($result);
      if($count==1){
        echo "login success";
      }
      else {
        echo "username or password is incorrect";
      }
    }
?>
  </body>
</html>
