<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.html");
    exit();
}
mysqli_report(MYSQLI_REPORT_OFF);
$item_name = "";
$item_price = "";

$db = mysqli_connect('db', 'root', 'root', 'inventorymanagement');
if (mysqli_connect_errno()) {
  die("Connection failed. Please try again later.");
}

if (isset($_POST['add'])) {
  echo "connect";
  $item_name = mysqli_real_escape_string($db, $_POST['product_name']);
  $item_price = mysqli_real_escape_string($db, $_POST['price']);
  $quant = mysqli_real_escape_string($db, $_POST['quant']);

  $query = "INSERT INTO product (product_name,price,quantity) 
  			  VALUES('$item_name','$item_price','$quant')";
  if (mysqli_query($db, $query)) {
    echo "<script>alert('Successfully stored');</script>";

  } else {
    echo "<script>alert('Somthing wrong!!!');</script>";
  }

  require('./table.php');

}
?>