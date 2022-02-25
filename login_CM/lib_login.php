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
     <form class="" action="" method="Post">
       <input type="text"name ="username">
       <input type="text"name="password">
       <button name="btn_login">Login</button>
     </form>';
     $username = $_POST['username'];
     $password=$_POST['password'];


     $count=0;

     if(isset($_POST['btn_login'])){



    $sql="select * from librarian_registration where username = '$username' and password = '$password'";
    $result=mysqli_query($conn,$sql);
    $count= mysqli_num_rows($result);


    if($count==1){
      header("Location: ../librarian/stu_info.php");
    }
    else {
      echo "username or password is incorrect";
    }




     }





      ?>
   </body>
 </html>
