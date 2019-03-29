<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Aset</title>
    <link rel="icon" href="icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css" />  
</head>
<body>
    <table>
        <?php
            $usernameCheck = $_REQUEST["username"];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Sistem_Aset_Bilik_iCreatorZ";

            //Create connection
            $conn = new mysqli($servername,$username,$password,$dbname);

            //Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = ("SELECT * FROM Aset_Info");
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    //Table row
                    echo "<tr id='".str_replace(" ","_",$row['Nama_Aset'])."'>\n";
                    echo "<td><input type='text' id='".str_replace(" ","_",$row['Nama_Aset'])."_text' value='".$row['Nama_Aset']."' readonly=\"true\"></td>\n";
                    echo "<td><input type='text' id='".str_replace(" ","_",$row['Nama_Aset'])."_ID_text' value='".$row['Aset_ID']."' readonly=\"true\"></td>\n";
                    echo "<td><input type='text' id='".str_replace(" ","_",$row['Nama_Aset'])."_jenis_text' value='".$row['Jenis_Aset']."' readonly=\"true\"></td>\n";
                    echo "<td><input type='number' id='".str_replace(" ","_",$row['Nama_Aset'])."_bilangan_text' value='".$row['Bilangan']."' readonly=\"true\"></td>\n";
                    echo "<td><button type='button' id='".str_replace(" ","_",$row['Nama_Aset'])."_edit' onclick='editAset(\"".str_replace(" ","_",$row['Nama_Aset'])."\")'>Edit</button>\n<button type='button' id='".str_replace(" ","_",$row['Nama_Aset'])."_delete' onclick='deleteAset(\"".$row['Nama_Aset']."\")'>Delete</button></td>\n";
                    echo "</tr>\n";
                }
            } else {
                
            }

            mysqli_close($conn);
        ?>
    </table>
</body>
</html>