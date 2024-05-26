<?php
session_start();
$isLoggedIn = isset($_SESSION['idUser']);
?>
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
        * {
            /* border: 1px solid red; */
        }
    </style>
</head>

<body>
    <!-- header -->
    <?php include 'layouts/header.php' ?>

    <content class="d-block">
        <?php include 'layouts/banner.html' ?>
        <div class="topSell d-flex flex-column justify-content-center mb-4" style="height: auto; background-color: rgb(213, 150, 150);">
            <span class="h3 fw-bold my-3 text-light">Produk terpopuler</span>
            <div class='item d-flex justify-content-between col-12 mb-3 flex-wrap ' style='height: auto;'>
                <?php
                include 'getdata.php';
                getdata(1, 5);
                ?>
            </div>
        </div>

        <div class="body d-flex col-12">
            <div class="category col-3 d-flex flex-column" style="">
                <div class="d-block text-light p-2 " style="background-color: teal;">Filter</div>

                <!-- filter kategori -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle w-100 " style="border: 1px solid black;" data-bs-toggle="dropdown" aria-expanded="true">
                        Kategori Obat
                    </button>
                    <ul class="dropdown-menu w-100 text-center ">
                        <li><a class="dropdown-item" href="#">Obat cair</a></li>
                        <li><a class="dropdown-item" href="#">Obat tablet</a></li>
                        <li><a class="dropdown-item" href="#">Obat kapsul</a></li>
                        <li><a class="dropdown-item" href="#">Obat oles</a></li>
                        <li><a class="dropdown-item" href="#">Obat tetes</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle w-100 " style="border: 1px solid black;" data-bs-toggle="dropdown" aria-expanded="true">
                        Urutkan
                    </button>
                    <ul class="dropdown-menu w-100 text-center ">
                        <li><a class="dropdown-item" href="#">A - Z</a></li>
                        <li><a class="dropdown-item" href="#">Z - A</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-9 d-flex flex-wrap justify-content-around" style="font-size: 0.75rem;">
                <?php
                getdata(1, 50);
                ?>
            </div>
        </div>
    </content>
    <?php include 'layouts/footer.html' ?>
</body>

</html>
