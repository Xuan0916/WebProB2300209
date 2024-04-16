<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carbon Footprint Record</title>
  <link rel="stylesheet" href="header2.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <style>
    /* Custom CSS styles */
    .progress {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
<?php include 'header3.php';?>
  <div class="container mt-5">
    <h1 data-aos="fade-up"><strong>Carbon Footprint Record</strong></h1>

    <?php
    session_start();

    // Include necessary files and establish database connection
    require 'connection.php';

    // Retrieve previous records
    $email = $_SESSION["email"];
    $sql = "SELECT * FROM questionnaire_responses WHERE email = '$email' ORDER BY submission_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output previous records in a table
        echo "<table class='table'>";
        echo "<thead><tr><th>Submission Date</th><th>Total Points</th></tr></thead>";
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            // Ensure 'submission_date' column exists in the table and is fetched successfully
            if (isset($row['submission_date'])) {
                echo "<tr><td>{$row['submission_date']}</td><td>{$row['total_points']}</td></tr>";
            }
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No previous records found.</p>";
    }

    // Retrieve the latest total points
    $latest_sql = "SELECT total_points FROM questionnaire_responses WHERE email = '$email' ORDER BY submission_date DESC LIMIT 1";
    $latest_result = $conn->query($latest_sql);

    if ($latest_result->num_rows > 0) {
        $latest_row = $latest_result->fetch_assoc();
        $total_points = $latest_row['total_points'];

        // Provide advice or recommendations based on total points and user's choices
        echo "<p>Latest carbon footprint: " . $total_points . "</p>";
        // Calculate progress percentage only if $total_points is numeric and greater than 0
        if (is_numeric($total_points) && $total_points > 0) {
            $progress_percentage = ($total_points / 100) * 100; // Assuming 100 is the maximum points
            echo "<div class='progress'><div class='progress-bar' role='progressbar' style='width: {$progress_percentage}%;' aria-valuenow='{$progress_percentage}' aria-valuemin='0' aria-valuemax='100'></div></div>";
        }
        if ($total_points > 50) {
            echo "<p>Your environmental impact is high. Consider reducing waste and using more sustainable transportation methods.</p>";
        } elseif ($total_points > 30) {
            echo "<p>You're making some positive choices but there's room for improvement.</p>";
        } else {
            echo "<p>Your environmental impact is relatively low. Keep up the good work!</p>";
        }
    } else {
        echo "<p>No result currently.</p>";
    }

    // Close database connection
    $conn->close();
    ?>
  </div>

  <div class="index-content" id="H4"><?php include 'footer.php' ?></div>

  

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
