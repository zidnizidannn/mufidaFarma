<?php
session_start();

include 'conn.php';
$conn = connectDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['inputName'];
    $whatsapp = $_POST['inputNumber'];
    $password = $_POST['inputPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password == $confirmPassword) {
        $sha = hash('sha256', $password);
        $sql = "INSERT INTO user (username, whatsapp, password) VALUES ('$name', '$whatsapp', '$sha')";
        mysqli_query($conn, $sql);
        $_SESSION['username'] = $name;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Password tidak cocok dengan konfirmasi password";
    }
}

$_SESSION['username'] = $name;
header("location: index.html");