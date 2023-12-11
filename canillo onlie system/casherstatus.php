<?php
// Include header
include 'header.php';

// Include sidebar
include 'sidebar3.php';

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

// Fetch payment data from the database
$sql = "SELECT * FROM payment";
$result = $conn->query($sql);

?>

<?php
// ... Your existing code ...

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    $action = $_POST["action"];
    $studentId = $_POST["student_id"];

    // Update payment status
    $sqlUpdate = "UPDATE payment SET status = ? WHERE student_id = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);

    if ($stmtUpdate) {
        // Set the status based on the action
        $status = ($action == "approve") ? 1 : -1;

        $stmtUpdate->bind_param("ii", $status, $studentId);
        $updateResult = $stmtUpdate->execute();

        if (!$updateResult) {
            echo "Error updating payment status: " . $stmtUpdate->error;
        }

        // Insert into paymentapprove table
        $sqlInsert = "INSERT INTO paymentapprove (student_id, status) VALUES (?, ?)";
        $stmtInsert = $conn->prepare($sqlInsert);

        if ($stmtInsert) {
            $stmtInsert->bind_param("ii", $studentId, $status);
            $insertResult = $stmtInsert->execute();

            if (!$insertResult) {
                echo "Error inserting into paymentapprove table: " . $stmtInsert->error;
            }
        } else {
            echo "Error in the prepared statement for paymentapprove table: " . $conn->error;
        }
    } else {
        echo "Error in the prepared statement for updating payment status: " . $conn->error;
    }
}

// ... Your existing code ...

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Casher Status</title>
</head>
<body>
    <h1>View Students</h1>

    <?php
       if ($result->num_rows > 0) {
      echo "<form method='post'>";
      echo "<table border='1'>";
       echo "<tr><th>Student ID</th><th>Date</th><th>Status</th><th>Action</th></tr>";

         while ($row = $result->fetch_assoc()) {
         echo "<tr>";
           echo "<td>" . $row['student_id'] . "</td>";
           echo "<td>" . $row['date'] . "</td>";

           // Check if 'status' key is set in the $row array
           $paymentStatus = isset($row['status']) ? getStatusText($row['status']) : 'Unknown';

            echo "<td>" . $paymentStatus . "</td>";

           echo "<td>
                <input type='hidden' name='student_id' value='" . $row['student_id'] . "'>"; // Move this line outside the loop
              echo "<button type='submit' name='action' value='approve'>Approve</button>
                <button type='submit' name='action' value='disapprove'>Disapprove</button>
              </td>";
               echo "</tr>";
    }

             echo "</table>";
             echo "</form>";
} else {
    echo "<p>No payment records available.</p>";
}

    // Close the database connection
    $conn->close();
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

        h1 {
            text-align: center;
            color: #fff;
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
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</style>
