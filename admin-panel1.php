<!DOCTYPE html>
<?php 
$con=mysqli_connect("localhost","root","","myhmsdb");

include('newfunc.php');

if(isset($_POST['docsub']))
{
  $doctor=$_POST['doctor'];
  $dpassword=$_POST['dpassword'];
  $demail=$_POST['demail'];
  $spec=$_POST['special'];
  $docFees=$_POST['docFees'];
  $query="insert into doctb(username,password,email,spec,docFees)values('$doctor','$dpassword','$demail','$spec','$docFees')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor added successfully!');</script>";
  }
}


if(isset($_POST['docsub1']))
{
  $demail=$_POST['demail'];
  $query="delete from doctb where email='$demail';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor removed successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
}


?>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <script >
    var check = function() {
  if (document.getElementById('dpassword').value ==
    document.getElementById('cdpassword').value) {
    document.getElementById('message').style.color = '#5dd05d';
    document.getElementById('message').innerHTML = 'Matched';
  } else {
    document.getElementById('message').style.color = '#f55252';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
}

    function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 32);
};
  </script>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}

.col-md-4{
  max-width:20% !important;
}

.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #342ac1;
    border-color: #007bff;
}
.text-primary {
    color: #342ac1!important;
}

#cpass {
  display: -webkit-box;
}

#list-app{
  font-size:15px;
}

