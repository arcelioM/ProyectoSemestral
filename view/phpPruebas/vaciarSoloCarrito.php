<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);

session_start();
@$_SESSION['productosID'];
@$_SESSION['contadorCarrito'];
@$_SESSION['SubtotalCarrito'];
@$_SESSION['ImpuestotalCarrito'];
@$_SESSION['totalCarrito'];
@$_SESSION['listaProductosCarritos'];
@$_SESSION['listaProductosIdFinal'];
@$_SESSION['idUsarioRol'];


@$_SESSION['productosID']= null;
@$_SESSION['contadorCarrito']= 0;
@$_SESSION['SubtotalCarrito']= 0.0;
@$_SESSION['listaProductosCarritos']= null;
@$_SESSION['totalCarrito']= null;
@$_SESSION['ImpuestotalCarrito']= null;
@$_SESSION['listaProductosIdFinal']=null;
$response= "";


$response= "vaciado";
header('Content-Type: application/json');
echo (json_encode($response));

//ESTE PHP para vaciar tanto el carrito como el contador al cerrar sesión o cuando se da click a realizar compra 

?>