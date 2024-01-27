<?php
// include auth_session.php file on all user panel pages
include("auth_session.php");

// Assuming you have a database connection already established
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["taskId"])) {
    $taskId = $_POST["taskId"];
    
    // Perform the deletion of the task from the database based on $taskId
    $sqlDeleteTask = "DELETE FROM smartagriculture.tasks WHERE Task_id = ?";
    $stmtDeleteTask = $conn->prepare($sqlDeleteTask);
    $stmtDeleteTask->bind_param("i", $taskId);

    $stmtDeleteTask->execute();

    // Check for success and handle errors if needed
    // ...

    // Close the statement
    $stmtDeleteTask->close();
}

// Respond with a success message or any necessary data
echo json_encode(["success" => true]);

// Close the connection (optional, depending on your script structure)
$conn->close();
?>
