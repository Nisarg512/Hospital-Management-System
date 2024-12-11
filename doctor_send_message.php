<?php
session_start();

// Database connection
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check if the doctor is logged in
if (!isset($_SESSION['dname'])) {
    die("Doctor is not logged in.");
}

// Check if the required parameters are posted
if (isset($_POST['patient_name'], $_POST['message'], $_POST['appointment_id'])) {
    $doctor_name = $_SESSION['dname'];  // Get doctor's name from session
    $patient_name = $_POST['patient_name'];  // Get patient name from the form
    $message = $_POST['message'];  // Get the message
    $appointment_id = $_POST['appointment_id'];  // Get the appointment ID

    // Insert the message into the chat table
    $sql = "INSERT INTO chat (appointment_id, sender, message, doctor) 
            VALUES ('$appointment_id', '$doctor_name', '$message', '$patient_name')";

    if (mysqli_query($con, $sql)) {
        echo "Message sent successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Error: Missing required fields.";
}
?>
