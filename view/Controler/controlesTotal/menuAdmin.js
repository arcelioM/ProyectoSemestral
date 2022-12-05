$(document).ready(function(){
    
   
    
    const botoncitoCliente = document.querySelector("#NavegarCliente");
    botoncitoCliente.addEventListener("click", function(evento){
        window.location.replace("http://localhost/ProyectoSemestral/view/HomeSesionCliente.html?");
    });

    const botoncitoAdminitrador = document.querySelector("#NavegarAdministrador");
    botoncitoAdminitrador.addEventListener("click", function(evento){
        window.location.replace("http://localhost/ProyectoSemestral/view/HomeSesionAdministrador.html?");
    });

    const botoncitoCerrarSesion = document.querySelector("#CerrarSesionAdmin");
    botoncitoCerrarSesion.addEventListener("click", function(evento){
        window.location.replace("http://localhost/ProyectoSemestral/view/iniciodeSesion.html?");
    });

    

});