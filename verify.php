<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $razorpay_order_id = $_POST['razorpay_order_id'];
    $razorpay_signature = $_POST['razorpay_signature'];
    $appointment_id = $_POST['appointment_id'];

    // Razorpay API credentials
    $apiKey = "rzp_test_H1TJaJCyvUeob3";
    $secretKey = "3IO07w4twME5htH18LSAxPGF";

    // Check the signature with Razorpay to verify payment
    $generated_signature = hash_hmac('sha256', $razorpay_order_id . "|" . $razorpay_payment_id, $secretKey);

    if ($generated_signature === $razorpay_signature) {
        // Payment is successful, update payment status in the database
        $con = mysqli_connect("localhost", "root", "", "myhmsdb");

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Update payment status to 'Paid'
        $query = "UPDATE appointmenttb SET payment_status = 'Paid' WHERE ID = '$appointment_id'";
        if (mysqli_query($con, $query)) {
            // Redirect to admin panel page after successful payment
            header("Location: admin-panel.php?status=success");
            exit();
        } else {
            echo "Database update failed.";
        }
    } else {
        echo "Payment verification failed. Invalid signature.";
    }
} else {
    echo "Invalid request method.";
}
?>
