-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 06, 2017 lúc 10:55 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baotuong`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `catid` int(100) NOT NULL,
  `catname` varchar(200) NOT NULL,
  `catname_none` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`catid`, `catname`, `catname_none`) VALUES
(1, 'Dụng cụ', 'dung-cu'),
(2, 'Khăn ướt - Tẩy trang - Mặt nạ', 'khan-uot-tay-trang-mat-na'),
(3, 'Điện thoại và phụ kiện', 'dien-thoai-va-phu-kien'),
(4, 'Thời trang', 'thoi-trang'),
(5, 'Thiết bị điện và phụ kiện', 'thiet-bi-dien-va-phu-kien'),
(15, 'Phong thủy', 'phong-thuy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(10) NOT NULL,
  `discount_code` varchar(100) NOT NULL,
  `discount_content` text NOT NULL,
  `discount_start` varchar(255) NOT NULL,
  `discount_end` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `discount`
--

INSERT INTO `discount` (`discount_id`, `discount_code`, `discount_content`, `discount_start`, `discount_end`) VALUES
(3, 'VP141251DH', '- Khách hàng mua 01 thùng khuyến mãi 01 lốc cùng loại.<br>\r\n- Khách hàng mua 02 thùng khuyến mãi 04 lốc cùng loại.', '01-07-2017', '30-07-2017');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `pd_id` int(100) NOT NULL,
  `pd_code` varchar(100) NOT NULL,
  `pd_name` varchar(200) NOT NULL,
  `pd_price` int(50) NOT NULL,
  `pd_des` text NOT NULL,
  `pd_img` varchar(200) NOT NULL,
  `special` tinyint(1) NOT NULL,
  `discount_id` int(10) DEFAULT NULL,
  `dvt` int(100) NOT NULL,
  `note` text,
  `catid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`pd_id`, `pd_code`, `pd_name`, `pd_price`, `pd_des`, `pd_img`, `special`, `discount_id`, `dvt`, `note`, `catid`) VALUES
(27, 'P60', 'Đĩa nhám xếp', 6800, 'Đĩa nhám xếp - P60', '19478156_674850586037122_96027983_n.jpg', 0, 3, 1, '0', 1),
(28, 'P80', 'Đĩa nhám xếp', 6800, 'Đĩa nhám xếp - P80', '19478156_674850586037122_96027983_n.jpg', 0, 3, 1, '0', 1),
(29, 'P120', 'Đĩa nhám xếp', 6800, 'Đĩa nhám xếp - P120', '19478156_674850586037122_96027983_n.jpg', 0, 3, 1, '0', 1),
(31, 'P240', 'Đĩa nhám xếp', 6800, 'Đĩa nhám xếp - P240', 'dsdad.jpg', 0, 3, 1, '0', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(100) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`, `quantity`) VALUES
(1, 'Lốc', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(11, 'admin', 'admin', 'admin@baotuongtrading.com'),
(12, 'nhockool1002', '0909274128', 'kangtadragon@gmail.com'),
(13, 'hotro1', 'hotro', 'hotro1.baotuongtrading@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Chỉ mục cho bảng `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `catid` (`catid`),
  ADD KEY `discount_id` (`discount_id`),
  ADD KEY `dvt` (`dvt`);

--
-- Chỉ mục cho bảng `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT cho bảng `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT cho bảng `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `category` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`discount_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`dvt`) REFERENCES `unit` (`unit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
