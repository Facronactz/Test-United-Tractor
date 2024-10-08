<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data dari form
  $tanggal = htmlspecialchars(string: $_POST['tanggal']);
  $sales = htmlspecialchars(string: $_POST['sales']);
  $leadname = htmlspecialchars(string: $_POST['leadname']);
  $produk = htmlspecialchars(string: $_POST['produk']);
  $whatsapp = htmlspecialchars(string: $_POST['whatsapp']);
  $kota = htmlspecialchars(string: $_POST['kota']);

  // Simpan data ke database
  $sql = "INSERT INTO leads (tanggal, id_sales, nama_lead, id_produk, no_wa, kota) VALUES ('$tanggal', '$sales', '$leadname', '$produk', '$whatsapp', '$kota')";
  if ($conn->query(query: $sql) === TRUE) {
    header(header: "Location: index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}