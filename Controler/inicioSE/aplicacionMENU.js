$(document).ready(function(){
    const botoncito = document.querySelector("#cerrarSesion");
    botoncito.addEventListener("click", function(evento){
        window.location.replace("http://localhost/ProyectoNo1/Vista/index.html?");
    });

});
