<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $event_description = mysqli_real_escape_string($conn, $_POST['event_description']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $event_venue = mysqli_real_escape_string($conn, $_POST['event_venue']);
    $organizer = mysqli_real_escape_string($conn, $_POST['organizer']);

    // Insert event into database
    $sql = "INSERT INTO events (event_name, event_description, event_date, duration, event_venue, organizer) VALUES ('$event_name', '$event_description', '$event_date', '$duration', '$event_venue', '$organizer')";
    if ($conn->query($sql) === TRUE) {
        // Event inserted successfully
        header("Location: admin_event.php"); // Redirect to event index page
        exit;
    } else {
        // Error inserting event
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Add Event</h1>
        <form method="post" action="event_register.php">
            <div class="form-group">
                <label for="event_name">Event Name</label>
                <input type="text" class="form-control" id="event_name" name="event_name" required>
            </div>
            <div class="form-group">
                <label for="event_description">Event Description</label>
                <textarea class="form-control" id="event_description" name="event_description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="time" class="form-control" id="duration" name="duration" required>
            </div>
            <div class="form-group">
                <label for="event_venue">Event Venue</label>
                <input type="text" class="form-control" id="event_venue" name="event_venue">
            </div>
            <div class="form-group">
                <label for="organizer">Organizer</label>
                <input type="text" class="form-control" id="organizer" name="organizer">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
