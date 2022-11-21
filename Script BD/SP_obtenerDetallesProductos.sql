CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_obtenerDetallesFactura`(
	IN idFacturaArg INT
)
BEGIN
	DECLARE countFactura INT DEFAULT 0;
    
    SELECT COUNT(id_factura) INTO countFactura FROM factura WHERE id_factura = idFacturaArg;
    
    IF countFactura = 1 THEN
		SELECT f.pedido_id,f.subTotal,f.itbms,f.total,f.detalle_envio,f.fechaCreacion FROM factura f
        WHERE id_factura = idFacturaArg;
    END IF;
END