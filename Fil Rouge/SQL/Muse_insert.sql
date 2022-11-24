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

-- Listage des données de la table MUSE.category : ~0 rows (environ)
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

-- Listage des données de la table MUSE.doctrine_migration_versions : ~1 rows (environ)
-- Listage des données de la table MUSE.order_details : ~0 rows (environ)

-- Listage des données de la table MUSE.product : ~0 rows (environ)
INSERT INTO `product` (`id`, `supplier_id`, `category_id`, `name`, `price`, `description`, `content`, `discount`, `discount_rate`, `quantity`, `image`, `image1`, `image2`) VALUES
	(1, 1, 2, 'Elec 0', 2530, '0 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 412, 'http://picsum.photos/id/164/100/150', 'http://picsum.photos/id/308/100/150', 'http://picsum.photos/id/399/100/150'),
	(2, 1, 2, 'Elec 1', 386, '5 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 348, 'http://picsum.photos/id/201/100/150', 'http://picsum.photos/id/283/100/150', 'http://picsum.photos/id/314/100/150'),
	(3, 1, 2, 'Elec 2', 188, '7 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 319, 'http://picsum.photos/id/148/100/150', 'http://picsum.photos/id/240/100/150', 'http://picsum.photos/id/359/100/150'),
	(4, 1, 2, 'Elec 3', 633, '1 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 354, 'http://picsum.photos/id/142/100/150', 'http://picsum.photos/id/280/100/150', 'http://picsum.photos/id/336/100/150'),
	(5, 1, 2, 'Elec 4', 817, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 326, 'http://picsum.photos/id/142/100/150', 'http://picsum.photos/id/301/100/150', 'http://picsum.photos/id/349/100/150'),
	(6, 1, 2, 'Elec 5', 2239, '9 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 380, 'http://picsum.photos/id/116/100/150', 'http://picsum.photos/id/266/100/150', 'http://picsum.photos/id/349/100/150'),
	(7, 1, 2, 'Elec 6', 892, '0 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 339, 'http://picsum.photos/id/109/100/150', 'http://picsum.photos/id/210/100/150', 'http://picsum.photos/id/426/100/150'),
	(8, 1, 2, 'Elec 7', 2399, '0 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 359, 'http://picsum.photos/id/154/100/150', 'http://picsum.photos/id/316/100/150', 'http://picsum.photos/id/335/100/150'),
	(9, 1, 2, 'Elec 8', 2181, '6 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 373, 'http://picsum.photos/id/158/100/150', 'http://picsum.photos/id/222/100/150', 'http://picsum.photos/id/318/100/150'),
	(10, 1, 2, 'Elec 9', 276, '5 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 374, 'http://picsum.photos/id/140/100/150', 'http://picsum.photos/id/248/100/150', 'http://picsum.photos/id/395/100/150'),
	(11, 1, 2, 'Elec 10', 1808, '2 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 417, 'http://picsum.photos/id/174/100/150', 'http://picsum.photos/id/217/100/150', 'http://picsum.photos/id/413/100/150'),
	(12, 1, 2, 'Elec 11', 1790, '2 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 403, 'http://picsum.photos/id/229/100/150', 'http://picsum.photos/id/246/100/150', 'http://picsum.photos/id/386/100/150'),
	(13, 1, 2, 'Elec 12', 753, '1 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 347, 'http://picsum.photos/id/184/100/150', 'http://picsum.photos/id/205/100/150', 'http://picsum.photos/id/320/100/150'),
	(14, 1, 2, 'Elec 13', 2614, '4 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 397, 'http://picsum.photos/id/164/100/150', 'http://picsum.photos/id/238/100/150', 'http://picsum.photos/id/307/100/150'),
	(15, 1, 2, 'Elec 14', 780, '8 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 386, 'http://picsum.photos/id/203/100/150', 'http://picsum.photos/id/215/100/150', 'http://picsum.photos/id/422/100/150'),
	(16, 2, 3, 'Accoustique 0', 2243, '9 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 20, 'http://picsum.photos/id/208/100/150', 'http://picsum.photos/id/301/100/150', 'http://picsum.photos/id/409/100/150'),
	(17, 2, 3, 'Accoustique 1', 1700, '5 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 36, 'http://picsum.photos/id/131/100/150', 'http://picsum.photos/id/215/100/150', 'http://picsum.photos/id/369/100/150'),
	(18, 2, 3, 'Accoustique 2', 701, '8 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 2, 'http://picsum.photos/id/204/100/150', 'http://picsum.photos/id/315/100/150', 'http://picsum.photos/id/306/100/150'),
	(19, 2, 3, 'Accoustique 3', 2409, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 2, 'http://picsum.photos/id/169/100/150', 'http://picsum.photos/id/228/100/150', 'http://picsum.photos/id/345/100/150'),
	(20, 2, 3, 'Accoustique 4', 2014, '7 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 54, 'http://picsum.photos/id/112/100/150', 'http://picsum.photos/id/289/100/150', 'http://picsum.photos/id/309/100/150'),
	(21, 2, 3, 'Accoustique 5', 1146, '4 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 16, 'http://picsum.photos/id/173/100/150', 'http://picsum.photos/id/290/100/150', 'http://picsum.photos/id/309/100/150'),
	(22, 2, 3, 'Accoustique 6', 392, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 29, 'http://picsum.photos/id/219/100/150', 'http://picsum.photos/id/290/100/150', 'http://picsum.photos/id/405/100/150'),
	(23, 2, 3, 'Accoustique 7', 2111, '5 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 59, 'http://picsum.photos/id/106/100/150', 'http://picsum.photos/id/289/100/150', 'http://picsum.photos/id/395/100/150'),
	(24, 2, 3, 'Accoustique 8', 2491, '2 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 100, 'http://picsum.photos/id/229/100/150', 'http://picsum.photos/id/283/100/150', 'http://picsum.photos/id/403/100/150'),
	(25, 2, 3, 'Accoustique 9', 877, '8 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 27, 'http://picsum.photos/id/225/100/150', 'http://picsum.photos/id/323/100/150', 'http://picsum.photos/id/347/100/150'),
	(26, 2, 3, 'Accoustique 10', 87, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 27, 'http://picsum.photos/id/164/100/150', 'http://picsum.photos/id/278/100/150', 'http://picsum.photos/id/359/100/150'),
	(27, 2, 3, 'Accoustique 11', 1031, '9 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 10, 'http://picsum.photos/id/209/100/150', 'http://picsum.photos/id/316/100/150', 'http://picsum.photos/id/385/100/150'),
	(28, 2, 3, 'Accoustique 12', 1857, '9 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 42, 'http://picsum.photos/id/188/100/150', 'http://picsum.photos/id/251/100/150', 'http://picsum.photos/id/389/100/150'),
	(29, 2, 3, 'Accoustique 13', 150, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 70, 'http://picsum.photos/id/210/100/150', 'http://picsum.photos/id/328/100/150', 'http://picsum.photos/id/329/100/150'),
	(30, 2, 3, 'Accoustique 14', 2630, '8 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 40, 'http://picsum.photos/id/176/100/150', 'http://picsum.photos/id/266/100/150', 'http://picsum.photos/id/303/100/150'),
	(31, 2, 3, 'Accoustique 15', 2099, '0 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 66, 'http://picsum.photos/id/198/100/150', 'http://picsum.photos/id/325/100/150', 'http://picsum.photos/id/304/100/150'),
	(32, 2, 3, 'Accoustique 16', 1105, '5 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 99, 'http://picsum.photos/id/167/100/150', 'http://picsum.photos/id/300/100/150', 'http://picsum.photos/id/319/100/150'),
	(33, 2, 3, 'Accoustique 17', 2654, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 72, 'http://picsum.photos/id/147/100/150', 'http://picsum.photos/id/234/100/150', 'http://picsum.photos/id/300/100/150'),
	(34, 2, 3, 'Accoustique 18', 2449, '1 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 20, 'http://picsum.photos/id/113/100/150', 'http://picsum.photos/id/310/100/150', 'http://picsum.photos/id/388/100/150'),
	(35, 2, 3, 'Accoustique 19', 2110, '4 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 99, 'http://picsum.photos/id/195/100/150', 'http://picsum.photos/id/256/100/150', 'http://picsum.photos/id/404/100/150'),
	(36, 3, 5, 'Basse accoustique 0', 2029, '7 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 100, 'http://picsum.photos/id/208/100/150', 'http://picsum.photos/id/218/100/150', 'http://picsum.photos/id/337/100/150'),
	(37, 3, 5, 'Basse accoustique 1', 179, '0 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 42, 'http://picsum.photos/id/162/100/150', 'http://picsum.photos/id/277/100/150', 'http://picsum.photos/id/335/100/150'),
	(38, 3, 5, 'Basse accoustique 2', 1392, '5 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 65, 'http://picsum.photos/id/228/100/150', 'http://picsum.photos/id/219/100/150', 'http://picsum.photos/id/375/100/150'),
	(39, 3, 5, 'Basse accoustique 3', 1525, '5 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 17, 'http://picsum.photos/id/192/100/150', 'http://picsum.photos/id/245/100/150', 'http://picsum.photos/id/345/100/150'),
	(40, 3, 5, 'Basse accoustique 4', 2131, '1 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 56, 'http://picsum.photos/id/156/100/150', 'http://picsum.photos/id/241/100/150', 'http://picsum.photos/id/427/100/150'),
	(41, 3, 5, 'Basse accoustique 5', 2582, '9 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 43, 'http://picsum.photos/id/185/100/150', 'http://picsum.photos/id/326/100/150', 'http://picsum.photos/id/308/100/150'),
	(42, 3, 5, 'Basse accoustique 6', 1115, '6 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 92, 'http://picsum.photos/id/122/100/150', 'http://picsum.photos/id/206/100/150', 'http://picsum.photos/id/340/100/150'),
	(43, 3, 5, 'Basse accoustique 7', 856, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 46, 'http://picsum.photos/id/222/100/150', 'http://picsum.photos/id/278/100/150', 'http://picsum.photos/id/300/100/150'),
	(44, 3, 5, 'Basse accoustique 8', 1020, '2 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 13, 'http://picsum.photos/id/144/100/150', 'http://picsum.photos/id/253/100/150', 'http://picsum.photos/id/300/100/150'),
	(45, 3, 5, 'Basse accoustique 9', 1760, '8 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 38, 'http://picsum.photos/id/186/100/150', 'http://picsum.photos/id/262/100/150', 'http://picsum.photos/id/404/100/150'),
	(46, 3, 5, 'Basse accoustique 10', 2516, '10 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 5, 'http://picsum.photos/id/117/100/150', 'http://picsum.photos/id/276/100/150', 'http://picsum.photos/id/419/100/150'),
	(47, 3, 5, 'Basse accoustique 11', 606, '10 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 48, 'http://picsum.photos/id/180/100/150', 'http://picsum.photos/id/230/100/150', 'http://picsum.photos/id/401/100/150'),
	(48, 3, 5, 'Basse accoustique 12', 1647, '2 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 70, 'http://picsum.photos/id/215/100/150', 'http://picsum.photos/id/210/100/150', 'http://picsum.photos/id/338/100/150'),
	(49, 3, 5, 'Basse accoustique 13', 2630, '1 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 18, 'http://picsum.photos/id/224/100/150', 'http://picsum.photos/id/315/100/150', 'http://picsum.photos/id/331/100/150'),
	(50, 3, 5, 'Basse accoustique 14', 1388, '2 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 20, 'http://picsum.photos/id/143/100/150', 'http://picsum.photos/id/261/100/150', 'http://picsum.photos/id/377/100/150'),
	(51, 3, 5, 'Basse accoustique 15', 2617, '1 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 9, 'http://picsum.photos/id/153/100/150', 'http://picsum.photos/id/283/100/150', 'http://picsum.photos/id/322/100/150'),
	(52, 3, 5, 'Basse accoustique 16', 1873, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 80, 'http://picsum.photos/id/109/100/150', 'http://picsum.photos/id/202/100/150', 'http://picsum.photos/id/384/100/150'),
	(53, 3, 5, 'Basse accoustique 17', 1274, '10 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 57, 'http://picsum.photos/id/211/100/150', 'http://picsum.photos/id/321/100/150', 'http://picsum.photos/id/322/100/150'),
	(54, 3, 5, 'Basse accoustique 18', 634, '4 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 33, 'http://picsum.photos/id/118/100/150', 'http://picsum.photos/id/275/100/150', 'http://picsum.photos/id/389/100/150'),
	(55, 3, 5, 'Basse accoustique 19', 185, '0 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 87, 'http://picsum.photos/id/210/100/150', 'http://picsum.photos/id/320/100/150', 'http://picsum.photos/id/319/100/150'),
	(56, 3, 5, 'Basse accoustique 20', 1922, '5 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 16, 'http://picsum.photos/id/153/100/150', 'http://picsum.photos/id/227/100/150', 'http://picsum.photos/id/369/100/150'),
	(57, 3, 5, 'Basse accoustique 21', 1807, '9 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 81, 'http://picsum.photos/id/175/100/150', 'http://picsum.photos/id/301/100/150', 'http://picsum.photos/id/367/100/150'),
	(58, 3, 5, 'Basse accoustique 22', 165, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 74, 'http://picsum.photos/id/217/100/150', 'http://picsum.photos/id/297/100/150', 'http://picsum.photos/id/401/100/150'),
	(59, 3, 5, 'Basse accoustique 23', 2529, '7 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 78, 'http://picsum.photos/id/149/100/150', 'http://picsum.photos/id/222/100/150', 'http://picsum.photos/id/362/100/150'),
	(60, 3, 5, 'Basse accoustique 24', 139, '5 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.000, 93, 'http://picsum.photos/id/230/100/150', 'http://picsum.photos/id/312/100/150', 'http://picsum.photos/id/382/100/150'),
	(61, 4, 6, 'Basse 0', 1516, '9 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 94, 'http://picsum.photos/id/127/100/150', 'http://picsum.photos/id/313/100/150', 'http://picsum.photos/id/373/100/150'),
	(62, 4, 6, 'Basse 1', 794, '4 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 66, 'http://picsum.photos/id/117/100/150', 'http://picsum.photos/id/319/100/150', 'http://picsum.photos/id/322/100/150'),
	(63, 4, 6, 'Basse 2', 541, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 88, 'http://picsum.photos/id/219/100/150', 'http://picsum.photos/id/205/100/150', 'http://picsum.photos/id/391/100/150'),
	(64, 4, 6, 'Basse 3', 2189, '1 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 7, 'http://picsum.photos/id/156/100/150', 'http://picsum.photos/id/286/100/150', 'http://picsum.photos/id/368/100/150'),
	(65, 4, 6, 'Basse 4', 1336, '8 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 98, 'http://picsum.photos/id/189/100/150', 'http://picsum.photos/id/263/100/150', 'http://picsum.photos/id/420/100/150'),
	(66, 4, 6, 'Basse 5', 2086, '4 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 77, 'http://picsum.photos/id/195/100/150', 'http://picsum.photos/id/313/100/150', 'http://picsum.photos/id/382/100/150'),
	(67, 4, 6, 'Basse 6', 2276, '10 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 16, 'http://picsum.photos/id/191/100/150', 'http://picsum.photos/id/240/100/150', 'http://picsum.photos/id/405/100/150'),
	(68, 4, 6, 'Basse 7', 1061, '10 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 54, 'http://picsum.photos/id/219/100/150', 'http://picsum.photos/id/288/100/150', 'http://picsum.photos/id/314/100/150'),
	(69, 4, 6, 'Basse 8', 1044, '6 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 43, 'http://picsum.photos/id/148/100/150', 'http://picsum.photos/id/277/100/150', 'http://picsum.photos/id/327/100/150'),
	(70, 4, 6, 'Basse 9', 217, '0 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 10, 'http://picsum.photos/id/140/100/150', 'http://picsum.photos/id/323/100/150', 'http://picsum.photos/id/404/100/150'),
	(71, 4, 6, 'Basse 10', 412, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 72, 'http://picsum.photos/id/130/100/150', 'http://picsum.photos/id/291/100/150', 'http://picsum.photos/id/321/100/150'),
	(72, 4, 6, 'Basse 11', 383, '7 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 8, 'http://picsum.photos/id/133/100/150', 'http://picsum.photos/id/238/100/150', 'http://picsum.photos/id/424/100/150'),
	(73, 4, 6, 'Basse 12', 1713, '8 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 95, 'http://picsum.photos/id/135/100/150', 'http://picsum.photos/id/274/100/150', 'http://picsum.photos/id/385/100/150'),
	(74, 4, 6, 'Basse 13', 2033, '5 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 78, 'http://picsum.photos/id/188/100/150', 'http://picsum.photos/id/281/100/150', 'http://picsum.photos/id/373/100/150'),
	(75, 4, 6, 'Basse 14', 2582, '0 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 80, 'http://picsum.photos/id/119/100/150', 'http://picsum.photos/id/271/100/150', 'http://picsum.photos/id/381/100/150'),
	(76, 4, 6, 'Basse 15', 1149, '1 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 82, 'http://picsum.photos/id/155/100/150', 'http://picsum.photos/id/315/100/150', 'http://picsum.photos/id/371/100/150'),
	(77, 4, 6, 'Basse 16', 1716, '6 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 90, 'http://picsum.photos/id/161/100/150', 'http://picsum.photos/id/279/100/150', 'http://picsum.photos/id/302/100/150'),
	(78, 4, 6, 'Basse 17', 1668, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 18, 'http://picsum.photos/id/184/100/150', 'http://picsum.photos/id/229/100/150', 'http://picsum.photos/id/333/100/150'),
	(79, 4, 6, 'Basse 18', 1259, '1 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 16, 'http://picsum.photos/id/215/100/150', 'http://picsum.photos/id/224/100/150', 'http://picsum.photos/id/395/100/150'),
	(80, 4, 6, 'Basse 19', 739, '0 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 51, 'http://picsum.photos/id/174/100/150', 'http://picsum.photos/id/261/100/150', 'http://picsum.photos/id/399/100/150'),
	(81, 4, 6, 'Basse 20', 380, '8 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 21, 'http://picsum.photos/id/127/100/150', 'http://picsum.photos/id/320/100/150', 'http://picsum.photos/id/351/100/150'),
	(82, 4, 6, 'Basse 21', 1785, '2 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 10, 'http://picsum.photos/id/106/100/150', 'http://picsum.photos/id/274/100/150', 'http://picsum.photos/id/380/100/150'),
	(83, 4, 6, 'Basse 22', 483, '9 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 13, 'http://picsum.photos/id/228/100/150', 'http://picsum.photos/id/289/100/150', 'http://picsum.photos/id/430/100/150'),
	(84, 4, 6, 'Basse 23', 2406, '10 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 55, 'http://picsum.photos/id/165/100/150', 'http://picsum.photos/id/300/100/150', 'http://picsum.photos/id/427/100/150'),
	(85, 4, 6, 'Basse 24', 1463, '2 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 10, 'http://picsum.photos/id/191/100/150', 'http://picsum.photos/id/278/100/150', 'http://picsum.photos/id/381/100/150'),
	(86, 4, 6, 'Basse 25', 1758, '6 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 35, 'http://picsum.photos/id/109/100/150', 'http://picsum.photos/id/228/100/150', 'http://picsum.photos/id/357/100/150'),
	(87, 4, 6, 'Basse 26', 1980, '1 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 1, 'http://picsum.photos/id/218/100/150', 'http://picsum.photos/id/219/100/150', 'http://picsum.photos/id/416/100/150'),
	(88, 4, 6, 'Basse 27', 1852, '3 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 47, 'http://picsum.photos/id/151/100/150', 'http://picsum.photos/id/287/100/150', 'http://picsum.photos/id/348/100/150'),
	(89, 4, 6, 'Basse 28', 808, '10 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 27, 'http://picsum.photos/id/175/100/150', 'http://picsum.photos/id/218/100/150', 'http://picsum.photos/id/313/100/150'),
	(90, 4, 6, 'Basse 29', 74, '0 chance(s) sur 10 de devenir sourd', '1 instrument', 0, 0.050, 7, 'http://picsum.photos/id/145/100/150', 'http://picsum.photos/id/330/100/150', 'http://picsum.photos/id/360/100/150');

-- Listage des données de la table MUSE.rememberme_token : ~0 rows (environ)

-- Listage des données de la table MUSE.reset_password_request : ~0 rows (environ)

-- Listage des données de la table MUSE.supplier : ~32 rows (environ)
INSERT INTO `supplier` (`id`, `name`) VALUES
	(1, 'Fender'),
	(2, 'Ibanez'),
	(3, 'P.R.S.'),
	(4, 'L.T.D.'),
	(5, 'Cordoba');

-- Listage des données de la table MUSE.user : ~0 rows (environ)
INSERT INTO `user` (`id`, `email`, `roles`, `password`, `user_name`, `user_lastname`, `birthdate`, `phone_number`, `is_verified`, `register_date`, `vat`, `pro`, `pro_company_name`, `pro_duns`, `pro_job_position`) VALUES
	(1, 'admin@muse.com', '["ROLE_ADMIN","ROLE_SALES","ROLE_SHIP","ROLE_PRO","ROLE_CLIENT","ROLE_USER"]', '$2y$13$PZw9BUXghRkdw4km2ppG0ehLqUcPLQfGc.yqcnzVQKQtAMprQezaq', 'admin', 'admin', '2022-12-12 00:00:00', '0999999999', 1, '2022-12-12 00:00:00', 0.10, 0, NULL, NULL, NULL),
	(2, 'sales@muse.com', '["ROLE_SALES","ROLE_SHIP","ROLE_PRO","ROLE_CLIENT","ROLE_USER"]', '$2y$13$Y9jhFf0zqEE3VuiSM/MAWOaWb/BjPXEYS5XLofXiMblGMwPn10NM.', 'sales', 'sales', '2022-12-12 00:00:00', '0999999999', 1, '2022-12-12 00:00:00', 0.10, 0, NULL, NULL, NULL),
	(3, 'ship@muse.com', '["ROLE_SHIP","ROLE_PRO","ROLE_CLIENT","ROLE_USER"]', '$2y$13$Q.ImzwZ8ydgxCcBGJM/hO.c99EDiDaIyqgsZyzhDyX08gCANPv8oe', 'ship', 'ship', '2022-12-12 00:00:00', '0999999999', 1, '2022-12-12 00:00:00', 0.10, 0, NULL, NULL, NULL),
	(4, 'pro@muse.com', '["ROLE_PRO","ROLE_CLIENT","ROLE_USER"]', '$2y$13$ToHhyZypo3kZTWxAsrfbN.652h8TJnkRR4ogzRVBqvq.gGoq18qW.', 'pro', 'pro', '2022-12-12 00:00:00', '0999999999', 1, '2022-12-12 00:00:00', 0.10, 0, NULL, NULL, NULL),
	(5, 'client@muse.com', '["ROLE_CLIENT","ROLE_USER"]', '$2y$13$6F9e91dSUKZB23szVQbpR.ysF00q21EKJZDCfrAOEWRoy.M5adR8m', 'client', 'client', '2022-12-12 00:00:00', '0999999999', 1, '2022-12-12 00:00:00', 0.20, 0, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
