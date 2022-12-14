<?php

namespace dao\usuario;

use dao\connection\IConnection;
use model\Rol;
use model\Usuario;
use PDO;
use PDOException;
use util\Log;

class DaoUsuarioImpl{

    private IConnection $connection;
	public function __construct(IConnection $connection)
	{
		$this->connection = $connection;
	}

    public function obtenerTodo():?array{

        try {
			Log::write("INICIANDO CONSULTA DE USUARIOS | ".__NAMESPACE__." | ".basename(__FILE__), "SELECT");
			$query = "SELECT u.id_usuario as idUsuario,u.nombre as 'nombre',apellido,imagen, u.estado_id as 'idEstado' from usuario u 
            INNER JOIN estado e ON e.id_estado=u.estado_id order by id_usuario ASC";

			$execute = $this->connection->getConnection()->prepare($query);
			$execute->execute();

			$result = $execute->fetchAll(PDO::FETCH_ASSOC);
            Log::write("INICIANDO CONSULTA DE ROLES POR USUARIO | ".__NAMESPACE__." | ".basename(__FILE__), "SELECT");
            foreach($result as $key=>$value){
                $result[$key]["rol"] = $this->obtenerRoles($value["idUsuario"]);
                //unset($result[$key]["idUsuario"]);
            }

			Log::write("CONSULTA REALIZADA EXITOSAMENTE","INFO");
			return $result;
            
		} catch (PDOException $e) {

			Log::write("dao\usuario\DaoUsuarioImpl", "ERROR");
			Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
			return array();
		}

    }

    public function obtenerPorId(Usuario $usuario):?array{

        try {
			Log::write("INICIANDO CONSULTA DE USUARIOS POR ID | ".__NAMESPACE__." | ".basename(__FILE__), "SELECT");
			$query = "SELECT u.id_usuario as idUsuario, u.usuario_nombre as usuario,u.nombre, u.apellido,u.email,CONCAT(p.nombre,'/',di.nombre,'/',co.nombre,'/',d.direccion_especifica) as direccion,u.telefono_1 as telefono1,u.telefono_2 as telefono2,u.fecha_nacimiento as fechaNacimiento,u.fechaCreacion,u.imagen FROM usuario u
            INNER JOIN direccion d ON d.id_direccion = u.direccion_id
            INNER JOIN corregimiento co ON co.id_corregimiento = d.corregimiento_id
            INNER JOIN distrito di ON di.id_distrito = co.distrito_id
            INNER JOIN provincia p ON p.id_provincia = di.provincia_id
            WHERE u.id_usuario=?";

            $args = [$usuario->idUsuario];

			$execute = $this->connection->getConnection()->prepare($query);
			$execute->execute($args);

			$result = $execute->fetchAll(PDO::FETCH_ASSOC);

			Log::write("CONSULTA REALIZADA EXITOSAMENTE","INFO");
			return $result;
		} catch (PDOException $e) {

			Log::write("dao\usuario\DaoUsuarioImpl", "ERROR");
			Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
			return array();
		}

    }
    public function validateUser(Usuario $usuario):?array{

		try{
			Log::write("INICIANDO VALIDACION DE USUARIO","SELECT");
			$query = "CALL sp_validarUsuario(?,?)";
            $execute = $this->connection->getConnection()->prepare($query);

            $execute->bindParam(1,$usuario->email,PDO::PARAM_STR);
            $execute->bindParam(2,$usuario->contrase??a,PDO::PARAM_STR);
            
            $execute->execute();
			$result = $execute->fetchAll(PDO::FETCH_ASSOC);
            $execute->closeCursor();

            
            if(!empty($result[0]["result"])){
                return null;
            }

            Log::write("VALIDACION EXITOSA", "SELECT");
            return $result;

		}catch(PDOException $e){
			Log::write("dao\usuario\DaoUsuarioImpl", "ERROR");
            Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
            return null;
		}
    }

    public function crearUsuario(Usuario $usuario,Rol $rol):?array{

        try{
			Log::write("INICIANDO CREACION DE USUARIO","SELECT");
			$query = "CALL SP_crearUsuario(?,?,?,?,?,?,?,?,?,?,?,?)";
            $execute = $this->connection->getConnection()->prepare($query);

            $execute->bindParam(1,$usuario->usuarioNombre,PDO::PARAM_STR);
            $execute->bindParam(2,$usuario->nombre,PDO::PARAM_STR);
            $execute->bindParam(3,$usuario->apellido,PDO::PARAM_STR);
            $execute->bindParam(4,$usuario->contrase??a,PDO::PARAM_STR);
            $execute->bindParam(5,$usuario->email,PDO::PARAM_STR);
            $execute->bindParam(6,$usuario->imagen,PDO::PARAM_STR);
            $execute->bindParam(7,$usuario->direccionId->corregimientoId->idCorregimiento,PDO::PARAM_INT);
            $execute->bindParam(8,$usuario->direccionId->direccionEspecifica,PDO::PARAM_STR);
            $execute->bindParam(9,$usuario->telefono1,PDO::PARAM_INT);
            $execute->bindParam(10,$usuario->telefono2,PDO::PARAM_INT);
            $execute->bindParam(11,$usuario->fechaNacimiento,PDO::PARAM_STR);
            $execute->bindParam(12,$rol->idRol,PDO::PARAM_INT);

            $execute->execute();
			$result = $execute->fetchAll(PDO::FETCH_ASSOC);
            $execute->closeCursor();

            Log::write("CREACION TERMINADA","SELECT");
            
            return $result;

		}catch(PDOException $e){
			Log::write("dao\usuario\DaoUsuarioImpl", "ERROR");
            Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
            return null;
		}
    }

