<?php
header('Content-Type: application/json');

require_once('db1.php');

$landId = $_POST['landId'];
$sqlQuery = "SELECT * FROM smartagriculture.farmers where Land_id=".$landId.";";
$con = mysqli_connect("localhost:3306", "root", "Naren@03561", "smartagriculture");
$result = mysqli_query($con, $sqlQuery);
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        'Farmer_id' => $row['Farmer_id'],
        'Name' => $row['First_name'] . ' ' . $row['Last_name']
    );
}

// Only echo the JSON-encoded data
echo json_encode($data);

mysqli_close($con);
?>
