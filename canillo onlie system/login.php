<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body class="body">
    <div class="form_deg">
        <center>
            <div class="header">
                <center class="title_deg">
                    Login Form
                    <h4>
                        <?php
                        session_start();
                        echo isset($_SESSION['loginMessage']) ? $_SESSION['loginMessage'] : '';
                        ?>
                    </h4>
                </center>

                <form action="login_check.php" method="POST" class="login_form">
                    <div>
                        <label>ID</label>
                        <input type="text" name="id" required>
                    </div>

                    <div>
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div>

                    <div>
                        <label>User Type</label>
                        <select name="usertype" required>
                            <option value="admin">Admin</option>
                            <option value="faculty">Faculty</option>
							 <option value="student">Student</option>
							  <option value="labrian">Labrian</option>
							   <option value="ssc">SSC</option>
							    <option value="casher">Casher</option>
								 <option value="department chairperson">Department Chairperson</option>
                            <!-- Add other user types as needed -->
                        </select>
                    </div>

                    <div> 
                        <input class="btn btn-primary" type="submit" name="submit" value="Login">
                    </div>
                </form>

                <!-- Display registration messages -->
                <?php
                echo isset($_SESSION['registerMessage']) ? $_SESSION['registerMessage'] : '';
                unset($_SESSION['registerMessage']); // Clear registration message
                ?>
                
                <!-- Link to registration page -->
                <p>Don't have an account? <a href="request_form.php">Register here</a>.</p>
            </div>
        </center>
    </div>
</body>
</html>





<Style>
body {
    font-family: Arial, sans-serif;
    background-image: url('msupic.jpg'); /* Replace with the path to your background image */
    background-size: cover;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

.login-container {
    background-color: rgba(255, 255, 255, 0.8); /* Adjust the alpha value as needed for transparency */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

</style>