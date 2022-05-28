-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 10:16 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cekberkasta`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `ID` int(11) NOT NULL,
  `idBarcode` varchar(50) NOT NULL,
  `tugas` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `log_waktu` varchar(50) NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `no_berkas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`ID`, `idBarcode`, `tugas`, `foto`, `keterangan`, `log_waktu`, `petugas`, `no_berkas`) VALUES
(47, '148;2022;Pemecahan Bidang;NURSAHDI', '(1) Terima: berkas dari loket (Pelaksana)', '380299934.jpg', 'berkas sudah selesai', '1650794572', 'adreena', 148),
(48, '148;2022;Pemecahan Bidang;NURSAHDI', '(2) Kirim:  draft STP ke Koorsub (Pelaksana)', '223772218.jpg', 'berkas sudah selesai', '1650795184', 'Muslih Fauzi', 148),
(49, '148;2022;Pemecahan Bidang;NURSAHDI', '(3) Terima: draft STP dari Pelaksana (Koorsub2)', '891319242.jpg', 'berkas sudah selesai', '1650800104', 'Muslih Fauzi', 148),
(50, '148;2022;Pemecahan Bidang;NURSAHDI', '(4) Kirim: STP Paraf ke Kasi (Koorsub2)', '453276532.jpg', 'berkas sudah selesai', '1650808136', 'Muslih Fauzi', 148),
(54, '148;2022;Pemecahan Bidang;NURSAHDI', '(5) Terima: STP Paraf dari Koorsub (Kasi SP)', '580856924.jpg', 'berkas sudah selesai', '1650824048', 'Muslih Fauzi', 148),
(58, '148;2022;Pemecahan Bidang;NURSAHDI', '(6) Kirim: STP TTD ke Pelaksana (Kasi SP)', '384044775.jpg', 'berkas sudah selesai', '1651344270', 'Muslih Fauzi', 148),
(59, '148;2022;Pemecahan Bidang;NURSAHDI', '(7) Terima: STP TTD dari Kasi (Pelaksana)', '375382496.jpg', 'berkas sudah selesai', '1651344388', 'Muslih Fauzi', 148),
(60, '111;2022;Pengembalian Batas;', '(20) Kirim: Berkas ke loket (Pelaksana)', '927804392.jpg', 'selesai', '1652926447', 'Muslih Fauzi', 111),
(61, '124;2022;Pendaftaran SK Hak;', '(20) Kirim: Berkas ke loket (Pelaksana)', '690131918.jpg', 'berkas selesai', '1652945153', 'Muslih Fauzi', 124),
(62, '330;2022;Penggabungan Bidang;', '(10) Kirim: Berkas ke Petugas Pemetaan (Petugas Uk', '116711919.jpg', 'proses', '1652946061', 'Muslih Fauzi', 330),
(63, '345;2022;Pelepasan Sebagian Hak;', '(6) Kirim: STP TTD ke Pelaksana (Kasi SP)', '642951691.jpg', 'proses', '1652946114', 'Muslih Fauzi', 345),
(64, '346;2022;Sertipikat Pengganti Karena Blanko Lama;', '(12) Kirim: QC Berkas ke Koorsub1 (Pemetaan)', '611885109.jpg', 'proses', '1652946196', 'Muslih Fauzi', 346),
(65, '355;2022;Pengembalian Batas;', '(3) Terima: draft STP dari Pelaksana (Koorsub2)', '764078091.jpg', 'proses', '1652946305', 'Muslih Fauzi', 355),
(66, '356;2022;Pemisahan Bidang;', '(5) Terima: STP Paraf dari Koorsub (Kasi SP)', '42447110.jpg', 'proses', '1652946392', 'Muslih Fauzi', 356),
(67, '359;2022;Penggabungan Bidang;', '(20) Kirim: Berkas ke loket (Pelaksana)', '702994758.jpg', 'proses', '1652946515', 'Muslih Fauzi', 359),
(68, '370;2022;Pemisahan Bidang;', '(20) Kirim: Berkas ke loket (Pelaksana)', '457957257.jpg', 'selesai', '1652946602', 'Muslih Fauzi', 370),
(69, '371;2022;Pengembalian Batas;', '(7) Terima: STP TTD dari Kasi (Pelaksana)', '340455910.jpg', 'proses', '1652946815', 'Muslih Fauzi', 371),
(70, '372;2022;Sertipikat Pengganti Karena Blanko Lama;', '(8) Kirim: Berkas ke Petugas Ukur (Pelaksana)', '54017022.jpg', 'proses', '1652946866', 'Muslih Fauzi', 372),
(71, '372;2022;Sertipikat Pengganti Karena Blanko Lama;', '(3) Terima: draft STP dari Pelaksana (Koorsub2)', '959143636.jpg', 'proses', '1652947007', 'Muslih Fauzi', 372),
(72, '373;2022;Pemisahan Bidang;', '(14) Kirim: QC Berkas ke Koorsub2 (Koorsub1)', '822998479.jpg', 'proses', '1652947109', 'Muslih Fauzi', 373),
(73, '374;2022;Pengukuran Ulang Dan Pemetaan Kadastral;', '(17) Terima: QC Berkas dari Koorsub2 (Kasi SP)', '599611230.jpg', 'proses', '1652947163', 'Muslih Fauzi', 374),
(74, '375;2022;Pemisahan Bidang;', '(3) Terima: draft STP dari Pelaksana (Koorsub2)', '59058302.jpg', 'proses', '1652947231', 'Muslih Fauzi', 375),
(75, '380;2022;Pemisahan Bidang;', '(2) Kirim:  draft STP ke Koorsub (Pelaksana)', '13347639.jpg', 'proses', '1652947285', 'Muslih Fauzi', 380),
(76, '381;2022;Pemisahan Bidang;', '(20) Kirim: Berkas ke loket (Pelaksana)', '1064790197.jpg', 'selesai', '1652949989', 'Muslih Fauzi', 381),
(77, '373;2022;Pemisahan Bidang;', '(15) Terima: QC Berkas dari Koorsub1 (Koorsub2)', '636816135.jpg', 'proses', '1652951991', 'Muslih Fauzi', 373),
(78, '373;2022;Pemisahan Bidang;', '(16) Kirim: QC Berkas ke Kasi (Koorsub2)', '549895007.jpg', 'proses', '1652952105', 'Muslih Fauzi', 373),
(87, '373;2022;Pemisahan Bidang;', '(17) Terima: QC Berkas dari Koorsub2 (Kasi SP)', '', '', '1652979751', 'Muslih Fauzi', 373);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `no_berkas` int(5) NOT NULL,
  `tahun_berkas` int(4) NOT NULL,
  `prosedur` varchar(255) NOT NULL,
  `pemohon` varchar(100) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `no_DI302` int(5) NOT NULL,
  `tgl_DI302` varchar(50) NOT NULL,
  `no_STP` varchar(50) NOT NULL,
  `luas` varchar(50) NOT NULL,
  `jatuh_tempo` varchar(50) NOT NULL,
  `status_berkas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`no_berkas`, `tahun_berkas`, `prosedur`, `pemohon`, `kecamatan`, `desa`, `no_DI302`, `tgl_DI302`, `no_STP`, `luas`, `jatuh_tempo`, `status_berkas`) VALUES
(111, 2022, 'Pengembalian Batas', 'HASAN BADO', 'TINAMBUNG', 'Sepabatu', 111, '1651055700', '111/2022', '200', '1652524500', 'Berkas Selesai'),
(124, 2022, 'Pendaftaran SK Hak', 'AHMAD', 'TINAMBUNG', 'Lekopaddis', 124, '1650850500', '124/2022', '157', '1655429700', 'Berkas Selesai'),
(148, 2022, 'Pemecahan Bidang', 'NURSAHDI SALEH', 'WONOMULYO', 'Arjosari', 300, '1651026600', '255/2022', '355', '1652841000', 'Proses Sudah Jatuh Tempo'),
(330, 2022, 'Penggabungan Bidang', 'ANDI BASO', 'POLEWALI', 'Darma', 330, '1651194900', '330/2022', '1023', '1653009300', 'Proses Sudah Jatuh Tempo'),
(345, 2022, 'Pelepasan Sebagian Hak', 'SALEH', 'MATAKALI', 'Barumbung', 123, '1650277320', '120/2022', '752', '1652091720', 'Proses Sudah Jatuh Tempo'),
(346, 2022, 'Sertipikat Pengganti Karena Blanko Lama', 'MUHAMMAD ARHAM', 'WONOMULYO', 'Arjosari', 347, '1651026600', '347/2022', '556', '1653273000', 'Proses Belum Jatuh Tempo'),
(355, 2022, 'Pengembalian Batas', 'NURSAHDI SALEH', 'POLEWALI', 'Darma', 100, '1651228020', '150/2022', '614', '1652696820', 'Proses Sudah Jatuh Tempo'),
(356, 2022, 'Pemisahan Bidang', 'MUH. NURFAHRI', 'POLEWALI', 'Darma', 101, '1652005680', '101/2022', '106', '1653820080', 'Proses Belum Jatuh Tempo'),
(359, 2022, 'Penggabungan Bidang', 'ANDI BASO', 'TINAMBUNG', 'Batulaya', 105, '1652059740', '105/2022', '336', '1653874140', 'Berkas Selesai'),
(370, 2022, 'Pemisahan Bidang', 'FAJRIN', 'POLEWALI', 'Pekkabata', 370, '1652153760', '370/2022', '323', '1653968160', 'Berkas Selesai'),
(371, 2022, 'Pengembalian Batas', 'HASAN BUDI', 'POLEWALI', 'Darma', 371, '1652351820', '371/2022', '336', '1653820620', 'Proses Belum Jatuh Tempo'),
(372, 2022, 'Sertipikat Pengganti Karena Blanko Lama', 'SALEH AHMAD', 'WONOMULYO', 'Arjosari', 372, '1652319480', '372/2022', '311', '1654565880', 'Proses Belum Jatuh Tempo'),
(373, 2022, 'Pemisahan Bidang', 'FAJRIN', 'POLEWALI', 'Sulewatang', 373, '1652697480', '373/2022', '223', '1654511880', 'Proses Belum Jatuh Tempo'),
(374, 2022, 'Pengukuran Ulang Dan Pemetaan Kadastral', 'MUH. SAMIRAN', 'POLEWALI', 'Manding', 374, '1652265480', '374/2022', '116', '1654425480', 'Proses Belum Jatuh Tempo'),
(375, 2022, 'Pemisahan Bidang', 'NURYADI', 'POLEWALI', 'Manding', 375, '1652697540', '375/2022', '120', '1654511940', 'Proses Belum Jatuh Tempo'),
(380, 2022, 'Pemisahan Bidang', 'ANDI AZWAR', 'ANREAPI', 'Kelapa Dua', 380, '1652784060', '380/2022', '516', '1654598460', 'Proses Belum Jatuh Tempo'),
(381, 2022, 'Pemisahan Bidang', 'ARSAL SADIKIN', 'BALANIPA', 'Galung Tulu', 381, '1652776860', '381/2022', '221', '1654591260', 'Berkas Selesai'),
(5704, 2022, 'Pengukuran dan Pemetaan Kadastral', 'SUPARTI DJANI', 'WONOMULYO', 'Sidorejo', 1463, '1650948600', '109/2022', '349', '1653108600', 'Proses Sudah Jatuh Tempo'),
(6005, 2022, 'Pengukuran dan Pemetaan Kadastral', 'ABDULLAH', 'WONOMULYO', 'Sugihwaras', 1665, '1652159460', '111/2022', '136', '1654319460', 'Proses Belum Jatuh Tempo'),
(6078, 2022, 'Pengukuran dan Pemetaan Kadastral', 'RAHMATAN', 'BINUANG', 'Mirring', 6078, '1652247480', '110/2022', '3004', '1654407480', 'Proses Belum Jatuh Tempo'),
(6087, 2022, 'Pemecahan Bidang', 'IFDAL TRISDIANTO', 'POLEWALI', 'Madatte', 1790, '1652934000', '118/2022', '229', '1654748400', 'Proses Belum Jatuh Tempo'),
(6140, 2022, 'Pengukuran dan Pemetaan Kadastral', 'BURHANUDDIN', 'POLEWALI', 'Takatidung', 1789, '1652844660', '115', '435', '1655004660', 'Proses Belum Jatuh Tempo'),
(6302, 2022, 'Pemisahan Bidang', 'SYARIEF RAHMAN TASMAN', 'MATAKALI', 'Patampanua', 1791, '1652932920', '117', '168', '1654747320', 'Proses Belum Jatuh Tempo'),
(6305, 2022, 'Pemisahan Bidang', 'SYARIEF RAHMAN TASMAN', 'MATAKALI', 'Patampanua', 1792, '1652931960', '116', '504', '1654746360', 'Proses Belum Jatuh Tempo'),
(6311, 2022, 'Pemecahan Bidang', 'ALI FUSVITA NINGSIH', 'WONOMULYO', 'Sugihwaras', 1793, '1652935260', '119/2022', '794', '1654749660', 'Proses Belum Jatuh Tempo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemohon`
--

