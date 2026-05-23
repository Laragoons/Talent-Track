-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2026 at 01:53 AM
-- Server version: 5.7.39
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `title`, `description`, `image_url`) VALUES
(1, 'Chef', 'A chef is a professional cook who works in a restaurant or kitchen. They prepare and cook many kinds of food. A chef plans menus and chooses fresh ingredients. They make sure the food tastes delicious and looks attractive.', 'Chef.png'),
(2, 'Animator', 'An animator is a person who creates moving images and animations. They design characters and scenes for cartoons, movies, or games. Animators use computers and special software to make pictures move.', 'Animator.png'),
(7, 'Programmer', 'A programmer writes and develops code to create software, websites, and applications that help users perform specific tasks or solve problems. They also test, debug, and improve their programs regularly, working with others to ensure the software runs smoothly, stays secure, and meets user needs effectively.', 'programmer2.png'),
(8, 'Sales Executive', 'A sales executive is a business professional focused on finding new opportunities and building client relationships. They research market trends and present tailored solutions to meet customer needs. Their role is vital for driving company growth and ensuring long-term satisfaction through effective communication and negotiation.', 'sales&executive1.png'),
(9, 'Designer', 'A designer is a creative professional who develops visual solutions to solve specific problems or communicate ideas. They combine art and technology to create everything from product layouts to digital interfaces, ensuring designs are both functional and aesthetically pleasing. Their work is essential for shaping how people interact with brands and the world around them.', 'designer1.png'),
(10, 'Writer', 'A writer is a creative professional who uses language to share ideas, tell stories, or provide information. They craft engaging content across various formats, such as books, articles, or scripts, focusing on clarity and tone to reach their audience. By researching topics and refining their prose, they help people understand complex concepts and see the world through new perspectives.', 'writer1.png'),
(11, 'Lawyer', 'A lawyer is a legal professional who advises and represents individuals or organizations in legal matters. They interpret laws, draft official documents, and advocate for their clients rights in negotiations or court proceedings. By combining analytical research with clear communication, they ensure that legal processes are followed and help resolve complex disputes within the justice system.', 'lawyer1.png'),
(12, 'Photographer', 'A photographer is a creative professional who uses cameras and lighting to capture moments, tell stories, or showcase products. They master technical settings and composition to produce high-quality images for various industries, such as fashion, journalism, or commerce. By blending artistic vision with technical precision, they preserve memories and create compelling visual content that communicates a specific mood or message.', 'photographer1.png'),
(13, 'Doctor', 'A doctor is a healthcare professional who maintains and restores human health through the study, diagnosis, and treatment of illness or injury. They examine patients, review medical histories, and prescribe medications or therapies to manage various health conditions. By combining scientific knowledge with clinical expertise, they provide essential care that improves quality of life and promotes long-term wellness within the community.', 'healthandsafety0.png'),
(14, 'Athlete', 'An athlete is a dedicated professional who trains and competes in sports to achieve physical excellence and team success. They follow rigorous health and practice routines to sharpen their skills and maintain peak performance for high-level competition. By demonstrating discipline and sportsmanship, they inspire audiences and push the boundaries of human physical potential.', 'Athlete.png'),
(15, 'Musician', 'A musician is a creative professional who composes, performs, or conducts music across various styles and instruments. They master technical skills and theory to create melodies and rhythms that evoke emotion or tell a story. Whether performing live or recording in a studio, they use their artistry to connect with audiences and enrich the cultural landscape through the power of sound.', 'musician1.png'),
(16, 'Teacher', 'A teacher is an educational professional who designs and delivers lessons to help students gain knowledge and develop new skills. They create supportive learning environments and adapt their methods to meet the diverse needs of their classroom. By encouraging curiosity and critical thinking, they play a vital role in shaping the personal growth and future success of their students.', 'teacher1.png'),
(17, 'Actor/Actress', 'An actor is a creative professional who portrays characters to tell stories in film, television, or theater. They study scripts and use voice, movement, and emotion to bring a writer’s vision to life and connect with an audience. By mastering various performance techniques, they create believable experiences that entertain, challenge, and reflect the diverse aspects of the human condition.', 'actoractress1.png'),
(18, 'Journalist', 'A journalist is a media professional who investigates, gathers, and presents information on current events and public interest stories. They conduct interviews and verify sources to ensure the news they deliver is accurate, fair, and objective. By providing timely reports across digital, print, or broadcast platforms, they play a crucial role in keeping the public informed and holding institutions accountable.', 'journalist1.png'),
(19, 'Streamer', 'A streamer is a digital media professional who broadcasts live content to an online audience via social platforms. They engage viewers in real-time through activities like gaming, creative arts, or interactive discussions, often building a dedicated community around their unique personality. By managing technical setups and fostering direct interaction, they create an immersive entertainment experience that bridges the gap between creator and fan.', 'streamer1.png');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `name`) VALUES
(1, 'Animating'),
(2, 'Coding'),
(3, 'Business'),
(4, 'Designing'),
(5, 'Writing'),
(6, 'Law'),
(7, 'Cooking'),
(8, 'Photography'),
(9, 'Health&Safety'),
(10, 'Sports'),
(11, 'Music'),
(12, 'Teaching'),
(13, 'Acting'),
(14, 'Journalism'),
(15, 'Streaming');

-- --------------------------------------------------------

--
-- Table structure for table `saved_careers`
--

CREATE TABLE `saved_careers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_careers`
--

INSERT INTO `saved_careers` (`id`, `user_id`, `career_id`) VALUES
(1, 1, 2),
(9, 9, 12),
(8, 9, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Budi Santoso', 'budi@example.com', '123454678'),
(3, 'andi', 'andi@gmail.com', 'abcdefg'),
(4, 'agus', 'agus@gmail.com', '500123'),
(5, 'charles', 'yanto@gmail.com', '$2y$10$xEq77VBX.QM4ZZJUhKwUmuVQtVt1q4hBh4GO9QDFj80mRB/X7kK8y'),
(6, 'david', 'wijawa@gmail.com', '$2y$10$gJkQ2fwtCsKSA9yJEshKqOb91Sp5y90gF1MxC.4w3UV5yDO50UyQO'),
(7, 'siswa', 'siswa@gmail.com', '$2y$10$StVg2fB6bF5Wu6eWPW04aOa74QD33h.oshSO3d0DTPEKbLyrr4z9O'),
(8, 'CHARLES', 'charlesss@gmail.com', '$2y$10$6Bir7IoVMF20jCSiuRM.Durge9/fNdg9P/jIIoXdCxctxvfiXEEh2'),
(9, 'tostos', 'tostos@gmail.com', '$2y$10$iOWumYYY7PTuSChgF1Dro.so8k4NaXCoXGSQcaBtdtDdLwRPlvp3.');

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE `user_interests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_interests`
--

INSERT INTO `user_interests` (`id`, `user_id`, `interest_id`) VALUES
(1, 1, 1),
(3, 1, 12),
(29, 9, 2),
(30, 9, 3),
(31, 9, 6),
(32, 9, 7),
(33, 9, 8),
(34, 9, 12),
(35, 9, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_careers`
--
ALTER TABLE `saved_careers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_saved` (`user_id`,`career_id`),
  ADD KEY `fk_sc_career` (`career_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_users_email` (`email`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_user_interest` (`user_id`,`interest_id`),
  ADD KEY `fk_ui_interest` (`interest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `saved_careers`
--
ALTER TABLE `saved_careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `saved_careers`
--
ALTER TABLE `saved_careers`
  ADD CONSTRAINT `fk_sc_career` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sc_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD CONSTRAINT `fk_ui_interest` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ui_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
