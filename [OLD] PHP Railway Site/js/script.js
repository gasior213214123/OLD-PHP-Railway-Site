$(document).ready(function(){
    //ZEGAR
    $("#clock time").html(new Date().toLocaleString().split(" ")[1]);
    
    setInterval(function(){
        $("#clock time").html(new Date().toLocaleString().split(" ")[1]);
    }, 1000);
});
   
