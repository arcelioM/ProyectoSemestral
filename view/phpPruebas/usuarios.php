<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "usuarioClas.php";
session_start();

$_SESSION['usuarios'] = array();

$userTotal = new Usuarios();
$userTotal->idUsarioRol = "1";
$userTotal->usuario = "geova@035.com";
$userTotal->nombre = "Geovanna";
$userTotal->Apellido = "Pitti";
$userTotal->imagen = "fondo21.jpg";
$userTotal->password = "12345";
$userTotal->direccion = "Chiriquí";
$userTotal->telefonoUno = "12458";
$userTotal->telefonoDos = "12489635";
$userTotal->rol = "cliente";
array_push($_SESSION['usuarios'], $userTotal);

$userTotal = new Usuarios();
$userTotal->idUsarioRol = "2";
$userTotal->usuario = "geovy@036.com";
$userTotal->nombre = "Geovanny";
$userTotal->Apellido = "Pitti";
$userTotal->imagen = "opcion90.gif";
$userTotal->password = "12345";
$userTotal->direccion = "Panamá";
$userTotal->telefonoUno = "12458";
$userTotal->telefonoDos = "12489635";
$userTotal->rol = "cliente";
array_push($_SESSION['usuarios'], $userTotal);

$userTotal = new Usuarios();
$userTotal->idUsarioRol = "2";
$userTotal->usuario = "geovy@036.com";
$userTotal->nombre = "Geovanny";
$userTotal->Apellido = "Pitti";
$userTotal->imagen = "opcion90.gif";
$userTotal->password = "12345";
$userTotal->direccion = "Panamá";
$userTotal->telefonoUno = "12458";
$userTotal->telefonoDos = "12489635";
$userTotal->rol = "administrador";
array_push($_SESSION['usuarios'], $userTotal);

$userTotal = new Usuarios();
$userTotal->idUsarioRol = "3";
$userTotal->usuario = "thelmy@036.com";
$userTotal->nombre = "Thelmarys";
$userTotal->Apellido = "Pitti";
$userTotal->imagen = "fondito22.jpg";
$userTotal->password = "12345";
$userTotal->direccion = "Veraguas";
$userTotal->telefonoUno = "124987";
$userTotal->telefonoDos = "1248967";
$userTotal->rol = "cliente";
array_push($_SESSION['usuarios'], $userTotal);


/*echo"<hr>";
foreach ($_SESSION['usuarios'] as $userTotal)
{
    echo "<br>";
    echo "ID: " .$userTotal->idUsarioRol;
    echo "<br>";
    echo "USUARIO: " .$userTotal->usuario;
    echo "<br>";
    echo "nombre : " .$userTotal->nombre;
    echo "<br>";
    echo "Apellido: " .$userTotal->Apellido;
    echo "<br>";
    echo "imagen: " .$userTotal->imagen;
    echo "<br>";
    echo "password: " .$userTotal->password;
    echo "<br>";
    echo "direccion: " .$userTotal->direccion;
    echo "<br>";
    echo "telefonoUno: " .$userTotal->telefonoUno;
    echo "<br>";
    echo "telefonoDos: " .$userTotal->telefonoDos;
    echo "<br>";
    echo "rol: " .$userTotal->rol;
    echo "<br>";
    echo"<hr>";
}*/

?>