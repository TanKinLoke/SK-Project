<?php
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

    $AsetName = $_REQUEST['AsetName'];
    $AsetID = $_REQUEST['AsetID'];
    $AsetType = $_REQUEST['AsetType'];
    $AsetNo = $_REQUEST['AsetNo'];

    $sql = "INSERT INTO Aset_Info (Nama_Aset,Aset_ID,Jenis_Aset,Bilangan) VALUES ('$AsetName','$AsetID','$AsetType','$AsetNo')";
    if (mysqli_query($conn,$sql)) {
        echo "success";
    } else {
        echo "fail";
    }

    mysqli_close($conn);
?>