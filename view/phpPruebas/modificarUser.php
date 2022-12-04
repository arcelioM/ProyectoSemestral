<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require "usuarioClas.php"; 
require "productrosGenea.php"; 
session_start();
@$_SESSION['datoUser']; //Este Arrgelo Sesión me permitrá capturar los datos del usuario que inició sesión Para extraer el id del usuario a modificar
@$_SESSION['usuarios']; //Este Arreglo de sesión es para simular la búsqueda de datos en la BD
$response=array();
$result=array();
$resultFin=array();
$recorrido= @$_SESSION['datoUser'];
  

$idUsuario= $_POST['idUsuario'];
$usuario= $_POST['usuario'];
$nombre = $_POST['nombre'];
$Apellido = $_POST['Apellido'];
$email = $_POST['email'];
$passActual = $_POST['passActual'];
$passNuevo = $_POST['passNuevo'];
$telefono_1 = $_POST['telefono_1'];
$telefono_2 = $_POST['telefono_2'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$imagenTra = $_POST['imagen'];
$imagen = substr($imagenTra, 12);
$auxiliar=0;

/*echo (json_encode(@$_SESSION['datoUser']));
echo "<br>";
echo "<br>";*/

//IMPORTANTE LUEGO DE TENER LOS DATOS A MODIFICAR SE HACE LA SNETECNIA SQL UPDATE Y LUEGO DE QUE SE LLEVA A CABO DE FORMA CORRECTA 
//SE VUELVE A LLAMR LOS DATOS DEL USUARIO CON EL ID PARA LUEGO VOLVERLOS A GUARDAZR EN LA VARIABLE SESIÓN DE PERFIL PARA QUE LO CAMBIOS SE VEAN REFLEJADOS
// ESTE FOREACH SIGUINETE ES PARA CUANDO YA SE HAYA HECHO LO ANTERIOR GUARDAR LOS CAMBIOS 



foreach ($recorrido as $userTotal) {
    if ($userTotal->idUsuario == $idUsuario) {
        if ($auxiliar <= 0) {
            $usercredencial = new Usuarios();
            $usercredencial->idUsarioRol = $userTotal->idUsarioRol;
            $usercredencial->idUsuario = $idUsuario;
            $usercredencial->usuario = $idUsuario;
            $usercredencial->nombre = $nombre;
            $usercredencial->Apellido = $Apellido;
            $usercredencial->imagen = $imagen;
            $usercredencial->rol = $userTotal->rol;
            array_push($result, $usercredencial);
            $auxiliar = $auxiliar + 1;
        }                     
    }
}

@$_SESSION['datoUser'] = $result; 
//echo (json_encode($result));

$response["valor"] = "1";
array_push($resultFin, $response);
header('Content-Type: application/json');
echo (json_encode($resultFin));

?>