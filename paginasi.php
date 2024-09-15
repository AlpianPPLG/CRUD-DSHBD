<?php
// Memasukkan koneksi database
include 'koneksi.php';

// Menentukan jumlah data per halaman
$jumlahDataPerHalaman = 5; // Misalnya, 5 data per halaman

// Menentukan halaman yang sedang aktif
$halamanAktif = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$awalData = ($halamanAktif - 1) * $jumlahDataPerHalaman;

// Mendapatkan total data dari database
$sqlTotal = "SELECT COUNT(*) AS total FROM orang";
$resultTotal = $conn->query($sqlTotal);
$totalData = $resultTotal->fetch_assoc()['total'];

// Menghitung total halaman
$totalHalaman = ceil($totalData / $jumlahDataPerHalaman);

// Query untuk mendapatkan data dengan pagination
$sql = "SELECT * FROM orang LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $awalData, $jumlahDataPerHalaman);
$stmt->execute();
$result = $stmt->get_result();

// Menyimpan data yang ditampilkan dalam array
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Orang - Pagination</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Daftar Orang</h1>

    <!-- Tabel Data Orang -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['telepon']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Navigasi Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php if ($halamanAktif > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?halaman=<?php echo $halamanAktif - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalHalaman; $i++) : ?>
                <li class="page-item <?php echo $i == $halamanAktif ? 'active' : ''; ?>">
                    <a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($halamanAktif < $totalHalaman): ?>
                <li class="page-item">
                    <a class="page-link" href="?halaman=<?php echo $halamanAktif + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
