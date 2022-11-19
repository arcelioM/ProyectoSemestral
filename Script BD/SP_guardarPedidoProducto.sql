CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_guardarPedidoProducto`(OUT result INT,
	 IN productoId INT, 
	 IN pedidoId INT , 
	 IN cantidadIn INT, 
	 IN estadoId INT)
BEGIN
	DECLARE cantidadDisponible INT DEFAULT 0;
    DECLARE filasAfectado INT DEFAULT 0;
    
    # BUSCANDO CANTIDAD DEL PRODUCTO DISPONIBLE
    SELECT IFNULL(cantidad,0) INTO cantidadDisponible FROM producto WHERE estado_id = 1;
    
    # VALIDAD QUE LA CANTIDAD DISPOINBLE SEA MENOR A LA CANTIDAD QUE SE DESEA COMPRAR
    IF cantidadDisponible > cantidadIn THEN
		# SE ACTUALIZA LOS DATOS DE CANTIDAD DISPONIBLES
		UPDATE producto SET cantidad = (cantidad - cantidadIn) WHERE id_producto = productoId AND estado_id = estadoId;
		SET filasAfectado = (SELECT found_rows());
        
        # VALIDA QUE SE HAYA INSERTADO EL DATO CORRECTAMENTE
        IF filasAfectado = 1 THEN
        # SE INSERTA EL PRODUCTO AL PEDIDO
			INSERT INTO pedidoProducto (producto_id,pedido_id,cantidad,estado_id) VALUES(productoId,pedidoId,cantidadIn,estadoId);
            SET result = 1;
        END IF;
    END IF;
END