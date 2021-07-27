-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 06:09 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `content_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` int(225) NOT NULL,
  `info` varchar(5000) NOT NULL,
  `image_url` text NOT NULL,
  `postingDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `date`, `info`, `image_url`, `postingDate`) VALUES
(8, 'St George’s Church', 1818, 'Another religious structure along Harmony Street is the St George’s Church. It was built in 1817 with the help of the British East India Company— and is the oldest Anglican Church in South East Asia. The church sustained serious damage during the Japanese Occupation of Malaya in WWII; but was later repaired and services resumed after the war. The Greek pavilion just outside the church was erected in 1886 as a memorial to Sir Francis Light, the founder of Penang. The church is open to the public during the day from Mondays to Thursdays. There is a church service on Sundays. It is worth a look-see and a walk around because of its significance during Penang’s British colonial times.', 'IMG-60feb526d8b232.29707604.jpg', '2021-07-22'),
(10, 'Goddess of Mercy Temple', 1728, 'The Goddess of Mercy Temple (Kuan Yin Teng), or officially named the Kong Hock Keong Temple is also located along Harmony Street. This Buddhist and Taoist temple is the oldest temple in Georgetown, built in the 1800’s by the early Hokkien and Cantonese Chinese settlers in the city. It has withstood the turbulent history of Georgetown; surviving numerous fires and bomb attacks; and even served as a shelter during the Japanese Occupation of Malaya in WWII. Visitors are allowed into the temple to pray and ask for blessings; and also to admire the beautiful paintings and intricate carvings that can be found in and around the temple.', 'IMG-60feb51b9c9c07.79864783.jpg', '2021-07-22'),
(15, 'Kapitan Keling Mosque', 1801, 'The Kapitan Keling Mosque is located along Jalan Kapitan Keling, locally known as Harmony Street, where 3 other religious structures are found as well. It was built in the beginning of the 19th century by the Indian-Muslim community in the city– the name of the mosque is derived from the local slang word, “Indian Leader”. The mosque is a significant historical landmark of Penang, and is open to the public during the afternoons. Entrance is free, but visitors are required to wear the robes provided. I didn’t get to enter the mosque as I visited in the morning; and again at night, when its lights illuminate the dark sky.', 'IMG-60feb51070ea47.07554148.jpg', '2021-07-22'),
(16, 'Cheong Fatt Tze Mansion', 1904, 'The Cheong Fatt Tze Mansion, also known as the Blue Mansion for its bright indigo-colored outer walls– was built in the late 19th century by a prominent Chinese merchant, Cheong Fatt Tze. With numerous businesses, 8 wives and many children all over Asia, Mr Cheong built this mansion in Penang as a local administrative center, and to house some of his wives and family members. Constructed with the most elaborate feng shui principles; it was first a residential home, then a slum, and later left in disrepair. The mansion was rescued from destruction in the 1990’s and is now a luxury boutique hotel. However, certain parts of the mansion are open to public during their 45-minutes guided tour; RM16 (US$4), 3 times a day. The tour is very informative and entertaining (albeit a little too long and draggy)– highlighting the life of Mr Cheong, as well as the feng shui aspects of the mansion. I wish I stayed a night here so I could explore and roam around this historical building by myself!', 'IMG-60feb503a09192.98820021.jpg', '2021-07-23'),
(17, 'Leong San Tong Khoo Kongsi', 1906, 'Khoo Kongsi is a clanhouse of the Leong San Tong, or Dragon Mountain Hall clan in Penang, with a lineage dating back hundreds of years. It was built in the late 19th and early 20th centuries by the members of the Khoo Family from the local Hokkien community. Khoo Kongsi is hidden within the narrow alleyways of Georgetown, and is the most magnificent and elaborate clanhouse in Malaysia. The Khoo Kongsi courtyard exudes an old world charm; and is surrounded by the main temple building, a traditional theatre and old rowhouses. I was overwhelmed by the temple’s extravagant architecture– it is absolutely gorgeous with its golden plaques, sophisticated murals and detailed carvings. There is also a museum on the ground floor, which takes visitors on a journey through the clan’s history. Admission is RM10 (US$2.5) per person.', 'IMG-60feb4f60f6169.24808567.jpg', '2021-07-25'),
(18, 'Pinang Peranakan Mansion', 1893, 'The Pinang Peranakan Mansion is a beautifully restored 19th century Peranakan mansion, once belonging to a rich Chinese merchant. The Peranakan, or Baba Nyonya culture is prominent in Penang– they are descendants of Chinese immigrants who adopted the local Malay practices. The mansion showcases the lifestyle and culture of the Peranakans by recreating a typical Baba Nyonya home; complete with wooden furniture, old photographs and artefacts on display. Within the mansion grounds, there is also a museum with stunning collectibles like Peranakan jewelry, clothing and porcelain sets; as well as an old temple. Admission is RM10 (US$2.5) per person. For me, walking through the mansion was like taking a walk down memory lane. My great-grandmother was Peranakan and I spotted many antiques that I used to see in her house. It brought back lovely memories.', 'IMG-60feb4ea7e83b2.50046186.jpg', '2021-07-25'),
(19, 'Penang Town Hall and City Hall', 1903, 'The Penang Town Hall and the Penang City Hall are two beautiful British colonial buildings located in front of the Esplanade Padang in Georgetown. The Town Hall was completed in 1883, and was used for decades as a venue for social functions and performances. The adjacent City Hall was constructed in the beginning of the 20th century as a municipal building. It now houses the Penang Island City Council (Dewan Bandaraya Pulau Pinang). The two buildings dominate the area around the seafront and are a sight to behold. They are worth visiting just to admire the magnificent Victorian architecture with its white-washed columns and grand windows– one of the only few such buildings that still exist in Malaysia.', 'IMG-60feb45bcce965.07192490.jpg', '2021-07-26'),
(21, 'Fort Cornwallis', 1786, 'Fort Cornwallis is the largest fort in Malaysia and was built by the British East India Company in the late 1700’s. The fort is laid out in a star-shaped formation; with its 10-feet walls surrounded by old cannons. Inside the fort are several prison cells, a chapel, an ammunition storage area and a lighthouse. Fort Cornwallis was initially built as a military defense structure– but it served as an administrative center and never engaged in any battles. When I visited the fort, there was a performance going on at the central open-aired amphitheater. Unfortunately, the fort has been left in disrepair, with broken-down walls and rusty cannons. For the high entrance fee of RM20 (US$5), I expected more. Visit Fort Cornwallis for the significant role it played in Penang’s history, but don’t bother heading in– you can admire the walls from the outside, as it is almost similar to what you see on the inside.', 'IMG-60feb6821b9900.09555599.jpg', '2021-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `contents_likes`
--

CREATE TABLE `contents_likes` (
  `id` int(225) NOT NULL,
  `users` int(225) NOT NULL,
  `contents` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contents_likes`
