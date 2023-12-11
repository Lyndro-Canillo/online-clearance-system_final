<?php
// Include header
include 'header.php';

// Include sidebar
include 'sidebar.php';
?>

<?php
// Connect to your database (replace these values with your actual database credentials)
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

// Retrieve data from the "register" table for students
$sql = "SELECT id, first_name, middle_name, last_name, usertype FROM register WHERE usertype = 'student'";
$result = $conn->query($sql);

// Display the student table
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>User Type</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['middle_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['usertype']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No students found.";
}

// Close the database connection
$conn->close();
?>
<?php
// Include footer
include 'footer.php';
?>
<style>
/* Apply styles to the main content area */
main {
    background-image: url('msupic.jpg'); /* Replace with the path to your background image */
    background-size: cover;
    background-attachment: fixed;
    color: #fff;
    padding: 20px;
}

/* Style the table */
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #555;
    color: #fff;
}

/* Style the form for adding new records */
form {
    max-width: 400px;
    margin: 20px auto;
    background-color: #555;
    padding: 20px;
    border-radius: 8px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #fff;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Add more styles as needed */

</style>

<?php
// Include footer
include 'footer.php';
?>

