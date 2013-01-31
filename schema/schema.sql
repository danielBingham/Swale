

CREATE TABLE `books` (
	`id` int unsigned NOT NULL AUTO_INCREMENT,
	`title` var_char(255) NOT NULL,
	`author` var_char(255) NOT NULL,
	`owner` int unsigned NOT NULL,
	PRIMARY KEY (`id`),
	KEY `title` (`title`),
	KEY `owner` (`owner`)
) ENGINE=MyISAM;

CREATE TABLE `loaned_books` (
	`id` int unsigned NOT NULL AUTO_INCREMENT,
	`book_id` int unsigned NOT NULL,
	`user_id` int unsigned NOT NULL,
	PRIMARY KEY (`id`),
	KEY `book_id` (`book_id`),
	KEY `user_id` (`user_id`)
) ENGINE=MyISAM;

CREATE TABLE `users` (
	`id` int unsigned NOT NULL AUTO_INCREMENT,
	`email` var_char(255),
	`display_name` var_char(255),
	PRIMARY KEY (`id`),
	KEY `email` (`email`)
) ENGINE=MyISAM;
