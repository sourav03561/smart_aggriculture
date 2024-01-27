<?php
header('Content-Type: application/json');

require_once('db.php');

$land = isset($_POST['Land']) ? $_POST['Land'] : '';
$sensor = isset($_POST['Sensor']) ? $_POST['Sensor'] : '';

// Assuming you have a database connection established in db.php
// Make sure to replace the placeholders with the actual connection details
$hostname = "localhost:3306";
$username = "root";
$password = "Naren@03561";
$database = "smartagriculture";

$con = mysqli_connect($hostname, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$land = (int)$land;
$sensor = (int)$sensor;
// Assuming 'sensors' table has columns like 'Land_id', 'Sensor_typeid', etc.
$sqlQuery = "SELECT * FROM smartagriculture.sensors where Land_id=? and Sensor_typeid=?";
$stmt = $con->prepare($sqlQuery);

if (!$stmt) {
    die("Prepare failed: " . $con->error);
}

$stmt->bind_param("ii", $land, $sensor);

if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

$result = $stmt->get_result();
$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$stmt->close();
mysqli_close($con);
?>
