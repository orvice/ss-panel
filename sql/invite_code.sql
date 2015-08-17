SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
 
--
-- Table structure for table `invite_code`
--

CREATE TABLE IF NOT EXISTS `invite_code` (
`id` int(32) NOT NULL,
  `code` varchar(128) NOT NULL,
  `user` int(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3644 ;

--
-- Dumping data for table `invite_code`
--

INSERT INTO `invite_code` (`id`, `code`, `user`) VALUES
(3639, '193c77e35a4a3f', 1),
(3643, '134201a5b85900', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invite_code`
--
ALTER TABLE `invite_code`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invite_code`
--
ALTER TABLE `invite_code`
MODIFY `id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3644; 
