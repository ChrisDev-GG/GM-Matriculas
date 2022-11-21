
function filterone() {
    
    var keyword = document.getElementById("search1").value;
    var select = document.getElementById("select-run1");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text;
        if(!keyword){
            select.selectedIndex = "0";
            $(select.options[i]).removeAttr('disabled').show();
        } else if (!txt.match(keyword)) {
            $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
            $(select.options[i]).removeAttr('disabled').show();
            select.selectedIndex = i;
        }
    }
    
}

function filtertwo() {
    
    var keyword = document.getElementById("search2").value;
    var select = document.getElementById("select-run2");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text;
        if(!keyword){
            select.selectedIndex = "0";
            $(select.options[i]).removeAttr('disabled').show();
        } else if (!txt.match(keyword)) {
            $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
            $(select.options[i]).removeAttr('disabled').show();
            select.selectedIndex = i;
        }
    }
}

function filterthree() {

    var keyword = document.getElementById("search3").value;
    var select = document.getElementById("select-run3");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text;
        if(!keyword){
            select.selectedIndex = "0";
            $(select.options[i]).removeAttr('disabled').show();
        } else if (!txt.match(keyword)) {
            $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
            $(select.options[i]).removeAttr('disabled').show();
            select.selectedIndex = i;
        }
    }
    
}

function filterfour() {
    
    var keyword = document.getElementById("search4").value;
    var select = document.getElementById("select-run4");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text;
        if(!keyword){
            select.selectedIndex = "0";
            $(select.options[i]).removeAttr('disabled').show();
        } else if (!txt.match(keyword)) {
            $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
            $(select.options[i]).removeAttr('disabled').show();
            select.selectedIndex = i;
        }
    }
}
    


    