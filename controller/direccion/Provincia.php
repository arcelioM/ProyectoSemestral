<?php 
    
    require_once("../../autoloads.php");
    use dao\connection\Connection;
    use dao\direccion\DaoDireccionImpl;
    use service\direccion\ServiceDireccionImpl;

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");


    $con = Connection::getInstance();
    $direccionDao = new DaoDireccionImpl($con);
    $serviceDireccion = new ServiceDireccionImpl($direccionDao);

    $respuesta = $serviceDireccion->obtenerProvincia();

    if(!empty($respuesta)){
        
        http_response_code(200);
    }else{
        http_response_code(404);
    }

    echo json_encode($respuesta);
?>