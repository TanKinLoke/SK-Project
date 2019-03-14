<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Aset Bilik i-CreatorZ</title>
    <link rel="icon" href="icon.png" type="image/png"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../SK_Project/Assets/index.css">
    <script src="../SK_Project/Assets/main.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-light_blue.min.css" /> 
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body onload="onLoad()">
    <a class="Title" id="Title">Sistem Aset Bilik i-CreatorZ</a>
    <!-- Form -->
    <form method="post">
    <div class="form-box" id="form-box">
    <div class="form-components">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <!-- Username -->
            <input class="mdl-textfield__input" type="text" id="username" name="username">
            <label class="mdl-textfield__label" for="username">Username</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <!-- Password -->
            <input class="mdl-textfield__input" type="password" id="password" name="password">
            <label class="mdl-textfield__label" for="password">Password</label>
        </div>
        <br>
        <!-- Login Button -->
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent login-button" id="login-button">
            Login
        </button>
        <br><br>
        <!-- Register dialog -->
        <a class="RegisterDialog">Belum daftar?</a><a href="">Daftar sekarang</a>
    </div>
    </div>
    </form>

</body>
</html>