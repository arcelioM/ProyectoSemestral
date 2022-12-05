<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);


$response=array();
$result=array();
$resultFin=array();
$recorrido= array();


$idEstadoPedido= $_GET['idEstado'];
$idTipoPedido= $_GET['idTipoPedido'];


$srcJSON='
{
    "pedidos": [
      {
        "idPedido": 1,
        "usuario": "Arcelio Montezuma",
        "tipoPedido": "Domicilio",
        "provincia": "Chiriquí",
        "estado": "En Proceso",
        "fechaCreacion": "2022-11-19"
      },
      {
        "idPedido": 2,
        "usuario": "Geovanny Pitti",
        "tipoPedido": "Domicilio",
        "provincia": "Panamá",
        "estado": "Entregado",
        "fechaCreacion": "2022-10-20"
      },
      {
        "idPedido": 3,
        "usuario": "Geovanna Pitti",
        "tipoPedido": "Domicilio",
        "provincia": "Darién",
        "estado": "Entregado",
        "fechaCreacion": "2022-12-20"
      },
      {
        "idPedido": 4,
        "usuario": "Peregrino Pitti",
        "tipoPedido": "Domicilio",
        "provincia": "Bocas del Toro",
        "estado": "Entregado",
        "fechaCreacion": "2022-12-20"
      }

    ]
  }';

$JasonPedido=array();
$JasonPedidoFinal=array();
$JasonPedido= json_decode($srcJSON);
$response=$JasonPedido->pedidos;


/*echo"<hr>";
foreach ($JasonPedidoFinal as $userTotal) {
    echo "<br>";
    echo "idPedido: " .$userTotal->idPedido;
    echo "<br>";
    echo "usuario: " .$userTotal->usuario;
    echo "<br>";
    echo "usuario : " .$userTotal->tipoPedido;
    echo "<br>";
    echo "tipoPedido: " .$userTotal->provincia;
    echo "<br>";
    echo "estado: " .$userTotal->estado;
    echo "<br>";
    echo "provincia: " .$userTotal->fechaCreacion;
    echo "<br>";
    echo"<hr>";
}*/


//$response= "Eliminado";
header('Content-Type: application/json');
echo(json_encode($response));
//echo $JasonPedidoFinal;



?>