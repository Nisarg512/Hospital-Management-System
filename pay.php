<?php
// Get values from POST request
$appointment_id = $_POST['appointment_id'];
$doctor = $_POST['doctor'];
$docFees = $_POST['docFees'] * 100; // Convert fees to paise

// Razorpay API credentials
$apiKey = "rzp_test_H1TJaJCyvUeob3";
$secretKey = "3IO07w4twME5htH18LSAxPGF";

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

// Initialize Razorpay API instance with a longer timeout
$options = [
    'timeout' => 60 // Set timeout to 30 seconds
];

// Create an order with Razorpay
$orderData = [
    'receipt' => "receipt#1234", // Optional: You can pass a unique receipt ID here
    'amount' => $docFees, // Amount in paise
    'currency' => 'INR',
    'payment_capture' => 1
];

try {
    // Initialize Razorpay API with timeout option
    $api = new Api($apiKey, $secretKey);

    // Create the Razorpay order with the timeout option
    $order = $api->order->create($orderData, $options);
    $orderId = $order['id']; // Order ID from Razorpay
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit;
}
?>
<!-- Razorpay Checkout Script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "<?php echo $apiKey; ?>",
        "amount": "<?php echo $docFees; ?>", // Amount in paise
        "currency": "INR",
        "name": "Hospital Management",
        "description": "Payment for appointment with <?php echo $doctor; ?>",
        "image": "", // Optional: Your hospital logo here
        "order_id": "<?php echo $orderId; ?>", // Pass the order ID to Razorpay
        "handler": function (response) {
            // On payment success, call verify.php to verify the payment and update the status
            var payment_id = response.razorpay_payment_id;
            var order_id = response.razorpay_order_id;
            var signature = response.razorpay_signature;
            var appointment_id = "<?php echo $appointment_id; ?>";

            // Send payment data to verify.php
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "verify.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("razorpay_payment_id=" + payment_id + "&razorpay_order_id=" + order_id + "&razorpay_signature=" + signature + "&appointment_id=" + appointment_id);

            // After payment verification, redirect to admin-panel.php
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Assuming verify.php returns a success response, redirect to admin-panel.php
                    window.location.href = "admin-panel.php";
                } else {
                    alert("Payment verification failed. Please contact support.");
                }
            };
        },
        "prefill": {
            "name": "", // Pre-fill user name if needed
            "email": "", // Pre-fill email if needed
            "contact": "" // Pre-fill contact if needed
        },
        "notes": {
            "address": "customer address"
        },
        "theme": {
            "color": "#F37254"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
</script>
