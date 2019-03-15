<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Aset Bilik i-CreatorZ</title>
    <link rel="icon" href="icon.png" type="image/png"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./Assets/index.css">
    <script src="./Assets/main.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css" /> 
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body onload="onLoad()">
    <a class="Title" id="Title">Sistem Aset Bilik i-CreatorZ</a>
    <!-- Login Form -->
    <form method="post">
    <div class="login-form-box" id="login-form-box">
        <div class="login-form-components">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <!-- Username -->
                <input class="mdl-textfield__input" type="text" id="login-username" name="login-username">
                <label class="mdl-textfield__label" for="login-username">Username</label>
            </div>
            <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <!-- Password -->
                <input class="mdl-textfield__input" type="password" id="login-password" name="login-password">
                <label class="mdl-textfield__label" for="login-password">Password</label>
            </div>
            <br>
            <!-- Login Button -->
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent login-button" id="login-button">
                Login
            </button>
            <br><br>
            <!-- Register dialog -->
            <a class="RegisterDialog">Belum daftar?</a><button class="register-button" type="button" onclick="registerButtonPressed()"><a>Daftar sekarang</a></button>
        </div>
    </div>
    <!-- Register Form -->
        <div class="register-form-box">
            <div class="register-form-components">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- Username -->
                    <input class="mdl-textfield__input" type="text" id="register-username" name="register-username">
                    <label class="mdl-textfield__label" for="register-username">Username</label>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- Password -->
                    <input class="mdl-textfield__input" type="password" id="register-password" name="register-password">
                    <label class="mdl-textfield__label" for="register-password">Password</label>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- Confirm Password -->
                    <input class="mdl-textfield__input" type="password" id="register-confirm-password" name="register-confirm-password">
                    <label class="mdl-textfield__label" for="register-confirm-password">Confirm Password</label>
                </div>
                <br><br>
                <!-- Login Button -->
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent login-button" id="register-button">
                    Register
                </button>
                <br><br>
                <button type="button" class="back-login-box" onclick="BackToLoginBox()"><a>Back to Login</a></button>
            </div>
        </div>
    </form>
</body>
</html>