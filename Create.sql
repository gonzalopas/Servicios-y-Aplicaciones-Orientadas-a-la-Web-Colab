CREATE DATABASE IF NOT EXISTS world_rowing_results;
USE world_rowing_results;

CREATE TABLE IF NOT EXISTS competiciones (
    id_competicion INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    ubicacion VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS eventos (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    id_competicion INT,
    nombre_evento VARCHAR(255) NOT NULL,
    distancia INT NOT NULL,
    FOREIGN KEY (id_competicion) REFERENCES competiciones(id_competicion)
);

CREATE TABLE IF NOT EXISTS deportistas (
    id_deportista INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    pais VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS resultados (
    id_resultado INT AUTO_INCREMENT PRIMARY KEY,
    id_evento INT,
    id_deportista INT,
    tiempo VARCHAR(50) NOT NULL,
    posicion INT NOT NULL,
    FOREIGN KEY (id_evento) REFERENCES eventos(id_evento),
    FOREIGN KEY (id_deportista) REFERENCES deportistas(id_deportista)
);

CREATE TABLE IF NOT EXISTS mensajes_contacto (
    id_mensaje INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

