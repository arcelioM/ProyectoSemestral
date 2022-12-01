<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "productrosGenea.php";
session_start();
@$_SESSION['productosID'];
@$_SESSION['contadorCarrito'];

$response=array();
$result=array();
$resultAux=array();
$recorrido=array();
$recorridoAux=array();
$contadorAuxCarrito= @$_SESSION['contadorCarrito'];

$prodctoGe= array();
$recorrido=@$_SESSION['productosID'];

$Id_ProductoCarrito= $_POST['Id_ProducCarrito'];


if($recorrido==null){
    $prodctoGe['idProducto'] = $Id_ProductoCarrito ;
    array_push($recorridoAux, $prodctoGe);
    @$_SESSION['productosID']=$recorridoAux;
    $recorrido = $recorridoAux;
    header('Content-Type: application/json');
    echo (json_encode($recorrido));
   
}else{
    $prodctoGe['idProducto'] = $Id_ProductoCarrito;
    array_push($recorrido, $prodctoGe);
    @$_SESSION['productosID']=$recorrido;
    header('Content-Type: application/json');
    echo (json_encode($recorrido));
}

$contadorAuxCarrito= $contadorAuxCarrito + 1;
@$_SESSION['contadorCarrito']=$contadorAuxCarrito;



?>