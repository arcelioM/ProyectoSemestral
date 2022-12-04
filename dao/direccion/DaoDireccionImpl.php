<?php

namespace dao\direccion;

use dao\connection\IConnection;
use model\Distrito;
use model\Provincia;
use PDO;
use PDOException;
use util\Log;

class DaoDireccionImpl{

    private IConnection $connection;
	public function __construct(IConnection $connection)
	{
		$this->connection = $connection;
	}

    public function obtenerProvincias():?array{

        try {
			Log::write("INICIANDO CONSULTA DE PROVINCIAS | ".__NAMESPACE__." | ".basename(__FILE__), "SELECT");
			$query = "SELECT id_provincia,nombre FROM provincia WHERE estado_id=1";

			$execute = $this->connection->getConnection()->prepare($query);
			$execute->execute();

			$result = $execute->fetchAll(PDO::FETCH_ASSOC);

			Log::write("CONSULTA REALIZADA EXITOSAMENTE","INFO");
			return $result;
		} catch (PDOException $e) {

			Log::write("dao\direccion\DaoDireccionImpl", "ERROR");
			Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
			return array();
		}
        
    }

	public function obtenerCorregimientoPorDistrito(Distrito $distrito)
	{
		try {
			Log::write("INICIANDO CONSULTA DE CORREGIMIENTO | ".__NAMESPACE__." | ".basename(__FILE__), "SELECT");
			$query = "SELECT id_corregimiento,nombre FROM corregimiento WHERE estado_id=1 AND distrito_id=?";

			$args = [
				$distrito->idDistrito
			];
			$execute = $this->connection->getConnection()->prepare($query);
			$execute->execute($args);

			$result = $execute->fetchAll(PDO::FETCH_ASSOC);

			Log::write("CONSULTA REALIZADA EXITOSAMENTE","INFO");
			return $result;
		} catch (PDOException $e) {

			Log::write("dao\direccion\DaoDireccionImpl", "ERROR");
			Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
			return array();
		}
	}

	public function obtenerDistritoPorProvincia(Provincia $provincia)
	{
		try {
			Log::write("INICIANDO CONSULTA DE CORREGIMIENTO | ".__NAMESPACE__." | ".basename(__FILE__), "SELECT");
			$query = "SELECT id_distrito,nombre FROM distrito WHERE estado_id=1 AND provincia_id=?";

			$args = [
				$provincia->idProvincia
			];
			$execute = $this->connection->getConnection()->prepare($query);
			$execute->execute($args);

			$result = $execute->fetchAll(PDO::FETCH_ASSOC);

			Log::write("CONSULTA REALIZADA EXITOSAMENTE","INFO");
			return $result;
		} catch (PDOException $e) {

			Log::write("dao\direccion\DaoDireccionImpl", "ERROR");
			Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
			return array();
		}
	}
}
