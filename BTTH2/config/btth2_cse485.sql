CREATE DATABASE btth2_cse
CREATE TABLE `cms_user` (
  `id` int(11) NOT NULL PRIMARY KEY auto_increment,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `deleted` int(11) NOT NULL DEFAULT 0
)

CREATE TABLE `cms_category` (
  `id` int(11) NOT NULL PRIMARY KEY auto_increment,
  `name` varchar(100) NOT NULL
)

CREATE TABLE `cms_posts` (
  `id` int(11) NOT NULL PRIMARY KEY auto_increment,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` enum('published','draft','archived','') NOT NULL DEFAULT 'published',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
)
----- INSERT DATA -------
INSERT INTO 'cms_posts' (title, message, )