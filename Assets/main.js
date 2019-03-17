function onLoad() {
    $("#Title").fadeIn("slow");
    LoginBoxOn();
    document.getElementById("Title").style.display = "block";
}

function LoginBoxOn() {
    $(".login-form-box").addClass("show");
    setTimeout(function() {
        $(".login-form-components").addClass("show")
    },1000);
}

function LoginBoxOff() {
    $(".login-form-components").removeClass("show");
    setTimeout(function() {
        $(".login-form-box").removeClass("show");
    },420);
}

function RegisterBoxOn() {
    $(".register-form-box").addClass("show");
    setTimeout(function() {
        $(".register-form-components").addClass("show");
    },1000);
}

function RegisterBoxOff() {
    $(".register-form-components").removeClass("show");
    setTimeout(function() {
        $(".register-form-box").removeClass("show");
    }, 420);
}

function registerButtonPressed() {
    LoginBoxOff();
    setTimeout(function() {
        RegisterBoxOn();
    },500);
}

function BackToLoginBox() {
    RegisterBoxOff();
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

function notSamePassword() {
    document.getElementById("password-not-same").style.visibility = "visible";
    document.getElementById("password-not-same2").style.visibility = "visible";
    document.getElementById("register-password").style.borderColor = "red";
    document.getElementById("register-confirm-password").style.borderColor = "red";
}

function checkUsername() {
    console.log('checked');
    var username = document.getElementById("register-username").value;
    console.log(username);
    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "true") {
                //Username exist in database
                document.getElementById("register-username").style.borderColor = "red";
                //document.getElementById("register-username-label").style.color = "rgba(0,0,0,.26)";
                document.getElementById("username-exist").style.visibility = "visible";
                document.getElementById("username-exist").style.color = "red";
            } else if (this.responseText == "false") {
                //Username does not exist in database
                document.getElementById("register-username").style.borderColor = "rgba(0,0,0,.26)";
                //document.getElementById("register-username-label").style.color = "rgba(0,0,0,.26)";
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