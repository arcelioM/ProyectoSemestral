<?php

namespace dao\usuario;

use dao\connection\IConnection;
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

    public function validateUser(Usuario $usuario):?array{

		try{
			Log::write("INICIANDO VALIDACION DE USUARIO","SELECT");
			$query = "CALL sp_validarUsuario(?,?)";
            $execute = $this->connection->getConnection()->prepare($query);

            $execute->bindParam(1,$usuario->email,PDO::PARAM_STR);
            $execute->bindParam(2,$usuario->contraseña,PDO::PARAM_INT);
            
            $execute->execute();
			$result = $execute->fetchAll(PDO::FETCH_ASSOC);
            $execute->closeCursor();

            
            if(isset($result[0]["result"])){
                return null;
            }
            
            return $result;

		}catch(PDOException $e){
			Log::write("dao\depotDepartment\DaoDepotDepartmentImpl", "ERROR");
            Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
            return null;
		}
    }
}
