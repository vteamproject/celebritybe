-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `cb_offers`;
CREATE TABLE `cb_offers` (
  `offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(18) NOT NULL,
  `discount` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `active_on` datetime NOT NULL,
  `expiry_on` datetime NOT NULL,
  `code_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `cb_plans`;
CREATE TABLE `cb_plans` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(55) NOT NULL,
  `plan_desc` text NOT NULL,
  `plan_duration` int(11) NOT NULL,
  `plan_duration_in` enum('day','month','year') NOT NULL,
  `plan_price` decimal(10,0) NOT NULL,
  `plan_offer` int(11) NOT NULL,
  `plan_added_on` datetime NOT NULL,
  `plan_modified_on` datetime NOT NULL,
  `plan_modified_by` int(11) NOT NULL,
  `plan_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `cb_setting`;
CREATE TABLE `cb_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_type` varchar(255) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL,
  `setting_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cb_setting` (`setting_id`, `setting_type`, `setting_name`, `setting_value`, `added_on`, `modified_on`, `setting_status`) VALUES
(1,	'subscription_type',	'free',	'',	'2017-11-26 17:24:15',	'2017-11-26 17:24:15',	0),
(2,	'subscription_type',	'paid',	'',	'2017-11-26 17:24:55',	'2017-11-26 17:24:55',	0),
(3,	'subscription_type',	'offer',	'',	'2017-11-26 17:24:55',	'2017-11-26 17:24:55',	0),
(4,	'talents_category',	'Actor',	'',	'2017-12-03 16:29:58',	'2017-12-03 16:29:58',	1),
(5,	'talents_category',	'Actress',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(6,	'talents_category',	'Models',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(7,	'talents_category',	'Singer',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(8,	'talents_category',	'Music Director',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(9,	'talents_category',	'Lyricist',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(10,	'talents_category',	'Director',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(11,	'talents_category',	'Cinematographer',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(12,	'talents_category',	'Photographer',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(13,	'talents_category',	'Editor',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(14,	'talents_category',	'DI / Effects',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(15,	'talents_category',	'Foley Artist',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(16,	'talents_category',	'Script Writer',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(17,	'talents_category',	'Story',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(18,	'talents_category',	'TV Show',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(19,	'talents_category',	'TV Artist',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(20,	'talents_category',	'Art Director',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(21,	'talents_category',	'Dancers',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(22,	'talents_category',	'Dance Masters',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(23,	'talents_category',	'Stunt Masters',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(24,	'talents_category',	'Dubbing Artists',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(25,	'talents_category',	'Poster Designer',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(26,	'talents_category',	'Events Anchor',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(27,	'talents_category',	'Makeup Man',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(28,	'talents_category',	'Costume Designer',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(29,	'talents_category',	'Hair Stylist',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(30,	'talents_category',	'PRO',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1),
(31,	'talents_category',	'Movie Promoters',	'',	'2017-12-03 16:38:55',	'2017-12-03 16:38:55',	1);

DROP TABLE IF EXISTS `cb_subscriptions`;
CREATE TABLE `cb_subscriptions` (
  `subscription_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `purchased_on` datetime NOT NULL,
  `started_on` datetime NOT NULL,
  `ends_on` datetime NOT NULL,
  `subscription_type` int(11) NOT NULL COMMENT 'this value is based on offers, values from configs config_type subscription_type',
  `payment_method` int(11) NOT NULL,
  `subscription_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`subscription_id`),
  KEY `user_id` (`user_id`),
  KEY `plan_id` (`plan_id`),
  CONSTRAINT `cb_subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `cb_users` (`user_id`),
  CONSTRAINT `cb_subscriptions_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `cb_plans` (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `cb_users`;
CREATE TABLE `cb_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT 'Specify the type user',
  `created_on` datetime NOT NULL,
  `login_attempts` int(11) NOT NULL,
  `ip_address` varchar(55) NOT NULL,
  `browser_type` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `user_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cb_users` (`user_id`, `user_name`, `password`, `user_type`, `created_on`, `login_attempts`, `ip_address`, `browser_type`, `is_deleted`, `user_status`) VALUES
(1,	'vcbose',	'$2y$10$TelpxMksHrM5gNjHePMqmeGpOA.4Q366W8YDyUJtTOKFSlAyW0/gO',	1,	'2017-11-28 23:11:16',	0,	'',	'',	0,	1);

DROP TABLE IF EXISTS `cb_user_details`;
CREATE TABLE `cb_user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(55) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `nationality` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(55) NOT NULL,
  `mobile` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `associations` varchar(255) NOT NULL COMMENT 'this will hold the different film industries in india',
  `talent_category` int(11) NOT NULL COMMENT 'type of talent',
  `description` text NOT NULL COMMENT 'profile notes',
  `tags_interest` text NOT NULL,
  `photos` text NOT NULL COMMENT 'photo links',
  `videos` text NOT NULL COMMENT 'video links',
  `links` text NOT NULL COMMENT 'external reference links',
  `experiance` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `cb_user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `cb_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `cb_user_roles`;
CREATE TABLE `cb_user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(55) NOT NULL,
  `role_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `cb_user_roles_permissions`;
CREATE TABLE `cb_user_roles_permissions` (
  `perm_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `resource` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  `permission` tinyint(4) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`perm_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `cb_user_roles_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `cb_user_roles` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2017-12-13 17:25:32
