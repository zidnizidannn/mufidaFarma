<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type ="image" href=""> -->
    <link rel="stylesheet" href="/assets/bootstrap.css">
    <link rel="icon" href="/images/mufidasvg.svg">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fredoka.css">
    <script src="/assets/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2a6c7edf30.js" crossorigin="anonymous"></script>
    <title>Mufida Farma</title>
    <style>
        * {
            /* border: 1px solid red; */
        }
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <!-- header -->
    <?php include 'layouts/header.html' ?>

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
                        <li><a class="dropdown-item kategori-obat" href="#" data-kategori="1">Obat cair</a></li>
                        <li><a class="dropdown-item kategori-obat" href="#" data-kategori="2">Obat tablet</a></li>
                        <li><a class="dropdown-item kategori-obat" href="#" data-kategori="3">Obat kapsul</a></li>
                        <li><a class="dropdown-item kategori-obat" href="#" data-kategori="4">Obat oles</a></li>
                        <li><a class="dropdown-item kategori-obat" href="#" data-kategori="5">Obat tetes</a></li>
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
            <div class="col-9 d-flex flex-wrap justify-content-around" style="font-size: 0.75;">
                <?php
                getdata(1, 50);
                ?>
            </div>
        </div>
    </content>
    <?php include 'layouts/footer.html' ?>
    <script>
        const kategoriLinks = document.querySelectorAll('.kategori-obat');

        kategoriLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah tautan berpindah halaman
                const kategoriId = this.dataset.kategori;
                loadProdukByKategori(kategoriId);
            });
        });

        function loadProdukByKategori(kategoriId) {
            // Kirim permintaan ke server menggunakan AJAX
            fetch(`get_produk.php?kategori=${kategoriId}`)
                .then(response => response.json())
                .then(data => {
                    // Tampilkan data produk di halaman web
                    const produkContainer = document.querySelector('.produk-container');
                    produkContainer.innerHTML = '';
                    data.forEach(produk => {
                        produkContainer.innerHTML += `
          <div class="produk">
            <img src="${produk.gambarObat}" alt="${produk.namaObat}">
            <h3>${produk.namaObat}</h3>
            <p>${produk.desObat}</p>
            <p>Rp. ${produk.hargaObat}</p>
          </div>
        `;
                    });
                })
                .catch(error => console.error(error));
        }
    </script>
</body>

</html>