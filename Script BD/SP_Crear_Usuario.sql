CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_crearUsuario`(
	IN usuario VARCHAR(30),IN nombre VARCHAR(30), IN apellido VARCHAR(30),
    IN contraseña VARCHAR(200), IN email VARCHAR(50),IN imagen VARCHAR(75), IN idCorregimiento INT,
    IN direcionEspecifica VARCHAR(40),IN telefono1 INT,
    IN telefono2 INT, IN fechaNacimiento VARCHAR(30), 
    IN idRol INT
)
BEGIN
	
    DECLARE idDireccion INT DEFAULT 0;
    DECLARE idUsuario INT DEFAULT 0;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION, NOT FOUND, SQLWARNING
    BEGIN
        ROLLBACK;
        SELECT 0 as result;
    END;

    START TRANSACTION;
		
        INSERT INTO direccion(corregimiento_id,direccion_especifica) VALUES(idCorregimiento,direcionEspecifica);
		SET idDireccion =(SELECT LAST_INSERT_ID());
        
		INSERT INTO usuario(usuario,nombre,apellido,contraseña,email,imagen,direccion_id,telefono_1,telefono_2,fecha_nacimiento)
        VALUES(usuario,nombre,apellido,contraseña,email,imagen,idDireccion,telefono1,telefono2,fechaNacimiento);
        SET idUsuario =(SELECT LAST_INSERT_ID());
        
        INSERT INTO usuariorol(rol_id,usuario_id) VALUES(idRol,idUsuario);
        
        SELECT 1 as result;
    COMMIT;
END