<?php

namespace service\direccion;

use dao\direccion\DaoDireccionImpl;
class ServiceDireccionImpl{

    private DaoDireccionImpl $direccionDao;

    public function __construct(DaoDireccionImpl $direccionDao)
    {
        $this->direccionDao = $direccionDao;
    }

    public function obtenerProvincia(){

        $result = $this->direccionDao->obtenerProvincias();
        $respuesta = [
            "provincias"=>$result
        ];

        return $respuesta;
    }
}
