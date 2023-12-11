
<?php

// Include header
include 'header.php';

// Include sidebar
include 'sidebar.php';

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

// Retrieve notifications for the admin
$sqlNotifications = "SELECT * FROM user_requests";
$resultNotifications = $conn->query($sqlNotifications);

?>

<!-- Main Content -->
<main style="margin-left: 220px; padding: 20px; background-image: url('background_image.jpg'); background-size: cover; background-attachment: fixed; color: #fff; text-align: center;">
    <h2>Welcome to MSU-MSAT Online Clearance System</h2>
    <p>Main content of Admin Home Page</p>
    <a href="logout.php">Logout</a>

    <!-- Display notifications -->
    <div style="margin-top: 20px;">
    <h3>Notifications</h3>
    <?php
    if ($resultNotifications->num_rows > 0) {
        while ($row = $resultNotifications->fetch_assoc()) {
            echo "<p style='color: black;'>{$row['request_message']} <a href='delete_notification.php?id={$row['id']}'>Delete</a></p>";
        }
    } else {
        echo "<p style='color: black;'>No notifications available.</p>";
    }
    ?>
</div>

    <!-- Buttons -->
    <div style="margin-top: 20px;">
        <a href="register.php"><button>Register</button></a>
    </div>
</main>

<?php
// Include footer
include 'footer.php';

// Close the database connection
$conn->close();
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

    button {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>