--

INSERT INTO `contents_likes` (`id`, `users`, `contents`) VALUES
(1, 9, 11),
(3, 21, 11),
(4, 21, 9),
(5, 56, 11),
(6, 56, 10),
(7, 56, 9),
(8, 56, 8),
(11, 57, 8),
(12, 57, 10),
(13, 57, 11),
(26, 58, 11),
(38, 58, 8),
(40, 58, 14),
(63, 9, 9),
(67, 17, 18),
(68, 9, 21),
(71, 9, 17),
(78, 9, 10),
(80, 9, 16),
(83, 9, 18),
(84, 9, 8),
(86, 61, 21),
(87, 61, 18),
(88, 61, 17),
(90, 61, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `profileImage` text NOT NULL,
  `gender` varchar(225) NOT NULL,
  `shortSummary` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `profileImage`, `gender`, `shortSummary`) VALUES
(9, 'test', '123', 'IMG-60feb027a05918.02132823.jpg', 'male', 'A man who loves coding.'),
(10, 'test3', '123', 'IMG-60f8f4f5ab37b2.43252897.jpg', 'male', '123'),
(11, 'testasdf', '123', 'IMG-60f8f5b095bc63.56902008.jpg', 'male', '123'),
(12, 'test11', '123', 'IMG-60f8f7f9eab401.58561084.jpg', 'male', '123'),
(14, 'test123', '123', 'IMG-60f8f99932d186.10401554.jpg', 'male', '123'),
(15, 'test1234', '123', 'IMG-60f8f9cc4ba9e3.00886527.jpg', 'male', '123'),
(16, 'asdf', '123', 'IMG-60f8fa6bc63ff0.21956006.jpg', 'male', '123'),
(18, 'abcd1', '23', 'IMG-60f8fb1fa3d0c4.61614703.jpg', 'male', 'we'),
(19, 'hello', '123', 'IMG-60f8fb6fb76f86.18155955.jpg', 'male', '123'),
(20, 'test12', '123', 'IMG-60f8fbac0f7653.79747360.jpg', 'male', '123'),
(21, 'tan', '123', 'IMG-60f8fbd92b90f5.01497169.jpg', 'male', '123'),
(22, 'qwer', '123', 'IMG-60f8fc3114a266.37187893.jpg', 'male', '123'),
(23, 'hello123', '123', 'IMG-60f8fc4f91ac40.09332544.jpg', 'male', '123'),
(24, 'aaaa', '123', 'IMG-60f8fc6e3e7492.92654940.jpg', 'male', '123'),
(25, 'asdfsdf', '123', 'IMG-60f8fcf878e4e4.44129243.jpg', 'male', '123'),
(26, '1234', '123', 'IMG-60f900ea760c29.06929813.jpg', 'male', '123'),
(27, '12345', '123', 'IMG-60f90129776e87.95759454.jpg', 'male', '123'),
(28, '123456', '123', 'IMG-60f901db66e1f8.97778900.jpg', 'male', '123'),
(29, '1', '123', 'IMG-60f902532ef8e6.14873888.jpg', 'male', '123'),
(30, '12', '123', 'IMG-60f9027fd609f6.85559874.jpg', 'male', '123'),
(31, 'lasdf', '123', 'IMG-60f9029df359e1.53525835.jpg', 'male', '123'),
(32, 'test12345', '123', 'IMG-60f902be665bb6.09163093.jpg', 'male', '123'),
(33, '1234sdaf', '123', 'IMG-60f904b0921113.06410432.jpg', 'male', '123'),
(34, '123safdsadf', '123', 'IMG-60f904d835fee9.24791583.jpg', 'male', '123'),
(35, 'asfdasdfas', '123', 'IMG-60f9050eaaa202.40656572.jpg', 'male', '123'),
(36, 'sdfasdfsaf', '12', 'IMG-60f90649c5edc8.59132819.jpg', 'male', '12'),
(37, 'asdfsdfsacxv', '123', 'IMG-60f906cb78d273.20571888.jpg', 'male', '123'),
(38, 'sdsgdvcbc', '123', 'IMG-60f90852c2baf4.55220301.jpg', 'male', '123'),
(39, 'gjnvbmvb', '123', 'IMG-60f90880d21345.73545775.jpg', 'male', '123'),
(40, 'cxvdsfggdfg', '123', 'IMG-60f908e59a4ab0.71095496.jpg', 'male', '123'),
(41, 'asdfcvx', '23123', 'IMG-60f9091c9451e1.93792929.jpg', 'male', '1231231'),
(42, 'xcvdsaf', '123', 'IMG-60f90b26d0b531.23802579.jpg', 'male', '123'),
(43, 'fdgdsge', '1', 'IMG-60f90b6ca66976.89209936.jpg', 'male', '1'),
(44, 'asdfcxv', '123', 'IMG-60f90c46f2c579.25436408.jpg', 'male', '1'),
(45, 'asdcxcvcxv', '213', 'IMG-60f90d38502f58.27446470.jpg', 'male', 'svxcv'),
(46, 'cxvzxv', '123', 'IMG-60f90e99d9a0c9.89900329.jpg', 'male', '123'),
(47, 'zxcvxvzcsd', '123', 'IMG-60f90f4bd9ee72.22674287.jpg', 'male', '123'),
(48, 'zxcvsdaf', '123', 'IMG-60f90f6e21afd1.35307998.jpg', 'male', '123'),
(49, 'sadfxc', '123', 'IMG-60f90fe7685cc3.44177151.jpg', 'male', '123'),
(50, 'xcvsdfwerq', '123', 'IMG-60f910d0b77a64.14259195.jpg', 'male', '123'),
(51, 'asdfsaew', '123', '', 'male', '123'),
(52, 'cvsdfaf', '123', '', 'male', 'cxvvdsz'),
(53, 'asdvre', '123', '', 'male', '123daf'),
(54, 'sdfcxzv', '123', '', 'male', 'asdfsdaf'),
(55, 'sadfvc', '123', '', 'male', 'sdferwg'),
(56, 'asdvcz', '123', '', 'male', 'asdfvdae'),
(57, 'testing', '123', '', 'male', '123'),
(58, 'test90', '123', '', 'male', '123'),
(59, 'test5', '123', '', 'male', 'dasf'),
(60, 'admin', '123', 'IMG-60feb4ac042b01.75830726.jpg', 'male', 'I am the admin of this webpage.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents_likes`
--
ALTER TABLE `contents_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contents_likes`
--
ALTER TABLE `contents_likes`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
