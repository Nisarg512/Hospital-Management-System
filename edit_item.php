<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myhmsdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $item_code = $_POST['item_code'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    $expiration_date = $_POST['expiration_date'];
    $supplier = $_POST['supplier'];

    $sql = "UPDATE inventory SET 
            item_name='$item_name', 
            item_code='$item_code', 
            category='$category', 
            quantity='$quantity', 
            unit_price='$unit_price', 
            expiration_date='$expiration_date',
            supplier='$supplier' 
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Item updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header("Location: inventory_dashboard.php");
}
?>
