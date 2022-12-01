<?php

namespace service\usuario;

use dao\usuario\DaoUsuarioImpl;
use model\Usuario;

class ServiceUsuarioImpl{
    private DaoUsuarioImpl $usuarioDao;

    public function __construct(DaoUsuarioImpl $usuarioDao)
    {
        $this->usuarioDao = $usuarioDao;
    }

    public function validarUsuario(array $data){
        if($data["email"]==null || $data["email"]=="" || $data["pass"]==null || $data["pass"]==""){
            $respuesta = array(
                "valor"=>0,
                "mensaje"=>"datos no validos",
                "usuario"=>[]
            );
        }

        $usuario = new Usuario(email:$data["email"],contraseña:$data["pass"]);

        $result = $this->usuarioDao->validateUser($usuario);

        
        if($result===null){
            $respuesta = array(
                "valor"=>0,
                "mensaje"=>"Usuario no encontrado",
                "usuario"=>[]
            );
        }else{
            $respuesta= array(
                "valor"=>1,
                "mensaje"=>"usuario correcto",
                "usuarios"=>$result
            );
        }

        return $respuesta;
    }

    
}
