<?php
// Include header
include 'header.php';

// Include sidebar
include 'sidebar4.php';

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

// Function to fetch faculty data from the database
function fetchFacultyData($facultyId, $conn) {
    $sql = "SELECT * FROM register WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $facultyId);
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
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'faculty') {
    header("Location: login.php");
    exit();
}

// Get faculty ID from the session
$facultyId = $_SESSION['user_id'];

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

// Fetch additional information about the faculty from the database based on $facultyId
$facultyData = fetchFacultyData($facultyId, $conn);

// Display faculty-specific content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty Dashboard</title>
</head>
<body>
    <h1>Welcome, Faculty <?php echo $facultyId; ?></h1>

    <?php
    // Display approval status
    $approvalStatus = isset($facultyData['approval_status']) ? $facultyData['approval_status'] : 0;

    // Fetch unit requests for the faculty from the database
    $sql = "SELECT * FROM units_requests WHERE prof_id = ? AND status = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $facultyId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display faculty-specific content
    ?>
    <h2>Unit Requests</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Student ID</th><th>Unit ID</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['student_id'] . "</td>";
            echo "<td>" . $row['unit_id'] . "</td>";
            echo "<td><a href='process_approval.php?request_id=" . $row['student_id'] . "&action=approve'>Approve</a> | <a href='process_approval.php?request_id=" . $row['student_id'] . "&action=disapprove'>Disapprove</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No unit requests at the moment.</p>";
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