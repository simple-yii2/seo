create table if not exists `Seo`
(
	`id` int(10) not null auto_increment,
	`url` varchar(200),
	`title` varchar(100) default null,
	`keywords` varchar(100) default null,
	`description` varchar(200) default null,
	`snippet` varchar(200) default null,
	`lastViewed` datetime default null,
	primary key (`id`),
	key `url` (`url`)
) engine InnoDB;
