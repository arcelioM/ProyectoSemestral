<?php

namespace service\producto;

use dao\producto\DaoProductoImpl;
use model\Producto;

class ServiceProductoImpl{

    private DaoProductoImpl $productoDao;

    public function __construct(DaoProductoImpl $productoDao){
        $this->productoDao = $productoDao;
    }

    public function obtenerProductos(array $data){          
        
        if(empty($data["idUsuarioRol"])){
            return 0;
        }

        $result = $this->productoDao->obtenerProducto($data["idUsuarioRol"], $data["idCategoria"]);

        $respuesta = [
            "productos"=>$result
        ];

        return $respuesta;
    }


    public function obtenerProductoId(array $data){
        if(empty($data)){

            return 0;
        }

        $respuesta = [
            "productos" => []
        ];

        foreach($data as $value){
            $producto = new Producto(idProducto:$value->idProducto);
            $result = $this->productoDao->obtenerProductoPorId($producto);
            array_push($respuesta["productos"], $result);
        }

        return $respuesta;

    }
}
