-- Crear base de datos
CREATE DATABASE IF NOT EXISTS attendance;

-- Seleccionar la base de datos
USE attendance;

-- Crear tabla cargo
CREATE TABLE cargo(
  ID_CARGO INT AUTO_INCREMENT NOT NULL,
  NOMBRE_CARGO VARCHAR(100) NOT NULL,
  PRIMARY KEY(ID_CARGO)
);

-- Crear tabla departamento
CREATE TABLE departamento(
  ID_DEPARTAMENTO INT AUTO_INCREMENT NOT NULL,
  NOMBRE_DEPARTAMENTO VARCHAR(100) NOT NULL,
  PRIMARY KEY(ID_DEPARTAMENTO)
);

-- Crear tabla empleado
CREATE TABLE empleado(
  ID_EMPLEADO INT AUTO_INCREMENT NOT NULL,
  DNI INT NOT NULL,
  NOMBRE VARCHAR(150) NOT NULL,
  DEPARTAMENTO INT NOT NULL,
  CARGO INT NOT NULL,
  ACTIVO BIT(1) NOT NULL,
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