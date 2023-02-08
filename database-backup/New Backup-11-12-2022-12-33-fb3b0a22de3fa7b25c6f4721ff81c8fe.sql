DROP TABLE IF EXISTS admin_users;

CREATE TABLE `admin_users` (
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `last_logon` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `no_logon` int(11) NOT NULL DEFAULT '0',
  `fname` varchar(32) NOT NULL DEFAULT '',
  `lname` varchar(32) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `usertype` int(1) NOT NULL DEFAULT '0',
  `email` varchar(64) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `added_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS all_jobs;

CREATE TABLE `all_jobs` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(150) NOT NULL,
  `details` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS blog_fav_list;

CREATE TABLE `blog_fav_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `blog_id` int(8) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS blog_mst;

CREATE TABLE `blog_mst` (
  `blog_id` int(4) NOT NULL AUTO_INCREMENT,
  `domain` varchar(100) NOT NULL,
  `niche` varchar(40) NOT NULL,
  `da` decimal(5,2) NOT NULL,
  `pa` int(3) NOT NULL,
  `cf` decimal(5,0) NOT NULL,
  `tf` decimal(5,2) NOT NULL,
  `gip` int(6) NOT NULL,
  `mozr` int(2) NOT NULL,
  `alexa_traffic` int(12) NOT NULL,
  `organic_trafic` int(12) NOT NULL,
  `follow` varchar(8) NOT NULL,
  `internal` tinyint(1) NOT NULL,
  `cost` int(4) NOT NULL,
  `review_type` tinyint(1) NOT NULL,
  `issue` tinyint(1) NOT NULL,
  `issue_comment` varchar(150) DEFAULT NULL,
  `int_email` varchar(100) DEFAULT NULL,
  `ext_email` varchar(100) DEFAULT NULL,
  `ext_contact_name` varchar(100) DEFAULT NULL,
  `ext_cost` int(4) DEFAULT NULL,
  `ex_url` varchar(200) NOT NULL,
  `domain_comments` varchar(200) DEFAULT NULL,
  `deliver_time` decimal(10,0) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_on` date NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `updated_on` date NOT NULL,
  `approved` varchar(4) NOT NULL,
  PRIMARY KEY (`blog_id`),
  UNIQUE KEY `domain` (`domain`),
  KEY `updated_by` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=1050 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS cities;

CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=604 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS contact;

CREATE TABLE `contact` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(35) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_phone` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS countries;

CREATE TABLE `countries` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `country_code` char(2) NOT NULL DEFAULT '',
  `country_name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS customer;

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_type` enum('1','2','3') NOT NULL DEFAULT '1',
  `member_id` varchar(32) NOT NULL DEFAULT '0',
  `user_name` varchar(64) NOT NULL DEFAULT '',
  `email` varchar(96) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `billing_name` varchar(100) NOT NULL,
  `fname` varchar(32) NOT NULL DEFAULT '',
  `lname` varchar(32) NOT NULL DEFAULT '',
  `gender` enum('male','female','na') NOT NULL DEFAULT 'na',
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `status` enum('a','d') NOT NULL DEFAULT 'a',
  `image` varchar(128) NOT NULL DEFAULT '',
  `brief` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `organization` varchar(128) NOT NULL DEFAULT '',
  `featured` enum('Y','N') NOT NULL DEFAULT 'N',
  `profession` varchar(32) NOT NULL DEFAULT '',
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `verification_no` varchar(64) DEFAULT NULL,
  `acc_verified` enum('Y','N') NOT NULL DEFAULT 'N',
  `verified_by` varchar(128) DEFAULT NULL,
  `verified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `discount_offered` float(4,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`customer_id`),
  FULLTEXT KEY `full_index_cus` (`member_id`,`user_name`,`email`,`fname`,`lname`,`image`,`brief`,`description`,`organization`,`profession`,`verification_no`,`verified_by`)
) ENGINE=MyISAM AUTO_INCREMENT=232 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS customer_address;

CREATE TABLE `customer_address` (
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `address1` varchar(64) NOT NULL DEFAULT '',
  `address2` varchar(64) NOT NULL DEFAULT '',
  `address3` varchar(64) NOT NULL DEFAULT '',
  `town` varchar(128) NOT NULL DEFAULT '0',
  `province` varchar(128) NOT NULL DEFAULT '0',
  `postal_code` varchar(16) NOT NULL DEFAULT '',
  `countries_id` int(3) NOT NULL DEFAULT '0',
  `phone1` varchar(20) NOT NULL DEFAULT '',
  `phone2` varchar(20) NOT NULL DEFAULT '',
  `fax` varchar(20) NOT NULL DEFAULT '',
  `mobile` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`customer_id`),
  FULLTEXT KEY `full_index_address` (`address1`,`address2`,`address3`,`town`,`province`,`postal_code`,`phone1`,`phone2`,`fax`,`mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS customer_info;

CREATE TABLE `customer_info` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `no_logon` int(11) NOT NULL DEFAULT '0',
  `last_logon` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `added_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`info_id`)
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS customer_type;

CREATE TABLE `customer_type` (
  `customer_type_id` int(3) NOT NULL AUTO_INCREMENT,
  `parent_id` int(5) NOT NULL DEFAULT '0',
  `cus_type` varchar(64) NOT NULL,
  `cus_type_code` varchar(16) NOT NULL,
  `remarks` mediumtext,
  `images` varchar(255) DEFAULT NULL,
  `added_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`customer_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS email_autores_setup;

CREATE TABLE `email_autores_setup` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `email_autores_setup_id` int(8) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email_from` varchar(80) NOT NULL,
  `footer` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL,
  `modified_on` datetime NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS email_autoresonder_type;

CREATE TABLE `email_autoresonder_type` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `email_autoresponder_type_id` varchar(150) NOT NULL,
  `title` varchar(255) NOT NULL,
  `constant_code` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` varchar(30) NOT NULL,
  `modified_on` datetime NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS email_details;

CREATE TABLE `email_details` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `from_email` varchar(255) NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `to_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS email_subscriber;

CREATE TABLE `email_subscriber` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `customer_id` int(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `company` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `status` varchar(12) NOT NULL,
  `modified_by` varchar(16) NOT NULL,
  `modified_on` datetime NOT NULL,
  `added_by` varchar(16) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS employees;

CREATE TABLE `employees` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `doj` time NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pin` int(7) NOT NULL,
  `image` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `linkedin` varchar(355) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS faqs;

CREATE TABLE `faqs` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `question` varchar(1555) NOT NULL,
  `ans` varchar(1555) NOT NULL,
  `page` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS gp_offer_list;

CREATE TABLE `gp_offer_list` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `domain` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `niche` varchar(50) NOT NULL,
  `da` int(3) NOT NULL,
  `pa` int(3) NOT NULL,
  `spam` int(3) NOT NULL,
  `tf` int(3) NOT NULL,
  `gip` int(3) NOT NULL,
  `mozr` bigint(18) NOT NULL,
  `alexa_traffic` bigint(18) NOT NULL,
  `organic_traffic` float NOT NULL,
  `follow` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `updated_on` datetime NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS hits_counter;

CREATE TABLE `hits_counter` (
  `Count_Id` bigint(255) NOT NULL AUTO_INCREMENT,
  `Count` int(11) NOT NULL DEFAULT '0',
  `added_on` date NOT NULL DEFAULT '0000-00-00',
  `month_year` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`Count_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS niche_master;

CREATE TABLE `niche_master` (
  `niche_id` int(4) NOT NULL AUTO_INCREMENT,
  `niche_name` varchar(75) DEFAULT NULL,
  `seo_url` varchar(180) NOT NULL,
  `added_on` date NOT NULL,
  `added_by` varchar(30) NOT NULL,
  `modified_on` date NOT NULL,
  `modified_by` varchar(30) NOT NULL,
  PRIMARY KEY (`niche_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS order_details;

CREATE TABLE `order_details` (
  `order_id` int(8) NOT NULL AUTO_INCREMENT,
  `clientUserId` int(100) NOT NULL,
  `clientName` varchar(50) NOT NULL,
  `clientEmail` varchar(80) NOT NULL,
  `clientOrderedSite` varchar(300) NOT NULL,
  `clientTargetUrl` varchar(400) NOT NULL,
  `clientAnchorText` varchar(300) NOT NULL,
  `clientContent` varchar(5000) NOT NULL,
  `clientRequirement` varchar(2000) NOT NULL,
  `clientOrderPrice` varchar(200) NOT NULL,
  `clientTransactionId` varchar(255) NOT NULL,
  `paymentStatus` varchar(14) NOT NULL,
  `clientOrderStatus` int(255) NOT NULL,
  `changesReq` int(6) NOT NULL,
  `deliveredLink` varchar(300) NOT NULL,
  `delivered_date` varchar(30) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=328 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS order_transections;

CREATE TABLE `order_transections` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `order_id` int(8) NOT NULL,
  `transection_id` varchar(255) NOT NULL,
  `transection_mode` varchar(50) NOT NULL,
  `item_amount` decimal(8,0) NOT NULL,
  `paid_amount` decimal(8,0) NOT NULL,
  `t_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `transection_by` varchar(150) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS order_updates;

CREATE TABLE `order_updates` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `order_id` int(8) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `dsc` varchar(100) NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS orders_status;

CREATE TABLE `orders_status` (
  `orders_status_id` int(11) NOT NULL,
  `orders_status_name` varchar(32) NOT NULL DEFAULT '',
  `sort_order` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`orders_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS portfolio;

CREATE TABLE `portfolio` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `portfolio_type` varchar(30) NOT NULL,
  `niche` varchar(50) NOT NULL,
  `name` varchar(60) NOT NULL,
  `url` varchar(70) NOT NULL,
  `image` varchar(70) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS portfolio_details;

CREATE TABLE `portfolio_details` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `portfolio_type` varchar(40) NOT NULL,
  `details` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS product_featured;

CREATE TABLE `product_featured` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `product_id` int(20) NOT NULL,
  `featured` varchar(120) NOT NULL,
  `added_by` varchar(30) NOT NULL,
  `added_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS product_type;

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type` varchar(120) NOT NULL,
  `seo_url` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `added_by` varchar(30) NOT NULL,
  `added_on` date NOT NULL,
  `modified_by` varchar(30) NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS products;

CREATE TABLE `products` (
  `id` int(21) NOT NULL AUTO_INCREMENT,
  `product_type_id` int(11) NOT NULL,
  `product_name` varchar(180) NOT NULL,
  `band` varchar(60) NOT NULL,
  `platform` varchar(30) NOT NULL,
  `dev_langues` varchar(60) NOT NULL,
  `version` varchar(30) NOT NULL,
  `proj_url` varchar(200) NOT NULL,
  `download_link` varchar(220) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `client_price` decimal(10,2) NOT NULL,
  `sales_price` decimal(10,2) NOT NULL,
  `offer` decimal(6,3) NOT NULL,
  `service_period` int(4) NOT NULL,
  `service_unit` varchar(8) NOT NULL,
  `services` varchar(200) NOT NULL,
  `sales_status` varchar(16) NOT NULL,
  `approved` varchar(5) NOT NULL,
  `page_title` varchar(260) NOT NULL,
  `url` varchar(128) NOT NULL,
  `seo_url` varchar(260) NOT NULL,
  `meta_tags` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `num_click` int(20) NOT NULL,
  `added_by` int(20) NOT NULL,
  `added_on` date NOT NULL,
  `modified_by` varchar(30) NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS service_cat;

CREATE TABLE `service_cat` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(120) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `url` varchar(80) NOT NULL,
  `added_by` varchar(30) NOT NULL,
  `added_on` date NOT NULL,
  `modified_by` varchar(30) NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS service_featured;

CREATE TABLE `service_featured` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `services_id` int(5) NOT NULL,
  `featued_name` varchar(60) NOT NULL,
  `desc` text NOT NULL,
  `images` varchar(80) NOT NULL,
  `position` varchar(8) NOT NULL,
  `added_by` varchar(30) NOT NULL,
  `added_on` date NOT NULL,
  `modified_by` varchar(30) NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS services;

CREATE TABLE `services` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `service_cat_id` int(5) NOT NULL,
  `service_name` varchar(60) NOT NULL,
  `service_desc` text NOT NULL,
  `page_title` varchar(80) NOT NULL,
  `image` varchar(150) NOT NULL,
  `seo_url` varchar(80) NOT NULL,
  `meta_title` varchar(70) NOT NULL,
  `meta_tags` varchar(280) NOT NULL,
  `meta_desc` varchar(280) NOT NULL,
  `canonical` varchar(80) NOT NULL,
  `sort_order` int(5) NOT NULL,
  `added_by` varchar(30) NOT NULL,
  `added_on` date NOT NULL,
  `modified_by` varchar(30) NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS states;

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS static;

CREATE TABLE `static` (
  `static_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) DEFAULT '0',
  `parent_static_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(128) COLLATE latin1_general_ci DEFAULT '',
  `page_title` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `seo_url` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(128) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `brief` mediumtext COLLATE latin1_general_ci,
  `description` text COLLATE latin1_general_ci,
  `image` varchar(255) COLLATE latin1_general_ci DEFAULT '',
  `image_title` varchar(130) COLLATE latin1_general_ci DEFAULT '',
  `image_position` enum('left','center','right') COLLATE latin1_general_ci DEFAULT 'left',
  `display_width` int(4) DEFAULT '200',
  `display_height` int(4) DEFAULT '200',
  `video` varchar(255) COLLATE latin1_general_ci DEFAULT '',
  `upload_video` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `meta_title` varchar(128) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `meta_keywords` varchar(255) COLLATE latin1_general_ci DEFAULT '',
  `meta_description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `display_banner` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `dis_slide_show` enum('Y','N') CHARACTER SET greek NOT NULL DEFAULT 'N',
  `status` enum('a','d') COLLATE latin1_general_ci DEFAULT 'a',
  `sort_order` int(4) DEFAULT '0',
  `added_on` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime DEFAULT '0000-00-00 00:00:00',
  `canonical` tinytext COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`static_id`),
  FULLTEXT KEY `full_index_static` (`title`,`page_title`,`seo_url`,`brief`,`description`,`image`,`image_title`,`video`,`meta_title`,`meta_keywords`,`meta_description`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE IF EXISTS static_banner;

CREATE TABLE `static_banner` (
  `static_banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `static_id` int(11) NOT NULL,
  `banner_title` varchar(128) DEFAULT NULL,
  `description` text NOT NULL,
  `banner_url` varchar(255) DEFAULT NULL,
  `open_in` enum('Same Window','Different Window') NOT NULL DEFAULT 'Same Window',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `status` enum('a','d') NOT NULL DEFAULT 'd',
  `sort_order` int(3) NOT NULL DEFAULT '1',
  `added_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`static_banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS static_bn;

CREATE TABLE `static_bn` (
  `static_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) DEFAULT '0',
  `parent_static_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(128) COLLATE latin1_general_ci DEFAULT '',
  `page_title` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `seo_url` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(128) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `brief` mediumtext COLLATE latin1_general_ci,
  `description` text COLLATE latin1_general_ci,
  `image` varchar(255) COLLATE latin1_general_ci DEFAULT '',
  `image_title` varchar(130) COLLATE latin1_general_ci DEFAULT '',
  `image_position` enum('left','center','right') COLLATE latin1_general_ci DEFAULT 'left',
  `display_width` int(4) DEFAULT '200',
  `display_height` int(4) DEFAULT '200',
  `video` varchar(255) COLLATE latin1_general_ci DEFAULT '',
  `upload_video` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `meta_title` varchar(128) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `meta_keywords` varchar(255) COLLATE latin1_general_ci DEFAULT '',
  `meta_description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `display_banner` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `dis_slide_show` enum('Y','N') CHARACTER SET greek NOT NULL DEFAULT 'N',
  `status` enum('a','d') COLLATE latin1_general_ci DEFAULT 'a',
  `sort_order` int(4) DEFAULT '0',
  `added_on` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`static_id`),
  FULLTEXT KEY `full_index_static` (`title`,`page_title`,`seo_url`,`brief`,`description`,`image`,`image_title`,`video`,`meta_title`,`meta_keywords`,`meta_description`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE IF EXISTS static_categories;

CREATE TABLE `static_categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(128) NOT NULL DEFAULT '',
  `seo_url` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `brief` varchar(128) NOT NULL DEFAULT '',
  `page_title` varchar(128) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `categories_image` varchar(255) NOT NULL DEFAULT '',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`categories_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS static_detail;

CREATE TABLE `static_detail` (
  `static_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `static_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `brief` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `image_title` varchar(128) NOT NULL DEFAULT '',
  `image_position` enum('left','center','right') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'left',
  `display_width` int(4) NOT NULL DEFAULT '200',
  `display_height` int(4) NOT NULL DEFAULT '200',
  `added_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`static_detail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS static_download;

CREATE TABLE `static_download` (
  `static_download_id` int(11) NOT NULL AUTO_INCREMENT,
  `static_id` int(11) NOT NULL,
  `download_title` varchar(255) NOT NULL,
  `download_file` varchar(255) DEFAULT NULL,
  `page_position` enum('top','bottom','both') NOT NULL DEFAULT 'bottom',
  `link_alignment` enum('left','right','center') NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'a',
  `sort_order` int(5) NOT NULL DEFAULT '1',
  `added_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`static_download_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS static_image;

CREATE TABLE `static_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `static_id` int(11) NOT NULL DEFAULT '0',
  `image_name` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `added_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS static_review;

CREATE TABLE `static_review` (
  `static_review_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `static_id` int(11) DEFAULT '0',
  `customer_id` int(11) DEFAULT '0',
  `email` varchar(128) NOT NULL DEFAULT '',
  `customer_name` varchar(128) DEFAULT '',
  `reviews_rating` int(1) DEFAULT '0',
  `reviews_subject` varchar(255) DEFAULT '',
  `reviews_text` text,
  `status` enum('a','d') DEFAULT 'd',
  `reviews_read` int(5) DEFAULT '0',
  `review_likes` int(11) DEFAULT '0',
  `review_dislikes` int(11) DEFAULT '0',
  `sort_order` int(3) DEFAULT '10',
  `ip_address` varchar(32) DEFAULT NULL,
  `added_on` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`static_review_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS training_table;

CREATE TABLE `training_table` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `educational_qualification` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS wishlist_buyer;

CREATE TABLE `wishlist_buyer` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `userId` int(120) NOT NULL,
  `blog_id` int(50) NOT NULL,
  `domain_name` varchar(100) NOT NULL,
  `siteNiche` varchar(50) NOT NULL,
  `siteDa` varchar(20) NOT NULL,
  `siteTf` varchar(20) NOT NULL,
  `siteLinkType` varchar(50) NOT NULL,
  `sitePrice` varchar(50) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=latin1;




