<?php
session_start();

$_SESSION['ideliminarProduc']=$_POST['id'];
$response=array();

$response["success"] = "Id guardado";
header('Content-Type: application/json');
echo(json_encode($response));
?>