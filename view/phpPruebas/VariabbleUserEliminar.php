<?php
session_start();

$_SESSION['ideliminarUser']=$_POST['id'];
$response=array();

/*response["success"] = "Id guardado";
header('Content-Type: application/json');
echo(json_encode($response));*/
?>