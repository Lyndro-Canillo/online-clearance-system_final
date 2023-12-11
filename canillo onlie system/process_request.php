<!-- process_request.php -->
<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_request"])) {
    // Retrieve data from the form
    $studentId = $_SESSION['user_id'];
    $profId = $_POST["prof_id"];
    $unitId = $_POST["unit_id"];

    // TODO: Implement proper validation and sanitation for the input data

    // Create a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clearance_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query to insert the unit request
    $sql = "INSERT INTO units_requests (student_id, prof_id, unit_id, status) VALUES (?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("iis", $studentId, $profId, $unitId);

    // Execute the query
    if ($stmt->execute()) {
        echo "Unit request inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();

    // Redirect back to the student dashboard
    header("Location: student_dashboard.php");
    exit();
} else {
    // Redirect to the student dashboard if the form is not submitted
    header("Location: student_dashboard.php");
    exit();
}
?>
