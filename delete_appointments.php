<?php
if (isset($_POST['delete_selected']) && isset($_POST['appointment_ids'])) {
    $con = mysqli_connect("localhost", "root", "", "myhmsdb");

    // Get the selected appointment IDs
    $appointment_ids = $_POST['appointment_ids'];

    // Prepare the query to delete selected appointments
    $ids = implode(',', $appointment_ids);  // Convert the array to a comma-separated string
    $query = "DELETE FROM appointmenttb WHERE id IN ($ids)";

    if (mysqli_query($con, $query)) {
        echo "Selected appointments have been deleted successfully.";
    } else {
        echo "Error deleting appointments: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "No appointments selected for deletion.";
}
?>
