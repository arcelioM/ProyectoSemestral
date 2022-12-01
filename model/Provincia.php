<?php

namespace model;
use model\Estado;
class Provincia{
    private ?int $idProvincia;

    private ?string $nombre;

    private ?Estado $estadoId;

    public function __construct(int $idProvincia=0,string $nombre="",Estado $estadoId=null)
    {
        $this->idProvincia = $idProvincia;
        $this->nombre = $nombre;
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
