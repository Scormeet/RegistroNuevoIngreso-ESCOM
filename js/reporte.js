function showRegistry(fecha){
    var x = document.getElementById(fecha);
    $("#registros").children().css( "display", "none" );
    x.style.display = "block";
}