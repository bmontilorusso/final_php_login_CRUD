/* ==================================================
Inicialización de la Base de datos del proyecto.
Ver "README.md"
================================================== */

-- Creación de la Base de datos: --
CREATE DATABASE final_php_login_CRUD;

-- Posicionamiento en nuestra DB: --
USE final_php_login_CRUD;

-- Creación de la tabla CARGOS: --
CREATE TABLE CARGOS (
    ID_CARGOS INT(2) AUTO_INCREMENT PRIMARY KEY,
    DETALLE VARCHAR(100) NOT NULL
);

-- Inserción de CARGOS: --
INSERT INTO CARGOS (ID_CARGOS, DETALLE) VALUES
(1, 'Gestor del Automotor'),
(2, 'Productor Asesor en Seguros'),
(3, 'Gestor del Automotor y Productor Asesor en Seguros');

-- Creación de la tabla de USUARIOS: --
CREATE TABLE USUARIOS (
    ID_USUARIO INT(2) AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(100) NOT NULL,
    APELLIDO VARCHAR(100) NOT NULL,
    FECHA_NACIMIENTO DATE NOT NULL, -- OJO! Cuando insertemos tenemos que usar formato AAAA-MM-DD. --
    MAIL VARCHAR(100) NOT NULL,
    TELEFONO VARCHAR(20),
    USUARIO VARCHAR(100) NOT NULL,
    PASS VARCHAR(100) NOT NULL,
    CARGO INT(2) NOT NULL,   -- Me equivoqué y no lo puse como ID_CARGO, ni le asigné FOREIGN KEY. Lo corrijo más abajo. --
    HABILITADO varchar(2) NOT NULL            
);

-- Ajustes y/o correcciones: --
ALTER TABLE USUARIOS CHANGE CARGO ID_CARGO INT(2); -- Acá corrijo el nombre de la columna. La que me equivoqué cuando creé la TABLA. --
ALTER TABLE USUARIOS
ADD constraint RELACION_ID_CARGO
foreign key (ID_CARGO) REFERENCES CARGOS(ID_CARGOS); -- Acá le doy relación a los IDs de CARGOS (entre las tablas USUARIOS y CARGOS). --

-- INSERSIÓN de dos usuarios de prueba: --
INSERT INTO USUARIOS (ID_USUARIO, NOMBRE, APELLIDO, FECHA_NACIMIENTO, MAIL, TELEFONO, USUARIO, PASS, ID_CARGO, HABILITADO) VALUES
(1, 'Nombre Usuario 1', 'Apellido Usuario 1', '1989-06-24', 'mail_prueba_1@prueba.com', null, 'userPrueba1', 'clave1', 1,'SI'),
(2, 'Nombre Usuario 2', 'Apellido Usuario 2', '1996-06-28', 'mail_prueba_2@prueba.com', '1199998888', 'userPrueba2', 'clave2', 3,'SI'),
(3, 'Felipe', 'Pompín', '2011-06-28', 'feli_naranjoso@prueba.com', null, 'userPrueba2', 'clave3', 2,'NO');

-- Creación de la tabla Jurisdicción: --
CREATE TABLE JURISDICCION (
    ID_JURISDICCION INT(2) AUTO_INCREMENT PRIMARY KEY,
    DETALLE VARCHAR(50) NOT NULL
);

-- Insertamos algunas Provincias (las más relevantes para este Rubro): --
INSERT INTO JURISDICCION (ID_JURISDICCION, DETALLE) VALUES
(1, 'CABA'),
(2, 'GBA'),
(3, 'Santa Fe'),
(4, 'Córdoba'),
(5, 'Mendoza');

-- Creación de la tabla ESTADO_TRAMITE: --
CREATE TABLE ESTADO_TRAMITE (
    ID_ESTADO_TRAMITE INT(2) AUTO_INCREMENT PRIMARY KEY,
    DETALLE VARCHAR(150) NOT NULL
);

-- Insertamos algunos "estados": --
INSERT INTO ESTADO_TRAMITE (ID_ESTADO_TRAMITE, DETALLE) VALUES
(1, 'Ingresado'),
(2, 'Observado'),
(3, 'Facturado');

-- Creación de la tabla TRAMITES: --
CREATE TABLE TRAMITES (
    ID_TRAMITE INT(6) AUTO_INCREMENT PRIMARY KEY,
    NRO_SINIESTRO BIGINT NOT NULL,
    ASEGURADO VARCHAR(100) NOT NULL,
    VEHICULO VARCHAR(150) NOT NULL,
    DOMINIO_PATENTE VARCHAR(12) NOT NULL,
    -- Me faltó el campo de FECHA, lo agrego más adelante. --
    F15 VARCHAR(2),
    BAJA_FISCAL VARCHAR(2),
    BAJA_GNC_ENARGAS VARCHAR(2),
    ID_JURISDICCION INT(2) NOT NULL,
	ID_ESTADO_TRAMITE INT(2) NOT NULL,
    ID_USUARIO INT(2) NOT NULL,
    FOREIGN KEY (ID_JURISDICCION) REFERENCES JURISDICCION(ID_JURISDICCION),
    FOREIGN KEY (ID_ESTADO_TRAMITE) REFERENCES ESTADO_TRAMITE(ID_ESTADO_TRAMITE),
    FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS(ID_USUARIO)
    -- Me olvidé del campo IMPORTE_TRAMITE, lo agrego luego. --
);

-- Ajustes y/o correcciones: --
ALTER TABLE TRAMITES ADD COLUMN FECHA_TRAMITE DATE NOT NULL;
ALTER TABLE TRAMITES ADD COLUMN IMPORTE_TRAMITE INT(7);

-- Insertamos algunos trámites genéricos de prueba: --
INSERT INTO TRAMITES (ID_TRAMITE, NRO_SINIESTRO, ASEGURADO, VEHICULO, DOMINIO_PATENTE, F15, BAJA_FISCAL, BAJA_GNC_ENARGAS, ID_JURISDICCION, ID_ESTADO_TRAMITE, ID_USUARIO, FECHA_TRAMITE, IMPORTE_TRAMITE) VALUES
(1, 99999, 'Walter Blanco', 'Corsa Classic', 'AAA111', 'SI', null,'NO', 1, 1, 1, '2025-02-01', 30000),
(2, 88888, 'Juan Bolsa', 'Gol AB9 GLi', 'ZZZ999', null, null,'NO', 2, 1, 1, '2025-04-03', 25000),
(3, 77777, 'Cielo Blanco', 'Bora 1.8', 'AA555ZZ', 'SI', 'SI','NO', 2, 1, 2, '2025-02-18', 20000),
(4, 555000, 'José Rosas', 'Saveiro D 1.9', 'ABC123', null, 'SI','NO', 2, 2, 2, '2024-12-21', 35000),
(5, 999666, 'Walter Blanco', 'Suzuki Fun', 'ZZ007PL', 'SI', null,'NO', 3, 3, 2, '2025-04-10', 8000);

-- Fin del Script --

/* ==========================================================================
Por cualquier problema, o si querés "reiniciar" todo, ejecutá esta query:

DROP DATABASE final_php_login_crud;

Después ejecutá todo el script entero de nuevo! :)
========================================================================== */