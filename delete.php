<?php
// Memasukkan koneksi database
include 'koneksi.php';

// Mengecek apakah id dikirimkan melalui POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Menghapus data dari database
    $stmt = $conn->prepare("DELETE FROM orang WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect ke index.php setelah menghapus data
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
} else {
    echo "ID tidak ditemukan.";
}

// Menutup koneksi
$conn->close();
?>
