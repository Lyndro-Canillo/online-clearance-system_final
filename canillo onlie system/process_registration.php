<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $usertype = $_POST["usertype"];
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

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

    // Insert data into the "register" table
    $registerSql = "INSERT INTO register (id, first_name, middle_name, last_name, usertype, password) VALUES (?, ?, ?, ?, ?, ?)";
    $registerStmt = $conn->prepare($registerSql);

    // Check if the prepare was successful
    if ($registerStmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $registerStmt->bind_param("isssss", $id, $first_name, $middle_name, $last_name, $usertype, $password);

    // Execute the prepared statement
    if ($registerStmt->execute()) {
        // Close the "register" statement
        $registerStmt->close();

        // Close the database connection
        $conn->close();

        // Redirect back to admin_dashboard.php
        header("Location: admin_dashboard.php");
        exit();
    } else {
        die("Execute failed: " . $registerStmt->error);
    }
}
?>
