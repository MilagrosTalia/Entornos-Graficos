-- Ejercicio 7: Base de datos Compras
CREATE DATABASE IF NOT EXISTS Compras
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE Compras;

CREATE TABLE IF NOT EXISTS catalogo (
    id       INT                   PRIMARY KEY AUTO_INCREMENT,
    producto VARCHAR(100)          NOT NULL,
    precio   DECIMAL(9,2)          NOT NULL
);


INSERT INTO catalogo (producto, precio) VALUES
    ('Notebook',  35000),
    ('Mouse Inalámbrico',  5000),
    ('Teclado',    10000),
    ('Monitor',         16000.00),
    ('Auriculares', 50000),
    ('Mochila',        7000);
