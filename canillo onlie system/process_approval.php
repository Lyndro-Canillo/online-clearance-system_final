<?php
// Include the database configuration directly if db_connection.php is not used
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve data from the URL
    $requestId = $_GET["request_id"];
    $action = $_GET["action"];

    // Prepare the SQL query to update the unit request status
    $sql = "UPDATE units_requests SET status = ? WHERE student_id = ?";
    $stmt = $conn->prepare($sql);

    // Check if the statement is prepared successfully
    if ($stmt === false) {
        die('Error preparing the statement: ' . $conn->error);
    }

    // Bind parameters
    $newStatus = ($action == "approve") ? 1 : -1;
    $stmt->bind_param("ii", $newStatus, $requestId);

    // Check if the parameters are bound successfully
    if ($stmt === false) {
        die('Error binding parameters: ' . $stmt->error);
    }

    // Execute the query
    if ($stmt->execute()) {
        echo "Request status updated successfully.";
    } else {
        echo "Error executing the query: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();

    // Redirect back to the faculty dashboard
    header("Location: faculty_dashboard.php");
    exit();
} else {
    // Redirect to the faculty dashboard if the form is not submitted
    header("Location: faculty_dashboard.php");
    exit();
}
?>
