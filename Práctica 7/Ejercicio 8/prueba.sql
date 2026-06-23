-- Ejercicio 8: Base de datos prueba
CREATE DATABASE IF NOT EXISTS prueba
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE prueba;

CREATE TABLE IF NOT EXISTS buscador (
    id       INT          PRIMARY KEY AUTO_INCREMENT,
    canciones VARCHAR(200) NOT NULL
);

-- Canciones de prueba
INSERT INTO buscador (canciones) VALUES
    ('Bohemian Rhapsody - Queen'),
    ('Hotel California - Eagles'),
    ('Stairway to Heaven - Led Zeppelin'),
    ('Imagine - John Lennon'),
    ('Smells Like Teen Spirit - Nirvana'),
    ('Yesterday - The Beatles'),
    ('Like a Rolling Stone - Bob Dylan'),
    ('Purple Haze - Jimi Hendrix'),
    ('Back in Black - AC/DC'),
    ('Wonderwall - Oasis');
