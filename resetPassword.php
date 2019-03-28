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

    $id = $_REQUEST['id'];
    $newpassword = $_REQUEST['newpassword'];

    $sql = "UPDATE Pengguna SET User_Password='$newpassword' WHERE User_ID='$id'";
    $result = mysqli_query($conn,$sql);

    echo "$result";
?>