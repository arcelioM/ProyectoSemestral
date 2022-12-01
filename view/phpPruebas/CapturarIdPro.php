<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);

session_start();
$_SESSION['productosID']= array();
$_SESSION['listaProductos']= array();
$_SESSION['contadorCarrito']= 0;
$_SESSION['SubtotalCarrito']= 0.0;
$_SESSION['ImpuestotalCarrito']= 0.0;
$_SESSION['totalCarrito']= 0.0;


//ESTE PHP ES SÓLO PARA DEFINIR LOS ARREGLOS DE SESIÓN QUE ALMACENARÁN LOS ID DE LOS PRODUCTOS QUE SEAN AGREAGDOS EN EL CARRITO Y TAMBIÉN PARA ACTUALIZAR EL 
//CONTADOR DEL CARRITO

?>