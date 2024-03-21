-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 25, 2024 lúc 05:12 AM
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
(5, 'Nike', '2023-12-25 05:38:47'),
(6, 'Adidas', '2023-12-25 05:38:55'),
(7, 'Puma', '2023-12-25 05:39:02'),
(10, 'Vans', '2023-12-25 05:39:10'),
(11, 'Converse', '2023-12-25 05:39:21'),
(12, 'Giày mới', '2024-02-25 04:03:24');

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
(68, 7, 28, 1, '2023-10-27 18:07:06'),
(102, 12, 36, 1, '2023-12-05 11:35:44'),
(103, 18, 38, 1, '2024-02-25 03:58:39');

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
(27, 'Giày thể thao', '2023-11-09 14:40:38', '1703482547.jpeg'),
(28, 'Giày công sở', '2023-11-09 14:40:52', '1703482572.jpg'),
(29, 'Giày boot', '2023-11-09 14:41:08', '1703482608.jpg'),
(30, 'Giày trẻ em', '2023-11-09 14:41:25', '1703482640.jpg'),
(31, 'Giày thời trang:', '2023-11-09 14:41:36', '1703482667.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `helpper`
--

CREATE TABLE `helpper` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `shipping` varchar(191) NOT NULL,
  `status` tinyint(191) NOT NULL,
  `comments` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `total_price`, `payment_mode`, `payment_id`, `shipping`, `status`, `comments`, `created_at`) VALUES
