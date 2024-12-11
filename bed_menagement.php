<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bed_id = $_POST['bed_id'];
    $status = $_POST['status'];
    $patient_name = $_POST['patient_name'];

    if ($status == "Occupied") {
        $sql = "UPDATE beds SET status='Available', patient_name='' WHERE bed_id='$bed_id'";
    } else {
        $sql = "UPDATE beds SET status='Occupied', patient_name='$patient_name' WHERE bed_id='$bed_id'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php?status=success&message=Bed+status+updated");
    } else {
        header("Location: dashboard.php?status=error&message=Error+updating+bed");
    }
}
?>
