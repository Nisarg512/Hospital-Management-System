<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'myhmsdb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $item_code = $_POST['item_code'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    $expiration_date = $_POST['expiration_date'];
    $supplier = $_POST['supplier'];

    $query = "UPDATE inventory SET item_name='$item_name', item_code='$item_code', category='$category',
              quantity='$quantity', unit_price='$unit_price', expiration_date='$expiration_date', supplier='$supplier'
              WHERE id=$id";

    if ($conn->query($query) === TRUE) {
        echo "Inventory item updated successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
