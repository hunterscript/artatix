-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table prj_artatix.tbl_banner
DROP TABLE IF EXISTS `tbl_banner`;
CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `banner_id` varchar(20) NOT NULL,
  `banner_picture` varchar(50) NOT NULL,
  `banner_status` varchar(20) NOT NULL,
  `event_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`banner_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `fk_evnt_id` FOREIGN KEY (`event_id`) REFERENCES `tbl_event` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table prj_artatix.tbl_banner: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_banner` ENABLE KEYS */;

-- Dumping structure for table prj_artatix.tbl_cart
DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cart_id` varchar(20) NOT NULL,
  `event_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tkt_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `cart_qty` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `tkt_id` (`tkt_id`),
  KEY `event_id_fk` (`event_id`),
  CONSTRAINT `event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `tbl_event` (`event_id`),
  CONSTRAINT `tkt_id_fk` FOREIGN KEY (`tkt_id`) REFERENCES `tbl_ticket` (`tkt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table prj_artatix.tbl_cart: ~21 rows (approximately)
/*!40000 ALTER TABLE `tbl_cart` DISABLE KEYS */;
INSERT INTO `tbl_cart` (`cart_id`, `event_id`, `tkt_id`, `cart_qty`) VALUES
	('CRT001', 'EVN001', 'TKT001', 1),
	('CRT002', 'EVN001', 'TKT001', 1),
	('CRT003', 'EVN001', 'TKT001', 1),
	('CRT004', 'EVN003', 'TKT005', 1),
	('CRT005', 'EVN003', 'TKT005', 2),
	('CRT006', 'EVN003', 'TKT005', 1),
	('CRT007', 'EVN003', 'TKT005', 1),
	('CRT008', 'EVN003', 'TKT005', 1),
	('CRT009', 'EVN001', 'TKT001', 1),
	('CRT010', 'EVN003', 'TKT005', 1),
	('CRT011', 'EVN003', 'TKT005', 1),
	('CRT012', 'EVN003', 'TKT005', 1),
	('CRT013', 'EVN001', 'TKT001', 1),
	('CRT014', 'EVN001', 'TKT001', 1),
	('CRT015', 'EVN001', 'TKT001', 1),
	('CRT016', 'EVN001', 'TKT001', 1),
	('CRT017', 'EVN001', 'TKT001', 1),
	('CRT018', 'EVN001', 'TKT001', 2),
	('CRT019', 'EVN001', 'TKT001', 1),
	('CRT020', 'EVN001', 'TKT001', 1),
	('CRT021', 'EVN001', 'TKT001', 1);
/*!40000 ALTER TABLE `tbl_cart` ENABLE KEYS */;

-- Dumping structure for table prj_artatix.tbl_customer
DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `cst_id` varchar(20) NOT NULL,
  `cst_name` varchar(50) NOT NULL,
  `cst_identity` varchar(20) NOT NULL,
  `cst_no_id` varchar(50) NOT NULL,
  `cst_email` varchar(50) NOT NULL,
  `cst_notelp` varchar(20) NOT NULL,
  PRIMARY KEY (`cst_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table prj_artatix.tbl_customer: ~15 rows (approximately)
/*!40000 ALTER TABLE `tbl_customer` DISABLE KEYS */;
INSERT INTO `tbl_customer` (`cst_id`, `cst_name`, `cst_identity`, `cst_no_id`, `cst_email`, `cst_notelp`) VALUES
	('CST001', '', 'KTP', '', 'ahmad123@gmail.com', ''),
	('CST002', '', 'KTP', '', 'ahmad@gmail.com', ''),
	('CST003', '', 'KTP', '', 'coba@gmail.com', ''),
	('CST004', 'ahmad@y.com', 'KTP', '123', 'ahmad@y.com', '123'),
	('CST005', '', 'KTP', '', 'ahmad@gmail.com', ''),
	('CST006', '', 'KTP', '', 'ahmad23@gmail.com', ''),
	('CST007', '', 'KTP', '', 'andri@gmail.com', ''),
	('CST008', '', 'KTP', '', 'ahmad@gmail.com', ''),
	('CST009', '', 'KTP', '', 'a@a.com', ''),
	('CST010', '', 'KTP', '', 'a@a.com', ''),
	('CST011', '', 'KTP', '', 'aaa@a.a', ''),
	('CST012', '', 'KTP', '', 'tes@mail.com', ''),
	('CST013', '', 'KTP', '', 'ahmad@gmail.com', ''),
	('CST014', '', 'KTP', '', 'ahmadzxe33@gmail.com', ''),
	('CST015', 'Faizal Triswanto', 'KTP', '324234', 'faizaltriswanto@gmail.com', '2342');
/*!40000 ALTER TABLE `tbl_customer` ENABLE KEYS */;

-- Dumping structure for table prj_artatix.tbl_event
DROP TABLE IF EXISTS `tbl_event`;
CREATE TABLE IF NOT EXISTS `tbl_event` (
  `event_id` varchar(20) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_category` varchar(50) NOT NULL,
  `event_picture` varchar(50) NOT NULL,
  `event_description` text NOT NULL,
  `event_location` text NOT NULL,
  `event_date_start` varchar(15) NOT NULL,
  `event_date_finish` varchar(15) NOT NULL,
  `event_time_start` time NOT NULL,
  `event_time_finish` time NOT NULL,
  `event_status` varchar(20) NOT NULL,
  `event_sk` text NOT NULL,
  `event_jenis` varchar(20) NOT NULL,
  `link` varchar(30) DEFAULT NULL,
  `user_id` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `fk_user` (`user_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table prj_artatix.tbl_event: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_event` DISABLE KEYS */;
INSERT INTO `tbl_event` (`event_id`, `event_name`, `event_category`, `event_picture`, `event_description`, `event_location`, `event_date_start`, `event_date_finish`, `event_time_start`, `event_time_finish`, `event_status`, `event_sk`, `event_jenis`, `link`, `user_id`) VALUES
	('EVN001', 'Lostsaga Championship 2020', 'Sport', 'Slicing To HTML Banner.png', 'Turnamen BERGENGSI skala nasional', 'Bekasi', '2021-08-19', '2021-08-26', '21:26:00', '21:26:00', '1', 'Wajib Pake Masker', '1', NULL, 'USR002'),
	('EVN002', 'Bertarung Dengan Goku', 'Sport', '1062x427.png', 'Hadirilah pertarungan sengit Goku vs Vegeta Herbal', 'Bekasi', '2021-08-11', '2021-08-12', '22:34:00', '22:34:00', '1', 'Wajib mempunyai energy ki, untuk bertahan', '0', NULL, 'USR002'),
	('EVN003', 'Celebration Night Music', 'Festival', 'Banner CB Music.png', 'Music Penuh ', 'Yogyakarta', '2021-08-20', '2021-08-21', '22:03:00', '22:03:00', '0', '- Wajib Memakai Masker\r\n- Sertakan SUrat  Vaksin', '1', NULL, 'USR003'),
	('EVN004', 'Coding Bootcamp', 'Sport', 'Untitled.png', '<p>Coding adalah logika dari pseudocode atau diagram alur yang akan di implementasikan ke dalam suatu bahasa pemograman baik huruf, angka dan simbol-simbol yang akan membentuk suatu program, atau kata lainnya adalah coding sebagai dasar dalam membuat suatu program baik itu aplikasi, game, maupun website.</p>\r\n', 'Indonesia', '2021-09-29', '2021-09-29', '15:03:00', '15:03:00', '0', 'Coding adalah logika dari pseudocode atau diagram alur yang akan di implementasikan ke dalam suatu bahasa pemograman baik huruf, angka dan simbol-simbol yang akan membentuk suatu program, atau kata lainnya adalah coding sebagai dasar dalam membuat suatu program baik itu aplikasi, game, maupun website.', '1', 'coding-bootcamp', 'USR006');
/*!40000 ALTER TABLE `tbl_event` ENABLE KEYS */;

-- Dumping structure for table prj_artatix.tbl_expand_form
DROP TABLE IF EXISTS `tbl_expand_form`;
CREATE TABLE IF NOT EXISTS `tbl_expand_form` (
  `expn_id` varchar(20) NOT NULL,
  `expn_tittle` text NOT NULL,
  `expn_desc` text NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `tkt_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `expn_html_label` varchar(50) NOT NULL,
  `expn_html_textboxt` varchar(50) NOT NULL,
  PRIMARY KEY (`expn_id`),
  KEY `user_id` (`user_id`),
  KEY `tkt_id` (`tkt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table prj_artatix.tbl_expand_form: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_expand_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_expand_form` ENABLE KEYS */;

-- Dumping structure for table prj_artatix.tbl_pay
DROP TABLE IF EXISTS `tbl_pay`;
CREATE TABLE IF NOT EXISTS `tbl_pay` (
  `pay_id` varchar(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_status` enum('belum bayar','sudah bayar','kadaluarsa') NOT NULL,
  `cst_id` varchar(20) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table prj_artatix.tbl_pay: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_pay` DISABLE KEYS */;
INSERT INTO `tbl_pay` (`pay_id`, `pay_date`, `pay_status`, `cst_id`) VALUES
	('1', '2021-09-07', 'sudah bayar', '1');
/*!40000 ALTER TABLE `tbl_pay` ENABLE KEYS */;

-- Dumping structure for table prj_artatix.tbl_seat
DROP TABLE IF EXISTS `tbl_seat`;
CREATE TABLE IF NOT EXISTS `tbl_seat` (
  `seat_id` varchar(20) NOT NULL,
  `seat_no` varchar(50) NOT NULL,
  PRIMARY KEY (`seat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table prj_artatix.tbl_seat: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_seat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_seat` ENABLE KEYS */;

-- Dumping structure for table prj_artatix.tbl_ticket
DROP TABLE IF EXISTS `tbl_ticket`;
CREATE TABLE IF NOT EXISTS `tbl_ticket` (
  `tkt_id` varchar(20) NOT NULL,
  `event_id` varchar(20) NOT NULL,
  `tkt_category` varchar(30) NOT NULL,
  `tkt_stock` int(15) NOT NULL,
  `tkt_price` double(15,0) NOT NULL DEFAULT '0',
  `tkt_date_start` varchar(15) NOT NULL,
  `tkt_date_finish` varchar(15) NOT NULL,
  `tkt_desc` text NOT NULL,
  `tkt_status` int(11) NOT NULL,
  `tkt_fee` int(11) NOT NULL,
  PRIMARY KEY (`tkt_id`),
  KEY `fk_event_id` (`event_id`),
  CONSTRAINT `fk_event_id` FOREIGN KEY (`event_id`) REFERENCES `tbl_event` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table prj_artatix.tbl_ticket: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_ticket` DISABLE KEYS */;
INSERT INTO `tbl_ticket` (`tkt_id`, `event_id`, `tkt_category`, `tkt_stock`, `tkt_price`, `tkt_date_start`, `tkt_date_finish`, `tkt_desc`, `tkt_status`, `tkt_fee`) VALUES
	('TKT001', 'EVN001', 'VIP', 10, 300000, '17 Aug 2021', '18 Sep 2021', 'Tiket VIP dgn akes special', 1, 0),
	('TKT002', 'EVN001', 'PLATINUM', 100, 200000, '05 Aug 2021', '19 Sep 2021', 'Okeee', 1, 0),
	('TKT003', 'EVN002', 'VIP', 100, 400000, '02 Aug 2021', '02 Aug 2021', 'DDDD', 0, 0),
	('TKT004', 'EVN002', 'GOLD', 100, 9000000, '05 Aug 2021', '05 Aug 2021', 'Hey', 1, 0),
	('TKT005', 'EVN003', 'GOLD', 100, 600000, '20 Aug 2021', '21 Aug 2021', 'Ini deskripsi', 1, 0),
	('TKT006', 'EVN004', 'PREMIUM', 100, 10000000000, '30 Sep 2021', '30 Sep 2021', 'ok', 1, 100000);
/*!40000 ALTER TABLE `tbl_ticket` ENABLE KEYS */;

-- Dumping structure for table prj_artatix.tbl_transaction
DROP TABLE IF EXISTS `tbl_transaction`;
CREATE TABLE IF NOT EXISTS `tbl_transaction` (
  `trans_id` varchar(20) NOT NULL,
  `cst_id` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `cart_id` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `trans_total` int(15) DEFAULT NULL,
  `trans_date` date DEFAULT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `fk_cart_qty` (`cart_id`),
  CONSTRAINT `fk_cart_qty` FOREIGN KEY (`cart_id`) REFERENCES `tbl_cart` (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table prj_artatix.tbl_transaction: ~15 rows (approximately)
/*!40000 ALTER TABLE `tbl_transaction` DISABLE KEYS */;
INSERT INTO `tbl_transaction` (`trans_id`, `cst_id`, `cart_id`, `trans_total`, `trans_date`) VALUES
	('TRS001', 'CST001', 'CRT001', 300000, '2021-09-06'),
	('TRS002', 'CST002', 'CRT001', 300000, '2021-09-06'),
	('TRS003', 'CST003', 'CRT003', 300000, '2021-09-06'),
	('TRS004', 'CST004', 'CRT004', 600000, '2021-09-06'),
	('TRS005', 'CST005', 'CRT005', 1200000, '2021-09-07'),
	('TRS006', 'CST006', 'CRT006', 600000, '2021-09-07'),
	('TRS007', 'CST007', 'CRT008', 600000, '2021-09-07'),
	('TRS008', 'CST008', 'CRT009', 300000, '2021-09-07'),
	('TRS009', 'CST009', 'CRT010', 600000, '2021-09-07'),
	('TRS010', 'CST010', 'CRT012', 600000, '2021-09-07'),
	('TRS011', 'CST011', 'CRT012', 600000, '2021-09-07'),
	('TRS012', 'CST012', 'CRT012', 600000, '2021-09-07'),
	('TRS013', 'CST013', 'CRT018', 600000, '2021-09-09'),
	('TRS014', 'CST014', 'CRT019', 300000, '2021-09-11'),
	('TRS015', 'CST015', 'CRT021', 300000, '2021-09-27');
/*!40000 ALTER TABLE `tbl_transaction` ENABLE KEYS */;

-- Dumping structure for table prj_artatix.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` varchar(20) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_nmlengkap` varchar(50) NOT NULL,
  `user_notelp` varchar(50) NOT NULL,
  `user_level` varchar(35) NOT NULL,
  `uservl_status` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table prj_artatix.tbl_user: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`user_id`, `user_email`, `user_password`, `user_nmlengkap`, `user_notelp`, `user_level`, `uservl_status`) VALUES
	('USR001', 'admin@artatix.com', '21232f297a57a5a743894a0e4a801fc3', 'admin artatix', '0895324992929', 'admin', '1'),
	('USR002', 'harris@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'Member', '085711573434', 'member', '0'),
	('USR003', 'revz@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'Member', '089587339333', 'member', '0'),
	('USR004', 'rizky@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'Member', '0', 'member', '0'),
	('USR005', 'ahmad@z.com', '2e16ee8d0dffa12f539f5c3fb9a95736', 'Member', '0', 'member', '0'),
	('USR006', 'aku@yandex.com', 'aa08769cdcb26674c6706093503ff0a3', 'Member', '0', 'member', '1'),
	('USR007', 'ahmad@pentest.com', 'aa08769cdcb26674c6706093503ff0a3', 'Ahmad Ganteng', '0895605997185', 'member', '0'),
	('USR008', 'ahmadsaleh2409@gmail.com', NULL, 'Ahmad Shaleh', '0', 'member', '0');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

-- Dumping structure for table prj_artatix.tbl_user_vl
DROP TABLE IF EXISTS `tbl_user_vl`;
CREATE TABLE IF NOT EXISTS `tbl_user_vl` (
  `uservl_id` varchar(20) NOT NULL,
  `user_id` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `uservl_img_identity1` longtext NOT NULL,
  `uservl_number_identity1` longtext NOT NULL,
  `uservl_name_identity1` varchar(30) NOT NULL,
  `uservl_address_identity1` varchar(50) NOT NULL,
  `uservl_img_identity2` longtext NOT NULL,
  `uservl_number_identity2` longtext NOT NULL,
  `uservl_name_identity2` varchar(30) NOT NULL,
  `uservl_address_identity2` varchar(50) NOT NULL,
  `uservl_status` varchar(20) NOT NULL,
  PRIMARY KEY (`uservl_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table prj_artatix.tbl_user_vl: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_user_vl` DISABLE KEYS */;
INSERT INTO `tbl_user_vl` (`uservl_id`, `user_id`, `uservl_img_identity1`, `uservl_number_identity1`, `uservl_name_identity1`, `uservl_address_identity1`, `uservl_img_identity2`, `uservl_number_identity2`, `uservl_name_identity2`, `uservl_address_identity2`, `uservl_status`) VALUES
	('USRVL001', 'USR003', 'KTP.jfif', '321605301097000', 'Andi Subagio', 'Jl Lebak Mangga, Bandung , Jawa barat ', 'npwp.jpg', '9305799449333', 'Andi Subagio', 'Jl Lebak Mangga, Bandung , Jawa barat ', 'Need Verification'),
	('USRVL3488', 'USR002', '2061845070-thumb-1920-1111113.jpg', '21', '123', '123', '340792249-wp9541132.jpg', '123', '123', '123', 'Need Verification'),
	('USRVL434', 'USR006', '869645039-undraw_speech_to_text_9uir.png', '1293109', '1293109', '1293109', '1619766397-undraw_speech_to_text_9uir.png', '1293109', '1293109', '1293109', 'Need Verification');
/*!40000 ALTER TABLE `tbl_user_vl` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
