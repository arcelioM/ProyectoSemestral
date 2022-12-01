<?php

namespace model;

use model\Direccion;
use model\Estado;
class Usuario{
    private ?int $idUsuario;

    private ?string $usuarioNombre;

    private ?string $nombre;

    private ?string $apellido;

    private ?string $contraseña;

    private ?string $email;

    private ?string $imagen;

    private ?Direccion $direccionId;

    private ?int $telefono1;

    private ?int $telefono2;

    private $fechaNacimiento;

    private ?Estado $estadoId;

    private $fechaCreacion;

    public function __construct(int $idUsuario=0,string $usuarioNombre="",string $nombre="",string $apellido="",string $contraseña="",string $email="",string $imagen="",Direccion $direccionId=null,int $telefono1=0,int $telefono2=0, $fechaNacimiento=null,Estado $estadoId=null, $fechaCreacion=null)
    {
        $this->idUsuario = $idUsuario;
        $this->usuarioNombre = $usuarioNombre;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->contraseña = $contraseña;
        $this->email = $email;
        $this->imagen = $imagen;
        $this->direccionId = $direccionId;
        $this->telefono1 = $telefono1;
        $this->telefono2 = $telefono2;
        $this->fechaNacimiento = $fechaNacimiento;
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
