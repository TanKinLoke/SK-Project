var last_focus_aset;
var last_focus_id = "";
var last_focus_text;
var last_focus_type;
var last_focus_bilangan;
var last_page;

function editAset(aset) {
    if (last_focus_id != "" && last_focus_id != null) {
        doneEdit(last_focus_text.split(" ").join("_"));
    }

    last_focus_aset = aset; 
    last_focus_id = aset+"_text";
    last_focus_text = document.getElementById(last_focus_id).value;
    last_focus_type = document.getElementById(aset+"_jenis_text").value;
    last_focus_bilangan = document.getElementById(aset+"_bilangan_text").value;

    $("#"+aset+"_text").attr("readonly",false);
    $("#"+aset+"_ID_text").attr("readonly",false);
    $("#"+aset+"_jenis_text").attr("readonly",false);
    $("#"+aset+"_bilangan_text").attr("readonly",false);
    document.getElementById(aset+"_text").style.backgroundColor = "rgb(44,44,44)";
    document.getElementById(aset+"_ID_text").style.backgroundColor = "rgb(44,44,44)";
    document.getElementById(aset+"_jenis_text").style.backgroundColor = "rgb(44,44,44)";
    document.getElementById(aset+"_bilangan_text").style.backgroundColor = "rgb(44,44,44)";
    $("#"+aset+"_edit").attr("onclick","doneEdit(\""+aset+"\")");
    $("#"+aset+"_edit").text("Done");
    test = document.getElementById(aset+"_text").value;
    document.getElementById(aset+"_text").value = ""; 
    document.getElementById(aset+"_text").value = test; 
    document.getElementById(aset+"_text").focus();
}

function doneEdit(aset) {
    last_focus_id = "";
    last_focus_text = "";
    var aset2 = document.getElementById(aset+"_text").value;
    aset2 = aset2.split(" ").join("_").split("\'").join("-");

    editName(aset);
    editID(aset2);
    editJenis(aset2);
    editBilangan(aset2);

    aset2 = aset2.split(" ").join("_").split("\'").join("-");
    console.log(aset2);
    $("#"+aset2+"_text").attr("readonly",true);
    $("#"+aset2+"_ID_text").attr("readonly",true);
    $("#"+aset2+"_jenis_text").attr("readonly",true);
    $("#"+aset2+"_bilangan_text").attr("readonly",true);
    document.getElementById(aset+"_text").style.backgroundColor = "black";
    document.getElementById(aset+"_ID_text").style.backgroundColor = "black";
    document.getElementById(aset+"_jenis_text").style.backgroundColor = "black";
    document.getElementById(aset+"_bilangan_text").style.backgroundColor = "black";
    $("#"+aset2+"_edit").attr("onclick","editAset('"+aset2+"')");
    $("#"+aset2+"_edit").text("Edit");
}

function deleteAset(aset) {
    aset = aset.split("_").join(" ").split("-").join("\'");

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#"+aset.split(" ").join("_")).remove();
            getAset(last_page);
        }
    };
    xmlhttp.open("POST", "sql.php?function=delete&data=" + aset, true);
    xmlhttp.send();
}

function editName(aset) {
    var aset2 = document.getElementById(aset+"_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        aset2 = aset2.split(" ").join("_").split("\'").join("-");
        aset = aset.split(" ").join("_").split("\'").join("-");

        //Old version code, onchange
        // $("#"+aset+"_text").attr("onchange","editName('"+aset2+"')");
        // $("#"+aset+"_ID_text").attr("onchange","editID('"+aset2+"')");
        // $("#"+aset+"_jenis_text").attr("onchange","editJenis('"+aset2+"')");
        // $("#"+aset+"_bilangan_text").attr("onchange","editBilangan('"+aset2+"')");

        $("#"+aset+"_edit").attr("onclick","editAset('"+aset2+"')");
        $("#"+aset+"_delete").attr("onclick","deleteAset('"+aset2+"')");
        $("#"+aset).attr("id",aset2);
        $("#"+aset+"_text").attr("id",aset2+"_text");
        $("#"+aset+"_ID_text").attr("id",aset2+"_ID_text");
        $("#"+aset+"_jenis_text").attr("id",aset2+"_jenis_text");
        $("#"+aset+"_bilangan_text").attr("id",aset2+"_bilangan_text");
        $("#"+aset+"_edit").attr("id",aset2+"_edit");
        $("#"+aset+"_delete").attr("id",aset2+"_delete");
    };

    aset = aset.split("_").join(" ").split("-").join("\'");
    xmlhttp.open("POST","sql.php?function=editName&data=" + aset + "&data2=" + aset2,true);
    aset = aset.split(" ").join("_").split("\'").join("-");
    xmlhttp.send();
}

function editID(aset) {
    var data = document.getElementById(aset+"_ID_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        
    };

    aset = aset.split("_").join(" ");
    xmlhttp.open("POST","sql.php?function=editID&data=" + aset + "&data2=" + data,true);
    aset = aset.split(" ").join("_");
    xmlhttp.send();
}

function editJenis(aset) {
    var data = document.getElementById(aset+"_jenis_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {

    };

    aset = aset.split("_").join(" ").split("-").join("\'");
    xmlhttp.open("POST","sql.php?function=editJenis&data=" + aset + "&data2=" + data,true);
    aset = aset.split(" ").join("_").split("\'").join("-");
    xmlhttp.send();
}

