<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'myhmsdb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM rooms WHERE id=$id";

    if ($conn->query($query) === TRUE) {
        echo "Room deleted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
