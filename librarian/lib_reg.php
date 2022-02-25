<?php
include_once '../inc/connect.php' ;
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
     <form method = "POST">
     <input type="text" name="first"placeholder="first name" value=""><br>
     <input type="text" name="last"placeholder="last name" value=""><br>
     <input type="text" name="username" placeholder="username"value=""><br>
     <input type="text" name="password" placeholder="password"value=""><br>
     <input type="text" name="email"placeholder="email" value=""><br>
     <input type="text" name="contact" placeholder="contact"value=""><br>
     <button name="btn_reg">Regester</button>

     </form>';
     if(isset($_POST['btn_reg'])){
     $first = $_POST['first'];
     $last = $_POST['last'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $email = $_POST['email'];
     $contact = $_POST['contact'];

     //echo $email,$contact,$semester,$roll_number,$first,$last,$username,$password;

     //$sql= "insert into student_registration
     //values('$first','$last','$username','$password','$email','$contact','$semester','$roll_number')";
     $sql ="insert into librarian_registration(firstname,lastname,username,password,email,contact) values('$first','$last','$username','$password','$email','$contact')";
     mysqli_query($conn,$sql);
    header("Location: lib_reg.php");
     }

     ?>

   </body>
 </html>
