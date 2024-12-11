<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming session has 'appointment_id' stored
$appointment_id = $_SESSION['appointment_id']; // Get the appointment ID from session

// Fetch messages for the current appointment
$query = "SELECT sender, message, timestamp FROM chat WHERE appointment_id = '$appointment_id' ORDER BY timestamp DESC";
$result = mysqli_query($con, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='message'><strong>" . htmlspecialchars($row['sender']) . ":</strong> " . htmlspecialchars($row['message']) . " <small>[" . $row['timestamp'] . "]</small></div>";
    }
} else {
    echo "No messages yet.";
}

mysqli_close($con);
?>
