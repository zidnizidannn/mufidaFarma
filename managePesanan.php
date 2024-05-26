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

// Query untuk mendapatkan data pesanan
$orderQuery = "SELECT idPesanan, tanggal, idUser FROM pesanan";
$orders = mysqli_query($conn, $orderQuery);
if (!$orders) {
    die("Query Error (pesanan): " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Kelola Pesanan</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Tanggal</th>
                    <th>ID User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = mysqli_fetch_assoc($orders)): ?>
                <tr>
                    <td><?php echo $order['idPesanan']; ?></td>
                    <td><?php echo $order['tanggal']; ?></td>
                    <td><?php echo $order['idUser']; ?></td>
                    <td>
                        <a href="viewOrder.php?id=<?php echo $order['idPesanan']; ?>" class="btn btn-info btn-sm">Lihat</a>
                        <a href="editOrder.php?id=<?php echo $order['idPesanan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
