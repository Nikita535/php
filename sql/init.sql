CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED WITH mysql_native_password BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(32) NOT NULL,
    password VARCHAR(256) NOT NULL,
    email VARCHAR(64) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS `order`
(
    ID          INT(11)      NOT NULL AUTO_INCREMENT,
    name        VARCHAR(255)  NOT NULL,
    description VARCHAR(256) NOT NULL,
    price       INT(7)       NOT NULL,
    PRIMARY KEY (ID)
);


INSERT INTO `order` (name,description,price) VALUES ('Tea','With sugar',200);
INSERT INTO `order` (name,description,price) VALUES ('Cake','Without sugar',899);
INSERT INTO `order` (name,description,price) VALUES ('Bear','Craft',400);


