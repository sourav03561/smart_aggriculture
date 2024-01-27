<?php
// include auth_session.php file on all user panel pages

// Assuming you have a database connection already established

$hostname = "localhost:3306";
$username = "root";
$password = "Naren@03561";
$database = "smartagriculture";
include("auth_session.php");

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Received POST data: ";
print_r($_POST);
    // Get the task ID and other data from the POST request
    $taskId = isset($_POST['taskId']) ? $_POST["taskId"] : "";
 // Assuming 0 as a default value if taskId is not set
    $newTaskName = isset($_POST['newTaskName']) ? $_POST["newTaskName"] : "";
    $newBeginDate = isset($_POST['newBeginDate']) ? $_POST["newBeginDate"] : "";
    $newEndDate = isset($_POST['newEndDate']) ? $_POST["newEndDate"] : "";
    $newStatus = isset($_POST['newStatus']) ? $_POST["newStatus"] : "";
    
    echo "Received taskId: " . $taskId . PHP_EOL; // Debugging line
    $taskId = (int)$taskId;
    echo "Casted to int taskId: " . $taskId . PHP_EOL; // Debugging line    
    // ...
    
    // Perform the update operation in the database using MySQLi
    $query = "UPDATE tasks SET Task_name=?, Taskstart_date=?, Taskend_date=?, Task_status=? WHERE Task_id=?;";
    echo "SQL Query: " . $query . PHP_EOL;
    $stmt = $conn->prepare($query);
    
    // Bind parameters to the prepared statement
    if (!$stmt->bind_param("ssssi", $newTaskName, $newBeginDate, $newEndDate, $newStatus, $taskId)) {
        echo "Binding parameters failed: " . $stmt->error;
    }
    // Execute the prepared statement
    if ($stmt->execute()) {
        // Update successful
        echo "Profile updated successfully";
    } else {
        // Update failed
        echo "Error updating profile: " . $stmt->error;
    }
    
    // Close the statement and the database connection
    $stmt->close();
    $conn->close();

?>
