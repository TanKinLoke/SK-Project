<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Aset Bilik i-CreatorZ</title>
    <link rel="icon" href="icon.png" type="image/png"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="./Assets/index.css">
    <script src="./Assets/main.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-indigo.min.css" /> 
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<body>
    <a class="Title" id="Title">Sistem Aset Bilik i-CreatorZ</a>
    <!-- Login Form -->
    <div class="login-form-box" id="login-form-box">
        <div class="login-form-components">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label login-username">
                <!-- Username -->
                <input class="mdl-textfield__input" type="text" id="login-username" name="login-username">
                <label class="mdl-textfield__label" for="login-username">Nama</label>
            </div>
            <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label login-password">
                <!-- Password -->
                <input class="mdl-textfield__input" type="password" id="login-password" name="login-password">
                <label class="mdl-textfield__label" for="login-password">Kata Laluan</label>
                <span class="mdl-textfield__error" id="wrong-password">Salah Nama Pengguna atau Kata Laluan</span>
                <span class="mdl-textfield__error" id="login-empty">Nama pengguna dan Kata Laluan kosong</span>
                <span class="mdl-textfield__error" id="login-username-empty">Nama pangguna kosong</span>
                <span class="mdl-textfield__error" id="login-password-empty">Kata Laluan kosong</span>
            </div>
            <br>
            <input type='checkbox' onchange='showPassword()' id='show-password'>
            <label for="show-password" class='unselectable'>Tunjukkan Kata Laluan</label>
            <input type='checkbox' id='remember-password'>
            <label for="remember-password" class='unselectable'>Ingat saya</label>
            <br><br>
            <!-- Login Button -->
            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent login-button" id="login-button" name="login-button" value="login" onclick="userLogin()">
                Log masuk
            </button>
            <br><br>
            <!-- Register dialog -->
            <a class="RegisterDialog">Belum daftar?</a><button class="register-button" type="button" onclick="registerButtonPressed()"><a class="register-text">Daftar sekarang</a></button>
            <br>
            <!-- Forgot dialog -->
            <a class="RegisterDialog">Lupa Kata Laluan?</a><button class="register-button" type="button" onclick="forgotButtonPressed()"><a class="register-text">Tekan sini</a></button>
        </div>
    </div>
    <!-- Register Form -->
        <div class="register-form-box">
            <div class="register-form-components">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- User ID -->
                    <input class="mdl-textfield__input" type="text" id="register-id" name="register-id" onkeyup="checkID()" autocomplete="off">
                    <label class="mdl-textfield__label" for="register-id" id="register-user-id-label">ID Pengguna</label>
                    <span class="mdl-textfield__error" id="user-id-exist">ID Pengguna sudah wujud</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- Username -->
                    <input class="mdl-textfield__input" type="text" id="register-username" name="register-username" onkeyup="checkUsername()" autocomplete="off">
                    <label class="mdl-textfield__label" for="register-username" id="register-username-label">Nama</label>
                    <span class="mdl-textfield__error" id="username-exist">Nama pengguna sudah wujud</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- Email -->
                    <input class="mdl-textfield__input" type="text" id="register-email" name="register-email">
                    <label class="mdl-textfield__label" for="register-email" id="register-email-label">E-mel</label>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- Password -->
                    <input class="mdl-textfield__input" type="password" id="register-password" name="register-password">
                    <label class="mdl-textfield__label" for="register-password">Kata Laluan</label>
                    <span class="mdl-textfield__error" id="password-not-same">Kata Laluan tidak tepat</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- Confirm Password -->
                    <input class="mdl-textfield__input" type="password" id="register-confirm-password" name="register-confirm-password">
                    <label class="mdl-textfield__label" for="register-confirm-password">Pastikan kata Laluan</label>
                    <span class="mdl-textfield__error" id="password-not-same2">Kata Laluan tidak tepat</span>
                    <span class="mdl-textfield__error" id="register-something-empty">Maklumat tidak lengkap</span>
                </div>
                <br><br>
                <!-- Register Button -->
                <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent login-button" id="register-button" name="register-button" value="register" onclick="userRegister()">
                    Daftar
                </button>
                <br><br>
                <!-- Back to login -->
                <button type="button" class="back-login-box" onclick="BackToLoginBox()"><a class="login-text">Balik ke muka log masuk</a></button>
            </div>
        </div>
    <!-- Forgot password Form -->
    <div class="forgot-form-box">
            <div class="forgot-form-components">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- User ID -->
                    <input class="mdl-textfield__input" type="text" id="forgot-id" name="forgot-id" onkeyup="checkForgotID()">
                    <label class="mdl-textfield__label" for="forgot-id" id="forgot-user-id-label">ID Pengguna</label>
                    <span class="mdl-textfield__error" id="forgot-id-exist">ID Pengguna tidak wujud</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- Username -->
                    <input class="mdl-textfield__input" type="text" id="forgot-username" name="forgot-username" readonly="true">
                    <label class="mdl-textfield__label" for="forgot-username" id="forgot-username-label">Nama pengguna</label>
                </div>
                <br><br>
                <!-- Send Email Button -->
                <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent login-button" id="forgot-button" name="register-button" value="register" onclick="userForgot()">
                    Hantar e-mel
                </button>
                <br><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- New Password -->
                    <input class="mdl-textfield__input" type="password" id="reset-password" readonly="true">
                    <label class="mdl-textfield__label" for="reset-password" id="reset-password-id-label">Kata Laluan baru</label>
                    <span class="mdl-textfield__error" id="reset-password-empty">Kata Laluan kosong</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- New Password -->
                    <input class="mdl-textfield__input" type="password" id="reset-confirm-password" readonly="true">
                    <label class="mdl-textfield__label" for="reset-confirm-password" id="reset-password-id-label">Pastikan kata laluan</label>
                </div>
                <br>
                <!-- Code -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">             
                    <input class="mdl-textfield__input" type="text" id="forgot-code" name="forgot-code" readonly="true">
                    <label class="mdl-textfield__label" for="forgot-code" id="forgot-code-label">Kod</label>
                    <span class="mdl-textfield__error" id="code-empty">Kod kosong</span>
                    <span class="mdl-textfield__error" id="code-incorrect">Kod salah</span>
                </div>
                <br><br>
                <!-- Reset Button -->
                <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent login-button" id="reset-button" name="reset-button" onclick="userReset()">
                    Reset
                </button>
                <br><br>
                <!-- Back to login -->
                <button type="button" class="back-login-box" onclick="BackToLoginBox()"><a class="login-text">Balik ke muka log masuk</a></button>
            </div>
        </div>
</body>
</html>