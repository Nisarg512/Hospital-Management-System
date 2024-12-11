<!DOCTYPE html>
<?php 
include('func1.php');
$con=mysqli_connect("localhost","root","","myhmsdb");
$doctor = $_SESSION['dname'];
if(isset($_GET['cancel']))
  {
    $query=mysqli_query($con,"update appointmenttb set doctorStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  }

  // if(isset($_GET['prescribe'])){
    
  //   $pid = $_GET['pid'];
  //   $ID = $_GET['ID'];
  //   $appdate = $_GET['appdate'];
  //   $apptime = $_GET['apptime'];
  //   $disease = $_GET['disease'];
  //   $allergy = $_GET['allergy'];
  //   $prescription = $_GET['prescription'];
  //   $query=mysqli_query($con,"insert into prestb(doctor,pid,ID,appdate,apptime,disease,allergy,prescription) values ('$doctor',$pid,$ID,'$appdate','$apptime','$disease','$allergy','$prescription');");
  //   if($query)
  //   {
  //     echo "<script>alert('Prescribed successfully!');</script>";
  //   }
  //   else{
  //     echo "<script>alert('Unable to process your request. Try again!');</script>";
  //   }
  // }


?>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <style >
      .btn-outline-light:hover{
        color: #25bef7;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
      }
    </style>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
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
    <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Enter contact number" aria-label="Search" name="contact">
      <input type="submit" class="btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
    </form>
  </div>
</nav>
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $_SESSION['dname'] ?>  </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" href="#list-dash" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointments</a>
      <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home"> Prescription List</a>
      <a class="list-group-item list-group-item-action" href="#list-chat" id="list-chat-list" role="tab" data-toggle="list" aria-controls="home">Chatbox</a>
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">
      <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        
              <div class="container-fluid container-fullw bg-white" >
              <div class="row">

               <div class="col-sm-4" style="left: 10%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> View Appointments</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>                      
                      <p class="links cl-effect-1">
                        <a href="#list-app" onclick="clickDiv('#list-app-list')">
                          Appointment List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: 15%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> Prescriptions</h4>
                        
                      <p class="links cl-effect-1">
                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                          Prescription List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>    

             </div>
           </div>
         </div>
         <div class="tab-pane fade" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
    <div class="container-fluid">
        <h4>Chatbox</h4>
        <p>Click the button below to open the chat interface.</p>
        <a href="test1.php" class="btn btn-primary">Open Chat</a>
    </div>
</div>
<div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-home-list">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Serial No.</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Appointment Time</th>
                <th scope="col">Current Status</th>
                <th scope="col">Action</th>
                <th scope="col">Prescribe</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $con = mysqli_connect("localhost", "root", "", "myhmsdb");
            global $con;
            $dname = $_SESSION['dname'];
            $query = "SELECT pid, ID, fname, lname, gender, email, contact, appdate, apptime, userStatus, doctorStatus FROM appointmenttb WHERE doctor='$dname'";
            $result = mysqli_query($con, $query);
            $serial = 1;  // Initialize serial number

            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $serial++; ?></td> <!-- Serial Number -->
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['appdate']; ?></td>
                    <td><?php echo $row['apptime']; ?></td>
                    <td>
                        <?php
                        if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                            echo "Active";
                        }
                        if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                            echo "Cancelled by Patient";
                        }
                        if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                            echo "Cancelled by You";
                        }
                        ?>
                    </td>
                    <td>
                        <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>
                            <a href="doctor-panel.php?ID=<?php echo $row['ID']; ?>&cancel=update"
                               onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                               title="Cancel Appointment">
                                <button class="btn btn-danger">Cancel</button>
                            </a>
                        <?php } else {
                            echo "Cancelled";
                        } ?>
                    </td>
                    <td>
                        <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>
                            <a href="prescribe.php?pid=<?php echo $row['pid']; ?>&ID=<?php echo $row['ID']; ?>&fname=<?php echo $row['fname']; ?>&lname=<?php echo $row['lname']; ?>&appdate=<?php echo $row['appdate']; ?>&apptime=<?php echo $row['apptime']; ?>"
                               title="Prescribe">
                                <button class="btn btn-success">Prescribe</button>
                            </a>
                        <?php } else {
                            echo "-";
                        } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
global $con;
$doctor = $_SESSION['dname'];

// Pagination settings
$limit = 10; // Records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Handle prescription update after form submission
if (isset($_POST['updatePrescription'])) {
    $ID = $_POST['ID'];
    $pid = $_POST['pid'];
    $disease = mysqli_real_escape_string($con, $_POST['disease']);
    $allergy = mysqli_real_escape_string($con, $_POST['allergy']);
    $prescription = mysqli_real_escape_string($con, $_POST['prescription']);

    // Update the disease, allergy, and prescription in the database
    $updateQuery = "UPDATE prestb SET disease='$disease', allergy='$allergy', prescription='$prescription' WHERE ID='$ID' AND pid='$pid'";
    if (mysqli_query($con, $updateQuery)) {
        // Use JavaScript to reload the page and scroll to the list-pres division
        echo "<script>
                alert('Prescription, Disease, and Allergy updated successfully!');
                window.location.href = 'doctor-panel.php?page=$page#list-pres'; // Reload and scroll to prescription list
            </script>";
    } else {
        echo "<script>alert('Error updating Prescription, Disease, and Allergy.');</script>";
    }
}

