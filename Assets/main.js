var registerError = false;
var userExist = false;
var code;
var userResetID;
var page;

window.onload = function() {
    var checkUserCookie = getCookie("username");
    var checkPassCookie = getCookie("password");
    if (checkUserCookie != "") {
        if (checkPassCookie != "") {
            cookieLogin(checkUserCookie,checkPassCookie);
        }
    }

    $("#Title").fadeIn("slow");
    if (registerError == false) {
        LoginBoxOn();
    }
    document.getElementById("Title").style.display = "block";
}

function LoginBoxOn() {
    $(".login-form-box").addClass("show");
    setTimeout(function() {
        $(".login-form-components").addClass("show")
    },1000);
    page = "login";
}

function LoginBoxOff() {
    $(".login-form-components").removeClass("show");
    setTimeout(function() {
        $(".login-form-box").removeClass("show");
    },420);
    page = "";
}

function RegisterBoxOn() {
    $(".register-form-box").addClass("show");
    setTimeout(function() {
        $(".register-form-components").addClass("show");
    },1000);
    page = "register";
}

function RegisterBoxOff() {
    $(".register-form-components").removeClass("show");
    setTimeout(function() {
        $(".register-form-box").removeClass("show");
    }, 420);
    page = "";
}

function ForgotBoxOn() {
    $(".forgot-form-components").addClass("show");
    setTimeout(function() {
        $(".forgot-form-box").addClass("show");
    }, 420);
}

function ForgotBoxOff() {
    $(".forgot-form-components").removeClass("show");
    setTimeout(function() {
        $(".forgot-form-box").removeClass("show");
    }, 420);
}

function registerButtonPressed() {
    LoginBoxOff();
    setTimeout(function() {
        RegisterBoxOn();
    },500);
}

function forgotButtonPressed() {
    LoginBoxOff();
    setTimeout(function() {
        ForgotBoxOn();
    },500);
}

function BackToLoginBox() {
    RegisterBoxOff();
    ForgotBoxOff();
    setTimeout(function() {
        LoginBoxOn();
    },500);
}

function SpinnerOn() {
    $(".spinner").addClass("show");
}

function SpinnerOff() {
    $(".spinner").removeClass("show");
}

function wrongPassword() {
    document.getElementById("wrong-password").style.visibility = "visible";
}

function emptyLogin() {
    document.getElementById("login-empty").style.visibility = "visible";
    document.getElementById("login-empty").style.color = "red";
}

function emptyLoginUser() {
    document.getElementById("login-username-empty").style.visibility = "visible";
    document.getElementById("login-username-empty").style.color = "red";
}

function emptyLoginPassword() {
    document.getElementById("login-password-empty").style.visibility = "visible";
    document.getElementById("login-password-empty").style.color = "red";
}

function emptyRegisterInfo() {
    document.getElementById("password-not-same").style.visibility = "hidden";
    document.getElementById("password-not-same2").style.visibility = "hidden";
    document.getElementById("register-something-empty").style.visibility = "visible";
    document.getElementById("register-something_empty").style.color = "red";
}

function notSamePassword() {
    registerError = true;
    document.getElementById("password-not-same").style.visibility = "visible";
    document.getElementById("password-not-same2").style.visibility = "visible";
    document.getElementById("register-password").style.borderColor = "red";
    document.getElementById("register-confirm-password").style.borderColor = "red";
    registerButtonPressed();
}

function ForgotUserExist() {
    document.getElementById("forgot-id-exist").style.visibility = "hidden";
}

function ForgotUserNotExist() {
    document.getElementById("forgot-id-exist").style.visibility = "visible";
    document.getElementById("forgot-id-exist").style.borderColor = "red";
}

function checkUsername() {
    var username = document.getElementById("register-username").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText.split(",");
            if (response[0] == "true") {
                //Username exist in database
                document.getElementById("register-username").style.borderColor = "red";
                document.getElementById("username-exist").style.visibility = "visible";
                document.getElementById("username-exist").style.color = "red";
            } else if (response[0] == "false") {
                //Username does not exist in database
                document.getElementById("register-username").style.borderColor = "rgba(0,0,0,.26)";
                document.getElementById("username-exist").style.visibility = "hidden";
            } else {
                //Error
                console.log(this.responseText);
            }
        }
    };
    xmlhttp.open("GET","checkUsername.php?username="+username,true);
    xmlhttp.send();
}

function checkID() {
    var id = document.getElementById("register-id").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText.split(",");
            if (response[0] == "true") {
                //Username exist in database
                document.getElementById("register-id").style.borderColor = "red";
                document.getElementById("user-id-exist").style.visibility = "visible";
                document.getElementById("user-id-exist").style.color = "red";
            } else if (response[0] == "false") {
                //Username does not exist in database
                document.getElementById("register-id").style.borderColor = "rgba(0,0,0,.26)";
                document.getElementById("user-id-exist").style.visibility = "hidden";
            } else {
                //Error
                console.log(this.responseText);
            }
        }
    };
    xmlhttp.open("GET","checkUsername.php?id="+id,true);
    xmlhttp.send();
}

