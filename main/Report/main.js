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

function changeName() {
    var ID = document.getElementById("aset-id").value;

    if (ID == "") {
        return;
    }

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if (this.responseText != "Not Exist") {
                var data = this.responseText.split(":");
                document.getElementById("aset-name").value = data[0];
                document.getElementById("aset-no").value = data[1];
                document.getElementById("aset-type").value = data[2];
                document.getElementById("aset-report").value = data[3];
            } else {
                document.getElementById("aset-name").value = "";
                document.getElementById("aset-no").value = "";
                document.getElementById("aset-type").value = "";
                document.getElementById("aset-report").value = "";
            }
        }
    };

    xmlhttp.open("POST","getName.php?id="+ID,true);
    xmlhttp.send();
}

function submit() {
    var NamaAset = document.getElementById("aset-name").value;
    var AsetID = document.getElementById("aset-id").value;
    var AsetType = document.getElementById("aset-type").value;
    var AsetNo = document.getElementById("aset-no").value;
    var AsetReport = document.getElementById("aset-report").value;

    if (NamaAset != "" && AsetID != "" && AsetType != "" && AsetReport != "") {
        var xmlhttp = new XMLHttpRequest;
        xmlhttp.onreadystatechange = function() {
            if (this.status == 200 && this.readyState == 4) {
                if (this.responseText == "success") {
                    window.alert("Berjaya menambah laporan ke pangkalan data");
                    document.getElementById("aset-name").value = "";
                    document.getElementById("aset-id").value = "";
                    document.getElementById("aset-type").value = "";
                    document.getElementById("aset-no").value = "";
                    document.getElementById("aset-report").value = "";
                    document.getElementById("aset-id").focus();
                } else if (this.responseText == "Sedit") {
                    window.alert("Berjaya memperbaharui laporan dalam pangkalan data");
                    document.getElementById("aset-name").value = "";
                    document.getElementById("aset-id").value = "";
                    document.getElementById("aset-type").value = "";
                    document.getElementById("aset-no").value = "";
                    document.getElementById("aset-report").value = "";
                    document.getElementById("aset-id").focus();
                } else if (this.responseText == "fail") {
                    window.alert("Ralat berlaku. Sila hubungi pentadbir sistem, @Kin Loke");
                }
            }
        };
        xmlhttp.open("POST","sql.php?AsetName="+NamaAset+"&AsetID="+AsetID+"&AsetType="+AsetType+"&AsetNo="+AsetNo+"&AsetReport="+AsetReport,true);
        xmlhttp.send();
    }
}

$(document).keypress(function(e) {
    if (e.which == 13) submit();
})