<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "productrosGenea.php";


session_start();
@$_SESSION['idUsarioRol'];

/*$idUsuarioRol= @$_SESSION['idUsarioRol'];
$idCategoria= $_POST['idCategoria'];*/



$listaPro = array();
$_SESSION['listaProductos']= array();
$InfoProductoLLevar=$_Post['InfoProductoLLevar'];
$JasonPedido=array();
$InfoProductoLLevarFinal=array();
$InfoProductoLLevarFinal= json_decode($InfoProductoLLevar);
$_SESSION['listaProductos']=$InfoProductoLLevarFinal->productos;

$response= "llenado"; 
header('Content-Type: application/json');
echo(json_encode($response));
/*if ($idCategoria == "0") {
    $prodctoGe = new Productos();
    $prodctoGe->idProducto = "1";
    $prodctoGe->nombre = "DataShow";
    $prodctoGe->descripcion = "Posee una definición en Full HD y una alta tasa de durabilidad";
    $prodctoGe->cantidad = 30;
    $prodctoGe->precio = 340.56;
    $prodctoGe->imagen = "fondo21.jpg";
    array_push($_SESSION['listaProductos'], $prodctoGe);
    

    $prodctoGe = new Productos();
    $prodctoGe->idProducto = "2";
    $prodctoGe->nombre = "Samsung Note 21";
    $prodctoGe->descripcion = "Ultra cámera super amolet con una capacidad de memoria mayor a 72 Gb ";
    $prodctoGe->cantidad = 20;
    $prodctoGe->precio = 500.56;
    $prodctoGe->imagen = "opcion30.jpg";
    array_push($_SESSION['listaProductos'], $prodctoGe);

    $prodctoGe = new Productos();
    $prodctoGe->idProducto = "3";
    $prodctoGe->nombre = "Lapto DELL- Vostro 3000";
    $prodctoGe->descripcion = "Pantalla de 18 pulgas, un SSD de 1Tb y Ram de 12 GB";
    $prodctoGe->cantidad = 25;
    $prodctoGe->precio = 800.56;
    $prodctoGe->imagen = "opcion11.jpg";
    array_push($_SESSION['listaProductos'], $prodctoGe);

    $prodctoGe = new Productos();
    $prodctoGe->idProducto = "4";
    $prodctoGe->nombre = " Lapto DELL- Gninus 500";
    $prodctoGe->descripcion = "Pantalla de 15 pulgas, un SSD de 1Tb y Ram de 8 GB";
    $prodctoGe->cantidad = 30;
    $prodctoGe->precio = 500.56;
    $prodctoGe->imagen = "opcion19.jpg";
    array_push($_SESSION['listaProductos'], $prodctoGe);

    $prodctoGe = new Productos();
    $prodctoGe->idProducto = "5";
    $prodctoGe->nombre = " Samsumg Tab A- 2019";
    $prodctoGe->descripcion = "Ultra cámera super amolet con una capacidad de memoria mayor a 64 Gb";
    $prodctoGe->cantidad = 30;
    $prodctoGe->precio = 250.56;
    $prodctoGe->imagen = "opcion6.gif";
    array_push($_SESSION['listaProductos'], $prodctoGe);

    $prodctoGe = new Productos();
    $prodctoGe->idProducto = "6";
    $prodctoGe->nombre = "Pizarra DashBoard";
    $prodctoGe->descripcion = "Automática y Amolet con sicronización de Bluetooth";
    $prodctoGe->cantidad = 30;
    $prodctoGe->precio = 550.56;
    $prodctoGe->imagen = "opcion76.gif";
    array_push($_SESSION['listaProductos'], $prodctoGe);

    $listaPro = $_SESSION['listaProductos'];

    header('Content-Type: application/json');
    echo(json_encode($listaPro));
}else{
    if ($idCategoria == "1") {
        
        $prodctoGe = new Productos();
        $prodctoGe->idProducto = "2";
        $prodctoGe->nombre = "Samsung Note 21";
        $prodctoGe->descripcion = "Ultra cámera super amolet con una capacidad de memoria mayor a 72 Gb ";
        $prodctoGe->cantidad = 20;
        $prodctoGe->precio = 500.56;
        $prodctoGe->imagen = "opcion30.jpg";
        array_push($listaPro, $prodctoGe);
    
        $prodctoGe = new Productos();
        $prodctoGe->idProducto = "5";
        $prodctoGe->nombre = " Samsumg Tab A- 2019";
        $prodctoGe->descripcion = "Ultra cámera super amolet con una capacidad de memoria mayor a 64 Gb";
        $prodctoGe->cantidad = 30;
        $prodctoGe->precio = 250.56;
        $prodctoGe->imagen = "opcion6.gif";
        array_push($listaPro, $prodctoGe);

        header('Content-Type: application/json');
        echo (json_encode($listaPro));
    }else{
        if ($idCategoria == "2") {

            $prodctoGe = new Productos();
            $prodctoGe->idProducto = "3";
            $prodctoGe->nombre = "Lapto DELL- Vostro 3000";
            $prodctoGe->descripcion = "Pantalla de 18 pulgas, un SSD de 1Tb y Ram de 12 GB";
            $prodctoGe->cantidad = 25;
            $prodctoGe->precio = 800.56;
            $prodctoGe->imagen = "opcion11.jpg";
            array_push($listaPro, $prodctoGe);
        
            $prodctoGe = new Productos();
            $prodctoGe->idProducto = "4";
            $prodctoGe->nombre = " Lapto DELL- Gninus 500";
            $prodctoGe->descripcion = "Pantalla de 15 pulgas, un SSD de 1Tb y Ram de 8 GB";
            $prodctoGe->cantidad = 30;
            $prodctoGe->precio = 500.56;
            $prodctoGe->imagen = "opcion19.jpg";
            array_push($listaPro, $prodctoGe);

            header('Content-Type: application/json');
            echo (json_encode($listaPro));

        }else{
            if ($idCategoria == "3") {

                $prodctoGe = new Productos();
                $prodctoGe->idProducto = "1";
                $prodctoGe->nombre = "DataShow";
                $prodctoGe->descripcion = "Posee una definición en Full HD y una alta tasa de durabilidad";
                $prodctoGe->cantidad = 30;
                $prodctoGe->precio = 340.56;
                $prodctoGe->imagen = "fondo21.jpg";
                array_push($listaPro, $prodctoGe);
            
                $prodctoGe = new Productos();
                $prodctoGe->idProducto = "6";
                $prodctoGe->nombre = "Pizarra DashBoard";
                $prodctoGe->descripcion = "Automática y Amolet con sicronización de Bluetooth";
                $prodctoGe->cantidad = 30;
                $prodctoGe->precio = 550.56;
                $prodctoGe->imagen = "opcion76.gif";
                array_push($listaPro, $prodctoGe);

                header('Content-Type: application/json');
                echo (json_encode($listaPro));

            }
        }

    }
    
}


/*echo"<hr>";
foreach ($listaPro as $prodctoGe)
{
    echo "<br>";
    echo "ID: " .$prodctoGe->idProducto;
    echo "<br>";
    echo "nombre: " .$prodctoGe->nombre;
    echo "<br>";
    echo "descripcion: " .$prodctoGe->descripcion;
    echo "<br>";
    echo "cantidad: " .$prodctoGe->cantidad;
    echo "<br>";
    echo "precio: " .$prodctoGe->precio;
    echo "<br>";
    echo "imagen: " .$prodctoGe->imagen;
    echo "<br>";
    echo"<hr>";
}*/

?>