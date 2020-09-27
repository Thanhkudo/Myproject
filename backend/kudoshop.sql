-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 21, 2020 lúc 12:24 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kudoshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` tinyint(4) NOT NULL,
  `id_user` tinyint(4) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `id_user`, `name`, `address`, `email`, `phone`, `title`, `content`, `created_at`) VALUES
(2, 2, 'SUP ADMIN', 'Phú Lương, Hà Đông Hà Nội', 'thanhkudo1o11998@gmail.com', 355820911, 'Hàng tốt', 'Chúng tôi rất hài lòng về sản phẩm của Shop', '2020-09-10 19:28:55'),
(7, NULL, 'Kudo', 'Hà Nội', 'grgr@df.iiue', 355820911, 'Hàng tốt', 'Hmmm', '2020-09-10 20:28:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_sx`
--

CREATE TABLE `hang_sx` (
  `id_hangsx` int(4) NOT NULL,
  `name_hangsx` varchar(255) NOT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hang_sx`
--

INSERT INTO `hang_sx` (`id_hangsx`, `name_hangsx`, `note`) VALUES
(1, 'SAMSUNG', NULL),
(2, 'NOKIA', NULL),
(3, 'APPLE', NULL),
(4, 'OPPO', NULL),
(5, 'DELL', NULL),
(6, 'ASUS', NULL),
(7, 'SONY', NULL),
(8, 'HP', NULL),
(9, 'LENOVO', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sp`
--

CREATE TABLE `loai_sp` (
  `id_loaisp` int(4) NOT NULL,
  `name_loaisp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai_sp`
--

INSERT INTO `loai_sp` (`id_loaisp`, `name_loaisp`) VALUES
(1, 'Điện Thoại'),
(2, 'Tablet'),
(3, 'Laptop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `id_user` int(5) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `price` int(50) NOT NULL,
  `payment` int(4) NOT NULL,
  `shipping` int(4) NOT NULL,
  `status` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `fullname`, `phone`, `email`, `address`, `note`, `price`, `payment`, `shipping`, `status`, `created_at`) VALUES
(17, 2, 'SUP ADMIN', 355820911, 'thanhkudo1o11998@gmail.com', 'Phú Lương, Hà Đông Hà Nội', '', 11640000, 1, 1, 0, '2020-09-20 19:23:16'),
(19, 2, 'SUP ADMIN', 355820911, 'thanhkudo1o11998@gmail.com', 'Hà Nội', '', 17850000, 1, 1, 0, '2020-09-20 20:16:03'),
(20, 2, 'SUP ADMIN', 355820911, 'thanhkudo1o11998@gmail.com', 'q3r', '', 76000000, 1, 1, 0, '2020-09-20 20:16:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(4) NOT NULL,
  `id_order` int(4) NOT NULL,
  `id_sp` int(4) NOT NULL,
  `name_sp` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `quantity` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `id_order`, `id_sp`, `name_sp`, `avatar`, `quantity`, `created_at`) VALUES
(13, 14, 18, 'IPHONE X', '1599253243-ipx.jpeg', 1, '2020-09-19 16:10:15'),
(14, 15, 18, 'IPHONE X', '1599253243-ipx.jpeg', 1, '2020-09-19 16:11:48'),
(15, 15, 19, 'Samsung S8', '1599253424-sss8.jpg', 1, '2020-09-19 16:11:48'),
(16, 16, 19, 'Samsung S8', '1599253424-sss8.jpg', 2, '2020-09-20 16:56:14'),
(17, 16, 16, 'Dell Precion M4800', '1599253194-dell_m4800.jpg', 1, '2020-09-20 16:56:14'),
(18, 17, 20, 'Nokia A32', '1599253520-nokia1.jpg', 1, '2020-09-20 19:23:16'),
(19, 18, 22, 'Dell 2018', '1599589192-dell1.jpg', 1, '2020-09-20 19:48:51'),
(20, 19, 23, 'Ipad pro', '1599590561-so1.jpg', 1, '2020-09-20 20:16:03'),
(21, 20, 18, 'IPHONE X', '1599253243-ipx.jpeg', 4, '2020-09-20 20:16:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(4) NOT NULL,
  `name_sp` varchar(255) NOT NULL,
  `id_loaisp` int(4) NOT NULL,
  `id_hangsx` int(4) NOT NULL,
  `gia_sp` int(20) DEFAULT NULL,
  `thongso_sp` text DEFAULT NULL,
  `mota_sp` text DEFAULT NULL,
  `noibat` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `name_sp`, `id_loaisp`, `id_hangsx`, `gia_sp`, `thongso_sp`, `mota_sp`, `noibat`, `avatar`, `status`, `sale`, `created_at`) VALUES
(16, 'Dell Precion M4800', 3, 5, 18000000, '', '', '', '1599253194-dell_m4800.jpg', 1, 5, '2020-09-04 21:04:26'),
(18, 'IPHONE X', 1, 3, 20000000, '', '', '', '1599253243-ipx.jpeg', 1, 5, '2020-09-04 21:00:43'),
(19, 'Samsung S8', 1, 1, 17000000, '', '', '', '1599253424-sss8.jpg', 1, 3, '2020-09-04 21:03:44'),
(20, 'Nokia A32', 1, 2, 12000000, '', '', '', '1599253520-nokia1.jpg', 1, 3, '2020-09-04 21:05:20'),
(21, 'Oppo A9 ', 1, 4, 17500000, '', '', '', '1599253714-op3.jfif', 1, 3, '2020-09-04 21:08:34'),
(22, 'Dell 2018', 3, 5, 26000000, '', '', '', '1599589192-dell1.jpg', 1, 15, '2020-09-08 18:19:52'),
(23, 'Ipad pro', 2, 3, 21000000, '', '', '', '1599590561-so1.jpg', 1, 15, '2020-09-08 18:42:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` tinyint(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `vip` tinyint(4) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `avatar`, `phone`, `email`, `gender`, `address`, `vip`, `create_at`) VALUES
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'SUP ADMIN', '1598381673-user-hinh-nen-may-tinh-4k-190.jpg', 355820911, 'thanhkudo1o11998@gmail.com', 1, 'Phú Lương, Hà Đông Hà Nội', 2, '2020-09-14 01:13:49'),
(21, 'thanhkudo', 'e10adc3949ba59abbe56e057f20f883e', 'Thanh Kudo', '1598383829-user-hinh-nen-may-tinh-4k-190.jpg', 355820911, 'thanhkudo1o11998@gmail.com', 1, 'Hà Nội', 1, '2020-08-25 19:30:29'),
(22, 'phuongpham', 'e10adc3949ba59abbe56e057f20f883e', 'Phuong Pham', '1598384109-user-57063.jpg', 332792626, 'khanhphuong090898@gmail.com', 0, 'Hà Nội', 0, '2020-08-25 19:35:09'),
(23, 'humho', 'e10adc3949ba59abbe56e057f20f883e', 'HumHo', '1598385974-user-IDOLTV-hinh-nen-may-tinh-anime-one-piece-full-HD-911401.jpg', 355820911, 'khanhphuong090898@gmail.com', 0, 'Hà Nội', 0, '2020-08-26 21:42:55'),
(24, 'ngongtopro', 'e10adc3949ba59abbe56e057f20f883e', 'Ngongtopro', '1598545593-user-Tuyển-tập-hình-nền-4K-dành-cho-máy-tính-đẹp-5.jpg', 333333333, 'donhuthanhxom@gmail.com', 1, 'Hà Nội', 0, '2020-08-27 16:26:33'),
(25, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'Test', '', 0, '', 1, '', 0, '2020-08-27 16:27:11'),
(26, 'admin1', 'fcea920f7412b5da7be0cf42b8c93759', 'admin1', '', 0, 'thanhkudo1o11998@gmail.com', 1, '', 0, '2020-09-06 19:53:03'),
(27, 'admin11', 'e020590f0e18cd6053d7ae0e0a507609', 'admin11', '', 0, '', 1, '', 0, '2020-08-28 18:57:14'),
(28, 'admin12', '1844156d4166d94387f1a4ad031ca5fa', 'admin12', '', 0, '', 1, '', 0, '2020-08-28 18:57:25'),
(29, 'admin13', '588e57b852a16b297af73ae818065474', 'admin13', '', 0, '', 1, '', 0, '2020-08-28 18:57:34'),
(30, 'admin14', 'bdc8341bb7c06ca3a3e9ab7d39ecb789', 'admin14', '', 0, '', 1, '', 0, '2020-08-28 18:57:53'),
(31, 'admin15', 'b26c077af60ba02d12c8436110256029', 'admin15', '', 0, '', 1, '', 0, '2020-08-28 18:58:08'),
(32, '444444', '73882ab1fa529d7273da0db6b49cc4f3', '444444', '', 0, '', 1, '', 0, '2020-08-28 21:02:41'),
(34, '123456', 'e10adc3949ba59abbe56e057f20f883e', '123456', '', 123456, '123456@sfsf.com', 0, '123456', 0, '2020-09-14 00:30:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hang_sx`
--
ALTER TABLE `hang_sx`
  ADD PRIMARY KEY (`id_hangsx`);

--
-- Chỉ mục cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`id_loaisp`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `hangsx` (`id_hangsx`),
  ADD KEY `loaisp` (`id_loaisp`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hang_sx`
--
ALTER TABLE `hang_sx`
  MODIFY `id_hangsx` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `hangsx` FOREIGN KEY (`id_hangsx`) REFERENCES `hang_sx` (`id_hangsx`),
  ADD CONSTRAINT `loaisp` FOREIGN KEY (`id_loaisp`) REFERENCES `loai_sp` (`id_loaisp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
