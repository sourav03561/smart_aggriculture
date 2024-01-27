<?php
header('Content-Type: application/json');

require_once('db.php');

$sqlQuery = "SELECT N,P,K,temperature,humidity,ph,rainfall,label FROM data";
$con = mysqli_connect("localhost:3306","root","Naren@03561","smart_aggriculture");
$result = mysqli_query($con,$sqlQuery);
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

echo json_encode($data);
mysqli_close($con);
?>