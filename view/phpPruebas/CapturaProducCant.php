<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
@$_SESSION['productosID']; //ESTE PHP ES LCOAL NO SE PUEDE CAMBIUAR NI ALTERAR YA QUE ES MERAMENTE PARA DENOTAR EL INDICE DE LOS PRODUCTOS Y LA CANTIDAD DE 
                            // CADA UNO ES DECIR QUE SI EL CARRITO TIENE 5 PRODUCTOS PERO 3 ESTÁN REPETIDO, EL REALIDAD SÓLO DE BEN ENVIAR EL ID DE 3 PRODUCT

@$_SESSION['listaProductosIdFinal'];

 $id_Buscar= null;                         
$recorridoiD=array();
$nuevosId=array();
$nuevosIdFinal=array();
$recorridoiD= @$_SESSION['productosID'];
$UtlimoId= null; 
$cantidad=0;
$idsrecorrido=array();
$idsrecorridoFinal=array();
$idsrecorrido=null;


foreach ($recorridoiD as $row) {
    $id_Buscar= $row['idProducto'];
    if ($idsrecorrido == null){
        foreach ($recorridoiD as $row) {
            if ($row['idProducto'] ==  $id_Buscar) {
                $cantidad= $cantidad + 1;
            }  
        }  
        $nuevosId['idProducto']= $id_Buscar; 
        $idsrecorrido['idProductorecorrido']=$id_Buscar;
        $nuevosId['cantidad'] = $cantidad; 
        $cantidad= 0; 
        $UtlimoId= $id_Buscar;
        array_push($nuevosIdFinal, $nuevosId);
        array_push($idsrecorridoFinal, $idsrecorrido);
    }else{
        foreach ($idsrecorridoFinal as $row) {
            if ($row['idProductorecorrido'] != $id_Buscar) {
                foreach ($recorridoiD as $row) {
                    if ($row['idProducto'] ==  $id_Buscar) {
                        $cantidad= $cantidad + 1;
                    }  
                }  
                $nuevosId['idProducto']= $id_Buscar; 
                $idsrecorrido['idProductorecorrido']=$id_Buscar;
                $nuevosId['cantidad'] = $cantidad; 
                $cantidad= 0; 
                $UtlimoId= $id_Buscar;
                array_push($nuevosIdFinal, $nuevosId);
            }  
        }
    }
    
  
}
//array_push($nuevosIdFinal, $nuevosId);
@$_SESSION['listaProductosIdFinal']= $nuevosIdFinal;
//$nuevosId=array_count_values($recorridoiD);

header('Content-Type: application/json');
echo(json_encode(@$_SESSION['listaProductosIdFinal']));


?>