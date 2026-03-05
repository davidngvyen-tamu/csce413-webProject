<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.html");
    exit();
}
require_once(__DIR__ . '/env_loader.php');
mysqli_report(MYSQLI_REPORT_OFF);
$db = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
if (mysqli_connect_errno()) {
    die("Connection failed. Please try again later.");
}
?>



