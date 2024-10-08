<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unt_db";

// Create connection
$conn = new mysqli(hostname: $servername, username: $username, password: $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if database exists
$query = "SHOW DATABASES LIKE '$dbname'";
$result = $conn->query(query: $query);

if ($result->num_rows > 0) {
    // echo "Database exists";
} else {
    // Create database
    $query = "CREATE DATABASE $dbname";
    if ($conn->query(query: $query) === TRUE) {
        // echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
}