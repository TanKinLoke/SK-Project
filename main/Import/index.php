<?php
    session_start();

    $_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : "";

    if ($_SESSION['user'] == "") {
        header("Location: ../../");
    }

    //session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aset Export</title>
    <link rel="icon" href="icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css" /> 
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<div class="topleft">
        <a href="../../Menu/Menu.php"><button type='button' class="logout-box">Balik</button></a>
    </div>
    <div id="form-box" class="form-box">
    <br><br><br><br>
        <center>
        <form action="sql.php" enctype="multipart/form-data"  method="POST">    
        <table>
            <tr>
                <td colspan="2">
                    <center><a class="title">Import Aset<a></center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center><br><br><input name="csv" type="file" id="file"></center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center><br><input type="submit" class="button-submit" value="Import Fail"></center>
                </td>
            </tr>
        </table>
        </form>
    </center>
    </div>
</body>
</html>