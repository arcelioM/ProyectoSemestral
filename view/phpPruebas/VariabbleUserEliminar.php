<?php
session_start();

$_SESSION['ideliminarUser']=$_POST['id'];
$response=array();
$response["idMensaje"]= "Guardao"; 
header('Content-Type: application/json');
echo(json_encode($response));
/*$response["idEliminarTablaU"] = "Id guardado";
header('Content-Type: application/json');
echo(json_encode($response));*/
?>