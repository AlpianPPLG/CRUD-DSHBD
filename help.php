<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Section</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        .content {
            margin-top: 30px;
        }
        .footer-link {
            color: black;
            text-decoration: none;
        }
        .footer-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container content">
    <h1 class="text-center">Help Section</h1>
    <p>Di halaman ini, Anda bisa menemukan petunjuk penggunaan website ini.</p>

    <div class="accordion" id="helpAccordion">
        <!-- Navigasi Website -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Navigasi Website
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#helpAccordion">
                <div class="accordion-body">
                    Website ini memiliki beberapa bagian seperti halaman utama, halaman pencarian, halaman filter, dan halaman ekspor data. Untuk menavigasi, Anda dapat menggunakan menu di bagian atas halaman.
                </div>
            </div>
        </div>

        <!-- Menambah Data -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Menambah Data
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#helpAccordion">
                <div class="accordion-body">
                    Untuk menambahkan data baru, klik tombol <b>"Tambah Orang"</b> di halaman utama. Anda akan diminta untuk memasukkan informasi seperti nama, email, telepon, dan alamat. Setelah selesai, klik tombol <b>"Simpan"</b> untuk menambahkan data ke database.
                </div>
            </div>
        </div>

        <!-- Mengedit Data -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Mengedit Data
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#helpAccordion">
                <div class="accordion-body">
                    Untuk mengedit data, klik tombol <b>"Edit"</b> pada baris data yang ingin diubah. Anda akan diarahkan ke halaman edit di mana Anda dapat memperbarui informasi tersebut.
                </div>
            </div>
        </div>

        <!-- Menghapus Data -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Menghapus Data
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#helpAccordion">
                <div class="accordion-body">
                    Untuk menghapus data, klik tombol <b>"Delete"</b> pada baris data yang ingin dihapus. Anda akan diminta untuk mengonfirmasi penghapusan. Setelah dikonfirmasi, data tersebut akan dihapus dari database.
                </div>
            </div>
        </div>

        <!-- Pencarian Data -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Pencarian Data
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#helpAccordion">
                <div class="accordion-body">
                    Anda dapat mencari data tertentu menggunakan fitur pencarian. Klik tombol <b>"Cari Data Orang"</b> di halaman utama, lalu masukkan kata kunci berdasarkan nama atau informasi lain yang tersedia.
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center mt-4">
        <button class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
    </div>
</div>

<!-- Footer -->
<footer class="bg-light text-center py-3">
    <p class="mb-0">Created By <a href="https://github.com/AlpianPPLG" class="footer-link" target="_blank">Alpian</a></p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
