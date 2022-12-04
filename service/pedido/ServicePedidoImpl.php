<?php

namespace service\pedido;

use dao\pedido\DaoPedidoImpl;
use model\Estado;
use model\Pedido;
use model\TipoPedido;
use model\UsuarioRol;

class ServicePedidoImpl{

    private DaoPedidoImpl $pedidoDao;

    public function __construct(DaoPedidoImpl $pedidoDao)
    {
        $this->pedidoDao = $pedidoDao;
    }

    public function obtenerPedidos(array $data){

        if(empty($data["idUsuarioRol"])){
            $respuesta = [
                "pedidos"=>[]
            ];

            return $respuesta;
        }
        $usuarioRol = new UsuarioRol(idUsuarioRol:$data["idUsuarioRol"]);
        $estado = new Estado(idStado:$data["idEstado"]);
        $tipoPedido = new TipoPedido(idTipoPedido:$data["idTipoPedido"]);

        $pedido = new Pedido(usuarioRolId:$usuarioRol,estadoId:$estado,tipoPedidoId:$tipoPedido);

        $result = $this->pedidoDao->obtenerPedidosRealizados($pedido);

        $respuesta = [
            "pedidos" => $result
        ];

        return $respuesta;
    }
}
