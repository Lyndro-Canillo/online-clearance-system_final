<?php
session_start();
// Fetch the student ID from the URL
$student_id = $_GET['id'];

// Query the database to get student-specific information
$studentInfoSql = "SELECT * FROM register WHERE id = ?";
$studentInfoStmt = $conn->prepare($studentInfoSql);
$studentInfoStmt->bind_param("i", $student_id);
$studentInfoStmt->execute();
$result = $studentInfoStmt->get_result();

if ($result->num_rows > 0) {
    $studentData = $result->fetch_assoc();
    // Display the student information on the webpage
    echo "Welcome, Student " . $studentData['first_name'] . " " . $studentData['last_name'];
    // Display other student-specific information here
} else {
    echo "Student not found.";
}

// Close the "studentInfo" statement
$studentInfoStmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <!-- Add your styles or include external stylesheets here -->
</head>
<body>
    <!-- Display other student-specific information here -->
</body>
</html>
