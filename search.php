<?php
// Memasukkan koneksi database
include 'koneksi.php';

// Mendapatkan kata kunci pencarian dari parameter GET
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Query untuk mencari data berdasarkan nama, email, atau telepon
$sql = "SELECT * FROM orang WHERE nama LIKE ? OR email LIKE ? OR telepon LIKE ?";
$stmt = $conn->prepare($sql);
$search = "%" . $keyword . "%";
$stmt->bind_param("sss", $search, $search, $search);
$stmt->execute();
$result = $stmt->get_result();

// Menyimpan hasil pencarian dalam array
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Mengembalikan hasil pencarian dalam format JSON
echo json_encode($data);

// Menutup koneksi
$conn->close();
?>
