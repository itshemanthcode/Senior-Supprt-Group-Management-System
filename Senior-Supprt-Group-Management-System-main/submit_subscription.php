<?php
// Database connection details
$servername = "localhost";
$username = "root";  // your MySQL username
$password = "";      // your MySQL password
$dbname = "senior_support";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];

    // Prepare the SQL query to insert data
    $stmt = $conn->prepare("INSERT INTO subscriptions (email, name, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $name, $message);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "<p style='color: green; text-align: center;'> WE HAVE RECEIVED YOUR MESSAGE,WE'LL GET BACK SOON . <b>Thank you!</b></p>";
        echo "<p style='text-align: center;'><a href='index.php' style='color: blue; text-decoration: none;'>Go back to Home</a></p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error: " . $stmt->error . "</p>";
    }
    

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>