<?php
// Start the session
session_start();

// Ensure the patient is logged in
if (!isset($_SESSION['pid'])) {
    die("Unauthorized access");
}

// Get logged-in patient's pid and appointment_id
$pid = $_SESSION['pid'];  // Patient ID from the session
$appointment_id = isset($_GET['appointment_id']) ? $_GET['appointment_id'] : 0;  // Ensure appointment_id is passed

// Check if appointment_id is valid
if ($appointment_id <= 0) {
    die("Invalid appointment.");
}

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'myhmsdb');

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query to fetch the chat messages only for the logged-in patient and the specified appointment_id
$sql = "SELECT sender, message, timestamp FROM chat 
        WHERE appointment_id = ? AND (sender = ? OR sender = 'Doctor')
        ORDER BY timestamp DESC";

// Prepare and bind
$stmt = $conn->prepare($sql);
$patientName = $_SESSION['fname'] . ' ' . $_SESSION['lname'];  // Full name of the logged-in patient
$stmt->bind_param("is", $appointment_id, $patientName);  // Bind parameters (appointment_id, patientName)

// Execute query
$stmt->execute();
$result = $stmt->get_result();

// Check if messages are found
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display each message
        echo "<div class='message " . ($row['sender'] == $patientName ? 'patient' : 'doctor') . "'>";
        echo "<div>" . htmlspecialchars($row['message']) . "</div>";
        echo "<div class='timestamp'>" . $row['timestamp'] . "</div>";
        echo "</div>";
    }
} else {
    echo "No messages found.";
}

// Close connection
$stmt->close();
$conn->close();
?>
