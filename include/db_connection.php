<?php 
// Database configuration
$dbHost     = "us-cdbr-east-06.cleardb.net";
$dbUsername = "bbf07839939b27";
$dbPassword = "219a8edc";
$dbName     = "heroku_d0e6d3ebd452dc4";

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "connection established"
}
?>
