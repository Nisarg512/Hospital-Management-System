<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'myhmsdb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $bed_number = $_POST['bed_number'];
    $room_number = $_POST['room_number'];
    $patient_name = $_POST['patient_name'];

    $query = "UPDATE beds SET bed_number='$bed_number', room_number='$room_number', patient_name='$patient_name'
              WHERE id=$id";

    if ($conn->query($query) === TRUE) {
        echo "Bed updated successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
