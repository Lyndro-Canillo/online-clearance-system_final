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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
</head>
<body>
    <h1>Welcome, Student <?php echo $studentId; ?></h1>

    <!-- Payment Form -->
    <form action="process_payment.php" method="post">
        <label for="amount">Amount:</label>
        <input type="text" name="amount" required>
        <input type="submit" value="Make Payment">
    </form>

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
