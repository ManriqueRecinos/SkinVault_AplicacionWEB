CREATE DATABASE bolsit;
USE bolsit;

CREATE TABLE usuarios (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  contrasenia VARCHAR(255),
  fecha_creacion TIMESTAMP 
);

CREATE TABLE IF NOT EXISTS user_skins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    champion_id VARCHAR(50) NOT NULL,
    skin_name VARCHAR(255) NOT NULL,
    skin_number INT NOT NULL,
    chromas BOOLEAN NOT NULL,
    skin_id VARCHAR(50) NOT NULL,
    TIMESTAMP TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


SELECT * FROM `user_skins`
SELECT * FROM `usuarios`