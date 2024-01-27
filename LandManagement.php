<?php
// Assuming you have a database connection established
include("db.php");
include("auth_session.php");

// Initialize data arrays
$data1 = array();
$data2 = array();
$data3 = array();

// Example 1: SELECT query
$sqlQuery = "SELECT land.Land_id, land.location FROM land JOIN users ON users.User_id = land.User_id WHERE users.User_name = ?";
$stmt = mysqli_prepare($con, $sqlQuery);

// Check if the prepare was successful
if ($stmt) {
    $username = $_SESSION["username"];
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $landId, $location);

    while (mysqli_stmt_fetch($stmt)) {
        // Add data to array
        $data1[] = array('Land_id' => $landId, 'Location' => $location);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error in SELECT query: " . mysqli_error($con);
}

// Example 2: SELECT query with subquery
$sqlQuery1 = "SELECT * FROM smartagriculture.sensors WHERE Land_id IN (SELECT Land_id FROM land JOIN users ON users.User_id = land.User_id WHERE users.User_name = ?)";
$stmt1 = mysqli_prepare($con, $sqlQuery1);

// Check if the prepare was successful
if ($stmt1) {
    $username = $_SESSION["username"];
    mysqli_stmt_bind_param($stmt1, "s", $username);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_bind_result($stmt1, $Sensor_id, $Sensor_typeid, $Land_id, $Location);

    while (mysqli_stmt_fetch($stmt1)) {
        // Add data to array
        $data2[] = array('Sensor_id' => $Sensor_id, 'Sensor_typeid' => $Sensor_typeid, 'Land_id' => $Land_id, 'Location' => $Location);
    }

    // Close the statement
    mysqli_stmt_close($stmt1);
} else {
    echo "Error in SELECT query with subquery: " . mysqli_error($con);
}

$sqlQuery2 = "SELECT Typename FROM smartagriculture.sensortype WHERE Sensortype_id = ?";
$stmt2 = mysqli_prepare($con, $sqlQuery2);

// Check if the prepare was successful
if ($stmt2) {
    foreach ($data2 as $sensorData) {
        // Assuming Sensortype_id is available in $sensorData
        $sensortype_id = $sensorData['Sensor_typeid'];

        mysqli_stmt_bind_param($stmt2, "i", $sensortype_id);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_bind_result($stmt2, $Typename);

        while (mysqli_stmt_fetch($stmt2)) {
            // Add data to array
            $data3[] = array('Typename' => $Typename);
        }
    }

    // Close the statement
    mysqli_stmt_close($stmt2);
} else {
    echo "Error in SELECT query for sensortype: " . mysqli_error($con);
}
// Close connection
$con->close();

// Use $data1, $data2, and $data3 arrays as needed
?>




<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Land Management</title>
		<!-- <link rel="stylesheet" href="../css/style.css" type="text/css"/> -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		<style>
		        body {
		            font-family: Arial, sans-serif;
		            margin: 0;
		            padding: 0;
		            background-color: #f4f4f4;
		            text-align: center;
		        }
		        
		        h1 {
		            color: rgb(22,167,30);
					font-weight: 900;
		        }
		        
		        button {
		            margin-top: 20px;
		            padding: 8px 12px;
		            background-color: #4caf50;
		            color: #fff;
		            border: none;
		            cursor: pointer;
		        }
		        
		        button:hover {
		            background-color: #45a049;
		        }
		        
		        table {
		            width: 80%;
		            margin: 20px auto;
		            border-collapse: collapse;
		            background-color: #fff;
		            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		        }
		        
		        th, td {
		            border: 1px solid #ddd;
		            padding: 12px;
		            text-align: left;
		        }
		        
		        th {
		            background-color: #f2f2f2;
		        }
		        
		        td:last-child {
		            text-align: center;
		        }
		        
		        td button {
					min-width: 120px;
					border-radius: 50px;
		            margin-right: 5px;
					margin: 10px;
					font-size: 15px;
					font-weight: 600;
		        }
				.custom-button{
					width: 350px;
					display: block;
					margin: 30px auto 0;
					padding: 10px 20px;
					border: none;
					border-radius: 50px;
					background-color:  #4caf50;
					color: white;
					height: 40px;
					font-size: 15px;
					font-weight: 600;
					font-family: Arial, Helvetica, sans-serif;
					
				}
				.custom-button:hover{
					background-color: #45a049;
					color: rgb(203, 240, 187);
				}
		    </style>
	</head>
	<body>
		<h1>Land Management</h1>
		<button class="custom-button" onclick="location.href='detectland.php'">Detect Land</button>
		<table>
        <thead>
            <tr>
                <th>Land Name</th>
                <th>Land Location</th>
				<th>Sensor Type</th>
				<th>Sensor Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Test Data -->
            <?php
    foreach ($data1 as $index => $row) {
        echo "<tr>";
        echo "<td>{$row['Land_id']}</td>";
        echo "<td>{$row['Location']}</td>";
        
        // Check if corresponding sensor data exists
		if (isset($data3[$index])) {
            echo "<td>{$data3[$index]['Typename']}</td>";
        } else {
            // If no sensortype data, display placeholders or handle accordingly
            echo "<td>No Sensor Type Data</td>";
        }
        if (isset($data2[$index])) {
            echo "<td>{$data2[$index]['Location']}</td>";
        } else {
            // If no sensor data, display placeholders or handle accordingly
            echo "<td>No Sensor Data</td>";
        }
        
        echo "<td>";
		echo "<button onclick=\"editRow({$row['Land_id']}, {$data2[$index]['Sensor_id']})\">Edit</button>";
        echo "<button onclick=\"deleteRow({$row['Land_id']})\">Delete</button>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
		</tbody>
		</table>
		<script>
		        function deleteRow(landId) {
        		// Confirm deletion
        		if (confirm("Are you sure you want to delete this land?")) {
            	// Use AJAX to send the request to delete the record
            	$.ajax({
                type: "POST",
                url: "deleteLand.php", // Replace with the actual server-side script
                data: { landId: landId },
                success: function (response) {
                    console.log("Server response:", response);
                    // Remove the row from the table on successful deletion
                    $("tr[data-land-id='" + landId + "']").remove();
                },
                error: function (error) {
                    console.error("Error deleting land:", error);
                	}
            	});
        	}
    		}
			function editRow(landId,sensorId) {
        // Example: Prompt user for the new location
        var newLocation = prompt("Enter the new location:", "");
		var sensorType = prompt("Enter the new Sensor Type:", "");
		var SensorLocation = prompt("Enter the new Sensor Location:", "");
		console.log(landId);
		console.log(sensorId);
		console.log(newLocation);
		console.log(sensorType);
		console.log(SensorLocation);

        if (newLocation !== null && sensorType !== null && SensorLocation !== null) {
            // Use AJAX to send the request to edit the record
            $.ajax({
                type: "POST",
                url: "editLand.php", // Replace with the actual server-side script
                data: { landId: landId, newLocation: newLocation, newSensorType:sensorType, newSensorLocation: SensorLocation, sensorId:sensorId},
                success: function (response) {
                    console.log("Server response:", response);
                    // Update the table or handle the response accordingly
                },
                error: function (error) {
                    console.error("Error editing land:", error);
                }
            });
        }
    }
		</script>
	</body>
</html>