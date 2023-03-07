<?php 
// Database configuration
$dbHost     = "us-cdbr-east-06.cleardb.net";
$dbUsername = "b8d1c92e38d8f9";
$dbPassword = "779c12a8";
$dbName     = "heroku_23a5f73e18d7315";

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "connection established"
}
?>
