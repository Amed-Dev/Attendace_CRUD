-- crear base de datos
CREATE DATABASE attendance;

-- crear la tabla trabajador
CREATE TABLE trabajador(
  ID_TRABAJADOR INT AUTO_INCREMENT NOT NULL,
  NOMBRE VARCHAR(150) NOT NULL,
  SECTOR_TRABAJO  VARCHAR(150) NOT NULL,
  CARGO VARCHAR(70) NOT NULL,
  ID_ASISTENCIA INT NOT NULL,
  PRIMARY KEY (ID_TRABAJADOR)
  FOREIGN KEY (ID_ASISTENCIA) REFERENCES asistencia_estado(ID)
);
-- seleccionar los campos de la tabla trabajador
SELECT * FROM trabajador;

-- crear tabla asistencia_estado
CREATE TABLE asistencia_estado (
  ID INT AUTO_INCREMENT NOT NULL,
  ESTADO VARCHAR(30) NOT NULL,
  PRIMARY KEY (ID)
);
-- seleccionar campos de la tabla asistencia_estado
SELECT * FROM asistencia_estado;
