<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "ProvinClass.php"; 
session_start();
//ESTA PRUEBA SE DEBE LLENAR CON BASE DE DATOS 

$idprovinciaEscogida= $_POST['id_provincia'];

$response = array();

if ( $idprovinciaEscogida == 4) {

    $DistritoTotal = new Distrito();
    $DistritoTotal->id_distrito = "1";
    $DistritoTotal->nombre = "David";
    array_push($response, $DistritoTotal);

    $DistritoTotal = new Distrito();
    $DistritoTotal->id_distrito = "2";
    $DistritoTotal->nombre = "Bugaba";
    array_push($response, $DistritoTotal);

    header('Content-Type: application/json');
    echo (json_encode($response));
}else{
    if ( $idprovinciaEscogida == 1) {
        
        $DistritoTotal = new Distrito();
        $DistritoTotal->id_distrito = "3";
        $DistritoTotal->nombre = "Empalme";
        array_push($response, $DistritoTotal);

        $DistritoTotal = new Distrito();
        $DistritoTotal->id_distrito = "4";
        $DistritoTotal->nombre = "Cabos Unión";
        array_push($response, $DistritoTotal);
    
        header('Content-Type: application/json');
        echo (json_encode($response));
    }
}


?>