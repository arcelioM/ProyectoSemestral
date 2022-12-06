CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_actualizarUsuario`(
	IN idUsuario INT,IN usuarioArg VARCHAR(30),IN nombreArg VARCHAR(30), IN apellidoArg VARCHAR(30),
    IN contraseñaA VARCHAR(200),IN nuevaContraseña VARCHAR(200) ,IN emailArg VARCHAR(50),IN imagenArg VARCHAR(75),
	IN telefono1 INT,
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
        
        
        UPDATE usuario SET usuario_nombre=usuarioArg,nombre =nombreArg,apellido = apellidoArg, email=emailArg,telefono_1=telefono1,telefono_2=telefono2,fecha_nacimiento=fechaNacimiento
        WHERE id_usuario=idUsuario;
        SET contraseñaO =(SELECT contraseña FROM usuario  WHERE id_usuario = idUsuario);
        SELECT SHA1(contraseñaA) INTO contraseñaA;
        IF contraseñaO=contraseñaA THEN
			UPDATE usuario SET contraseña=SHA1(nuevaContraseña) WHERE id_usuario = idUsuario;
        END IF;
        
        IF imagenArg <> null OR imagenArg <> '' THEN
			UPDATE usuario SET imagen=imagenArg WHERE id_usuario = idUsuario;
        END IF;
		
        SELECT 1 as result;
    COMMIT;
END