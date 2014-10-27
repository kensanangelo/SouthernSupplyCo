-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2014 at 01:50 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ssc`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productID` int(5) NOT NULL DEFAULT '0',
  `productName` varchar(30) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `category` varchar(15) DEFAULT NULL,
  `SKU` int(5) DEFAULT NULL,
  `stock` int(4) DEFAULT NULL,
  `cost` decimal(3,2) DEFAULT NULL,
  `price` decimal(3,2) DEFAULT NULL,
  `salePrice` decimal(3,2) DEFAULT NULL,
  `productImage` varchar(30) DEFAULT NULL,
  `rating` int(1) NOT NULL DEFAULT '0',
  `numOfVotes` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `description`, `category`, `SKU`, `stock`, `cost`, `price`, `salePrice`, `productImage`, `rating`, `numOfVotes`) VALUES
(1, '2x4x8 Whitewood Stud', 'A standard pine 2"x4"x8'' board used in construction.', 'softwood', 157, 453, '2.00', '3.15', '3.00', 'img/products/1.jpg', 50, 15),
(2, '50lb Concrete', 'A 50lb bag of ready-to-mix concrete.', 'Concrete', 5763, 275, '2.00', '2.48', NULL, 'img/products/2.jpg', 53, 22),
(3, '80lb Concrete', 'An 80lb bag or ready-to-mix concrete.', 'Concrete', 5543, 123, '3.00', '3.95', NULL, 'img/products/3.jpg', 50, 10),
(4, '50lb Fast-Setting Concrete', 'A 50lb bag of Fast-Setting Concrete', 'Concrete', 2646, 120, '4.00', '4.98', NULL, 'img/products/4.jpg', 3, 1),
(5, '80lb ProFinish Concrete', 'An 80lb bag of ProFinish Concrete', 'Concrete', 24564, 80, '5.00', '5.18', NULL, 'img/products/5.jpg', 42, 10),
(6, '50lb All-Purpose Sand', 'A 50lb bag of All-Purpose Sand', 'Concrete', 5464, 58, '3.00', '3.98', NULL, 'img/products/6.jpg', 100, 25),
(7, '60lb Gray Mortar Repair Mix', 'A 60lb bag of Gray Mortar Repair Mix', 'Concrete', 45646, 57, '4.50', '5.15', NULL, 'img/products/7.jpg', 7, 2),
(8, '47lb Portland Cement', 'A 47lb bag of Portland Cement.', 'Concrete', 1561, 79, '5.00', '5.47', NULL, 'img/products/8.jpg', 35, 9),
(9, '10lb Concrete Mix', 'A 10lb bag of Concrete Mix', 'Concrete', 4566, 98, '2.00', '2.26', NULL, 'img/products/9.jpg', 41, 1),
(10, 'Oriented Strand Board', '7/16 in. x 4 ft. x 8 ft.; Actual: 0.418 in. x 47.75 in. x 95.75 in.)', 'Plywood', 386081, 368, '7.64', '7.07', NULL, 'img/products/10.jpg', 91, 2),
(11, 'RTD Sheathing Syp', '23/32 in. x 4 ft. x 8 ft.', 'Plywood', 166103, 180, '9.38', '9.68', NULL, 'img/products/11.jpg', 61, 2),
(12, '3-Ply RTD Sheathing', '15/32 in. x 4 ft. x 8 ft.', 'Plywood', 166073, 138, '2.55', '2.75', NULL, 'img/products/12.jpg', 71, 4),
(13, 'Rtd Sheathing Syp', '19/32 in. x 4 ft. x 8 ft.', 'Plywood', 166081, 68, '4.77', '4.97', NULL, 'img/products/13.jpg', 91, 1),
(14, 'Underlayment', '7/32 in. x 4 ft. x 8 ft.', 'Plywood', 261685, 38, '1.34', '1.47', NULL, 'img/products/14.jpg', 81, 2),
(15, 'Rtd Southern Yellow Pine Plywood Sheathing', '11/32 in. x 4 ft. x 8 ft.', 'Plywood', 261686, 88, '6.24', '6.37', NULL, 'img/products/15.jpg', 51, 4),
(16, 'Pressure-Treated Plywood Rated Sheathing', '(Common: 23/32 in. x 4 ft. x 8 ft.; Actual: .703 in. x 48 in. x 96 in.)', 'Plywood', 261687, 18, '6.44', '6.57', NULL, 'img/products/16.jpg', 91, 8),
(17, 'Whole Piece Birch', 'Domestic Plywood', 'Plywood', 261688, 33, '9.34', '9.47', NULL, 'img/products/17.jpg', 71, 3),
(18, '1/2 in. x 4 ft. x 8 ft. Gypsum Board', 'SHEETROCK UltraLight 1/2 in. x 4 ft. x 8 ft.', 'Drywall', 14113411708, 21, '8.32', '8.30', NULL, 'img/products/18.jpg', 50, 3),
(19, '1/2 in. x 4 ft. x 8 ft. Gypsum Board', 'SHEETROCK UltraLight Mold Tough 1/2 in. x 4 ft. x 8 ft. ', 'Drywall', 14302111708, 25, '9.32', '9.22', NULL, 'img/products/19.jpg', 50, 3),
(20, '5/8 in. x 4 ft. x 8 ft. Gypsum Board', 'SHEETROCK Firecode Core 5/8 in. x 4 ft. x 8 ft. ', 'Drywall', 14211011308, 55, '7.32', '7.55', NULL, 'img/products/20.jpg', 50, 3),
(21, '3/8 in. x 4 ft. x 8 ft. Gypsum Board', 'SHEETROCK 3/8 in. x 4 ft. x 8 ft.', 'Drywall', 14109012208, 33, '8.11', '8.12', NULL, 'img/products/21.jpg', 50, 3),
(22, '5-Gal. All-Purpose Joint Compound', 'SHEETROCK Brand 5-Gal.', 'Drywall', 380119048, 22, '9.34', '9.66', NULL, 'img/products/22.jpg', 50, 3),
(23, '5-Gal. Lightweight Joint Compound', 'SHEETROCK Brand Plus 3 4.5-Gal. Lightweight', 'Drywall', 381466, 21, '8.88', '8.54', NULL, 'img/products/23.jpg', 50, 3),
(24, 'Natural Shadow Charcoal Shingles', 'GAF Lifetime Timberline Natural Shadow Charcoal Shingles', 'Roofing', 0601180, 42, '9.50', '9.55', NULL, 'img/products/24.jpg', 50, 15),
(25, 'Natural Shadow Weathered Wood SG Shingles', 'GAF Lifetime Timberline Natural Shadow Weathered Wood SG Shingles', 'Roofing', 0601180, 42, '9.50', '9.55', NULL, 'img/products/25.jpg', 50, 15),
(26, '26 in. x 8 ft. Clear PVC Roof Panel', 'Palruf 26 in. x 8 ft. Clear PVC Roof Panel', 'Roofing', 100423, 12, '9.11', '9.10', NULL, 'img/products/26.jpg', 50, 15),
(27, '26 in. x 12 ft. Solar Gray Polycarbonate Corrugated Roof Panel', 'Suntuf 26 in. x 12 ft. Solar Gray Polycarbonate Corrugated Roof Panel', 'Roofing', 101931, 28, '7.33', '7.41', NULL, 'img/products/27.jpg', 50, 15),
(28, 'Pipe Roof Jack with Adjustable Collar 3" to 1"', 'Construction Metals Pipe Roof Jack with Adjustable Collar 3" to 1"', 'Roofing', 202223519, 172, '6.22', '6.25', NULL, 'img/products/28.jpg', 50, 15),
(29, '6 in. x 75 ft. Flashing Tape', 'Nashua Tape 6 in. x 75 ft. Select Window & Door Flashing Tape', 'Roofing', 1207782, 92, '3.88', '3.92', NULL, 'img/products/29.jpg', 50, 15),
(30, 'Solid Hardwood Flooring (18.70 sq. ft. / case)', 'Hand Scraped Birch Bronze 3/4 in. Thick x 4-3/4 in. Wide x Random Length Solid Hardwood Flooring (18.70 sq. ft. / case)', 'Hardwoods', 201484941, 31, '5.69', '5.72', NULL, 'img/products/30.jpg', 50, 15),
(31, 'Length Click Lock Hardwood Flooring (24.94 sq.ft./cs)', 'Hand Scraped Oak Gunstock 3/8 in.Thick x 4-3/4 in.Wide x 47-1/4 in. Length Click Lock Hardwood Flooring (24.94 sq.ft./cs)', 'Hardwoods', 200118026, 28, '9.69', '9.72', NULL, 'img/products/31.jpg', 50, 15),
(32, '1 in. x 2 in. x 6 ft. Premium Hardwood Board', '1 in. x 2 in. x 6 ft. Wormy Maple S4S Premium Hardwood Board', 'Hardwoods', 1001180263, 12, '6.69', '6.72', NULL, 'img/products/32.jpg', 50, 15),
(33, '3/8 in. x 5 in. Hardwood Flooring (19.72 sq. ft. / case)', '3/8 in. x 5 in. Subtle Scraped Ranch House Plantation Hickory Engineered Hardwood Flooring (19.72 sq. ft. / case)', 'Hardwoods', 100118024, 82, '9.69', '9.72', NULL, 'img/products/33.jpg', 50, 15),
(34, 'Plano Marsh 3/4 in. Hardwood Flooring', 'Plano Marsh 3/4 in. Thick x 3-1/4 in. Wide x Random Length Solid Hardwood Flooring(22 sq. ft. / case)', 'Hardwoods', 100118025, 32, '4.69', '4.72', NULL, 'img/products/34.jpg', 50, 15),
(35, 'Gunstock Oak 3/4 in. Solid Hardwood Flooring', 'Gunstock Oak 3/4 in. Thick x 2-1/4 in. Wide x Random Length Solid Hardwood Flooring (20 sq. ft./case)', 'Hardwoods', 100118026, 22, '8.69', '8.72', NULL, 'img/products/35.jpg', 50, 15);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
