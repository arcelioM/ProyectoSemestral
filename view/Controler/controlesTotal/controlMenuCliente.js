$(document).ready(function(){
    
    $('#ProCarSinSesionCeluare').hide();
    $('#ProCarSinSesionComputadorae').hide();
    $('#ProCarSinSesionElectornicae').hide();

    $('#TitulitoProductCelular').hide();
    $('#TitulitoProductComputadora').hide();
    $('#TitulitoProductElectronicos').hide();


    CargarPerfil();
    Obtener_ProductosGenerales();


    $("#MenuNavegacion").click(function(){
        $(this).toggleClass("btn-warning btn-success ");
    });

    const botoncitoCeluar = document.querySelector("#CelularesTotal");
    botoncitoCeluar.addEventListener("click", function (evento) {
        $('#ProCarSinSesionCeluare').show();
        Obtener_ProductosCelulares();
        $('#ProCarSinSesion').hide();
        $('#ProCarSinSesionComputadorae').hide();
        $('#ProCarSinSesionElectornicae').hide();
        $('#TitulitoProductCelular').show();
        $('#TitulitoProductComputadora').hide();
        $('#TitulitoProductElectronicos').hide();
        $('#TitulitoProductGeneral').hide();
    });

    const botoncitoCompu = document.querySelector("#ComputadorasTotal");
    botoncitoCompu.addEventListener("click", function (evento) {
        $('#ProCarSinSesionCeluare').hide();
        $('#ProCarSinSesion').hide();
        $('#ProCarSinSesionComputadorae').show();
        Obtener_ProductosComputadora();
        $('#ProCarSinSesionElectornicae').hide();
        $('#TitulitoProductCelular').hide();
        $('#TitulitoProductComputadora').show();
        $('#TitulitoProductElectronicos').hide();
        $('#TitulitoProductGeneral').hide();
    });

    const botoncitoElectron = document.querySelector("#ElectronicaSinSesion");
    botoncitoElectron.addEventListener("click", function (evento) {
        $('#ProCarSinSesionCeluare').hide();
        $('#ProCarSinSesion').hide();
        $('#ProCarSinSesionComputadorae').hide();
        $('#ProCarSinSesionElectornicae').show();
        Obtener_ProductosElectronicos();
        $('#TitulitoProductCelular').hide();
        $('#TitulitoProductComputadora').hide();
        $('#TitulitoProductElectronicos').show();
        $('#TitulitoProductGeneral').hide();
    });



    //ESTA FUNCIÓN TRAE LOS PRODUCTOS DE FORMA GENERAL SIN IMPORTAR SU CATEGORÍA
    function Obtener_ProductosGenerales(){ 
        let idUsuarioRol= 1; 
        let idCategoria = 0; 
        
        $.post('http://localhost/ProyectoSemestral/view/phpPruebas/ProductG.php?', { idUsuarioRol, idCategoria }, function (response) {
            let productos = response // EL UNICO PASO EXTRA
            let template = '';
            productos.forEach(prodctoGe => {
                template += `
                <div class="col">
                    <div class="card h-90" id="ImageTopProGe">
                         <img src="http://localhost/ProyectoSemestral/view/imagenes/${prodctoGe.imagen}" class="card-img-top carcitaSinSesion"
                                  alt="...">
                        <div class="card-body" id="DatosTopProGe">
                            <center>
                                <h6 class="card-title" align=right>${prodctoGe.idProducto}</h6>
                            </center>
                            <h5 class="card-title">${prodctoGe.nombre}</h5>
                             <p class="card-text">${prodctoGe.descripcion} </p>
                            <p class="card-text">${prodctoGe.precio} </p>
                        </div>
                        <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end ">
                            <button class="btn btn-success ml-auto" type="button" id="carritoSinSesion" data-bs-toggle="modal"
                                data-bs-target="#IrAlaSesion">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-cart3"
                                    viewBox="0 0 16 16">
                                    <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            });
            $('#ProductoGeneralesSinSesio').html(template);

        });


    }

    function Obtener_ProductosCelulares(){ 
        let idUsuarioRol= 1; 
        let idCategoria = 1; 
        
        $.post('http://localhost/ProyectoSemestral/view/phpPruebas/ProductG.php?', { idUsuarioRol, idCategoria }, function (response) {
            let productos = response // EL UNICO PASO EXTRA
            let template = '';
            productos.forEach(prodctoGe => {
                template += `
                <div class="col">
                    <div class="card h-90" id="ImageTopProGe">
                         <img src="http://localhost/ProyectoSemestral/view/imagenes/${prodctoGe.imagen}" class="card-img-top carcitaSinSesion"
                                  alt="...">
                        <div class="card-body" id="DatosTopProGe">
                            <center>
                                <h6 class="card-title" align=right>${prodctoGe.idProducto}</h6>
                            </center>
                            <h5 class="card-title">${prodctoGe.nombre}</h5>
                             <p class="card-text">${prodctoGe.descripcion} </p>
                            <p class="card-text">${prodctoGe.precio} </p>
                        </div>
                        <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end ">
                            <button class="btn btn-success ml-auto" type="button" id="carritoSinSesion" data-bs-toggle="modal"
                                data-bs-target="#IrAlaSesion">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-cart3"
                                    viewBox="0 0 16 16">
                                    <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            });
            $('#ProductoCeluaresSinSesio').html(template);

        });


    }

    function Obtener_ProductosComputadora(){ 
        let idUsuarioRol= 1; 
        let idCategoria = 2; 
        
        $.post('http://localhost/ProyectoSemestral/view/phpPruebas/ProductG.php?', { idUsuarioRol, idCategoria }, function (response) {
            let productos = response // EL UNICO PASO EXTRA
            let template = '';
            productos.forEach(prodctoGe => {
                template += `
                <div class="col">
                    <div class="card h-90" id="ImageTopProGe">
                         <img src="http://localhost/ProyectoSemestral/view/imagenes/${prodctoGe.imagen}" class="card-img-top carcitaSinSesion"
                                  alt="...">
                        <div class="card-body" id="DatosTopProGe">
                            <center>
                                <h6 class="card-title" align=right>${prodctoGe.idProducto}</h6>
                            </center>
                            <h5 class="card-title">${prodctoGe.nombre}</h5>
                             <p class="card-text">${prodctoGe.descripcion} </p>
                            <p class="card-text">${prodctoGe.precio} </p>
                        </div>
                        <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end ">
                            <button class="btn btn-success ml-auto" type="button" id="carritoSinSesion" data-bs-toggle="modal"
                                data-bs-target="#IrAlaSesion">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-cart3"
                                    viewBox="0 0 16 16">
                                    <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            });
            $('#ProductoComputadoraSinSesio').html(template);

        });


    }

    function Obtener_ProductosElectronicos(){ 
        let idUsuarioRol= 1; 
        let idCategoria = 3; 
        
        $.post('http://localhost/ProyectoSemestral/view/phpPruebas/ProductG.php?', { idUsuarioRol, idCategoria }, function (response) {
            let productos = response // EL UNICO PASO EXTRA
            let template = '';
            productos.forEach(prodctoGe => {
                template += `
                <div class="col">
                    <div class="card h-90" id="ImageTopProGe">
                         <img src="http://localhost/ProyectoSemestral/view/imagenes/${prodctoGe.imagen}" class="card-img-top carcitaSinSesion"
                                  alt="...">
                        <div class="card-body" id="DatosTopProGe">
                            <center>
                                <h6 class="card-title" align=right>${prodctoGe.idProducto}</h6>
                            </center>
                            <h5 class="card-title">${prodctoGe.nombre}</h5>
                             <p class="card-text">${prodctoGe.descripcion} </p>
                            <p class="card-text">${prodctoGe.precio} </p>
                        </div>
                        <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end ">
                            <button class="btn btn-success ml-auto" type="button" id="carritoSinSesion" data-bs-toggle="modal"
                                data-bs-target="#IrAlaSesion">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-cart3"
                                    viewBox="0 0 16 16">
                                    <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            });
            $('#ProductoElectroncaSinSesio').html(template);

        });


    }


    $(document).on('click', '.cerrarSesionCliente', function(){ //Priemro buscaremos los datos de la tarea  a modificar y los pasaremos al formulario 
        window.location.replace("http://localhost/ProyectoSemestral/view/iniciodeSesion.html?");
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
                          <li><a class="dropdown-item verProfile" href="#" data-bs-toggle="modal" data-bs-target="#ModaleUserDatos" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                          </svg>
                          Perfil</a></li>
                          <li><a class="dropdown-item cerrarSesionCliente" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1h-1z"/>
                            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                          </svg>
                          Cerrar Sesión</a></li>
                          
                        </ul>
                    </div>
                    </form>
                    `;
                    
                    $('#PerfilUser').html(template);
            });  
            
        });
    }

    $(document).on('click', '.verProfile', function(){ //Priemro buscaremos los datos de la tarea  a modificar y los pasaremos al formulario 
        let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/datosUsere.php?'; 

        $.get(url, function (response){ 
            let template = '';
            let usuarioNavegando = response;
            console.log(usuarioNavegando);
            usuarioNavegando.forEach(usernavegadiando => {
                template += `
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Nombre del Usuario :</label>
                    <div class="col-sm-6">
                      <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.nombre}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Apellido del Usuario :</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.Apellido}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Correo y Usuario :</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.usuario}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Password del Usuario :</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.password}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Dirección del Usuario :</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.direccion}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Teléfono #1 del Usuario :</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.telefonoUno}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Teléfono #2 del Usuario  :</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext text-center" value="${usernavegadiando.telefonoDos}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Imagen Perfil del Usuario :</label>
                    <div class="col-sm-6">
                      <img src="http://localhost/ProyectoSemestral/view/imagenes/${usernavegadiando.imagen}" class="img">
                    </div>   
                </div>`;
                    
                $('#formulariomodalProfile').html(template);
            });  
            
        });
    });

    const botoncitoModificarDatosU = document.querySelector("#ModificarDatosU");
    botoncitoModificarDatosU.addEventListener("click", function (evento) {
        let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/datosUsere.php?'; 

        $.get(url, function (response){ 
            let template = '';
            let usuarioNavegando = response;
            console.log(usuarioNavegando);
            usuarioNavegando.forEach(usernavegadiando => {
                template += `
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Nombre del Usuario :</label>
                    <div class="col-sm-6">
                      <input type="text" id="NombreUSER" class="form-control-plaintext text-center" value="${usernavegadiando.nombre}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Apellido del Usuario :</label>
                    <div class="col-sm-6">
                        <input type="text" id="apelliodUSER" class="form-control-plaintext text-center" value="${usernavegadiando.Apellido}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Correo y Usuario :</label>
                    <div class="col-sm-6">
                        <input type="text" id="correoUSER" class="form-control-plaintext text-center" value="${usernavegadiando.usuario}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Password del Usuario :</label>
                    <div class="col-sm-6">
                        <input type="text" id="PasswordUSER" class="form-control-plaintext text-center" value="${usernavegadiando.password}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Dirección del Usuario :</label>
                    <div class="col-sm-6">
                        <input type="text" id="DireccionUSER" class="form-control-plaintext text-center" value="${usernavegadiando.direccion}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Teléfono #1 del Usuario :</label>
                    <div class="col-sm-6">
                        <input type="text" id="telefonoUnoUSER" class="form-control-plaintext text-center" value="${usernavegadiando.telefonoUno}">
                    </div>   
                </div>
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Teléfono #2 del Usuario  :</label>
                    <div class="col-sm-6">
                        <input type="text" id="telefonoDosUSER" class="form-control-plaintext text-center" value="${usernavegadiando.telefonoDos}">
                    </div>   
                </div>
                <input type="hidden"  id="id_rol" class="form-control-plaintext text-center"  value="${usernavegadiando.idUsarioRol}">
                <input type="hidden"  id="roling" class="form-control-plaintext text-center"  value="${usernavegadiando.rol}">
                <div class="mb-3 row">
                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Imagen Perfil del Usuario :</label>
                    <div class="col-sm-6">
                       <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>   
                </div>
                
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
            nombre : $('#NombreUSER').val(),
            Apellido : $('#apelliodUSER').val(),
            email : $('#correoUSER').val(),
            contrasena : $('#PasswordUSER').val(),
            direccion : $('#DireccionUSER').val(),
            telefono_1 : $('#telefonoUnoUSER').val(),
            telefono_2 : $('#telefonoDosUSER').val(),
            imagen: $('#imagen').val(),
            id_rol: $('#id_rol').val(),
            rol: $('#roling').val(),
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





});
