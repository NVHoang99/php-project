-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 20, 2021 lúc 01:16 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ismart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `create_date` int(11) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `email`, `fullname`, `age`, `gender`, `create_date`, `phone_number`, `address`, `role`) VALUES
(2, 'thainhu123', 'ea4ec0c82b5f8b09fd25e08d826cb47a', 'thainhu@gmail.com', 'Trần Thái Như', 20, 'female', 1621304125, '123456987', 'Bình Phước', '2'),
(3, 'hoang123', 'f7819129dd7753896ab6ee276ed6739a', 'hoang@gmail.com', 'Trần Thiên Hoàng', 22, 'male', 1621304125, '1155752005', 'Bình Định', '3'),
(4, 'vanthin123', '2d0ddbf86ec3befce1158a9f25ec3b81', 'vanthin@gmail.com', 'Nguyễn Văn Thìn', 22, 'male', 0, '1243543464', 'Quảng Bình', '2'),
(8, 'quang1234', '4196eba8e6d2da832e35e76ca73cb9d0', 'quang123@gmail.com', 'Trần Đình Quang', 22, 'male', 0, '089745625', 'Gò Vấp', '3'),
(11, 'hoangkk999', '7d7b3e207fdd184b4a53584ce922b3cb', 'nguyenhoangkk99@gmail.com', 'Hoang Viet Nguyen', 23, 'male', 0, '0392094653', 'Quan 1, Ho Chi Minh', '1'),
(12, 'huutai123', 'c14ba72820aab4d574407de5b82140df', 'huutai@gmail.com', 'Tai', 23, 'male', 0, '0392094653', 'sdasdas', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
