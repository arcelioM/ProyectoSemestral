<?php 

require_once("../../autoloads.php");
use service\usuario\ServiceUsuarioImpl;

use dao\connection\Connection;
use dao\usuario\DaoUsuarioImpl;
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");

$con = Connection::getInstance();
$usuarioDao = new DaoUsuarioImpl($con);
$serviceUser = new ServiceUsuarioImpl($usuarioDao);

$data = json_decode(file_get_contents("php://input"));

if(empty($data->idUsuario)){
    $respuesta = [
        "valor"=>0,
        "usuario"=>null
    ];

    http_response_code(404);
    echo json_encode($respuesta);
}else{
    
    $idUsuario = $data->idUsuario;
    $data = [
        "idUsuario"=>$idUsuario
    ];
    $respuesta = $serviceUser->obtenerPorId($data);

    if($respuesta["valor"]==1){
        
        http_response_code(200);
    }else{
        http_response_code(404);
    }
    
    echo json_encode($respuesta);
}


?>