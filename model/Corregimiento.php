<?php

namespace model;

use model\Estado;
use model\Distrito;
class Corregimiento{
    private ?int $idCorregimiento;

    private ?string $nombre;

    private ?Distrito $distritoId;

    private ?Estado $estadoId;

    public function __construct(int $idCorregimiento=0,string $nombre="",Distrito $distritoId=null,Estado $estadoId=null)
    {
        $this->idCorregimiento = $idCorregimiento;
        $this->nombre = $nombre;
        $this->distritoId = $distritoId;
        $this->estadoId = $estadoId;
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
