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
$idObat = mysqli_real_escape_string($conn, $_GET['id']);

// Query untuk mendapatkan data obat berdasarkan ID
$obatQuery = "SELECT * FROM obat WHERE idObat = $idObat";
$obatResult = mysqli_query($conn, $obatQuery);

// Periksa apakah obat dengan ID yang diteruskan ada
if (mysqli_num_rows($obatResult) == 0) {
    header("Location: halaman_sebelumnya.php");
    exit();
}

// Ambil data obat dari hasil query
$obat = mysqli_fetch_assoc($obatResult);

// Query untuk mendapatkan daftar kategori obat
$queryKategori = "SELECT * FROM kategori";
$resultKategori = mysqli_query($conn, $queryKategori);

// Proses update obat jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaObat = mysqli_real_escape_string($conn, $_POST['namaObat']);
    $desObat = mysqli_real_escape_string($conn, $_POST['desObat']);
    $hargaObat = mysqli_real_escape_string($conn, $_POST['hargaObat']);
    $idKategori = mysqli_real_escape_string($conn, $_POST['idKategori']);
    $komposisiObat = mysqli_real_escape_string($conn, $_POST['komposisiObat']);
    $indikasiObat = mysqli_real_escape_string($conn, $_POST['indikasiObat']);
    $dosisObat = mysqli_real_escape_string($conn, $_POST['dosisObat']);
    $efekObat = mysqli_real_escape_string($conn, $_POST['efekObat']);

    $updateQuery = "UPDATE obat SET 
                    namaObat = '$namaObat', 
                    desObat = '$desObat', 
                    komposisiObat = '$komposisiObat', 
                    indikasiObat = '$indikasiObat', 
                    dosisObat = '$dosisObat', 
                    efekObat = '$efekObat', 
                    hargaObat = '$hargaObat', 
                    idKategori = '$idKategori' 
                    WHERE idObat = $idObat";

    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo '<script>window.location.href = "manageObat.php?success=true";</script>';
        exit();
    } else {
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
                <input type="text" class="form-control" id="namaObat" name="namaObat" value="<?php echo htmlspecialchars($obat['namaObat']); ?>" required>
            </div>
            <div class="form-group">
                <label for="desObat">Deskripsi Obat:</label>
                <textarea class="form-control" id="desObat" name="desObat" rows="3" required><?php echo htmlspecialchars($obat['desObat']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="komposisiObat">Komposisi Obat:</label>
                <textarea class="form-control" id="komposisiObat" name="komposisiObat" rows="3" required><?php echo htmlspecialchars($obat['komposisiObat']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="indikasiObat">Indikasi Obat:</label>
                <textarea class="form-control" id="indikasiObat" name="indikasiObat" rows="3" required><?php echo htmlspecialchars($obat['indikasiObat']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="dosisObat">Dosis Obat:</label>
                <input type="text" class="form-control" id="dosisObat" name="dosisObat" value="<?php echo htmlspecialchars($obat['dosisObat']); ?>" required>
            </div>
            <div class="form-group">
                <label for="efekObat">Efek Obat:</label>
                <textarea class="form-control" id="efekObat" name="efekObat" rows="3" required><?php echo htmlspecialchars($obat['efekObat']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="hargaObat">Harga Obat:</label>
                <input type="number" class="form-control" id="hargaObat" name="hargaObat" value="<?php echo htmlspecialchars($obat['hargaObat']); ?>" required>
            </div>
            <div class="form-group">
                <label for="idKategori">Kategori Obat:</label>
                <select class="form-control" id="idKategori" name="idKategori" required>
                <option value="">Pilih Kategori</option>
                <?php
                // Loop melalui hasil query kategori dan buat opsi dropdown
                if (mysqli_num_rows($resultKategori) > 0) {
                    while ($row = mysqli_fetch_assoc($resultKategori)) {
                        // Setiap baris kategori menjadi opsi dropdown
                        $selected = ($obat['idKategori'] == $row['idKategori']) ? 'selected' : '';
                        echo "<option value=\"" . htmlspecialchars($row['idKategori']) . "\" $selected>" . htmlspecialchars($row['namaKategori']) . "</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada kategori yang tersedia</option>";
                }
                ?>
                </select>
            </div> <br>
            <div>
                <button type="submit" class="btn btn-primary">Update Obat</button>  
            </div>
        </form>
    </div>
</body>
</html>
