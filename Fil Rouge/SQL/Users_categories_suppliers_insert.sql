-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.3.37-MariaDB-0ubuntu0.20.04.1 - Ubuntu 20.04
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

-- Listage des données de la table MUSE.category : ~17 rows (environ)
INSERT INTO `category` (`id`, `parent_category_id`, `name`) VALUES
	(1, NULL, 'Guitares'),
	(2, 1, 'Guitares Electriques'),
	(3, 1, 'Guitares accoustiques'),
	(4, NULL, 'Guitares basses'),
	(5, 4, 'Basses accoustiques'),
	(6, 4, 'Basses électriques'),
	(7, NULL, 'Batteries & Percussions'),
	(8, 7, 'Batteries'),
	(9, 7, 'Percussions'),
	(10, NULL, 'Pianos & Claviers'),
	(11, 10, 'Claviers'),
	(12, 10, 'Pianos'),
	(13, NULL, 'Instruments à vent'),
	(14, NULL, 'Instruments trad.'),
	(15, NULL, 'Matériel DJ'),
	(16, NULL, 'Microphones'),
	(17, NULL, 'Sonorisation');

-- Listage des données de la table MUSE.contact : ~0 rows (environ)

-- Listage des données de la table MUSE.order_details : ~0 rows (environ)

-- Listage des données de la table MUSE.product : ~0 rows (environ)

-- Listage des données de la table MUSE.rememberme_token : ~0 rows (environ)

-- Listage des données de la table MUSE.reset_password_request : ~0 rows (environ)

-- Listage des données de la table MUSE.supplier : ~34 rows (environ)
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

-- Listage des données de la table MUSE.user : ~5 rows (environ)
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
