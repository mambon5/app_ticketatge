--  run a mysql script: mysql> source \home\user\Desktop\test.sql;

CREATE TABLE usuaris (
    id int NOT NULL AUTO_INCREMENT,
    data_registre timestamp DEFAULT CURRENT_TIMESTAMP,
    nom varchar(255),
    telefon varchar(15),
    email varchar(255),    
    PRIMARY KEY (id)
); 

CREATE TABLE tickets (
    id int NOT NULL AUTO_INCREMENT,
    data_registre timestamp DEFAULT CURRENT_TIMESTAMP,
    tipus int,
    id_usuari int NOT NULL,
    id_event int NOT NULL,
    comentari varchar(255) DEFAULT "",
    PRIMARY KEY (id)
); 

CREATE TABLE events (
    id int NOT NULL AUTO_INCREMENT,
    nom varchar(255),
    data_registre timestamp DEFAULT CURRENT_TIMESTAMP,
    data_event date NOT NULL,
    contrasenya varchar(255),    
    comentari varchar(255) DEFAULT "",
    PRIMARY KEY (id)
); 


