<?php
$conn = new mysqli("localhost", "root", "", "myhmsdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM inventory LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$items = [];
while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}

$sqlTotal = "SELECT COUNT(id) AS total FROM inventory";
$totalResult = $conn->query($sqlTotal);
$totalRow = $totalResult->fetch_assoc();
$totalItems = $totalRow['total'];

echo json_encode([
    'items' => $items,
    'totalItems' => $totalItems
]);

$conn->close();
?>
