<?php

namespace model;

use model\Rol;
use model\Usuario;
use model\Estado;
class UsuarioRol{
    private ?int $idUsuarioRol;

    private ?Rol $rolId;

    private ?Estado $estadoId;

    private ?Usuario $usuarioId;

    private $fechaCreacion;

    public function __construct(int $idUsuarioRol=0,Rol $rolId=null,Estado $estadoId=null,Usuario $usuarioId=null, $fechaCreacion=null)
    {
        $this->idUsuarioRol = $idUsuarioRol;
        $this->rolId = $rolId;
        $this->estadoId = $estadoId;
        $this->usuarioId = $usuarioId;
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
