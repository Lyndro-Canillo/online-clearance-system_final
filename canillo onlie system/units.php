<!-- units.php -->
<?php
// Include header
include 'header.php';

// Include sidebar
include 'sidebar.php';
?>

<!-- Main Content -->
<main style="margin-left: 220px; padding: 20px;">

    <!-- Form for adding new units -->
    <h2>Add New Units</h2>
    <form action="process_units.php" method="post">
        <label for="id">User ID (from Register table):</label>
        <input type="text" name="id" required>

        <label for="id_units">Unit ID:</label>
        <input type="text" name="id_units" required>

        <label for="units">Units:</label>
        <input type="text" name="units" required>

        <!-- ... other fields ... -->

        <input type="submit" value="Add Units">
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
