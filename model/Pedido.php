<?php

namespace model;

use model\Estado;
use model\Usuario;
use model\TipoPedido;
use model\Direccion;
class Pedido{
    private ?int $idPedido;

    private ?Usuario $usuarioId;

    private ?TipoPedido $tipoPedidoId;

    private ?Direccion $direccionId;

    private ?Estado $estadoId;

    private $fechaCreacion;

    public function __construct(int $idPedido=0,Usuario $usuarioId=null,TipoPedido $tipoPedidoId=null,Direccion $direccionId=null,Estado $estadoId=null, $fechaCreacion=null)
    {
        $this->idPedido = $idPedido;
        $this->usuarioId = $usuarioId;
        $this->tipoPedidoId = $tipoPedidoId;
        $this->direccionId = $direccionId;
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
