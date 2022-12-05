<?php

namespace service\producto;

use dao\producto\DaoProductoImpl;

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
}