.btn-primary{
  background-color: #3c50c1;
  border-color: #3c50c1;
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

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
  </div>
</nav>
<head>
  <script src="script.js"></script>
</head>
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family: 'IBM Plex Sans', sans-serif;"> WELCOME RECEPTIONIST </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-doc" id="list-doc-list"  role="tab"    aria-controls="home" data-toggle="list">Doctor List</a>
      <a class="list-group-item list-group-item-action" href="#list-pat" id="list-pat-list"  role="tab" data-toggle="list" aria-controls="home">Patient List</a>
      <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list"  role="tab" data-toggle="list" aria-controls="home">Appointment Details</a>
      <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list"  role="tab" data-toggle="list" aria-controls="home">Prescription List</a>
      <a class="list-group-item list-group-item-action" href="#list-settings" id="list-adoc-list"  role="tab" data-toggle="list" aria-controls="home">Add Doctor</a>
      <a class="list-group-item list-group-item-action" href="#list-spec" id="list-spec-list"  role="tab" data-toggle="list" aria-controls="home">Add Specialization</a>
      <a class="list-group-item list-group-item-action" href="#list-mes" id="list-mes-list"  role="tab" data-toggle="list" aria-controls="home">Queries</a>
      <a class="list-group-item list-group-item-action" href="inventory.php" role="tab">Bed & Inventory</a>
      <a class="list-group-item list-group-item-action" href="report.php" role="tab">Report</a>

      
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">



      <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        <div class="container-fluid container-fullw bg-white" >
              <div class="row">
               <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Doctor List</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script> 
                      <p class="links cl-effect-1">
                        <a href="#list-doc" onclick="clickDiv('#list-doc-list')">
                          View Doctors
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: -3%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Patient List</h4>
                      
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-pat-list')">
                          View Patients
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              

                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Appointment Details</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-app-list')">
                          View Appointments
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-4" style="left: 13%;margin-top: 5%;">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Prescription List</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                          View Prescriptions
                        </a>
                      </p>
                    </div>
                  </div>
                </div>


                <div class="col-sm-4" style="left: 18%;margin-top: 5%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Doctors</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-adoc-list')">Add Doctors</a>
                        &nbsp|
                        
                      </p>
                    </div>
                  </div>
                </div>
                </div>
                        

      
                
              </div>
            </div>
      
                
      

<!-- Doctor List with Pagination and Search by Username -->
<div class="tab-pane fade" id="list-doc" role="tabpanel" aria-labelledby="list-home-list">
  <div class="col-md-8">
    <form class="form-group" action="admin-panel1.php#list-doc" method="post">
      <div class="row">
        <div class="col-md-10">
          <input type="text" name="search_username" placeholder="Search by Username" class="form-control">
        </div>
        <div class="col-md-2">
          <input type="submit" name="doctor_search_submit" class="btn btn-primary" value="Search">
        </div>
      </div>
    </form>
  </div>

  <?php
  // Database connection
  $conn = new mysqli('localhost', 'root', '', 'myhmsdb');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Fetch specializations from spectb table
  $specialization_query = "SELECT * FROM spectb";
  $specialization_result = $conn->query($specialization_query);
  $specializations = array();
  while ($row = $specialization_result->fetch_assoc()) {
    $specializations[] = $row['specialization'];
  }

  // Pagination settings: show 2 specializations per page
  $items_per_page = 2;
  $total_specializations = count($specializations);
  $total_pages = ceil($total_specializations / $items_per_page);

  // Get current page, default to 1
  $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
  $current_page = max(1, min($current_page, $total_pages));

  // Offset for SQL query
  $offset = ($current_page - 1) * $items_per_page;

  // Slice the specializations array for current page
  $specializations_to_display = array_slice($specializations, $offset, $items_per_page);

  // Handle approval or rejection
  if (isset($_POST['action']) && isset($_POST['email'])) {
    $action = $_POST['action'];
    $email = $_POST['email'];

    // Set the status based on action
    $status = $action === 'approve' ? 'approved' : ($action === 'reject' ? 'rejected' : 'pending');

    // Update the doctor status in the database based on email
    $update_query = "UPDATE doctb SET status='$status' WHERE email='$email'";
    if ($conn->query($update_query) === TRUE) {
      echo "Status updated successfully!";
    } else {
      echo "Error updating status: " . $conn->error;
    }
  }

  // Handle deletion
  if (isset($_POST['delete']) && isset($_POST['specialization']) && isset($_POST['selected_doctors'])) {
    $selected_doctors = $_POST['selected_doctors'];
    foreach ($selected_doctors as $email) {
      // Delete the selected doctor from the database
      $delete_query = "DELETE FROM doctb WHERE email='$email'";
      $conn->query($delete_query);
    }
  }

  // Handle search by username
  $search_username = isset($_POST['search_username']) ? $_POST['search_username'] : '';

  ?>

  <h2>Doctor List</h2>

  <?php foreach ($specializations_to_display as $specialization) { ?>
    <h3><?php echo $specialization; ?> Specialists</h3>
    <form method="POST" action="admin-panel1.php#list-doc">
      <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
        <thead>
          <tr>
            <th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">Select</th>
            <th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">Doctor Name</th>
            <th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">Specialization</th>
            <th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">Email</th>
            <th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">Password</th>
            <th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">Fees</th>
            <th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Modify the query to filter by username if search is performed
          $query = "SELECT * FROM doctb WHERE spec = '$specialization'";

          // Apply the search filter if a username was provided
          if (!empty($search_username)) {
            $query .= " AND username LIKE '%$search_username%'";
          }

          $query .= " ORDER BY FIELD(status, 'pending', 'approved', 'rejected')";
          $result = $conn->query($query);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $username = $row['username'];
              $spec = $row['spec'];
              $email = $row['email'];
              $password = $row['password']; // Original password from database
              $docFees = $row['docFees'];
              $status = $row['status'];
          ?>
            <tr class="<?php echo $status === 'approved' ? 'approved' : ($status === 'rejected' ? 'rejected' : 'pending'); ?>" 
                style="<?php echo $status === 'approved' ? 'background-color: #d4edda;' : ($status === 'rejected' ? 'background-color: #f8d7da;' : 'background-color: #fff3cd;'); ?>">
              <td style="border: 1px solid #ccc; padding: 8px;">
                <input type="checkbox" name="selected_doctors[]" value="<?php echo $email; ?>">
              </td>
              <td style="border: 1px solid #ccc; padding: 8px;"><?php echo $username; ?></td>
              <td style="border: 1px solid #ccc; padding: 8px;"><?php echo $spec; ?></td>
              <td style="border: 1px solid #ccc; padding: 8px;"><?php echo $email; ?></td>
              <td style="border: 1px solid #ccc; padding: 8px;"><?php echo str_repeat('*', strlen($password)); ?></td> <!-- Password hidden -->
              <td style="border: 1px solid #ccc; padding: 8px;"><?php echo $docFees; ?></td>
              <td style="border: 1px solid #ccc; padding: 8px;">
                <form method="POST" action="admin-panel1.php#list-doc">
                  <input type="hidden" name="email" value="<?php echo $email; ?>">
                  <button type="submit" name="action" value="approve" 
                          style="padding: 5px 10px; background-color: green; color: white; border: none; cursor: pointer; 
                                 <?php echo $status === 'approved' ? 'opacity: 0.5; pointer-events: none;' : ''; ?>">
                    Approve
                  </button>
                  <button type="submit" name="action" value="reject" 
                          style="padding: 5px 10px; background-color: red; color: white; border: none; cursor: pointer; 
                                 <?php echo $status === 'rejected' ? 'opacity: 0.5; pointer-events: none;' : ''; ?>">
                    Reject
                  </button>
                </form>
              </td>
            </tr>
          <?php 
            }
          } else {
            echo "<tr><td colspan='7' style='border: 1px solid #ccc; padding: 8px;'>No doctors found in this category.</td></tr>";
          } ?>
        </tbody>
      </table>

      <input type="hidden" name="specialization" value="<?php echo $specialization; ?>">
      <button type="submit" name="delete" style="padding: 10px 20px; background-color: red; color: white; border: none; cursor: pointer;">
        Delete 
      </button>
    </form>
  <?php } ?>

  <!-- Pagination Controls: Show page numbers -->
  <div style="text-align: center;">
    <?php for ($page = 1; $page <= $total_pages; $page++) { ?>
      <a href="admin-panel1.php?page=<?php echo $page; ?>#list-doc" style="padding: 8px 16px; text-decoration: none; border: 1px solid #ccc; margin: 0 5px;">
        <?php echo $page; ?>
      </a>
    <?php } ?>
  </div>
