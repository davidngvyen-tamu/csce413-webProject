<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.html");
    exit();
}
mysqli_report(MYSQLI_REPORT_OFF);
$db = mysqli_connect('localhost', 'root', 'hellodavid', 'inventorymanagement');
if (mysqli_connect_errno()) {
    die("Connection failed. Please try again later.");
}
?>
<?php

if (isset($_GET['id'])) {

    $result = mysqli_query($db, "DELETE FROM product WHERE product_id=" . $_GET['id']);
    if ($result == true)
        echo "sucess";
    header("Location:table.php");
}

?>