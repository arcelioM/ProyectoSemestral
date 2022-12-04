<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "productrosGenea.php";
session_start();
@$_SESSION['productosID']; //ESTE PHP ES LCOAL NO SE PUEDE CAMBIUAR NI ALTERAR YA QUE ES MERAMENTE PARA MOTRAR LOS VALORES DEL CARRITO POR MEDIO DE ID
                            // SE DEBERÍA USAR SQL
@$_SESSION['listaProductos'];
@$_SESSION['SubtotalCarrito'];
@$_SESSION['totalCarrito'];
@$_SESSION['ImpuestotalCarrito'];
$_SESSION['listaProductosCarritos']= array();

$response = array();
$recorridoiD=array();
$recorridoListaGPro=array();
$recorridoiD= @$_SESSION['productosID'];
$recorridoListaGPro= @$_SESSION['listaProductos'];
$pagoSubtotal=0.0; 
$pagoSubtotalFinal=0.0; 
$pagototal=0.0; 
$impuestotalFinal=0.0;

foreach ($recorridoiD as $row) {
    $indiceProduc = $row['idProducto'];
    foreach ($recorridoListaGPro as $prodctoGe) {
        if ($row['idProducto'] == $prodctoGe->idProducto) {
            $prodctoGeCarr = new Productos();
            $prodctoGeCarr->idProducto = $prodctoGe->idProducto;
            $prodctoGeCarr->nombre = $prodctoGe->nombre;
            $prodctoGeCarr->descripcion = $prodctoGe->descripcion;
            $prodctoGeCarr->cantidad =  $prodctoGe->cantidad;
            $prodctoGeCarr->precio =  $prodctoGe->precio;
            $pagoSubtotal= $pagoSubtotal + floatval($prodctoGe->precio);
            $prodctoGeCarr->imagen = $prodctoGe->imagen ;
            array_push($_SESSION['listaProductosCarritos'], $prodctoGeCarr);
        }
    }
}

$impuestotalFinal=round(($pagoSubtotal * 7/100)*100) / 100;
$pagototal=$pagoSubtotal + $impuestotalFinal; 
@$_SESSION['SubtotalCarrito']=round($pagoSubtotal*100)/100;
@$_SESSION['ImpuestotalCarrito']=$impuestotalFinal ;
@$_SESSION['totalCarrito']=round($pagototal*100)/100  ;

$response= $_SESSION['listaProductosCarritos'];
header('Content-Type: application/json');
echo (json_encode($response));    
//echo (json_encode(@$_SESSION['SubtotalCarrito']));
//echo (json_encode(@$_SESSION['ImpuestotalCarrito']));
//echo (json_encode(@$_SESSION['totalCarrito']));

?>