</div>

<div class="tab-pane fade" id="list-pat" role="tabpanel" aria-labelledby="list-pat-list">
  <div class="col-md-8">
    <form class="form-group" action="admin-panel1.php?page=1#list-pat" method="post">
      <div class="row">
        <div class="col-md-5">
          <input type="text" name="patient_name" placeholder="Enter Name" class="form-control" value="<?php echo isset($_POST['patient_name']) ? $_POST['patient_name'] : ''; ?>">
        </div>
        <div class="col-md-5">
          <input type="text" name="patient_contact" placeholder="Enter Contact" class="form-control" value="<?php echo isset($_POST['patient_contact']) ? $_POST['patient_contact'] : ''; ?>">
        </div>
        <div class="col-md-2">
          <input type="submit" name="patient_search_submit" class="btn btn-primary" value="Search">
        </div>
      </div>
    </form>
  </div>

  <form action="patient_delete.php" method="post">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Select</th>
          <th scope="col">S.No</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Gender</th>
          <th scope="col">Email</th>
          <th scope="col">Contact</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $con = mysqli_connect("localhost", "root", "", "myhmsdb");
          global $con;

          // Pagination logic
          $results_per_page = 10;
          $query = "SELECT * FROM patreg WHERE 1=1"; // Default where condition for easier appending
          
          // Search logic
          if (isset($_POST['patient_name']) && $_POST['patient_name'] != '') {
            $search_name = mysqli_real_escape_string($con, $_POST['patient_name']);
            $query .= " AND fname LIKE '%$search_name%'"; // Search by 'fname'
          }
          if (isset($_POST['patient_contact']) && $_POST['patient_contact'] != '') {
            $search_contact = mysqli_real_escape_string($con, $_POST['patient_contact']);
            $query .= " AND contact LIKE '%$search_contact%'"; // Search by 'contact'
          }

          $result = mysqli_query($con, $query);

          // Check if there are results
          if (mysqli_num_rows($result) > 0) {
              $number_of_results = mysqli_num_rows($result);
              $number_of_pages = ceil($number_of_results / $results_per_page);
              $page = isset($_GET['page']) ? $_GET['page'] : 1;
              $starting_limit_number = ($page - 1) * $results_per_page;

              // Modify query to include limit for pagination
              $query .= " LIMIT " . $starting_limit_number . ',' . $results_per_page;
              $result = mysqli_query($con, $query);

              $serial_number = $starting_limit_number + 1;  // Starting serial number for the current page

              while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
                        <td><input type='checkbox' name='selected_patients[]' value='{$row['pid']}'></td>
                        <td>{$serial_number}</td>
                        <td>{$row['fname']}</td>
                        <td>{$row['lname']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['contact']}</td>
                        <td><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editModal{$row['pid']}'>Edit</button></td>
                      </tr>";

                // Modal for Editing
                echo "<div class='modal fade' id='editModal{$row['pid']}' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='editModalLabel'>Edit Patient Details</h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            <form action='admin-panel1.php' method='POST'>
                              <div class='modal-body'>
                                <input type='hidden' name='pid' value='{$row['pid']}'>
                                <div class='form-group'>
                                  <label for='fname'>First Name</label>
                                  <input type='text' class='form-control' id='fname' name='fname' value='{$row['fname']}'>
                                </div>
                                <div class='form-group'>
                                  <label for='lname'>Last Name</label>
                                  <input type='text' class='form-control' id='lname' name='lname' value='{$row['lname']}'>
                                </div>
                                <div class='form-group'>
                                  <label for='gender'>Gender</label>
                                  <select class='form-control' id='gender' name='gender'>
                                    <option value='Male' " . ($row['gender'] == 'Male' ? 'selected' : '') . ">Male</option>
                                    <option value='Female' " . ($row['gender'] == 'Female' ? 'selected' : '') . ">Female</option>
                                  </select>
                                </div>
                                <div class='form-group'>
                                  <label for='email'>Email</label>
                                  <input type='email' class='form-control' id='email' name='email' value='{$row['email']}'>
                                </div>
                                <div class='form-group'>
                                  <label for='contact'>Contact</label>
                                  <input type='text' class='form-control' id='contact' name='contact' value='{$row['contact']}'>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary' name='edit_patient'>Save Changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>";
                $serial_number++;
              }
          } else {
              echo "<tr><td colspan='8'>No results found.</td></tr>";
          }
        ?>
      </tbody>
    </table>

    <!-- Delete Selected Button -->
    <div class="row">
      <div class="col-md-2">
        <button type="submit" class="btn btn-danger" name="delete_selected">Delete Selected</button>
      </div>
    </div>
  </form>

  <!-- Pagination links -->
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <?php
      for ($page = 1; $page <= $number_of_pages; $page++) {
        echo "<li class='page-item'><a class='page-link' href='admin-panel1.php?page=" . $page . "#list-pat'>" . $page . "</a></li>";
      }
      ?>
    </ul>
  </nav>
