function onLoad() {
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

    if (NamaAset != "" && AsetID != "" && AsetType != "") {
        var xmlhttp = new XMLHttpRequest;
        xmlhttp.onreadystatechange = function() {
            if (this.status == 200 && this.readyState == 4) {
                if (this.responseText == "success") {
                    window.alert("Successfully added aset into database");
                } else if (this.responseText == "fail") {
                    window.alert("Error occured. Please contact system administrator, @Kin Loke");
                }
            }
        };
        xmlhttp.open("POST","sql.php?AsetName="+NamaAset+"&AsetID="+AsetID+"&AsetType"+AsetType,true);
        xmlhttp.send();
    }
}