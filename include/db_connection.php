<?php 
// Database configuration
$dbHost     = "us-cdbr-east-06.cleardb.net";
$dbUsername = "bf7ca6f7d79144";
$dbPassword = "f2eef79d";
$dbName     = "heroku_38d47f0bebcb01b";

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else
?>
