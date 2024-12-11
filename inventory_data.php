<?php
$servername = "localhost";
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "myhmsdb"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM inventory"; // Change this to your actual table
$result = $conn->query($sql);

$inventory = [];
$summary = ['Medicines' => 0, 'Equipment' => 0, 'Supplies' => 0];

while ($row = $result->fetch_assoc()) {
    $inventory[] = $row;
    $summary[$row['category']] += $row['quantity']; // Counting quantity by category
}

echo json_encode(['items' => $inventory, 'summary' => $summary]);

$conn->close();
?>
