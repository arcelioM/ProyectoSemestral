<?php

namespace model;

use model\Pedido;
use model\Estado;
class Factura{
    private ?int $idFactura;

    private ?Pedido $pedidoId;

    private ?float $subTotal;

    private ?float $itbms;

    private ?float $total;

    private ?Estado $estadoId;

    private ?string $detalleEnvio;

    private $fechaCreacion;

    public function __construct(int $idFactura=0,Pedido $pedidoId=null,float $subTotal=0,float $itbms=0,float $total=0,Estado $estadoId=null,string $detalleEnvio="", $fechaCreacion=null)
    {
        $this->idFactura = $idFactura;
        $this->pedidoId = $pedidoId;
        $this->subTotal = $subTotal;
        $this->itbms = $itbms;
        $this->total = $total;
        $this->estadoId = $estadoId;
        $this->detalleEnvio = $detalleEnvio;
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
