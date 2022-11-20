CREATE DATABASE  IF NOT EXISTS `ventas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ventas`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ventas
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `estado_id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_categoria`),
  KEY `FK_categoria_estado_idEstado` (`estado_id`),
  KEY `IN_categoria_nombre` (`nombre`),
  CONSTRAINT `FK_categoria_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corregimiento`
--

DROP TABLE IF EXISTS `corregimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `corregimiento` (
  `id_corregimiento` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) NOT NULL,
  `distrito_id` int NOT NULL,
  `estado_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_corregimiento`),
  KEY `FK_corregimiento_distrito_id_distritos` (`distrito_id`),
  KEY `FK_corregimiento_estado_idEstado` (`estado_id`),
  CONSTRAINT `FK_corregimiento_distrito_id_distritos` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`id_distrito`),
  CONSTRAINT `FK_corregimiento_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corregimiento`
--

LOCK TABLES `corregimiento` WRITE;
/*!40000 ALTER TABLE `corregimiento` DISABLE KEYS */;
INSERT INTO `corregimiento` VALUES (1,'Las lomas',1,1);
/*!40000 ALTER TABLE `corregimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direccion` (
  `id_direccion` int NOT NULL AUTO_INCREMENT,
  `corregimiento_id` int NOT NULL,
  `direccion_especifica` varchar(40) NOT NULL DEFAULT 'no registrado',
  `estado_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_direccion`),
  KEY `FK_direccion_corregimiento` (`corregimiento_id`),
  KEY `FK_direccion_estado_idEstado` (`estado_id`),
  CONSTRAINT `FK_direccion_corregimiento` FOREIGN KEY (`corregimiento_id`) REFERENCES `corregimiento` (`id_corregimiento`),
  CONSTRAINT `FK_direccion_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
