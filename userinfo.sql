

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` INT AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(50) NOT NULL,
  `userPhone` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL,
  `is_admin` BOOLEAN DEFAULT FALSE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------
