use ventas;

# TABLA QUE TENDRA INFORMACION DE LOS ESTADOS DISPONBILES 
CREATE TABLE estado(
	id_estado INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(15) NOT NULL
);

# TENDRA LOS REGISTRO DE LAS PROVINCIAS DISPONIBLES PARA DIRECCION

CREATE TABLE provincia(
    id_provincia INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(35) NOT NULL,
    estado_id INT NOT NULL DEFAULT 1,
    CONSTRAINT FK_provincia_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado)
);

# TENDRA LOS REGISTRO DE LAS DISTRITOS DISPONIBLES PARA DIRECCION

CREATE TABLE distrito(
    id_distrito INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(35) NOT NULL,
    provincia_id INT NOT NULL,
    estado_id INT NOT NULL DEFAULT 1,
    CONSTRAINT FK_distrito_provincia_id_provincia FOREIGN KEY (provincia_id) REFERENCES provincia(id_provincia),
    CONSTRAINT FK_distrito_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado)
);

# TENDRA LOS REGISTRO DE LAS CORREGIMIENTO DISPONIBLES PARA DIRECCION
CREATE TABLE corregimiento(
    id_corregimiento INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(35) NOT NULL,
    distrito_id INT NOT NULL,
    estado_id INT NOT NULL DEFAULT 1,
    CONSTRAINT FK_corregimiento_distrito_id_distritos FOREIGN KEY (distrito_id) REFERENCES distrito(id_distrito),
    CONSTRAINT FK_corregimiento_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado)
);

# TENDRA LAS DIRECCIONES DISPONIBLES 

CREATE TABLE direccion (
    id_direccion INT AUTO_INCREMENT PRIMARY KEY,
    corregimiento_id INT NOT NULL,
    direccion_especifica VARCHAR(40) DEFAULT "no registrado" NOT NULL,
    estado_id INT NOT NULL DEFAULT 1,
    CONSTRAINT FK_direccion_corregimiento FOREIGN KEY (corregimiento_id) REFERENCES corregimiento(id_corregimiento),
	CONSTRAINT FK_direccion_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado)
);

# TENDRA LOS ROLES DE USUARIO DISPONIBLE
CREATE TABLE rol(
	id_rol INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    estado_id INT NOT NULL,
    fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_rol_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado)
);

# TENDRA TODOS LOS USUARIOS QUE SE REGISTREN
CREATE TABLE usuario(
	id_usuario INT PRIMARY KEY,
    usuario_nombre VARCHAR(30) NOT NULL ,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    contraseña VARCHAR(200) NOT NULL,
    email  varchar(50) NOT NULL,
    direccion_id INT NOT NULL,
    telefono_1 INT NOT NULL,
    telefono_2 INT NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    estado_id INT NOT NULL,
    fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_usuario_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado),
    CONSTRAINT FK_usuario_direccion_idDireccion FOREIGN KEY(direccion_id) REFERENCES direccion(id_direccion),
    CONSTRAINT UN_usuario_usuarioNombre UNIQUE (usuario_nombre)
);

# TENDRA LOS ROLES DE CADA USUARIO REGISTRADO

CREATE TABLE usuarioRol(
	id_usuarioRol INT PRIMARY KEY AUTO_INCREMENT,
    rol_id INT NOT NULL,
    usuario_id INT NOT NULL,
    estado_id INT NOT NULL,
    fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_usuarioRol_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado),
    CONSTRAINT FK_usuarioRol_usuario_idUsuario FOREIGN key (usuario_id) REFERENCES usuario(id_usuario),
    CONSTRAINT FK_usuarioRol_rol_idRol FOREIGN KEY (rol_id) REFERENCES rol (id_rol)
);

# TENDRA LAS CATEGORIAS DISPONIBLES PARA LOS PRODUCTOS

CREATE TABLE categoria(
	id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    estado_id INT NOT NULL,
    fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_categoria_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado),
	INDEX IN_categoria_nombre(nombre)
);

# TENDRA PRODUCTOS DISPONIBLES PARA LA VENTA