</div>

<?php
// Handle Edit Form Submission
if (isset($_POST['edit_patient'])) {
  $pid = $_POST['pid'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];

  $query = "UPDATE patreg SET fname = '$fname', lname = '$lname', gender = '$gender', email = '$email', contact = '$contact' WHERE pid = '$pid'";
  if (mysqli_query($con, $query)) {
    echo "<script>alert('Patient details updated successfully'); window.location.href = 'admin-panel1.php?page=1#list-pat';</script>";
  } else {
    echo "<script>alert('Error updating patient details');</script>";
  }
}
?>

<!-- Prescription List with Pagination and Search -->
<div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
  <div class="col-md-8">
    <div class="row">
      
      <!-- Search bar -->
      <form method="GET" action="#list-pres">
        <input type="text" name="search" class="form-control mb-3" placeholder="Search by Doctor or First Name" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit" class="btn btn-primary mb-3">Search</button>
      </form>

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Serial No.</th>
            <th scope="col">Doctor</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Appointment Date</th>
            <th scope="col">Appointment Time</th>
            <th scope="col">Disease</th>
            <th scope="col">Allergy</th>
            <th scope="col" class="prescription-column">Prescription</th> <!-- Expanded column with custom class -->
          </tr>
        </thead>
        <tbody>
          <?php 
            $con = mysqli_connect("localhost", "root", "", "myhmsdb");
            global $con;

            // Pagination variables
            $limit = 10; // Number of records per page
            $page_pres = isset($_GET['page_pres']) ? (int)$_GET['page_pres'] : 1; // Current page number
            $offset = ($page_pres - 1) * $limit; // Offset for SQL query

            // Search query (search by fname or doctor)
            $searchTerm = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
            $searchQuery = $searchTerm ? "WHERE fname LIKE '%$searchTerm%' OR doctor LIKE '%$searchTerm%'" : '';

            // Count total prescriptions
            $totalQuery = "SELECT COUNT(*) FROM prestb $searchQuery;";
            $totalResult = mysqli_query($con, $totalQuery);
            $totalRow = mysqli_fetch_array($totalResult);
            $totalPrescriptions = $totalRow[0];
            $totalPages = ceil($totalPrescriptions / $limit); // Calculate total pages

            // Fetch prescriptions with limit and offset
            $query = "SELECT * FROM prestb $searchQuery LIMIT $limit OFFSET $offset;";
            $result = mysqli_query($con, $query);
            $serialNo = $offset + 1; // Serial number starts from the correct position for each page
            
            while ($row = mysqli_fetch_array($result)) {
              $doctor = $row['doctor'];
              $fname = $row['fname'];
              $lname = $row['lname'];
              $appdate = $row['appdate'];
              $apptime = $row['apptime'];
              $disease = $row['disease'];
              $allergy = $row['allergy'];
              $pres = $row['prescription'];

              echo "<tr>
                <td>$serialNo</td>
                <td>$doctor</td>
                <td>$fname</td>
                <td>$lname</td>
                <td>$appdate</td>
                <td>$apptime</td>
                <td>$disease</td>
                <td>$allergy</td>
                <td class='prescription-column'>$pres</td> <!-- Add the custom class here -->
              </tr>";
              $serialNo++; // Increment serial number for next row
            }
          ?>
        </tbody>
      </table>

      <!-- Pagination links -->
      <nav aria-label="Page navigation">
        <ul class="pagination">
          <?php
          for ($page = 1; $page <= $totalPages; $page++) {
            $searchParam = isset($_GET['search']) ? "&search=" . urlencode($_GET['search']) : '';
            echo "<li class='page-item'><a class='page-link' href='?page_pres=" . $page . $searchParam . "#list-pres'>" . $page . "</a></li>";
          }
          ?>
        </ul>
      </nav>
    </div>
  </div>
