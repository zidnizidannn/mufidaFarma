<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header("Location: loginPage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Apotek</title>
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
        <h1 class="text-center">Admin Dashboard - Apotek</h1>
        <div class="row">
            <div class="col-md-4">
                <h3>Kelola Data</h3>
                <ul class="list-group">
                    <li class="list-group-item"><a href="manageObat.php">Kelola Obat</a></li>
                    <li class="list-group-item"><a href="managePesanan.php">Kelola Pesanan</a></li>
                    <li class="list-group-item"><a href="manageUser.php">Kelola Pengguna</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
<?php include 'layouts/footer.html' ?>
</html>
