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

    //HTML Components variable
    $login_button = $_POST["login-button"];
    $login_username = $_POST["login-username"];
    $login_password = $_POST["login-password"];
    $register_button = $_POST["register-button"];
    $register_username = $_POST["register-username"];
    $register_password = $_POST["register-password"];
    $register_confirm_password = $_POST["register-confirm-password"];
    $wrongPassword = false;
    $passwordNotSame = false;
    $loginEmpty = false;
    $registerEmpty = false;
    $usernameTaken = false;

    //Check which button is pressed (Login/Register)
    if(isset($login_button)) {
        //Login Button pressed
        if(!empty($login_username) && !empty($login_password)) {
            //Login
            $sql = "SELECT * FROM Pengguna WHERE Username='$login_username'";
            $result = mysqli_query($conn,$sql);
            $result = mysqli_fetch_assoc($result);
            if ($result['User_Password'] == $login_password) {
                //Password match
                header("Location: ../SK_Project/Menu/Menu.php");
                exit;
            } else {
                //Password not match
                $wrongPassword = true;
            }
        } else {
            //Username or password empty
            $loginEmpty = true;
        }
    } 
    else if (isset($register_button)) {
        //Register button pressed
        if(!empty($register_username) && !empty($register_password) && !empty($register_confirm_password)) {
            if ($register_password == $register_confirm_password) {
                //Insert into database(Register)
                $sql = "INSERT INTO Pengguna (Username,User_Password) VALUES ('$register_username','$register_password')";
                $result = mysqli_query($conn,$sql);
            }
            else {
                //Confirm password and password not same
                $passwordNotSame = true;
            }
        } else {
            //Something didn't fill in Register form
            $registerEmpty = true;
        }
    } else {
        //No button pressed
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Aset Bilik i-CreatorZ</title>
    <link rel="icon" href="icon.png" type="image/png"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./Assets/index.css">
    <script src="./Assets/main.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-indigo.min.css" /> 
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body onload="onLoad()">
    <a class="Title" id="Title">Sistem Aset Bilik i-CreatorZ</a>
    <!-- Login Form -->
    <form method="post">
    <div class="login-form-box" id="login-form-box">
        <div class="login-form-components">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label login-username">
                <!-- Username -->
                <input class="mdl-textfield__input" type="text" id="login-username" name="login-username">
                <label class="mdl-textfield__label" for="login-username">Username</label>
            </div>
            <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label login-password">
                <!-- Password -->
                <input class="mdl-textfield__input" type="password" id="login-password" name="login-password">
                <label class="mdl-textfield__label" for="login-password">Password</label>
                <span class="mdl-textfield__error" id="wrong-password">Wrong Username or Password</span>
            </div>
            <br>
            <!-- Login Button -->
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent login-button" id="login-button" name="login-button" value="login">
                Login
            </button>
            <br><br>
            <!-- Register dialog -->
            <a class="RegisterDialog">Belum daftar?</a><button class="register-button" type="button" onclick="registerButtonPressed()"><a class="register-text">Daftar sekarang</a></button>
        </div>
    </div>
    <!-- Register Form -->
        <div class="register-form-box">
            <div class="register-form-components">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- Username -->
                    <input class="mdl-textfield__input" type="text" id="register-username" name="register-username" onchange="checkUsername()">
                    <label class="mdl-textfield__label" for="register-username" id="register-username-label">Username</label>
                    <span class="mdl-textfield__error" id="username-exist">Username already exist</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- Password -->
                    <input class="mdl-textfield__input" type="password" id="register-password" name="register-password">
                    <label class="mdl-textfield__label" for="register-password">Password</label>
                    <span class="mdl-textfield__error" id="password-not-same">Password not match with confirm password</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- Confirm Password -->
                    <input class="mdl-textfield__input" type="password" id="register-confirm-password" name="register-confirm-password">
                    <label class="mdl-textfield__label" for="register-confirm-password">Confirm Password</label>
                    <span class="mdl-textfield__error" id="password-not-same2">Password not match with confirm password</span>
                </div>
                <br><br>
                <!-- Register Button -->
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent login-button" id="register-button" name="register-button" value="register">
                    Register
                </button>
                <br><br>
                <!-- Back to login -->
                <button type="button" class="back-login-box" onclick="BackToLoginBox()"><a class="login-text">Back to Login</a></button>
            </div>
        </div>
    </form>
    <?php
        if ($wrongPassword == true) {
            //Wrong login password
            echo "<script>wrongPassword()</script>";
        } else if ($passwordNotSame == true) {
            //Register password and confirm password not same
            echo "<script>notSamePassword()</script>";
        } else if ($loginEmpty == true) {

        } else if ($registerEmpty == true) {

        } else if ($usernameTaken == true) {

        }
    ?>
</body>
</html>