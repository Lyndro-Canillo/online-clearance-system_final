<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["unit_id"])) {
    $studentId = $_SESSION['user_id'];
    $profId = $_POST["prof_id"];
    $unitId = $_POST["unit_id"];
    $status = 0; // Set the initial status as 0 (disapproved)

    // Create a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clearance_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the request into the units_requests table
    $sql = "INSERT INTO units_requests (student_id, prof_id, unit_id, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $studentId, $profId, $unitId, $status);

    if ($stmt->execute()) {
        echo "Request submitted successfully.";
    } else {
        echo "Error submitting request: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
