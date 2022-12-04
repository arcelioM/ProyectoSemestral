<?php

namespace dao\pedido;

use dao\connection\IConnection;
use model\Pedido;
use PDO;
use PDOException;
use util\Log;

class DaoPedidoImpl{

    private IConnection $connection;
	public function __construct(IConnection $connection)
	{
		$this->connection = $connection;
	}

    public function obtenerPedidosRealizados(Pedido $pedido):?array{

		try{
			Log::write("INICIANDO SELECT PEDIDOS","SELECT");
			$query = "CALL SP_pedidoRealizados(?,?,?)";
            $execute = $this->connection->getConnection()->prepare($query);

            $execute->bindParam(1,$pedido->usuarioRolId->idUsuarioRol,PDO::PARAM_INT);
            $execute->bindParam(2,$pedido->estadoId->idStado,PDO::PARAM_INT);
            $execute->bindParam(3,$pedido->tipoPedidoId->idTipoPedido,PDO::PARAM_INT);

            
            $execute->execute();
			$result = $execute->fetchAll(PDO::FETCH_ASSOC);
            $execute->closeCursor();

            
            if(isset($result[0]["result"])){
                return null;
            }
            
            return $result;

		}catch(PDOException $e){
			Log::write("dao\peido\DaoPedidoImpl", "ERROR");
            Log::write("ARCHIVO: " . $e->getFile() . " | lINEA DE ERROR: " . $e->getLine() . " | MENSAJE" . $e->getMessage(), "ERROR");
            return null;
		}
    }

}
