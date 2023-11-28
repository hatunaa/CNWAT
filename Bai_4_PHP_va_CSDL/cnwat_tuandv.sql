-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 02:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnwat_tuandv`
--
CREATE DATABASE IF NOT EXISTS `cnwat_tuandv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cnwat_tuandv`;

-- --------------------------------------------------------

--
-- Table structure for table `abcxyz`
--

DROP TABLE IF EXISTS `abcxyz`;
CREATE TABLE IF NOT EXISTS `abcxyz` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abcxyz`
--

INSERT INTO `abcxyz` (`id`, `name`, `phonenumber`) VALUES
(7, '1acaxa', '1acaxa'),
(8, 'abc', '12312'),
(9, 'xbaba', 'xbaba'),
(10, 'abc', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `ID` bigint(20) NOT NULL,
  `ClassName` varchar(50) DEFAULT NULL,
  `ClassDescription` varchar(250) DEFAULT NULL,
  `NumOfStudents` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ID`, `ClassName`, `ClassDescription`, `NumOfStudents`) VALUES
(1, 'LOP1', NULL, 20),
(2, 'LOP2', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `hoso`
--

DROP TABLE IF EXISTS `hoso`;
CREATE TABLE IF NOT EXISTS `hoso` (
  `MAHS` char(8) NOT NULL,
  `HoTen` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Lop` char(6) DEFAULT NULL,
  `DiemToan` float DEFAULT NULL,
  `DiemLy` float DEFAULT NULL,
  `DiemHoa` float DEFAULT NULL,
  PRIMARY KEY (`MAHS`),
  UNIQUE KEY `MAHS` (`MAHS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoso`
--

INSERT INTO `hoso` (`MAHS`, `HoTen`, `NgaySinh`, `DiaChi`, `Lop`, `DiemToan`, `DiemLy`, `DiemHoa`) VALUES
('AT171718', 'Nguyễn Văn B', '2023-09-08', 'Nguyễn Văn B', 'TEST', 8.8, 8.5, 8.5),
('AT171719', 'AT171718', '2023-09-14', 'AT171718', '123', 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

DROP TABLE IF EXISTS `lop`;
CREATE TABLE IF NOT EXISTS `lop` (
  `MaLop` char(6) NOT NULL,
  `TenLop` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `KhoaHoc` int(11) DEFAULT NULL,
  `GVCN` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`MaLop`),
  UNIQUE KEY `MaLop` (`MaLop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MaLop`, `TenLop`, `KhoaHoc`, `GVCN`) VALUES
('TEST1', 'TEST1', 0, 'TEST1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `productName` varchar(50) DEFAULT NULL,
  `productDesc` varchar(250) DEFAULT NULL,
  `productPrice` bigint(20) DEFAULT NULL,
  `productImg` varchar(250) DEFAULT NULL,
  `productType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `productName`, `productDesc`, `productPrice`, `productImg`, `productType`) VALUES
(4, 'Dell Inspiron 15 N3520 i5 1235U/N5I5122W1', 'Dell Inspiron N3520 là chiếc laptop lý tưởng cho công việc hàng ngày. Bộ vi xử lý Intel Core i5 thế hệ thứ 12 hiệu suất cao, màn hình lớn 15,6 inch Full HD 120Hz mượt mà, thiết kế bền bỉ sẽ giúp bạn giải quyết công việc nhanh chóng mọi lúc mọi nơi.', 6000000, 'images/productImg/dell-inspiron-15-3520-i5-n5i5122w1-191222-091429-600x600.jpg', 'DELL'),
(5, 'Acer Predator Helios 300 PH315 55 76KG', 'Vũ Khí Gaming Tối Thượng Predator Helios 300 là dòng Laptop Gaming cao cấp bán chạy nhất Việt Nam 2022 với cấu hình mạnh mẽ, màn hình 2K 165Hz và công nghệ tản nhiệt độc quyền mát nhất', 33990000, 'images/productImg/default.jpg', 'ACER');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `ID` bigint(20) NOT NULL,
  `StudentName` varchar(50) DEFAULT NULL,
  `StudentGender` varchar(5) DEFAULT NULL,
  `StudentAdress` varchar(250) DEFAULT NULL,
  `StudentImage` varchar(250) DEFAULT NULL,
  `ClassID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ClassID` (`ClassID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `StudentName`, `StudentGender`, `StudentAdress`, `StudentImage`, `ClassID`) VALUES
(1, 'Nguyễn Văn A', 'Nam', 'Hà Nội', NULL, 1),
(2, 'Nguyễn Văn B', 'Nữ', 'Hà Nội', NULL, 2),
(3, 'Nguyễn Văn C', 'Nam', 'Hà Nội', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(250) NOT NULL,
  `avt` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `birthday`, `address`, `avt`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '', '0000-00-00', '', ''),
(4, 'a1', 'a1', 'a1', '1111-11-11', '11111', './avatar/a1_17.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `classes` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
