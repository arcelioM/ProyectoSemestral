<?php

namespace model;

use model\Estado;
use model\Categoria;
class Producto{
    private ?int $idProducto;

    private ?string $nombre;

    private ?string $descripcion;

    private ?Categoria $categoriaId;

    private ?int $cantidad;

    private ?float $precio;

    private ?float $precioProveedor;

    private ?string $imagen;

    private ?Estado $estadoId;

    private $fechaCreacion;

    public function __construct(int $idProducto=0,string  $nombre="",string  $descripcion="", Categoria $categoriaId=null,int $cantidad=0,float $precio=0,float $precioProveedor=0,string $imagen="",Estado $estadoId=null, $fechaCreacion=null){
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoriaId = $categoriaId;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->precioProveedor = $precioProveedor;
        $this->imagen = $imagen;
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
