<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Page</title>
    <link rel="stylesheet" href="careers.css">
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contact US</a></li>
                <li><a href="careers.php">Careers</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Support Section -->
    <section class="support-section">
        <div class="container">
            <h1>Support Center</h1>
            <p>If you have any issues or questions, feel free to contact us, and we’ll get back to you as soon as possible.</p>
            
            <div class="support-form">
                <h2>Contact Support</h2>
                <form action="submit_subscription.php" method="POST">
                    <input type="email" name="email" placeholder="Your Email" required>
                    <input type="text" name="name" placeholder="Your Name" required>
                    <textarea name="message" placeholder="Your Message" required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>

            <div class="contact-info">
                <h3>Contact Information:</h3>
                <p>For urgent matters, please reach us at:</p>
                <p>Email: support@example.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Senior-Support-Group, All rights reserved.</p>
    </footer>
</body>
</html>