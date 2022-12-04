<?php

namespace model;
use model\Estado;
use model\Provincia;
class Distrito{
    private ?int $idDistrito;

    private ?string $nombre;

    private ?Provincia $provinciaId;

    private ?Estado $estadoId;

    public function __construct(int $idDistrito=0,string $nombre="",Provincia $provinciaId=null, Estado $estadoId=null)
    {
        $this->idDistrito = $idDistrito;
        $this->nombre = $nombre;
        $this->provinciaId = $provinciaId;
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
