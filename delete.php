<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.html");
    exit();
}
mysqli_report(MYSQLI_REPORT_OFF);
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno()) {
    die("Connection failed. Please try again later.");
}
?>
<?php

if (isset($_GET['id']) && is_numeric($_GET['id']) && (int)$_GET['id'] > 0) {
    $id = (int)$_GET['id'];
    $stmt = mysqli_prepare($db, "DELETE FROM product WHERE product_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}
header("Location: table.php");
exit();

?>