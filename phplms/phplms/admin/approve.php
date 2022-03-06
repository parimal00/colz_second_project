<?php
include "../../../includes/connect.php";
$id = $_GET['id'];

$sql= "select * from student_registration where id = '$id'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
    $roll_no = $row['roll_no'];
}
$semester_fee= 103000;


$sql2= "insert into student_account(roll_no,semester_fee,balance_due,scholarship,bus_fee,total_fee,paid)values('$roll_no','$semester_fee','$semester_fee','0','0','$semester_fee','not_paid')";
mysqli_query($conn,$sql2);

mysqli_query($conn, "Update student_registration set status='yes' where id = $id");
header("Location: abc.php");


 ?>
