CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_obtenerProductosFactura`(
	IN idPedidoArg INT
)
BEGIN
	SELECT * FROM pedidoproducto WHERE pedido_id = idPedidoArg;
END