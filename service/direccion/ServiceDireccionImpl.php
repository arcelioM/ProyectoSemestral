<?php

namespace service\direccion;

use dao\direccion\DaoDireccionImpl;
use model\Distrito;
use model\Provincia;

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

    public function obtenerDistritoPorProvincia(array $data){

        if(empty($data["idProvincia"])){
            $respuesta = [
                "distritos"=>[]
            ];

            return $respuesta;
        }
        $provincia = new Provincia(idProvincia:$data["idProvincia"]);

        $result = $this->direccionDao->obtenerDistritoPorProvincia($provincia);
        $respuesta = [
            "distritos" => $result
        ];

        return $respuesta;
    }

    public function obtenerCorregimientoPorDistrito(array $data){
        
        if(empty($data["idDistrito"])){
            $respuesta = [
                "corregimientos"=>[]
            ];

            return $respuesta;
        }

        $distrito = new Distrito(idDistrito:$data["idDistrito"]);

        $result = $this->direccionDao->obtenerCorregimientoPorDistrito($distrito);

        $respuesta = [
            "corregimientos" => $result
        ];

        return $respuesta;
    }
}
