-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2016 at 09:07 PM
-- Server version: 5.7.13-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'PHP 7'),
(2, 'HTML 5'),
(3, 'Bootstrap'),
(4, 'JavaScript'),
(5, 'CSS'),
(24, 'MySQL'),
(28, 'CMS');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(5) NOT NULL,
  `comment_post_id` int(5) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 2, 'User One', 'user@one.com', 'This is awesome. My First Comment is Live', 'decline', '2016-08-03'),
(2, 1, 'Batman', 'bat@man.com', 'Man this is getting me excited.', 'approved', '2016-08-20'),
(3, 4, 'Test Comment', 'test@gmail.com', 'This is a test comment', 'approved', '2016-08-29'),
(4, 2, 'Bill', 'bill@gmail.com', 'What a post', 'approved', '2016-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` text NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_status`, `post_comment_count`) VALUES
(1, 1, 'Hello World with PHP New', 'Sushil P.', '2016-07-18', 'php2.jpg', '<p>This is a demo content New.</p>\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacinia, nisl vitae egestas hendrerit, magna tortor auctor neque, vel fringilla nibh quam sed nunc. Etiam vel mi neque. Integer venenatis, leo at egestas euismod, lectus nibh porta arcu, vitae hendrerit erat lorem at mi. Etiam fringilla neque commodo, viverra quam et, lacinia risus. Proin aliquam sapien vitae laoreet pharetra. Nunc mattis ipsum id semper molestie. Vivamus enim leo, viverra eu quam porttitor, tempor suscipit mi. Duis feugiat sed nisi nec viverra. Fusce quam sapien, aliquet id dolor id, imperdiet laoreet arcu. Maecenas quis accumsan augue. Nulla suscipit accumsan ligula, aliquam rutrum ex pellentesque et. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n</p>																																																																																																																																																																																																																																																																																																																																																																																																																																								', 'hello, world, sushil, new', 'draft', 1),
(2, 2, 'HTML Blog Post', 'HTML Expert', '2016-07-22', 'html2.jpg', '<p>This is HTML course </p>\r\n<p>Curabitur vitae lacinia lorem. Maecenas rutrum turpis vel nisl convallis tincidunt. Aliquam erat volutpat. Proin sed laoreet magna. Pellentesque eget purus eros. Praesent mattis, magna quis auctor consequat, est nibh consectetur ipsum, in faucibus ex quam id turpis. Duis quis bibendum ex. Morbi scelerisque commodo bibendum. Quisque in metus nec dolor pulvinar pharetra ut in nisi. Vestibulum fermentum dignissim eleifend. Aenean ac lectus sodales, dictum quam id, fringilla quam. Duis semper interdum placerat. Sed feugiat ex a suscipit aliquet. Etiam commodo hendrerit faucibus.</p>								', 'html, expert', 'published', 1),
(3, 3, 'Bootstrap 3 is Awesome', 'Marry Jane', '2016-07-15', 'bootstrap.jpg', '<p> Bootstrap 3 is open source HTML / CSS framework </p>\r\n<p>\r\nProin vitae hendrerit purus. Aenean placerat accumsan tortor ut molestie. In ornare luctus nisl vitae imperdiet. Praesent at ex elit. Aenean luctus commodo ex eget malesuada. Donec suscipit sodales dolor, vel pretium mi sodales eu. Sed fringilla lacus auctor felis mollis elementum. Aenean posuere feugiat nulla, ac sodales sapien blandit non. Maecenas eget elementum tortor. Integer suscipit condimentum odio, id egestas nulla vulputate sit amet.\r\n</p>								', 'bootstrap, bootstrap 3, marry, jane', 'published', 0),
(4, 1, 'Another Awesome PHP blog', 'Sushil P.', '2016-08-05', 'php.jpg', 'This is another PHP blog Post.\r\n\r\nStrip steak boudin jerky, cow ground round swine picanha chicken leberkas. Porchetta shoulder shankle, tail prosciutto frankfurter strip steak cupim flank bacon sirloin jowl. Tri-tip flank ribeye pork belly. Prosciutto pork loin sirloin meatloaf.																																											', 'PHP, Sushil, blog', 'draft', 1),
(8, 4, 'My First JavaScript', 'Superman', '2016-08-12', 'javascript.jpg', 'My First Post for JavaScript\r\n\r\nFrankfurter pork pig short ribs pancetta bresaola doner ball tip boudin biltong t-bone flank. Tri-tip pig cupim ham prosciutto hamburger short ribs shank meatball picanha turducken. Cow short loin chuck t-bone pork chop, bacon boudin tail ham shank chicken fatback. Ham hock ground round brisket short loin drumstick flank boudin ribeye hamburger. Jowl cupim beef ribs chicken, pastrami capicola doner ribeye jerky kevin tenderloin andouille. Beef ribs jerky ham hock short loin venison pancetta pork chop pork.								', 'Javascript, first', 'published', 0),
(9, 28, 'CMS Project', 'John Doe', '2016-08-13', 'cms.jpg', '<p>This is my first CMS</p>\r\n<p>Project Bacon ipsum dolor amet pig alcatra pork loin pork belly.</p>\r\n<p>Beef ribs t-bone sausage meatloaf venison leberkas. Meatloaf rump cupim, hamburger beef tail tenderloin t-bone porchetta andouille jowl capicola drumstick brisket pork chop. <strong>Fatback meatball swine filet mignon tri-tip pork loin</strong> ham hock capicola pig pancetta drumstick pastrami ground round doner shank. Picanha strip steak shank flank chicken pig sirloin frankfurter bresaola.</p>\r\n<p>Alcatra<em> brisket tongue sirloin</em> biltong. Beef ribs turkey picanha, shank fatback swine venison pork belly chicken rump doner tri-tip bresaola.</p>', 'cms, project, john, doe', 'published', 0),
(10, 3, 'My New Bootstrap Project', 'David', '2016-08-30', 'bootstrap3.jpg', '<p>This is my new Bootstrap Projects.</p>\r\n<p>Space, the final frontier. These are the voyages of the Starship Enterprise.</p>\r\n<p><strong>Its five-year mission</strong>: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before. The path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin.</p>\r\n<p>Some bullet points:</p>\r\n<ul>\r\n<li>One</li>\r\n<li>two</li>\r\n<li>three</li>\r\n<li>four</li>\r\n</ul>', 'bootstrap, 3, david', 'published', 0),
(11, 2, 'HTML 5 is a new thing', 'Jane Doe', '2016-08-30', 'html.jpg', '<p>As the title says "<em>HTML 5 is a new thing</em>".</p>\r\n<p>Space, the final frontier. These are the voyages of the Starship Enterprise.</p>\r\n<p>Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before. The path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin.</p>\r\n<p><strong>Some bullet points:</strong></p>\r\n<ul>\r\n<li>One</li>\r\n<li>two</li>\r\n<li>three</li>\r\n<li>four</li>\r\n</ul>', 'HTML, 5, jane, doe', 'published', 0),
(12, 4, 'JQuery is JavaScript in Steroid', 'JAVA Guy', '2016-08-11', 'javascript2.jpg', 'JQuery is JavaScript in Steroid, no comments there.\r\n\r\nThe path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin.\r\n\r\nSpace, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.\r\n	\r\nThe path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin.\r\n\r\nSpace, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.\r\n\r\n\r\n																', 'Javascript, Jquery, Java, Guy', 'published', 0),
(13, 3, 'BootStrap makes my life easier', 'BootStrap ', '2016-08-10', 'bootstrap2.jpg', 'As a designer BootStrap makes my life easier.\r\n\r\nThe path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin.\r\n\r\nSpace, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.\r\n	\r\nThe path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin.\r\n\r\nSpace, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.\r\n								', 'bootstrap, designer', 'draft', 0),
(14, 1, 'adasd', 'asdasd', '2016-08-23', '', '		asdasdasds						', 'asdasdasd', 'draft', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `user_randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_status`, `user_randSalt`) VALUES
(1, 'cms', 'cms1234', 'A CMS', 'Guy', 'cmsguy@gmail.com', 'cms_guy.png', 'admin', 'declined', ''),
(2, 'cmsuser', 'cmsuser1234', 'User', 'CMS', 'user@cms.ca', 'user_cms.png', 'subscriber', 'approved', ''),
(5, 'user', 'user1234', 'Bruce', 'Wayne', 'bruce@wayne.ca', 'user_cms.png', 'subscriber', 'approved', '0'),
(7, 'sadmin', 'sadmin1234', 'Clark', 'is Superman', 'super@admin.ca', 'user_female.png', 'admin', 'approved', '0'),
(8, 'jane', 'jane1234', 'Jane', 'Doe', 'jane@doe.ca', 'user_female.png', 'subscriber', 'approved', '0'),
(9, 'test', 'test1234', 'Test', 'User', 'test@amsdvca.ca', 'user_cms.png', 'subscriber', 'declined', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