function userLogin() {
    var login_username = document.getElementById("login-username").value;
    var login_password = document.getElementById("login-password").value;
    var remember_password = document.getElementById("remember-password").checked;
    var errorPassword = 0;
    
    if (login_username == "" && login_password == "") {
        emptyLogin();
        return;
    } else if (login_username == "") {
        emptyLoginUser();
        return;
    } else if (login_password == "") {
        emptyLoginPassword();
        return;
    }

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if(this.responseText ==  "true") {
                if (remember_password) {
                    createCookie("username",login_username,3);
                    createCookie("password",login_password,3);
                }

                window.location.href = "../SK_Project/Menu/Menu.php";
            } else if (this.responseText == "false") {
                wrongPassword();
            }
        }
    };
    xmlhttp.open("POST","loginRegister.php?login-button=login&login-username="+login_username+"&login-password="+login_password,true);
    xmlhttp.send();
}

function cookieLogin(login_username,login_password) {
    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if(this.responseText ==  "true") {
                window.location.href = "../SK_Project/Menu/Menu.php";
            } else if (this.responseText == "false") {

            }
        }
    };
    xmlhttp.open("POST","loginRegister.php?login-button=login&login-username="+login_username+"&login-password="+login_password,true);
    xmlhttp.send();
}

function userRegister() {
    var register_user_id = document.getElementById("register-id").value;
    var register_username = document.getElementById("register-username").value;
    var register_email = document.getElementById("register-email").value;
    var register_password = document.getElementById("register-password").value;
    var register_confirm_password = document.getElementById("register-confirm-password").value;

    if(register_user_id == "" || register_username == "" || register_email == "" || register_password == "" || register_confirm_password == "") {
        emptyRegisterInfo();
        return;
    }

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if(this.responseText ==  "true") {
                window.alert("Daftar berjaya");
                BackToLoginBox();
            } else if (this.responseText == "false") {
                notSamePassword();
            }
        }
    };
    xmlhttp.open("POST","loginRegister.php?register-button=register&register-id="+register_user_id+"&register-username="+register_username+"&register-email="+register_email+"&register-password="+register_password+"&register-confirm-password="+register_confirm_password,true);
    xmlhttp.send();
}

function makeid(length) {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  
    for (var i = 0; i < length; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));
  
    return text;
}

function userForgot() {
    if (userExist == false) {
        window.alert("User does not exist");
        ForgotUserNotExist();
        return;
    }

    var forgotID = document.getElementById("forgot-id").value;
    if (forgotID == "" || forgotID == null) {
        return;
    }
    code = makeid(6);

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            window.alert("E-mel telah dihantar, periksa e-mel anda.");
            $("#forgot-code").attr("readonly",false); 
            $("#reset-password").attr("readonly",false);
            $("#reset-confirm-password").attr("readonly",false);
            userResetID = forgotID;
        }
    };

    xmlhttp.open("POST","sendEmail.php?code="+code+"&id="+forgotID,true);
    xmlhttp.send();
}

function checkForgotID() {
    var forgotID = document.getElementById("forgot-id").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            var response = this.responseText.split(",");
            if (response[0] == "true") {
                //User exist
                document.getElementById("forgot-username-label").style.opacity = "0";
                setTimeout(function() {
                    document.getElementById("forgot-username").value = response[1];
                },200);
                ForgotUserExist();
                userExist = true;
            } else if (response[0] == "false") {
                document.getElementById("forgot-username-label").style.opacity = "1";
                document.getElementById("forgot-username").value = "";
                userExist = false;
                // ForgotUserNotExist();
            }
        }
    };

    xmlhttp.open("POST","checkUsername.php?id="+forgotID,true);
    xmlhttp.send();
}

function userReset() {
    var ResetPassword = document.getElementById("reset-password").value;
    var ResetCode = document.getElementById("forgot-code").value;
    var ResetConfirmPassword = document.getElementById("reset-confirm-password").value;

    if (ResetPassword == "" || ResetPassword == null) {
        document.getElementById("reset-password-empty").style.opacity = "1";
    } else if (ResetCode != code) {
        document.getElementById("code-incorrect").style.opacity = "1";
    } else if (ResetCode == "" || ResetCode == null) {
        document.getElementById("code-empty").style.opacity = "1";
    } else if (ResetPassword != ResetConfirmPassword) {
        window.alert("Reset kata laluan tidak sama dengan yang anda taipkan, sila cuba lagi.");
        return;
    } else {
        document.getElementById("reset-password-empty").style.opacity = "0";
        document.getElementById("code-incorrect").style.opacity = "0";
        document.getElementById("code-empty").style.opacity = "0";
    }

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if (this.responseText == "1") {
                window.alert("Kata laluan dikembalikan semula. Sila log masuk semula.");
                ForgotBoxOff();
                LoginBoxOn();
            }
        }
    };

    xmlhttp.open("POST","resetPassword.php?id="+userResetID+"&newpassword="+ResetPassword,true);
    xmlhttp.send();
}

$(document).keypress(function(e) {
    if (e.which == 13) clickEnter();
})

function clickEnter() {
    if (page == "register") {
        userRegister();
    } else if (page == "login") {
        userLogin();
    }
}

function showPassword() {
    var checkbox = document.getElementById("show-password").checked;
    if (checkbox) {
        $("#login-password").attr("type","text");
    } else {
        $("#login-password").attr("type","password");
    }
}

function createCookie(name,value,minute) {
    var date = new Date();
    date.setTime(date.getTime() + (minute*60*1000));
    var expiretime = "expires="+ date.toUTCString();
    document.cookie = name + "=" + value + ";" + expiretime + ";path=/";
}


function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }