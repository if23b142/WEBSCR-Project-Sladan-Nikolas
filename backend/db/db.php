<?php
// Database connection parameters
$host = 'localhost'; // or your host name
$dbname = 'appointment_management';
$username = '';
$password = '';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
