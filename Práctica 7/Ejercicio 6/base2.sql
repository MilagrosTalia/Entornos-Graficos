-- Ejercicio 6: Base de datos base2
CREATE DATABASE IF NOT EXISTS base2
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE base2;

CREATE TABLE IF NOT EXISTS alumnos (
    codigo       INT          PRIMARY KEY AUTO_INCREMENT,
    nombre       VARCHAR(100) NOT NULL,
    codigocurso  INT          NOT NULL,
    mail         VARCHAR(150) NOT NULL UNIQUE
);

-- Datos de prueba
INSERT INTO alumnos (nombre, codigocurso, mail) VALUES
    ('Milagros Talia',  101, 'milagros@utn.edu.ar'),
    ('Olivia Fernández', 101, 'olivia@utn.edu.ar'),
    ('Carlos García',   102, 'carlos@utn.edu.ar');
