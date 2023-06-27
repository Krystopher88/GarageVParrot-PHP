-- Database initialization

-- CREATE DATABASE vparrot_bdd;
USE vparrot_bdd;

-- Create OpinionsTable

-- DROP TABLE IF EXISTS `OpinionsTable`;
-- CREATE TABLE OpinionsTable (
--   `id` INT(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(50) NOT NULL,
--   `opinion` text NOT NULL,
--   PRIMARY KEY(`id`)
-- );

-- Table insertion test `OpinionsTable`

-- INSERT INTO `OpinionsTable` (`id`, `name`, `opinion`) VALUES
-- (1, 'Franck', 'Personnel accueillant'),
-- (2, 'Celine', 'Magnifique garage'),
-- (3, 'Ronchon', 'Je ne reviendrai pas');

-- Create Used_Vehicles table

-- DROP TABLE IF EXISTS `Used_Vehicles`;
-- CREATE TABLE Used_Vehicles (
--   `id` INT(11) NOT NULL AUTO_INCREMENT,
--   `pictures` varchar(255) DEFAULT NULL,
--   `brand` varchar(50) NOT NULL,
--   `model` varchar(50) NOT NULL,
--   `mileage` INT(12) NOT NULL,
--   `fuel_type` varchar(50) NOT NULL,
--   `year` YEAR,
--   `price` INT(11),
--   PRIMARY KEY(`id`)
-- );

-- Table insertion test `Used_Vehicles`

INSERT INTO `Used_Vehicles` (`id`, `pictures`, `brand`, `model`, `mileage`, `fuel_type`, `year`, `price`) VALUES
(1, NULL, 'Tesla', 'Model 3', 11000, 'Electrique', 2021, 47990),
(2, NULL, 'Ferrari', '488 Spider', 8000, 'Essence', 2017, 278900),
(3, NULL, 'Porsche', '718 Boxster', 17900, 'Essence', 2020, 47990),
(4, NULL, 'Jaguar', 'XKR II', 113500, 'Essence', 2007, 31990),
(5, NULL, 'Aston Martin', 'V8 Vantage', 43250, 'Essence', 2010, 66500),
(6, NULL, 'Lamborghini', 'Urus', 50800, 'Essence', 2018, 239990);