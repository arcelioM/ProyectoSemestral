CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_pedidoRealizados`( 
		IN idUsuarioRolArg INT, 
		IN idEstado INT,
		IN idTipoPedido INT)
BEGIN
	DECLARE userValidate INT DEFAULT 0;
    
    SELECT count(id_usuarioRol) INTO userValidate FROM usuariorol WHERE rol_id=1 AND id_usuarioRol = idUsuarioRolArg;
    
    # BUSCARA TODOS LOS PEDIDOS SI EL USUARIO TIENE PERMISOS
	IF idEstado = 0 AND idTipoPedido = 0 AND userValidate = 1 THEN
    
		SELECT p.id_pedido AS "idPedido", CONCAT(u.nombre," ",u.apellido) AS "usuario",tp.nombre AS "tipoPedido",
        pr.nombre AS "provincia", e.nombre AS "estado", p.fechaCreacion AS "fechaCreacion"
        FROM pedido p 
        INNER JOIN usuariorol ur ON p.usuarioRol_id=ur.id_usuarioRol 
        INNER JOIN usuario u ON u.id_usuario=ur.usuario_id
        INNER JOIN tipoPedido tp ON p.tipoPedido_id = tp.id_tipoPedido
        INNER JOIN estado e ON p.estado_id = e.id_estado
        INNER JOIN direccion di ON di.id_direccion = p.direccion_id
        INNER JOIN corregimiento co ON co.id_corregimiento = di.corregimiento_id
        INNER JOIN distrito dis ON dis.id_distrito = co.distrito_id
        INNER JOIN provincia pr ON pr.id_provincia = dis.provincia_id;
	# BUSCARA TODOS LOS PEDIDO FILTRADO POR ESTADO
	ELSEIF idEstado <> 0 AND idTipoPedido = 0 AND userValidate = 1 THEN
		SELECT p.id_pedido AS "idPedido", CONCAT(u.nombre," ",u.apellido) AS "nombreCompleto",tp.nombre AS "tipoPedido",
        pr.nombre AS "provincia", e.nombre AS "estado", p.fechaCreacion AS "fechaCreacion"
        FROM pedido p 
        INNER JOIN usuariorol ur ON p.usuarioRol_id=ur.id_usuarioRol 
        INNER JOIN usuario u ON u.id_usuario=ur.usuario_id
        INNER JOIN tipoPedido tp ON p.tipoPedido_id = tp.id_tipoPedido
        INNER JOIN estado e ON p.estado_id = e.id_estado
        INNER JOIN direccion di ON di.id_direccion = p.direccion_id
        INNER JOIN corregimiento co ON co.id_corregimiento = di.corregimiento_id
        INNER JOIN distrito dis ON dis.id_distrito = co.distrito_id
        INNER JOIN provincia pr ON pr.id_provincia = dis.provincia_id;
	# BUSCARA PEDIDO FILTRADO POR TIPO DE PEDIDO
    ELSEIF idEstado = 0 AND idTipoPedido <> 0 AND userValidate = 1 THEN
    
		SELECT p.id_pedido AS "idPedido", CONCAT(u.nombre," ",u.apellido) AS "nombreCompleto",tp.nombre AS "tipoPedido",
        pr.nombre AS "provincia", e.nombre AS "estado", p.fechaCreacion AS "fechaCreacion"
        FROM pedido p 
        INNER JOIN usuariorol ur ON p.usuarioRol_id=ur.id_usuarioRol 
        INNER JOIN usuario u ON u.id_usuario=ur.usuario_id
        INNER JOIN tipoPedido tp ON p.tipoPedido_id = tp.id_tipoPedido
        INNER JOIN estado e ON p.estado_id = e.id_estado
        INNER JOIN direccion di ON di.id_direccion = p.direccion_id
        INNER JOIN corregimiento co ON co.id_corregimiento = di.corregimiento_id
        INNER JOIN distrito dis ON dis.id_distrito = co.distrito_id
        INNER JOIN provincia pr ON pr.id_provincia = dis.provincia_id
        WHERE tipoPedido_id = idTipoPedido; 
	# BUSCARA PEDIDO FILTRADO POR TIPO PEDIDO Y ESTADO
	ELSEIF userValidate = 1 THEN
    
		SELECT p.id_pedido AS "idPedido", CONCAT(u.nombre," ",u.apellido) AS "nombreCompleto",tp.nombre AS "tipoPedido",
        pr.nombre AS "provincia", e.nombre AS "estado", p.fechaCreacion AS "fechaCreacion"
        FROM pedido p 
        INNER JOIN usuariorol ur ON p.usuarioRol_id=ur.id_usuarioRol 
        INNER JOIN usuario u ON u.id_usuario=ur.usuario_id
        INNER JOIN tipoPedido tp ON p.tipoPedido_id = tp.id_tipoPedido
        INNER JOIN estado e ON p.estado_id = e.id_estado
        INNER JOIN direccion di ON di.id_direccion = p.direccion_id
        INNER JOIN corregimiento co ON co.id_corregimiento = di.corregimiento_id
        INNER JOIN distrito dis ON dis.id_distrito = co.distrito_id
        INNER JOIN provincia pr ON pr.id_provincia = dis.provincia_id
        WHERE  tipoPedido_id = idTipoPedido;
    END IF;
END