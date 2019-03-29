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
            getAset(last_page);
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
        $("#"+aset+"_delete").attr("onclick","deleteAset('"+aset2+"')");
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

function getAset(page) {
    //Prevent page less than 1
    if (page < 1) {
        page = 1;
    }

    end = page * 2;

    startFrom = (page-1) * 2;

    var code = "";

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            asetArray = this.responseText;
            asetArray = asetArray.split(",");
            
            //Prevent page more than existing pages
            if (Math.ceil((asetArray.length - 1)/2) < page) {
                page = Math.ceil((asetArray.length - 1)/2);
                end = page * 2;
                startFrom = (page-1) * 2;
            }

            last_page = document.getElementById("page-input-no").value = page;

            for (var i = startFrom; i<end ;i++) {
                if (asetArray[i] == null || asetArray[i] == "") {

                } else {
                    asetArray2 = asetArray[i].split(":");
                    code = code.concat(
                        "<tr id='"+asetArray2[0].split(" ").join("_")+"'>\n"+
                        "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_")+"_text' value='"+asetArray2[0]+"' readonly=\"true\"></td>\n"+
                        "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_")+"_ID_text' value='"+asetArray2[1]+"' readonly=\"true\"></td>\n"+
                        "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_")+"_jenis_text' value='"+asetArray2[2]+"' readonly=\"true\"></td>\n"+
                        "<td><input type='number' class='aset-input-no data-bold' id='"+asetArray2[0].split(" ").join("_")+"_bilangan_text' value='"+asetArray2[3]+"' readonly=\"true\"></td>\n"+
                        "<td><button type='button' id='"+asetArray2[0].split(" ").join("_")+"_edit' onclick='editAset(\""+asetArray2[0].split(" ").join("_")+"\")'>Edit</button>\n<button type='button' id='"+asetArray2[0].split(" ").join("_")+"_delete' onclick='deleteAset(\""+asetArray2[0].split(" ").join("_")+"\")'>Delete</button></td>\n"+
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

window.onload = function() {
    getAset(1);
}