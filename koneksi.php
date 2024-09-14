<?php
// Informasi koneksi ke database
$servername = "localhost"; // Nama host database
$username = "root"; // Username untuk login ke MySQL
$password = ""; // Password untuk login ke MySQL
$dbname = "data_orang"; // Nama database yang akan digunakan

// Membuat koneksi ke MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// echo "Koneksi berhasil ke database 'data_orang'";
?>
