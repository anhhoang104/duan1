-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2023 lúc 06:16 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bannoithat_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `created_at`) VALUES
(5, 'Nội thất phòng bếp', '2023-10-06 16:12:17'),
(6, 'Nội thất phòng khách', '2023-10-06 16:12:25'),
(7, 'Nội thất nhà tắm', '2023-10-06 16:12:33'),
(10, 'Nội thất bếp', '2023-10-23 09:07:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(66, 7, 29, 1, '2023-10-25 14:12:02'),
(67, 8, 28, 1, '2023-10-27 09:26:59'),
(68, 7, 28, 1, '2023-10-27 18:07:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `image`) VALUES
(20, 'Bàn', '2023-10-12 05:22:48', '1697088168.jpg'),
(21, 'Giường', '2023-10-12 05:22:56', '1697088176.png'),
(22, 'Tủ', '2023-10-12 05:23:04', '1697088184.jpg'),
(23, 'Ghế', '2023-10-12 05:34:07', '1697088847.png'),
(26, 'Bàn đá', '2023-10-23 09:06:44', '1698052004.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(191) NOT NULL,
  `comments` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(24, 'ntv25963', 7, 'An', 'nguyenvanducan2000@gmail.com', '123', '123', 12333, 'COD', '', 1, NULL, '2023-10-23 14:03:21'),
(25, 'ntv62993123', 7, 'An', 'jude@yahoo.com', '123123', '5rete', 8, 'COD', '', 1, NULL, '2023-10-23 14:22:29'),
(26, 'ntv89343', 7, 'An', 'jude@yahoo.com', '123', 'sfe', 246660, 'COD', '', 0, NULL, '2023-10-24 07:38:12'),
(27, 'ntv4313321', 7, 'An', 'jude@yahoo.com', '12321', 'qewqe', 129, 'COD', '', 0, NULL, '2023-10-24 07:40:19'),
(28, 'ntv45883', 7, 'An', 'nguyenvanducan2000@gmail.com', '123', '123', 12333, 'COD', '', 1, NULL, '2023-10-24 08:13:41'),
(29, 'ntv95433', 7, 'An', 'nguyenvanducan2000@gmail.com', '123', '123', 12333, 'Thanh toán khi nhận hàng', '', 2, NULL, '2023-10-24 08:14:05'),
(30, 'ntv71542', 6, 'An', 'nguyenvanducn2000@gmail.com', '312', '123wqwe', 246660, 'Thanh toán khi nhận hàng', '', 0, NULL, '2023-10-28 06:10:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `create_at`) VALUES
(30, 24, 29, 1, 12333, '2023-10-23 14:03:21'),
(31, 25, 28, 4, 2, '2023-10-23 14:22:29'),
(32, 26, 29, 20, 12333, '2023-10-24 07:38:12'),
(33, 27, 27, 1, 123, '2023-10-24 07:40:19'),
(34, 27, 28, 3, 2, '2023-10-24 07:40:19'),
(35, 28, 29, 1, 12333, '2023-10-24 08:13:41'),
(36, 29, 29, 1, 12333, '2023-10-24 08:14:05'),
(37, 30, 29, 20, 12333, '2023-10-28 06:10:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(1) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `productName`, `catid`, `brandid`, `product_desc`, `image`, `quantity`, `trending`, `price`) VALUES
(27, 'Ghế gỗ quí', 23, 6, 'qưeeqw', '1697093636.png', 122, 1, '123'),
(28, 'Tủ đá', 21, 6, 'ádasdassd', '1697181276.png', 27, 1, '2'),
(29, 'Bánh báo', 22, 6, 'qưeqw', '1697614842.jpg', -4, 1, '12333'),
(32, 'Bàn đá đá gỗ', 26, 6, 'Bàn đá này đá đá', '1698052090.jpg', 50, 1, '100000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `phone`, `password`, `created_at`, `type`, `token`, `status`) VALUES
(6, 'An An', 'nguyenvanducan2000@gmail.com', '0372432119', 202, '2023-10-06 07:14:06', 1, '72222f26125111e77af0cc6e4700fbc1', 0),
(8, 'An An', '123@gmail.com', '0372432119', 202, '2023-10-16 02:44:18', 0, NULL, 1),
(9, 'An An', 'ducan2000@gmail.com', '0372432119', 0, '2023-10-23 08:57:23', 0, '8cc48d2897565afc4362b1c6c7324e86', 0),
(11, 'An                                         ', 'jude@yahoo.com', '0372432119', 202, '2023-10-28 14:52:50', 0, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
