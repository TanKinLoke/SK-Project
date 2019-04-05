window.onload = function() {
    $("#Title").fadeIn();
    setTimeout(function() {
        $(".aset-input").addClass("show");
        $(".aset-input-no").addClass("show");
        setTimeout(function() {
            $(".button-submit").addClass("show");
        },400);
    },300);
}

function submit() {
    var NamaAset = document.getElementById("aset-name").value;
    var AsetID = document.getElementById("aset-id").value;
    var AsetType = document.getElementById("aset-type").value;
    var AsetNo = document.getElementById("aset-no").value;

    if (NamaAset != "" && AsetID != "" && AsetType != "") {
        var xmlhttp = new XMLHttpRequest;
        xmlhttp.onreadystatechange = function() {
            if (this.status == 200 && this.readyState == 4) {
                if (this.responseText == "success") {
                    window.alert("Successfully added aset into database");
                    document.getElementById("aset-name").value = "";
                    document.getElementById("aset-id").value = "";
                    document.getElementById("aset-type").value = "";
                    document.getElementById("aset-no").value = "";
                    document.getElementById("aset-name").focus();
                } else {
                    window.alert("Error occured. Please contact system administrator, @Kin Loke");
                }
            }
        };
        xmlhttp.open("POST","sql.php?AsetName="+NamaAset+"&AsetID="+AsetID+"&AsetType="+AsetType+"&AsetNo="+AsetNo,true);
        xmlhttp.send();
    }
}

$(document).keypress(function(e) {
    if (e.which == 13) submit();
})