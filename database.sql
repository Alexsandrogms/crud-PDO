/* Criar Banco de dados */
CREATE DATABASE IF NOT EXISTS loja;

CREATE TABLE `loja`.`fornecedor` ( `cod` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(150) NOT NULL , `email` VARCHAR(150) NOT NULL , `cnpj` INT(14) NOT NULL , `status` INT(1) NOT NULL , `img_url` VARCHAR(150) NOT NULL , PRIMARY KEY (`cod`)) ENGINE = InnoDB;