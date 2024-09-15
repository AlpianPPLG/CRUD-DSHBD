<?php
// Memasukkan koneksi database
include 'koneksi.php';

// Header untuk memberitahu browser bahwa ini adalah file CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=data-orang.csv');

// Membuka file output
$output = fopen('php://output', 'w');

// Menulis header kolom ke file CSV
fputcsv($output, ['ID', 'Nama', 'Email', 'Telepon', 'Alamat']);

// Mengambil data dari database
$sql = "SELECT * FROM orang ORDER BY id";
$result = $conn->query($sql);

// Menulis data baris per baris ke file CSV
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

// Menutup file output
fclose($output);
exit();
?>
