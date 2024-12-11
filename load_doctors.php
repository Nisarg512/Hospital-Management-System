<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myhmsdb"; // Use your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch doctors' usernames
$sql = "SELECT username FROM doctb";  // Only username field available
$result = $conn->query($sql);

// Initialize an array to store doctor data
$doctors = [];

if ($result->num_rows > 0) {
    // Loop through the result set and push each doctor's username to the array
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }
} else {
    echo "No doctors found.";
}

// Return the doctor list as JSON
echo json_encode($doctors);

$conn->close();
?>
