<?php
  // Assuming the PHP script starts here, you might need to include the session or connect to the database.
  // Include the required file or session check if needed, like so:
  // session_start();
  // include 'db_connection.php';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

    <style>
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
      .btn-primary{
        background-color: #3c50c1;
        border-color: #3c50c1;
      }
      button:hover, #inputbtn:hover {
        cursor: pointer;
      }
    </style>
  </head>

  <body style="padding-top:50px;">
    <div class="container-fluid" style="margin-top:50px;">
     

      <div class="row">
        <div class="col-md-4" style="max-width:25%; margin-top: 3%">
          <div class="list-group" id="list-tab" role="tablist">
            <!-- Tabs with redirection to admin-panel.php -->
            <a class="list-group-item list-group-item-action active" id="list-dash-list" href="admin-panel.php?tab=dashboard" role="tab" aria-controls="home">Dashboard</a>
            <a class="list-group-item list-group-item-action" id="list-home-list" href="admin-panel.php?tab=appointment" role="tab" aria-controls="home">Book Appointment</a>
            <a class="list-group-item list-group-item-action" href="admin-panel.php?tab=history" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Appointment History</a>
            <a class="list-group-item list-group-item-action" href="admin-panel.php?tab=prescriptions" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Prescriptions</a>
            <a class="list-group-item list-group-item-action" href="admin-panel.php?tab=chatbox" id="list-chat-list" role="tab" data-toggle="list" aria-controls="home">Chatbox</a>
          </div>
        </div>
        
        <div class="col-md-8">
          <!-- The content will be displayed here based on the clicked tab -->
          <div id="content">
            <?php
              // Handle the tab redirection logic on admin-panel.php
              if (isset($_GET['tab'])) {
                $tab = $_GET['tab'];
                switch ($tab) {
                  case 'dashboard':
                    // Load dashboard content
                    include 'dashboard.php';
                    break;
                  case 'appointment':
                    // Load appointment booking form
                    include 'appointment.php';
                    break;
                  case 'history':
                    // Load appointment history
                    include 'history.php';
                    break;
                  case 'prescriptions':
                    // Load prescriptions
                    include 'prescriptions.php';
                    break;
                  case 'chatbox':
                    // Load the chatbox
                    include 'chatbox.php';
                    break;
                  default:
                    // Default to dashboard
                    include 'dashboard.php';
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS (Optional for smooth dropdowns, etc.) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8iD2N4eXqZOHW5MtbUQmPyPbkP4nUt9Rm3zNCcDg3ujR6K5NmBB2t8m2aB8RPT" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-hd6iSP56zVgwlmg5GAyq7UzVfPbsIUt6b5rrYg5AxFZH9ZAtQmmjE3IsZ7TtqW1j" crossorigin="anonymous"></script>
  </body>
</html>
