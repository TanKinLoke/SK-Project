<?php
    $usernameCheck = empty($_REQUEST["username"])?"":$_REQUEST["username"];
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
    $response = "";

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $response .= htmlspecialchars_decode($row['Nama_Aset'],ENT_QUOTES).":";
            $response .= $row['Aset_ID'].":";
            $response .= htmlspecialchars_decode($row['Jenis_Aset'],ENT_QUOTES).":";
            $response .= $row['Bilangan'].":,";
        }
    } else {
        
    }

    echo $response;

    mysqli_close($conn);
?>