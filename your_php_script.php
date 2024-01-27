<?php
// your_php_script.php

// Check if the query parameter is set
if (isset($_POST['query'])) {
    // Get the query from the AJAX request
    $query = $_POST['query'];

    // Your database connection parameters
    $hostname = "localhost:3306";
    $username = "root";
    $password = "Naren@03561";
    $database = "smartagriculture";

    // Create a database connection
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Execute the query
    $result = $conn->query($query);

    if ($result) {
        // Fetch the results as an associative array
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // Convert the data to JSON and send it back to the JavaScript code
        echo json_encode($data);
    } else {
        // Handle query execution error
        echo "Query execution failed: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle case where query parameter is not set
    echo "No query parameter provided.";
}
?>
