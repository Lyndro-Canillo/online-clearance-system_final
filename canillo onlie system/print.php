<?php
// Include header
include 'header.php';

// Include sidebar
include 'sidebar2.php';

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

// Fetch information from units_requests and payment tables based on student ID
$sql = "SELECT ur.student_id, ur.prof_id, ur.unit_id, ur.status, p.date, p.payment, p.status as payment_status
        FROM units_requests ur
        LEFT JOIN payment p ON ur.student_id = p.student_id
        WHERE ur.student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $studentId);
$stmt->execute();
$result = $stmt->get_result();

// Display the information
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('msupic.jpg'); /* Replace with the path to your background image */
            background-size: cover;
            background-repeat: no-repeat;
        }

        h1 {
            text-align: center;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #fff;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #555;
            color: #fff;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Requests and Payment Information for Student ID: <?php echo $studentId; ?></h1>
    
    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>Professor ID</th>
            <th>Unit ID</th>
            <th>Status</th>
            <th>Date</th>
            <th>Payment</th>
            <th>Payment Status</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['student_id'] . '</td>';
            echo '<td>' . $row['prof_id'] . '</td>';
            echo '<td>' . $row['unit_id'] . '</td>';
            echo '<td>' . ($row['status'] == 0 ? 'Disapproved' : 'Approved') . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['payment'] . '</td>';
            echo '<td>' . ($row['payment_status'] == 0 ? 'Unpaid' : 'Paid') . '</td>';
            echo '</tr>';
        }
        ?>
    </table>

    <!-- Submit Button -->
    <button type="submit">Submit</button>
    
</body>
</html>

<?php
// Close the database connection
$stmt->close();
$conn->close();
?>
