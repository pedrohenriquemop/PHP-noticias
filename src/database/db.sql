DROP DATABASE IF EXISTS noticias;
CREATE DATABASE noticias;

CREATE TABLE noticia(
    id INT(11) AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    conteudo TEXT NOT NULL,
    id_cat INT NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE categoria(
    id INT(11) AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO categoria (`id`, `nome`) VALUES
(1, 'Meio ambiente'),
(2, 'Esportes'),
(3, 'Entretenimento'),
(4, 'Mundo'),
(5, 'Curiosidade');

ALTER TABLE `noticia`
    ADD KEY `fkIdx_11` (`id_cat`);

ALTER TABLE `noticia`
    ADD CONSTRAINT `FK_10` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id`);

ALTER DATABASE noticias DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci; 