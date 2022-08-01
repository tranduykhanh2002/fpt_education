-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2021 lúc 02:19 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `2021-duan1-nhom7`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT '61a70424e66f5-user.png',
  `role` tinyint(5) DEFAULT 1 COMMENT '1 user,2 nhân viên, 5 admin',
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `email`, `phone`, `avatar`, `role`, `password`, `created_at`, `updated_at`) VALUES
(31, 'admin', 'admin@gmail.com', '0123456789', '61a70424e66f5-user.png', 5, '$2y$10$EAKtq9DkkK6UJ4YUQlDlquIpu7S9BzsZ.pRLr7RZZH1OFBr8VeWSa', NULL, '2021-12-07 17:47:55'),
(32, 'dominhquan', 'doquan285lg@gmail.com', NULL, '61a70424e66f5-user.png', 2, '$2y$10$tTmb8e2EclRIIv.4FM9nju6WTofNQ08xlWtGK41XfWQZ22wh0AaMe', NULL, NULL),
(33, 'khách', 'quandmph13848@fpt.edu.vn', '0813600961', '61a70424e66f5-user.png', 1, '$2y$10$mQAEqadPOPGBO.1wMQs80.KmUrELlmDJFZ69MriY48KbRruBpi/Yi', NULL, '2021-12-08 02:48:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `recciever` varchar(50) NOT NULL COMMENT 'người nhận',
  `address` varchar(200) NOT NULL COMMENT 'địa chỉ nhận hàng',
  `note` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`user_id`, `id`, `phone`, `recciever`, `address`, `note`, `created_at`, `update_at`) VALUES
