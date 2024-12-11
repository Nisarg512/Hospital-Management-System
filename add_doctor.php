<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="style2.css">
  </head>
  
  <style type="text/css">
    #addDoctorBtn:hover { cursor: pointer; }
    .add-doctor-card { background: #f8f9fa; border-radius: 5%; }
    .add-doctor-form-row { display: flex; justify-content: space-between; }
    .add-doctor-form-col { width: 48%; }
  </style>

  <body style="background: -webkit-linear-gradient(left, #3931af, #00c6ff); background-size: cover;">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php" style="margin-top: 10px; margin-left: -65px; font-family: 'IBM Plex Sans', sans-serif;">
          <h4><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp GLOBAL HOSPITALS</h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" style="margin-right: 40px;">
              <a class="nav-link js-scroll-trigger" href="index.php" style="color: white; font-family: 'IBM Plex Sans', sans-serif;">
                <h6>HOME</h6>
              </a>
            </li>
            <li class="nav-item" style="margin-right: 40px;">
              <a class="nav-link js-scroll-trigger" href="services.html" style="color: white; font-family: 'IBM Plex Sans', sans-serif;">
                <h6>ABOUT US</h6>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="contact.html" style="color: white; font-family: 'IBM Plex Sans', sans-serif;">
                <h6>CONTACT</h6>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid" style="margin-top: 60px; margin-bottom: 60px; color: #34495E;">
      <div class="row">
        <div class="col-md-7" style="padding-left: 180px;">
          <div style="-webkit-animation: mover 2s infinite alternate; animation: mover 1s infinite alternate;">
            <img src="images/ambulance1.png" alt="" style="width: 20%; padding-left: 40px; margin-top: 150px; margin-left: 45px; margin-bottom: 15px">
          </div>
          <div style="color: white;">
            <h4 style="font-family: 'IBM Plex Sans', sans-serif;">We are here for you!</h4>
          </div>
        </div>

        <!-- Add Doctor Form -->
        <div class="col-md-4" style="margin-top: 5%; right: 8%;">
          <div class="add-doctor-card" style="font-family: 'IBM Plex Sans', sans-serif;">
            <div class="card-body">
              <center>
                <i class="fa fa-hospital-o fa-3x" aria-hidden="true" style="color:#0062cc"></i>
                <br>
                <h3 style="margin-top: 10%">Add Doctor</h3><br>
              </center>
              <form class="form-group add-doctor-form" method="POST" action="">
                <div class="add-doctor-form-row">
                  <div class="add-doctor-form-col">
                    <label for="doc_name">Doctor Name:</label>
                    <input type="text" name="doc_name" class="form-control" placeholder="Enter Doctor Name" required>
                  </div>
                  <div class="add-doctor-form-col">
                    <label for="doc_password">Password:</label>
                    <input type="password" name="doc_password" class="form-control" placeholder="Enter Password" required>
                  </div>
                </div>
                <div class="add-doctor-form-row">
                  <div class="add-doctor-form-col">
                    <label for="doc_spec">Specialization:</label>
                    <select name="doc_spec" class="form-control" required>
                      <option value="" disabled selected>Select Specialization</option>
                      <?php
                      // Fetch specialization options from the database
                      $conn = new mysqli('localhost', 'root', '', 'myhmsdb');
                      if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                      }
                      $sql = "SELECT specialization FROM spectb";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                              echo '<option value="'.$row['specialization'].'">'.$row['specialization'].'</option>';
                          }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="add-doctor-form-col">
                    <label for="doc_confirm_password">Confirm Password:</label>
                    <input type="password" id="doc_confirm_password" class="form-control" placeholder="Confirm Password" required>
                  </div>
                </div>
                <div class="add-doctor-form-row">
                  <div class="add-doctor-form-col">
                    <label for="doc_email">Email ID:</label>
                    <input type="email" name="doc_email" class="form-control" placeholder="Enter Email ID" required>
                  </div>
                  <div class="add-doctor-form-col">
                    <label for="doc_fees">Consultancy Fees:</label>
                    <input type="number" name="doc_fees" class="form-control" placeholder="Enter Fees" required>
                  </div>
                </div>
                <button type="submit" id="addDoctorBtn" name="add_doctor" class="btn btn-primary" style="margin-top: 10%;">Add Doctor</button>
              </form>
            </div>
          </div>
        </div>

        <!-- PHP Code for Adding Doctor -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $doc_name = $_POST['doc_name'];
            $doc_password = $_POST['doc_password'];
            $doc_email = $_POST['doc_email'];
            $doc_spec = $_POST['doc_spec'];
            $doc_fees = $_POST['doc_fees'];
            $status = 'pending';  // Automatically setting status to 'approved'

            if (!filter_var($doc_email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Invalid email format.');</script>";
            } elseif (empty($doc_spec)) {
                echo "<script>alert('Please select a specialization.');</script>";
            } else {
                // Insert data into doctb table with status
                $query = "INSERT INTO doctb (username, password, email, spec, docFees, status) 
                          VALUES ('$doc_name', '$doc_password', '$doc_email', '$doc_spec', '$doc_fees', '$status')";

                if ($conn->query($query) === TRUE) {
                    echo "<script>alert('Doctor added successfully!');</script>";
                } else {
                    echo "Error: " . $conn->error;
                }
            }
        }
        $conn->close();
        ?>

      </div>
    </div>

    <!-- Optional JavaScript -->
    <script>
        // Ensure password and confirm password match
        const addDoctorForm = document.querySelector('.add-doctor-form');
        addDoctorForm.addEventListener('submit', function (e) {
            const password = document.querySelector('input[name="doc_password"]').value;
            const confirm_password = document.getElementById('doc_confirm_password').value;

            if (password !== confirm_password) {
                e.preventDefault();
                alert("Passwords do not match!");
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
