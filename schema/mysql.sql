create table if not exists `Seo`
(
	`id` int(10) not null auto_increment,
	`path` varchar(200),
	`title` varchar(100) default null,
	`keywords` varchar(100) default null,
	`description` varchar(200) default null,
	`lastViewed` datetime default null,
	primary key (`id`),
	key `path` (`path`)
) engine InnoDB;
