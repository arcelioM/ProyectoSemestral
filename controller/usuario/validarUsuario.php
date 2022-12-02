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

$email =$_POST["email"];
$pass = $_POST["pass"];


if(empty($email || $pass)){
    $respuesta = array(
        "valor"=>0,
        "mensaje"=>"datos no validos",
        "usuario"=>[]
    );
    http_response_code(400);
    echo json_encode($respuesta);
}else{

    $con = Connection::getInstance();
    $usuarioDao = new DaoUsuarioImpl($con);
    $serviceUsuer = new ServiceUsuarioImpl($usuarioDao);



    $usuario = array(
        "email"=>$email,
        "pass"=>$pass
    );

    $respuesta = $serviceUsuer->validarUsuario($usuario);

    if($respuesta["valor"]==1){
        
        http_response_code(200);
    }else{
        http_response_code(404);
    }

    echo json_encode($respuesta);
}


