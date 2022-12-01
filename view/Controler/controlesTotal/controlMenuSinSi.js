$(document).ready(function(){
    
    $('#ProCarSinSesionCeluare').hide();
    $('#ProCarSinSesionComputadorae').hide();
    $('#ProCarSinSesionElectornicae').hide();

    Obtener_ProductosGenerales();
    LimpiarVariablesSesion();   


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
    });

    const botoncitoCompu = document.querySelector("#ComputadorasTotal");
    botoncitoCompu.addEventListener("click", function (evento) {
        $('#ProCarSinSesionCeluare').hide();
        $('#ProCarSinSesion').hide();
        $('#ProCarSinSesionComputadorae').show();
        Obtener_ProductosComputadora();
        $('#ProCarSinSesionElectornicae').hide();
    });

    const botoncitoElectron = document.querySelector("#ElectronicaSinSesion");
    botoncitoElectron.addEventListener("click", function (evento) {
        $('#ProCarSinSesionCeluare').hide();
        $('#ProCarSinSesion').hide();
        $('#ProCarSinSesionComputadorae').hide();
        $('#ProCarSinSesionElectornicae').show();
        Obtener_ProductosElectronicos();
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

    function LimpiarVariablesSesion(){
        let url= 'http://localhost/ProyectoSemestral/view/phpPruebas/vaciarCarritto.php?'; 
        $.get(url, function (response){ 
            if(response == "vaciado"){
                console.log("logrado");
            }
        });
    }



});
