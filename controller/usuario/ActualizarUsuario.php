<?php 
    require_once("../../autoloads.php");
    use service\usuario\ServiceUsuarioImpl;

    use dao\connection\Connection;
    use dao\usuario\DaoUsuarioImpl;
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");

    $data = json_decode(file_get_contents("php://input"));
    /*echo "<pre>";
    var_dump($data);
    echo "</pre>";*/
    /*$usuarioId = $data->idUsuario;        
    $usuario = $data->usuario;
    $nombre = $data->nombre;
    $apellido = $data->apellido;
    $email = $data->email;
    $contraseñaActual = $data->passActual;
    $contraseñaNueva = $data->passNuevo;
    $direccionId = $data->direccion->idDireccion;
    $corregimientoID = $data->direccion->corregimiento_id;
    $direcion_especifica = $data->direccion->direcion_especifica;
    $telefono1 = $data->telefono_1;
    $telefono2 = $data->telefono_2;
    $fechaNacimiento = $data->fechaNacimiento;
    $imagen = $data->imagen;*/

    
    /*idUsuario: $('#idUsuarioR').val(),
    usuario: $('#USERusar').val(),
    nombre: $('#NombreUSER').val(),
    Apellido: $('#apelliodUSER').val(),
    email: $('#correoUSER').val(),
    passActual: $('#PassworActual').val(),
    passNuevo: $('#PassworNueva').val(),
    telefono_1: $('#telefonoUnoUSER').val(),
    telefono_2: $('#telefonoDosUSER').val(),
    fechaNacimiento: $('#fechaNacimiento').val(),
    imagen: $('#imagenR').val(),*/

    $usuarioId= $_POST["idUsuario"];
    $usuario = $_POST["usuario"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["Apellido"];
    $email = $_POST["email"];
    $contraseñaActual = $_POST["passActual"];
    $contraseñaNueva = $_POST["passNuevo"];
    $telefono1 = $_POST["telefono_1"];
    $telefono2 = $_POST["telefono_2"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $imagen = $_POST["imagen"];

    if(empty($usuarioId)||empty($usuario) || empty($nombre) || empty($apellido) || empty($email) || empty($contraseñaActual) || empty($contraseñaNueva)  || empty($telefono1) || empty($telefono2) || empty($fechaNacimiento) ){
        
        $respuesta = array(
            "valor"=>0,
            "mensaje"=>"datos no validos"
        );
        http_response_code(400);
        echo json_encode($respuesta);
    }else{

        $data =[
            "idUsuario"=>(int)$usuarioId,
            "usuario"=>$usuario,
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "email"=>$email,
            "contraseñaActual"=>$contraseñaActual,
            "nuevaContraseña"=>$contraseñaNueva,
            "telefono1"=>(int)$telefono1,
            "telefono2"=>(int)$telefono2,
            "fechaNacimiento"=>$fechaNacimiento,
            "imagen"=>$imagen
        ];

        $con = Connection::getInstance();
        $usuarioDao = new DaoUsuarioImpl($con);
        $serviceUser = new ServiceUsuarioImpl($usuarioDao);

        $respuesta = $serviceUser->actualizarUsuario($data);

        if($respuesta["valor"]==1){
        
            http_response_code(201);
        }else{
            http_response_code(400);
        }
    
        echo json_encode($respuesta);

    }
 
?>