-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2016 at 03:54 PM
-- Server version: 5.7.13-log
-- PHP Version: 7.0.10

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
(4, 2, 'Bill', 'bill@gmail.com', 'What a post', 'approved', '2016-08-29'),
(5, 15, 'CMS Guy', 'cms@gmail.com', '<p>Duis bibendum auctor finibus. Donec ipsum nisl, eleifend id bibendum vitae</p>', 'approved', '2016-08-29'),
(6, 15, 'No One', 'no@one.com', '<p>Curabitur varius laoreet dictum. Aenean pellentesque tempus purus at convallis.&nbsp;</p>', 'decline', '2016-08-29'),
(7, 15, 'frequent visitor', 'visitor@gmail.com', '<p>Maecenas odio nulla, dapibus sit amet lacinia eget, vestibulum vitae neque. Phasellus rhoncus&nbsp;!!</p>', 'approved', '2016-08-29'),
(8, 19, 'DB Guy', 'db@gmailo.com', 'MySQL DB makes life simpler. This is great.', 'approved', '2016-08-30'),
(9, 20, 'CSS Lover', 'lovecss@mail.com', 'I totally Agree. Nobody wants to browse ugly website.', 'approved', '2016-08-30'),
(10, 18, 'A Man', 'aman@yahoo.com', ' You forget to mention "Proin ac ligula quis velit consectetur malesuada."', 'decline', '2016-08-30'),
(11, 17, 'Amature', 'amature@hotmail.com', 'There is an error in your POST. Could you double check it ?', 'approved', '2016-08-30'),
(12, 10, 'Web Designer', 'newdesign@myemail.com', 'I can\'t wait for the launch of "Bootstrap V 4". This is going to be awesome !!', 'approved', '2016-08-30');

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
(1, 1, 'Hello World with PHP New', 'PHP Expert	', '2016-07-18', 'php2.jpg', '<p>This is a demo content New.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacinia, nisl vitae egestas hendrerit, magna tortor auctor neque, vel fringilla nibh quam sed nunc. Etiam vel mi neque. Integer venenatis, leo at egestas euismod, lectus nibh porta arcu, vitae hendrerit erat lorem at mi. Etiam fringilla neque commodo, viverra quam et, lacinia risus. Proin aliquam sapien vitae laoreet pharetra. Nunc mattis ipsum id semper molestie. Vivamus enim leo, viverra eu quam porttitor, tempor suscipit mi. Duis feugiat sed nisi nec viverra. Fusce quam sapien, aliquet id dolor id, imperdiet laoreet arcu. Maecenas quis accumsan augue. Nulla suscipit accumsan ligula, aliquam rutrum ex pellentesque et. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\r\n<ul>\r\n<li>In hendrerit nibh congue mi suscipit tincidunt.</li>\r\n<li>Quisque lobortis ligula sit amet est varius tincidunt.</li>\r\n<li>Pellentesque condimentum nisi vitae lacinia porta.</li>\r\n<li>Sed eu nibh vel leo tempor venenatis vel et dui.</li>\r\n</ul>\r\n<p>Vestibulum justo diam, luctus nec ipsum nec, sagittis faucibus ligula. Maecenas pretium mi et orci placerat, sit amet tempus ex semper. Nunc tortor nulla, lobortis eu facilisis vitae, rutrum ut velit. Phasellus vitae lorem mollis, eleifend est sit amet, hendrerit lacus. Sed eget sem purus. Duis ipsum lacus, fermentum sit amet varius ut, tincidunt ornare ex. Morbi vel odio placerat, vulputate lectus non, laoreet eros. Aenean varius eros nulla, quis iaculis felis aliquet a. Duis molestie, sapien non fringilla fringilla, urna magna commodo dolor, quis volutpat purus libero vel nunc.</p>', 'hello, world, PHP, Expert, new	', 'published', 1),
(2, 2, 'HTML Blog Post', 'Jane Doe', '2016-07-22', 'html2.jpg', '<p>This is HTML course</p>\r\n<p>Curabitur vitae lacinia lorem. Maecenas rutrum turpis vel nisl convallis tincidunt. Aliquam erat volutpat. Proin sed laoreet magna. Pellentesque eget purus eros. Praesent mattis, magna quis auctor consequat, est nibh consectetur ipsum, in faucibus ex quam id turpis. Duis quis bibendum ex. Morbi scelerisque commodo bibendum. Quisque in metus nec dolor pulvinar pharetra ut in nisi. Vestibulum fermentum dignissim eleifend. Aenean ac lectus sodales, dictum quam id, fringilla quam. Duis semper interdum placerat. Sed feugiat ex a suscipit aliquet. Etiam commodo hendrerit faucibus.</p>\r\n<p>Curabitur aliquet dapibus tristique. Nulla malesuada mi eget purus faucibus, ac elementum augue suscipit. Donec ut efficitur sem. Phasellus eu ornare felis, vel laoreet leo. Morbi non sodales nisi. Nunc pulvinar commodo nibh eu ultricies. Nulla sed neque at risus efficitur vulputate in non enim. Praesent eu massa condimentum, ultricies nunc eu, ullamcorper nisl. Praesent posuere consectetur nunc, at efficitur ante lobortis ut.</p>', 'html,Jane, Doe	', 'published', 1),
(3, 3, 'Bootstrap 3 is Awesome', 'John Doe', '2016-07-15', 'bootstrap.jpg', '<p>Bootstrap 3 is open source HTML / CSS framework</p>\r\n<p>Proin vitae hendrerit purus. Aenean placerat accumsan tortor ut molestie. In ornare luctus nisl vitae imperdiet. Praesent at ex elit. Aenean luctus commodo ex eget malesuada. Donec suscipit sodales dolor, vel pretium mi sodales eu. Sed fringilla lacus auctor felis mollis elementum. Aenean posuere feugiat nulla, ac sodales sapien blandit non. Maecenas eget elementum tortor. Integer suscipit condimentum odio, id egestas nulla vulputate sit amet.</p>\r\n<p>Curabitur aliquet dapibus tristique. Nulla malesuada mi eget purus faucibus, ac elementum augue suscipit. Donec ut efficitur sem. Phasellus eu ornare felis, vel laoreet leo. Morbi non sodales nisi. Nunc pulvinar commodo nibh eu ultricies. Nulla sed neque at risus efficitur vulputate in non enim. Praesent eu massa condimentum, ultricies nunc eu, ullamcorper nisl. Praesent posuere consectetur nunc, at efficitur ante lobortis ut.</p>\r\n<p>Sed quis euismod felis, vitae vulputate purus. Aliquam iaculis magna non urna ullamcorper mattis ac et massa. Maecenas eget tristique elit, sed molestie est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin fermentum velit nec ligula varius tincidunt. Suspendisse sodales maximus elit eu cursus. Nam nunc urna, dapibus vel malesuada id, pulvinar vitae libero. Fusce aliquam ante eget quam accumsan, sed lobortis nisl pharetra. Proin mollis nunc in augue viverra, eu ultrices sapien porttitor.</p>', 'bootstrap, bootstrap 3, John, Doe	', 'published', 0),
(4, 1, 'Another Awesome PHP blog', 'PHP Expert', '2016-08-14', 'php.jpg', '<p>This is another PHP blog Post.</p>\r\n<p>&nbsp;Strip steak boudin jerky, cow ground round swine picanha chicken leberkas. Porchetta shoulder shankle, tail prosciutto frankfurter strip steak cupim flank bacon sirloin jowl. Tri-tip flank ribeye pork belly. Prosciutto pork loin sirloin meatloaf.</p>\r\n<p>&nbsp;Vivamus vulputate elit nec quam fermentum tempor. Sed a tincidunt purus, non vulputate lorem. Vestibulum at augue at magna gravida interdum. Suspendisse tincidunt vel lorem nec tempor. Morbi sit amet ipsum velit. Fusce porta risus odio, volutpat finibus quam gravida quis. Pellentesque gravida eros sit amet dapibus volutpat. Praesent id elit ullamcorper mi auctor bibendum. Nullam scelerisque dolor nibh, at posuere sem lacinia eu. Integer a sem ut ante condimentum scelerisque sed in libero. Nullam et eleifend arcu. Praesent vitae mollis nulla, eu pulvinar nibh.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'PHP, Expert, blog', 'published', 1),
(8, 4, 'My First JavaScript', 'Superman', '2016-08-12', 'javascript.jpg', '<p>My First Post for JavaScript.</p>\r\n<p>Frankfurter pork pig short ribs pancetta bresaola doner ball tip boudin biltong t-bone flank. Tri-tip pig cupim ham prosciutto hamburger short ribs shank meatball picanha turducken. Cow short loin chuck t-bone pork chop, bacon boudin tail ham shank chicken fatback. Ham hock ground round brisket short loin drumstick flank boudin ribeye hamburger. Jowl cupim beef ribs chicken, pastrami capicola doner ribeye jerky kevin tenderloin andouille. Beef ribs jerky ham hock short loin venison pancetta pork chop pork.</p>\r\n<ul>\r\n<li>Donec varius lacus non dolor fringilla, nec scelerisque arcu cursus.</li>\r\n<li>Integer facilisis risus in tristique euismod.</li>\r\n<li>Cras elementum nisi nec nisi efficitur, at malesuada neque vulputate.</li>\r\n<li>Aenean ultricies nulla in odio euismod vehicula.</li>\r\n<li>Vivamus bibendum risus sit amet diam semper bibendum a id nisl.</li>\r\n<li>Ut aliquet magna et enim blandit, ac pellentesque metus laoreet.</li>\r\n</ul>', 'Javascript, first, superman', 'published', 0),
(9, 28, 'CMS Project', 'John Doe', '2016-08-13', 'cms.jpg', '<p>This is my first CMS</p>\r\n<p>Project Bacon ipsum dolor amet pig alcatra pork loin pork belly.</p>\r\n<p>Beef ribs t-bone sausage meatloaf venison leberkas. Meatloaf rump cupim, hamburger beef tail tenderloin t-bone porchetta andouille jowl capicola drumstick brisket pork chop. <strong>Fatback meatball swine filet mignon tri-tip pork loin</strong> ham hock capicola pig pancetta drumstick pastrami ground round doner shank. Picanha strip steak shank flank chicken pig sirloin frankfurter bresaola.</p>\r\n<p>Alcatra<em> brisket tongue sirloin</em> biltong. Beef ribs turkey picanha, shank fatback swine venison pork belly chicken rump doner tri-tip bresaola.</p>', 'cms, project, john, doe', 'published', 0),
(10, 3, 'My New Bootstrap Project', 'John Doe', '2016-08-27', 'bootstrap3.jpg', '<p>This is my new Bootstrap Projects.</p>\r\n<p>Space, the final frontier. These are the voyages of the Starship Enterprise.</p>\r\n<p><strong>Its five-year mission</strong>: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before. The path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin.</p>\r\n<p>Some bullet points:</p>\r\n<ul>\r\n<li>One</li>\r\n<li>two</li>\r\n<li>three</li>\r\n<li>four</li>\r\n</ul>', 'bootstrap, 3, John, Doe', 'published', 0),
(11, 2, 'HTML 5 is a new thing', 'Jane Doe', '2016-08-26', 'html.jpg', '<p>As the title says "<em>HTML 5 is a new thing</em>".</p>\r\n<p>Space, the final frontier. These are the voyages of the Starship Enterprise.</p>\r\n<p>Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before. The path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin.</p>\r\n<p><strong>Some bullet points:</strong></p>\r\n<ul>\r\n<li>One</li>\r\n<li>two</li>\r\n<li>three</li>\r\n<li>four</li>\r\n</ul>', 'HTML, 5, jane, doe', 'published', 0),
(12, 4, 'JQuery is JavaScript in Steroid', 'Superman', '2016-07-16', 'javascript2.jpg', '<p>JQuery is JavaScript in Steroid, no comments there.</p>\r\n<p>The path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin. Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before. The path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin. Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.</p>\r\n<p>Vestibulum justo diam, luctus nec ipsum nec, sagittis faucibus ligula. Maecenas pretium mi et orci placerat, sit amet tempus ex semper. Nunc tortor nulla, lobortis eu facilisis vitae, rutrum ut velit. Phasellus vitae lorem mollis, eleifend est sit amet, hendrerit lacus. Sed eget sem purus. Duis ipsum lacus, fermentum sit amet varius ut, tincidunt ornare ex. Morbi vel odio placerat, vulputate lectus non, laoreet eros. Aenean varius eros nulla, quis iaculis felis aliquet a. Duis molestie, sapien non fringilla fringilla, urna magna commodo dolor, quis volutpat purus libero vel nunc.</p>\r\n<p>Maecenas sollicitudin in est vel tempor. Donec felis turpis, rutrum quis odio eget, consequat efficitur lacus. In a finibus mauris, non vestibulum mi. Nullam rutrum commodo elit eu ornare. Donec ac odio quam. Duis vel dictum arcu. Nunc nec nisl vel nunc rutrum lobortis. In ultrices sodales tristique. Nam sed erat sit amet sem rutrum consectetur. Nunc tempor velit purus, at tristique enim auctor ut.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'Javascript, Jquery, superman', 'published', 0),
(13, 3, 'BootStrap makes my life easier', 'John Doe', '2016-08-10', 'bootstrap2.jpg', '<p>As a designer BootStrap makes my life easier.</p>\r\n<p>The path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin. Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before. The path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin. Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.</p>\r\n<ul>\r\n<li>In vel sem facilisis quam porta commodo eget sed risus.</li>\r\n<li>In feugiat ante egestas eros tincidunt lobortis.</li>\r\n</ul>', 'bootstrap, designer, John, Doe', 'published', 0),
(14, 5, 'CSS is beautiful', 'Beauty M.', '2016-07-26', 'css2.jpg', '<p>CSS is beautiful.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in velit sodales, placerat massa sit amet, tempus eros. Vivamus egestas, mi sollicitudin iaculis pharetra, nibh ex finibus lectus, at venenatis eros lectus quis felis. Suspendisse sit amet eleifend diam, non porttitor felis. Integer vitae sapien nec erat interdum molestie quis lacinia mi. Integer vulputate vel sapien ut consectetur. Proin nisi dolor, mollis vel dui ut, rutrum imperdiet nisl. Phasellus a risus nec dolor mollis luctus.</p>\r\n<p>Aenean accumsan, dui ut pulvinar interdum, nisi lacus fermentum dolor, eu finibus magna dolor in ipsum. Duis iaculis a mauris ut mattis. Etiam augue est, interdum at suscipit at, gravida ac sem. Donec vehicula dictum magna, id efficitur diam finibus non. Praesent sed malesuada sem. Nulla faucibus turpis libero, quis vestibulum lacus laoreet eget. Vivamus egestas, ligula at cursus tempor, leo urna pulvinar orci, sed maximus dui lectus sit amet libero. Etiam enim turpis, pretium quis egestas ac, tempor nec mi. Quisque blandit euismod quam, id ultricies sapien pulvinar vitae. Morbi ut molestie tortor, id ultrices enim. Maecenas placerat odio vel risus porta consectetur. Vestibulum et metus in velit suscipit faucibus non sed mi. Fusce convallis mauris et eleifend volutpat.</p>\r\n<p>&nbsp;</p>', 'CSS, beautiful, beauty', 'published', 0),
(15, 5, 'CSS 101 -  Step by Step Guide', 'Beauty M', '2016-08-28', 'css.jpg', '<p>This CSS guide is for begineer only.</p>\r\n<p>Suspendisse nisi lacus, malesuada sit amet tortor at, pretium congue tortor. Proin pulvinar dapibus justo quis eleifend. Nulla facilisi. Vestibulum at ultricies orci. Vestibulum efficitur nulla non tortor maximus, a laoreet turpis fermentum. Nullam suscipit purus tellus, a convallis lectus accumsan vitae. Quisque aliquet purus in sem dictum, sed consequat velit varius. Pellentesque pellentesque, risus id iaculis sollicitudin, libero magna volutpat massa, eu laoreet dolor nibh suscipit tellus.</p>\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n<li>Pellentesque eu sapien sit amet sem pharetra mattis et quis diam.</li>\r\n<li>Nulla eget massa ut nulla porttitor tincidunt eget id augue.</li>\r\n<li>Phasellus semper sapien non nulla rhoncus suscipit.</li>\r\n<li>Nam nec velit mattis, aliquam felis quis, volutpat nisi.</li>\r\n</ul>\r\n<p>&nbsp;</p>', 'CSS, 101, Beauty, M, Guide', 'published', 2),
(16, 1, 'Your Blog post title', 'PHP Expert', '2016-08-29', 'holder.png', '<p>This is a dummy blog post. your title goes here.</p>\r\n<p>Donec scelerisque tempor sodales. Aliquam eleifend auctor urna, sit amet ultricies urna semper eu. Curabitur quis massa fermentum, pellentesque odio a, porttitor velit. Sed fermentum, enim quis feugiat placerat, magna purus scelerisque arcu, quis imperdiet turpis dolor auctor lacus. Duis scelerisque elementum porttitor. Cras hendrerit elementum massa, ac lacinia ipsum finibus in. Maecenas pharetra in ex sed auctor. Ut volutpat risus eu libero pellentesque semper. Sed suscipit erat et tempus volutpat. Quisque sed luctus purus.</p>\r\n<p>Nullam commodo sem elit, quis pretium lectus convallis vitae. Phasellus elementum, risus id luctus sagittis, massa enim pretium massa, eu hendrerit mauris lacus id risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec consequat risus sed ligula vestibulum, eget sodales justo placerat. Phasellus facilisis ante dui, a accumsan nulla consectetur at. Integer sed nibh felis. Maecenas lacinia justo et venenatis porttitor. Etiam ut leo mi. Integer et cursus augue, id tempus enim. Fusce vel porta felis. Phasellus vehicula pretium bibendum. In sed neque sollicitudin est mollis dapibus. Morbi ullamcorper viverra eros, ac mollis ante pharetra a. Donec pretium quam non ante malesuada, id blandit leo congue.</p>\r\n<p>&nbsp;</p>', 'Blog, Post, php, expert', 'draft', 0),
(17, 1, 'PHP Magic - you\'ll never go back.', 'PHP Expert	', '2016-08-01', 'php3.jpg', '<p>You are going to learn the awesome PHP Magic.</p>\r\n<p>Cras vel odio in nisi iaculis consectetur vitae vel elit. Sed fringilla leo rhoncus luctus pellentesque. Ut placerat, justo eu condimentum varius, massa dui pellentesque diam, vel mattis libero velit ac nisl. Morbi posuere tellus quis dui venenatis elementum. Proin vitae tincidunt ligula. Donec vestibulum, quam vel scelerisque lobortis, lorem enim pretium mi, in blandit est odio a ex. Donec metus justo, feugiat sed laoreet id, fermentum in justo. Quisque tincidunt, magna at facilisis ultrices, augue risus lobortis turpis, sit amet lobortis mauris mauris eu sapien. Sed et finibus turpis. Quisque interdum mi vel nulla fringilla, et commodo augue fringilla. Quisque eget felis sed nunc facilisis tristique at non felis. Morbi aliquet condimentum enim, in rutrum turpis. Vivamus a purus ac purus ultrices commodo. Duis egestas mi eu lacus hendrerit, vitae pellentesque arcu accumsan.</p>\r\n<p>Aenean volutpat sit amet augue sed sollicitudin. Aenean nec viverra enim. Vestibulum sem nibh, tincidunt ac nisi sit amet, fermentum luctus ipsum. Nullam fermentum sit amet elit in facilisis. In ut ipsum nunc. Aliquam sit amet arcu elementum est dictum ultrices. Integer ornare ex odio, vitae tristique lectus commodo a. Fusce ullamcorper nisi vitae lacus blandit, quis hendrerit nisi molestie. Sed eget pretium enim. Aliquam erat volutpat. Morbi ac tellus lobortis, finibus ante non, tristique tortor. Etiam in odio quam. Cras dictum tincidunt neque eu ornare. Suspendisse dapibus egestas odio quis dictum.</p>\r\n<ul>\r\n<li>Sed tempus nunc nec consequat consectetur.</li>\r\n<li>Pellentesque ac turpis varius, aliquet purus eu, mattis augue.</li>\r\n<li>Maecenas tristique magna ut dolor accumsan vehicula.</li>\r\n</ul>', 'PHP, Magic, Expert', 'published', 0),
(18, 2, 'HTML 5 - What not to do', 'Jane Doe	', '2016-08-03', 'html3.png', '<p>List of things not to do in HTML 5.</p>\r\n<ol>\r\n<li>Mauris aliquam risus vitae tortor scelerisque, vel placerat nulla vulputate.</li>\r\n<li>Praesent at nisl pellentesque, viverra risus ac, dictum urna.</li>\r\n<li>Proin ac ligula quis velit consectetur malesuada.</li>\r\n<li>Suspendisse ultricies orci et porta hendrerit.</li>\r\n<li>Sed eget ex quis dui accumsan porta at eu tortor.</li>\r\n<li>Vivamus vel tortor tristique, posuere nisl id, sodales diam.</li>\r\n</ol>\r\n<p>Fusce vel ligula ac ex accumsan iaculis. In pellentesque sapien a justo vulputate viverra. Proin neque tellus, viverra ac urna quis, malesuada bibendum est. Sed sodales sit amet lorem nec rhoncus. Nunc at massa lacus. Aenean et interdum elit, ac ultricies eros. Maecenas dictum porttitor ligula, eu commodo nulla aliquet quis. In feugiat erat a ligula iaculis, et varius lacus tempor. Pellentesque non velit hendrerit, viverra nisl ut, interdum lectus. Donec eget enim congue, blandit urna non, luctus sem. Fusce aliquet turpis ut ornare imperdiet. Etiam tristique massa ac arcu eleifend, eu mattis ex ultrices. Nulla condimentum in ex id efficitur.</p>\r\n<p>&nbsp;</p>', 'HTML, HTML 5, jane, doe', 'published', -1),
(19, 24, 'MySQL - King of DB', 'SQL Guru', '2016-08-11', 'mysql.png', '<p>Learn MySQL, King of DB and you won\'t look back.</p>\r\n<p>Nulla nec massa semper, feugiat neque et, pretium est. Duis et orci vel augue eleifend dignissim sit amet eget arcu. Integer vel lacus eu justo placerat posuere. Etiam et ultrices mauris. Praesent varius condimentum tellus eu iaculis. Sed viverra odio sit amet lacus molestie imperdiet. Suspendisse egestas scelerisque nunc ac sagittis.</p>\r\n<p>Maecenas sed nisi ut sapien venenatis ultricies. Maecenas vestibulum enim quis libero tempus consectetur. In ullamcorper sed leo id pulvinar. In mollis ut purus pretium sollicitudin. Donec dapibus vulputate imperdiet. Quisque at vehicula nunc. Ut lorem nibh, tempus id dapibus nec, luctus in nibh. Praesent laoreet, urna sed scelerisque vehicula, ipsum risus iaculis ex, eget gravida lorem massa in nulla. Fusce vel gravida felis. Cras volutpat, nulla ac ultrices mattis, est nulla tristique nibh, vitae dapibus urna quam et ligula. Aenean ligula neque, vehicula vulputate metus at, semper accumsan justo. Nam consequat sem a felis ultricies feugiat. Aenean vulputate odio vitae tempor aliquam. Donec dolor enim, sodales quis urna scelerisque, vestibulum interdum dui. Aliquam pulvinar, quam a consectetur mattis, ipsum ipsum consequat purus, in tincidunt odio lorem vel velit. Suspendisse sollicitudin arcu eu velit euismod, eu convallis erat egestas</p>\r\n<p>Mauris in ante quis eros sodales vehicula quis vitae mi. In lacinia faucibus ultrices. Suspendisse imperdiet ornare nibh, et rhoncus lectus aliquam quis. Quisque efficitur nisi auctor, feugiat augue et, ultrices eros. Mauris venenatis hendrerit mi, et varius nisi ornare in. Morbi consectetur augue quis metus dignissim, quis posuere diam tempus. Sed finibus turpis eget erat efficitur, semper cursus ex scelerisque. Aliquam vestibulum, leo id tristique luctus, ante tortor dignissim sapien, tincidunt dictum sapien tortor vitae mi. Proin non pellentesque nunc. Phasellus nec efficitur felis. Maecenas laoreet sed sapien ut pellentesque. Nulla arcu turpis, molestie vel rutrum congue, commodo nec nisi.</p>', 'MySQL, SQL, Guru, DB, database', 'published', 1),
(20, 5, 'CSS 3 tricks for better performance', 'Beauty M	', '2016-08-09', 'css3.jpg', '<p>Few CSS 3 tricks for better website Performance.</p>\r\n<ol>\r\n<li>Proin tristique urna sit amet nulla rhoncus, eu finibus nulla dignissim.</li>\r\n<li>Ut eget libero sodales, varius lectus et, ultricies mi.</li>\r\n<li>Curabitur aliquam magna nec neque porttitor, a lobortis est porta.</li>\r\n<li>Phasellus pulvinar orci eget diam condimentum vestibulum.</li>\r\n<li>In quis ipsum maximus, semper elit elementum, porttitor nisl.</li>\r\n<li>Nulla molestie nisl vitae est eleifend, et consectetur ipsum congue.</li>\r\n</ol>\r\n<p>Vivamus accumsan velit sed leo ultricies iaculis. Nulla et libero a massa congue tempor ac eget lorem. Nam non felis nunc. Etiam arcu nulla, cursus pellentesque consectetur nec, ultrices at libero. Nullam aliquet tincidunt commodo. Phasellus efficitur metus nisl, non gravida nulla lobortis et. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse turpis tortor, sollicitudin sed magna non, mattis cursus quam. Praesent convallis suscipit augue, vel volutpat urna aliquet at.</p>\r\n<p>Curabitur odio augue, dictum nec lacus egestas, accumsan maximus nibh. Aliquam aliquet non mi eget pulvinar. Ut facilisis elementum urna, et elementum nisi finibus non. Etiam eu accumsan lectus. Sed a dapibus arcu, nec consequat nibh. Maecenas consectetur libero non nunc scelerisque, at mattis enim tincidunt. Suspendisse potenti. Mauris fringilla tortor sed placerat aliquet. In erat diam, rhoncus at porta eleifend, fringilla eu nunc. Vestibulum interdum sapien sed neque efficitur mollis.</p>', 'CSS, CSS3, Beauty, performance', 'published', 1),
(21, 4, 'Javascript to Rescue FrontEnd', 'Superman', '2016-08-02', 'javascript3.jpg', '<p>Better UX design with Javascript to rescue front end.</p>\r\n<p>Nulla nec massa semper, feugiat neque et, pretium est. Duis et orci vel augue eleifend dignissim sit amet eget arcu. Integer vel lacus eu justo placerat posuere. Etiam et ultrices mauris. Praesent varius condimentum tellus eu iaculis. Sed viverra odio sit amet lacus molestie imperdiet. Suspendisse egestas scelerisque nunc ac sagittis.</p>\r\n<p>Maecenas sed nisi ut sapien venenatis ultricies. Maecenas vestibulum enim quis libero tempus consectetur. In ullamcorper sed leo id pulvinar. In mollis ut purus pretium sollicitudin. Donec dapibus vulputate imperdiet. Quisque at vehicula nunc. Ut lorem nibh, tempus id dapibus nec, luctus in nibh. Praesent laoreet, urna sed scelerisque vehicula, ipsum risus iaculis ex, eget gravida lorem massa in nulla. Fusce vel gravida felis. Cras volutpat, nulla ac ultrices mattis, est nulla tristique nibh, vitae dapibus urna quam et ligula. Aenean ligula neque, vehicula vulputate metus at, semper accumsan justo. Nam consequat sem a felis ultricies feugiat. Aenean vulputate odio vitae tempor aliquam. Donec dolor enim, sodales quis urna scelerisque, vestibulum interdum dui. Aliquam pulvinar, quam a consectetur mattis, ipsum ipsum consequat purus, in tincidunt odio lorem vel velit. Suspendisse sollicitudin arcu eu velit euismod, eu convallis erat egestas.</p>\r\n<p>Mauris in ante quis eros sodales vehicula quis vitae mi. In lacinia faucibus ultrices. Suspendisse imperdiet ornare nibh, et rhoncus lectus aliquam quis. Quisque efficitur nisi auctor, feugiat augue et, ultrices eros. Mauris venenatis hendrerit mi, et varius nisi ornare in. Morbi consectetur augue quis metus dignissim, quis posuere diam tempus. Sed finibus turpis eget erat efficitur, semper cursus ex scelerisque. Aliquam vestibulum, leo id tristique luctus, ante tortor dignissim sapien, tincidunt dictum sapien tortor vitae mi. Proin non pellentesque nunc. Phasellus nec efficitur felis. Maecenas laoreet sed sapien ut pellentesque. Nulla arcu turpis, molestie vel rutrum congue, commodo nec nisi.</p>\r\n<p>&nbsp;</p>', 'Javascript, JQuery, superman, ux design', 'published', 0);

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
  `user_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_status`) VALUES
(1, 'cms', '$2y$10$p5hWl07aevPRvJQmgHxfSurqN51u5gOtsB.sSDkQADrDsKMIFHSCW', 'A CMS', 'Guy', 'cmsguy@gmail.com', 'cms_guy.png', 'admin', 'approved'),
(2, 'cmsuser', '$2y$10$RUR62D1TE.rG8IRuO3HvG.A4uXZLIAxiWteTLPQQYtvfsXWI20sPq', 'User', 'CMS', 'user@cms.ca', 'user_cms.png', 'subscriber', 'declined'),
(5, 'user', '$2y$10$hmE2GhduRs2R3tpl4HDdxOuIpJwbwzno1oYuYdOxYbqbh2KEUnJU6', 'Bruce', 'Wayne', 'bruce@wayne.ca', 'user_cms.png', 'subscriber', 'approved'),
(7, 'admin', '$2y$10$sOwvksCj0UEglLTRxhQkfuG1F4vt6OvV/X0ydM4OizQ89uGXBFPV2', 'Clark', 'is Superman', 'super@admin.ca', 'user_female.png', 'admin', 'approved'),
(8, 'jane', '$2y$10$yLV/zbIeBgR2L/Mo3mpIIuWvEdr5/3n/AaG5aa1nSjZrmhFm3kwyG', 'Jane', 'Doe', 'jane@doe.ca', 'user_female.png', 'subscriber', 'approved'),
(9, 'testaccount', '$2y$10$FaKsBPXawEo6ccwS4RKbpuBUa4wqAyLPo5Ma2WdrqEj3s3lGb9i4.', 'Test', 'User', 'test@amsdvca.ca', 'user_cms.png', 'subscriber', 'declined'),
(10, 'test1', '$2y$10$f4im8CVPhsoFQJSFrxRe9ennZPxcgTLT3jxDuDBkhJrAcFe4D3Y9C', 'Mr.  X', 'Tester X', 'mrx@hotmail.com', 'new_user.png', 'subscriber', 'declined'),
(11, 'test', '$2y$10$7eUnP1dZE153mSou5Q32r.zuj2nv8r74PNhoVUjSTM/feASFLYrxO', 'Mr. A', 'Tester A', 'mra@xyz.com', 'cms_guy.png', 'subscriber', 'approved'),
(12, 'mrsb', '$2y$10$UFniwuNXZN.qg277e7JNEetSrEDKO41.SDPXd29sEfX9M58Iz.RTq', 'Mrs. B', 'Beautiful', 'mrsb@beautiful.com', 'user_female.png', 'subscriber', 'declined'),
(13, 'xman', '$2y$10$T5OBdgaC/.9qZ84KKo.YSuLc7pTaP0IkNDlPfFG8cMxv6T4fRKr.W', 'X-Men', 'Hero', 'xmen@hero.ca', 'cms_guy.png', 'subscriber', 'approved'),
(14, 'sonic', '$2y$10$lM5vbrBh6zhjJZP3HKRai.82vWWJIGYP835ZxHpzFv9Mh8CbC2y7S', 'Sonic', 'Boom', 'sonic@boom.com', 'user_cms.png', 'subscriber', 'declined'),
(15, 'final', '$2y$10$XfKqXppR.bjwX1o0/s9IiOJDX8Jt0kvPE/SoxGygnmJgiQF280R0K', 'Final', 'Fantasy', 'ffantasy@aaa.com', 'new_user.png', 'subscriber', 'approved');

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
  MODIFY `comment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
