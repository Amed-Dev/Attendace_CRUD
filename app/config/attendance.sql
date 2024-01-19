-- Crear base de datos
CREATE DATABASE IF NOT EXISTS attendance;

-- Seleccionar la base de datos
USE attendance;

-- Crear tabla departamento
CREATE TABLE departamento(
  ID_DEPARTAMENTO INT AUTO_INCREMENT NOT NULL,
  NOMBRE_DEPARTAMENTO VARCHAR(100) NOT NULL,
  PRIMARY KEY(ID_DEPARTAMENTO)
);
-- Insertar los departamentos de la empresa por defecto
INSERT INTO departamento (NOMBRE_DEPARTAMENTO) VALUES ('Recursos Humanos (RRHH)'), 
('Finanzas y Contabilidad'),
('Operaciones de TI'),
('Seguridad de la Información');

-- Crear tabla cargo
CREATE TABLE cargo(
  ID_CARGO INT AUTO_INCREMENT NOT NULL,
  NOMBRE_CARGO VARCHAR(100) NOT NULL,
  DEPARTAMENTO INT NOT NULL,
  PRIMARY KEY(ID_CARGO),
  FOREIGN KEY (DEPARTAMENTO) REFERENCES departamento(ID_DEPARTAMENTO)
);
-- Insertar los cargos de la empresa por defecto
INSERT INTO cargo (NOMBRE_CARGO, DEPARTAMENTO) VALUES ('Gerente de Recursos Humanos', 1),
('Especialista en Selección y Contratación', 1),
 ('Analista de Recursos Humanos', 1),
('Especialista en Desarrollo Organizacional', 1),
('Asesor Legal Laboral', 1),
('Asistente de Recursos Humanos', 1);

INSERT INTO cargo (NOMBRE_CARGO, DEPARTAMENTO) VALUES ('Director Financiero (CFO)', 2),
('Contador Jefe (Controller)', 2),
('Contador Senior', 2),
('Analista Financiero', 2),
('Especialista en Impuestos', 2),
('Tesorero', 2),
('Auxiliar Administrativo Financiero', 2);

INSERT INTO cargo (NOMBRE_CARGO, DEPARTAMENTO) VALUES ('Director de Tecnologías de la Información (CTO)', 3),
('Administrador de Sistemas', 3),
('Ingeniero de Redes', 3),
('Desarrollador de Software', 3),
('Especialista en Seguridad Informática', 3);

INSERT INTO cargo (NOMBRE_CARGO, DEPARTAMENTO) VALUES ('Jefe de Seguridad de la Información', 4),
('Oficial de Seguridad de la Información', 4),
('Especialista en Monitoreo de Alarmas', 4),
('Investigador de Seguridad de la Información', 4),
('Especialista en Tecnología de Seguridad de la Información', 4);


-- Crear tabla empleado
CREATE TABLE empleado(
  ID_EMPLEADO INT AUTO_INCREMENT NOT NULL,
  DNI INT NOT NULL,
  NOMBRE VARCHAR(150) NOT NULL,
  DEPARTAMENTO INT NOT NULL,
  CARGO INT NOT NULL,
  ACTIVO BIT(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (ID_EMPLEADO),
  FOREIGN KEY (DEPARTAMENTO) REFERENCES departamento(ID_DEPARTAMENTO)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  FOREIGN KEY (CARGO) REFERENCES cargo(ID_CARGO)
);

-- Crear tabla estado_asistencia
CREATE TABLE estado_asistencia(
  ID INT AUTO_INCREMENT NOT NULL,
  ESTADO VARCHAR(30) NOT NULL,
  PRIMARY KEY (ID)
);

-- Crear tabla asistencia
CREATE TABLE asistencia(
  ID_ASISTENCIA INT AUTO_INCREMENT NOT NULL,
  ID_EMPLEADO INT NOT NULL,
  FECHA DATETIME NOT NULL DEFAULT NOW(),
  ID_ESTADO INT NOT NULL,
  PRIMARY KEY(ID_ASISTENCIA),
  FOREIGN KEY(ID_EMPLEADO) REFERENCES empleado(ID_EMPLEADO) 
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  FOREIGN KEY(ID_ESTADO) REFERENCES estado_asistencia(ID) 
)