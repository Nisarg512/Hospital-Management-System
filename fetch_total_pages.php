<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
global $con;

// Set the number of results per page
$results_per_page = 10;

// Query to count the total number of appointments
$query = "SELECT COUNT(ID) AS total FROM appointmenttb";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

// Calculate total number of pages
$total_records = $row['total'];
$total_pages = ceil($total_records / $results_per_page);

// Output the total number of pages
echo $total_pages;
?>
