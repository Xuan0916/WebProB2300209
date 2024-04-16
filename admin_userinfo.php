<?php
require 'connection.php';

// Retrieve user data from the database
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $system_name; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
            color: #333;
        }
        td {
            background-color: #fff;
            color: #666;
        }
        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }
        .no-users {
            text-align: center;
            color: #666;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Information</h2>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Username</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['userPhone']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['Gender']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-users">No users found.</p>
        <?php endif; ?>
        <div class="back-btn">
            <a href="admin_index.php">Back to Home</a>
        </div>
    </div>
</body>
</html>
