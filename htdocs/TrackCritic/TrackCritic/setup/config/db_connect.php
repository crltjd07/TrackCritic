<?php
// DISABLE ERROR REPORTING TO PREVENT SENSITIVE INFORMATION FROM BEING DISPLAYED TO USERS
error_reporting(0);

// Use environment variables for security
$servername = $_ENV['DB_HOST'] ?? "localhost";
$username = $_ENV['DB_USER'] ?? "trackcritic";
$password = $_ENV['DB_PASS'] ?? "trackcritic";
$dbname = $_ENV['DB_NAME'] ?? "trackcritic";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>