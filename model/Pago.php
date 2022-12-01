<?php

namespace model;

class Pago{
    private ?int $idPago;

    private ?int $noTarjeta;

    private ?float $cantidad;

    private ?Estado $estadoId;

    private $fechaCreacion;

    public function __construct(int $idPago=0,int $noTarjeta=0,float $cantidad=0,Estado $estadoId=null, $fechaCreacion=null)
    {
        $this->idPago = $idPago;
        $this->noTarjeta = $noTarjeta;
        $this->cantidad = $cantidad;
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