(29, 'ntv95433', 7, 'huyehn', 'ngochuyen@gmail.com', '123', '123', 12333, 'Thanh toán khi nhận hàng', '', '', 1, NULL, '2023-10-24 08:14:05'),
(30, 'ntv71542', 6, 'An', 'nguyenvanducn2000@gmail.com', '312', '123wqwe', 246660, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-10-28 06:10:09'),
(31, 'ntv607272432119', 6, 'An', 'nguyenvanducan2000@gmail.com', '0372432119', 'jnnj', 330000, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-11-13 04:00:05'),
(32, 'ntv271972432119', 6, 'An', 'nguyenvanducan2000@gmail.com', '0372432119', 'dsdf', 100000, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-11-14 13:53:29'),
(33, 'ntv159372432119', 12, 'Nguyen Van Duc An', 'nguyenvanducan2000@gmail.com', '0372432119', 'hg', 110000, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-11-23 09:21:15'),
(34, 'ntv832272432119', 12, 'Nguyen Van Duc An', 'nguyenvanducan2000@gmail.com', '0372432119', 'fewer', 100000, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-11-23 09:28:43'),
(35, 'ntv282172432119', 12, 'Nguyen Van Duc An', 'nguyenvanducan2000@gmail.com', '0372432119', 'ư3rwerq', 100000, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-11-23 09:30:06'),
(36, 'ntv231772432119', 12, 'Nguyen Van Duc An', 'nguyenvanducan2000@gmail.com', '0372432119', 'dfgdf', 100000, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-11-23 09:39:53'),
(37, 'ntv663172432119', 12, 'Nguyen Van Duc An', 'nguyenvanducan2000@gmail.com', '0372432119', 'hgu', 100000, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-11-23 09:41:36'),
(38, 'ntv848372432119', 12, 'Nguyen Van Duc An', 'nguyenvanducan2000@gmail.com', '0372432119', 'ngfh', 210000, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-11-23 10:00:33'),
(39, 'ntv253672432119', 12, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'Tan\nVietNam', 100000, 'Thanh toán bằng PayPal', '5LS416931Y3129839', '', 0, NULL, '2023-11-23 10:09:05'),
(40, 'ntv795272432119', 12, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'df\ngd', 100000, 'Thanh toán bằng PayPal', '29352240LC635490S', '', 0, NULL, '2023-11-23 10:10:05'),
(41, 'ntv502772432119', 12, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'ểwe', 100000, 'Thanh toán bằng PayPal', '31A462611R8210110', '', 0, NULL, '2023-11-23 10:12:14'),
(42, 'ntv436772432119', 12, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'rưer', 100000, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-11-23 10:13:33'),
(43, 'ntv153672432119', 12, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'ădasd', 100000, 'Thanh toán bằng PayPal', '2RJ09658Y9722212P', '', 0, NULL, '2023-11-23 10:15:51'),
(44, 'ntv539272432119', 12, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'Tan\r\nVietNam', 100000, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-11-23 10:18:11'),
(45, 'ntv974272432119', 12, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'Tan\nVietNam', 210000, 'Thanh toán bằng PayPal', '74A44377604266930', '', 0, NULL, '2023-11-23 10:34:04'),
(46, 'ntv212572432119', 12, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'hvh', 100000, 'Thanh toán bằng PayPal', '1DP28948JS0305805', '', 0, NULL, '2023-11-23 10:35:05'),
(47, 'ntv804172432119', 8, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'Tan\r\nVietNam', 120000, 'Thanh toán khi nhận hàng', '', '', 0, NULL, '2023-11-23 11:21:16'),
(48, 'ntv886872432119', 8, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'Tan\nVietNam', 300000, 'Thanh toán bằng PayPal', '51N73648A9637744L', '', 0, NULL, '2023-11-24 03:31:23'),
(49, 'ntv914972432119', 8, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'sds', 100000, 'Thanh toán bằng PayPal', '46W622258X434333G', '', 0, NULL, '2023-11-24 04:34:23'),
(50, 'ntv571172432119', 8, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'uih', 100000, 'Thanh toán khi nhận hàng', '', 'Giao hàng tiết kiệm', 0, NULL, '2023-11-24 04:38:30'),
(51, 'ntv580572432119', 8, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'h', 110000, 'Thanh toán bằng PayPal', '621410182L050914C', '', 0, NULL, '2023-11-24 04:41:37'),
(52, 'ntv933772432119', 8, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'ngfh', 100000, 'Thanh toán bằng PayPal', '11B55230GX439620Y', 'Loship', 1, NULL, '2023-11-24 04:43:57'),
(53, 'ntv486472432119', 8, 'An', 'nguyenvanducan2000@gmail.com', '0372432119', 'tổ 9 ấp 4 tân thanh cái bè tiền giang', 110000, 'Thanh toán khi nhận hàng', '', 'Loship', 2, NULL, '2023-11-30 05:12:24'),
(54, 'ntv147072432119', 8, 'An fe', 'nguyenvanducan2000@gmail.com', '0372432119', 'jhegfjba', 600000, 'Thanh toán khi nhận hàng', '', 'Loship', 0, NULL, '2023-12-01 08:22:19'),
(55, 'ntv804572432119', 6, 'An', 'nguyenvanducan2000@gmail.com', '0372432119', 'rtyrty', 2400000, 'Thanh toán khi nhận hàng', '', 'Bee', 0, NULL, '2023-12-04 09:42:30'),
(56, 'ntv57022654855', 19, 'ngochuyen', 'huyenit@gmail.com', '022654855', 'Tiền giang', 3000000, 'Thanh toán khi nhận hàng', '', 'Giao hàng tiết kiệm', 0, NULL, '2024-02-25 04:01:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(10) NOT NULL,
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
(37, 30, 29, 20, 12333, '2023-10-28 06:10:09'),
(38, 31, 35, 1, 120000, '2023-11-13 04:00:05'),
(39, 31, 34, 1, 110000, '2023-11-13 04:00:05'),
(40, 31, 33, 1, 100000, '2023-11-13 04:00:05'),
(41, 32, 33, 1, 100000, '2023-11-14 13:53:29'),
(42, 33, 34, 1, 110000, '2023-11-23 09:21:15'),
(43, 34, 33, 1, 100000, '2023-11-23 09:28:43'),
(44, 35, 33, 1, 100000, '2023-11-23 09:30:06'),
(45, 36, 33, 1, 100000, '2023-11-23 09:39:53'),
(46, 37, 33, 1, 100000, '2023-11-23 09:41:36'),
(47, 38, 34, 1, 110000, '2023-11-23 10:00:33'),
(48, 38, 33, 1, 100000, '2023-11-23 10:00:33'),
(49, 39, 33, 1, 100000, '2023-11-23 10:09:05'),
(50, 40, 33, 1, 100000, '2023-11-23 10:10:05'),
(51, 41, 33, 1, 100000, '2023-11-23 10:12:14'),
(52, 42, 33, 1, 100000, '2023-11-23 10:13:33'),
(53, 43, 33, 1, 100000, '2023-11-23 10:15:51'),
(54, 44, 33, 1, 100000, '2023-11-23 10:18:11'),
(55, 45, 34, 1, 110000, '2023-11-23 10:34:04'),
(56, 45, 33, 1, 100000, '2023-11-23 10:34:04'),
(57, 46, 33, 1, 100000, '2023-11-23 10:35:05'),
(58, 47, 35, 1, 120000, '2023-11-23 11:21:16'),
(59, 48, 33, 3, 100000, '2023-11-24 03:31:23'),
(60, 49, 33, 1, 100000, '2023-11-24 04:34:23'),
(61, 50, 33, 1, 100000, '2023-11-24 04:38:30'),
(62, 51, 34, 1, 110000, '2023-11-24 04:41:37'),
(63, 52, 33, 1, 100000, '2023-11-24 04:43:57'),
(64, 53, 34, 1, 110000, '2023-11-30 05:12:24'),
(65, 54, 33, 6, 100000, '2023-12-01 08:22:19'),
(66, 55, 35, 20, 120000, '2023-12-04 09:42:30'),
(67, 56, 42, 3, 1000000, '2024-02-25 04:01:57');

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
(36, 'Giày Vải Nữ Giày Thể Thao Thời Trang Giày Dạo Phố Phong Cách Hàn Quốc Nữ 11872', 27, 5, 'Chất liệu bên trên : Vải\r\n\r\n\r\n\r\nChất liệu bên trong : Vải thoáng khí\r\n\r\n\r\n\r\nKiểu đế : Đế bằng\r\n\r\n\r\nVật liệu đế : đế cao su chống trượt , chống mòn \r\n\r\n\r\n\r\nXuất xứ : Quảng  Châu\r\n\r\n\r\n\r\nĐế cao :4cm\r\n\r\n\r\n\r\nMàu sắc : Đen , Kem\r\n\r\n\r\n\r\nSize : 35,36,37,38,39, 40', '1703482819.jpg', 100, 1, '1000000'),
(37, 'Giày Vải Khóa Dán Nữ, Giày Dạo Phố Sinh Viên Phong Cách Hàn Quốc 12122', 27, 7, 'Chất liệu bên trên : Vải\r\n\r\n\r\n\r\nChất liệu bên trong : vải\r\n\r\n\r\n\r\nKiểu đế : đế bằng\r\n\r\n\r\nVật liệu đế : đế cao su chống trượt , chống mòn \r\n\r\n\r\n\r\nXuất xứ : Quảng  Châu\r\n\r\n\r\n\r\nĐế cao : 3cm\r\n\r\n\r\n\r\nMàu sắc : Đen , Trắng sữa , Đỏ\r\n\r\n\r\n\r\nSize : 35,36,37,38,39, 4', '1703482874.jpg', 100, 1, '7800000'),
(38, 'Giày Bốt Martin Da PU Lưới Phong Cách La Mã Nữ 11814', 29, 11, 'Chất liệu bên trên : Vải\r\n\r\n\r\n\r\nChất liệu bên trong : vải\r\n\r\n\r\n\r\nKiểu đế : đế bằng\r\n\r\n\r\nVật liệu đế : đế cao su chống trượt , chống mòn \r\n\r\n\r\n\r\nXuất xứ : Quảng  Châu\r\n\r\n\r\n\r\nĐế cao : 3cm\r\n\r\n\r\n\r\nMàu sắc : Đen , Trắng sữa , Đỏ\r\n\r\n\r\n\r\nSize : 35,36,37,38,39, 4', '1703482915.jpg', 100, 1, '120000'),
(39, 'Giày Bốt Martin Da PU Lưới Phong Cách La Mã Nữ 11814', 29, 5, 'Chất liệu bên trên : Vải\r\n\r\n\r\n\r\nChất liệu bên trong : vải\r\n\r\n\r\n\r\nKiểu đế : đế bằng\r\n\r\n\r\nVật liệu đế : đế cao su chống trượt , chống mòn \r\n\r\n\r\n\r\nXuất xứ : Quảng  Châu\r\n\r\n\r\n\r\nĐế cao : 3cm\r\n\r\n\r\n\r\nMàu sắc : Đen , Trắng sữa , Đỏ\r\n\r\n\r\n\r\nSize : 35,36,37,38,39, 4', '1703482945.jpg', 100, 1, '80000'),
(40, 'Giày Vải Nữ Giày Thể Thao Thời Trang ', 27, 7, 'Chất liệu bên trên : Vải\r\n\r\n\r\n\r\nChất liệu bên trong : vải\r\n\r\n\r\n\r\nKiểu đế : đế bằng\r\n\r\n\r\nVật liệu đế : đế cao su chống trượt , chống mòn \r\n\r\n\r\n\r\nXuất xứ : Quảng  Châu\r\n\r\n\r\n\r\nĐế cao : 3cm\r\n\r\n\r\n\r\nMàu sắc : Đen , Trắng sữa , Đỏ\r\n\r\n\r\n\r\nSize : 35,36,37,38,39, 4', '1703482996.jpg', 100, 1, '90000'),
(41, 'Dép Sandal Đế Cao Nữ 12127', 28, 6, 'Chất liệu bên trên : Vải\r\n\r\n\r\n\r\nChất liệu bên trong : vải\r\n\r\n\r\n\r\nKiểu đế : đế bằng\r\n\r\n\r\nVật liệu đế : đế cao su chống trượt , chống mòn \r\n\r\n\r\n\r\nXuất xứ : Quảng  Châu\r\n\r\n\r\n\r\nĐế cao : 3cm\r\n\r\n\r\n\r\nMàu sắc : Đen , Trắng sữa , Đỏ\r\n\r\n\r\n\r\nSize : 35,36,37,38,39, 4', '1703483035.jpg', 100, 1, '10000'),
(42, 'Dép Sandal Mùa Hè Cặp Đôi Đi Chơi Đi Biển Chống Trơn Trượt Chất Liệu Eva 11759', 31, 6, 'Chất liệu bên trên : Vải\r\n\r\n\r\n\r\nChất liệu bên trong : vải\r\n\r\n\r\n\r\nKiểu đế : đế bằng\r\n\r\n\r\nVật liệu đế : đế cao su chống trượt , chống mòn \r\n\r\n\r\n\r\nXuất xứ : Quảng  Châu\r\n\r\n\r\n\r\nĐế cao : 3cm\r\n\r\n\r\n\r\nMàu sắc : Đen , Trắng sữa , Đỏ\r\n\r\n\r\n\r\nSize : 35,36,37,38,39, 4', '1703483094.jpg', 97, 1, '1000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_unit`
--

CREATE TABLE `shipping_unit` (
  `id` int(11) NOT NULL,
  `name_ship` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping_unit`
--

INSERT INTO `shipping_unit` (`id`, `name_ship`, `price`, `status`) VALUES
(2, 'Giao hàng tiết kiệm', 56900, 0),
(4, 'Loship', 30000, 0),
(5, 'Bee', 25000, 0);

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
(12, 'huyen', '20004061@st.vlute.edu.vn', '099998888', 751, '2023-11-10 06:53:02', 1, '9486cd46ae6cd4828b5d11f63375b322', 0),
(18, 'ngochuyen', 'admin@gmail.com', '0939643264', 751, '2024-02-25 03:52:46', 0, NULL, 0),
(19, 'huyenne', 'ngochuyen@gmail.com', '0123456789', 751, '2024-02-25 04:00:53', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`id`, `prod_id`, `user_id`, `create_at`) VALUES
(61, 33, 12, '2023-11-23 10:01:21'),
(62, 36, 19, '2024-02-25 04:01:09'),
(63, 42, 19, '2024-02-25 04:01:19');

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
-- Chỉ mục cho bảng `helpper`
--
ALTER TABLE `helpper`
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
-- Chỉ mục cho bảng `shipping_unit`
--
ALTER TABLE `shipping_unit`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `helpper`
--
ALTER TABLE `helpper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `shipping_unit`
--
ALTER TABLE `shipping_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
