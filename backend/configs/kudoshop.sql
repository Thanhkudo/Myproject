-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 27, 2020 lúc 08:37 AM
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
-- Cấu trúc bảng cho bảng `hang_sx`
--

CREATE TABLE `hang_sx` (
  `id_hangsx` int(4) NOT NULL,
  `name_hangsx` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hang_sx`
--

INSERT INTO `hang_sx` (`id_hangsx`, `name_hangsx`) VALUES
(1, 'SAMSUNG'),
(2, 'NOKIA'),
(3, 'APPLE'),
(4, 'OPPO'),
(5, 'DELL'),
(6, 'ASUS'),
(7, 'SONY'),
(8, 'HP'),
(9, 'LENOVO');

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
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'SUP ADMIN', '1598381673-user-hinh-nen-may-tinh-4k-190.jpg', 355820911, 'thanhkudo1o11998@gmail.com', 1, 'Phú Lương, Hà Đông Hà Nội', 2, '2020-08-25 18:54:33'),
(21, 'thanhkudo', 'e10adc3949ba59abbe56e057f20f883e', 'Thanh Kudo', '1598383829-user-hinh-nen-may-tinh-4k-190.jpg', 355820911, 'thanhkudo1o11998@gmail.com', 1, 'Hà Nội', 1, '2020-08-25 19:30:29'),
(22, 'phuongpham', 'e10adc3949ba59abbe56e057f20f883e', 'Phuong Pham', '1598384109-user-57063.jpg', 332792626, 'khanhphuong090898@gmail.com', 0, 'Hà Nội', 0, '2020-08-25 19:35:09'),
(23, 'humho', 'e10adc3949ba59abbe56e057f20f883e', 'HumHo', '1598385974-user-IDOLTV-hinh-nen-may-tinh-anime-one-piece-full-HD-911401.jpg', 355820911, 'khanhphuong090898@gmail.com', 0, 'Hà Nội', 0, '2020-08-26 21:42:55');

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `hang_sx`
--
ALTER TABLE `hang_sx`
  MODIFY `id_hangsx` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
