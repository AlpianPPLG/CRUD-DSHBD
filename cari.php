<?php
// Memasukkan koneksi database
include 'koneksi.php';

// Mendapatkan kata kunci pencarian dari form
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Data Orang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Pencarian Data Orang</h1>

    <!-- Form Pencarian -->
    <form method="GET" action="cari.php" class="mb-4">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari data" value="<?php echo htmlspecialchars($keyword); ?>">
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="index.php" class="btn btn-secondary ms-2">Kembali</a>
        </div>
    </form>

    <!-- Tabel Hasil Pencarian -->
    <div id="search-results">
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    // Fungsi untuk menampilkan hasil pencarian
    function displayResults(data) {
        var html = '<table class="table table-bordered">';
        html += '<thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Telepon</th><th>Alamat</th></tr></thead><tbody>';
        if (data.length > 0) {
            $.each(data, function(index, row) {
                html += '<tr>';
                html += '<td>' + row.id + '</td>';
                html += '<td>' + row.nama + '</td>';
                html += '<td>' + row.email + '</td>';
                html += '<td>' + row.telepon + '</td>';
                html += '<td>' + row.alamat + '</td>';
                html += '</tr>';
            });
        } else {
            html += '<tr><td colspan="5" class="text-center">Data tidak ditemukan.</td></tr>';
        }
        html += '</tbody></table>';
        $('#search-results').html(html);
    }

    // Menangani input pencarian
    $('input[name="keyword"]').on('input', function() {
        var keyword = $(this).val();
        $.ajax({
            url: 'search.php',
            method: 'GET',
            data: { keyword: keyword },
            dataType: 'json',
            success: function(response) {
                displayResults(response);
            }
        });
    });
});
</script>
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
