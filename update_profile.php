<?php
// update_profile.php

// Database connection details
$hostname = "localhost:3306";
$username = "root";
$password = "Naren@03561";
$database = "smartagriculture";
include("auth_session.php");

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the updated values from the AJAX request
$newUsername = isset($_POST["newUsername"]) ? $_POST["newUsername"] : "";
$newEmail = isset($_POST["newEmail"]) ? $_POST["newEmail"] : "";
$newPhone = isset($_POST["newPhone"]) ? $_POST["newPhone"] : "";
$newAddress = isset($_POST["newAddress"]) ? $_POST["newAddress"] : "";
$user = isset($_SESSION["username"]) ? $_SESSION["username"] : "";

// Prepare and execute the SQL update statement
$sql = "UPDATE smartagriculture.users SET User_name=?, Email_id=?, PhoneNumber=?, Address=? WHERE User_name=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $newUsername, $newEmail, $newPhone, $newAddress, $user);

if ($stmt->execute()) {
    // Update successful
    echo "Profile updated successfully";
} else {
    // Update failed
    echo "Error updating profile: " . $stmt->error;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>
