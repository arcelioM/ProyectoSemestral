<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "ProvinClass.php";
session_start();
$_SESSION['provincias'] = array();
$_SESSION['Distritos'] = array();
$_SESSION['Corregimientos'] = array();


$ProvinciaTotal = new Provincias();
$ProvinciaTotal->id_provincia = "1";
$ProvinciaTotal->nombre = "Bocas del Toro";
array_push($_SESSION['provincias'], $ProvinciaTotal);

$ProvinciaTotal = new Provincias();
$ProvinciaTotal->id_provincia = "4";
$ProvinciaTotal->nombre = "Chiriquí";
array_push($_SESSION['provincias'], $ProvinciaTotal);



/*echo"<hr>";
foreach ($_SESSION['Corregimientos'] as $CorregmientoTotal)
{
    echo "<br>";
    echo "ID_Corregimiento: " .$CorregmientoTotal->id_corregimiento;
    echo "<br>";
    echo "Nombre: " .$CorregmientoTotal->nombre ;
    echo "<br>";
    echo"<hr>";
}*/


?>
