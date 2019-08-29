CREATE TABLE  `partner_planos` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`partner_id` INT( 11 ) NOT NULL ,
`plano_id` INT( 11 ) NOT NULL ,
`dias` INT( 11 ) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

ALTER TABLE  `partner_planos` ADD  `data` DATETIME NULL; 
ALTER TABLE  `team` ADD  `usou_bonus` varchar( 11 ) NULL;
ALTER TABLE  `planos_publicacao` ADD  `qtdeanuncio` INT(20) NULL;  
ALTER TABLE  `planos_publicacao` ADD  `ehdestaque` CHAR(1) NULL;
ALTER TABLE  `team` ADD  `admineditou` char(1) NULL;
ALTER TABLE  `team` ADD  `avisa` VARCHAR(150) NULL; 
ALTER TABLE  `team` ADD  `ehdestaque` VARCHAR(20) NULL; 
ALTER TABLE  `page` ADD  `destaque` VARCHAR(20) NULL; 

CREATE TABLE IF NOT EXISTS `tipoimoveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tipoimoveis`
--

INSERT INTO `tipoimoveis` (`id`, `nome`) VALUES
(1, 'Residencial'),
(2, 'Comercial'),
(3, 'Industrial'),
(4, 'Rural') ;
