/*
SQLyog - Free MySQL GUI v5.01
Host - 5.0.45 : Database - voices4change
*********************************************************************
Server version : 5.0.45
*/


create database if not exists `voices4change`;

USE `voices4change`;

/*Table structure for table `tbl_accessions` */

DROP TABLE IF EXISTS `tbl_accessions`;

CREATE TABLE `tbl_accessions` (
  `id` int(9) NOT NULL auto_increment,
  `content_id` int(9) default NULL,
  `usergroup_id` int(9) default NULL,
  `capability_id` int(9) default NULL,
  `permission` enum('Y','N','N/A') default 'N/A',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=729 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_accessions` */

insert into `tbl_accessions` values 
(610,3,2,1,'Y'),
(609,2,2,1,'Y'),
(706,11,3,1,'Y'),
(705,10,3,1,'Y'),
(704,17,3,1,'Y'),
(703,16,3,1,'Y'),
(702,15,3,1,'Y'),
(701,14,3,1,'Y'),
(700,13,3,1,'Y'),
(699,12,3,1,'Y'),
(698,11,3,1,'Y'),
(697,10,3,1,'Y'),
(696,9,3,12,'Y'),
(695,9,3,9,'Y'),
(694,9,3,1,'Y'),
(693,8,3,1,'Y'),
(692,7,3,1,'Y'),
(691,6,3,9,'Y'),
(690,6,3,1,'Y'),
(689,5,3,1,'Y'),
(688,4,3,1,'Y'),
(687,3,3,11,'Y'),
(686,3,3,1,'Y'),
(685,2,3,1,'Y'),
(684,1,3,1,'Y'),
(683,14,2,1,'Y'),
(680,16,2,1,'Y'),
(679,15,2,1,'Y'),
(678,14,2,1,'Y'),
(682,14,2,1,'Y'),
(676,16,2,1,'Y'),
(675,15,2,1,'Y'),
(674,14,2,1,'Y'),
(672,16,2,1,'Y'),
(671,15,2,1,'Y'),
(670,14,2,1,'Y'),
(669,13,2,10,'Y'),
(668,13,2,1,'Y'),
(667,12,2,8,'Y'),
(666,11,2,8,'Y'),
(665,10,2,8,'Y'),
(664,8,2,8,'Y'),
(663,12,2,7,'Y'),
(662,11,2,7,'Y'),
(661,10,2,7,'Y'),
(660,8,2,7,'Y'),
(659,12,2,6,'Y'),
(658,11,2,6,'Y'),
(657,10,2,6,'Y'),
(656,9,2,6,'Y'),
(655,8,2,6,'Y'),
(654,12,2,3,'Y'),
(653,11,2,3,'Y'),
(652,10,2,3,'Y'),
(651,9,2,9,'Y'),
(650,8,2,3,'Y'),
(649,12,2,2,'Y'),
(648,11,2,2,'Y'),
(647,10,2,2,'Y'),
(646,9,2,2,'Y'),
(645,8,2,2,'Y'),
(644,12,2,1,'Y'),
(643,11,2,1,'Y'),
(642,10,2,1,'Y'),
(641,9,2,1,'Y'),
(640,8,2,1,'Y'),
(639,10,2,15,'Y'),
(638,10,2,14,'Y'),
(637,10,2,13,'Y'),
(636,11,2,15,'Y'),
(635,11,2,14,'Y'),
(634,11,2,13,'Y'),
(633,12,2,15,'Y'),
(632,12,2,14,'Y'),
(631,12,2,13,'Y'),
(630,9,2,15,'Y'),
(629,9,2,14,'Y'),
(628,12,2,13,'Y'),
(627,9,2,15,'Y'),
(626,9,2,14,'Y'),
(625,11,2,13,'Y'),
(624,9,2,15,'Y'),
(623,9,2,14,'Y'),
(622,10,2,13,'Y'),
(621,9,2,15,'Y'),
(620,9,2,14,'Y'),
(619,9,2,13,'Y'),
(618,8,2,15,'Y'),
(617,8,2,14,'Y'),
(616,8,2,13,'Y'),
(615,7,2,1,'Y'),
(614,6,2,1,'Y'),
(613,5,2,1,'Y'),
(612,4,2,1,'Y'),
(611,3,2,11,'Y'),
(608,1,2,1,'Y'),
(98,1,1,1,'Y'),
(99,1,1,2,'Y'),
(100,1,1,3,'Y'),
(101,1,1,4,'Y'),
(102,1,1,5,'Y'),
(103,1,1,6,'Y'),
(104,1,1,7,'Y'),
(105,1,1,8,'Y'),
(106,1,1,9,'Y'),
(107,1,1,10,'Y'),
(108,1,1,11,'Y'),
(109,1,1,12,'Y'),
(110,1,1,13,'Y'),
(111,1,1,14,'Y'),
(112,1,1,15,'Y'),
(113,2,1,1,'Y'),
(114,2,1,2,'Y'),
(115,2,1,3,'Y'),
(116,2,1,4,'Y'),
(117,2,1,5,'Y'),
(118,2,1,6,'Y'),
(119,2,1,7,'Y'),
(120,2,1,8,'Y'),
(121,2,1,9,'Y'),
(122,2,1,10,'Y'),
(123,2,1,11,'Y'),
(124,2,1,12,'Y'),
(125,2,1,13,'Y'),
(126,2,1,14,'Y'),
(127,2,1,15,'Y'),
(128,3,1,1,'Y'),
(129,3,1,2,'Y'),
(130,3,1,3,'Y'),
(131,3,1,4,'Y'),
(132,3,1,5,'Y'),
(133,3,1,6,'Y'),
(134,3,1,7,'Y'),
(135,3,1,8,'Y'),
(136,3,1,9,'Y'),
(137,3,1,10,'Y'),
(138,3,1,11,'Y'),
(139,3,1,12,'Y'),
(140,3,1,13,'Y'),
(141,3,1,14,'Y'),
(142,3,1,15,'Y'),
(143,4,1,1,'Y'),
(144,4,1,2,'Y'),
(145,4,1,3,'Y'),
(146,4,1,4,'Y'),
(147,4,1,5,'Y'),
(148,4,1,6,'Y'),
(149,4,1,7,'Y'),
(150,4,1,8,'Y'),
(151,4,1,9,'Y'),
(152,4,1,10,'Y'),
(153,4,1,11,'Y'),
(154,4,1,12,'Y'),
(155,4,1,13,'Y'),
(156,4,1,14,'Y'),
(157,4,1,15,'Y'),
(158,5,1,1,'Y'),
(159,5,1,2,'Y'),
(160,5,1,3,'Y'),
(161,5,1,4,'Y'),
(162,5,1,5,'Y'),
(163,5,1,6,'Y'),
(164,5,1,7,'Y'),
(165,5,1,8,'Y'),
(166,5,1,9,'Y'),
(167,5,1,10,'Y'),
(168,5,1,11,'Y'),
(169,5,1,12,'Y'),
(170,5,1,13,'Y'),
(171,5,1,14,'Y'),
(172,5,1,15,'Y'),
(173,6,1,1,'Y'),
(174,6,1,2,'Y'),
(175,6,1,3,'Y'),
(176,6,1,4,'Y'),
(177,6,1,5,'Y'),
(178,6,1,6,'Y'),
(179,6,1,7,'Y'),
(180,6,1,8,'Y'),
(181,6,1,9,'Y'),
(182,6,1,10,'Y'),
(183,6,1,11,'Y'),
(184,6,1,12,'Y'),
(185,6,1,13,'Y'),
(186,6,1,14,'Y'),
(187,6,1,15,'Y'),
(188,7,1,1,'Y'),
(189,7,1,2,'Y'),
(190,7,1,3,'Y'),
(191,7,1,4,'Y'),
(192,7,1,5,'Y'),
(193,7,1,6,'Y'),
(194,7,1,7,'Y'),
(195,7,1,8,'Y'),
(196,7,1,9,'Y'),
(197,7,1,10,'Y'),
(198,7,1,11,'Y'),
(199,7,1,12,'Y'),
(200,7,1,13,'Y'),
(201,7,1,14,'Y'),
(202,7,1,15,'Y'),
(203,8,1,1,'Y'),
(204,8,1,2,'Y'),
(205,8,1,3,'Y'),
(206,8,1,4,'Y'),
(207,8,1,5,'Y'),
(208,8,1,6,'Y'),
(209,8,1,7,'Y'),
(210,8,1,8,'Y'),
(211,8,1,9,'Y'),
(212,8,1,10,'Y'),
(213,8,1,11,'Y'),
(214,8,1,12,'Y'),
(215,8,1,13,'Y'),
(216,8,1,14,'Y'),
(217,8,1,15,'Y'),
(218,9,1,1,'Y'),
(219,9,1,2,'Y'),
(220,9,1,3,'Y'),
(221,9,1,4,'Y'),
(222,9,1,5,'Y'),
(223,9,1,6,'Y'),
(224,9,1,7,'Y'),
(225,9,1,8,'Y'),
(226,9,1,9,'Y'),
(227,9,1,10,'Y'),
(228,9,1,11,'Y'),
(229,9,1,12,'Y'),
(230,9,1,13,'Y'),
(231,9,1,14,'Y'),
(232,9,1,15,'Y'),
(233,10,1,1,'Y'),
(234,10,1,2,'Y'),
(235,10,1,3,'Y'),
(236,10,1,4,'Y'),
(237,10,1,5,'Y'),
(238,10,1,6,'Y'),
(239,10,1,7,'Y'),
(240,10,1,8,'Y'),
(241,10,1,9,'Y'),
(242,10,1,10,'Y'),
(243,10,1,11,'Y'),
(244,10,1,12,'Y'),
(245,10,1,13,'Y'),
(246,10,1,14,'Y'),
(247,10,1,15,'Y'),
(248,11,1,1,'Y'),
(249,11,1,2,'Y'),
(250,11,1,3,'Y'),
(251,11,1,4,'Y'),
(252,11,1,5,'Y'),
(253,11,1,6,'Y'),
(254,11,1,7,'Y'),
(255,11,1,8,'Y'),
(256,11,1,9,'Y'),
(257,11,1,10,'Y'),
(258,11,1,11,'Y'),
(259,11,1,12,'Y'),
(260,11,1,13,'Y'),
(261,11,1,14,'Y'),
(262,11,1,15,'Y'),
(263,12,1,1,'Y'),
(264,12,1,2,'Y'),
(265,12,1,3,'Y'),
(266,12,1,4,'Y'),
(267,12,1,5,'Y'),
(268,12,1,6,'Y'),
(269,12,1,7,'Y'),
(270,12,1,8,'Y'),
(271,12,1,9,'Y'),
(272,12,1,10,'Y'),
(273,12,1,11,'Y'),
(274,12,1,12,'Y'),
(275,12,1,13,'Y'),
(276,12,1,14,'Y'),
(277,12,1,15,'Y'),
(278,13,1,1,'Y'),
(279,13,1,2,'Y'),
(280,13,1,3,'Y'),
(281,13,1,4,'Y'),
(282,13,1,5,'Y'),
(283,13,1,6,'Y'),
(284,13,1,7,'Y'),
(285,13,1,8,'Y'),
(286,13,1,9,'Y'),
(287,13,1,10,'Y'),
(288,13,1,11,'Y'),
(289,13,1,12,'Y'),
(290,13,1,13,'Y'),
(291,13,1,14,'Y'),
(292,13,1,15,'Y'),
(293,14,1,1,'Y'),
(294,14,1,2,'Y'),
(295,14,1,3,'Y'),
(296,14,1,4,'Y'),
(297,14,1,5,'Y'),
(298,14,1,6,'Y'),
(299,14,1,7,'Y'),
(300,14,1,8,'Y'),
(301,14,1,9,'Y'),
(302,14,1,10,'Y'),
(303,14,1,11,'Y'),
(304,14,1,12,'Y'),
(305,14,1,13,'Y'),
(306,14,1,14,'Y'),
(307,14,1,15,'Y'),
(308,15,1,1,'Y'),
(309,15,1,2,'Y'),
(310,15,1,3,'Y'),
(311,15,1,4,'Y'),
(312,15,1,5,'Y'),
(313,15,1,6,'Y'),
(314,15,1,7,'Y'),
(315,15,1,8,'Y'),
(316,15,1,9,'Y'),
(317,15,1,10,'Y'),
(318,15,1,11,'Y'),
(319,15,1,12,'Y'),
(320,15,1,13,'Y'),
(321,15,1,14,'Y'),
(322,15,1,15,'Y'),
(323,16,1,1,'Y'),
(324,16,1,2,'Y'),
(325,16,1,3,'Y'),
(326,16,1,4,'Y'),
(327,16,1,5,'Y'),
(328,16,1,6,'Y'),
(329,16,1,7,'Y'),
(330,16,1,8,'Y'),
(331,16,1,9,'Y'),
(332,16,1,10,'Y'),
(333,16,1,11,'Y'),
(334,16,1,12,'Y'),
(335,16,1,13,'Y'),
(336,16,1,14,'Y'),
(337,16,1,15,'Y'),
(338,17,1,1,'Y'),
(339,17,1,2,'Y'),
(340,17,1,3,'Y'),
(341,17,1,4,'Y'),
(342,17,1,5,'Y'),
(343,17,1,6,'Y'),
(344,17,1,7,'Y'),
(345,17,1,8,'Y'),
(346,17,1,9,'Y'),
(347,17,1,10,'Y'),
(348,17,1,11,'Y'),
(349,17,1,12,'Y'),
(350,17,1,13,'Y'),
(351,17,1,14,'Y'),
(352,17,1,15,'Y'),
(728,1,4,1,'Y'),
(727,4,4,1,'Y'),
(726,5,4,1,'Y'),
(725,6,4,1,'Y'),
(724,7,4,1,'Y'),
(723,8,4,1,'Y'),
(722,9,4,1,'Y'),
(721,10,4,1,'Y'),
(720,11,4,1,'Y'),
(719,12,4,1,'Y'),
(718,17,4,1,'Y'),
(717,16,4,1,'Y'),
(716,15,4,1,'Y'),
(715,14,4,1,'Y'),
(714,13,4,1,'Y'),
(713,17,4,1,'Y'),
(712,16,4,1,'Y'),
(711,15,4,1,'Y'),
(710,14,4,1,'Y'),
(709,13,4,1,'Y'),
(708,13,3,10,'Y'),
(707,12,3,1,'Y');

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) default 'admin',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

insert into `tbl_admin` values 
(1,'admin','f1887d3f9e6ee7a32fe5e76f4ab80d63','admin');

/*Table structure for table `tbl_affiliate` */

DROP TABLE IF EXISTS `tbl_affiliate`;

CREATE TABLE `tbl_affiliate` (
  `id` int(11) NOT NULL auto_increment,
  `affiliate_id` int(11) NOT NULL,
  `organisation_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `affiliate_code` varchar(50) default NULL,
  `banner` varchar(100) default NULL,
  `organisation_website` varchar(150) default NULL,
  `street_address` varchar(150) default NULL,
  `city` varchar(100) default NULL,
  `state` varchar(100) default NULL,
  `zip_code` varchar(10) default NULL,
  `country` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_affiliate` */

insert into `tbl_affiliate` values 
(1,1,'This is default Affiliate ceareted by system','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo turpis, ultrices eget facilisis a, ultrices at ipsum. In lacinia justo massa. Suspendisse dictum scelerisque sem non volutpat. Donec condimentum blandit massa in consectetur. In non urna purus, in congue nisl. Morbi congue bibendum diam non luctus. Morbi eu metus et ipsum venenatis rutrum. Etiam in leo at leo porta tincidunt. Vivamus accumsan nisl sed lectus gravida vel lacinia orci auctor. Cras laoreet elit sed diam hendrerit consectetur. Suspendisse fringilla aliquet ligula, vitae faucibus magna pulvinar eu. Morbi feugiat volutpat mi quis vestibulum. Praesent ac auctor sem. Vestibulum ac ornare augue.','qwerty','1_organisation_banner.gif','http://www.website.com','Address\r\n110 JanPath\r\nDelhi','City','State','0000','Country'),
(3,66,'asdsa','qwewqewqe','z0W6pikQP866','66_organisation_banner.jpg','http://www.asd.com','asdasd','asd','asdsad','qwewqe','qwewqe'),
(4,67,'sadasd','sadfsdf','2rWzmldM5767','67_organisation_banner.jpg','http://www.google.com','asdf','asdf','asdf','sdaf','asdf'),
(6,70,'My PAC','This is the profile for My PAC','rrrr','70_organisation_banner.jpg','http://www.ourvoicesforchange.com','2 Wall ST','ALBANY','NY','12205','USA'),
(7,72,'asdasd','sad asd sad asd','675u77o06472','72_organisation_banner.gif','http://www.google.com','sadasd','asdasd','asdasd','12323','asdsad'),
(8,77,'yahoo','tst test tes','m','77_organisation_banner.gif','https://www.yahoo.com','test','gwd','gjk','uhgj','khg'),
(9,79,'NetSmartz','When a group expresses interest in becoming an affiliate, VOICES provides them with a User Agreement, Affiliate Contract, and Rules of Ethical Conduct, but this will done manually. When these Agreements have been satisfied, an affiliate account on the web site will be created by the administrator with a blank Affiliate Page. Affiliates cannot register through the web site.','P','79_organisation_banner.gif','http://www.yahoo.com','3224 Test India','pkl','Punjab','3434356','India'),
(10,80,'gg','The system shall allow the Administrator to change his/her password. The system will display an input field for them to enter the old password and to enter a new password and to confirm this password in order to change the existing password. The system will send notification to the user&acirc;€™s email account on file that the password was changed and if they did not do this to contact VOICES immediately. The notification will provide an email address for reporting suspicious activity','70093f008180','80_organisation_banner.gif','http://www.xyz.com','#@%&amp;!^*@(@%','chd','pkl','13456','india');

/*Table structure for table `tbl_affiliate_articles` */

DROP TABLE IF EXISTS `tbl_affiliate_articles`;

CREATE TABLE `tbl_affiliate_articles` (
  `article_id` int(11) NOT NULL auto_increment,
  `affiliate_id` int(11) default NULL,
  `article_title` varchar(100) default NULL,
  `bill_number` int(5) default NULL,
  `indication_position` enum('sponser','cosponser') default NULL,
  `voting_start` date default NULL,
  `voting_end` date default NULL,
  `allow_voting` enum('yes','no') default NULL,
  `support_file` varchar(100) default NULL,
  `affiliate_comment` varchar(250) default NULL,
  `created` date default NULL,
  PRIMARY KEY  (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_affiliate_articles` */

insert into `tbl_affiliate_articles` values 
(1,1,'dsfs',0,'sponser','0000-00-00','0000-00-00','yes',NULL,'uyuyiyuiyiuyu',NULL),
(2,1,'errewrw',100,'sponser','0000-00-00','0000-00-00','no',NULL,'fdgdfgdfgd',NULL),
(3,1,'rtyry',0,'','0000-00-00','0000-00-00','',NULL,'',NULL),
(4,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(5,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(6,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(7,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(8,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(9,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(10,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(11,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(12,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(13,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(14,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(15,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(16,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(17,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(18,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(19,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(20,68,'title 1',12312313,'sponser','0000-00-00','0000-00-00','no',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment \r\n\r\ncomment comment comment comment',NULL),
(21,1,'title 2',12321,'sponser','0000-00-00','0000-00-00','yes',NULL,'commentw',NULL),
(22,1,'title 2',12321,'sponser','0000-00-00','0000-00-00','yes',NULL,'commentw',NULL),
(23,1,'title 2',12321,'sponser','0000-00-00','0000-00-00','yes',NULL,'commentw',NULL),
(24,1,'title new',678676,'sponser','0000-00-00','0000-00-00','yes',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment',NULL),
(25,1,'title new',678676,'sponser','0000-00-00','0000-00-00','yes',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment',NULL),
(26,1,'title new',678676,'sponser','0000-00-00','0000-00-00','yes',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment',NULL),
(27,1,'title new',678676,'sponser','0000-00-00','0000-00-00','yes',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment',NULL),
(28,1,'title new',678676,'sponser','0000-00-00','0000-00-00','yes',NULL,'comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment',NULL),
(29,1,'title new',678676,'sponser','0000-00-00','0000-00-00','yes','28_article_attachement.pdf','comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment comment',NULL),
(30,1,'This is an article',0,'','0000-00-00','0000-00-00','no',NULL,'onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volu',NULL),
(31,1,'Bill HR1151',1151,'sponser','0000-00-00','0000-00-00','yes',NULL,'I support the bill.  You should too.',NULL),
(32,1,'article title',213213,'sponser','0000-00-00','0000-00-00','yes',NULL,'onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volu',NULL),
(33,1,'article title 2',878789,'','0000-00-00','0000-00-00','yes',NULL,'onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volu',NULL),
(34,1,'article title 2',878789,'','0000-00-00','0000-00-00','yes',NULL,'onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volu',NULL),
(35,0,'article title',213213,'sponser','0000-00-00','0000-00-00','yes',NULL,'onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volu',NULL),
(36,1,'article title 3',7897897,'sponser','0000-00-00','0000-00-00','yes',NULL,'onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volu',NULL),
(37,1,'article title 4',7897897,'sponser','0000-00-00','0000-00-00','yes','37_article_attachement.pdf','onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volu',NULL),
(38,1,'kjklj',0,'','0000-00-00','0000-00-00','',NULL,'lik;lkl;kl;',NULL),
(39,1,'new content',5,'sponser','0000-00-00','0000-00-00','yes','39_article_attachement.pdf','onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volu',NULL),
(40,1,'Debt limit',0,'','0000-00-00','0000-00-00','no',NULL,'We need to raise the debt limit',NULL),
(41,1,'Test',0,'sponser','0000-00-00','0000-00-00','yes',NULL,'There will be a grouping of fields where an Affiliate can enter a bill number, a corresponding summary of their take/position on the bill, a place where they indicate whether they are for or against the bill and a final place to indicate whether they',NULL),
(42,1,'test',0,'sponser','0000-00-00','0000-00-00','yes',NULL,'c.	There will be a grouping of fields where an Affiliate can enter a bill number, a corresponding summary of their take/position on the bill, a place where they indicate whether they are for or against the bill and a final place to indicate whether t',NULL),
(43,1,'Test',0,'','0000-00-00','0000-00-00','',NULL,'c.	There will be a grouping of fields where an Affiliate can enter a bill number, a corresponding summary of their take/position on the bill, a place where they indicate whether they are for or against the bill and a final place to indicate whether t',NULL),
(44,1,'test',0,'sponser','0000-00-00','0000-00-00','yes',NULL,', a corresponding summary of their take/position on the bill, a place where they indicate whether they are for or against the bill and a final place to indicate whether they are a sponsor or cosponsor of a petition with respect to the particular bill',NULL),
(45,1,'test',0,'','0000-00-00','0000-00-00','yes',NULL,', a corresponding summary of their take/position on the bill, a place where they indicate whether they are for or against the bill and a final place to indicate whether they are a sponsor or cosponsor of a petition with respect to the particular bill',NULL),
(46,1,'test',0,'','0000-00-00','0000-00-00','','46_article_attachement.pdf','own website, the Affiliate will have the ability to upload a logo and a banner and provide static content on the page.  The Affiliate, however, is not',NULL),
(47,79,'My home',0,'','0000-00-00','0000-00-00','yes','47_article_attachement.pdf','This page will be password protected and the Affiliate can access this page after successful login. This page will have following features:',NULL),
(48,80,'GG',0,'','0000-00-00','0000-00-00','yes','48_article_attachement.pdf','The system shall allow the Administrator to change his/her password. The system will display an input field for them to enter the old password and to enter a new password and to confirm this password in order to change the existing password. The syst',NULL);

/*Table structure for table `tbl_bill_authors` */

DROP TABLE IF EXISTS `tbl_bill_authors`;

CREATE TABLE `tbl_bill_authors` (
  `bill_author_id` int(11) NOT NULL auto_increment,
  `bill_id` int(11) default NULL,
  `bill_author_name` varchar(50) default NULL,
  `bill_author_party` varchar(10) default NULL,
  `bill_author_house` varchar(10) default NULL,
  PRIMARY KEY  (`bill_author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bill_authors` */

insert into `tbl_bill_authors` values 
(1,1,'Boehner','R','H'),
(2,2,'Gingrey','R','H'),
(3,3,'Pitts','R','H'),
(4,4,'Boehner','R','H'),
(5,5,'Miller Ge','D','H'),
(6,6,'Hirono','D','H'),
(7,7,'Grijalva','D','H'),
(8,8,'Harper','R','H'),
(9,9,'Baca','D','H'),
(10,10,'Edwards D','D','H'),
(11,11,'Towns','D','H'),
(12,12,'Hirono','D','H'),
(13,13,'King S','R','H'),
(14,14,'Mack','R','H'),
(15,15,'Murphy T','R','H'),
(16,16,'Heller','R','H'),
(17,17,'Miller Ga','R','H'),
(18,18,'Gibbs B','R','H'),
(19,19,'Camp','R','H'),
(20,20,'Grimm','R','H'),
(21,21,'Lankford','R','H'),
(22,22,'Sensenbrenner','R','H'),
(23,23,'Gosar','R','H'),
(24,24,'Nadler','D','H'),
(25,25,'Smith L','R','H'),
(26,26,'Lamborn','R','H'),
(27,27,'Cummings','D','H'),
(28,28,'Reichert','R','H'),
(29,29,'Paul Ro','R','H'),
(30,30,'Nunes','R','H'),
(31,31,'Walz','DFL','H'),
(32,32,'Bilbray','R','H'),
(33,33,'Gosar','R','H'),
(34,34,'Frank','D','H'),
(35,35,'Rangel','D','H'),
(36,36,'Smith L','R','H'),
(37,37,'Carter','R','H'),
(38,38,'Peters','D','H'),
(39,39,'Dent','R','H'),
(40,40,'Rehberg','R','H'),
(41,41,'Rehberg','R','H'),
(42,42,'Hastings D','R','H'),
(43,43,'Kissell','D','H'),
(44,44,'Chaffetz','R','H'),
(45,45,'Dicks','D','H'),
(46,46,'Schakowsky','D','H'),
(47,47,'King P','R','H'),
(48,48,'Jackson-Lee','D','H'),
(49,49,'Issa','R','H'),
(50,50,'Jordan','R','H'),
(51,51,'Rigell','R','H'),
(52,52,'Andrews','D','H'),
(53,53,'Baca','D','H'),
(54,54,'Farr','D','H'),
(55,55,'Berkley','D','H'),
(56,56,'Boustany','R','H'),
(57,57,'Campbell','R','H'),
(58,58,'Cardoza','D','H'),
(59,59,'Courtney','D','H'),
(60,60,'Critz','D','H'),
(61,61,'Fortenberry','R','H'),
(62,62,'Fortenberry','R','H'),
(63,63,'Gardner','R','H'),
(64,64,'Griffin','R','H'),
(65,65,'Hensarling','R','H'),
(66,66,'Herger','R','H'),
(67,67,'Issa','R','H'),
(68,68,'Issa','R','H'),
(69,69,'Johnson S','R','H'),
(70,70,'Kinzinger','R','H'),
(71,71,'Lance','R','H'),
(72,72,'Latta','R','H'),
(73,73,'Lewis Jo','D','H'),
(74,74,'Lewis Jo','D','H'),
(75,75,'Lummis','R','H'),
(76,76,'Maloney','D','H'),
(77,77,'McDermott','D','H'),
(78,78,'McMorris Rodger','R','H'),
(79,79,'Miller Ga','R','H'),
(80,80,'Norton','D','H'),
(81,81,'Norton','D','H'),
(82,82,'Pascrell','D','H'),
(83,83,'McDermott','D','H'),
(84,84,'Paul Ro','R','H'),
(85,85,'Pearce','R','H'),
(86,86,'Pierluisi','NP','H'),
(87,87,'Polis','D','H'),
(88,88,'Quigley','D','H'),
(89,89,'Rogers M','R','H'),
(90,90,'Sablan','I','H'),
(91,91,'Van Hollen','D','H'),
(92,92,'Waters','D','H'),
(93,93,'Young D','R','H'),
(94,94,'Forbes','R','H'),
(95,95,'Kucinich','D','H'),
(96,96,'Woodall','R','H'),
(97,97,'Rogers H','R','H'),
(98,98,'Lungren','R','H'),
(99,99,'Nugent','R','H'),
(100,100,'Engel','D','H'),
(101,101,'Grimm','R','H'),
(102,102,'Heck J','R','H'),
(103,103,'Maloney','D','H'),
(104,104,'Maloney','D','H'),
(105,105,'Moore G','D','H'),
(106,106,'Nadler','D','H'),
(107,107,'Sablan','I','H'),
(108,108,'Sanchez Li','D','H'),
(109,109,'Leahy','D','S'),
(110,110,'Rockefeller','D','S'),
(111,111,'Landrieu','D','S'),
(112,112,'Wyden','D','S'),
(113,113,'Grassley','R','S'),
(114,114,'Casey','D','S'),
(115,115,'Wyden','D','S'),
(116,116,'Murkowski','R','S'),
(117,117,'Inhofe','R','S'),
(118,118,'Inhofe','R','S'),
(119,119,'Snowe','R','S'),
(120,120,'Snowe','R','S'),
(121,121,'Harkin','D','S'),
(122,122,'Collins','R','S'),
(123,123,'Vitter','R','S'),
(124,124,'Sanders','I','S'),
(125,125,'Reid','D','S'),
(126,126,'Kerry','D','S'),
(127,127,'Udall T','D','S'),
(128,128,'Lautenberg','D','S'),
(129,129,'Rockefeller','D','S'),
(130,130,'Bennet','D','S'),
(131,131,'Kohl','D','S'),
(132,132,'Menendez','D','S'),
(133,133,'Klobuchar','D','S'),
(134,134,'Cantwell','D','S'),
(135,135,'Leahy','D','S'),
(136,136,'Murkowski','R','S'),
(137,137,'Murkowski','R','S'),
(138,138,'Murkowski','R','S'),
(139,139,'Murkowski','R','S'),
(140,140,'Schumer','D','S'),
(141,141,'Snowe','R','S'),
(142,142,'Schumer','D','S'),
(143,143,'Lee M','R','S'),
(144,144,'Cantwell','D','S'),
(145,145,'Feinstein','D','S'),
(146,146,'Feinstein','D','S'),
(147,147,'Feinstein','D','S'),
(148,148,'Akaka','D','S'),
(149,149,'Durbin','D','S'),
(150,150,'Leahy','D','S'),
(151,151,'Stabenow','D','S'),
(152,152,'Burr','R','S'),
(153,153,'Schumer','D','S'),
(154,154,'Boxer','D','S'),
(155,155,'Baucus','D','S'),
(156,156,'Gillibrand','D','S'),
(157,157,'Gillibrand','D','S'),
(158,158,'Ensign','R','S'),
(159,159,'Hagan','D','S'),
(160,160,'Kerry','D','S'),
(161,161,'Menendez','D','S'),
(162,162,'Lautenberg','D','S'),
(163,163,'Durbin','D','S'),
(164,164,'Gillibrand','D','S'),
(165,165,'Wicker','R','S'),
(166,166,'Lugar','R','S');

/*Table structure for table `tbl_bill_detail` */

DROP TABLE IF EXISTS `tbl_bill_detail`;

CREATE TABLE `tbl_bill_detail` (
  `bill_id` int(11) NOT NULL auto_increment,
  `bill_number` int(5) default NULL,
  `state` char(2) default NULL,
  `session_id` char(7) default NULL,
  `legtype` char(4) default NULL,
  `bill_title` varchar(55) default NULL,
  `intro_date` date default NULL,
  `last_amend_date` date default NULL,
  `final_status_date` date default NULL,
  `final_status_action` varchar(50) default NULL,
  `current_disposition` varchar(50) default NULL,
  `bill_location` varchar(50) default NULL,
  `chapter_number` varchar(10) default NULL,
  `bill_summary` text,
  `bill_status_action_text` text,
  `bill_status_action_date` date default NULL,
  `public_text_link` varchar(250) default NULL,
  PRIMARY KEY  (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbl_bill_detail` */

insert into `tbl_bill_detail` values 
(1,3,' U','2011000','HR','Prohibit Taxpayer Funds to be Used for Abortions','2011-01-20','0000-00-00','0000-00-00','','Pending','HOUSE','','Prohibits taxpayer funded abortions and to provide for conscience protect ions, and for other purposes.','From HOUSE Committee on JUDICIARY:  Reported as amended.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H3&ciq=voices&client_md=50bb121395f7e0d5c125f84a1fff9dab&mode=current_text'),
(2,5,' U','2011000','HR','Patient Access to Health Care Services','2011-01-24','0000-00-00','0000-00-00','','Pending','HOUSE','','Improves patient access to health care services and provide improved Medical care by reducing the excessive burden the liability system places on the health care delivery system.','From HOUSE Committee on JUDICIARY:  Reported as amended.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H5&ciq=voices&client_md=cfa518a0273e7e3a0b92c46de4660328&mode=current_text'),
(3,358,' U','2011000','HR','Special Considerations for Abortions in Health Care Act','2011-01-20','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee','','Relates to the Protect Life Act; amends the Patient Protection and Affordable Care Act to modify special rules relating to coverage of abortion services under such Act.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H358&ciq=voices&client_md=3f83be80dafa2d44d34c7df70a9a43f0&mode=current_text'),
(4,471,' U','2011000','HR','DC Opportunity Scholarship Program','2011-01-26','0000-00-00','0000-00-00','','Pending','HOUSE','','Reauthorizes the DC opportunity scholarship program, and for other purposes.','In HOUSE.  Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H471&ciq=voices&client_md=b834001e878eedb64f7658c70e00bd13&mode=current_text'),
(5,522,' U','2011000','HR','Safety Standard for Exposure to Combustible Dust','2011-02-08','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Requires the Secretary of Labor to issue an interim occupational safety and health standard regarding worker exposure to combustible dust, and for other purposes.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H522&ciq=voices&client_md=7b521cb09d8daf72eb9cccf4e156c83d&mode=current_text'),
(6,571,' U','2011000','HR','Occupational Safety and Health Plans Review Process','2011-02-09','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Requires a heightened review process by the Secretary of Labor of State occupational safety and health plans, and for other purposes.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H571&ciq=voices&client_md=074921d438a2964fea69874914eaa98e&mode=current_text'),
(7,587,' U','2011000','HR','Restore the Nations Natural and Cultural Resources','2011-02-09','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Amends the Public Lands Corps Act of 1993 to expand the authorization of the Secretaries of Agriculture, Commerce, and the Interior to provide service opportunities for young Americans; helps restore the nation\'s natural, cultural, historic, archaeological, recreational and scenic resources; trains a new generation of public land managers and enthusiasts; promotes the value of public service.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H587&ciq=voices&client_md=a619150bb03e8c6bfb55a29e700edee0&mode=current_text'),
(8,604,' U','2011000','HR','Disabled Youth Transition to Adulthood','2011-02-10','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Amends the Rehabilitation Act of 1973 to authorize grants for the transition of youths with significant disabilities to adulthood, and for other purposes.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H604&ciq=voices&client_md=9dfbfe6c240568e7039b900fa15ab949&mode=current_text'),
(9,623,' U','2011000','HR','National Commission on State Workers Compensation Laws','2011-02-10','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Establishes the National Commission on State Workers\' Compensation Laws.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H623&ciq=voices&client_md=8569e85deb164637719b2fc1a94b63a1&mode=current_text'),
(10,631,' U','2011000','HR','Base Minimum Wage for Tipped Employees','2011-02-10','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Amends the Fair Labor Standards Act of 1938 to establish a base minimum wage for tipped employees.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H631&ciq=voices&client_md=1041f8914ab053f538a9a056a8b194a3&mode=current_text'),
(11,683,' U','2011000','HR','Grants to the National Urban League for Urban Jobs','2011-02-11','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Amends the Workforce Investment Act of 1998 to authorize the Secretary of Labor to provide grants to the National Urban League for an Urban Jobs Program, and for other purposes.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H683&ciq=voices&client_md=b0c55abdc08098d869e49477a864fe2e&mode=current_text'),
(12,711,' U','2011000','HR','Establishment of Youth Corps Programs','2011-02-15','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Amends the Workforce Investment Act of 1998 to provide for the establishment of Youth Corps programs and provide for wider dissemination of the Youth Corps model.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H711&ciq=voices&client_md=b7840a38e6c7ff931d68ab6ecb665186&mode=current_text'),
(13,745,' U','2011000','HR','Wage Requirements of the Davis-Bacon Act','2011-02-16','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Repeals the wage rate requirements commonly known as the Davis-Bacon Act.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H745&ciq=voices&client_md=f68db7a8b865b9f2309a1988d50b58e4&mode=current_text'),
(14,746,' U','2011000','HR','Wage Rate Requirements','2011-02-16','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Repeals the wage rate requirements commonly known as the Davis-Bacon Act.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H746&ciq=voices&client_md=fee43a55578ac885ec09919cac45e073&mode=current_text'),
(15,840,' U','2011000','HR','Offshore Energy Exploration Drilling Permits','2011-02-28','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee','','Allows the conduct of offshore energy exploration, development, and production operations under drilling permits previously issued by the Minerals Management Service, and for other purposes.','In HOUSE Committee on NATURAL RESOURCES:  Referred to Subcommittee on ENERGY AND MINERAL RESOURCES.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H840&ciq=voices&client_md=2b23fcf38361c6e8ae969d5deb6e9457&mode=current_text'),
(16,856,' U','2011000','HR','Clark County, Nevada Mining Laws','2011-03-01','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee','','Relates to the Sloan Hills Withdrawal Act; withdraws certain land located in Clark County, Nevada, from location, entry, and patent under the mining Laws and disposition under all Laws pertaining to mineral and geothermal leasing or mineral materials, and for other purposes.','In HOUSE Committee on NATURAL RESOURCES:  Referred to Subcommittee on ENERGY AND MINERAL RESOURCES.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H856&ciq=voices&client_md=90bce1bae40494f02c49bfd31de48f15&mode=current_text'),
(17,861,' U','2011000','HR','Funding for the Neighborhood Stabilization Program','2011-03-01','0000-00-00','0000-00-00','','Pending','Senate Banking, Housing and Urban Affairs Committe','','Relates to the NSP Termination Act; rescinds the third round of funding for the Neighborhood Stabilization Program and to terminate the program.','To SENATE Committee on BANKING, HOUSING AND URBAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H861&ciq=voices&client_md=7bbb2fce7879aab2e0338d43d9fcb765&mode=current_text'),
(18,872,' U','2011000','HR','Pesticide Use in Near or Navigable Waters','2011-03-02','0000-00-00','0000-00-00','','Pending','House Agriculture Committee','','Amends the Federal Insecticide, Fungicide, and Rodenticide Act and the Federal Water Pollution Control Act to clarify Congressional intent regarding the regulation of the use of pesticides in or near navigable waters, and for other purposes.','In HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE:  Ordered to be reported as amended.','2011-03-16','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H872&ciq=voices&client_md=a42247a9bc8cb7674875c1f7cf2cbc52&mode=current_text'),
(19,892,' U','2011000','HR','Separation of the Great Lakes and Mississippi River','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee','','Requires the Secretary of the Army to study the feasibility of the hydrological separation of the Great Lakes and Mississippi River Basins.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on WATER RESOURCES AND ENVIRONMENT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H892&ciq=voices&client_md=db09a8bc6aa54bea4184e9c54abee965&mode=current_text'),
(20,897,' U','2011000','HR','Programs for Residential and Commuter Tolls','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee','','Provides authority and sanction for the granting and issuance of programs for residential and commuter toll, user fee and fare discounts by States, municipalities, other localities, and all related agencies and departments, and for other purposes.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on HIGHWAYS AND TRANSIT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H897&ciq=voices&client_md=5c4791b907341645a9ff644bb46a1c2f&mode=current_text'),
(21,899,' U','2011000','HR','Protests of Task and Order Delivery Contracts','2011-03-03','0000-00-00','0000-00-00','','Pending','HOUSE','','Amends title 41, United States Code, to extend the sunset date for certain protests of task and deliver order contracts.','In HOUSE.  Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H899&ciq=voices&client_md=21d74c31d36a384370357f35a02293d8&mode=current_text'),
(22,904,' U','2011000','HR','Funding to Check Motorcycle Helmet Usage','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee','','Prohibits the Secretary of Transportation from providing grants or any funds to a State, county, town, or township, Indian tribe, municipal or other local government to be used for any program to check helmet usage or create checkpoints for a motorcycle driver or passenger.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on HIGHWAYS AND TRANSIT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H904&ciq=voices&client_md=a8890380d24c05172e15d21a0e020a29&mode=current_text'),
(23,922,' U','2011000','HR','Protection from Flood Hazards Resulting from Wildfires','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee','','Ensures that private property, public safety, and human life are protected from flood hazards that directly result from post-fire watershed conditions that are created by wildfires on Federal land.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on WATER RESOURCES AND ENVIRONMENT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H922&ciq=voices&client_md=1f23b319863860117f7f9bb5bd731d99&mode=current_text'),
(24,929,' U','2011000','HR','Expand and Improve Transit Training Programs','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee','','Amends title 49, United States Code, to expand and improve transit training programs.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on HIGHWAYS AND TRANSIT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H929&ciq=voices&client_md=cd0846719ab1fe4b4cf82f0625a4acfa&mode=current_text'),
(25,1021,' U','2011000','HR','Temporary Office of Bankruptcy Judges','2011-03-10','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Prevents the termination of the temporary office of bankruptcy judges in certain judicial districts.','In HOUSE Committee on JUDICIARY:  Ordered to be reported as amended.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1021&ciq=voices&client_md=20627e14c695c7366125fb43256cc66e&mode=current_text'),
(26,1076,' U','2011000','HR','Federal Funding of National Public Radio','2011-03-15','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe','','Prohibits Federal funding of National Public Radio and the use of Federal funds to acquire radio content.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1076&ciq=voices&client_md=7c862db9676b03df26740ab5240e07cb&mode=current_text'),
(27,1144,' U','2011000','HR','Transparency of the Federal Government','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee','','Increases the transparency of the Federal Government, and for other purposes.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1144&ciq=voices&client_md=6023bf61c17857fc8908d4cadc87c4ec&mode=current_text'),
(28,1145,' U','2011000','HR','Emergency Volunteer Liability for Negligence','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Provides construction, architectural, and engineering entities with qualified immunity from liability for negligence when providing services or equipment on a volunteer basis in response to a declared emergency or disaster.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1145&ciq=voices&client_md=41188bce6e3bb423603b1e83aaaa0fdc&mode=current_text'),
(29,1146,' U','2011000','HR','United States Membership in the United Nations','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee','','Relates to the American Sovereignty Restoration Act of 2009; ends membership of the United States in the United Nations.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1146&ciq=voices&client_md=f71efa7c8b6b2a03a2dbac276390a6ff&mode=current_text'),
(30,1147,' U','2011000','HR','Debt Reduction on Commercial Real Property','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee','','Amends the Internal Revenue Code of 1986 to allow a deduction for certain payments made to reduce debt on commercial real property.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1147&ciq=voices&client_md=c8747f12ea9d7dbf6a0d670217dc5448&mode=current_text'),
(31,1148,' U','2011000','HR','Insider Trading by Members of Congress','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ethics Committee','','Prohibits commodities and securities trading based on nonpublic information relating to Congress; requires additional reporting by Members and employees of Congress of securities transactions, and for other purposes.','Additionally referred to HOUSE Committee on ETHICS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1148&ciq=voices&client_md=077d2ae981302989ab4e67da986d6a9a&mode=current_text'),
(32,1149,' U','2011000','HR','Algae-Based Biofuel Producer Credit','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee','','Amends the Clean Air Act to include algae-based biofuel in the renewable fuel program and amend the Internal Revenue Code of 1986 to include algae-based biofuel in the cellulosic biofuel producer credit.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1149&ciq=voices&client_md=cebdd67dfe1d73f7f760caadd2ec7363&mode=current_text'),
(33,1150,' U','2011000','HR','Health Insurance Business Antitrust Laws','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Restores the application of the Federal antitrust Laws to the business of health insurance to protect competition and consumers.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1150&ciq=voices&client_md=bfa1f5c208c71676a48a3240fb8f8875&mode=current_text'),
(34,1151,' U','2011000','HR','Mortgage Assistance Made by Financial Companies','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee','','Requires the Secretary of the Treasury to make risk-based assessments on financial companies to recoup the amount of assistance made available for unemployed homeowners under the Emergency Mortgage Relief Program and for States and communities under the Neighborhood Stabilization Program.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1151&ciq=voices&client_md=76bd60b3adf429468d02f5575a8267d5&mode=current_text'),
(35,1152,' U','2011000','HR','Armed Forces Draft Between Ages 18 and 25','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee','','Requires all persons in the United States between the ages of 18 and 25 to perform national service, either as a member of the uniformed services or in civilian service in furtherance of the national defense and homeland security, to authorize the induction of persons in the uniformed services during wartime to meet end-strength requirements of the uniformed services, and for other purposes.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1152&ciq=voices&client_md=328a80c6a67a694c294e25854d517673&mode=current_text'),
(36,1153,' U','2011000','HR','Terrorism Prosecution in United States District Court','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Provides for consultation by the Department of Justice with other relevant Government agencies before determining to prosecute certain terrorism offenses in United States district court, and for other purposes.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1153&ciq=voices&client_md=2cdd21c15ec504eede225a80ad9b8e1b&mode=current_text'),
(37,1154,' U','2011000','HR','Service Dogs on Department of Veterans Affairs Property','2011-03-17','0000-00-00','0000-00-00','','Pending','House Veterans\' Affairs Committee','','Amends title 38, United States Code, to prevent the Secretary of Veterans Affairs from prohibiting the use of service dogs on Department of Veterans Affairs property.','To HOUSE Committee on VETERANS\' AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1154&ciq=voices&client_md=c64a8b48b8a456f58f4bd2919e0d05f7&mode=current_text'),
(38,1155,' U','2011000','HR','Terminations, Reductions, and Savings by Budget Office','2011-03-17','0000-00-00','0000-00-00','','Pending','House Rules Committee','','Establishes procedures for the expedited consideration by Congress of the recommendations set forth in the Terminations, Reductions, and Savings report prepared by the Office of Management and Budget.','Additionally referred to HOUSE Committee on RULES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1155&ciq=voices&client_md=553230d573cc1e19d37b71e320f28373&mode=current_text'),
(39,1156,' U','2011000','HR','Accepting Nationals Requested by Homeland Security','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Amends the Immigration and Nationality Act with respect to a country that denies or unreasonably delays accepting the country\'s nationals upon the request of the Secretary of Homeland Security.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1156&ciq=voices&client_md=de360e16cdd7fd6d3aac2a1c1ae5b39d&mode=current_text'),
(40,1157,' U','2011000','HR','Levee System Evaluation from Non-Federal Interests','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee','','Requires the Secretary of the Army to conduct levee system evaluations and certifications on receipt of requests from non-Federal interests.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1157&ciq=voices&client_md=ad6532df8fd6f4cd782cad28784f5045&mode=current_text'),
(41,1158,' U','2011000','HR','Mineral Rights in the State of Montana','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee','','Authorizes the conveyance of mineral rights by the Secretary of the Interior in the State of Montana, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1158&ciq=voices&client_md=5f94894526310b56b4408b405c030862&mode=current_text'),
(42,1159,' U','2011000','HR','Limitation on Medicare Exception to Physician Referrals','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee','','Repeals certain provisions of the Patient Protection and Affordable Care Act relating to the limitation on the Medicare exception to the prohibition on certain physician referrals for hospitals and to transparency reports and reporting of physician ownership or investment interests.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1159&ciq=voices&client_md=b1f4b271cf185398a4f469861bd5ef04&mode=current_text'),
(43,1160,' U','2011000','HR','McKinney Lake National Fish Hatchery to North Carolina','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee','','Requires the Secretary of the Interior to convey the McKinney Lake National Fish Hatchery to the State of North Carolina, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1160&ciq=voices&client_md=5b9ad258692f80a5b69c41344a82b6a1&mode=current_text'),
(44,1161,' U','2011000','HR','State Based Alcohol Regulation','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Reaffirms state-based alcohol regulation, and for other purposes.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1161&ciq=voices&client_md=c21b410d45cba95572a29b1739946bc0&mode=current_text'),
(45,1162,' U','2011000','HR','Quileute Indian Tribe Tsunami and Flood Protection','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee','','Provides the Quileute Indian Tribe Tsunami and Flood Protection, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1162&ciq=voices&client_md=34ff5a9ab45f8671b3016fefdf3f9090&mode=current_text'),
(46,1163,' U','2011000','HR','Income Tax Rate on Patriot Corporations','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee','','Provides Federal contracting preferences for, and a reduction in the rate of income tax imposed on, Patriot corporations, and for other purposes.','Additionally referred to HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1163&ciq=voices&client_md=62dd24c411bcabbb865ed0a9df3d4604&mode=current_text'),
(47,1164,' U','2011000','HR','Official Language of the United States Government','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Amends title 4, United States Code, to declare English as the official language of the Government of the United States, and for other purposes.','Additionally referred to HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1164&ciq=voices&client_md=a68def2c2c07c2a617f5343737632046&mode=current_text'),
(48,1165,' U','2011000','HR','Ombudsman Office for Transportation Safety','2011-03-17','0000-00-00','0000-00-00','','Pending','House Homeland Security Committee','','Amends title 49, United States Code, to establish an Ombudsman Office within the Transportation Security Administration for the purpose of enhancing transportation security by providing confidential, informal, and neutral assistance to address work-place related problems of Transportation Security Administration employees, and for other purposes.','To HOUSE Committee on HOMELAND SECURITY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1165&ciq=voices&client_md=23c9e077f4793a8bb8a4b8d810187ecb&mode=current_text'),
(49,1166,' U','2011000','HR','Rights Relating to Trade or Commercial Names','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Modifies the prohibition on recognition by United States courts of certain rights relating to certain marks, trade names, or commercial Names.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1166&ciq=voices&client_md=58f4ce2720d250898c237c25f491ffd9&mode=current_text'),
(50,1167,' U','2011000','HR','Spending on Means Tested Welfare Programs','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee','','Provides information on total spending on means-tested welfare programs; provides additional work requirements; provides an overall spending limit on means-tested welfare programs.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1167&ciq=voices&client_md=ce6c657b10b01075d3a6d6034a6554bf&mode=current_text'),
(51,1168,' U','2011000','HR','Matching Contributions to the Thrift Savings Fund','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee','','Amends title 5, United States Code, to provide that matching contributions to the Thrift Savings Fund for Members of Congress be made contingent on Congress completing action on a concurrent resolution on the budget, for the fiscal year involved, which reduces the deficit, and for other purposes.','Additionally referred to HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1168&ciq=voices&client_md=e585885cca25e15f2f3847ebdabf110b&mode=current_text'),
(52,1169,' U','2011000','HR','Eligibility Age for Retirement in National Guard','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee','','Amends titles 5, 10, and 32, United States Code, to eliminate inequities in the treatment of National Guard technicians; reduces the eligibility age for retirement for non-Regular service, and for other purposes.','Additionally referred to HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1169&ciq=voices&client_md=cd31d6c29563aa167f0cc0bfa45749b9&mode=current_text'),
(53,1170,' U','2011000','HR','Gold in Metal Content of the Medal of Honor','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee','','Amends titles 10 and 14, United States Code, to provide for the use of gold in the metal content of the Medal of Honor.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1170&ciq=voices&client_md=a01c1cefbcd4a327e829a7ec252a9a96&mode=current_text'),
(54,1171,' U','2011000','HR','Marine Debris Research, Prevention, and Reduction','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee','','Reauthorizes and amend the Marine Debris Research, Prevention, and Reduction Act.','Additionally referred to HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1171&ciq=voices&client_md=48dc8afb06757f5c60c816aa839e47c7&mode=current_text'),
(55,1172,' U','2011000','HR','Payment for Chest Radiography Services','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee','','Amends title XVIII of the Social Security Act to provide an increased payment for chest radiography (x-ray) services that use Computer Aided Detection technology for the purpose of Early detection of lung cancer.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1172&ciq=voices&client_md=a52bf7a0b8d5901b48a35eb061e95f0a&mode=current_text'),
(56,1173,' U','2011000','HR','Class Program','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee','','Repeals the class program.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1173&ciq=voices&client_md=f6f89122ea9c7732b696116fb68ee24b&mode=current_text'),
(57,1174,' U','2011000','HR','Licensing of Internet Gambling Activities','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee','','Amends title 31, United States Code, to provide for the licensing of Internet gambling activities by the Secretary of the Treasury; provides for consumer protections on the Internet; enforces the tax code, and for other purposes.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1174&ciq=voices&client_md=d21fed27555921af218431555f049bc3&mode=current_text'),
(58,1175,' U','2011000','HR','Oleoresin Capsicum Spray Pilot Program in the Prisons','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Establishes an Oleoresin Capsicum Spray Pilot Program in the Bureau of Prisons, and for other purposes.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1175&ciq=voices&client_md=d3ddd1b85b27913f682af605024d2946&mode=current_text'),
(59,1176,' U','2011000','HR','Specialty Crops to Include Farmed Shellfish','2011-03-17','0000-00-00','0000-00-00','','Pending','House Agriculture Committee','','Amends the Specialty Crops Competitiveness Act of 2004 to include farmed shellfish as specialty crops.','To HOUSE Committee on AGRICULTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1176&ciq=voices&client_md=d3b89ac01831c9d5dd3e6f078227e423&mode=current_text'),
(60,1177,' U','2011000','HR','Tax Preferred Savings Accounts for Individuals Under 26','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee','','Amends the Internal Revenue Code of 1986 to provide for tax preferred savings accounts for individuals under age 26, and for other purposes.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1177&ciq=voices&client_md=e45a790515aa06f5e8d06f125d5d96bc&mode=current_text'),
(61,1178,' U','2011000','HR','Commissary and Exchange Store Privileges','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee','','Amends title 10, United States Code, to extend military commissary and exchange store privileges to veterans with a compensable service-connected disability and to their dependents.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1178&ciq=voices&client_md=15dd922a6efd69b6012a16abd99df5e3&mode=current_text'),
(62,1179,' U','2011000','HR','Specific Item and Service Coverage Requirements','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee','','Amends the Patient Protection and Affordable Care Act to protect rights of conscience with regard to requirements for coverage of specific items and services.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1179&ciq=voices&client_md=e2bcd8bca9f3202345afde762987e2f1&mode=current_text'),
(63,1180,' U','2011000','HR','Small Business Start-Up Savings Account','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee','','Amends the Internal Revenue Code of 1986 to establish small business start-up savings accounts.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1180&ciq=voices&client_md=b18c14c554769473dc0368461402cd9c&mode=current_text'),
(64,1181,' U','2011000','HR','State Property Firearm Exemption','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Amends title 11 of the United States Code to include firearms in the types of property allowable under the alternative provision for exempting property from the estate.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1181&ciq=voices&client_md=dc9a58a1ee0d5307c13a9e682124c548&mode=current_text'),
(65,1182,' U','2011000','HR','Conservatorships of Fannie Mae and Freddie Mac','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee','','Establishes a term certain for the conservatorships of Fannie Mae and Freddie Mac; provides conditions for continued operation of such enterprises; provides for the wind down of such operations and the dissolution of such enterprises.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1182&ciq=voices&client_md=bf76db4cc386f7e0094dae9d1441c805&mode=current_text'),
(66,1183,' U','2011000','HR','Interstate Commerce for Suicide Promotion','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Amends title 18, United States Code, to prohibit the use of interstate commerce for suicide promotion.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1183&ciq=voices&client_md=c397e6bd4c73beaa7a94a92d2bd326a0&mode=current_text'),
(67,1184,' U','2011000','HR','Criteria Used to Grant Waivers for Health Care','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee','','Requires greater transparency concerning the criteria used to grant waivers to the job-killing health care law and to ensure that applications for such waivers are treated in a fair and consistent manner, irrespective of the applicant\'s political contributions or association with a labor union, a health plan provided for under a collective bargaining agreement, or another organized labor group.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1184&ciq=voices&client_md=d712484fe6e7769a126c338a57a06aa6&mode=current_text'),
(68,1185,' U','2011000','HR','Implementation of Health Reform Law','2011-03-17','0000-00-00','0000-00-00','','Pending','House Rules Committee','','Delays the implementation of the health reform law in the United States until there is final resolution in pending lawsuits.','Additionally referred to HOUSE Committee on RULES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1185&ciq=voices&client_md=43f6c3d9e961fbf1d7da2ae7c22ccd24&mode=current_text'),
(69,1186,' U','2011000','HR','Changes Made by Health Care Reform','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee','','Repeals changes made by health care reform Laws to the Medicare exception to the prohibition on certain physician referrals for hospitals.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1186&ciq=voices&client_md=e7541686de1bc1fdaae706bad2e2d21b&mode=current_text'),
(70,1187,' U','2011000','HR','Incentive Payments to Federally Qualified Health Center','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee','','Amends title XIX of the Social Security Act to direct Medicaid Electronic Health Record incentive payments to federally qualified health centers and rural health clinics.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1187&ciq=voices&client_md=9f6285cb54f6a10e6424cb37c04b65cc&mode=current_text'),
(71,1188,' U','2011000','HR','Incentives for Alcohol Fuels','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee','','Amends the Internal Revenue Code of 1986 to terminate incentives for alcohol fuels.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1188&ciq=voices&client_md=7390ab0af6fc91cef33fb998bd25d458&mode=current_text'),
(72,1189,' U','2011000','HR','Construction of Wastewater Treatment Works','2011-03-17','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee','','Amends the Federal Water Pollution Control Act to assist municipalities that would experience a significant hardship raising the revenue necessary to finance projects and activities for the construction of wastewater treatment works, and for other purposes.','To HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1189&ciq=voices&client_md=c248cfc6226132250a7c269635cd5bad&mode=current_text'),
(73,1190,' U','2011000','HR','Tax Deductions Equal to Fair Market Value','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee','','Amends the Internal Revenue Code of 1986 to provide that a deduction equal to fair market value shall be allowed for charitable contributions of literary, musical, artistic, or scholarly compositions created by the donor.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1190&ciq=voices&client_md=d2641c5473478c684b46c169551bce7b&mode=current_text'),
(74,1191,' U','2011000','HR','Revenue Collection for Nonmilitary Purposes','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee','','Affirms the religious freedom of taxpayers who are conscientiously opposed to participation in war, to provide that the income, estate, or gift tax payments of such taxpayers be used for nonmilitary purposes; creates the Religious Freedom Peace Tax Fund to receive such tax payments; improves revenue collection, and for other purposes.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1191&ciq=voices&client_md=8dc5906a403933e9104030e6784da040&mode=current_text'),
(75,1192,' U','2011000','HR','Royalty Rate for Soda Ash','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee','','Extends the current royalty rate for soda ash.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1192&ciq=voices&client_md=495c75a4c4c7b8586eb5e32c669daa01&mode=current_text'),
(76,1193,' U','2011000','HR','Railroads used in Transportation to Nazi Camps','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee','','Ensures that the courts of the United States may provide an impartial forum for claims brought by United States citizens and others against any railroad organized as a separate legal entity, arising from the deportation of United States citizens and others to Nazi concentration camps on trains owned or operated by such railroad, and by the heirs and survivors of such persons, and for other purposes.','Additionally referred to HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1193&ciq=voices&client_md=38447e0e57b116f05906017dac6185c7&mode=current_text'),
(77,1194,' U','2011000','HR','Innovative Child Welfare Strategies','2011-03-17','0000-00-00','0000-00-00','','Pending','House Budget Committee','','Renews the authority of the Secretary of Health and Human Services to approve demonstration projects designed to test innovative strategies in State child welfare programs.','Additionally referred to HOUSE Committee on BUDGET.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1194&ciq=voices&client_md=bf36a48b035b04490eaa553717bbe8d2&mode=current_text'),
(78,1195,' U','2011000','HR','National Service Corps Scholarship and Loan Repayment','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee','','Amends the Public Health Service Act to provide for the participation of optometrists in the National Health Service Corps scholarship and loan repayment programs, and for other purposes.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1195&ciq=voices&client_md=28dfbbb158f19449ae3076f1fb5d7901&mode=current_text'),
(79,1196,' U','2011000','HR','Incentives and Loopholes That Encourage Illegal Aliens','2011-03-17','0000-00-00','0000-00-00','','Pending','House Agriculture Committee','','Removes the incentives and loopholes that encourage illegal aliens to come to the United States to live and work; provides additional resources to local law enforcement and Federal border and immigration officers, and for other purposes.','Additionally referred to HOUSE Committee on AGRICULTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1196&ciq=voices&client_md=c3d2122022321a93fe2e83dc22d0c5dd&mode=current_text'),
(80,1197,' U','2011000','HR','District of Columbia National Guard Education Program','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee','','Directs the Mayor of the District of Columbia to establish a District of Columbia National Guard Educational Assistance Program to encourage the enlistment and retention of persons in the District of Columbia National Guard by providing financial assistance to enable members of the National Guard of the District of Columbia to attend undergraduate, vocational, or technical courses.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1197&ciq=voices&client_md=6b3e3fb75e6d64d37b97bfc87c59f056&mode=current_text'),
(81,1198,' U','2011000','HR','Control of the District of Columbia National Guard','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee','','Extends to the Mayor of the District of Columbia the same authority over the National Guard of the District of Columbia as the Governors of the several States exercise over the National Guard of those States with respect to administration of the National Guard and its use to respond to natural disasters and other civil disturbances, while ensuring that the President retains control of the National Guard of the District of Columbia to respond to homeland defense emergencies.','Additionally referred to HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1198&ciq=voices&client_md=1f77bc51ce1ee1afcf12d439937c4e9e&mode=current_text'),
(82,1199,' U','2011000','HR','Fire Safety Education Programs on College Campuses','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Authorizes the Secretary of Education to make grants to support fire safety education programs on college campuses.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1199&ciq=voices&client_md=434b6403c9b41bd9bd602def98d6d9ff&mode=current_text'),
(83,1200,' U','2011000','HR','Health Care for Every American','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Provides for health care for every American and to control the cost and enhance the quality of the health care system.','Additionally referred to HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1200&ciq=voices&client_md=709c712ef0bc5ac1ce2876e6c5d9fbb3&mode=current_text'),
(84,1201,' U','2011000','HR','Investment Option in the Thrift Savings Fund','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee','','Amends title 5, United States Code, to provide for the establishment of a precious metals investment option in the Thrift Savings Fund.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1201&ciq=voices&client_md=5308efb355978dabc7d5c4e01a3d0b00&mode=current_text'),
(85,1202,' U','2011000','HR','Removal of Mexican Spotted Owl to Sanctuaries','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee','','Restarts jobs in the timber industry by providing for the protection of the Mexican Spotted Owl in sanctuaries.','Additionally referred to HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1202&ciq=voices&client_md=0d698838cc9c711a6161e5758017bc46&mode=current_text'),
(86,1203,' U','2011000','HR','Low Power Television Stations','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Amends title 17, United States Code, to include the United States territories in the application of certain statutory copyright licenses related to low power television stations.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1203&ciq=voices&client_md=ae0e3ed83e672abb4a15f7f7516fb906&mode=current_text'),
(87,1204,' U','2011000','HR','Emissions from Oil and Gas Development Sources','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee','','Amends the Clean Air Act to eliminate the exemption for aggregation of emissions from oil and gas development sources, and for other purposes.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1204&ciq=voices&client_md=1225886406b8240c116a22517a246c98&mode=current_text'),
(88,1205,' U','2011000','HR','Disposal of Real Property','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee','','Amends title 40, United States Code, to enhance authorities with regard to the disposal of real property, and for other purposes.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1205&ciq=voices&client_md=660a504e93137148e96bca0280d35e99&mode=current_text'),
(89,1206,' U','2011000','HR','Licensed Independent Insurance Producers','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee','','Amends title XXVII of the Public Health Service Act to preserve consumer and employer access to licensed independent insurance producers.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1206&ciq=voices&client_md=15aa2d46704bca91b5c2ed5a8f137f70&mode=current_text'),
(90,1207,' U','2011000','HR','Establish and Operate a Visitor Facility','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee','','Authorizes the Secretary of the Interior to establish and operate a visitor facility to fulfill the purposes of the Marianas Trench Marine National Monument, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1207&ciq=voices&client_md=b69a65ded26398ca3ae109a20ca5f6f3&mode=current_text'),
(91,1208,' U','2011000','HR','Expert Witness Fees and Others Expenses','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Amends the Individuals with Disabilities Education Act to permit a prevailing party in an action or proceeding brought to enforce the Act to be awarded expert witness fees and certain other expenses.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1208&ciq=voices&client_md=e0ec1722a1e081e7d6ead581f9e203e8&mode=current_text'),
(92,1209,' U','2011000','HR','Housing Choice Voucher Program','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee','','Reforms the housing choice voucher program under section 8 of the United States Housing Act of 1937.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1209&ciq=voices&client_md=574c618021559c9ecda37a0a675a82f0&mode=current_text'),
(93,1210,' U','2011000','HR','Maritime Liens on Fishing Permits','2011-03-17','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee','','Provides limitations on maritime liens on fishing permits, and for other purposes.','To HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1210&ciq=voices&client_md=e86e0661da0738005e0ba156bdf66897&mode=current_text'),
(94,13,' U','2011000','HCR','The Official Motto of the United States','2011-01-26','0000-00-00','0000-00-00','','Pending','House Judiciary Committee','','Reaffirms \"In God We Trust\" as the official motto of the United States and supporting and encouraging the public display of the national motto in all public buildings, public schools, and other government institutions.','In HOUSE Committee on JUDICIARY:  Ordered to be reported.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HCR13&ciq=voices&client_md=dedcb8b4337004a373a4dc03ffdd2cc8&mode=current_text'),
(95,28,' U','2011000','HCR','Removal of Armed Forces from Afghanistan','2011-03-09','0000-00-00','0000-00-00','','Failed','HOUSE','','Directs the President, pursuant to section 5(c) of the War Powers Resolution, to remove the United States Armed Forces from Afghanistan.','In HOUSE.  Failed to pass HOUSE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HCR28&ciq=voices&client_md=bd693ffb9baec0d94bcbe1ab939539c7&mode=current_text'),
(96,30,' U','2011000','HCR','Conditional Adjournment','2011-03-15','0000-00-00','2011-03-17','Enacted','Adopted','Adopted','','Provides for a conditional adjournment of the House of Representatives and a conditional recess or adjournment of the Senate.','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HCR30&ciq=voices&client_md=8a7be30ec3018bc07b1dbaaceacfc03a&mode=current_text'),
(97,48,' U','2011000','HJR','Appropriations for Fiscal Year 2011','2011-03-11','0000-00-00','2011-03-18','Enacted','Enacted','Chaptered','','Makes further continuing appropriations for fiscal year 2011, and for other purposes.','Public Law No. 112-6','2011-03-18','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HJR48&ciq=voices&client_md=645dab22f87855ecf23b3f8bcbad5efc&mode=current_text'),
(98,147,' U','2011000','HRES','Expenses of Committees of the House of Representatives','2011-03-08','0000-00-00','2011-03-17','Enacted','Adopted','Adopted','','Provides for the expenses of certain committees of the House of Representatives in the One Hundred Twelfth Congress.','In HOUSE.  Passed HOUSE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES147&ciq=voices&client_md=3ffdf955e6548d37c9548efd89524b5b&mode=current_text'),
(99,174,' U','2011000','HRES','Consideration of House Bill 1073','2011-03-16','0000-00-00','2011-03-17','Enacted','Adopted','Adopted','','Provides for consideration of the bill (H.R. 1076) to prohibit Federal funding of National Public Radio and the use of Federal funds to acquire radio content.','In HOUSE.  Passed HOUSE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES174&ciq=voices&client_md=5197e021c074b40b2b605a486cc2a051&mode=current_text'),
(100,176,' U','2011000','HRES','Anti-Tuberculosis Programs Progress','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee','','Commends the progress made by anti-tuberculosis programs.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES176&ciq=voices&client_md=59d5830ce2464ae1179551db27bd1928&mode=current_text'),
(101,177,' U','2011000','HRES','Lasting Peace in Sri Lanka','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee','','Expresses support for internal rebuilding, resettlement, and reconciliation within Sri Lanka that are necessary to ensure a lasting peace.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES177&ciq=voices&client_md=d7aef3f4cb94da9ecd8d093a25f77bd4&mode=current_text'),
(102,178,' U','2011000','HRES','Duplicative Program Report on Bill or Joint Resolution','2011-03-17','0000-00-00','0000-00-00','','Pending','House Rules Committee','','Amends the Rules of the House of Representatives to require a committee report on a bill or joint resolution to include a statement of whether the legislation creates any duplicative programs.','To HOUSE Committee on RULES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES178&ciq=voices&client_md=29cc831b0c6719a2402a6295deb78c21&mode=current_text'),
(103,179,' U','2011000','HRES','Heroic Human Endeavor of the People of Crete','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee','','Recognizes and appreciating the historical significance and the heroic human endeavor and sacrifice of the people of Crete during World War II and commending the PanCretan Association of America.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES179&ciq=voices&client_md=aa866a7b31cf723a3022172a3194b7c0&mode=current_text'),
(104,180,' U','2011000','HRES','Religious Freedoms of the Ecumenical Patriarchate','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee','','Urges Turkey to respect the rights and religious freedoms of the Ecumenical Patriarchate.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES180&ciq=voices&client_md=e8b49640fa48ae6f83119cf6a2b01643&mode=current_text'),
(105,181,' U','2011000','HRES','Honors Memory of Christina-Taylor Green','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Honors the memory of Christina-Taylor Green by encouraging schools to teach civic education and civil discourse in public schools.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES181&ciq=voices&client_md=311ec10f2210950830341554a76522de&mode=current_text'),
(106,182,' U','2011000','HRES','Honors Struggle to Improve Worker Safety Standards','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee','','Recognizes the historical significance of the Triangle Fire in the struggle to improve worker safety standards and protections on the 100th anniversary of the fire.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES182&ciq=voices&client_md=8c94d266465b0b41d187094f9065fe34&mode=current_text'),
(107,183,' U','2011000','HRES','Recognizes U.S. Army Company E','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee','','Recognizes Company E, 100th Battalion, 442d Infantry Regiment of the United States Army and the sacrifice of the soldiers of Company E and their families in support of the United States.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES183&ciq=voices&client_md=93d078c00847cd3cf05665a9f5139956&mode=current_text'),
(108,184,' U','2011000','HRES','Welcome Home Vietnam Veterans Day','2011-03-17','0000-00-00','0000-00-00','','Pending','House Veterans\' Affairs Committee','','Expresses support for designation of a \"Welcome Home Vietnam Veterans Day\".','To HOUSE Committee on VETERANS\' AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES184&ciq=voices&client_md=3fec538f81e51785b5ad70ff8c97696a&mode=current_text'),
(109,193,' U','2011000','S','Sunset of Provisions of USA Patriot Act','2011-01-26','0000-00-00','0000-00-00','','Pending','SENATE','','Extends the sunset of certain provisions of the USA patriot Act, and for other purposes.','In SENATE.  Placed on SENATE Legislative Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S193&ciq=voices&client_md=f108b14cb1fc5d54ac3a600efa71fb01&mode=current_text'),
(110,307,' U','2011000','S','Federal Building and Courthouse Designation','2011-02-08','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee','','Designates the Federal building and United States courthouse located at 217 West King Street, Martinsburg, West Virginia, as the \"W. Craig Broadwater Federal Building and United States Courthouse\".','In HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE:  Ordered to be reported.','2011-03-16','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S307&ciq=voices&client_md=0e8b9abc260ec89bb735bc561da53620&mode=current_text'),
(111,493,' U','2011000','S','SBIR and STTR Programs','2011-03-04','0000-00-00','0000-00-00','','Pending','SENATE','','Reauthorizes and improve the SBIR and STTR programs, and for other purposes.','In SENATE.  Amendment SA 244 proposed by Senator Landrieu to Amendment SA 183.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S493&ciq=voices&client_md=c964e42c67f2c0cba508f397da668980&mode=current_text'),
(112,604,' U','2011000','S','Marriage and Family Therapist Service Coverage','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee','','Amends title XVIII of the Social Security Act to provide for the coverage of marriage and family therapist services and mental health counselor services under part B of the Medicare program, and for other purposes.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S604&ciq=voices&client_md=525875fcd0f5ccff0803bd3343328d18&mode=current_text'),
(113,605,' U','2011000','S','Place Synthetic Drugs in Schedule 1','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee','','Amends the Controlled Substances Act to place synthetic drugs in Schedule I.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S605&ciq=voices&client_md=5167eff94b2a8dd8195b051664e656cf&mode=current_text'),
(114,606,' U','2011000','S','Incentive Program for Tropical Pediatric Diseases','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi','','Amends the Federal Food, Drug, and Cosmetic Act to improve the priority review voucher incentive program relating to tropical and rare pediatric diseases.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S606&ciq=voices&client_md=67de0e9b6fda7674a2734b852b8406de&mode=current_text'),
(115,607,' U','2011000','S','Exchange of Lands in Oregon','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee','','Designates certain land in the State of Oregon as wilderness; provides for the exchange of certain Federal land and non-Federal land, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S607&ciq=voices&client_md=2f85c24401dfbc7311ef378ebe75353c&mode=current_text'),
(116,608,' U','2011000','S','Maritime Liens on Fishing Licenses','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe','','Provides limitations on maritime liens on fishing licenses and for other purposes.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S608&ciq=voices&client_md=c438204d3d80fb5f70a833bd09cc5df5&mode=current_text'),
(117,609,' U','2011000','S','Effects of Federal Regulatory Mandates','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Environment and Public Works Committee','','Provides for the establishment of a committee to assess the effects of certain Federal regulatory mandates.','To SENATE Committee on ENVIRONMENT AND PUBLIC WORKS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S609&ciq=voices&client_md=45bf292fb7661d337b600013a5650d6e&mode=current_text'),
(118,610,' U','2011000','S','Conveyance of Land in Oklahoma','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Agriculture, Nutrition & Forestry Committee','','Provides for the conveyance of approximately 140 Acres of land in the Ouachita National Forest in Oklahoma to the Indian Nations Council, Inc., of the Boy Scouts of America, and for other purposes.','To SENATE Committee on AGRICULTURE, NUTRITION AND FORESTRY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S610&ciq=voices&client_md=20d065293a2664066447b83ec2a66e74&mode=current_text'),
(119,611,' U','2011000','S','Greater Technical Resources to FCC Commissioners','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe','','Provides greater technical resources to FCC Commissioners.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S611&ciq=voices&client_md=ab336b0e6ebb3e8bfcef427b98c295e1&mode=current_text'),
(120,612,' U','2011000','S','Reduce Consumption of Petroleum Products by Government','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee','','Amends the Energy Policy and Confirmation Act to require the Secretary of Energy to develop and implement a strategic petroleum demand response plan to reduce the consumption of petroleum products by the Federal Government.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S612&ciq=voices&client_md=6e8779b526ca28c497813df26f0dcc68&mode=current_text'),
(121,613,' U','2011000','S','Expert Witness Fees','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi','','Amends the Individuals with Disabilities Education Act to permit a prevailing party in an action or proceeding brought to enforce the Act to be awarded expert witness fees and certain other expenses.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S613&ciq=voices&client_md=01f89a6571bcf518207e199f1fdc7348&mode=current_text'),
(122,614,' U','2011000','S','Trial for Unprivileged Enemy Belligerent in Court','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee','','Requires the Attorney General to consult with appropriate officials within the executive branch prior to making the decision to try an unprivileged enemy belligerent in Federal Court.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S614&ciq=voices&client_md=9deb7145d7770e141bf398ddd8f870d9&mode=current_text'),
(123,615,' U','2011000','S','Alternative Infrastructure to Improve Efficiency','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Homeland Security and Governmental Affairs ','','Improves the accountability and transparency in infrastructure spending by requiring a life-cycle cost analysis of major infrastructure projects; provides the flexibility to use alternate infrastructure type bidding procedures to reduce project costs; and requires the use of design standards to improve efficiency and save taxpayer dollars.','To SENATE Committee on HOMELAND SECURITY AND GOVERNMENTAL AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S615&ciq=voices&client_md=af5ac0058d1091e15d5c5259cbf7a7bf&mode=current_text'),
(124,616,' U','2011000','S','Support the Community Schools Model','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi','','Amends the Elementary and Secondary Education Act of 1965 in order to support the community schools model.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S616&ciq=voices&client_md=82c9fcd8e04550f19903b3129eb08f08&mode=current_text'),
(125,617,' U','2011000','S','Convey Land in Elko County, Nevada','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee','','Requires the Secretary of the Interior to convey certain Federal land to Elko County, Nevada, and to take land into trust for the Te-moak Tribe of Western Shoshone Indians of Nevada, and or other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S617&ciq=voices&client_md=e2a535bb5cf5f7bcb2b873e86a518352&mode=current_text'),
(126,618,' U','2011000','S','The Private Sector in Egypt and Tunisia','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee','','Promotes the strengthening of the private sector in Egypt and Tunisia.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S618&ciq=voices&client_md=0e64b2187a5186082e5e8a89c011bd3c&mode=current_text'),
(127,619,' U','2011000','S','Strengthens the Capacity of Elementary Schools','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi','','Assists in the coordination among science, technology, engineering, and mathematics efforts in the States; strengthens the capacity of elementary schools, middle schools, and secondary schools to prepare students in science, technology, engineering, and mathematics, and for other purposes.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S619&ciq=voices&client_md=00c8b48afbcf2adf6237a2331f50e282&mode=current_text'),
(128,620,' U','2011000','S','Fire Safety Education Programs on College Campuses','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi','','Authorizes the Secretary of Education to make grants to support fire safety education programs on college campuses.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S620&ciq=voices&client_md=8a816238b0a022f692690f6874e0cb7b&mode=current_text'),
(129,621,' U','2011000','S','Excess Funds Available from Surface Mining','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee','','Amends the Surface Mining Control and Reclamation Act of 1977 to provide for use of excess funds available under that Act to provide for certain benefits, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S621&ciq=voices&client_md=f1780e3bab50b98c5b9883b1753f0967&mode=current_text'),
(130,622,' U','2011000','S','Regulation and Assessment for Public Schools','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi','','Establishes the Commission on Effective Regulation and Assessment Systems for Public Schools.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S622&ciq=voices&client_md=a8f2bc3e60d0fb8ab0fa6c309ac65cd0&mode=current_text'),
(131,623,' U','2011000','S','Disclosures of Discovery Information in Civil Actions','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee','','Amends chapter 111 of title 28, United States Code, relating to protective orders, sealing of cases, disclosures of discovery information in civil actions, and for other purposes.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S623&ciq=voices&client_md=ac5be4369550aad44db9ec56602b4f55&mode=current_text'),
(132,624,' U','2011000','S','Transform Neighborhoods of Extreme Poverty','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Banking, Housing and Urban Affairs Committe','','Authorizes the Department of Housing and Urban Development to transform neighborhoods of extreme poverty into sustainable, mixed-income neighborhoods with access to economic opportunities, by revitalizing severely distressed housing, and investing and leveraging investments in well-functioning services, educational opportunities, public assets, public transportation, and improved access to jobs.','To SENATE Committee on BANKING, HOUSING AND URBAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S624&ciq=voices&client_md=78a9dfeccf0b3b769604e820b2eba6c7&mode=current_text'),
(133,625,' U','2011000','S','Statewide Transportation Planning','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Environment and Public Works Committee','','Amends title 23, United States Code, to incorporate regional transportation planning organizations into statewide transportation planning, and for other purposes.','To SENATE Committee on ENVIRONMENT AND PUBLIC WORKS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S625&ciq=voices&client_md=d396437f4fb60147a60219e3f9ee7b46&mode=current_text'),
(134,626,' U','2011000','S','Incentive to Reinvest Foreign Shipping Earnings','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee','','Amends the Internal Revenue Code of 1986 to repeal the shipping investment withdrawal rules in section 955 and to provide an incentive to reinvest foreign shipping earnings in the United States.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S626&ciq=voices&client_md=0097db78376bc3aed18c409866eb9922&mode=current_text'),
(135,627,' U','2011000','S','Processing Delays on Freedom of Information','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee','','Establishes the Commission on Freedom of Information Act Processing Delays.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S627&ciq=voices&client_md=f78c320aacf019a301b74c5bc4bc78ff&mode=current_text'),
(136,628,' U','2011000','S','Alaskan Railroad Corporation Right of Way','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee','','Authorizes the Secretary of the Interior to convey a railroad right of way between North Pole, Alaska, and Delta Junction, Alaska, to the Alaska Railroad Corporation.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S628&ciq=voices&client_md=8c1e68bc3bc8c54e11a545d3eac7dfc3&mode=current_text'),
(137,629,' U','2011000','S','Hydropower Improvements','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee','','Improves hydropower, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S629&ciq=voices&client_md=854780a56b30a299164df0810f0a2d05&mode=current_text'),
(138,630,' U','2011000','S','Hydrokinetic Renewable Energy Research','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee','','Promotes marine and hydrokinetic renewable energy research and development, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S630&ciq=voices&client_md=2cb44f573773cab9f8333f0394d6b859&mode=current_text'),
(139,631,' U','2011000','S','Tax Provisions Generated by Hydropower Resources','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee','','Extends certain Federal benefits and income tax provisions to energy generated by hydropower resources.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S631&ciq=voices&client_md=b8c3150cd0daffde48fcde11cbfed34b&mode=current_text'),
(140,632,' U','2011000','S','Rebuilding Over-Fished Fisheries','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe','','Amends the Magnuson-Stevens Fishery Conservation and Management Act to extend the authorized period for rebuilding of certain overfished fisheries, and for other purposes.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S632&ciq=voices&client_md=7a9c966441e4b81158c426c80a7c23d7&mode=current_text'),
(141,633,' U','2011000','S','Fraud in Small Business Contracting','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Small Business and Entrepreneurship Committ','','Prevents fraud in small business contracting, and for other purposes.','To SENATE Committee on SMALL BUSINESS AND ENTREPRENEURSHIP.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S633&ciq=voices&client_md=f447408c958f83ef5b521b7fd49a93b5&mode=current_text'),
(142,634,' U','2011000','S','Deportation to Nazi Concentration Camps by Train','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee','','Ensures that the courts of the United States may provide an impartial forum for claims brought by United States citizens and others against any railroad organized as a separate legal entity, arising from the deportation of United States citizens and others to Nazi concentration camps on trains owned or operated by such railroad, and by the heirs and survivors of such persons.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S634&ciq=voices&client_md=3d433c891dcafaf30ada6e3f9d71d118&mode=current_text'),
(143,635,' U','2011000','S','Sell Lands Suitable for Disposal','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee','','Directs the Secretary of the Interior to sell certain Federal lands in Arizona, Colorado, Idaho, Montana, Nebraska, Nevada, New Mexico, Oregon, Utah, and Wyoming, previously identified as suitable for disposal, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S635&ciq=voices&client_md=9c247fbd86c7e2ad95a6ece0e4d28049&mode=current_text'),
(144,636,' U','2011000','S','Quileute Indian Tribe Tsunami and Flood Protection','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Indian Affairs Committee','','Provides the Quileute Indian Tribe Tsunami and Flood Protection, and for other purposes.','To SENATE Committee on INDIAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S636&ciq=voices&client_md=c43f91caf562d409d153a2bc45069d9b&mode=current_text'),
(145,637,' U','2011000','S','Guarantees for Debt Issued on Behalf of Catastrophes','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Banking, Housing and Urban Affairs Committe','','Establishes a program to provide guarantees for debt issued by or on behalf of State catastrophe insurance programs to assist in the financial recovery from earthquakes, earthquake-induced landslides, volcanic eruptions, and tsunamis.','To SENATE Committee on BANKING, HOUSING AND URBAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S637&ciq=voices&client_md=d3246dd972546e92ac99b02d1aab81a8&mode=current_text'),
(146,638,' U','2011000','S','Incarcerating Undocumented Aliens Charged with a Felony','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee','','Amends the Immigration and Nationality Act to provide for compensation to States incarcerating undocumented aliens charged with a felony or two or more misdemeanors.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S638&ciq=voices&client_md=4f82961e5e0445926a4cf4c01c3a1e12&mode=current_text'),
(147,639,' U','2011000','S','State Criminal Alien Assistance Program','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee','','Authorizes to be appropriated $950,000,000 for each of the fiscal years 2012 through 2015 to carry out the State Criminal Alien Assistance Program.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S639&ciq=voices&client_md=cbd15b53c944d3b1204aec9ff7e65ab6&mode=current_text'),
(148,640,' U','2011000','S','Importance of International Nuclear Safety Cooperation','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee','','Underscores the importance of international nuclear safety cooperation for operating power reactors; encourages the efforts of the Convention on Nuclear Safety; supports progress in improving nuclear safety; enhances the public availability of nuclear safety information.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S640&ciq=voices&client_md=9a650fc72d4a6c529dd8e7bf0544f6aa&mode=current_text'),
(149,641,' U','2011000','S','Provides Access to Safe Drinking Water','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee','','Provides 100,000,000 people with first-time access to safe drinking water and sanitation on a sustainable basis within six years by improving the capacity of the United States Government to fully implement the Senator Paul Simon Water for the Poor Act of 2005.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S641&ciq=voices&client_md=3925b8b7074629a6b4e64754d5b15392&mode=current_text'),
(150,642,' U','2011000','S','The EB 5 Regional Center Program','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee','','Permanently reauthorizes the EB-5 Regional Center Program.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S642&ciq=voices&client_md=499f385cd61821be80f36848766039bc&mode=current_text'),
(151,643,' U','2011000','S','Payments to Qualified Health Centers and Rural Clinics','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee','','Amends title XIX of the Social Security Act to direct Medicaid Electronic Health Records incentive payments to federally qualified health centers and rural health clinics.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S643&ciq=voices&client_md=ae9db59f7a905b95562174754d44f74f&mode=current_text'),
(152,644,' U','2011000','S','Coverage for Annuity Purposes','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Homeland Security and Governmental Affairs ','','Amends subchapter II of chapter 84 of title 5, United States Code, to prohibit coverage for annuity purposes for any individual hired as a Federal employee after 2012.','To SENATE Committee on HOMELAND SECURITY AND GOVERNMENTAL AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S644&ciq=voices&client_md=e2ea69e864a8c7c1b78a29fd58f73b66&mode=current_text'),
(153,645,' U','2011000','S','Permanent Background Check System','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee','','Amends the National Child Protection Act of 1993 to establish a permanent background check system.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S645&ciq=voices&client_md=02022357b43b8999005394eabeb6c342&mode=current_text'),
(154,646,' U','2011000','S','Federal Natural Hazards Reduction Programs','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe','','Reauthorizes Federal natural hazards reduction programs, and for other purposes.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S646&ciq=voices&client_md=b97f888de1f8b3e121d605a295c02f74&mode=current_text'),
(155,647,' U','2011000','S','Mineral Rights in Montana','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee','','Authorizes the conveyance of mineral rights by the Secretary of the Interior in the State of Montana, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S647&ciq=voices&client_md=cd154910158b52ef232250d6454211f5&mode=current_text'),
(156,648,' U','2011000','S','Waiting Period Waiver for Huntington\'s Disease','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee','','Requires the Commissioner of Social Security to revise the medical and evaluation criteria for determining disability in a person diagnosed with Huntington\'s Disease and to waive the 24-month waiting period for Medicare eligibility for individuals disabled by Huntington\'s Disease.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S648&ciq=voices&client_md=ee119885b3b61b4cf81cda4298b83adf&mode=current_text'),
(157,649,' U','2011000','S','Awareness Activities for Bone and Skin Diseases','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi','','Expands the research and awareness activities of the National Institute of Arthritis and Musculoskeletal and Skin Diseases and the Centers for Disease Control and Prevention with respect to scleroderma, and for other purposes.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S649&ciq=voices&client_md=b63dd5d529743658cf16fe21d3807bfb&mode=current_text'),
(158,650,' U','2011000','S','Criteria used to Grant Waivers for Health Care Law','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee','','Requires greater transparency concerning the criteria used to grant waivers to the job-killing health care law and to ensure that applications for such waivers are treated in a fair and consistent manner, irrespective of the applicant\'s political contributions or association with a labor union, a health plan provided for under a collective bargaining agreement, or another organized labor group.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S650&ciq=voices&client_md=5ccbed0a51605b5b0a642299bde436ee&mode=current_text'),
(159,651,' U','2011000','S','McKinney Lake National Fish Hatchery to North Carolina','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Environment and Public Works Committee','','Requires the Secretary of the Interior to convey the McKinney Lake National Fish Hatchery to the State of North Carolina, and for other purposes.','To SENATE Committee on ENVIRONMENT AND PUBLIC WORKS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S651&ciq=voices&client_md=243912d7847c80e7094786268c6eef6d&mode=current_text'),
(160,652,' U','2011000','S','Efficient Investments and Infrastructure Financing','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee','','Facilitates efficient investments and financing of infrastructure projects and new job creation through the establishment of an American Infrastructure Financing Authority; provides for an extension of the exemption from the alternative minimum tax treatment for certain tax-exempt bonds, and for other purposes.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S652&ciq=voices&client_md=1db470ff527f9e1df957c3d3ba3bf69a&mode=current_text'),
(161,51,' U','2011000','SRES','Celebrating Greek and American Democracy','2011-02-15','0000-00-00','2011-03-17','Enacted','Adopted','Adopted','','Recognizes the 190th anniversary of the independence of Greece and celebrating Greek and American democracy.','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES51&ciq=voices&client_md=5bf435747072ac8d554c2dc6bdb25f03&mode=current_text'),
(162,104,' U','2011000','SRES','Campus Fire Safety Month','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee','','Designates September 2011 as \"Campus Fire Safety Month\".','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES104&ciq=voices&client_md=379f0b29f885cc837d0d4277bb92c43f&mode=current_text'),
(163,105,' U','2011000','SRES','Belarus Elections Meeting International Standards','2011-03-17','0000-00-00','2011-03-17','Enacted','Adopted','Adopted','','Condemns the December 19, 2010, elections in Belarus, and to call for the immediate release of all political prisoners and for new elections that meet international standards.','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES105&ciq=voices&client_md=e4de91da732656d49aed30062c01ce0f&mode=current_text'),
(164,106,' U','2011000','SRES','Honors Triangle Shirtwaist Company Fire in 1911','2011-03-17','0000-00-00','2011-03-17','Enacted','Adopted','Adopted','','Recognizes the 100th anniversary of the Triangle Shirtwaist Company fire in New York City on March 25, 1911, and designating the week of March 21, 2011, through March 25, 2011, as the \"100th Anniversary of the Triangle Shirtwaist Factory Fire Remembrance Week\".','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES106&ciq=voices&client_md=8c1d37f022bed39cccdc94906b393dc7&mode=current_text'),
(165,107,' U','2011000','SRES','National Association of Junior Auxiliaries Day','2011-03-17','0000-00-00','2011-03-17','Enacted','Adopted','Adopted','','Designates April 4, 2011, as \"National Association of Junior Auxiliaries Day\".','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES107&ciq=voices&client_md=28f7d0f65bddcd2c449f8636de9761d0&mode=current_text'),
(166,108,' U','2011000','SRES','Investment Relations Between the U.S. and Brazil','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee','','Expresses the sense of the Senate on the importance of strengthening investment relations between the United States and Brazil.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES108&ciq=voices&client_md=5360749531d016cab37b30f1eb55dac1&mode=current_text');

/*Table structure for table `tbl_capabilities` */

DROP TABLE IF EXISTS `tbl_capabilities`;

CREATE TABLE `tbl_capabilities` (
  `id` int(9) NOT NULL auto_increment,
  `capability_name` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_capabilities` */

insert into `tbl_capabilities` values 
(1,'View'),
(2,'Add'),
(3,'Modify Own Content'),
(4,'Modify Others Content'),
(5,'Author Content'),
(6,'Publish Content'),
(7,'Unpublish Content'),
(8,'Delete Content'),
(9,'Comment'),
(10,'Filter Content'),
(11,'Subscribe to Content'),
(12,'Vote on Content'),
(13,'View Statistics'),
(14,'Close out comments'),
(15,'Close out voting');

/*Table structure for table `tbl_contents` */

DROP TABLE IF EXISTS `tbl_contents`;

CREATE TABLE `tbl_contents` (
  `id` int(9) NOT NULL auto_increment,
  `section_name` varchar(200) default NULL,
  `category_name` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_contents` */

insert into `tbl_contents` values 
(1,'Bill Resources','Bill Summary'),
(2,'Bill Resources','Bill Detail'),
(3,'Bill Resources','Vote Alert'),
(4,'ER Content','News'),
(5,'ER Content','Bulletins'),
(6,'ER Content','Comments'),
(7,'ER Content','Report Card'),
(8,'Affiliate Content','News'),
(9,'Affiliate Content','Bills / Petitions'),
(10,'Affiliate Content','Bulletins'),
(11,'Affiliate Content','Sponsorship'),
(12,'Affiliate Content','Page Header'),
(13,'Home Page ','Content'),
(14,'FAQs',''),
(15,'About Us','Message from CEO'),
(16,'About Us','Overview'),
(17,'User Registration','Register');

/*Table structure for table `tbl_elected_officials` */

DROP TABLE IF EXISTS `tbl_elected_officials`;

CREATE TABLE `tbl_elected_officials` (
  `Elected_Officer_ID` int(11) unsigned NOT NULL auto_increment,
  `ElectedOfficialID` varchar(255) default NULL,
  `AssemblyName` varchar(255) default NULL,
  `DistrictID` varchar(255) default NULL,
  `DistrictIDLabel` varchar(255) default NULL,
  `DistrictType` varchar(255) default NULL,
  `IsAtLarge` tinyint(1) default NULL,
  `Party` varchar(255) default NULL,
  `RepresentingState` varchar(255) default NULL,
  `Term_Start` datetime default NULL,
  `TermStartDatePrecision` varchar(255) default NULL,
  `Term_End` datetime default NULL,
  `TermEndDatePrecision` varchar(255) default NULL,
  `Country` varchar(255) default NULL,
  `First_Name` varchar(255) default NULL,
  `Middle_Name` varchar(255) default NULL,
  `Last_Name` varchar(255) default NULL,
  `Title` varchar(255) default NULL,
  `PrimaryAddress1` varchar(255) default NULL,
  `PrimaryAddress2` varchar(255) default NULL,
  `PrimaryAddress3` varchar(255) default NULL,
  `PrimaryCity` varchar(255) default NULL,
  `PrimaryState` varchar(255) default NULL,
  `PrimaryPostalCode` varchar(255) default NULL,
  `PrimaryPhone1` varchar(255) default NULL,
  `PrimaryPhone2` varchar(255) default NULL,
  `PrimaryFax1` varchar(255) default NULL,
  `PrimaryFax2` varchar(255) default NULL,
  `SecondaryAddress1` varchar(255) default NULL,
  `SecondaryAddress2` varchar(255) default NULL,
  `SecondaryAddress3` varchar(255) default NULL,
  `SecondaryCity` varchar(255) default NULL,
  `SecondaryState` varchar(255) default NULL,
  `SecondaryPostalCode` varchar(255) default NULL,
  `SecondaryPhone1` varchar(255) default NULL,
  `SecondaryPhone2` varchar(255) default NULL,
  `SecondaryFax1` varchar(255) default NULL,
  `SecondaryFax2` varchar(255) default NULL,
  `EMail1` varchar(255) default NULL,
  `EMail2` varchar(255) default NULL,
  `Url1` varchar(255) default NULL,
  `Url2` varchar(255) default NULL,
  `Description` text,
  `Committees` text,
  `LastUpdateDate` datetime default NULL,
  PRIMARY KEY  (`Elected_Officer_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_elected_officials` */

/*Table structure for table `tbl_emails` */

DROP TABLE IF EXISTS `tbl_emails`;

CREATE TABLE `tbl_emails` (
  `email_id` bigint(12) NOT NULL auto_increment,
  `content` text,
  `restore_content` text,
  `subject` varchar(255) default NULL,
  PRIMARY KEY  (`email_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_emails` */

insert into `tbl_emails` values 
(1,'<pre>\r\nDear (sName):\r\n\r\nThank you for joining VOICES FOR CHANGE. You have one of the most powerful tools for making your VOICE heard \r\nby your elected representatives. When you take a few moments to express your support or lack of support for \r\nproposed legislation, your opinion is magnified by others with a similar viewpoint and this information is \r\nprovided in aggregate to your elected officials. Will they listen to those that elected them to office or \r\nwill they support special interest groups? VOICES tracks just how well they represent their constituents to \r\ndrive accountability into the legislative process.\r\n\r\nTo learn more about your elected officials please view the \"Electoral District\" tab on your dashboard.\r\n\r\nTo gain the most value from your subscription, please take a few moments to familiarize yourself with VOICES \r\nby touring the (slink).\r\n\r\nYou can use the following login credentials to use the services of our site.\r\n\r\nUsername : (sUserName)\r\nPassword  : (sPassword)\r\n\r\n\r\n\r\n<b>Regards,\r\nVOICES FOR CHANGE</b>\r\n</pre>','<b>Welcome  (sName) ,</b>\r\n<pre>Thank You for registering with Bohire.\r\nYou can use the following login credentials to use the services of our site.\r\nUsername : (sUserName)\r\nPassword  : (spassword)\r\nYour account will be activated shortly after Admin approve it\r\n</pre>\r\n<b>Regards,<br>Bohire</b>','Welcome to VOICES FOR CHANGE'),
(2,'<strong>Dear (sUserName):<br /></strong><br />As requested, we have generated a new password for you.<br /><br />Password: <strong>(sPassword)<br /></strong><br />Please <strong>(sLink)</strong> with your new password.<br /><br /><b>Regards,<br />VOICES FOR CHANGE</b>','<strong>Dear (sUserName):<br /></strong><br />As requested, we have generated a new password for you.<br /><br />Password: <strong>(sPassword)<br /></strong><br />Please <strong>(sLink)</strong> with your new password.<br /><br /><b>Regards,<br />VOICES FOR CHANGE</b>','Response to Your Password Request');

/*Table structure for table `tbl_member` */

DROP TABLE IF EXISTS `tbl_member`;

CREATE TABLE `tbl_member` (
  `member_id` int(11) unsigned NOT NULL auto_increment,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isActive` enum('y','n','d') NOT NULL default 'y',
  `member_type` enum('subscriber','observer','effiliate','elected_official') NOT NULL,
  `reg_date` datetime NOT NULL,
  `tt` date default NULL,
  PRIMARY KEY  (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_member` */

insert into `tbl_member` values 
(1,'affi','Affiliate','defaultaff','anil.netsmartz@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','y','effiliate','0000-00-00 00:00:00',NULL),
(71,'Mary','Jones','mjones','mjones@thwakk.com','5f4dcc3b5aa765d61d8327deb882cf99','y','subscriber','2011-07-19 18:33:32',NULL),
(70,'Joe','Smith','jsmith','jsmith@thwakk.com','5f4dcc3b5aa765d61d8327deb882cf99','y','effiliate','2011-07-19 18:25:23',NULL),
(6,'Charlie','White','Charlie.White','charlie.white@nycap.rr.com','afe611fce042b6a56e8fe1ab2d3a155c','y','subscriber','2011-06-23 07:15:41',NULL),
(69,'Observer','Observer','observer','anil.nautiyal@netsmartz.net','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2011-07-12 19:28:54',NULL),
(67,'sadf','sadf','sdafwe','sdaf@asd.com','8ad3fac6c6b3528499d347d924443abb','y','effiliate','2011-07-06 15:33:57',NULL),
(66,'afsadf','sadfdsa','sadfsda','asdf@as.com','4297f44b13955235245b2497399d7a93','y','effiliate','2011-07-04 16:10:17',NULL),
(72,'asdfdsaf','asdfdsaf','qwesad','asdasasd@as.com','4297f44b13955235245b2497399d7a93','y','effiliate','2011-07-27 18:52:15',NULL),
(73,'Himender','Singh','Himender','himender.singh@sebiz.net','c7b63a79e5cc9c0cf0bfb799502311bb','n','subscriber','2011-07-28 11:36:12',NULL),
(74,'Himender','Singh','himender','himender.singh@gmail.com','c60f75a72efa91c561e5f53178e1f500','y','subscriber','2011-07-28 11:37:19',NULL),
(75,'Himender','Singh','Himender','Himender.singh@gmail.com','c60f75a72efa91c561e5f53178e1f500','d','subscriber','2011-07-28 11:38:57',NULL),
(76,'himender','Singh','Himender','himender.singh@sebiz.net','c7b63a79e5cc9c0cf0bfb799502311bb','d','subscriber','2011-07-28 11:44:44',NULL),
(77,'My','group','group1','himender@yahoo.com','ae2b1fca515949e5d54fb22b8ed95575','y','effiliate','2011-07-28 12:25:34',NULL),
(78,'himender','Singh','Himender','himender.singh@sebiz.net','c7b63a79e5cc9c0cf0bfb799502311bb','d','subscriber','2011-07-28 12:27:16',NULL),
(79,'your','Home','Group3','himender.singh@gmail.com','c60f75a72efa91c561e5f53178e1f500','y','effiliate','2011-07-28 12:58:50',NULL),
(80,'GG','SS','testing','himenderc@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','y','effiliate','2011-07-28 16:51:01',NULL);

/*Table structure for table `tbl_pages` */

DROP TABLE IF EXISTS `tbl_pages`;

CREATE TABLE `tbl_pages` (
  `page_id` bigint(12) NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `metakeyword` varchar(50) default NULL,
  `metadescription` varchar(100) default NULL,
  `content` longtext,
  `last_updated` date default NULL,
  `page_key` varchar(20) default NULL,
  PRIMARY KEY  (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pages` */

insert into `tbl_pages` values 
(1,'Abour Us','Abour Us','Abour Us','&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n    &lt;tbody&gt;\r\n        &lt;tr&gt;\r\n            &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n            &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                &lt;tbody&gt;\r\n                    &lt;tr&gt;\r\n                        &lt;td class=&quot;arial_16_c40306&quot; valign=&quot;top&quot; align=&quot;left&quot;&gt;\r\n                        &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                            &lt;tbody&gt;\r\n                                &lt;tr&gt;\r\n                                    &lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n                                &lt;/tr&gt;\r\n                                &lt;tr&gt;\r\n                                    &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n                                    &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                        &lt;tbody&gt;\r\n                                            &lt;tr&gt;\r\n                                                &lt;td class=&quot;arial_16_c40306&quot; valign=&quot;top&quot; align=&quot;left&quot;&gt;\r\n                                                &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                    &lt;tbody&gt;\r\n                                                        &lt;tr&gt;\r\n                                                            &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt;\r\n                                                            &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                &lt;tbody&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td class=&quot;Trebuchet_27_c60000&quot; height=&quot;37&quot; valign=&quot;top&quot; align=&quot;left&quot;&gt;About Us &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td class=&quot;arial_20_c40306&quot; bgcolor=&quot;#b1b0ac&quot; valign=&quot;top&quot; align=&quot;left&quot;&gt;&lt;img alt=&quot;&quot; width=&quot;1&quot; height=&quot;1&quot; src=&quot;images/trans.gif&quot; /&gt; &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt;\r\n                                                                        &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                            &lt;tbody&gt;\r\n                                                                                &lt;tr&gt;\r\n                                                                                    &lt;td style=&quot;PADDING-BOTTOM: 15px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 20px&quot; valign=&quot;top&quot; align=&quot;left&quot;&gt;\r\n                                                                                    &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                                        &lt;tbody&gt;\r\n                                                                                            &lt;tr&gt;\r\n                                                                                                &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt;\r\n                                                                                                &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                                                    &lt;tbody&gt;\r\n                                                                                                        &lt;tr&gt;\r\n                                                                                                            &lt;td valign=&quot;top&quot; width=&quot;235&quot; align=&quot;left&quot;&gt;&lt;img alt=&quot;&quot; width=&quot;219&quot; height=&quot;140&quot; src=&quot;images/img_aboutus_body.jpg&quot; /&gt; &lt;/td&gt;\r\n                                                                                                            &lt;td class=&quot;arial_12_000&quot; valign=&quot;middle&quot; align=&quot;left&quot;&gt;\r\n                                                                                                            &lt;h4&gt;&lt;span class=&quot;arial_15_000_bold&quot;&gt;&lt;span class=&quot;Title&quot;&gt;ABOUT OUR VOICES FOR CHANGE.US (VOICES) &lt;/span&gt;&lt;/span&gt;&lt;/h4&gt;\r\n                                                                                                            &lt;h3&gt;&lt;span class=&quot;arial_15_000_bold&quot;&gt;&lt;/span&gt;&lt;/h3&gt;\r\n                                                                                                            &lt;p class=&quot;arial_12_000&quot;&gt;VOICES was created to provide tools that will allow; citizens that are frustrated at the lack of response from elected officials to be heard in a manner never before available, elected representatives a platform to inform their constituents what they are trying to accomplish for them, and advocacy organizations a method to inform their followers of their positions on issues, and rally them to action. &lt;br /&gt;&lt;/p&gt;\r\n                                                                                                            &lt;p class=&quot;arial_12_000&quot;&gt;VOICES provides a citizen a method with which to inform their state and federal officials on how you would like them to vote on legislation, and a method to track what actions the representative takes.&lt;/p&gt;\r\n                                                                                                            &lt;/td&gt;\r\n                                                                                                        &lt;/tr&gt;\r\n                                                                                                    &lt;/tbody&gt;\r\n                                                                                                &lt;/table&gt;\r\n                                                                                                &lt;/td&gt;\r\n                                                                                            &lt;/tr&gt;\r\n                                                                                        &lt;/tbody&gt;\r\n                                                                                    &lt;/table&gt;\r\n                                                                                    &lt;/td&gt;\r\n                                                                                &lt;/tr&gt;\r\n                                                                                &lt;tr style=&quot;FONT-FAMILY: Arial&quot;&gt;\r\n                                                                                    &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES provides a method for individuals with a similar position on an issue to inform an elected official of their position on a collective basis, so your voice is no longer singular. &lt;br /&gt;&lt;br /&gt;For organizations that advocate a position on matters important to its members VOICES provides an unparalleled set of tools. Each time a member that has identified your group as it &amp;quot;Prime Affiliate&amp;quot; logs in your Affiliate page is presented on the member&#039;s dashboard, automatically updated with all content you have posted. &lt;br /&gt;&lt;br /&gt;Each elected representative is also provided with an &amp;quot;Elected Representative&amp;quot; page, which is tied to each of his constituents dashboard. We validate that the member does in fact live in the representative&#039;s district. A powerful tool set is provided to the representative, through which they can communicate with their constituents. &lt;br /&gt;&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;HOW VOICES WORKS FOR: &lt;/p&gt;\r\n                                                                                    &lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css&quot; media=&quot;all&quot; /&gt;&lt;script src=&quot;http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;&lt;script src=&quot;http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;&lt;script&gt;\r\n	$(function() {\r\n		$( &quot;#tabs&quot; ).tabs();\r\n	});\r\n	&lt;/script&gt;\r\n                                                                                    &lt;div class=&quot;demo&quot;&gt;\r\n                                                                                    &lt;div id=&quot;tabs&quot;&gt;\r\n                                                                                    &lt;ul&gt;\r\n                                                                                        &lt;li&gt;&lt;a class=&quot;arial_12_000&quot; href=&quot;#tabs-1&quot;&gt;Advocates&lt;/a&gt; &lt;/li&gt;\r\n                                                                                        &lt;li&gt;&lt;a class=&quot;arial_12_000&quot; href=&quot;#tabs-2&quot;&gt;Citizens&lt;/a&gt; &lt;/li&gt;\r\n                                                                                        &lt;li&gt;&lt;a class=&quot;arial_12_000&quot; href=&quot;#tabs-3&quot;&gt;Elected Representatives&lt;/a&gt; &lt;/li&gt;\r\n                                                                                    &lt;/ul&gt;\r\n                                                                                    &lt;div id=&quot;tabs-1&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;For Advocates&lt;/strong&gt; &lt;br /&gt;&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES was created to provide a platform that will allow citizens to express their opinions to their elected representatives in a meaningful way. These citizens rely on groups such yours that they identify with to provide opinions and positions on matters important to them. The tools provided in our platform will stimulate your membership to action because they will realize that their voices will be heard. VOICES asks its members to identify a &amp;ldquo;Prime Affiliate&amp;rdquo; and other Affiliates whose opinions they would like to consider, before they express themselves to their elected representatives. Once they do so, the Prime Affiliate&#039;s home page appears on the member&#039;s dashboard when they log in. VOICES also pays a significant referral fee to the Prime Affiliate that a member (only) identifies when they join. When a group becomes a VOICES &amp;ldquo;Affiliate&amp;rdquo;, we create and affiliate&#039;s home page for you. Any member can view any affiliate&#039;s page. Your Affiliate&#039;s page provides for the following: &lt;/p&gt;\r\n                                                                                    &lt;ul&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Upon sign-up we create a blank page for affiliate &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;We create space at top for banner/logo etc &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;We allow 4 sections for your organization to post data &lt;/li&gt;\r\n                                                                                    &lt;/ul&gt;\r\n                                                                                    &lt;ol&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;News section (with comments from affiliate) informing members of position on issues\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Any topic of interest affiliate normally take a position on i.e. economic issues (debt ceiling etc) gay marriage, healthcare, etc etc &lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;create drop-down where members can also post their comment on the article placed in this section by the Affiliate &lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Bills/petitions section\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Posting comment on bill creates Bill resource page, when a member they clicks on bill with comment on this page they are taken to BR page, otherwise they can just read comment &lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Petition posted here allows for members to sign, and is listed under &amp;ldquo;validated signors&amp;rdquo; (which tells elected reps that the Petition was signed by one of their constituents). &lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Bulletins section affiliate may post articles (no comments allowed from members)\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Endorsing candidates, &lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Meeting notices &lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;etc., etc. &lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Advertising section allows Affiliate to post;\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Sponsors list with link to sponsor site &lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Ads from sponsors allowing for one visual (graphic) I think we need to limit overall capacity in this section as to amount of characters or space. &lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                    &lt;/ol&gt;\r\n                                                                                    &lt;ul&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;&amp;ldquo;DONATE&amp;rdquo;, VOICES creates and provides a link for affiliates to set up a Paypal account at which your followers can make contributions to you. When a member clicks on that link they are taken to Paypal, make a contribution, and it is credited to your account. &lt;/li&gt;\r\n                                                                                    &lt;/ul&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;div id=&quot;tabs-2&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;For Citizens&lt;/strong&gt; &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;As a citizen you have every right to expect your elected representatives to listen to the people. VOICES was created to provide you with a platform communicate with your elected reps, after considering the opinions of those organizations you respect and identify with, and allows you to see how your elected reps act on your requests.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;HOW VOICES WORKS&lt;/strong&gt; &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;When you become a VOICES member, we identify each state and federal elected official that represents you. When you log in; each elected rep is displayed on your dashboard, and when you identify a group you support as your Prime Affiliate, their page appears on your dashboard, as well. You can identify as many groups as you wish as Affiliates you might wish to view, and we provide links to their pages, only your Prime Affiliate&#039;s page appears on your dashboard. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;Each time a bill comes out of committee to be scheduled for a floor vote in a legislative body VOICES sends you an email,(VOTE ALERT) and you will be able to express your opinion to your Elected Representative (ER) how you would like him or her to vote on that bill; when you click on &amp;ldquo;VOICE MY OPINION&amp;rdquo; that ALERT will be returned to VOICES, the results tabulated, and forwarded to your ER. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;Any opinions expressed by your Affiliate(s) will be displayed on your VOTE ALERT to consider. VOICES tabulates the results of all of the opinions expressed to that ER on that particular bill. When that bill is voted on VOICES reports to you how your ER voted on that bill, and the percentage of opinions expressed supporting or opposing that bill. VOICES also creates a cumulative report on all votes the ER casts on legislation, along with the percentage of opinions supporting or opposing each bill. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES also creates a page for each elected representative. The representative is provided with a &amp;quot;feed&amp;quot; to that page by VOICES. The elected representative can use this page to keep constituents informed on initiatives he takes on their behalf. For instance, he might post that he is trying to alleviate high unemployment in the community by asking a company to move into the area, creating new job opportunities, and providing them with assistance to do so. The ER can also post comments on this page as to why they voted for/against a given bill. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;You can communicate your thoughts to you elected official on that page if you wish, so long as you comply with VOICES User agreement as to profanity rules etc. VOICES also posts results of Vote Alerts on that page, as well as other information that is pertinent to that official, and allows him to post comments to his constituents on that page as well. As a VOICES member you can view the content of any Affiliate&#039;s pages. However, Affiliates can communicate ONLY with members that select them. This protects you from being inundated with opinions from organizations that you do not choose tot hear from. We do not provide your email to anyone.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;Please review our &lt;a href=&quot;http://voices4change.netsmartz.us/index.php?stage=pages&amp;amp;mode=Faq&quot;&gt;FAQ&lt;/a&gt; section to learn more about us.&lt;/p&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;div id=&quot;tabs-3&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;ELECTED REPRESENTATIVES&lt;/strong&gt;&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES was created to provide citizens a platform to communicate with their elected representatives, and for those representatives to communicate with their constituentts. We create an Elected Rep&#039;s page for each elected official of each of our members. As an elected representative you can post articles on your elected rep&#039;s page to inform your constituents on efforts you are taking on their behalf. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;For example, you might inform them of efforts you are taking to bring a business into the area to provide unemployment. You can also create polls for your constituents to respond to on matters you consider important, including proposed legislation. You can state your position on important issues, as well. We also provide you with a link to set up an account on Paypal that will accept contributions if you have 501(c)(3) status in your campaign entity. You, of course, can also seek volunteers to work as volunteers on your campaign. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES platform provides a mechanism to provide you with opinions your constituents have provided for you. We have verified that these opinions are provided by residents within your district. VOICES platform only allows members that live within your district to contact you via their elected reps pages. When a member joins VOICES we bill a small fee to their credit card. We then identify their elected reps using their home address, and incorporate that information in their user profile. Our merchamt services provider sends us an email validating that the member resides at the address the member provided. Therefore we know that the member resides in your district, is at least eighteen years of age and has a social security number.&lt;/p&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;!-- End demo --&gt;\r\n                                                                                    &lt;div style=&quot;DISPLAY: none&quot; class=&quot;demo-description&quot;&gt;\r\n                                                                                    &lt;p&gt;Click tabs to swap between content that is broken into logical sections.&lt;/p&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;!-- End demo-description --&gt;&lt;/td&gt;\r\n                                                                                &lt;/tr&gt;\r\n                                                                                &lt;tr&gt;\r\n                                                                                    &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt;&lt;br /&gt;&lt;/td&gt;\r\n                                                                                &lt;/tr&gt;\r\n                                                                            &lt;/tbody&gt;\r\n                                                                        &lt;/table&gt;\r\n                                                                        &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                &lt;/tbody&gt;\r\n                                                            &lt;/table&gt;\r\n                                                            &lt;/td&gt;\r\n                                                        &lt;/tr&gt;\r\n                                                        &lt;tr&gt;\r\n                                                            &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;\r\n                                                        &lt;/tr&gt;\r\n                                                    &lt;/tbody&gt;\r\n                                                &lt;/table&gt;\r\n                                                &lt;/td&gt;\r\n                                            &lt;/tr&gt;\r\n                                        &lt;/tbody&gt;\r\n                                    &lt;/table&gt;\r\n                                    &lt;/td&gt;\r\n                                &lt;/tr&gt;\r\n                            &lt;/tbody&gt;\r\n                        &lt;/table&gt;\r\n                        &lt;/td&gt;\r\n                    &lt;/tr&gt;\r\n                &lt;/tbody&gt;\r\n            &lt;/table&gt;\r\n            &lt;/td&gt;\r\n        &lt;/tr&gt;\r\n    &lt;/tbody&gt;\r\n&lt;/table&gt;','2011-07-28','about_us'),
(2,'Privacy Policy','Privacy Policy','Privacy Policy','<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\r\n\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n  <table width=\"100%\" border=\"0\" cellspacing=\r\n  \"0\" cellpadding=\"0\">\r\n	<tr>\r\n	  <td height=\"37\" align=\"left\" valign=\"top\"\r\n	  class=\"Trebuchet_27_c60000\">\r\n		Privacy Policy\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td align=\"left\" valign=\"top\" bgcolor=\r\n	  \"#B1B0AC\" class=\"arial_20_c40306\">\r\n		<img src=\"images/trans.gif\" width=\"1\"\r\n		height=\"1\" alt=\"\">\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td>\r\n		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo turpis, ultrices eget facilisis a, ultrices at ipsum. In lacinia justo massa. Suspendisse dictum scelerisque sem non volutpat. Donec condimentum blandit massa in consectetur. In non urna purus, in congue nisl. Morbi congue bibendum diam non luctus. Morbi eu metus et ipsum venenatis rutrum. Etiam in leo at leo porta tincidunt. Vivamus accumsan nisl sed lectus gravida vel lacinia orci auctor. Cras laoreet elit sed diam hendrerit consectetur. Suspendisse fringilla aliquet ligula, vitae faucibus magna pulvinar eu. Morbi feugiat volutpat mi quis vestibulum. Praesent ac auctor sem. Vestibulum ac ornare augue.</p>\r\n\r\n<p>Nam vitae nunc quis nisl gravida imperdiet sed eget dolor. Etiam adipiscing, erat nec fermentum gravida, orci mi blandit mi, a pulvinar risus purus eget sem. Curabitur hendrerit arcu quis quam sollicitudin nec tincidunt urna molestie. Sed vehicula mattis imperdiet. Curabitur sed sapien dolor. Aenean nec augue turpis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean a risus in enim placerat imperdiet. Morbi sit amet orci ligula. Donec id urna vitae elit vestibulum pellentesque. Cras fermentum libero in lorem faucibus consectetur. Proin nec est mauris. Etiam eu augue ac erat varius auctor volutpat et nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer luctus elementum ullamcorper. Vivamus libero felis, consequat nec placerat sit amet, adipiscing vel nibh. Aliquam tincidunt leo mattis sem elementum laoreet. Sed blandit lobortis odio, eget ultrices elit sodales in.</p>\r\n\r\n<p>Sed pretium elit in ipsum adipiscing aliquet. Praesent sollicitudin enim sed odio tempus sed lobortis risus ultrices. Curabitur elit tortor, molestie nec pulvinar vitae, pellentesque eget magna. Aenean rutrum magna nunc. Ut eget justo justo, eget tristique nisi. Vestibulum dignissim dapibus aliquam. Integer porttitor, mauris eu dictum commodo, neque augue tincidunt dui, quis convallis nisl ipsum eu urna. Vivamus at orci orci. Proin a felis sed est pretium blandit. Phasellus venenatis tincidunt nisi. Sed id placerat nisl.</p>\r\n\r\n<p>Praesent lacinia auctor risus id congue. Morbi nisl velit, placerat vitae blandit nec, accumsan a ligula. Sed tincidunt orci eget augue bibendum rutrum. Vestibulum convallis molestie dignissim. Nullam fermentum diam malesuada massa dapibus tempor. Maecenas molestie consequat eleifend. Suspendisse facilisis lectus sit amet sapien accumsan tristique. Curabitur et ipsum erat. In nec magna nisl. Fusce aliquam sodales dignissim. Donec ullamcorper faucibus volutpat. In vitae dolor ligula. Curabitur vehicula tempus consectetur. Cras in diam orci, sit amet tincidunt justo. Aliquam ullamcorper, sapien non pulvinar scelerisque, elit ipsum pulvinar leo, ac volutpat metus velit vitae lacus.</p>\r\n\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas ultrices nisl et dui lacinia at sodales urna placerat. Maecenas tristique ligula ac libero aliquam eget laoreet mauris dignissim. In sit amet leo non odio molestie ultricies vitae eu enim. In ut turpis nulla. Phasellus porta tellus a mauris hendrerit semper. Nam eu urna nulla. Proin purus est, adipiscing ut laoreet id, elementum sit amet magna. Nunc commodo fermentum nisl et adipiscing. Sed cursus ultrices eros, at aliquam leo tristique vitae. Cras sit amet vestibulum urna. Mauris ultrices felis a ante gravida suscipit. Pellentesque sit amet lacus mi, eget sollicitudin tortor. Etiam sit amet mauris faucibus elit tempor rhoncus id sit amet felis. Vestibulum vel ante est. Morbi et libero sem, vel congue arcu. </p>\r\n	  </td>\r\n	</tr>\r\n  </table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\"></td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>','2011-06-23','privacy_policy'),
(19,'FAQ','FAQ','FAQ','&lt;table width=&quot;100%&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;\r\n    &lt;tbody&gt;\r\n        &lt;tr&gt;\r\n            &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n            &lt;table width=&quot;100%&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;\r\n                &lt;tbody&gt;\r\n                    &lt;tr&gt;\r\n                        &lt;td valign=&quot;top&quot; align=&quot;left&quot; class=&quot;arial_16_c40306&quot;&gt;\r\n                        &lt;table width=&quot;100%&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;\r\n                            &lt;tbody&gt;\r\n                                &lt;tr&gt;\r\n                                    &lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n                                &lt;/tr&gt;\r\n                                &lt;tr&gt;\r\n                                    &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n                                    &lt;table width=&quot;100%&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;\r\n                                        &lt;tbody&gt;\r\n                                            &lt;tr&gt;\r\n                                                &lt;td valign=&quot;top&quot; align=&quot;left&quot; class=&quot;arial_16_c40306&quot;&gt;\r\n                                                &lt;table width=&quot;100%&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;\r\n                                                    &lt;tbody&gt;\r\n                                                        &lt;tr&gt;\r\n                                                            &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt;\r\n                                                            &lt;table width=&quot;100%&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;\r\n                                                                &lt;tbody&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td valign=&quot;top&quot; height=&quot;37&quot; align=&quot;left&quot; class=&quot;Trebuchet_27_c60000&quot;&gt; FAQs &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td valign=&quot;top&quot; bgcolor=&quot;#b1b0ac&quot; align=&quot;left&quot; class=&quot;arial_20_c40306&quot;&gt; &lt;img width=&quot;1&quot; height=&quot;1&quot; alt=&quot;&quot; src=&quot;images/trans.gif&quot; /&gt; &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt;\r\n                                                                        &lt;table width=&quot;100%&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;\r\n                                                                            &lt;tbody&gt;\r\n                                                                                &lt;tr&gt;\r\n                                                                                    &lt;td valign=&quot;top&quot; align=&quot;left&quot; style=&quot;padding: 20px 0px 15px;&quot;&gt;\r\n                                                                                    &lt;table width=&quot;100%&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;\r\n                                                                                        &lt;tbody&gt;\r\n                                                                                            &lt;tr&gt;\r\n                                                                                                &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt;\r\n                                                                                                &lt;table width=&quot;100%&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;\r\n                                                                                                    &lt;tbody&gt;\r\n                                                                                                        &lt;tr&gt;\r\n                                                                                                            &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt; &lt;/td&gt;\r\n                                                                                                            &lt;td valign=&quot;middle&quot; align=&quot;left&quot; class=&quot;arial_12_000&quot;&gt;\r\n                                                                                                            &lt;ol&gt;\r\n                                                                                                                &lt;li class=&quot;arial_15_000_bold&quot;&gt;Is my personal information secure?&lt;/li&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Yes, our site is fully encrypted.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;All personal information is stored on a device that is not connected to the internet.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;All financial transactions occur over secure servers, and then all of that data is stored  on devices not connected to the internet.&lt;/li&gt;\r\n                                                                                                                    &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                    &lt;li class=&quot;arial_15_000_bold&quot;&gt;Why is my voice more powerful on VOICES?&lt;/li&gt;\r\n                                                                                                                    &lt;ul&gt;\r\n                                                                                                                        &lt;li&gt;Currently, if you express your opinion to an elected representative, you do so singularly,  if you express your opinion on an issue via VOICES, all opinions expressed on that issue  to that elected representative on the issue are done so individually, but the results of  ALL of the opinions are tabulated by VOICES, and therefore you are expressing your  opinion COLLECTIVELY to the Representative.&lt;/li&gt;\r\n                                                                                                                        &lt;li&gt;The resulting opinions on each issue are  reported back to you on that COLLECTIVE basis.&lt;/li&gt;\r\n                                                                                                                        &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                        &lt;li class=&quot;arial_15_000_bold&quot;&gt;How does VOICES work?&lt;/li&gt;\r\n                                                                                                                        &lt;ul&gt;\r\n                                                                                                                            &lt;li&gt;Each time a bill is coming up for a vote in a legislative body VOICES will send you a VOTE ALERT asking you to express your opinion to your Elected Representative [ER] asking whether you support or oppose that bill. The alert contains a kink to the text of  the bill as well if you wish to read it.&lt;/li&gt;\r\n                                                                                                                            &lt;li&gt;When you send that opinion back to VOICES it is then forwarded to the ER (via an  automatically created VOICESFORCHANGE.US email we create for you).&lt;/li&gt;\r\n                                                                                                                            &lt;li&gt;VOICES also tabulates the results of all VOICES Users opinions that are sent to that  ER on all bills, along with the the percentages of all opinions sent on each bill.&lt;/li&gt;\r\n                                                                                                                            &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                            &lt;li class=&quot;arial_15_000_bold&quot;&gt;How do I know how the ER voted on that bill?&lt;/li&gt;\r\n                                                                                                                            &lt;ul&gt;\r\n                                                                                                                                &lt;li&gt;VOICES reports back to you how the ER voted on that bill; along with the percentage  of opinions expressed via VOICES supporting or opposing that bill.&lt;/li&gt;\r\n                                                                                                                                &lt;li&gt;For example, if an elected official receives notices from VOICES where 75% of the  Users support the bill, and 25% oppose it, our Report Card on that bill will tell you how  the ER voted and the percentage of VOICES Users that supported and opposed that  piece of legislation.&lt;/li&gt;\r\n                                                                                                                                &lt;li&gt;VOICES also creates a &#039;cumulative Report Card&#039; as to how the ER voted on all bills in  relationship to the opinions expressed via VOICES.&lt;/li&gt;\r\n                                                                                                                                &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                &lt;li class=&quot;arial_15_000_bold&quot;&gt;Do I need to know the names of all my state and federal Elected  Representatives? &lt;/li&gt;\r\n                                                                                                                                &lt;ul&gt;\r\n                                                                                                                                    &lt;li&gt;No, when you sign up providing VOICES with your street address VOICES will  identify each of your state and federal Elected Representatives.&lt;/li&gt;\r\n                                                                                                                                    &lt;li&gt;VOICES will then provide you with the name, address, phone number and email  address of each of your Elected Representatives.&lt;/li&gt;\r\n                                                                                                                                    &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                    &lt;li class=&quot;arial_15_000_bold&quot;&gt;Does VOICES share my email address or any other information with any  other organization?&lt;/li&gt;\r\n                                                                                                                                    &lt;ul&gt;\r\n                                                                                                                                        &lt;li&gt;NO.&lt;/li&gt;\r\n                                                                                                                                        &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                        &lt;li class=&quot;arial_15_000_bold&quot;&gt;Why does VOICES charge a fee?&lt;/li&gt;\r\n                                                                                                                                        &lt;ul&gt;\r\n                                                                                                                                            &lt;li&gt;We believe that if VOICES were provided for free, as is Facebook who derive their  revenue via advertising, we would DE-legitimize VOICES because any organization  could sign up any number of fictitious VOICES Users in an attempt to &amp;ldquo;stuff the ballots  box&amp;rdquo;.&lt;/li&gt;\r\n                                                                                                                                            &lt;li&gt;When we bill your credit/debit card or Paypal account we are able to verify that the  account exists at your billing address (which we ask for) and therefore we prevent those  that might attempt to &amp;ldquo;stuff the ballot box&amp;rdquo; from doing so because they would need to  create a payment account at an address that is valid.&lt;/li&gt;\r\n                                                                                                                                            &lt;li&gt;We are trying to provide you with a powerful tool, and because of the reasons cited  above we hope that you concur that it is of value to you. VOICES will never sell lists of  our clients, and in an attempt to remain totally non-partisan, will never accept  advertising, and therefore we must remain a fee for service entity.&lt;/li&gt;\r\n                                                                                                                                            &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                            &lt;li class=&quot;arial_15_000_bold&quot;&gt;Will VOICES express a position on an issue?&lt;/li&gt;\r\n                                                                                                                                            &lt;ul&gt;\r\n                                                                                                                                                &lt;li&gt;No, VOICES is and shall remain non-partisan.&lt;/li&gt;\r\n                                                                                                                                                &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                                &lt;li class=&quot;arial_15_000_bold&quot;&gt;Will anyone or any entity express an opinion to me?&lt;/li&gt;\r\n                                                                                                                                                &lt;ul&gt;\r\n                                                                                                                                                    &lt;li&gt;Perhaps, VOICES allows advocacy groups, such as; the political advocacy groups, labor  unions, AARP or other such groups to become VOICES &#039;Affiliates&#039;. &lt;/li&gt;\r\n                                                                                                                                                    &lt;li&gt;If you choose to do so, you can identify each group whose opinions/position on bills you might wish to see.&lt;/li&gt;\r\n                                                                                                                                                    &lt;li&gt;If you do so your VOTE ALERT will contain that Affiliate&#039;s comments on that legislation,  if the group becomes an Affiliate.&lt;/li&gt;\r\n                                                                                                                                                    &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                                    &lt;li class=&quot;arial_15_000_bold&quot;&gt;Can I identify more than one Affiliate?&lt;/li&gt;\r\n                                                                                                                                                    &lt;ul&gt;\r\n                                                                                                                                                        &lt;li&gt;Yes, as many as you wish.&lt;/li&gt;\r\n                                                                                                                                                        &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                                        &lt;li class=&quot;arial_15_000_bold&quot;&gt;How much does VOICES charge an Affiliate for this service?&lt;/li&gt;\r\n                                                                                                                                                        &lt;ul&gt;\r\n                                                                                                                                                            &lt;li&gt;Nothing, we are providing the service to you. &lt;/li&gt;\r\n                                                                                                                                                            &lt;li&gt;Affiliates are allowed to participate  because they may provide you more power by bringing Users with common views  together on a position, therefore making your voice more powerful.&lt;/li&gt;\r\n                                                                                                                                                            &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                                            &lt;li class=&quot;arial_15_000_bold&quot;&gt;Does VOICES help me, or Affiliates, in other ways?&lt;/li&gt;\r\n                                                                                                                                                            &lt;ul&gt;\r\n                                                                                                                                                                &lt;li&gt;Yes, there are numerous other facets to VOICES that you will see when you visit the  VOICES website.&lt;/li&gt;\r\n                                                                                                                                                                &lt;li&gt;One very powerful tool is available in the &amp;ldquo;Issues Provides Answers&amp;rdquo;  segment. &amp;ldquo;Issues&amp;rdquo; allows for an Affiliate to present a &#039;Petition&#039; for signatures on a Bill  that is in committee, but not yet scheduled for a vote. &amp;lt;.li&amp;gt;&lt;/li&gt;\r\n                                                                                                                                                                &lt;li&gt;VOICES then sends the &#039;Petition&#039;  to all VOICES Users that have identified with the Affiliate.&lt;/li&gt;\r\n                                                                                                                                                                &lt;li&gt;Once completed, the Petition  will be sent to the Chairman of the committee, each committee member, and the  Elected Representative of each User that signed the Petition.&lt;/li&gt;\r\n                                                                                                                                                                &lt;li&gt;We leave it you to  determine what effect that might have if such a Petition contained up to, or more than one million signatures.&lt;/li&gt;\r\n                                                                                                                                                                &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                                                &lt;li class=&quot;arial_15_000_bold&quot;&gt;Does VOICES have a method for members or Affiliates to ask for legislation  to be introduced?&lt;/li&gt;\r\n                                                                                                                                                                &lt;ul&gt;\r\n                                                                                                                                                                    &lt;li&gt;Yes, just as a Petition supports or opposes a bill already introduced, a Petition may also  be used to ask that legislators introduce new legislation.&lt;/li&gt;\r\n                                                                                                                                                                    &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                                                    &lt;li class=&quot;arial_15_000_bold&quot;&gt;What is an &amp;ldquo;Alliance&amp;rdquo;?&lt;/li&gt;\r\n                                                                                                                                                                    &lt;ul&gt;\r\n                                                                                                                                                                        &lt;li&gt;Because VOICES hopes to make your voice more powerful, we allow Affiliates to form  alliances with other VOICES Affiliates that might take a similar position on proposed  legislation to submit a Petition to their followers on a combined basis to expand the  number of possible signatures.&lt;/li&gt;\r\n                                                                                                                                                                        &lt;li&gt;To do so, the administrators of each Affiliate must  inform VOICES administration department that they wish to collaborate on the Petition.&lt;/li&gt;\r\n                                                                                                                                                                        &lt;li&gt;It  then is sent to all members of all of the Affiliates in the alliance.&lt;/li&gt;\r\n                                                                                                                                                                        &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                                                        &lt;li class=&quot;arial_15_000_bold&quot;&gt;Can I submit a Petition?&lt;/li&gt;\r\n                                                                                                                                                                        &lt;ul&gt;\r\n                                                                                                                                                                            &lt;li&gt;Yes, you can post a Petition on  your VOICES &amp;ldquo;Member Page&amp;rdquo; for signature.&lt;/li&gt;\r\n                                                                                                                                                                            &lt;li&gt;It will be  more effective if you were to submit the Petition to one of your Affiliates, and ask them  to form one or more alliances with other Affiliates, because it would then go to all Users  that identified themselves with those Affiliates.&lt;/li&gt;\r\n                                                                                                                                                                        &lt;/ul&gt;\r\n                                                                                                                                                                    &lt;/ol&gt;\r\n                                                                                                                                                                    &lt;/td&gt;\r\n                                                                                                                                                                &lt;/tr&gt;\r\n                                                                                                                                                            &lt;/tbody&gt;\r\n                                                                                                                                                        &lt;/table&gt;\r\n                                                                                                                                                        &lt;/td&gt;\r\n                                                                                                                                                    &lt;/tr&gt;\r\n                                                                                                                                                &lt;/tbody&gt;\r\n                                                                                                                                            &lt;/table&gt;\r\n                                                                                                                                            &lt;/td&gt;\r\n                                                                                                                                        &lt;/tr&gt;\r\n                                                                                                                                        &lt;tr&gt;\r\n                                                                                                                                            &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt;&lt;br /&gt;&lt;/td&gt;\r\n                                                                                                                                        &lt;/tr&gt;\r\n                                                                                                                                    &lt;/tbody&gt;\r\n                                                                                                                                &lt;/table&gt;\r\n                                                                                                                                &lt;/td&gt;\r\n                                                                                                                            &lt;/tr&gt;\r\n                                                                                                                        &lt;/tbody&gt;\r\n                                                                                                                    &lt;/table&gt;\r\n                                                                                                                    &lt;/td&gt;\r\n                                                                                                                &lt;/tr&gt;\r\n                                                                                                                &lt;tr&gt;\r\n                                                                                                                    &lt;td valign=&quot;top&quot; align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;\r\n                                                                                                                &lt;/tr&gt;\r\n                                                                                                            &lt;/tbody&gt;\r\n                                                                                                        &lt;/table&gt;\r\n                                                                                                        &lt;/td&gt;\r\n                                                                                                    &lt;/tr&gt;\r\n                                                                                                &lt;/tbody&gt;\r\n                                                                                            &lt;/table&gt;\r\n                                                                                            &lt;/td&gt;\r\n                                                                                        &lt;/tr&gt;\r\n                                                                                    &lt;/tbody&gt;\r\n                                                                                &lt;/table&gt;\r\n                                                                                &lt;/td&gt;\r\n                                                                            &lt;/tr&gt;\r\n                                                                        &lt;/tbody&gt;\r\n                                                                    &lt;/table&gt;\r\n                                                                    &lt;/td&gt;\r\n                                                                &lt;/tr&gt;\r\n                                                            &lt;/tbody&gt;\r\n                                                        &lt;/table&gt;','2011-07-07','faq'),
(20,'Contacts Us','Contacts Us','Contacts Us','<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"arial_16_c40306\">\r\n            <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign=\"top\" align=\"left\" class=\"arial_16_c40306\">\r\n                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td>&nbsp;</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td class=\"arial_16_c40306\">\r\n                                    <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign=\"top\" align=\"left\" class=\"arial_16_c40306\">\r\n                                                <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign=\"top\" align=\"left\">\r\n                                                            <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                <tbody>\r\n                                                                    <tr>\r\n                                                                        <td valign=\"top\" height=\"37\" align=\"left\" class=\"Trebuchet_27_c60000\"> Contact Us </td>\r\n                                                                    </tr>\r\n                                                                    <tr>\r\n                                                                        <td valign=\"top\" bgcolor=\"#b1b0ac\" align=\"left\" class=\"arial_20_c40306\"> <img width=\"1\" height=\"1\" src=\"images/trans.gif\" alt=\"\" /> </td>\r\n                                                                    </tr>\r\n                                                                    <tr>\r\n                                                                        <td valign=\"top\" align=\"left\">\r\n                                                                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                            <tbody>\r\n                                                                                <tr>\r\n                                                                                    <td valign=\"top\" align=\"left\" style=\"padding: 20px 0px 15px;\"> <span class=\"arial_15_000_bold\">Lorem ipsum dolor sit amet</span><br />\r\n                                                                                    <div style=\"text-align: center;\">\r\n                                                                                    <div style=\"text-align: left;\">                                                                                     </div>\r\n                                                                                    <div style=\"text-align: left;\"><span class=\"arial_12_000\">onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span class=\"arial_12_3b393a\"></span><br />                                                                                     <span class=\"arial_12_3b393a\"></span></div>\r\n                                                                                    </div>\r\n                                                                                    <span class=\"arial_12_3b393a\"> <br /></span> </td>\r\n                                                                                </tr>\r\n                                                                                <tr>\r\n                                                                                    <td valign=\"top\" align=\"left\">\r\n                                                                                    <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                                        <tbody>\r\n                                                                                            <tr>\r\n                                                                                                <td valign=\"top\" align=\"left\">\r\n                                                                                                <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                                                    <tbody>\r\n                                                                                                        <tr>\r\n                                                                                                            <td valign=\"top\" align=\"left\">  </td>\r\n                                                                                                            <td valign=\"middle\" align=\"left\" class=\"arial_12_000\"> <span class=\"arial_15_000_bold\">Nam vitae nunc quis nisl gravida</span><br /> <span class=\"arial_12_000\">Imperdiet sed eget dolor. Etiam adipiscing, erat nec fermentum gravida, orci mi blandit mi, a pulvinar risus purus eget sem. Curabitur hendrerit arcu quis quam sollicitudin nec tincidunt urna molestie. Sed vehicula mattis imperdiet. Curabitur sed sapien dolor. Aenean nec augue turpis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean a risus in enim placerat imperdiet. Morbi sit amet orci ligula. Donec id urna vitae elit vestibulum pellentesque. Cras fermentum libero in lorem faucibus consectetur. Proin nec est mauris. Etiam eu augue ac erat varius auctor volutpat et nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer luctus elementum ullamcorper. Vivamus libero felis, consequat nec placerat sit amet, adipiscing vel nibh. Aliquam tincidunt leo mattis sem elementum laoreet. Sed blandit lobortis odio, eget ultrices elit sodales in. </span> </td>\r\n                                                                                                        </tr>\r\n                                                                                                    </tbody>\r\n                                                                                                </table>\r\n                                                                                                </td>\r\n                                                                                            </tr>\r\n                                                                                        </tbody>\r\n                                                                                    </table>\r\n                                                                                    </td>\r\n                                                                                </tr>\r\n                                                                                <tr>\r\n                                                                                    <td valign=\"top\" align=\"left\">\r\n                                                                                    <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                                        <tbody>\r\n                                                                                            <tr>\r\n                                                                                                <td valign=\"top\" align=\"left\" class=\"arial_12_000\"> onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br /> <br /> onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br /> <br /> onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>\r\n                                                                                            </tr>\r\n                                                                                        </tbody>\r\n                                                                                    </table>\r\n                                                                                    </td>\r\n                                                                                </tr>\r\n                                                                            </tbody>\r\n                                                                        </table>\r\n                                                                        </td>\r\n                                                                    </tr>\r\n                                                                </tbody>\r\n                                                            </table>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td valign=\"top\" align=\"left\">&nbsp;</td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>','2011-06-24','contacts_us'),
(21,'Terms & Conditions','Terms & Conditions','Terms & Conditions','<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\r\n\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n  <table width=\"100%\" border=\"0\" cellspacing=\r\n  \"0\" cellpadding=\"0\">\r\n	<tr>\r\n	  <td height=\"37\" align=\"left\" valign=\"top\"\r\n	  class=\"Trebuchet_27_c60000\">\r\n		Terms & Conditions\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td align=\"left\" valign=\"top\" bgcolor=\r\n	  \"#B1B0AC\" class=\"arial_20_c40306\">\r\n		<img src=\"images/trans.gif\" width=\"1\"\r\n		height=\"1\" alt=\"\">\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td>\r\n\r\n<p>Sed pretium elit in ipsum adipiscing aliquet. Praesent sollicitudin enim sed odio tempus sed lobortis risus ultrices. Curabitur elit tortor, molestie nec pulvinar vitae, pellentesque eget magna. Aenean rutrum magna nunc. Ut eget justo justo, eget tristique nisi. Vestibulum dignissim dapibus aliquam. Integer porttitor, mauris eu dictum commodo, neque augue tincidunt dui, quis convallis nisl ipsum eu urna. Vivamus at orci orci. Proin a felis sed est pretium blandit. Phasellus venenatis tincidunt nisi. Sed id placerat nisl.</p>\r\n\r\n<p>Praesent lacinia auctor risus id congue. Morbi nisl velit, placerat vitae blandit nec, accumsan a ligula. Sed tincidunt orci eget augue bibendum rutrum. Vestibulum convallis molestie dignissim. Nullam fermentum diam malesuada massa dapibus tempor. Maecenas molestie consequat eleifend. Suspendisse facilisis lectus sit amet sapien accumsan tristique. Curabitur et ipsum erat. In nec magna nisl. Fusce aliquam sodales dignissim. Donec ullamcorper faucibus volutpat. In vitae dolor ligula. Curabitur vehicula tempus consectetur. Cras in diam orci, sit amet tincidunt justo. Aliquam ullamcorper, sapien non pulvinar scelerisque, elit ipsum pulvinar leo, ac volutpat metus velit vitae lacus.</p>\r\n\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas ultrices nisl et dui lacinia at sodales urna placerat. Maecenas tristique ligula ac libero aliquam eget laoreet mauris dignissim. In sit amet leo non odio molestie ultricies vitae eu enim. In ut turpis nulla. Phasellus porta tellus a mauris hendrerit semper. Nam eu urna nulla. Proin purus est, adipiscing ut laoreet id, elementum sit amet magna. Nunc commodo fermentum nisl et adipiscing. Sed cursus ultrices eros, at aliquam leo tristique vitae. Cras sit amet vestibulum urna. Mauris ultrices felis a ante gravida suscipit. Pellentesque sit amet lacus mi, eget sollicitudin tortor. Etiam sit amet mauris faucibus elit tempor rhoncus id sit amet felis. Vestibulum vel ante est. Morbi et libero sem, vel congue arcu. </p>\r\n	  </td>\r\n	</tr>\r\n  </table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\"></td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>','0000-00-00','terms_&_onditions');

/*Table structure for table `tbl_prices` */

DROP TABLE IF EXISTS `tbl_prices`;

CREATE TABLE `tbl_prices` (
  `price_id` int(11) unsigned NOT NULL auto_increment,
  `price_text` varchar(255) default NULL,
  `price` float(6,2) default '0.00',
  PRIMARY KEY  (`price_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_prices` */

insert into `tbl_prices` values 
(1,'one month',299.00),
(2,'three months',399.00),
(3,'six months',699.00),
(4,'one Year',999.00);

/*Table structure for table `tbl_related_bills` */

DROP TABLE IF EXISTS `tbl_related_bills`;

CREATE TABLE `tbl_related_bills` (
  `bill_id` int(11) NOT NULL,
  `related_bill_number` int(5) NOT NULL,
  `related_bill_legtype` varchar(4) NOT NULL,
  `related_bill_session_id` char(7) NOT NULL,
  `related_bill_state` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_related_bills` */

insert into `tbl_related_bills` values 
(2,12,'S','2011000','US'),
(2,218,'S','2011000','US'),
(4,206,'S','2011000','US'),
(17,170,'HRES','2011000','US'),
(21,498,'S','2011000','US'),
(26,69,'H','2011000','US'),
(26,174,'HRES','2011000','US'),
(95,49,'HJR','2011000','US'),
(97,167,'HRES','2011000','US'),
(99,1076,'H','2011000','US'),
(101,84,'SRES','2011000','US'),
(108,55,'SRES','2011000','US'),
(109,290,'S','2011000','US'),
(110,534,'H','2011000','US');

/*Table structure for table `tbl_states` */

DROP TABLE IF EXISTS `tbl_states`;

CREATE TABLE `tbl_states` (
  `province_id` int(11) unsigned NOT NULL auto_increment,
  `province_name` varchar(200) default NULL,
  `province_abbr` varchar(2) default NULL,
  PRIMARY KEY  (`province_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_states` */

insert into `tbl_states` values 
(25,'Northwest Territories','NT'),
(14,'Ontario','ON'),
(15,'British Columbia','BC'),
(17,'Alberta','AB'),
(18,'Saskatchewan','SK'),
(19,'Manitoba','MB'),
(20,'Quebec','QC'),
(21,'Prince Edward Island','PE'),
(22,'Nova Scotia','NS'),
(23,'New Brunswick','NB'),
(24,'Newfoundland','NL'),
(26,'Nunavut','NU'),
(27,'Yukon','YT'),
(28,'Other',NULL);

/*Table structure for table `tbl_subscriber` */

DROP TABLE IF EXISTS `tbl_subscriber`;

CREATE TABLE `tbl_subscriber` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `subscriber_id` int(11) NOT NULL,
  `mail_street_address` varchar(200) default NULL,
  `mail_city` varchar(200) default NULL,
  `mail_state` varchar(200) default NULL,
  `mail_zip_code` varchar(10) default NULL,
  `mail_country` varchar(200) default NULL,
  `is_billing` tinyint(1) default '0',
  `bill_street_address` varchar(200) default NULL,
  `bill_city` varchar(200) default NULL,
  `bill_state` varchar(200) default NULL,
  `bill_zip_code` varchar(10) default NULL,
  `bill_country` varchar(200) default NULL,
  `prim_affiliate_id` int(11) default NULL,
  `secondary_affiliates` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_subscriber` */

insert into `tbl_subscriber` values 
(16,78,'test','tst','test','test','test',0,'','','','','',1,''),
(15,76,'test','Chd','HP','12345','India',1,'aagyg a','test','chd','2324','india',1,''),
(14,75,'test ','test','test','2323','test',0,'','','','','',1,''),
(12,73,'# 546 sec.23 pkl','Chandigarh','Punjab','1354663','India',0,'','','','','',1,''),
(13,74,'test test','test ','test ','test t','test',0,'','','','','',1,''),
(11,71,'1 Main St','Albany','NY','12205','USA',0,'','','','','',70,'1'),
(10,69,'70 Romeyn Ave','Amsterdam','NY','12010','USA',0,'','','','','',1,'');

/*Table structure for table `tbl_usergroups` */

DROP TABLE IF EXISTS `tbl_usergroups`;

CREATE TABLE `tbl_usergroups` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_usergroups` */

insert into `tbl_usergroups` values 
(1,'Administrator'),
(2,'Affiliate'),
(3,'Subscriber'),
(4,'Observer');
