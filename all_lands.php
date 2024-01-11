<?php
// include auth_session.php file on all user panel pages
include("auth_session.php");

// Get the username from the session
$username = $_SESSION["username"];

// SQL query with proper concatenation and prepared statement
$sqlQuery = "SELECT land.Land_id, land.location FROM land JOIN users ON users.User_id = land.User_id WHERE users.User_name = ?";
$con = mysqli_connect("localhost:3306", "root", "Naren@03561", "smartagriculture");

// Use prepared statement to prevent SQL injection
$stmt = mysqli_prepare($con, $sqlQuery);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

// Bind the result variables
mysqli_stmt_bind_result($stmt, $landId, $location);

// Fetch results
$data = array();
while (mysqli_stmt_fetch($stmt)) {
    $data[] = array('Land_id' => $landId, 'Location' => $location);
}

// Display the contents of the $data array
echo json_encode($data);

// Close the database connection
mysqli_close($con);
?>