</div>

<!-- Additional CSS (to be included in the <style> section or a separate CSS file) -->
<style>
  /* Prescription column width adjustment */
  .prescription-column {
    width: 300px; /* Adjust as needed */
    word-wrap: break-word; /* Break long text */
    white-space: normal; /* Allow wrapping */
  }
</style>


<!-- Appointment List with Pagination -->
<div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-pat-list">
  <div class="col-md-8">
    <form class="form-group" action="admin-panel1.php#list-app" method="get">
      <div class="row">
        <div class="col-md-5">
          <input type="text" name="search_fname" placeholder="Enter First Name" class="form-control">
        </div>
        <div class="col-md-5">
          <input type="text" name="search_contact" placeholder="Enter Contact" class="form-control">
        </div>
        <div class="col-md-2">
          <input type="submit" name="search_submit" class="btn btn-primary" value="Search">
        </div>
      </div>
    </form>
  </div>

  <?php
  // Database connection
  $con = mysqli_connect("localhost", "root", "", "myhmsdb");

  // Pagination and filter settings
  $limit = 10;
  $page_app = isset($_GET['page_app']) ? (int)$_GET['page_app'] : 1;
  $offset = ($page_app - 1) * $limit;

  // Search filters
  $search_fname = isset($_GET['search_fname']) ? $_GET['search_fname'] : '';
  $search_contact = isset($_GET['search_contact']) ? $_GET['search_contact'] : '';

  // Build the query with filters
  $whereClause = "WHERE 1=1";
  if ($search_fname) {
    $whereClause .= " AND fname LIKE '%" . mysqli_real_escape_string($con, $search_fname) . "%'";
  }
  if ($search_contact) {
    $whereClause .= " AND contact LIKE '%" . mysqli_real_escape_string($con, $search_contact) . "%'";
  }

  // Count total filtered appointments
  $totalQuery = "SELECT COUNT(*) FROM appointmenttb $whereClause";
  $totalResult = mysqli_query($con, $totalQuery);
  $totalRow = mysqli_fetch_array($totalResult);
  $totalAppointments = $totalRow[0];
  $totalPages = ceil($totalAppointments / $limit);

  // Fetch appointments with limit and offset
  $query = "SELECT * FROM appointmenttb $whereClause LIMIT $limit OFFSET $offset";
  $result = mysqli_query($con, $query);
  ?>

  <!-- Appointment Table -->
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Doctor Name</th>
        <th>Consultancy Fees</th>
        <th>Appointment Date</th>
        <th>Appointment Time</th>
        <th>Appointment Status</th>
        <th>Payment Status</th> <!-- New Column for Payment Status -->
      </tr>
    </thead>
    <tbody>
      <?php
      $serialNumber = $offset + 1; // Starting serial number
      while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td><?php echo $serialNumber++; ?></td>
          <td><?php echo $row['fname']; ?></td>
          <td><?php echo $row['lname']; ?></td>
          <td><?php echo $row['gender']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['contact']; ?></td>
          <td><?php echo $row['doctor']; ?></td>
          <td><?php echo $row['docFees']; ?></td>
          <td><?php echo $row['appdate']; ?></td>
          <td><?php echo $row['apptime']; ?></td>
          <td>
            <?php
            // Display appointment status
            $status = "";
            if ($row['userStatus'] == 1 && $row['doctorStatus'] == 1) {
              $status = "Active";
            } elseif ($row['userStatus'] == 0 && $row['doctorStatus'] == 1) {
              $status = "Cancelled by Patient";
            } elseif ($row['userStatus'] == 1 && $row['doctorStatus'] == 0) {
              $status = "Cancelled by Doctor";
            }
            echo $status;
            ?>
          </td>
          <td>
            <?php
            // Display payment status
            echo $row['payment_status']; // Directly display the value from the database ('Paid', 'Pending', etc.)
            ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <!-- Pagination Links -->
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <?php
      // Generate pagination links
      for ($page = 1; $page <= $totalPages; $page++) {
        echo "<li class='page-item'><a class='page-link' href='admin-panel1.php?page_app=$page&search_fname=" . urlencode($search_fname) . "&search_contact=" . urlencode($search_contact) . "#list-app'>$page</a></li>";
      }
      ?>
    </ul>
  </nav>
