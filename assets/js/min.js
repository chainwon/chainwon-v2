/** tab **/
var tabs = document.getElementById("tab").getElementsByTagName("li");
var divs = document.getElementById("tab_con").getElementsByTagName("dt");
for (var i = 0; i < tabs.length; i++) {
    tabs[i].onclick = function() {
        change(this);
        var idvalue = $(this).attr('for');
    alert(idvalue);
    }
}

function change(obj) {
    for (var i = 0; i < tabs.length; i++) {
        if (tabs[i] == obj) {
            tabs[i].className = "tabnow";
            divs[i].className = "tabnow";
        } else {
            tabs[i].className = "";
            divs[i].className = "";
        }
    }
}