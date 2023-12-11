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

// Pagination variables
$recordsPerPage = 5;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $recordsPerPage;

// Retrieve data from the "register" table with pagination
$sql = "SELECT id, first_name, middle_name, last_name, usertype, password FROM register LIMIT $offset, $recordsPerPage";
$result = $conn->query($sql);

// Display the table
echo "<main style='margin-left: 220px; padding: 20px;'>";
echo "<h2>Register Table</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>User Type</th>
                <th>Password</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['middle_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['usertype']}</td>
                <td>{$row['password']}</td>
            </tr>";
    }

    echo "</table>";

    // Pagination links
    $totalPages = ceil($conn->query("SELECT COUNT(*) FROM register")->fetch_row()[0] / $recordsPerPage);
    echo "<div style='margin-top: 20px;'>";
    if ($page > 1) {
        echo "<a href='?page=".($page - 1)."'>Previous</a> ";
    }

    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?page=$i'>$i</a> ";
    }

    if ($page < $totalPages) {
        echo "<a href='?page=".($page + 1)."'>Next</a>";
    }
    echo "</div>";
} else {
    echo "<p>No records found.</p>";
}

echo "</main>";

// Close the database connection
$conn->close();
?>
<?php
// Include footer
include 'footer.php';
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
