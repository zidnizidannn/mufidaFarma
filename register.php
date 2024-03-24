<?php
session_start();

include 'conn.php';
$conn = connectDatabase();

$name = $_POST['inputName'];
$whatsapp = $_POST['inputNumber'];
$password = $_POST['inputPassword'];

$sha = hash('sha256', $password);
$sql = "INSERT INTO user (username, whatsapp, password) VALUES ('$name', '$whatsapp', '$sha')";

mysqli_query($conn, $sql);

$_SESSION['username'] = $name;
header("location: index.html");