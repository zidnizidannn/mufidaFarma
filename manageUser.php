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

// Query untuk mendapatkan data pengguna
$userQuery = "SELECT * FROM user";
$users = mysqli_query($conn, $userQuery);
if (!$users) {
    die("Query Error (users): " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna</title>
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
    <h1 class="text-center">Kelola Pengguna</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID Pengguna</th>
            <th>No. WhatsApp</th>
            <th>Nama Pengguna</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($user = mysqli_fetch_assoc($users)): ?>
            <tr>
                <td><?php echo $user['idUser']; ?></td>
                <td><?php echo $user['noWaUser']; ?></td>
                <td><?php echo $user['namaUser']; ?></td>
                <td><?php echo $user['passUser']; ?></td>
                <td>
                    <a href="editUser.php?id=<?php echo $user['idUser']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="deleteUser.php?id=<?php echo $user['idUser']; ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>