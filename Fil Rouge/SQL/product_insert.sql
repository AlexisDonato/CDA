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

-- Listage des données de la table MUSE.product : ~1 rows (environ)
INSERT INTO `product` (`id`, `supplier_id`, `category_id`, `name`, `price`, `description`, `content`, `discount`, `discount_rate`, `quantity`, `image`, `image1`, `image2`) VALUES
	(1, 1, NULL, 'Ignition Cavern SE', 347, '4 cordes - Table en épicéa - Fond et éclisses en érable flammé - Manche 1 pièce en érable - Touche en jatoba - Filets de table et de fond blancs - Diapason: 760 mm (30") - Largeur au sillet: 42 mm - 22 frettes - 2 micros double bobinage Höfner', 'Conditionnement (UVC) - 1 Pièce(s) - Couleur Sunburst - Corps Erable - Manche Erable - Touche Jatoba - Frettes 22 - Diapason Short scale - Micros HH - Electronique Passif - Étui inclus Non - Housse incluse Non', 0, 0.000, 20, 'Ignition Cavern SE.jpg', 'Ignition Cavern SE-1.jpg', 'Ignition Cavern SE-2.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
