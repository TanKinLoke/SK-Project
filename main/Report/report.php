<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aset Report</title>
    <link rel="icon" href="icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-indigo.min.css" />  
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<body>
    <a class="Title" id="Title">Sistem Aset Bilik i-CreatorZ</a>
    <div class="topleft">
        <a href="./index.php"><button type='button' class="logout-box">Balik</button></a>
    </div>
    <div id="form-box" class="form-box">
        <br><br><br><br><br><br><br><br><br>
        <center>
        <table>
            <tr><td>ID Aset</td><td><?php 
                echo $_GET['id'];
            ?></td></tr>
            <tr><td>Nama Aset</td><td><?php 
                echo $_GET['nama'];
            ?></td></tr>
            <tr><td>Bilangan Aset</td><td><?php 
                echo $_GET['bilangan'];
            ?></td></tr>
            <tr><td>Jenis Aset</td><td><?php 
                echo $_GET['jenis'];
            ?></td></tr>
            <tr><td>Report</td><td><?php 
                echo $_GET['report'];
            ?></td></tr>
        </table>
        </center>
    </div>
</body>
</html>