CREATE TABLE producto(
	id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    categoria_id INT NOT NULL,
    cantidad INT NOT NULL DEFAULT 0,
    precio DECIMAL(7,2) NOT NULL,
    precio_provedor DECIMAL(7,2) NOT NULL,
    imagen VARCHAR(50) NOT NULL,
    estado_id INT NOT NULL,
    fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_producto_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado),
    CONSTRAINT FK_producto_categoria_idCategoria FOREIGN KEY (categoria_id) REFERENCES categoria(id_categoria),
    INDEX IN_producto_nombre(nombre)
);

# TENDRA LOS TIPOS DE PEDIDO QUE SE PUEDAN HACER

CREATE TABLE tipoPedido(
	id_tipoPedido INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    estado_id INT NOT NULL,
    fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_tipoPedido_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado)
);

# TENDRAS LOS PEDIDOS QUE SE HAYAN HECHO

CREATE TABLE pedido(
	id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    tipoPedido_id INT NOT NULL,
    direccion_id INT NOT NULL,
    estado_id INT NOT NULL,
    fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_pedido_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado),
    CONSTRAINT FK_pedido_usuario_idUsuario FOREIGN KEY (usuario_id) REFERENCES usuario(id_usuario),
    CONSTRAINT FK_pedido_direcion_idDireccion FOREIGN KEY (direccion_id) REFERENCES direccion(id_direccion),
    CONSTRAINT FK_pedido_tipoPedido_idTipoPedido FOREIGN KEY (tipoPedido_id) REFERENCES tipoPedido(id_tipoPedido),
    INDEX IN_pedido_fechaCreacion(fechaCreacion)
);


#  TENDRA LOS PRODUCTOS REGISTRADOR POR CADA PEDIDO

CREATE TABLE pedidoProducto(

	id_pedidoProducto INT PRIMARY KEY AUTO_INCREMENT,
    producto_id INT NOT NULL,
    pedido_id INT NOT NULL,
    cantidad INT NOT NULL,
    estado_id INT NOT NULL,
    fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_pedidoProducto_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado),
    CONSTRAINT FK_pedidoProducto_producto_idProducto FOREIGN KEY (producto_id) REFERENCES producto(id_producto),
    CONSTRAINT FK_pedidProducto_pedido_idPedido FOREIGN KEY (pedido_id) REFERENCES pedido(id_pedido),
    INDEX IN_pedidoProducto_fechaCreacion(fechaCreacion)
);

# TENDRA LOS TIPOS DE PAGOS DISPONIBLES
CREATE TABLE tipoPago(
	id_tipoPago INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    estado_id INT NOT NULL,
    fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_tipoPago_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado)
);

# TENDRA LOS PAGOS REALIZADOS 
CREATE TABLE pago(
	id_pago INT PRIMARY KEY AUTO_INCREMENT,
    no_tarjeta INT NOT NULL UNIQUE,
    cantidad DECIMAL(7,2) NOT NULL,
    estado_id INT NOT NULL,
    fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_pago_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado),
    INDEX IN_pago_fechaCreacion(fechaCreacion)
);


# TENDRAS LAS FACTURAS GENERADAS POR COMPRA

CREATE TABLE factura(
	id_factura INT PRIMARY KEY AUTO_INCREMENT,
    pedido_id INT NOT NULL,
    subTotal DECIMAL(7,2) NOT NULL,
    itbms DECIMAL(7,2) NOT NULL,
    total DECIMAL(7,2) NOT NULL,
    estado_id INT NOT NULL,
    detalle_envio VARCHAR(100),
    fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_factura_estado_idEstado FOREIGN KEY (estado_id) REFERENCES estado(id_estado),
    CONSTRAINT FK_factura_pedido_idPedido FOREIGN KEY (pedido_id) REFERENCES pedido(id_pedido),
    INDEX IN_factura_fechaCreacion(fechaCreacion)
);

# TENDRA TODOS LOS PAGOS QUE SE HAYAN HECHO PRO CADA FACTURA
CREATE TABLE facturaPago(
	id_facturaPago INT PRIMARY KEY AUTO_INCREMENT,
        factura_id INT NOT NULL,
        pago_id INT NOT NULL,
        fechaCreacion DATETIME NOT NULL DEFAULT NOW(),
        CONSTRAINT FK_facturaPago_factura_idFactura FOREIGN KEY (factura_id) REFERENCES factura(id_factura),
        CONSTRAINT FK_facturaPago_pago_idPago FOREIGN KEY (pago_id) REFERENCES pago(id_pago)
    );