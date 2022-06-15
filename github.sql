-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2022 at 01:35 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `github`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `connected`
--

CREATE TABLE `connected` (
  `user` varchar(100) NOT NULL,
  `statut` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `connected`
--

INSERT INTO `connected` (`user`, `statut`) VALUES
('test@test1.tn', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `username` varchar(100) NOT NULL,
  `Filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` varchar(100) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_url`) VALUES
('', 'uploads/IMG-629df35f317637.42191402.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `ip` varchar(100) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`ip`, `count`) VALUES
('', 3),
('::1', 1),
('::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `user` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `nameproject` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `originName` varchar(100) NOT NULL,
  `directoryName` varchar(100) NOT NULL,
  `extension` varchar(100) NOT NULL,
  `pointedname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`user`, `path`, `description`, `nameproject`, `date`, `originName`, `directoryName`, `extension`, `pointedname`) VALUES
('test@test1.tn', './test/2022-06-06_1654518779__.._.._php_._ptest_2022-05-31_1653994133_accueil.php', 'test', 'test', '2022-06-06 12:32:59', '2022-06-06_1654518779__.._.._php_._ptest_2022-05-31_1653994133_accueil.php', './test/', 'php', '_.._.._php_._ptest_2022-05-31_1653994133_accueil.php'),
('test@test1.tn', './test/2022-06-06_1654518983_accueil.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_accueil.php', './test/', 'php', 'accueil.php'),
('test@test1.tn', './test/2022-06-06_1654518983_add_com.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_add_com.php', './test/', 'php', 'add_com.php'),
('test@test1.tn', './test/2022-06-06_1654518983_blog.sql', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_blog.sql', './test/', 'sql', 'blog.sql'),
('test@test1.tn', './test/2022-06-06_1654518983_changepassword.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_changepassword.php', './test/', 'php', 'changepassword.php'),
('test@test1.tn', './test/2022-06-06_1654518983_chk.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_chk.php', './test/', 'php', 'chk.php'),
('test@test1.tn', './test/2022-06-06_1654518983_confirmation_email.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_confirmation_email.php', './test/', 'php', 'confirmation_email.php'),
('test@test1.tn', './test/2022-06-06_1654518983_conn.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_conn.php', './test/', 'php', 'conn.php'),
('test@test1.tn', './test/2022-06-06_1654518983_connexion.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_connexion.php', './test/', 'php', 'connexion.php'),
('test@test1.tn', './test/2022-06-06_1654518983_count.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_count.php', './test/', 'php', 'count.php'),
('test@test1.tn', './test/2022-06-06_1654518983_db.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_db.php', './test/', 'php', 'db.php'),
('test@test1.tn', './test/2022-06-06_1654518983_delete.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_delete.php', './test/', 'php', 'delete.php'),
('test@test1.tn', './test/2022-06-06_1654518983_forget_password.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_forget_password.php', './test/', 'php', 'forget_password.php'),
('test@test1.tn', './test/2022-06-06_1654518983_go_insert.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_go_insert.php', './test/', 'php', 'go_insert.php'),
('test@test1.tn', './test/2022-06-06_1654518983_inscription.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_inscription.php', './test/', 'php', 'inscription.php'),
('test@test1.tn', './test/2022-06-06_1654518983_insert_pub.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_insert_pub.php', './test/', 'php', 'insert_pub.php'),
('test@test1.tn', './test/2022-06-06_1654518983_insertcomnt.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_insertcomnt.php', './test/', 'php', 'insertcomnt.php'),
('test@test1.tn', './test/2022-06-06_1654518983_insertstyle.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_insertstyle.php', './test/', 'php', 'insertstyle.php'),
('test@test1.tn', './test/2022-06-06_1654518983_login.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_login.php', './test/', 'php', 'login.php'),
('test@test1.tn', './test/2022-06-06_1654518983_logout.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_logout.php', './test/', 'php', 'logout.php'),
('test@test1.tn', './test/2022-06-06_1654518983_modifier_mot_de_passe.php', 'test', 'test', '2022-06-06 12:36:23', '2022-06-06_1654518983_modifier_mot_de_passe.php', './test/', 'php', 'modifier_mot_de_passe.php'),
('test@test1.tn', './test/2022-06-06_1654519067_index.html', 'test', 'test', '2022-06-06 12:37:47', '2022-06-06_1654519067_index.html', './test/', 'html', 'index.html'),
('test@test1.tn', './test/2022-06-06_1654519067_style.css', 'test', 'test', '2022-06-06 12:37:47', '2022-06-06_1654519067_style.css', './test/', 'css', 'style.css');

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`email`, `name`, `password`, `description`) VALUES
('test@test1.tn', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `user` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
