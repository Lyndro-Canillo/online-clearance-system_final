<?php

// Database connection details
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

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $notificationId = $_GET['id'];

    // Prepare SQL statement to delete the notification
    $sqlDelete = "DELETE FROM user_requests WHERE id = ?";
    $stmt = $conn->prepare($sqlDelete);

    if ($stmt === false) {
        die('Error preparing the statement: ' . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("i", $notificationId);

    // Execute the query
    if ($stmt->execute()) {
        echo "Notification deleted successfully.";
    } else {
        echo "Error deleting notification: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request. Notification ID not provided.";
}

// Close the database connection
$conn->close();
?>
