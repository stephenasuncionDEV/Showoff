-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2021 at 12:08 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `showoff_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`ID`, `email`, `name`, `username`, `password`, `date_registered`) VALUES
(1, 'stephenasuncion01@gmail.com', 'Stephen Allen Asuncion', 'typedef', 'FnpLR@L3YWTHkr5', '2021-03-08'),
(2, 'LilBaby@vevo.com', 'Lil Baby', 'LilBaby', 'lilbaby123', '2021-03-10'),
(3, 'Drake@vevo.com', 'Drake', 'Drake', 'drake123', '2021-03-10'),
(4, 'FlowG@vevo.com', 'Flow G', 'flowg', 'flowg123', '2021-03-10'),
(5, 'PopSmoke@vevo.com', 'Pop Smoke', 'popsmoke', 'popsmoke123', '2021-03-10'),
(6, 'ChrisBrown@vevo.com', 'Chris Brown', 'chrisbrown', 'chrisbrown123', '2021-03-10'),
(7, 'kehlani@vevo.com', 'Kehlani', 'Kehlani', 'kehlani123', '2021-03-11'),
(8, 'BrysonTiller@vevo.com', 'BrysonTiller', 'BrysonTiller', 'bryson123', '2021-03-11'),
(9, 'LuhKel@vevo.com', 'Luh Kel', 'LuhKel', 'luhkel123', '2021-03-11'),
(10, 'TreySongz@vevo.com', 'Trey Songz', 'TreySongz', 'treysongz123', '2021-03-11'),
(11, 'TestAccount@text.com', 'Test Account', 'TestAccount', 'admin123', '2021-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PID` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date_posted` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PID`, `title`, `content`, `date_posted`, `user_id`, `user_name`, `likes`) VALUES
(1, 'Drip Too Hard', 'You can get the biggest Chanel bag in the store if you want it. Man, I gave \'em the drip, I got \'em on it. I bought a new Patek, I had the watch, so I two-toned \'em. If I\'m in the club, I got that fire when I\'m performing.', '2021-03-10', 2, 'LilBaby', 2),
(2, 'Wants and Needs', 'Leave me out the comments, leave me out the nonsense Speakin\' out of context, people need some content. Homies tryna keep up, is not a contest Whippin\' Benz concept Heaven-sent, God-sent. Least that\'s what my mom says.', '2021-03-10', 3, 'Drake', 1),
(3, 'Pauwi Nako', 'Miss na kita baby hindi ko na kaya\r\nSobrang saya ko na muli tayong magsasama\r\nPangako na \'di ka na maghihintay at (\'Di na)\r\nHindi ka na malulungkot malapit na ko baby pauwi nako. Ako\'y pauwi na. Baby pauwi nako. Miss na miss na kita.', '2021-03-11', 4, 'flowg', 0),
(4, 'What You Know Bout Love', 'She said, \"What you know \'bout love?\" (I\'ll tell you everything) I got what you need (oh)Walk up in the store and get what you want (go get it) You get what you please. We \'bout to get it on, take off them drawers (I said I love you, baby).', '2021-03-11', 5, 'popsmoke', 0),
(5, 'Go Crazy', 'Oh, baby, everythin\' you do is amazin\'\r\nAin\'t nobody watchin\', go crazy\r\nI got what you need\r\nEverybody think you shy but I know you a cute\r\nLil\' baby (oh), everythin\' you do is amazin\'\r\nAin\'t nobody watchin\', go crazy', '2021-03-11', 6, 'chrisbrown', 0),
(6, 'Toxic', 'Damn right, we take turns bein\' wrong\r\nI get real accountable when I\'m alone\r\nI get real about it all when I\'m alone\r\nIt\'s so crazy missin\' you when I get on\r\nDon Julio made me a fool for you\r\nAnd now I might hit your phone up', '2021-03-11', 7, 'Kehlani', 4),
(7, 'Don\'t', 'Don\'t, don\'t play with her, don\'t be dishonest (ayy)\r\nStill not understandin\' this logic (ayy)\r\nI\'m back and I\'m better (and I\'m better)\r\nI want you bad as ever\r\nDon\'t let me just let up\r\nI wanna give you better\r\nBaby, it\'s whatever.', '2021-03-11', 8, 'BrysonTiller', 1),
(8, 'How To Love', 'I don\'t know how to love, all my feelings, emotions are bottled up\r\nPut my foot in the mud, now I\'m feelin\' stuck\r\nYou weren\'t there for me when all my times was rough\r\nTell me that you love me \'cause I ain\'t hear that often', '2021-03-11', 9, 'LuhKel', 3),
(9, 'Slow Motion', 'Girl, said he keeps on playin\' games\r\nAnd his lovin\' ain\'t the same\r\nI don\'t know what to say, but\r\nWhat a shame\r\nIf you were mine you would not get the same', '2021-03-11', 10, 'TreySongz', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
