<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'myhmsdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $bed_number = mysqli_real_escape_string($conn, $_POST['bed_number']);
    $room_number = mysqli_real_escape_string($conn, $_POST['room_number']);
    $patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);

    // Prepare the query to prevent SQL injection
    $query = $conn->prepare("INSERT INTO beds (bed_number, room_number, patient_name) VALUES (?, ?, ?)");
    $query->bind_param("sss", $bed_number, $room_number, $patient_name);

    // Execute the query
    if ($query->execute()) {
        // Redirect to the main page or wherever you'd like after successful insertion
        header("Location: inventory.php"); // Update with your actual page
        exit();
    } else {
        echo "Error: " . $query->error;
    }

    // Close the prepared statement and connection
    $query->close();
}

$conn->close();
?>
