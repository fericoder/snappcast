-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 08:55 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snappcast`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'دوره های آموزشی', 0, '2019-07-19 12:52:12', '2019-07-19 12:52:12', NULL),
(2, 'مقالات', 0, '2019-07-19 12:52:24', '2019-07-19 12:52:24', NULL),
(3, 'پادکست ها', 0, '2019-07-19 12:52:30', '2019-07-19 12:52:30', NULL),
(4, 'اخبار', 0, '2019-07-19 12:52:40', '2019-07-19 12:52:40', NULL),
(5, 'طراحی و برنامه نویسی وب', 1, '2019-07-19 12:55:19', '2019-07-19 12:55:19', NULL),
(6, 'طراحی و برنامه نویسی موبایل', 1, '2019-07-19 12:58:00', '2019-07-19 12:58:00', NULL),
(7, 'طراحی و برنامه نویسی دسکتاپ', 1, '2019-07-19 12:58:11', '2019-07-19 12:58:11', NULL),
(8, 'شبکه', 1, '2019-07-19 12:58:37', '2019-07-19 12:58:37', NULL),
(9, 'مجازی سازی', 1, '2019-07-19 12:59:36', '2019-07-19 12:59:36', NULL),
(10, 'سیستم های عامل', 1, '2019-07-19 12:59:53', '2019-07-19 12:59:53', NULL),
(11, 'امنیت', 1, '2019-07-19 13:00:01', '2019-07-19 13:00:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `commentable_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `parent_id`, `approved`, `comment`, `commentable_type`, `commentable_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 1, 'عالی بود... ممنونم از استاد خسروجردی عزیز', 'App\\Course', 1, '2019-07-12 11:39:41', '2019-07-12 11:40:14', NULL),
(2, 1, 0, 1, 'aali', 'App\\Post', 135, '2019-07-12 11:41:26', '2019-07-12 11:41:39', NULL),
(3, 5, 0, 1, 'خیلی خوب بود', 'App\\Course', 1, '2019-07-30 14:38:22', '2019-07-30 14:38:22', NULL),
(4, 5, 1, 1, 'بی نظیر بود', 'App\\Course', 1, '2019-07-30 14:38:57', '2019-07-30 14:38:57', NULL),
(5, 5, 0, 1, 'عالییی', 'App\\Course', 1, '2019-07-30 14:39:27', '2019-07-30 14:39:27', NULL),
(6, 5, 0, 1, 'عالییی', 'App\\Course', 1, '2019-07-30 14:41:23', '2019-07-30 14:41:23', NULL),
(7, 5, 6, 1, 'جه خوب', 'App\\Course', 1, '2019-07-30 14:56:09', '2019-07-30 14:56:09', NULL),
(8, 5, 0, 0, 'علی', 'App\\Course', 1, '2019-07-30 20:12:46', '2019-07-30 20:12:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(20) DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `images` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `viewCount` int(11) NOT NULL,
  `commnetCount` int(11) NOT NULL,
  `notified` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `attachment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `buyCount` int(11) DEFAULT NULL,
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `user_id`, `category_id`, `title`, `type`, `price`, `slug`, `description`, `body`, `images`, `viewCount`, `commnetCount`, `notified`, `attachment`, `buyCount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 5, 'آموزش مقدماتی HTML و CSS', 'free', NULL, 'آموزش-مقدماتی-HTML-و-CSS', 'در این دوره با مقدمات طراحی سایت با html و css آشنا میشوید.', '<p>در این دوره با مقدمات html و css آشنا میشوید.</p>', '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1564490672_html-banner.jpg\",\"325,215\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/325,215_1564490672_html-banner.jpg\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/350,234_1564490672_html-banner.jpg\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/250,167_1564490672_html-banner.jpg\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/755,504_1564490672_html-banner.jpg\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/120,80_1564490672_html-banner.jpg\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/848,566_1564490672_html-banner.jpg\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1475,800_1564490672_html-banner.jpg\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/400,200_1564490672_html-banner.jpg\"}', 1, 0, '0', NULL, NULL, '2019-07-30 12:44:34', '2019-07-30 12:57:23', '2019-07-30 12:57:23'),
(2, 1, 5, 'آموزش مقدماتی HTML و CSS', 'free', NULL, 'آموزش-مقدماتی-HTML-و-CSS-1', 'در این دوره با مقدمات طراحی سایت با html و css آشنا میشوید.', '<p>در این دوره با مقدمات html و css آشنا میشوید.</p>', '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1564490698_html-banner.jpg\",\"325,215\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/325,215_1564490698_html-banner.jpg\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/350,234_1564490698_html-banner.jpg\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/250,167_1564490698_html-banner.jpg\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/755,504_1564490698_html-banner.jpg\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/120,80_1564490698_html-banner.jpg\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/848,566_1564490698_html-banner.jpg\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1475,800_1564490698_html-banner.jpg\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/400,200_1564490698_html-banner.jpg\"}', 0, 0, '0', NULL, NULL, '2019-07-30 12:44:59', '2019-07-30 12:50:03', '2019-07-30 12:50:03'),
(3, 1, 5, 'آموزش مقدماتی HTML و CSS', 'free', NULL, 'آموزش-مقدماتی-HTML-و-CSS-2', 'در این دوره با مقدمات طراحی سایت با html و css آشنا میشوید.', '<p>در این دوره با مقدمات html و css آشنا میشوید.</p>', '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1564490787_html-banner.jpg\",\"325,215\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/325,215_1564490787_html-banner.jpg\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/350,234_1564490787_html-banner.jpg\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/250,167_1564490787_html-banner.jpg\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/755,504_1564490787_html-banner.jpg\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/120,80_1564490787_html-banner.jpg\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/848,566_1564490787_html-banner.jpg\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1475,800_1564490787_html-banner.jpg\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/400,200_1564490787_html-banner.jpg\"}', 0, 0, '0', NULL, NULL, '2019-07-30 12:46:29', '2019-07-30 12:46:34', '2019-07-30 12:46:34'),
(4, 1, 1, 'dfdsfsfdsfsdfsdf', 'free', NULL, 'dfdsfsfdsfsdfsdf', 'sdfsdfsdfsdfsdf', '<p>sdkfsdfjlsdfjlksdffks</p>', '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1564491217_html-banner.jpg\",\"325,215\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/325,215_1564491217_html-banner.jpg\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/350,234_1564491217_html-banner.jpg\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/250,167_1564491217_html-banner.jpg\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/755,504_1564491217_html-banner.jpg\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/120,80_1564491217_html-banner.jpg\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/848,566_1564491217_html-banner.jpg\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1475,800_1564491217_html-banner.jpg\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/400,200_1564491217_html-banner.jpg\"}', 1, 0, '0', NULL, NULL, '2019-07-30 12:53:39', '2019-07-30 12:57:21', '2019-07-30 12:57:21'),
(5, 1, 1, 'rqedas', 'free', NULL, 'rqedas', 'dasdasdasd', '<p>lksdflkadlfkdfsadfdsf</p>', '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1564491422_html-banner.jpg\",\"239,215\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/239,215_1564491422_html-banner.jpg\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/350,234_1564491422_html-banner.jpg\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/250,167_1564491422_html-banner.jpg\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/755,504_1564491422_html-banner.jpg\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/120,80_1564491422_html-banner.jpg\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/848,566_1564491422_html-banner.jpg\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1475,800_1564491422_html-banner.jpg\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/400,200_1564491422_html-banner.jpg\"}', 1, 0, '0', NULL, NULL, '2019-07-30 12:57:04', '2019-07-30 12:59:12', '2019-07-30 12:59:12'),
(6, 1, 5, 'آموزش مقدماتی HTML و CSS', 'free', NULL, 'آموزش-مقدماتی-HTML-و-CSS', 'در این دوره با مقدمات html و css آشنا میشویم.', '<p>در این دوره با مقدمات html و css آشنا میشویم.</p>', '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1564491602_html-banner.jpg\",\"239,215\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/239,215_1564491602_html-banner.jpg\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/350,234_1564491602_html-banner.jpg\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/250,167_1564491602_html-banner.jpg\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/755,504_1564491602_html-banner.jpg\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/120,80_1564491602_html-banner.jpg\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/848,566_1564491602_html-banner.jpg\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/1475,800_1564491602_html-banner.jpg\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/30\\/400,200_1564491602_html-banner.jpg\"}', 174, 2, '0', NULL, NULL, '2019-07-30 13:00:03', '2021-01-24 08:45:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_requests`
--

