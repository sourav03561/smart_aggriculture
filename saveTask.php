<?php
// Assuming you have a MySQL database connection, replace the placeholders with your actual database credentials.
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

// Close the statement and connection
$stmt->close();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $landId = mysqli_real_escape_string($conn, $_POST['landId']);
    $taskId = mysqli_real_escape_string($conn, $_POST['taskId']);
    $taskType = mysqli_real_escape_string($conn, $_POST['taskType']);
    $beginDate = mysqli_real_escape_string($conn, $_POST['beginDate']);
    $endDate = mysqli_real_escape_string($conn, $_POST['endDate']);
    $farmer = mysqli_real_escape_string($conn, $_POST['farmer']);
    $taskStatus = mysqli_real_escape_string($conn, $_POST['taskStatus']);

    // Insert data into the database
    $sql = "INSERT INTO tasks (Task_name, Task_status, Taskstart_date, Taskend_date, user_id, type_id, Land_id)
            VALUES ('$taskType','$taskStatus', '$beginDate', '$endDate','$userId', '$taskId','$landId')";

    if ($conn->query($sql) === TRUE) {
        echo "Task saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
