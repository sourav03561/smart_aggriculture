<?php
    		require('db1.php');
			include("auth_session.php");
			$landLocation = $_POST['landLocation'];
			
			$Soil = $_POST['Soil'];
			$sensorTypes = $_POST['sensorType'];
			$sensorLocations = $_POST['sensorLocation'];
			$user = $_SESSION["username"];
			$sql = "SELECT * FROM smartagriculture.users WHERE User_name = '$user'";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			$user_id = $row["User_id"];


			// Insert data into the Land table
			$sql = "INSERT INTO land (Farmer_id, Location, Soil_type, user_id) VALUES (?, ?, ?, ?)";
			$stmt = mysqli_prepare($con, $sql);
			// Bind parameters
			mysqli_stmt_bind_param($stmt, "issi", $farmerId, $landLocation, $Soil, $user_id);

			// Execute the statement
			if (mysqli_stmt_execute($stmt)) {
    			echo "Record inserted successfully.";
			} else {
    			echo "Error: " . mysqli_stmt_error($stmt);
			}

			$sql1 = "SELECT Land_id FROM land WHERE Location='$landLocation'";
			$result = mysqli_query($con, $sql1);

// Check if the query was successful
	if ($result) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Access Land_id using $row["Land_id"]
        $Land_id = $row["Land_id"];
		
        // Query to insert into sensors table
		for ($i = 0; $i < count($sensorTypes); $i++) {
            $sensorType = $sensorTypes[$i];
            $sensorLocation = $sensorLocations[$i];
        	$sql2 = "INSERT INTO sensors (Sensor_typeid, Land_id, Location) VALUES ('$sensorType', '$Land_id', '$sensorLocation')";
        
        // Execute the query
        if ($con->query($sql2) === TRUE) {
            echo "Record inserted successfully.";
            header("Location: home.php");
            exit;
        } else {
            echo "Error: " . $sql2 . "<br>" . $con->error;
        }
	}
    } else {
        echo "No matching records found for location '$landLocation'.";
    }
} else {
    echo "Error: " . $sql1 . "<br>" . $con->error;
}

?>