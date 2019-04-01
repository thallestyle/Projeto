CREATE DATABASE agenda;


CREATE TABLE `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL DEFAULT '0000-00-00',
  `hora_de` time NOT NULL DEFAULT '00:00:00',
  `hora_ate` time DEFAULT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `evento` (`id`, `data`, `hora_de`, `hora_ate`, `descricao`)
VALUES
	(1,'2015-07-11','13:00:00','16:00:00','Reunião teste');



CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `pessoa` (`id`, `nome`, `email`)
VALUES
	(1,'Pedro','pedro@inforcomp.com.br'),
	(2,'Mariana','mariana@inforcomp.com.br');



CREATE TABLE `pessoa_evento` (
  `pessoa` int(11) NOT NULL,
  `evento` int(11) NOT NULL,
  KEY `FK_pessoa_evento_pessoa` (`pessoa`),
  KEY `FK_pessoa_evento_evento` (`evento`),
  CONSTRAINT `FK_pessoa_evento_evento` FOREIGN KEY (`evento`) REFERENCES `evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pessoa_evento_pessoa` FOREIGN KEY (`pessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `pessoa_evento` (`pessoa`, `evento`)
VALUES
	(1,1);

