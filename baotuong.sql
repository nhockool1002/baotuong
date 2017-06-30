-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 30, 2017 lúc 07:05 SA
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
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `pd_id` int(100) NOT NULL,
  `pd_name` varchar(200) NOT NULL,
  `pd_price` decimal(15,3) NOT NULL,
  `pd_des` text NOT NULL,
  `pd_img` varchar(200) NOT NULL,
  `special` tinyint(1) NOT NULL,
  `catid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`pd_id`, `pd_name`, `pd_price`, `pd_des`, `pd_img`, `special`, `catid`) VALUES
(5, 'Khắn giấy 001', '10.000', 'Khắn giấy ướt 001 dùng cho trẻ em và các hoạt động hằng ngày .', '00000000000.jpg', 0, 2),
(6, 'Khắn giấy ướt 002', '25.000', 'Khắn giấy ướt 002 dùng cho trẻ em và các hoạt động...', '00000000003.jpg', 0, 2),
(7, 'Khắn giấy ướt 003', '50.000', 'Khắn giấy ướt 003 dùng cho trẻ em và các hoạt động...', '00000000002.jpg', 0, 2);

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
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `catid` (`catid`);

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
  MODIFY `catid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `category` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
