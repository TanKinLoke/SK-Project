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