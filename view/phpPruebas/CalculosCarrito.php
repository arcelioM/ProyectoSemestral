<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);

session_start();
@$_SESSION['SubtotalCarrito'];
@$_SESSION['ImpuestotalCarrito'];
@$_SESSION['totalCarrito'];

$Result= array(); 
$response= array(); 

$Result['SubtotalCarrito']= @$_SESSION['SubtotalCarrito'];
$Result['ImpuestotalCarrito']= @$_SESSION['ImpuestotalCarrito'];
$Result['totalCarrito']= @$_SESSION['totalCarrito'];

header('Content-Type: application/json');
echo(json_encode($Result));




//ESTE PHP ES SÓLO PARA DEFINIR LOS ARREGLOS DE SESIÓN QUE ALMACENARÁN LOS ID DE LOS PRODUCTOS QUE SEAN AGREAGDOS EN EL CARRITO Y TAMBIÉN PARA ACTUALIZAR EL 
//CONTADOR DEL CARRITO

?>