<?php
session_start();

// Pastikan hanya admin yang bisa mengakses halaman ini
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header("Location: loginPage.php");
    exit();
}

// Koneksi ke database
include 'conn.php';
$conn = connectDatabase();

// Query untuk mendapatkan data obat
$obatQuery = "SELECT * FROM obat";
$obatResults = mysqli_query($conn, $obatQuery);
if (!$obatResults) {
    die("Query Error (obat): " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Obat</title>
    <link rel="stylesheet" href="/assets/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fredoka.css">
    <script src="https://kit.fontawesome.com/2a6c7edf30.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        th {
            text-align: center;
        }
        td img {
            width: 50px;
        }
        .action-buttons a {
            margin: 0 5px;
        }
        .add-button, .navigation-buttons {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Kelola Obat</h1>
        <div class="text-right navigation-buttons">
            <a href="index.php" class="btn fa fa-arrow-left"></a>
            <a href="addObat.php" class="btn btn-success">Tambah Obat Baru</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Obat</th>
                    <th>Deskripsi</th>
                    <th>Komposisi</th>
                    <th>Indikasi</th>
                    <th>Dosis</th>
                    <th>Efek Samping</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>ID Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($obat = mysqli_fetch_assoc($obatResults)): ?>
                <tr>
                    <td><?php echo $obat['idObat']; ?></td>
                    <td><?php echo $obat['namaObat']; ?></td>
                    <td><?php echo $obat['desObat']; ?></td>
                    <td><?php echo nl2br($obat['komposisiObat']); ?></td>
                    <td><?php echo $obat['indikasiObat']; ?></td>
                    <td><?php echo nl2br($obat['dosisObat']); ?></td>
                    <td><?php echo nl2br($obat['efekObat']); ?></td>
                    <td><?php echo $obat['hargaObat']; ?></td>
                    <td><img src="/images/<?php echo $obat['gambarObat']; ?>" alt="Gambar Obat"></td>
                    <td><?php echo $obat['idKategori']; ?></td>
                    <td class="action-buttons d-flex justify-content-center">
                        <a href="updateObat.php?id=<?php echo $obat['idObat']; ?>" class="btn btn-warning btn-lg fa fa-edit text-light p-3 mb-3"></a>
                        <a href="deleteObat.php?id=<?php echo $obat['idObat']; ?>" class="btn btn-danger btn-lg fa fa-trash-alt text-light p-3 mb-3"></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
