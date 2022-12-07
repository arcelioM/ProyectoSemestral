<?php
session_start();

$_SESSION['idActivarProduc']=$_POST['id'];
$response=array();

$response["success"] = "Id a activar guardado";
header('Content-Type: application/json');
echo(json_encode($response));
?>