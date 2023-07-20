-- Database initialization

-- CREATE DATABASE vparrot_bdd;
USE vparrot_bdd;

-- Create OpinionsTable ---

-- DROP TABLE IF EXISTS `OpinionsTable`;
-- CREATE TABLE OpinionsTable (
--   `id` INT(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(50) NOT NULL,
--   `opinion` text NOT NULL,
--   PRIMARY KEY(`id`)
-- );

-- Table insertion test `OpinionsTable` --

-- INSERT INTO `OpinionsTable` (`id`, `name`, `opinion`) VALUES
-- (1, 'Franck', 'Personnel accueillant'),
-- (2, 'Celine', 'Magnifique garage'),
-- (3, 'Ronchon', 'Je ne reviendrai pas');

-- Create Used_Vehicles table --

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

-- Table insertion test `Used_Vehicles` ---

-- INSERT INTO `Used_Vehicles` (`id`, `pictures`, `brand`, `model`, `mileage`, `fuel_type`, `year`, `price`) VALUES
-- (1, NULL, 'Tesla', 'Model 3', 11000, 'Electrique', 2021, 47990),
-- (2, NULL, 'Ferrari', '488 Spider', 8000, 'Essence', 2017, 278900),
-- (3, NULL, 'Porsche', '718 Boxster', 17900, 'Essence', 2020, 47990),
-- (4, NULL, 'Jaguar', 'XKR II', 113500, 'Essence', 2007, 31990),
-- (5, NULL, 'Aston Martin', 'V8 Vantage', 43250, 'Essence', 2010, 66500),
-- (6, NULL, 'Lamborghini', 'Urus', 50800, 'Essence', 2018, 239990);

-- Table insertion test2 `OpinionsTable`

-- INSERT INTO `OpinionsTable` (`id`, `name`, `opinion`) VALUES
-- (4, 'Daniel', 'Belle secretaire'),
-- (5, 'Moi', 'De belle voitures en vitrine'),
-- (6, 'Ronchon2', 'Trop cher, pas de café offert');


-- Table insertion test2 `Used_Vehicles`

-- INSERT INTO `Used_Vehicles` (`id`, `pictures`, `brand`, `model`, `mileage`, `fuel_type`, `year`, `price`) VALUES
-- (7, NULL, 'Bentley', 'Continental GT3', 180200, 'Essence', 2011, 59990),
-- (8, NULL, 'Hummer', 'H1', 44800, 'Essence', 2000, 78900);


-- Create Services table -

-- DROP TABLE IF EXISTS `Services`;
-- CREATE TABLE Services (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `picture` varchar(255) DEFAULT NULL,
--   `title` varchar(255) NOT NULL,
--   `description` text NOT NULL,
--   `category_id` int(11) NOT NULL,
--   PRIMARY KEY(`id`),
--   KEY `category_id` (`category_id`)
-- )

-- INSERT INTO `category_id` (`name`) VALUES
-- ('Mécanique'),
-- ('Carosserie');



-- INSERT INTO `Services` (`title`, `description`, `category_id`) VALUES 
-- ('Mécanique', 'Bienvenue au Garage V. Parrot, votre partenaire de confiance en mécanique automobile. Avec 15 ans 
-- d\'expérience, nous offrons des services de réparation mécanique de qualité et personnalisés pour garantir la performance 
-- et la sécurité de votre véhicule. Faites-nous confiance pour prendre soin de votre voiture avec expertise.', 1);

-- INSERT INTO `Services` (`title`, `description`, `category_id`) VALUES 
-- ('Carosserie', 'Bienvenue au Garage V. Parrot, votre partenaire de confiance en carrosserie automobile. 
-- Avec 15 ans d''expérience, nous offrons des services de carrosserie de qualité pour préserver la performance et 
-- la sécurité de votre véhicule. Faites-nous confiance pour prendre soin de votre voiture avec expertise.', 2);


-- DROP TABLE IF EXISTS `category_id`;

-- DROP TABLE IF EXISTS `Services`;

-- DROP TABLE IF EXISTS `category_id`;
-- CREATE TABLE category_id(
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `title` varchar(50) NOT NULL,
--   `description` text NOT NULL,
--   `picture` varchar(255) DEFAULT NULL,
--   PRIMARY KEY(`id`)
-- )

-- INSERT INTO `category_id` (`title`, `description`) VALUES 
-- ('Mécanique', 'Bienvenue au Garage V. Parrot, votre partenaire de confiance en mécanique automobile. Avec 15 ans 
-- d\'expérience, nous offrons des services de réparation mécanique de qualité et personnalisés pour garantir la performance 
-- et la sécurité de votre véhicule. Faites-nous confiance pour prendre soin de votre voiture avec expertise.');

-- INSERT INTO `category_id` (`title`, `description`) VALUES 
-- ('Carosserie', 'Bienvenue au Garage V. Parrot, votre partenaire de confiance en carrosserie automobile. 
-- Avec 15 ans d''expérience, nous offrons des services de carrosserie de qualité pour préserver la performance et 
-- la sécurité de votre véhicule. Faites-nous confiance pour prendre soin de votre voiture avec expertise.');

-- DROP TABLE IF EXISTS `service`;
-- CREATE TABLE service(
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `title` varchar(50) NOT NULL,
--   `description` text NOT NULL,
--   `picture` varchar(255) DEFAULT NULL,
--   `category_id` INT,
--   PRIMARY KEY(`id`),
--   FOREIGN KEY (`category_id`) REFERENCES category_id(`id`)
-- )

-- INSERT INTO `service` (`title`, `description`, `category_id`) VALUES 
--   ('Entretiens', 'Notre garage auto assure l\'entretien complet de votre véhicule. Vidange, filtres, freins, direction... 
-- Confiez-nous votre voiture en toute confiance. Nos experts veilleront à son bon fonctionnement pour une conduite sûre 
-- et agréable. Faites-nous confiance pour des services d\'entretien de qualité.', 1)

-- INSERT INTO `service` (`title`, `description`, `category_id`) VALUES 
--   ('Réparations', 'Réparations auto. Confiez-nous vos réparations automobiles. 
--   Équipe qualifiée pour problèmes mécaniques, électriques et carrosserie. 
--   Réparations professionnelles, rapides et fiables. Votre voiture sera remise en état en toute sécurité.', 1)

--  INSERT INTO `service` (`title`, `description`, `category_id`) VALUES 
--   ('Peinture', 'Service de peinture automobile. Rendez votre voiture éblouissante avec notre service de peinture 
--   de haute qualité. Nos experts utilisent des techniques avancées et des peintures durables pour donner à votre 
--   véhicule une finition impeccable. Que ce soit pour une réparation de carrosserie ou pour une nouvelle apparence, 
--   nous vous offrons des résultats exceptionnels. Faites briller votre voiture avec notre service de 
--   peinture professionnel.', 2)

  --   INSERT INTO `service` (`title`, `description`, `category_id`) VALUES 
  -- ('Vitrage', 'Service de vitrage automobile. Confiez-nous le remplacement ou la réparation de votre pare-brise et 
  -- de vos vitres de voiture. Nos spécialistes en vitrage utilisent des matériaux de qualité supérieure pour garantir 
  -- une installation précise et durable. Protégez-vous des intempéries et assurez votre sécurité sur la route avec notre 
  -- service de vitrage professionnel. Faites confiance à notre expertise pour des solutions 
  -- de vitrage fiables et efficaces.', 2)

  -- DROP TABLE IF EXISTS `opening_hours`;
  -- CREATE TABLE opening_hours(
  --   `id` int(11) NOT NULL AUTO_INCREMENT,
  --   `day_of_week` varchar(20) NOT NULL,
  --   `opening_time` TIME DEFAULT NULL,
  --   `closing_time` TIME DEFAULT NULL,
  --   PRIMARY KEY(`id`)
  -- )

  -- INSERT INTO `opening_hours` (`day_of_week`, `opening_time`, `closing_time`) VALUES
  -- ('Lundi', '08:45:00', '12:00:00'),
  -- ('Lundi', '14:00:00', '18:00:00'),
  -- ('Mardi', '08:45:00', '12:00:00'),
  -- ('Mardi', '14:00:00', '18:00:00'),
  -- ('Mercredi', '08:45:00', '12:00:00'),
  -- ('Mercredi', '14:00:00', '18:00:00'),
  -- ('Jeudi', '08:45:00', '12:00:00'),
  -- ('Jeudi', '14:00:00', '18:00:00'),
  -- ('Vendredi', '08:45:00', '12:00:00'),
  -- ('Vendredi', '14:00:00', '18:00:00'),
  -- ('Samedi', '08:45:00', '12:00:00'),
  -- ('Dimanche', NULL, NULL)
  
  -- DROP TABLE IF EXISTS `users`;
  -- CREATE TABLE users(
  --   `id` INT(11) NOT NULL AUTO_INCREMENT,
  --   `identifier` varchar(255) NOT NULL,
  --   `password_hash` varchar(255) NOT NULL,
  --   `email` varchar(255) NOT NULL,
  --   `last_name` varchar(255) NOT NULL,
  --   `first_name` varchar(255) NOT NULL,
  --   `last_connexion` DATETIME,
  --   `role` ENUM('employe', 'administrateur') NOT NULL,
  --   PRIMARY KEY (`id`)
  -- )

  -- INSERT INTO `users` (`identifier`, `password_hash`, `email`, `last_name`, `first_name`, `role`) VALUES
  -- ('vparrot', 'admin', 'vparrot@parrot.com', 'Parrot', 'Vincent', 'administrateur'),
  -- ('sparrot', '1234', 'sparrot@parrot.com', 'Parrot', 'Sebastien', 'employe');

-- ALTER TABLE OpinionsTable ADD COLUMN `note` INT(11) NOT NULL DEFAULT 0;
-- ALTER TABLE OpinionsTable ADD COLUMN publish BOOLEAN NOT NULL DEFAULT 0;

  -- DROP TABLE IF EXISTS `messaging`;
  -- CREATE TABLE messaging(
  --   `id` INT(11) NOT NULL AUTO_INCREMENT,
  --   `phoneNumber` varchar(255) NOT NULL,
  --   `email` varchar(255) NOT NULL,
  --   `last_name` varchar(255) NOT NULL,
  --   `first_name` varchar(255) NOT NULL,
  --   `sending_date` DATETIME,
  --   `message` text NOT NULL,
  --   PRIMARY KEY (`id`)
  -- )

  ALTER TABLE messaging DROP COLUMN sending_date;
