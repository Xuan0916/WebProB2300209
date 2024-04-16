<?php
// Include necessary files
require 'connection.php'; // Assuming this file establishes a database connection
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}

// Fetch user information from the database
$email = $_SESSION['email'];
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $conn->query($sql);

// Check if user exists
if ($result->num_rows > 0) {
    // User found, fetch user data
    $user = $result->fetch_assoc();
} else {
    // User not found
    echo "User not found.";
    exit;
}

// Check if form is submitted for updating profile or password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle profile update
    // Retrieve profile form data
    $userPhone = $_POST['userPhone'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $newPassword = $_POST['newPassword'] ?? '';

    // Update user information in the database
    $updateProfile = false;
    $updatePassword = !empty($newPassword);

    // Check if profile fields are changed
    if ($userPhone != $user['userPhone'] || $username != $user['username'] || $gender != $user['Gender']) {
        $updateProfile = true;
    }

    // Update user profile
    if ($updateProfile) {
        $sqlProfile = "UPDATE user SET userPhone = ?, username = ?, Gender = ? WHERE email = ?";
        $stmt = $conn->prepare($sqlProfile);
        $stmt->bind_param("ssss", $userPhone, $username, $gender, $email);
        if ($stmt->execute()) {
            echo "<script>alert('Profile updated successfully.');window.location.href = 'index2.php';</script>";
        } else {
            echo "<script>alert('Error updating profile: " . $conn->error . "');</script>";
        }
    }

    if (isset($_POST['deleteAccount'])) {
        // SQL to delete user's account
        $sqlDelete = "DELETE FROM user WHERE email = ?";
        $stmt = $conn->prepare($sqlDelete);
        $stmt->bind_param("s", $email);
        
        if ($stmt->execute()) {
            // Log the user out
            session_destroy();
            echo "<script>alert('Account deleted successfully.');window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Error deleting account: " . $conn->error . "');</script>";
        }
    }

// Update user password
if ($updatePassword) {
    // Store the new password as plain text
    $sqlPassword = "UPDATE user SET password = ? WHERE email = ?";
    $stmt = $conn->prepare($sqlPassword);
    $stmt->bind_param("ss", $newPassword, $email);
    if ($stmt->execute()) {
        echo "<script>alert('Password updated successfully.');window.location.href = 'index2.php';</script>";
    } else {
        echo "<script>alert('Error updating password: " . $conn->error . "');</script>";
    }
}
}

// Close database connection
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $system_name; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff0bb;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto; /* Added margin at the top and bottom */
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }


        .form-group {
            margin-bottom: 20px;
        }

        .delete-account-section {
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2><strong>User Profile</strong></h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
            </div>
            <div class="form-group">
                <label for="userPhone">Phone Number:</label>
                <input type="text" class="form-control" id="userPhone" name="userPhone" value="<?php echo $user['userPhone']; ?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="Male" <?php if ($user['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($user['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
                    <option value="Other" <?php if ($user['Gender'] == 'Other') echo 'selected'; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="newPassword">New Password:</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword">
            </div>
            <button type="submit" class="btn btn-primary" name="updateProfile">Save Changes</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='index2.php';">Back to home</button>

            <div class="delete-account-section">
                <h2>Delete Account</h2>
                <p>Warning: Deleting your account is irreversible.</p>
                <button type="submit" class="btn btn-danger" name="deleteAccount" onclick="return confirm('Are you sure you want to delete your account? This cannot be undone.');">Delete My Account</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <div class="index-content" id="H4"><?php include 'footer.php' ?></div>

</body>

</html>
