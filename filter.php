<?php
// Memasukkan koneksi database
include 'koneksi.php';

// Mendapatkan kata kunci filter dari form
$filterNama = isset($_GET['nama']) ? $_GET['nama'] : '';
$filterEmail = isset($_GET['email']) ? $_GET['email'] : '';
$filterTelepon = isset($_GET['telepon']) ? $_GET['telepon'] : '';

// Query untuk memfilter data berdasarkan nama, email, atau telepon
$sql = "SELECT * FROM orang WHERE 1=1";
$params = [];
$types = '';

if ($filterNama) {
    $sql .= " AND nama LIKE ?";
    $params[] = "%$filterNama%";
    $types .= 's';
}

if ($filterEmail) {
    $sql .= " AND email LIKE ?";
    $params[] = "%$filterEmail%";
    $types .= 's';
}

if ($filterTelepon) {
    $sql .= " AND telepon LIKE ?";
    $params[] = "%$filterTelepon%";
    $types .= 's';
}

// Menyiapkan dan mengeksekusi query
$stmt = $conn->prepare($sql);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

// Menyimpan hasil filter dalam array
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
    <title>Filter Data Orang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Filter Data Orang</h1>

    <!-- Form Filter -->
    <form method="GET" action="filter.php" class="mb-4">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?php echo htmlspecialchars($filterNama); ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="<?php echo htmlspecialchars($filterEmail); ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" name="telepon" class="form-control" id="telepon" value="<?php echo htmlspecialchars($filterTelepon); ?>">
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="index.php" class="btn btn-secondary ms-2">Kembali</a>
            </div>
        </div>
    </form>

    <!-- Tabel Hasil Filter -->
    <?php if (!empty($data)) { ?>
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
    <?php } else { ?>
        <div class="alert alert-warning text-center">Data tidak ditemukan.</div>
    <?php } ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