(33, 75, '0866474344', 'quan', 'hà nam', '', NULL, NULL),
(31, 76, '0866474344', 'quan', 'hà nam', 'giao sớm', NULL, NULL),
(31, 77, '0866474344', 'quan', 'hà nam', 'giao sớm', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(20) NOT NULL,
  `product_size` varchar(1) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sugar` varchar(255) NOT NULL,
  `ice` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `quantity`, `product_size`, `product_id`, `sugar`, `ice`, `created_at`, `status`) VALUES
(154, 31, 1, 'M', 41, '100%', '100%', NULL, 0),
(160, 31, 2, 'M', 33, '100%', 'Không đá', NULL, 0),
(163, 33, 1, 'M', 42, '100%', '100%', NULL, 0),
(164, 31, 2, 'M', 41, '100%', '100%', NULL, 0),
(165, 32, 2, 'M', 40, '100%', '100%', NULL, 0),
(166, 32, 0, 'M', 37, '100%', '100%', NULL, 0),
(168, 31, 2, 'M', 36, '100%', '100%', NULL, 0),
(169, 31, 4, 'M', 41, '100%', '100%', NULL, 0),
(170, 31, 2, 'M', 41, '100%', '100%', NULL, 0),
(171, 31, 5, 'M', 32, '100%', '100%', NULL, 0),
(172, 31, 2, 'L', 32, '100%', 'Không đá', NULL, 0),
(174, 31, 1, 'M', 32, '100%', '100%', NULL, 0),
(175, 31, 2, 'M', 32, '70%', '100%', NULL, 0),
(176, 31, 1, 'M', 32, '100%', '100%', NULL, 0),
(178, 31, 2, 'M', 38, '100%', '100%', NULL, 0),
(179, 31, 1, 'M', 32, '100%', '100%', NULL, 0),
(187, 31, 1, 'M', 39, '100%', '100%', NULL, 0),
(189, 31, 1, 'M', 34, '100%', '100%', NULL, 0),
(190, 31, 1, 'M', 32, '100%', '100%', NULL, 0),
(191, 31, 1, 'M', 36, '100%', 'Không đá', NULL, 0),
(192, 31, 1, 'M', 37, '100%', '100%', NULL, 0),
(194, 31, 1, 'M', 32, '100%', '100%', NULL, 0),
(197, 31, 1, 'M', 34, '100%', '100%', NULL, 0),
(199, 31, 1, 'M', 37, '100%', '100%', NULL, 0),
(201, 31, 1, 'M', 41, '100%', '100%', NULL, 0),
(203, 31, 1, 'M', 35, '100%', '100%', NULL, 0),
(204, 31, 1, 'M', 38, '100%', '100%', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `show_menu` tinyint(5) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `show_menu`, `created_at`, `updated_at`) VALUES
(16, 'Trà Sữa', 1, '2021-11-29 07:47:54', '2021-11-29 07:47:59'),
(17, 'Sữa Trái Cây', 1, '2021-11-30 08:47:59', '2021-11-30 08:14:16'),
(18, 'Macchiato Cream Cheese', 1, '2021-11-30 04:59:54', '2021-11-30 08:14:31'),
(25, '', 0, '2021-11-30 07:47:54', '2021-11-30 07:47:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cate_post`
--

CREATE TABLE `cate_post` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `show_menu` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cate_post`
--

INSERT INTO `cate_post` (`id`, `name`, `show_menu`, `created_at`, `updated_at`) VALUES
(7, 'Tin Tức', 1, '2021-12-05 08:32:38', '2021-12-05 08:32:42'),
(8, 'Khuyến Mại', 1, '2021-12-05 08:32:52', '2021-12-05 08:34:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time_close` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time_open` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `map` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `email`, `address`, `phone`, `time_close`, `time_open`, `map`) VALUES
(1, 'xiaohaha@gmail.com', 'FPT Phố Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội', '+84 356762617', '21:00 PM', '07:00 AM', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d257750.9432899951!2d105.65662938317045!3d20.982958573011018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1638751803120!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `favorite_products`
--

INSERT INTO `favorite_products` (`id`, `user_id`, `product_id`, `created_at`) VALUES
(90, 32, 40, '2021-12-08 03:13:20'),
(103, 31, 32, '2021-12-11 18:41:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(2) DEFAULT 1,
  `feedback_at` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `message`, `create_at`, `active`, `feedback_at`) VALUES
(48, 'Quân Đỗ Minh', 'quandmph13848@fpt.edu.vn', '0813600968', 'd', '2021/12/07', 2, '2021/12/07'),
(49, 'Quân Đỗ Minh', 'quandmph13848@fpt.edu.vn', '0813600968', '1111', '2021/12/08', 2, '2021/12/08'),
(50, 'Quân Đỗ Minh', 'quandmph13848@fpt.edu.vn', '0813600968', '1111111', '2021/12/09', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

CREATE TABLE `oder` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `done_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder`
--

INSERT INTO `oder` (`id`, `user_id`, `name`, `address`, `phone`, `note`, `sub_total`, `points`, `shipping`, `total`, `status`, `done_at`, `created_at`) VALUES
(118, 31, 'quan', 'hà nam', '0866474344', 'giao sớm', 33000, 0, 10000, 43000, 3, '2021-12-11', '2021-12-11 15:47:03'),
(122, 33, 'quan', 'hà nam', '0866474344', '', 33000, 0, 10000, 43000, 3, '2021-12-11', '2021-12-11 15:44:24'),
(125, 31, 'quan', 'hà nam', '0866474344', 'giao sớm', 374000, 0, 10000, 384000, 3, '2021-12-12', '2021-12-11 17:05:10'),
(126, 31, 'quan', 'hà nam', '0866474344', 'giao sớm', 50000, 0, 10000, 60000, 3, '2021-12-11', '2021-12-11 16:55:08'),
(127, 31, 'quan', 'hà nam', '0866474344', 'giao sớm', 100000, 0, 10000, 110000, 3, '2021-12-12', '2021-12-11 17:04:20'),
(128, 31, 'quan', 'hà nam', '0866474344', 'giao sớm', 270000, 0, 10000, 280000, 0, NULL, '2021-12-11 17:28:24'),
(129, 31, 'quan', 'hà nam', '0866474344', 'giao sớm', 116000, 0, 10000, 126000, 2, NULL, '2021-12-11 17:58:06'),
(130, 31, 'quan', 'hà nam', '0866474344', 'giao sớm', 50000, -23000, 10000, 37000, 3, NULL, '2021-12-11 18:07:06'),
(131, 31, 'quan', 'hà nam', '0866474344', 'giao sớm', 80000, -3700, 10000, 86300, 3, '2021-12-12', '2021-12-11 18:22:30'),
(132, 31, 'quan', 'hà nam', '0866474344', 'giao sớm', 25000, -8630, 10000, 26370, 3, '2021-12-12', '2021-12-11 18:36:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder_item`
--

CREATE TABLE `oder_item` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price_product` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder_item`
--

INSERT INTO `oder_item` (`id`, `cart_id`, `order_id`, `price_product`, `created_at`) VALUES
(53, 154, 118, 25000, '2021-12-07 14:52:11'),
(58, 163, 122, 25000, '2021-12-08 03:02:48'),
(66, 160, 125, 20000, '2021-12-08 03:29:55'),
(67, 164, 125, 25000, '2021-12-08 03:29:55'),
(68, 168, 125, 20000, '2021-12-08 03:29:55'),
(69, 169, 125, 25000, '2021-12-08 03:29:56'),
(70, 170, 126, 25000, '2021-12-10 02:07:44'),
(71, 171, 127, 20000, '2021-12-10 03:32:00'),
(72, 172, 128, 20000, '2021-12-11 17:28:24'),
(73, 174, 128, 20000, '2021-12-11 17:28:24'),
(74, 175, 128, 20000, '2021-12-11 17:28:24'),
(75, 176, 128, 20000, '2021-12-11 17:28:24'),
(76, 178, 128, 30000, '2021-12-11 17:28:24'),
(77, 179, 128, 20000, '2021-12-11 17:28:24'),
(78, 187, 129, 30000, '2021-12-11 17:47:19'),
(79, 189, 129, 25000, '2021-12-11 17:47:19'),
(80, 190, 129, 20000, '2021-12-11 17:47:19'),
(81, 191, 129, 20000, '2021-12-11 17:47:20'),
(82, 192, 130, 30000, '2021-12-11 18:05:22'),
(83, 194, 130, 20000, '2021-12-11 18:05:22'),
(84, 197, 131, 25000, '2021-12-11 18:22:15'),
(85, 199, 131, 30000, '2021-12-11 18:22:15'),
(86, 201, 131, 25000, '2021-12-11 18:22:15'),
(87, 203, 132, 25000, '2021-12-11 18:36:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` int(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `points`
--

INSERT INTO `points` (`id`, `user_id`, `points`) VALUES
(5, 31, 2637),
(6, 32, 1000),
(7, 33, 35300);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `summary` varchar(1000) NOT NULL,
  `cate_post_id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `create_by` varchar(255) NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `name`, `thumbnail`, `summary`, `cate_post_id`, `content`, `create_by`, `create_at`, `update_at`) VALUES
(30, 'Xiao bật mí cách săn iPhone 13 Pro Max', '61ad5d0d1a7cb-tt1.jpg', '<p>Xiao đem đến cho bạn cơ hội sở hữu iPhone 13 Pro Max h&agrave;ng tuần đến hết 20/12, k&egrave;m theo h&agrave;ng ngh&igrave;n qu&agrave; tặng hấp dẫn.</p>\r\n', 8, '<p>Từ 10/11 đến 20/12, t&iacute;n đồ ghiền tr&agrave; sữa - m&ecirc; T&aacute;o khuyết sẽ c&oacute; cơ hội quay số tr&uacute;ng thưởng iPhone 13 Pro Max h&agrave;ng tuần trong chương tr&igrave;nh khuyến m&atilde;i &ldquo;8 năm gắn kết triệu tr&aacute;i tim&rdquo; của ToCoToCo. Sự kiện n&agrave;y sẽ được livestream tr&ecirc;n fanpage Xiao v&agrave;o 20h mỗi thứ bảy.</p>\r\n', 'Tuyên', '2021-12-05 10:45:01', NULL),
(31, 'Chơi game nhận thưởng.', '61ae1305655a8-km2.jpg', '<p>Đ&acirc;y l&agrave; h&igrave;nh thức giảm gi&aacute; n&agrave;y kh&aacute; th&uacute; vị bởi n&oacute; khuyến kh&iacute;ch những người uống tr&agrave; sữa giữ g&igrave;n d&aacute;ng v&oacute;c v&agrave; sức khỏe.&nbsp;</p>\r\n', 8, '<p>Tham gia thư th&aacute;ch của Xiao Haha qu&iacute; kh&aacute;ch sẽ được giảm gi&aacute; dựa tr&ecirc;n số lever vượt qu&aacute;.</p>\r\n\r\n<p>Lever c&agrave;ng cao giảm gi&aacute; c&agrave;ng lớn.</p>\r\n', 'Tuyên', '2021-12-05 10:46:21', '2021-12-06 06:41:25'),
(32, 'Trung thu tặng quà. Xiao haha khuyến mãi mua 1 tặng 1.', '61ae123824b93-km1.png', '<p>Xiao Haha sẽ khuyến m&atilde;i kh&aacute;ch h&agrave;ng đến thưởng thức tr&agrave; sữa mua 1 tặng 1.</p>\r\n', 7, '<p>Với c&aacute;c t&iacute;n đồ đam m&ecirc; tr&agrave; sữa, m&oacute;n g&igrave; c&oacute; thể ng&aacute;n chứ chẳng thể n&agrave;o ng&aacute;n m&oacute;n tr&agrave; sữa thần th&aacute;nh đ&uacute;ng kh&ocirc;ng? Dịp Trung thu n&agrave;y, Xiao Haha sẽ khuyến m&atilde;i kh&aacute;ch h&agrave;ng đến thưởng thức tr&agrave; sữa mua 1 tặng 1 đ&uacute;ng chuẩn ngon m&ecirc; ly bạn nh&eacute;!</p>\r\n', 'Tuyên', '2021-12-05 10:48:17', '2021-12-06 06:38:00'),
(33, 'Thương hiệu trà sữa Xiao haha vẫn khẳng định được vị thế', '61ae11729993b-tt5.jpg', '<p>Xiao Haha l&agrave; một trong số &iacute;t những thương hiệu tr&agrave; sữa &ldquo;made in Việt Nam&rdquo; uy t&iacute;n nhận được sự y&ecirc;u th&iacute;ch của cộng đồng.</p>\r\n', 7, '<p>Nhận thấy tr&agrave; sữa l&agrave; một thị trường t&igrave;m năng nhưng lại bị &ldquo;phủ s&oacute;ng&rdquo; bởi h&agrave;ng loạt c&aacute;c thương hiệu nước ngo&agrave;i. Người Việt muốn uống tr&agrave; sữa phải bỏ ra số tiền rất lớn hoặc với nhiều bạn trẻ &ldquo;hầu bao&rdquo; &iacute;t hơn buộc phải mua những ly nước gi&aacute; rẻ m&agrave; tiềm ẩn trong đ&oacute; l&agrave; h&agrave;ng loạt c&aacute;c vấn đề từ h&oacute;a chất độc hại cho đến vệ sinh an to&agrave;n thực phẩm.</p>\r\n\r\n<p>Anh Nguyễn Đức Qu&acirc;n &ndash; chủ thương hiệu Chuỗi Tr&agrave; Sữa Xiao haha&nbsp;Việt Nam đ&atilde; nhanh ch&oacute;ng nắm bắt cơ hội v&agrave; cho ra đời thương hiệu &ldquo;tr&agrave; sữa quốc d&acirc;n&rdquo; Miutea với sứ mệnh mang đến thức uống ngon, gi&aacute; hợp l&yacute; v&agrave; nhất l&agrave; phải đảm bảo an to&agrave;n sức khỏe.</p>\r\n', 'Tuyên', '2021-12-05 10:50:01', '2021-12-06 06:34:42'),
(34, 'Nhân dịp khai trưởng cơ sở thứ 99 của Xiao', '61ae14084f365-km5.jpg', '<p>Nh&acirc;n dịp khai trưởng cơ sở thứ 99 của Xiao haha giảm gi&aacute; 30%.&Aacute;p dụng với tất cả kh&aacute;ch h&agrave;ng đến Xiao thưởng thức tr&agrave; sữa</p>\r\n', 7, '<p>Nhờ sự ủng hộ v&agrave; y&ecirc;u qu&iacute; của kh&aacute;ch h&agrave;ng, để mở rộng tầm ảnh hưởng v&agrave; đưa đến kh&aacute;ch h&agrave;ng những cốc tr&agrave; sữa thơm vị tr&agrave; ngon vị sữa. Ch&uacute;ng t&ocirc;i sẽ khai trương chi nh&aacute;nh thứ 99 v&agrave; sẽ giảm gi&aacute; 30% với tất cả c&aacute;c loại tr&agrave; sữa cho tất cả kh&aacute;ch h&agrave;ng đến với Xiao.</p>\r\n', 'Tuyên', '2021-12-05 10:54:02', '2021-12-06 06:49:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `price_ship`
--

CREATE TABLE `price_ship` (
  `id` int(11) NOT NULL,
  `price_ship` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `price_ship`
--

INSERT INTO `price_ship` (`id`, `price_ship`) VALUES
(1, 10000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `favorites` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `cate_id` int(11) NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `thumbnail`, `price`, `favorites`, `status`, `cate_id`, `create_at`, `update_at`) VALUES
(32, 'Matcha Đậu Đỏ', '61a3c340a9a75-sp1.jpg', 20000, 13, 1, 16, '2021-11-28 17:58:24', NULL),
(33, 'Sữa Tươi Trân Châu Baby Kem Café', '61a3c38e77d6e-sp2.jpg', 20000, 8, 1, 16, '2021-11-28 17:59:42', NULL),
(34, 'Trà Xanh', '61a3c3c8d728e-sp3.jpg', 25000, 4, 1, 16, '2021-11-28 18:00:40', '2021-11-28 18:01:20'),
(35, 'Trà Xanh Sữa Vị Nhài', '61a3c3e6e40a7-sp4.jpg', 25000, 5, 1, 16, '2021-11-28 18:01:10', '2021-11-28 18:04:19'),
(36, 'Trà Sữa Matcha', '61a3c49b81d49-sp5.jpg', 20000, 5, 1, 16, '2021-11-28 18:04:11', NULL),
(37, 'Trà Sữa Ô Long', '61a3c4c345219-sp7.jpg', 30000, 9, 1, 16, '2021-11-28 18:04:51', NULL),
(38, 'Ô Long Thái Cực', '61a3c4eacccfb-sp8.jpg', 30000, 5, 1, 16, '2021-11-28 18:05:30', NULL),
(39, 'Trà Sữa Caramel Grillé 130', '61a3c503a862e-sp9.jpg', 30000, 6, 1, 16, '2021-11-28 18:05:55', NULL),
(40, 'Trà Sữa Socola', '61a3c563bf95e-sp6.jpg', 25000, 4, 1, 16, '2021-11-28 18:07:31', NULL),
(41, 'Trà Sữa Bạc Hà', '61a3c57d2565e-sp10.jpg', 25000, 11, 1, 16, '2021-11-28 18:07:57', '2021-11-28 18:08:04'),
(42, 'Trà sữa', '61a3c5aaafbe9-sp11.jpg', 25000, 5, 1, 16, '2021-11-28 18:08:42', NULL),
(46, 'Quân Đỗ Minh Quân', '', 11, 2, 0, 16, '2021-11-30 04:10:59', '2021-11-30 04:12:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_options`
--

CREATE TABLE `products_options` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `price_topping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products_options`
--

INSERT INTO `products_options` (`id`, `cart_id`, `option_id`, `price_topping`) VALUES
(73, 154, 1, 8000),
(76, 163, 1, 8000),
(79, 165, 1, 8000),
(80, 166, 3, 7000),
(84, 168, 1, 8000),
(85, 168, 2, 9000),
(86, 168, 3, 7000),
(87, 169, 1, 8000),
(88, 169, 2, 9000),
(89, 169, 3, 7000),
(90, 172, 3, 7000),
(91, 175, 1, 8000),
(92, 176, 4, 6000),
(93, 178, 1, 8000),
(94, 178, 2, 9000),
(95, 187, 1, 8000),
(96, 189, 4, 6000),
(97, 190, 3, 7000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `pro_size` varchar(5) NOT NULL,
  `price_increase` int(11) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `pro_size`, `price_increase`, `create_at`, `update_at`) VALUES
(1, 'M', 0, NULL, NULL),
(2, 'L', 10000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statistical`
--

CREATE TABLE `statistical` (
  `id` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `revenue` int(15) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `statistical`
--

INSERT INTO `statistical` (`id`, `order_date`, `revenue`, `order`) VALUES
(1, '2021-11-09', 200000, 20),
(2, '2021-10-08', 300000, 20),
(6, '2021-08-21', 340000, 30),
(7, '2021-08-22', 45000, 30),
(8, '2021-08-27', 400000, 30),
(9, '2021-08-20', 100000, 0),
(10, '2021-12-09', 450000, 40),
(11, '2021-12-10', 350000, 30),
(19, '2021-12-11', 470000, 50),
(20, '2021-12-12', 606670, 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `toppings`
--

CREATE TABLE `toppings` (
  `id` int(11) NOT NULL,
  `price` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `toppings`
--

INSERT INTO `toppings` (`id`, `price`, `name`) VALUES
(1, 8000, 'Chân châu baby'),
(2, 9000, 'Khoai môn'),
(3, 7000, 'Chân châu đen'),
(4, 6000, 'Chân châu cam');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_acc` (`user_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_pro` (`product_id`),
  ADD KEY `fa_cart_acc` (`user_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cate_post`
--
ALTER TABLE `cate_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_favo_pro` (`product_id`),
  ADD KEY `Fk_favo_user` (`user_id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_oder_acc` (`user_id`);

--
-- Chỉ mục cho bảng `oder_item`
--
ALTER TABLE `oder_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orIe_oder` (`order_id`),
  ADD KEY `fk_pro_cate` (`cart_id`);

--
-- Chỉ mục cho bảng `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_points_acc` (`user_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_post_id` (`cate_post_id`);

--
-- Chỉ mục cho bảng `price_ship`
--
ALTER TABLE `price_ship`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pro_cate` (`cate_id`);

--
-- Chỉ mục cho bảng `products_options`
--
ALTER TABLE `products_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proOp_cate` (`cart_id`),
  ADD KEY `fk_option_topping` (`option_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statistical`
--
ALTER TABLE `statistical`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `cate_post`
--
ALTER TABLE `cate_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `oder`
--
ALTER TABLE `oder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT cho bảng `oder_item`
--
ALTER TABLE `oder_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `price_ship`
--
ALTER TABLE `price_ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `products_options`
--
ALTER TABLE `products_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `statistical`
--
ALTER TABLE `statistical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `toppings`
--
ALTER TABLE `toppings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_acc` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fa_cart_acc` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `fk_cart_pro` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `Fk_favo_pro` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `Fk_favo_user` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`);

--
-- Các ràng buộc cho bảng `oder`
--
ALTER TABLE `oder`
  ADD CONSTRAINT `Fk_oder_acc` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`);

--
-- Các ràng buộc cho bảng `oder_item`
--
ALTER TABLE `oder_item`
  ADD CONSTRAINT `fk_orderItem_or` FOREIGN KEY (`order_id`) REFERENCES `oder` (`id`),
  ADD CONSTRAINT `fk_pro_cate` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);

--
-- Các ràng buộc cho bảng `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `fk_points_acc` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_post_cate` FOREIGN KEY (`cate_post_id`) REFERENCES `cate_post` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `products_options`
--
ALTER TABLE `products_options`
  ADD CONSTRAINT `fk_option_topping` FOREIGN KEY (`option_id`) REFERENCES `toppings` (`id`),
  ADD CONSTRAINT `fk_proOp_cate` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
