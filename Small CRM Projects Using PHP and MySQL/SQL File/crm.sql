-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2021 pada 15.03
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelola_wisata`
--

CREATE TABLE `pengelola_wisata` (
  `id_pengelola` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prequest`
--

CREATE TABLE `prequest` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `wdd` varchar(255) DEFAULT NULL,
  `cms` varchar(255) DEFAULT NULL,
  `seo` varchar(255) DEFAULT NULL,
  `smo` varchar(255) DEFAULT NULL,
  `swd` varchar(255) DEFAULT NULL,
  `dwd` varchar(255) DEFAULT NULL,
  `fwd` varchar(255) DEFAULT NULL,
  `dr` varchar(255) DEFAULT NULL,
  `whs` varchar(255) DEFAULT NULL,
  `wm` varchar(255) DEFAULT NULL,
  `ed` varchar(255) DEFAULT NULL,
  `wta` varchar(255) DEFAULT NULL,
  `opi` varchar(255) DEFAULT NULL,
  `ld` varchar(255) DEFAULT NULL,
  `da` varchar(255) DEFAULT NULL,
  `osc` varchar(255) DEFAULT NULL,
  `nd` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `query` longtext DEFAULT NULL,
  `posting_date` date DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prequest`
--

INSERT INTO `prequest` (`id`, `name`, `email`, `contactno`, `company`, `wdd`, `cms`, `seo`, `smo`, `swd`, `dwd`, `fwd`, `dr`, `whs`, `wm`, `ed`, `wta`, `opi`, `ld`, `da`, `osc`, `nd`, `others`, `query`, `posting_date`, `remark`, `status`) VALUES
(5, 'vsfsfs', 'anuj.lpu1@gmail.com', '12345678', 'SQ', 'Website Design & Development', 'CMS (Content Management System)', 'SEO (Search Engine Optimization)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Testing', '2015-04-28', 'Sample text for testing', 1),
(6, 'Anuj kumar', 'anuj@jiyuiyui.com', '8285703354', 'Fluper', 'Website Design & Development', '', '', 'SMO (Social Media Optimization)	', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sample text for testing. Sample text for testing. Sample text for testing. Sample text for testing', '2015-04-28', 'Sample text for testing', 2),
(7, 'Mridul ', 'iyuiyuiyui@gmail.com', '12345678', 'Fluper', 'Website Design & Development', '', 'SEO (Search Engine Optimization)', '', 'Static Website Design', '', 'Flash Website Development', '', '', '', '', '', '', '', '', '', '', '', 'testingvvvtestin testingvtestinggtestingtesting  testingtesting testingv v', '2015-04-28', 'csfsfsf', 2),
(8, 'Mridul ', 'mridul@gmail.com', '12345678', 'Fluper', 'Website Design & Development', '', 'SEO (Search Engine Optimization)', '', 'Static Website Design', '', 'Flash Website Development', '', '', '', '', '', '', '', '', '', '', '', 'testingvvvtestin testingvtestinggtestingtesting  testingtesting testingv v', '2015-04-28', 'dwwrwer', 2),
(9, 'kjkhjkjhkjh', 'jhkhjk@dfdf.com', '67679679', 'tyuytu', 'Website Design & Development', 'CMS (Content Management System)', 'SEO (Search Engine Optimization)', 'SMO (Social Media Optimization)	', '', 'Dynamic Website Design', '', '', '', '', '', '', '', '', '', '', '', '', 'uytuytu', '2019-07-11', 'cssdf', 0),
(10, 'Test', 'test@gmail.com', '1234567890', 'cfsdfsdf', 'Website Design & Development', '', '', '', '', '', '', 'Domain Registration', 'Web Hosting Services', 'Website Maintenance', 'Ecommerce Development', '', '', '', '', '', '', '', 'This is sample text for testing.', '2019-08-06', 'fdgdf', NULL),
(11, 'Anuj', 'dsfdfsd@gmil.com', '1234567890', 'fdsfsd', 'Website Design & Development', '', 'SEO (Search Engine Optimization)', '', 'Static Website Design', '', 'Flash Website Development', '', '', '', '', '', 'Online Payment Integration', '', '', '', '', '', 'I want these services', '2019-08-10', 'This is sample text for testing.', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(11) NOT NULL,
  `email_id` varchar(300) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `task_type` varchar(300) NOT NULL,
  `prioprity` varchar(300) NOT NULL,
  `ticket` longtext NOT NULL,
  `attachment` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `admin_remark` longtext NOT NULL,
  `posting_date` date NOT NULL,
  `admin_remark_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ticket`
--

INSERT INTO `ticket` (`id`, `ticket_id`, `email_id`, `subject`, `task_type`, `prioprity`, `ticket`, `attachment`, `status`, `admin_remark`, `posting_date`, `admin_remark_date`) VALUES
(7, 'TID3071', 'anuj.lpu1@gmail.com', 'testing', 'billing', 'important', 'hiiiiiiiiiiiiii', '', 'close', 'This is done.', '2015-02-18', '0000-00-00 00:00:00'),
(8, 'TID3072', 'anuj.lpu1@gmail.com', 'testing', 'billing', 'important', 'hiiiiiiiiiiiiii', '', 'close', 'aasdfgdfgvhfgvb jgjfhfh', '2015-02-18', '0000-00-00 00:00:00'),
(9, '2', 'anuj@gmail.com', 'Test', 'ot1', 'important', 'sample text for testing. sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.sample text for testing.', '', 'Open', 'vsdfga', '2019-07-11', '0000-00-00 00:00:00'),
(11, '4', 'abc@gmail.com', 'Test Ticket', 'ot1', 'important', 'This is sample text for testing.', '', 'Open', 'Your query is solved now.', '2019-08-10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nik` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `nik`, `email`, `password`, `no_hp`, `jenis_kelamin`, `tgl_lahir`, `user_image`, `alamat`, `status`) VALUES
(3, 'Rokhis', '3509112405020001', 'anuj.lpu1@gmail.com', '123456', '8285703354', 'Pria', '20-10-2000', NULL, 'Sec-5 Sahibabad Ghaziabad ', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usercheck`
--

CREATE TABLE `usercheck` (
  `id` int(11) NOT NULL,
  `logindate` varchar(255) DEFAULT '',
  `logintime` varchar(255) DEFAULT '',
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT '',
  `ip` varbinary(16) DEFAULT NULL,
  `mac` varbinary(16) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usercheck`
--

INSERT INTO `usercheck` (`id`, `logindate`, `logintime`, `user_id`, `username`, `email`, `ip`, `mac`, `city`, `country`) VALUES
(91, '2015/04/28', '04:37:40pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x31452d38352d35362d43352d39312d45, '', ''),
(92, '2015/04/29', '02:57:12pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e302e323431, '', 'Delhi', 'India'),
(93, '2015/04/30', '04:27:02pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e3134322e3138, '', 'Delhi', 'India'),
(94, '2015/04/30', '05:23:55pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e3134322e3138, '', 'Delhi', 'India'),
(95, '2015/05/18', '01:18:51pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e382e313830, '', 'Delhi', 'India'),
(96, '2015/11/05', '09:30:36pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x33342d34422d35302d42372d45462d33, '', ''),
(97, '2015/11/13', '12:05:39am', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(98, '2015/12/14', '09:36:01pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(99, '2016/02/11', '09:47:08pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(100, '2016/04/07', '12:17:50am', 7, 'Rahul', 'rahul@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(101, '2016/04/20', '09:37:54am', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(102, '2016/04/25', '09:55:45pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(103, '2016/04/26', '08:19:12pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(104, '2016/04/26', '08:26:18pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(105, '2016/04/30', '11:59:25pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(106, '2016/04/30', '12:30:10am', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(107, '2019/07/11', '12:27:21pm', 9, 'Anuj', 'anuj@gmail.com', 0x3a3a31, 0x33432d35322d38322d35312d41352d42, '', ''),
(108, '2019/07/15', '12:12:00pm', 9, 'Anuj', 'anuj@gmail.com', 0x3a3a31, 0x33432d35322d38322d35312d41352d42, '', ''),
(109, '2019/08/06', '11:39:30pm', 11, 'Test user', 'testuser@gmail.com', 0x3a3a31, 0x31322d46342d38442d31322d39392d39, '', ''),
(110, '2019/08/10', '04:51:41pm', 11, 'Test user', 'testuser@gmail.com', 0x3a3a31, 0x31322d46342d38442d31322d39392d39, '', ''),
(111, '2019/08/10', '04:54:44pm', 12, 'ABc', 'abc@gmail.com', 0x3a3a31, 0x31322d46342d38442d31322d39392d39, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(300) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `lokasi` varchar(300) NOT NULL,
  `harga_tiket` varchar(10) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `kategori`, `deskripsi`, `lokasi`, `harga_tiket`, `gambar`) VALUES
(1, 'Kawah ijen', 'Pantai', 'bla bla bla bla bla      ', 'Banyuwangi', 'Rp.5000', ''),
(2, 'kawah wurung', 'Gunung', 'sjdhlskhdfshdfhdsfhdfd  ', 'jember', 'Rp.5000', '61a62d9170749.png'),
(9, 'danu', 'Gunung', 'ufkf', 'hjgj', '30000', '61a61807297de.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengelola_wisata`
--
ALTER TABLE `pengelola_wisata`
  ADD PRIMARY KEY (`id_pengelola`);

--
-- Indeks untuk tabel `prequest`
--
ALTER TABLE `prequest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `usercheck`
--
ALTER TABLE `usercheck`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengelola_wisata`
--
ALTER TABLE `pengelola_wisata`
  MODIFY `id_pengelola` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prequest`
--
ALTER TABLE `prequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `usercheck`
--
ALTER TABLE `usercheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
