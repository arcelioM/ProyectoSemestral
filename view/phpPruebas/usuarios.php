<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "usuarioClas.php";
session_start();
$_SESSION['usuarios'] = array();

/*public $idUsarioRol; 
    public $idUsario;
    public $usuario; 
    public $nombre; 
    public $Apellido; 
    public $email;
    public $password; 
    public $imagen; 
    public $direccion; 
    public $telefonoUno; 
    public $telefonoDos; 
    public $rol; */

$userTotal = new Usuarios();
$userTotal->idUsarioRol = "1";
$userTotal->idUsuario = "1"; //cambiar a idUsuario
$userTotal->usuario = "Geova_0197";
$userTotal->nombre = "Geovanna";
$userTotal->Apellido = "Pitti";
$userTotal->email = "geova@035.com";
$userTotal->password = "12345";
$userTotal->imagen = "fondo21.jpg";
$userTotal->direccion = "Chiriquí";
$userTotal->telefonoUno = "12458";
$userTotal->telefonoDos = "12489635";
$userTotal->fechaNacimiento = "01/02/1997";
$userTotal->rol = "cliente";
array_push($_SESSION['usuarios'], $userTotal);



$userTotal = new Usuarios();
$userTotal->idUsarioRol = "1";
$userTotal->idUsuario = "2"; //cambiar a idUsuario
$userTotal->usuario = "Geovy_0302";
$userTotal->nombre = "Geovanny";
$userTotal->Apellido = "Pitti";
$userTotal->email = "geovy@036.com";
$userTotal->password = "12345";
$userTotal->imagen = "fondo21.jpg";
$userTotal->direccion = "Panamá";
$userTotal->telefonoUno = "12458";
$userTotal->telefonoDos = "12489635";
$userTotal->fechaNacimiento = "03/03/2002";
$userTotal->rol = "cliente";
array_push($_SESSION['usuarios'], $userTotal);


$userTotal = new Usuarios();
$userTotal->idUsarioRol = "2";
$userTotal->idUsuario = "2"; //cambiar a idUsuario
$userTotal->usuario = "Geovy_0302";
$userTotal->nombre = "Geovanny";
$userTotal->Apellido = "Pitti";
$userTotal->email = "geovy@036.com";
$userTotal->password = "12345";
$userTotal->imagen = "opcion90.gif";
$userTotal->direccion = "Panamá";
$userTotal->telefonoUno = "12458";
$userTotal->telefonoDos = "12489635";
$userTotal->fechaNacimiento = "03/03/2002";
$userTotal->rol = "Administrador";
array_push($_SESSION['usuarios'], $userTotal);


$userTotal = new Usuarios();
$userTotal->idUsarioRol = "1";
$userTotal->idUsuario = "3"; //cambiar a idUsuario
$userTotal->usuario = "LaBeia_507";
$userTotal->nombre = "Thelmarys";
$userTotal->Apellido = "Pitti";
$userTotal->email = "thelmy@036.com";
$userTotal->password = "12345";
$userTotal->imagen = "fondito22.jpg";
$userTotal->direccion = "Veraguas";
$userTotal->telefonoUno = "124987";
$userTotal->telefonoDos = "1248967";
$userTotal->fechaNacimiento = "08/18/2003";
$userTotal->rol = "cliente";
array_push($_SESSION['usuarios'], $userTotal);


/*echo"<hr>";
foreach ($_SESSION['usuarios'] as $userTotal)
{
    echo "<br>";
    echo "idUsarioRol: " .$userTotal->idUsarioRol;
    echo "<br>";
    echo "idUsuario: " .$userTotal->idUsuario;
    echo "<br>";
    echo "usuario : " .$userTotal->usuario;
    echo "<br>";
    echo "nombre: " .$userTotal->nombre;
    echo "<br>";
    echo "Apellido: " .$userTotal->Apellido;
    echo "<br>";
    echo "email: " .$userTotal->email;
    echo "<br>";
    echo "password: " .$userTotal->password;
    echo "<br>";
    echo "imagen: " .$userTotal->imagen;
    echo "<br>";
    echo "direccion: " .$userTotal->direccion;
    echo "<br>";
    echo "telefonoUno: " .$userTotal->telefonoUno;
    echo "<br>";
    echo "telefonoDos: " .$userTotal->telefonoDos;
    echo "<br>";
    echo "fechaNacimiento: " .$userTotal->fechaNacimiento;
    echo "<br>";
    echo "rol: " .$userTotal->rol;
    echo "<br>";
    echo"<hr>";
}*/

?>