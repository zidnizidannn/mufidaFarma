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

        content, body {
            margin-bottom: 0;
            padding-bottom: 0;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include 'layouts/header.html'; ?>

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
                    <label for="komposisiObat">Komposisi Obat:</label>
                    <textarea class="form-control" id="komposisiObat" name="komposisiObat" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="indikasiObat">Indikasi Obat:</label>
                    <textarea class="form-control" id="indikasiObat" name="indikasiObat" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="dosisObat">Dosis Obat:</label>
                    <textarea class="form-control" id="dosisObat" name="dosisObat" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="efekObat">Efek Samping Obat:</label>
                    <textarea class="form-control" id="efekObat" name="efekObat" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="hargaObat">Harga Obat:</label>
                    <input type="number" class="form-control" id="hargaObat" name="hargaObat" required>
                </div>
                <div class="form-group">
                    <label for="idKategori">Kategori Obat:</label>
                    <select class="form-control" id="idKategori" name="idKategori" required>
                        <option value="">Pilih Kategori</option>
                        <?php
                        include 'conn.php';
                        $conn = connectDatabase();
                        $kategoriQuery = "SELECT idKategori, kategoriObat FROM kategori";
                        $kategoriResults = mysqli_query($conn, $kategoriQuery);
                        while ($kategori = mysqli_fetch_assoc($kategoriResults)) {
                            echo "<option value='" . $kategori['idKategori'] . "'>" . $kategori['kategoriObat'] . "</option>";
                        }
                        mysqli_close($conn);
                        ?>
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
    <div class="mt-auto position-sticky bottom-0">
        <?php include 'layouts/footer.html'; ?>
    </div>

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
