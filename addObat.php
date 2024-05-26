<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fredoka.css">
    <script src="/assets/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2a6c7edf30.js" crossorigin="anonymous"></script>
    <title>Admin - Mufida Farma</title>
    <style>
        /* Padding untuk elemen-elemen HTML */
        body {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .admin-content {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            align-items: center; /* Menyamakan vertikal */
        }

        .form-group label {
            flex: 0 0 20%; /* Lebar label */
            margin-right: 10px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            flex: 0 0 70%; /* Lebar input */
            margin-right: 10px;
        }

        .form-group .form-control-file {
            flex: 0 0 70%; /* Lebar input file */
        }

        .btn-container {
            margin-top: 10px; /* Jarak antara form dan tombol */
        }

        .btn-container button {
            margin-right: 10px;
        }

        content,
        body {
            margin-bottom: 0;
            padding-bottom: 0;
        }

    </style>
</head>

<body>
    <!-- Header -->
    <?php include 'layouts/header.html' ?>

    <content class="d-block">
        <div class="admin-content">
            <!-- Form untuk menambahkan obat -->
            <h3>Tambah Obat</h3>
            <form action="getObat.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="namaObat">Nama Obat:</label>
                    <input type="text" class="form-control" id="namaObat" name="namaObat" required>
                </div>
                <div class="form-group">
                    <label for="desObat">Deskripsi Obat:</label>
                    <textarea class="form-control" id="desObat" name="desObat" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="hargaObat">Harga Obat:</label>
                    <input type="number" class="form-control" id="hargaObat" name="hargaObat" required>
                </div>
                <div class="form-group">
                    <label for="idKategori">Kategori Obat:</label>
                    <select class="form-control" id="idKategori" name="idKategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="1">Obat Cair</option>
                        <option value="2">Obat Tablet</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambarObat">Gambar Obat:</label>
                    <input type="file" class="form-control-file" id="gambarObat" name="gambarObat" required>
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary">Tambahkan Obat</button>
                    <a href="manageObat.php" class="btn btn-secondary">Kelola Obat</a>
                </div>
            </form>
        </div>
    </content>
    <!-- Footer -->
    <?php include 'layouts/footer.html' ?>

    <!-- Success Popup Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (new URLSearchParams(window.location.search).get("success") === "true") {
                alert("Obat berhasil ditambahkan.");
            }
        });
    </script>
</body>

</html>
