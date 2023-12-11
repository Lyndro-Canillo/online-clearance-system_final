<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clearance_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'student') {
    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $studentId = $_SESSION['user_id'];
    $amount = $_POST["amount"];
    $paymentDate = date("Y-m-d"); // Get the current date

    // TODO: Implement proper validation and sanitation for the input data

    // Prepare the SQL query to insert the payment record
    // Prepare the SQL query to insert the payment record
$sql = "INSERT INTO payment (student_id, date, payment) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);


    // Check if the prepare was successful
    if ($stmt) {
        // Bind parameters
        // Bind parameters
     $stmt->bind_param("iss", $studentId, $paymentDate, $amount);


        // Execute the query
        if ($stmt->execute()) {
            echo "Payment successful.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
    } else {
        echo "Error in the prepared statement: " . $conn->error;
    }

    $conn->close();
} else {
    // Redirect to the payment page if the form is not submitted
    header("Location: payment.php");
    exit();
}
?>
