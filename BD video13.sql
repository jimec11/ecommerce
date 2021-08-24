--usuarios

CREATE TABLE `ecommerce`.`usuarios` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(200) NOT NULL , `pass` VARCHAR(255) NOT NULL , `nombre` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


--clientes

CREATE TABLE `ecommerce`.`clientes` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(200) NOT NULL , `pass` VARCHAR(255) NOT NULL , `nombre` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


--ventas

CREATE TABLE `ecommerce`.`ventas` ( `id` INT NOT NULL AUTO_INCREMENT , `idCli` INT(5) NOT NULL , `fecha` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `ecommerce`.`ventas` ADD INDEX `fkIdCli` (`idCli`);

ALTER TABLE `ventas` ADD CONSTRAINT `idCli` FOREIGN KEY (`idCli`) REFERENCES `clientes`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;



--productos

CREATE TABLE `ecommerce`.`productos` ( `id` INT NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(200) NOT NULL , `precio` DOUBLE NOT NULL , `existencia` INT(5) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


--detalleVentas

CREATE TABLE `ecommerce`.`detalleVentas` ( `id` INT NOT NULL AUTO_INCREMENT , `idProd` INT(5) NOT NULL , `idVenta` INT(5) NOT NULL , `cantidad` INT(5) NOT NULL , `precio` DOUBLE NOT NULL , `subTotal` DOUBLE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `ecommerce`.`detalleVentas` ADD INDEX `fkIdProd` (`idProd`);

ALTER TABLE `detalleVentas` ADD CONSTRAINT `idProd` FOREIGN KEY (`idProd`) REFERENCES `productos`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `ecommerce`.`detalleVentas` ADD INDEX `fkIdVenta` (`idVenta`);

ALTER TABLE `detalleVentas` ADD CONSTRAINT `idVenta` FOREIGN KEY (`idVenta`) REFERENCES `ventas`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;



--files 

CREATE TABLE `files` ( `id` int NOT NULL AUTO_INCREMENT, `filename` varchar(250) NOT NULL, `filesize` int NOT NULL, `web_path` varchar(250) NOT NULL, `system_path` varchar(250) NOT NULL, PRIMARY KEY (`id`) ) AUTO_INCREMENT=1;


--productos_files

CREATE TABLE productos_files (
    `producto_id` int NOT NULL,
    `file_id` int NOT NULL
);






