<?php
// view_inventory.php
$conn = new mysqli('localhost', 'root', '', 'myhmsdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch inventory items
$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['item_name']}</td>
                <td>{$row['item_code']}</td>
                <td>{$row['category']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['unit_price']}</td>
                <td>{$row['total_value']}</td>
                <td>{$row['expiration_date']}</td>
                <td>{$row['supplier']}</td>
                <td><a href='update_item.php?id={$row['id']}'>Update</a> | <a href='delete_item.php?id={$row['id']}'>Delete</a></td>
              </tr>";
    }
} else {
    echo "No items found.";
}

$conn->close();
?>
