-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.6.11-MariaDB-0ubuntu0.22.04.1 - Ubuntu 22.04
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table MUSE.address : ~0 rows (environ)

-- Listage des données de la table MUSE.cart : ~0 rows (environ)
INSERT INTO `cart` (`id`, `user_id`, `billing_address_id`, `delivery_address_id`, `client_order_id`, `validated`, `order_date`, `shipped`, `shipment_date`, `carrier`, `carrier_shipment_id`, `total`, `additional_discount_rate`, `invoice`) VALUES
	(1, 1, NULL, NULL, 'MUSE::63807EDC0CB50', 0, NULL, 0, NULL, NULL, NULL, NULL, 0.000, NULL);

-- Listage des données de la table MUSE.category : ~17 rows (environ)
INSERT INTO `category` (`id`, `parent_category_id`, `name`, `image`) VALUES
	(1, NULL, 'Guitares', 'Guitares.jpg'),
	(2, 1, 'Guitares Electriques', 'Guitares Electriques.jpg'),
	(3, 1, 'Guitares accoustiques', 'Guitares accoustiques.jpg'),
	(4, NULL, 'Guitares basses', 'Guitares basses.jpg'),
	(5, 4, 'Basses accoustiques', 'Basses accoustiques.jpg'),
	(6, 4, 'Basses électriques', 'Basses électriques.jpg'),
	(7, NULL, 'Batteries & Percussions', 'Batteries & Percussions.jpg'),
	(8, 7, 'Batteries', 'Batteries.jpg'),
	(9, 7, 'Percussions', 'Percussions.jpg'),
	(10, NULL, 'Pianos & Claviers', 'Pianos & Claviers.jpg'),
	(11, 10, 'Claviers', 'Claviers.jpg'),
	(12, 10, 'Pianos', 'Pianos.jpg'),
	(13, NULL, 'Instruments à vent', 'Instruments à vent.jpg'),
	(14, NULL, 'Instruments trad.', 'Instruments trad..jpg'),
	(15, NULL, 'Matériel DJ', 'Matériel DJ.jpg'),
	(16, NULL, 'Microphones', 'Microphones.jpg'),
	(17, NULL, 'Sonorisation', 'Sonorisation.jpg');

-- Listage des données de la table MUSE.contact : ~0 rows (environ)

-- Listage des données de la table MUSE.doctrine_migration_versions : ~2 rows (environ)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20221123115808', '2022-11-25 09:32:10', 614),
	('DoctrineMigrations\\Version20221125083232', '2022-11-25 09:32:44', 62);

-- Listage des données de la table MUSE.order_details : ~0 rows (environ)

-- Listage des données de la table MUSE.product : ~0 rows (environ)
INSERT INTO `product` (`id`, `supplier_id`, `category_id`, `name`, `price`, `description`, `content`, `discount`, `discount_rate`, `quantity`, `image`, `image1`, `image2`) VALUES
	(1, 1, 6, 'Ignition Cavern SE', 347, '4 cordes - Table en épicéa - Fond et éclisses en érable flammé - Manche 1 pièce en érable - Touche en jatoba - Filets de table et de fond blancs - Diapason: 760 mm (30") - Largeur au sillet: 42 mm - 22 frettes - 2 micros double bobinage Höfner', 'Conditionnement (UVC) - 1 Pièce(s) - Couleur Sunburst - Corps Erable - Manche Erable - Touche Jatoba - Frettes 22 - Diapason Short scale - Micros HH - Electronique Passif - Étui inclus Non - Housse incluse Non', 0, 0.000, 20, 'Ignition Cavern SE.jpg', 'Ignition Cavern SE-1.jpg', 'Ignition Cavern SE-2.jpg'),
	(2, 2, 6, 'Ibanez BTB846-CBL', 1099, '6 cordes Série BTB Corps en frêne avec ailes en okoumé Table en peuplier veiné Manche traversant en érable/noyer Touche en palissandre Diapason: 889 mm (35") Rayon de la touche: 950 mm (37,4") Largeur au sillet: 54 mm (2,13") 24 frettes Medium en acier in', 'Conditionnement (UVC)\r\n1 Pièce(s)\r\nForme\r\nBTB\r\nCouleur\r\nBleu\r\nCorps\r\nFrêne, okoumé\r\nManche\r\nErable, noyer\r\nTouche\r\nPalissandre\r\nFrettes\r\n24\r\nDiapason\r\nExtra long scale\r\nMicros\r\nHH\r\nÉlectronique\r\nActive\r\nÉtui inclus\r\nNon\r\nHousse incluse\r\nNon', 0, 0.050, 35, 'Ibanez BTB846-CBL.jpg', 'Ibanez BTB846-CBL-1.jpg', 'Ibanez BTB846-CBL-2.jpg'),
	(3, 3, 6, 'Marcus Miller V3 TS 2nd Gen', 599, '5 cordes Fabriquée par Sire Corps en aulne Manche 1 pièce en érable Profil du manche en C Touche en ébène Rayon de la touche: 241 mm Diapason: 34" (Long Scale) 20 frettes Medium Small Espacement entre 2 cordes: 18 mm Largeur au sillet: 46 mm Sillet en os', 'Conditionnement (UVC)\r\n1 Pièce(s)\r\nCouleur\r\nSunburst\r\nCorps\r\nAulne\r\nManche\r\nErable\r\nTouche\r\nEbène\r\nFrettes\r\n20\r\nDiapason\r\nLong scale\r\nMicros\r\nJJ\r\nÉlectronique\r\nActive, passive\r\nÉtui inclu\r\nNon\r\nHousse incluse\r\nNon', 0, 0.000, 28, 'Marcus Miller V3 TS 2nd Gen.jpg', 'Marcus Miller V3 TS 2nd Gen-1.jpg', 'Marcus Miller V3 TS 2nd Gen-2.jpg');

