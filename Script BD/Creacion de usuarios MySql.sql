
# CREANDO NOMBRE Y CONTRASEÑA DE USUARIO PARA LA BD
CREATE USER 'user_ventas'@'localhost' IDENTIFIED BY 'holaCOMO';

# ASIGNANDO PRIVILEGIOS
GRANT ALL PRIVILEGES ON ventas.* TO 'user_ventas'@'localhost';
FLUSH PRIVILEGES;

# USUARIO QUE UTILIZARAN LOS ADMINISTRADORES
CREATE USER 'administrador'@'localhost' IDENTIFIED BY '1234';

GRANT SELECT, INSERT, UPDATE, EXECUTE ON ventas.* TO 'administrador'@'localhost';
FLUSH PRIVILEGES;

# USUARIO QUE UTILIZARAN CLIENTES
CREATE USER 'cliente'@'localhost' IDENTIFIED BY 'hola';

GRANT EXECUTE ON ventas.* TO 'cliente'@'localhost';
GRANT SELECT  ON ventas.categoria TO 'cliente'@'localhost';
GRANT SELECT  ON ventas.corregimiento TO 'cliente'@'localhost';
GRANT SELECT,INSERT,UPDATE  ON ventas.direccion TO 'cliente'@'localhost';
GRANT SELECT  ON ventas.distrito TO 'cliente'@'localhost';
GRANT SELECT  ON ventas.estado TO 'cliente'@'localhost';
GRANT SELECT,INSERT  ON ventas.factura TO 'cliente'@'localhost';
GRANT INSERT  ON ventas.facturapago TO 'cliente'@'localhost';
GRANT INSERT  ON ventas.pago TO 'cliente'@'localhost';
GRANT SELECT,INSERT,UPDATE  ON ventas.pedido TO 'cliente'@'localhost';
GRANT SELECT,INSERT,UPDATE  ON ventas.pedidoproducto TO 'cliente'@'localhost';
GRANT SELECT  ON ventas.producto TO 'cliente'@'localhost';
GRANT SELECT  ON ventas.provincia TO 'cliente'@'localhost';
GRANT SELECT  ON ventas.tipopago TO 'cliente'@'localhost';
GRANT SELECT  ON ventas.tipopedido TO 'cliente'@'localhost';
GRANT SELECT,INSERT,UPDATE  ON ventas.usuario TO 'cliente'@'localhost';
GRANT SELECT,INSERT  ON ventas.usuariorol TO 'cliente'@'localhost';

FLUSH PRIVILEGES;