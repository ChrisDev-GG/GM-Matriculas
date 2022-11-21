
let send = document.getElementById("send");
let send2 = document.getElementById("send2");

let hideA = document.getElementById("btnApoderadoHide");
let hideS = document.getElementById("btnSuplenteHide");

let hideDiv = document.getElementById("hideSuplentes");
$("#hideSuplentes").hide().css("visibility", "hidden");

send.addEventListener("click", ()=>{
    let inp1 = document.getElementById("select-run1");
    let inp2 = document.getElementById("select-run2");
    if(inp1.selectedIndex == 0 || inp2.selectedIndex == 0){
    $("#target").attr("target", "_self");
    } 
});

send2.addEventListener("click", ()=>{
    let inp1 = document.getElementById("select-run3");
    let inp2 = document.getElementById("select-run4");
    if(inp1.selectedIndex == 0 || inp2.selectedIndex == 0){
    $("#target2").attr("target", "_self");
    } 
});

hideA.addEventListener("click", ()=>{
    $("#hideApoderados").hide().css("visibility", "hidden");
    $("#hideSuplentes").show().css("visibility", "visible");
});
hideS.addEventListener("click", ()=>{
    $("#hideApoderados").show().css("visibility", "visible");
    $("#hideSuplentes").hide().css("visibility", "hidden");;
});