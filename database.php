<?php
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

    if ($conn->query(query: $query) === TRUE) {
        // echo "Table leads created successfully";
    } else {
        echo "Error creating table leads: " . $conn->error;
    }
}

$produk = array(
    array('id' => 1, 'nama' => 'Cipta Residence 2'),
    array('id' => 2, 'nama' => 'The Rich'),
    array('id' => 3, 'nama' => 'Namorambe City'),
    array('id' => 4, 'nama' => 'Grand Banten'),
    array('id' => 5, 'nama' => 'Turi Mansion'),
    array('id' => 6, 'nama' => 'Cipta Residence 1')
);
foreach ($produk as $row) {
    $id = $row['id'];
    $nama = $row['nama'];

    // Check if produk already exists
    $query = "SELECT * FROM produk WHERE id = $id";
    $result = $conn->query(query: $query);
    if ($result->num_rows > 0) {
        error_log(message: "Produk $nama already exists");
    } else {
        // Insert produk
        $query = "INSERT INTO produk (id, nama) VALUES ($id, '$nama')";
        if ($conn->query(query: $query) === TRUE) {
            error_log(message: "Produk $nama inserted successfully");
        } else {
            error_log(message: "Error inserting produk $nama: " . $conn->error);
        }
    }
}

$data = array(
    array('id' => 1, 'nama' => 'sales 2'),
    array('id' => 2, 'nama' => 'sales 2'),
    array('id' => 3, 'nama' => 'sales 3')
);

foreach ($data as $row) {
    $id = $row['id'];
    $nama = $row['nama'];

    // Check if sales already exists
    $query = "SELECT * FROM sales WHERE id = $id";
    $result = $conn->query(query: $query);
    if ($result->num_rows > 0) {
        error_log(message: "Sales $nama already exists");
    } else {
        // Insert sales
        $query = "INSERT INTO sales (id, nama) VALUES ($id, '$nama')";
        if ($conn->query(query: $query) === TRUE) {
            error_log(message: "Sales $nama inserted successfully");
        } else {
            error_log(message: "Error inserting sales $nama: " . $conn->error);
        }
    }
}