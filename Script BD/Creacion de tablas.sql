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