$(document).ready(function(){
    
    $('#IngresarNuevaCuenta').hide();
    $('#MensajeError').hide();
    

    $('#UsuarioForm').submit(function (e) {  /*esta función la usamos para traer los datos del formulario y 
          enviarlos a la base dartos al darle al botón de guardar tarea siempre y cuando haya datos en los campos*/
        //console.log('Hello funicona perrosossos');
        const postDatos= { //Este Objeto funciona para poder obtener los datos que se ingresen en formulario 
            usuario : $('#usuario').val(),
            password: $('#contrasena').val(),
        };

        let url= 'http://localhost/ProyectoNo1/Model/InicioSesion/login.php?'; 

        $.post(url, postDatos, function (response){ /* 
                                este método post de Jquery es una forma más corta para no tener que usar ajx y 
                                cumple el mismo objetivo que el ajax de enviar datos o traerlos sin refrescar */

            if(response.success == "Error"){
                $('#MensajeError').show();
            }else{
                window.location.replace("http://localhost/ProyectoNo1/Vista/Home.html");
            }
            $('#UsuarioForm').trigger('reset'); //esto es para cuando se recive una respuetas se resete el formulario 
            const boton = document.querySelector("#laequis");
            boton.addEventListener("click", function(evento){
                $('#MensajeError').hide();
            });
        });
        e.preventDefault(); //Este método es para cancelar el comportamiento que por defecto los formularios al darle submit norefresquen la página
    });


});

