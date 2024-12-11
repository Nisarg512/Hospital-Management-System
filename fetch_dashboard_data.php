<?php
// Include the database connection file
include('db_connection.php');

// Initialize the data array
$dashboardData = [];

// **1. Total Patients**
$query = "SELECT COUNT(*) AS totalPatients FROM patreg";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$dashboardData['totalPatients'] = $data['totalPatients'];

// **2. Total Appointments**
$query = "SELECT COUNT(*) AS totalAppointments FROM appointmenttb";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$dashboardData['totalAppointments'] = $data['totalAppointments'];

// **3. Total Revenue (Paid)**
$query = "SELECT SUM(docFees) AS paidRevenue FROM appointmenttb WHERE payment_status = 'Paid'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$dashboardData['paidRevenue'] = $data['paidRevenue'];

// **4. Total Revenue (Unpaid)**
$query = "SELECT SUM(docFees) AS unpaidRevenue FROM appointmenttb WHERE payment_status = 'Pending'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$dashboardData['unpaidRevenue'] = $data['unpaidRevenue'];

// **5. Total Revenue (Combined)**
$dashboardData['totalRevenue'] = $dashboardData['paidRevenue'] + $dashboardData['unpaidRevenue'];

// **6. Payment Status (Paid vs Unpaid)**
$query = "SELECT COUNT(*) AS paidAppointments FROM appointmenttb WHERE payment_status = 'Paid'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$dashboardData['paidAppointments'] = $data['paidAppointments'];

$query = "SELECT COUNT(*) AS unpaidAppointments FROM appointmenttb WHERE payment_status = 'Pending'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$dashboardData['unpaidAppointments'] = $data['unpaidAppointments'];

// **7. Revenue by Doctor**
$query = "SELECT doctor, SUM(docFees) AS totalRevenue FROM appointmenttb GROUP BY doctor";
$result = mysqli_query($conn, $query);
$doctorNames = [];
$doctorRevenues = [];
while ($data = mysqli_fetch_assoc($result)) {
    $doctorNames[] = $data['doctor'];
    $doctorRevenues[] = $data['totalRevenue'];
}
$dashboardData['doctorNames'] = $doctorNames;
$dashboardData['doctorRevenues'] = $doctorRevenues;

// **8. Appointment Trends (Per Date)**
$query = "SELECT DATE(appdate) AS date, COUNT(*) AS appointmentCount FROM appointmenttb GROUP BY DATE(appdate)";
$result = mysqli_query($conn, $query);
$appointmentDates = [];
$appointmentCounts = [];
while ($data = mysqli_fetch_assoc($result)) {
    $appointmentDates[] = $data['date'];
    $appointmentCounts[] = $data['appointmentCount'];
}
$dashboardData['appointmentDates'] = $appointmentDates;
$dashboardData['appointmentCounts'] = $appointmentCounts;

// **9. Room and Bed Usage (Placeholder)**
$dashboardData['roomBedUsage'] = "<tr><td>Room 1</td><td>5</td><td>10</td></tr><tr><td>Room 2</td><td>3</td><td>7</td></tr>";

// **10. Gender Distribution**
$query = "SELECT gender, COUNT(*) AS genderCount FROM patreg GROUP BY gender";
$result = mysqli_query($conn, $query);
$genderDistribution = '';
while ($data = mysqli_fetch_assoc($result)) {
    $genderDistribution .= "<tr><td>{$data['gender']}</td><td>{$data['genderCount']}</td></tr>";
}
$dashboardData['genderDistribution'] = $genderDistribution;

// **11. Most Visited Doctors**
$query = "SELECT doctor, COUNT(*) AS visitCount FROM appointmenttb GROUP BY doctor ORDER BY visitCount DESC LIMIT 5";
$result = mysqli_query($conn, $query);
$mostVisitedDoctors = '';
while ($data = mysqli_fetch_assoc($result)) {
    $mostVisitedDoctors .= "<tr><td>{$data['doctor']}</td><td>{$data['visitCount']}</td></tr>";
}
$dashboardData['mostVisitedDoctors'] = $mostVisitedDoctors;

// Output the data as JSON for front-end consumption
echo json_encode($dashboardData);
?>
