<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipment_id = $_POST['equipment_id'];
    $status = $_POST['status'];

    $sql = "UPDATE equipment SET status='$status' WHERE equipment_id='$equipment_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php?status=success&message=Equipment+status+updated");
    } else {
        header("Location: dashboard.php?status=error&message=Error+updating+equipment");
    }
}
?>
