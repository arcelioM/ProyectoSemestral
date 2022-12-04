<?php 
    
require_once("../../autoloads.php");

use dao\connection\Connection;
use dao\pedido\DaoPedidoImpl;
use service\pedido\ServicePedidoImpl;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");



$data = json_decode(file_get_contents("php://input"));

if(empty($data->idUsuarioRol) ){

    http_response_code(400);
}else{

    $con = Connection::getInstance();
    $pedidoDao = new DaoPedidoImpl($con);
    $servicePedido = new ServicePedidoImpl($pedidoDao);

    $data = [
        "idUsuarioRol"=> $data->idUsuarioRol,
        "idEstado"=> $data->idEstado,
        "idTipoPedido"=> $data->idTipoPedido
    ];

    $respuesta = $servicePedido->obtenerPedidos($data);

    if(!empty($respuesta["pedidos"])){
        
        http_response_code(200);
    }else{
        http_response_code(404);
    }
    
    echo json_encode($respuesta);
}
?>