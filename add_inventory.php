<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'myhmsdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST['item_name'];
    $item_code = $_POST['item_code'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    $expiration_date = $_POST['expiration_date'];
    $supplier = $_POST['supplier'];

    $query = "INSERT INTO inventory (item_name, item_code, category, quantity, unit_price, expiration_date, supplier)
              VALUES ('$item_name', '$item_code', '$category', '$quantity', '$unit_price', '$expiration_date', '$supplier')";

    if ($conn->query($query) === TRUE) {
        echo "New inventory item added successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
