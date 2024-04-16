<?php
// Require database connection
require 'connection.php';

// Check if the feedback table exists
$tableExistsQuery = "SHOW TABLES LIKE 'feedback'";
$tableExistsResult = $conn->query($tableExistsQuery);

if ($tableExistsResult->num_rows == 0) {
    // Table doesn't exist, create it
    $createTableQuery = "CREATE TABLE feedback (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        feedback TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $createTableResult = $conn->query($createTableQuery);

    if (!$createTableResult) {
        // Table creation failed, display error message
        die("Error creating feedback table: " . $conn->error);
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    // Prepare and execute the SQL statement to insert data into the feedback table
    $insertQuery = "INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sss", $name, $email, $feedback);
    
    if ($stmt->execute()) {
        // Feedback successfully submitted
        echo "Thank you for your feedback! Redirecting you back to the homepage...";
        // Redirect the user to the index page after 2 seconds
        header("refresh:1;url=index2.php");
        exit; // Prevent further execution of the script
    } else {
        // Error occurred while submitting feedback
        echo "Error submitting feedback: " . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        p {
            margin-bottom: 20px;
            color: #666;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        textarea {
            height: 150px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            color: green;
            margin-top: 10px;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php include 'header3.php';?>
    <div class="container">
        <h2>Website Feedback Form</h2>
        <p>We appreciate your feedback! Please let us know your thoughts about our website.</p>
        <?php
        // Include your PHP code here
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="feedback">Your Feedback:</label>
                <textarea id="feedback" name="feedback" required></textarea>
            </div>
            <div>
                <input type="submit" value="Submit Feedback">
            </div>
        </form>
    </div>
    <div class="index-content" id="H4"><?php include 'footer.php' ?></div>
</body>
</html>

