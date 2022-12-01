<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
@$_SESSION['contadorCarrito'];
$contador=$_SESSION['contadorCarrito'];

header('Content-Type: application/json');
echo (json_encode($contador));
//ESTE PHP ES SÓLO PARA DEFINIR LOS ARREGLOS DE SESIÓN QUE ALMACENARÁN LOS ID DE LOS PRODUCTOS QUE SEAN AGREAGDOS EN EL CARRITO Y TAMBIÉN PARA ACTUALIZAR EL 
//CONTADOR DEL CARRITO

?>