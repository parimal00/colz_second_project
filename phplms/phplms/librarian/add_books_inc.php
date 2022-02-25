<?php
session_start();
include "../../../includes/connect.php";
if(isset($_POST['submit1'])){
  $ssid = $_POST['ssid'];
$books_name=$_POST['bname'];
$authorname=$_POST['baname'];
$edition = $_POST['bedition'];
$publication_name=$_POST['bpname'];
$books_price =$_POST['bprice'];
  $purchase_date=$_POST['bpd'];
   $books_quantity=$_POST['bqty'];
    $available_quantity=$_POST['aqty'];
    $username = $_SESSION['librarian'];
if(empty($edition)||empty($ssid)||empty($books_name) || empty($authorname)||empty($publication_name) || empty($books_price)||empty($publication_name) || empty($books_price)||empty($purchase_date) || empty($books_quantity)||empty($available_quantity) || empty($username) ){

header("Location: add_books.php?output=empty");
}
else{
for($i=0;$i<$books_quantity;$i++){
  mysqli_query($conn,"Insert into add_books(ssid, books_name,books_author_name,Edition, books_price,books_publication_name,books_purchase_date,books_qty,available_qty,librarian_username) values('$ssid','$books_name','$authorname','$edition','$books_price','$publication_name','$purchase_date','$books_quantity','$available_quantity','$username')");

  $ssid = $ssid+1;
}
$sql2 = "insert into books_edition_info(books_name,dition,total_books,price) values ('$books_name','$edition','$books_quantity','$books_price')";
mysqli_query($conn,$sql2);
$sql = "insert into update_books (books_name, total_quantity, available_qty) values ('$books_name','$books_quantity','$available_quantity')";
mysqli_query($conn,$sql);

  header("Location: add_books.php?output=success");
}
}

?>
