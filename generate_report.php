<?php
include 'db_connection.php';

// Get the number of expiring items (next 30 days)
$expiring_query = "SELECT COUNT(*) AS count FROM inventory WHERE expiration_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)";
$expiring_result = mysqli_query($conn, $expiring_query);
$expiring_data = mysqli_fetch_assoc($expiring_result);

// Get the total number of items in inventory
$total_query = "SELECT COUNT(*) AS count FROM inventory";
$total_result = mysqli_query($conn, $total_query);
$total_data = mysqli_fetch_assoc($total_result);

// Get the critical stock (low quantity items)
$critical_query = "SELECT COUNT(*) AS count FROM inventory WHERE quantity < 5";
$critical_result = mysqli_query($conn, $critical_query);
$critical_data = mysqli_fetch_assoc($critical_result);

// Return the results as JSON
echo json_encode([
    'expiring_items' => $expiring_data['count'],
    'total_items' => $total_data['count'],
    'critical_stock' => $critical_data['count']
]);
?>
