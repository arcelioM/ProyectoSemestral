<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);

$nombre = $_POST['nombre'];
$Apellido = $_POST['Apellido'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$direccion = $_POST['direccion'];
$telefono_1 = $_POST['telefono_1'];
$telefono_2 = $_POST['telefono_2'];
$imagen = $_POST['imagen'];
$id_rol = $_POST['id_rol'];
           


$response=array();
$result=array();
$recorrido=array();

$response["valor"] = "1";
array_push($result, $response);
header('Content-Type: application/json');
echo (json_encode($result));

?>