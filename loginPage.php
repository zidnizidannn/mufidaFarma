<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fredoka.css">
    <script src="https://code.jquery.com/jquery-3.0.0.slim.js"></script>
    <script src="https://kit.fontawesome.com/2a6c7edf30.js" crossorigin="anonymous"></script>
    <style>
        * {}

        .form-control:focus {
            box-shadow: 0px 0px 3px 2px rgb(213, 150, 150);
            border: 0.5px solid lightgrey;
        }
    </style>
</head>

<body class="vh-100" style="background-color: rgb(213, 150, 150);">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-12 col-lg-5">
                            <div class="col1 d-flex flex-column justify-content-center text-center " style="width: 100%; height: 650px; background-color: lightgray; border-radius: 1rem 0 0 1rem">
                                <span class="fa-solid fa-mortar-pestle fa-3x"></span>
                                <span class="">image here</span>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-7 d-flex align-items-center">
                            <div class="card1 card-body p-4 p-lg-5 d-flex flex-column align-items-center">
                                <div class="h2 mb-4 ">
                                    <img src="/images/mufidasvg.svg" alt="" style="width: 150px;">
                                </div>
                                <div class="btn p-2 w-75 text-center m-1 text-light " id="registBtn" style="background-color: rgb(213, 150, 150); border-radius: 20px;">Daftar sebagai sobat Mufida</div>
                                <div class="btn p-2 w-75 text-center m-1 text-light " id="loginBtn" style="background-color: rgb(213, 150, 150); border-radius: 20px;">Masuk sebagai sobat Mufida</div>
                            </div>

                            <form action="register.php" method="post" class="card-body p-4 p-lg-5 d-flex flex-column align-items-center d-none" id="register">
                                <span class="mb-3 mt-4">Silahkan masukkan data anda</span>
                                <div class="form-group mb-3 ">
                                    <label for="inputUsername">Username</label>
                                    <input type="text" class="form-control" name="inputUsername" id="inputName" placeholder="Masukkan nama" style="">
                                </div>

                                <div class="form-group mb-3 ">
                                    <label for="inputNumber">Nomor Whatsapp</label>
                                    <input type="number" class="form-control" name="inputNumber" id="inputNumber" placeholder="Maukkan nomor whatsapp" style="">
                                </div>

                                <div class="form-group mb-3 ">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="confirmPassword">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Konfirmasi Password">
                                    <small id="passwordMismatchError" class="text-danger d-none">Password tidak cocok</small>
                                </div>

                                <button class="btn" type="submit" style="background-color: lightgray;">Daftar sekarang!</button>
                                <span class="backRegist btn h6 mt-5">kembali</span>
                            </form>

                            <!-- ============================================================= -->

                            <form action="login.php" method="post" class="card-body p-4 p-lg-5 d-flex flex-column align-items-center d-none" id="login">
                                <div class="form-group mb-3 ">
                                    <label for="number">Nomor Whatsapp</label>
                                    <input type="number" class="form-control" name="number" id="inputNumber" placeholder="Maukkan nomor whatsapp" style="">
                                </div>

                                <div class="form-group mb-3 ">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                                </div>

                                <button class="btn" type="submit" style="background-color: lightgray;">Masuk</button>
                                <span class="backLogin btn h6 mt-5">kembali</span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const registBtn = document.getElementById('registBtn');
        const card1 = document.querySelector('.card1');
        const register = document.getElementById('register');
        const backRegist = document.querySelector('.backRegist');
        const backLogin = document.querySelector('.backLogin');
        const loginBtn = document.getElementById('loginBtn')
        const login = document.getElementById('login')

        registBtn.addEventListener('click', function() {
            card1.classList.toggle('d-none');
            register.classList.toggle('d-none');
            // console.error();
        });

        backRegist.addEventListener('click', function() {
            card1.classList.toggle('d-none');
            register.classList.toggle('d-none');
        });

        backLogin.addEventListener('click', function() {
            card1.classList.toggle('d-none');
            login.classList.toggle('d-none');
        });

        loginBtn.addEventListener('click', function() {
            card1.classList.toggle('d-none');
            login.classList.toggle('d-none');
            console.error();
        });

        const passwordInput = document.getElementById('inputPassword');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const passwordMismatchError = document.getElementById('passwordMismatchError');

        confirmPasswordInput.addEventListener('input', function() {
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordInput.style.borderColor = 'red';
                passwordMismatchError.classList.remove('d-none');
            } else {
                confirmPasswordInput.style.borderColor = '';
                passwordMismatchError.classList.add('d-none');
            }
        });
    </script>
</body>

</html>