<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header("Location: loginPage.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: manageObat.php");
    exit();
}

$idObat = $_GET['id'];

include 'conn.php';
$conn = connectDatabase();

$deleteQuery = "DELETE FROM obat WHERE idObat = '$idObat'";
$deleteResult = mysqli_query($conn, $deleteQuery);

if ($deleteResult) {
    header("Location: manageObat.php?success=true");
    exit();
} else {
    die("Query Error: " . mysqli_error($conn));
}
?>
