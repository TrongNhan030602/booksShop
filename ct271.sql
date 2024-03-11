-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 03:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct271`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `name_dm` varchar(255) NOT NULL,
  `sort_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `name_dm`, `sort_name`) VALUES
(1, 'Sách giáo khoa', 'textbook'),
(2, 'Sách khoa học', 'science'),
(3, 'Tiểu thuyết, truyện tranh', 'novel');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id_hd` int(11) NOT NULL,
  `time_date` datetime DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`id_hd`, `time_date`, `ID_user`, `address`, `phone`) VALUES
(1, '2023-11-01 09:30:38', 5, 'Can Tho city', '0334375723'),
(2, '2023-11-02 16:39:19', 6, 'Long Xuyen city', '0912346578'),
(3, '2023-11-03 10:39:19', 6, 'Long Xuyen city', '0912346578'),
(4, '2023-11-15 20:39:19', 5, 'Can Tho city', '0334375723'),
(5, '2023-11-09 08:40:23', 5, 'Can Tho city', '0334375723'),
(6, '2023-11-10 09:40:23', 6, 'Long Xuyen city', '0912346578'),
(9, '2023-11-07 21:30:23', 5, 'Can Tho city', '0334375723'),
(10, '2023-11-17 09:40:38', 6, 'Long Xuyen city', '0912346578'),
(12, '2023-11-13 15:40:23', 5, 'Can Tho city', '0334375723'),
(13, '2023-11-12 16:40:23', 5, 'Can Tho city', '0334375723'),
(14, '2023-11-13 17:40:23', 6, 'Long Xuyen city', '0912346578'),
(15, '2023-11-14 18:40:23', 5, 'Can Tho city', '0334375723'),
(121, '2023-12-03 10:10:47', 27, 'Long Xuyên', '0334323707'),
(122, '2023-12-04 01:47:54', 39, 'LX', '0334323707'),
(123, '2023-12-04 09:59:13', 5, 'Long Xuyên', '0334323707'),
(124, '2023-12-05 03:23:21', 41, 'Long Xuyên', '0334323707');

-- --------------------------------------------------------

--
-- Stand-in structure for view `hoa_don_view`
-- (See below for the actual view)
--
CREATE TABLE `hoa_don_view` (
`ID_HD` int(11)
,`tong_tien` double
,`so_loai_sach` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `info_hoa_don`
--

CREATE TABLE `info_hoa_don` (
  `id_hd` int(11) NOT NULL,
  `ID_SP` int(11) NOT NULL,
  `solg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info_hoa_don`
--

INSERT INTO `info_hoa_don` (`id_hd`, `ID_SP`, `solg`) VALUES
(1, 15, 7),
(1, 29, 7),
(1, 32, 10),
(1, 35, 10),
(2, 11, 9),
(2, 24, 2),
(2, 31, 10),
(2, 32, 4),
(3, 6, 1),
(3, 11, 9),
(3, 14, 5),
(3, 23, 7),
(3, 33, 6),
(3, 35, 9),
(4, 22, 3),
(4, 29, 8),
(4, 37, 2),
(5, 9, 2),
(6, 11, 6),
(7, 13, 6),
(7, 16, 10),
(7, 36, 10),
(9, 29, 7),
(10, 27, 4),
(10, 35, 3),
(11, 14, 8),
(11, 27, 1),
(12, 18, 8),
(12, 33, 6),
(13, 21, 6),
(14, 6, 3),
(14, 8, 10),
(15, 8, 4),
(15, 17, 10),
(16, 23, 3),
(16, 25, 5),
(17, 7, 2),
(17, 12, 7),
(17, 24, 6),
(18, 6, 9),
(18, 14, 8),
(18, 19, 4),
(18, 27, 8),
(18, 36, 1),
(18, 38, 4),
(19, 11, 10),
(19, 37, 4),
(20, 12, 1),
(20, 20, 7),
(20, 32, 9),
(0, 3, 1),
(0, 6, 1),
(0, 5, 1),
(0, 5, 1),
(0, 7, 1),
(0, 7, 1),
(0, 3, 1),
(0, 7, 1),
(0, 5, 1),
(0, 22, 2),
(0, 3, 5),
(0, 6, 6),
(0, 7, 7),
(76, 22, 3),
(76, 3, 2),
(77, 6, 1),
(77, 5, 2),
(77, 25, 1),
(77, 27, 3),
(77, 7, 2),
(78, 7, 2),
(78, 5, 2),
(79, 5, 1),
(79, 6, 1),
(79, 6, 1),
(79, 10, 1),
(80, 3, 1),
(80, 7, 2),
(80, 8, 2),
(81, 5, 2),
(81, 7, 1),
(82, 3, 1),
(82, 5, 1),
(82, 11, 3),
(83, 3, 1),
(83, 22, 2),
(83, 8, 1),
(84, 8, 2),
(84, 22, 2),
(84, 15, 1),
(85, 22, 3),
(85, 7, 4),
(86, 8, 2),
(86, 11, 2),
(86, 38, 2),
(86, 22, 1),
(87, 37, 1),
(87, 22, 1),
(88, 22, 2),
(89, 22, 2),
(89, 35, 2),
(89, 3, 1),
(90, 6, 1),
(90, 3, 1),
(91, 22, 1),
(91, 8, 1),
(92, 8, 1),
(92, 5, 1),
(92, 22, 2),
(93, 8, 1),
(94, 3, 1),
(94, 22, 2),
(95, 3, 1),
(96, 22, 2),
(96, 8, 2),
(97, 5, 1),
(97, 6, 1),
(98, 8, 1),
(98, 15, 1),
(99, 8, 1),
(99, 15, 1),
(100, 8, 1),
(100, 15, 1),
(101, 8, 1),
(101, 15, 1),
(102, 5, 1),
(103, 7, 1),
(103, 8, 2),
(104, 7, 1),
(104, 27, 1),
(105, 5, 1),
(106, 5, 1),
(106, 8, 2),
(106, 22, 2),
(107, 8, 1),
(107, 7, 2),
(108, 3, 1),
(108, 8, 3),
(109, 22, 3),
(110, 5, 1),
(110, 22, 2),
(111, 22, 2),
(112, 22, 1),
(113, 8, 2),
(113, 22, 2),
(114, 22, 2),
(114, 36, 1),
(114, 6, 1),
(115, 5, 1),
(115, 6, 2),
(116, 6, 1),
(116, 5, 1),
(117, 6, 1),
(117, 3, 2),
(118, 5, 1),
(118, 7, 1),
(119, 6, 2),
(119, 5, 3),
(120, 22, 2),
(120, 15, 2),
(121, 22, 2),
(121, 8, 1),
(122, 22, 2),
(122, 8, 1),
(122, 11, 1),
(123, 22, 2),
(123, 12, 2),
(124, 22, 2),
(124, 31, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `img` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `id_dm` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `old_price` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `view`, `id_dm`, `author`, `quantity`, `old_price`) VALUES
(3, 'Giáo Dục Thể Chất 6 (Chân Trời Sáng Tạo) (2023)', 25000, 'product_1', NULL, 200, 1, 'Nhiều tác giả', 50, 30000),
(5, 'Tiếng Anh 7 I-Learn Smart World - Student\'s Book', 80000, 'product_2', NULL, 600, 1, 'Nhiều tác giả', 50, 92000),
(6, 'Tin Học 8 (Cánh Diều) (2023)', 20000, 'product_3', NULL, 220, 1, 'Nhiều tác giả', 50, 25000),
(7, '400 Bài Tập Hoá Học 9', 44000, 'product_4', NULL, 420, 1, 'Lê Đình Nguyên', 50, 58000),
(8, 'Atlat Địa lí Việt Nam (Theo Chương Trình Giáo Dục Phổ Thông 2018)', 28000, 'product_5', NULL, 180, 1, 'Nhiều tác giả', 20, 36000),
(9, 'Toán 10/2 (Kết Nối Trí Thức)', 16000, 'product_6', NULL, 320, 1, 'Nhiều tác giả', 100, 24000),
(10, 'Sinh Học 11 (Chân Trời Sáng Tạo) (2023)', 27000, 'product_7', NULL, 500, 1, 'Nhiều tác giả', 50, 38000),
(11, 'Tiếng Anh 12 - Sách Bài Tập - Tập Một', 33000, 'product_8', NULL, 10, 1, 'BGD & ĐT', 100, 40000),
(12, 'Ôn Tập Đánh Giá Năng Lực Tư Duy Toán Học', 64000, 'product_9', NULL, 20, 1, 'Phạm Long Vân', 100, 76000),
(13, 'Hình Học 12 - Nâng Cao (2020)', 10000, 'product_10', NULL, 50, 1, 'BGD & ĐT', 100, 14000),
(14, '[Phiên chợ sách cũ] Bộ Sách Khoa Học Thú Vị Của Thế Kỉ XXI - Giao Thông Kỳ Diệu', 24000, 'product_11', NULL, 100, 2, 'Dương Minh Hào', 200, 36000),
(15, 'Combo Sách Khoa Học Diệu Kì (Bộ 12 Cuốn)', 258000, 'product_12', NULL, 200, 2, 'Nhiều tác giả', 50, 269000),
(16, 'Bí Mật Dinh Dưỡng Cho Sức Khỏe Toàn Diện (2022)', 240000, 'product_13', NULL, 500, 2, 'T Collin Campbell', 500, 260000),
(17, 'Lưu Thông Máu Tốt Hóa Giải Bách Bệnh', 79000, 'product_14', NULL, 100, 2, 'Akiyoshi Horie', 100, 88000),
(18, 'Luật Tâm Thức - Giải Mã Ma Trận Vũ Trụ (Tái Bản 2022)', 233000, 'product_15', NULL, 150, 2, 'Ngô Sa Thạch', 200, 248000),
(19, 'Cơ Thể Tự Chữa Lành: Giải Cứu Gan', 200000, 'product_16', NULL, 50, 2, 'Anthony William', 50, 218000),
(20, 'Excel Power Query Và Power Pivot Cơ Bản - Tự Động Hóa Dữ Liệu Báo Cáo', 169000, 'product_17', NULL, 100, 2, 'Nguyễn Quang Vinh', 50, 180000),
(21, 'Khoa Học Khám Phá - Lược Sử Thời Gian (Tái Bản 2022)', 98000, 'product_18', NULL, 100, 2, 'Stephen Hawking', 100, 105000),
(22, 'Clean Code - Mã Sạch Và Con Đường Trở Thành Lập Trình Viên Giỏi (Tái Bản 2023)', 308000, 'product_19', NULL, 2000, 2, 'Nguyễn Văn Trung', 500, 320000),
(23, 'Tư Duy Đồ Họa Cho Kiến Trúc Sư & Nhà Thiết Kế', 180000, 'product_20', NULL, 500, 2, 'Paul Laseau', 300, 195000),
(24, 'Thần Số Học - Làm Chủ Cuộc Đời', 118000, 'product_21', NULL, 200, 2, 'Michelle Buchanan', 500, 130000),
(25, 'Khoa Học Về Gia Vị - Hiểu Các Kết Nối Hương Vị Và Cách Mạng Hóa Việc Nấu Ăn', 315000, 'product_22', NULL, 500, 2, 'DK', 500, 330000),
(26, 'Bộ Sách Tiểu Thuyết Của Hector Malot: Không Gia Đình + Trong Gia Đình (Bộ 2 Cuốn)', 214000, 'product_23', NULL, 100, 3, 'Hector Malot', 200, 225000),
(27, 'Combo Sách Ghi Chép Pháp Y (Bộ 2 Cuốn)', 220000, 'product_24', NULL, 500, 3, 'Lưu Hiểu Huy\r\n\r\n', 500, 240000),
(28, 'Combo Sách Nhà Giả Kim + Cây Cam Ngọt Của Tôi (Bộ 2 Cuốn)', 142000, 'product_25', NULL, 500, 3, 'Paulo Coelho', 1000, 166000),
(29, 'Hiệu Sách Cuối Cùng Ở London - Tiểu Thuyết Về Chiến Tranh Thế Giới Thứ Hai', 153000, 'product_26', NULL, 500, 3, 'Madeline Martin', 250, 175000),
(30, 'Hiệu Sách Nhỏ Ở Paris', 126000, 'product_27', NULL, 500, 3, 'Nina George', 300, 139000),
(31, 'Cuốn Sách Tiên Tri', 119000, 'product_28', NULL, 200, 3, 'Erika Swyler', 150, 132000),
(32, 'Thần Đồng Đất Việt 5 - Dấu Tay Xóa Nợ', 9000, 'product_29', NULL, 500, 3, 'Nhiều tác giả', 200, 16000),
(33, 'Thần Đồng Đất Việt - Tập 111 : Ngựa Đá Qua Sông', 10000, 'product_30', NULL, 200, 3, 'Lê Linh', 150, 17000),
(34, 'Chú Tễu - Tập 29 - Món Quà Quý Nhất', 8000, 'product_31', NULL, 200, 3, 'Kim Khánh', 100, 14000),
(35, 'Trái Tim Người Lớn Là Con Hàu Mang Vỏ', 171000, 'product_32', NULL, 200, 3, 'Nini', 180, 190000),
(36, 'Thần Đồng Đất Việt -Tập 228: Ngỗng - Mèo Đại Náo', 13000, 'product_33', NULL, 200, 3, 'Lê Linh', 150, 22000),
(37, 'Giáo Dục Thể Chất 6 (Chân Trời Sáng Tạo) (2023)', 25000, 'product_34', NULL, 190, 1, 'Nhiều tác giả', 100, 34000),
(38, 'Phương Pháp Giải Bài Tập Hóa Học 12', 38000, 'product_35', NULL, 70, 1, 'Huỳnh Văn Út', 250, 52000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `so_luong_sach_da_ban`
-- (See below for the actual view)
--
CREATE TABLE `so_luong_sach_da_ban` (
`id` int(11)
,`sold` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tong_tien_hd`
-- (See below for the actual view)
--
CREATE TABLE `tong_tien_hd` (
`ID_HD` int(11)
,`tong_tien` double
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(150) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `img_user` varchar(100) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_email`, `user_pass`, `role`, `img_user`, `user_name`) VALUES
(4, 'admin@gmail.com', 'bf81ed9c80d51e22646565c46f933ef2', 1, NULL, 'admin'),
(5, 'nhan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, NULL, 'trongnhan');

-- --------------------------------------------------------

--
-- Structure for view `hoa_don_view`
--
DROP TABLE IF EXISTS `hoa_don_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hoa_don_view`  AS SELECT `c`.`id_hd` AS `ID_HD`, sum(`c`.`solg` * `a`.`price`) AS `tong_tien`, count(`a`.`id`) AS `so_loai_sach` FROM ((`sanpham` `a` join `hoa_don` `b`) join `info_hoa_don` `c`) WHERE `a`.`id` = `c`.`ID_SP` AND `b`.`id_hd` = `c`.`id_hd` GROUP BY `c`.`id_hd` ;

-- --------------------------------------------------------

--
-- Structure for view `so_luong_sach_da_ban`
--
DROP TABLE IF EXISTS `so_luong_sach_da_ban`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `so_luong_sach_da_ban`  AS SELECT `a`.`id` AS `id`, sum(`c`.`solg`) AS `sold` FROM ((`sanpham` `a` join `hoa_don` `b`) join `info_hoa_don` `c`) WHERE `a`.`id` = `c`.`ID_SP` AND `b`.`id_hd` = `c`.`id_hd` GROUP BY `a`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `tong_tien_hd`
--
DROP TABLE IF EXISTS `tong_tien_hd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tong_tien_hd`  AS SELECT `c`.`id_hd` AS `ID_HD`, sum(`c`.`solg` * `a`.`price`) AS `tong_tien` FROM ((`sanpham` `a` join `hoa_don` `b`) join `info_hoa_don` `c`) WHERE `a`.`id` = `c`.`ID_SP` AND `b`.`id_hd` = `c`.`id_hd` GROUP BY `c`.`id_hd` ORDER BY sum(`c`.`solg` * `a`.`price`) ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id_hd`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
