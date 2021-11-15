-- insert tabla clientes ---

INSERT INTO `clientes` (`id`, `email`, `pass`, `nombre`) 
VALUES (NULL, 'cliente3@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'cliente3')


--- update tabla clientes ---

ALTER TABLE `clientes` ADD `direccion` TEXT NOT NULL AFTER `nombre`;

UPDATE `clientes` SET `direccion` = 'Heredia' WHERE `clientes`.`id` = 3

UPDATE `clientes` SET `direccion` = 'San José' WHERE `clientes`.`id` = 4


--- crear tabla recibe ---

CREATE TABLE `ecommerce`.`recibe` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `idCli` INT(5) NOT NULL , `nombre` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `direccion` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `ecommerce`.`recibe` ADD UNIQUE `fkIdCli` (`idCli`);

