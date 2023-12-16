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
SELECT * FROM  `cms_category`
insert into cms_user (id, first_name, last_name, email, password) values (1, 'Cassie', 'Lillico', 'clillico0@businessweek.com', '$2a$04$vN3PFIQhR8Zpnhea3HhES.vc.4mEtKKmpV4WNxQO3OHuR3hooQ/GG');
insert into cms_user (id, first_name, last_name, email, password) values (2, 'Bud', 'Twyning', 'btwyning1@i2i.jp', '$2a$04$xgAtuArks9cf6SuU9PXpROYLKWh57CstqJprVreMWvgmiQ8yUCcG.');
insert into cms_user (id, first_name, last_name, email, password) values (3, 'Jenda', 'Lynthal', 'jlynthal2@cocolog-nifty.com', '$2a$04$yQKJgTiDEKCIVGH3k4LFouKt6GAD8ttQ3LDkZPH7UaqteB.We1QO.');
insert into cms_user (id, first_name, last_name, email, password) values (4, 'Susan', 'Crass', 'scrass3@dell.com', '$2a$04$v9Nnas4Js9MzLAL7ZUY6beuRHuwzlNCGDR/3MR1qU4IFR35JATUkq');
insert into cms_user (id, first_name, last_name, email, password) values (5, 'Angus', 'Lampert', 'alampert4@ucla.edu', '$2a$04$C/iIUjIRuaiaJVVLh8GYs.YEUsm7SNgYseur0n/Zh/gZrI43a8aVW');
insert into cms_user (id, first_name, last_name, email, password) values (6, 'Cristi', 'Edlin', 'cedlin5@yellowbook.com', '$2a$04$XfhTbidYgbkzdO..q1dk3OA8QdH5fKM/L5a06IghUmI2YuMDnlA5e');
insert into cms_user (id, first_name, last_name, email, password) values (7, 'Giffy', 'Foucar', 'gfoucar6@prnewswire.com', '$2a$04$fb/3iwd3gnXAJIPpMoHpq.IaP1YmEMXtHNiz0fIBieHxZKcuh0wR6');
insert into cms_user (id, first_name, last_name, email, password) values (8, 'Aleen', 'Doige', 'adoige7@theguardian.com', '$2a$04$sso/H1BH.gI0fjXyB98/3egnQmtZmLs0/iXclUJkzB1plSxW7FCou');
insert into cms_user (id, first_name, last_name, email, password) values (9, 'Anette', 'McIlriach', 'amcilriach8@wsj.com', '$2a$04$XyBszCNZNKRNLH3MXj98SOGGHfFh/4BMzfLmeMvDv6UJjZ5Sp3WY6');
insert into cms_user (id, first_name, last_name, email, password) values (10, 'Julia', 'Abrahamsen', 'jabrahamsen9@mlb.com', '$2a$04$7PHh2sF8S3knbvQpOuHT.uT535YGMJAJS9nxYs.52ZtCNtJoiNONi');
insert into cms_user (id, first_name, last_name, email, password) values (11, 'Moria', 'Ruckledge', 'mruckledgea@1und1.de', '$2a$04$Wa.6J1MX6Lkiy9wWns6QQuVpful2INL8gdACkKD.U0ngahhpwuqy6');
insert into cms_user (id, first_name, last_name, email, password) values (12, 'Elston', 'Zanelli', 'ezanellib@arstechnica.com', '$2a$04$FDDbbZCBRsMt.jJMh1ypQ.7W.Qq1x5zX1fuPU4b7LipS3IX4IqrRq');
insert into cms_user (id, first_name, last_name, email, password) values (13, 'Gare', 'Guare', 'gguarec@craigslist.org', '$2a$04$CZ/8lZ8kDR9dSjorvkG9uushbQnVyicIUhMaPnuj7jswGygQJrJQS');
insert into cms_user (id, first_name, last_name, email, password) values (14, 'Arlana', 'Spruce', 'aspruced@photobucket.com', '$2a$04$RCuchACR4oRPeMZNXzTJlu59B1su72QcNmU.mIaf27pITJzEpbQ7q');
insert into cms_user (id, first_name, last_name, email, password) values (15, 'Klaus', 'Laugharne', 'klaugharnee@kickstarter.com', '$2a$04$dfLDPbnJpuwNzMhowDqr.eem4.IT1gyJxtkhMRX6eswSezfmyWTey');
insert into cms_user (id, first_name, last_name, email, password) VALUES (17, 'AT', 'Luyen', 'at@gmail.com', '$2y$10$CrcQfUYdJKO3GnMZtNOtCeaKcZafkYnSGkxhSrEzvFfpXSW3Ll0J.');

insert into cms_category (id, name) values (1, 'Roofing (Asphalt)');
insert into cms_category (id, name) values (2, 'Roofing (Asphalt)');
insert into cms_category (id, name) values (3, 'Glass & Glazing');
insert into cms_category (id, name) values (4, 'Hard Tile & Stone');
insert into cms_category (id, name) values (5, 'Termite Control');
insert into cms_category (id, name) values (6, 'Retaining Wall and Brick Pavers');
insert into cms_category (id, name) values (7, 'Epoxy Flooring');
insert into cms_category (id, name) values (8, 'Asphalt Paving');
insert into cms_category (id, name) values (9, 'Exterior Signage');
insert into cms_category (id, name) values (10, 'Sitework & Site Utilities');
insert into cms_category (id, name) values (11, 'Sitework & Site Utilities');
insert into cms_category (id, name) values (12, 'Granite Surfaces');
insert into cms_category (id, name) values (13, 'Curb & Gutter');
insert into cms_category (id, name) values (14, 'Construction Clean and Final Clean');
insert into cms_category (id, name) values (15, 'Termite Control');

insert into cms_posts (id, title, message, category_id, userid) values (1, 'Pig Hunt ', 1, 1, 1);
insert into cms_posts (id, title, message, category_id, userid) values (2, 'Circles (Krugovi)', 0, 2, 2);
insert into cms_posts (id, title, message, category_id, userid) values (3, 'Artists and Models', 1, 3, 3);
insert into cms_posts (id, title, message, category_id, userid) values (4, 'Gold of Rome (L''oro di Roma)', 0, 4, 4);
insert into cms_posts (id, title, message, category_id, userid) values (5, 'Thieves Like Us', 0, 5, 5);
insert into cms_posts (id, title, message, category_id, userid) values (6, 'King of the Ants', 0, 6, 6);
insert into cms_posts (id, title, message, category_id, userid) values (7, 'Night and Day', 1, 7, 7);
insert into cms_posts (id, title, message, category_id, userid) values (8, 'Bridesmaid, The (Demoiselle d''honneur, La)', 0, 8, 8);
insert into cms_posts (id, title, message, category_id, userid) values (9, 'Billy Budd', 0, 9, 9);
insert into cms_posts (id, title, message, category_id, userid) values (10, 'Fun in Acapulco', 0, 10, 10);
insert into cms_posts (id, title, message, category_id, userid) values (11, 'Legion', 1, 11, 11);
insert into cms_posts (id, title, message, category_id, userid) values (12, 'Center Stage (Ruan Lingyu) (Actress, The) (New China Woman, The)', 1, 12, 12);
insert into cms_posts (id, title, message, category_id, userid) values (13, 'Quantum of Solace', 0, 13, 13);
insert into cms_posts (id, title, message, category_id, userid) values (14, 'Against the Current', 1, 14, 14);
insert into cms_posts (id, title, message, category_id, userid) values (15, 'Blueprint for Murder, A', 1, 15, 15);