<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/images/mufidasvg.svg">
    <link rel="stylesheet" href="/assets/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fredoka.css">
    <script src="/assets/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2a6c7edf30.js" crossorigin="anonymous"></script>
    <title>Mufida Farma</title>
    <style>
        * {
            /* border: 1px solid red; */
        }
    </style>
</head>
<body class=    "d-flex flex-column min-vh-100">
    <?php include 'layouts/header.html' ?>
    <main>
        <!-- Detail Obat Section -->
        <section class="detail-obat-section">
            <div class="container row d-flex mx-auto" style="background-color: ;">
                <?php
                require_once 'conn.php';
                $conn = connectDatabase();
                if (isset($_GET['idObat'])) {
                    $id = $_GET['idObat'];
                    $query = "SELECT * FROM obat WHERE idObat = $id";
                    $result = $conn->query($query);
                    $row = mysqli_fetch_assoc($result);
                    if ($row) {
                        $gambarData = $row["gambarObat"];
                ?>
                        <div class="col-3" id="gambar">
                            <div class="d-flex justify-content-center  ">
                            <img src='<?= 'images/'.$row["gambarObat"] ?>' class='gambar w-75' alt='' style="">
                            </div>
                        </div>
                        <div class="col-6 mt-4" id="detail">
                            <div class="">
                                <p class="h3"><?php echo $row['namaObat']; ?></p>
                                <p><?php echo $row['desObat']; ?></p>
                                <hr>
                                <p class="h5">Komposisi</p>
                                <p><?php echo nl2br($row['komposisiObat']);?></p>
                                <hr>
                                <p class="h5">Indikasi/kegunaan</p>
                                <p><?php echo nl2br($row['indikasiObat']);?></p>
                                <hr>
                                <p class="h5">Dosis</p>
                                <p><?php echo nl2br($row['dosisObat']);?></p>
                                <hr>
                                <p class="h5">Efek Samping</p>
                                <p><?php echo nl2br($row['efekObat']);?></p>
                                <h3>Harga: Rp.<?php echo $row['hargaObat']; ?></h3>
                            </div>
                        </div>
                        <div class="col-3 mt-4" id="rekomendasi">
                            <h5>Rekomendasi Obat Lain</h5>
                            <?php
                            $query = "SELECT * FROM obat ORDER BY RAND() LIMIT 4";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="card mb-1">
                                        <div class="row g-0 d-flex justify-content-center">
                                            <div class="col-4 my-auto">
                                                <img src="<?= 'images/' . $row['gambarObat'] ?>" class="img-fluid rounded-start " alt="...">
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body">
                                                    <h6 class="card-title"><?= $row['namaObat'] ?></h6>
                                                    <p class="card-text" style="font-size: 0.75rem;"><?= substr($row['desObat'], 0, 75) . '...' ?></p>
                                                </div>
                                            </div>
                                            <a href="?idObat=<?= $row['idObat'] ?>" class="btn w-50 mb-1" style="background-color: rgb(213, 150, 150); color: white; font-size: 0.75rem;">Lihat Detail</a>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                echo "Tidak ada rekomendasi obat.";
                            }
                            ?>
                        </div>
                <?php
                    } else {
                        echo "Obat tidak ditemukan.";
                    }
                } else {
                    echo "ID obat tidak ditemukan.";
                }
                closeDatabase($conn);
                ?>
            </div>
        </section>
    </main>
    <div class="mt-auto position-sticky bottom-0">
        <?php include 'layouts/footer.html' ?>
    </div>
</body>
</html>