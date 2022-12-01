<?php

namespace model;

use model\Estado;

class Categoria{
    private ?int $idCategoria;

    private ?string $nombre;

    private ?Estado $estadoId;

    private  $fechaCreacion;

    public function __construct(int $idCategoria=0, string $nombre="",Estado $estadoId=null, string $fechaCreacion=null)
    {
        $this->idCategoria = $idCategoria;
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
