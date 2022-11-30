$(document).ready(function(){
    

    const botoncitoInicio = document.querySelector("#iniciarSesion");
    botoncitoInicio.addEventListener("click", function(evento){
        window.location.replace("http://localhost/ProyectoSemestral/view/iniciodeSesion.html?");
    });

    const botoncitoInicioss = document.querySelector("#laOtrasesion");
    botoncitoInicioss.addEventListener("click", function(evento){
        window.location.replace("http://localhost/ProyectoSemestral/view/iniciodeSesion.html?");
    });


});
