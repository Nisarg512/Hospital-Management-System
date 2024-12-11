<?php
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $con = mysqli_connect("localhost", "root", "", "myhmsdb");
    $query = "SELECT * FROM patreg WHERE pid = '$pid'";
    $result = mysqli_query($con, $query);
    $patient = mysqli_fetch_assoc($result);
}
?>

<form action="update_patient.php" method="post">
    <input type="hidden" name="pid" value="<?php echo $patient['pid']; ?>">
    <label for="fname">First Name:</label>
    <input type="text" name="fname" value="<?php echo $patient['fname']; ?>">
    <label for="lname">Last Name:</label>
    <input type="text" name="lname" value="<?php echo $patient['lname']; ?>">
    <label for="contact">Contact:</label>
    <input type="text" name="contact" value="<?php echo $patient['contact']; ?>">
    <input type="submit" value="Update">
</form>
