<?php
// updateChartData.php

// Replace these with your database connection details
$servername = "localhost:3306";
$username = "root";
$password = "Naren@03561";
$dbname = "smartagriculture";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve values from the AJAX request
$landId = $_POST['landId'];
$sensorTypeId = $_POST['sensorTypeId'];
$sensor = $_POST['sensor'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

// Fetch updated data from the database based on user input
$sql = "SELECT sd.Date, sd.Time, sd.value
        FROM sensors s
        JOIN sensordata sd ON s.Sensor_id = sd.Sensor_id
        WHERE s.Land_id = $landId
        AND s.Sensor_typeid = $sensorTypeId
        AND s.Sensor_id=$sensor
        AND sd.Date BETWEEN '$startDate' AND '$endDate'
        ORDER BY sd.Date, sd.Time";

$result = $conn->query($sql);

// Process data for Chart.js
$updatedData = array();
while ($row = $result->fetch_assoc()) {
    $updatedData[] = array(
        "date" => $row["Date"] . " " . $row["Time"],
        "value" => $row["value"]
    );
}

// Close connection
$conn->close();

// Return the updated data as JSON
echo json_encode($updatedData);
?>
