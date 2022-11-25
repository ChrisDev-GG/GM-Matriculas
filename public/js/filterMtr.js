
function filterone() {
    
    var keyword = document.getElementById("search1").value.toLowerCase();
    var select = document.getElementById("select-run1");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text.toLowerCase();
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
    
    var keyword = document.getElementById("search2").value.toLowerCase();
    var select = document.getElementById("select-run2");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text.toLowerCase();
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

    var keyword = document.getElementById("search3").value.toLowerCase();
    var select = document.getElementById("select-run3");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text.toLowerCase();
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
    
    var keyword = document.getElementById("search4").value.toLowerCase();
    var select = document.getElementById("select-run4");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text.toLowerCase();
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

function filterFocus1() {
    
    var keyword = document.getElementById("search1").value.toLowerCase();
    var select = document.getElementById("select-run1");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text.toLowerCase();
        if(!keyword){
            $(select.options[i]).removeAttr('disabled').show();
        } else if (!txt.match(keyword)) {
            $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
            $(select.options[i]).removeAttr('disabled').show();
        }
    }
}

function filterFocus2() {
    
    var keyword = document.getElementById("search2").value.toLowerCase();
    var select = document.getElementById("select-run2");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text.toLowerCase();
        if(!keyword){
            $(select.options[i]).removeAttr('disabled').show();
        } else if (!txt.match(keyword)) {
            $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
            $(select.options[i]).removeAttr('disabled').show();
        }
    }
}

function filterFocus3() {
    
    var keyword = document.getElementById("search3").value.toLowerCase();
    var select = document.getElementById("select-run3");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text.toLowerCase();
        if(!keyword){
            $(select.options[i]).removeAttr('disabled').show();
        } else if (!txt.match(keyword)) {
            $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
            $(select.options[i]).removeAttr('disabled').show();
        }
    }
}

function filterFocus4() {
    
    var keyword = document.getElementById("search4").value.toLowerCase();
    var select = document.getElementById("select-run4");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text.toLowerCase();
        if(!keyword){
            $(select.options[i]).removeAttr('disabled').show();
        } else if (!txt.match(keyword)) {
            $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
            $(select.options[i]).removeAttr('disabled').show();
        }
    }
}


    