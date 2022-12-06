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

    

    $usuarioId= $_POST["idUsuario"];
$estadoId = $_POST["idEstado"];

    if(empty($usuarioId)||empty($estadoId)  ){
        
        $respuesta = array(
            "valor"=>0,
            "mensaje"=>"Datos no validos"
        );
        http_response_code(400);
        echo json_encode($respuesta);
    }else{

        $data =[
            "idUsuario"=>(int)$usuarioId,
            "idEstado"=>(int) $estadoId
        ];

        $con = Connection::getInstance();
        $usuarioDao = new DaoUsuarioImpl($con);
        $serviceUser = new ServiceUsuarioImpl($usuarioDao);

        $respuesta = $serviceUser->cambiarEstado($data);

        if($respuesta["valor"]==1){
        
            http_response_code(201);
        }else{
            http_response_code(400);
        }
    
        echo json_encode($respuesta);

    }
 
?>