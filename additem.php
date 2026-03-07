<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.html");
    exit();
}
mysqli_report(MYSQLI_REPORT_OFF);
$item_name = "";
$item_price = "";

$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
  die("Connection failed. Please try again later.");
}

if (isset($_POST['add'])) {
  echo "connect";
  $item_name = $_POST['product_name'];
  $item_price = $_POST['price'];
  $quant = $_POST['quant'];

  $stmt = mysqli_prepare($db, "INSERT INTO product (product_name,price,quantity) VALUES(?,?,?)");
  mysqli_stmt_bind_param($stmt, "sss", $item_name, $item_price, $quant);
  if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Successfully stored');</script>";

  } else {
    echo "<script>alert('Somthing wrong!!!');</script>";
  }

  require('./table.php');

}
?>