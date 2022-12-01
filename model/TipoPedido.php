<?php

namespace model;

use model\Estado;
class TipoPedido{
    private ?int $idTipoPedido;

    private ?string $nombre;

    private ?Estado $estadoId;

    private $fechaCreacion;

    public function __construct(int $idTipoPedido=0,string $nombre="",Estado $estadoId=null, $fechaCreacion=null)
    {
        $this->idTipoPedido = $idTipoPedido;
        $this->nombre = $nombre;
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
