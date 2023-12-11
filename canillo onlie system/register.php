<?php
// Include header
include 'header.php';

// Include sidebar
include 'sidebar.php';
?>


  <!-- Form for adding new records -->
<h2>Add New Record</h2>
<form action="process_registration.php" method="post">
    <label for="id">ID:</label>
    <input type="text" name="id" required>

    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required>

    <label for="middle_name">Middle Name:</label>
    <input type="text" name="middle_name">

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required>

    <!-- Use a dropdown menu for selecting the user type -->
    <label for="usertype">User Type:</label>
    <select name="usertype" required>
        <option value="admin">Admin</option>
        <option value="faculty">Faculty</option>
        <option value="student">Student</option>
		 <option value="scc">SSC</option>
		  <option value="casher">Casher</option>
		   <option value="labrian">Labrian</option>
		    <option value="department chairperson">Department ChairPerson</option>
        <!-- Add other user types as needed -->
    </select>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <!-- ... other fields ... -->

    <input type="submit" value="Add Record">
</form>

</main>
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
    background-color: rgba(85, 85, 85, 0.7); /* Adjust the alpha value as needed */
    padding: 20px;
    border-radius: 8px;
}

/* ... other styles ... */

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
