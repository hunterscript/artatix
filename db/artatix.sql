-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Sep 2021 pada 03.58
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artatix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `banner_id` varchar(20) NOT NULL,
  `banner_picture` varchar(50) NOT NULL,
  `banner_status` varchar(20) NOT NULL,
  `event_id` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` varchar(20) NOT NULL,
  `event_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tkt_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `cart_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_cart`
--

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
('CRT019', 'EVN001', 'TKT001', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cst_id` varchar(20) NOT NULL,
  `cst_name` varchar(50) NOT NULL,
  `cst_identity` varchar(20) NOT NULL,
  `cst_no_id` varchar(50) NOT NULL,
  `cst_email` varchar(50) NOT NULL,
  `cst_notelp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_customer`
--

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
('CST014', '', 'KTP', '', 'ahmadzxe33@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_event`
--

CREATE TABLE `tbl_event` (
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
  `user_id` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `event_name`, `event_category`, `event_picture`, `event_description`, `event_location`, `event_date_start`, `event_date_finish`, `event_time_start`, `event_time_finish`, `event_status`, `event_sk`, `event_jenis`, `user_id`) VALUES
('EVN001', 'Lostsaga Championship 2020', 'Sport', 'Slicing To HTML Banner.png', 'Turnamen BERGENGSI skala nasional', 'Bekasi', '2021-08-19', '2021-08-26', '21:26:00', '21:26:00', '1', 'Wajib Pake Masker', '1', 'USR002'),
('EVN002', 'Bertarung Dengan Goku', 'Sport', '1062x427.png', 'Hadirilah pertarungan sengit Goku vs Vegeta Herbal', 'Bekasi', '2021-08-11', '2021-08-12', '22:34:00', '22:34:00', '1', 'Wajib mempunyai energy ki, untuk bertahan', '0', 'USR002'),
('EVN003', 'Celebration Night Music', 'Festival', 'Banner CB Music.png', 'Music Penuh ', 'Yogyakarta', '2021-08-20', '2021-08-21', '22:03:00', '22:03:00', '0', '- Wajib Memakai Masker\r\n- Sertakan SUrat  Vaksin', '1', 'USR003'),
('EVN004', 'Coding Bootcamp', 'Lifestyle, Conference', '1120937847-olivier-collet-JMwCe3w7qKk-unsplash.jpg', 'Coding adalah logika dari pseudocode atau diagram alur yang akan di implementasikan ke dalam suatu bahasa pemograman baik huruf, angka dan simbol-simbol yang akan membentuk suatu program, atau kata lainnya adalah coding sebagai dasar dalam membuat suatu program baik itu aplikasi, game, maupun website.', 'Indonesia', '2021-09-08', '2021-09-09', '15:03:00', '15:03:00', '0', 'Coding adalah logika dari pseudocode atau diagram alur yang akan di implementasikan ke dalam suatu bahasa pemograman baik huruf, angka dan simbol-simbol yang akan membentuk suatu program, atau kata lainnya adalah coding sebagai dasar dalam membuat suatu program baik itu aplikasi, game, maupun website.', '0', 'USR006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_expand_form`
--

CREATE TABLE `tbl_expand_form` (
  `expn_id` varchar(20) NOT NULL,
  `expn_tittle` text NOT NULL,
  `expn_desc` text NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `tkt_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `expn_html_label` varchar(50) NOT NULL,
  `expn_html_textboxt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pay`
--

CREATE TABLE `tbl_pay` (
  `pay_id` varchar(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_status` enum('belum bayar','sudah bayar','kadaluarsa') NOT NULL,
  `cst_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pay`
--

INSERT INTO `tbl_pay` (`pay_id`, `pay_date`, `pay_status`, `cst_id`) VALUES
('1', '2021-09-07', 'sudah bayar', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_seat`
--

CREATE TABLE `tbl_seat` (
  `seat_id` varchar(20) NOT NULL,
  `seat_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ticket`
--

CREATE TABLE `tbl_ticket` (
  `tkt_id` varchar(20) NOT NULL,
  `event_id` varchar(20) NOT NULL,
  `tkt_category` varchar(30) NOT NULL,
  `tkt_stock` int(15) NOT NULL,
  `tkt_price` int(15) NOT NULL,
  `tkt_date_start` varchar(15) NOT NULL,
  `tkt_date_finish` varchar(15) NOT NULL,
  `tkt_desc` text NOT NULL,
  `tkt_status` int(11) NOT NULL,
  `tkt_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ticket`
--

INSERT INTO `tbl_ticket` (`tkt_id`, `event_id`, `tkt_category`, `tkt_stock`, `tkt_price`, `tkt_date_start`, `tkt_date_finish`, `tkt_desc`, `tkt_status`, `tkt_fee`) VALUES
('TKT001', 'EVN001', 'VIP', 10, 300000, '17 Aug 2021', '18 Aug 2021', 'Tiket VIP dgn akes special', 1, 0),
('TKT002', 'EVN001', 'PLATINUM', 100, 200000, '05 Aug 2021', '19 Aug 2021', 'Okeee', 0, 0),
('TKT003', 'EVN002', 'VIP', 100, 400000, '02 Aug 2021', '02 Aug 2021', 'DDDD', 0, 0),
('TKT004', 'EVN002', 'GOLD', 100, 9000000, '05 Aug 2021', '05 Aug 2021', 'Hey', 1, 0),
('TKT005', 'EVN003', 'GOLD', 100, 600000, '20 Aug 2021', '21 Aug 2021', 'Ini deskripsi', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `trans_id` varchar(20) NOT NULL,
  `cst_id` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `cart_id` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `trans_total` int(15) DEFAULT NULL,
  `trans_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaction`
--

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
('TRS014', 'CST014', 'CRT019', 300000, '2021-09-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` varchar(20) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_nmlengkap` varchar(50) NOT NULL,
  `user_notelp` varchar(50) NOT NULL,
  `user_level` varchar(35) NOT NULL,
  `uservl_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_email`, `user_password`, `user_nmlengkap`, `user_notelp`, `user_level`, `uservl_status`) VALUES
('USR001', 'admin@artatix.com', '21232f297a57a5a743894a0e4a801fc3', 'admin artatix', '0895324992929', 'admin', '1'),
('USR002', 'harris@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'Member', '085711573434', 'member', '0'),
('USR003', 'revz@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'Member', '089587339333', 'member', '0'),
('USR004', 'rizky@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'Member', '0', 'member', '0'),
('USR005', 'ahmad@z.com', '2e16ee8d0dffa12f539f5c3fb9a95736', 'Member', '0', 'member', '0'),
('USR006', 'aku@yandex.com', 'aa08769cdcb26674c6706093503ff0a3', 'Member', '0', 'member', '1'),
('USR007', 'ahmad@pentest.com', 'aa08769cdcb26674c6706093503ff0a3', 'Ahmad Ganteng', '0895605997185', 'member', '0'),
('USR008', 'ahmadsaleh2409@gmail.com', NULL, 'Ahmad Shaleh', '0', 'member', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_vl`
--

CREATE TABLE `tbl_user_vl` (
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
  `uservl_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_vl`
--

INSERT INTO `tbl_user_vl` (`uservl_id`, `user_id`, `uservl_img_identity1`, `uservl_number_identity1`, `uservl_name_identity1`, `uservl_address_identity1`, `uservl_img_identity2`, `uservl_number_identity2`, `uservl_name_identity2`, `uservl_address_identity2`, `uservl_status`) VALUES
('USRVL001', 'USR003', 'KTP.jfif', '321605301097000', 'Andi Subagio', 'Jl Lebak Mangga, Bandung , Jawa barat ', 'npwp.jpg', '9305799449333', 'Andi Subagio', 'Jl Lebak Mangga, Bandung , Jawa barat ', 'Need Verification'),
('USRVL434', 'USR006', '869645039-undraw_speech_to_text_9uir.png', '1293109', '1293109', '1293109', '1619766397-undraw_speech_to_text_9uir.png', '1293109', '1293109', '1293109', 'Need Verification');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`banner_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indeks untuk tabel `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `tkt_id` (`tkt_id`),
  ADD KEY `event_id_fk` (`event_id`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cst_id`);

--
-- Indeks untuk tabel `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indeks untuk tabel `tbl_expand_form`
--
ALTER TABLE `tbl_expand_form`
  ADD PRIMARY KEY (`expn_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tkt_id` (`tkt_id`);

--
-- Indeks untuk tabel `tbl_pay`
--
ALTER TABLE `tbl_pay`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indeks untuk tabel `tbl_seat`
--
ALTER TABLE `tbl_seat`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indeks untuk tabel `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  ADD PRIMARY KEY (`tkt_id`),
  ADD KEY `fk_event_id` (`event_id`);

--
-- Indeks untuk tabel `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `fk_cart_qty` (`cart_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tbl_user_vl`
--
ALTER TABLE `tbl_user_vl`
  ADD PRIMARY KEY (`uservl_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD CONSTRAINT `fk_evnt_id` FOREIGN KEY (`event_id`) REFERENCES `tbl_event` (`event_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `tbl_event` (`event_id`),
  ADD CONSTRAINT `tkt_id_fk` FOREIGN KEY (`tkt_id`) REFERENCES `tbl_ticket` (`tkt_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  ADD CONSTRAINT `fk_event_id` FOREIGN KEY (`event_id`) REFERENCES `tbl_event` (`event_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD CONSTRAINT `fk_cart_qty` FOREIGN KEY (`cart_id`) REFERENCES `tbl_cart` (`cart_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_user_vl`
--
ALTER TABLE `tbl_user_vl`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
