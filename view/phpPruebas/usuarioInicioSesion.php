<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "usuarioClas.php"; 
session_start();
@$_SESSION['usuarios'];//esto es por pureba, ya que se pude traer de la base de datos
$response=array();
$result=array();
$recorrido=array();
$recorrido= @$_SESSION['usuarios'];
$axiliar=0;
$_SESSION['datoUser'] = array(); //Este Arrgelo Sesión me permitrá capturar los datos del usuario que inició sesión

if($_POST){
    $usario= $_POST['usuario'];
    $Password = $_POST['password'];

    foreach ($recorrido as $userTotal) {
        if ($userTotal->usuario == $usario && $Password == $userTotal->password) {
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
            $axiliar = $axiliar + 1;  //ESTO ME AYUDÓ PARA SABER SI HAY 2 BUSQEUDAS ENCOTRDAS, DE SER ASÍ; ES PORQUE EL USUSARIO ES ADMINITRADOR POR LO QUE MANDO ESTA CANTIDAD 
                                      // AL JAVASCRITP

            //ESTAS LÍNEAS ES PARA ALMACENAR LOS DATOS DEL USUARIO QUE INICIÓ SESIÓN Y ESTÁ NAVEGANDO                          
            $userDatos = new Usuarios();
            $userDatos->idUsarioRol = $userTotal->idUsarioRol;
            $userDatos->usuario = $userTotal->usuario;
            $userDatos->nombre = $userTotal->nombre;
            $userDatos->Apellido = $userTotal->Apellido;
            $userDatos->imagen = $userTotal->imagen;
            $userDatos->password = $userTotal->password;
            $userDatos->direccion = $userTotal->direccion;
            $userDatos->telefonoUno = $userTotal->telefonoUno;
            $userDatos->telefonoDos = $userTotal->telefonoDos;
            $userDatos->rol = $userTotal->rol;
            array_push($_SESSION['datoUser'], $userDatos);
        }
    }

    if($axiliar>0){
        $response["Cantidad"]=$axiliar;
         array_push($result, $response);
        header('Content-Type: application/json');
        echo (json_encode($result));

    }else{
        $result["valor"] = $axiliar;
        array_push($response, $result);

        header('Content-Type: application/json');
        echo (json_encode($response));

    }
}



?>