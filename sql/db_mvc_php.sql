DROP DATABASE IF EXISTS db_mvc_php;
CREATE DATABASE db_mvc_php;
USE db_mvc_php;

CREATE TABLE alumnos(
	id_alumno int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(50) NOT NULL,
  apellido varchar(50) NOT NULL,
  telefono varchar(9)
);