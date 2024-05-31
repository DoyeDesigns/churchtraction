
CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `description`, `sort_order`) VALUES
(1, '2023-05-13 20:58:29', '2023-05-13 20:58:29', 'Cell', NULL, 0),
(2, '2023-05-13 20:58:48', '2023-05-13 20:58:48', 'Department', NULL, 1),
(3, '2023-05-13 20:59:12', '2023-05-13 20:59:12', 'Ministry', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category_department`
--

CREATE TABLE `category_department` (
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_department`
--

INSERT INTO `category_department` (`department_id`, `category_id`) VALUES
(11, 1),
(12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `churches`
--

CREATE TABLE `churches` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `churches`
--

INSERT INTO `churches` (`id`, `name`) VALUES
(1, 'CENDG'),
(2, 'CENTRE-VILLE'),
(3, 'SAINT-JACQUES'),
(4, 'CHAPEAU/PEMBROKE');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `from_user` bigint(20) NOT NULL,
  `report_id` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `from_user`, `report_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 'test', '2023-10-28 17:05:01', '2023-10-28 17:05:01'),
(2, 2, 7, 'tat', '2023-10-28 17:05:12', '2023-10-28 17:05:12'),
(3, 2, 7, 'sdcwecw', '2023-10-28 17:07:09', '2023-10-28 17:07:09'),
(4, 2, 7, 'from admin', '2023-10-28 18:25:07', '2023-10-28 18:25:07'),
(5, 3, 7, 'testing from test user', '2023-10-28 18:25:45', '2023-10-28 18:25:45'),
(6, 2, 7, 'from admin', '2023-10-28 18:27:08', '2023-10-28 18:27:08'),
(7, 3, 8, 'comment from user test', '2023-10-28 18:33:21', '2023-10-28 18:33:21'),
(8, 2, 8, 'response from user admin', '2023-10-28 18:34:09', '2023-10-28 18:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `church_id` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enroll_open` tinyint(1) NOT NULL DEFAULT 1,
  `approval_required` tinyint(1) NOT NULL DEFAULT 1,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_members` tinyint(1) NOT NULL DEFAULT 1,
  `allow_members_communicate` tinyint(1) NOT NULL DEFAULT 1,
  `enable_forum` tinyint(1) NOT NULL DEFAULT 1,
  `allow_members_create_topics` tinyint(1) NOT NULL DEFAULT 1,
  `enable_roster` tinyint(1) NOT NULL DEFAULT 1,
  `enable_announcements` tinyint(1) NOT NULL DEFAULT 1,
  `enable_resources` tinyint(1) NOT NULL DEFAULT 1,
  `allow_members_upload` tinyint(1) NOT NULL DEFAULT 1,
  `enable_blog` tinyint(1) NOT NULL DEFAULT 1,
  `allow_members_post` tinyint(1) NOT NULL DEFAULT 1,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `enable_sms` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `created_at`, `updated_at`, `name`, `church_id`, `description`, `enroll_open`, `approval_required`, `picture`, `show_members`, `allow_members_communicate`, `enable_forum`, `allow_members_create_topics`, `enable_roster`, `enable_announcements`, `enable_resources`, `allow_members_upload`, `enable_blog`, `allow_members_post`, `visible`, `enabled`, `enable_sms`) VALUES
(11, '2023-10-25 04:37:41', '2023-10-25 04:37:41', 'Cell 1', 1, NULL, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL),
(12, '2023-10-25 04:38:18', '2023-10-25 04:38:18', 'Dept 1', 1, '<p>ssd</p>', 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department_email`
--

CREATE TABLE `department_email` (
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `email_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_fields`
--

CREATE TABLE `department_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeholder` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `department_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_field_user`
--

CREATE TABLE `department_field_user` (
  `department_field_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_sms`
--

CREATE TABLE `department_sms` (
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `sms_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_user`
--

CREATE TABLE `department_user` (
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_user`
--

INSERT INTO `department_user` (`department_id`, `user_id`, `department_admin`) VALUES
(11, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `download_files`
--

CREATE TABLE `download_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `download_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_attachments`
--

CREATE TABLE `email_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_user`
--

CREATE TABLE `email_user` (
  `email_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` timestamp NULL DEFAULT NULL,
  `notifications` tinyint(1) NOT NULL DEFAULT 1,
  `repetitive` int(11) NOT NULL DEFAULT 0,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_from` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_to` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `created_at`, `updated_at`, `department_id`, `name`, `venue`, `description`, `event_date`, `notifications`, `repetitive`, `days`, `date_from`, `date_to`) VALUES
(13, '2023-10-25 23:17:16', '2023-10-25 23:17:16', 11, 'Test', 'neg', 'qwerty', '2023-10-29 00:00:00', 1, 0, NULL, '2023-10-25 23:17:16', '2023-10-25 23:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` tinyint(1) DEFAULT NULL,
  `placeholder` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `public` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_user`
--

CREATE TABLE `field_user` (
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_attachments`
--

CREATE TABLE `forum_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `forum_thread_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_threads`
--

CREATE TABLE `forum_threads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `forum_topic_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE `forum_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_types`
--

CREATE TABLE `meeting_types` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meeting_types`
--

INSERT INTO `meeting_types` (`id`, `name`) VALUES
(1, 'Prayer & Planning'),
(2, 'Bible Study 1'),
(3, 'Bible Study 2'),
(4, 'Outreach');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rejections`
--

CREATE TABLE `rejections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_start_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_end_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `church_id` bigint(20) NOT NULL,
  `cell_id` bigint(20) NOT NULL,
  `cell_leader_id` bigint(20) NOT NULL,
  `cell_secretary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_type_id` bigint(20) NOT NULL,
  `reporter` bigint(20) NOT NULL,
  `meeting_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_meeting_attendance` int(11) NOT NULL,
  `total_mid_week_service_attendance` int(11) NOT NULL,
  `total_sunday_week_service_attendance` int(11) NOT NULL,
  `total_first_timer` int(11) NOT NULL,
  `total_new_converts` int(11) NOT NULL,
  `total_cell_offerings` int(11) NOT NULL,
  `have_cell_offering_remitted` int(11) NOT NULL DEFAULT 0,
  `if_yes_to_whom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_leader_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `did_you_have_soul_winning` int(11) NOT NULL DEFAULT 0,
  `if_yes_soul_winning_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_souls` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_report` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `who_did_the_follow_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `created_at`, `updated_at`, `event_id`, `department_id`, `details`, `meeting_start_time`, `meeting_end_time`, `files`, `user_id`, `church_id`, `cell_id`, `cell_leader_id`, `cell_secretary`, `meeting_type_id`, `reporter`, `meeting_location`, `total_meeting_attendance`, `total_mid_week_service_attendance`, `total_sunday_week_service_attendance`, `total_first_timer`, `total_new_converts`, `total_cell_offerings`, `have_cell_offering_remitted`, `if_yes_to_whom`, `cell_leader_comment`, `did_you_have_soul_winning`, `if_yes_soul_winning_comment`, `name_of_the_souls`, `summary_report`, `who_did_the_follow_up`, `meeting_date`) VALUES
(6, '', '2023-10-27 23:04:46', '2023-10-27 23:04:46', NULL, 12, NULL, '23:04', '23:04', NULL, NULL, 1, 11, 1, NULL, 1, 2, 'neg', 0, 0, 0, 0, 0, 0, 0, 'wee', NULL, 1, NULL, NULL, NULL, NULL, '2023-10-27'),
(7, '', '2023-10-28 02:03:30', '2023-10-28 02:03:30', NULL, 11, NULL, '02:00', '02:00', NULL, NULL, 1, 11, 3, 'test', 1, 2, 'neg', 0, 0, 0, 0, 0, 0, 1, 'v4v4', 'wvrwrvw', 1, 'ervewvwr', 'evtb5', 'vdfew32', 'qq2', '2023-10-28'),
(8, '', '2023-10-28 18:32:35', '2023-10-28 18:32:35', NULL, 11, NULL, '18:32', '18:32', NULL, NULL, 1, 11, 3, NULL, 1, 3, 'dfdb', 0, 0, 0, 0, 0, 0, 1, 'dvdv', NULL, 1, NULL, NULL, NULL, NULL, '2023-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role`, `description`) VALUES
(1, '2019-08-17 08:28:36', '2019-08-17 08:28:36', 'Admin', 'Admin has access to all the system for troubleshooting purpose'),
(2, '2019-08-17 08:28:36', '2019-08-17 08:28:36', 'Member', 'A member has access to it personnal data only'),
(3, '2023-05-15 21:30:53', '2023-05-15 21:41:58', 'Sr Pastor', 'Senior Pastor, has the higher right access on the system'),
(4, '2023-05-15 21:35:41', '2023-05-15 21:43:00', 'Ass. Pastor', 'Assistant pastor'),
(5, '2023-05-15 21:44:50', '2023-05-15 21:44:50', 'Deacon/Deaconnesse', 'Deacon or Deaconesse'),
(6, '2023-05-15 21:45:38', '2023-05-15 21:45:38', 'Cell leader', 'Cell leader is supposed to have access to its cell information only'),
(7, '2023-05-15 21:48:05', '2023-05-15 21:49:36', 'Group/Department Leader', 'Group or Department leader (Media tema leader, choir leader, bible class teacher ...) has access to its group on only');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeholder` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serialized` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `key`, `placeholder`, `value`, `serialized`, `type`, `options`, `class`, `sort_order`) VALUES
(1, '2019-08-17 08:25:31', '2019-08-17 08:25:31', 'sms_enabled', NULL, '1', 0, 'radio', '1=Yes,0=No', NULL, NULL),
(2, '2019-08-17 08:25:34', '2019-08-17 08:25:34', 'sms_max_pages', NULL, '1', 0, 'text', NULL, NULL, NULL),
(3, '2019-08-17 08:25:35', '2019-08-17 08:25:35', 'general_member_count', NULL, '1', 0, 'radio', '1=Yes,0=No', NULL, 1),
(4, '2019-08-17 08:25:41', '2019-08-17 08:25:41', 'config_language', NULL, 'en', 0, 'text', NULL, NULL, 0),
(5, NULL, NULL, 'general_site_name', NULL, 'churchtraction', 0, 'text', '', NULL, NULL),
(6, NULL, NULL, 'general_homepage_title', NULL, 'churchtraction', 0, 'text', '', NULL, NULL),
(7, NULL, '2023-10-22 00:10:04', 'general_homepage_meta_desc', NULL, '', 0, 'textarea', '', NULL, NULL),
(8, NULL, '2023-10-22 00:10:04', 'general_admin_email', NULL, 'churchtraction@gmail.com', 0, 'text', '', NULL, NULL),
(9, NULL, '2023-10-22 00:10:04', 'general_address', NULL, '', 0, 'textarea', '', NULL, NULL),
(10, NULL, '2023-10-22 00:10:04', 'general_tel', NULL, '', 0, 'text', '', NULL, NULL),
(11, NULL, '2023-10-22 00:10:04', 'general_contact_email', NULL, '', 0, 'text', '', NULL, NULL),
(12, NULL, '2023-10-22 00:10:04', 'general_enable_registration', NULL, '0', 0, 'radio', '1=Yes,0=No', NULL, NULL),
(13, NULL, '2023-10-22 00:10:04', 'general_header_scripts', NULL, '', 0, 'textarea', '', NULL, NULL),
(14, NULL, '2023-10-22 00:10:04', 'general_footer_scripts', NULL, '', 0, 'textarea', '', NULL, NULL),
(15, NULL, NULL, 'image_logo', NULL, NULL, 0, 'image', '', NULL, NULL),
(16, NULL, NULL, 'image_icon', NULL, NULL, 0, 'image', '', NULL, NULL),
(17, NULL, NULL, 'mail_protocol', NULL, NULL, 0, 'select', 'mail=Mail,smtp=SMTP', NULL, NULL),
(18, NULL, NULL, 'mail_smtp_host', NULL, NULL, 0, 'text', '', NULL, NULL),
(19, NULL, NULL, 'mail_smtp_username', NULL, NULL, 0, 'text', '', NULL, NULL),
(20, NULL, NULL, 'mail_smtp_password', NULL, NULL, 0, 'text', '', NULL, NULL),
(21, NULL, NULL, 'mail_smtp_port', NULL, NULL, 0, 'text', '', NULL, NULL),
(22, NULL, NULL, 'mail_smtp_timeout', NULL, NULL, 0, 'text', '', NULL, NULL),
(23, '2019-08-19 14:33:38', '2023-10-22 00:10:04', 'general_homepage_intro', NULL, '', 0, 'textarea', NULL, 'form-control summernote6', 2),
(24, NULL, NULL, 'social_callback_urls', NULL, '0', 0, 'include', 'admin.settings.includes.social-callbacks', NULL, NULL),
(25, NULL, NULL, 'social_enable_facebook', NULL, NULL, 0, 'radio', '0=No,1=Yes', NULL, NULL),
(26, NULL, NULL, 'social_facebook_app_secret', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(27, NULL, NULL, 'social_facebook_app_id', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(28, NULL, NULL, 'social_enable_google', NULL, NULL, 0, 'radio', '0=No,1=Yes', NULL, NULL),
(29, NULL, NULL, 'social_google_app_secret', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(30, NULL, NULL, 'social_google_app_id', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(31, NULL, '2023-10-22 00:10:04', 'general_privacy_policy', NULL, '', 0, 'textarea', NULL, 'form-control summernote6', 11);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starts` time DEFAULT NULL,
  `ends` time DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_user`
--

CREATE TABLE `shift_user` (
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tasks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_gateways`
--

CREATE TABLE `sms_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gateway_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sms_gateway_id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeholder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
  `sms_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `created_at`, `updated_at`, `name`, `department_id`) VALUES
(1, '2023-10-27 04:09:52', '2023-10-27 04:09:52', 'tes', 11);

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_user`
--

INSERT INTO `team_user` (`team_id`, `user_id`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_expires` timestamp NULL DEFAULT NULL,
  `assigned` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `telephone`, `gender`, `picture`, `about`, `status`, `api_token`, `token_expires`, `assigned`) VALUES
(1, 'admin', 'cendg@gmail.com', NULL, '$2y$10$N0C182mmCE7TFpC6gi11MOZTePkYigV6MNgXM5pDagPYPONw.Qf8m', NULL, '2019-08-17 08:28:47', '2023-05-26 06:05:48', 1, '5146590891', 'm', NULL, NULL, 1, NULL, NULL, 1),
(2, 'pastor', 'pastor@gmail.com', NULL, '$2y$10$eQxNjSrarLH4AUQq/.hycO3GD.QSF6yz4IB7ZgXFIjR6iiHQ.J6PC', NULL, '2023-05-15 22:04:42', '2023-05-16 03:24:03', 3, '5146590891', 'm', NULL, NULL, 1, NULL, NULL, 1),
(3, 'test', 'test@example.com', NULL, '$2y$10$cb4Kr6BQUJgKnt0a9bhqqupT/IFxFpAxOrcBHMZuyEf7s6C8uHoHa', NULL, '2023-05-15 22:33:06', '2023-05-26 13:51:25', 6, NULL, 'm', NULL, NULL, 1, NULL, NULL, 1);

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
-- Indexes for table `churches`
--
ALTER TABLE `churches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `meeting_types`
--
ALTER TABLE `meeting_types`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `churches`
--
ALTER TABLE `churches`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `department_fields`
--
ALTER TABLE `department_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `download_files`
--
ALTER TABLE `download_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_attachments`
--
ALTER TABLE `email_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_attachments`
--
ALTER TABLE `forum_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_threads`
--
ALTER TABLE `forum_threads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_types`
--
ALTER TABLE `meeting_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejections`
--
ALTER TABLE `rejections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_gateways`
--
ALTER TABLE `sms_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sms_gateway_fields`
--
ALTER TABLE `sms_gateway_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

