<?php
$name =$_POST['name'];
$email =$_POST['email'];
$message=$_POST['message'];

$sql="INSERT INTO contact(name,email,message) values('$name','$email','$message')";
mysqli_query($sql,$conn);


?>