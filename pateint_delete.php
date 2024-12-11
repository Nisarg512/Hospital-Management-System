<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check if the delete button was clicked
if (isset($_POST['delete_selected'])) {
    if (isset($_POST['selected_patients'])) {
        // Get selected patient IDs
        $selected_patients = $_POST['selected_patients'];
        $patient_ids = implode(",", $selected_patients);

        // Delete the selected patients
        $query = "DELETE FROM patreg WHERE pid IN ($patient_ids)";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "Selected patients deleted successfully.";
        } else {
            echo "Error deleting patients.";
        }
    } else {
        echo "No patients selected.";
    }
}

// Redirect back to search page
header("Location: patientsearch.php");
exit();
