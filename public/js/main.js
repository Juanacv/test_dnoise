$(document).ready(function() {
    $("#filtro").on("change", function(e) {
       var url = window.location.href;
       var urlArr = url.split("/");
       url = "";
       for (var i = 0; i < urlArr.length-2; i++) {
           url += urlArr[i]+"/";
       }
       window.location.href = url+$("#filtro").val()+"/"+$("#primeros").val();
    });
    $("#primeros").on("change", function(e) {
       var url = window.location.href;
       var urlArr = url.split("/");
       url = "";
       for (var i = 0; i < urlArr.length-2; i++) {
           url += urlArr[i]+"/";
       }
       window.location.href = url+$("#filtro").val()+"/"+$("#primeros").val();
    });
});

