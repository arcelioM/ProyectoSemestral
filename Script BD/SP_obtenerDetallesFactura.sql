CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_obtenerDetallesFactura`(
	IN idFacturaArg INT
)
BEGIN
	DECLARE countFactura INT DEFAULT 0;
    
    SELECT COUNT(id_factura) INTO countFactura FROM factura WHERE id_factura = idFacturaArg;
    
    IF countFactura = 1 THEN
		SELECT f.pedido_id,f.subTotal,f.itbms,f.total,f.detalle_envio,CONCAT(u.nombre," ",u.apellido) as usuario,tp.nombre,
        CONCAT(pro.nombre,",",d.nombre,",",c.nombre,",",di.direccion_especifica) AS Direccion,f.fechaCreacion 
        FROM factura f
        INNER JOIN pedido p ON f.pedido_id = p.id_pedido
        INNER JOIN usuarioRol  ur ON p.usuarioRol_id = ur.id_usuarioRol
        INNER JOIN usuario u ON ur.usuario_id = u.id_usuario
        INNER JOIN direccion di ON di.id_direccion = u.direccion_id
        INNER JOIN corregimiento c ON c.id_corregimiento = di.corregimiento_id
        INNER JOIN distrito d ON d.id_distrito = c.distrito_id
        INNER JOIN provincia pro ON pro.id_provincia = d.provincia_id
        INNER JOIN tipopedido tp ON p.tipoPedido_id =tp.id_tipoPedido 
        WHERE id_factura = idFacturaArg;
    END IF;
END