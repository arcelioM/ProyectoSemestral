<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "usuarioClas.php"; 
session_start();
//@$_SESSION['usuarios'];//esto es por pureba, ya que se pude traer de la base de datos
$response=array();
$result=array();

//$recorrido= @$_SESSION['usuarios'];
$axiliar=0;
$_SESSION['datoUser'] = array(); //Este Arrgelo Sesión me permitrá capturar los datos del usuario que inició sesión
$_SESSION['idUsarioRol'] = null;

//echo var_dump($DatodelUserIni);

//if($_POST){
   // $email= $_POST['Correo'];
    //$Password = $_POST['password'];

    $DatodelUserIni=array();
    $DatodelUserIni = $_POST['usuarios'];
    $JasonPedido = array();
    //echo var_dump($_POST['usuarios']);
    $InfoProductoLLevarFinal = array();
    $DatodelUserIniFinal = $_POST['usuarios'];

    //$DatodelUserIni = $DatodelUserIniFinal->usuarios;

    
    //Aquí iría la sentecia SQL 
    //cuando se obtinene el resultado se recorre pero es imortante 

    foreach ($DatodelUserIni as $userTotal) {

        $userTotal = (object) $userTotal;
        //if ($userTotal->email == $email && $Password == $userTotal->password) {
            $usercredencial = new Usuarios();
            $usercredencial->idUsarioRol = $userTotal->idUsuarioRol;
            $usercredencial->idUsuario = $userTotal->idUsuario;
            $usercredencial->usuario = $userTotal->usuario;
            $usercredencial->nombre = $userTotal->nombre;
            $usercredencial->Apellido = $userTotal->apellido;
            $usercredencial->imagen = $userTotal->imagen;
            $usercredencial->rol = $userTotal->rol;
            array_push($result, $usercredencial);
            $axiliar = $axiliar + 1;  //ESTO ME AYUDÓ PARA SABER SI HAY 2 BUSQEUDAS ENCOTRDAS, DE SER ASÍ; ES PORQUE EL USUSARIO ES ADMINITRADOR POR LO QUE MANDO ESTA CANTIDAD 
                                      // AL JAVASCRITP

            //ESTAS LÍNEAS ES PARA ALMACENAR LOS DATOS DEL USUARIO QUE INICIÓ SESIÓN Y ESTÁ NAVEGANDO EN VARIABLE DE SESIÓN  SE DEBE DEJAR                       
            $userDatos = new Usuarios();
            $userDatos->idUsarioRol = $userTotal->idUsuarioRol;
            $userDatos->idUsuario = $userTotal->idUsuario;
            $userDatos->usuario = $userTotal->usuario;
            $userDatos->nombre = $userTotal->nombre;
            $userDatos->Apellido = $userTotal->apellido;
            $userDatos->imagen = $userTotal->imagen;
            $userDatos->rol = $userTotal->rol;
            array_push($_SESSION['datoUser'], $userDatos);

            if($userTotal->rol=='Administrador'){
                $response["Cantidad"]=2;
                $_SESSION['idUsarioRol']=2; //Este me ayudará a distinguir lo usarios rol si es uno el cliente sino es administrador  
                array_push($result, $response);
                break;
            }else if($userTotal->rol=="Cliente"){
                $response["Cantidad"]=1;
                $_SESSION['idUsarioRol']=1; //Este me ayudará a distinguir lo usarios rol si es uno el cliente sino es administrador  
                array_push($result, $response);
            }
        //}
    }

    

    if($axiliar>0){
       
        header('Content-Type: application/json');
        echo (json_encode($result));

    }else{
        $result["valor"] = $axiliar;
        array_push($response, $result);

        header('Content-Type: application/json');
        echo (json_encode($response));

    }
    
//}



?>