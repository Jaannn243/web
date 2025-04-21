<?php
// Konfigurasi untuk koneksi database
$servername = "localhost";  // Nama server MySQL, biasanya 'localhost'
$username = "root";         // Username database Anda
$password = "";             // Password database Anda
$dbname = "dbcms";          // Nama database yang Anda gunakan

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>
