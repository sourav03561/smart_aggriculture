<?php
include("db.php");
include("auth_session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the landId parameter is set
    if (isset($_POST["landId"])) {
        $landId = $_POST["landId"];

        // Perform the update in the database
        $newLocation = $_POST["newLocation"]; // You may need additional parameters
        $sensorId = $_POST["sensorId"];
        $newSensorType = $_POST["newSensorType"];
        $newSensorLocation = $_POST["newSensorLocation"];
        
        // Update land location
        $sqlUpdateLand = "UPDATE land SET location = ? WHERE Land_id = ?";
        $stmtUpdateLand = mysqli_prepare($con, $sqlUpdateLand);
        mysqli_stmt_bind_param($stmtUpdateLand, "si", $newLocation, $landId);
        
        if (mysqli_stmt_execute($stmtUpdateLand)) {
            echo "Land location update successful";
        } else {
            echo "Error updating land location: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmtUpdateLand);

        // Get Sensortype_id based on Typename
        $sqlSelectSensortypeId = "SELECT Sensortype_id FROM smartagriculture.sensortype WHERE Typename = ?";
        $stmtSelectSensortypeId = mysqli_prepare($con, $sqlSelectSensortypeId);
        mysqli_stmt_bind_param($stmtSelectSensortypeId, "s", $newSensorType);

        if (mysqli_stmt_execute($stmtSelectSensortypeId)) {
            mysqli_stmt_bind_result($stmtSelectSensortypeId, $sensortypeId);

            // Fetch the result
            if (mysqli_stmt_fetch($stmtSelectSensortypeId)) {
                // $sensortypeId now contains the Sensortype_id
                echo "Sensortype_id: " . $sensortypeId;
            } else {
                echo "Sensortype not found";
            }

            mysqli_stmt_close($stmtSelectSensortypeId);
        } else {
            echo "Error fetching Sensortype_id: " . mysqli_error($con);
        }

        // Perform the update for the sensor
        // Update sensor location and Sensortype_id
        $sqlUpdateSensor = "UPDATE smartagriculture.sensors SET Location = ?, Sensor_typeid = ? WHERE Sensor_id = ?";
        $stmtUpdateSensor = mysqli_prepare($con, $sqlUpdateSensor);
        mysqli_stmt_bind_param($stmtUpdateSensor, "sii", $newSensorLocation, $sensortypeId, $sensorId);
        
        if (mysqli_stmt_execute($stmtUpdateSensor)) {
            echo "Sensor update successful";
        } else {
            echo "Error updating sensor: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmtUpdateSensor);

        mysqli_close($con);
    } else {
        echo "Invalid parameters";
    }
} else {
    echo "Invalid request method";
}
?>
