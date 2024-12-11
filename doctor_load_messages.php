<?php
// Start the session to access doctor session variables
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myhmsdb";  // Use your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the doctor's full name from session
$doctorName = $_SESSION['dname'];  // Doctor's name from session
$patientName = $_GET['patient'];    // Get the selected patient's name from the URL
$appointmentId = $_GET['appointment_id']; // Get the appointment ID from the URL

// Query to fetch messages where the doctor or patient is either the sender or receiver for a specific appointment ID
$sql = "SELECT *, 
               CASE 
                   WHEN sender = '$patientName' THEN 'patient' 
                   WHEN sender = '$doctorName' THEN 'doctor' 
               END AS sender_type 
        FROM chat 
        WHERE (sender = '$patientName' OR sender = '$doctorName') 
        AND (doctor = '$patientName' OR doctor = '$doctorName') 
        AND appointment_id = '$appointmentId'
        ORDER BY timestamp ASC";

$result = $conn->query($sql);

$messages = [];

if ($result->num_rows > 0) {
    // Fetch all messages into an array
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
} else {
    // If no messages are found, return a message indicating that
    $messages = [["message" => "No messages found."]];
}

// Return the messages as a JSON response
echo json_encode($messages);

// Close the database connection
$conn->close();
?>
