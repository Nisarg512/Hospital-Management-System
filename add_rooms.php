<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'myhmsdb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];

    $query = "INSERT INTO rooms (room_number, room_type) VALUES ('$room_number', '$room_type')";

    if ($conn->query($query) === TRUE) {
        echo "New room added successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
