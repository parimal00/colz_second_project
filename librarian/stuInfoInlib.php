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

$sql = "select * from student_registration";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  echo $row['username'];
}

     ?>
  </body>
</html>