</div>


<!-- Add Doctor division -->
<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
  <div class="col-md-8">
    <h2>Add Doctor</h2>
    <form class="form-group" id="add-doctor-form" method="post">
      <div class="row">
        <div class="col-md-4"><label>Doctor Name:</label></div>
        <div class="col-md-8"><input type="text" class="form-control" name="doctor" onkeydown="return alphaOnly(event);" required></div><br><br>
        <div class="col-md-4"><label>Specialization:</label></div>
        <div class="col-md-8">
          <select name="special" class="form-control" id="special" required="required">
            <option value="head" name="spec" disabled selected>Select Specialization</option>
            <?php
            $con = mysqli_connect("localhost", "root", "", "myhmsdb");
            $query = "SELECT * FROM spectb";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) {
              echo "<option value='" . $row['specialization'] . "'>" . $row['specialization'] . "</option>";
            }
            ?>
          </select>
        </div><br><br>
        <div class="col-md-4"><label>Email ID:</label></div>
        <div class="col-md-8"><input type="email"  class="form-control" name="demail" required></div><br><br>
        <div class="col-md-4"><label>Password:</label></div>
        <div class="col-md-8"><input type="password" class="form-control"  onkeyup='check();' name="dpassword" id="dpassword"  required></div><br><br>
        <div class="col-md-4"><label>Confirm Password:</label></div>
        <div class="col-md-8"  id='cpass'><input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required>&nbsp &nbsp<span id='message'></span> </div><br><br>
        <div class="col-md-4"><label>Consultancy Fees:</label></div>
        <div class="col-md-8"><input type="text" class="form-control"  name="docFees" required></div><br><br>
      </div>
      <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary">
    </form>
    <?php
    if (isset($_POST['docsub'])) {
      $doctor = $_POST['doctor'];
      $dpassword = $_POST['dpassword'];
      $demail = $_POST['demail'];
      $spec = $_POST['special'];
      $docFees = $_POST['docFees'];

      $con = mysqli_connect("localhost", "root", "", "myhmsdb");

      if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }

      $query = "SELECT * FROM doctb WHERE email = '$demail'";
      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result) > 0) {
        echo "";
      } else {
        $query = "INSERT INTO doctb (username, password, email, spec, docFees) VALUES ('$doctor', '$dpassword', '$demail', '$spec', '$docFees')";
        $con->query($query);
      }

      $con->close();
    }
    ?>
  </div>
