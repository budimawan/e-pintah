-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 01:02 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_epintah`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_a`
--

CREATE TABLE `pengajuan_a` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `instansi` varchar(128) NOT NULL,
  `kelurahan` varchar(128) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `ttl` varchar(128) NOT NULL,
  `negara` varchar(128) NOT NULL,
  `ktp_tgl` varchar(128) NOT NULL,
  `ktp_no` varchar(128) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `tgl_ajuan` varchar(268) NOT NULL,
  `tgl_update` varchar(268) NOT NULL DEFAULT '-',
  `status` int(11) NOT NULL,
  `status_periksa` varchar(268) NOT NULL DEFAULT 'Belum Diperiksa',
  `koreksi_a` text NOT NULL DEFAULT 'belum diperiksa oleh petugas',
  `koreksi_b` text NOT NULL DEFAULT 'belum diperiksa oleh petugas',
  `koreksi_c` text NOT NULL DEFAULT 'belum diperiksa oleh petugas',
  `letak_jalan` varchar(128) NOT NULL,
  `letak_kel` varchar(128) NOT NULL,
  `letak_kec` varchar(128) NOT NULL,
  `letak_kab` varchar(128) NOT NULL,
  `letak_prov` varchar(128) NOT NULL,
  `luas` varchar(128) NOT NULL,
  `su_tgl` varchar(128) DEFAULT NULL,
  `su_no` varchar(128) DEFAULT NULL,
  `pb_tgl` varchar(128) DEFAULT NULL,
  `pb_no` varchar(128) DEFAULT NULL,
  `batas_u` varchar(128) NOT NULL,
  `batas_t` varchar(128) NOT NULL,
  `batas_s` varchar(128) NOT NULL,
  `batas_b` varchar(128) NOT NULL,
  `cat_a` text NOT NULL,
  `cat_b` text NOT NULL,
  `cat_c` text NOT NULL DEFAULT 'tidak ada catatan !',
  `file_a` varchar(268) NOT NULL,
  `file_b` varchar(268) NOT NULL,
  `file_c` varchar(268) NOT NULL,
  `file_d` varchar(268) NOT NULL,
  `chipertext` varchar(268) DEFAULT NULL,
  `qr_image_name` varchar(268) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_a`
--

INSERT INTO `pengajuan_a` (`id`, `email`, `instansi`, `kelurahan`, `kecamatan`, `nama_lengkap`, `ttl`, `negara`, `ktp_tgl`, `ktp_no`, `pekerjaan`, `alamat`, `tgl_ajuan`, `tgl_update`, `status`, `status_periksa`, `koreksi_a`, `koreksi_b`, `koreksi_c`, `letak_jalan`, `letak_kel`, `letak_kec`, `letak_kab`, `letak_prov`, `luas`, `su_tgl`, `su_no`, `pb_tgl`, `pb_no`, `batas_u`, `batas_t`, `batas_s`, `batas_b`, `cat_a`, `cat_b`, `cat_c`, `file_a`, `file_b`, `file_c`, `file_d`, `chipertext`, `qr_image_name`) VALUES
(76, 'nurali.user@gmail.com', 'Nurali', 'Ranomeeto Barat', 'Ranomeeto', 'Nurali', 'Kendari, 1981-01-01', 'Indonesia', '1981-01-01', '1234567891012345', 'PNS', 'Jl. Ld Hadi Lr.Al-Ikhlas No.13', '2020-10-06 23:27:23', '2020-10-06 23:27:23', 2, 'Sudah Diperiksa', 'data sudah valid', '\"data sudah valid\"', '\"data sudah valid\"', 'Jln. Wowwanggu', 'Langgea', 'Ranomeeto', 'Konawe Selatan', 'Sulawesi Tenggara', '5000', '', '', '', '', 'Sungai', 'Desa Mekar Jaya', 'Kantor Polsek Moramo Utara', 'Jln. Poros Sanggula Tanea', 'Pasar Rakyat', 'riwayat penggunaan sebelumnya adalah ... dst', 'nomor yang dapat dihubungi 08xxx', 'd24a30d9651a21fbd4aaa1b3ac28dfb7.pdf', '09ceed5d700f5ab1c2104f2057bc178a.pdf', '74e2a8dd5ef0808ed7a4bb6ee4cb2586.pdf', '2267ac6aea4633e262b3160b3025caa0.pdf', NULL, NULL),
(77, 'anshar.disperindag@gmail.com', 'DRS. Madilaa, M.Si', 'Potoro', 'Andoolo', 'Madilaa,', 'Poasia, 1962-01-05', 'Indonesia', '2019-04-02', '7402020501620002', 'Aparatur Sipil Negara(ASN)', 'Desa Tobeu, Unaaha', '2020-10-08 14:30:52', '2021-03-31 12:46:39', 2, 'Sudah Diperiksa', '-', '-', '-', 'Jalan Poros Sanggula - Tanea', 'Sanggula', 'Moramo Utara', 'Kota Kendari', 'Sulawesi Tenggara', '2940', '1970-01-01', '-', '1970-01-01', '-', 'Muh, Amir, S.Sos', 'Tanah Kas Desa Sanggula', 'Tanah Kas Desa Sanggula', 'Jln. Poros Sanggula Tanea', ' Lokasi Pasar Rakyat ', ' Tanah Ks Desa yang di hibahkan untuk digunakan fasilitas pasar rakyat ', ' Nomor yang dapat di hubungi  082162261228 ', '5a5be7577922d186258f10fc2ccfd402.pdf', '6d8ca200136a4364c4ad83bffd17d369.pdf', '4576433af391973e79440e4a424bdf7e.pdf', '923ead648cc02a02deeca6ff8d81be9a.pdf', NULL, NULL),
(78, 'budi.user@gmail.com', 'ujicoba', 'ujicoba', 'ujicoba', 'ujicoba1', 'ujicoba1, 2011-01-01', 'Indonesia', '2011-01-01', '1234567890', 'ujicoba1', 'ujicoba1', '2020-10-11 07:15:49', '2021-03-28 19:18:44', 3, 'Sudah Diperiksa', 'data belum valid', 'data belum valid', 'data belum valid', 'ujicoba1', 'ujicoba1', 'ujicoba1', 'Kota Kendari', 'Sulawesi Tenggara', '1234567890', '2011-01-01', 'ujicoba1', '2011-01-01', 'ujicoba1', 'ujicoba1', 'ujicoba1', 'ujicoba1', 'ujicoba1', ' ujicoba1 ', ' ujicoba1 ', ' ujicoba1 ', '6f2470aaaa34d6b8ca2676ab47a7ca70.pdf', '975eae8e99ad77fd187452b61a9a95b5.pdf', '5b72c2cc852bb961dbbdfed2185f269c.pdf', '6a7a54da27434982e0336c6355c97474.pdf', 'jMs=', 'qr_78__1.png'),
(79, 'Fadhel86@gmail.com', 'Muhammad Fadel', 'Rahandouna', 'Poasia', 'Muhammad Fadel', 'Makassar, 1999-09-01', 'Indonesia', '2017-09-26', '7471060909980001', 'PNS', 'BTN Batu Marupa Blok F No.22', '2021-03-29 23:03:16', '2021-03-29 23:03:16', 1, 'Belum Diperiksa', 'belum diperiksa oleh petugas', 'belum diperiksa oleh petugas', 'belum diperiksa oleh petugas', 'Jl. P. Antasari', 'Mataiwoi', 'Puuwatu', 'Kota Kendari', 'Sulawesi Tenggara', '100', '2021-03-22', '123/SU/001/III/2021', '2021-03-22', '123/SU/001/III/2021', 'SDN 07  Kendari', 'Pasar Andonohu', 'Jalan Raya Poros ByPass', 'Sungai Wanggu', 'Pembangunan Gedung Arsip KPU', '-', 'Mohon Hubungi di nomor 082287075636 bila ada kesalahan', 'daaf540aef3fbbd5ffdab4724bedd1de.pdf', '85421df36ac01a3bb4c58c796d3ca472.pdf', '4b89914e73dfc089962a5954affa40a6.pdf', '367b224d3aa06db79f3b28fcb7fcedf7.pdf', 'jMo=', 'qr_79__1.png');

-- --------------------------------------------------------

--
-- Table structure for table `stpengajuan_status`
--

CREATE TABLE `stpengajuan_status` (
  `id_status` int(11) NOT NULL,
  `peng_status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stpengajuan_status`
--

INSERT INTO `stpengajuan_status` (`id_status`, `peng_status`) VALUES
(1, 'terkirim'),
(2, 'valid'),
(3, 'unvalid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` varchar(268) DEFAULT '-',
  `instansi` varchar(128) DEFAULT NULL,
  `kel` varchar(128) DEFAULT NULL,
  `kec` varchar(128) DEFAULT NULL,
  `kab` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `email`, `phone`, `image`, `password`, `role_id`, `is_active`, `date_created`, `last_update`, `instansi`, `kel`, `kec`, `kab`) VALUES
