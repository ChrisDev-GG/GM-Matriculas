
function filter() {
    var keyword = document.getElementById("search").value;
    var select = document.getElementById("select-run");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text;
        if(!keyword){
            select.selectedIndex = "0";
            $(select.options[i]).removeAttr('disabled').show();
        } else if (!txt.match(keyword)) {
            $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
            select.selectedIndex = i;
            $(select.options[i]).removeAttr('disabled').show();
        }
    }
}


    