<style>
    a {
        text-decoration: none;
    }
</style>
<header class="header d-flex align-items-center ps-4 pe-4 position-sticky top-0 h-auto w-100 p-1" style="background-color: white;">
    <a href="/index.php" class="logos m-1 ">
        <img src="/images/mufidasvg.svg" style="width: 130px;">
    </a>

    <div class="ms-auto d-flex align-items-center">
        <?php if (!$isLoggedIn) : ?>
            <a href="loginPage.php">
                <div class="login text-center d-flex flex-column justify-content-center" style="width: 4rem; border-radius: 15px; height: 2em; background-color: rgb(213, 150, 150); color: white;">masuk</div>
            </a>
        <?php else : ?>
            <a href="logout.php">
                <div class="logout text-center d-flex flex-column justify-content-center" style="width: 4rem; border-radius: 15px; height: 2em; background-color: rgb(213, 150, 150); color: white;">logout</div>
            </a>
        <?php endif ?>

        <div class="trolley ms-4 ">
            <i class="fa-solid fa-cart-shopping" style="font-size: x-large; color: rgb(213, 150, 150);"></i>
        </div>
    </div>
</header>
