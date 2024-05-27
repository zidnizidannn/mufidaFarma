<?php
?>
<style>
    a {
        text-decoration: none;
        color: black;
    }
</style>
<header class="header d-flex align-items-center ps-4 pe-4 position-sticky top-0 h-auto w-100 p-1" style="background-color: white;">
    <div class="logos m-1 ">
        <a href="/index.php">
            <img src="/images/mufidasvg.svg" style="width: 130px;">
        </a>
    </div>

    <div class="ms-auto d-flex align-items-center">
        <!-- <div class="gear-container">
            <i class="fa fa-gear"></i>
            <div class="slide-menu">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div> -->

        <div class="dropdown me-3">
            <button class="btn fa fa-gear" style="font-size: x-large;" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/manageObat.php">Kelola obat</a></li>
                <li><a class="dropdown-item" href="/manageUser.php">Kelola user</a></li>
            </ul>
        </div>

        <?php if (!$isAdmin) : ?>
            <a href="loginPage.php">
                <div class="login text-center d-flex flex-column justify-content-center" style="width: 4rem; border-radius: 15px; height: 2em; background-color: rgb(213, 150, 150); color: white;">masuk</div>
            </a>
        <?php else : ?>
            <a href="logout.php">
                <div class="logout text-center d-flex flex-column justify-content-center" style="width: 4rem; border-radius: 15px; height: 2em; background-color: rgb(213, 150, 150); color: white;">logout</div>
            </a>
        <?php endif ?>

        <div class="btn trolley ms-4 ">
            <i class="fa-solid fa-cart-shopping" style="font-size: x-large; color: rgb(213, 150, 150);"></i>
        </div>
    </div>
</header>