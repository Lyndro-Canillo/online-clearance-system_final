<?php
// Include header
include 'header.php';

// Include sidebar
include 'sidebar2.php';

// Include the getStatusText function (define it if not defined yet)
function getStatusText($status) {
    switch ($status) {
        case 0:
            return "Pending";
        case 1:
            return "Approved";
        case -1:
            return "Disapproved";
        default:
            return "Unknown";
    }
}

// Function to fetch student data from the database
function fetchStudentData($studentId, $conn) {
    $sql = "SELECT * FROM register WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $studentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null; // Adjust this based on your error handling needs
    }
}

session_start();

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

// Fetch unit requests for the student from the database
$sql = "SELECT * FROM units_requests WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $studentId);
$stmt->execute();

// Debugging: Check the generated query and any error messages
var_dump($stmt);
echo $stmt->error;

$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unit Request Status</title>
</head>
<body>
    <h1>Unit Request Status</h1>

    <?php
    // Display unit request status
    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>Professor ID</th><th>Unit ID</th><th>Status</th></tr>';
        while ($row = $result->fetch_assoc()) {
            $profId = $row['prof_id'];
            $unitId = $row['unit_id'];
            $status = getStatusText($row['status']);
            echo "<tr><td>$profId</td><td>$unitId</td><td>$status</td></tr>";
        }
        echo '</table>';
    } else {
        echo 'No unit requests found.';
    }
    ?>

    <!-- Add more content as needed -->
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