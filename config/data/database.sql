CREATE DATABASE mydb;

use mydb;

CREATE TABLE `corretores`(
  `id` int(11) AUTO_INCREMENT PRIMARY KEY, 
  `nome` varchar(30) NOT NULL,
  `tipo_seg` varchar(30) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `numero` varchar(50),
  `email` varchar(50)
);

CREATE TABLE `users`(
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL
);

CREATE TABLE `clientes` (
`id` INT(11) AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(60) NOT NULL,
`cpf` VARCHAR(15) UNIQUE KEY NOT NULL,
`email` VARCHAR(50) UNIQUE KEY NOT NULL
);