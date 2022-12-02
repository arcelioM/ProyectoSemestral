<?php

namespace service\usuario;

use dao\usuario\DaoUsuarioImpl;
use model\Corregimiento;
use model\Direccion;
use model\Rol;
use model\Usuario;

class ServiceUsuarioImpl{
    private DaoUsuarioImpl $usuarioDao;

    public function __construct(DaoUsuarioImpl $usuarioDao)
    {
        $this->usuarioDao = $usuarioDao;
    }

    public function obtenerTodo(){

        $result = $this->usuarioDao->obtenerTodo();

        $respuesta = array(
            "valor"=>1,
            "mensaje"=>"Usuario encontrados",
            "usuario"=>$result
        );

        return $respuesta;
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

    public function crearUsuario(array $data){
        foreach($data as $value){
            if( empty($value) ){
                $respuesta = [
                    "valor"=>0,
                    "mensaje"=>"datos no validos"
                ];

                return $respuesta;
            }
        }

        $usuario = new Usuario();
        $usuario->usuarioNombre = $data["usuario"];
        $usuario->nombre = $data["nombre"];
        $usuario->apellido = $data["apellido"];
        $usuario->email = $data["email"];
        $usuario->contraseña = $data["contraseña"];
        $usuario->direccionId = new Direccion(corregimientoId:new Corregimiento(idCorregimiento:$data["corregimientoID"]),direccionEspecifica:$data["direcion_especifica"]);
        $usuario->telefono1 = $data["telefono1"];
        $usuario->telefono2 = $data["telefono2"];
        $usuario->fechaNacimiento = $data["fechaNacimiento"];
        $usuario->imagen = $data["imagen"];

        $rol = new Rol(idRol:$data["id_rol"]);

        $result = $this->usuarioDao->crearUsuario($usuario,$rol);

        if($result === null){
            $respuesta = [
                "valor"=>0,
                "mensaje"=>"Creacion fallida"
            ];  
            return $respuesta;
        }elseif(isset($result[0]["result"])){

            if($result[0]["result"]=="1"){
                $respuesta = [
                    "valor"=>$result[0]["result"],
                    "mensaje"=>"Creacion exitosa"
                ];

                return $respuesta;
            }else{
                $respuesta = [
                    "valor"=>$result[0]["result"],
                    "mensaje"=>"Creacion fallida"
                ]; 

                return $respuesta;
            }
            
        }
    }

    public function actualizarUsuario(array $data){
        foreach($data as $value){
            if( empty($value) ){
                $respuesta = [
                    "valor"=>0,
                    "mensaje"=>"datos no validos"
                ];
                return $respuesta;
            }
        }

        $usuario = new Usuario(idUsuario:$data["idUsuario"]);
        $usuario->usuarioNombre = $data["usuario"];
        $usuario->nombre = $data["nombre"];
        $usuario->apellido = $data["apellido"];
        $usuario->email = $data["email"];
        $usuario->contraseña = $data["contraseñaActual"];
        $usuario->direccionId = new Direccion(idDireccion:$data["idDireccion"],corregimientoId:new Corregimiento(idCorregimiento:$data["corregimientoID"]),direccionEspecifica:$data["direcion_especifica"]);
        $usuario->telefono1 = $data["telefono1"];
        $usuario->telefono2 = $data["telefono2"];
        $usuario->fechaNacimiento = $data["fechaNacimiento"];
        $usuario->imagen = $data["imagen"];

        $nuevaContraseña = $data["nuevaContraseña"];


        $result = $this->usuarioDao->actualizarUsuario($usuario,$nuevaContraseña);

        if($result === null){
            $respuesta = [
                "valor"=>0,
                "mensaje"=>"Actualizacion fallida"
            ];  
            return $respuesta;
        }elseif(isset($result[0]["result"])){

            if($result[0]["result"]=="1"){
                $respuesta = [
                    "valor"=>$result[0]["result"],
                    "mensaje"=>"Actualizacion exitosa"
                ];

                return $respuesta;
            }else{
                $respuesta = [
                    "valor"=>$result[0]["result"],
                    "mensaje"=>"Actualizacion fallida"
                ]; 

                return $respuesta;
            }
            
        }
    }

    
}
