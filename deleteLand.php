<?php
include("auth_session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the land ID from the POST data
    $landId = $_POST['landId'];

    // Implement your logic to delete the record from the database
    // You can use a prepared statement to prevent SQL injection

    // Example:
    $con = mysqli_connect("localhost:3306", "root", "Naren@03561", "smartagriculture");
    $sql = "DELETE FROM land WHERE Land_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $landId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    echo "Land deleted successfully";
} else {
    echo "Invalid request";
}
?>
