<?php
header('Content-Type: application/json');

require_once('db.php');

$sqlQuery = "SELECT Type_id,Tasktype_name FROM smartagriculture.tasktype;";
$con = mysqli_connect("localhost:3306","root","Naren@03561","smartagriculture");
$result = mysqli_query($con,$sqlQuery);
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

echo json_encode($data);
mysqli_close($con);
?>