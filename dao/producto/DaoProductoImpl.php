<?php

namespace dao\producto;

use dao\connection\IConnection;
use model\Producto;
use PDO;
use PDOException;
use util\Log;
class DaoProductoImpl{

    private IConnection $connection;
	public function __construct(IConnection $connection)
	{
		$this->connection = $connection;
	}

    public function obtenerProducto(int $idUsuarioRol,int $idCategoria){
        
        try{
			Log::write("INICIANDO CONSULTA PRODUCTO","SELECT");
			$query = "CALL SP_obtenerProductos(?,?)";
            $execute = $this->connection->getConnection()->prepare($query);

            $execute->bindParam(1,$idUsuarioRol,PDO::PARAM_INT);
            $execute->bindParam(2,$idCategoria,PDO::PARAM_INT);
            
            $execute->execute();
			$result = $execute->fetchAll(PDO::FETCH_ASSOC);
            $execute->closeCursor();
            
            return $result;

		}catch(PDOException $e){
			Log::write("dao\producto\DaoProductoImpl", "ERROR");
            Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
            return null;
		}
    }

    public function obtenerProductoPorId(Producto $producto){
        
        try{
			Log::write("INICIANDO CONSULTA PRODUCTO","SELECT");
			$query = "SELECT id_producto,nombre,descripcion, imagen,precio FROM producto WHERE id_producto=?";
            $execute = $this->connection->getConnection()->prepare($query);

            $execute->bindParam(1,$producto->idProducto,PDO::PARAM_INT);
            
            $execute->execute();
			$result = $execute->fetchAll(PDO::FETCH_ASSOC);
            $execute->closeCursor();
            
            return $result;

		}catch(PDOException $e){
			Log::write("dao\producto\DaoProductoImpl", "ERROR");
            Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
            return null;
		}
    }
}