    public function actualizarUsuario(Usuario $usuario,string $nuevaContrase??a):?array{

        try{
			Log::write("INICIANDO ACTUALIZACION DE USUARIO","SELECT");
			$query = "CALL SP_actualizarUsuario(?,?,?,?,?,?,?,?,?,?,?)";
            $execute = $this->connection->getConnection()->prepare($query);

            $execute->bindParam(1,$usuario->idUsuario,PDO::PARAM_INT);
            $execute->bindParam(2,$usuario->usuarioNombre,PDO::PARAM_STR);
            $execute->bindParam(3,$usuario->nombre,PDO::PARAM_STR);
            $execute->bindParam(4,$usuario->apellido,PDO::PARAM_STR);
            $execute->bindParam(5,$usuario->contrase??a,PDO::PARAM_STR);
            $execute->bindParam(6,$nuevaContrase??a,PDO::PARAM_STR);
            $execute->bindParam(7,$usuario->email,PDO::PARAM_STR);
            $execute->bindParam(8,$usuario->imagen,PDO::PARAM_STR);
            $execute->bindParam(9,$usuario->telefono1,PDO::PARAM_INT);
            $execute->bindParam(10,$usuario->telefono2,PDO::PARAM_INT);
            $execute->bindParam(11,$usuario->fechaNacimiento,PDO::PARAM_STR);

            $execute->execute();
			$result = $execute->fetchAll(PDO::FETCH_ASSOC);
            $execute->closeCursor();

            Log::write("CREACION TERMINADA","SELECT");
            
            return $result;

		}catch(PDOException $e){
			Log::write("dao\usuario\DaoUsuarioImpl", "ERROR");
            Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
            return null;
		}
    }

    public function cambiarEstado(Usuario $usuario):?int{

        try {
			Log::write("INICIANDO CAMBIO DE ESTADO PARA USUARIO | ".__NAMESPACE__." | ".basename(__FILE__), "SELECT");
			$query = "UPDATE usuario SET estado_id=? WHERE id_usuario=?";

            $args = [
                $usuario->estadoId->idStado,
                $usuario->idUsuario
            ];

			$execute = $this->connection->getConnection()->prepare($query);
			if($execute->execute($args)){
                Log::write("ACTUALIZACION REALIZADA EXITOSAMENTE","INFO");
                return 1;
            }else{
                Log::write("ACTUALIZACION REALIZADA EXITOSAMENTE","INFO");
                return 0;
            }

		} catch (PDOException $e) {

			Log::write("dao\usuario\DaoUsuarioImpl", "ERROR");
			Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
			return 0;
		}
    }

    public function getByNombre(String $nombre){
        if($nombre===null || $nombre==""){
            return null;
        }

        try{
            Log::write("INICIANDO CONSULTA | user->getByNombre()","SELECT");
            $sqlQuery="SELECT u.id_usuario as idUsuario,u.nombre as 'nombre',apellido,imagen, u.estado_id as 'idEstado' from usuario u 
            INNER JOIN estado e ON e.id_estado=u.estado_id  WHERE  u.nombre LIKE CONCAT(?, '%')  order by id_usuario ASC";
            $args=array($nombre);
            $execute=$this->connection->getConnection()->prepare($sqlQuery);
            $execute->execute($args);
            $result=$execute->fetchall(PDO::FETCH_ASSOC);
            Log::write("INICIANDO CONSULTA DE ROLES POR USUARIO | ".__NAMESPACE__." | ".basename(__FILE__), "SELECT");
            foreach($result as $key=>$value){
                $result[$key]["rol"] = $this->obtenerRoles($value["idUsuario"]);
                //unset($result[$key]["idUsuario"]);
            }

			Log::write("CONSULTA REALIZADA EXITOSAMENTE","INFO");
            Log::write("TERMINO CONSULTA","INFO");
            return $result;
        }catch(PDOException $e){
            Log::write("dao\user\DaoUsuarioImpl","ERROR");
            Log::write("ARCHIVO: ".$e->getFile()." | lINEA DE ERROR: ".$e->getLine()." | MENSAJE".$e->getMessage(),"ERROR");
            return "DATOS NO DISPONIBLE";
        }
    }


    private function obtenerRoles($idUsuario){
        try {
			
			$query = "SELECT r.nombre as nombre FROM usuario u INNER JOIN usuarioRol ur ON u.id_usuario = ur.usuario_id INNER JOIN rol r ON ur.rol_id = r.id_rol
            WHERE u.id_usuario=?";

            $args = [$idUsuario];

			$execute = $this->connection->getConnection()->prepare($query);
			$execute->execute($args);

			$result = $execute->fetchAll(PDO::FETCH_ASSOC);


			return $result;
		} catch (PDOException $e) {

			Log::write("dao\usuario\DaoUsuarioImpl", "ERROR");
			Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
			return array();
		}
    }


}
