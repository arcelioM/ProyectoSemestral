$(document).ready(function () {

    $('#ProCarSinSesionCeluare').hide();
    $('#ProCarSinSesionComputadorae').hide();
    $('#ProCarSinSesionElectornicae').hide();

    $('#TitulitoProductCelular').hide();
    $('#TitulitoProductComputadora').hide();
    $('#TitulitoProductElectronicos').hide();

    $('#Mostarcarritoosi').hide();
    $('#FacturaTotal').hide();


    CargarPerfil();
    Obtener_ProductosGenerales();



    $("#MenuNavegacion").click(function () {
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
        $('#FacturaTotal').hide();
        $('#Mostarcarritoosi').hide();
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
        $('#FacturaTotal').hide();
        $('#Mostarcarritoosi').hide();
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
        $('#FacturaTotal').hide();
        $('#FacturaTotal').hide();
        $('#Mostarcarritoosi').hide();
    });



    //ESTA FUNCIÓN TRAE LOS PRODUCTOS DE FORMA GENERAL SIN IMPORTAR SU CATEGORÍA
    function Obtener_ProductosGenerales() {
        $('#FacturaTotal').hide();
        $('#Mostarcarritoosi').hide();
        CargarContador();
        //TraerIDcarrito();

        $.ajax({
            type: "GET",
            url: "http://localhost/ProyectoSemestral/view/phpPruebas/IdRolEnviar.php?",
            success: function (response) {
                //console.log(response);
                let idUsuarioRol = response;
                //AQUI AL API REST Y SE TRAE UNA VARIABLE CON L AINFO PRODUCTO
                let data ={
                    "idUsuarioRol": idUsuarioRol,
                    "idCategoria": 0
                };
        
                $.ajax({
                    type: "GET",
                    url: "http://localhost/ProyectoSemestral/controller/producto/ObtenerProducto.php",
                    data: data,
                    success: function (response) {
                    let productos = response["productos"]; // EL UNICO PASO EXTRA
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
                                        <p class="card-text">$${prodctoGe.precio} </p>
                                    </div>
                                    <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end ">
                                        <button class="btn btn-success ml-auto carritoConSesion${prodctoGe.idProducto}" type="button" data-bs-toggle="modal" data-bs-target="#ModalAgregaralcarrito">
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

                        let variable = "carritoConSesion" + prodctoGe.idProducto;
                        $(document).on('click', '.' + variable, function () {
                            //console.log(prodctoGe.idProducto);
                            //let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/RecorridoCarrito.php?'; 
                            let Id_ProducCarrito = prodctoGe.idProducto;

                            //console.log(Id_ProductoCarrito);
                            $.ajax({
                                type: "POST", // usamos este método porque nos traeremos los resultados sin enviar ningún otro dato
                                data: { Id_ProducCarrito },
                                url: "http://localhost/ProyectoSemestral/view/phpPruebas/RegistroCarrito.php?",
                                success: function (response) {
                                    let carritoProductoGe = response;
                                    carritoProductoGe.forEach(carritoProductoG => {
                                        console.log(carritoProductoG.idProducto);
                                    });

                                    CargarContador();
                                }
                            });

                        });

                    });
                    $('#ProductoGeneralesSinSesio').html(template);

                }});
            }
        });
    }

    function Obtener_ProductosCelulares() {
        $('#FacturaTotal').hide();
        $('#Mostarcarritoosi').hide();
        
        $.ajax({
            type: "GET",
            url: "http://localhost/ProyectoSemestral/view/phpPruebas/IdRolEnviar.php?",
            success: function (response) {
                //console.log(response);
                let idUsuarioRol = response;
                
                let data ={
                    "idUsuarioRol": idUsuarioRol,
                    "idCategoria": 1
                };
        
                $.ajax({
                    type: "GET",
                    url: "http://localhost/ProyectoSemestral/controller/producto/ObtenerProducto.php",
                    data: data,
                    success: function (response) {
                        let productos = response["productos"];
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
                                                <p class="card-text">$${prodctoGe.precio} </p>
                                            </div>
                                            <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end ">
                                                <button class="btn btn-success ml-auto carritoConSesion${prodctoGe.idProducto}" type="button" data-bs-toggle="modal" data-bs-target="#ModalAgregaralcarrito">
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

                        let variable = "carritoConSesion" + prodctoGe.idProducto;
                        $(document).on('click', '.' + variable, function () {
                            //console.log(prodctoGe.idProducto);
                            //let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/RecorridoCarrito.php?'; 
                            let Id_ProducCarrito = prodctoGe.idProducto;

                            //console.log(Id_ProductoCarrito);
                            $.ajax({
                                type: "POST", // usamos este método porque nos traeremos los resultados sin enviar ningún otro dato
                                data: { Id_ProducCarrito },
                                url: "http://localhost/ProyectoSemestral/view/phpPruebas/RegistroCarrito.php?",
                                success: function (response) {
                                    let carritoProductoGe = response;
                                    carritoProductoGe.forEach(carritoProductoG => {
                                        console.log(carritoProductoG.idProducto);
                                    });

                                    CargarContador();
                                }
                            });

                        });

                    });
                    $('#ProductoCeluaresSinSesio').html(template);

                }});
            }
        });


    }

    function Obtener_ProductosComputadora() {
        $('#FacturaTotal').hide();
        $('#Mostarcarritoosi').hide();


        $.ajax({
            type: "GET",
            url: "http://localhost/ProyectoSemestral/view/phpPruebas/IdRolEnviar.php?",
            success: function (response) {
                //console.log(response);
                let idUsuarioRol = response;
                
                let data ={
                    "idUsuarioRol": idUsuarioRol,
                    "idCategoria": 2
                };
        
                $.ajax({
                    type: "GET",
                    url: "http://localhost/ProyectoSemestral/controller/producto/ObtenerProducto.php",
                    data: data,
                    success: function (response) {
                        let productos = response["productos"];
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
                                            <p class="card-text">$${prodctoGe.precio} </p>
                                        </div>
                                        <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end ">
                                            <button class="btn btn-success ml-auto carritoConSesion${prodctoGe.idProducto}" type="button" data-bs-toggle="modal" data-bs-target="#ModalAgregaralcarrito">
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

                        let variable = "carritoConSesion" + prodctoGe.idProducto;
                        $(document).on('click', '.' + variable, function () {
                            //console.log(prodctoGe.idProducto);
                            //let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/RecorridoCarrito.php?'; 
                            let Id_ProducCarrito = prodctoGe.idProducto;

                            //console.log(Id_ProductoCarrito);
                            $.ajax({
                                type: "POST", // usamos este método porque nos traeremos los resultados sin enviar ningún otro dato
                                data: { Id_ProducCarrito },
                                url: "http://localhost/ProyectoSemestral/view/phpPruebas/RegistroCarrito.php?",
                                success: function (response) {
                                    let carritoProductoGe = response;
                                    carritoProductoGe.forEach(carritoProductoG => {
                                        console.log(carritoProductoG.idProducto);
                                    });

                                    CargarContador();
                                }
                            });

                        });

                    });
                    $('#ProductoComputadoraSinSesio').html(template);

                }});
            }
        });

    }

    function Obtener_ProductosElectronicos() {
        $('#FacturaTotal').hide();
        $('#Mostarcarritoosi').hide();

        $.ajax({
            type: "GET",
            url: "http://localhost/ProyectoSemestral/view/phpPruebas/IdRolEnviar.php?",
            success: function (response) {
                //console.log(response);
                let idUsuarioRol = response;
                
                let data ={
                    "idUsuarioRol": idUsuarioRol,
                    "idCategoria": 3
                };
        
                $.ajax({
                    type: "GET",
                    url: "http://localhost/ProyectoSemestral/controller/producto/ObtenerProducto.php",
                    data: data,
                    success: function (response) {
                        let productos = response["productos"];
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
                                    <p class="card-text">$${prodctoGe.precio} </p>
                                </div>
                                <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end ">
                                    <button class="btn btn-success ml-auto carritoConSesion${prodctoGe.idProducto}" type="button" data-bs-toggle="modal" data-bs-target="#ModalAgregaralcarrito">
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

                        let variable = "carritoConSesion" + prodctoGe.idProducto;
                        $(document).on('click', '.' + variable, function () {
                            //console.log(prodctoGe.idProducto);
                            //let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/RecorridoCarrito.php?'; 
                            let Id_ProducCarrito = prodctoGe.idProducto;

                            //console.log(Id_ProductoCarrito);
                            $.ajax({
                                type: "POST", // usamos este método porque nos traeremos los resultados sin enviar ningún otro dato
                                data: { Id_ProducCarrito },
                                url: "http://localhost/ProyectoSemestral/view/phpPruebas/RegistroCarrito.php?",
                                success: function (response) {
                                    let carritoProductoGe = response;
                                    carritoProductoGe.forEach(carritoProductoG => {
                                        console.log(carritoProductoG.idProducto);
                                    });

                                    CargarContador();
                                }
                            });

                        });

                    });
                    $('#ProductoElectroncaSinSesio').html(template);

            }});
            }
        });
    }


    $(document).on('click', '.cerrarSesionCliente', function () { //Priemro buscaremos los datos de la tarea  a modificar y los pasaremos al formulario 
        let url = 'http://localhost/ProyectoSemestral/view/phpPruebas/CerrarSesio.php?';
        $.get(url, function (response) {
            if (response == "vaciado") {
                window.location.replace("http://localhost/ProyectoSemestral/view/iniciodeSesion.html?");
            }
        });
    });

    const botoncitoCerrarSesion = document.querySelector("#Cierresesion");
    botoncitoCerrarSesion.addEventListener("click", function (evento) {
        let url = 'http://localhost/ProyectoSemestral/view/phpPruebas/CerrarSesio.php?';
        $.get(url, function (response) {
            if (response == "vaciado") {
                window.location.replace("http://localhost/ProyectoSemestral/view/iniciodeSesion.html?");
            }
        });
    });



    function CargarPerfil() {

        let url = 'http://localhost/ProyectoSemestral/view/phpPruebas/datosUsere.php?';

        $.get(url, function (response) {
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
                          <li><a class="dropdown-item EliminarSesionCliente" href="#" data-bs-toggle="modal" data-bs-target="#ModalDarsedeBajaAux"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
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

    function CargarContador() {

        let url = 'http://localhost/ProyectoSemestral/view/phpPruebas/recuperarContador.php?';

        $.get(url, function (response) {
            let contador = '';
            let contadorNaveggando = response;

            contador = `${contadorNaveggando}`;
            $('#contadorCarrito').html(contador);
        });
    }

    $(document).on('click', '.verProfile', function () { //Esto sólo para ver los datos del perfil del usuario 
        let url = 'http://localhost/ProyectoSemestral/view/phpPruebas/VerProfile.php?';

        $.get(url, function (response) {
            let VariableUserProfile = response;

            let data={
                "idUsuario":VariableUserProfile["IdUser"]
            };

            //Se llama  al Api reste para taer todos los datos de ese usuario por ID
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                dataType: "JSON",
                url: "http://localhost/ProyectoSemestral/controller/usuario/UsuarioPorId.php",
                data: data,
                success: function (response) {
                    console.log(response);
                    let template = '';
                //aQUÍ SE ALMACENA LO QUE EL APIREST REGRESE
                let usuarioNavegando = response.usuario;
                let Contador = 0;

                //console.log(usuarioNavegando);
                //usuarioNavegando.forEach(usernavegadiando => {
                    if (Contador == 0) {
                        template += `
                            <div class="mb-3 row">
                                <label for="recipient-name" class="col-sm-6 col-form-label text-center"> Usuario Uitlizado:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext text-center" value="${usuarioNavegando.usuario}">
                                </div>   
                            </div>
                            <div class="mb-3 row">
                                <label for="recipient-name" class="col-sm-6 col-form-label text-center">Nombre Registrado :</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext text-center" value="${usuarioNavegando.nombre}">
                                </div>   
                            </div>
                            <div class="mb-3 row">
                                <label for="recipient-name" class="col-sm-6 col-form-label text-center">Apellido Registrado:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext text-center" value="${usuarioNavegando.apellido}">
                                </div>   
                            </div>
                            <div class="mb-3 row">
                                <label for="recipient-name" class="col-sm-6 col-form-label text-center">Correo Registrado :</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext text-center" value="${usuarioNavegando.email}">
                                </div>   
                            </div>
                            <div class="mb-3 row">
                                <label for="recipient-name" class="col-sm-6 col-form-label text-center">Dirección Registrada :</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext text-center" value="${usuarioNavegando.direccion}">
                                </div>   
                            </div>
                            <div class="mb-3 row">
                                <label for="recipient-name" class="col-sm-6 col-form-label text-center">Teléfono #1 Registrado :</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext text-center" value="${usuarioNavegando.telefono1}">
                                </div>   
                            </div>
                            <div class="mb-3 row">
                                <label for="recipient-name" class="col-sm-6 col-form-label text-center">Teléfono #2 Registrado :</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext text-center" value="${usuarioNavegando.telefono2}">
                                </div>   
                            </div>
                            <div class="mb-3 row">
                                <label for="recipient-name" class="col-sm-6 col-form-label text-center"> Fecha de Naciemiento Registrada  :</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext text-center" value="${usuarioNavegando.fechaNacimiento}">
                                </div>   
                            </div>
                            <div class="mb-3 row">
                                <label for="recipient-name" class="col-sm-6 col-form-label text-center">Imagen Perfil del Usuario :</label>
                                <div class="col-sm-6">
                                <img src="http://localhost/ProyectoSemestral/view/imagenes/${usuarioNavegando.imagen}" class="img">
                                </div>   
                            </div>`;

                        $('#formulariomodalProfile').html(template);
                        Contador = Contador + 1;
                    }
                //});

                    },
                    error: function (error){
                        console.log(error);
                    }
                });


            
        });
    });

    const botoncitoModificarDatosU = document.querySelector("#ModificarDatosU");
    botoncitoModificarDatosU.addEventListener("click", function (evento) {

        let url = 'http://localhost/ProyectoSemestral/view/phpPruebas/VerProfile.php?';

        $.get(url, function (response) {
            let VariableUserProfile = response;

            //Se llama  al Api reste para taer todos los datos de ese usuario por ID
            
            let data={
                "idUsuario":VariableUserProfile["IdUser"]
            };

            //Se llama  al Api reste para taer todos los datos de ese usuario por ID
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                dataType: "JSON",
                url: "http://localhost/ProyectoSemestral/controller/usuario/UsuarioPorId.php",
                data: data,
                success: function (response) {
                    //console.log(response);
                    let template = '';
                    //aQUÍ SE ALMACENA LO QUE EL APIREST REGRESE
                    let usuarioNavegando = response.usuario;
                    let Contador = 0;
            //usuarioNavegando.forEach(usernavegadiando => {
                    if (Contador == 0) {
                        template += `
                                <div class="mb-3 row">
                                    <label for="recipient-name" class="col-sm-6 col-form-label text-center"> Usuario Uitlizado:</label>
                                    <div class="col-sm-6">
                                    <input type="text" id="USERusar" class="form-control-plaintext text-center" value="${usuarioNavegando.usuario}">
                                    </div>   
                                </div>
                                <div class="mb-3 row">
                                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Nombre Registrado :</label>
                                    <div class="col-sm-6">
                                    <input type="text" id="NombreUSER" class="form-control-plaintext text-center" value="${usuarioNavegando.nombre}">
                                    </div>   
                                </div>
                                <div class="mb-3 row">
                                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Apellido Registrado:</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="apelliodUSER" class="form-control-plaintext text-center" value="${usuarioNavegando.apellido}">
                                    </div>   
                                </div>
                                <div class="mb-3 row">
                                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Correo Registrado :</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="correoUSER"class="form-control-plaintext text-center" value="${usuarioNavegando.email}">
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
                                        <input type="text" id="telefonoUnoUSER" class="form-control-plaintext text-center" value="${usuarioNavegando.telefono1}">
                                    </div>   
                                </div>
                                <div class="mb-3 row">
                                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Teléfono #2 Registrado :</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="telefonoDosUSER" class="form-control-plaintext text-center" value="${usuarioNavegando.telefono2}">
                                    </div>   
                                </div>
                                <div class="mb-3 row">
                                    <label for="recipient-name" class="col-sm-6 col-form-label text-center"> Fecha de Nacimiento Registrada  :</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="fechaNacimiento" class="form-control-plaintext text-center" value="${usuarioNavegando.fechaNacimiento}">
                                    </div>   
                                </div>
                                <div class="mb-3 row">
                                    <label for="recipient-name" class="col-sm-6 col-form-label text-center">Nuevo Perfil a utilizar :</label>
                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" id="imagenR" >
                                        </div>   
                                                    </div>
                                <input type="hidden"  id="idUsuarioR" class="form-control-plaintext text-center"  value="${usuarioNavegando.idUsuario}">
                                <div class="modal-footer">
                                    <button type="button"  id="cerrarModiVenta" class="btn btn-danger" data-bs-dismiss="modal">CANCELAR </button>
                                    <button type="submit" class="btn btn-success text-center" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#ModificarVerificacionUser">MODIFICAR</button>
                                </div>
                            `;
                        $('#formularioModificarUserDato').html(template);
                        Contador = Contador + 1;
                    }
                }
            });
        });
    });




    $('#formularioModificarUserDato').submit(function (e) {
        $("#ModificarInfoVentasAUX").show();
        const postDatos = {
            idUsuario: $('#idUsuarioR').val(),
            usuario: $('#USERusar').val(),
            nombre: $('#NombreUSER').val(),
            Apellido: $('#apelliodUSER').val(),
            email: $('#correoUSER').val(),
            passActual: $('#PassworActual').val(),
            passNuevo: $('#PassworNueva').val(),
            telefono_1: $('#telefonoUnoUSER').val(),
            telefono_2: $('#telefonoDosUSER').val(),
            fechaNacimiento: $('#fechaNacimiento').val(),
            imagen: $('#imagenR').val(),
        };

        let formData = new FormData();
        let files = $('#imagenR')[0].files[0];
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

        function saveBD(postDatos){
            $.ajax({
                type: "POST",
                url: "http://localhost/ProyectoSemestral/controller/usuario/ActualizarUsuario.php",
                data: postDatos,
                dataType: "json",
                success: function (response) {
                   saveUserSession(response,postDatos);
                },
                error: function (error){
                    console.log(error);
                }
            });
        }

        function saveUserSession(response,postDatos){

            console.log(response);
            console.log(postDatos);
            
            let template = '';
            let tempaltess = '';
            let valor = response["valor"];
            //console.log("hola querisoi");

            if (valor == 1) {

                let url = 'http://localhost/ProyectoSemestral/view/phpPruebas/modificarUser.php?';

                $.post(url, postDatos, function (response) {
                    console.log(response);
                    let valor = response["valorUserSession"];
                    if (valor == 1) {
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
            }else{
                template += `<h1 class="modal-title fs-5 text-center" id="exampleModalTecnologia"> No se pudo Modificar los datos de este usuario por APIREST</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    `;
                            tempaltess += `<center>
                           <img src="http://localhost/ProyectoSemestral/view/imagenes/errosillo.gif" class="imga">
                        </center>`;
                            $('#exampleModalLabelModiVerificacionUser').html(template);
                            $('#modalventaMensajeModiVerificacionUser').html(tempaltess);
                            CargarPerfil();
            }   
    }
        e.preventDefault();
    });




    const botoncitoVerProductoCaa = document.querySelector("#mostrarrrCarrito");
    botoncitoVerProductoCaa.addEventListener("click", function (evento) {
        TraerIDcarrito();
        $('#ProCarSinSesionCeluare').hide();
        $('#ProCarSinSesionComputadorae').hide();
        $('#ProCarSinSesionElectornicae').hide();

        $('#ProCarSinSesion').hide();
        $('#TitulitoProductGeneral').hide();


        $('#TitulitoProductCelular').hide();
        $('#TitulitoProductComputadora').hide();
        $('#TitulitoProductElectronicos').hide();

        $('#Mostarcarritoosi').show();
        $('#FacturaTotal').show();
        CargarProductosCarrito();
    });

    function CargarProductosCarrito() {


        $.ajax({
            type: "GET",
            url: "http://localhost/ProyectoSemestral/view/phpPruebas/RecorrerCarrito.php?",
            success: function (response) {
                let template = '';
                let producNaveggando = response;
                producNaveggando.forEach(prodctoGeCarr => {
                    template += `
                    <tr Id_Homework="${prodctoGeCarr.idProducto}" class="table-info   text-center" >
                    <td >${prodctoGeCarr.idProducto}</a></td> 
                    <td >${prodctoGeCarr.nombre}</td> 
                    <td >${prodctoGeCarr.descripcion}</td> 
                    <td ><img src="http://localhost/ProyectoSemestral/view/imagenes/${prodctoGeCarr.imagen}" class="img"></td>   
                    <td >${prodctoGeCarr.precio}</td>
                    <td>
                       <button class="btn btn-danger btn- text-center eliminarproduct" data-bs-toggle="modal" data-bs-target="#ModaleliminarCarritosAux"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                       <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                     </svg>
                           Eliminar 
                        </button>
                        
                    </td>
                    </tr>`;
                });
                $('#Productos_Encontrados').html(template);
            }
        });

        $.ajax({
            type: "GET",
            url: "http://localhost/ProyectoSemestral/view/phpPruebas/CalculosCarrito.php?",
            success: function (response) {
                let template = '';
                let producCarreteao = response;
                template += `
                <div class="col">
                        <div class="card h-90 text-bg-warning" id="ImageTopProGe">
                             <img src="http://localhost/ProyectoSemestral/view/imagenes/pagar2.gif" class="card-img-top carcitaProduc"
                                      alt="...">
                            <div class="card-body" id="DatosTopProGe">
                                <center>
                                    <h5 class="card-title">Subtotal de la compra</h5>
                                    <p class="card-text">$ ${producCarreteao.SubtotalCarrito}</p>
                                </center>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-90 text-bg-warning" id="ImageTopProGe">
                             <img src="http://localhost/ProyectoSemestral/view/imagenes/pagar1.gif" class="card-img-top carcitaProduc"
                                      alt="...">
                            <div class="card-body" id="DatosTopProGe">
                                <center>
                                    <h5 class="card-title">Impuesto de la compra</h5>
                                    <p class="card-text">$ ${producCarreteao.ImpuestotalCarrito} </p>
                                </center>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-90 text-bg-warning" id="ImageTopProGe">
                             <img src="http://localhost/ProyectoSemestral/view/imagenes/pagar2.gif" class="card-img-top carcitaProduc"
                                      alt="...">
                            <div class="card-body" id="DatosTopProGe">
                                <center>
                                    <h5 class="card-title">total de la compra</h5>
                                    <p class="card-text">$ ${producCarreteao.totalCarrito} </p>
                                </center>
                                
                            </div>
                        </div>
                    </div>

                   `;
                $('#CalculoTotales').html(template);
            }
        });

    }


    $(document).on('click', '.eliminarproduct', function () {
        let element = $(this)[0].parentElement.parentElement;    //aquí se almacena toda la fila por medio de la propiepdad parentElement y va de "td" al padre "tr"
        let id = $(element).attr('Id_Homework');  //aquí se almacena el id del botón selecccionado por medio de fila padre
        //console.log(id);
        $.post('http://localhost/ProyectoSemestral/view/phpPruebas/variableSesionEli.php?', { id }, function (response) {
            console.log(response);
        });
    });

    const botoncitoBorrarProduc = document.querySelector("#BorrarProductoFi");
    botoncitoBorrarProduc.addEventListener("click", function (evento) {
        $.ajax({
            type: "GET", // usamos este método porque nos traeremos los resultados sin enviar ningún otro dato
            url: "http://localhost/ProyectoSemestral/view/phpPruebas/EliminarProduc.php?",
            success: function (response) {
                let template = '';
                let tempaltess = '';
                if (response.success == "ERROR") {
                    console.log(response.success);
                } else {
                    template += `<h1 class="modal-title fs-5 text-center" id="exampleModalTecnologia"> El Producto ha sido Elimado con Éxito del Carrito</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                `;
                    tempaltess += `<center>
                       <img src="http://localhost/ProyectoSemestral/view/imagenes/correcto.gif" class="imga">
                    </center>`;
                    $('#exampleModalLeliminarFinalCarri').html(template);
                    $('#modaleliminarFinalCarri').html(tempaltess);
                    CargarProductosCarrito();
                    CargarContador();
                }
            }
        });
    });

    const botoncitoSeguirComprando = document.querySelector("#SeguirAgregando");
    botoncitoSeguirComprando.addEventListener("click", function (evento) {
        $('#Mostarcarritoosi').hide();
        $('#FacturaTotal').hide();

        $('#ProCarSinSesion').show();
        $('#TitulitoProductGeneral').show();
    });

    const botoncitoDarsedeBaja = document.querySelector("#BorrarMisDatosApp");
    botoncitoDarsedeBaja.addEventListener("click", function (evento) {
        let url = 'http://localhost/ProyectoSemestral/view/phpPruebas/DarsedeBaja.php?';
        $.get(url, function (response) {
            if (response == "Eliminado") {
                window.location.replace("http://localhost/ProyectoSemestral/view/iniciodeSesion.html?");
            }
        });
    });


    //PRUEBAAA CARRITO ID//////////////
    function TraerIDcarrito() {

        $.ajax({
            type: "GET",
            url: "http://localhost/ProyectoSemestral/view/phpPruebas/LlevarIdProdu.php?",
            success: function (response) {
                //console.log(response);
                let productoidLlevar = response;
                //AQUI AL API REST Y SE TRAE UNA VARIABLE CON L AINFO PRODUCTO

                //Variable que gauradrá lña información de los productos traidos para el carrito
                let InfoProductoLLevar = response;
                $.ajax({
                    type: "GET",
                    url: "http://localhost/ProyectoSemestral/view/phpPruebas/ProductG.php?",
                    data: { InfoProductoLLevar },
                    success: function (response) {
                        console.log(response);

                    }
                });
            }
        });


    }


















});
