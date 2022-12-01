<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
@$_SESSION['productosID']; //ESTE PHP ES LCOAL NO SE PUEDE CAMBIUAR NI ALTERAR YA QUE ES MERAMENTE PARA MOTRAR LOS VALORES DEL CARRITO POR MEDIO DE ID
                            // SE DEBERÍA USAR SQL

@$_SESSION['ideliminarProduc'];
@$_SESSION['contadorCarrito'];

$idA_Eliminar=@$_SESSION['ideliminarProduc'];                           
$recorridoiD=array();
$nuevosId=array();
$nuevosIdFinal=array();
$recorridoiD= @$_SESSION['productosID'];
$cantidad=0;
$cantidadAux=1;




foreach ($recorridoiD as $row) {
    if ($row['idProducto'] == $idA_Eliminar) {
        $cantidad= $cantidad + 1;
    }   
}

foreach ($recorridoiD as $row) {
    if (($row['idProducto'] == $idA_Eliminar)&&($cantidadAux < $cantidad)) {
        $nuevosId['idProducto']=$row['idProducto'];
        array_push($nuevosIdFinal, $nuevosId);
        $cantidadAux= $cantidadAux + 1;
    }else{
        if (($row['idProducto'] != $idA_Eliminar)) {
            $nuevosId['idProducto']=$row['idProducto'];
            array_push($nuevosIdFinal, $nuevosId);
        }
    }
}
@$_SESSION['productosID']= $nuevosIdFinal; 
@$_SESSION['contadorCarrito']= @$_SESSION['contadorCarrito'] - 1;

$response["success"] = "logrado";
header('Content-Type: application/json');
echo(json_encode($response));
   
//echo (json_encode(@$_SESSION['SubtotalCarrito']));
//echo (json_encode(@$_SESSION['ImpuestotalCarrito']));
//echo (json_encode(@$_SESSION['totalCarrito']));

?>