CREATE TABLE `tbl_pemohon` (
  `nama_pemohon` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `NIK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemohon`
--

INSERT INTO `tbl_pemohon` (`nama_pemohon`, `no_telp`, `NIK`) VALUES
('ABDULLAH', '055256913646', '7604030904920012'),
('AHMAD', '081244717880', '3172031207830016'),
('ALI FUSVITA NINGSIH', '085256913646', '7604035010800020'),
('ANDI AZWAR', '081244748566', '3172031207830197'),
('ANDI BASO', '081354820752', '3172021011120015'),
('ANDI BASO BERANI', '0812447487662', '3172031207830104'),
('ARSAL SADIKIN', '081321465374', '3172031207830016'),
('BURHANUDDIN', '082254407085', '7604043107680007'),
('FAJRIN', '081321465654', '3172031207830007'),
('FAJRIN CEBONG', '081321465654', '3172031207830106'),
('HASAN ABIDIN', '081321465734', '3172031207830156'),
('HASAN BADO', '081244748737', '3172031207830107'),
('HASAN BADO SALEH', '081244748755', '3172031207830132'),
('HASAN BUDI', '081321465354', '3172031207830163'),
('HUSAIN MAJENE', '081321465654', '3172031207830111'),
('IFDAL TRISDIANTO', '082333888266', '7604040507730004'),
('MUH. NURFAHRI', '081354820259', '3172021011120010'),
('MUH. SAMIRAN', '081345678789', '3172031102890016'),
('MUHAMMAD ARHAM', '081244748766', '3172031207830133'),
('MUSLIH SAMIRAN', '081244748757', '3172031207830014'),
('NURSAHDI REKTOR', '081354820236', '3172031207830137'),
('NURSAHDI SALEH', '081354820257', '3172021011120001'),
('NURYADI', '081321465123', '3172031207830122'),
('RAHMATAN', '082190612353', '731507742610069'),
('SALEH', '081354820258', '3172021011120007'),
('SALEH AHMAD', '081321465354', '3172031207830336'),
('SUPARTI DJANI', '082192288865', '7604034301620003'),
('SYARIEF RAHMAN TASMAN', '042823242', '7604043112710108');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prosedur`
--

CREATE TABLE `tbl_prosedur` (
  `prosedur` varchar(255) NOT NULL,
  `durasi_pengukuran` int(11) NOT NULL,
  `durasi_waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prosedur`
--

INSERT INTO `tbl_prosedur` (`prosedur`, `durasi_pengukuran`, `durasi_waktu`) VALUES
('Pelepasan Sebagian Hak', 14, 21),
('Pemecahan Bidang', 14, 21),
('Pemisahan Bidang', 14, 21),
('Pendaftaran SK Hak', 14, 53),
('Pendaftaran Tanah Pertama Kali Wakaf untuk Tanah Yang Belum Sertipikat (Tanah Negara)', 14, 80),
('Pengembalian Batas', 17, 17),
('Penggabungan Bidang', 14, 21),
('Pengukuran dan Pemetaan Kadastral', 25, 25),
('Pengukuran Ulang Dan Pemetaan Kadastral', 25, 25),
('Sertipikat Pengganti Karena Blanko Lama', 14, 26),
('Sertipikat Pengganti Karena Blanko Rusak', 14, 26),
('Sertipikat Pengganti Karena Hilang', 14, 56);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `telp`, `username`, `pass`, `level_status`) VALUES
(1, 'Muslih Fauzi', '081354820256', 'admin', 'admin', 'admin'),
(2, 'andi rusmin', '081210257655', 'rusmin', '990178', 'admin'),
(3, 'Azwar Prawira Kadri', '081342435799', 'prawira22', 'qwerty888', 'admin'),
(34, 'Rissa Viandani DS.', '082194342993', 'ichaviandani', '123', 'operator'),
(35, 'Juwita Mandasari', '085241724567', 'Italita', 'qwerty', 'operator'),
(36, 'Tontas P. Tompo', '082288810603', 'TontasT', '14091983', 'user'),
(37, 'Mufli', '081354354233', 'EL NINO', '201288MUFLI', 'user'),
(38, 'Christoforus Yoris', '081342793369', 'Chr15to', 'Polman1234', 'user'),
(39, 'Athkhair Ramli', '081241831366', 'atha', 'atha2305', 'user'),
(40, 'Muh. Muslih Samiran', '082346558946', 'MMS', '199411', 'user'),
(41, 'Nur Khalik Sahabuddin', '081242840963', '198812152012121001', 'entersaja1', 'user'),
(42, 'Sulchair Sose Arbiansyah', '081297780722', 'soseeyou', '12345#', 'user'),
(43, 'Broery Akbar Satrio', '081259436599', 'Kindalost', 'bismillah1122', 'user'),
(44, 'Hadijah. S', '082347665528', 'ijhasubhan', '231994', 'operator'),
(45, 'Febryanto Abdillah Razak', '085242825381', 'FEBRY', 'ALLAHUAKBAR', 'user'),
(46, 'Hariadi', '082293885525', 'ALGHAZI', '271287adi', 'user'),
(47, 'Surya P. Tompo', '085146249234', 'UYHA', '08032012', 'user'),
(48, 'Salwah', '085213801549', 'MaulaPaula', 'Sa170845', 'user'),
(49, 'Miftahul Khair', '082151379835', 'NO NAME', 'BPN123', 'user'),
(50, 'Moch. Azhar Budianto', '082192025220', 'Budy', 'Budd1221', 'user'),
(51, 'Dedi Aso Dewa', '082335550552', 'Edhy', 'dedi1993', 'user'),
(52, 'Muhammad Algasali', '081317418582', 'Mlgasali', 'Mlgasali', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `no_berkas` (`no_berkas`);

--
-- Indexes for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`no_berkas`),
  ADD KEY `prosedur` (`prosedur`),
  ADD KEY `pemohon` (`pemohon`);

--
-- Indexes for table `tbl_pemohon`
--
ALTER TABLE `tbl_pemohon`
  ADD PRIMARY KEY (`nama_pemohon`);

--
-- Indexes for table `tbl_prosedur`
--
ALTER TABLE `tbl_prosedur`
  ADD PRIMARY KEY (`prosedur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD CONSTRAINT `ekspedisi_ibfk_1` FOREIGN KEY (`no_berkas`) REFERENCES `tbl_berkas` (`no_berkas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD CONSTRAINT `tbl_berkas_ibfk_1` FOREIGN KEY (`prosedur`) REFERENCES `tbl_prosedur` (`prosedur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_berkas_ibfk_2` FOREIGN KEY (`pemohon`) REFERENCES `tbl_pemohon` (`nama_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
