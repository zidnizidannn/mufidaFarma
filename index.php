<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fredoka.css">
    <script src="/assets/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2a6c7edf30.js" crossorigin="anonymous"></script>
    <title>Mufida Farma</title>
    <style>
        *{
            /* border: 1px solid red; */
        }
        
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'layouts/header.html'?>

    <content class="d-block">
        <?php include 'layouts/banner.html'?>
        <div class="topSell d-flex flex-column justify-content-center" style="height: auto; background-color: rgb(213, 150, 150);">
            <div class='item d-flex justify-content-between col-12 my-3' style='border: 1px solid rgba(255, 82, 82, 0.366); height: 12rem;'>
            <?php
            include 'conn.php';
            $conn= connectDatabase();
    
            $sql = "SELECT namaObat, hargaObat, gambarObat FROM obat WHERE idObat BETWEEN 1 AND 5";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // Output data setiap baris
                while($row = $result->fetch_assoc()) {
                     // Path direktori tempat menyimpan gambar
                    $gambarDirectory = "images/";
                    // URL lengkap gambar
                    $gambarURL = $gambarDirectory . $row["gambarObat"];
                    echo "<div class='items d-block position-relative col-2 d-flex flex-column' style='border: 3px solid rgb(255, 255, 255); border-radius: 10px;'>
                                <img src='" . $gambarURL . "' class='gambar mx-auto my-auto' alt='" . $row["namaObat"] . "' style='width: 170px;'>
                                <div class='label bg-light d-block bottom-0 position-absolute bottom-0' style='border-radius: 0px 35px 0px 7px;'>
                                    <span class='namaItems m-1'>" . $row["namaObat"] . "</span><br>
                                    <span class='hargaItems m-1'>Rp. " . $row["hargaObat"] . "</span>
                                </div>
                            </div>";
                }
            } else {
                echo "Tidak ada data obat.";
            }
            ?>
            </div>
        </div>

        <div class="category d-flex">
            <div class="subCategory"></div>
        </div>
    </content>
    <footer>

    </footer>
</body>
</html>