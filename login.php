<?php
session_start();
mysqli_report(MYSQLI_REPORT_OFF);
$host = "localhost";
$user = "root";
$password = 'hellodavid';
$db_name = "inventorymanagement";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Connection failed. Please try again later.");
}

$email = $_POST['email'];
$user_password = $_POST['password'];

$sql = "select * from user where email = '$email'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1 && password_verify($user_password, $row['password'])) {
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $row['email'];
    header("Location: table.php");
    exit();
} else {
    echo "<h1> Login Failed.</h1>";
}
?>