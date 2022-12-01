<?php

namespace model;

use model\Factura;
use model\Pago;
class FacturaPago{
    private ?int $idFacturaPago;

    private ?Factura $facturaId;

    private ?Pago $pagoId;

    private $fechaCreacion;

    public function __construct(int $idFacturaPago=0,Factura $facturaId=null,Pago $pagoId, $fechaCreacion)
    {
        $this->idFacturaPago = $idFacturaPago;
        $this->facturaId = $facturaId;
        $this->pagoId = $pagoId;
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
