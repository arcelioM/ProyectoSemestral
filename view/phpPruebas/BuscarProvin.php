<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "ProvinClass.php"; 
session_start();
@$_SESSION['provincias'];//esto es por pureba, ya que se pude traer de la base de datos
$response=array();
$result=array();
$recorrido=array();
$recorrido= @$_SESSION['provincias'];


foreach ($recorrido as $ProvinciaTotal) {

    $ProvinciaMostar = new Provincias();
    $ProvinciaMostar->id_provincia = $ProvinciaTotal->id_provincia;
    $ProvinciaMostar->nombre = $ProvinciaTotal->nombre;
    array_push($response, $ProvinciaMostar) ;    
}

header('Content-Type: application/json');
echo (json_encode($response));



?>