(1, 'Muhammad Budi', 'Muhamma Budi Dharmawan P', 'budi.user@gmail.com', '082243448798', 'twibbon-profile.png', '$2y$10$Uo0q9qJlFIpSMat6612B7eubxvY/owAhROJEQWDilOSWKRQjaGsxC', 1, 1, '2020-08-22 16:11:01', '2020-10-11 07:22:36', 'Kantor Wilayah Badan Pertanahan Nasional Provinsi Sulawesi Tenggara', 'Kadia', 'Kota Kendari', 'Konawe Selatan'),
(2, 'Muhammad Budi', 'Muhammad Budi Dharmawan P', 'budi.admin@gmail.com', NULL, 'default.jpg', '$2y$10$fZf0Bd7B6CtyLHi8dX5DOuulj9RknHXij569YlGJ67ARicfxGweYu', 2, 1, '2020-08-22 16:16:38', '2020-10-08 20:34:37', 'Kantor Wilayah Kementerian ATR/BPN Provinsi Sulawesi Tenggara', 'Andoolo', 'Andoolo', 'Konawe Selatan'),
(3, 'Muhammad Budi D', 'Muhammad Budi Dharmawan', 'budi.superadmin@gmail.com', '082243448798', 'default.jpg', '$2y$10$iJhzv/iAhn67XqWe6X.LyunxLNG7RofErVkkU9FH4OF3SdhTs5nlK', 3, 1, '2020-08-23 22:34:21', '2020-10-08 20:34:37', 'Kantor Wilayah Kementerian ATR/BPN Provinsi Sulawesi Tenggara', 'Bonggoea', 'Kadia', 'Kota Kendari'),
(6, 'Anshar', 'Muhammd Anshar AM', 'anshar.disperindag@gmail.com', NULL, 'default.jpg', '$2y$10$BJmYxwnENnBdDte7LxkvuOR.k.cstIFUkqnyTtRuIU8ibZgHzdjRq', 1, 1, '2020-10-04 15:13:27', '2020-10-08 20:34:37', 'Dinas Perindustrian dan Perdagangan', 'Potoro', 'Andoolo', 'Konawe Selatan'),
(7, 'Nurali', 'Nurali', 'nurali.user@gmail.com', '0', 'default.jpg', '$2y$10$UmPy49dRVw8DyCfegz5dp.MT0r9OHp33AruaNd2oDyJAhxPfvsCO.', 1, 1, '2020-10-04 16:49:34', '2020-10-08 20:34:37', 'Kantor Pertanahan Kabupaten Konawe Selatan', 'Potoro', 'Andoolo', 'Konawe Selatan'),
(8, 'Nurali', 'Nurali', 'nurali.admin@gmail.com', NULL, 'default.jpg', '$2y$10$AhwQ8s.YPop1RqBKOa0mK.EgZOLFR9Fm7ejpoSYJEXleP7Tp2R8jG', 2, 1, '2020-10-04 16:50:03', '2020-10-08 20:34:37', 'Kantor Pertanahan Kabupaten Konawe Selatan', 'Potoro', 'Andoolo', 'Konawe Selatan'),
(9, 'Jevon', 'Jevon Sham Pabutungan', 'jevonpabutunganji@gmail.com', NULL, 'default.jpg', '$2y$10$i5ylEaX/ICSQE1EC./8Uhu9AfMYR2jeI96FuUB9cZw5KOR1PRAAhO', 2, 1, '2020-10-09 01:02:18', '2020-10-08 20:34:37', 'Kantor Pertanahan Kabupaten Konawe Selatan', 'Potoro', 'Andoolo', 'Konawe Selatan'),
(10, 'Reviyanthi', 'Reviyanthi Huran Oshidary', 'revhyoshidary@yahoo.com', NULL, 'default.jpg', '$2y$10$wFzi.0ZtI6qIQP1MeLNyG.Ri0NyCDfC0tle9Llh54/ZUncg/SpPcy', 2, 1, '2020-10-09 01:03:02', '2020-10-08 20:34:37', 'Kantor Pertanahan Kabupaten Konawe Selatan', 'Potoro', 'Andoolo', 'Konawe Selatan'),
(11, 'Rifki', 'Rifki Toasa, S.STP., M.Si', 'rifkiayu12@gmail.com', NULL, 'default.jpg', '$2y$10$VudbpGg7JJzC2ulLdrA3FuR4UjP76w.oXwoH7jS8thP6eHqGtOcii', 1, 1, '2020-10-09 01:04:38', '2020-10-08 20:34:37', 'Pemerintah Daerah Kabupaten Konawe Selatan', 'Andoolo', 'Andoolo', 'Konawe Selatan'),
(12, 'Asmin', 'Asmin., A.Md.Kom', 'asmin.asril@gmail.com', NULL, 'default.jpg', '$2y$10$DWy8PaqsM7wkbBPgDaa1ne95hg9eL7lkHd5NbGI5lwfNaDb.HpM1e', 1, 1, '2020-10-09 01:15:23', '2020-10-08 20:34:37', 'instansi ?', 'kelurahan ?', 'kecamatan ?', 'Konawe Selatan'),
(13, 'Mustika', 'Mustika Sari', 'mustikasari578@gmail.com', NULL, 'default.jpg', '$2y$10$F6/mlDOUAyPdgckhoeyW5uUlMmRe2AlQOsAjfrhU0qZ2M4dhvWS/i', 1, 1, '2021-03-29 22:04:33', '2021-03-29 22:04:33', 'Jl.H.  Abdul Silondae', 'Mandonga', 'Mandonga', 'Konawe Selatan'),
(14, 'iklil11', 'Iklil Awalda Tariza', 'ikliltariza280599@gmail.com', NULL, 'default.jpg', '$2y$10$0dJjuA4vQq1HcoWEEe7Ht.SrbMtmMeN1icjwgoRn65NdJOxtRFKRG', 1, 1, '2021-03-29 22:08:19', '2021-03-29 22:08:19', 'Jl. Mayjen. Sutoyo No.5', 'Tipulu', 'Kendari Barat', 'Konawe Selatan'),
(15, 'Fadhel16', 'Muhammad Fadel', 'Fadhel86@gmail.com', '082243448798', 'default.jpg', '$2y$10$TcPUePC/cc2CrXNaJseDQ.inGzqOdAdqXP3oUy48LayucoMivLDae', 1, 1, '2021-03-29 22:10:13', '2021-03-29 23:14:45', 'Kantor Komisi Pemilihan Umum Sulawesi Tenggara', 'Mataiwoi', 'Puuwatu', 'Konawe Selatan'),
(16, 'ArifAdhitya', 'Muhammad Arif Adhitya', 'arifadhitya111@gmail.com', NULL, 'default.jpg', '$2y$10$5/Q.rnQHmLha0YAQd7s4puR8AdxhsUUlx65i9Qft/NP/fS5BVdkaq', 1, 1, '2021-03-29 22:11:23', '2021-03-29 22:11:23', 'Jl. Balaikota II No. 62', 'Pondambea', 'Kadia', 'Konawe Selatan'),
(17, 'Dilla', 'Nurfadhilah badwi', 'Nurfadhila05@gmail.com', NULL, 'default.jpg', '$2y$10$G3la34S3q5m0oqAR72YMT.iCEflQeFfvwQ/8RQ0pAf.JXQcLBWydq', 0, 1, '2021-03-29 22:13:26', '2021-03-29 22:13:26', 'Jl. Chairil Anwar No.9', 'Mataiwoi', 'Puuwatu', 'Konawe Selatan'),
(18, 'Akram', 'Muhammad Akram', 'muhakram67@gmail.com', NULL, 'default.jpg', '$2y$10$86HD9pDYp41WYu5pTukeqOXqv7A0rdNanDPbJDg/g8hHAcx06p38K', 0, 1, '2021-03-29 22:16:35', '2021-03-29 22:16:35', 'Jl. Made Sabara No.6', 'Mandonga', 'Mandonga', 'Konawe Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `users_access_menu`
--

CREATE TABLE `users_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_access_menu`
--

INSERT INTO `users_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(5, 2, 2),
(6, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_roll`
--

CREATE TABLE `users_roll` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_roll`
--

INSERT INTO `users_roll` (`id`, `role`) VALUES
(1, 'User'),
(2, 'Admin'),
(3, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'User'),
(2, 'Admin'),
(3, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Profile', 'User', 'mdi mdi-account-card-details', 1),
(2, 2, 'Profile', 'Admin', 'mdi mdi-account-card-details', 1),
(3, 1, 'Pengajuan Baru', 'Pengajuan', 'mdi mdi-file-document', 1),
(4, 2, 'Periksa Pengajuan', 'Periksapengajuan', 'mdi mdi-table-large', 1),
(6, 1, 'Pengajuan Terkirim', 'Pengajuanterkirim', 'mdi mdi-send', 1),
(7, 3, 'Profile', 'Superadmin', 'mdi mdi-account-card-details', 1),
(8, 3, 'Edit User', 'Edituser', 'mdi mdi-account-search', 1),
(9, 3, 'Edit Menu', 'Editmenu', 'mdi mdi-table-edit', 1),
(15, 3, 'Pengajuan Baru', 'Pengajuan', 'mdi mdi-file-document', 1),
(16, 3, 'Pengajuan Terkirim', 'Pengajuanterkirim', 'mdi mdi-send', 1),
(17, 3, 'Periksa Pengajuan', 'Periksapengajuan_superadmin', 'mdi mdi-table-large', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan_a`
--
ALTER TABLE `pengajuan_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stpengajuan_status`
--
ALTER TABLE `stpengajuan_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_access_menu`
--
ALTER TABLE `users_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_roll`
--
ALTER TABLE `users_roll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan_a`
--
ALTER TABLE `pengajuan_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `stpengajuan_status`
--
ALTER TABLE `stpengajuan_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users_access_menu`
--
ALTER TABLE `users_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_roll`
--
ALTER TABLE `users_roll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
