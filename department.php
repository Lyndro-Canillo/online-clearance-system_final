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

// Retrieve data from the "register" and "units" tables for the department
$sql = "SELECT r.id, r.first_name, r.middle_name, r.last_name, r.usertype, u.unit_id, u.units
        FROM register r
        LEFT JOIN units u ON r.id = u.id
        WHERE r.usertype = 'faculty'"; // Assuming 'faculty' is the desired usertype for the department

$result = $conn->query($sql);

// Display the department information
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>User Type</th>
                <th>Unit ID</th>
                <th>Units</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['middle_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['usertype']}</td>
                <td>{$row['unit_id']}</td>
                <td>{$row['units']}</td>
            </tr>";
    }

    echo "</table>";
	
} else {
    echo "No faculty members found.";
}


// Close the database connection
$conn->close();
?>	
<!DOCTYPE html>
<html>
<head>
</head>

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
    background-color: rgba(255, 255, 255, 0.5); /* Transparent white background */
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

/* Navigation for only 5 views */
.navigation {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.prev, .next {
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

