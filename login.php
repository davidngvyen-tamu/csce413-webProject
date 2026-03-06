<?php
session_start();
mysqli_report(MYSQLI_REPORT_OFF);

$con = mysqli_connect('db', 'root', 'root', 'inventorymanagement');
if (mysqli_connect_errno()) {
    die("Connection failed. Please try again later.");
}

$email = $_POST['email'];
$user_password = $_POST['password'];

$stmt = mysqli_prepare($con, "SELECT * FROM user WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
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