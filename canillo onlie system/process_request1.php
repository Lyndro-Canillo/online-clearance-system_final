<?php
// Include database connection code

// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clearance_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process user request form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $firstName = $_POST["first_name"];
    $middleName = $_POST["middle_name"];
    $lastName = $_POST["last_name"];
    $userType = $_POST["user_type"];
    $requestMessage = $_POST["request_message"];

    // Save the request details in the database
    $sql = "INSERT INTO user_requests (id, first_name, middle_name, last_name, user_type, request_message) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $id, $firstName, $middleName, $lastName, $userType, $requestMessage);
    
    if ($stmt->execute()) {
        echo "Request submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
