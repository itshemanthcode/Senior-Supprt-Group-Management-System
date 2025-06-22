<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior Support Group - Virtual Chat Meetup</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298); /* Gradient Background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff;
        }

        .container {
            width: 90%;
            max-width: 600px;
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #2a5298;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #1e3c72;
            box-shadow: 0 0 8px rgba(30, 60, 114, 0.3);
        }

        .submit-btn {
            display: flex;
            justify-content: center;
        }

        button {
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 700;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background: linear-gradient(to right, #4caf50, #43a047);
            color: #fff;
            transition: all 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #43a047, #388e3c);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Senior Dance and Music Night</h1>
        <p>Fill out the form below to join fentastic Dance and Music Night.</p>
        <form action="dj_night.php" method="POST">
            <!-- Full Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter your address">
            </div>

            <!-- Submit Button -->
            <div class="submit-btn">
                <button type="submit">Register Now</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Default MySQL username
$password = ""; // Default MySQL password
$dbname = "dance_night";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    // Prepare SQL statement to insert data
    $sql = "INSERT INTO registrations (name, email, phone, address) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $name, $email, $phone, $address);
        if ($stmt->execute()) {
              "Registration successful! Thank you, " . htmlspecialchars($name) . ".";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error in preparing the statement: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>