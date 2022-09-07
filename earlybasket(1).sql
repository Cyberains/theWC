-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 02:16 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earlybasket`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `priority` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `priority`, `created_at`, `updated_at`) VALUES
(30, '22617810031556015451657088859.jpeg', 1, 2, '2022-07-06 06:27:40', '2022-07-06 06:27:40'),
(31, '53584640137025439971657088890.jpeg', 1, 1, '2022-07-06 06:28:11', '2022-07-11 05:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `barcode_labels`
--

CREATE TABLE `barcode_labels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_brand` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `city_id`, `title`, `image`, `description`, `top_brand`, `created_at`, `updated_at`) VALUES
(1, 12, 'hair cutting', '1656737458.jpg', 'testing', 0, '2022-07-02 04:50:58', '2022-07-02 04:50:58'),
(5, 12, 'test', '1657016349.jpg', 'tesing', 0, '2022-07-05 10:19:10', '2022-07-05 10:19:10'),
(6, 11, 'perfume', '1657016376.jpg', 'mksdasd', 0, '2022-07-05 10:19:37', '2022-07-05 10:19:37'),
(7, 11, 'hjhjg', '1657091420.jpg', 'description', 0, '2022-07-06 07:10:21', '2022-07-06 07:10:21'),
(8, 12, 'shdg', '1657091898.jpg', 'ksdfksf', 0, '2022-07-06 07:18:19', '2022-07-06 07:18:19'),
(9, 12, 'ksdhkh', '1657092146.jpg', 'hsgjasd', 1, '2022-07-06 07:22:28', '2022-07-06 07:22:28'),
(10, 11, 'asd', '1657092334.jpg', 'asd', 0, '2022-07-06 07:25:35', '2022-07-06 07:25:35'),
(11, 13, 'ads', '1657092435.jpg', 'asd', 0, '2022-07-06 07:27:15', '2022-07-06 07:27:15'),
(12, 12, 'sdsdf', '1657092657.jpg', 'kajhkasd', 0, '2022-07-06 07:30:58', '2022-07-06 07:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `productattr_id` bigint(20) UNSIGNED DEFAULT NULL,
  `productexpiry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` double(8,2) DEFAULT NULL,
  `total_tax` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_category` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `brand_id`, `title`, `image`, `description`, `top_category`, `created_at`, `updated_at`) VALUES
