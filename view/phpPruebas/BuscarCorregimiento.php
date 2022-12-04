<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "ProvinClass.php"; 
session_start();
//ESTA PRUEBA SE DEBE LLENAR CON BASE DE DATOS 

$idDsitrtoEscogida= $_GET['id_distrito'];

$response = array();

if ($idDsitrtoEscogida == 1) {
    $CorregmientoTotal = new Corregimiento();
    $CorregmientoTotal->id_corregimiento = "1";
    $CorregmientoTotal->nombre = "Chiriquí";
    array_push($response, $CorregmientoTotal);

    $CorregmientoTotal = new Corregimiento();
    $CorregmientoTotal->id_corregimiento = "2";
    $CorregmientoTotal->nombre = "Las lomas";
    array_push($response, $CorregmientoTotal);

    header('Content-Type: application/json');
    echo (json_encode($response));
}else{
    if ( $idDsitrtoEscogida == 2) {

        $CorregmientoTotal = new Corregimiento();
        $CorregmientoTotal->id_corregimiento = "3";
        $CorregmientoTotal->nombre = "La concepción";
        array_push($response, $CorregmientoTotal);

        $CorregmientoTotal = new Corregimiento();
        $CorregmientoTotal->id_corregimiento = "4";
        $CorregmientoTotal->nombre = "La Cruz";
        array_push($response, $CorregmientoTotal);

        header('Content-Type: application/json');
        echo (json_encode($response));
    }else{
        if ( $idDsitrtoEscogida == 3) {

            $CorregmientoTotal = new Corregimiento();
            $CorregmientoTotal->id_corregimiento = "5";
            $CorregmientoTotal->nombre = "La Paz";
            array_push($response, $CorregmientoTotal);

            $CorregmientoTotal = new Corregimiento();
            $CorregmientoTotal->id_corregimiento = "6";
            $CorregmientoTotal->nombre = "La Tragua";
            array_push($response, $CorregmientoTotal);

            header('Content-Type: application/json');
            echo (json_encode($response));
        }else{
            if ( $idDsitrtoEscogida == 4) {

                $CorregmientoTotal = new Corregimiento();
                $CorregmientoTotal->id_corregimiento = "7";
                $CorregmientoTotal->nombre = "La Nagua";
                array_push($response, $CorregmientoTotal);

                $CorregmientoTotal = new Corregimiento();
                $CorregmientoTotal->id_corregimiento = "8";
                $CorregmientoTotal->nombre = "La Pinta";
                array_push($response, $CorregmientoTotal);
    
                header('Content-Type: application/json');
                echo (json_encode($response));
            }
            
        }
    }
}


?>