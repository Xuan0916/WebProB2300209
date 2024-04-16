<?php
require 'connection.php';
session_start();


// Function to calculate total points
function calculateTotalPoints($household_members, $home_size, $food_choices, $washing_machine_frequency, $household_purchases, $waste_production, $recycled_items, $personal_vehicle_miles, $public_transportation_miles, $flight_distance) {
    
    $total_points = 0;
    // Step 1: Count the members of your household
    if ($household_members == 1) {
        $total_points += 14;
    } elseif ($household_members == 2) {
        $total_points += 12;
    } elseif ($household_members == 3) {
        $total_points += 10;
    } elseif ($household_members == 4) {
        $total_points += 8;
    } elseif ($household_members == 5) {
        $total_points += 6;
    } elseif ($household_members > 5) {
        $total_points += 4;
    }

    // Step 2: Consider the size of your home
    if (!empty($home_size)) {
        if ($home_size == "large") {
            $total_points += 10;
        } elseif ($home_size == "medium") {
            $total_points += 7;
        } elseif ($home_size == "small") {
            $total_points += 4;
        } elseif ($home_size == "apartment") {
            $total_points += 2;
        }
    } else {
        // Handle the case where the user doesn't select an option (optional)
        // For example, you can display a message or set a default value for $total_points
    }

    // Step 3: Evaluate your food choices
    if ($food_choices == "daily_meat") {
        $total_points += 10;
    } elseif ($food_choices == "few_times_meat") {
        $total_points += 8;
    } elseif ($food_choices == "vegetarian") {
        $total_points += 4;
    } elseif ($food_choices == "vegan_wild_meat") {
        $total_points += 2;
    }

    // Step 4: Examine your water consumption
    if ($washing_machine_frequency == "more_than_9_times") {
        $total_points += 10;
    } elseif ($washing_machine_frequency == "4_to_9_times") {
        $total_points += 7;
    } elseif ($washing_machine_frequency == "1_to_3_times") {
        $total_points += 4;
    } 
    
    // Step 5: Determine how many household purchases you make each year
    if ($household_purchases > 7) {
        $total_points += 10;
    } elseif ($household_purchases >= 5 && $household_purchases <= 7) {
        $total_points += 8;
    } elseif ($household_purchases >= 3 && $household_purchases <= 5) {
        $total_points += 6;
    } elseif ($household_purchases < 3) {
        $total_points += 4;
    } elseif ($household_purchases = 0) {
        $total_points += 0;
    }

    // Step 6: Consider how much waste you produce
    if ($waste_production == 4) {
        $total_points += 50;
    } elseif ($waste_production == 3) {
        $total_points += 40;
    } elseif ($waste_production == 2) {
        $total_points += 30;
    } elseif ($waste_production == 1) {
        $total_points += 20;
    } elseif ($waste_production == 0.5) {
        $total_points += 5;
    }

    // Identify the amount of waste that you recycle
    if ($recycled_items == "none") {
        $total_points += 24;
    } else {
    // Convert $recycled_items string to an array
        $recycled_items_array = explode(', ', $recycled_items);
        $total_points -= (4 * count($recycled_items_array));
    }


    // Step 8: Tally up your annual transportation scores
    if ($personal_vehicle_miles > 15000) {
        $total_points += 12;
    } elseif ($personal_vehicle_miles >= 10000 && $personal_vehicle_miles <= 15000) {
        $total_points += 10;
    } elseif ($personal_vehicle_miles >= 1000 && $personal_vehicle_miles < 10000) {
        $total_points += 6;
    } elseif ($personal_vehicle_miles < 1000) {
        $total_points += 4;
    }

    return $total_points;
}

$email = $_SESSION["email"];
echo $email;

// Create the table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS questionnaire_responses (
    email VARCHAR(255),
    household_members INT,
    home_size VARCHAR(50),
    food_choices VARCHAR(255),
    washing_machine_frequency VARCHAR(255),
    household_purchases VARCHAR(255),
    waste_production VARCHAR(255),
    recycling VARCHAR(255),
    personal_vehicle_miles VARCHAR(255),
    public_transportation_miles VARCHAR(255),
    flight_distance VARCHAR(255),
    total_points INT(255),
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table registration created successfully \n";
} else {
    echo "Error creating table: " . $conn->error;
}

$result = $conn->query("SHOW COLUMNS FROM questionnaire_responses LIKE 'question_id'");
if ($result->num_rows == 0) {
    // 'question_id' column doesn't exist, so add it
    $sql = "ALTER TABLE questionnaire_responses ADD COLUMN question_id INT AUTO_INCREMENT PRIMARY KEY";
    if ($conn->query($sql) === TRUE) {
        echo "Column 'question_id' added successfully";
    } else {
        echo "Error adding column: " . $conn->error;
    }
} else {
    echo "Column 'question_id' already exists";
}


// Retrieve form data
$household_members = $_POST['household_members'];
$home_size = $_POST['home_size'];
$food_choices = $_POST['food_choices'];
$washing_machine_frequency = $_POST['washing_machine_frequency'];
$household_purchases = $_POST['household_purchases'];
$waste_production = $_POST['waste_production'];
$recycled_items = !empty($_POST['recycled_items']) ? implode(', ', $_POST['recycled_items']) : '';
$personal_vehicle_miles = $_POST['personal_vehicle_miles'];
$public_transportation_miles = $_POST['public_transportation_miles'];
$flight_distance = $_POST['flight_distance'];

$total_points = calculateTotalPoints($household_members, $home_size, $food_choices, $washing_machine_frequency, $household_purchases, $waste_production, $recycled_items, $personal_vehicle_miles, $public_transportation_miles, $flight_distance);
// Prepare SQL statement for insertion
$stmt = $conn->prepare("INSERT INTO questionnaire_responses (
    email, 
    household_members, 
    home_size, 
    food_choices, 
    washing_machine_frequency, 
    household_purchases, 
    waste_production, 
    recycling, 
    personal_vehicle_miles, 
    public_transportation_miles, 
    flight_distance,
    total_points
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters and execute the statement
$stmt->bind_param("sisssssssssi", 
    $email, 
    $household_members, 
    $home_size, 
    $food_choices, 
    $washing_machine_frequency, 
    $household_purchases, 
    $waste_production, 
    $recycled_items, // Use $recycled_items here 
    $personal_vehicle_miles, 
    $public_transportation_miles, 
    $flight_distance,
    $total_points
);

if ($stmt->execute()) {
    echo "Data inserted successfully.";

    // Redirect to history page
    header("Location: record.php?total_points=$total_points");
    exit;
} else {
    echo "Error inserting data: " . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
