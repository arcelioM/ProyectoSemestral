<?php

namespace model;

class Estado{
    private ?int $idStado;

    private ?string $nombre;

    public function __construct(int $idStado=0, string $nombre="")
    {
        $this->idStado = $idStado;
        $this->nombre = $nombre;
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
