-- crear base de datos

-- crear la tabla trabajador
CREATE TABLE trabajador(
  ID_TRABAJADOR INT AUTO_INCREMENT NOT NULL,
  NOMBRE VARCHAR(150) NOT NULL,
  SECTOR_TRABAJO  VARCHAR(150) NOT NULL, 
  ASISTIO BIT NOT NULL,
  FALTA BIT NOT NULL,
  TARDANZA BIT NOT NULL,
  PRIMARY KEY (ID_TRABAJADOR)
);
-- seleccionar los campos de la base de datos
SELECT * FROM trabajador;