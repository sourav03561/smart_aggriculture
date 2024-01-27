<?php
// include auth_session.php file on all user panel pages
include("auth_session.php");
$user = $_SESSION["username"];
$servername = "localhost:3306";
$username = "root";
$password = "Naren@03561";
$dbname = "smartagriculture";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT User_id FROM smartagriculture.users WHERE User_name = ?";

// Prepare and bind the statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);

// Execute the query
$stmt->execute();

// Bind the result variable
$stmt->bind_result($userId);

// Fetch the result
$stmt->fetch();

// Close the statement
$stmt->close();

// Now, get all tasks for the user
$sqlTasks = "SELECT tasks.Task_id, tasks.Task_name, tasks.Task_status, tasks.Taskstart_date, tasks.Taskend_date, tasks.user_id, tasks.type_id, tasks.Land_id, land.location FROM smartagriculture.tasks tasks
            JOIN smartagriculture.land land ON tasks.Land_id = land.Land_id
            WHERE tasks.user_id = ?";
$stmtTasks = $conn->prepare($sqlTasks);
$stmtTasks->bind_param("i", $userId);
$stmtTasks->execute();

// Bind the result variables
$stmtTasks->bind_result($taskId, $taskName, $taskStatus, $taskStartDate, $taskEndDate, $userId, $typeId, $landId,$landName);

// Fetch results and store in an array
$tasks = array();
while ($stmtTasks->fetch()) {
    $tasks[] = array(
        'TaskId' => $taskId,
        'TaskName' => $taskName,
        'TaskStatus' => $taskStatus,
        'TaskStartDate' => $taskStartDate,
        'TaskEndDate' => $taskEndDate,
        'UserId' => $userId,
        'TypeId' => $typeId,
        'LandId' => $landId,
        'LandName' => $landName,
    );
}

echo json_encode($tasks);

// Close the statement
$stmtTasks->close();

// Close the connection
$conn->close();
?>
