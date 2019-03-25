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

    $usernameCheck = $_REQUEST["username"];
    $IDCheck = $_REQUEST["id"];

    if (!empty($usernameCheck)) {
        $sql = "SELECT COUNT(*) FROM Pengguna WHERE Username='$usernameCheck'";
    } else if (!empty($IDCheck)) {
        $sql = "SELECT COUNT(*) FROM Pengguna WHERE User_ID='$IDCheck'";
    }

    $result = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($result);

    if ($result['COUNT(*)'] == 0) {
        //Username does not exist in database
        echo "false";
    } else if ($result['COUNT(*)'] == 1) {
        //Username exist in database
        echo "true";
    } else {
        //More than 1 data detected (Error: Username is primary key)
        echo mysqli_error($conn);
    }

    mysqli_close($conn);
?>