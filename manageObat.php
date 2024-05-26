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
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Kelola Obat</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Obat</th>
                    <th>Deskripsi</th>
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
                    <td><?php echo $obat['hargaObat']; ?></td>
                    <td><img src="/images/<?php echo $obat['gambarObat']; ?>" alt="Gambar Obat" style="width: 50px;"></td>
                    <td><?php echo $obat['idKategori']; ?></td>
                    <td class="action-buttons">
                        <a href="updateObat.php?id=<?php echo $obat['idObat']; ?>" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a>
                        <a href="deleteObat.php?id=<?php echo $obat['idObat']; ?>" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="addObat.php" class="btn btn-success">Tambah Obat Baru</a>
    </div>
</body>
</html>
