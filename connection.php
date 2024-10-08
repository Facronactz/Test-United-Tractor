<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

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

// Connect to the database
$conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if table produk exists
$query = "SHOW TABLES LIKE 'produk'";
$result = $conn->query(query: $query);

if ($result->num_rows > 0) {
    // echo "Table produk already exists";
} else {
    // Create table produk
    $query = "CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255)
  )";

    if ($conn->query(query: $query) === TRUE) {
        // echo "Table produk created successfully";
    } else {
        echo "Error creating table produk: " . $conn->error;
    }
}

// Check if table sales exists
$query = "SHOW TABLES LIKE 'sales'";
$result = $conn->query(query: $query);

if ($result->num_rows > 0) {
    // echo "Table sales already exists";
} else {
    // Create table sales
    $query = "CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255)
  )";

    if ($conn->query(query: $query) === TRUE) {
        // echo "Table sales created successfully";
    } else {
        echo "Error creating table sales: " . $conn->error;
    }
}

// Check if table leads exists
$query = "SHOW TABLES LIKE 'leads'";
$result = $conn->query(query: $query);

if ($result->num_rows > 0) {
    // echo "Table leads already exists";
} else {
    // Create table leads
    $query = "CREATE TABLE leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE,
    id_sales INT,
    id_produk INT,
    no_wa VARCHAR(20),
    nama_lead VARCHAR(255),
    kota VARCHAR(255),
    id_user INT,
    FOREIGN KEY (id_sales) REFERENCES sales(id),
    FOREIGN KEY (id_produk) REFERENCES produk(id)
  )";

    if ($conn->query($query) === TRUE) {
        // echo "Table leads created successfully";
    } else {
        echo "Error creating table leads: " . $conn->error;
    }
}
