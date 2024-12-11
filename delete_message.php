<?php
session_start();
include('func.php');
include('newfunc.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['message_id'])) {
    $message_id = $_POST['message_id'];

    // Delete the message from the database
    $delete_query = "DELETE FROM chat WHERE id = ?";
    $stmt = $con->prepare($delete_query);
    $stmt->bind_param('i', $message_id);
    $stmt->execute();
    $stmt->close();
}
?>
