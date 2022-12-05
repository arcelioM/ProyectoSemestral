<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "productrosGenea.php";
session_start();
@$_SESSION['productosID'];
@$_SESSION['contadorCarrito'];

$response=array();
$response= @$_SESSION['productosID'];


header('Content-Type: application/json');
echo (json_encode($response));

?>