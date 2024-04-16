<?php
require 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $system_name?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body> 
<?php include 'header3.php';?>
    <form action="calculate_score.php" method="POST">
        <div class="container form-background mt-4">
            <h2 class="text-center mb-4">Carbon Footprint Questionnaire</h2>
                
                <div class="card mt-4 p-4">
                    <!-- Question 1: Household Members -->
                    <p>1. Count the members of your household:</p>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_members" value="1" id="alone">
                        <label class="form-check-label" for="alone">Live alone</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_members" value="2" id="share1">
                        <label class="form-check-label" for="share1">Share with 1 other person</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_members" value="3" id="share2">
                        <label class="form-check-label" for="share2">Share with 2 other person</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_members" value="4" id="share3">
                        <label class="form-check-label" for="share3">Share with 3 other person</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_members" value="5" id="share4">
                        <label class="form-check-label" for="share4">Share with 4 other person</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_members" value="6" id="share5">
                        <label class="form-check-label" for="share5">Share with 5 other person</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_members" value="7" id="share6">
                        <label class="form-check-label" for="share6">Share with 6 other person</label>
                    </div>
                </div>
                
                <div class="card mt-4 p-4">
                    <!-- Question 2: Home Size -->
                    <p>2. Consider the size of your home:</p>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="home_size" value="large" id="large">
                        <label class="form-check-label" for="large">Large</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="home_size" value="medium" id="medium">
                        <label class="form-check-label" for="medium">Medium</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="home_size" value="small" id="small">
                        <label class="form-check-label" for="small">Small</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="home_size" value="apartment" id="apartment">
                        <label class="form-check-label" for="apartment">Apartment</label>
                    </div>
                </div>

                <div class="card mt-4 p-4">
                    <!-- Question 3: Food Choices -->
                    <p>3. Evaluate your food choices:</p>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="food_choices" value="daily_meat" id="daily_meat">
                        <label class="form-check-label" for="daily_meat">Eat domestic meat daily</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="food_choices" value="few_times_meat" id="few_times_meat">
                        <label class="form-check-label" for="few_times_meat">Eat domestic meat a few times per week</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="food_choices" value="vegeterian" id="vegeterian">
                        <label class="form-check-label" for="vegeterian">Vegeterian</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="food_choices" value="vegan_wild_meat" id="vegan_or_wild_meat">
                        <label class="form-check-label" for="vegan_or_wild_meat">Vegan or only eat wild meat</label>
                    </div>
                </div>

                <div class="card mt-4 p-4">
                    <!-- Question 4: Examine your water consumption -->
                    <p>4. Examine your water consumption:</p>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="washing_machine_frequency" value="more_than_9_times" id="more_than_9_times">
                        <label class="form-check-label" for="more_than_9_times">More than 9 times per week</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="washing_machine_frequency" value="4_to_9_times" id="4_to_9_times">
                        <label class="form-check-label" for="4_to_9_times">4 to 9 times per week</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="washing_machine_frequency" value="1_to_3_times" id="1_to_3_times">
                        <label class="form-check-label" for="1_to_3_times">1 to 3 times per week</label>
                    </div>
                </div>

                <div class="card mt-4 p-4">
                    <!-- Question 5: Household Purchases -->
                    <p>5. Determine how many household purchases you make each year:</p>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_purchases" value="8" id="more_than_7">
                        <label class="form-check-label" for="more_than_7">More than 7 new items per year</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_purchases" value="6" id="5_to_7">
                        <label class="form-check-label" for="5_to_7">5 to 7 new items per year</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_purchases" value="4" id="3_to_5">
                        <label class="form-check-label" for="3_to_5">3 to 5 times per week</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_purchases" value="2" id="less_than_3">
                        <label class="form-check-label" for="less_than_3">Less than 3</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="household_purchases" value="0" id="zero">
                        <label class="form-check-label" for="zero">Almost nothing or secondhand items</label>
                    </div>
                </div>

                <div class="card mt-4 p-4">
                    <!-- Question 6: Waste Production -->
                    <p>6. Consider how much waste you produce:</p>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waste_production" value="4" id="4cans">
                        <label class="form-check-label" for="4cans">Fill 4 garbage cans per week</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waste_production" value="3" id="3cans">
                        <label class="form-check-label" for="3cans">Fill 3 garbage cans per week</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waste_production" value="2" id="2cans">
                        <label class="form-check-label" for="2cans">Fill 2 garbage cans per week</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waste_production" value="1" id="1can">
                        <label class="form-check-label" for="1can">Fill 1 garbage can per week</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="waste_production" value="0.5" id="halfcans">
                        <label class="form-check-label" for="halfcans">Fill half a garbage can or less per week</label>
                    </div>
                </div>

                <div class="card mt-4 p-4">
                    <!-- Question 7: Recycling -->
                    <p>7. Identify the amount of waste that you recycle:</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="recycled_items[]" id="noRecycling" value="none" onclick="disableCheckboxes()">
                        <label class="form-check-label" for="noRecycling">Do not recycle</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="recycled_items[]" id="glass" value="glass">
                        <label class="form-check-label" for="glass">Glass</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="recycled_items[]" id="plastic" value="plastic">
                        <label class="form-check-label" for="plastic">Plastic</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="recycled_items[]" id="paper" value="paper">
                        <label class="form-check-label" for="paper">Paper</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="recycled_items[]" id="aluminum" value="aluminum">
                        <label class="form-check-label" for="aluminum">Aluminum</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="recycled_items[]" id="steel" value="steel">
                        <label class="form-check-label" for="steel">Steel</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="recycled_items[]" id="foodWaste" value="food_waste">
                        <label class="form-check-label" for="foodWaste">Food waste (composting)</label>
                    </div>
                </div>
                <script>
                function disableCheckboxes() {
                    var checkboxes = document.querySelectorAll('input[type="checkbox"][name="recycled_items[]"]');
                    var noRecyclingRadio = document.getElementById('noRecycling');

                    if (noRecyclingRadio.checked) {
                        checkboxes.forEach(function(checkbox) {
                            checkbox.disabled = true;
                            checkbox.checked = false;
                        });
                    } else {
                        checkboxes.forEach(function(checkbox) {
                            checkbox.disabled = false;
                        });
                    }
                }
                </script>

                <div class="card mt-4 p-4">
                    <!-- Question 8: Transportation -->
                    <p>8. Tally up your annual transportation scores:</p>
                    <div class="col-md-4">
                        <!-- Personal Vehicle Miles -->
                        <label for="personal_vehicle_miles" class="form-label">Annual Personal Vehicle Miles:</label>
                        <input type="number" id="personal_vehicle_miles" name="personal_vehicle_miles" class="form-control" min="0">
                    </div>
                    <div class="col-md-4">
                        <!-- Public Transportation Miles -->
                        <label for="public_transportation_miles" class="form-label">Annual Public Transportation Miles:</label>
                        <input type="number" id="public_transportation_miles" name="public_transportation_miles" class="form-control" min="0">
                    </div>
                    <div class="col-md-4">
                        <!-- Flight Distance -->
                        <label for="flight_distance" class="form-label">Flight Distance:</label>
                        <select id="flight_distance" name="flight_distance" class="form-select">
                            <option value="short_distances">Short distances (within state)</option>
                            <option value="medium_distances">Medium distances (to nearby state or country)</option>
                            <option value="long_distances">Long distances (to another continent)</option>
                        </select>
                    </div>
                </div>
                <div class="container d-flex justify-content-center mt-4 button-container">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            
        <br>
        </div>
    </form>

</body>

<div class="index-content mt-4" id="H4"><?php include 'footer.php' ?></div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
