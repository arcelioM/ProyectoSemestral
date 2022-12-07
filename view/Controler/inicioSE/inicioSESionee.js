$(document).ready(function(){
    
  
    $('#MensajeError').hide();
    

    $('#UsuarioForm').submit(function (e) {  

        const postDatos= { //Este Objeto funciona para poder obtener los datos que se ingresen en formulario 
            'email' : $('#Correo').val(),
            'pass': $('#contrasena').val(),
        };

        $.ajax({
            type: "POST",
            url: "http://localhost/ProyectoSemestral/controller/usuario/validarUsuario.php",
            data: postDatos,
            success: function (response) {
                let users = response;
                //console.log(users["usuarios"]);
                let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/usuarioInicioSesion.php'; 

                $.ajax({
                    type: "POST",
                    url: url,
                    data: users,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        let usercredencial = response;
                        console.log(usercredencial[1].Cantidad);
                        //usuarios.forEach(usercredencial => {
                            if(usercredencial.valor == "0"){
                                $('#MensajeError').show();
                                console.log(usercredencial[1].Cantidad);
                            }else{
                                if(usercredencial[1].Cantidad == "2"){
                                    window.location.replace("http://localhost/ProyectoSemestral/view/MenuAdministrador.html");
                                }else{
                                    if(usercredencial[1].Cantidad == "1"){
                                        window.location.replace("http://localhost/ProyectoSemestral/view/HomeSesionCliente.html");
                                    }
                                }
                            }
                            $('#UsuarioForm').trigger('reset'); //esto es para cuando se recive una respuetas se resete el formulario 
                            const boton = document.querySelector("#laequis");
                            boton.addEventListener("click", function(evento){
                                $('#MensajeError').hide();
                            });
                        
                    },
                    error: function (error){
                        console.log(error);
                    }
                });

                
            },
            error: function (error){
                console.log(error);
                $('#MensajeError').show();
                $('#UsuarioForm').trigger('reset'); //esto es para cuando se recive una respuetas se resete el formulario 
                const boton = document.querySelector("#laequis");
                boton.addEventListener("click", function(evento){
                    $('#MensajeError').hide();
                });
            }
        });

        
        e.preventDefault(); //Este método es para cancelar el comportamiento que por defecto los formularios al darle submit norefresquen la página
    });




    $('#formularioRegistrarUusuario').submit(function (e) {  
        const postDatos= {
            usuario : $('#USERusar').val(),
            nombre : $('#NombreUSER').val(),
            apellido : $('#apelliodUSER').val(),
            email : $('#correoUSER').val(),
            contraseña : $('#PasswordUSER').val(),
            corregimiento_id: $("#CorregimientoBuscar").val(),
            direcion_especifica : $('#DireccionUSER').val(),
            telefono_1 : $('#telefonoUnoUSER').val(),
            telefono_2 : $('#telefonoDosUSER').val(),
            fechaNacimiento:$('#fechaNacimiento').val(),
            imagen: $('#imagen').val(),
            id_rol: $('#id_rol').val(),
        };

        let formData = new FormData();
        let files = $('#imagen')[0].files[0];
        formData.append('file',files);

        $.ajax({
            url: 'http://localhost/ProyectoSemestral/view/phpPruebas/AgregarImgPerfil.php?',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    postDatos.imagen = response;
                    saveBD(postDatos);
                } else {
                    alert(response);
                }
            },error: function (error) {
                console.log(error);
              }
        });


        

        e.preventDefault(); //Este método es para cancelar el comportamiento que por defecto los formularios al darle submit no refresquen la página
    });

    /**
     * SE GUARDARA DATOS DE NUEVO USUARIO EN LA BD
     */
    function saveBD(postDatos){
        $.ajax({
            type: "POST",
            url: "http://localhost/ProyectoSemestral/controller/usuario/CrearUsuario.php",
            data: postDatos,
            dataType: "json",
            success: function (response) {
               saveUserSession(response);
            },
            error: function (error){
                console.log(error);
            }
        });
    }


    /**
     * SE GUARDARA LOS DATOS DE USUARIO SEN VARIABLE DE SESSION
     */
    function saveUserSession(response){

            console.log(response);
            
            let template = '';
            let tempaltess = '';
            let valor = response["valor"];
            //console.log("hola querisoi");
            
            //usuarioRegistado.forEach(usercreado => {
                //console.log(usercreado.fecha);;
                if(valor == 1){
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
                    if (valor == 0) {
                        template += `<h1 class="modal-title fs-5 text-center" id="exampleModalTecnologia"> Los Datos del Usuario no ha podido ser registrados.  </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    `;
                        tempaltess += `<center>
                           <img src="http://localhost/ProyectoSemestral/view/imagenes/errosillo.gif" class="imga">
                        </center>`;
                        $('#exampleModalLabelIngresoaux').html(template);
                        $('#modalImageIngresoaux').html(tempaltess);
                    } else {
                        if (valor === null) {
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
            //});
    }


    const botoncitoTraerProvincias = document.querySelector("#RegistrarCuenta");
    botoncitoTraerProvincias.addEventListener("click", function (evento) {
        TraerProvincias();
    });


    function TraerProvincias(){
        $.ajax({
            type: "GET", // usamos este método porque nos traeremos los resultados sin enviar ningún otro dato
            url: "http://localhost/ProyectoSemestral/controller/direccion/Provincia.php",
            success: function (response) {
                console.log(response);
                let template = '';
                let templatess = '';

                let provinvincia = response["provincias"];
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
            type: "GET",
            url: "http://localhost/ProyectoSemestral/controller/direccion/DistritoPorProvincia.php",
            data: { id_provincia },
            success: function (response) {
                let template = '';
                let templatess = '';

                let distritos = response["distritos"];
                distritos.forEach(DistritoTotal => {
                    template += `
                    <option value="${DistritoTotal.id_distrito}"> ${DistritoTotal.nombre}</option>
                `;  
                });
                templatess += `
                    <option selected>Escoja un Distrito </option>
                `;  
                $('#DistritoABuscar').html(templatess+template); 
                
            }, 
            error: function (error){
                console.log(error);
            }
        });
        
        
    };

    $("#ProvinciaABuscar").on('change',showForm);


    let showFormAT=()=>{
        
        let id_distrito=$("#DistritoABuscar").val();
        $.ajax({
            type: "GET",
            url: "http://localhost/ProyectoSemestral/controller/direccion/CorregimientoPorDistrito.php",
            data: { id_distrito },
            success: function (response) {
                let template = '';
                let templatess = '';

                let corregimiento = response["corregimientos"];
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

