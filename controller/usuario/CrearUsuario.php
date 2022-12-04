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
    $usuario = $data->usuario->usuario;
    $nombre = $data->usuario->nombre;
    $apellido = $data->usuario->apellido;
    $email = $data->usuario->email;
    $contraseña = $data->usuario->contraseña;
    $corregimientoID = $data->usuario->direccion->corregimiento_id;
    $direcion_especifica = $data->usuario->direccion->direcion_especifica;
    $telefono1 = $data->usuario->telefono_1;
    $telefono2 = $data->usuario->telefono_2;
    $fechaNacimiento = $data->usuario->fechaNacimiento;
    $imagen = $data->usuario->imagen;
    $rol = $data->usuarioRol->id_rol;

    if(empty($usuario) || empty($nombre) || empty($apellido) || empty($email) || empty($contraseña) || empty($corregimientoID) || empty($direcion_especifica) || empty($telefono1) || empty($telefono2) ||empty($imagen)|| empty($fechaNacimiento) || empty($rol)){
        
        $respuesta = array(
            "valor"=>0,
            "mensaje"=>"datos no validos"
        );
        http_response_code(400);
        echo json_encode($respuesta);
    }else{

        $data =[
            "usuario"=>$usuario,
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "email"=>$email,
            "contraseña"=>$contraseña,
            "corregimientoID"=>(int)$corregimientoID,
            "direcion_especifica"=>$direcion_especifica,
            "telefono1"=>(int)$telefono1,
            "telefono2"=>(int)$telefono2,
            "fechaNacimiento"=>$fechaNacimiento,
            "imagen"=>$imagen,
            "id_rol"=>(int)$rol
        ];

        $con = Connection::getInstance();
        $usuarioDao = new DaoUsuarioImpl($con);
        $serviceUser = new ServiceUsuarioImpl($usuarioDao);

        $respuesta = $serviceUser->crearUsuario($data);

        if($respuesta["valor"]==1){
        
            http_response_code(201);
        }else{
            http_response_code(400);
        }
    
        echo json_encode($respuesta);

    }

?>