<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);


$response=array();
$result=array();
$resultFin=array();
$recorrido= array();


$srcJSON= '
{
	"valor":1,
	"mensaje":"Usuario correcto",
  "usuarios":[
    {
      "idUsuario": 1,
      "nombre":"Arcelio",
      "apellido":"Montezuma",
      "imagen":"/imagenes/admin3.gif",
      "rol":[
				{
					"nombre":"cliente"
				}
      ],
			"idEstado": "1"
    },
    {
      "idUsuario": 2,
      "nombre":"Larissa",
      "apellido":"Monterrey",
      "imagen":"/imagenes/opcion57.gif",
      "rol":[
				{
					"nombre":"cliente"
				},
        {
					"nombre":"administrador"
				}
      ],
			"idEstado": "2"
    },
    {
			"idUsuario": 3,
      "nombre":"Noriiel",
      "apellido":"Montezuma",
      "imagen":"/imagenes/admin4.gif",
      "rol":[
				{
					"nombre":"cliente"
				},
				{
					"nombre":"administrador"
				}
      ],
			"idEstado": "1"
    },
    {
      "idUsuario": 4,
      "nombre":"Geovanna",
      "apellido":"Pitti",
      "imagen":"/imagenes/opcion91.gif",
      "rol":[
				{
					"nombre":"cliente"
				}
      ],
			"idEstado":"2"
    },
    {
      "idUsuario": 5,
      "nombre":"Geovanny",
      "apellido":"Pitti",
      "imagen":"/imagenes/opcion95.gif",
      "rol":[
				{
					"nombre":"cliente"
				},
				{
					"nombre":"administrador"
				}
      ],
			"idEstado": "1"
    }
  ]
}';

$JasonPedido=array();
$JasonPedidoFinal=array();
$JasonPedido= json_decode($srcJSON);
$response=$JasonPedido->usuarios;


/*echo"<hr>";
foreach ($response as $userTotal) {
    echo "<br>";
    echo "idUsuario: " .$userTotal->idUsuario;
    echo "<br>";
    echo "nombre / Apellido: " .$userTotal->nombre." ".$userTotal->apellido;
    echo "<br>";
    echo "imagen : " .$userTotal->imagen;
    echo "<br>";
    echo "tipoPedido: " .$userTotal->imagen;
    echo "<br>";
    $userConter=0; 
    foreach ($userTotal->rol as $nombre) {
      $userConter=$userConter+1;
    }
    if($userConter>1){
      echo "Rol: Cliente/Administrador" ;
      echo "<br>"; 
    }else{
      echo "Rol: Cliente";
      echo "<br>";
    } 
    echo "estado: " .$userTotal->idEstado;
    echo"<hr>";
}*/


//$response= "Eliminado";
header('Content-Type: application/json');
echo(json_encode($response));
//echo $JasonPedidoFinal;



?>