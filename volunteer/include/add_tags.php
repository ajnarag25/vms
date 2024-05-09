<?php
include('connection.php');
session_start();
error_reporting(0);
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'skills' data is sent in the request
    if (isset($_POST["skills"])) {
        // Decode the JSON data sent from JavaScript
        $skills = json_decode($_POST["skills"], true);
        // You can now use $skills array as needed
        // For example, you can save it to a database, process it, etc.
        // Example: Save $skills array to a file
        if (!empty($skills) && is_array($skills)) {
            // Loop through each skill in the $skills array
            foreach ($skills as $index => $skill) {
                // Access individual skill properties (id and value)
                $volunteer_id = $_SESSION['id'];
                $username = $_SESSION['username'];
                $id = $skill['id'];
                $value = $skill['value'];
                $conn->query("INSERT INTO volunteer_skills (category_id, tag_name, volunteer_id, username) 
                VALUES('$id', '$value', '$volunteer_id', '$username')") or die($conn->error);
            }
        } else {
            // Handle case where $skills is empty or not an array
            window.alert("No skills found or invalid data format.");
            echo "No skills found or invalid data format.";
        }

        // Return success message
        echo "Skills saved successfully!";
    } else {
        // If 'skills' data is not sent in the request
        echo "Error: Skills data not found!";
    }
} else {
    // If the request is not a POST request
    echo "Error: Invalid request method!";
}
?>