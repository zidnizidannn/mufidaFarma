<?php
session_start();
include 'conn.php';

$conn = connectDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $whatsapp = $_POST['number'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek jika username dan password adalah admin
    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['username'] = 'admin';
        header("Location: index.php");
        exit();
    }

    $sha = hash('sha256', $password);

    $sql = "SELECT * FROM user WHERE namaUser='$username' AND passUser='$sha'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['idUser'] = $row['idUser'];
        header("Location: index.php");
        exit();
    } else {
        echo "Nomor WhatsApp atau password salah";
    }
}
?>