function editBilangan(aset) {
    var data = document.getElementById(aset+"_bilangan_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {

    };

    aset = aset.split("_").join(" ");
    xmlhttp.open("POST","sql.php?function=editBilangan&data=" + aset + "&data2=" + data,true);
    aset = aset.split(" ").join("_");
    xmlhttp.send();
}

$(document).keypress(function(e) { 
    if (e.which == 13) clickEnter();   // enter (works as expected)
});

$(document).keyup(function(e) { 
    if (e.which == 27) clickESC();   // enter (works as expected)
});

function clickEnter() {
    console.log('Enter');
    if (last_focus_id != "" || last_focus_text != "" || last_focus_id != null || last_focus_text != null) {
        doneEdit(last_focus_aset);
    }
}

function clickESC() {
    if (last_focus_id != "" || last_focus_text != "" || last_focus_id != null || last_focus_text != null) {
        document.getElementById(last_focus_id).value = last_focus_text;  
        document.getElementById(last_focus_text+"_jenis_text").value = last_focus_type;
        document.getElementById(last_focus_text+"_bilangan_text").value = last_focus_bilangan;
        doneEdit(last_focus_aset);
    }
}

function getAset(page) {
    //Prevent page less than 1
    if (page < 1) {
        page = 1;
    }

    end = page * 3;

    startFrom = (page-1) * 3;

    var code = "";

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            asetArray = this.responseText;
            asetArray = asetArray.split(",");
            
            //Prevent page more than existing pages
            if (Math.ceil((asetArray.length - 1)/3) < page) {
                page = Math.ceil((asetArray.length - 1)/3);
                end = page * 3;
                startFrom = (page-1) * 3;
            }

            last_page = document.getElementById("page-input-no").value = page;

            code = code.concat("<tr><td>Nama Aset</td><td>Kod Aset</td><td>Jenis Aset</td><td>Bilangan Aset</td></tr>");
            for (var i = startFrom; i<end ;i++) {
                if (asetArray[i] == null || asetArray[i] == "") {

                } else {
                    asetArray2 = asetArray[i].split(":");
                    code = code.concat(
                        "<tr id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"'>\n"+
                        "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_text' value='"+asetArray2[0].split("\'").join("&#039;")+"' readonly=\"true\"></td>\n"+
                        "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_ID_text' value='"+asetArray2[1]+"' readonly=\"true\"></td>\n"+
                        "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_jenis_text' value='"+asetArray2[2].split("\'").join("&#039;")+"' readonly=\"true\"></td>\n"+
                        "<td><input type='number' class='aset-input-no data-bold' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_bilangan_text' value='"+asetArray2[3]+"' readonly=\"true\"></td>\n"+
                        "<td><button type='button' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_edit' onclick='editAset(\""+asetArray2[0].split(" ").join("_").split("\'").join("-")+"\")'>Edit</button>\n<button type='button' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_delete' onclick='deleteAset(\""+asetArray2[0].split(" ").join("_").split("\'").join("-")+"\")'>Delete</button></td>\n"+
                        "</tr>\n"
                    )
            };
            $("#aset-settings").html("");
            $("#aset-settings").append("<tbody>"+code+"</tbody>");
        }
    }
    };

    xmlhttp.open("POST","getAset.php",true);
    xmlhttp.send();

}

function getAsetBySearch() {
    filter = document.getElementById("filter").value;
    if (filter == "") {
        getAset(last_page);
        return;
    } else {
        filter = filter.toUpperCase();
    }

    var code = "";

    var queryType = document.getElementById("queryType").value;

    queryNo = 0;

    if (queryType == "Aset Name") {
        queryNo = 0;
    } else if (queryType == "Aset ID") {
        queryNo = 1;
    } else if (queryType == "Jenis Aset") {
        queryNo = 2;
    }

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            asetArray = this.responseText;
            asetArray = asetArray.split(",");

            code = code.concat("<tr><td>Nama Aset</td><td>Kod Aset</td><td>Jenis Aset</td><td>Bilangan Aset</td></tr>");

            for (var i = 0; i< asetArray.length ;i++) {
                if (asetArray[i] == null || asetArray[i] == "") {

                } else {
                    asetArray2 = asetArray[i].split(":");
                    if (asetArray2[queryNo].toUpperCase().indexOf(filter) > -1) {
                        code = code.concat(
                            "<tr id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"'>\n"+
                            "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_text' value='"+asetArray2[0].split("\'").join("&#039;")+"' readonly=\"true\"></td>\n"+
                            "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_ID_text' value='"+asetArray2[1]+"' readonly=\"true\"></td>\n"+
                            "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_jenis_text' value='"+asetArray2[2].split("\'").join("&#039;")+"' readonly=\"true\"></td>\n"+
                            "<td><input type='number' class='aset-input-no data-bold' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_bilangan_text' value='"+asetArray2[3]+"' readonly=\"true\"></td>\n"+
                            "<td><button type='button' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_edit' onclick='editAset(\""+asetArray2[0].split(" ").join("_").split("\'").join("-")+"\")'>Edit</button>\n<button type='button' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_delete' onclick='deleteAset(\""+asetArray2[0].split(" ").join("_").split("\'").join("-")+"\")'>Delete</button></td>\n"+
                            "</tr>\n"
                        )
                    }
            };
            $("#aset-settings").html("");
            $("#aset-settings").append("<tbody>"+code+"</tbody>");
        }
    }
    };

    xmlhttp.open("POST","getAset.php",true);
    xmlhttp.send();

}

window.onload = function() {
    $("#Title").fadeIn();
    getAset(1);
}