<?php

namespace service\usuario;

use dao\usuario\DaoUsuarioImpl;
use model\Corregimiento;
use model\Direccion;
use model\Estado;
use model\Rol;
use model\Usuario;
use util\Log;

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

    public function obtenerPorId(array $data){

        $respuesta = "";
        foreach($data as $value){
            if( empty($value) ){
                $respuesta = [
                    "valor"=>0,
                    "usuario"=>null
                ];

                return $respuesta;
            }
        }

        $usuario = new Usuario($data["idUsuario"]);

        $result = $this->usuarioDao->obtenerPorId($usuario);

        if(!empty($result)){
            $respuesta = [
                "valor"=>1,
                "usuario"=>$result[0]
            ];

        }else{
            $respuesta = [
                "valor"=>0,
                "usuario"=>null
            ];
        }

        
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


        if(empty($data["idUsuario"]) || empty($data["usuario"]) || empty($data["nombre"]) || empty($data["apellido"]) || empty($data["email"]) || empty($data["telefono1"]) || empty($data["telefono2"]) || empty($data["fechaNacimiento"]) ){
            $respuesta = [
                "valor"=>0,
                "mensaje"=>"datos no validos"
            ];
            return $respuesta;

        }

        $usuario = new Usuario(idUsuario:$data["idUsuario"]);
        $usuario->usuarioNombre = $data["usuario"];
        $usuario->nombre = $data["nombre"];
        $usuario->apellido = $data["apellido"];
        $usuario->email = $data["email"];
        $usuario->contraseña = $data["contraseñaActual"];
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


    public function cambiarEstado(array $data){
        if(empty($data["idUsuario"]) || empty($data["idEstado"])){
            $respuesta = [
                "valor" => 0,
                "mensaje" => "Datos no validos"
            ];
            http_response_code(400);
            return $respuesta;
        }

        $usuario = new Usuario(idUsuario:$data["idUsuario"],estadoId: new Estado(idStado:$data["idEstado"]));

        $result = $this->usuarioDao->cambiarEstado($usuario);

        if($result==1){
            $respuesta = [
                "valor" => $result,
                "mensaje" => "Actualizacion exitosa"
            ];
            return $respuesta;
        }else{
            $respuesta = [
                "valor" => $result,
                "mensaje" => "Actualizacion fallida"
            ];

            return $respuesta;
        }
    }


    public function obtenerUsuarioPorNombre(array $data){
        
        if(empty($data["nombre"])){
            $respuesta = array(
                "valor"=>0,
                "mensaje"=>"datos no validos",
                "usuario"=>[]
            );

            return $respuesta;
        }

        $result = $this->usuarioDao->getByNombre($data["nombre"]);

        if(empty($result)){
            $respuesta = array(
                "valor"=>0,
                "mensaje"=>"datos no validos",
                "usuario"=>[]
            );

            return $respuesta;
        }else{
            $respuesta = array(
                "valor"=>1,
                "mensaje"=>"Usuarios encontrados",
                "usuarios"=>$result
            );

            return $respuesta;
        }
        
    }

    
}
