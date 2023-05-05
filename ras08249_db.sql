-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 01, 2022 lúc 06:08 PM
-- Phiên bản máy phục vụ: 10.3.24-MariaDB-log
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ras08249_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_es` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `name_vi`, `name_en`, `name_es`, `slug`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Giới thiệu', 'About', '¿Quiénes somos?', NULL, 1, 1, '2021-06-13 10:22:10', '2021-09-25 04:38:52'),
(2, 0, 'Công nghệ', 'RAS TECHNOLOGY', 'RAS TECNOLOGIA', 'http://ras.vn/cong-nghe', 2, 1, '2021-06-13 10:26:08', '2021-09-25 04:44:21'),
(3, 0, 'Dịch vụ', 'Services', 'Servicios', 'http://ras.vn/dich-vu', 3, 1, '2021-06-13 10:26:26', '2021-09-25 04:44:35'),
(4, 0, 'Trang thiết bị', 'Equipment', 'Equipamiento', 'http://ras.vn/trang-thiet-bi', 4, 1, '2021-06-13 10:26:58', '2021-09-25 04:47:29'),
(5, 0, 'Liên hệ', 'Contact', 'Contacto', 'http://ras.vn/lien-he', 5, 1, '2021-06-13 10:27:11', '2021-09-25 04:47:42'),
(6, 1, 'Về chúng tôi', 'About us', 'De nosotros', 'http://ras.vn/gioi-thieu/ve-chung-toi.html', 6, 1, '2021-06-13 10:28:55', '2021-09-25 04:48:14'),
(7, 3, 'Mini Indoor', 'MINI INDOOR', NULL, 'http://ras.vn/dich-vu/mini-indoor.html', 7, 1, '2021-07-04 13:52:58', '2021-07-04 13:58:02'),
(8, 3, 'Pond & Cage', NULL, NULL, 'http://ras.vn/dich-vu/pond-cage-project-design.html', 8, 1, '2021-07-04 13:53:48', '2021-07-04 13:58:16'),
(9, 3, 'Quaculture consultancy', 'Quaculture consultancy', 'aaa', 'http://ras.vn/dich-vu/quaculture-consultancy.html', 9, 1, '2021-07-04 13:54:09', '2021-07-04 13:57:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_22_011852_create_categories_table', 1),
(5, '2021_05_22_013410_create_roles_table', 1),
(6, '2021_05_22_013552_create_permissions_table', 1),
(7, '2021_05_22_013733_create_role_users_table', 1),
(8, '2021_05_22_014017_create_posts_table', 1),
(9, '2021_05_22_014359_create_menus_table', 1),
(10, '2021_05_29_084510_create_settings_table', 1),
(11, '2021_05_30_044501_create_contacts_table', 1),
(12, '2021_06_06_094057_create_table_permission_role', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_es` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_es` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_vi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_es` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_vi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_es` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_vi` tinyint(1) NOT NULL DEFAULT 1,
  `status_en` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `name_vi`, `name_en`, `name_es`, `slug_vi`, `slug_en`, `slug_es`, `description_vi`, `description_en`, `description_es`, `content_vi`, `content_en`, `content_es`, `image_vi`, `icon`, `image_en`, `status_vi`, `status_en`, `type`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Aquaculture – offering a path to feeding a growing worldxxx', 'sdfsdf', 'sd fsdf sdf sdf', 'aquaculture-offering-a-path-to-feeding-a-growing-worldxxx', 'sdfsdf', NULL, 'Aquaculture – offering a path to feeding a growing world   Aquaculture – offering a path to feeding a growing world', 'ddddd', 'eeeee', '<p>We provide cages made specially to meet the dynamic loads of the sea.</p>\r\n<p>The use of well-proven equipment for extreme conditions eliminates corrosion, minimizes costs and lowers the need for maintenance.</p>\r\n<p>Bloom Aqua provides complete cage systems and all accompanying equipment for fish farmers around the world.</p>\r\n<p>Our team have extensive experienced in cage technology and open sea solutions.</p>\r\n<p><span style=\"color: #222222; font-family: consolas, \'lucida console\', \'courier new\', monospace; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;</span></p>', '<p>sdfsdf</p>', '<p>gggg</p>', 'upload/images/1625238271_s5.jpg', NULL, NULL, 1, 0, 'post', '2021-06-13 09:58:56', '2021-09-25 01:50:57'),
