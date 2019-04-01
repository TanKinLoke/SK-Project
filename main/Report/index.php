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
    <div class="clhslogo-content">
        <img src="./CL_Logo.png" class="clhslogo-img">
    </div>
    <a class="Title" id="Title">Sistem Aset Bilik i-CreatorZ</a>
    <div id="form-box" class="form-box">
        <input type="text" id="aset-id" class="aset-input" onchange="changeName()" list="aset_ID" placeholder="ID Aset">
        <datalist id="aset_ID">
        <?php
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="Sistem_Aset_Bilik_iCreatorZ";

            //Create a connection
            $conn = new mysqli($servername,$username,$password,$dbname);

            //Check if the connection is successful or not
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = ("SELECT * FROM Aset_Info");
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    //Datalist for dropdown menu
                    echo "<option value=\"".$row["Aset_ID"]."\">";
                }
            } else {
                
            }
    
            mysqli_close($conn);
        ?>
        </datalist>
        <br><br><br>
        <input type="text" id="aset-name" class="aset-input" placeholder="Nama Aset" readonly="true">
        <br><br><br>
        <input type="text" id="aset-no" class="aset-input" placeholder="Bilangan Aset" readonly="true">
        <br><br><br>
        <input type="text" id="aset-type" class="aset-input" placeholder="Nama Aset" readonly="true">
        <br><br><br>
        <input type="text" id="aset-report" class="aset-input" placeholder="Report">
        <br><br><br><br>
        <button type='button' class="button-submit" onclick="submit()">Submit</button>
    </div>
</body>
</html>