<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require "usuarioClas.php"; 
require "productrosGenea.php"; 
session_start();
@$_SESSION['datoUser']; //Este Arrgelo Sesión me permitrá capturar los datos del usuario que inició sesión
$response=array();
$result=array();
$resultFin=array();
$recorrido= @$_SESSION['datoUser'];
  

$nombre = $_POST['nombre'];
$Apellido = $_POST['Apellido'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$direccion = $_POST['direccion'];
$telefono_1 = $_POST['telefono_1'];
$telefono_2 = $_POST['telefono_2'];
$imagenTra = $_POST['imagen'];
$imagen = substr($imagenTra, 12);
$id_rol = $_POST['id_rol'];
$rolNuevo = $_POST['rol'];
           

/*echo (json_encode(@$_SESSION['datoUser']));
echo "<br>";
echo "<br>";*/

foreach ($recorrido as $userTotal) {
    if ($userTotal->idUsarioRol == $id_rol) {
        $usercredencial = new Usuarios();
        $usercredencial->idUsarioRol= $id_rol;
        $usercredencial->usuario = $email;
        $usercredencial->nombre = $nombre;
        $usercredencial->Apellido = $Apellido ;
        $usercredencial->imagen = $imagen;
        $usercredencial->password = $contrasena;
        $usercredencial->direccion = $direccion;
        $usercredencial->telefonoUno = $telefono_1;
        $usercredencial->telefonoDos= $telefono_2; 
        $usercredencial->rol= $rolNuevo;
        array_push($result, $usercredencial);                       
    }
}

@$_SESSION['datoUser'] = $result; 
//echo (json_encode($result));

$response["valor"] = "1";
array_push($resultFin, $response);
header('Content-Type: application/json');
echo (json_encode($resultFin));

?>