-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2022 at 03:48 PM
-- Server version: 8.0.30-0ubuntu0.22.04.1
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gforcetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sort_order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_department`
--

CREATE TABLE `category_department` (
  `department_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `enroll_open` tinyint(1) NOT NULL DEFAULT '0',
  `approval_required` tinyint(1) NOT NULL DEFAULT '1',
  `picture` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_members` tinyint(1) NOT NULL DEFAULT '1',
  `allow_members_communicate` tinyint(1) NOT NULL DEFAULT '1',
  `enable_forum` tinyint(1) NOT NULL DEFAULT '1',
  `allow_members_create_topics` tinyint(1) NOT NULL DEFAULT '1',
  `enable_roster` tinyint(1) NOT NULL DEFAULT '1',
  `enable_announcements` tinyint(1) NOT NULL DEFAULT '1',
  `enable_resources` tinyint(1) NOT NULL DEFAULT '1',
  `allow_members_upload` tinyint(1) NOT NULL DEFAULT '1',
  `enable_blog` tinyint(1) NOT NULL DEFAULT '1',
  `allow_members_post` tinyint(1) NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `enable_sms` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_email`
--

CREATE TABLE `department_email` (
  `department_id` bigint UNSIGNED NOT NULL,
  `email_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_fields`
--

CREATE TABLE `department_fields` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int DEFAULT NULL,
  `options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `required` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `placeholder` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `department_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_field_user`
--

CREATE TABLE `department_field_user` (
  `department_field_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_sms`
--

CREATE TABLE `department_sms` (
  `department_id` bigint UNSIGNED NOT NULL,
  `sms_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_user`
--

CREATE TABLE `department_user` (
  `department_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `department_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `download_files`
--

CREATE TABLE `download_files` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `download_id` bigint UNSIGNED NOT NULL,
  `file_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_attachments`
--

CREATE TABLE `email_attachments` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_id` bigint UNSIGNED NOT NULL,
  `file_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_user`
--

CREATE TABLE `email_user` (
  `email_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `event_date` timestamp NULL DEFAULT NULL,
  `notifications` tinyint(1) NOT NULL DEFAULT '1',
  `accept_volunteers` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int DEFAULT NULL,
  `options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `required` tinyint(1) DEFAULT NULL,
  `placeholder` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `public` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_user`
--

CREATE TABLE `field_user` (
  `field_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_attachments`
--

CREATE TABLE `forum_attachments` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `forum_thread_id` bigint UNSIGNED NOT NULL,
  `file_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_threads`
--

CREATE TABLE `forum_threads` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `forum_topic_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE `forum_topics` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `topic` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_09_153116_create_roles_table', 1),
(4, '2019_07_09_153414_add_role_to_user', 1),
(5, '2019_07_09_154115_create_fields_table', 1),
(6, '2019_07_09_154214_add_field_user', 1),
(7, '2019_07_09_154243_create_departments_table', 1),
(8, '2019_07_09_154303_create_teams_table', 1),
(9, '2019_07_09_154326_add_department_user', 1),
(10, '2019_07_09_154334_add_team_user', 1),
(11, '2019_07_09_154359_create_applications_table', 1),
(12, '2019_07_09_154423_add_department_fields', 1),
(13, '2019_07_09_154508_add_department_field_user', 1),
(14, '2019_07_12_110510_create_settings_table', 1),
(15, '2019_07_12_111307_add_id_to_department_fields', 1),
(16, '2019_07_12_114618_add_value_to_dept_field_user', 1),
(17, '2019_07_12_114631_add_value_to_field_user', 1),
(18, '2019_07_12_170529_create_categories_table', 1),
(19, '2019_07_12_170619_add_category_department_table', 1),
(20, '2019_07_15_182429_add_photo_to_user', 1),
(21, '2019_07_17_200931_make_desc_nullable', 1),
(22, '2019_07_18_121500_add_about_to_user', 1),
(23, '2019_07_19_113651_add_required_field', 1),
(24, '2019_07_19_125314_add_fulltext_to_user', 1),
(25, '2019_07_22_095826_add_settings_sort_order', 1),
(26, '2019_07_22_103745_remove_settings_label', 1),
(27, '2019_07_22_142123_add_status_to_user', 1),
(28, '2019_07_22_171952_create_sms_gateways_table', 1),
(29, '2019_07_22_172001_create_sms_gateway_fields_table', 1),
(30, '2019_07_23_134429_add_sms_enabled_setting', 1),
(31, '2019_07_23_135434_add_sms_gateway', 1),
(32, '2019_07_23_140157_add_clickatell_fields', 1),
(33, '2019_07_24_163716_add_bulksms', 1),
(34, '2019_07_24_170632_add_smartsms', 1),
(35, '2019_07_24_170806_add_cheapglobal', 1),
(36, '2019_07_24_171341_add_sendername', 1),
(37, '2019_07_24_172145_add_sendername_cg', 1),
(38, '2019_07_24_193325_create_emails_table', 1),
(39, '2019_07_24_193342_create_email_attachments_table', 1),
(40, '2019_07_24_193409_create_email_recipients_table', 1),
(41, '2019_07_24_193429_create_sms_table', 1),
(42, '2019_07_24_193551_create_sms_recipients_table', 1),
(43, '2019_07_25_183701_create_jobs_table', 1),
(44, '2019_07_25_211504_add_department_email', 1),
(45, '2019_07_26_123543_rename_sent', 1),
(46, '2019_07_26_150157_add_ft_to_email', 1),
(47, '2019_07_29_133242_add_sms_max_pages', 1),
(48, '2019_07_29_135623_add_ft_to_sms', 1),
(49, '2019_07_29_144752_add_department_sms', 1),
(50, '2019_08_01_111511_add_member_count', 1),
(51, '2019_08_01_122114_add_more_dept_setting', 1),
(52, '2019_08_01_125032_add_ft_to_departments', 1),
(53, '2019_08_02_121159_add_message_to_application', 1),
(54, '2019_08_05_172216_create_events_table', 1),
(55, '2019_08_05_172247_create_shifts_table', 1),
(56, '2019_08_05_172306_add_shift_user_table', 1),
(57, '2019_08_05_172522_create_reports_table', 1),
(58, '2019_08_06_110930_add_shift_task', 1),
(59, '2019_08_06_111706_create_announcements_table', 1),
(60, '2019_08_06_111717_create_downloads_table', 1),
(61, '2019_08_06_111753_create_download_files_table', 1),
(62, '2019_08_06_111848_create_forum_topics_table', 1),
(63, '2019_08_06_111858_create_forum_threads_table', 1),
(64, '2019_08_06_111910_create_forum_attachments_table', 1),
(65, '2019_08_06_111925_create_galleries_table', 1),
(66, '2019_08_07_123251_fix_team_user', 1),
(67, '2019_08_09_101228_remove_pending_flag', 1),
(68, '2019_08_12_150400_add_announcement_ft_index', 1),
(69, '2019_08_13_103946_add_ft_to_events', 1),
(70, '2019_08_13_105048_add_date_to_event', 1),
(71, '2019_08_13_130926_change_time_fields', 1),
(72, '2019_08_14_083751_create_rejections_table', 1),
(73, '2019_08_14_142248_add_ft_to_gallery', 1),
(74, '2019_08_15_084055_add_ft_to_downloads', 1),
(75, '2019_08_16_121155_add_sms_option', 1),
(76, '2019_08_17_060426_add_language_setting', 1),
(77, '2019_08_17_120046_update_member_count', 2),
(78, '2019_08_19_120233_add_welcome_setting', 3),
(79, '2020_02_28_200336_add_social_settings', 4),
(80, '2020_02_28_213509_add_privacy_policy', 4),
(81, '2021_02_24_154905_add_api_token', 5),
(82, '2021_02_26_180142_add_public_to_fields', 5),
(83, '2022_05_05_184632_add_notify_volunteer_fields', 6),
(84, '2022_09_05_142308_update_database', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejections`
--

CREATE TABLE `rejections` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shift_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role`) VALUES
(1, '2019-08-17 08:28:36', '2019-08-17 08:28:36', 'Admin'),
(2, '2019-08-17 08:28:36', '2019-08-17 08:28:36', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeholder` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `serialized` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `class` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `key`, `placeholder`, `value`, `serialized`, `type`, `options`, `class`, `sort_order`) VALUES
(1, '2019-08-17 08:25:31', '2019-08-17 08:25:31', 'sms_enabled', NULL, '1', 0, 'radio', '1=Yes,0=No', NULL, NULL),
(2, '2019-08-17 08:25:34', '2019-08-17 08:25:34', 'sms_max_pages', NULL, '1', 0, 'text', NULL, NULL, NULL),
(3, '2019-08-17 08:25:35', '2019-08-17 08:25:35', 'general_member_count', NULL, '1', 0, 'radio', '1=Yes,0=No', NULL, 1),
(4, '2019-08-17 08:25:41', '2019-08-17 08:25:41', 'config_language', NULL, 'en', 0, 'text', NULL, NULL, 0),
(5, NULL, NULL, 'general_site_name', NULL, 'Trinity Church', 0, 'text', '', NULL, NULL),
(6, NULL, NULL, 'general_homepage_title', NULL, 'Trinity Church', 0, 'text', '', NULL, NULL),
(7, NULL, NULL, 'general_homepage_meta_desc', NULL, NULL, 0, 'textarea', '', NULL, NULL),
(8, NULL, NULL, 'general_admin_email', NULL, 'info@ccc.org', 0, 'text', '', NULL, NULL),
(9, NULL, NULL, 'general_address', NULL, NULL, 0, 'textarea', '', NULL, NULL),
(10, NULL, NULL, 'general_tel', NULL, NULL, 0, 'text', '', NULL, NULL),
(11, NULL, NULL, 'general_contact_email', NULL, NULL, 0, 'text', '', NULL, NULL),
(12, NULL, NULL, 'general_enable_registration', NULL, NULL, 0, 'radio', '1=Yes,0=No', NULL, NULL),
(13, NULL, NULL, 'general_header_scripts', NULL, NULL, 0, 'textarea', '', NULL, NULL),
(14, NULL, NULL, 'general_footer_scripts', NULL, NULL, 0, 'textarea', '', NULL, NULL),
(15, NULL, NULL, 'image_logo', NULL, NULL, 0, 'image', '', NULL, NULL),
(16, NULL, NULL, 'image_icon', NULL, NULL, 0, 'image', '', NULL, NULL),
(17, NULL, NULL, 'mail_protocol', NULL, NULL, 0, 'select', 'mail=Mail,smtp=SMTP', NULL, NULL),
(18, NULL, NULL, 'mail_smtp_host', NULL, NULL, 0, 'text', '', NULL, NULL),
(19, NULL, NULL, 'mail_smtp_username', NULL, NULL, 0, 'text', '', NULL, NULL),
(20, NULL, NULL, 'mail_smtp_password', NULL, NULL, 0, 'text', '', NULL, NULL),
(21, NULL, NULL, 'mail_smtp_port', NULL, NULL, 0, 'text', '', NULL, NULL),
(22, NULL, NULL, 'mail_smtp_timeout', NULL, NULL, 0, 'text', '', NULL, NULL),
(23, '2019-08-19 14:33:38', '2019-08-19 14:33:38', 'general_homepage_intro', NULL, NULL, 0, 'textarea', NULL, 'form-control summernote6', 2),
(24, NULL, NULL, 'social_callback_urls', NULL, '0', 0, 'include', 'admin.settings.includes.social-callbacks', NULL, NULL),
(25, NULL, NULL, 'social_enable_facebook', NULL, NULL, 0, 'radio', '0=No,1=Yes', NULL, NULL),
(26, NULL, NULL, 'social_facebook_app_secret', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(27, NULL, NULL, 'social_facebook_app_id', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(28, NULL, NULL, 'social_enable_google', NULL, NULL, 0, 'radio', '0=No,1=Yes', NULL, NULL),
(29, NULL, NULL, 'social_google_app_secret', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(30, NULL, NULL, 'social_google_app_id', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(31, NULL, NULL, 'general_privacy_policy', NULL, NULL, 0, 'textarea', NULL, 'form-control summernote6', 11);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `starts` time DEFAULT NULL,
  `ends` time DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_user`
--

CREATE TABLE `shift_user` (
  `shift_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tasks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_gateways`
--

CREATE TABLE `sms_gateways` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gateway_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_gateways`
--

INSERT INTO `sms_gateways` (`id`, `created_at`, `updated_at`, `gateway_name`, `url`, `code`, `active`) VALUES
(1, '2019-08-17 08:25:31', '2019-08-17 08:25:31', 'Clickatell', 'https://www.clickatell.com', 'clickatell', 0),
(2, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 'Bulk SMS', 'https://www.bulksms.com', 'bulksms', 0),
(3, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 'Smart SMS Solutions', 'http://smartsmssolutions.com', 'smartsms', 0),
(4, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 'Cheap Global SMS', 'https://cheapglobalsms.com', 'cheapglobal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sms_gateway_fields`
--

CREATE TABLE `sms_gateway_fields` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sms_gateway_id` bigint UNSIGNED NOT NULL,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `placeholder` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int DEFAULT NULL,
  `class` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_gateway_fields`
--

INSERT INTO `sms_gateway_fields` (`id`, `created_at`, `updated_at`, `sms_gateway_id`, `key`, `value`, `type`, `options`, `placeholder`, `sort_order`, `class`) VALUES
(1, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 1, 'api_key', NULL, 'text', NULL, NULL, NULL, NULL),
(2, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 2, 'username', NULL, 'text', NULL, NULL, NULL, NULL),
(3, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 2, 'password', NULL, 'text', NULL, NULL, NULL, NULL),
(4, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 3, 'username', NULL, 'text', NULL, NULL, NULL, NULL),
(5, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 3, 'password', NULL, 'text', NULL, NULL, NULL, NULL),
(6, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 4, 'sub_account', NULL, 'text', NULL, NULL, NULL, NULL),
(7, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 4, 'sub_account_pass', NULL, 'text', NULL, NULL, NULL, NULL),
(8, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 3, 'sender_name', NULL, 'text', NULL, NULL, NULL, NULL),
(9, '2019-08-17 08:25:32', '2019-08-17 08:25:32', 4, 'sender_name', NULL, 'text', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms_user`
--

CREATE TABLE `sms_user` (
  `sms_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `team_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `telephone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_expires` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `telephone`, `gender`, `picture`, `about`, `status`, `api_token`, `token_expires`) VALUES
(1, 'Ayokunle', 'ayokunle@traineasy.net', NULL, '$2y$10$N0C182mmCE7TFpC6gi11MOZTePkYigV6MNgXM5pDagPYPONw.Qf8m', NULL, '2019-08-17 08:28:47', '2019-08-17 08:28:47', 1, '', 'm', NULL, NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_department_id_foreign` (`department_id`),
  ADD KEY `announcements_user_id_foreign` (`user_id`);
ALTER TABLE `announcements` ADD FULLTEXT KEY `full` (`title`,`content`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_department_id_foreign` (`department_id`),
  ADD KEY `applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_department`
--
ALTER TABLE `category_department`
  ADD KEY `category_department_department_id_foreign` (`department_id`),
  ADD KEY `category_department_category_id_foreign` (`category_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `departments` ADD FULLTEXT KEY `full` (`name`,`description`);

--
-- Indexes for table `department_email`
--
ALTER TABLE `department_email`
  ADD KEY `department_email_department_id_foreign` (`department_id`),
  ADD KEY `department_email_email_id_foreign` (`email_id`);

--
-- Indexes for table `department_fields`
--
ALTER TABLE `department_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_fields_department_id_foreign` (`department_id`);

--
-- Indexes for table `department_field_user`
--
ALTER TABLE `department_field_user`
  ADD KEY `department_field_user_department_field_id_foreign` (`department_field_id`),
  ADD KEY `department_field_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `department_sms`
--
ALTER TABLE `department_sms`
  ADD KEY `department_sms_department_id_foreign` (`department_id`),
  ADD KEY `department_sms_sms_id_foreign` (`sms_id`);

--
-- Indexes for table `department_user`
--
ALTER TABLE `department_user`
  ADD KEY `department_user_department_id_foreign` (`department_id`),
  ADD KEY `department_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloads_department_id_foreign` (`department_id`),
  ADD KEY `downloads_user_id_foreign` (`user_id`);
ALTER TABLE `downloads` ADD FULLTEXT KEY `full` (`name`,`description`);

--
-- Indexes for table `download_files`
--
ALTER TABLE `download_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `download_files_download_id_foreign` (`download_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emails_user_id_foreign` (`user_id`);
ALTER TABLE `emails` ADD FULLTEXT KEY `full` (`subject`,`message`,`notes`);

--
-- Indexes for table `email_attachments`
--
ALTER TABLE `email_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_attachments_email_id_foreign` (`email_id`);

--
-- Indexes for table `email_user`
--
ALTER TABLE `email_user`
  ADD KEY `email_user_email_id_foreign` (`email_id`),
  ADD KEY `email_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_department_id_foreign` (`department_id`);
ALTER TABLE `events` ADD FULLTEXT KEY `full` (`name`,`venue`,`description`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field_user`
--
ALTER TABLE `field_user`
  ADD KEY `field_user_field_id_foreign` (`field_id`),
  ADD KEY `field_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `forum_attachments`
--
ALTER TABLE `forum_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_attachments_forum_thread_id_foreign` (`forum_thread_id`);

--
-- Indexes for table `forum_threads`
--
ALTER TABLE `forum_threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_threads_forum_topic_id_foreign` (`forum_topic_id`),
  ADD KEY `forum_threads_user_id_foreign` (`user_id`);

--
-- Indexes for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_topics_department_id_foreign` (`department_id`),
  ADD KEY `forum_topics_user_id_foreign` (`user_id`);
ALTER TABLE `forum_topics` ADD FULLTEXT KEY `full` (`topic`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_department_id_foreign` (`department_id`);
ALTER TABLE `galleries` ADD FULLTEXT KEY `full` (`name`,`description`);

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
-- Indexes for table `rejections`
--
ALTER TABLE `rejections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rejections_shift_id_foreign` (`shift_id`),
  ADD KEY `rejections_user_id_foreign` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_event_id_foreign` (`event_id`),
  ADD KEY `reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shifts_event_id_foreign` (`event_id`);

--
-- Indexes for table `shift_user`
--
ALTER TABLE `shift_user`
  ADD KEY `shift_user_shift_id_foreign` (`shift_id`),
  ADD KEY `shift_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sms_user_id_foreign` (`user_id`);
ALTER TABLE `sms` ADD FULLTEXT KEY `full` (`message`,`notes`);

--
-- Indexes for table `sms_gateways`
--
ALTER TABLE `sms_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_gateway_fields`
--
ALTER TABLE `sms_gateway_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sms_gateway_fields_sms_gateway_id_foreign` (`sms_gateway_id`);

--
-- Indexes for table `sms_user`
--
ALTER TABLE `sms_user`
  ADD KEY `sms_user_sms_id_foreign` (`sms_id`),
  ADD KEY `sms_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_department_id_foreign` (`department_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD KEY `team_user_user_id_foreign` (`user_id`),
  ADD KEY `team_user_team_id_foreign` (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);
ALTER TABLE `users` ADD FULLTEXT KEY `full` (`name`,`email`,`telephone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_fields`
--
ALTER TABLE `department_fields`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `download_files`
--
ALTER TABLE `download_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_attachments`
--
ALTER TABLE `email_attachments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_attachments`
--
ALTER TABLE `forum_attachments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_threads`
--
ALTER TABLE `forum_threads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `rejections`
--
ALTER TABLE `rejections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_gateways`
--
ALTER TABLE `sms_gateways`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sms_gateway_fields`
--
ALTER TABLE `sms_gateway_fields`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_department`
--
ALTER TABLE `category_department`
  ADD CONSTRAINT `category_department_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_department_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_email`
--
ALTER TABLE `department_email`
  ADD CONSTRAINT `department_email_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `department_email_email_id_foreign` FOREIGN KEY (`email_id`) REFERENCES `emails` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_fields`
--
ALTER TABLE `department_fields`
  ADD CONSTRAINT `department_fields_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_field_user`
--
ALTER TABLE `department_field_user`
  ADD CONSTRAINT `department_field_user_department_field_id_foreign` FOREIGN KEY (`department_field_id`) REFERENCES `department_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `department_field_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_sms`
--
ALTER TABLE `department_sms`
  ADD CONSTRAINT `department_sms_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `department_sms_sms_id_foreign` FOREIGN KEY (`sms_id`) REFERENCES `sms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_user`
--
ALTER TABLE `department_user`
  ADD CONSTRAINT `department_user_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `department_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `downloads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `download_files`
--
ALTER TABLE `download_files`
  ADD CONSTRAINT `download_files_download_id_foreign` FOREIGN KEY (`download_id`) REFERENCES `downloads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_attachments`
--
ALTER TABLE `email_attachments`
  ADD CONSTRAINT `email_attachments_email_id_foreign` FOREIGN KEY (`email_id`) REFERENCES `emails` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_user`
--
ALTER TABLE `email_user`
  ADD CONSTRAINT `email_user_email_id_foreign` FOREIGN KEY (`email_id`) REFERENCES `emails` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `email_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `field_user`
--
ALTER TABLE `field_user`
  ADD CONSTRAINT `field_user_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `field_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_attachments`
--
ALTER TABLE `forum_attachments`
  ADD CONSTRAINT `forum_attachments_forum_thread_id_foreign` FOREIGN KEY (`forum_thread_id`) REFERENCES `forum_threads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_threads`
--
ALTER TABLE `forum_threads`
  ADD CONSTRAINT `forum_threads_forum_topic_id_foreign` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_topics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forum_threads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD CONSTRAINT `forum_topics_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forum_topics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rejections`
--
ALTER TABLE `rejections`
  ADD CONSTRAINT `rejections_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rejections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shifts`
--
ALTER TABLE `shifts`
  ADD CONSTRAINT `shifts_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shift_user`
--
ALTER TABLE `shift_user`
  ADD CONSTRAINT `shift_user_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shift_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sms_gateway_fields`
--
ALTER TABLE `sms_gateway_fields`
  ADD CONSTRAINT `sms_gateway_fields_sms_gateway_id_foreign` FOREIGN KEY (`sms_gateway_id`) REFERENCES `sms_gateways` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sms_user`
--
ALTER TABLE `sms_user`
  ADD CONSTRAINT `sms_user_sms_id_foreign` FOREIGN KEY (`sms_id`) REFERENCES `sms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sms_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_user`
--
ALTER TABLE `team_user`
  ADD CONSTRAINT `team_user_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
