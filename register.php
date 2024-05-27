<?php
session_start();

include 'conn.php';
$conn = connectDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['inputUsername'];
    $whatsapp = $_POST['inputNumber'];
    $password = $_POST['inputPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password == $confirmPassword) {
        $sha = hash('sha256', $password);
        $sql = "INSERT INTO user (noWaUser, namaUser, passUser) VALUES ('$whatsapp', '$name', '$sha')";
        mysqli_query($conn, $sql);
        $_SESSION['username'] = $name;
        header("Location: index.php");
        exit();
    } else {
        echo "Password tidak cocok dengan konfirmasi password";
    }
}

$_SESSION['username'] = $name;
header("location: index.html");