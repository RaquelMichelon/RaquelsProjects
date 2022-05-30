-- -----------------------------------------------------
-- Data for table `abmr`.`imovel`
-- -----------------------------------------------------
START TRANSACTION;
USE `abmr`;
INSERT INTO `imovel` (`idimovel`, `latitude`, `longitude`, `cep`, `logradouro`, `numero`, `bloco`, `numero_apartamento`, `bairro`, `cidade`, `estado`, `idproprietario`, `foto_imovel`) VALUES
(11265, -27.19452, -47.65982, 88045120, 'Rua Felicidade', '125', NULL, NULL, 'Agronômica', 'Florianópolis', 'Santa Catarina', 2, NULL),
(25642, -27.595311, -48.50415, 88022315, 'Sergipe', '15', '7B', '13', 'Carvoeira', 'Florianópolis', 'Santa Catarina', 3, NULL),
(45687, -27.588594, -48.545492, 88029400, 'Paraíba', '25', 'B02', '24', 'Trindade', 'Florianópolis', 'Santa Catarina', 1, NULL),
(65218, -27.453566, -47.856871, 88036100, 'Avenida Paulo Afonso', '1236', '1', '03', 'Centro', 'Florianópolis', 'Santa Catarina', 5, NULL),
(77756, 27.256258, 47.254786, 88034200, 'Rua Itararé', '22', '1', '3', 'Trindade', 'Florianópolis', 'alugado', 4, NULL);


-- -----------------------------------------------------
-- Data for table `abmr`.`avaliacao`
-- -----------------------------------------------------
START TRANSACTION;
USE `abmr`;
INSERT INTO `avaliacao` (`idavaliacao`, `avaliacao_textual`, `nota_geral`, `quantidade_curtidas`, `foi_morador`, `idusuario`, `idimovel`, `data_avaliacao`) VALUES
(25698, 'Morei 15 anos nesse espaço e não tenho do que reclamar. Mas eu acho que o condomínio podemos ter serviços melhores.', 5, 0, 's', 1, 77756, '2022-02-26'),
(49547, 'Péssimo apartamento, tudo tem problema. É úmido, parede tudo encarunchada, o banheiro cheira a esgoto, só tem uma tomada por cômodo.', 1, 1, 's', 5, 65218, '2022-02-22'),
(53645, 'gostei da casa, bem localizado e ótimo estado de conservação. Porém, a imobiliária era pouco accessível para responder sobre o imóvel', 4, 0, 's', 3, 77756, '2022-01-27'),
(72546, 'Em geral, esse espaço foi o pior que já morei. Os proprietários não resolviam os problemas, como os recorrentes vazamentos', 2, 0, 's', 4, 65218, '2022-02-14'),
(84536, 'Gostei do apartamento, auto custo benefício. Boa localização e bom serviço de condomínio.', 4, 2, 's', 2, 11265, '2022-03-01');



-- -----------------------------------------------------
-- Data for table `abmr`.`notas`
-- -----------------------------------------------------
START TRANSACTION;
USE `abmr`;
INSERT INTO `notas` (`valor_nota`, `idavaliacao`, `iditens_avaliacao`) VALUES
(4, 25698, 1),
(4, 25698, 2),
(5, 25698, 3),
(5, 25698, 4),
(4, 25698, 5),
(5, 25698, 6),
(1, 49547, 1),
(4, 49547, 2),
(2, 49547, 3),
(1, 49547, 4),
(1, 49547, 5),
(1, 49547, 6),
(4, 53645, 1),
(4, 53645, 2),
(5, 53645, 3),
(4, 53645, 4),
(5, 53645, 5),
(4, 53645, 6),
(2, 72546, 1),
(0, 72546, 2),
(3, 72546, 3),
(3, 72546, 4),
(5, 72546, 5),
(2, 72546, 6),
(5, 84536, 1),
(4, 84536, 2),
(3, 84536, 3),
(4, 84536, 4),
(2, 84536, 5),
(4, 84536, 6);