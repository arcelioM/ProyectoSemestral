<?php

namespace model;

use model\Corregimiento;
use model\Estado;
class Direccion{
    private ?int $idDireccion;

    private ?Corregimiento $corregimientoId;

    private ?string $direccionEspecifica;

    private ?Estado $estadoId;

    public function __construct(int $idDireccion=0,Corregimiento $corregimientoId=null,string $direccionEspecifica="",Estado $estadoId=null)
    {
        $this->idDireccion = $idDireccion;
        $this->corregimientoId = $corregimientoId;
        $this->direccionEspecifica = $direccionEspecifica;
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
