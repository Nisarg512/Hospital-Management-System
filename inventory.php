<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'myhmsdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inventory operations
if (isset($_POST['add_item'])) {
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
        header("Location: inventory.php"); // Reload the page after adding
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

if (isset($_POST['edit_item'])) {
    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $item_code = $_POST['item_code'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    $expiration_date = $_POST['expiration_date'];
    $supplier = $_POST['supplier'];

    $query = "UPDATE inventory SET item_name='$item_name', item_code='$item_code', category='$category', quantity='$quantity', 
              unit_price='$unit_price', expiration_date='$expiration_date', supplier='$supplier' 
              WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        header("Location: inventory.php"); // Reload the page after editing
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete_item'])) {
    $id = $_GET['delete_item'];
    $query = "DELETE FROM inventory WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        header("Location: inventory.php"); // Reload the page after deleting
    } else {
        echo "Error: " . $conn->error;
    }
}

// Bed operations
if (isset($_POST['add_bed'])) {
    $bed_number = $_POST['bed_number'];
    $room_number = $_POST['room_number'];
    $patient_name = $_POST['patient_name'];
    $status = $_POST['status'];

    $query = "INSERT INTO beds (bed_number, room_number, patient_name, status) 
              VALUES ('$bed_number', '$room_number', '$patient_name', '$status')";

    if ($conn->query($query) === TRUE) {
        header("Location: inventory.php"); // Reload the page after adding
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

if (isset($_POST['edit_bed'])) {
    $id = $_POST['id'];
    $bed_number = $_POST['bed_number'];
    $room_number = $_POST['room_number'];
    $patient_name = $_POST['patient_name'];
    $status = $_POST['status'];

    $query = "UPDATE beds SET bed_number='$bed_number', room_number='$room_number', patient_name='$patient_name', status='$status' 
              WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        header("Location: inventory.php"); // Reload the page after editing
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete_bed'])) {
    $id = $_GET['delete_bed'];
    $query = "DELETE FROM beds WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        header("Location: inventory.php"); // Reload the page after deleting
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch inventory items
$query_inventory = "SELECT * FROM inventory";
$result_inventory = $conn->query($query_inventory);

// Fetch bed management records
$query_beds = "SELECT * FROM beds";
$result_beds = $conn->query($query_beds);

// Bed statistics (occupied, empty, total beds)
$total_beds_query = "SELECT COUNT(*) as total_beds FROM beds";
$total_beds_result = $conn->query($total_beds_query);
$total_beds = $total_beds_result->fetch_assoc()['total_beds'];

$occupied_beds_query = "SELECT COUNT(*) as occupied_beds FROM beds WHERE status='Occupied'";
$occupied_beds_result = $conn->query($occupied_beds_query);
$occupied_beds = $occupied_beds_result->fetch_assoc()['occupied_beds'];

$empty_beds_query = "SELECT COUNT(*) as empty_beds FROM beds WHERE status='Empty'";
$empty_beds_result = $conn->query($empty_beds_query);
$empty_beds = $empty_beds_result->fetch_assoc()['empty_beds'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory & Bed Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-header {
            background-color: #5c6bc0;
            color: white;
        }
        .modal-header {
            background-color: #5c6bc0;
            color: white;
        }
        
        /* Adjust the Dashboard Button */
        #dashboardButton {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #128C7E;
            text-decoration: none;
            border-radius: 20px;
            border: 2px solid #128C7E;
            margin-right: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        #dashboardButton:hover {
            background-color: #25D366;
            color: white;
            border-color: #25D366;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

    </style>
</head>
<body>
<a href="admin-panel1.php" id="dashboardButton">Dashboard</a>
<div class="container mt-5">
    <h2>Inventory Management</h2>
    
    <!-- Add Item Button -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItemModal">Add New Item</button>

    <!-- Inventory Table -->
    <h3 class="mt-5">Inventory Items</h3>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Item Code</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Expiration Date</th>
                <th>Supplier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result_inventory->num_rows > 0): ?>
                <?php while ($row = $result_inventory->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo $row['item_code']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['unit_price']; ?></td>
                        <td><?php echo $row['expiration_date']; ?></td>
                        <td><?php echo $row['supplier']; ?></td>
                        <td>
                            <!-- Edit Button (opens edit modal) -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editItemModal<?php echo $row['id']; ?>">Edit</button>
                            <!-- Delete Button -->
                            <a href="inventory.php?delete_item=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                    <!-- Edit Item Modal -->
                    <div class="modal fade" id="editItemModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="inventory.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <div class="mb-3">
                                            <label for="item_name" class="form-label">Item Name</label>
                                            <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $row['item_name']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="item_code" class="form-label">Item Code</label>
                                            <input type="text" class="form-control" id="item_code" name="item_code" value="<?php echo $row['item_code']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <input type="text" class="form-control" id="category" name="category" value="<?php echo $row['category']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="unit_price" class="form-label">Unit Price</label>
                                            <input type="number" class="form-control" id="unit_price" name="unit_price" value="<?php echo $row['unit_price']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="expiration_date" class="form-label">Expiration Date</label>
                                            <input type="date" class="form-control" id="expiration_date" name="expiration_date" value="<?php echo $row['expiration_date']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="supplier" class="form-label">Supplier</label>
                                            <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo $row['supplier']; ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="edit_item">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="8">No records found</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Bed Dashboard -->
<div class="container mt-5">
    <h2>Bed Management</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Total Beds
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?php echo $total_beds; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Occupied Beds
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?php echo $occupied_beds; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Empty Beds
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?php echo $empty_beds; ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bed Button -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBedModal">Add Bed</button>

    <!-- Bed Table -->
    <h3 class="mt-5">Beds</h3>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Bed Number</th>
                <th>Room Number</th>
                <th>Patient Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result_beds->num_rows > 0): ?>
                <?php while ($row = $result_beds->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['bed_number']; ?></td>
                        <td><?php echo $row['room_number']; ?></td>
                        <td><?php echo $row['patient_name']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editBedModal<?php echo $row['id']; ?>">Edit</button>
                            <!-- Delete Button -->
                            <a href="inventory.php?delete_bed=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                    <!-- Edit Bed Modal -->
                    <div class="modal fade" id="editBedModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editBedModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editBedModalLabel">Edit Bed</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="inventory.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <div class="mb-3">
                                            <label for="bed_number" class="form-label">Bed Number</label>
                                            <input type="text" class="form-control" id="bed_number" name="bed_number" value="<?php echo $row['bed_number']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="room_number" class="form-label">Room Number</label>
                                            <input type="text" class="form-control" id="room_number" name="room_number" value="<?php echo $row['room_number']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="patient_name" class="form-label">Patient Name</label>
                                            <input type="text" class="form-control" id="patient_name" name="patient_name" value="<?php echo $row['patient_name']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="Occupied" <?php echo ($row['status'] == 'Occupied') ? 'selected' : ''; ?>>Occupied</option>
                                                <option value="Empty" <?php echo ($row['status'] == 'Empty') ? 'selected' : ''; ?>>Empty</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="edit_bed">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5">No records found</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Add Bed Modal -->
<div class="modal fade" id="addBedModal" tabindex="-1" aria-labelledby="addBedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBedModalLabel">Add New Bed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="inventory.php" method="POST">
                    <div class="mb-3">
                        <label for="bed_number" class="form-label">Bed Number</label>
                        <input type="text" class="form-control" id="bed_number" name="bed_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="room_number" class="form-label">Room Number</label>
                        <input type="text" class="form-control" id="room_number" name="room_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="patient_name" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" id="patient_name" name="patient_name">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Empty">Empty</option>
                            <option value="Occupied">Occupied</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_bed">Add Bed</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
