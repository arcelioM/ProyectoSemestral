
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Celulares y Accesorios',1,'2022-11-19 21:11:26'),(2,'Computadoras y Complementos',1,'2022-12-05 01:26:51'),(3,'Electronicos de Oficina',1,'2022-12-05 01:26:51');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corregimiento`
--

LOCK TABLES `corregimiento` WRITE;
/*!40000 ALTER TABLE `corregimiento` DISABLE KEYS */;
INSERT INTO `corregimiento` VALUES (1,'Las lomas',1,1),(2,'David',1,1),(3,'Dolega',2,1),(4,'Los Algarrobos',2,1),(5,'Bajo Boquete',3,1),(6,'Los Naranjos',3,1),(7,'Changuinola',4,1),(8,'Finca 60',4,1),(9,'Bastimento',5,1),(10,'Cauchero',5,1),(11,'Penonome',6,1),(12,'Cocle',6,1),(13,'Aguadulce',7,1),(14,'Pocri',7,1),(15,'Urraca',8,1),(16,'Los Algarrobos',8,1),(17,'Atalaya',9,1),(18,'El Barrito',9,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
INSERT INTO `direccion` VALUES (1,1,'San jose',1),(2,1,'San jose',1),(13,1,'asd',1),(36,1,'Calle san carlos',1),(37,1,'El diablito',1),(38,1,'las lomas',1),(39,1,'las lomas',1),(40,1,'las lomas',1),(41,1,'Las lomas',1),(42,1,'Las lomas',1),(43,1,'Las lomas',1),(45,1,'1',1),(46,1,'Al frente del centro de salud, san jose',1),(47,11,'sepa dios',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distrito`
--

LOCK TABLES `distrito` WRITE;
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
INSERT INTO `distrito` VALUES (1,'David',1,1),(2,'Dolega',1,1),(3,'Boquete',1,1),(4,'Changuinola',2,1),(5,'Bocas del Toro',2,1),(6,'Penonome',3,1),(7,'Aguadulce',3,1),(8,'Santiago',4,1),(9,'Atalaya',4,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'activado'),(2,'Eliminado'),(3,'En proceso'),(4,'Entregado'),(5,'Cancelado');
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
  UNIQUE KEY `pedido_id_UNIQUE` (`pedido_id`),
  KEY `FK_factura_estado_idEstado` (`estado_id`),
  KEY `FK_factura_pedido_idPedido` (`pedido_id`),
  KEY `IN_factura_fechaCreacion` (`fechaCreacion`),
  CONSTRAINT `FK_factura_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `FK_factura_pedido_idPedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,1,1.10,2.10,1.10,1,'hola','2022-11-20 18:29:56'),(2,2,1.10,2.10,1.10,1,'hola','2022-11-20 18:30:16');
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
  `estado_id` int NOT NULL DEFAULT '3',
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,1,1,1,3,'2022-11-19 20:38:09'),(2,1,1,1,4,'2022-11-19 20:38:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidoproducto`
--

LOCK TABLES `pedidoproducto` WRITE;
/*!40000 ALTER TABLE `pedidoproducto` DISABLE KEYS */;
INSERT INTO `pedidoproducto` VALUES (1,1,1,2,1,'2022-11-19 21:17:32'),(2,1,1,3,1,'2022-11-20 19:28:03');
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
  `estado_id` int NOT NULL DEFAULT '1',
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_producto`),
  KEY `FK_producto_estado_idEstado` (`estado_id`),
  KEY `FK_producto_categoria_idCategoria` (`categoria_id`),
  KEY `IN_producto_nombre` (`nombre`),
  CONSTRAINT `FK_producto_categoria_idCategoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `FK_producto_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'DataShow','Posee una definición en Full HD y una alta tasa de durabilidad',3,18,345.23,312.23,'../imagenes/dataShow.jpg',1,'2022-11-19 21:12:54'),(2,'Samsung Note 21','Ultra cámera super amolet con una capacidad de memoria mayor a 72 Gb',1,18,1230.23,983.23,'..//imagenes/samsumgNote21.jpg',1,'2022-12-05 01:31:40'),(3,'Lapto DELL- Vostro 3000','Pantalla de 18 pulgas, un SSD de 1Tb y Ram de 12 GB',2,20,734.23,698.12,'../imagenes/dellVostro3000.jpg',1,'2022-12-05 01:33:32'),(4,'Lapto DELL- Gninus 500','Pantalla de 15 pulgas, un SSD de 1Tb y Ram de 8 GB',2,10,502.23,478.12,'..//imagenes/dellGninus500.jpg',1,'2022-12-05 01:34:58'),(5,'Samsumg Tab A- 2019','Ultra cámera super amolet con una capacidad de memoria mayor a 64 Gb',1,15,250.56,201.23,'../imagenes/tabA2019.jpg',1,'2022-12-05 01:38:33'),(6,'Pizarra DashBoard','Automática y Amolet con sicronización de Bluetooth',3,10,550.56,505.23,'..//imagenes/boardSmart.jpg',1,'2022-12-05 01:40:37');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincia`
--

LOCK TABLES `provincia` WRITE;
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` VALUES (1,'Chiriqui',1),(2,'Bocas del Toro',1),(3,'Cocle',1),(4,'Veraguas',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopago`
--

LOCK TABLES `tipopago` WRITE;
/*!40000 ALTER TABLE `tipopago` DISABLE KEYS */;
INSERT INTO `tipopago` VALUES (1,'VISA',1,'2022-12-01 21:16:11');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopedido`
--

LOCK TABLES `tipopedido` WRITE;
/*!40000 ALTER TABLE `tipopedido` DISABLE KEYS */;
INSERT INTO `tipopedido` VALUES (1,'Domicilio',1,'2022-11-19 19:41:57'),(2,'Retirar Local',1,'2022-11-19 20:37:57');
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
  `imagen` varchar(75) NOT NULL,
  `direccion_id` int NOT NULL,
  `telefono_1` int NOT NULL,
  `telefono_2` int NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado_id` int NOT NULL DEFAULT '1',
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `UN_usuario_usuarioNombre` (`usuario_nombre`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `FK_usuario_estado_idEstado` (`estado_id`),
  KEY `FK_usuario_direccion_idDireccion` (`direccion_id`),
  CONSTRAINT `FK_usuario_direccion_idDireccion` FOREIGN KEY (`direccion_id`) REFERENCES `direccion` (`id_direccion`),
  CONSTRAINT `FK_usuario_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'nuliken','Arcelio','Montezuma','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','arceliomonte15@gmail.com','arcelio.jpg',1,6524232,232311223,'2000-02-09',1,'2022-11-18 23:22:29'),(2,'noriel22','noriel','melendez','5ab252b4f983434ae505be442a92027f14a6e265','asd','asd',13,234,3435,'2000-09-02',1,'2022-12-01 21:31:51'),(5,'nulikas','Arcelio','Montezuma','50efed8aa351df246e92e81cb7bd096aa56d6972','arce@gmail.com','cara.webp',36,65282,23435,'2000-09-02',1,'2022-12-02 00:47:11'),(6,'Geovy','Geovanny','Pitti','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','geovy@gmail.com','../imagenes/perra.webp',37,67341823,65234512,'2002-03-17',1,'2022-12-05 13:49:11'),(7,'Juanito','Juan','Almengor','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','juanAl@gmail.com','perfil.jpeg',38,3423823,342335,'2022-12-07',1,'2022-12-05 18:51:53'),(8,'Carmen','Carmen','Guevara','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','carmeGue@gmail.com','perfil.jpeg',39,3423823,342335,'2022-12-07',2,'2022-12-05 18:55:10'),(9,'Pablito','Pablo','Guevara','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','pabloG@gmail.com','perfil.jpeg',40,3423823,342335,'2022-12-07',1,'2022-12-05 18:56:11'),(10,'Pinito','Leonel','Garcia','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','leGarci@gmail.com','cara.webp',41,122324,23224,'2005-05-09',1,'2022-12-05 18:58:10'),(11,'Juanca','Juan carlos','Mendoza','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','juancamen@gmail.com','sad.png',42,2332238,233423,'2022-12-22',1,'2022-12-05 18:59:55'),(12,'Juanita','Juana','Miranda','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','juanmira@gmail.com','sad.png',43,2335535,3546,'2004-02-03',1,'2022-12-05 19:01:33'),(14,'12','12','12','356a192b7913b04c54574d18c28d46e6395428ab','12','sad.png',45,12,12,'2002-12-12',2,'2022-12-05 19:03:25'),(15,'Eli19','Eliseo','Morales','99800b85d3383e3a2fb45eb7d0066a4879a9dad0','elimorales@gmail.com','eli.jpg',46,67349172,64012345,'2001-06-12',1,'2022-12-06 23:50:50'),(16,'Pepito','Pepito','Morales','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','pepi@gmail.com','correo contraseña propia descubrir.jpg',47,67349123,60934123,'2001-06-11',1,'2022-12-07 04:11:22');
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
  `estado_id` int NOT NULL DEFAULT '1',
  `fechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuarioRol`),
  KEY `FK_usuarioRol_estado_idEstado` (`estado_id`),
  KEY `FK_usuarioRol_usuario_idUsuario` (`usuario_id`),
  KEY `FK_usuarioRol_rol_idRol` (`rol_id`),
  CONSTRAINT `FK_usuarioRol_estado_idEstado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `FK_usuarioRol_rol_idRol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id_rol`),
  CONSTRAINT `FK_usuarioRol_usuario_idUsuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariorol`
--

LOCK TABLES `usuariorol` WRITE;
/*!40000 ALTER TABLE `usuariorol` DISABLE KEYS */;
INSERT INTO `usuariorol` VALUES (1,1,1,1,'2022-11-18 19:31:29'),(2,1,2,1,'2022-12-01 21:31:51'),(3,2,5,1,'2022-12-02 00:47:11'),(4,1,6,1,'2022-12-05 13:49:11'),(5,2,6,1,'2022-12-05 13:49:37'),(6,2,7,1,'2022-12-05 18:51:53'),(7,2,8,1,'2022-12-05 18:55:10'),(8,2,9,1,'2022-12-05 18:56:11'),(9,2,10,1,'2022-12-05 18:58:10'),(10,2,11,1,'2022-12-05 18:59:55'),(11,2,12,1,'2022-12-05 19:01:33'),(12,2,14,1,'2022-12-05 19:03:25'),(13,2,15,1,'2022-12-06 23:50:50'),(14,1,16,1,'2022-12-07 04:11:22');
/*!40000 ALTER TABLE `usuariorol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ventas'
--
/*!50003 DROP PROCEDURE IF EXISTS `p` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `p`(IN pval INT)
BEGIN
  DECLARE specialty CONDITION FOR SQLSTATE '45000';
  DECLARE EXIT HANDLER FOR SQLEXCEPTION, NOT FOUND, SQLWARNING
    BEGIN
        ROLLBACK;
        SELECT  0 as result;
    END;
  IF pval = 0 THEN
    SELECT 1 AS "resul";
  ELSEIF pval = 1 THEN
    SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'An error occurred';
      SELECT 1 AS "resul";
  ELSEIF pval = 2 THEN
    SIGNAL specialty
      SET MESSAGE_TEXT = 'An error occurred';
  ELSE
    SIGNAL SQLSTATE '01000'
      SET MESSAGE_TEXT = 'A warning occurred', MYSQL_ERRNO = 1000;
    SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'An error occurred', MYSQL_ERRNO = 1001;
  END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_actualizarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
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
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_crearUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
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
        SELECT  0 as result;
    END;

    START TRANSACTION;
		
        INSERT INTO direccion(corregimiento_id,direccion_especifica) VALUES(idCorregimiento,direcionEspecifica);
		SET idDireccion =(SELECT LAST_INSERT_ID());
        
		INSERT INTO usuario(usuario_nombre,nombre,apellido,contraseña,email,imagen,direccion_id,telefono_1,telefono_2,fecha_nacimiento)
        VALUES(usuario,nombre,apellido,SHA1(contraseña),email,imagen,idDireccion,telefono1,telefono2,fechaNacimiento);
        SET idUsuario =(SELECT LAST_INSERT_ID());
        
        INSERT INTO usuariorol(rol_id,usuario_id) VALUES(idRol,idUsuario);
        
        SELECT 1 as result;
    COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
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
		ELSE
			ROLLBACK;
			 SET result = null;
        END IF;
	ELSE 
		 SET result = 0;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_obtenerDetallesFactura` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
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
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_obtenerProductos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_obtenerProductos`(
	IN idUsuarioRolArg INT, IN idCategoriaArg INT
)
BEGIN
	DECLARE validateRol INT DEFAULT 0;
    
    SELECT  IF(rol_id is NULL ,0,rol_id) INTO validateRol FROM usuarioRol  WHERE id_usuarioRol = idUsuarioRolArg;
    
    IF validateRol = 1  AND idCategoriaArg <> 0 THEN 
		SELECT id_producto as idProducto,nombre,descripcion,cantidad,precio_provedor as precio,imagen FROM producto WHERE categoria_id = idCategoriaArg; 
    ELSEIF validateRol = 2 AND idCategoriaArg <> 0 THEN
		SELECT id_producto as idProducto,nombre,descripcion,cantidad, precio,imagen FROM producto WHERE categoria_id = idCategoriaArg; 
    ELSEIF validateRol = 2 AND idCategoriaArg = 0 THEN
		SELECT id_producto as idProducto,nombre,descripcion,cantidad, precio,imagen FROM producto ; 
    
    ELSEIF validateRol = 1 AND idCategoriaArg = 0 THEN
		SELECT id_producto as idProducto,nombre,descripcion,cantidad, precio_provedor as precio ,imagen FROM producto ; 
    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_obtenerProductosFactura` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_obtenerProductosFactura`(
	IN idPedidoArg INT
)
BEGIN
	SELECT * FROM pedidoproducto WHERE pedido_id = idPedidoArg;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_pedidoRealizados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
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
        pr.nombre AS "provincia", e.nombre AS "estado", date_format(p.fechaCreacion, "%Y-%m-%d") AS "fechaCreacion"
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
        WHERE  p.tipoPedido_id = idTipoPedido AND p.estado_id= idEstado;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_registrarFactura` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `SP_registrarFactura`(OUT result INT,
		IN idPedidoArg INT, 
		IN subTotalArg DECIMAL(7,2),
        IN itbmsArg DECIMAL(7,2),
        IN totalArg DECIMAL(7,2),
        IN detalleEnvioArg VARCHAR(100))
BEGIN
	DECLARE validarPedido INT DEFAULT 0;
    
    # VALIDANDO QUE EL PEDIDO EXISTA
    SET validarPedido= (SELECT COUNT(id_pedido)  FROM pedido WHERE id_pedido = idPedidoArg);
    
    IF validarPedido=1 THEN
		INSERT INTO factura (pedido_id,subTotal,itbms,total,estado_id,detalle_envio)
        VALUES (idPedidoArg,subTotalArg,itbmsArg,totalArg,1,detalleEnvioArg);
        SET result = 1;
	ELSE 
		SET result = 0;
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
CREATE DEFINER=`user_ventas`@`localhost` PROCEDURE `sp_validarUsuario`( IN emailArg VARCHAR(50),IN contraseñaArg VARCHAR(200))
BEGIN
	DECLARE countRow INT DEFAULT 0;
	SET countRow = (
		SELECT COUNT(u.id_usuario) 
			FROM  usuario as u INNER JOIN usuarioRol ur ON u.id_usuario = ur.usuario_id 
			WHERE u.email=emailArg AND u.contraseña = SHA1(contraseñaArg) AND u.estado_id = 1);
   # SET countRow = (SELECT COUNT(result));
    
    IF countRow > 0 THEN
		SELECT ur.id_usuarioRol as idUsuarioRol, u.id_usuario as idUsuario,u.usuario_nombre as usuario,u.nombre as nombre,u.apellido as apellido,
		u.imagen as imagen,r.nombre as rol
			FROM  usuario as u 
            INNER JOIN usuarioRol ur ON u.id_usuario = ur.usuario_id 
            INNER JOIN rol r ON r.id_rol = ur.rol_id
			WHERE u.email=emailArg AND u.contraseña = SHA1(contraseñaArg) AND u.estado_id = 1;
	ELSE
		SELECT 1 AS result;
    END IF;
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

-- Dump completed on 2022-12-07 12:36:44