(3, 1, 'leg massage', '1656740601.jpg', '<h2>Full of features</h2>\n\n<p><strong>Paste from Word, Excel and Google Docs</strong>. Excellent tables support with columns resizing, selecting rows and columns.</p>\n\n<p><strong>Media embeds</strong> (insert videos, tweets, Instagram posts and more), widgets, code snippets, math formulas.</p>\n\n<p><strong>Spreadsheets</strong> for creating data grids inside the editor.</p>', 0, '2022-07-02 05:43:21', '2022-07-02 05:43:21'),
(4, 2, 'new category', '1656743516.jpg', '<h2>Full of features</h2>\n\n<p><strong>Paste from Word, Excel and Google Docs</strong>. Excellent tables support with columns resizing, selecting rows and columns.</p>\n\n<p><strong>Media embeds</strong> (insert videos, tweets, Instagram posts and more), widgets, code snippets, math formulas.</p>\n\n<p><strong>Spreadsheets</strong> for creating data grids inside the editor.</p>', 0, '2022-07-02 06:31:56', '2022-07-02 06:31:56'),
(5, 2, 'hair message', '1656743516.jpg', '<h2>Full of features</h2>\r\n\r\n<p><strong>Paste from Word, Excel and Google Docs</strong>. Excellent tables support with columns resizing, selecting rows and columns.</p>\r\n\r\n<p><strong>Media embeds</strong> (insert videos, tweets, Instagram posts and more), widgets, code snippets, math formulas.</p>\r\n\r\n<p><strong>Spreadsheets</strong> for creating data grids inside the editor.</p>', 0, '2022-07-02 06:31:56', '2022-07-02 06:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp_price` double(12,2) DEFAULT NULL,
  `unit_price` double(12,2) DEFAULT NULL,
  `sgst_tax` double(12,2) DEFAULT NULL,
  `cgst_tax` double(12,2) DEFAULT NULL,
  `utgst_tax` double(12,2) DEFAULT NULL,
  `cess_tax` double(12,2) DEFAULT NULL,
  `apmc_tax` double(12,2) DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double(12,2) DEFAULT NULL,
  `unit_total_price` double(12,2) DEFAULT NULL,
  `unit_total_tax` double(12,2) DEFAULT NULL,
  `sub_total` double(12,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('about_us','privacy_policy','term_condition') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `heading`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'about_us', 'about_us', '<div class=\"col-lg-12 col-md-12 col-sm-12 col-12 course_des course_dess\">\r\n\r\n            \r\n        <p class=\"edu_sglblog_des mb_30\"></p><h1><span style=\"color:#0099d5\"><strong>Banking Exam Preparation Online with LiveLake</strong></span></h1>\r\n\r\n<p> </p>\r\n\r\n<p><span style=\"color:#000000\">All the banker\'s aspirants start preparing for government banking jobs for various posts with LiveLake. Banking job counts one of the most prestigious jobs in India.<br>\r\nThere are many bank posts and exams which are conducted by agencies and many banks across the nation every year.</span></p>\r\n\r\n<p><span style=\"color:#000000\">Are you good enough with “Golden Rules” then banking examination journey could be easy for you. </span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">“Your Hunting is ENDED here”. Start baking preparation online with LiveLake.</span></p>\r\n\r\n<p> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Upcoming Bank Exam</strong></span><br>\r\n </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Bank Exam Notification by Agency</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Upcoming Bank Exams</strong></span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">State Bank of India (SBI Exams)</span></td>\r\n   <td style=\"background-color:#ffffff\">\r\n   <p style=\"text-align:center\"><span style=\"color:#000000\">1.) SBI PO Exam</span></p>\r\n\r\n   <p style=\"text-align:center\"><span style=\"color:#000000\">2.) SBI SO Exam</span></p>\r\n\r\n   <p style=\"text-align:center\"><span style=\"color:#000000\">3.) SBI Clerk Exam</span></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Institute of Banking Personal Selection (IBPS Exams)</span></td>\r\n   <td style=\"background-color:#ffffff\">\r\n   <p style=\"text-align:center\"><span style=\"color:#000000\">1.) IBPS PO Exam (CWE PO/MT)</span></p>\r\n\r\n   <p style=\"text-align:center\"><span style=\"color:#000000\">2.) IBPS SO Exam (CWE SO)</span></p>\r\n\r\n   <p style=\"text-align:center\"><span style=\"color:#000000\">3.) IBPS Clerk Exam (CWE Clerical)</span></p>\r\n\r\n   <p style=\"text-align:center\"><span style=\"color:#000000\">4.) IBPS RRB Exam (CWE RRB)</span></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reserve Bank of India (RBI Exams)</span></td>\r\n   <td style=\"background-color:#ffffff\">\r\n   <p style=\"text-align:center\"><span style=\"color:#000000\">1.) RBI Officer Grade B Exam</span></p>\r\n\r\n   <p style=\"text-align:center\"><span style=\"color:#000000\">2.) RBI Assistant Exam</span></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">India Post Payments Bank</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">IPPB</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">National Bank for Agriculture & Rural Development</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">NABARD Exam</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\"> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>SBI Bank Exams</strong></span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">SBI is one the largest government public sector bank, they recruit employees at two level of SBI exams.</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\"><strong>SBI PO Exams</strong></span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">We know as SBI Probationary Officers (PO) exam, this exam is basically for management cadre of SBI. After training officers move on to the management roles.</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\"><strong>Three stage involves in SBI PO exam</strong></span><br>\r\n </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Preliminary Exam</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Main Exam</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Objective Test</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Descriptive Test</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Group Discussion & Interview</strong></span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This exam filters the applicants and select only 2.8% total number of applicants for next mains exam.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mains will filter again candidates whether they are able to clear next round. </span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This test is basically to check the skillset like- Reasoning & computer aptitude, data analysis, Banking awareness, GK, English.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This test will check the candidates written English and business mindset.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Group discussion & interview is the final round to kick this journey with victory.</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\"> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>SBI PO Exam Pattern & Syllabus</strong></span></p>\r\n\r\n<p> </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Preliminary Exams</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Subjects</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Number of Questions</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Marks</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Duration</strong></span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minutes</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minutes</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minutes</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mains Exam</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Analysis & Interpretation</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45 Minutes</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60 Minutes</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40 Minutes</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General & Banking Awareness</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35 Minutes</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English (Descriptive Test)</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">50</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30 Minutes</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Group Discussion</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Interview</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\"> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Check out detailed SBI Prelims Syllabus</strong></span></p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Quantitative Aptitude</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Reasoning</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO English</strong></span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simplification/Approximation Profit & Loss</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Alphanumeric Series</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mixtures & Alligations</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Logical Reasoning</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Fill in the blanks</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Permutation, Combination, & Probability</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Sufficiency</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Cloze Test</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Work & Time<br>\r\n   Sequence & Series</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Ranking & Order<br>\r\n   Directions Test<br>\r\n   Alphabet Test</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Para Jumbles</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simple & Compound Interest<br>\r\n   Surds & Indices</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Seating Arrangement</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Vocabulary</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mensuration-Cylinder, Cone, Sphere</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Coded Inequalities</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Paragraph Completion</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Time & Distance<br>\r\n   Number Systems</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Puzzle<br>\r\n   Coding-Decoding<br>\r\n   Tabulation</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Multiple Meaning/Error Spotting</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Interpretation</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Syllogism</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Sentence Completion</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Ratio & Proportion<br>\r\n   Percentage</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Blood Relations<br>\r\n   Input-Output</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Tenses Rules</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\"> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>SBI PO Mains Syllabus in detailed (topic-wise)</strong></span></p>\r\n\r\n<p> </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Data Analysis & Interpretation</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Reasoning</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>General/Economy/Banking Awareness</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>English Language</strong></span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Tabular Graph</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Syllogism</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Current Affairs</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Line Graph</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Verbal Reasoning</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Financial Awareness</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Grammar</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Bar Graph</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Circular Seating Arrangement</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General Knowledge</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Verbal Ability</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Charts & Tables</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Linear Seating Arrangement</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Static Awareness</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Vocabulary</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Missing Case DI</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Double Lineup</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Banking Terminologies Knowledge</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Sentence Improvement</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Radar Graph Caselet</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Scheduling</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Banking Awareness</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Word Association</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Probability</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Blood Relations, Critical Reasoning</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Principles of Insurance</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Para Jumbles</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Sufficiency</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Input-Output, Analytical and Decision Making</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Error Spotting</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Let it Case DI</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Directions and Distances</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Cloze Test</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Permutation and Combination</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Ordering and Ranking, Code Inequalities</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Fill in the blanks</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Pie Charts</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Sufficiency</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Coding-Decoding, Course of Action</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\"> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>SBI SO Exam</strong></span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">It aims to select (Specialist Officers) for the bank and candidates need to go through interview as per their experiences and specializations.</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\"><strong>SBI Clerk Exam</strong></span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">Clerk exam aims to select junior associates for clerical cadre for SBI Giant. It includes of 2 stages. </span><br>\r\n </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">SBI Clerk Preliminary Exam</span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">SBI Clerk Mains Exam</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This level known as SBI Prelims; it works to filter out applicants for next level.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Commonly, we known as SBI Mains, in this exam marks secured for SBI Clerks.</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\"> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>IBPS Bank Exams</strong></span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">Institute of Banking Personnel Selection is an examination body that conducts exam to select employees for a large number of banks. IBPS PO conducts many online bank exams.</span></p>\r\n\r\n<p><span style=\"color:#000000\">Why waste more time? When the most promising e-learning platform is all here to help you in IBPS exam preparation</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Check out below detailed table for better understanding about IBPS PO Bank exams-</strong></span><br>\r\n </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5\"><span style=\"color:#ffffff\">IBPS PO Exam- You need to go through CWE (Common Written Exam) under IBPS PO exam after selection candidate will go to next level post of probationary officers for various public sector banks. This exam follows 3 stages which is given below.</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#351560\"><span style=\"color:#ffffff\">IBPS Preliminary Exams- This exam pattern is type of objective questions which you have to qualify to appear in next stage.</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ff6e66\"><span style=\"color:#ffffff\">IBPS PO Exam- Based on IBPS PO results, this exam will be the final written round. Candidates will be invited by banks for this exam.</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#13427d\"><span style=\"color:#ffffff\">IBPS Interview- This is the face-to-face interaction session with high level ranking bank employees.</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p> </p>\r\n\r\n<p><span style=\"color:#000000\">Check the below detailed table for IBPS PO Exam Pattern</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\"><strong>IBPS PO Prelims Exam Pattern</strong></span></p>\r\n\r\n<p> </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Sr. No.</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Name of the Test</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>No. Of Questions & Marks</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Language of the Exam</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Duration of each IBPS PO Prelims Exam</strong></span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">1.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minute</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English & Hindi</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minute</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">3.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English & Hindi</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minute</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Total</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">100</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">1 Hour</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\"><strong>IBPS PO Exam Pattern for Mains</strong></span></p>\r\n\r\n<p> </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Sr. No.</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Name of the Test</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>No. Of Questions</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Maximum Marks</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Language of the Exam</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Duration of each IBPS PO Mains Exam</strong></span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">1.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning & Computer Aptitude</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General/Economy/Banking/Awareness</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English & Hindi</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">3.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English & Hindi</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">4.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Analysis & Interpretation</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English & Hindi</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Total</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">155</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">200</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">3 Hours</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">5.</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language (Letter Writing &Essay)</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">25</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30 Minutes</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\"> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>IBPS PO Prelims Exam Syllabus</strong></span></p>\r\n\r\n<p> </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>English Language</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Quantitative Aptitude</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Reasoning Ability</strong></span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension<br>\r\n   Idioms & Phrases<br>\r\n   Paragraph Jumbles<br>\r\n   Tenses Rules<br>\r\n   (Fill in the blanks)/Cloze Test<br>\r\n   Error Detection<br>\r\n   Multiple Meanings<br>\r\n   Paragraph & Passage Completion</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simplification & Approximation<br>\r\n   Quadratic Equations<br>\r\n   Profit & Loss<br>\r\n   Mixtures &Alligations<br>\r\n   Simple & Compound Interest<br>\r\n   Surds & Indices<br>\r\n   Work & Time<br>\r\n   Speed, Time & Distance<br>\r\n   Mensuration-Cylinder, Cone, Sphere, Cuboid.<br>\r\n   Data Interpretation<br>\r\n   Ratio & Proportion<br>\r\n   Percentages<br>\r\n   Number Series<br>\r\n   Boat Stream<br>\r\n   Series & Sequences<br>\r\n   Permutation & Combination<br>\r\n   Measures of Central Tendency & Variation Probability</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Logical Reasoning<br>\r\n   Alphanumeric Series<br>\r\n   Directions<br>\r\n   Reasoning Puzzles<br>\r\n   Order & Ranking<br>\r\n   Alphabet Combination<br>\r\n   Data Sufficiency Tests<br>\r\n   Coded Inequalities<br>\r\n   Seating Arrangements<br>\r\n   Picture Series Puzzles<br>\r\n   Tabulation<br>\r\n   Syllogism<br>\r\n   Relationships<br>\r\n   Input/Output<br>\r\n   Encoding/Decoding<br>\r\n   Assertion & Reason<br>\r\n   Statement, Argument, and Assumption<br>\r\n   Word Formation</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\"> </p>\r\n\r\n<p>IBPS PO Mains Exam Syllabus</p>\r\n\r\n<p> </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Reasoning & Computer Aptitude</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>General/Economy /Baking/Awareness</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>English Language</strong></span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Data Analysis & Interpretation</strong></span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning-<br>\r\n   Verbal & Non-verbal reasoning<br>\r\n   Syllogism<br>\r\n   seating Arrangements<br>\r\n   Double & Triple Lineups<br>\r\n   Scheduling<br>\r\n   Input/Output<br>\r\n   Blood Relations<br>\r\n   Ordering & Ranking<br>\r\n   Coding & Decoding<br>\r\n   Sufficiency of Arguments and Data<br>\r\n   Directions & Displacements<br>\r\n   Code Inequalities<br>\r\n   Alphanumeric Series<br>\r\n   Computer Aptitude:<br>\r\n   Internet<br>\r\n   Memory<br>\r\n   Keyboard Shortcuts<br>\r\n   Computer related terms abbreviations<br>\r\n   Computer Fundamentals<br>\r\n   Microsoft office & related work process and spreadsheet applications<br>\r\n   Computer Hardware & Software<br>\r\n   Operating Systems & GUI Basics<br>\r\n   Computer Network<br>\r\n   Microsoft Office<br>\r\n   Microsoft Windows</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Banking Awareness<br>\r\n   Financial Knowledge<br>\r\n   Basic Economics<br>\r\n   Current Affairs<br>\r\n   Current Events with financial news<br>\r\n   Static GK<br>\r\n   General Knowledge of Financial Institutions</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension<br>\r\n   Vocabulary<br>\r\n   Grammer<br>\r\n   Usage of English in Business<br>\r\n   Letter Writing<br>\r\n   Essay Writing<br>\r\n   Verbal Ability</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simplification<br>\r\n   Statics<br>\r\n   Representation Statics<br>\r\n   Ratio & Proportion<br>\r\n   Percentages<br>\r\n   Data Interpretation<br>\r\n   Data Sufficiency<br>\r\n   Mensuration<br>\r\n   Geometry<br>\r\n   Linear Equations<br>\r\n   Simple & Compound Interest<br>\r\n   Speed Distance & Time<br>\r\n   Profit, Loss & Discounts<br>\r\n   Time & Work Equations<br>\r\n   Permutations & Combinations<br>\r\n   Age Calculation Equations<br>\r\n   System of Equation in Two Variables<br>\r\n   Number Systems<br>\r\n   Mixtures &Alligations</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>IBPS PO Interview</strong> - This round will be the final section to qualify IBPS PO Exam. It has no specific subjects but it will be considered with candidate’s experience and scores in PO exam.</span></p>\r\n\r\n<p><span style=\"color:#000000\">The interview will be for 100 marks, and minimum 40% marks (35% for SC/ST/OBC/PWD) are necessary to qualify interview round.</span></p>\r\n\r\n<p> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>IBPS SO Exam- This is the similar stage to the PO exam level. It also included with 3 step to qualify SO exam. Start Preparing IBPS SO Exam from today with LiveLake.</strong></span></p>\r\n\r\n<p> </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">IBPS SO Preliminary Exam</span></td>\r\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">This exam includes objective pattern paper, this bank exam syllabus covers general knowledge, reasoning, quantitative aptitude & English.</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\">IBPS SO Mains Exam</span></td>\r\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\">The main exam will covers objective paper & professional knowledge for most specializations. This stage will be covered objective and descriptive paper with respective subjects.</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\"> </p>\r\n\r\n<p><span style=\"color:#000000\">IBPS Clerk Exam- This exam similar like IBPS SO exam. It covers 2 stages of online prelims exam and mains exam.</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">IBPS Clerk Exam Pattern- Go through below detailed table to understand about the exam pattern. Start today IBPS clerk exam preparation with LiveLake.</span></p>\r\n\r\n<p> </p>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#0099d5; border-color:#ffccff; text-align:center\"><span style=\"color:#ffffff\"><strong>IBPS Clerk Exam Pattern</strong></span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Level of Exam</strong></span></td>\r\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Name of Tests</strong></span></td>\r\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Maximum Marks</strong></span></td>\r\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Time Duration</strong></span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Prelims Exam</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mains Exam</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General/ Financial Awareness</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">50</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General English  </span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability and Computer Aptitude</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"background-color:#ffffff; text-align:center\"> </td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">50</span></td>\r\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\"> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>IBPS RRB Exam</strong> - The IBPS RRB exam is basically for regional rural banks which selects employees for smaller size banks. This exam has categorized in 3 sections.</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">1. Officer Scale I (IBPS RRB PO)<br>\r\n2. Officer Scale II & III<br>\r\n3. Officer Assistant (IBPS RRB Clerk)</span><br>\r\n </p>\r\n\r\n<p><span style=\"color:#000000\">This exam consists 2 stages for these posts.</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\"><strong>RRB Preliminary Exam</strong> - This exam filters out candidates for officer scale 1 and officers assistant which conducted separately.</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\"><strong>RRB Mains Exam </strong>- This paper decides the merit candidates for officers and office assistants. It is based on RRB exam results.</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>RBI Exam</strong> - Reserve bank of India is one the largest and prestigious government body that conducts exam for banking sector. Candidates who all are willing to join banking sector by qualifying RBI exams, for officers and clerks\' posts. RBI conducts their own exam for various posts and vacancies. Start preparation for RBI Exam with LiveLake.</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\"><strong>Below mentioned following exams are major that conducted by RBI</strong></span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">1.) RBI Officer Grade B Exam- The apex bank conducts RBI officer Grade B exam for mid-senior level officers of the bank. It includes research positions and Ph.D holders in the notified disciplines.<br>\r\n2.) RBI Assistant Exam- The RBI assistant exam is conducted to recruit candidates for assistant posts in various branches and sub-officer of RBI.<br>\r\n3.) RBI Junior Engineer Exam- This exam takes place for engineers who will take care and handling RBI facilities further. This exam’s specializations required for Civil Engineering.<br>\r\nStart banking preparation from today with LiveLake, Make ease all the banking terminologies with us.</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\"><strong>1. Live Classes</strong> - Physical school\'s outlets has taken the place of Live Classes. Live classes session is more attentive and interactive which will help you to grasp the knowledge easily.</span></p>\r\n\r\n<p> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>2. Study Material</strong> - Hey, would be Banker! Why worry! When, we are providing study material in Hard copies and e-books too. “Be Focused to Crack It with Full Power”.</span></p>\r\n\r\n<p> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>3. DISC</strong> - Are you aware about our DISC profile? Well, Lemme go you through it. Check today about overall personality, reasoning, aptitude, GK, banking awareness, English, that is DISC all about. Isn’t it AMAZING?</span></p>\r\n\r\n<p> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>4. Webinars</strong> - What\'s in your Mind about Webinars? Well, webinar system is a key feature for dynamic learning. “Visualization has the power to make it into reality”.</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">Our subject matter experts will work as a guardian angel for you, they will guide you, Clear your doubts, Mock test, guest lectures, visual ads etc. “Practice Makes Perfection”.</span></p>\r\n\r\n<p> </p>\r\n\r\n<p><span style=\"color:#000000\"><strong>5. Free English Speaking Classes- Are you good Enough to Speak Fluently?</strong></span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">Only written exam will not going to help you crack the banking exam. Fluency makes you more confident during interview. English is a global language which is required and most important in now a days, doesn’t matter where or which industry you are knocking. Somehow this will be beneficial for you throughout your journey.<br>\r\n “Believe In Yourself”</span></p>\r\n\r\n<p><br>\r\n<span style=\"color:#000000\">Note-We understand your queries and questions related to banking exam, eligibility, syllabus, exam dates, criteria and etc. I am attaching a link below to clear your quarries and give satisfaction to your questionable mind.</span></p>\r\n\r\n<p><br>\r\n<a href=\"https://www.getmyuni.com/articles/upcoming-bank-exams\">Upcoming Bank Exams 2022: Eligibility, Syllabus, Notification, Age Limit - Getmyuni</a><br>\r\n </p>\r\n<p></p>\r\n              \r\n            </div>', NULL, '2022-07-11 11:52:51');
INSERT INTO `cms` (`id`, `heading`, `type`, `description`, `created_at`, `updated_at`) VALUES
(2, 'ksahlaksd', 'privacy_policy', '<div class=\"col-lg-12 col-md-12 col-sm-12 col-12 course_des course_dess\">\n\n            \n        <p class=\"edu_sglblog_des mb_30\"></p><h1><span style=\"color:#0099d5\"><strong>Banking Exam Preparation Online with LiveLake</strong></span></h1>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\">All the banker\'s aspirants start preparing for government banking jobs for various posts with LiveLake. Banking job counts one of the most prestigious jobs in India.<br>\nThere are many bank posts and exams which are conducted by agencies and many banks across the nation every year.</span></p>\n\n<p><span style=\"color:#000000\">Are you good enough with “Golden Rules” then banking examination journey could be easy for you.&nbsp;</span></p>\n\n<p><br>\n<span style=\"color:#000000\">“Your Hunting is ENDED here”.&nbsp;Start baking preparation online with LiveLake.</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>Upcoming Bank Exam</strong></span><br>\n&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Bank Exam Notification by Agency</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Upcoming Bank Exams</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">State Bank of India (SBI Exams)</span></td>\n   <td style=\"background-color:#ffffff\">\n   <p style=\"text-align:center\"><span style=\"color:#000000\">1.) SBI PO Exam</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">2.) SBI SO Exam</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">3.) SBI Clerk Exam</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Institute of Banking Personal Selection (IBPS Exams)</span></td>\n   <td style=\"background-color:#ffffff\">\n   <p style=\"text-align:center\"><span style=\"color:#000000\">1.) IBPS PO Exam (CWE PO/MT)</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">2.) IBPS SO Exam (CWE SO)</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">3.) IBPS Clerk Exam (CWE Clerical)</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">4.) IBPS RRB Exam (CWE RRB)</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reserve Bank of India (RBI Exams)</span></td>\n   <td style=\"background-color:#ffffff\">\n   <p style=\"text-align:center\"><span style=\"color:#000000\">1.) RBI Officer Grade B Exam</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">2.) RBI Assistant Exam</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">India Post Payments Bank</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">IPPB</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">National Bank for Agriculture &amp; Rural Development</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">NABARD Exam</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>SBI Bank Exams</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">SBI is one the largest government public sector bank, they recruit employees at two level of SBI exams.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>SBI PO Exams</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">We know as SBI Probationary Officers (PO) exam, this exam is basically for management cadre of SBI. After training officers move on to the management roles.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>Three stage involves in SBI PO exam</strong></span><br>\n&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Preliminary Exam</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Main Exam</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Objective Test</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Descriptive Test</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Group Discussion &amp; Interview</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This exam filters the applicants and select only 2.8% total number of applicants for next mains exam.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mains will filter again candidates whether they are able to clear next round.&nbsp;</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This test is basically to check the skillset like- Reasoning &amp; computer aptitude, data analysis, Banking awareness, GK, English.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This test will check the candidates written English and business mindset.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Group discussion &amp; interview is the final round to kick this journey with victory.</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>SBI PO Exam Pattern &amp; Syllabus</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Preliminary Exams</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Subjects</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Number of Questions</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Marks</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Duration</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mains Exam</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Analysis &amp; Interpretation</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General &amp; Banking Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English (Descriptive Test)</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">50</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Group Discussion</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Interview</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>Check out detailed SBI Prelims Syllabus</strong></span></p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Quantitative Aptitude</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Reasoning</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO English</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simplification/Approximation Profit &amp; Loss</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Alphanumeric Series</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mixtures &amp; Alligations</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Logical Reasoning</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Fill in the blanks</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Permutation, Combination, &amp; Probability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Sufficiency</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Cloze Test</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Work &amp; Time<br>\n   Sequence &amp; Series</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Ranking &amp; Order<br>\n   Directions Test<br>\n   Alphabet Test</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Para Jumbles</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simple &amp; Compound Interest<br>\n   Surds &amp; Indices</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Seating Arrangement</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Vocabulary</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mensuration-Cylinder, Cone, Sphere</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Coded Inequalities</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Paragraph Completion</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Time &amp; Distance<br>\n   Number Systems</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Puzzle<br>\n   Coding-Decoding<br>\n   Tabulation</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Multiple Meaning/Error Spotting</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Interpretation</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Syllogism</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Sentence Completion</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Ratio &amp; Proportion<br>\n   Percentage</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Blood Relations<br>\n   Input-Output</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Tenses Rules</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>SBI PO Mains Syllabus in detailed (topic-wise)</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Data Analysis &amp; Interpretation</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Reasoning</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>General/Economy/Banking Awareness</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>English Language</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Tabular Graph</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Syllogism</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Current Affairs</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Line Graph</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Verbal Reasoning</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Financial Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Grammar</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Bar Graph</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Circular Seating Arrangement</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General Knowledge</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Verbal Ability</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Charts &amp; Tables</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Linear Seating Arrangement</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Static Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Vocabulary</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Missing Case DI</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Double Lineup</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Banking Terminologies Knowledge</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Sentence Improvement</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Radar Graph Caselet</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Scheduling</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Banking Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Word Association</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Probability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Blood Relations, Critical Reasoning</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Principles of Insurance</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Para Jumbles</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Sufficiency</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Input-Output, Analytical and Decision Making</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Error Spotting</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Let it Case DI</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Directions and Distances</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Cloze Test</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Permutation and Combination</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Ordering and Ranking, Code Inequalities</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Fill in the blanks</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Pie Charts</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Sufficiency</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Coding-Decoding, Course of Action</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>SBI SO Exam</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">It aims to select (Specialist Officers) for the bank and candidates need to go through interview as per their experiences and specializations.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>SBI Clerk Exam</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">Clerk exam aims to select junior associates for clerical cadre for SBI Giant. It includes of 2 stages.&nbsp;</span><br>\n&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">SBI Clerk Preliminary Exam</span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">SBI Clerk Mains Exam</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This level known as SBI Prelims; it works to filter out applicants for next level.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Commonly, we known as SBI Mains, in this exam marks secured for SBI Clerks.</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>IBPS Bank Exams</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">Institute of Banking Personnel Selection is an examination body that conducts exam to select employees for a large number of banks. IBPS PO conducts many online bank exams.</span></p>\n\n<p><span style=\"color:#000000\">Why waste more time? When the most promising e-learning platform is all here to help you in IBPS exam preparation</span></p>\n\n<p><span style=\"color:#000000\"><strong>Check out below detailed table for better understanding about IBPS PO Bank exams-</strong></span><br>\n&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5\"><span style=\"color:#ffffff\">IBPS PO Exam- You need to go through CWE (Common Written Exam) under IBPS PO exam after selection candidate will go to next level post of probationary officers for various public sector banks. This exam follows 3 stages which is given below.</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#351560\"><span style=\"color:#ffffff\">IBPS Preliminary Exams- This exam pattern is type of objective questions which you have to qualify to appear in next stage.</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ff6e66\"><span style=\"color:#ffffff\">IBPS PO Exam- Based on IBPS PO results, this exam will be the final written round. Candidates will be invited by banks for this exam.</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#13427d\"><span style=\"color:#ffffff\">IBPS Interview- This is the face-to-face interaction session with high level ranking bank employees.</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\">Check the below detailed table for IBPS PO Exam Pattern</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>IBPS PO Prelims Exam Pattern</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Sr. No.</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Name of the Test</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>No. Of Questions &amp; Marks</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Language of the Exam</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Duration of each IBPS PO Prelims Exam</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">1.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minute</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English &amp; Hindi</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minute</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">3.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English &amp; Hindi</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minute</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Total</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">100</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">1 Hour</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p><br>\n<span style=\"color:#000000\"><strong>IBPS PO Exam Pattern for Mains</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Sr. No.</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Name of the Test</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>No. Of Questions</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Maximum Marks</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Language of the Exam</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Duration of each IBPS PO Mains Exam</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">1.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning &amp; Computer Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General/Economy/Banking/Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English &amp; Hindi</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">3.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English &amp; Hindi</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">4.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Analysis &amp; Interpretation</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English &amp; Hindi</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Total</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">155</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">200</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">3 Hours</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">5.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language (Letter Writing &amp;Essay)</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">25</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30 Minutes</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>IBPS PO Prelims Exam Syllabus</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>English Language</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Quantitative Aptitude</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Reasoning Ability</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension<br>\n   Idioms &amp; Phrases<br>\n   Paragraph Jumbles<br>\n   Tenses Rules<br>\n   (Fill in the blanks)/Cloze Test<br>\n   Error Detection<br>\n   Multiple Meanings<br>\n   Paragraph &amp; Passage Completion</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simplification &amp; Approximation<br>\n   Quadratic Equations<br>\n   Profit &amp; Loss<br>\n   Mixtures &amp;Alligations<br>\n   Simple &amp; Compound Interest<br>\n   Surds &amp; Indices<br>\n   Work &amp; Time<br>\n   Speed, Time &amp; Distance<br>\n   Mensuration-Cylinder, Cone, Sphere, Cuboid.<br>\n   Data Interpretation<br>\n   Ratio &amp; Proportion<br>\n   Percentages<br>\n   Number Series<br>\n   Boat Stream<br>\n   Series &amp; Sequences<br>\n   Permutation &amp; Combination<br>\n   Measures of Central Tendency &amp; Variation Probability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Logical Reasoning<br>\n   Alphanumeric Series<br>\n   Directions<br>\n   Reasoning Puzzles<br>\n   Order &amp; Ranking<br>\n   Alphabet Combination<br>\n   Data Sufficiency Tests<br>\n   Coded Inequalities<br>\n   Seating Arrangements<br>\n   Picture Series Puzzles<br>\n   Tabulation<br>\n   Syllogism<br>\n   Relationships<br>\n   Input/Output<br>\n   Encoding/Decoding<br>\n   Assertion &amp; Reason<br>\n   Statement, Argument, and Assumption<br>\n   Word Formation</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p>IBPS PO Mains Exam Syllabus</p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Reasoning &amp; Computer Aptitude</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>General/Economy /Baking/Awareness</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>English Language</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Data Analysis &amp; Interpretation</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning-<br>\n   Verbal &amp; Non-verbal reasoning<br>\n   Syllogism<br>\n   seating Arrangements<br>\n   Double &amp; Triple Lineups<br>\n   Scheduling<br>\n   Input/Output<br>\n   Blood Relations<br>\n   Ordering &amp; Ranking<br>\n   Coding &amp; Decoding<br>\n   Sufficiency of Arguments and Data<br>\n   Directions &amp; Displacements<br>\n   Code Inequalities<br>\n   Alphanumeric Series<br>\n   Computer Aptitude:<br>\n   Internet<br>\n   Memory<br>\n   Keyboard Shortcuts<br>\n   Computer related terms abbreviations<br>\n   Computer Fundamentals<br>\n   Microsoft office &amp; related work process and spreadsheet applications<br>\n   Computer Hardware &amp; Software<br>\n   Operating Systems &amp; GUI Basics<br>\n   Computer Network<br>\n   Microsoft Office<br>\n   Microsoft Windows</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Banking Awareness<br>\n   Financial Knowledge<br>\n   Basic Economics<br>\n   Current Affairs<br>\n   Current Events with financial news<br>\n   Static GK<br>\n   General Knowledge of Financial Institutions</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension<br>\n   Vocabulary<br>\n   Grammer<br>\n   Usage of English in Business<br>\n   Letter Writing<br>\n   Essay Writing<br>\n   Verbal Ability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simplification<br>\n   Statics<br>\n   Representation Statics<br>\n   Ratio &amp; Proportion<br>\n   Percentages<br>\n   Data Interpretation<br>\n   Data Sufficiency<br>\n   Mensuration<br>\n   Geometry<br>\n   Linear Equations<br>\n   Simple &amp; Compound Interest<br>\n   Speed Distance &amp; Time<br>\n   Profit, Loss &amp; Discounts<br>\n   Time &amp; Work Equations<br>\n   Permutations &amp; Combinations<br>\n   Age Calculation Equations<br>\n   System of Equation in Two Variables<br>\n   Number Systems<br>\n   Mixtures &amp;Alligations</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>IBPS PO Interview</strong> - This round will be the final section to qualify IBPS PO Exam. It has no specific subjects but it will be considered with candidate’s experience and scores in PO exam.</span></p>\n\n<p><span style=\"color:#000000\">The interview will be for 100 marks, and minimum 40% marks (35% for SC/ST/OBC/PWD) are necessary to qualify interview round.</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>IBPS SO Exam- This is the similar stage to the PO exam level. It also included with 3 step to qualify SO exam. Start Preparing IBPS SO Exam from today with LiveLake.</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">IBPS SO Preliminary Exam</span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">This exam includes objective pattern paper, this bank exam syllabus covers general knowledge, reasoning, quantitative aptitude &amp; English.</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\">IBPS SO Mains Exam</span></td>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\">The main exam will covers objective paper &amp; professional knowledge for most specializations. This stage will be covered objective and descriptive paper with respective subjects.</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\">IBPS Clerk Exam- This exam similar like IBPS SO exam. It covers 2 stages of online prelims exam and mains exam.</span></p>\n\n<p><br>\n<span style=\"color:#000000\">IBPS Clerk Exam Pattern- Go through below detailed table to understand about the exam pattern. Start today IBPS clerk exam preparation with LiveLake.</span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; border-color:#ffccff; text-align:center\"><span style=\"color:#ffffff\"><strong>IBPS Clerk Exam Pattern</strong></span></td>\n  </tr>\n </tbody>\n</table>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Level of Exam</strong></span></td>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Name of Tests</strong></span></td>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Maximum Marks</strong></span></td>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Time Duration</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Prelims Exam</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mains Exam</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General/ Financial Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">50</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General English &nbsp;</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability and Computer Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">50</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>IBPS RRB Exam</strong> - The IBPS RRB exam is basically for regional rural banks which selects employees for smaller size banks. This exam has categorized in 3 sections.</span></p>\n\n<p><br>\n<span style=\"color:#000000\">1. Officer Scale I (IBPS RRB PO)<br>\n2. Officer Scale II &amp; III<br>\n3. Officer Assistant (IBPS RRB Clerk)</span><br>\n&nbsp;</p>\n\n<p><span style=\"color:#000000\">This exam consists 2 stages for these posts.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>RRB Preliminary Exam</strong> - This exam filters out candidates for officer scale 1 and officers assistant which conducted separately.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>RRB Mains Exam&nbsp;</strong>- This paper decides the merit candidates for officers and office assistants. It is based on RRB exam results.</span></p>\n\n<p><span style=\"color:#000000\"><strong>RBI Exam</strong> - Reserve bank of India is one the largest and prestigious government body that conducts exam for banking sector. Candidates who all are willing to join banking sector by qualifying RBI exams, for officers and clerks\' posts. RBI conducts their own exam for various posts and vacancies. Start preparation for RBI Exam with LiveLake.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>Below mentioned following exams are major that conducted by RBI</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">1.) RBI Officer Grade B Exam- The apex bank conducts RBI officer Grade B exam for mid-senior level officers of the bank. It includes research positions and Ph.D holders in the notified disciplines.<br>\n2.) RBI Assistant Exam- The RBI assistant exam is conducted to recruit candidates for assistant posts in various branches and sub-officer of RBI.<br>\n3.) RBI Junior Engineer Exam- This exam takes place for engineers who will take care and handling RBI facilities further. This exam’s specializations required for Civil Engineering.<br>\nStart banking preparation from today with LiveLake, Make ease all the banking terminologies with us.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>1. Live Classes</strong> - Physical school\'s outlets has taken the place of Live Classes. Live classes session is more attentive and interactive which will help you to grasp the knowledge easily.</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>2. Study Material</strong> - Hey, would be Banker! Why worry! When, we are providing study material in Hard copies and e-books too. “Be Focused to Crack It with Full Power”.</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>3. DISC</strong> - Are you aware about our DISC profile? Well, Lemme go you through it. Check today about overall personality, reasoning, aptitude, GK, banking awareness, English, that is DISC all about. Isn’t it AMAZING?</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>4. Webinars</strong> - What\'s in your Mind about Webinars? Well, webinar system is a key feature for dynamic learning. “Visualization has the power to make it into reality”.</span></p>\n\n<p><br>\n<span style=\"color:#000000\">Our subject matter experts will work as a guardian angel for you, they will guide you, Clear your doubts, Mock test, guest lectures, visual ads etc. “Practice Makes Perfection”.</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>5. Free English Speaking Classes- Are you good Enough to Speak Fluently?</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">Only written exam will not going to help you crack the banking exam. Fluency makes you more confident during interview. English is a global language which is required and most important in now a days, doesn’t matter where or which industry you are knocking. Somehow this will be beneficial for you throughout your journey.<br>\n&nbsp;“Believe In Yourself”</span></p>\n\n<p><br>\n<span style=\"color:#000000\">Note-We understand your queries and questions related to banking exam, eligibility, syllabus, exam dates, criteria and etc. I am attaching a link below to clear your quarries and give satisfaction to your questionable mind.</span></p>\n\n<p><br>\n<a href=\"https://www.getmyuni.com/articles/upcoming-bank-exams\">Upcoming Bank Exams 2022: Eligibility, Syllabus, Notification, Age Limit - Getmyuni</a><br>\n&nbsp;</p>\n<p></p>\n              \n            </div>', NULL, '2022-07-02 12:21:26');
INSERT INTO `cms` (`id`, `heading`, `type`, `description`, `created_at`, `updated_at`) VALUES
(3, '', 'term_condition', '<div class=\"col-lg-12 col-md-12 col-sm-12 col-12 course_des course_dess\">\n\n            \n        <p class=\"edu_sglblog_des mb_30\"></p><h1><span style=\"color:#0099d5\"><strong>Banking Exam Preparation Online with LiveLake</strong></span></h1>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\">All the banker\'s aspirants start preparing for government banking jobs for various posts with LiveLake. Banking job counts one of the most prestigious jobs in India.<br>\nThere are many bank posts and exams which are conducted by agencies and many banks across the nation every year.</span></p>\n\n<p><span style=\"color:#000000\">Are you good enough with “Golden Rules” then banking examination journey could be easy for you.&nbsp;</span></p>\n\n<p><br>\n<span style=\"color:#000000\">“Your Hunting is ENDED here”.&nbsp;Start baking preparation online with LiveLake.</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>Upcoming Bank Exam</strong></span><br>\n&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Bank Exam Notification by Agency</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Upcoming Bank Exams</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">State Bank of India (SBI Exams)</span></td>\n   <td style=\"background-color:#ffffff\">\n   <p style=\"text-align:center\"><span style=\"color:#000000\">1.) SBI PO Exam</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">2.) SBI SO Exam</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">3.) SBI Clerk Exam</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Institute of Banking Personal Selection (IBPS Exams)</span></td>\n   <td style=\"background-color:#ffffff\">\n   <p style=\"text-align:center\"><span style=\"color:#000000\">1.) IBPS PO Exam (CWE PO/MT)</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">2.) IBPS SO Exam (CWE SO)</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">3.) IBPS Clerk Exam (CWE Clerical)</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">4.) IBPS RRB Exam (CWE RRB)</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reserve Bank of India (RBI Exams)</span></td>\n   <td style=\"background-color:#ffffff\">\n   <p style=\"text-align:center\"><span style=\"color:#000000\">1.) RBI Officer Grade B Exam</span></p>\n\n   <p style=\"text-align:center\"><span style=\"color:#000000\">2.) RBI Assistant Exam</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">India Post Payments Bank</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">IPPB</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">National Bank for Agriculture &amp; Rural Development</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">NABARD Exam</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>SBI Bank Exams</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">SBI is one the largest government public sector bank, they recruit employees at two level of SBI exams.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>SBI PO Exams</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">We know as SBI Probationary Officers (PO) exam, this exam is basically for management cadre of SBI. After training officers move on to the management roles.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>Three stage involves in SBI PO exam</strong></span><br>\n&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Preliminary Exam</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Main Exam</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Objective Test</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Descriptive Test</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Group Discussion &amp; Interview</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This exam filters the applicants and select only 2.8% total number of applicants for next mains exam.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mains will filter again candidates whether they are able to clear next round.&nbsp;</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This test is basically to check the skillset like- Reasoning &amp; computer aptitude, data analysis, Banking awareness, GK, English.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This test will check the candidates written English and business mindset.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Group discussion &amp; interview is the final round to kick this journey with victory.</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>SBI PO Exam Pattern &amp; Syllabus</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Preliminary Exams</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Subjects</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Number of Questions</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Marks</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Duration</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mains Exam</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Analysis &amp; Interpretation</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General &amp; Banking Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English (Descriptive Test)</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">50</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30 Minutes</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Group Discussion</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Interview</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">--</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>Check out detailed SBI Prelims Syllabus</strong></span></p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Quantitative Aptitude</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO Reasoning</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>SBI PO English</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simplification/Approximation Profit &amp; Loss</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Alphanumeric Series</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mixtures &amp; Alligations</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Logical Reasoning</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Fill in the blanks</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Permutation, Combination, &amp; Probability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Sufficiency</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Cloze Test</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Work &amp; Time<br>\n   Sequence &amp; Series</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Ranking &amp; Order<br>\n   Directions Test<br>\n   Alphabet Test</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Para Jumbles</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simple &amp; Compound Interest<br>\n   Surds &amp; Indices</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Seating Arrangement</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Vocabulary</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mensuration-Cylinder, Cone, Sphere</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Coded Inequalities</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Paragraph Completion</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Time &amp; Distance<br>\n   Number Systems</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Puzzle<br>\n   Coding-Decoding<br>\n   Tabulation</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Multiple Meaning/Error Spotting</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Interpretation</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Syllogism</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Sentence Completion</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Ratio &amp; Proportion<br>\n   Percentage</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Blood Relations<br>\n   Input-Output</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Tenses Rules</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>SBI PO Mains Syllabus in detailed (topic-wise)</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Data Analysis &amp; Interpretation</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Reasoning</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>General/Economy/Banking Awareness</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>English Language</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Tabular Graph</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Syllogism</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Current Affairs</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Line Graph</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Verbal Reasoning</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Financial Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Grammar</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Bar Graph</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Circular Seating Arrangement</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General Knowledge</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Verbal Ability</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Charts &amp; Tables</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Linear Seating Arrangement</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Static Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Vocabulary</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Missing Case DI</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Double Lineup</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Banking Terminologies Knowledge</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Sentence Improvement</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Radar Graph Caselet</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Scheduling</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Banking Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Word Association</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Probability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Blood Relations, Critical Reasoning</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Principles of Insurance</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Para Jumbles</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Sufficiency</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Input-Output, Analytical and Decision Making</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Error Spotting</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Let it Case DI</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Directions and Distances</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Cloze Test</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Permutation and Combination</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Ordering and Ranking, Code Inequalities</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Fill in the blanks</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Pie Charts</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Sufficiency</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Coding-Decoding, Course of Action</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>SBI SO Exam</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">It aims to select (Specialist Officers) for the bank and candidates need to go through interview as per their experiences and specializations.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>SBI Clerk Exam</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">Clerk exam aims to select junior associates for clerical cadre for SBI Giant. It includes of 2 stages.&nbsp;</span><br>\n&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">SBI Clerk Preliminary Exam</span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">SBI Clerk Mains Exam</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">This level known as SBI Prelims; it works to filter out applicants for next level.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Commonly, we known as SBI Mains, in this exam marks secured for SBI Clerks.</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>IBPS Bank Exams</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">Institute of Banking Personnel Selection is an examination body that conducts exam to select employees for a large number of banks. IBPS PO conducts many online bank exams.</span></p>\n\n<p><span style=\"color:#000000\">Why waste more time? When the most promising e-learning platform is all here to help you in IBPS exam preparation</span></p>\n\n<p><span style=\"color:#000000\"><strong>Check out below detailed table for better understanding about IBPS PO Bank exams-</strong></span><br>\n&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5\"><span style=\"color:#ffffff\">IBPS PO Exam- You need to go through CWE (Common Written Exam) under IBPS PO exam after selection candidate will go to next level post of probationary officers for various public sector banks. This exam follows 3 stages which is given below.</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#351560\"><span style=\"color:#ffffff\">IBPS Preliminary Exams- This exam pattern is type of objective questions which you have to qualify to appear in next stage.</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ff6e66\"><span style=\"color:#ffffff\">IBPS PO Exam- Based on IBPS PO results, this exam will be the final written round. Candidates will be invited by banks for this exam.</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#13427d\"><span style=\"color:#ffffff\">IBPS Interview- This is the face-to-face interaction session with high level ranking bank employees.</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\">Check the below detailed table for IBPS PO Exam Pattern</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>IBPS PO Prelims Exam Pattern</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Sr. No.</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Name of the Test</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>No. Of Questions &amp; Marks</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Language of the Exam</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Duration of each IBPS PO Prelims Exam</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">1.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minute</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English &amp; Hindi</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minute</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">3.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English &amp; Hindi</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20 Minute</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Total</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">100</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">1 Hour</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p><br>\n<span style=\"color:#000000\"><strong>IBPS PO Exam Pattern for Mains</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Sr. No.</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Name of the Test</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>No. Of Questions</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Maximum Marks</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Language of the Exam</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Duration of each IBPS PO Mains Exam</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">1.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning &amp; Computer Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General/Economy/Banking/Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English &amp; Hindi</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">3.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English &amp; Hindi</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">4.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Data Analysis &amp; Interpretation</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English &amp; Hindi</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Total</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">155</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">200</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">3 Hours</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">5.</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language (Letter Writing &amp;Essay)</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">2</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">25</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30 Minutes</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>IBPS PO Prelims Exam Syllabus</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>English Language</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Quantitative Aptitude</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Reasoning Ability</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension<br>\n   Idioms &amp; Phrases<br>\n   Paragraph Jumbles<br>\n   Tenses Rules<br>\n   (Fill in the blanks)/Cloze Test<br>\n   Error Detection<br>\n   Multiple Meanings<br>\n   Paragraph &amp; Passage Completion</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simplification &amp; Approximation<br>\n   Quadratic Equations<br>\n   Profit &amp; Loss<br>\n   Mixtures &amp;Alligations<br>\n   Simple &amp; Compound Interest<br>\n   Surds &amp; Indices<br>\n   Work &amp; Time<br>\n   Speed, Time &amp; Distance<br>\n   Mensuration-Cylinder, Cone, Sphere, Cuboid.<br>\n   Data Interpretation<br>\n   Ratio &amp; Proportion<br>\n   Percentages<br>\n   Number Series<br>\n   Boat Stream<br>\n   Series &amp; Sequences<br>\n   Permutation &amp; Combination<br>\n   Measures of Central Tendency &amp; Variation Probability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Logical Reasoning<br>\n   Alphanumeric Series<br>\n   Directions<br>\n   Reasoning Puzzles<br>\n   Order &amp; Ranking<br>\n   Alphabet Combination<br>\n   Data Sufficiency Tests<br>\n   Coded Inequalities<br>\n   Seating Arrangements<br>\n   Picture Series Puzzles<br>\n   Tabulation<br>\n   Syllogism<br>\n   Relationships<br>\n   Input/Output<br>\n   Encoding/Decoding<br>\n   Assertion &amp; Reason<br>\n   Statement, Argument, and Assumption<br>\n   Word Formation</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p>IBPS PO Mains Exam Syllabus</p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Reasoning &amp; Computer Aptitude</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>General/Economy /Baking/Awareness</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>English Language</strong></span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\"><strong>Data Analysis &amp; Interpretation</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning-<br>\n   Verbal &amp; Non-verbal reasoning<br>\n   Syllogism<br>\n   seating Arrangements<br>\n   Double &amp; Triple Lineups<br>\n   Scheduling<br>\n   Input/Output<br>\n   Blood Relations<br>\n   Ordering &amp; Ranking<br>\n   Coding &amp; Decoding<br>\n   Sufficiency of Arguments and Data<br>\n   Directions &amp; Displacements<br>\n   Code Inequalities<br>\n   Alphanumeric Series<br>\n   Computer Aptitude:<br>\n   Internet<br>\n   Memory<br>\n   Keyboard Shortcuts<br>\n   Computer related terms abbreviations<br>\n   Computer Fundamentals<br>\n   Microsoft office &amp; related work process and spreadsheet applications<br>\n   Computer Hardware &amp; Software<br>\n   Operating Systems &amp; GUI Basics<br>\n   Computer Network<br>\n   Microsoft Office<br>\n   Microsoft Windows</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Banking Awareness<br>\n   Financial Knowledge<br>\n   Basic Economics<br>\n   Current Affairs<br>\n   Current Events with financial news<br>\n   Static GK<br>\n   General Knowledge of Financial Institutions</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reading Comprehension<br>\n   Vocabulary<br>\n   Grammer<br>\n   Usage of English in Business<br>\n   Letter Writing<br>\n   Essay Writing<br>\n   Verbal Ability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Simplification<br>\n   Statics<br>\n   Representation Statics<br>\n   Ratio &amp; Proportion<br>\n   Percentages<br>\n   Data Interpretation<br>\n   Data Sufficiency<br>\n   Mensuration<br>\n   Geometry<br>\n   Linear Equations<br>\n   Simple &amp; Compound Interest<br>\n   Speed Distance &amp; Time<br>\n   Profit, Loss &amp; Discounts<br>\n   Time &amp; Work Equations<br>\n   Permutations &amp; Combinations<br>\n   Age Calculation Equations<br>\n   System of Equation in Two Variables<br>\n   Number Systems<br>\n   Mixtures &amp;Alligations</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>IBPS PO Interview</strong> - This round will be the final section to qualify IBPS PO Exam. It has no specific subjects but it will be considered with candidate’s experience and scores in PO exam.</span></p>\n\n<p><span style=\"color:#000000\">The interview will be for 100 marks, and minimum 40% marks (35% for SC/ST/OBC/PWD) are necessary to qualify interview round.</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>IBPS SO Exam- This is the similar stage to the PO exam level. It also included with 3 step to qualify SO exam. Start Preparing IBPS SO Exam from today with LiveLake.</strong></span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">IBPS SO Preliminary Exam</span></td>\n   <td style=\"background-color:#0099d5; text-align:center\"><span style=\"color:#ffffff\">This exam includes objective pattern paper, this bank exam syllabus covers general knowledge, reasoning, quantitative aptitude &amp; English.</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\">IBPS SO Mains Exam</span></td>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\">The main exam will covers objective paper &amp; professional knowledge for most specializations. This stage will be covered objective and descriptive paper with respective subjects.</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\">IBPS Clerk Exam- This exam similar like IBPS SO exam. It covers 2 stages of online prelims exam and mains exam.</span></p>\n\n<p><br>\n<span style=\"color:#000000\">IBPS Clerk Exam Pattern- Go through below detailed table to understand about the exam pattern. Start today IBPS clerk exam preparation with LiveLake.</span></p>\n\n<p>&nbsp;</p>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#0099d5; border-color:#ffccff; text-align:center\"><span style=\"color:#ffffff\"><strong>IBPS Clerk Exam Pattern</strong></span></td>\n  </tr>\n </tbody>\n</table>\n\n<table style=\"width:100%\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\">\n <tbody>\n  <tr>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Level of Exam</strong></span></td>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Name of Tests</strong></span></td>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Maximum Marks</strong></span></td>\n   <td style=\"background-color:#351560; text-align:center\"><span style=\"color:#ffffff\"><strong>Time Duration</strong></span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Prelims Exam</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">English Language</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">30</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">20</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Mains Exam</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General/ Financial Awareness</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">50</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">General English &nbsp;</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">40</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">35</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Reasoning Ability and Computer Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">60</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\n  </tr>\n  <tr>\n   <td style=\"background-color:#ffffff; text-align:center\">&nbsp;</td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">Quantitative Aptitude</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">50</span></td>\n   <td style=\"background-color:#ffffff; text-align:center\"><span style=\"color:#000000\">45</span></td>\n  </tr>\n </tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>IBPS RRB Exam</strong> - The IBPS RRB exam is basically for regional rural banks which selects employees for smaller size banks. This exam has categorized in 3 sections.</span></p>\n\n<p><br>\n<span style=\"color:#000000\">1. Officer Scale I (IBPS RRB PO)<br>\n2. Officer Scale II &amp; III<br>\n3. Officer Assistant (IBPS RRB Clerk)</span><br>\n&nbsp;</p>\n\n<p><span style=\"color:#000000\">This exam consists 2 stages for these posts.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>RRB Preliminary Exam</strong> - This exam filters out candidates for officer scale 1 and officers assistant which conducted separately.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>RRB Mains Exam&nbsp;</strong>- This paper decides the merit candidates for officers and office assistants. It is based on RRB exam results.</span></p>\n\n<p><span style=\"color:#000000\"><strong>RBI Exam</strong> - Reserve bank of India is one the largest and prestigious government body that conducts exam for banking sector. Candidates who all are willing to join banking sector by qualifying RBI exams, for officers and clerks\' posts. RBI conducts their own exam for various posts and vacancies. Start preparation for RBI Exam with LiveLake.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>Below mentioned following exams are major that conducted by RBI</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">1.) RBI Officer Grade B Exam- The apex bank conducts RBI officer Grade B exam for mid-senior level officers of the bank. It includes research positions and Ph.D holders in the notified disciplines.<br>\n2.) RBI Assistant Exam- The RBI assistant exam is conducted to recruit candidates for assistant posts in various branches and sub-officer of RBI.<br>\n3.) RBI Junior Engineer Exam- This exam takes place for engineers who will take care and handling RBI facilities further. This exam’s specializations required for Civil Engineering.<br>\nStart banking preparation from today with LiveLake, Make ease all the banking terminologies with us.</span></p>\n\n<p><br>\n<span style=\"color:#000000\"><strong>1. Live Classes</strong> - Physical school\'s outlets has taken the place of Live Classes. Live classes session is more attentive and interactive which will help you to grasp the knowledge easily.</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>2. Study Material</strong> - Hey, would be Banker! Why worry! When, we are providing study material in Hard copies and e-books too. “Be Focused to Crack It with Full Power”.</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>3. DISC</strong> - Are you aware about our DISC profile? Well, Lemme go you through it. Check today about overall personality, reasoning, aptitude, GK, banking awareness, English, that is DISC all about. Isn’t it AMAZING?</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>4. Webinars</strong> - What\'s in your Mind about Webinars? Well, webinar system is a key feature for dynamic learning. “Visualization has the power to make it into reality”.</span></p>\n\n<p><br>\n<span style=\"color:#000000\">Our subject matter experts will work as a guardian angel for you, they will guide you, Clear your doubts, Mock test, guest lectures, visual ads etc. “Practice Makes Perfection”.</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000\"><strong>5. Free English Speaking Classes- Are you good Enough to Speak Fluently?</strong></span></p>\n\n<p><br>\n<span style=\"color:#000000\">Only written exam will not going to help you crack the banking exam. Fluency makes you more confident during interview. English is a global language which is required and most important in now a days, doesn’t matter where or which industry you are knocking. Somehow this will be beneficial for you throughout your journey.<br>\n&nbsp;“Believe In Yourself”</span></p>\n\n<p><br>\n<span style=\"color:#000000\">Note-We understand your queries and questions related to banking exam, eligibility, syllabus, exam dates, criteria and etc. I am attaching a link below to clear your quarries and give satisfaction to your questionable mind.</span></p>\n\n<p><br>\n<a href=\"https://www.getmyuni.com/articles/upcoming-bank-exams\">Upcoming Bank Exams 2022: Eligibility, Syllabus, Notification, Age Limit - Getmyuni</a><br>\n&nbsp;</p>\n<p></p>\n              \n            </div>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(29, 'ashihs', 'ashish120897maurya@gmail.com', 89675676787, 'subject', 'aksdhasd', '2022-07-07 09:06:37', '2022-07-07 09:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `garbage_items`
--

CREATE TABLE `garbage_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_tax` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_gst` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_others` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn_sac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `g_r_n_w_o_p_o_s`
--

CREATE TABLE `g_r_n_w_o_p_o_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lr_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carrier_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_value` double(12,2) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp_price` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sv_sell_price` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eb_sell_price` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_tax` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_gst` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_others` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sgst` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cgst` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `igst` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ugst` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cess` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apmc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn_sac` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mfg_date` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_date` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` double(12,2) DEFAULT NULL,
  `total_tax` double(12,2) DEFAULT NULL,
  `grand_total` double(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `g_s_t_rates`
--

CREATE TABLE `g_s_t_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gst_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_rate` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membershipcarts`
--

CREATE TABLE `membershipcarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `downloader` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2017_04_08_163453_create_world_cities_locale_table', 1),
(9, '2017_04_08_163453_create_world_cities_table', 1),
(10, '2017_04_08_163453_create_world_continents_locale_table', 1),
(11, '2017_04_08_163453_create_world_continents_table', 1),
(12, '2017_04_08_163453_create_world_countries_locale_table', 1),
(13, '2017_04_08_163453_create_world_countries_table', 1),
(14, '2017_04_08_163453_create_world_divisions_locale_table', 1),
(15, '2017_04_08_163453_create_world_divisions_table', 1),
(16, '2017_04_08_163454_add_foreign_keys_to_world_cities_locale_table', 1),
(17, '2017_04_08_163454_add_foreign_keys_to_world_cities_table', 1),
(18, '2017_04_08_163454_add_foreign_keys_to_world_continents_locale_table', 1),
(19, '2017_04_08_163454_add_foreign_keys_to_world_countries_locale_table', 1),
(20, '2017_04_08_163454_add_foreign_keys_to_world_countries_table', 1),
(21, '2017_04_08_163454_add_foreign_keys_to_world_divisions_locale_table', 1),
(22, '2017_04_08_163454_add_foreign_keys_to_world_divisions_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_23_153024_create_world_languages_table', 1),
(25, '2021_02_15_170857_create_categories_table', 1),
(27, '2021_02_15_174658_create_brands_table', 1),
(28, '2021_02_15_174830_create_sub_brands_table', 1),
(29, '2021_02_15_174835_create_manufacturers_table', 1),
(30, '2021_02_15_174907_create_products_table', 1),
(31, '2021_02_15_174940_create_product_attributes_table', 1),
(32, '2021_02_24_171549_create_product_images_table', 1),
(33, '2021_03_02_102810_create_addresses_table', 1),
(34, '2021_03_03_120743_create_g_s_t_rates_table', 1),
(35, '2021_03_12_093525_create_memberships_table', 1),
(36, '2021_03_15_091927_create_product_expiries_table', 1),
(37, '2021_03_18_115149_create_offline_billings_table', 1),
(38, '2021_03_18_150549_create_return_items_table', 1),
(39, '2021_03_24_174422_create_barcode_labels_table', 1),
(40, '2021_03_26_170519_create_suppliers_table', 1),
(41, '2021_04_03_112236_create_purchases_table', 1),
(42, '2021_04_07_094218_create_membershipcarts_table', 1),
(43, '2021_04_08_173139_create_receivepos_table', 1),
(44, '2021_04_17_145353_create_roles_table', 1),
(45, '2021_04_17_164940_create_modules_table', 1),
(46, '2021_05_26_110543_create_carts_table', 1),
(47, '2021_06_08_174250_create_checkouts_table', 1),
(48, '2021_06_08_174417_create_payments_table', 1),
(49, '2021_06_21_141755_create_garbage_items_table', 1),
(50, '2021_06_26_125839_create_g_r_n_w_o_p_o_s_table', 1),
(61, '2021_07_19_131423_create_jobs_table', 2),
(105, '2021_02_15_173920_create_sub_categories_table', 3),
(106, '2021_07_21_154515_create_offers_table', 3),
(107, '2022_06_27_180141_create_services_table', 3),
(108, '2022_06_30_124649_create_service_categories_table', 3),
(109, '2022_06_30_130338_create_service_products_table', 3),
(110, '2022_06_30_130407_create_service_product_features_table', 3),
(116, '2022_06_30_141954_create_banners_table', 4),
(117, '2022_07_02_161835_create_why_choose_us_table', 4),
(118, '2022_07_02_162036_create_about_us_table', 4),
(119, '2022_07_02_162059_create_contact_us_table', 4),
(120, '2022_07_02_163125_create_faq_table', 4),
(121, '2022_07_02_165916_create_cms_table', 5),
(122, '2022_07_07_094854_create_contacts_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_module` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `productattr_id` int(11) DEFAULT NULL,
  `selling_price` double(8,2) DEFAULT NULL,
  `today_price` double(8,2) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offline_billings`
--

CREATE TABLE `offline_billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `biller_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `receipt_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_check` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_tax` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_gst` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_others` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn_sac` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp_price` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double(12,2) DEFAULT NULL,
  `total_tax` double(12,2) DEFAULT NULL,
  `cn_status` tinyint(1) DEFAULT NULL,
  `cn_rupees` double(12,2) DEFAULT NULL,
  `cn_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` double(12,2) DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_cash` double(12,2) DEFAULT NULL,
  `payment_method1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_cash1` double(12,2) DEFAULT NULL,
  `eb_coupon_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eb_coupon_cash` double(12,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cardCategory` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_ref_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `easepayid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productinfo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf8` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf9` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf10` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(12,2) DEFAULT NULL,
  `net_amount_debit` double(8,2) DEFAULT NULL,
  `deduction_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash_back_percentage` double(8,2) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addedon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_brand_id` int(11) DEFAULT NULL,
  `price` double(20,2) DEFAULT NULL,
  `discount_amt` double(10,2) DEFAULT NULL,
  `discount_percentage` double(10,2) DEFAULT NULL,
  `time_in_min` int(10) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `sgst_tax` int(11) DEFAULT NULL,
  `cgst_tax` int(11) DEFAULT NULL,
  `igst_tax` int(11) DEFAULT NULL,
  `ugst_tax` int(11) DEFAULT NULL,
  `cess_tax` int(11) DEFAULT NULL,
  `apmc_tax` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `image`, `sub_brand_id`, `price`, `discount_amt`, `discount_percentage`, `time_in_min`, `manufacturer_id`, `sgst_tax`, `cgst_tax`, `igst_tax`, `ugst_tax`, `cess_tax`, `apmc_tax`, `title`, `product_code`, `hsn_code`, `package_type`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 3, 1, 1, NULL, NULL, 100.00, 20.00, 20.00, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'new service', 'EB1020000001', NULL, NULL, 'description', 1, '2022-07-08 09:48:36', '2022-07-08 09:48:36'),
(6, 3, 1, 1, NULL, NULL, 2000.00, 20.00, 1.00, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'head message', 'EB1020000002', NULL, NULL, 'description', 1, '2022-07-08 09:50:30', '2022-07-08 09:50:30'),
(7, 2, 2, 1, NULL, NULL, 780.00, 90.00, 12.00, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hair cutting', 'EB1020000003', NULL, NULL, 'description', 1, '2022-07-08 10:44:57', '2022-07-08 10:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `barcode_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_check` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp_price` double(12,2) DEFAULT NULL,
  `selling_price` double(12,2) DEFAULT NULL,
  `membership_price` double(12,2) DEFAULT NULL,
  `basic_price` double(12,2) DEFAULT NULL,
  `cost_price` double(12,2) DEFAULT NULL,
  `eb_cost_price` double(12,2) DEFAULT NULL,
  `offer_status` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_expiries`
--

CREATE TABLE `product_expiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `productattr_id` bigint(20) UNSIGNED DEFAULT NULL,
  `aisle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rack` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shelf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double(8,2) DEFAULT NULL,
  `mfg_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `on_active` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `name` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_features`
--

INSERT INTO `product_features` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 5, 'Hassle free haircut ', '2022-07-08 09:14:17', '2022-07-08 09:14:17'),
(2, 5, 'Recommended for 2 men', '2022-07-08 09:14:46', '2022-07-08 09:14:46'),
(3, 5, 'Professional Beard Styling according to the latest trends', '2022-07-08 09:14:17', '2022-07-08 09:14:17'),
(4, 5, 'Professional Beard Styling according to the latest trends', '2022-07-08 09:14:46', '2022-07-08 09:14:46'),
(5, 6, 'Hassle free haircut ', '2022-07-08 09:14:17', '2022-07-08 09:14:17'),
(6, 6, 'Recommended for 2 men', '2022-07-08 09:14:46', '2022-07-08 09:14:46'),
(7, 6, 'Professional Beard Styling according to the latest trends', '2022-07-08 09:14:17', '2022-07-08 09:14:17'),
(8, 6, 'Professional Beard Styling according to the latest trends', '2022-07-08 09:14:46', '2022-07-08 09:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp_price` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_price` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sgst_tax` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cgst_tax` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `igst_tax` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ugst_tax` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cess_tax` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apmc_tax` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_tax_percentage` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_price` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `total_tax` double(8,2) NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_delivery_date` date DEFAULT NULL,
  `advance_payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_rupee_percent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advance_payment_amount` double(8,2) DEFAULT NULL,
  `expire_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivepos`
--

CREATE TABLE `receivepos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lrnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_id` bigint(20) DEFAULT NULL,
  `poreference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suppplierid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supppliername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carriername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_date` date DEFAULT NULL,
  `remaindermail` date DEFAULT NULL,
  `invoicenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicedate` date DEFAULT NULL,
  `scansku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicevalue` double(8,2) DEFAULT NULL,
  `discountvalue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skucode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receivedqty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batchno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mfgdata` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expdate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cess` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apmc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `returnquantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discrepancyresson` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchage_grand_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_items`
--

CREATE TABLE `return_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `biller_id` int(11) NOT NULL,
  `credit_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retutrn_receipt_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `returnqty` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_check` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_tax` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_gst` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_others` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn_sac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_tax` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cn_status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_cash` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_note_rupees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_note_status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modules` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_modules` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_view` tinyint(1) NOT NULL,
  `is_add` tinyint(1) NOT NULL,
  `is_edit` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ashish\r\n', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_products`
--

CREATE TABLE `service_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_category_id` bigint(20) UNSIGNED NOT NULL,
  `service_sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount_amount` double(8,2) NOT NULL,
  `discount_percentage` double(3,2) NOT NULL,
  `duration_in_minutes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_product_features`
--

CREATE TABLE `service_product_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_product_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_brands`
--

CREATE TABLE `sub_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'finger ', 'jghjhgj', '2022-07-08 04:16:46', '2022-07-08 04:16:46'),
(2, 3, 'knee', 'llkjlkj', '2022-07-08 04:17:36', '2022-07-08 04:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_mobile` bigint(20) NOT NULL,
  `gst_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_expiry_duration` int(11) NOT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_number` bigint(20) DEFAULT NULL,
  `owner_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spoc_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spoc_number` bigint(20) DEFAULT NULL,
  `spoc_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_time` int(11) NOT NULL,
  `credit_period` int(11) NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_id`, `supplier_name`, `supplier_address`, `supplier_email`, `supplier_mobile`, `gst_in`, `pan_no`, `pincode`, `city`, `state`, `country`, `tax_type`, `po_expiry_duration`, `owner_name`, `owner_number`, `owner_email`, `spoc_name`, `spoc_number`, `spoc_email`, `lead_time`, `credit_period`, `bank_name`, `ifsc_code`, `branch_name`, `account_number`, `account_holder_name`, `secondary_email`, `balance`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'EB001', 'Supplier', 'Test', 'supplier@gmail.com', 1234567890, '22AAAAA0000A1Z5', 'AAAAA0000A', 123456, 'Agra', 'Utter Pradesh', 'in', 'none', 17, NULL, NULL, NULL, NULL, NULL, NULL, 6, 30, 'PNB', 'PNB00006', 'Sikandra', '9870594819', 'Test Test', 'test@gmail.com', NULL, 0, '2022-07-11 05:44:53', '2022-07-11 05:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `mobile_status` tinyint(1) NOT NULL DEFAULT 0,
  `mobile_otp` int(11) DEFAULT NULL,
  `mobile_otp_expire` datetime DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_status` tinyint(1) NOT NULL DEFAULT 0,
  `email_otp` int(11) DEFAULT NULL,
  `email_otp_expire` datetime DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `upload_photo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_status` tinyint(1) NOT NULL DEFAULT 0,
  `m_start_date` date DEFAULT NULL,
  `m_end_date` date DEFAULT NULL,
  `m_payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_price` double(8,2) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `mobile`, `mobile_status`, `mobile_otp`, `mobile_otp_expire`, `email`, `email_status`, `email_otp`, `email_otp_expire`, `email_verified_at`, `upload_photo`, `dob`, `address_id`, `membership_status`, `m_start_date`, `m_end_date`, `m_payment`, `m_price`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 9149173290, 1, NULL, NULL, 'admin@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '$2y$10$e5JS0FjWLXWsEWvH.QEDCe5Jgi8aLX0ZOif192vgpd.AyE4jpFlXi', 1, NULL, NULL, NULL),
(2, 'sonu', 'user', 7270808132, 1, NULL, NULL, 'sonu1.epic@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '$2y$10$SQjz8iNi6eYTE8pfZCnrQue/EsjD5XpN3E7nYpI1L345Pt8sSXxPK', 1, NULL, NULL, NULL),
(3, 'manoj', 'user', 7210821290, 0, NULL, NULL, 'manoj.epic1@gmail.com', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '$2y$10$DT5VlFCnUmlc4CIkNnWa1eSVoVORmrMY73Gqjo.7WK6oB7XpEyO4.', 1, NULL, NULL, NULL),
(4, 'guest', 'user', 0, 1, NULL, NULL, 'guest@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '$2y$10$p43idDgOWbmmsOzdcAatke7nKrOfMk5jsHXU05UoVGtefFqHY2mVi', 1, NULL, NULL, NULL),
(5, 'ashish', 'biller', 8957698929, 1, NULL, NULL, 'akhilesh1.epic@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '$2y$10$S5pC.Dg3rXNuNE0T0NOJd.C5TjrgX8v2Smtk.5Yf1.EAq1MJ6YQ7K', 1, NULL, '2022-07-11 06:20:49', '2022-07-11 06:20:49'),
(6, 'ashish', 'vendor', 9554187670, 1, NULL, NULL, 'ashish1.epic@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '$2y$10$NIIjsdSc6pL5NFh3NCzckuJm538VNJjE2EZVxp7/uNL2xAImnHTsy', 1, NULL, '2022-07-11 06:29:17', '2022-07-11 06:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `image`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, '86308187883768933671657015260.jpeg', 'Trained and Verified Expert', 'We have Experienced & Premium beauty professionals on the list of Yes Madam All beauticians come on board after passing our standard and cosmetics test.', '2022-07-05 06:16:23', '2022-07-05 06:16:26'),
(2, '86308187883768933671657015260.jpeg', 'Genuine & Sealed Products', 'All our beauticians use only branded and genuine products in sealed & Single time use Sachet packets. We provide 100% transparency in our Products.', '2022-07-05 06:16:23', '2022-07-05 06:16:26'),
(3, '86308187883768933671657015260.jpeg', 'Pocket Friendly and Satisfactory in Pricing', 'Yes madam provides satisfactory services at affordable prices. You should not worry about your budget because we give the best services at the best prices', '2022-07-05 06:16:23', '2022-07-05 06:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `world_cities`
--

CREATE TABLE `world_cities` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Auto increase ID',
  `country_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Country ID',
  `division_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Division ID',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'City Name',
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'City Fullname',
  `code` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'City Code'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `world_cities`
--

INSERT INTO `world_cities` (`id`, `country_id`, `division_id`, `name`, `full_name`, `code`) VALUES
(11, 4, NULL, 'noida', NULL, NULL),
(12, 4, NULL, 'Greater Noida', NULL, NULL),
(13, 4, NULL, 'Delhi', NULL, NULL),
(14, 4, NULL, 'Gurugram', NULL, NULL),
(15, 4, NULL, 'Faridabad', NULL, NULL),
(16, 4, NULL, 'Lucknow', NULL, NULL),
(17, 4, NULL, 'Punjab', NULL, NULL),
(18, 4, NULL, 'Hariyana', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `world_cities_locale`
--

CREATE TABLE `world_cities_locale` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Auto increase ID',
  `city_id` bigint(20) UNSIGNED NOT NULL COMMENT 'City ID',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Localized city name',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized city alias',
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized city fullname',
  `locale` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'locale name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `world_continents`
--

CREATE TABLE `world_continents` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Auto increase ID',
  `name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Continent Name',
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Continent Code'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `world_continents_locale`
--

CREATE TABLE `world_continents_locale` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Auto increase ID',
  `continent_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Continent ID',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized Name',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized Alias',
  `abbr` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized Abbr name',
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized Fullname',
  `locale` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Locale'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `world_countries`
--

CREATE TABLE `world_countries` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Auto increase ID',
  `continent_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Continent ID',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Country Common Name',
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Country Fullname',
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Capital Common Name',
  `code` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ISO3166-1-Alpha-2',
  `code_alpha3` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ISO3166-1-Alpha-3',
  `emoji` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Country Emoji',
  `has_division` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Has Division',
  `currency_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'iso_4217_code',
  `currency_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'iso_4217_name',
  `tld` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Top level domain',
  `callingcode` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Calling prefix'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `world_countries`
--

INSERT INTO `world_countries` (`id`, `continent_id`, `name`, `full_name`, `capital`, `code`, `code_alpha3`, `emoji`, `has_division`, `currency_code`, `currency_name`, `tld`, `callingcode`) VALUES
(4, NULL, 'India', 'India', 'New Delhi', '91', NULL, NULL, 0, 'INR', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `world_countries_locale`
--

CREATE TABLE `world_countries_locale` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Auto increase ID',
  `country_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Country ID',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Localized Country Name',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized Country Alias',
  `abbr` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized Country Abbr Name',
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized Country Fullname',
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized Country Currency Name',
  `locale` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'locale'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `world_divisions`
--

CREATE TABLE `world_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Auto Increase ID',
  `country_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Country ID',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Division Common Name',
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Division Full Name',
  `code` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ISO 3166-2 Code',
  `has_city` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Has city?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `world_divisions_locale`
--

CREATE TABLE `world_divisions_locale` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Auto Increase ID',
  `division_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Division ID',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Localized Division Name',
  `abbr` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized Division Abbr',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized Division Alias',
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Localized Division Fullname',
  `locale` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'locale'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `world_languages`
--

CREATE TABLE `world_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `iso_language_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `native_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso2` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barcode_labels`
--
ALTER TABLE `barcode_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_productattr_id_foreign` (`productattr_id`),
  ADD KEY `carts_productexpiry_id_foreign` (`productexpiry_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garbage_items`
--
ALTER TABLE `garbage_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_r_n_w_o_p_o_s`
--
ALTER TABLE `g_r_n_w_o_p_o_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_s_t_rates`
--
ALTER TABLE `g_s_t_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membershipcarts`
--
ALTER TABLE `membershipcarts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `membershipcarts_cart_number_unique` (`cart_number`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offers_offer_id_unique` (`offer_id`);

--
-- Indexes for table `offline_billings`
--
ALTER TABLE `offline_billings`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_expiries`
--
ALTER TABLE `product_expiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_expiries_product_id_foreign` (`product_id`),
  ADD KEY `product_expiries_productattr_id_foreign` (`productattr_id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivepos`
--
ALTER TABLE `receivepos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_items`
--
ALTER TABLE `return_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_categories_service_id_foreign` (`service_id`),
  ADD KEY `service_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `service_products`
--
ALTER TABLE `service_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_products_service_id_foreign` (`service_id`),
  ADD KEY `service_products_service_category_id_foreign` (`service_category_id`),
  ADD KEY `service_products_service_sub_category_id_foreign` (`service_sub_category_id`);

--
-- Indexes for table `service_product_features`
--
ALTER TABLE `service_product_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_product_features_service_product_id_foreign` (`service_product_id`);

--
-- Indexes for table `sub_brands`
--
ALTER TABLE `sub_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `world_cities`
--
ALTER TABLE `world_cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniq_city` (`country_id`,`division_id`,`name`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `world_cities_locale`
--
ALTER TABLE `world_cities_locale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_city_id_locale` (`city_id`,`locale`);

--
-- Indexes for table `world_continents`
--
ALTER TABLE `world_continents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniq_continent` (`name`);

--
-- Indexes for table `world_continents_locale`
--
ALTER TABLE `world_continents_locale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_continent_id_locale` (`continent_id`,`locale`);

--
-- Indexes for table `world_countries`
--
ALTER TABLE `world_countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_country` (`continent_id`,`name`);

--
-- Indexes for table `world_countries_locale`
--
ALTER TABLE `world_countries_locale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_country_id_locale` (`country_id`,`locale`);

--
-- Indexes for table `world_divisions`
--
ALTER TABLE `world_divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_division` (`country_id`,`name`);

--
-- Indexes for table `world_divisions_locale`
--
ALTER TABLE `world_divisions_locale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_division_id_locale` (`division_id`,`locale`);

--
-- Indexes for table `world_languages`
--
ALTER TABLE `world_languages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `barcode_labels`
--
ALTER TABLE `barcode_labels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `garbage_items`
--
ALTER TABLE `garbage_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `g_r_n_w_o_p_o_s`
--
ALTER TABLE `g_r_n_w_o_p_o_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `g_s_t_rates`
--
ALTER TABLE `g_s_t_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membershipcarts`
--
ALTER TABLE `membershipcarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offline_billings`
--
ALTER TABLE `offline_billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_expiries`
--
ALTER TABLE `product_expiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receivepos`
--
ALTER TABLE `receivepos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_items`
--
ALTER TABLE `return_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_products`
--
ALTER TABLE `service_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_product_features`
--
ALTER TABLE `service_product_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_brands`
--
ALTER TABLE `sub_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `world_cities`
--
ALTER TABLE `world_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Auto increase ID', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `world_cities_locale`
--
ALTER TABLE `world_cities_locale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Auto increase ID';

--
-- AUTO_INCREMENT for table `world_continents`
--
ALTER TABLE `world_continents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Auto increase ID';

--
-- AUTO_INCREMENT for table `world_continents_locale`
--
ALTER TABLE `world_continents_locale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Auto increase ID';

--
-- AUTO_INCREMENT for table `world_countries`
--
ALTER TABLE `world_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Auto increase ID', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `world_countries_locale`
--
ALTER TABLE `world_countries_locale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Auto increase ID';

--
-- AUTO_INCREMENT for table `world_divisions`
--
ALTER TABLE `world_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Auto Increase ID';

--
-- AUTO_INCREMENT for table `world_divisions_locale`
--
ALTER TABLE `world_divisions_locale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Auto Increase ID';

--
-- AUTO_INCREMENT for table `world_languages`
--
ALTER TABLE `world_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_productattr_id_foreign` FOREIGN KEY (`productattr_id`) REFERENCES `product_attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_productexpiry_id_foreign` FOREIGN KEY (`productexpiry_id`) REFERENCES `product_expiries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_expiries`
--
ALTER TABLE `product_expiries`
  ADD CONSTRAINT `product_expiries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_expiries_productattr_id_foreign` FOREIGN KEY (`productattr_id`) REFERENCES `product_attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD CONSTRAINT `service_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_categories_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_products`
--
ALTER TABLE `service_products`
  ADD CONSTRAINT `service_products_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_products_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_products_service_sub_category_id_foreign` FOREIGN KEY (`service_sub_category_id`) REFERENCES `service_categories` (`parent_id`);

--
-- Constraints for table `service_product_features`
--
ALTER TABLE `service_product_features`
  ADD CONSTRAINT `service_product_features_service_product_id_foreign` FOREIGN KEY (`service_product_id`) REFERENCES `service_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `world_cities`
--
ALTER TABLE `world_cities`
  ADD CONSTRAINT `world_cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `world_countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `world_cities_ibfk_2` FOREIGN KEY (`division_id`) REFERENCES `world_divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `world_cities_locale`
--
ALTER TABLE `world_cities_locale`
  ADD CONSTRAINT `world_cities_locale_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `world_cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `world_continents_locale`
--
ALTER TABLE `world_continents_locale`
  ADD CONSTRAINT `world_continents_locale_ibfk_1` FOREIGN KEY (`continent_id`) REFERENCES `world_continents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `world_countries`
--
ALTER TABLE `world_countries`
  ADD CONSTRAINT `world_countries_ibfk_1` FOREIGN KEY (`continent_id`) REFERENCES `world_continents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `world_countries_locale`
--
ALTER TABLE `world_countries_locale`
  ADD CONSTRAINT `world_countries_locale_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `world_countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `world_divisions`
--
ALTER TABLE `world_divisions`
  ADD CONSTRAINT `world_divisions_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `world_countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `world_divisions_locale`
--
ALTER TABLE `world_divisions_locale`
  ADD CONSTRAINT `world_divisions_locale_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `world_divisions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
