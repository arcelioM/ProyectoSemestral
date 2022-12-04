<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require "usuarioClas.php"; 

session_start();
@$_SESSION['datoUser']; //Este Arrgelo Sesión me permitrá capturar los datos del usuario que inició sesión Para extraer el id del usuario a modificar
@$_SESSION['usuarios']; //Este Arreglo de sesión es para simular la búsqueda de datos en la BD
$response=array();
$result=array();
$resultFin=array();
$recorrido= array();
$recorrido= @$_SESSION['datoUser'];
$recorridousuario= array();
$recorridousuario= @$_SESSION['usuarios'];

$ID_User_Navegando= null; 
$auxiliar=0;
$auxiliarNo2=0;


foreach ($recorrido as $userTotal) {
    if ($auxiliar <= 0) {  
        $ID_User_Navegando = $userTotal->idUsuario;  
        $auxiliar=$auxiliar +1;                     
    }
}



//Con el Dato del Id del usuario que está navegando se hace una consulta a la base de datos para traer todos los datos relevante del usuario a mostrar en 
// la opción profile   de no hacer sólo le pareceran los datos que se traen con el proceso de validación y no serían suficientes datos.


//ESTE RECORRIDO SE HACE hace la simulación de busqueda en la base de datos con el Id del usuario navegando

foreach ($recorridousuario as $userTotal) {
    if($userTotal->idUsuario == $ID_User_Navegando ){
        if ($auxiliarNo2 <= 0) {  
            $usercredencial = new Usuarios();
            $usercredencial->idUsuario = $userTotal->idUsuario;
            $usercredencial->usuario = $userTotal->usuario;
            $usercredencial->nombre = $userTotal->nombre;
            $usercredencial->Apellido = $userTotal->Apellido;
            $usercredencial->email = $userTotal->email;
            $usercredencial->direccion = $userTotal->direccion;
            $usercredencial->telefonoUno = $userTotal->telefonoUno;
            $usercredencial->telefonoDos = $userTotal->telefonoDos;
            $usercredencial->fechaNacimiento = $userTotal->fechaNacimiento;
            $usercredencial->imagen = $userTotal->imagen;
            array_push($result, $usercredencial);
            $auxiliar = $auxiliar + 1;  //ESTA LÍNEA LA UTLIZO PARA QUE SÓLO SE MANDE UNA VEZ LOS DATOS DEL USUARIO SIN IMPORTAR SI ES CLIENTE O ADMINISTRADOR 
            header('Content-Type: application/json');
            echo (json_encode($result));
            $auxiliarNo2=$auxiliarNo2 +1;                         
        }
    }
}


?>