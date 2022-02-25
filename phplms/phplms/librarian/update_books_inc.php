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

header("Location: update_books.php?output=empty");
}
else{

for($i=0;$i<$books_quantity;$i++){
  mysqli_query($conn,"Insert into add_books(ssid, books_name,books_author_name,Edition, books_price,books_publication_name,books_purchase_date,books_qty,available_qty,librarian_username) values('$ssid','$books_name','$authorname','$edition','$books_price','$publication_name','$purchase_date','$books_quantity','$available_quantity','$username')");

  $ssid = $ssid+1;

}
//$sql = "insert into update_books (books_name, total_quantity, available_qty) values //('$books_name','$books_quantity','$available_quantity')";
//mysqli_query($conn,$sql);


$sql2 = "select * from update_books where books_name = '$books_name'";
$result = mysqli_query($conn,$sql2);
$row = mysqli_fetch_assoc($result);
$latest_qty = $row['total_quantity'];
$latest_ava_qty = $row['available_qty'];

$new_qty = $latest_qty + $books_quantity;
$new_ava_qty = $latest_ava_qty + $available_quantity;

$sql4 = "select * from books_edition_info where edition = '$edition'";
$result4 = mysqli_query($conn,$sql4);
$row4 = mysqli_fetch_assoc($result4);
$total_books_with_edition = $row4['total_books'];
$total_added_books_with_edition = $total_books_with_edition + $books_quantity;
if(mysqli_num_rows($result4)==null){
$sql5 = "insert into books_edition_info (books_name, edition, total_books, price) values ('$books_name','$edition','$books_quantity','$books_price')";
mysqli_query($conn, $sql5);
}
else{
  $sql6 = "update books_edition_info set total_books = '$total_added_books_with_edition' where edition = '$edition'";
  mysqli_query($conn, $sql6);
}


$sql = "update update_books set total_quantity = '$new_qty' where books_name = '$books_name'";
mysqli_query($conn,$sql);

$sql3 = "update update_books set available_qty = '$new_ava_qty' where books_name = '$books_name'";
mysqli_query($conn,$sql3);


//$sql5 = "update books_edition_info set total_books =   "

header("Location: update_books.php?output=success");
}
}

?>
