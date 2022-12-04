<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "usuarioClas.php"; 
session_start();
@$_SESSION['datoUser']; //Este Arrgelo Sesión me permitrá capturar los datos del usuario que inició sesión
$response=array();
$result=array();
$recorrido=array();
$recorrido= @$_SESSION['datoUser'];
$auxiliar=0; //Este auxiliar me ayudará a controlar que sólo se guarde los datos una vez ya que como sabemos si el usuario es administrador 
             //se almacenarán 2 lista de datos, pero en realidad sólo necesitamos los datos una vez sin importar el tipo de usuario.  

           
foreach ($recorrido as $userTotal) {
    if ($auxiliar <= 0) {  
        $usercredencial = new Usuarios();
        $usercredencial->idUsarioRol = $userTotal->idUsarioRol;
        $usercredencial->idUsuario = $userTotal->idUsuario;
        $usercredencial->usuario = $userTotal->usuario;
        $usercredencial->nombre = $userTotal->nombre;
        $usercredencial->Apellido = $userTotal->Apellido;
        $usercredencial->imagen = $userTotal->imagen;
        $usercredencial->rol = $userTotal->rol;
        array_push($result, $usercredencial);
        $auxiliar = $auxiliar + 1;  //ESTA LÍNEA LA UTLIZO PARA QUE SÓLO SE MANDE UNA VEZ LOS DATOS DEL USUARIO SIN IMPORTAR SI ES CLIENTE O ADMINISTRADOR 
        header('Content-Type: application/json');
        echo (json_encode($result));                        
    }
}

?>