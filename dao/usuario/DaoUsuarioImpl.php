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
			$query = "SELECT u.id_usuario as idUsuario,u.nombre as 'nombre',apellido,imagen, e.nombre as 'estado' from usuario u 
            INNER JOIN estado e ON e.id_estado=u.estado_id order by id_usuario ASC";

			$execute = $this->connection->getConnection()->prepare($query);
			$execute->execute();

			$result = $execute->fetchAll(PDO::FETCH_ASSOC);

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
			$query = "SELECT u.usuario_nombre as usuario,u.nombre, u.apellido,u.email,CONCAT(p.nombre,'/',di.nombre,'/',co.nombre,'/',d.direccion_especifica) as direccion,u.telefono_1 as telefono1,u.telefono_2 as telefono2,u.fecha_nacimiento as fechaNacimiento,u.fechaCreacion FROM usuario u
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
            $execute->bindParam(2,$usuario->contraseña,PDO::PARAM_STR);
            
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
            $execute->bindParam(4,$usuario->contraseña,PDO::PARAM_STR);
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

    public function actualizarUsuario(Usuario $usuario,string $nuevaContraseña):?array{

        try{
			Log::write("INICIANDO ACTUALIZACION DE USUARIO","SELECT");
			$query = "CALL SP_actualizarUsuario(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $execute = $this->connection->getConnection()->prepare($query);

            $execute->bindParam(1,$usuario->idUsuario,PDO::PARAM_INT);
            $execute->bindParam(2,$usuario->usuarioNombre,PDO::PARAM_STR);
            $execute->bindParam(3,$usuario->nombre,PDO::PARAM_STR);
            $execute->bindParam(4,$usuario->apellido,PDO::PARAM_STR);
            $execute->bindParam(5,$usuario->contraseña,PDO::PARAM_STR);
            $execute->bindParam(6,$nuevaContraseña,PDO::PARAM_STR);
            $execute->bindParam(7,$usuario->email,PDO::PARAM_STR);
            $execute->bindParam(8,$usuario->imagen,PDO::PARAM_STR);
            $execute->bindParam(9,$usuario->direccionId->idDireccion,PDO::PARAM_INT);
            $execute->bindParam(10,$usuario->direccionId->corregimientoId->idCorregimiento,PDO::PARAM_INT);
            $execute->bindParam(11,$usuario->direccionId->direccionEspecifica,PDO::PARAM_STR);
            $execute->bindParam(12,$usuario->telefono1,PDO::PARAM_INT);
            $execute->bindParam(13,$usuario->telefono2,PDO::PARAM_INT);
            $execute->bindParam(14,$usuario->fechaNacimiento,PDO::PARAM_STR);

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

    private function obtenerRoles($idUsuario){
        try {
			Log::write("INICIANDO CONSULTA DE ROLES POR USUARIO | ".__NAMESPACE__." | ".basename(__FILE__), "SELECT");
			$query = "SELECT r.nombre as nombre FROM usuario u INNER JOIN usuarioRol ur ON u.id_usuario = ur.usuario_id INNER JOIN rol r ON ur.rol_id = r.id_rol
            WHERE u.id_usuario=?";

            $args = [$idUsuario];

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


}
