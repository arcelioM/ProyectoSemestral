CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_actualizarUsuario`(
	IN idUsuario INT,IN usuario VARCHAR(30),IN nombre VARCHAR(30), IN apellido VARCHAR(30),
    IN contraseñaA VARCHAR(200),IN nuevaContraseña VARCHAR(200) ,IN email VARCHAR(50),IN imagen VARCHAR(75),
    IN idDireccion INT,IN idCorregimiento INT,
    IN direcionEspecifica VARCHAR(40),IN telefono1 INT,
    IN telefono2 INT, IN fechaNacimiento VARCHAR(30)
)
BEGIN
	
    DECLARE contraseñaO VARCHAR(200) DEFAULT "";
    DECLARE idUsuarioExits INT DEFAULT 0;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION, NOT FOUND, SQLWARNING
    BEGIN
        ROLLBACK;
        SELECT  0 as result;
    END;

    START TRANSACTION;
		SET idUsuarioExits = (SELECT count(id_usuario) FROM usuario WHERE id_usuario=idUsuario);
		IF(idUsuarioExits=0) THEN
			SIGNAL SQLSTATE '02001' SET MYSQL_ERRNO = ER_SIGNAL_NOT_FOUND;
        END IF;
        
        UPDATE direccion SET corregimiento_id=idCorregimiento,direccion_especifica=direcionEspecifica 
        WHERE id_direccion =  idDireccion;
        
        UPDATE usuario SET usuario_nombre=usuario,nombre =nombre,apellido = apellido, email=email,telefono_1=telefono1,telefono_2=telefono2,fecha_nacimiento=fechaNacimiento
        WHERE id_usuario=idUsuario;
        SET contraseñaO =(SELECT contraseña FROM usuario  WHERE id_usuario = idUsuario);
        
        IF contraseñaO=contraseñaA THEN
			UPDATE usuario SET contraseña=nuevaContraseña WHERE id_usuario = idUsuario;
        END IF;
		
        SELECT 1 as result;
    COMMIT;
END