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
ALTER TABLE USUARIOS CHANGE FECHA_NACIMIENTO FECHA_NACIMIENTO DATE; -- Hicimos que FACHA_NACIMIENTO sea nulleable. --

-- INSERSIÓN de dos usuarios de prueba: --
INSERT INTO USUARIOS (ID_USUARIO, NOMBRE, APELLIDO, FECHA_NACIMIENTO, MAIL, TELEFONO, USUARIO, PASS, ID_CARGO, HABILITADO) VALUES
(1, 'Aldana', 'Reale', '1996-06-28', 'mail_prueba_1@prueba.com', null, 'areale', 'facil1', 1,'SI'),
(2, 'Bruno', 'Monti', '1989-06-24', 'mail_prueba_2@prueba.com', '1199998888', 'bmonti', 'clave2', 3,'SI'),
(3, 'Felipe', 'Pompín', '2011-10-01', 'feli_naranjoso@prueba.com', null, 'Felipe', 'facil1', 2,'NO');

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
ALTER TABLE TRAMITES CHANGE VEHICULO VEHICULO VARCHAR(150); -- Hacemos que vehículo sea nulleable. --

-- Insertamos algunos trámites genéricos de prueba: --
INSERT INTO TRAMITES (ID_TRAMITE, NRO_SINIESTRO, ASEGURADO, VEHICULO, DOMINIO_PATENTE, F15, BAJA_FISCAL, BAJA_GNC_ENARGAS, ID_JURISDICCION, ID_ESTADO_TRAMITE, ID_USUARIO, FECHA_TRAMITE, IMPORTE_TRAMITE) VALUES
(1, 99999, 'Walter Blanco', 'Corsa Classic', 'AAA111', 'SI', null,'NO', 1, 1, 1, '2025-02-01', 30000),
(2, 88888, 'Juan Bolsa', 'Gol AB9 GLi', 'ZZZ999', null, null,'NO', 2, 1, 1, '2025-04-03', 25000),
(3, 77777, 'Cielo Blanco', 'Bora 1.8', 'AA555ZZ', 'SI', 'SI','NO', 2, 1, 2, '2025-02-18', 20000),
(4, 555000, 'José Rosas', 'Saveiro D 1.9', 'ABC123', null, 'SI','NO', 2, 2, 2, '2024-12-21', 35000),
(5, 999666, 'Héctor Salamanca', 'Suzuki Fun', 'ZZ007PL', 'SI', null,'NO', 3, 3, 2, '2025-04-10', 8000);

-- Algunos Usuarios genéricos más: --
INSERT INTO USUARIOS (NOMBRE, APELLIDO, FECHA_NACIMIENTO, MAIL, TELEFONO, USUARIO, PASS, ID_CARGO, HABILITADO) VALUES
('Ana', 'Martínez', '1995-11-05', 'ana.martinez@mail.com', '1122334455', 'anam', 'pass123', 2, 'SI'),
('Luis', 'Fernández', '1982-03-12', 'luis.fernandez@mail.com', '1155778899', 'luisf', 'pass123', 1, 'SI'),
('Laura', 'Sánchez', '1988-07-30', 'laura.sanchez@mail.com', '1166889900', 'lauras', 'pass123', 2, 'NO'),
('Diego', 'Ramírez', '1983-12-25', 'diego.ramirez@mail.com', '1177990011', 'diegor', 'pass123', 1, 'SI'),
('Sofía', 'Torres', '1992-05-18', 'sofia.torres@mail.com', '1188001122', 'sofiat', 'pass123', 2, 'SI'),
('Fernando', 'Gómez', '1975-04-22', 'fernando.gomez@mail.com', '1199112233', 'fernandog', 'pass123', 1, 'NO'),
('Paula', 'Díaz', '1998-08-08', 'paula.diaz@mail.com', '1100112233', 'paulad', 'pass123', 2, 'SI');

-- Algunos Trámites genéricos más: --
INSERT INTO TRAMITES (NRO_SINIESTRO, ASEGURADO, VEHICULO, DOMINIO_PATENTE, F15, BAJA_FISCAL, BAJA_GNC_ENARGAS, ID_JURISDICCION, ID_ESTADO_TRAMITE, ID_USUARIO, FECHA_TRAMITE, IMPORTE_TRAMITE) VALUES
(100004, 'Juan Pérez', 'Chevrolet Onix', 'JKL012', 'NO', 'NO', 'NO', 1, 3, 1, '2025-06-04', 70000),
(100005, 'Juan Pérez', 'Volkswagen Gol', 'MNO345', 'SI', 'SI', 'NO', 2, 2, 1, '2025-06-05', 52000),
(100006, 'Juan Pérez', 'Peugeot 208', 'PQR678', 'NO', 'NO', 'SI', 3, 1, 1, '2025-06-06', 58000),
(100010, 'María García', 'Chevrolet Onix', 'BCD890', 'NO', 'NO', 'NO', 1, 3, 2, '2025-06-04', 70500),
(100011, 'María García', 'Volkswagen Gol', 'EFG123', 'SI', 'SI', 'NO', 2, 2, 2, '2025-06-05', 52500),
(100012, 'María García', 'Peugeot 208', 'HIJ456', 'NO', 'NO', 'SI', 3, 1, 2, '2025-06-06', 58500);


-- Fin del Script --

/* ==========================================================================
Por cualquier problema, o si querés "reiniciar" todo, ejecutá esta query:

DROP DATABASE final_php_login_crud;

Después ejecutá todo el script entero de nuevo! :)
========================================================================== */