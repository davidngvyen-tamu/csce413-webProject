<?php
mysqli_report(MYSQLI_REPORT_OFF);
$db = mysqli_connect('localhost', 'root', 'hellodavid', 'inventorymanagement');
if (mysqli_connect_errno()) {
    die("Connection failed. Please try again later.");
}
?>



