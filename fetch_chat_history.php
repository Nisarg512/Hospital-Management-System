<?php
session_start();
include('func.php');
include('newfunc.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION['pid']) && isset($_SESSION['username']) && isset($_GET['doctor'])) {
    $pid = $_SESSION['pid'];
    $username = $_SESSION['username'];
    $doctor = $_GET['doctor']; // Get doctor from query string

    fetch_chat_history($con, $pid, $doctor);
}
?>
