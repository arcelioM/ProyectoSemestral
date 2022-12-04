$(document).ready(function(){
    
    $('#MostarUser').hide();
    $('#MostrarTablapedidos').hide();

    $('#MostarPedidosEntregados').hide();
    $('#MostarPedidosEnProceso').hide();
    $('#MostarPedidosCancelados').hide();

    $('#TitulitoOpcionesVerPedidos').hide();
    $('#botonesNegacionPedidos').hide();
    



    CargarPerfil();
    

    $("#MenuNavegacion").click(function(){
        $(this).toggleClass("btn-warning btn-success ");
    });

   // BOTONES DEL MENÚ DE NAVEGACIÓN QUE APARECE AL CARGA LA PÁGINA
    const botoncitoVerUsua = document.querySelector("#VerUsuarios");
    botoncitoVerUsua.addEventListener("click", function (evento) {
        $('#TitulitoOpcionesAdminitrador').hide();
        $('#botonesNegacion').hide();
        $('#MostarUser').show();
        $('#MostrarTablapedidos').hide();
        $('#MostarPedidosEntregados').hide();
        $('#MostarPedidosEnProceso').hide();
        $('#MostarPedidosCancelados').hide();
        $('#TitulitoOpcionesVerPedidos').hide();
        $('#botonesNegacionPedidos').hide();
       
    });

    
    const botoncitoVerPedidos = document.querySelector("#VerPedidos");
    botoncitoVerPedidos.addEventListener("click", function (evento) {
        $('#TitulitoOpcionesAdminitrador').hide();
        $('#botonesNegacion').hide();
        $('#MostarUser').hide();
        $('#MostrarTablapedidos').hide();
        $('#MostarPedidosEntregados').hide();
        $('#MostarPedidosEnProceso').hide();
        $('#MostarPedidosCancelados').hide();
        $('#TitulitoOpcionesVerPedidos').show();
        $('#botonesNegacionPedidos').show();
       
    });

    //ESTA SECCIÓN ES PARA LA NECGACIÓN DENTRO DE LA OCIÓN DE VER PEDIDOS 




    // BOTONES DEL MENÚ DE NAVEGACIÓN QUE APARECE EN EL MODAL AL PRESIONAR "MENÚ DE NAVEGACIÓN "

    const botoncitoVerUserAux = document.querySelector("#UserTotal");
    botoncitoVerUserAux.addEventListener("click", function (evento) {
        $('#MostarUser').show();
        $('#TitulitoOpcionesAdminitrador').hide();
        $('#botonesNegacion').hide();
        $('#MostrarTablapedidos').hide();
        $('#MostarPedidosEntregados').hide();
        $('#MostarPedidosEnProceso').hide();
        $('#MostarPedidosCancelados').hide();
        $('#TitulitoOpcionesVerPedidos').hide();
        $('#botonesNegacionPedidos').hide();

    });

    const botoncitoCompu = document.querySelector("#PedidosTotal");
    botoncitoCompu.addEventListener("click", function (evento) {
        $('#MostarUser').hide();
        $('#TitulitoOpcionesAdminitrador').hide();
        $('#botonesNegacion').hide();
        $('#MostrarTablapedidos').hide();
        $('#MostarPedidosEntregados').hide();
        $('#MostarPedidosEnProceso').hide();
        $('#MostarPedidosCancelados').hide();
        $('#TitulitoOpcionesVerPedidos').show();
        $('#botonesNegacionPedidos').show();
        
    });

    const botoncitoCerrarSesion = document.querySelector("#Cierresesion");
    botoncitoCerrarSesion.addEventListener("click", function (evento) {
        window.location.replace("http://localhost/ProyectoSemestral/view/MenuAdministrador.html");
    });




    //ESTA SECCIÓN ES PARA LO QUE SE HACE CUANDO EL USUARIO QUIERE VER SUS CREDENCIALES O DATSO DE SESIÓN PAAR VAMBIARLOS O CERRAR SESÓN 
    

    $(document).on('click', '.cerrarSesionAdminsitrador', function(){
        window.location.replace("http://localhost/ProyectoSemestral/view/MenuAdministrador.html");
    });

    
    function CargarPerfil() {  
       
        let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/datosUsere.php?'; 

        $.get(url, function (response){ 
            let template = '';
            let usuarioNaveggando = response;
            usuarioNaveggando.forEach(usernavegando => {
                    template += `
                    <form class="form-inline my-2 my-lg-0" id="PerfilUser">
                    <img src="http://localhost/ProyectoSemestral/view/imagenes/${usernavegando.imagen}" class="img">
                    <label for="Usuario" class="form-control-sm mr-sm-5"><FONT color="white">${usernavegando.nombre} ${usernavegando.Apellido}</FONT></label>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle " data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                            <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
                          </svg>
                          Opciones
                        </button>
                        
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li><a class="dropdown-item verProfiles" href="#" data-bs-toggle="modal" data-bs-target="#ModaleUserDatos" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                          </svg>
                          Perfil</a></li>
                          <li><a class="dropdown-item cerrarSesionAdminsitrador" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1h-1z"/>
                            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                          </svg>
                          Cerrar Sesión</a></li>
                          <li><a class="dropdown-item EliminarSesionAdmin" href="#" data-bs-toggle="modal" data-bs-target="#ModalDarsedeBajaAux"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                          <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                            </svg>
                          Darse de Baja</a></li>
                          
                        </ul>
                    </div>
                    </form>
                    `;
                    
                    $('#PerfilUser').html(template);
            });  
            
        });
    }

   
    $(document).on('click', '.verProfiles', function(){ //Esto sólo para ver los datos del perfil del usuario 
        let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/VerProfile.php?'; 

        $.get(url, function (response){ 
            let template = '';
            let usuarioNavegando = response;
            usuarioNavegando.forEach(usernavegadiando => {
                template += `
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center"> Usuario Uitlizado:</label>
                    <div class="col-sm-6">
                      <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.usuario}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Nombre Registrado :</label>
                    <div class="col-sm-6">
                      <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.nombre}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Apellido Registrado:</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.Apellido}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Correo Registrado :</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.email}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Dirección Registrada :</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.direccion}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Teléfono #1 Registrado :</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.telefonoUno}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Teléfono #2 Registrado :</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.telefonoDos}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center"> Fecha de Naciemiento Registrada  :</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.fechaNacimiento}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Imagen Perfil del Usuario :</label>
                    <div class="col-sm-6">
                      <img src="http://localhost/ProyectoSemestral/view/imagenes/${usernavegadiando.imagen}" class="img">
                    </div>   
                </div>`;
                    
                $('#formulariomodalProfiles').html(template);
            });  
            
        });
    });




    //ESTA SECCIÓN ES PAARA SI QUIERE MODIFICAR SUS DATROS MOSTRADOS COMO PROFILE -----

    const botoncitoModificarDatosU = document.querySelector("#ModificarDatosU");
    botoncitoModificarDatosU.addEventListener("click", function (evento) {
        

        let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/VerProfile.php?'; 

        $.get(url, function (response){ 
            let template = '';
            let usuarioNavegando = response;
            //console.log(usuarioNavegando);
            usuarioNavegando.forEach(usernavegadiando => {
                
                
                template += `
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center"> Usuario Uitlizado:</label>
                    <div class="col-sm-6">
                      <input type="text" id="USERusar" class="form-control-plaintext text-center" value="${usernavegadiando.usuario}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Nombre Registrado :</label>
                    <div class="col-sm-6">
                      <input type="text" id="NombreUSER" class="form-control-plaintext text-center" value="${usernavegadiando.nombre}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Apellido Registrado:</label>
                    <div class="col-sm-6">
                        <input type="text" id="apelliodUSER" class="form-control-plaintext text-center" value="${usernavegadiando.Apellido}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Correo Registrado :</label>
                    <div class="col-sm-6">
                        <input type="text" id="correoUSER"class="form-control-plaintext text-center" value="${usernavegadiando.email}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Contraseña Actual :</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="PassworActual" placeholder="**contraseña en uso" class="form-control" >
                    </div>    
                </div>
                 <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Contraseña Nueva :</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="PassworNueva" placeholder="**contraseña nueva a usar" class="form-control" >
                    </div>    
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Teléfono #1 Registrado :</label>
                    <div class="col-sm-6">
                        <input type="text" id="telefonoUnoUSER" class="form-control-plaintext text-center" value="${usernavegadiando.telefonoUno}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Teléfono #2 Registrado :</label>
                    <div class="col-sm-6">
                        <input type="text" id="telefonoDosUSER" class="form-control-plaintext text-center" value="${usernavegadiando.telefonoDos}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center"> Fecha de Nacimiento Registrada  :</label>
                    <div class="col-sm-6">
                        <input type="text" id="fechaNacimiento" class="form-control-plaintext text-center" value="${usernavegadiando.fechaNacimiento}">
                    </div>   
                </div>
                <div class="mb-3 row">
                     <label for="recipient-name" class="col-sm-6 col-form-label text-center">Nuevo Perfil a utilizar :</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="imagenR" >
                        </div>   
                                    </div>
                <input type="hidden"  id="idUsuarioR" class="form-control-plaintext text-center"  value="${usernavegadiando.idUsuario}">
                <div class="modal-footer">
                    <button type="button"  id="cerrarModiVenta" class="btn btn-danger" data-bs-dismiss="modal">CANCELAR </button>
                    <button type="submit" class="btn btn-success text-center" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#ModificarVerificacionUser">MODIFICAR</button>
                </div>
                `;
                $('#formularioModificarUserDato').html(template);
            });  
            
        });
    });


    $('#formularioModificarUserDato').submit(function (e) { 
        $("#ModificarInfoVentasAUX").show();
        const postDatos= {  
            idUsuario: $('#idUsuarioR').val(),
            usuario : $('#USERusar').val(),
            nombre : $('#NombreUSER').val(),
            Apellido : $('#apelliodUSER').val(),
            email : $('#correoUSER').val(),
            passActual : $('#PassworActual').val(),
            passNuevo : $('#PassworNueva').val(),
            telefono_1 : $('#telefonoUnoUSER').val(),
            telefono_2 : $('#telefonoDosUSER').val(),
            fechaNacimiento: $('#fechaNacimiento').val(),
            imagen: $('#imagenR').val(),
        };
       

        let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/modificarUser.php?';
        
        $.post(url, postDatos, function (response){ 
            let template = '';
            let tempaltess = '';
            let usuarioNavegando = response;
            usuarioNavegando.forEach(usernav => {
                if(usernav.valor == "1"){
                    template += `<h1 class="modal-title fs-5 text-center" id="exampleModalTecnologia"> Los Datos del Usuario  han sido modificados con Éxito </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    `;
                    tempaltess += `<center>
                           <img src="http://localhost/ProyectoSemestral/view/imagenes/correcto.gif" class="imga">
                        </center>`;
                        $('#exampleModalLabelModiVerificacionUser').html(template);
                        $('#modalventaMensajeModiVerificacionUser').html(tempaltess);
                        CargarPerfil();
                               
                }else{
                    console.log(usuarioNavegando);
                    template += `<h1 class="modal-title fs-5 text-center" id="exampleModalTecnologia"> No se pudo Modificar los datos de este usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    `;
                    tempaltess += `<center>
                           <img src="http://localhost/ProyectoSemestral/view/imagenes/errosillo.gif" class="imga">
                        </center>`;
                        $('#exampleModalLabelModiVerificacionUser').html(template);
                        $('#modalventaMensajeModiVerificacionUser').html(tempaltess);
                        CargarPerfil();
                }

            });  
        });
        e.preventDefault();
    });

    
    const botoncitoDarsedeBaja = document.querySelector("#BorrarMisDatosApp");
    botoncitoDarsedeBaja.addEventListener("click", function (evento) {
        let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/DarsedeBaja.php?'; 
        $.get(url, function (response){ 
            if(response == "Eliminado"){
                window.location.replace("http://localhost/ProyectoSemestral/view/iniciodeSesion.html?");
            }
        });
    });


    



     //ESTA SECCIÓN ES PARA INGRESAR UN NUEVO ADMIN USER ADMIN-----------------------

     const botoncitoIngresarUser = document.querySelector("#nuevoUser");
     botoncitoIngresarUser.addEventListener("click", function (evento) {
        TraerProvincias();
        TraerDistrito();
        TraerCorregimientos();
    });

    
    $('#formularioRegistrarUusuario').submit(function (e) {  
        
        const postDatos= { 
            usuario : $('#USERusaradm').val(),
            nombre : $('#NombreUSERadm').val(),
            Apellido : $('#apelliodUSERadm').val(),
            email : $('#correoUSERadm').val(),
            contraseña : $('#PasswordUSERadm').val(),
            corregimiento_id: $('#CorregimientoBuscaramd').val(),
            direcion_especifica : $('#DireccionUSERadm').val(),
            telefono_1 : $('#telefonoUnoUSERadm').val(),
            telefono_2 : $('#telefonoDosUSERadm').val(),
            fechaNacimiento: $('#fechaNacimientoadm').val(),
            imagen: $('#imagenadm').val(),
            id_rol: $('#id_roladm').val(),
        };


        


        let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/registrarUserClient.php?'; 
       
        $.post(url, postDatos, function (response){ 
            let template = '';
            let tempaltess = '';
            let usuarioRegistado = response;
            //console.log("hola querisoi");
            usuarioRegistado.forEach(usercreado => {
                console.log(usercreado.fecha);
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
                $('#ProvinciaABuscarAamd').html(templatess+template);    
            }
        });

    }

    function TraerDistrito(){
        let showForm=()=>{
        
            let id_provincia=$("#ProvinciaABuscarAamd").val();

        
            $.ajax({
                type: "GET",
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
                    $('#DistritoABuscaramd').html(templatess+template); 
                    
                }
            });
            
            
        };
    
        $("#ProvinciaABuscarAamd").on('change',showForm);

    }

    function TraerCorregimientos(){
        let showFormAT=()=>{
        
            let id_distrito=$("#DistritoABuscaramd").val();
            $.ajax({
                type: "GET",
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
                    $('#CorregimientoBuscaramd').html(templatess+template); 
                    
                }
            });
            
            
        };
    
        $("#DistritoABuscaramd").on('change',showFormAT);

    } 




    //ESTA SECCIÓN ES PARA MOSTRAR LOS DATOS DE LOS USUARIOS Y RETORNAR AL MENÚ PRRINCIPAL SI SE DESEA-------

    const botoncitoRetornarMeDosBoton = document.querySelector("#retornarMenudeDosBotones");
    botoncitoRetornarMeDosBoton.addEventListener("click", function (evento) {
        $('#TitulitoOpcionesAdminitrador').show();
        $('#botonesNegacion').show();
        $('#MostarUser').hide();
        $('#MostrarTablapedidos').hide();
        $('#MostarPedidosEntregados').hide();
        $('#MostarPedidosEnProceso').hide();
        $('#MostarPedidosCancelados').hide();
        $('#TitulitoOpcionesVerPedidos').hide();
        $('#botonesNegacionPedidos').hide();
    });



   //ESTA SECCIÓN ES PARA MOSTRAR LA LISTA DE PEDIDO REALIZADOS POR LOS USUARIOS-----------------------


    




    


    
    


});
