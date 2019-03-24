<?php
    $function = $_REQUEST["function"];
    $data = $_REQUEST["data"];
    $data2 = $_REQUEST["data2"];

    //SQL Login Details
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

    if ($function == "delete") {
        //SQL commands
        $sql = "DELETE FROM Aset_Info WHERE Nama_Aset=$data";
        $result = mysqli_query($conn,$sql);
        echo $result;
    } else if ($function == "editName") {
        $sql = "UPDATE Aset_Info SET Nama_Aset=$data2 WHERE Nama_Aset=$data";
        $result = mysqli_query($conn,$sql);
        echo $result;
    } else if ($function == "editID") {
        $sql = "UPDATE Aset_Info SET Aset_ID=$data2 WHERE Nama_Aset=$data";
        $result = mysqli_query($conn,$sql);
        echo $result;
    } else if ($function == "editJenis") {
        $sql = "UPDATE Aset_Info SET Jenis_Aset=$data2 WHERE Nama_Aset=$data";
        $result = mysqli_query($conn,$sql);
        echo $result;
    } else if ($function == "editBilangan") {
        $sql = "UPDATE Aset_Info SET Bilangan=$data2 WHERE Nama_Aset=$data";
        $result = mysqli_query($conn,$sql);
        echo $result;
    } else if ($function == "add") {
        $sql = "INSERT INTO Aset_Info (Venue) VALUES ($data)";
        $result = mysqli_query($conn,$sql);
        echo "done";
    }
?>