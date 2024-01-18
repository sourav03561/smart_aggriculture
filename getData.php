<?php
header('Content-Type: application/json');

require_once('db.php');

// Prepare the SQL query using a prepared statement
$sqlQuery = "SELECT N, P, K, temperature, humidity, ph, rainfall FROM data";
$con = mysqli_connect("localhost:3306", "root", "Naren@03561", "smart_aggriculture");

// Check for a successful connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Prepare the statement
$stmt = $con->prepare($sqlQuery);

// Check if preparation was successful
if ($stmt === false) {
    die("Error preparing the statement: " . $con->error);
}

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the prepared statement
$stmt->close();

echo json_encode($data);

// Close the database connection
mysqli_close($con);
?>
