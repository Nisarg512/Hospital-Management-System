<?php
// load_patients.php

// Database connection
$conn = new mysqli("localhost", "root", "", "myhmsdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the list of patients
$query = "SELECT pid, fname, lname FROM patreg";  // Adjust this query if the patient table name or structure is different
$result = $conn->query($query);

$patients = [];

while ($row = $result->fetch_assoc()) {
    $patients[] = $row;
}

echo json_encode($patients);

$conn->close();
?>
