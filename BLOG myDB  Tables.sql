-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 08:46 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `Timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`bid`, `uid`, `name`, `title`, `description`, `Timestamp`, `published`) VALUES
(1, 3, 'Keval Morabia', 'B for Blog - Blog 5', 'I started creating websites back around 2005.  Im not a techno geek type at all, but I was able to figure things out and get some profitable sites set up.  Many friends and relatives have shown an interest in my projects over the years.  This is mostly because they noticed that I was making some money from my ventures.  I willingly explained every step of setting up a site to them, but most of them are scared to get started because they dont know where to start. This website is being built as an example for my friends.  Sometimes a picture is worth a thousand words at least.  Im hoping that this sites will provide the motivation, direction, and instructions they need to get themselves up and running with a blog of their very own.  If anyone else happens upon this site, Id love to hear about what you found useful and what you think could use a tweak here and there.', '2017-06-12 17:38:20', 1),
(2, 3, 'Keval Morabia', 'Blog 2', 'There is no description of this blog. I started creating websites back around 2005.  Im not a techno geek type at all, but I was able to figure things out and get some profitable sites set up.  Many friends and relatives have shown an interest in my projects over the years.  This is mostly because they noticed that I was making some money from my ventures.  I willingly explained every step of setting up a site to them, but most of them are scared to get started because they dont know where to start. This website is being built as an example for my friends.  Sometimes a picture is worth a thousand words at least.  Im hoping that this sites will provide the motivation, direction, and instructions they need to get themselves up and running with a blog of their very own.  If anyone else happens upon this site, Id love to hear about what you found useful and what you think could use a tweak here and there.', '2017-06-12 16:33:02', 0),
(3, 5, 'KM', 'Blog 3', 'Description coming soon. I started creating websites back around 2005.  Im not a techno geek type at all, but I was able to figure things out and get some profitable sites set up.  Many friends and relatives have shown an interest in my projects over the years.  This is mostly because they noticed that I was making some money from my ventures.  I willingly explained every step of setting up a site to them, but most of them are scared to get started because they dont know where to start. This website is being built as an example for my friends.  Sometimes a picture is worth a thousand words at least.  Im hoping that this sites will provide the motivation, direction, and instructions they need to get themselves up and running with a blog of their very own.  If anyone else happens upon this site, Id love to hear about what you found useful and what you think could use a tweak here and there.', '2017-06-12 16:33:21', 1),
(4, 3, 'Keval Morabia', 'Blog No. 4', 'Sometimes we over analyze things to the point of paralyzing ourselves.  For some reason, we think that every new project we take on has to result in perfection.  I think this is a big reason why many potentially wonderful bloggers end up passing on the opportunity to set up their own website.  So many questions come up and there is no one trustworthy to ask.  Id like this blog to be a source of quality information that you can trust, but Id also like it to be the motivational kick in the pants you need to get you to stop questioning every darn thing you consider trying.', '2017-06-12 17:37:42', 1),
(5, 3, 'Keval Morabia', 'The Best Short Stories for Teenagers', 'When you think of short stories for teenagers, there are some classic titles that come up. I still remember reading many of these in middle school and high school simply because they were such good stories. The teachers loved them because they readily lent themselves to critical analysis. I just knew that I enjoyed them. Today, classic short stories hold a special place in my heart as a parent and teacher because they can grab a reader by their imagination almost instantly transport them to a different place and time. There isnt room for a lot of fluff, and thats a very good thing when you are trying to get the attention of a teenager with a million other distractions surrounding them. Im including some newer titles here as well and I hope youll check them out if you havent already. You might also want to check out this list of short stories for teenagers. By the way, these are great for adults too  This is really just a starter list of classic short stories for teens, so please feel free to share your favorites in the comments.', '2017-06-12 17:38:58', 1),
(6, 5, 'KM', 'Why Havent YOU Started a Blog Yet?', 'In case you havent noticed, a LOT of people have already started blogs.  Some people write about very specific interests, and some prefer to keep things general.  As a rule, if you want to get noticed by the search engines, youre better off starting with some type of focus, but if you prefer to go general, theres certainly nothing stopping you except possibly your fear of the unknown. You can start a blog for free if you really want to get your message out to the world.', '2017-06-12 15:21:30', 1),
(9, 3, 'Keval Morabia', 'blob blog blog', 'blob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blogblob blog blog', '2017-06-14 14:06:51', 0),
(10, 6, 'MORABIA KEVAL MAHENDRA', 'My blog after making the very good website', 'input typebutton classcol-sm-2 btn btn-primary onclickview valueSearch blogs by user stylefloatright margin-right50pxinput typebutton classcol-sm-2 btn btn-primary onclickview valueSearch blogs by user stylefloatright margin-right50pxinput typebutton classcol-sm-2 btn btn-primary onclickview valueSearch blogs by user stylefloatright margin-right50pxinput typebutton classcol-sm-2 btn btn-primary onclickview valueSearch blogs by user stylefloatright margin-right50pxinput typebutton classcol-sm-2 btn btn-primary onclickview valueSearch blogs by user stylefloatright margin-right50pxinput typebutton classcol-sm-2 btn btn-primary onclickview valueSearch blogs by user stylefloatright margin-right50pxinput typebutton classcol-sm-2 btn btn-primary onclickview valueSearch blogs by user stylefloatrightinput typebutton classcol-sm-2 btn btn-primary onclickview valueSearch blogs by user stylefloatright margin-right50px', '2017-06-14 16:10:14', 1),
(25, 3, 'Keval Morabia', 'one more blog', 'one more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blogone more blog', '2017-06-14 16:50:24', 0),
(28, 5, 'KM', 'CKEditor Blog', '<p>Keval Morabia</p>\n\n<p><img alt=\"\" src=\"https://yt3.ggpht.com/-SSUEO2NTUtE/AAAAAAAAAAI/AAAAAAAAAAA/qHH4mVXGUkk/s900-c-k-no-mo-rj-c0xffffff/photo.jpg\" style=\"height:200px; width:200px\" /></p>\n\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\n	<tbody>\n		<tr>\n			<td>keval</td>\n			<td>keval</td>\n		</tr>\n		<tr>\n			<td>morabia</td>\n			<td>wat</td>\n		</tr>\n		<tr>\n			<td>consult</td>\n			<td>ps1</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>\n', '2017-07-05 14:34:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog-user`
--

CREATE TABLE `blog-user` (
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog-user`
--

INSERT INTO `blog-user` (`uid`, `name`, `password`, `email`) VALUES
(0, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin@admin.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `blog-user`
--
ALTER TABLE `blog-user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `blog-user`
--
ALTER TABLE `blog-user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
