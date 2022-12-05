<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require "usuarioClas.php"; 


session_start();
@$_SESSION['productosID'];
@$_SESSION['contadorCarrito'];
@$_SESSION['SubtotalCarrito'];
@$_SESSION['ImpuestotalCarrito'];
@$_SESSION['totalCarrito'];
@$_SESSION['listaProductosCarritos'];
@$_SESSION['listaProductosIdFinal'];
@$_SESSION['idUsarioRol'];

@$_SESSION['datoUser']; //Este Arrgelo Sesión me permitrá capturar los datos del usuario que inició sesión Para extraer el id del usuario a modificar
@$_SESSION['usuarios']; //Este Arreglo de sesión es para simular la búsqueda de datos en la BD
$response=array();
$result=array();
$resultFin=array();
$recorrido= array();
$recorrido= @$_SESSION['datoUser'];
$recorridousuario= array();
$recorridousuario= @$_SESSION['usuarios'];

$ID_User_Navegando= null; 
$ID_User_Eliminar= null; 
$ID_Estado = 2; //ID QUE REPRESENTA ELIMANDO EN LA BD
$auxiliar=0;



foreach ($recorrido as $userTotal) {
    if ($auxiliar <= 0) {  
        $ID_User_Navegando = $userTotal->idUsuario;  
        $auxiliar=$auxiliar +1;                     
    }
}

$ID_User_Eliminar= $ID_User_Navegando; 


//YA CON ESTE ID_USUARIO Y EL $ID_Estado,  DEL USUARIO A DARSE DBAJA, SE PUEDE HACER LA CONSULTA PARA EDITAR SU ESTADO   
//DE SER EXITOSA LA RESPUESTA SE ENVIARÁ AL FRONTEND ESTO 


@$_SESSION['productosID']= null;
@$_SESSION['contadorCarrito']= 0;
@$_SESSION['SubtotalCarrito']= 0.0;
@$_SESSION['listaProductosCarritos']= null;
@$_SESSION['totalCarrito']= null;
@$_SESSION['ImpuestotalCarrito']= null;
@$_SESSION['listaProductosIdFinal']=null;
@$_SESSION['idUsarioRol'] = null;        //AQUÍ SE FORMATEAN ESA VARIABLES DE SESIÓN PARA QUE QUEDEN LIMPIAR DE VALOR


$response= "Eliminado";
header('Content-Type: application/json');
echo (json_encode($response));



?>