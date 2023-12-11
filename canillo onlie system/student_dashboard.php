<!-- student_dashboard.php -->
<?php
session_start();

// Include header
include 'header.php';

// Include sidebar
include 'sidebar2.php';

// Include the getStatusText function (define it if not defined yet)
function getStatusText($status) {
    // Implement the getStatusText function as needed
}

// Function to fetch student data from the database
function fetchStudentData($studentId, $conn) {
    // Implement the fetchStudentData function as needed
}

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'student') {
    header("Location: login.php");
    exit();
}

// Get student ID from the session
$studentId = $_SESSION['user_id'];

// Create a database connection
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

// Fetch additional information about the student from the database based on $studentId
$studentData = fetchStudentData($studentId, $conn);

// Display student-specific content
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Welcome, Student <?php echo $studentId; ?></h1>

    <!-- Form to request a unit -->
    <form action="process_request.php" method="post">
        <label for="prof_id">Professor ID:</label>
        <input type="text" name="prof_id" required>

        <label for="unit_id">Unit ID:</label>
        <input type="text" name="unit_id" required>

        <input type="submit" name="submit_request" value="Request Unit">
    </form>

    <?php
    // Display approval status
    $approvalStatus = isset($studentData['approval_status']) ? $studentData['approval_status'] : 0;
    echo "Approval Status: " . getStatusText($approvalStatus);

    // Add more content as needed
    ?>

</body>
</html>

<style>
   body {
            font-family: Arial, sans-serif;
            background-image: url('msupic.jpg'); /* Replace with the path to your background image */
            background-size: cover;
            background-repeat: no-repeat;
            
        }
</style>		