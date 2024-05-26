<?php
session_start();
include 'conn.php';

$conn = connectDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $whatsapp = $_POST['number'];
    $password = $_POST['password'];

    // Cek jika username dan password adalah admin
    if ($whatsapp === '0987654321' && $password === 'admin') {
        $_SESSION['username'] = 'admin';
        header("Location: indexAdmin.php");
        exit();
    }

    $sha = hash('sha256', $password);

    $sql = "SELECT * FROM user WHERE noWaUser='$whatsapp' AND passUser='$sha'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
        exit();
    } else {
        echo "Nomor WhatsApp atau password salah";
    }
}
?>
