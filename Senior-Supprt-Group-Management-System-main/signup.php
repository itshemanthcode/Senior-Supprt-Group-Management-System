<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS file -->
    
</head>
<body>

    <!-- Background Image -->
    <div class="background-image"></div>

    <!-- Sign Up Container -->
    <div class="signup-container">
        <h2>Create Account</h2>
        
        <form action="signup.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

                <a href="index.php">
                    <button type="submit" class="signup-btn">Sign Up</button>
                </a>
        </form>

        <div class="footer-text">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your MySQL password
$dbname = "senior_support";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    $check_query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_query->bind_param("s", $email);
    $check_query->execute();
    $result = $check_query->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        echo "<p style='color: red; text-align: center;'>This email is already in use, Try another email</p>";
    } else {
        // Insert new user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user, $email, $pass);

        if ($stmt->execute()) {
            // Redirect to index.php after successful signup
            header("Location: index.php");
            exit(); // Ensure no further code is executed after redirection
        } else {
            echo "<p style='color: red; text-align: center;'>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }

    $check_query->close();
}

$conn->close();
?>