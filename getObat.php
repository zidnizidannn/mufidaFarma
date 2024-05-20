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
    // Get form data
    $namaObat = $conn->real_escape_string($_POST["namaObat"]);
    $desObat = $conn->real_escape_string($_POST["desObat"]);
    $hargaObat = $conn->real_escape_string($_POST["hargaObat"]);
    $idKategori = $conn->real_escape_string($_POST["idKategori"]);

    // Process drug image upload
    if (isset($_FILES["gambarObat"]) && $_FILES["gambarObat"]["error"] == 0) {
        $gambarObat = basename($_FILES["gambarObat"]["name"]);
        $temp = $_FILES["gambarObat"]["tmp_name"];
        $folder = "images/";

        if (move_uploaded_file($temp, $folder . $gambarObat)) {
            // Insert data into the database
            $sql = "INSERT INTO obat (namaObat, desObat, hargaObat, gambarObat, idKategori) 
                    VALUES ('$namaObat', '$desObat', '$hargaObat', '$gambarObat', '$idKategori')";

            if ($conn->query($sql) === TRUE) {
                // Redirect to addObat.php after successful insertion
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
