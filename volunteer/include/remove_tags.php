<?php
include('connection.php');
session_start();
error_reporting(0);
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (isset($_POST["Deleteskills"])) {
        // DELETE FROM `volunteer_skills` WHERE `category_id`='5';
        $Deleteskills = json_decode($_POST["Deleteskills"], true);
        // You can now use $Deleteskills array as needed
        // For example, you can save it to a database, process it, etc.
        // Example: Save $Deleteskills array to a file
        if (!empty($Deleteskills) && is_array($Deleteskills)) {
            // Loop through each skill in the $skills array
            foreach ($Deleteskills as $index => $Deleteskills) {
                // Access individual skill properties (id and value)
                $volunteer_id = $_SESSION['id'];
                $username = $_SESSION['username'];
                $id = $Deleteskills['id'];
                $value = $Deleteskills['value'];
                $conn->query("DELETE FROM `volunteer_skills` WHERE `volunteer_id`='$volunteer_id' && `username`='$username' && `category_id`='$id' && `tag_name`='$value'") or die($conn->error);
            }
        } else {
            // Handle case where $skills is empty or not an array
            window.alert("No skills found or invalid data format.");
            echo "No skills found or invalid data format.";
        }
        echo "Skills deleted successfully!";
    } else {
        // If 'skills' data is not sent in the request
        echo "Error: Skills data not found!";
    }
} else {
        // If the request is not a POST request
        echo "Error: Invalid request method!";
}
?>