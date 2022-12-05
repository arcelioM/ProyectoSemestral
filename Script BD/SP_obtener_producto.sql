CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_obtenerProductos`(
	IN idUsuarioRolArg INT, IN idCategoriaArg INT
)
BEGIN
	DECLARE validateRol INT DEFAULT 0;
    
    SELECT  IF(rol_id is NULL ,0,rol_id) INTO validateRol FROM usuarioRol  WHERE id_usuarioRol = idUsuarioRolArg;
    
    IF validateRol = 1 THEN 
		SELECT id_producto as idProducto,nombre,descripcion,cantidad,precio_provedor as precio,imagen FROM producto WHERE categoria_id = idCategoriaArg; 
    ELSEIF validateRol = 2 THEN
		SELECT id_producto as idProducto,nombre,descripcion,cantidad, precio,imagen FROM producto WHERE categoria_id = idCategoriaArg; 
    END IF;

END