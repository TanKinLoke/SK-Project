<?php
    session_start();

    $_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : "";

    if ($_SESSION['user'] == "") {
        header("Location: ../");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="icon.png" type="image/png"> 
    <title>Menu Sistem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../Assets/menu.css">
    <script src="../Assets/menu.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-indigo.min.css" /> 
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>  
</head>
<body>
    <a class="Title" id="Title">Sistem Aset Bilik i-CreatorZ</a>
    <div class="topleft">
        <a href="../index.php"><button type='button' class="logout-box">Log Keluar</button></a>
    </div>
    <div class="center">
        <div class="index-components">
        <a class="cp-text" href="../main/Add Aset/index.php"><button type='button' href="" class="cp-box" id="test">Tambah Aset</button></a>
        <a class="cp-text" href="../main/Edit Aset/index.php"><button type='button' href="" class="cp-box">Edit Aset</button></a>
        <a class="cp-text" href="../main/Report/index.php"><button type='button' href="" class="cp-box">Aset Report</button></a>
        <a class="cp-text" href="../main/Import/index.php"><button type='button' href="" class="cp-box">Import Aset</button></a>
        </div>
    </div>
</body>
</html>