INSERT INTO `direccion` VALUES (1,1,'San jose',1);
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distrito`
--

DROP TABLE IF EXISTS `distrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distrito` (
  `id_distrito` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) NOT NULL,
  `provincia_id` int NOT NULL,
  `estado_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_distrito`),
  KEY `FK_distrito_provincia_id_provincia` (`provincia_id`),
  KEY `FK_distrito_estado_idEstado` (`estado_id`),
  CONSTRAINT `FK_distrito_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `FK_distrito_provincia_id_provincia` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distrito`
--

LOCK TABLES `distrito` WRITE;
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
INSERT INTO `distrito` VALUES (1,'David',1,1);
/*!40000 ALTER TABLE `distrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `id_estado` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'activado');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `factura` (
  `id_factura` int NOT NULL AUTO_INCREMENT,
  `pedido_id` int NOT NULL,
  `subTotal` decimal(7,2) NOT NULL,
  `itbms` decimal(7,2) NOT NULL,
  `total` decimal(7,2) NOT NULL,
  `estado_id` int NOT NULL,
  `detalle_envio` varchar(100) DEFAULT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_factura`),
  KEY `FK_factura_estado_idEstado` (`estado_id`),
  KEY `FK_factura_pedido_idPedido` (`pedido_id`),
  KEY `IN_factura_fechaCreacion` (`fechaCreacion`),
  CONSTRAINT `FK_factura_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `FK_factura_pedido_idPedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturapago`
--

DROP TABLE IF EXISTS `facturapago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facturapago` (
  `id_facturaPago` int NOT NULL AUTO_INCREMENT,
  `factura_id` int NOT NULL,
  `pago_id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_facturaPago`),
  KEY `FK_facturaPago_factura_idFactura` (`factura_id`),
  KEY `FK_facturaPago_pago_idPago` (`pago_id`),
  CONSTRAINT `FK_facturaPago_factura_idFactura` FOREIGN KEY (`factura_id`) REFERENCES `factura` (`id_factura`),
  CONSTRAINT `FK_facturaPago_pago_idPago` FOREIGN KEY (`pago_id`) REFERENCES `pago` (`id_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturapago`
--

LOCK TABLES `facturapago` WRITE;
/*!40000 ALTER TABLE `facturapago` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturapago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pago` (
  `id_pago` int NOT NULL AUTO_INCREMENT,
  `no_tarjeta` int NOT NULL,
  `cantidad` decimal(7,2) NOT NULL,
  `estado_id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pago`),
  UNIQUE KEY `no_tarjeta` (`no_tarjeta`),
  KEY `FK_pago_estado_idEstado` (`estado_id`),
  KEY `IN_pago_fechaCreacion` (`fechaCreacion`),
  CONSTRAINT `FK_pago_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `usuarioRol_id` int NOT NULL,
  `tipoPedido_id` int NOT NULL,
  `direccion_id` int NOT NULL,
  `estado_id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedido`),
  KEY `FK_pedido_estado_idEstado` (`estado_id`),
  KEY `FK_pedido_usuario_idUsuario` (`usuarioRol_id`),
  KEY `FK_pedido_direcion_idDireccion` (`direccion_id`),
  KEY `FK_pedido_tipoPedido_idTipoPedido` (`tipoPedido_id`),
  KEY `IN_pedido_fechaCreacion` (`fechaCreacion`),
  CONSTRAINT `FK_pedido_direcion_idDireccion` FOREIGN KEY (`direccion_id`) REFERENCES `direccion` (`id_direccion`),
  CONSTRAINT `FK_pedido_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `FK_pedido_tipoPedido_idTipoPedido` FOREIGN KEY (`tipoPedido_id`) REFERENCES `tipopedido` (`id_tipoPedido`),
  CONSTRAINT `FK_pedido_usuarioRol_idUsuarioRol` FOREIGN KEY (`usuarioRol_id`) REFERENCES `usuariorol` (`id_usuarioRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidoproducto`
--

DROP TABLE IF EXISTS `pedidoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidoproducto` (
  `id_pedidoProducto` int NOT NULL AUTO_INCREMENT,
  `producto_id` int NOT NULL,
  `pedido_id` int NOT NULL,
  `cantidad` int NOT NULL,
  `estado_id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedidoProducto`),
  KEY `FK_pedidoProducto_estado_idEstado` (`estado_id`),
  KEY `FK_pedidoProducto_producto_idProducto` (`producto_id`),
  KEY `FK_pedidProducto_pedido_idPedido` (`pedido_id`),
  KEY `IN_pedidoProducto_fechaCreacion` (`fechaCreacion`),
  CONSTRAINT `FK_pedidoProducto_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `FK_pedidoProducto_producto_idProducto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`),
  CONSTRAINT `FK_pedidProducto_pedido_idPedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidoproducto`
--

LOCK TABLES `pedidoproducto` WRITE;
/*!40000 ALTER TABLE `pedidoproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidoproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `categoria_id` int NOT NULL,
  `cantidad` int NOT NULL DEFAULT '0',
  `precio` decimal(7,2) NOT NULL,
  `precio_provedor` decimal(7,2) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `estado_id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_producto`),
  KEY `FK_producto_estado_idEstado` (`estado_id`),
  KEY `FK_producto_categoria_idCategoria` (`categoria_id`),
  KEY `IN_producto_nombre` (`nombre`),
  CONSTRAINT `FK_producto_categoria_idCategoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `FK_producto_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provincia` (
  `id_provincia` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) NOT NULL,
  `estado_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_provincia`),
  KEY `FK_provincia_estado_idEstado` (`estado_id`),
  CONSTRAINT `FK_provincia_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincia`
--

LOCK TABLES `provincia` WRITE;
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` VALUES (1,'Chiriqui',1);
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `estado_id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rol`),
  KEY `FK_rol_estado_idEstado` (`estado_id`),
  CONSTRAINT `FK_rol_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador',1,'2022-11-18 19:30:44'),(2,'Cliente',1,'2022-11-18 23:02:14');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipopago`
--

DROP TABLE IF EXISTS `tipopago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipopago` (
  `id_tipoPago` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `estado_id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipoPago`),
  KEY `FK_tipoPago_estado_idEstado` (`estado_id`),
  CONSTRAINT `FK_tipoPago_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopago`
--

LOCK TABLES `tipopago` WRITE;
/*!40000 ALTER TABLE `tipopago` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipopago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipopedido`
--

DROP TABLE IF EXISTS `tipopedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipopedido` (
  `id_tipoPedido` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `estado_id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipoPedido`),
  KEY `FK_tipoPedido_estado_idEstado` (`estado_id`),
  CONSTRAINT `FK_tipoPedido_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopedido`
--

LOCK TABLES `tipopedido` WRITE;
/*!40000 ALTER TABLE `tipopedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipopedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion_id` int NOT NULL,
  `telefono_1` int NOT NULL,
  `telefono_2` int NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado_id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `UN_usuario_usuarioNombre` (`usuario_nombre`),
  KEY `FK_usuario_estado_idEstado` (`estado_id`),
  KEY `FK_usuario_direccion_idDireccion` (`direccion_id`),
  CONSTRAINT `FK_usuario_direccion_idDireccion` FOREIGN KEY (`direccion_id`) REFERENCES `direccion` (`id_direccion`),
  CONSTRAINT `FK_usuario_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'nuliken','Arcelio','Apellido','1234','arceliomonte15@gmail.com',1,6524232,232311223,'2000-02-09',1,'2022-11-18 23:22:29');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariorol`
--

DROP TABLE IF EXISTS `usuariorol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuariorol` (
  `id_usuarioRol` int NOT NULL AUTO_INCREMENT,
  `rol_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `estado_id` int NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuarioRol`),
  KEY `FK_usuarioRol_estado_idEstado` (`estado_id`),
  KEY `FK_usuarioRol_usuario_idUsuario` (`usuario_id`),
  KEY `FK_usuarioRol_rol_idRol` (`rol_id`),
  CONSTRAINT `FK_usuarioRol_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `FK_usuarioRol_rol_idRol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id_rol`),
  CONSTRAINT `FK_usuarioRol_usuario_idUsuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariorol`
--

LOCK TABLES `usuariorol` WRITE;
/*!40000 ALTER TABLE `usuariorol` DISABLE KEYS */;
INSERT INTO `usuariorol` VALUES (1,1,1,1,'2022-11-18 19:31:29');
/*!40000 ALTER TABLE `usuariorol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ventas'
--
/*!50003 DROP PROCEDURE IF EXISTS `SP_guardarPedidoProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
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
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_validarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `sp_validarUsuario`(OUT result INT, IN emailArg VARCHAR(50),IN contraseñaArg VARCHAR(200))
BEGIN
	DECLARE countRow INT DEFAULT 0;
	SET result = (
		SELECT u.id_usuario,u.usuario_nombre,u.nombre,u.apellido,u.email,ur.id_usuarioRol,ur.rol_id 
			FROM  usuario as u INNER JOIN usuarioRol ur ON u.id_usuario = ur.usuario_id 
			WHERE u.email=emailArg AND u.contraseña = contraseñaArg AND u.estado_id = 1);
   # SET countRow = (SELECT COUNT(result));
    
    #IF countRow <= 0 THEN
	#	SET result = 0;
    #END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-19 19:02:02
