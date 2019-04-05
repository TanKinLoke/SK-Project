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

    $ID = $_REQUEST["id"];

    $sql = "SELECT * FROM Aset_Info WHERE Aset_ID='$ID'";

    $result = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($result);

    if ($result > 0) {
        $response = htmlspecialchars_decode($result['Nama_Aset'],ENT_QUOTES).":".$result['Bilangan'].":".htmlspecialchars_decode($result['Jenis_Aset'],ENT_QUOTES);
        echo "$response";
    } else {
        echo "Not Exist";
        exit;
    }

    mysqli_close($conn);
?>