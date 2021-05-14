-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 08, 2021 lúc 02:39 PM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_tuhoang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `quyen` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `staff_id`, `email`, `password`, `quyen`, `created_at`, `updated_at`) VALUES
(1, 2, 'hoangmanhtu0809@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-04-11 08:18:22', '2021-04-11 10:17:48'),
(2, 3, 'binkoy0809@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2021-04-12 06:00:47', '2021-04-12 08:00:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL COMMENT 'id của danh mục sản phẩm',
  `name` varchar(255) NOT NULL COMMENT 'tên của danh mục',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'ảnh danh mụd',
  `total_product` int(11) DEFAULT 0 COMMENT 'tổng sản phẩm',
  `category_status` tinyint(3) NOT NULL DEFAULT 0,
  `content` text NOT NULL COMMENT 'mô tả danh mục',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'trạng thái của danh mục',
  `hotcategory` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'danh mục hot',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `avatar`, `total_product`, `category_status`, `content`, `status`, `hotcategory`, `created_at`, `updated_at`) VALUES
(2, 'Máy Tính Bàn', '1618076030-tải xuống.jpg', 2, 1, '<p><em>producers</em></p>\r\n\r\n<p><em>producers</em></p>\r\n\r\n<p><em>producers</em></p>\r\n', 1, 1, '2021-04-10 17:33:50', NULL),
(3, 'Laptop', '1618076062-tải xuống (1).jpg', 3, 1, '<p>Laptop</p>\r\n', 1, 0, '2021-04-10 17:34:22', '2021-04-11 00:34:30'),
(4, 'Điện thoại', '1618649179-12 - Copy.jpg', 0, 1, '<p>Điện thoại di động</p>\r\n', 1, 1, '2021-04-17 08:46:19', NULL),
(5, 'Máy tính bảng', '1618649206-tải xuống (4).jpg', 1, 1, '<p>M&aacute;y t&iacute;nh bảng</p>\r\n', 1, 1, '2021-04-17 08:46:46', NULL),
(6, 'Phụ kiện', '1618652758-tải xuống (3).jpg', 1, 1, '<p>M&aacute;y t&iacute;nh bảng</p>\r\n', 1, 1, '2021-04-17 08:47:18', '2021-04-17 16:45:58'),
(7, 'Đồng hồ thông minh', '1618649278-images (9).jpg', 1, 1, '<p>Đồng hồ th&ocirc;ng minh</p>\r\n', 1, 0, '2021-04-17 08:47:58', NULL),
(8, 'Sim - Thẻ điện thoại', '1618649319-chi-ke-may-2-dau-karadium.jpg', 0, 1, '<p>Sim - Thẻ điện thoại</p>\r\n', 1, 1, '2021-04-17 08:48:39', '2021-04-17 19:26:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users',
  `fullname` varchar(255) DEFAULT NULL COMMENT 'Tên khách hàng',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ khách hàng',
  `phone` varchar(255) DEFAULT NULL COMMENT 'SĐT khách hàng',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email khách hàng',
  `note` text DEFAULT NULL COMMENT 'Ghi chú từ khách hàng',
  `price_total` int(11) DEFAULT NULL COMMENT 'Tổng giá trị đơn hàng',
  `payment_status` tinyint(2) DEFAULT NULL COMMENT 'Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán',
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo đơn',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `address`, `phone`, `email`, `note`, `price_total`, `payment_status`, `status`, `created_at`, `updated_at`) VALUES
(148, 1, 'Hoàng Mạnh Tú', 'Nam Định', '0395679339', 'hoangmanhtu0809@gmail.com', '', 131100000, 0, 1, '2021-04-19 18:19:40', '2021-04-27 15:39:48'),
(149, 1, 'Hoàng Mạnh Tú', 'Nam Định', '0395679339', 'hoangmanhtu0809@gmail.com', '', 131100000, 0, 1, '2021-04-19 18:20:54', '2021-04-27 15:39:48'),
(150, 1, 'Hoàng Mạnh Tú', 'Nam Định', '0395679339', 'hoangmanhtu0809@gmail.com', '', 463155000, 1, 1, '2021-04-19 18:42:33', '2021-04-27 15:39:48'),
(151, 0, 'Phan Anh Đức', 'Hà Đông-Hà Nội', '03489047484', 'binkoy0809@gmail.com', '', 47800000, 0, 1, '2021-04-20 01:47:42', '2021-04-27 15:39:48'),
(152, 3, 'Hoàng Mạnh Tú', 'Triều khúc- thanh trì- Hà Nội', '0846842286', 'binkoy0809@gmail.com', '', 68191000, 0, 1, '2021-04-20 02:31:00', '2021-04-27 15:39:48'),
(153, 3, 'Hoàng Mạnh Tú', 'Triều khúc- thanh trì- Hà Nội', '0846842286', 'binkoy0809@gmail.com', '', 68191000, 1, 1, '2021-04-20 02:31:40', '2021-04-27 15:39:48'),
(154, 3, 'Hoàng Mạnh Tú', 'Triều khúc- thanh trì- Hà Nội', '0846842286', 'binkoy0809@gmail.com', '', 68191000, 1, 1, '2021-04-20 02:32:18', '2021-04-27 15:39:48'),
(155, 3, 'Hoàng Mạnh Tú', 'Triều khúc- thanh trì- Hà Nội', '0846842286', 'binkoy0809@gmail.com', '', 47800000, 0, 1, '2021-04-20 08:41:58', '2021-04-27 15:39:48'),
(156, 3, 'Hoàng Mạnh Tú', 'Triều khúc- thanh trì- Hà Nội', '0846842286', 'binkoy0809@gmail.com', '', 47800000, 0, 1, '2021-04-20 08:42:28', '2021-04-27 15:39:48'),
(157, 3, 'Hoàng Mạnh Tú', 'Triều khúc- thanh trì- Hà Nội', '0846842286', 'binkoy0809@gmail.com', '', 47800000, 0, 1, '2021-04-20 08:42:34', '2021-04-27 15:39:48'),
(158, 1, 'Hoàng Mạnh Tú', 'Nam Định', '0395679339', 'hoangmanhtu0809@gmail.com', '', 17450000, 0, 1, '2021-04-26 19:14:52', '2021-04-27 15:39:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quality`) VALUES
(1, 149, 8, 3),
(2, 149, 7, 3),
(3, 150, 8, 3),
(4, 150, 6, 5),
(5, 151, 8, 2),
(6, 152, 9, 2),
(7, 153, 9, 2),
(8, 154, 9, 2),
(9, 155, 8, 2),
(10, 156, 8, 2),
(11, 157, 8, 2),
(12, 158, 12, 5),
(13, 159, 12, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producers`
--

CREATE TABLE `producers` (
  `id` int(11) NOT NULL COMMENT 'id của thương hiẹu',
  `name` varchar(255) DEFAULT NULL COMMENT 'tên của thương hiệu',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'ảnh thương hiệu',
  `content` text DEFAULT NULL COMMENT 'mô tả thương hiệu',
  `total_product` int(11) DEFAULT 0 COMMENT 'tổng số sản phẩm của thương hiệu',
  `status` tinyint(3) DEFAULT 0 COMMENT 'trạng thái của thương hiệu',
  `hotproducer` tinyint(3) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `producers`
--

INSERT INTO `producers` (`id`, `name`, `avatar`, `content`, `total_product`, `status`, `hotproducer`, `created_at`, `updated_at`) VALUES
(2, 'Dell', '1618075904-1571901685-dell_symbol.jpg', NULL, 7, 1, 1, '2021-04-10 17:31:44', NULL),
(3, 'Asus', '1618075916-Asus-Logo.png', NULL, 1, 1, 0, '2021-04-10 17:31:56', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT 'id của sản phẩm',
  `title` varchar(255) NOT NULL COMMENT 'tiêu đề của sản phẩm',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'ảnh của sản phẩm',
  `category_id` int(11) NOT NULL COMMENT 'danh mục của sản phẩm',
  `producer_id` int(11) NOT NULL COMMENT 'thương hiệu của sản phẩm',
  `price` float DEFAULT NULL COMMENT 'giá của sp',
  `discount` int(11) DEFAULT NULL COMMENT '% khuyến mại',
  `quality` varchar(255) DEFAULT '0',
  `summary` text DEFAULT NULL COMMENT 'mô tả ngắn sản phẩm',
  `content` text DEFAULT NULL COMMENT 'mô tả chi tiết sản phẩm',
  `present` text DEFAULT NULL COMMENT 'quà tặng',
  `total_rating` int(11) DEFAULT NULL,
  `total_number_rating` int(11) DEFAULT NULL,
  `status` tinyint(3) DEFAULT 0,
  `hotproduct` tinyint(3) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `avatar`, `category_id`, `producer_id`, `price`, `discount`, `quality`, `summary`, `content`, `present`, `total_rating`, `total_number_rating`, `status`, `hotproduct`, `created_at`, `updated_at`) VALUES
(6, 'Macbook Pro 13 inch 2019 MV972 Core I7 2.8Ghz 16GB 1000GB SSD New 100%', '1618735853-huawei-t10s-600x600-600x600.jpg', 3, 2, 86990000, 10, '0', '<p>111</p>\r\n', '<p>111</p>\r\n', NULL, NULL, NULL, 1, 0, '2021-04-10 19:15:27', '2021-04-18 15:50:53'),
(7, 'Điện thoại Iphone 12 ', '1618082952-images (1).jpg', 2, 3, 19800000, 0, '4', '<p>Điện thoại Iphone 12&nbsp;</p>\r\n', '<p>Điện thoại Iphone 12&nbsp;</p>\r\n', '', 3, 14, 1, 1, '2021-04-10 19:29:12', '2021-04-18 22:48:57'),
(8, 'iPhone 12 chính hãng VN/A (Full VAT)', '1618082998-tải xuống.jpg', 3, 2, 23900000, 0, '5', '<p>Điện thoại Iphone 12&nbsp;</p>\r\n', '<p>Điện thoại Iphone 12&nbsp;</p>\r\n', '', 2, 10, 1, 1, '2021-04-10 19:29:58', '2021-04-18 22:27:00'),
(9, 'Macbook Pro 13 inch 2021', '1618735748-acer-aspire-5-a514-54-33wy-i3-nxa23sv00j-021220-101200-400x400.jpg', 2, 2, 35890000, 5, '10', '<p>M&agrave;n h&igrave;nh:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-ips-lcd-la-gi-905752\" target=\"_blank\">IPS LCD</a>, 6.52&quot;,&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#hd\" target=\"_blank\">HD+</a></p>\r\n\r\n<hr />\r\n<p>Hệ điều h&agrave;nh:<a href=\"https://www.thegioididong.com/hoi-dap/android-11-la-gi-co-gi-moi-thiet-bi-nao-duoc-cap-nhat-1306447\" target=\"_blank\">Android 11</a></p>\r\n\r\n<hr />\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/do-phan-giai-camera-tren-smartphone-la-gi-1339722\" target=\"_blank\">Camera sau:</a>Ch&iacute;nh 13 MP &amp; Phụ 2 MP, 2 MP</p>\r\n\r\n<hr />\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/do-phan-giai-camera-tren-smartphone-la-gi-1339722\" target=\"_blank\">Camera trước:</a>8 MP</p>\r\n\r\n<hr />\r\n<p>Chip:<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-xu-ly-helio-g-series-cua-mediatek-1284166#helio-g35\" target=\"_blank\">MediaTek Helio G35</a></p>\r\n\r\n<hr />\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a>3 GB</p>\r\n\r\n<hr />\r\n<p>Bộ nhớ trong:64 GB</p>\r\n\r\n<hr />\r\n<p>SIM:<a href=\"https://www.thegioididong.com/hoi-dap/sim-thuong-micro-sim-nano-sim-esim-la-gi-co-gi-khac-nhau-1310659#nano-sim\" target=\"_blank\">2 Nano SIM</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/mang-du-lieu-di-dong-4g-la-gi-731757\" target=\"_blank\">Hỗ trợ 4G</a></p>\r\n\r\n<hr />\r\n<p>Pin:5000 mAh, Sạc nhanh</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Đặc điểm nổi bật của Vsmart Star 5 (3GB/64GB)</p>\r\n\r\n<p>a<img src=\"https://www.thegioididong.com/Content/desktop/images/V4/icon-yt.png\" /></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, S&aacute;ch hướng dẫn, C&acirc;y lấy sim, Ốp lưng, C&aacute;p Type C, Củ sạc nhanh rời đầu Type A</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd/vsmart-star-5-64gb\" target=\"_blank\">Vsmart Star 5 (3GB/64GB)</a>&nbsp;mẫu điện thoại tiếp theo đến từ&nbsp;<a href=\"https://www.thegioididong.com/dtdd-vsmart\" target=\"_blank\">Vsmart</a>&nbsp;được ra mắt, sản phẩm c&oacute; một cấu h&igrave;nh đủ d&ugrave;ng, ngoại h&igrave;nh thiết kế b&ecirc;n ngo&agrave;i đơn giản v&agrave; c&oacute; mức gi&aacute; rất phải chăng. So với&nbsp;<a href=\"https://www.thegioididong.com/dtdd/vsmart-star-4\" target=\"_blank\">Vsmart Star 4</a>&nbsp;th&igrave; m&aacute;y ho&agrave;n to&agrave;n c&oacute; nhiều ưu điểm vượt trội hơn rất đ&aacute;ng để mọi người sở hữu.</p>\r\n\r\n<p>Ngoại h&igrave;nh hiện đại, bắt mắt</p>\r\n\r\n<p>Vsmart Star 5 c&oacute; thiết kế nguy&ecirc;n khối với mặt lưng nhựa cao cấp, kết hợp c&ugrave;ng c&aacute;c g&oacute;c được bo tr&ograve;n bầu bĩnh mang lại cảm gi&aacute;c cầm nắm rất dễ chịu, thoải m&aacute;i. C&aacute;c ch&ugrave;m s&aacute;ng toả ra từ cụm camera sau v&agrave; logo đặc trưng của Vsmart được đặt giữa th&acirc;n m&aacute;y, tạo n&ecirc;n điểm nhấn ấn tượng v&agrave; tinh tế.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/236260/vsmart-star-5-64gb-13.jpg\" onclick=\"return false;\"><img alt=\"Vsmart Star 5 (3GB/64GB) | Thiết kế nguyên khối với mặt lưng nhựa cao cấp\" src=\"https://cdn.tgdd.vn/Products/Images/42/236260/vsmart-star-5-64gb-13.jpg\" /></a></p>\r\n\r\n<p>Cải tiến hơn với hệ thống 3 ống k&iacute;nh camera sau nằm gọn trong m&ocirc;-đun h&igrave;nh chữ nhật, c&ugrave;ng đ&egrave;n flash quen thuộc c&oacute; thể d&ugrave;ng thay đ&egrave;n pin tiện dụng. Chiếc điện thoại cũng kh&aacute; gọn nhẹ, trọng lượng chỉ 196.26 g.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/236260/vsmart-star-5-64gb-12.jpg\" onclick=\"return false;\"><img alt=\"Vsmart Star 5 (3GB/64GB) | Cấu tạo gọn nhẹ, trọng lượng chỉ 196.26 g, vân tay mặt lưng tiện lợi\" src=\"https://cdn.tgdd.vn/Products/Images/42/236260/vsmart-star-5-64gb-12.jpg\" /></a></p>\r\n\r\n<p>Chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">smartphone gi&aacute; rẻ</a>&nbsp;n&agrave;y được trang bị cảm biến v&acirc;n tay đặt ở mặt lưng kh&aacute; th&ocirc;ng dụng ở c&aacute;c sản phẩm trong c&ugrave;ng tầm gi&aacute;. Cảm biến gi&uacute;p người d&ugrave;ng c&oacute; thể mở kh&oacute;a, bảo mật m&aacute;y vừa tiện lợi vừa an to&agrave;n.</p>\r\n\r\n<p>Thu h&uacute;t hơn với m&agrave;n h&igrave;nh rộng&nbsp;</p>\r\n\r\n<p>Vsmart Star 5 nổi bật trong thiết kế m&agrave;n h&igrave;nh lớn 6.52 inch, cho người d&ugrave;ng g&oacute;c nh&igrave;n cực kỳ thoải m&aacute;i, tiện lợi cho c&ocirc;ng việc cũng như l&agrave; c&aacute;c hoạt động giải tr&iacute; như: Lướt web, đọc b&aacute;o hoặc xem tin tức,&hellip; từng trải nghiệm đều được r&otilde; r&agrave;ng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/236260/vsmart-star-5-64gb-5.jpg\" onclick=\"return false;\"><img alt=\"Vsmart Star 5 (3GB/64GB) | Màn hình lớn 6.52 inch\" src=\"https://cdn.tgdd.vn/Products/Images/42/236260/vsmart-star-5-64gb-5.jpg\" /></a></p>\r\n\r\n<p>C&ocirc;ng nghệ m&agrave;n h&igrave;nh&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-ips-lcd-la-gi-905752\" target=\"_blank\">IPS LCD</a>&nbsp;c&oacute; độ ph&acirc;n giải&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#hd\" target=\"_blank\">HD+</a>&nbsp;cung cấp gam m&agrave;u rộng, m&agrave;u sắc tốt, khả năng cải thiện g&oacute;c nh&igrave;n cao mang lại chất lượng hiển thị r&otilde; r&agrave;ng, đẹp đẽ hơn.</p>\r\n\r\n<p>Lưu giữ khoảnh khắc với cụm camera AI</p>\r\n\r\n<p>Chiếc điện thoại Vsmart Star 5 được hỗ trợ tận 3 camera với th&ocirc;ng số camera ch&iacute;nh 13 MP,&nbsp;<a href=\"https://www.thegioididong.com/dtdd-camera-macro\" target=\"_blank\">camera macro</a>&nbsp;2 MP v&agrave;&nbsp;<a href=\"https://www.thegioididong.com/dtdd-camera-xoa-phong\" onclick=\"window.open(this.href, \'\', \'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no\'); return false;\">camera xo&aacute; ph&ocirc;ng</a>&nbsp;2 MP c&ugrave;ng một số t&iacute;nh năng đi k&egrave;m gi&uacute;p người d&ugrave;ng thoải m&aacute;i chụp ảnh mỗi khi cần thiết.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/236260/vsmart-star-5-64gb-6.jpg\" onclick=\"return false;\"><img alt=\"Vsmart Star 5 (3GB/64GB) | 3 ống kính camera sau nằm gọn trong mô-đun hình chữ nhật bắt mắt\" src=\"https://cdn.tgdd.vn/Products/Images/42/236260/vsmart-star-5-64gb-6.jpg\" /></a></p>\r\n\r\n<p>Th&ocirc;ng số camera tr&ecirc;n m&aacute;y kh&aacute; tốt, b&ecirc;n cạnh đ&oacute; c&aacute;c t&iacute;nh năng chụp ảnh AI, cũng như khả năng quay video Full HD,... mang lại những cảnh quay, h&igrave;nh ảnh v&ocirc; c&ugrave;ng sắc n&eacute;t. Chụp ảnh tốt bất kể ng&agrave;y đ&ecirc;m với t&iacute;nh năng chụp đ&ecirc;m&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-chup-dem-night-mode-la-gi-907873\" target=\"_blank\">(Night Mode)</a>.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/236260/vsmart-star-5-64gb-4.jpg\" onclick=\"return false;\"><img alt=\"Vsmart Star 5 (3GB/64GB) | Tính năng chụp ảnh AI, tính năng chụp đêm (Night Mode) được trang bị\" src=\"https://cdn.tgdd.vn/Products/Images/42/236260/vsmart-star-5-64gb-4.jpg\" /></a></p>\r\n\r\n<p>V&igrave; được trang bị kh&aacute; đầy đủ c&aacute;c chức năng chỉnh sửa như: Khả năng xo&aacute; ph&ocirc;ng l&agrave;m nổi bật chủ thể, tự động lấy n&eacute;t,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/che-do-chup-anh-hdr-tren-smartphone-la-gi-906400\" target=\"_blank\">HDR</a>,...&nbsp;Vsmart Star 5 mang đến sự tự tin cho người d&ugrave;ng ở mọi lần nh&aacute;y m&aacute;y.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/236260/vsmart-star-5-64gb-18.jpg\" onclick=\"return false;\"><img alt=\"Vsmart Star 5 (3GB/64GB) | Camera selfie độ phân giải 8 MP\" src=\"https://cdn.tgdd.vn/Products/Images/42/236260/vsmart-star-5-64gb-18.jpg\" /></a></p>\r\n\r\n<p>Mặt trước của điện thoại sở hữu camera selfie độ ph&acirc;n giải 8 MP&nbsp;t&iacute;ch hợp t&iacute;nh năng l&agrave;m đẹp AI, x&oacute;a ph&ocirc;ng,... gi&uacute;p bạn tỏa s&aacute;ng tự tin chia sẻ h&igrave;nh ảnh với người th&acirc;n v&agrave; bạn b&egrave;.</p>\r\n\r\n<p>Hiệu năng ổn định c&ugrave;ng Helio G35</p>\r\n\r\n<p>Vsmart Star 5 sẽ sử dụng con chip&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-xu-ly-helio-g-series-cua-mediatek-1284166#helio-g35\" target=\"_blank\">MediaTek Helio G35 8 nh&acirc;n</a>&nbsp;tiến tr&igrave;nh sản xuất 12 nm, c&oacute; xung nhịp tối đa 2.5 GHz v&agrave; đi k&egrave;m l&agrave; GPU PowerVR GE8320 gi&uacute;p m&aacute;y được cải thiện đ&aacute;ng kể về mặt hiệu năng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/236260/vsmart-star-5-002.jpg\" onclick=\"return false;\"><img alt=\"Vsmart Star 5 (3GB/64GB) | Trang bị chip MediaTek Helio G35\" src=\"https://cdn.tgdd.vn/Products/Images/42/236260/vsmart-star-5-002.jpg\" /></a></p>\r\n\r\n<p>M&aacute;y chơi tốt c&aacute;c tựa game nhẹ, cơ bản như Plant vs Zombie hay Candy Crush,... với Helio G35 thiết bị cũng chơi được Li&ecirc;n Qu&acirc;n Mobile ở mức tinh chỉnh thấp nhất.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/236260/vsmart-star-5-64gb-1.jpg\" onclick=\"return false;\"><img alt=\"Vsmart Star 5 (3GB/64GB) | Sử dụng con chip MediaTek Helio G35 8 nhân\" src=\"https://cdn.tgdd.vn/Products/Images/42/236260/vsmart-star-5-64gb-1.jpg\" /></a></p>\r\n\r\n<p>Star 5 sẽ được đi k&egrave;m&nbsp;<a href=\"https://www.thegioididong.com/dtdd-ram-duoi-4gb\" target=\"_blank\">RAM 3 GB</a>&nbsp;đủ để bạn thao t&aacute;c đa nhiệm, mượt m&agrave; c&ugrave;ng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-rom-32-den-64gb\" target=\"_blank\">bộ nhớ trong 64 GB</a>&nbsp;v&agrave; hỗ trợ mở rộng dung lượng qua&nbsp;thẻ nhớ&nbsp;MicroSD tối đa 256 GB đủ thoải m&aacute;i cho bạn lưu trữ nhiều dữ liệu h&igrave;nh ảnh, video y&ecirc;u th&iacute;ch.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/236260/vsmart-star-5-001.jpg\" onclick=\"return false;\"><img alt=\"Vsmart Star 5 (3GB/64GB) | Hỗ trợ thẻ nhớ ngoài\" src=\"https://cdn.tgdd.vn/Products/Images/42/236260/vsmart-star-5-001.jpg\" /></a></p>\r\n\r\n<p>Dung lượng pin lớn, trải nghiệm cả ng&agrave;y</p>\r\n\r\n<p>Smartphone sẵn s&agrave;ng đ&aacute;p ứng cho bạn một ng&agrave;y d&agrave;i l&agrave;m việc, học tập hay giải tr&iacute; xuy&ecirc;n suốt dễ d&agrave;ng dưới sự cung cấp năng lượng của vi&ecirc;n pin đi k&egrave;m 5000 mAh. Dung lượng pin lớn cho ph&eacute;p người d&ugrave;ng hoạt động c&aacute;c tiện &iacute;ch cơ bản tr&ecirc;n thiết bị bền bỉ với thời gian.&nbsp;</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/236260/vsmart-star-5-64gb-8.jpg\" onclick=\"return false;\"><img alt=\"Vsmart Star 5 (3GB/64GB) | Viên pin đi kèm dung lượng lớn 5000 mAh\" src=\"https://cdn.tgdd.vn/Products/Images/42/236260/vsmart-star-5-64gb-8.jpg\" /></a></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, m&aacute;y c&ograve;n hỗ trợ&nbsp;<a href=\"https://www.thegioididong.com/dtdd-sac-pin-nhanh\" target=\"_blank\">sạc nhanh</a>&nbsp;15 W, đối với d&ograve;ng m&aacute;y gi&aacute; rẻ đ&acirc;y quả l&agrave; một ưu &aacute;i lớn gi&uacute;p bạn c&oacute; những gi&acirc;y ph&uacute;t sử dụng điện thoại được nhiều hơn, thời gian chờ sạc cũng sẽ giảm đi đ&aacute;ng kể.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/236260/vsmart-star-5-64gb-15.jpg\" onclick=\"return false;\"><img alt=\"Vsmart Star 5 (3GB/64GB) | Hỗ trợ sạc nhanh 15 W\" src=\"https://cdn.tgdd.vn/Products/Images/42/236260/vsmart-star-5-64gb-15.jpg\" /></a></p>\r\n\r\n<p>Vsmart Star 5 sở hữu thống số cấu h&igrave;nh kh&ocirc;ng qu&aacute; ấn tượng nhưng m&aacute;y ho&agrave;n to&agrave;n ph&ugrave; hợp với c&aacute;c bạn học sinh, sinh vi&ecirc;n, người d&ugrave;ng lớn tuổi hoặc l&agrave;m chiếc m&aacute;y phụ cho người d&ugrave;ng c&oacute; c&aacute;c thao t&aacute;c cơ bản, giải tr&iacute; đơn giản.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bài vi&ecirc;́t này có hữu ích cho Bạn kh&ocirc;ng ?</p>\r\n\r\n<p><a href=\"javascript:void(0);\" onclick=\"chooseReview(this)\">Hữu ích</a>&nbsp;<a href=\"javascript:void(0);\" onclick=\"chooseReview(this)\">Kh&ocirc;ng Hữu ích</a></p>\r\n', '<ul>\r\n	<li>Tặng 10GB Data 4G/Th&aacute;ng (trong 18 Th&aacute;ng)&nbsp;<a href=\"http://www.thegioididong.com/tin-tuc/dang-ky-vsim-khi-mua-vsmart-star-5-1337653\">Xem chi tiết</a></li>\r\n	<li>Nhập m&atilde; VNPAY70 giảm th&ecirc;m 70.000đ cho đơn h&agrave;ng từ 3 triệu khi thanh to&aacute;n qu&eacute;t QRcode qua App của ng&acirc;n h&agrave;ng&nbsp;<a href=\"http://www.thegioididong.com/tin-tuc/chuong-trinh-giam-70-ngan-cho-don-hang-tu-3-trieu--1334687\" target=\"_blank\">(click xem chi tiết)</a></li>\r\n</ul>\r\n', 2, 10, 1, 1, '2021-04-10 19:36:27', '2021-04-18 22:07:26'),
(10, 'Laptop Lenovo IdeaPad Slim 3 15IIL05 i3 1005G1/4GB/512GB/Win10 (81WE003RVN)', '1618882005-lenovo-ideapad-3-15iil05-i3-81we003rvn-211520-101539-400x400.jpg', 3, 2, 12800000, 10, '10', '<ul>\r\n	<li>CPU:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-vi-xu-ly-intel-core-the-he-10-1212148\" target=\"_blank\">Intel Core i3 Ice Lake</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-cpu-laptop-intel-core-i3-1005g1-1237612\" target=\"_blank\">1005G1</a>, 1.20 GHz</li>\r\n	<li>RAM:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/ram-lap-top-la-gi-dung-luong-bao-nhieu-la-du-1172167\" target=\"_blank\">4 GB</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/ram-ddr4-la-gi-882173#ddr4\" target=\"_blank\">DDR4 (On board +1 khe)</a>, 2666 MHz</li>\r\n	<li>Ổ cứng:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/o-cung-ssd-la-gi-923073\" target=\"_blank\">SSD: 512 GB, M.2 PCIe</a>, Hỗ trợ khe cắm HDD SATA</li>\r\n	<li>M&agrave;n h&igrave;nh: 15.6&quot;,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-fhd-la-gi-956294\" target=\"_blank\">Full HD (1920 x 1080)</a></li>\r\n	<li>Card m&agrave;n h&igrave;nh:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/card-do-hoa-tich-hop-la-gi-950047\" target=\"_blank\">Card đồ họa t&iacute;ch hợp</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/card-man-hinh-intel-uhd-graphics-tren-laptop-la-gi-1199634\" target=\"_blank\">Intel UHD Graphics</a></li>\r\n	<li>Cổng kết nối:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-tieu-chuan-cong-usb-tren-laptop-va-cach-phan-b-1180516\" target=\"_blank\">2 x USB 3.0</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/hoi-dap-hdmi-la-gi-930605\" target=\"_blank\">HDMI</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-tieu-chuan-cong-usb-tren-laptop-va-cach-phan-b-1180516#usb-20\" target=\"_blank\">USB 2.0</a></li>\r\n	<li>Hệ điều h&agrave;nh:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-windows-10-va-cac-phien-ban-cua-no-hie-1184370\" target=\"_blank\">Windows 10 Home SL</a></li>\r\n	<li>Thiết kế:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/chat-lieu-thuong-dung-tren-laptop-va-uu-nhuoc-diem-1192823\" target=\"_blank\">Vỏ nhựa</a>, PIN liền</li>\r\n	<li>K&iacute;ch thước: D&agrave;y 19.9 mm, 1.85 kg</li>\r\n	<li>Thời điểm ra mắt: 2020</li>\r\n</ul>\r\n', '<h2>Đặc điểm nổi bật của Lenovo IdeaPad Slim 3 15IIL05 i3 1005G1/4GB/512GB/Win10 (81WE003RVN)</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/44/223534/Slider/vi-vn-lenovo-ideapad-3-15iil05-i3-81we003rvn.jpg\" /><img src=\"https://www.thegioididong.com/Content/desktop/images/V4/icon-yt.png\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-man-hinh-chong-choi-anti-glare-1182688\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-vi-xu-ly-intel-core-the-he-10-1212148\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/o-cung-ssd-la-gi-923073\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-cong-nghe-dolby-audio-premium-1017812\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: S&aacute;ch hướng dẫn, Th&ugrave;ng m&aacute;y, Sạc Laptop Lenovo</p>\r\n\r\n<h2><a href=\"https://www.thegioididong.com/laptop/lenovo-ideapad-3-15iil05-i3-81we003rvn\" target=\"_blank\">Laptop Lenovo IdeaPad 3 15IIL05</a>&nbsp;l&agrave; sản phẩm hướng đến người d&ugrave;ng văn ph&ograve;ng, học sinh sinh vi&ecirc;n, xử l&yacute; ổn định c&aacute;c t&aacute;c vụ cơ bản hằng ng&agrave;y.</h2>\r\n\r\n<h3>Thiết kế sang trọng, cầm nhẹ tay</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/laptop-lenovo-ideapad\" target=\"_blank\">Lenovo IdeaPad&nbsp;</a>3 c&oacute; mặt lưng xước dọc, logo khắc kim loại ở mặt lưng tạo n&ecirc;n vẻ cao cấp hơn so với c&aacute;c sản phẩm trước. Trọng lượng m&aacute;y&nbsp;<strong>1.85 kg</strong>&nbsp;cầm nhẹ tay cũng như thoải m&aacute;i cho v&agrave;o balo mang đi học hằng ng&agrave;y.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-kg-1.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo IdeaPad 3 15IIL05 gọn nhẹ, sang trọng\" src=\"https://cdn.tgdd.vn/Products/Images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-kg-1.jpg\" /></a></p>\r\n\r\n<p>Bản lề gập mở&nbsp;<strong>180 độ&nbsp;</strong>gi&uacute;p bạn tương t&aacute;c với m&agrave;n h&igrave;nh nhiều g&oacute;c độ hơn cũng như tăng tuổi thọ cho m&aacute;y khi bạn lỡ tay mở m&agrave;n h&igrave;nh mạnh th&igrave; cũng kh&ocirc;ng bị g&atilde;y bản lề.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-180-do%CC%A3%CC%82-1.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo IdeaPad 3 15IIL05 bản lề linh hoạt\" src=\"https://cdn.tgdd.vn/Products/Images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-180-do%CC%A3%CC%82-1.jpg\" /></a></p>\r\n\r\n<p>B&agrave;n ph&iacute;m c&oacute; cụm ph&iacute;m số dễ d&agrave;ng sử dụng cho việc nhập liệu, h&agrave;nh tr&igrave;nh ph&iacute;m tốt, c&oacute; độ nảy v&agrave; n&uacute;t bấm to n&ecirc;n việc bấm cũng dễ d&agrave;ng hơn.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-bp-so%CC%82%CC%81-1.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo IdeaPad 3 15IIL05 dễ dàng nhập liệu\" src=\"https://cdn.tgdd.vn/Products/Images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-bp-so%CC%82%CC%81-1.jpg\" /></a></p>\r\n\r\n<h3>Hiệu năng vừa đủ cho c&ocirc;ng việc văn ph&ograve;ng</h3>\r\n\r\n<p>M&aacute;y trang bị chip Intel&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=core-i3\" target=\"_blank\"><strong>Core i3</strong></a>&nbsp;thế hệ 10,&nbsp;<strong>Ram&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=4-gb\" target=\"_blank\">4 GB</a></strong>&nbsp;cho ph&eacute;p bạn mở 2 3 ứng dụng c&ugrave;ng l&uacute;c m&agrave; m&aacute;y vẫn hoạt động tốt như soạn thảo tr&ecirc;n Word, nghe nhạc, chỉnh sửa h&igrave;nh ảnh,...</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-i5.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo IdeaPad 3 15IIL05 cấu hình vừa đủ dùng\" src=\"https://cdn.tgdd.vn/Products/Images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-i5.jpg\" /></a></p>\r\n\r\n<h3>M&agrave;n h&igrave;nh rộng, viền m&aacute;y mỏng</h3>\r\n\r\n<p>Laptop Lenovo c&oacute; m&agrave;n h&igrave;nh&nbsp;<strong><a href=\"https://www.thegioididong.com/laptop-tren-15-inch\">15.6 inch</a></strong>, độ ph&acirc;n giải&nbsp;<strong>Full HD</strong>&nbsp;hiển thị sắc n&eacute;t mọi h&igrave;nh ảnh. Tấm nền TN v&agrave; c&ocirc;ng nghệ chống ch&oacute;i cho ph&eacute;p bạn sử dụng m&aacute;y ở nơi c&oacute; &aacute;nh s&aacute;ng mạnh m&agrave; kh&ocirc;ng bị ch&oacute;i.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-inch-1.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo IdeaPad 3 15IIL05 màn hình rộng rãi\" src=\"https://cdn.tgdd.vn/Products/Images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-inch-1.jpg\" /></a></p>\r\n\r\n<p>Ph&iacute;a tr&ecirc;n viền m&agrave;n h&igrave;nh c&oacute; c&ocirc;ng tắc kh&oacute;a webcam khi kh&ocirc;ng sử dụng, đ&acirc;y l&agrave; c&ocirc;ng tắc độc quyền của nh&agrave; Lenovo gi&uacute;p bạn tr&aacute;nh bị đ&aacute;nh cắp th&ocirc;ng tin c&aacute; nh&acirc;n m&agrave; kh&ocirc;ng phải d&aacute;n sticker.&nbsp;</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-ma%CC%80n-tra%CC%A3%CC%82p.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo IdeaPad 3 15IIL05 có khóa camera an toàn\" src=\"https://cdn.tgdd.vn/Products/Images/44/223534/lenovo-ideapad-3-15iil05-i3-81we003rvn-ma%CC%80n-tra%CC%A3%CC%82p.jpg\" /></a></p>\r\n\r\n<p>Với c&aacute;c thao t&aacute;c lướt web, xem phim, soạn văn bản,... th&igrave; m&aacute;y hoạt động li&ecirc;n tục khoảng&nbsp; đến 4 giờ, đủ để bạn tham gia 1 buổi học hay buổi l&agrave;m việc hiệu quả.</p>\r\n\r\n<p>Laptop Lenovo IdeaPad 3 15IIL05 c&oacute; cấu h&igrave;nh vừa đủ d&ugrave;ng văn ph&ograve;ng, thiết kế đẹp mắt lại cầm nhẹ tay ph&ugrave; hợp với c&aacute;c bạn học sinh sinh vi&ecirc;n hay d&acirc;n văn ph&ograve;ng.&nbsp;</p>\r\n', '<ul>\r\n	<li>Chuột kh&ocirc;ng d&acirc;y&nbsp;</li>\r\n	<li>Balo Laptop Lenovo</li>\r\n	<li><a href=\"javascript:;\" onclick=\"VIPService($(this), 1)\">Giao ngay từ cửa h&agrave;ng gần bạn nhất</a></li>\r\n	<li><a href=\"javascript:;\" onclick=\"VIPService($(this), 2)\">Hướng dẫn sử dụng, giải đ&aacute;p thắc mắc sản phẩm</a></li>\r\n	<li><a href=\"javascript:;\" onclick=\"VIPService($(this), 4)\">Mang th&ecirc;m laptop kh&aacute;c để bạn xem</a></li>\r\n</ul>\r\n', 1, 5, 1, 1, '2021-04-20 01:26:45', NULL),
(11, 'Máy tính bảng Samsung Galaxy Tab A7 (2020)', '1618882188-samsung-galaxy-tab-a7-2020-vangdong-600x600.jpg', 5, 2, 8900000, 5, '10', '<ul>\r\n	<li>M&agrave;n h&igrave;nh: 10.4&quot;,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-tft-lcd-la-gi-905743\" target=\"_blank\">TFT LCD</a></li>\r\n	<li>Hệ điều h&agrave;nh: Android 10</li>\r\n	<li>Chip xử l&yacute;: Snapdragon 662</li>\r\n	<li><a href=\"https://www.thegioididong.com/hoi-dap/ram-la-gi-co-y-nghia-gi-trong-cac-thiet-bi-dien-t-1216259\" target=\"_blank\">RAM:</a>&nbsp;3 GB</li>\r\n	<li>Bộ nhớ trong: 64 GB</li>\r\n	<li>Kết nối:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/mang-du-lieu-di-dong-4g-la-gi-731757\" target=\"_blank\">4G</a>, C&oacute; nghe gọi</li>\r\n	<li>SIM:&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/tim-hieu-cac-loai-sim-thong-dung-sim-thuong-micro--590216\" target=\"_blank\">1 Nano SIM</a>\r\n	<p><strong>HOT</strong><a href=\"https://www.thegioididong.com/sim-so-dep/vietnamobile?t=59\">SIM VNMB Si&ecirc;u sim (5GB/ng&agrave;y)</a></p>\r\n	</li>\r\n	<li>Camera sau: 8 MP</li>\r\n	<li>Camera trước: 5 MP</li>\r\n	<li><a href=\"https://www.thegioididong.com/hoi-dap/wh-va-mah-la-gi-cach-chuyen-doi-wh-sang-mah-va-nguoc-lai-1281479\" target=\"_blank\">Pin, Sạc:</a>&nbsp;7040 mAh, 15 W</li>\r\n</ul>\r\n', '<h2>Đặc điểm nổi bật của Samsung Galaxy Tab A7 (2020)</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/522/228144/Slider/vi-vn-samsung-galaxy-tab-a7-2020-thumbvideo-1.jpg\" /><img src=\"https://www.thegioididong.com/Content/desktop/images/V4/icon-yt.png\" /></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Adapter, S&aacute;ch hướng dẫn, C&acirc;y lấy sim, Hộp m&aacute;y, C&aacute;p Type-C</p>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/may-tinh-bang/samsung-galaxy-tab-a7-2020\" target=\"_blank\">Samsung Galaxy Tab A7 (2020)</a>&nbsp;l&agrave; một chiếc&nbsp;<a href=\"https://www.thegioididong.com/may-tinh-bang\" target=\"_blank\">m&aacute;y t&iacute;nh bảng</a>&nbsp;c&oacute; thiết kế đẹp, cấu h&igrave;nh kh&aacute;, nhiều t&iacute;nh năng tiện &iacute;ch, một c&ocirc;ng cụ đắc lực hỗ trợ bạn trong c&ocirc;ng việc cũng như trong học tập hay giải tr&iacute;.</h3>\r\n\r\n<h3>M&agrave;n h&igrave;nh lớn cho trải nghiệm bất tận</h3>\r\n\r\n<p>Chiếc Galaxy Tab A7 mang kh&aacute; nhiều n&eacute;t kế thừa từ người đ&agrave;n anh ở ph&acirc;n kh&uacute;c cao cấp l&agrave;&nbsp;<a href=\"https://www.thegioididong.com/may-tinh-bang/samsung-galaxy-tab-s7\" target=\"_blank\">Galaxy Tab S7</a>&nbsp;vừa ra mắt kh&ocirc;ng l&acirc;u, sở hữu thiết kế nguy&ecirc;n khối cứng c&aacute;p liền mạch, được ho&agrave;n thiện từ nh&ocirc;m đi k&egrave;m khung viền kim loại sang trọng, ấn tượng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/522/228144/samsung-galaxy-tab-a7-2020-200620-110645.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế nguyên khối liền mạch, cứng cáp | Galaxy Tab A7\" src=\"https://cdn.tgdd.vn/Products/Images/522/228144/samsung-galaxy-tab-a7-2020-200620-110645.jpg\" /></a></p>\r\n\r\n<p>Hơn nữa, trọng lượng m&aacute;y cũng tương đối nhẹ v&agrave; độ mỏng chỉ 7 mm n&ecirc;n nh&igrave;n bằng mắt thường cũng c&oacute; thể thấy ngoại h&igrave;nh gọn nhẹ của n&oacute;, rất thoải m&aacute;i để bạn cầm nắm&nbsp;tay hay cho v&agrave;o t&uacute;i x&aacute;ch.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/522/228144/samsung-galaxy-tab-a7-2020-200320-110330.jpg\" onclick=\"return false;\"><img alt=\"Cầm nắm dễ dàng, thuận tiện | Galaxy Tab A7\" src=\"https://cdn.tgdd.vn/Products/Images/522/228144/samsung-galaxy-tab-a7-2020-200320-110330.jpg\" /></a></p>\r\n\r\n<p>Ph&iacute;a trước m&aacute;y t&iacute;nh bảng Galaxy Tab A7 (2020) l&agrave; m&agrave;n h&igrave;nh giải tr&iacute; k&iacute;ch thước lớn 10.4 inch, độ ph&acirc;n giải (1200 x 2000 Pixels) hiển thị h&igrave;nh ảnh nịnh mắt, c&oacute; độ sắc n&eacute;t cao, m&agrave;u sắc t&aacute;i tạo rực rỡ, độ chi tiết v&agrave; độ sắc tương phản đạt chuẩn.&nbsp;</p>\r\n\r\n<p>Sử dụng tấm nền TFT LCD, chiếc tablet cho độ s&aacute;ng m&agrave;n h&igrave;nh đạt kh&aacute; cao v&agrave; chất lượng h&igrave;nh ảnh vẫn v&ocirc; c&ugrave;ng ch&acirc;n thực, đặc biệt tốt với mọi g&oacute;c nh&igrave;n, th&ocirc;ng tin hiển thị vẫn r&otilde; n&eacute;t m&agrave; kh&ocirc;ng c&oacute; hiện tượng ch&oacute;i, l&oacute;a.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/522/228144/samsung-galaxy-tab-a7-2020-200320-110312.jpg\" onclick=\"return false;\"><img alt=\"Màn hình hiển thi rõ nét | Galaxy Tab A7\" src=\"https://cdn.tgdd.vn/Products/Images/522/228144/samsung-galaxy-tab-a7-2020-200320-110312.jpg\" /></a></p>\r\n\r\n<p>Một điều đ&aacute;ng ch&uacute; &yacute; tr&ecirc;n Galaxy Tab A7 (2020) nữa l&agrave; m&agrave;n h&igrave;nh n&agrave;y được thiết kế theo tỷ lệ 5:3 kh&aacute; l&yacute; tưởng cho trải nghiệm giải tr&iacute; cũng như thao t&aacute;c sử dụng hằng ng&agrave;y như lướt web, check mail, đọc s&aacute;ch, xem video,...</p>\r\n\r\n<h3>Hiệu năng tốt, đa nhiệm mượt m&agrave;</h3>\r\n\r\n<p>B&ecirc;n trong Samsung Galaxy Tab A7 (2020) l&agrave; bộ vi xử l&yacute; Snapdragon 662 gồm 4 l&otilde;i 2.0 GHz v&agrave; 4 lỗi 1.8 Ghz được sản xuất theo tiến tr&igrave;nh 11 nm mang đến hiệu năng ổn định, đảm bảo c&aacute;c t&aacute;c vụ lu&ocirc;n được xử l&yacute; một c&aacute;ch mượt m&agrave;, hiếm khi xảy ra hiện tượng giật lag.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/522/228144/samsung-galaxy-tab-a7-2020-201120-111154.jpg\" onclick=\"return false;\"><img alt=\"Chip Snapdragon 662 cho hiệu năng mạnh mẽ | Galaxy Tab S7\" src=\"https://cdn.tgdd.vn/Products/Images/522/228144/samsung-galaxy-tab-a7-2020-201120-111154.jpg\" /></a></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute; chipset n&agrave;y c&ograve;n được hỗ trợ bởi RAM 3 GB đi k&egrave;m với 64 GB dung lượng bộ nhớ trong, hỗ trợ thẻ MicroSD với độ lớn tối đa l&ecirc;n với 1 TB.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/522/228144/samsung-galaxy-tab-a7-2020-200320-110339.jpg\" onclick=\"return false;\"><img alt=\"Hỗ trợ mở rộng dung lượng | Galaxy Tab A7\" src=\"https://cdn.tgdd.vn/Products/Images/522/228144/samsung-galaxy-tab-a7-2020-200320-110339.jpg\" /></a></p>\r\n\r\n<p>Qua phần test hiệu năng tr&ecirc;n Antutu, Galaxy Tab A7 đạt được 172.259 điểm với số điểm n&agrave;y ho&agrave;n to&agrave;n c&oacute; thể chơi ổn định tr&ecirc;n c&aacute;c tựa game phổ biến hiện nay như Li&ecirc;n Qu&acirc;n Mobile, PUBG Mobile... ở mức cấu h&igrave;nh t&ugrave;y chỉnh ph&ugrave; hợp.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/522/228144/samsung-galaxy-tab-a7-2020-042620-082616.jpg\" onclick=\"return false;\"><img alt=\"Antutu 172.259 điểm | Samsung Galaxy Tab A7\" src=\"https://cdn.tgdd.vn/Products/Images/522/228144/samsung-galaxy-tab-a7-2020-042620-082616.jpg\" /></a></p>\r\n\r\n<p>Cũng giống như c&aacute;c thế hệ smartphone&nbsp;<a href=\"https://www.thegioididong.com/may-tinh-bang-samsung\" target=\"_blank\">Samsung</a>&nbsp;2020, Galaxy Tab A7 được c&agrave;i đặt sẵn hệ điều h&agrave;nh Android 10 t&ugrave;y biến tr&ecirc;n giao diện OneUI 2.1 mới nhất, th&acirc;n thiện dễ sử dụng, gi&uacute;p cho trải nghiệm sử dụng th&ecirc;m phần trơn tru v&agrave; th&uacute; vị hơn hẳn.</p>\r\n\r\n<h3>Camera cho h&igrave;nh ảnh sắc n&eacute;t</h3>\r\n\r\n<p>Samsung Galaxy Tab A7 (2020) sở hữu hệ thống camera ch&iacute;nh độ ph&acirc;n giải 8 MP vừa đủ để đ&aacute;p ứng trải nghiệm cơ bản của người d&ugrave;ng cho chất lượng h&igrave;nh ảnh ổn định, m&agrave;u sắc h&agrave;i h&ograve;a.&nbsp;</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/522/228144/samsung-galaxy-tab-a7-2020-200320-110318.jpg\" onclick=\"return false;\"><img alt=\"Camera sau 8 MP | Galaxy Tab A7\" src=\"https://cdn.tgdd.vn/Products/Images/522/228144/samsung-galaxy-tab-a7-2020-200320-110318.jpg\" /></a></p>\r\n\r\n<p>Cụm n&agrave;y vừa đủ để đ&aacute;p ứng tốt c&aacute;c trải nghiệm cơ bản của người d&ugrave;ng như chụp ảnh, quay video trong điều kiện đầy đủ &aacute;nh s&aacute;ng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/522/228144/samsung-galaxy-tab-a7-2020-200320-110347.jpg\" onclick=\"return false;\"><img alt=\"Đáp ứng đầy đủ các nhu cầu chụp ảnh | Galaxy Tab A7\" src=\"https://cdn.tgdd.vn/Products/Images/522/228144/samsung-galaxy-tab-a7-2020-200320-110347.jpg\" /></a></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, camera trước của m&aacute;y c&oacute; độ ph&acirc;n giải 5 MP được t&iacute;ch hợp th&ecirc;m nhiều t&iacute;nh năng hấp dẫn như l&agrave;m đẹp tự nhi&ecirc;n, cho người d&ugrave;ng thoải m&aacute;i chụp h&igrave;nh selfie được dễ d&agrave;ng, v&agrave; chất lượng đẹp nhất.</p>\r\n\r\n<p>Chế độ Kids Mode sẽ mang đến cho bạn nhiều ứng dụng th&acirc;n thiện với trẻ em, để b&eacute; vừa học vừa chơi v&agrave; ph&aacute;t triển sở th&iacute;ch, t&agrave;i năng.</p>\r\n\r\n<p>Bạn sẽ kh&ocirc;ng cần lo lắng khi trẻ sử dụng m&aacute;y qu&aacute; nhiều nữa, v&igrave; đ&atilde; c&oacute; t&iacute;nh năng c&agrave;i đặt giới hạn thời gian d&agrave;nh ri&ecirc;ng cho trẻ em.</p>\r\n\r\n<h3>Thời lượng pin lớn, c&oacute; hỗ trợ sạc nhanh</h3>\r\n\r\n<p>Galaxy Tab A7 c&oacute; vi&ecirc;n pin l&ecirc;n đến 7040 mAh cho thời gian trải nghiệm tương đương 2 &ndash; 3 ng&agrave;y khi thực thi c&aacute;c t&aacute;c vụ cơ bản.&nbsp;</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/522/228144/samsung-galaxy-tab-a7-2020-200320-110324.jpg\" onclick=\"return false;\"><img alt=\"Nạp đầy năng lượng thông qua cổng sạc Type-C | Galaxy Tab A7\" src=\"https://cdn.tgdd.vn/Products/Images/522/228144/samsung-galaxy-tab-a7-2020-200320-110324.jpg\" /></a></p>\r\n\r\n<p>Với mức pin lớn như vậy dĩ nhi&ecirc;n m&aacute;y sẽ được hỗ trợ sạc nhanh qua cổng USB Type C, bạn sẽ kh&ocirc;ng phải lo lắng mất kha kh&aacute; thời gian để nạp đầy vi&ecirc;n pin n&agrave;y.&nbsp;</p>\r\n\r\n<p>Ngo&agrave;i ra, Galaxy Tab A7 (2020) c&ograve;n sở hữu tận hai loa đặt ở cạnh dưới, cặp loa n&agrave;y mang đến những trải nghiệm &acirc;m thanh v&ocirc; c&ugrave;ng ấn tượng nhờ v&agrave;o c&ocirc;ng nghệ &acirc;m thanh Dolby Atmos, đặc biệt ở c&aacute;c trải nghiệm xem phim, chơi game, nghe nhạc chất lượng cao.</p>\r\n\r\n<p>C&oacute; thể n&oacute;i Galaxy Tab A7 (2020) l&agrave; một chiếc m&aacute;y t&iacute;nh bảng thuộc ph&acirc;n kh&uacute;c tầm trung nhằm hướng đến nh&oacute;m người d&ugrave;ng chỉ c&oacute; nhu cầu vừa phải, kh&ocirc;ng cần phải chi một khoản tiền lớn để mua một thiết bị vượt qu&aacute; nhu cầu, nhưng vẫn được trang bị nhiều t&iacute;nh năng hiện đại, đ&aacute;p ứng tốt nhu cầu sử dụng của người d&ugrave;ng.</p>\r\n', '<ul>\r\n	<li><a href=\"javascript:;\" onclick=\"VIPService($(this), 1)\">Giao ngay từ cửa h&agrave;ng gần bạn nhất</a></li>\r\n	<li><a href=\"javascript:;\" onclick=\"VIPService($(this), 2)\">Hướng dẫn sử dụng, giải đ&aacute;p thắc mắc sản phẩm</a></li>\r\n	<li>Mang nhiều m&agrave;u để bạn lựa chọn</li>\r\n	<li><a href=\"javascript:;\" onclick=\"VIPService($(this), 4)\">Mang th&ecirc;m m&aacute;y t&iacute;nh bảng kh&aacute;c để bạn xem</a></li>\r\n</ul>\r\n', NULL, NULL, 1, 0, '2021-04-20 01:29:48', NULL),
(12, 'Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2', '1618882313-airpods-2-wireless-charge-apple-mrxj2-ava-600x600.jpg', 6, 2, 3490000, 0, '15', '<ul>\r\n	<li>Tương th&iacute;ch:&nbsp;<em>Android</em><em>iOS (iPhone)</em></li>\r\n	<li>Cổng sạc:&nbsp;<em>Lightning</em><em>Sạc kh&ocirc;ng d&acirc;y</em></li>\r\n	<li>Thời gian sử dụng:&nbsp;<em>5 giờ</em></li>\r\n	<li>Thời gian sạc đầy:&nbsp;<em>2 giờ</em></li>\r\n	<li>Kết nối c&ugrave;ng l&uacute;c:&nbsp;<em>1 thiết bị</em></li>\r\n	<li>Hỗ trợ kết nối:&nbsp;<em>10m (Bluetooth 5.0)</em></li>\r\n	<li>Ph&iacute;m điều khiển:&nbsp;<em>Mic thoại</em><em>Nghe/nhận cuộc gọi</em><em>Ph&aacute;t/dừng chơi nhạc</em><em>Chuyển b&agrave;i h&aacute;t</em></li>\r\n	<li>Điều khiển bằng: <em>Cảm ứng chạm</em></li>\r\n	<li>Tiện &iacute;ch:&nbsp;<em>C&oacute; mic thoại</em></li>\r\n	<li>Thương hiệu của:&nbsp;<em>Mỹ</em></li>\r\n	<li>Sản xuất tại:&nbsp;<em>Việt Nam / Trung Quốc (t&ugrave;y l&ocirc; h&agrave;ng)</em></li>\r\n	<li>Bộ b&aacute;n h&agrave;ng chuẩn:\r\n	<p><em>Tai nghe</em><em>S&aacute;ch hướng dẫn</em><em>Hộp sạc</em><em>D&acirc;y c&aacute;p Lightning</em></p>\r\n	</li>\r\n</ul>\r\n', '<h3>Thiết kế nhỏ gọn, ấn tượng người nh&igrave;n</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tai-nghe\" target=\"_blank\">Tai nghe&nbsp;</a>sở hữu thiết kế thời trang v&agrave; nhỏ gọn, trọng lượng cũng rất nhẹ kh&ocirc;ng kh&aacute;c mấy so với&nbsp;<a href=\"https://www.thegioididong.com/tai-nghe-bluetooth\" target=\"_blank\">tai nghe Bluetooth</a>&nbsp;AirPods thế hệ đầu ti&ecirc;n. Tai nghe&nbsp;c&ograve;n được phủ l&ecirc;n một lớp chất liệu mới ở đầu mỗi tai nghe để gi&uacute;p tai nghe b&aacute;m tr&ecirc;n tai người đeo hơn, tr&aacute;nh bị rơi rớt hơn.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-1-2.jpg\" onclick=\"return false;\"><img alt=\"Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2 Trắng có thiết kế nhỏ gọn\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-1-2.jpg\" /></a></p>\r\n\r\n<h3>Truy cập nhanh v&agrave;o Siri bằng c&aacute;ch n&oacute;i &quot;Hey Siri&quot;</h3>\r\n\r\n<p>Với sự trở lại của&nbsp;<a href=\"https://www.thegioididong.com/tai-nghe/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2\" target=\"_blank\">Tai nghe Bluetooth AirPods 2 Wireless charge</a>&nbsp;n&agrave;y th&igrave;&nbsp;khả năng chống ồn, xử l&yacute; &acirc;m thanh b&ecirc;n ngo&agrave;i tốt hơn so với tai nghe AirPods đời đầu v&agrave; bạn c&oacute; thể kết nối với&nbsp;nhanh v&agrave;o Siri bằng c&aacute;ch n&oacute;i&nbsp;&ldquo;Hey Siri&rdquo;&nbsp;v&agrave; thực hiện y&ecirc;u cầu của bạn. Ngo&agrave;i ra sản phẩm c&ograve;n c&oacute; thể điều chỉnh &acirc;m lượng, thay đổi b&agrave;i h&aacute;t, thực hiện cuộc gọi hoặc thậm ch&iacute; nhận chỉ đường tiện lợi.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-8-1.jpg\" onclick=\"return false;\"><img alt=\"Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2 Trắng dễ dàng kết nối với Siri\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-8-1.jpg\" /></a></p>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/tai-nghe-khong-day\" target=\"_blank\">Tai nghe kh&ocirc;ng d&acirc;y</a>&nbsp;Apple dễ d&agrave;ng thao t&aacute;c bằng cảm ứng để&nbsp;nhận cuộc gọi, nghe hoặc tạm dừng đoạn nhạc, tiện lợi khi kh&ocirc;ng cần thao t&aacute;c nhiều tr&ecirc;n&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">điện thoại</a></h3>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-9-1.jpg\" onclick=\"return false;\"><img alt=\"Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2 Trắng thao tác dễ dàng\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-9-1.jpg\" /></a></h3>\r\n\r\n<h3>Sạc pin cho tai nghe dễ d&agrave;ng qua cổng sạc&nbsp;<a href=\"https://www.thegioididong.com/cap-dien-thoai-cap-iphone-lightning\" target=\"_blank\">Lightning</a>&nbsp;hoặc c&oacute; thể sạc kh&ocirc;ng d&acirc;y nhờ được trang bị chuẩn sạc Qi hiện đại</h3>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-7-1.jpg\" onclick=\"return false;\"><img alt=\"Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2 Trắng được sạc pin thông qua cổng Lightning\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-7-1.jpg\" /></a><a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-6-1.jpg\" onclick=\"return false;\"><img alt=\"Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2 Trắng có thể sạc không dây\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-6-1.jpg\" /></a></h3>\r\n\r\n<h3>Bạn c&oacute; thể d&ugrave;ng&nbsp;<a href=\"https://www.thegioididong.com/tai-nghe-nhet-trong\" target=\"_blank\">tai nghe nh&eacute;t trong</a>&nbsp;để nghe nhạc l&ecirc;n đến 5 giờ với &acirc;m lượng l&agrave; 50% cho mỗi một lần sạc đầy hoặc sử dụng song song với hộp sạc c&oacute; thể d&ugrave;ng được l&ecirc;n đến 24 giờ.</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-3-2.jpg\" onclick=\"return false;\"><img alt=\"Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2 Trắng có thời lượng nghe nhạc lớn\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-3-2.jpg\" /></a><a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-5-1.jpg\" onclick=\"return false;\"><img alt=\"Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2 Trắng dùng được 24 giờ\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-5-1.jpg\" /></a></p>\r\n\r\n<h3>Khi hết pin m&agrave; kh&ocirc;ng c&oacute; thời gian, bạn chỉ cần sạc&nbsp;<a href=\"https://www.thegioididong.com/tai-nghe-apple-bluetooth\" target=\"_blank\">tai nghe Bluetooth Apple</a>&nbsp;với&nbsp;15 ph&uacute;t v&agrave; đ&atilde; c&oacute; thể tận hưởng &acirc;m nhạc th&ecirc;m 3 giờ sau đ&oacute;</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-4-2.jpg\" onclick=\"return false;\"><img alt=\"Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2 Trắng sạc nhanh khi đang bận\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-4-2.jpg\" /></a></p>\r\n\r\n<h3>C&oacute; đ&egrave;n Led b&aacute;o sạc khi sạc pin</h3>\r\n\r\n<p>Với vỏ sạc kh&ocirc;ng d&acirc;y bạn sẽ sạc sản phẩm một c&aacute;ch nhanh ch&oacute;ng v&agrave; dễ d&agrave;ng. Chỉ cần đặt vỏ m&aacute;y xuống tr&ecirc;n một tấm sạc tương th&iacute;ch Qi v&agrave; để n&oacute; sạc. Đ&egrave;n b&aacute;o Led ở mặt trước của vỏ cho ph&eacute;p bạn biết rằng&nbsp;<a href=\"https://www.thegioididong.com/tai-nghe-khong-da\" target=\"_blank\">tai nghe True Wireless</a>&nbsp;AirPods của bạn đang sạc. V&agrave; khi bạn rời khỏi thảm sạc, bạn c&oacute; thể sử dụng cổng Lightning để sạc.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-10-1.jpg\" onclick=\"return false;\"><img alt=\"Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2 Trắng có đèn Led tiện lợi\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-10-1.jpg\" /></a></p>\r\n\r\n<p>Chip H1 ho&agrave;n to&agrave;n mới cho tốc độ kết nối tức th&igrave;, chuyển đổi giữa c&aacute;c thiết bị nhanh ch&oacute;ng. D&ugrave; bạn sử dụng đeo cả hai tai nghe hay chỉ một tai nghe th&igrave; chip H1 sẽ tự động định tuyến &acirc;m thanh v&agrave; kết nối micro gi&uacute;p bạn.</p>\r\n\r\n<h3>Thiết bị c&oacute; thể kết nối với c&aacute;c sản phẩm:</h3>\r\n\r\n<p>- iPhone, iPad v&agrave; iPod touch c&oacute; iOS 12.2 trở l&ecirc;n.</p>\r\n\r\n<p>- C&aacute;c mẫu Apple Watch c&oacute; watchOS 5.2 trở l&ecirc;n.</p>\r\n\r\n<p>- C&aacute;c mẫu m&aacute;y Mac c&oacute; macOS 10.14.4 trở l&ecirc;n.</p>\r\n\r\n<p>- C&aacute;c mẫu Apple TV c&oacute; tvOS 12.2 trở l&ecirc;n.<a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-2-2.jpg\" onclick=\"return false;\"><img alt=\"Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2 Trắng kết nối nhanh chóng\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-2-2.jpg\" /></a></p>\r\n\r\n<h3>Bộ sản phẩm gồm c&oacute;: Tai nghe, s&aacute;ch hướng dẫn, hộp sạc: Lightning<a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-1-org2.jpg\" onclick=\"return false;\"><img alt=\"Bộ sản phẩm gồm có Tai nghe, Sách hướng dẫn, Hộp sạc: Lightning.\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-1-org2.jpg\" /></a></h3>\r\n\r\n<h3>Hướng dẫn kết nối v&agrave; sử dụng&nbsp;<a href=\"https://www.thegioididong.com/tai-nghe-apple\" target=\"_blank\">tai nghe Apple</a>:</h3>\r\n\r\n<p>- Từ m&agrave;n h&igrave;nh ch&iacute;nh iPhone, vuốt từ dưới l&ecirc;n để mở Control Center v&agrave; bật Bluetooth.</p>\r\n\r\n<p>- Mở nắp hộp AirPods vẫn để 2 tai nghe b&ecirc;n trong hộp, l&uacute;c n&agrave;y tr&ecirc;n iPhone sẽ xuất hiện 1 bảng pops up c&oacute; h&igrave;nh tai nghe v&agrave; d&ograve;ng chữ Connect.</p>\r\n\r\n<p>- Bấm Connect, sau đ&oacute; bấm Done l&agrave; ho&agrave;n tất kết nối.</p>\r\n\r\n<p>- Những lần sau, bạn chỉ cần lấy tai nghe ra khỏi hộp l&agrave; iPhone sẽ tự động kết nối.<a href=\"https://www.thegioididong.com/images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-4-org7.jpg\" onclick=\"return false;\"><img alt=\"Tai nghe Bluetooth AirPods 2 Wireless charge Apple MRXJ2 Trắng hướng dẫn kết nối\" src=\"https://cdn.tgdd.vn/Products/Images/54/236025/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-4-org7.jpg\" /></a></p>\r\n', '<p>Giảm 500.000₫&nbsp;(đã trừ vào giá)</p>\r\n\r\n<p>Chỉ &aacute;p dụng giao tận nơi (ri&ecirc;ng đồng hồ được nhận tại si&ecirc;u thị)Kh&ocirc;ng &aacute;p dụng chung với khuyến m&atilde;i kh&aacute;c.Khuyến m&atilde;i chưa bao gồm ph&iacute; giao/chuyển h&agrave;ng.</p>\r\n', 4, 15, 1, 1, '2021-04-20 01:31:53', NULL);
INSERT INTO `products` (`id`, `title`, `avatar`, `category_id`, `producer_id`, `price`, `discount`, `quality`, `summary`, `content`, `present`, `total_rating`, `total_number_rating`, `status`, `hotproduct`, `created_at`, `updated_at`) VALUES
(13, 'Samsung Galaxy Watch 3 41mm viền thép hồng dây da', '1618882536-samsung-galaxy-watch-3-41mm-thum-600x600.jpg', 7, 2, 5990000, 0, '10', '<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\"><strong>Bộ xử l&yacute;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng nghệ CPU</td>\r\n			<td>Intel Pentium Silver</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại CPU</td>\r\n			<td>N5000 (4 cores)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tốc độ CPU</td>\r\n			<td>1.1GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tốc độ tối đa</td>\r\n			<td>Turbo Boost 2.7GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\"><strong>Bộ nhớ RAM, Ổ cứng</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM</td>\r\n			<td>4GB, 2400MHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại RAM</td>\r\n			<td>DDR4</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ổ cứng</td>\r\n			<td>HDD 1TB</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\"><strong>M&agrave;n h&igrave;nh</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước m&agrave;n h&igrave;nh</td>\r\n			<td>14inch</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ ph&acirc;n giải</td>\r\n			<td>Full HD (1920 x 1080)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng nghệ m&agrave;n h&igrave;nh</td>\r\n			<td>- Tần số qu&eacute;t 60Hz<br />\r\n			-&nbsp;LED Backlit<br />\r\n			- Anti-Glare</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh cảm ứng</td>\r\n			<td>Kh&ocirc;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\"><strong>Đồ họa v&agrave; &Acirc;m thanh</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thiết kế card</td>\r\n			<td>Card đồ họa t&iacute;ch hợp</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Card đồ họa</td>\r\n			<td>Intel UHD Graphics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&ocirc;ng nghệ &acirc;m thanh</td>\r\n			<td>Asus SonicMaster</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\"><strong>Cổng kết nối &amp; t&iacute;nh năng mở rộng</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cổng giao tiếp</td>\r\n			<td>-&nbsp;1 x USB Type-C<br />\r\n			-&nbsp;1 x USB 3.2<br />\r\n			-&nbsp;2 x USB 2.0<br />\r\n			- 1 x HDMI</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kết nối kh&ocirc;ng d&acirc;y</td>\r\n			<td>Wi-Fi&nbsp;5 - 802.11ac, Bluetooth v5.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khe đọc thẻ nhớ</td>\r\n			<td>C&oacute;&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Webcam</td>\r\n			<td>HD Webcam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo mật v&acirc;n tay</td>\r\n			<td>C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đ&egrave;n b&agrave;n ph&iacute;m</td>\r\n			<td>C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Pin &amp; Adapter sạc&nbsp;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại PIN</td>\r\n			<td>32Wh Lithium-polyme</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Th&ocirc;ng tin Pin</td>\r\n			<td>2 cell</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\"><strong>Hệ điều h&agrave;nh</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh</td>\r\n			<td>Windows 10 Home</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\"><strong>K&iacute;ch thước &amp; trọng lượng</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước</td>\r\n			<td>325 x 216 x 22.9 (mm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>1.6kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu</td>\r\n			<td>Vỏ&nbsp;nhựa</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<h3>Thiết kế đơn giản, m&agrave;u sắc sang trọng</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dong-ho-thong-minh/samsung-galaxy-watch-3-41mm\" target=\"_blank\">Đồng hồ th&ocirc;ng minh Samsung Galaxy Watch 3 41 mm</a>&nbsp;sở hữu 2 n&uacute;t bấm v&agrave; v&ograve;ng bezel xoay điều khiển vật l&yacute;, thay cho mặt xoay cảm ứng ở phi&ecirc;n bản&nbsp;<a href=\"https://www.thegioididong.com/tim-kiem?key=Watch+Active+2\" target=\"_blank\">Watch Active 2</a>. M&agrave;n h&igrave;nh Super Amoled 1.2 inch c&ugrave;ng độ ph&acirc;n giải 360 x 360 pixels gi&uacute;p h&igrave;nh ảnh hiển thị được ch&acirc;n thật, r&otilde; n&eacute;t. Th&acirc;n đồng hồ được l&agrave;m bằng th&eacute;p cứng c&aacute;p, kh&aacute;c với Watch Active 2 được l&agrave;m bằng nh&ocirc;m.&nbsp;<a href=\"https://www.thegioididong.com/day-dong-ho\" target=\"_blank\">D&acirc;y đeo</a>&nbsp;bằng da tạo cảm gi&aacute;c chắc chắn v&agrave; dễ chịu cho người d&ugrave;ng khi đeo.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/226475/samsung-galaxy-watch-3-41mm-writeee1.jpg\" onclick=\"return false;\"><img alt=\"Đồng hồ Samsung Galaxy Watch 3 41mm sở hữu thiết kế đơn giản, tinh tế\" src=\"https://cdn.tgdd.vn/Products/Images/7077/226475/samsung-galaxy-watch-3-41mm-writeee1.jpg\" /></a></p>\r\n\r\n<h3>Mặt k&iacute;nh chống trầy, m&agrave;n h&igrave;nh SUPER AMOLED</h3>\r\n\r\n<p>Mặt k&iacute;nh cường lực&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/kinh-cuong-luc-gorilla-glass-va-nhung-dieu-co-the-ban-chua-biet-1173761\" target=\"_blank\">Gorilla Glass Dx+</a>&nbsp;gi&uacute;p đồng hồ được bảo vệ khỏi những vết trầy xước, va đập thường gặp. M&agrave;n h&igrave;nh sử dụng c&ocirc;ng nghệ&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/loai-man-hinh-tft-lcd-amoled-la-gi--592346#amoled\" target=\"_blank\">SUPER AMOLED</a>&nbsp;gi&uacute;p h&igrave;nh ảnh v&agrave; th&ocirc;ng tin tr&ecirc;n thiết bị đeo được hiển thị r&otilde; r&agrave;ng v&agrave; chi tiết. Ngo&agrave;i ra c&ograve;n c&oacute; t&iacute;nh năng&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh?g=man-hinh-luon-hien-thi\" target=\"_blank\">m&agrave;n h&igrave;nh lu&ocirc;n hiển thị</a>, dễ d&agrave;ng quan s&aacute;t giờ v&agrave; th&ocirc;ng b&aacute;o.</p>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/images/7077/226475/samsung-galaxy-watch-3-41mm-writeee4.jpg\" onclick=\"return false;\"><img alt=\"Đồng hồ Samsung Galaxy Watch 3 41mm trang bị mặt kính cường lực và màn hình SUPER AMOLED\" src=\"https://cdn.tgdd.vn/Products/Images/7077/226475/samsung-galaxy-watch-3-41mm-writeee4.jpg\" /></a></h3>\r\n\r\n<h3>Kết nối bluetooth v5.0 (Android 5.0 trở l&ecirc;n, iOS 9 trở l&ecirc;n)</h3>\r\n\r\n<p>Kết nối với c&aacute;c thiết bị qua cổng bluetooth, khi kết nối, người d&ugrave;ng c&oacute; thể kiểm tra tin nhắn, nhận cuộc gọi, xem th&ocirc;ng b&aacute;o ứng dụng ( Messenger, Zalo, Instagram,&hellip;), theo d&otilde;i sức khoẻ, luyện tập thể thao,&hellip; Sử dụng hệ điều h&agrave;nh OS Tizen, giống với những phi&ecirc;n bản&nbsp;<a href=\"https://www.thegioididong.com/tim-kiem?key=Galaxy+Watch\" target=\"_blank\">Galaxy Watch</a>&nbsp;kh&aacute;c, với khả năng tải ứng dụng v&agrave; th&ecirc;m mặt đồng hồ, thậm ch&iacute; c&ograve;n mạnh mẽ hơn cả hệ điều h&agrave;nh Google WearOS.</p>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/images/7077/226475/samsung-galaxy-watch-3-41mm-writeee2.jpg\" onclick=\"return false;\"><img alt=\"Đồng hồ Samsung Galaxy Watch 3 41mm kết nối với các thiết bị qua sóng bluetooth\" src=\"https://cdn.tgdd.vn/Products/Images/7077/226475/samsung-galaxy-watch-3-41mm-writeee2.jpg\" /></a></h3>\r\n\r\n<h3>Thoả sức thay đổi phong c&aacute;ch</h3>\r\n\r\n<p>T&ugrave;y &yacute; thay đổi giao diện mặt đồng hồ với bộ sưu tập hơn 50.000 giao diện t&ugrave;y chọn, người d&ugrave;ng c&ograve;n c&oacute; thể tuỳ chỉnh thay đổi m&agrave;u sắc của mặt đồng hồ theo &yacute; muốn. Thay đổi mặt đồng hồ bằng c&aacute;ch kết nối với ứng dụng Galaxy Wearable tr&ecirc;n&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">điện thoại</a>&nbsp;hoặc c&oacute; thể thay đổi trong mục c&agrave;i đặt tr&ecirc;n đồng hồ.</p>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/images/7077/226475/samsung-galaxy-watch-3-41mm-081820-121851.jpg\" onclick=\"return false;\"><img alt=\"Đồng hồ Samsung Galaxy Watch 3 41mm với bộ sưu tập giao diện khổng lồ\" src=\"https://cdn.tgdd.vn/Products/Images/7077/226475/samsung-galaxy-watch-3-41mm-081820-121851.jpg\" /></a></h3>\r\n\r\n<h3>Thời lượng pin l&ecirc;n đến 40 giờ</h3>\r\n\r\n<p>Sở hữu vi&ecirc;n&nbsp;<a href=\"https://www.thegioididong.com/sac-dtdd\" target=\"_blank\">pin</a>&nbsp;247 mAh cho thời gian sử dụng 40 giờ trong một lần sạc, đi k&egrave;m với sản phẩm l&agrave;&nbsp;<a href=\"https://www.thegioididong.com/cap-dien-thoai-sac-khong-day\" target=\"_blank\">đế sạc kh&ocirc;ng d&acirc;y</a>, Samsung Galaxy Watch 3 cần 2 giờ để c&oacute; thể sạc đầy 100% pin.</p>\r\n\r\n<p><strong>Ghi ch&uacute;:</strong>&nbsp;Thời gian sử dụng pin c&oacute; thể thay đổi, phụ thuộc v&agrave;o c&aacute;ch d&ugrave;ng của người đeo.</p>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/images/7077/226475/samsung-galaxy-watch-3-41mm-writeee5.jpg\" onclick=\"return false;\"><img alt=\"Đồng hồ Samsung Galaxy Watch 3 41mm dùng được 40 tiếng trong một lần sạc\" src=\"https://cdn.tgdd.vn/Products/Images/7077/226475/samsung-galaxy-watch-3-41mm-writeee5.jpg\" /></a></h3>\r\n\r\n<h3>Theo d&otilde;i sức khoẻ thường xuy&ecirc;n</h3>\r\n\r\n<p>Trang bị 8 đ&egrave;n cảm biến c&ugrave;ng thiết kế d&acirc;y đeo &ocirc;m trọn cổ tay. K&egrave;m theo đ&oacute; l&agrave; t&iacute;nh năng&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh-do-nhip-tim\" target=\"_blank\">theo d&otilde;i nhịp tim</a>,&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh-theo-doi-giac-ngu\" target=\"_blank\">theo d&otilde;i giấc ngủ</a>, khả năng đo Oxy trong m&aacute;u (<a href=\"https://www.thegioididong.com/hoi-dap/tinh-nang-do-chi-so-spo2-va-vo2-max-tren-smartwatch-la-gi-1279892\" target=\"_blank\">SpO2 v&agrave; VO2 Max</a>), huyết &aacute;p v&agrave; theo d&otilde;i chu kỳ kinh nguyệt cho ph&aacute;i nữ.</p>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/images/7077/226475/samsung-galaxy-watch-3-41mm-writeee6.jpg\" onclick=\"return false;\"><img alt=\"Đồng hồ Samsung Galaxy Watch 3 41mm chăm sóc sức khoẻ người dùng 24/24\" src=\"https://cdn.tgdd.vn/Products/Images/7077/226475/samsung-galaxy-watch-3-41mm-writeee6.jpg\" /></a></h3>\r\n\r\n<h3>R&egrave;n luyện sức khoẻ mỗi ng&agrave;y</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tim-kiem?key=Samsung\" target=\"_blank\">Samsung</a>&nbsp;Galaxy Watch 3 t&iacute;ch hợp th&ecirc;m&nbsp;một số t&iacute;nh năng&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh?g=che-do-luyen-tap\" target=\"_blank\">tập luyện thể dục</a>&nbsp;c&ugrave;ng với hơn 120 b&agrave;i tập video trong Samsung Health, ph&acirc;n t&iacute;ch chạy v&agrave; truy cập c&aacute;c chỉ số VO2 max. Được trang bị hai hệ thống&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh?g=dinh-vi\" target=\"_blank\">định vị&nbsp;</a>h&agrave;ng đầu hiện nay l&agrave; GPS v&agrave; Glonass, gi&uacute;p khả năng x&aacute;c định v&iacute; tr&iacute; ổn định v&agrave; ch&iacute;nh x&aacute;c, ph&ugrave; hợp để chơi c&aacute;c m&ocirc;n thể thao di chuyển như chạy bộ hay đạp xe.</p>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/images/7077/226475/samsung-galaxy-watch-3-41mm-writeee8.jpg\" onclick=\"return false;\"><img alt=\"Đồng hồ Samsung Galaxy Watch 3 41mm gồm hơn 120 video bài tập thể thao\" src=\"https://cdn.tgdd.vn/Products/Images/7077/226475/samsung-galaxy-watch-3-41mm-writeee8.jpg\" /></a></h3>\r\n\r\n<h3>T&iacute;nh năng ph&aacute;t hiện t&eacute; ng&atilde;</h3>\r\n\r\n<p>Nếu người d&ugrave;ng&nbsp;<a href=\"https://www.thegioididong.com/tim-kiem?key=ph%C3%A1t+hi%E1%BB%87n+t%C3%A9+ng%C3%A3\" target=\"_blank\">v&ocirc; &yacute; bị ng&atilde;</a>, đồng hồ sẽ mặc định người d&ugrave;ng trong t&igrave;nh trạng nguy hiểm v&agrave; sẽ đổ chu&ocirc;ng trong v&ograve;ng 1 ph&uacute;t, nếu kh&ocirc;ng c&oacute; sự phản hồi n&agrave;o từ người d&ugrave;ng, đồng hồ sẽ tự động li&ecirc;n lạc c&aacute;c số khẩn cấp đ&atilde; được c&agrave;i đặt trước đ&oacute;.</p>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/images/7077/226475/samsung-galaxy-watch-3-41mm-writeee7.jpg\" onclick=\"return false;\"><img alt=\"Đồng hồ Samsung Galaxy Watch 3 41mm với tính năng phát hiện té ngã\" src=\"https://cdn.tgdd.vn/Products/Images/7077/226475/samsung-galaxy-watch-3-41mm-writeee7.jpg\" /></a></h3>\r\n\r\n<h3>Thưởng thức &acirc;m nhạc mọi l&uacute;c</h3>\r\n\r\n<p>Người d&ugrave;ng kh&ocirc;ng những c&oacute; thể kết nối điều khiển ph&aacute;t nhạc tr&ecirc;n điện thoại, m&agrave; c&ograve;n c&oacute; thể kết nối với<a href=\"https://www.thegioididong.com/tai-nghe-bluetooth\" target=\"_blank\">&nbsp;tai nghe bluetooth</a>, mang đến trải nghiệm nghe nhạc th&uacute; vị v&agrave; dễ d&agrave;ng hơn.&nbsp;</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/226475/samsung-galaxy-watch-3-41mm-writeeefixxx.jpg\" onclick=\"return false;\"><img alt=\"Đồng hồ Samsung Galaxy Watch 3 41mm mang đến trải nghiệm âm nhạc tuyệt vời\" src=\"https://cdn.tgdd.vn/Products/Images/7077/226475/samsung-galaxy-watch-3-41mm-writeeefixxx.jpg\" /></a></p>\r\n\r\n<h3>Nhiều t&iacute;nh năng hữu &iacute;ch</h3>\r\n\r\n<p>C&aacute;c t&iacute;nh năng kh&aacute;c như: B&aacute;o thức, rung th&ocirc;ng b&aacute;o,&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh?g=dem-so-buoc-chan\" target=\"_blank\">đếm bước ch&acirc;n</a>, dự b&aacute;o thời tiết,&hellip;</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/226475/samsung-galaxy-watch-3-41mm-writeee10.jpg\" onclick=\"return false;\"><img alt=\"Đồng hồ Samsung Galaxy Watch 3 41mm còn rất nhiều tính năng khác\" src=\"https://cdn.tgdd.vn/Products/Images/7077/226475/samsung-galaxy-watch-3-41mm-writeee10.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dong-ho-thong-minh\" target=\"_blank\">Đồng hồ th&ocirc;ng minh</a>&nbsp;Samsung Galaxy Watch 3 41mm với thiết kế sang trọng, m&agrave;n h&igrave;nh SUPER AMOLED 1.2 inch cho h&igrave;nh&nbsp;ảnh sắc n&eacute;t, v&ograve;ng bezel v&ocirc; c&ugrave;ng tiện lợi,&nbsp;<a href=\"https://www.thegioididong.com/day-dong-ho?g=day-samsung-watch\" target=\"_blank\">d&acirc;y&nbsp;đeo bằng da</a>&nbsp;dễ chịu&nbsp;c&ugrave;ng c&aacute;c t&iacute;nh năng&nbsp;ưu việt như theo d&otilde;i nhịp tim, giấc ngủ, chu kỳ kinh nguyệt, nồng&nbsp;độ&nbsp;Oxy trong m&aacute;u, luyện tập thể thao, ph&aacute;t hiện t&eacute; ng&atilde;. Samsung Galaxy Watch 3 chắc chắn sẽ l&agrave; mẫu&nbsp;đồng hồ v&ocirc; c&ugrave;ng tiện lợi&nbsp;trong việc chăm s&oacute;c sức khoẻ v&agrave; r&egrave;n luyện th&acirc;n thể mỗi ng&agrave;y.</p>\r\n\r\n<h3><strong>So s&aacute;nh Samsung Galaxy Watch 3 41 mm v&agrave;&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh/samsung-galaxy-watch-46mm\" target=\"_blank\">Samsung Galaxy Watch</a></strong></h3>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>T&iacute;nh Năng</strong></p>\r\n			</td>\r\n			<td><strong>Samsung Galaxy Watch 3 41 mm</strong></td>\r\n			<td><strong>Samsung Galaxy Watch</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh</td>\r\n			<td>\r\n			<p>Super AMOLED 1.2 inch</p>\r\n\r\n			<p>360 x 360 pixels</p>\r\n			</td>\r\n			<td>\r\n			<p><strong>Super AMOLED 1.3 inch</strong></p>\r\n\r\n			<p>360 x 360 pixels</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mặt k&iacute;nh</td>\r\n			<td>K&iacute;nh cường lực Gorilla Glass Dx+</td>\r\n			<td>K&iacute;nh cường lực Gorilla Glass Dx+</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cổng sạc</td>\r\n			<td>Đế sạc nam ch&acirc;m</td>\r\n			<td>Đế sạc nam ch&acirc;m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kết nối</td>\r\n			<td>\r\n			<p><strong>Bluetooth v5.0</strong></p>\r\n\r\n			<p>Wifi</p>\r\n\r\n			<p>GPS</p>\r\n			</td>\r\n			<td>\r\n			<p>Bluetooth</p>\r\n\r\n			<p>Wifi</p>\r\n\r\n			<p>GPS</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nghe gọi</td>\r\n			<td>Nghe gọi tr&ecirc;n đồng hồ th&ocirc;ng qua Bluetooth</td>\r\n			<td>Nghe gọi tr&ecirc;n đồng hồ th&ocirc;ng qua Bluetooth</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ nhớ trong</td>\r\n			<td><strong>8 GB</strong></td>\r\n			<td>4 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Thời gian</p>\r\n\r\n			<p>sử dụng</p>\r\n			</td>\r\n			<td>\r\n			<p>247 mAh</p>\r\n\r\n			<p>Khoảng 40 tiếng</p>\r\n			</td>\r\n			<td>\r\n			<p><strong>472 mAh</strong></p>\r\n\r\n			<p><strong>Khoảng 5 ng&agrave;y</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thời gian sạc</td>\r\n			<td>Khoảng 2 giờ</td>\r\n			<td><strong>Khoảng 1.5 giờ</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tiện t&iacute;ch sức khỏe</td>\r\n			<td>\r\n			<p>Đo nhịp tim</p>\r\n\r\n			<p>Theo d&otilde;i giấc ngủ</p>\r\n\r\n			<p>T&iacute;nh lượng calories ti&ecirc;u thụ</p>\r\n\r\n			<p>Đếm số bước ch&acirc;n</p>\r\n\r\n			<p>Chế độ luyện tập</p>\r\n\r\n			<p>T&iacute;nh qu&atilde;ng đường chạy</p>\r\n\r\n			<p><strong>Đo nồng độ oxy trong m&aacute;u(SpO2)</strong></p>\r\n			</td>\r\n			<td>\r\n			<p>Đo nhịp tim</p>\r\n\r\n			<p>Theo d&otilde;i giấc ngủ</p>\r\n\r\n			<p>T&iacute;nh lượng calories ti&ecirc;u thụ</p>\r\n\r\n			<p>Đếm số bước ch&acirc;n</p>\r\n\r\n			<p>Chế độ luyện tập</p>\r\n\r\n			<p>T&iacute;nh qu&atilde;ng đường chạy</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tiện &iacute;ch kh&aacute;c</td>\r\n			<td>\r\n			<p>M&agrave;n h&igrave;nh lu&ocirc;n hiển thị</p>\r\n\r\n			<p>Điều khiển chơi nhạc</p>\r\n\r\n			<p>Đồng hồ bấm giờ</p>\r\n\r\n			<p>Thay mặt đồng hồ</p>\r\n\r\n			<p>Rung th&ocirc;ng b&aacute;o</p>\r\n\r\n			<p>B&aacute;o thức</p>\r\n\r\n			<p>T&igrave;m điện thoại</p>\r\n\r\n			<p><strong>Dự b&aacute;o thời tiết</strong></p>\r\n\r\n			<p><strong>Tạo mặt đồng hồ AI</strong></p>\r\n			</td>\r\n			<td>\r\n			<p>M&agrave;n h&igrave;nh lu&ocirc;n hiển thị</p>\r\n\r\n			<p>Điều khiển chơi nhạc</p>\r\n\r\n			<p>Đồng hồ bấm giờ</p>\r\n\r\n			<p>Thay mặt đồng hồ</p>\r\n\r\n			<p>Rung th&ocirc;ng b&aacute;o</p>\r\n\r\n			<p>B&aacute;o thức</p>\r\n\r\n			<p>T&igrave;m điện thoại</p>\r\n\r\n			<p><strong>Nhắc nhở</strong></p>\r\n\r\n			<p><strong>C&agrave;i ứng dụng Galaxy App</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ng&ocirc;n ngữ</td>\r\n			<td>\r\n			<p>Tiếng Việt</p>\r\n\r\n			<p>Tiếng Anh</p>\r\n			</td>\r\n			<td>\r\n			<p>Tiếng Việt</p>\r\n\r\n			<p>Tiếng Anh</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<p>Giảm gi&aacute; 4,000,000 khi tham gia thu cũ đổi mới (kh&ocirc;ng k&egrave;m khuyến m&atilde;i kh&aacute;c)&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/so-huu-samsung-galaxy-watch-tiet-kiem-tien-trieu-voi-thu-cu-doi-moi-1335421?clearcache=1\" target=\"_blank\">(click xem chi tiết)</a></p>\r\n', NULL, NULL, 1, 1, '2021-04-20 01:33:57', '2021-05-08 08:46:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `avatar`) VALUES
(1, 6, '1618081980-tải xuống.jpg'),
(2, 6, '1618081980-u_logo_1024 - Copy.png'),
(3, 6, '1618081980-vuex-cho-nguoi-moi-bat-dau.png'),
(4, 6, '1618081980-win-10.jpg'),
(5, 7, '1618082952-images (3).jpg'),
(6, 7, '1618082952-images (5).jpg'),
(7, 7, '1618082952-images (6).jpg'),
(8, 7, '1618082952-images (1).jpg'),
(9, 7, '1618082952-images (2).jpg'),
(10, 8, '1618082998-tải xuống (1).jpg'),
(11, 8, '1618082998-tải xuống (2).jpg'),
(12, 8, '1618082998-tải xuống (3).jpg'),
(13, 9, '1618083387-tải xuống (4).jpg'),
(14, 9, '1618083387-tải xuống (5).jpg'),
(15, 9, '1618083387-tải xuống (6).jpg'),
(16, 9, '1618083387-tải xuống (7).jpg'),
(17, 10, '1618882005-3-1.jpg'),
(18, 10, '1618882005-acer-aspire-5-a514-54-33wy-i3-nxa23sv00j-021220-101200-400x400.jpg'),
(19, 10, '1618882005-apple-macbook-air-mqd32sa-a-i5-5350u-400x400.jpg'),
(20, 11, '1618882188-8.jpg'),
(21, 11, '1618882188-samsung-galaxy-tab-a7-2020-vangdong-600x600.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating_product`
--

CREATE TABLE `rating_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `rating_product`
--

INSERT INTO `rating_product` (`id`, `user_id`, `product_id`, `name`, `content`, `number`, `created_at`, `updated_at`) VALUES
(2, 3, 7, 'Hoàng Mạnh Tú', 'Sản phẩm khá là ok :))', 5, '2021-04-26 12:42:51', NULL),
(3, 3, 7, 'Phan Anh Đức', 'Sản phẩm bình thường.ổn trong tầm giá', 4, '2021-04-26 12:45:08', NULL),
(4, 3, 7, 'Bùi Minh Toàn', 'Ok nhé', 5, '2021-04-26 12:48:03', NULL),
(5, 1, 9, 'Hoàng Mạnh Tú', 'Dùng mượt. rất ổn trong tầm giá !!!', 5, '2021-04-26 19:10:43', NULL),
(6, 1, 9, 'Phạm Thị Thảo', 'Ok nhé', 5, '2021-04-26 19:12:04', NULL),
(7, 1, 8, 'Hoàng Mạnh Tú', 'Xài rất ok rất mượt nhưng để qua đêm bị tụt vài phần trâm pin nhân viên chia sẽ nhiệt tình', 5, '2021-04-26 19:16:28', NULL),
(8, 1, 8, 'Hoàng Mạnh Tú', 'máy pin trâu nhân viên tư vấn nhiệt tình mình rất thích cách phục này cảm ơn !\nSẽ giới thiệu sản phẩm này cho bạn bè, người thân', 5, '2021-04-26 19:16:53', NULL),
(9, 1, 10, 'Hoàng Mạnh Tú', 'Máy chạy mượt, nhìn đẳng cấp, các bạn nhân viên tại của hàng TGDĐ rất nhiệt tình, hỗ trợ mình tất cả dịch vụ đi kèm... triệu like', 5, '2021-04-26 19:17:37', NULL),
(10, 1, 12, 'Hoàng Mạnh Tú', 'Sản phẩm ok', 5, '2021-04-28 09:08:01', NULL),
(11, 1, 12, 'Hoàng Mạnh Tú', 'Abcc xyaz', 5, '2021-04-28 09:09:20', NULL),
(12, 1, 12, 'Hoàng Mạnh Tú', '12345', 2, '2021-04-28 09:09:49', NULL),
(13, 1, 12, 'Hoàng Mạnh Tú', '12343', 3, '2021-04-28 09:11:08', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `avatar`, `date_birth`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(2, 'Hoàng Mạnh Tú', '1618118460-127524687_2898348990398620_7816822764966623237_n.jpg', '1999-12-09', '03956793339', 'Triều khúc-Thanh Trì-Hà Nội', '2021-04-11 05:21:00', '2021-04-11 12:55:37'),
(3, 'Phạm Thị Thảo', '1618119914-e9438f46-f91b-4384-ab5e-2d64d866a15c.png', '1999-07-08', '0846842286', 'Triều khúc-Thanh Trì-Hà Nội', '2021-04-11 05:45:14', NULL),
(4, 'Hoàng Mạnh Tuấn', '1618119962-hồ sơ.jpg', '2003-11-01', '0879599666', 'Thanh xuân-Hà nội', '2021-04-11 05:46:02', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `avatar`, `email`, `password`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Mạnh Tú', NULL, 'hoangmanhtu0809@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0395679339', 'Nam Định', 0, '2021-04-19 06:44:27', NULL),
(2, 'Nvidia ra mắt CPU Grace, đe dọa mảng data center', NULL, 'hoangmanhtu0809@gmail.com1', 'e10adc3949ba59abbe56e057f20f883e', '0395679331', 'Nam Định', 0, '2021-04-19 07:59:47', NULL),
(3, 'Hoàng Mạnh Tú', NULL, 'binkoy0809@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0846842286', 'Triều khúc- thanh trì- Hà Nội', 0, '2021-04-19 08:30:22', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating_product`
--
ALTER TABLE `rating_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id của danh mục sản phẩm', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id của thương hiẹu', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id của sản phẩm', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `rating_product`
--
ALTER TABLE `rating_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
