<?php

include "../../../includes/connect.php";
$ssid = $_GET['id'];
$a = date("y-m-d");
/*
$sql5 = "select books_issue_date from issue_books where ssid = '$ssid'";
$result5 = mysqli_query($conn,$sql5);
$row = mysqli_fetch_assoc($result5);
$issued_date =$row['books_issue_date'];

$date1 = strtotime($a);
$date2 = strtotime($issued_date);
$date_diff = ($date1-$date2)/86400;

if($date_diff==1){
  $sql6= "update issue_books set penalty = 'true'";
  mysqli_query($conn,$sql6);
  header("Location: return_book.php?penalty=true");

}
else{
*/
$sql = "update issue_books set books_return_date='$a' where ssid = $ssid";

mysqli_query($conn, $sql);
$book = "";
$sql2 = "select * from issue_books where ssid = '$ssid'";
$result = mysqli_query($conn, $sql2);
while($row = mysqli_fetch_assoc($result)){
  $book = $row['books_name'];
}

$sql3 ="Update update_books set available_qty = available_qty+1 where books_name = '$book'";
mysqli_query($conn,$sql3);

header("Location: return_book.php?success=true");


 ?>
