<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Default username for MySQL
$password = ""; // Default password (leave blank if not set)
$dbname = "user_signup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>