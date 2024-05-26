<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "app_mufidafarma";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $namaObat = $conn->real_escape_string($_POST["namaObat"]);
    $desObat = $conn->real_escape_string($_POST["desObat"]);
    $komposisiObat = $conn->real_escape_string($_POST["komposisiObat"]);
    $indikasiObat = $conn->real_escape_string($_POST["indikasiObat"]);
    $dosisObat = $conn->real_escape_string($_POST["dosisObat"]);
    $efekObat = $conn->real_escape_string($_POST["efekObat"]);
    $hargaObat = $conn->real_escape_string($_POST["hargaObat"]);
    $idKategori = $conn->real_escape_string($_POST["idKategori"]);

    // Proses upload gambar obat
    if (isset($_FILES["gambarObat"]) && $_FILES["gambarObat"]["error"] == 0) {
        $gambarObat = basename($_FILES["gambarObat"]["name"]);
        $temp = $_FILES["gambarObat"]["tmp_name"];
        $folder = "images/";

        if (move_uploaded_file($temp, $folder . $gambarObat)) {
            // Insert data ke database
            $sql = "INSERT INTO obat (namaObat, desObat, komposisiObat, indikasiObat, dosisObat, efekObat, hargaObat, gambarObat, idKategori) 
                    VALUES ('$namaObat', '$desObat', '$komposisiObat', '$indikasiObat', '$dosisObat', '$efekObat', '$hargaObat', '$gambarObat', '$idKategori')";

            if ($conn->query($sql) === TRUE) {
                // Redirect ke addObat.php setelah berhasil insert
                header("Location: addObat.php?success=true");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "There was a problem with the image upload.";
    }
}

$conn->close();
?>
