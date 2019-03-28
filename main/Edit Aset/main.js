var last_focus_aset;
var last_focus_id;
var last_focus_text;
var last_focus_type;
var last_focus_bilangan;

function editAset(aset) {
    last_focus_aset = aset;
    last_focus_id = aset+"_text";
    last_focus_text = document.getElementById(last_focus_id).value;
    last_focus_type = document.getElementById(aset+"_jenis_text").value;
    last_focus_bilangan = document.getElementById(aset+"_bilangan_text").value;

    $("#"+aset+"_text").attr("readonly",false);
    $("#"+aset+"_ID_text").attr("readonly",false);
    $("#"+aset+"_jenis_text").attr("readonly",false);
    $("#"+aset+"_bilangan_text").attr("readonly",false);
    $("#"+aset+"_edit").attr("onclick","doneEdit(\""+aset+"\")");
    $("#"+aset+"_edit").text("Done");
}

function doneEdit(aset) {
    last_focus_id = "";
    last_focus_text = "";
    var aset2 = document.getElementById(aset+"_text").value;

    editName(aset);
    editID(aset2);
    editJenis(aset2);
    editBilangan(aset2);

    $("#"+aset2+"_text").attr("readonly",true);
    $("#"+aset2+"_ID_text").attr("readonly",true);
    $("#"+aset2+"_jenis_text").attr("readonly",true);
    $("#"+aset2+"_bilangan_text").attr("readonly",true);
    $("#"+aset2+"_edit").attr("onclick","editAset('"+aset2+"')");
    $("#"+aset2+"_edit").text("Edit");
}

function deleteAset(aset) {
    aset = aset.replace("_"," ");

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#"+aset.split(" ").join("_")).remove();
        }
    };
    xmlhttp.open("POST", "sql.php?function=delete&data=\"" + aset + "\"", true);
    xmlhttp.send();
}

function editName(aset) {
    var aset2 = document.getElementById(aset+"_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        aset2 = aset2.replace(" ","_");

        //Old version code, onchange
        // $("#"+aset+"_text").attr("onchange","editName('"+aset2+"')");
        // $("#"+aset+"_ID_text").attr("onchange","editID('"+aset2+"')");
        // $("#"+aset+"_jenis_text").attr("onchange","editJenis('"+aset2+"')");
        // $("#"+aset+"_bilangan_text").attr("onchange","editBilangan('"+aset2+"')");

        $("#"+aset+"_edit").attr("onclick","editAset('"+aset2+"')");
        $("#"+aset+"_delete").attr("onclick","deleteaset('"+aset2+"')");
        $("#"+aset).attr("id",aset2);
        $("#"+aset+"_text").attr("id",aset2+"_text");
        $("#"+aset+"_ID_text").attr("id",aset2+"_ID_text");
        $("#"+aset+"_jenis_text").attr("id",aset2+"_jenis_text");
        $("#"+aset+"_bilangan_text").attr("id",aset2+"_bilangan_text");
        $("#"+aset+"_edit").attr("id",aset2+"_edit");
        $("#"+aset+"_delete").attr("id",aset2+"_delete");
    };

    aset = aset.replace("_"," ");
    xmlhttp.open("POST","sql.php?function=editName&data=\"" + aset + "\"&data2=\"" + aset2 + "\"",true);
    aset = aset.replace(" ","_");
    xmlhttp.send();
}

function editID(aset) {
    var data = document.getElementById(aset+"_ID_text").value;
    console.log(data);

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        
    };

    aset = aset.replace("_"," ");
    xmlhttp.open("POST","sql.php?function=editID&data=\"" + aset + "\"&data2=\"" + data + "\"",true);
    aset = aset.replace(" ","_");
    xmlhttp.send();
}

function editJenis(aset) {
    var data = document.getElementById(aset+"_jenis_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {

    };

    aset = aset.replace("_"," ");
    xmlhttp.open("POST","sql.php?function=editJenis&data=\"" + aset + "\"&data2=\"" + data + "\"",true);
    aset = aset.replace(" ","_");
    xmlhttp.send();
}

function editBilangan(aset) {
    var data = document.getElementById(aset+"_bilangan_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {

    };

    aset = aset.replace("_"," ");
    xmlhttp.open("POST","sql.php?function=editBilangan&data=\"" + aset + "\"&data2=\"" + data + "\"",true);
    aset = aset.replace(" ","_");
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
        doneEdit(last_focus_text);
    }
}

function clickESC() {
    if (last_focus_id != "" || last_focus_text != "" || last_focus_id != null || last_focus_text != null) {
        document.getElementById(last_focus_id).value = last_focus_text;  
        document.getElementById(last_focus_text+"_jenis_text").value = last_focus_type;
        document.getElementById(last_focus_text+"_bilangan_text").value = last_focus_bilangan;
        doneEdit(last_focus_text);
    }
}

