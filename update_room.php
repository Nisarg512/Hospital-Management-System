<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'myhmsdb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];

    $query = "UPDATE rooms SET room_number='$room_number', room_type='$room_type' WHERE id=$id";

    if ($conn->query($query) === TRUE) {
        echo "Room updated successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