CREATE TABLE `course_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_requests`
--

INSERT INTO `course_requests` (`id`, `user_id`, `category_id`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 5, 'لاراول لطفا', '2019-07-30 20:42:31', '2019-07-30 20:42:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, NULL, NULL),
(2, 1, 5, NULL, NULL),
(3, 6, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fileSize` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timeClear` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cash',
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `downloadCount` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `file` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `section_id`, `course_id`, `title`, `fileSize`, `time`, `timeClear`, `type`, `description`, `downloadCount`, `order`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'آموزش تگ A', '33', '۰۰:۱۰:۳۴', '011034', 'cash', 'تست', NULL, 1, '/storage/upload/2019/7/11/1562859063_54450765_1967974943312027_2106725623836704768_n.mp4', '2019-07-11 15:31:03', '2019-07-11 15:31:03', NULL),
(2, 3, 1, 'آموزش جدول', '۴۴', '۰۰:۱۰:۳۴', '001034', 'رایگان', 'تست', NULL, 3, '/storage/upload/2019/7/12/1562930129_video_2019-04-29_20-23-10.mp4', '2019-07-12 11:15:29', '2019-07-12 11:15:29', NULL),
(3, 3, 1, 'آموزش جدول 2', '۴۴', '۰۰:۱۰:۳۴', '001034', 'رایگان', 'تست', NULL, 3, '/storage/upload/2019/7/12/1562930334_video_2019-04-29_20-23-10.mp4', '2019-07-12 11:18:54', '2019-07-12 11:18:54', NULL),
(4, 3, 1, 'آموزش جدول 2', '۴۴', '۰۰:۱۰:۳۴', '001034', 'رایگان', 'تست', NULL, 3, '/storage/upload/2019/7/12/1562930704_video_2019-04-29_20-23-10.mp4', '2019-07-12 11:25:04', '2019-07-12 11:25:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gateway_transactions`
--

CREATE TABLE `gateway_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `port` enum('MELLAT','SADAD','ZARINPAL','PAYLINE','JAHANPAY','PARSIAN','PASARGAD','SAMAN','ASANPARDAKHT','PAYPAL','PAYIR') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `ref_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tracking_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('INIT','SUCCEED','FAILED') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'INIT',
  `ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `payment_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gateway_transactions_logs`
--

CREATE TABLE `gateway_transactions_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `result_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `result_message` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(32, '2019_01_26_211354_create_voice_pod_casts_table', 1),
(33, '2019_01_26_211403_create_video_pod_casts_table', 1),
(34, '2019_01_26_211625_create_courses_table', 1),
(36, '2019_01_26_212707_create_statistics_table', 1),
(37, '2019_01_26_213044_create_likes_table', 1),
(40, '2019_01_27_210616_create_tags_table', 1),
(41, '2019_01_28_212316_create_dashboards_table', 1),
(42, '2019_02_04_205413_create_jobs_table', 2),
(43, '2019_02_08_044200_create_podcasts_table', 3),
(44, '2019_01_27_210313_create_categories_table', 4),
(45, '2019_02_10_222022_create_roles_table', 5),
(46, '2019_02_10_222034_create_permissions_table', 5),
(48, '2019_01_26_153416_create_posts_table', 7),
(50, '2019_03_13_142701_create_settings_table', 9),
(53, '2019_07_09_191446_create_courses_table', 10),
(54, '2019_07_09_200113_create_slides_table', 11),
(59, '2019_01_26_211630_create_episodes_table', 12),
(60, '2019_07_11_164307_create_sections_table', 12),
(62, '2019_01_26_213050_create_comments_table', 13),
(63, '2016_05_02_193213_create_gateway_transactions_table', 14),
(64, '2016_05_02_193229_create_gateway_status_log_table', 14),
(65, '2017_04_05_103357_alter_id_in_transactions_table', 14),
(66, '2018_03_04_224213_add_description_to_gateway_transactions', 14),
(67, '2019_07_17_171210_create_payments_table', 14),
(68, '2019_07_19_164952_create_course_requests_table', 14),
(69, '2019_07_27_025603_create_incomes_table', 14),
(70, '2019_02_15_214844_create_socials_table', 15),
(71, '2019_07_29_183836_create_teachers_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `trackingCode` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `refId` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cardNumber` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `ostadUser_id` int(10) UNSIGNED NOT NULL,
  `isPaidToOstad` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `trackingCode`, `refId`, `cardNumber`, `amount`, `user_id`, `course_id`, `ostadUser_id`, `isPaidToOstad`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '50846217496', '000000000000000000000000000124175969', '', '10000', 1, 1, 0, 0, '2019-07-17 13:35:34', '2019-07-17 13:35:34', NULL),
(2, '44846221486', '000000000000000000000000000124176331', '', '10000', 1, 1, 0, 0, '2019-07-17 13:38:56', '2019-07-17 13:38:56', NULL),
(3, '45846222936', '000000000000000000000000000124176410', '', '12000', 1, 1, 0, 0, '2019-07-17 13:40:14', '2019-07-17 13:40:14', NULL),
(4, '49846224866', '000000000000000000000000000124176640', '', '11000', 1, 1, 1, 0, '2019-07-17 13:42:29', '2019-07-17 13:42:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'ویرایش پست های خود کاربرv', 'ویرایش پست های خود کاربرv', NULL, '2019-02-13 05:15:26'),
(2, 'ویرایش تمامی پست ها', 'ویرایش تمامی پست ها', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 1, 2, NULL, NULL),
(5, 3, 1, NULL, NULL),
(6, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewCount` int(11) NOT NULL,
  `commnetCount` int(11) NOT NULL,
  `episodesCount` int(11) DEFAULT NULL,
  `telegram` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on',
  `instagram` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'off',
  `notified` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `attachment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `demo` text COLLATE utf8_unicode_ci,
  `downloadCount` int(11) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `slug`, `description`, `body`, `type`, `images`, `tags`, `viewCount`, `commnetCount`, `episodesCount`, `telegram`, `instagram`, `notified`, `attachment`, `demo`, `downloadCount`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 5, 'پادکست شماره ۱\n', 'sdfsdf', 'در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست', '<p>ljlksdjasdasjdiasdasdasdas</p>', 'article', '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/1563539257_login.jpg\",\"325,215\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/325,215_1563539257_login.jpg\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/350,234_1563539257_login.jpg\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/250,167_1563539257_login.jpg\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/755,504_1563539257_login.jpg\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/120,80_1563539257_login.jpg\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/848,566_1563539257_login.jpg\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/1475,800_1563539257_login.jpg\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/400,200_1563539257_login.jpg\"}', NULL, 29, 0, NULL, 'on', 'off', '0', NULL, NULL, NULL, '2019-07-19 08:05:38', '2019-07-19 08:06:45', '2020-10-15 12:07:52', NULL),
(2, 1, 5, 'پادکست شماره ۱', 'پادکست-شماره-۱', 'در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست', '<p>در این پست میخواهیم .........</p>', 'podcast', '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/1563539257_login.jpg\",\"325,215\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/325,215_1563539257_login.jpg\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/350,234_1563539257_login.jpg\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/250,167_1563539257_login.jpg\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/755,504_1563539257_login.jpg\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/120,80_1563539257_login.jpg\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/848,566_1563539257_login.jpg\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/1475,800_1563539257_login.jpg\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/400,200_1563539257_login.jpg\"}', NULL, 30, 0, 2, 'on', 'off', '0', '/storage/upload/2019/7/19/1563539259_Babak Jahanbakhsh - 02 - Faal.mp3', NULL, NULL, '2019-07-19 12:20:19', '2019-07-19 12:27:39', '2021-01-24 08:21:15', NULL),
(3, 1, 5, 'پادکست شماره ۱', 'پادکست-شماره-۱', 'در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست در این پادکست', '<p>در این پست میخواهیم .........</p>', 'podcast', '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/1563539257_login.jpg\",\"325,215\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/325,215_1563539257_login.jpg\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/350,234_1563539257_login.jpg\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/250,167_1563539257_login.jpg\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/755,504_1563539257_login.jpg\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/120,80_1563539257_login.jpg\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/848,566_1563539257_login.jpg\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/1475,800_1563539257_login.jpg\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/19\\/400,200_1563539257_login.jpg\"}', NULL, 30, 0, 2, 'on', 'off', '0', '/storage/upload/2019/7/19/1563539259_Babak Jahanbakhsh - 02 - Faal.mp3', NULL, NULL, '2019-07-19 12:20:19', '2019-07-19 12:27:39', '2021-01-24 08:21:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(3, 'manager', 'مدیر کل سایت', '2019-02-13 07:42:13', '2019-02-13 07:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `course_id`, `title`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'فصل اول: آشنایی', 1, '2019-07-11 13:23:39', '2019-07-11 13:23:39', NULL),
(3, 1, 'فصل۲: دوم', 2, '2019-07-11 14:53:02', '2019-07-11 14:53:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `favicon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `url`, `title`, `description`, `favicon`, `logo`, `about`, `created_at`, `updated_at`) VALUES
(1, 'اسنپ کست | مرجع آموزش های آنلاین فارسی', 'http://www.snappcast.ir/', 'اسنپ کست', 'اسنپ کست با هدف بهبود و ارتقاء سطح كيفي برنامه نویسان و دانشجویان رشته کامپیوتر كشور با بهره گیری از تکنولوژی روز، ابزار و روشهای هوشمند شكل گرفته است.', '', '/storage/upload/2019/7/28/1564331094_logo-trans copy.png', 'اسنپ کست با هدف بهبود و ارتقاء سطح كيفي برنامه نویسان و دانشجویان رشته کامپیوتر كشور با بهره گیری از تکنولوژی روز، ابزار و روشهای هوشمند شكل گرفته است.', '2019-07-06 20:10:35', '2019-07-28 16:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `slide_path` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `button_color` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `slide_path`, `title`, `description`, `url`, `button_color`, `created_at`, `updated_at`) VALUES
(1, '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"325,215\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/325,215_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/350,234_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/250,167_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/755,504_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/120,80_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/848,566_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/1475,800_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/400,200_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\"}', 'دوره رایگان آموش HTML و CSS مقدماتی', 'استاد حسن خسروجردی', '/courses/آموزش-HTML-و-CSS-از-مقدماتی', 'info', '2019-07-11 12:36:16', '2019-07-29 05:59:15'),
(2, '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"325,215\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/325,215_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/350,234_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/250,167_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/755,504_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/120,80_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/848,566_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/1475,800_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/400,200_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\"}', 'دوره رایگان آموش CSS و HTML مقدماتی', 'استاد حسن خسروجردی', '/courses/آموزش-HTML-و-CSS-از-مقدماتی', 'info', '2019-07-11 12:36:16', '2019-07-11 15:56:53'),
(3, '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"325,215\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/325,215_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/350,234_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/250,167_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/755,504_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/120,80_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/848,566_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/1475,800_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/400,200_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\"}', 'دوره رایگان آموش CSS و HTML مقدماتی', 'استاد حسن خسروجردی', '/courses/آموزش-HTML-و-CSS-از-مقدماتی', 'info', '2019-07-11 12:36:16', '2019-07-11 15:56:53'),
(4, '{\"original\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"325,215\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/325,215_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"350,234\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/350,234_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"250,167\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/250,167_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"755,504\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/755,504_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"120,80\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/120,80_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"848,566\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/848,566_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"1475,800\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/1475,800_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\",\"400,200\":\"\\/storage\\/upload\\/2019\\/7\\/29\\/400,200_1564378974_Screenshot 2019-07-29 at 10.12.18 AM.png\"}', 'دوره رایگان آموش CSS و HTML مقدماتی', 'استاد حسن خسروجردی', '/courses/آموزش-HTML-و-CSS-از-مقدماتی', 'info', '2019-07-11 12:36:16', '2019-07-11 15:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `caption` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `socialMedia` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `notified` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `user_id`, `caption`, `socialMedia`, `image`, `notified`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 'مشتریان زبان گویایی دارند، اگر بی‌واسطه با آن‌ها در ارتباط بوده و گوشی شنوا داشته باشیم می‌توان از ایشان چیزهای زیادی یاد گرفت.\r\n\r\nاکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب\r\n\r\n#جملات_روزانه', 'instagram', '/storage/upload/2019/2/23/1550949217_7.jpg', '1', '2019-02-23 19:13:37', '2019-02-24 14:43:16', NULL),
(4, 1, 'مشتریان زبان گویایی دارند، اگر بی‌واسطه با آن‌ها در ارتباط بوده و گوشی شنوا داشته باشیم می‌توان از ایشان چیزهای زیادی یاد گرفت.\r\n\r\nاکوسیستم مدیر پروژه\r\n\r\n', 'telegram', '/storage/upload/2019/2/23/1550949217_7.jpg', '1', '2019-02-23 19:13:37', '2019-02-24 14:43:19', NULL),
(5, 1, 'موقعیت های شغلی \r\n\r\nاکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551025320_4.jpg', '1', '2019-02-24 16:22:00', '2019-02-24 16:38:09', NULL),
(6, 1, 'فرصتهای شغلی\r\n\r\nاکوسیستم مدیرپروژه', 'telegram', '/storage/upload/2019/2/24/1551025320_4.jpg', '1', '2019-02-24 16:22:00', '2019-02-24 16:34:02', NULL),
(7, 1, 'فرصتهای شغلی\r\n\r\nاکوسیستم مدیرپروژه', 'telegram', '/storage/upload/2019/2/24/1551025767_5.jpg', '1', '2019-02-24 16:29:27', '2019-02-25 08:31:08', NULL),
(8, 1, 'فرصتهای شغلی\r\n\r\nاکوسیستم مدیرپروژه', 'telegram', '/storage/upload/2019/2/24/1551025788_6.jpg', '1', '2019-02-24 16:29:48', '2019-02-26 08:31:12', NULL),
(9, 1, 'فرصتهای شغلی\r\n\r\nاکوسیستم مدیرپروژه', 'telegram', '/storage/upload/2019/2/24/1551025814_7.jpg', '1', '2019-02-24 16:30:14', '2019-02-27 08:31:04', NULL),
(10, 1, 'فرصتهای شغلی\r\n\r\nاکوسیستم مدیرپروژه', 'telegram', '/storage/upload/2019/2/24/1551025828_8.jpg', '1', '2019-02-24 16:30:28', '2019-02-28 08:31:04', NULL),
(11, 1, 'فرصتهای شغلی\r\n\r\nاکوسیستم مدیرپروژه', 'telegram', '/storage/upload/2019/2/24/1551025849_9.jpg', '1', '2019-02-24 16:30:49', '2019-03-01 08:31:04', NULL),
(12, 1, 'فرصتهای شغلی\r\n\r\nاکوسیستم مدیرپروژه', 'telegram', '/storage/upload/2019/2/24/1551025863_10.jpg', '1', '2019-02-24 16:31:03', '2019-03-02 08:31:05', NULL),
(13, 1, 'موقعیت های شغلی \r\n\r\nاکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب\r\n\r\n#جملات_روزانه', 'instagram', '/storage/upload/2019/2/24/1551025903_5.jpg', '1', '2019-02-24 16:31:43', '2019-02-25 08:31:23', NULL),
(14, 1, 'موقعیت های شغلی \r\n\r\nاکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551025924_6.jpg', '1', '2019-02-24 16:32:04', '2019-02-26 08:31:27', NULL),
(15, 1, 'موقعیت های شغلی \r\n\r\nاکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551025939_7.jpg', '1', '2019-02-24 16:32:19', '2019-02-27 08:31:22', NULL),
(16, 1, 'موقعیت های شغلی \r\n\r\nاکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551025952_8.jpg', '1', '2019-02-24 16:32:32', '2019-02-28 08:31:18', NULL),
(17, 1, 'موقعیت های شغلی \r\n\r\nاکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551025965_9.jpg', '1', '2019-02-24 16:32:45', '2019-03-01 08:31:18', NULL),
(18, 1, 'موقعیت های شغلی \r\n\r\nاکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551025983_10.jpg', '1', '2019-02-24 16:33:03', '2019-03-02 08:31:18', NULL),
(20, 1, 'اکو سیستم مدیر پروژه', 'telegram', '/storage/upload/2019/2/24/1551026705_8.jpg', '1', '2019-02-24 16:45:05', '2019-02-24 17:31:04', NULL),
(21, 1, 'اکو سیستم مدیر پروژه', 'telegram', '/storage/upload/2019/2/24/1551026728_9.jpg', '1', '2019-02-24 16:45:28', '2019-02-25 17:31:09', NULL),
(22, 1, 'اکو سیستم مدیر پروژه', 'telegram', '/storage/upload/2019/2/24/1551026744_10.jpg', '1', '2019-02-24 16:45:44', '2019-02-26 17:31:04', NULL),
(23, 1, 'اکو سیستم مدیر پروژه', 'telegram', '/storage/upload/2019/2/24/1551026770_11.jpg', '1', '2019-02-24 16:46:10', '2019-02-27 17:31:06', NULL),
(24, 1, 'اکو سیستم مدیر پروژه', 'telegram', '/storage/upload/2019/2/24/1551026785_12.jpg', '1', '2019-02-24 16:46:25', '2019-02-28 17:31:05', NULL),
(25, 1, 'اکو سیستم مدیر پروژه', 'telegram', '/storage/upload/2019/2/24/1551026802_13.jpg', '1', '2019-02-24 16:46:42', '2019-03-01 17:31:04', NULL),
(26, 1, 'اکو سیستم مدیر پروژه', 'telegram', '/storage/upload/2019/2/24/1551026818_14.jpg', '1', '2019-02-24 16:46:58', '2019-03-02 17:31:04', NULL),
(27, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551026938_8.jpg', '1', '2019-02-24 16:48:58', '2019-02-24 17:31:21', NULL),
(28, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551026958_9.jpg', '1', '2019-02-24 16:49:18', '2019-02-25 17:31:26', NULL),
(29, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551026976_10.jpg', '1', '2019-02-24 16:49:36', '2019-02-26 17:31:21', NULL),
(30, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551026996_11.jpg', '1', '2019-02-24 16:49:56', '2019-02-27 17:31:22', NULL),
(31, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551027010_12.jpg', '1', '2019-02-24 16:50:10', '2019-02-28 17:31:26', NULL),
(32, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551027036_13.jpg', '1', '2019-02-24 16:50:36', '2019-03-01 17:31:18', NULL),
(33, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/2/24/1551027051_14.jpg', '1', '2019-02-24 16:50:51', '2019-03-02 17:31:20', NULL),
(34, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551852679_15.jpg', '1', '2019-03-06 06:11:19', '2019-03-06 06:12:17', NULL),
(36, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854581_11.jpg', '1', '2019-03-06 06:43:01', '2019-03-06 06:43:12', NULL),
(37, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854581_11.jpg', '1', '2019-03-06 06:43:01', '2019-03-06 06:43:14', NULL),
(38, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854682_11.jpg', '1', '2019-03-06 06:44:42', '2019-03-06 08:41:14', NULL),
(39, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854682_11.jpg', '1', '2019-03-06 06:44:42', '2019-03-06 08:41:16', NULL),
(40, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854701_12.jpg', '1', '2019-03-06 06:45:01', '2019-03-07 08:31:15', NULL),
(41, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854701_12.jpg', '1', '2019-03-06 06:45:01', '2019-03-07 08:31:18', NULL),
(42, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854716_13.jpg', '1', '2019-03-06 06:45:16', '2019-03-08 08:31:17', NULL),
(43, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854716_13.jpg', '1', '2019-03-06 06:45:16', '2019-03-08 08:31:20', NULL),
(44, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854730_14.jpg', '1', '2019-03-06 06:45:30', '2019-03-09 08:31:17', NULL),
(45, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854730_14.jpg', '1', '2019-03-06 06:45:30', '2019-03-09 08:31:20', NULL),
(46, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854741_15.jpg', '1', '2019-03-06 06:45:41', '2019-03-10 08:31:16', NULL),
(47, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854741_15.jpg', '1', '2019-03-06 06:45:41', '2019-03-10 08:31:19', NULL),
(48, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854803_15.jpg', '1', '2019-03-06 06:46:43', '2019-03-06 17:30:15', NULL),
(49, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854803_15.jpg', '1', '2019-03-06 06:46:43', '2019-03-06 17:30:22', NULL),
(50, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854819_16.jpg', '1', '2019-03-06 06:46:59', '2019-03-07 17:30:15', NULL),
(51, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854819_16.jpg', '1', '2019-03-06 06:46:59', '2019-03-07 17:30:17', NULL),
(52, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854836_17.jpg', '1', '2019-03-06 06:47:16', '2019-03-08 17:30:18', NULL),
(53, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854836_17.jpg', '1', '2019-03-06 06:47:16', '2019-03-08 17:30:26', NULL),
(54, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854853_18.jpg', '1', '2019-03-06 06:47:33', '2019-03-09 17:30:16', NULL),
(55, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854853_18.jpg', '1', '2019-03-06 06:47:33', '2019-03-09 17:30:19', NULL),
(56, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854872_19.jpg', '1', '2019-03-06 06:47:52', '2019-03-10 17:30:18', NULL),
(57, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854872_19.jpg', '1', '2019-03-06 06:47:52', '2019-03-10 17:30:35', NULL),
(58, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854886_20.jpg', '1', '2019-03-06 06:48:06', '2019-03-11 17:30:21', NULL),
(59, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854886_20.jpg', '1', '2019-03-06 06:48:06', '2019-03-11 17:30:25', NULL),
(60, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854903_21.jpg', '1', '2019-03-06 06:48:23', '2019-03-12 17:31:14', NULL),
(61, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854903_21.jpg', '1', '2019-03-06 06:48:23', '2019-03-12 17:34:14', NULL),
(62, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551854920_22.jpg', '1', '2019-03-06 06:48:40', '2019-03-13 17:30:29', NULL),
(63, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551854920_22.jpg', '1', '2019-03-06 06:48:40', '2019-03-13 17:30:32', NULL),
(68, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551855062_23.jpg', '1', '2019-03-06 06:51:02', '2019-03-14 17:30:19', NULL),
(69, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551855062_23.jpg', '1', '2019-03-06 06:51:02', '2019-03-14 17:30:22', NULL),
(70, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/6/1551855078_24.jpg', '1', '2019-03-06 06:51:18', '2019-03-15 17:30:18', NULL),
(71, 1, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/6/1551855078_24.jpg', '1', '2019-03-06 06:51:18', '2019-03-15 17:30:22', NULL),
(72, 2, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/16/1552747398_Job01.jpg', '1', '2019-03-16 14:43:18', '2019-03-16 14:56:16', NULL),
(73, 2, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/16/1552747398_Job01.jpg', '1', '2019-03-16 14:43:18', '2019-03-16 14:56:20', NULL),
(74, 2, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/17/1552806523_Job2.jpg', '1', '2019-03-17 07:08:43', '2019-03-17 12:18:20', NULL),
(75, 2, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/17/1552806523_Job2.jpg', '1', '2019-03-17 07:08:43', '2019-03-17 12:18:24', NULL),
(76, 2, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/17/1552806565_Job3 .jpg', '1', '2019-03-17 07:09:25', '2019-03-18 09:11:16', NULL),
(77, 2, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/17/1552806565_Job3 .jpg', '1', '2019-03-17 07:09:25', '2019-04-11 13:09:18', NULL),
(78, 2, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/17/1552806603_Job3.jpg', '0', '2019-03-17 07:10:03', '2019-03-17 07:10:03', NULL),
(79, 2, 'اکوسیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/17/1552806603_Job3.jpg', '0', '2019-03-17 07:10:03', '2019-03-17 07:10:03', NULL),
(80, 2, 'اکو سیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/17/1552811682_31.jpg', '1', '2019-03-17 08:34:42', '2019-03-17 17:31:16', NULL),
(81, 2, 'اکو سیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/17/1552811682_31.jpg', '1', '2019-03-17 08:34:42', '2019-03-17 17:31:21', NULL),
(82, 2, 'اکو سیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/17/1552811701_32.jpg', '0', '2019-03-17 08:35:01', '2019-03-17 08:35:01', NULL),
(83, 2, 'اکو سیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/17/1552811701_32.jpg', '0', '2019-03-17 08:35:01', '2019-03-17 08:35:01', NULL),
(84, 2, 'اکو سیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/3/17/1552811718_33.jpg', '0', '2019-03-17 08:35:18', '2019-03-17 08:35:18', NULL),
(85, 2, 'اکو سیستم مدیر پروژه\r\n\r\n#مدیر_پروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارت_آپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/3/17/1552811718_33.jpg', '0', '2019-03-17 08:35:18', '2019-03-17 08:35:18', NULL),
(92, 2, 'اکوسیستم مدیر پروژه \r\n#مدیرپروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارتآپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/4/6/1554546023_Job1.jpg', '0', '2019-04-06 10:20:23', '2019-04-06 10:20:23', NULL),
(93, 2, 'اکوسیستم مدیر پروژه \r\n#مدیرپروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارتآپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/4/6/1554546023_Job1.jpg', '0', '2019-04-06 10:20:23', '2019-04-06 10:20:23', NULL),
(94, 2, 'اکوسیستم مدیر پروژه \r\n#مدیرپروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارتآپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/4/6/1554546130_Job2.jpg', '0', '2019-04-06 10:22:10', '2019-04-06 10:22:10', NULL),
(95, 2, 'اکوسیستم مدیر پروژه \r\n#مدیرپروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارتآپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/4/6/1554546130_Job2.jpg', '0', '2019-04-06 10:22:10', '2019-04-06 10:22:10', NULL),
(96, 2, 'اکوسیستم مدیر پروژه \r\n#مدیرپروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارتآپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/4/6/1554546165_Job3 .jpg', '0', '2019-04-06 10:22:45', '2019-04-06 10:22:45', NULL),
(97, 2, 'اکوسیستم مدیر پروژه \r\n#مدیرپروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسی_صنایع #بازاریابی #برندینگ #پیشرفت #برنامه_ریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارتآپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/4/6/1554546165_Job3 .jpg', '0', '2019-04-06 10:22:45', '2019-04-06 10:22:45', NULL),
(98, 2, 'اکوسیستم مدیر پروژه \r\n#مدیرپروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسیصنایع #بازاریابی #برندینگ #پیشرفت #برنامهریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارتآپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'instagram', '/storage/upload/2019/6/12/1560337871_S12.jpg', '0', '2019-06-12 11:11:11', '2019-06-12 11:11:11', NULL),
(99, 2, 'اکوسیستم مدیر پروژه \r\n#مدیرپروژه #مدیریت #پروژه #مارکتینگ #چابک #اجایل #اسکرام #مهندسی #صنایع#پتروشیمی #مهندسیصنایع #بازاریابی #برندینگ #پیشرفت #برنامهریزی #موفقیت #پیروزی #تفکر #انگیزشی #استارتآپ #استراتژی #بودجه #مشاوره #مالی #حسابداری #انگیزه #جذب', 'telegram', '/storage/upload/2019/6/12/1560337871_S12.jpg', '0', '2019-06-12 11:11:11', '2019-06-12 11:11:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `introduction` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `credentials` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `introduction`, `credentials`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'تست معرفی کلی', 'تست مهارت ها', 1, NULL, NULL),
(2, 'تست تست معرفی کلی', 'تس تس مهارت', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `family` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `lastLogin` timestamp NULL DEFAULT NULL,
  `lastAction` timestamp NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `family`, `fullName`, `phoneNumber`, `type`, `lastLogin`, `lastAction`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'علی', 'رحمانی', 'علی رحمانی', '09201010328', 'teacher', '2019-02-04 10:10:52', '2021-01-24 08:54:54', 'cyber.injector@yahoo.com', '/storage/upload/2019/7/12/1562932648_photo_2019-07-12_16-27-19.jpg', NULL, '$2y$10$TD0GbwxRG0/kXD4uZrLSYu3aEX7Wesc6hrxyy95vm9owY1AqLsfn2', '0wNpd4efSCKMLxn1Fpsl8W8FIkeFNP5x2nsO0ZSjSlmhwJS62lR4QuD6SGE9', '2019-02-11 12:23:11', '2021-01-24 08:54:54', NULL),
(5, 'حسن', 'خسروجردی', 'حسن خسروجردی', '', 'teacher', '2019-02-04 10:10:52', '2019-07-30 20:42:31', 'hassankhosrojerdi@yahoo.com', '/storage/upload/2019/7/30/1564496166_IMG_4177.jpg', NULL, '$2y$10$oAzroHegT0/2btSRRYsPmeTP/7SDw2jFZyrpvgVsHKPVA919f4onW', 't9UGOKmcxpDM2u9HxfuP2EsYWTIUe09Zw1EJbld80YmGR0dtkMscdqK7cFfR', '2019-02-11 12:23:11', '2019-07-30 20:42:31', NULL),
(6, 'علیرضا', '', 'علیرضا یاراحمدی', '21321312321', 'teacher', NULL, NULL, 'hali@gmail.com', '/img/avatar.png', NULL, '$2y$10$ro6qZ3jcOWQiHaVnu.4.ZOaO5ia4Mv5CrxOoAElkauxXmY/88/pXq', NULL, '2019-08-02 14:33:54', '2019-08-02 14:33:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_requests`
--
ALTER TABLE `course_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_transactions`
--
ALTER TABLE `gateway_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_transactions_logs`
--
ALTER TABLE `gateway_transactions_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gateway_transactions_logs_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phonenumber_unique` (`phoneNumber`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_requests`
--
ALTER TABLE `course_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gateway_transactions`
--
ALTER TABLE `gateway_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gateway_transactions_logs`
--
ALTER TABLE `gateway_transactions_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gateway_transactions_logs`
--
ALTER TABLE `gateway_transactions_logs`
  ADD CONSTRAINT `gateway_transactions_logs_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `gateway_transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
