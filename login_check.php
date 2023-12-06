<?php
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $id = $_POST["id"];
    $password = $_POST["password"];
    $usertype = $_POST["usertype"];

    // Database connection details
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "clearance_system";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query
    $sql = "SELECT * FROM register WHERE id='$id' AND password='$password' AND usertype='$usertype'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Check if a matching user was found
        if ($result->num_rows > 0) {
            // User is authenticated, set session variables
            $_SESSION['user_id'] = $id;
            $_SESSION['user_type'] = $usertype;

            // Redirect to the appropriate dashboard based on usertype
            switch ($usertype) {
                case 'admin':
                    header("Location: admin_dashboard.php");
                    break;
                case 'faculty':
                    header("Location: faculty_dashboard.php");
                    break;
                case 'student':
                    header("Location: student_dashboard.php");
                    break;
                case 'labrian':
                    header("Location: labrian_dashboard.php");
                    break;
                case 'ssc':
                    header("Location: ssc_dashboard.php");
                    break;
                case 'casher':
                    header("Location: casher_dashboard.php");
                    break;
                case 'department chairperson':
                    header("Location: department_chairperson_dashboard.php");
                    break;
                // Add other user types as needed
                default:
                    header("Location: login.php");
                    break;
            }

            exit();
        } else {
            // No matching user found
            $_SESSION['loginMessage'] = "Invalid credentials. Please try again.";
            header("Location: login.php");
            exit();
        }
    } else {
        // Query execution failed
        $_SESSION['loginMessage'] = "Error executing the query. Please try again.";
        header("Location: login.php");
        exit();
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the login page if accessed directly without POST data
    header("Location: login.php");
    exit();
}
?>
