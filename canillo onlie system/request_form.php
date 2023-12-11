<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Request Form</title>
</head>
<body>
    <h1>User Request Form</h1>

    <form action="process_request1.php" method="post">
        <label for="id">ID:</label>
        <input type="text" name="id" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>

        <label for="middle_name">Middle Name:</label>
        <input type="text" name="middle_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label for="user_type">User Type:</label>
        <input type="text" name="user_type" required><br>

        <label for="request_message">Request Message:</label>
        <textarea name="request_message" required></textarea><br>

        <input type="submit" value="Submit Request">
    </form>
</body>
</html>
