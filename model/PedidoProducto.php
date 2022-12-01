<?php

namespace model;

use model\Pedido;
use model\Producto;
use model\Estado;
class PedidoProducto{
    private ?int $idPedidoProducto;

    private ?Producto $productoId;

    private ?int $cantidad;

    private ?Pedido $pedidoId;

    private ?Estado $estadoId;

    private $fechaCreacion;

    public function __construct(int $idPedidoProducto=0,Producto $productoId=null,int $cantidad=0,Pedido $pedidoId=null,Estado $estadoId=null, $fechaCreacion=null)
    {
        $this->idPedidoProducto = $idPedidoProducto;
        $this->productoId = $productoId;
        $this->cantidad = $cantidad;
        $this->pedidoId = $pedidoId;
        $this->estadoId = $estadoId;
        $this->fechaCreacion = $fechaCreacion;
    }


    public function &__get($name){
        if(property_exists($this,$name)){
           return $this->$name;
        }
     }
 
     public function __set($name,$value){
        if(property_exists($this,$name)){
           return $this->$name=$value;
        }
     }
}
