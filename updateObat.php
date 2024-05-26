<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header("Location: loginPage.php");
    exit();
}

include 'conn.php';
$conn = connectDatabase();

if (!isset($_GET['id'])) {
    header("Location: halaman_sebelumnya.php"); 
    exit();
}

// Jika ID obat diteruskan, tangkap nilainya
$idObat = $_GET['id'];

// Query untuk mendapatkan data obat berdasarkan ID
$obatQuery = "SELECT * FROM obat WHERE idObat = $idObat";
$obatResult = mysqli_query($conn, $obatQuery);

// Periksa apakah obat dengan ID yang diteruskan ada
if (mysqli_num_rows($obatResult) == 0) {
    // Jika tidak ada obat dengan ID tersebut, alihkan kembali atau tampilkan pesan kesalahan
    header("Location: halaman_sebelumnya.php"); // Ganti "halaman_sebelumnya.php" dengan halaman yang sesuai
    exit();
}

// Ambil data obat dari hasil query
$obat = mysqli_fetch_assoc($obatResult);

// Proses update obat jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data yang dikirim melalui form
    $namaObat = $_POST['namaObat'];
    $desObat = $_POST['desObat'];
    $hargaObat = $_POST['hargaObat'];
    $idKategori = $_POST['idKategori'];

    // Query untuk melakukan update data obat
    $updateQuery = "UPDATE obat SET namaObat = '$namaObat', desObat = '$desObat', hargaObat = '$hargaObat', idKategori = '$idKategori' WHERE idObat = $idObat";

    // Jalankan query update
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        // Jika update berhasil, alihkan ke halaman daftar obat atau tampilkan pesan sukses
        header("Location: manageObat.php?success=true");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error atau lakukan penanganan yang sesuai
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Obat</title>
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
        <h1 class="text-center">Update Obat</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="namaObat">Nama Obat:</label>
                <input type="text" class="form-control" id="namaObat" name="namaObat" value="<?php echo $obat['namaObat']; ?>" required>
            </div>
            <div class="form-group">
                <label for="desObat">Deskripsi Obat:</label>
                <textarea class="form-control" id="desObat" name="desObat" rows="3" required><?php echo $obat['desObat']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="hargaObat">Harga Obat:</label>
                <input type="number" class="form-control" id="hargaObat" name="hargaObat" value="<?php echo $obat['hargaObat']; ?>" required>
            </div>
            <div class="form-group">
                <label for="idKategori">Kategori Obat:</label>
                <select class="form-control" id="idKategori" name="idKategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="1" <?php echo ($obat['idKategori'] == 1) ? 'selected' : ''; ?>>Obat Cair</option>
                    <option value="2" <?php echo ($obat['idKategori'] == 2) ? 'selected' : ''; ?>>Obat Tablet</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Obat</button>
        </form>
    </div>
</body>
</html>