-- Listage des données de la table MUSE.rememberme_token : ~0 rows (environ)

-- Listage des données de la table MUSE.reset_password_request : ~0 rows (environ)

-- Listage des données de la table MUSE.supplier : ~0 rows (environ)
INSERT INTO `supplier` (`id`, `name`) VALUES
	(1, 'Höfner'),
	(2, 'Ibanez'),
	(3, 'Marcus'),
	(4, 'Music Man'),
	(5, 'Warwick'),
	(6, 'LP'),
	(7, 'Millenium'),
	(8, 'Pearl'),
	(9, 'Sonor'),
	(10, 'Toca'),
	(11, 'Clavia'),
	(12, 'Viscount'),
	(13, 'Yamaha'),
	(14, 'Cordoba'),
	(15, 'Ovation'),
	(16, 'Richwood'),
	(17, 'Gibson'),
	(18, 'Gretsch'),
	(19, 'Harley Benton'),
	(20, 'Melton'),
	(21, 'Ocarinamus'),
	(22, 'Thomann'),
	(23, 'Gewa'),
	(24, 'Ns Design'),
	(25, 'Salvi'),
	(26, 'Scala'),
	(27, 'Hercules'),
	(28, 'The T.Mix'),
	(29, 'Neumann'),
	(30, 'Rode'),
	(31, 'Sennheiser'),
	(32, 'Shure'),
	(33, 'Bose'),
	(34, 'LD Systems');

-- Listage des données de la table MUSE.user : ~0 rows (environ)
INSERT INTO `user` (`id`, `email`, `roles`, `password`, `user_name`, `user_lastname`, `birthdate`, `phone_number`, `is_verified`, `register_date`, `vat`, `pro`, `pro_company_name`, `pro_duns`, `pro_job_position`) VALUES
	(1, 'admin@muse.com', '["ROLE_ADMIN","ROLE_SALES","ROLE_SHIP","ROLE_PRO","ROLE_CLIENT","ROLE_USER"]', '$2y$13$tR.Y.ThzEqn4Om2LXUhfPu6uvBaeWX4LkpiNWiGFSzf7uQKjGKjwO', 'admin', 'admin', '2022-12-12 00:00:00', '0999999999', 1, '2022-12-12 00:00:00', 0.10, 0, NULL, NULL, NULL),
	(2, 'sales@muse.com', '["ROLE_SALES","ROLE_SHIP","ROLE_PRO","ROLE_CLIENT","ROLE_USER"]', '$2y$13$2bfOwlTjNtXb4JfVzAxGSOfv9opihXD2KHuHb.NhwhBIQLFNiUeZu', 'sales', 'sales', '2022-12-12 00:00:00', '0999999999', 1, '2022-12-12 00:00:00', 0.10, 0, NULL, NULL, NULL),
	(3, 'ship@muse.com', '["ROLE_SHIP","ROLE_PRO","ROLE_CLIENT","ROLE_USER"]', '$2y$13$sZPp7tUcYJVwtLJRInOGFe1kdmOgqK.0Yv.rFRvKpGej1uNbgif/a', 'ship', 'ship', '2022-12-12 00:00:00', '0999999999', 1, '2022-12-12 00:00:00', 0.10, 0, NULL, NULL, NULL),
	(4, 'pro@muse.com', '["ROLE_PRO","ROLE_CLIENT","ROLE_USER"]', '$2y$13$FCBHEF5HE8AR5M2MyBMis.H8OCFRvK3OBY6nXMaEB8q7wMpKDilwi', 'pro', 'pro', '2022-12-12 00:00:00', '0999999999', 1, '2022-12-12 00:00:00', 0.10, 0, NULL, NULL, NULL),
	(5, 'client@muse.com', '["ROLE_CLIENT","ROLE_USER"]', '$2y$13$cGv5KqaPxeM6BWZHE9224./Wbc/fUaJ7ilYiKZcnZ2aC0DrDg14ee', 'client', 'client', '2022-12-12 00:00:00', '0999999999', 1, '2022-12-12 00:00:00', 0.20, 0, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
