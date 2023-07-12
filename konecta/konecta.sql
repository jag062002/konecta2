CREATE DATABASE konecta;

CREATE TABLE `konecta`.`productos` (
	`id` INT (16) NULL AUTO_INCREMENT,
	`nombre` VARCHAR (255) NOT NULL,
	`referencia` VARCHAR (255) NOT NULL,
	`precio` INT (16) NOT NULL,
	`peso` INT (16) NOT NULL,
	`categoria` INT (16) NOT NULL,
    `stock` INT (16) NOT NULL,
	`fecha_creacion` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	INDEX (`categoria`)
) ENGINE = INNODB;

CREATE TABLE `konecta`.`categorias` (
	`id` INT (16) NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR (255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = INNODB;

CREATE TABLE `konecta`.`ventas`( `id` INT (16) NOT NULL AUTO_INCREMENT,
 `id_producto` INT (16) NOT NULL,
 `cantidad` INT (16) NOT NULL,
 `total` INT (16) NOT NULL,
 `fecha_venta` DATETIME NOT NULL,
 PRIMARY KEY (`id`),
 INDEX (`id_producto`)
) ENGINE = INNODB;

-- Maximo stock
SELECT * FROM productos ORDER BY stock DESC LIMIT 1

-- Maxima venta
SELECT
productos.nombre,
SUM(ventas.cantidad) AS "Cantidad",
SUM(ventas.total) AS "total"
FROM
ventas
INNER JOIN productos ON ventas.id_producto = productos.id
GROUP BY productos.nombre
ORDER BY 2 DESC 
LIMIT 1