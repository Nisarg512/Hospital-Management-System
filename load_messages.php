<?php
// Start the session to access patient session variables
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

// Fetch the patient's full name from session
$patientName = $_SESSION['fname'] . ' ' . $_SESSION['lname'];  // Concatenate first and last name
$doctor = $_GET['doctor'];  // Get the selected doctor's username from the URL

// Query to fetch messages where the patient is either the sender or receiver, and the doctor is either the sender or receiver
$sql = "SELECT *, 
               CASE 
                   WHEN sender = '$patientName' THEN 'patient' 
                   WHEN sender = '$doctor' THEN 'doctor' 
               END AS sender_type 
        FROM chat 
        WHERE (sender = '$patientName' OR sender = '$doctor') 
        AND (doctor = '$patientName' OR doctor = '$doctor') 
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
    $messages = ["message" => "No messages found."];
}

// Return the messages as a JSON response
echo json_encode($messages);

$conn->close();
?>
