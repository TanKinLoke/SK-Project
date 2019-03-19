<?php
    session_start();

    $_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : "";

    if ($_SESSION['user'] == "") {
        header("Location: ../");
    }

    //session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="icon.png" type="image/png"> 
    <title>Menu Sistem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../Assets/menu.css">
    <script src="../Assets/menu.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-indigo.min.css" /> 
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body onload="onLoad()">
    <a class="Title" id="Title">Sistem Aset Bilik i-CreatorZ</a>
    <div class="center">
        <div class="index-components">
            <button type='button' href="" class="cp-box1"><a class="cp-text">Tambah Aset</a></button>
            <button type='button' href="" class="cp-box2"><a class="cp-text">Tambah Aset</a></button>
            <button type='button' href="" class="cp-box3"><a class="cp-text">Tambah Aset</a></button>
            <button type='button' href="" class="cp-box4"><a class="cp-text">Tambah Aset</a></button>
        </div>
    </div>
</body>
</html>