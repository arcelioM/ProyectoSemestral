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
    $usuarioId = $data->idUsuario;        
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
    $imagen = $data->imagen;

    if(empty($usuarioId)||empty($usuario) || empty($nombre) || empty($apellido) || empty($email) || empty($contraseñaActual) || empty($contraseñaNueva) ||empty($direccionId)|| empty($corregimientoID) || empty($direcion_especifica) || empty($telefono1) || empty($telefono2) || empty($fechaNacimiento) || empty($imagen)){
        
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
            "idDireccion"=>(int)$direccionId,
            "corregimientoID"=>(int)$corregimientoID,
            "direcion_especifica"=>$direcion_especifica,
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