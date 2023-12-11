<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $usertype = $_POST["usertype"];
    $password = $_POST["password"];

    // Database connection details
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

    // Insert data into the "register" table
    $registerSql = "INSERT INTO register (id, first_name, middle_name, last_name, usertype, password)
                    VALUES (?, ?, ?, ?, ?, ?)";
    $registerStmt = $conn->prepare($registerSql);

    if ($registerStmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $registerStmt->bind_param("isssss", $id, $first_name, $middle_name, $last_name, $usertype, $hashedPassword);
    $registerStmt->execute();

    // Check if the registration was successful
    if ($registerStmt->affected_rows > 0) {
        // Insert data into the "loginuser" table
        $loginuserSql = "INSERT INTO loginuser (id, username, password, usertype)
                        VALUES (?, ?, ?, ?)";
        $loginuserStmt = $conn->prepare($loginuserSql);

        if ($loginuserStmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $loginuserStmt->bind_param("isss", $id, $first_name, $hashedPassword, $usertype);
        $loginuserStmt->execute();

        // Check if the creation of the account was successful
        if ($loginuserStmt->affected_rows > 0) {
            echo "Account created successfully!";
        } else {
            echo "Error creating account. Please try again.";
        }
    } else {
        echo "Error registering. Please try again.";
    }

    // Close the database connection
    $registerStmt->close();
    $loginuserStmt->close();
    $conn->close();
}
?>

