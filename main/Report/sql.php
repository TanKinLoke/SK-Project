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

    $AsetName = htmlspecialchars($_REQUEST['AsetName'],ENT_QUOTES);
    $AsetID = $_REQUEST['AsetID'];
    $AsetType = htmlspecialchars($_REQUEST['AsetType'],ENT_QUOTES);
    $AsetNo = $_REQUEST['AsetNo'];
    $AsetReport = htmlspecialchars($_REQUEST['AsetReport'],ENT_QUOTES);

    $sql = "INSERT INTO Aset_Report (Nama_Aset,Aset_ID,Jenis_Aset,Bilangan,Report) VALUES ('$AsetName','$AsetID','$AsetType','$AsetNo','$AsetReport')";
    if (mysqli_query($conn,$sql)) {
        echo "success";
    } else {
        echo mysqli_error($conn);
    }

    mysqli_close($conn);
?>