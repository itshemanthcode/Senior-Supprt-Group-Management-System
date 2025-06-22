<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
                <p class="signup-text">Don't have an account? <a href="signup.php" class="btn"> Signup</a></p>
            </form>
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
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE LOWER(email) = LOWER(?)");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($pass, $row['password'])) {
            echo "Login successful. Welcome  . <a href='index.php'>Goback to home</a>";
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found.";
    }
    $stmt->close();
}
$conn->close();
?>