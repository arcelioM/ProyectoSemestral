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