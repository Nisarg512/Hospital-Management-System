<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Report Dashboard</title>
    <!-- Bootstrap CSS for layout and styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js for visualizations -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Custom styles for the dashboard */
        .card { margin-bottom: 20px; }
        .chart-container { width: 100%; height: 250px; /* Reduced height for smaller charts */ }
        .btn-dashboard { margin-top: 20px; }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center mb-4">Hospital Report Dashboard</h2>
    
    <!-- Total Patients, Appointments, and Revenue -->
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Patients</h5>
                    <p class="card-text" id="totalPatients">Loading...</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Appointments</h5>
                    <p class="card-text" id="totalAppointments">Loading...</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Revenue</h5>
                    <p class="card-text" id="totalRevenue">Loading...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Statistics (Pie chart) -->
    <div class="row">
        <div class="col-md-6">
            <h4>Payment Status</h4>
            <div class="chart-container">
                <canvas id="paymentStatusChart"></canvas>
            </div>
        </div>

        <!-- Revenue by Doctor (Bar chart) -->
        <div class="col-md-6">
            <h4>Revenue by Doctor</h4>
            <div class="chart-container">
                <canvas id="doctorRevenueChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Appointment Trends (Line chart) -->
    <div class="row">
        <div class="col-md-12">
            <h4>Appointment Trends</h4>
            <div class="chart-container">
                <canvas id="appointmentTrendChart"></canvas>
            </div>
        </div>
    </div>

    
    <!-- Gender Distribution and Most Visited Doctors (Table) -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h4>Gender Distribution of Patients</h4>
            <table class="table table-bordered" id="genderDistributionTable">
                <!-- Data will be dynamically inserted using PHP -->
            </table>
        </div>
        <div class="col-md-6">
            <h4>Most Visited Doctors</h4>
            <table class="table table-bordered" id="mostVisitedDoctorsTable">
                <!-- Data will be dynamically inserted using PHP -->
            </table>
        </div>
    </div>

    <!-- Dashboard Button to redirect to admin-panel1.php -->
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="admin-panel1.php" class="btn btn-primary btn-dashboard">Go to Admin Panel</a>
        </div>
    </div>
</div>

<!-- JS to render charts and load data dynamically -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Fetch the data from PHP (AJAX)
        $.ajax({
            url: "fetch_dashboard_data.php", 
            method: "GET",
            success: function(data) {
                let dashboardData = JSON.parse(data);
                // Update the dashboard with the fetched data
                $('#totalPatients').text(dashboardData.totalPatients);
                $('#totalAppointments').text(dashboardData.totalAppointments);
                $('#totalRevenue').text('₹' + dashboardData.paidRevenue + ' (Paid), ₹' + dashboardData.unpaidRevenue + ' (Unpaid)');

                // Update the charts
                new Chart(document.getElementById('paymentStatusChart').getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: ['Paid', 'Unpaid'],
                        datasets: [{
                            data: [dashboardData.paidAppointments, dashboardData.unpaidAppointments],
                            backgroundColor: ['#28a745', '#dc3545']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

                new Chart(document.getElementById('doctorRevenueChart').getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: dashboardData.doctorNames,
                        datasets: [{
                            label: 'Revenue',
                            data: dashboardData.doctorRevenues,
                            backgroundColor: '#007bff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

                new Chart(document.getElementById('appointmentTrendChart').getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: dashboardData.appointmentDates,
                        datasets: [{
                            label: 'Appointments',
                            data: dashboardData.appointmentCounts,
                            borderColor: '#28a745',
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

                // Insert the room and bed usage table data
                $('#roomBedUsage').html(dashboardData.roomBedUsage);

                // Insert the gender distribution table data
                $('#genderDistributionTable').html(dashboardData.genderDistribution);

                // Insert the most visited doctors table data
                $('#mostVisitedDoctorsTable').html(dashboardData.mostVisitedDoctors);
            }
        });
    });
</script>
</body>
</html>
