<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
$response=array();
$result=array();


$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$Apellido = $_POST['Apellido'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$corregimiento_id = $_POST['corregimiento_id'];
$direcion_especifica = $_POST['direcion_especifica'];
$telefono_1 = $_POST['telefono_1'];
$telefono_2 = $_POST['telefono_2'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$imagen = $_POST['imagen'];
$id_rol = $_POST['id_rol'];
           


$response["valor"] = "1";
$response["mensaje"] = "Creación exitosa";
$response["fecha"] = $fechaNacimiento;
array_push($result, $response);
header('Content-Type: application/json');
echo (json_encode($result));

?>