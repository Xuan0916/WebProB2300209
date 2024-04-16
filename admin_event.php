<?php
require 'connection.php';

// Fetch events from the database
$sql = "SELECT * FROM events";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: lemonchiffon; /* Set your desired background color */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Event Index</h1>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['event_name']; ?></h5>
                        <p class="card-text"><strong>Date:</strong> <?php echo $row['event_date']; ?></p>
                        <p class="card-text"><strong>Duration:</strong> <?php echo $row['duration']; ?></p>
                        <p class="card-text"><strong>Description:</strong> <?php echo $row['event_description']; ?></p>
                        <p class="card-text"><strong>Organizer:</strong> <?php echo $row['organizer']; ?></p>
                        <p class="card-text"><strong>Venue:</strong> <?php echo $row['event_venue']; ?></p>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p>No events found.</p>";
            }
            ?>
        </div>
        <a href="event_register.php" class="btn btn-primary mb-3">Add Event</a>
        <a href="admin_index.php" class="btn btn-secondary mb-3">Back to Home</a>
    </div>
    <div class="index-content" id="H4"><?php include 'footer.php' ?></div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
