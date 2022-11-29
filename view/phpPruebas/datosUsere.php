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
        $usercredencial->usuario = $userTotal->usuario;
        $usercredencial->nombre = $userTotal->nombre;
        $usercredencial->Apellido = $userTotal->Apellido;
        $usercredencial->imagen = $userTotal->imagen;
        $usercredencial->password = $userTotal->password;
        $usercredencial->direccion = $userTotal->direccion;
        $usercredencial->telefonoUno = $userTotal->telefonoUno;
        $usercredencial->telefonoDos = $userTotal->telefonoDos;
        $usercredencial->rol = $userTotal->rol;
        array_push($result, $usercredencial);
        $auxiliar = $auxiliar + 1;  //ESTO ME AYUDÓ PARA SABER SI HAY 2 BUSQEUDAS ENCOTRDAS ES PORQUE EL USUSARIO ES ADMINITRADOR POR LO QUE MANDO ESTA CANTIDAD 
        // AL JAVASCRITP
        //ESTAS LÍNEAS ES PARA ALMACENAR LOS DATOS DEL USUARIO QUE INICIÓ SESIÓN Y ESTÁ NAVEGANDO  
        header('Content-Type: application/json');
        echo (json_encode($result));                        
    }
}

?>