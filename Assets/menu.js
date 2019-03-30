window.onload = function() {
    $("#Title").fadeIn("slow");
    document.getElementById("Title").style.display = "block";
    setTimeout(function() {
        $(".cp-box").addClass("show");
    },500);
}