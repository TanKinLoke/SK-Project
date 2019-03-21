<?php
    session_start();
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

    //HTML Components variable
    $login_button = isset($_REQUEST["login-button"]) ? $_REQUEST['login-button'] : '';
    $login_username = isset($_REQUEST["login-username"]) ? $_REQUEST['login-username'] : '';
    $login_password = isset($_REQUEST["login-password"]) ? $_REQUEST['login-password'] : '';
    $register_button = isset($_REQUEST["register-button"]) ? $_REQUEST['register-button'] : '';
    $register_username = isset($_REQUEST["register-username"]) ? $_REQUEST['register-username'] : '';
    $register_password = isset($_REQUEST["register-password"]) ? $_REQUEST['register-password'] : '';
    $register_confirm_password = isset($_REQUEST["register-confirm-password"]) ? $_REQUEST['register-confirm-password'] : '';
    $wrongPassword = false;
    $passwordNotSame = false;
    $loginEmpty = false;
    $registerEmpty = false;
    $usernameTaken = false;

    //Check which button is pressed (Login/Register)
    if($login_button == "login") {

        //Login Button pressed
        if(!empty($login_username) && !empty($login_password)) {
            //Login
            $sql = "SELECT * FROM Pengguna WHERE Username='$login_username'";
            $result = mysqli_query($conn,$sql);
            $result = mysqli_fetch_assoc($result);
            if ($result['User_Password'] == $login_password) {
                //Password match
                $_SESSION['user'] = $login_username;
                echo "true";
            } else {
                //Password not match
                $_SESSION['user'] = ""; 
                echo "false";
            }
        } else {
            //Username or password empty
            $loginEmpty = true;
        }
    } 
    else if ($register_button == "register") {
        //Register button pressed
        if(!empty($register_username) && !empty($register_password) && !empty($register_confirm_password)) {
            if ($register_password == $register_confirm_password) {
                //Insert into database(Register)
                $sql = "INSERT INTO Pengguna (Username,User_Password) VALUES ('$register_username','$register_password')";
                $result = mysqli_query($conn,$sql);
                echo "true";
            }
            else {
                //Confirm password and password not same
                echo "false";
            }
        } else {
            //Something didn't fill in Register form
        }
    } else {
        //No button pressed
    }

    mysqli_close($conn);
?>