<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Aset</title>
    <link rel="icon" href="icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-indigo.min.css" />  
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<body onload="onLoad()">
    <a class="Title" id="Title">Sistem Aset Bilik i-CreatorZ</a>
    <div id="form-box" class="form-box">
        <input type="text" id="aset-name" class="aset-input" placeholder="Nama Aset">
        <br><br><br>
        <input type="text" id="aset-id" class="aset-input" placeholder="ID Aset">
        <br><br><br>
        <input type="text" id="aset-type" class="aset-input" placeholder="Jenis Aset">
        <br><br>
        <input type="number" id="aset-no" class="aset-input-no" >
        <br><br><br>
        <button type='button' class="button-submit" onclick="submit()">Submit</button>
    </div>
</body>
</html>