// Handle search functionality
$search = '';
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($con, $_POST['search']);
}

// Modify query to include search filter
$query = "SELECT pid, fname, lname, ID, appdate, apptime, disease, allergy, prescription 
          FROM prestb 
          WHERE doctor='$doctor' AND fname LIKE '%$search%' 
          LIMIT $limit OFFSET $offset";
?>

<div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
    <!-- Search Bar -->
    <form method="POST" action="doctor-panel.php#list-pres" class="mb-3" onsubmit="scrollToPrescriptionList()">
        <input type="text" name="search" value="<?php echo $search; ?>" placeholder="Search by First Name" class="form-control" style="width: 300px; display: inline-block;">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Serial No.</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Appointment Time</th>
                <th scope="col">Disease</th>
                <th scope="col">Allergy</th>
                <th scope="col">Prescribe</th>
                <th scope="col">Edit Prescription</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($con, $query);
            if (!$result) {
                echo mysqli_error($con);
            }

            $serial = $offset + 1; // Start serial number from the correct position

            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $serial++; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['appdate']; ?></td>
                    <td><?php echo $row['apptime']; ?></td>
                    <td><?php echo $row['disease']; ?></td>
                    <td><?php echo $row['allergy']; ?></td>
                    <td><?php echo $row['prescription']; ?></td>
                    <td>
                        <!-- Edit Button - Opens a modal for editing the prescription, disease, and allergy -->
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editPrescriptionModal<?php echo $row['ID']; ?>">Edit</button>

                        <!-- Modal for Editing Prescription, Disease, and Allergy -->
                        <div class="modal fade" id="editPrescriptionModal<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="editPrescriptionModalLabel<?php echo $row['ID']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editPrescriptionModalLabel<?php echo $row['ID']; ?>">Edit Prescription</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="doctor-panel.php">
                                            <div class="form-group">
                                                <label for="disease">Disease</label>
                                                <input type="text" class="form-control" id="disease" name="disease" value="<?php echo $row['disease']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="allergy">Allergy</label>
                                                <input type="text" class="form-control" id="allergy" name="allergy" value="<?php echo $row['allergy']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="prescription">Prescription</label>
                                                <textarea class="form-control" id="prescription" name="prescription" rows="4" required><?php echo $row['prescription']; ?></textarea>
                                            </div>
                                            <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
                                            <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                                            <button type="submit" name="updatePrescription" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php
            // Get total number of records after search filter
            $countQuery = "SELECT COUNT(*) AS total FROM prestb WHERE doctor='$doctor' AND fname LIKE '%$search%'";
            $countResult = mysqli_query($con, $countQuery);
            $countRow = mysqli_fetch_assoc($countResult);
            $totalRecords = $countRow['total'];
            $totalPages = ceil($totalRecords / $limit);

            // Display pagination buttons
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li class="page-item"><a class="page-link" href="doctor-panel.php?page=' . $i . '#list-pres">' . $i . '</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>

<!-- JavaScript for smooth scrolling -->
<script>
    function scrollToPrescriptionList() {
        // Ensure the page scrolls to the prescription list division after search form is submitted
        setTimeout(function() {
            document.querySelector('#list-pres').scrollIntoView({ behavior: 'smooth' });
        }, 0); // Ensures it happens after form submission and page load
    }

    // If there is a page reload with #list-pres in the URL, scroll directly to it
    window.onload = function() {
        if (window.location.hash === '#list-pres') {
            document.querySelector('#list-pres').scrollIntoView({ behavior: 'smooth' });
        }
    };
</script>



      <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-pat-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Consultancy Fees</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","myhmsdb");
                    global $con;

                    $query = "select * from appointmenttb;";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
              
                      #$fname = $row['fname'];
                      #$lname = $row['lname'];
                      #$email = $row['email'];
                      #$contact = $row['contact'];
                  ?>
                      <tr>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['doctor'];?></td>
                        <td><?php echo $row['docFees'];?></td>
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>





      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
                  <div class="col-md-4"><label>Doctor Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="doctor" required></div><br><br>
                  <div class="col-md-4"><label>Password:</label></div>
                  <div class="col-md-8"><input type="password" class="form-control"  name="dpassword" required></div><br><br>
                  <div class="col-md-4"><label>Email ID:</label></div>
                  <div class="col-md-8"><input type="email"  class="form-control" name="demail" required></div><br><br>
                  <div class="col-md-4"><label>Consultancy Fees:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="docFees" required></div><br><br>
                </div>
          <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary">
        </form>
      </div>
       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>
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
  </body>
</html>