<?php

require_once("../../autoloads.php");

use dao\connection\Connection;
use dao\producto\DaoProductoImpl;
use service\producto\ServiceProductoImpl;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");

$data = $_POST["productos"];


if(empty($data)){
    http_response_code(400);
}else{

    $con = Connection::getInstance();
    $productoDao = new DaoProductoImpl($con);
    $serviceProducto = new ServiceProductoImpl($productoDao);



    $productos = $data;

    $respuesta = $serviceProducto->obtenerProductoId($productos);

    if($respuesta==0){
        http_response_code(400);
    }elseif(!empty($respuesta["productos"])){
        http_response_code(200);
    }else{
        http_response_code(404);
    }

    echo json_encode($respuesta);
}
?>