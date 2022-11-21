CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_registrarFactura`(OUT result INT,
		IN idPedidoArg INT, 
		IN subTotalArg DECIMAL(7,2),
        IN itbmsArg DECIMAL(7,2),
        IN totalArg DECIMAL(7,2),
        IN detalleEnvioArg VARCHAR(100))
BEGIN
	DECLARE validarPedido INT DEFAULT 0;
    
    # VALIDANDO QUE EL PEDIDO EXISTA
    SET validarPedido= (SELECT COUNT(id_pedido)  FROM pedido WHERE id_pedido = idPedidoArg);
    
    IF validarPedido=1 THEN
		INSERT INTO factura (pedido_id,subTotal,itbms,total,estado_id,detalle_envio)
        VALUES (idPedidoArg,subTotalArg,itbmsArg,totalArg,1,detalleEnvioArg);
        SET result = 1;
	ELSE 
		SET result = 0;
    END IF;
END