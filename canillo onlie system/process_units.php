<!-- process_units.php -->
<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $id = $_POST["id"];
    $unit_id = $_POST["id_units"];
    $units = $_POST["units"];

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

    // Insert data into the "units" table
    $sql = "INSERT INTO units (id, unit_id, units) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the prepare was successful
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("iss", $id, $unit_id, $units);
    $stmt->execute();

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();

    // Redirect to the units page after submission
    header("Location: units.php");
    exit();
} else {
    // Redirect to the units page if accessed directly without POST data
    header("Location: units.php");
    exit();
}
?>
<style>
    body {
        background-image: url('msupic.jpg'); /* Replace with the path to your background image */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: Arial, sans-serif;
    }

    h2 {
        color: black; /* Text color for the heading */
    }
</style>
