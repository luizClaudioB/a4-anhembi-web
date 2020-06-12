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
