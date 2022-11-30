$(document).ready(function(){
    
    const botoncito = document.querySelector("#CancelarRegsitro");
    botoncito.addEventListener("click", function(evento){
        window.location.replace("http://localhost/ProyectoSemestral/view/HomeSinSesion.html?");
    });

});