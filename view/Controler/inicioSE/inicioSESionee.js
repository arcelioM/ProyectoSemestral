$(document).ready(function(){
    
  
    $('#MensajeError').hide();
    

    $('#UsuarioForm').submit(function (e) {  
        const postDatos= { //Este Objeto funciona para poder obtener los datos que se ingresen en formulario 
            usuario : $('#usuario').val(),
            password: $('#contrasena').val(),
        };

        let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/usuarioInicioSesion.php?'; 
       

        $.post(url, postDatos, function (response){ 
            let usuarios = response;
            usuarios.forEach(usercredencial => {
                if(usercredencial.valor == "0"){
                    $('#MensajeError').show();
                    console.log(usercredencial.valor);
                }else{
                    if(usercredencial.Cantidad == "2"){
                        window.location.replace("http://localhost/ProyectoSemestral/view/MenuAdministrador.html");
                    }else{
                        if(usercredencial.Cantidad == "1"){
                            window.location.replace("http://localhost/ProyectoSemestral/view/HomeSesionCliente.html");
                        }
                    }
                }
                $('#UsuarioForm').trigger('reset'); //esto es para cuando se recive una respuetas se resete el formulario 
                const boton = document.querySelector("#laequis");
                boton.addEventListener("click", function(evento){
                    $('#MensajeError').hide();
                });
            });  
            
            
        });
        e.preventDefault(); //Este método es para cancelar el comportamiento que por defecto los formularios al darle submit norefresquen la página
    });


    $('#formularioRegistrarUusuario').submit(function (e) {  
        const postDatos= {  
            nombre : $('#NombreUSER').val(),
            Apellido : $('#apelliodUSER').val(),
            email : $('#correoUSER').val(),
            contraseña : $('#PasswordUSER').val(),
            direccion : $('#DireccionUSER').val(),
            telefono_1 : $('#telefonoUnoUSER').val(),
            telefono_2 : $('#telefonoDosUSER').val(),
            imagen: $('#imagenTraV').val(),
            id_rol: $('#id_rol').val(),
        };

        let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/registrarUserClie.php?'; 

        $.post(url, postDatos, function (response){ 
            let template = '';
            let tempaltess = '';
            let usuarioRegistado = response;
            usuarioRegistado.forEach(usercreado => {
                if(usercreado.valor == "1"){
                    template += `<h1 class="modal-title fs-5 text-center" id="exampleModalTecnologia"> Los Datos del Usuario  han sido registrados con Éxito y listo para navegar.  </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    `;
                    tempaltess += `<center>
                           <img src="http://localhost/ProyectoSemestral/view/imagenes/correcto.gif" class="imga">
                        </center>`;
                    $('#exampleModalLabelIngresoaux').html(template);
                    $('#modalImageIngresoaux').html(tempaltess);
                    $('#formularioRegistrarUusuario').trigger('reset');
                } else {
                    if (usercreado.valor == "0") {
                        template += `<h1 class="modal-title fs-5 text-center" id="exampleModalTecnologia"> Los Datos del Usuario no ha podido ser registrados.  </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    `;
                        tempaltess += `<center>
                           <img src="http://localhost/ProyectoSemestral/view/imagenes/errosillo.gif" class="imga">
                        </center>`;
                        $('#exampleModalLabelIngresoaux').html(template);
                        $('#modalImageIngresoaux').html(tempaltess);
                    } else {
                        if (usercreado.valor === null) {
                            template += `<h1 class="modal-title fs-5 text-center" id="exampleModalTecnologia"> Lo Sentimos, ya se encuentra un Usuario registarado con los mismo datos.  </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        `;
                            tempaltess += `<center>
                               <img src="http://localhost/ProyectoSemestral/view/imagenes/errosillo.gif" class="imga">
                            </center>`;
                            $('#exampleModalLabelIngresoaux').html(template);
                            $('#modalImageIngresoaux').html(tempaltess);
                        }
                    }
                }
            });  
            
        });
        e.preventDefault(); //Este método es para cancelar el comportamiento que por defecto los formularios al darle submit no refresquen la página
    });


    const botoncitoTraerProvincias = document.querySelector("#RegistrarCuenta");
    botoncitoTraerProvincias.addEventListener("click", function (evento) {
        TraerProvincias();
    });


    function TraerProvincias(){
        $.ajax({
            type: "GET", // usamos este método porque nos traeremos los resultados sin enviar ningún otro dato
            url: "http://localhost/ProyectoSemestral/view/phpPruebas/BuscarProvin.php?",
            success: function (response) {
                let template = '';
                let templatess = '';

                let provinvincia = response;
                provinvincia.forEach(ProvinciaMostar => {
                    template += `
                    <option value="${ProvinciaMostar.id_provincia}"> ${ProvinciaMostar.nombre}</option>
                `;  
                });
                templatess += `
                    <option selected>Escoja una provincias </option>
                `;  
                $('#ProvinciaABuscar').html(templatess+template);    
            }
        });
    }


    let showForm=()=>{
        
        let id_provincia=$("#ProvinciaABuscar").val();
        $.ajax({
            type: "POST",
            url: "http://localhost/ProyectoSemestral/view/phpPruebas/BuscarDistrito.php?",
            data: { id_provincia },
            success: function (response) {
                let template = '';
                let templatess = '';

                let distritos = response;
                distritos.forEach(DistritoTotal => {
                    template += `
                    <option value="${DistritoTotal.id_distrito}"> ${DistritoTotal.nombre}</option>
                `;  
                });
                templatess += `
                    <option selected>Escoja un Distrito </option>
                `;  
                $('#DistritoABuscar').html(templatess+template); 
                
            }
        });
        
        
    };

    $("#ProvinciaABuscar").on('change',showForm);


    let showFormAT=()=>{
        
        let id_distrito=$("#DistritoABuscar").val();
        $.ajax({
            type: "POST",
            url: "http://localhost/ProyectoSemestral/view/phpPruebas/BuscarCorregimiento.php?",
            data: { id_distrito },
            success: function (response) {
                let template = '';
                let templatess = '';

                let corregimiento = response;
                corregimiento.forEach(CorregmientoTotal => {
                    template += `
                    <option value="${CorregmientoTotal.id_corregimiento}"> ${CorregmientoTotal.nombre}</option>
                `;  
                });
                templatess += `
                    <option selected>Escoja un Corregimiento </option>
                `;  
                $('#CorregimientoBuscar').html(templatess+template); 
                
            }
        });
        
        
    };

    $("#DistritoABuscar").on('change',showFormAT);








});

