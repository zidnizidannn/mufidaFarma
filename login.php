<?php
session_start();
include 'conn.php';

$conn = connectDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $whatsapp = $_POST['number'];
    $password = $_POST['password'];
    $sha = hash('sha256', $password);

    $sql = "SELECT * FROM user WHERE noWaUser='$whatsapp' AND passUser='$sha'";
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