</div>
<!-- Add Specialization division -->
<!-- Add Specialization division -->
<div class="tab-pane fade" id="list-spec" role="tabpanel" aria-labelledby="list-spec-list">
  <div class="col-md-8">
    <h2 class="text-center">Manage Specializations</h2>
    <form class="form-group" id="specialization-form" method="post">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="specialization">Specialization:</label>
            <input type="text" class="form-control" id="specialization" name="specialization" required>
          </div>
        </div>
        <div class="col-md-12 text-center">
          <button type="submit" name="add_specialization" class="btn btn-success btn-lg" onclick="reloadPage()">Add</button>
        </div>
      </div>
    </form>

    <?php
    $con = mysqli_connect("localhost", "root", "", "myhmsdb");

    if (isset($_POST['add_specialization'])) {
      $specialization = $_POST['specialization'];

      if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }

      $query = "SELECT * FROM spectb WHERE specialization = '$specialization'";
      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result) > 0) {
        echo "<p class='text-danger'>Specialization already exists!</p>";
      } else {
        $query = "INSERT INTO spectb (specialization) VALUES ('$specialization')";
        if ($con->query($query) === TRUE) {
          echo "<p class='text-success'>Specialization added successfully!</p>";
        } else {
          echo "<p class='text-danger'>Error adding specialization: " . $con->error . "</p>";
        }
      }
    }

    if (isset($_POST['delete_specialization'])) {
      $specialization_id = $_POST['specialization_id'];

      $query = "DELETE FROM spectb WHERE id = '$specialization_id'";
      if ($con->query($query) === TRUE) {
        echo "<p class='text-success'>Specialization removed successfully!</p>";
      } else {
        echo "<p class='text-danger'>Error removing specialization: " . $con->error . "</p>";
      }
    }

    if (isset($_POST['edit_specialization'])) {
      $specialization_id = $_POST['specialization_id'];
      $new_specialization = $_POST['new_specialization'];

      $query = "UPDATE spectb SET specialization = '$new_specialization' WHERE id = '$specialization_id'";
      if ($con->query($query) === TRUE) {
        echo "<p class='text-success'>Specialization updated successfully!</p>";
      } else {
        echo "<p class='text-danger'>Error updating specialization: " . $con->error . "</p>";
      }
    }
    ?>

    <h2 class="text-center">Existing Specializations</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Specialization</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $query = "SELECT * FROM spectb";
          $result = mysqli_query($con, $query);
          $serialNumber = 1; // Initialize serial number

          while ($row = mysqli_fetch_array($result)) {
            $specialization_id = $row['id'];
            $specialization = $row['specialization'];
            echo "<tr>
              <td>$serialNumber</td>
              <td>$specialization</td>
              <td>
                <!-- Delete Button -->
                <form method='post' style='display:inline;'>
                  <input type='hidden' name='specialization_id' value='$specialization_id'>
                  <button type='submit' name='delete_specialization' class='btn btn-danger'>Remove</button>
                </form>
                <!-- Edit Button -->
                <button class='btn btn-warning' onclick='editSpecialization($specialization_id, \"$specialization\")'>Edit</button>
              </td>
            </tr>";
            $serialNumber++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal for Editing Specialization -->
<div class="modal fade" id="editSpecializationModal" tabindex="-1" role="dialog" aria-labelledby="editSpecializationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="editSpecializationModalLabel">Edit Specialization</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="edit_specialization_id" name="specialization_id">
          <div class="form-group">
            <label for="new_specialization">New Specialization</label>
            <input type="text" class="form-control" id="new_specialization" name="new_specialization" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="edit_specialization" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function editSpecialization(id, specialization) {
  document.getElementById('edit_specialization_id').value = id;
  document.getElementById('new_specialization').value = specialization;
  $('#editSpecializationModal').modal('show');
}
</script>


       <!-- Queries List with Pagination -->
<div class="tab-pane fade" id="list-mes" role="tabpanel" aria-labelledby="list-mes-list">
  <div class="col-md-8">
    <form class="form-group" action="messearch.php" method="post">
      <div class="row">
        <div class="col-md-10"><input type="text" name="mes_contact" placeholder="Enter Contact" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="mes_search_submit" class="btn btn-primary" value="Search"></div></div>
    </form>
  </div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">User  Name</th>
        <th scope="col">Email</th>
        <th scope="col">Contact</th>
        <th scope="col">Message</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $con=mysqli_connect("localhost","root","","myhmsdb");
        global $con;

        // Pagination variables
        $limit = 10; // Number of records per page
        $page_mes = isset($_GET['page_mes']) ? (int)$_GET['page_mes'] : 1; // Current page number
        $offset = ($page_mes - 1) * $limit; // Offset for SQL query

        // Count total queries
        $totalQuery = "SELECT COUNT(*) FROM contact;";
        $totalResult = mysqli_query($con, $totalQuery);
        $totalRow = mysqli_fetch_array($totalResult);
        $totalQueries = $totalRow[0];
        $totalPages = ceil($totalQueries / $limit); // Calculate total pages

        // Fetch queries with limit and offset
        $query = "SELECT * FROM contact LIMIT $limit OFFSET $offset;";
        $result = mysqli_query($con,$query);
        while ($row = mysqli_fetch_array($result)){
          #$fname = $row['fname'];
          #$lname = $row['lname'];
          #$email = $row['email'];
          #$contact = $row['contact'];
          echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['contact']}</td>
            <td>{$row['message']}</td>
          </tr>";
        }
      ?>
    </tbody>
  </table>
  <!-- Pagination links -->
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <?php
      for ($page = 1; $page <= $totalPages; $page++) {
        echo "<li class='page-item'><a class='page-link' href='admin-panel1.php?page_mes=" . $page . "#list-mes'>" . $page . "</a></li>";
      }
      ?>
    </ul>
  </nav>
</div>


    </div>
  </div>
</div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
   <script>
  // Check if the URL has a hash
  if (window.location.hash) {
    // Simulate a click on the tab with the same ID as the hash
    var tabId = window.location.hash.substring(1);
    $('#' + tabId + '-list').trigger('click');
  }
</script>
</body>
</script>
...
</div>
<script>
  // Check if the URL has a hash
  if (window.location.hash) {
    // Simulate a click on the tab with the same ID as the hash
    var tabId = window.location.hash.substring(1);
    $('#' + tabId + '-list').trigger('click');
  }
</script>
  </body>
</html>