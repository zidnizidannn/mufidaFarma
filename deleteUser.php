<?php
session_start();
// Pastikan hanya admin yang bisa mengakses halaman ini
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header("Location: loginPage.php");
    exit();
}

// Memastikan bahwa parameter 'id' tersedia
if (!isset($_GET['id'])) {
    header("Location: manageUser.php");
    exit();
}

// Koneksi ke database
include 'conn.php';
$conn = connectDatabase();

// Mengambil ID pengguna dari parameter URL
$userId = $_GET['id'];

// Query untuk menghapus pengguna
$deleteQuery = "DELETE FROM user WHERE idUser = ?";
$stmt = $conn->prepare($deleteQuery);
$stmt->bind_param("i", $userId);

if ($stmt->execute()) {
    // Pengguna berhasil dihapus, kembali ke halaman kelola pengguna
    header("Location: manageUser.php");
} else {
    // Kesalahan saat menghapus pengguna
    die("Query Error (delete): " . $stmt->error);
}

$stmt->close();
$conn->close();
?>