(2, NULL, 'Seafood- protein for a growing world- but at what cost?', NULL, NULL, 'seafood-protein-for-a-growing-world-but-at-what-cost', '', NULL, 'sdfsdf', NULL, NULL, '<p>sdfsdfsdf</p>\r\n<p><img src=\"/upload/images/photos/1/aa.jpg\" alt=\"\" /></p>', NULL, NULL, 'upload/images/1625238326_s6.jpg', NULL, NULL, 1, 0, 'post', '2021-06-27 11:03:51', '2021-07-02 15:05:26'),
(3, NULL, 'Feasibility studies and business plan creation including site assessment.', NULL, NULL, 'feasibility-studies-and-business-plan-creation-including-site-assessment', '', NULL, 'Feasibility studies and business plan creation including site assessment.', NULL, NULL, NULL, NULL, NULL, 'upload/images/1625237334_img7.png', NULL, NULL, 1, 0, 'expertise', '2021-07-02 14:48:54', '2021-07-02 14:49:04'),
(4, NULL, 'Project construction including full-time project management.', NULL, NULL, 'project-construction-including-full-time-project-management', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/images/1625237391_img8.png', NULL, NULL, 1, 0, 'expertise', '2021-07-02 14:49:51', '2021-07-02 14:49:51'),
(5, NULL, 'Detailed engineering design including civil works and full system design.', NULL, NULL, 'detailed-engineering-design-including-civil-works-and-full-system-design', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/images/1625237414_img9.png', NULL, NULL, 1, 0, 'expertise', '2021-07-02 14:50:14', '2021-07-02 14:50:14'),
(6, NULL, 'Follow-up support with long term project assistance.', NULL, NULL, 'follow-up-support-with-long-term-project-assistance', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/images/1625237436_img10.png', NULL, NULL, 1, 0, 'expertise', '2021-07-02 14:50:36', '2021-07-02 14:50:36'),
(7, NULL, 'Preliminary engineering concept design taking into account commercial and local.', NULL, NULL, 'preliminary-engineering-concept-design-taking-into-account-commercial-and-local', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/images/1625237458_img11.png', NULL, NULL, 1, 0, 'expertise', '2021-07-02 14:50:58', '2021-07-02 14:50:58'),
(8, NULL, 'Stocking plans including the definition of stocking densities.', NULL, NULL, 'stocking-plans-including-the-definition-of-stocking-densities', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/images/1625237479_img12.png', NULL, NULL, 1, 0, 'expertise', '2021-07-02 14:51:19', '2021-07-02 14:51:19'),
(9, NULL, 'Water pums', NULL, NULL, 'water-pums', '', NULL, NULL, NULL, NULL, '<p>Dealing with the top pump manufacturers, we offer a wide range of quality pumps for different uses and performance.</p>\r\n<p>Please contact us for more information about our various pump models. We will be happy to help find the most suitable type for your requirements.</p>', NULL, NULL, 'upload/images/1625237603_s10.jpg', NULL, NULL, 1, 0, 'equipment', '2021-07-02 14:53:23', '2021-07-02 14:53:23'),
(10, NULL, 'Fish cages', NULL, NULL, 'fish-cages', '', NULL, NULL, NULL, NULL, '<p>We provide cages made specially to meet the dynamic loads of the sea.</p>\r\n<p>The use of well-proven equipment for extreme conditions eliminates corrosion, minimizes costs and lowers the need for maintenance.</p>\r\n<p>Bloom Aqua provides complete cage systems and all accompanying equipment for fish farmers around the world.</p>\r\n<p>Our team have extensive experienced in cage technology and open sea solutions.</p>\r\n<p><img src=\"/upload/images/photos/1/s11.jpg\" alt=\"\" /></p>', NULL, NULL, 'upload/images/1625237717_s7.jpg', NULL, NULL, 1, 0, 'equipment', '2021-07-02 14:55:17', '2021-07-02 14:55:17'),
(11, NULL, 'Fish processing', NULL, NULL, 'fish-processing', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/images/1625238034_vd8SgPmUey18NA8Z8PAXSVHvH7oThST0PP4UBlm3.jpg', NULL, NULL, 1, 0, 'equipment', '2021-07-02 15:00:34', '2021-07-02 15:00:34'),
(12, NULL, 'Aeration & Oxygen', NULL, NULL, 'aeration-oxygen', '', NULL, NULL, NULL, NULL, '<div class=\"section clearfix\">\r\n<div class=\"container\">\r\n<div class=\"row mt-30 pdb-100\">\r\n<div class=\"content-about col-xs-12 col-md-12\">\r\n<p>Dealing with the top pump manufacturers, we offer a wide range of quality pumps for different uses and performance.</p>\r\n<p>Please contact us for more information about our various pump models. We will be happy to help find the most suitable type for your requirements.</p>\r\n<div class=\"section clearfix\">\r\n<div class=\"container\">\r\n<div class=\"row mt-30 pdb-100\">\r\n<div class=\"content-about col-xs-12 col-md-12\">\r\n<p>Dealing with the top pump manufacturers, we offer a wide range of quality pumps for different uses and performance.</p>\r\n<p>Please contact us for more information about our various pump models. We will be happy to help find the most suitable type for your requirements.</p>\r\n<div class=\"section clearfix\">\r\n<div class=\"container\">\r\n<div class=\"row mt-30 pdb-100\">\r\n<div class=\"content-about col-xs-12 col-md-12\">\r\n<p>Dealing with the top pump manufacturers, we offer a wide range of quality pumps for different uses and performance.</p>\r\n<p>Please contact us for more information about our various pump models. We will be happy to help find the most suitable type for your requirements.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, 'upload/images/1625238181_oxygen.jpg', NULL, NULL, 1, 0, 'equipment', '2021-07-02 15:03:01', '2021-07-02 15:03:01'),
(13, NULL, 'RAS technology solution contributes in achieving the Sustainable Development Goals', NULL, NULL, 'ras-technology-solution-contributes-in-achieving-the-sustainable-development-goals', '', NULL, NULL, NULL, NULL, '<p>We provide cages made specially to meet the dynamic loads of the sea.</p>\r\n<p>The use of well-proven equipment for extreme conditions eliminates corrosion, minimizes costs and lowers the need for maintenance.</p>\r\n<p>Bloom Aqua provides complete cage systems and all accompanying equipment for fish farmers around the world.</p>\r\n<p>Our team have extensive experienced in cage technology and open sea solutions.</p>', NULL, NULL, 'upload/images/1625238379_s3.jpg', NULL, NULL, 1, 0, 'post', '2021-07-02 15:06:19', '2021-07-02 15:06:19'),
(14, NULL, 'Về chúng tôi', NULL, NULL, 've-chung-toi', '', NULL, NULL, NULL, NULL, '<p>Về ch&uacute;ng t&ocirc;i Về ch&uacute;ng t&ocirc;i Về ch&uacute;ng t&ocirc;i</p>', NULL, NULL, NULL, NULL, NULL, 1, 0, 'about', '2021-07-02 15:24:53', '2021-07-02 15:24:53'),
(15, NULL, 'Prone to environmental issues', NULL, NULL, 'prone-to-environmental-issues', '', NULL, NULL, NULL, NULL, '<ul>\r\n<li>The general population of marine resources is declining; the world&rsquo;s wild fish stocks are over-exploited.</li>\r\n<li>Farmed fish associated with biological problems which bring negative impacts to the environment such as water pollution</li>\r\n</ul>', NULL, NULL, 'upload/images/1625405750_worldwide.png', NULL, NULL, 1, 0, 'problem', '2021-07-04 13:35:50', '2021-07-04 13:35:50'),
(16, NULL, 'Environmentally unsound', NULL, NULL, 'environmentally-unsound', '', NULL, NULL, NULL, NULL, '<p>The general population of marine resources is declining; the world&rsquo;s wild fish stocks are over-exploited.<br />Farmed fish associated with biological problems which bring negative impacts to the environment such as water pollution</p>', NULL, NULL, 'upload/images/1625405811_wave.png', NULL, NULL, 1, 0, 'problem', '2021-07-04 13:36:51', '2021-07-04 13:36:51'),
(17, NULL, 'Product quality', NULL, NULL, 'product-quality', '', NULL, NULL, NULL, NULL, '<p>The general population of marine resources is declining; the world&rsquo;s wild fish stocks are over-exploited.<br />Farmed fish associated with biological problems which bring negative impacts to the environment such as water pollution</p>', NULL, NULL, 'upload/images/1625405835_reward.png', NULL, NULL, 1, 0, 'problem', '2021-07-04 13:37:15', '2021-07-04 13:37:15'),
(18, NULL, 'Limited by geography', NULL, NULL, 'limited-by-geography', '', NULL, NULL, NULL, NULL, '<p>The general population of marine resources is declining; the world&rsquo;s wild fish stocks are over-exploited.<br />Farmed fish associated with biological problems which bring negative impacts to the environment such as water pollution</p>', NULL, NULL, 'upload/images/1625405860_map.png', NULL, NULL, 1, 0, 'problem', '2021-07-04 13:37:40', '2021-07-04 13:37:40'),
(19, NULL, 'Seasonal harvest', NULL, NULL, 'seasonal-harvest', '', NULL, NULL, NULL, NULL, '<p>The general population of marine resources is declining; the world&rsquo;s wild fish stocks are over-exploited.<br />Farmed fish associated with biological problems which bring negative impacts to the environment such as water pollution</p>', NULL, NULL, 'upload/images/1625405895_fishing-net.png', NULL, NULL, 1, 0, 'problem', '2021-07-04 13:38:15', '2021-07-04 13:38:15'),
(20, NULL, 'Environmental benefits', NULL, NULL, 'environmental-benefits', '', NULL, NULL, NULL, NULL, '<p>Significantly reduced water pollution from feed, feces and chemical waste.</p>', NULL, NULL, 'upload/images/1625405953_water.png', NULL, NULL, 1, 0, 'solution', '2021-07-04 13:39:13', '2021-07-04 13:39:13'),
(21, NULL, 'Year-round harvesting', NULL, NULL, 'year-round-harvesting', '', NULL, NULL, NULL, NULL, '<p>RAS systems allow for easier control of supply, including ability for partial or staggered harvesting, compared to traditional cage systems.</p>', NULL, NULL, 'upload/images/1625405975_year.png', NULL, NULL, 1, 0, 'solution', '2021-07-04 13:39:35', '2021-07-04 13:39:35'),
(22, NULL, 'Location independent', NULL, NULL, 'location-independent', '', NULL, NULL, NULL, NULL, '<p>Ability to locate close proximity to the market &ndash; resulting in lower GHG emissions from transport, cost savings &amp; longer shelf life.</p>', NULL, NULL, 'upload/images/1625406005_travel.png', NULL, NULL, 1, 0, 'solution', '2021-07-04 13:40:05', '2021-07-04 13:40:05'),
(23, NULL, 'Full bio-security', NULL, NULL, 'full-bio-security', '', NULL, NULL, NULL, NULL, '<p>Ability to locate close proximity to the market &ndash; resulting in lower GHG emissions from transport, cost savings &amp; longer shelf life.</p>', NULL, NULL, 'upload/images/1625406023_bio.png', NULL, NULL, 1, 0, 'solution', '2021-07-04 13:40:23', '2021-07-04 13:40:23'),
(24, NULL, 'Faster growth', NULL, NULL, 'faster-growth', '', NULL, NULL, NULL, NULL, '<p>Ability to locate close proximity to the market &ndash; resulting in lower GHG emissions from transport, cost savings &amp; longer shelf life.</p>', NULL, NULL, 'upload/images/1625406037_growth.png', NULL, NULL, 1, 0, 'solution', '2021-07-04 13:40:37', '2021-07-04 13:40:37'),
(25, NULL, 'Production cost advantage', NULL, NULL, 'production-cost-advantage', '', NULL, NULL, NULL, NULL, '<p>Ability to locate close proximity to the market &ndash; resulting in lower GHG emissions from transport, cost savings &amp; longer shelf life.</p>', NULL, NULL, 'upload/images/1625406060_report.png', NULL, NULL, 1, 0, 'solution', '2021-07-04 13:41:00', '2021-07-04 13:41:00'),
(26, NULL, 'shrimp solutions', NULL, NULL, 'shrimp-solutions', '', NULL, NULL, NULL, NULL, '<p>We develop cost-effective and efficient small to medium-scale Recirculating Aquaculture Systems (RAS) for a number of aquaculture species, with a patent pending specifically for Whiteleg shrimp production.</p>\r\n<p>Bloom&rsquo;s indoor RAS facilities provide full-scale solutions for commercial, intensive and sustainable shrimp production, including sophisticated water treatment systems to recirculate water in a closed-loop system, requiring zero chemicals or antibiotics.</p>\r\n<p><strong>INTRODUCING SHRIMP &ndash; HEALTHY PROTEIN SEAFOOD VS. OTHER SOURCES</strong></p>\r\n<p>Compared to other types of seafood, shrimp provides substantial advantages in nutrition with the highest iron and 2nd lowest total fat and calories which is suitable for weekly consume.</p>\r\n<p><img src=\"/upload/images/photos/1/aaa.png\" alt=\"\" /></p>\r\n<p><strong>INTRODUCING SHRIMP &ndash; HEALTHY PROTEIN SEAFOOD VS. OTHER SOURCES</strong></p>\r\n<p>Compared to other types of seafood, shrimp provides substantial advantages in nutrition with the highest iron and 2nd lowest total fat and calories which is suitable for weekly consume.</p>', NULL, NULL, NULL, NULL, NULL, 1, 0, 'post-tech', '2021-07-04 13:45:09', '2021-07-04 13:45:09'),
(27, NULL, 'MINI INDOOR', NULL, NULL, 'mini-indoor', '', NULL, 'Our Mini Indoor Systems provide optimum indoor growing conditions for small to medium-sized aquaculture projects.', NULL, NULL, '<p>Bloom Aqua has created a range of scaled, modular aquaculture production systems based on larger-scale RAS systems &ndash; the Mini Indoor Aquaculture Facilities.</p>\r\n<p>The systems provide optimal indoor growing conditions for smaller sized production with production sizes of 25, 50, 100 and multiples of 100 metric tons per year.</p>', NULL, NULL, 'upload/images/1625406740_s8.jpg', 'upload/images/1625406529_aquarium1.png', NULL, 1, 0, 'service', '2021-07-04 13:48:49', '2021-07-04 13:52:20'),
(28, NULL, 'POND & CAGE PROJECT DESIGN', NULL, NULL, 'pond-cage-project-design', '', NULL, 'We have diverse experience across the world for designing and establishing traditional pond and cage projects.', NULL, NULL, '<p>Bloom Aqua has created a range of scaled, modular aquaculture production systems based on larger-scale RAS systems &ndash; the Mini Indoor Aquaculture Facilities.</p>\r\n<p>The systems provide optimal indoor growing conditions for smaller sized production with production sizes of 25, 50, 100 and multiples of 100 metric tons per year.</p>', NULL, NULL, 'upload/images/1625406732_s7.jpg', 'upload/images/1625406732_img2.png', NULL, 1, 0, 'service', '2021-07-04 13:52:12', '2021-07-04 13:52:12'),
(29, NULL, 'Quaculture consultancy', NULL, NULL, 'quaculture-consultancy', '', NULL, 'We have diverse experience across the world for designing and establishing traditional pond and cage projects.', NULL, NULL, '<p>Bloom Aqua has created a range of scaled, modular aquaculture production systems based on larger-scale RAS systems &ndash; the Mini Indoor Aquaculture Facilities.</p>\r\n<p>The systems provide optimal indoor growing conditions for smaller sized production with production sizes of 25, 50, 100 and multiples of 100 metric tons per year.</p>', NULL, NULL, 'upload/images/1625407001_s9.jpg', 'upload/images/1625407001_img3.png', NULL, 1, 0, 'service', '2021-07-04 13:56:41', '2021-07-04 13:57:22'),
(30, NULL, 'RAS TECHNOLOGY', NULL, NULL, 'ras-technology', '', NULL, NULL, NULL, NULL, '<p>Recirculating Aquaculture System Technology is the future of aquaculture. Growing in indoor, biosecure conditions allows for high-density production under optimal conditions.</p>\r\n<p><br />A more sustainable production &ndash; water recirculation and advanced water treatment ensures significantly reduced water pollution from feed, faeces, and chemical waste.</p>\r\n<p>Producing healthier seafood &ndash; biosecure aquaculture removes the need for antibiotic or chemical treatments, resulting in nutritious, healthy fish and shrimp.</p>', NULL, NULL, NULL, NULL, NULL, 1, 0, 'about-tech', '2021-07-04 14:11:25', '2021-07-04 14:11:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zalo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_es` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword_vi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword_es` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_vi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_es` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_es` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_vi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_es` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_vi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_es` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe_map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `facebook`, `instagram`, `social_in`, `twitter`, `youtube`, `zalo`, `email`, `name_vi`, `name_en`, `title_vi`, `title_en`, `title_es`, `keyword_vi`, `keyword_en`, `keyword_es`, `description_vi`, `description_en`, `description_es`, `company_vi`, `company_en`, `company_es`, `address_vi`, `address_en`, `address_es`, `phone`, `hotline`, `logo`, `des_vi`, `des_en`, `des_es`, `copyright`, `iframe_map`, `favicon`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 'acb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ras VN', 'Ras VN', 'Ras VN', 'dfsf', 'sss', 'ssdfsdf', '0321456987', '0231456987', 'upload/images/1632544367_rass.jpg', 'We offer a complete range of aquaculture services, from traditional pond and cage design and supply, through to equipment provision, and Mini Indoor Aquaculture Facilities.', NULL, NULL, NULL, NULL, 'upload/images/1625407788_ras1.jpg', '2021-06-13 10:08:18', '2021-09-25 04:32:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `phone`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2021-06-13 09:51:26', '$2y$10$dGgl94wXBcQ9GyremVLWve5TeW9zNxbBJEr6rdVh.EBxzeyhsmv96', NULL, NULL, NULL, NULL, '2021-06-13 09:51:26', '2021-07-18 08:56:18'),
(2, 'Admin', 'chuonghh@gmail.com', '2021-06-13 09:51:26', '$2y$10$WSz.38amXMNtDAnlhOIwg.WcbxE8R/FRSKZTIeiyge.pD0p3s/jOe', NULL, NULL, NULL, NULL, '2021-06-13 09:51:26', '2021-06-13 09:51:26');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
