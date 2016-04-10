/*
SQLyog - Free MySQL GUI v5.01
Host - 5.0.45 : Database - voices4change
*********************************************************************
Server version : 5.0.45
*/

/*

create database if not exists `voices4change`;

USE `voices4change`;

*/

/*Table structure for table `tbl_accessions` */


USE voices2_voices4change;

DROP TABLE IF EXISTS `tbl_accessions`;

CREATE TABLE `tbl_accessions` (
  `id` int(9) NOT NULL auto_increment,
  `content_id` int(9) default NULL,
  `usergroup_id` int(9) default NULL,
  `capability_id` int(9) default NULL,
  `permission` enum('Y','N','N/A') default 'N/A',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=943 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_accessions` */

insert into `tbl_accessions` values 
(736,3,2,1,'Y'),
(735,2,2,1,'Y'),
(706,11,3,1,'N'),
(705,10,3,1,'N'),
(704,17,3,1,'N'),
(703,16,3,1,'N'),
(702,15,3,1,'Y'),
(701,14,3,1,'N'),
(700,13,3,1,'N'),
(699,12,3,1,'Y'),
(698,11,3,1,'N'),
(697,10,3,1,'N'),
(696,9,3,12,'Y'),
(695,9,3,9,'N'),
(694,9,3,1,'Y'),
(693,8,3,1,'N'),
(692,7,3,1,'N'),
(691,6,3,9,'N'),
(690,6,3,1,'Y'),
(689,5,3,1,'N'),
(688,4,3,1,'N'),
(687,3,3,11,'N'),
(686,3,3,1,'Y'),
(742,2,3,1,'Y'),
(684,1,3,1,'Y'),
(683,14,2,1,'N'),
(680,16,2,1,'N'),
(679,15,2,1,'N'),
(678,14,2,1,'N'),
(682,14,2,1,'N'),
(676,16,2,1,'N'),
(675,15,2,1,'N'),
(674,14,2,1,'N'),
(672,16,2,1,'N'),
(671,15,2,1,'N'),
(670,14,2,1,'N'),
(669,13,2,10,'N'),
(668,13,2,1,'N'),
(667,12,2,8,'N'),
(666,11,2,8,'N'),
(665,10,2,8,'N'),
(664,8,2,8,'N'),
(663,12,2,7,'N'),
(662,11,2,7,'N'),
(661,10,2,7,'N'),
(660,8,2,7,'N'),
(659,12,2,6,'N'),
(658,11,2,6,'N'),
(657,10,2,6,'N'),
(656,9,2,6,'N'),
(655,8,2,6,'N'),
(895,11,15,1,'N'),
(653,11,2,3,'N'),
(652,10,2,3,'N'),
(651,9,2,9,'Y'),
(650,8,2,3,'N'),
(649,12,2,2,'Y'),
(648,11,2,2,'N'),
(647,10,2,2,'N'),
(646,9,2,2,'Y'),
(645,8,2,2,'N'),
(644,12,2,1,'Y'),
(643,11,2,1,'N'),
(642,10,2,1,'N'),
(641,9,2,1,'Y'),
(640,8,2,1,'N'),
(639,10,2,15,'N'),
(638,10,2,14,'N'),
(637,10,2,13,'N'),
(636,11,2,15,'N'),
(635,11,2,14,'N'),
(634,11,2,13,'N'),
(633,12,2,15,'N'),
(632,12,2,14,'N'),
(631,12,2,13,'N'),
(630,9,2,15,'N'),
(629,9,2,14,'N'),
(628,12,2,13,'N'),
(627,9,2,15,'N'),
(626,9,2,14,'N'),
(625,11,2,13,'N'),
(624,9,2,15,'N'),
(623,9,2,14,'N'),
(622,10,2,13,'N'),
(621,9,2,15,'N'),
(620,9,2,14,'N'),
(619,9,2,13,'N'),
(618,8,2,15,'N'),
(617,8,2,14,'N'),
(616,8,2,13,'N'),
(615,7,2,1,'N'),
(614,6,2,1,'N'),
(613,5,2,1,'N'),
(612,4,2,1,'N'),
(611,3,2,11,'N'),
(737,1,2,1,'Y'),
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
(338,17,1,1,'N'),
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
(732,1,2,2,'Y'),
(731,9,2,3,'Y'),
(728,1,4,1,'Y'),
(727,4,4,1,'N'),
(726,5,4,1,'N'),
(725,6,4,1,'Y'),
(724,7,4,1,'N'),
(723,8,4,1,'N'),
(722,9,4,1,'Y'),
(721,10,4,1,'N'),
(720,11,4,1,'N'),
(719,12,4,1,'Y'),
(729,17,2,1,'N'),
(717,16,4,1,'N'),
(716,15,4,1,'N'),
(715,14,4,1,'N'),
(714,13,4,1,'N'),
(713,17,4,1,'N'),
(712,16,4,1,'N'),
(711,15,4,1,'N'),
(710,14,4,1,'N'),
(709,13,4,1,'N'),
(708,13,3,10,'N'),
(875,3,2,3,'Y'),
(743,11,10,1,'N'),
(744,10,10,1,'N'),
(745,17,10,1,'N'),
(746,16,10,1,'N'),
(747,15,10,1,'Y'),
(748,14,10,1,'N'),
(749,13,10,1,'N'),
(750,12,10,1,'Y'),
(751,11,10,1,'N'),
(752,10,10,1,'N'),
(753,9,10,12,'N'),
(754,9,10,9,'N'),
(755,9,10,1,'Y'),
(756,8,10,1,'N'),
(757,7,10,1,'N'),
(758,6,10,9,'N'),
(759,6,10,1,'Y'),
(760,5,10,1,'N'),
(761,4,10,1,'N'),
(762,3,10,11,'N'),
(763,3,10,1,'Y'),
(764,2,10,1,'Y'),
(765,1,10,1,'Y'),
(766,13,10,10,'N'),
(767,11,11,1,'N'),
(768,10,11,1,'N'),
(769,17,11,1,'N'),
(770,16,11,1,'N'),
(771,15,11,1,'Y'),
(772,14,11,1,'N'),
(773,13,11,1,'N'),
(774,12,11,1,'Y'),
(775,11,11,1,'N'),
(776,10,11,1,'N'),
(777,9,11,12,'N'),
(778,9,11,9,'N'),
(779,9,11,1,'Y'),
(780,8,11,1,'N'),
(781,7,11,1,'N'),
(782,6,11,9,'N'),
(783,6,11,1,'Y'),
(784,5,11,1,'N'),
(785,4,11,1,'N'),
(786,3,11,11,'N'),
(787,3,11,1,'Y'),
(788,2,11,1,'Y'),
(789,1,11,1,'Y'),
(790,13,11,10,'N'),
(838,13,13,10,'N'),
(837,1,13,1,'Y'),
(836,2,13,1,'Y'),
(835,3,13,1,'Y'),
(834,3,13,11,'N'),
(833,4,13,1,'N'),
(832,5,13,1,'N'),
(831,6,13,1,'Y'),
(830,6,13,9,'N'),
(829,7,13,1,'N'),
(828,8,13,1,'N'),
(827,9,13,1,'Y'),
(826,9,13,9,'N'),
(825,9,13,12,'N'),
(824,10,13,1,'N'),
(823,11,13,1,'N'),
(822,12,13,1,'Y'),
(821,13,13,1,'N'),
(820,14,13,1,'N'),
(819,15,13,1,'Y'),
(818,16,13,1,'N'),
(817,17,13,1,'N'),
(816,10,13,1,'N'),
(815,11,13,1,'N'),
(839,11,14,1,'N'),
(840,10,14,1,'N'),
(841,17,14,1,'N'),
(842,16,14,1,'N'),
(843,15,14,1,'Y'),
(844,14,14,1,'N'),
(845,13,14,1,'N'),
(846,12,14,1,'Y'),
(847,11,14,1,'N'),
(848,10,14,1,'N'),
(849,9,14,12,'N'),
(850,9,14,9,'N'),
(851,9,14,1,'Y'),
(852,8,14,1,'N'),
(853,7,14,1,'N'),
(854,6,14,9,'N'),
(855,6,14,1,'Y'),
(856,5,14,1,'N'),
(857,4,14,1,'N'),
(858,3,14,11,'N'),
(859,3,14,1,'Y'),
(860,2,14,1,'Y'),
(861,1,14,1,'Y'),
(862,13,14,10,'N'),
(863,9,4,12,'N'),
(864,3,4,1,'Y'),
(865,2,4,1,'Y'),
(872,3,0,2,'N'),
(888,1,2,3,'N'),
(896,10,15,1,'N'),
(897,17,15,1,'N'),
(898,16,15,1,'N'),
(899,15,15,1,'Y'),
(900,14,15,1,'N'),
(901,13,15,1,'N'),
(902,12,15,1,'Y'),
(903,11,15,1,'N'),
(904,10,15,1,'N'),
(905,9,15,12,'Y'),
(906,9,15,9,'N'),
(907,9,15,1,'Y'),
(908,8,15,1,'N'),
(909,7,15,1,'N'),
(910,6,15,9,'N'),
(911,6,15,1,'Y'),
(912,5,15,1,'N'),
(913,4,15,1,'N'),
(914,3,15,11,'N'),
(915,3,15,1,'Y'),
(916,2,15,1,'Y'),
(917,1,15,1,'Y'),
(918,13,15,10,'N'),
(919,11,16,1,'N'),
(920,10,16,1,'N'),
(921,17,16,1,'N'),
(922,16,16,1,'N'),
(923,15,16,1,'Y'),
(924,14,16,1,'N'),
(925,13,16,1,'N'),
(926,12,16,1,'Y'),
(927,11,16,1,'N'),
(928,10,16,1,'N'),
(929,9,16,12,'Y'),
(930,9,16,9,'N'),
(931,9,16,1,'Y'),
(932,8,16,1,'N'),
(933,7,16,1,'N'),
(934,6,16,9,'N'),
(935,6,16,1,'Y'),
(936,5,16,1,'N'),
(937,4,16,1,'N'),
(938,3,16,11,'N'),
(939,3,16,1,'Y'),
(940,2,16,1,'Y'),
(941,1,16,1,'Y'),
(942,13,16,10,'N');

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
  `donation_url` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_affiliate` */

insert into `tbl_affiliate` values 
(1,1,'This is default Affiliate ceareted by system','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo turpis, ultrices eget facilisis a, ultrices at ipsum. In lacinia justo massa. Suspendisse dictum scelerisque sem non volutpat. Donec condimentum blandit massa in consectetur. In non urna purus, in congue nisl. Morbi congue bibendum diam non luctus. Morbi eu metus et ipsum venenatis rutrum. Etiam in leo at leo porta tincidunt. Vivamus accumsan nisl sed lectus gravida vel lacinia orci auctor. Cras laoreet elit sed diam hendrerit consectetur. Suspendisse fringilla aliquet ligula, vitae faucibus magna pulvinar eu. Morbi feugiat volutpat mi quis vestibulum. Praesent ac auctor sem. Vestibulum ac ornare augue.','qwerty','1_organisation_banner.gif','http://www.website.com','Address\r\n110 Jan Path Road\r\nDelhi','City','State','0000','Country','http://voices4change.netsmartz.us/index.php'),
(24,175,'Other affiliate organisation','This organization is for common people cause. This organization is for common people cause.','1B3xf26489175','175_organisation_banner.jpg','http://www.google.com','70 Romeyn Ave','Amsterdam','NY','121121','USA',NULL),
(25,177,'Deleted affiliated organisation','Upload a banner(jpg/gif/jpeg) containing organisation logo up to 900px wide and 250px high, max size 5MB.','40gkn12496177','177_organisation_banner.jpg','http://www.google.com','IT park','Chandigarh','Chandigarh','190000','India',NULL);

/*Table structure for table `tbl_affiliate_articles` */

DROP TABLE IF EXISTS `tbl_affiliate_articles`;

CREATE TABLE `tbl_affiliate_articles` (
  `article_id` int(11) NOT NULL auto_increment,
  `affiliate_id` int(11) default NULL,
  `article_title` varchar(100) default NULL,
  `bill_number` int(5) default NULL,
  `legtype` varchar(4) default NULL,
  `indication_position` enum('sponser','cosponser') default NULL,
  `voting_start` date default NULL,
  `voting_end` date default NULL,
  `allow_voting` enum('yes','no') default NULL,
  `support_file` varchar(100) default NULL,
  `affiliate_comment` text,
  `created` date default NULL,
  `indication_of_position` enum('support','oppose') default NULL,
  `article_type` enum('news','bulletin','bill','petition') default 'bill',
  `publish_from` date default NULL,
  `publish_to` date default NULL,
  `allow_comments` enum('yes','no') default 'no',
  `comment_period_from` date default NULL,
  `comment_period_to` date default NULL,
  `vote_alert_sent` tinyint(1) default '0',
  `petition_level` varchar(20) default NULL,
  PRIMARY KEY  (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_affiliate_articles` */

insert into `tbl_affiliate_articles` values 
(2,1,'New bill added for dev final testing',480,'HR',NULL,'2011-12-25','0000-00-00','yes','2_article_attachement.pdf','New bill added for dev final testing, New bill added for dev final testing, New bill added for dev final testing.','2011-12-25','support','bill',NULL,NULL,'no',NULL,NULL,0,''),
(3,1,'New bill added for dev final testing for vote alert',1210,'HR',NULL,'2011-12-25','0000-00-00','yes','3_article_attachement.pdf','New bill added for dev final testing for vote alert','2011-12-25','support','bill',NULL,NULL,'no',NULL,NULL,0,''),
(4,1,'Test news from walmart  for testing file upload',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Test news from walmart  for testing file upload','2011-12-27',NULL,'news',NULL,NULL,'no',NULL,NULL,0,NULL),
(5,175,'asdasd as dasdasd',0,'',NULL,'2011-12-27','2011-12-29','yes',NULL,'sad asdas  dasd','2011-12-27','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(6,175,'as dasd as das das d',0,'',NULL,'2011-12-27','2011-12-31','yes',NULL,'as das dad asd asd asd asd as d','2011-12-27','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(7,175,'Test news from walmart added by another affiliated',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Test news from walmart Test news from walmart added by another affiliated','2011-12-27',NULL,'news',NULL,NULL,'no',NULL,NULL,0,NULL),
(8,175,'Test bulletine by  from walmart added by another affiliated',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Test bulletine by  from walmart added by another affiliated','2011-12-27',NULL,'bulletin',NULL,NULL,'no',NULL,NULL,0,NULL),
(9,1,'test petition for testing',0,'',NULL,'2011-12-27','2011-12-30','yes',NULL,'test petition for testing','2011-12-27','','petition',NULL,NULL,'no',NULL,NULL,0,'State');

/*Table structure for table `tbl_bill_authors` */

DROP TABLE IF EXISTS `tbl_bill_authors`;

CREATE TABLE `tbl_bill_authors` (
  `bill_author_id` int(11) NOT NULL auto_increment,
  `bill_id` int(11) default NULL,
  `bill_author_name` varchar(50) default NULL,
  `bill_author_party` varchar(10) default NULL,
  `bill_author_house` varchar(10) default NULL,
  PRIMARY KEY  (`bill_author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bill_authors` */

insert into `tbl_bill_authors` values 
(1,1,'Boehner','R','H'),
(2,2,'Boehner','R','H'),
(3,3,'Boehner','R','H'),
(4,4,'Young D','R','H'),
(5,5,'Waters','D','H');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbl_bill_detail` */

insert into `tbl_bill_detail` values 
(1,440,'US','2011000','HR','DC Opportunity Scholarship Program','2011-01-26','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Reauthorizes the DC opportunity scholarship program, and for other purposes.','In HOUSE. Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H471&ciq=voices&client_md=b834001e878eedb64f7658c70e00bd13&mode=current_text'),
(2,480,'US','2011000','HR','DC Opportunity Scholarship Program','2011-01-26','0000-00-00','0000-00-00','','Adopted','HOUSE',NULL,'Reauthorizes the DC opportunity scholarship program, and for other purposes.','In HOUSE. Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H471&ciq=voices&client_md=b834001e878eedb64f7658c70e00bd13&mode=current_text'),
(3,485,'US','2011000','HR','DC Opportunity Scholarship Program','2011-01-26','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Reauthorizes the DC opportunity scholarship program, and for other purposes.','In HOUSE. Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H471&ciq=voices&client_md=b834001e878eedb64f7658c70e00bd13&mode=current_text'),
(4,1210,'US','2011000','HR','Maritime Liens on Fishing Permits','2011-03-17','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Provides limitations on maritime liens on fishing permits, and for other purposes.','To HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1210&ciq=voices&client_md=e86e0661da0738005e0ba156bdf66897&mode=current_text'),
(5,1209,'US','2011000','HR','Housing Choice Voucher Program','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee',NULL,'Reforms the housing choice voucher program under section 8 of the United States Housing Act of 1937.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1209&ciq=voices&client_md=574c618021559c9ecda37a0a675a82f0&mode=current_text');

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
(4,'ER Content','Poll'),
(5,'ER Content','Articles'),
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
  `OfficerProfileImage` varchar(250) default NULL,
  PRIMARY KEY  (`Elected_Officer_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_elected_officials` */

insert into `tbl_elected_officials` values 
(1,'5e9bdd9b-4d8f-4bab-ac88-08812f7cdf8a',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2013-01-01 00:00:00',NULL,NULL,'George','','Amedore','Assemblyman','New York State Assembly','Legislative Office Building','Room 718','Albany','NY','12248','(518) 455-5197',NULL,'(518) 455-5435',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AmedoreG@assembly.state.ny.us','','http://assembly.state.ny.us/mem/George-Amedore','','; ',NULL,'2011-03-23 17:14:15',NULL),
(2,'f7bf118e-d1e8-4c3c-873c-1de6fb111966',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2013-01-01 00:00:00',NULL,NULL,'George','','Amedore','Assemblyman','New York State Assembly','Legislative Office Building','Room 718','Albany','NY','12248','(518) 455-5197',NULL,'(518) 455-4535',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AmedoreG@assembly.state.ny.us','','http://assembly.state.ny.us/mem/George-Amedore','','; ',NULL,'2011-02-14 13:34:38',NULL),
(3,'41d47c9b-0e95-446a-9017-99c7588eb83d',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2013-01-01 00:00:00',NULL,NULL,'Hugh','T.','Farley','Senator','New York State Senate','Legislative Office Building','Room 706','Albany','NY','12247','(518) 455-2181',NULL,'(518) 455-2271',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'farley@senate.state.ny.us','','http://www.nysenate.gov/senator/hugh-t-farley','','; ',NULL,'2011-02-10 11:54:36','41d47c9b-0e95-446a-9017-99c7588eb83d.jpg'),
(4,'214db873-ec51-4c9b-861d-92cf58e88abb',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2015-01-01 00:00:00',NULL,NULL,'Robert','','Duffy','Lieutenant Governor','Office of the Lieutenant Governor','NYS State Capitol Building','','Albany','NY','12224','(518) 402-2292',NULL,'(518) 473-2344',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','http://www.governor.ny.gov/contact/GovernorContactForm.php','http://www.governor.ny.gov/sl2/ltgovernor_bio','','; ',NULL,'2011-03-04 17:26:53',NULL),
(5,'d20dc974-5161-4b3a-8f44-4306a4c53367',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2015-01-01 00:00:00',NULL,NULL,'Andrew','M.','Cuomo','Governor','Office of the Governor of New York','','NYS State Capitol Building','Albany','NY','12224','(518) 474-8390',NULL,'(518)474-3767',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'gov.cuomo@chamber.state.ny.us','http://www.governor.ny.gov/contact/GovernorContactForm.php','http://www.governor.ny.gov/','','; ',NULL,'2011-03-07 11:20:20',NULL),
(6,'3b31b633-7516-4b46-b014-88d6b4772373',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-03 00:00:00',NULL,'2013-01-03 00:00:00',NULL,NULL,'Paul','','Tonko','Representative','United States House of Representatives','422 Cannon House Office Building','','Washington','DC','20515','(202) 225-5076',NULL,'(202) 225-5077',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','https://writerep.house.gov/writerep/welcome.shtml ','http://tonko.house.gov/','','; ',NULL,'2011-02-28 11:54:01',NULL),
(7,'4f422448-e118-4604-a4ea-1643d277b669',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-03 00:00:00',NULL,'2017-01-03 00:00:00',NULL,NULL,'Kirsten','','Gillibrand','Senator','United States Senate','478 Russell Senate Office Building','','Washington','DC','20510','(202) 224-4451',NULL,'(202) 228-0282',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'kirsten_gillibrand@gillibrand.senate.gov','http://gillibrand.senate.gov/contact/','http://gillibrand.senate.gov/','','; ',NULL,'2011-02-22 11:51:57','4f422448-e118-4604-a4ea-1643d277b669.jpg'),
(8,'d8847885-dfcc-4e4d-81af-e402c95dacb0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-03 00:00:00',NULL,'2017-01-03 00:00:00',NULL,NULL,'Charles','Ellis','Schumer','Senator','United States Senate','322 Hart Senate Office Building','','Washington','DC','20510','(202) 224-6542',NULL,'(202) 228-3027',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','https://schumer.senate.gov/Contact/contact_chuck.cfm','http://schumer.senate.gov/','','; ',NULL,'2011-09-26 10:15:52',NULL),
(9,'4f166531-713c-4f93-97c9-14233be0a695',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2009-01-20 00:00:00',NULL,'2013-01-21 00:00:00',NULL,NULL,'Joseph','','Biden','Vice President','The White House','1600 Pennsylvania Avenue NW','','Washington','DC','20500','',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','http://www.whitehouse.gov/contact-vp','http://www.whitehouse.gov/administration/vice-president-biden','','; ',NULL,'2010-01-21 00:00:00',NULL),
(10,'f36fe606-c94c-422c-82ed-6ac38f8c2be7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2009-01-20 00:00:00',NULL,'2013-01-21 00:00:00',NULL,NULL,'Barack','Hussein','Obama','President','The White House','1600 Pennsylvania Avenue NW','','Washington','DC','20500','202-456-1111',NULL,'202-456-2461',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','http://www.whitehouse.gov/contact/','http://www.whitehouse.gov/administration/president_obama/','http://www.barackobama.com/index.php','; ',NULL,'2009-08-31 00:00:00',NULL);

/*Table structure for table `tbl_elected_officials_comments` */

DROP TABLE IF EXISTS `tbl_elected_officials_comments`;

CREATE TABLE `tbl_elected_officials_comments` (
  `elected_officer_id` varchar(255) NOT NULL,
  `article_id` int(11) NOT NULL auto_increment,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `article_type` enum('article','poll') default 'article',
  `support` int(3) default NULL,
  `oppose` int(3) default NULL,
  `no_opinion` int(3) default NULL,
  PRIMARY KEY  (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_elected_officials_comments` */

insert into `tbl_elected_officials_comments` values 
('41d47c9b-0e95-446a-9017-99c7588eb83d',1,'sads sad sadsad','2011-12-25 19:41:17','poll',NULL,NULL,NULL),
('41d47c9b-0e95-446a-9017-99c7588eb83d',2,'This is the test article posted by ER.','2011-12-27 10:13:45','article',NULL,NULL,NULL);

/*Table structure for table `tbl_elected_officials_polls` */

DROP TABLE IF EXISTS `tbl_elected_officials_polls`;

CREATE TABLE `tbl_elected_officials_polls` (
  `elected_officer_id` varchar(255) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_elected_officials_polls` */

/*Table structure for table `tbl_emails` */

DROP TABLE IF EXISTS `tbl_emails`;

CREATE TABLE `tbl_emails` (
  `email_id` bigint(12) NOT NULL auto_increment,
  `content` text,
  `restore_content` text,
  `subject` varchar(255) default NULL,
  PRIMARY KEY  (`email_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_emails` */

insert into `tbl_emails` values 
(1,'<pre>\r\nDear (sName):\r\n\r\nThank you for joining VOICES FOR CHANGE. You have one of the most powerful tools for making your VOICE heard by your elected representatives. When you take a few moments to express your support or lack of support for proposed legislation, your opinion is magnified by others with a similar viewpoint and this information is provided in aggregate to your elected officials. Will they listen to those that elected them to office or will they support special interest groups? VOICES tracks just how well they represent their constituents to drive accountability into the legislative process.\r\n\r\nTo learn more about your elected officials please view the \"Elected Representatives\" tab on your dashboard.\r\n\r\nTo gain the most value from your subscription, please take a few moments to familiarize yourself with VOICES by touring the (slink).\r\n\r\nYou can use the following login credentials to use the services of our site.\r\n\r\nUsername : (sUserName)\r\nPassword  : (sPassword)\r\n\r\n\r\n\r\n<b>Regards,\r\nVOICES FOR CHANGE</b>\r\n</pre>','<pre>\r\nDear (sName):\r\n\r\nThank you for joining VOICES FOR CHANGE. You have one of the most powerful tools for making your VOICE heard \r\nby your elected representatives. When you take a few moments to express your support or lack of support for \r\nproposed legislation, your opinion is magnified by others with a similar viewpoint and this information is \r\nprovided in aggregate to your elected officials. Will they listen to those that elected them to office or \r\nwill they support special interest groups? VOICES tracks just how well they represent their constituents to \r\ndrive accountability into the legislative process.\r\n\r\nTo learn more about your elected officials please view the \"Elected Representatives\" tab on your dashboard.\r\n\r\nTo gain the most value from your subscription, please take a few moments to familiarize yourself with VOICES \r\nby touring the (slink).\r\n\r\nYou can use the following login credentials to use the services of our site.\r\n\r\nUsername : (sUserName)\r\nPassword  : (sPassword)\r\n\r\n\r\n\r\n<b>Regards,\r\nVOICES FOR CHANGE</b>\r\n</pre>','Welcome to VOICES FOR CHANGE'),
(2,'<strong>Dear (sUserName):<br /></strong><br />As requested, we have generated a new password for you.<br /><br />Password: <strong>(sPassword)<br /></strong><br />Please <strong>(sLink)</strong> with your new password.<br /><br /><b>Regards,<br />VOICES FOR CHANGE</b>','<strong>Dear (sUserName):<br /></strong><br />As requested, we have generated a new password for you.<br /><br />Password: <strong>(sPassword)<br /></strong><br />Please <strong>(sLink)</strong> with your new password.<br /><br /><b>Regards,<br />VOICES FOR CHANGE</b>','Response to Your Password Request'),
(55,'<strong>Dear  (senatorName) <br /></strong><br />\r\nVoices For Change support would like to inform you that Mr./Mrs <strong>(subscriberName)</strong> has given his/her opinion which is <strong>\"(opinion)\"</strong> of the proposed  bill <strong>\"(billName)\"</strong>.<br /><br /><b>Regards,<br />VOICES FOR CHANGE</b>','<strong>Dear  (senatorName) <br /></strong><br />\r\nVoices4change support would like to inform you that Mr./Mrs (subscriberName) has given his/her opinion which is (opinion) the proposed (billName).<br /><br /><b>Regards,<br />VOICES FOR CHANGE</b>','Vote Alert Notification'),
(41,'<pre><font face=\"Arial\">Dear (sMemberName):\r\n\r\nBelow are the vote alerts for you, login to you subscriber account and then click on vote alert links.\r\n\r\n(billDesc)\r\n</pre>','<pre><font face=\"Arial\">Dear (sMemberName):\r\n\r\nBelow are the vote alert for you\r\n\r\n(billDesc)\r\n</pre>','Vote Alert Notification'),
(56,'<pre><font face=\"Arial\"><strong>Dear Admin,</strong>\r\n\r\nVoicesForChange support would like to inform you that a \"One Time Subscriber\" Mr./Mrs (subscriberName) - (subscriberZip) has signed a petition, using promo code \"(sPromoCode)\" - and paid $(sPrice).\r\n\r\n<b>Regards,<br />VOICES FOR CHANGE</b>\r\n</font></pre>','<pre><font face=\"Arial\"><strong>Dear Admin,</strong>\r\n\r\nVoicesForChange support would like to inform you that a \"One Time Subscriber\" Mr./Mrs (subscriberName) - (subscriberZip) has signed a petition, using promo code \"(sPromoCode)\" - and paid $(sPrice).\r\n\r\n<b>Regards,<br />VOICES FOR CHANGE</b>\r\n</font></pre>','One Time Subscriber Signed Petition'),
(57,'<pre><font face=\"Arial\">Dear (sMemberName):\r\n\r\nBelow are the petition alerts for you, click on petition title to view the petition details.\r\n\r\n(billDesc)\r\n</pre>','<pre><font face=\"Arial\">Dear (sMemberName):\r\n\r\nBelow are the petition alerts for you, click on petition title to view the petition details.\r\n\r\n(billDesc)\r\n</pre>','Petition Alert Notification');

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
  `member_type` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL,
  `ElectedOfficialID` varchar(255) default NULL,
  PRIMARY KEY  (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_member` */

insert into `tbl_member` values 
(1,'affi','Affiliate','defaultaff','anil.nautiyal@netsmartz.net','e10adc3949ba59abbe56e057f20f883e','y','affiliate','2011-07-19 18:25:23',NULL),
(177,'Deleted First','Deleted Last','deleteuser','notused@gmail.com','e10adc3949ba59abbe56e057f20f883e','d','affiliate','2011-12-27 14:52:16',NULL),
(176,'Kirsten','Gillibrand','kirstengillibra','aniltestsebiznew@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','elected_official','2011-12-26 18:16:55','4f422448-e118-4604-a4ea-1643d277b669'),
(174,'Hugh','T. Farley','hughtfarley','aniltestsebiz@gmail.com','fcea920f7412b5da7be0cf42b8c93759','y','elected_official','2011-12-25 19:17:32','41d47c9b-0e95-446a-9017-99c7588eb83d'),
(173,'First Name','Last Name','subscriber','anil.netsmartz@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2011-12-24 22:56:35',NULL),
(175,'First Name','Last Name','otheraffiliate','anilphp111@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','affiliate','2011-12-26 18:09:10',NULL),
(171,'First Name','Last Name','observer','anil.nautiyal@sebiz.net','e10adc3949ba59abbe56e057f20f883e','y','observer','2011-12-24 22:44:02',NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pages` */

insert into `tbl_pages` values 
(1,'About Us','About Us','About Us','&lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n    &lt;tbody&gt;\r\n        &lt;tr&gt;\r\n            &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n            &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                &lt;tbody&gt;\r\n                    &lt;tr&gt;\r\n                        &lt;td align=&quot;left&quot; valign=&quot;top&quot; class=&quot;arial_16_c40306&quot;&gt;\r\n                        &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                            &lt;tbody&gt;\r\n                                &lt;tr&gt;\r\n                                    &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n                                    &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                        &lt;tbody&gt;\r\n                                            &lt;tr&gt;\r\n                                                &lt;td align=&quot;left&quot; valign=&quot;top&quot; class=&quot;arial_16_c40306&quot;&gt;\r\n                                                &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                    &lt;tbody&gt;\r\n                                                        &lt;tr&gt;\r\n                                                            &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                            &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                &lt;tbody&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td align=&quot;left&quot; valign=&quot;top&quot; height=&quot;37&quot; class=&quot;Trebuchet_27_c60000&quot;&gt;About Us &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td bgcolor=&quot;#b1b0ac&quot; align=&quot;left&quot; valign=&quot;top&quot; class=&quot;arial_20_c40306&quot;&gt;&lt;img width=&quot;1&quot; height=&quot;1&quot; src=&quot;images/trans.gif&quot; alt=&quot;&quot; /&gt; &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                                        &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                            &lt;tbody&gt;\r\n                                                                                &lt;tr&gt;\r\n                                                                                    &lt;td align=&quot;left&quot; valign=&quot;top&quot; style=&quot;padding: 20px 0px 15px;&quot;&gt;\r\n                                                                                    &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                                        &lt;tbody&gt;\r\n                                                                                            &lt;tr&gt;\r\n                                                                                                &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                                                                &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                                                    &lt;tbody&gt;\r\n                                                                                                        &lt;tr&gt;\r\n                                                                                                            &lt;td align=&quot;left&quot; width=&quot;235&quot; valign=&quot;top&quot;&gt;&lt;img width=&quot;219&quot; height=&quot;140&quot; src=&quot;images/img_aboutus_body.jpg&quot; alt=&quot;&quot; /&gt; &lt;/td&gt;\r\n                                                                                                            &lt;td align=&quot;left&quot; valign=&quot;middle&quot; class=&quot;arial_12_000&quot;&gt;\r\n                                                                                                            &lt;h4&gt;&lt;span class=&quot;arial_15_000_bold&quot;&gt;&lt;span class=&quot;Title&quot;&gt;ABOUT OUR VOICES FOR CHANGE.US (VOICES) &lt;/span&gt;&lt;/span&gt;&lt;/h4&gt;\r\n                                                                                                            &lt;h3&gt;&lt;span class=&quot;arial_15_000_bold&quot;&gt;&lt;/span&gt;&lt;/h3&gt;\r\n                                                                                                            &lt;p class=&quot;arial_12_000&quot;&gt;VOICES was created to provide tools that will allow; citizens that are frustrated at the lack of response from elected officials to be heard in a manner never before available, elected representatives a platform to inform their constituents what they are trying to accomplish for them, and advocacy organizations a method to inform their followers of their positions on issues, and rally them to action. &lt;br /&gt;&lt;/p&gt;\r\n                                                                                                            &lt;p class=&quot;arial_12_000&quot;&gt;VOICES provides a citizen a method with which to inform their state and federal officials on how you would like them to vote on legislation, and a method to track what actions the representative takes.&lt;/p&gt;\r\n                                                                                                            &lt;/td&gt;\r\n                                                                                                        &lt;/tr&gt;\r\n                                                                                                    &lt;/tbody&gt;\r\n                                                                                                &lt;/table&gt;\r\n                                                                                                &lt;/td&gt;\r\n                                                                                            &lt;/tr&gt;\r\n                                                                                        &lt;/tbody&gt;\r\n                                                                                    &lt;/table&gt;\r\n                                                                                    &lt;/td&gt;\r\n                                                                                &lt;/tr&gt;\r\n                                                                                &lt;tr style=&quot;font-family: Arial;&quot;&gt;\r\n                                                                                    &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES provides a method for individuals with a similar position on an issue to inform an elected official of their position on a collective basis, so your voice is no longer singular. &lt;br /&gt;&lt;br /&gt;For organizations that advocate a position on matters important to its members VOICES provides an unparalleled set of tools. Each time a member that has identified your group as it &amp;quot;Prime Affiliate&amp;quot; logs in your Affiliate page is presented on the member&#039;s dashboard, automatically updated with all content you have posted. &lt;br /&gt;&lt;br /&gt;Each elected representative is also provided with an &amp;quot;Elected Representative&amp;quot; page, which is tied to each of his constituents dashboard. We validate that the member does in fact live in the representative&#039;s district. A powerful tool set is provided to the representative, through which they can communicate with their constituents. &lt;br /&gt;&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;HOW VOICES WORKS FOR: &lt;/p&gt;\r\n                                                                                    &lt;link media=&quot;all&quot; href=&quot;http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css&quot; type=&quot;text/css&quot; rel=&quot;stylesheet&quot; /&gt;&lt;script src=&quot;http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;&lt;script src=&quot;http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;&lt;script&gt;\r\n	$(function() {\r\n		$( &quot;#tabs&quot; ).tabs();\r\n	});\r\n	&lt;/script&gt;\r\n                                                                                    &lt;div class=&quot;demo&quot;&gt;\r\n                                                                                    &lt;div id=&quot;tabs&quot;&gt;\r\n                                                                                    &lt;ul&gt;\r\n                                                                                        &lt;li&gt;&lt;a href=&quot;#tabs-1&quot; class=&quot;arial_12_000&quot;&gt;Advocates&lt;/a&gt; &lt;/li&gt;\r\n                                                                                        &lt;li&gt;&lt;a href=&quot;#tabs-2&quot; class=&quot;arial_12_000&quot;&gt;Citizens&lt;/a&gt; &lt;/li&gt;\r\n                                                                                        &lt;li&gt;&lt;a href=&quot;#tabs-3&quot; class=&quot;arial_12_000&quot;&gt;Elected Representatives&lt;/a&gt; &lt;/li&gt;\r\n                                                                                    &lt;/ul&gt;\r\n                                                                                    &lt;div id=&quot;tabs-1&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;For Advocates&lt;/strong&gt; &lt;br /&gt;&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES was created to provide a platform that will allow citizens to express their opinions to their elected representatives in a meaningful way. These citizens rely on groups such yours that they identify with to provide opinions and positions on matters important to them. The tools provided in our platform will stimulate your membership to action because they will realize that their voices will be heard. VOICES asks its members to identify a &amp;ldquo;Prime Affiliate&amp;rdquo; and other Affiliates whose opinions they would like to consider, before they express themselves to their elected representatives. Once they do so, the Prime Affiliate&#039;s home page appears on the member&#039;s dashboard when they log in. VOICES also pays a significant referral fee to the Prime Affiliate that a member (only) identifies when they join. When a group becomes a VOICES &amp;ldquo;Affiliate&amp;rdquo;, we create and affiliate&#039;s home page for you. Any member can view any affiliate&#039;s page. Your Affiliate&#039;s page provides for the following: &lt;/p&gt;\r\n                                                                                    &lt;ul&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Upon sign-up we create a blank page for affiliate &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;We create space at top for banner/logo etc &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;We allow 4 sections for your organization to post data &lt;/li&gt;\r\n                                                                                    &lt;/ul&gt;\r\n                                                                                    &lt;ol&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;News section (with comments from affiliate) informing members of position on issues\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Any topic of interest affiliate normally take a position on i.e. economic issues (debt ceiling etc) gay marriage, healthcare, etc etc &lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;create drop-down where members can also post their comment on the article placed in this section by the Affiliate &lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Bills/petitions section\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Posting a comment on a bill creates the Bill Resource page, when a member clicks on a bill with a comment on this page they are taken to the Bill Resources page, otherwise they can just read comment &lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Petition posted here allows for members to sign, and is listed under &amp;ldquo;validated signors&amp;rdquo; (which tells elected reps that the Petition was signed by one of their constituents). &lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Bulletins section affiliate may post articles (no comments allowed from members)\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Endorsing candidates, &lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Meeting notices &lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;etc., etc. &lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Advertising section allows Affiliate to post;\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Sponsors list with link to sponsor site &lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Ads from sponsors allowing for one visual graphic &lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                    &lt;/ol&gt;\r\n                                                                                    &lt;ul&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;&amp;ldquo;DONATE&amp;rdquo;, VOICES creates and provides a link for affiliates to set up a Paypal account at which your followers can make contributions to you. When a member clicks on that link they are taken to Paypal, make a contribution, and it is credited to your account. &lt;/li&gt;\r\n                                                                                    &lt;/ul&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;div id=&quot;tabs-2&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;For Citizens&lt;/strong&gt; &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;As a citizen you have every right to expect your elected representatives to listen to the people. VOICES was created to provide you with a platform communicate with your elected reps, after considering the opinions of those organizations you respect and identify with, and allows you to see how your elected reps act on your requests.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;HOW VOICES WORKS&lt;/strong&gt; &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;When you become a VOICES member, we identify each state and federal elected official that represents you. When you log in; each elected rep is displayed on your dashboard, and when you identify a group you support as your Prime Affiliate, their page appears on your dashboard, as well. You can identify as many groups as you wish as Affiliates you might wish to view, and we provide links to their pages, only your Prime Affiliate&#039;s page appears on your dashboard. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;Each time a bill comes out of committee to be scheduled for a floor vote in a legislative body VOICES sends you an email,(VOTE ALERT) and you will be able to express your opinion to your Elected Representative (ER) how you would like him or her to vote on that bill; when you click on &amp;ldquo;VOICE MY OPINION&amp;rdquo; that ALERT will be returned to VOICES, the results tabulated, and forwarded to your ER. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;Any opinions expressed by your Affiliate(s) will be displayed on your VOTE ALERT to consider. VOICES tabulates the results of all of the opinions expressed to that ER on that particular bill. When that bill is voted on VOICES reports to you how your ER voted on that bill, and the percentage of opinions expressed supporting or opposing that bill. VOICES also creates a cumulative report on all votes the ER casts on legislation, along with the percentage of opinions supporting or opposing each bill. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES also creates a page for each elected representative. The representative is provided with a &amp;quot;feed&amp;quot; to that page by VOICES. The elected representative can use this page to keep constituents informed on initiatives he takes on their behalf. For instance, he might post that he is trying to alleviate high unemployment in the community by asking a company to move into the area, creating new job opportunities, and providing them with assistance to do so. The ER can also post comments on this page as to why they voted for/against a given bill. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;You can communicate your thoughts to you elected official on that page if you wish, so long as you comply with VOICES User agreement as to profanity rules etc. VOICES also posts results of Vote Alerts on that page, as well as other information that is pertinent to that official, and allows him to post comments to his constituents on that page as well. As a VOICES member you can view the content of any Affiliate&#039;s pages. However, Affiliates can communicate ONLY with members that select them. This protects you from being inundated with opinions from organizations that you do not choose tot hear from. We do not provide your email to anyone.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;Please review our &lt;a href=&quot;http://voices4change.netsmartz.us/index.php?stage=pages&amp;amp;mode=Faq&quot;&gt;FAQ&lt;/a&gt; section to learn more about us.&lt;/p&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;div id=&quot;tabs-3&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;ELECTED REPRESENTATIVES&lt;/strong&gt;&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES was created to provide citizens a platform to communicate with their elected representatives, and for those representatives to communicate with their constituentts. We create an Elected Rep&#039;s page for each elected official of each of our members. As an elected representative you can post articles on your elected rep&#039;s page to inform your constituents on efforts you are taking on their behalf. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;For example, you might inform them of efforts you are taking to bring a business into the area to provide unemployment. You can also create polls for your constituents to respond to on matters you consider important, including proposed legislation. You can state your position on important issues, as well. We also provide you with a link to set up an account on Paypal that will accept contributions if you have 501(c)(3) status in your campaign entity. You, of course, can also seek volunteers to work as volunteers on your campaign. &lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES platform provides a mechanism to provide you with opinions your constituents have provided for you. We have verified that these opinions are provided by residents within your district. VOICES platform only allows members that live within your district to contact you via their elected reps pages. When a member joins VOICES we bill a small fee to their credit card. We then identify their elected reps using their home address, and incorporate that information in their user profile. Our merchamt services provider sends us an email validating that the member resides at the address the member provided. Therefore we know that the member resides in your district, is at least eighteen years of age and has a social security number.&lt;/p&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;!-- End demo --&gt;\r\n                                                                                    &lt;div class=&quot;demo-description&quot; style=&quot;display: none;&quot;&gt;\r\n                                                                                    &lt;p&gt;Click tabs to swap between content that is broken into logical sections.&lt;/p&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;!-- End demo-description --&gt;&lt;/td&gt;\r\n                                                                                &lt;/tr&gt;\r\n                                                                                &lt;tr&gt;\r\n                                                                                    &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;&lt;br /&gt;&lt;/td&gt;\r\n                                                                                &lt;/tr&gt;\r\n                                                                            &lt;/tbody&gt;\r\n                                                                        &lt;/table&gt;\r\n                                                                        &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                &lt;/tbody&gt;\r\n                                                            &lt;/table&gt;\r\n                                                            &lt;/td&gt;\r\n                                                        &lt;/tr&gt;\r\n                                                        &lt;tr&gt;\r\n                                                            &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;&amp;nbsp;&lt;/td&gt;\r\n                                                        &lt;/tr&gt;\r\n                                                    &lt;/tbody&gt;\r\n                                                &lt;/table&gt;\r\n                                                &lt;/td&gt;\r\n                                            &lt;/tr&gt;\r\n                                        &lt;/tbody&gt;\r\n                                    &lt;/table&gt;\r\n                                    &lt;/td&gt;\r\n                                &lt;/tr&gt;\r\n                            &lt;/tbody&gt;\r\n                        &lt;/table&gt;\r\n                        &lt;/td&gt;\r\n                    &lt;/tr&gt;\r\n                &lt;/tbody&gt;\r\n            &lt;/table&gt;\r\n            &lt;/td&gt;\r\n        &lt;/tr&gt;\r\n    &lt;/tbody&gt;\r\n&lt;/table&gt;','2011-12-20','about_us'),
(2,'Privacy Policy','Privacy Policy','Privacy Policy','<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\r\n\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n  <table width=\"100%\" border=\"0\" cellspacing=\r\n  \"0\" cellpadding=\"0\">\r\n	<tr>\r\n	  <td height=\"37\" align=\"left\" valign=\"top\"\r\n	  class=\"Trebuchet_27_c60000\">\r\n		Privacy Policy\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td align=\"left\" valign=\"top\" bgcolor=\r\n	  \"#B1B0AC\" class=\"arial_20_c40306\">\r\n		<img src=\"images/trans.gif\" width=\"1\"\r\n		height=\"1\" alt=\"\">\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td>\r\n		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo turpis, ultrices eget facilisis a, ultrices at ipsum. In lacinia justo massa. Suspendisse dictum scelerisque sem non volutpat. Donec condimentum blandit massa in consectetur. In non urna purus, in congue nisl. Morbi congue bibendum diam non luctus. Morbi eu metus et ipsum venenatis rutrum. Etiam in leo at leo porta tincidunt. Vivamus accumsan nisl sed lectus gravida vel lacinia orci auctor. Cras laoreet elit sed diam hendrerit consectetur. Suspendisse fringilla aliquet ligula, vitae faucibus magna pulvinar eu. Morbi feugiat volutpat mi quis vestibulum. Praesent ac auctor sem. Vestibulum ac ornare augue.</p>\r\n\r\n<p>Nam vitae nunc quis nisl gravida imperdiet sed eget dolor. Etiam adipiscing, erat nec fermentum gravida, orci mi blandit mi, a pulvinar risus purus eget sem. Curabitur hendrerit arcu quis quam sollicitudin nec tincidunt urna molestie. Sed vehicula mattis imperdiet. Curabitur sed sapien dolor. Aenean nec augue turpis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean a risus in enim placerat imperdiet. Morbi sit amet orci ligula. Donec id urna vitae elit vestibulum pellentesque. Cras fermentum libero in lorem faucibus consectetur. Proin nec est mauris. Etiam eu augue ac erat varius auctor volutpat et nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer luctus elementum ullamcorper. Vivamus libero felis, consequat nec placerat sit amet, adipiscing vel nibh. Aliquam tincidunt leo mattis sem elementum laoreet. Sed blandit lobortis odio, eget ultrices elit sodales in.</p>\r\n\r\n<p>Sed pretium elit in ipsum adipiscing aliquet. Praesent sollicitudin enim sed odio tempus sed lobortis risus ultrices. Curabitur elit tortor, molestie nec pulvinar vitae, pellentesque eget magna. Aenean rutrum magna nunc. Ut eget justo justo, eget tristique nisi. Vestibulum dignissim dapibus aliquam. Integer porttitor, mauris eu dictum commodo, neque augue tincidunt dui, quis convallis nisl ipsum eu urna. Vivamus at orci orci. Proin a felis sed est pretium blandit. Phasellus venenatis tincidunt nisi. Sed id placerat nisl.</p>\r\n\r\n<p>Praesent lacinia auctor risus id congue. Morbi nisl velit, placerat vitae blandit nec, accumsan a ligula. Sed tincidunt orci eget augue bibendum rutrum. Vestibulum convallis molestie dignissim. Nullam fermentum diam malesuada massa dapibus tempor. Maecenas molestie consequat eleifend. Suspendisse facilisis lectus sit amet sapien accumsan tristique. Curabitur et ipsum erat. In nec magna nisl. Fusce aliquam sodales dignissim. Donec ullamcorper faucibus volutpat. In vitae dolor ligula. Curabitur vehicula tempus consectetur. Cras in diam orci, sit amet tincidunt justo. Aliquam ullamcorper, sapien non pulvinar scelerisque, elit ipsum pulvinar leo, ac volutpat metus velit vitae lacus.</p>\r\n\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas ultrices nisl et dui lacinia at sodales urna placerat. Maecenas tristique ligula ac libero aliquam eget laoreet mauris dignissim. In sit amet leo non odio molestie ultricies vitae eu enim. In ut turpis nulla. Phasellus porta tellus a mauris hendrerit semper. Nam eu urna nulla. Proin purus est, adipiscing ut laoreet id, elementum sit amet magna. Nunc commodo fermentum nisl et adipiscing. Sed cursus ultrices eros, at aliquam leo tristique vitae. Cras sit amet vestibulum urna. Mauris ultrices felis a ante gravida suscipit. Pellentesque sit amet lacus mi, eget sollicitudin tortor. Etiam sit amet mauris faucibus elit tempor rhoncus id sit amet felis. Vestibulum vel ante est. Morbi et libero sem, vel congue arcu. </p>\r\n	  </td>\r\n	</tr>\r\n  </table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\"></td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>','2011-06-23','privacy_policy'),
(19,'FAQ','FAQ','FAQ','&lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n    &lt;tbody&gt;\r\n        &lt;tr&gt;\r\n            &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n            &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                &lt;tbody&gt;\r\n                    &lt;tr&gt;\r\n                        &lt;td align=&quot;left&quot; valign=&quot;top&quot; class=&quot;arial_16_c40306&quot;&gt;\r\n                        &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                            &lt;tbody&gt;\r\n                                &lt;tr&gt;\r\n                                    &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n                                    &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                        &lt;tbody&gt;\r\n                                            &lt;tr&gt;\r\n                                                &lt;td align=&quot;left&quot; valign=&quot;top&quot; class=&quot;arial_16_c40306&quot;&gt;\r\n                                                &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                    &lt;tbody&gt;\r\n                                                        &lt;tr&gt;\r\n                                                            &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                            &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                &lt;tbody&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td align=&quot;left&quot; valign=&quot;top&quot; height=&quot;37&quot; class=&quot;Trebuchet_27_c60000&quot;&gt; FAQs &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td bgcolor=&quot;#b1b0ac&quot; align=&quot;left&quot; valign=&quot;top&quot; class=&quot;arial_20_c40306&quot;&gt; &lt;img width=&quot;1&quot; height=&quot;1&quot; alt=&quot;&quot; src=&quot;images/trans.gif&quot; /&gt; &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                                        &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                            &lt;tbody&gt;\r\n                                                                                &lt;tr&gt;\r\n                                                                                    &lt;td align=&quot;left&quot; valign=&quot;top&quot; style=&quot;padding: 20px 0px 15px;&quot;&gt;\r\n                                                                                    &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                                        &lt;tbody&gt;\r\n                                                                                            &lt;tr&gt;\r\n                                                                                                &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                                                                &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                                                    &lt;tbody&gt;\r\n                                                                                                        &lt;tr&gt;\r\n                                                                                                            &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt; &lt;/td&gt;\r\n                                                                                                            &lt;td align=&quot;left&quot; valign=&quot;middle&quot; class=&quot;arial_12_000&quot;&gt;\r\n                                                                                                            &lt;ol&gt;&lt;!--\r\n                                                                                                                &lt;li class=&quot;arial_15_000_bold&quot;&gt;Is my personal information secure?&lt;/li&gt;\r\n																												--&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Is my personal information secure?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Yes, our site is fully encrypted.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;All personal information is stored on a device that is not connected to the internet.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;All financial transactions occur over secure servers, and then all of that data is stored  on devices not connected to the internet.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;br /&gt; 																												&lt;!--\r\n                                                                                                                &lt;li class=&quot;arial_15_000_bold&quot;&gt;Why is my voice more powerful on VOICES?&lt;/li&gt;\r\n																												--&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Why is my voice more powerful on VOICES?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Currently, if you express your opinion to an elected representative, you do so singularly,  if you express your opinion on an issue via VOICES, all opinions expressed on that issue  to that elected representative on the issue are done so individually, but the results of  ALL of the opinions are tabulated by VOICES, and therefore you are expressing your  opinion COLLECTIVELY to the Representative.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;The resulting opinions on each issue are  reported back to you on that COLLECTIVE basis.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;br /&gt; 																												&lt;!--\r\n                                                                                                                &lt;li class=&quot;arial_15_000_bold&quot;&gt;How does VOICES work?&lt;/li&gt;\r\n																												--&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;How does VOICES work?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Each time a bill is coming up for a vote in a legislative body VOICES will send you a VOTE ALERT asking you to express your opinion to your Elected Representative [ER] asking whether you support or oppose that bill. The alert contains a kink to the text of  the bill as well if you wish to read it.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;When you send that opinion back to VOICES it is then forwarded to the ER (via an  automatically created VOICESFORCHANGE.US email we create for you).&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;VOICES also tabulates the results of all VOICES Users opinions that are sent to that  ER on all bills, along with the the percentages of all opinions sent on each bill.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;br /&gt; 																												&lt;!--\r\n                                                                                                                &lt;li class=&quot;arial_15_000_bold&quot;&gt;How do I know how the ER voted on that bill?&lt;/li&gt;\r\n																												--&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;How do I know how the ER voted on that bill?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;VOICES reports back to you how the ER voted on that bill; along with the percentage  of opinions expressed via VOICES supporting or opposing that bill.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;For example, if an elected official receives notices from VOICES where 75% of the  Users support the bill, and 25% oppose it, our Report Card on that bill will tell you how  the ER voted and the percentage of VOICES Users that supported and opposed that  piece of legislation.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;VOICES also creates a &#039;cumulative Report Card&#039; as to how the ER voted on all bills in  relationship to the opinions expressed via VOICES.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;br /&gt; 																												&lt;!--\r\n                                                                                                                &lt;li class=&quot;arial_15_000_bold&quot;&gt;Do I need to know the names of all my state and federal Elected  Representatives? &lt;/li&gt;\r\n																												--&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Do I need to know the names of all my state and federal Elected  Representatives? &lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;No, when you sign up providing VOICES with your street address VOICES will  identify each of your state and federal Elected Representatives.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;VOICES will then provide you with the name, address, phone number and email  address of each of your Elected Representatives.&lt;/li&gt;\r\n                                                                                                                    &lt;br /&gt;                         																													&lt;/ul&gt;\r\n                                                                                                                    &lt;!--\r\n																													&lt;li class=&quot;arial_15_000_bold&quot;&gt;Does VOICES share my email address or any other information with any  other organization?&lt;/li&gt;\r\n																													--&gt;\r\n                                                                                                                    &lt;li&gt;&lt;strong&gt;Does VOICES share my email address or any other information with any  other organization?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                    &lt;ul&gt;\r\n                                                                                                                        &lt;li&gt;NO.&lt;/li&gt;\r\n                                                                                                                        &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                        &lt;!--&lt;li class=&quot;arial_15_000_bold&quot;&gt;Why does VOICES charge a fee?&lt;/li&gt;--&gt;\r\n                                                                                                                        &lt;li&gt;&lt;strong&gt;Why does VOICES charge a fee?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                        &lt;ul&gt;\r\n                                                                                                                            &lt;li&gt;We believe that if VOICES were provided for free, as is Facebook who derive their  revenue via advertising, we would DE-legitimize VOICES because any organization  could sign up any number of fictitious VOICES Users in an attempt to &amp;ldquo;stuff the ballots  box&amp;rdquo;.&lt;/li&gt;\r\n                                                                                                                            &lt;li&gt;When we bill your credit/debit card or Paypal account we are able to verify that the  account exists at your billing address (which we ask for) and therefore we prevent those  that might attempt to &amp;ldquo;stuff the ballot box&amp;rdquo; from doing so because they would need to  create a payment account at an address that is valid.&lt;/li&gt;\r\n                                                                                                                            &lt;li&gt;We are trying to provide you with a powerful tool, and because of the reasons cited  above we hope that you concur that it is of value to you. VOICES will never sell lists of  our clients, and in an attempt to remain totally non-partisan, will never accept  advertising, and therefore we must remain a fee for service entity.&lt;/li&gt;\r\n                                                                                                                            &lt;br /&gt;     																															&lt;!--																															&lt;/ul&gt;\r\n                                                                                                                            &lt;li class=&quot;arial_15_000_bold&quot;&gt;Will VOICES express a position on an issue?&lt;/li&gt;\r\n																															--&gt;\r\n                                                                                                                            &lt;li&gt;&lt;strong&gt;Will VOICES express a position on an issue?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                            &lt;ul&gt;\r\n                                                                                                                                &lt;li&gt;No, VOICES is and shall remain non-partisan.&lt;/li&gt;\r\n                                                                                                                                &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                &lt;!-- &lt;li class=&quot;arial_15_000_bold&quot;&gt;Will anyone or any entity express an opinion to me?&lt;/li&gt; --&gt;\r\n                                                                                                                                &lt;li&gt;&lt;strong&gt;Will anyone or any entity express an opinion to me?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                                &lt;ul&gt;\r\n                                                                                                                                    &lt;li&gt;Perhaps, VOICES allows advocacy groups, such as; the political advocacy groups, labor  unions, AARP or other such groups to become VOICES &#039;Affiliates&#039;. &lt;/li&gt;\r\n                                                                                                                                    &lt;li&gt;If you choose to do so, you can identify each group whose opinions/position on bills you might wish to see.&lt;/li&gt;\r\n                                                                                                                                    &lt;li&gt;If you do so your VOTE ALERT will contain that Affiliate&#039;s comments on that legislation,  if the group becomes an Affiliate.&lt;/li&gt;\r\n                                                                                                                                    &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                    &lt;!--\r\n                                                                                                                                    &lt;li class=&quot;arial_15_000_bold&quot;&gt;Can I identify more than one Affiliate?&lt;/li&gt; --&gt;\r\n                                                                                                                                    &lt;li&gt;&lt;strong&gt;Can I identify more than one Affiliate?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                                    &lt;ul&gt;\r\n                                                                                                                                        &lt;li&gt;Yes, as many as you wish.&lt;/li&gt;\r\n                                                                                                                                        &lt;br /&gt;                                      																																		&lt;!--																																		&lt;/ul&gt;\r\n                                                                                                                                        &lt;li class=&quot;arial_15_000_bold&quot;&gt;How much does VOICES charge an Affiliate for this service?&lt;/li&gt;\r\n																																		--&gt;\r\n                                                                                                                                        &lt;li&gt;&lt;strong&gt;How much does VOICES charge an Affiliate for this service?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                                        &lt;ul&gt;\r\n                                                                                                                                            &lt;li&gt;Nothing, we are providing the service to you. &lt;/li&gt;\r\n                                                                                                                                            &lt;li&gt;Affiliates are allowed to participate  because they may provide you more power by bringing Users with common views  together on a position, therefore making your voice more powerful.&lt;/li&gt;\r\n                                                                                                                                            &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                            &lt;!--\r\n                                                                                                                                            &lt;li class=&quot;arial_15_000_bold&quot;&gt;Does VOICES help me, or Affiliates, in other ways?&lt;/li&gt; --&gt;\r\n                                                                                                                                            &lt;li&gt;&lt;strong&gt;Does VOICES help me, or Affiliates, in other ways?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                                            &lt;ul&gt;\r\n                                                                                                                                                &lt;li&gt;Yes, there are numerous other facets to VOICES that you will see when you visit the  VOICES website.&lt;/li&gt;\r\n                                                                                                                                                &lt;li&gt;One very powerful tool is available in the &amp;ldquo;Issues Provides Answers&amp;rdquo;  segment. &amp;ldquo;Issues&amp;rdquo; allows for an Affiliate to present a &#039;Petition&#039; for signatures on a Bill  that is in committee, but not yet scheduled for a vote. &amp;lt;.li&amp;gt;&lt;/li&gt;\r\n                                                                                                                                                &lt;li&gt;VOICES then sends the &#039;Petition&#039;  to all VOICES Users that have identified with the Affiliate.&lt;/li&gt;\r\n                                                                                                                                                &lt;li&gt;Once completed, the Petition  will be sent to the Chairman of the committee, each committee member, and the  Elected Representative of each User that signed the Petition.&lt;/li&gt;\r\n                                                                                                                                                &lt;li&gt;We leave it you to  determine what effect that might have if such a Petition contained up to, or more than one million signatures.&lt;/li&gt;\r\n                                                                                                                                                &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                                &lt;!--\r\n																																				&lt;li class=&quot;arial_15_000_bold&quot;&gt;Does VOICES have a method for members or Affiliates to ask for legislation  to be introduced?&lt;/li&gt;\r\n																																				--&gt;\r\n                                                                                                                                                &lt;li&gt;&lt;strong&gt;Does VOICES have a method for members or Affiliates to ask for legislation  to be introduced?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                                                &lt;ul&gt;\r\n                                                                                                                                                    &lt;li&gt;Yes, just as a Petition supports or opposes a bill already introduced, a Petition may also  be used to ask that legislators introduce new legislation.&lt;/li&gt;\r\n                                                                                                                                                    &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                                    &lt;li&gt;&lt;strong&gt;What is an &amp;ldquo;Alliance&amp;rdquo;?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                                                    &lt;ul&gt;\r\n                                                                                                                                                        &lt;li&gt;Because VOICES hopes to make your voice more powerful, we allow Affiliates to form  alliances with other VOICES Affiliates that might take a similar position on proposed  legislation to submit a Petition to their followers on a combined basis to expand the  number of possible signatures.&lt;/li&gt;\r\n                                                                                                                                                        &lt;li&gt;To do so, the administrators of each Affiliate must  inform VOICES administration department that they wish to collaborate on the Petition.&lt;/li&gt;\r\n                                                                                                                                                        &lt;li&gt;It  then is sent to all members of all of the Affiliates in the alliance.&lt;/li&gt;\r\n                                                                                                                                                        &lt;br /&gt;                                                                                                                 &lt;/ul&gt;\r\n                                                                                                                                                        &lt;li&gt;&lt;strong&gt;Can I submit a Petition?&lt;/strong&gt;&lt;/li&gt;\r\n                                                                                                                                                        &lt;ul&gt;\r\n                                                                                                                                                            &lt;li&gt;Yes, you can post a Petition on  your VOICES &amp;ldquo;Member Page&amp;rdquo; for signature.&lt;/li&gt;\r\n                                                                                                                                                            &lt;li&gt;It will be  more effective if you were to submit the Petition to one of your Affiliates, and ask them  to form one or more alliances with other Affiliates, because it would then go to all Users  that identified themselves with those Affiliates.&lt;/li&gt;\r\n                                                                                                                                                        &lt;/ul&gt;\r\n                                                                                                                                                    &lt;/ul&gt;\r\n                                                                                                                                                &lt;/ul&gt;\r\n                                                                                                                                            &lt;/ol&gt;\r\n                                                                                                                                            &lt;/td&gt;\r\n                                                                                                                                        &lt;/tr&gt;\r\n                                                                                                                                    &lt;/tbody&gt;\r\n                                                                                                                                &lt;/table&gt;\r\n                                                                                                                                &lt;/td&gt;\r\n                                                                                                                            &lt;/tr&gt;\r\n                                                                                                                        &lt;/tbody&gt;\r\n                                                                                                                    &lt;/table&gt;\r\n                                                                                                                    &lt;/td&gt;\r\n                                                                                                                &lt;/tr&gt;\r\n                                                                                                                &lt;tr&gt;\r\n                                                                                                                    &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;&lt;br /&gt;&lt;/td&gt;\r\n                                                                                                                &lt;/tr&gt;\r\n                                                                                                            &lt;/tbody&gt;\r\n                                                                                                        &lt;/table&gt;\r\n                                                                                                        &lt;/td&gt;\r\n                                                                                                    &lt;/tr&gt;\r\n                                                                                                &lt;/tbody&gt;\r\n                                                                                            &lt;/table&gt;\r\n                                                                                            &lt;/td&gt;\r\n                                                                                        &lt;/tr&gt;\r\n                                                                                        &lt;tr&gt;\r\n                                                                                            &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;&amp;nbsp;&lt;/td&gt;\r\n                                                                                        &lt;/tr&gt;\r\n                                                                                    &lt;/tbody&gt;\r\n                                                                                &lt;/table&gt;\r\n                                                                                &lt;/td&gt;\r\n                                                                            &lt;/tr&gt;\r\n                                                                        &lt;/tbody&gt;\r\n                                                                    &lt;/table&gt;\r\n                                                                    &lt;/td&gt;\r\n                                                                &lt;/tr&gt;\r\n                                                            &lt;/tbody&gt;\r\n                                                        &lt;/table&gt;\r\n                                                        &lt;/td&gt;\r\n                                                    &lt;/tr&gt;\r\n                                                &lt;/tbody&gt;\r\n                                            &lt;/table&gt;\r\n                                            &lt;/td&gt;\r\n                                        &lt;/tr&gt;\r\n                                    &lt;/tbody&gt;\r\n                                &lt;/table&gt;','2011-12-17','faq'),
(20,'Contacts Us','Contacts Us','Contacts Us','<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"arial_16_c40306\">\r\n            <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign=\"top\" align=\"left\" class=\"arial_16_c40306\">\r\n                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                            <tbody>\r\n                               <tr>\r\n                                    <td class=\"arial_16_c40306\">\r\n                                    <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign=\"top\" align=\"left\" class=\"arial_16_c40306\">\r\n                                                <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign=\"top\" align=\"left\">\r\n                                                            <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                <tbody>\r\n                                                                    <tr>\r\n                                                                        <td valign=\"top\" height=\"37\" align=\"left\" class=\"Trebuchet_27_c60000\"> Contact Us </td>\r\n                                                                    </tr>\r\n                                                                    <tr>\r\n                                                                        <td valign=\"top\" bgcolor=\"#b1b0ac\" align=\"left\" class=\"arial_20_c40306\"> <img width=\"1\" height=\"1\" src=\"images/trans.gif\" alt=\"\" /> </td>\r\n                                                                    </tr>\r\n                                                                    <tr>\r\n                                                                        <td valign=\"top\" align=\"left\">\r\n                                                                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                            <tbody>\r\n                                                                                <tr>\r\n                                                                                    <td valign=\"top\" align=\"left\" style=\"padding: 20px 0px 15px;\"> <span class=\"arial_15_000_bold\">Lorem ipsum dolor sit amet</span><br />\r\n                                                                                    <div style=\"text-align: center;\">\r\n                                                                                    <div style=\"text-align: left;\">                                                                                     </div>\r\n                                                                                    <div style=\"text-align: left;\"><span class=\"arial_12_000\">onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span class=\"arial_12_3b393a\"></span><br />                                                                                     <span class=\"arial_12_3b393a\"></span></div>\r\n                                                                                    </div>\r\n                                                                                    <span class=\"arial_12_3b393a\"> <br /></span> </td>\r\n                                                                                </tr>\r\n                                                                                <tr>\r\n                                                                                    <td valign=\"top\" align=\"left\">\r\n                                                                                    <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                                        <tbody>\r\n                                                                                            <tr>\r\n                                                                                                <td valign=\"top\" align=\"left\">\r\n                                                                                                <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                                                    <tbody>\r\n                                                                                                        <tr>\r\n                                                                                                            <td valign=\"top\" align=\"left\">  </td>\r\n                                                                                                            <td valign=\"middle\" align=\"left\" class=\"arial_12_000\"> <span class=\"arial_15_000_bold\">Nam vitae nunc quis nisl gravida</span><br /> <span class=\"arial_12_000\">Imperdiet sed eget dolor. Etiam adipiscing, erat nec fermentum gravida, orci mi blandit mi, a pulvinar risus purus eget sem. Curabitur hendrerit arcu quis quam sollicitudin nec tincidunt urna molestie. Sed vehicula mattis imperdiet. Curabitur sed sapien dolor. Aenean nec augue turpis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean a risus in enim placerat imperdiet. Morbi sit amet orci ligula. Donec id urna vitae elit vestibulum pellentesque. Cras fermentum libero in lorem faucibus consectetur. Proin nec est mauris. Etiam eu augue ac erat varius auctor volutpat et nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer luctus elementum ullamcorper. Vivamus libero felis, consequat nec placerat sit amet, adipiscing vel nibh. Aliquam tincidunt leo mattis sem elementum laoreet. Sed blandit lobortis odio, eget ultrices elit sodales in. </span> </td>\r\n                                                                                                        </tr>\r\n                                                                                                    </tbody>\r\n                                                                                                </table>\r\n                                                                                                </td>\r\n                                                                                            </tr>\r\n                                                                                        </tbody>\r\n                                                                                    </table>\r\n                                                                                    </td>\r\n                                                                                </tr>\r\n                                                                                <tr>\r\n                                                                                    <td valign=\"top\" align=\"left\">\r\n                                                                                    <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                                        <tbody>\r\n                                                                                            <tr>\r\n                                                                                                <td valign=\"top\" align=\"left\" class=\"arial_12_000\"> onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br /> <br /> onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br /> <br /> onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>\r\n                                                                                            </tr>\r\n                                                                                        </tbody>\r\n                                                                                    </table>\r\n                                                                                    </td>\r\n                                                                                </tr>\r\n                                                                            </tbody>\r\n                                                                        </table>\r\n                                                                        </td>\r\n                                                                    </tr>\r\n                                                                </tbody>\r\n                                                            </table>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                      \r\n                                                    </tbody>\r\n                                                </table>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>','2011-06-24','contacts_us'),
(21,'Terms & Conditions','Terms & Conditions','Terms & Conditions','<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\r\n\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n  <table width=\"100%\" border=\"0\" cellspacing=\r\n  \"0\" cellpadding=\"0\">\r\n	<tr>\r\n	  <td height=\"37\" align=\"left\" valign=\"top\"\r\n	  class=\"Trebuchet_27_c60000\">\r\n		Terms & Conditions\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td align=\"left\" valign=\"top\" bgcolor=\r\n	  \"#B1B0AC\" class=\"arial_20_c40306\">\r\n		<img src=\"images/trans.gif\" width=\"1\"\r\n		height=\"1\" alt=\"\">\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td>\r\n\r\n<p>Sed pretium elit in ipsum adipiscing aliquet. Praesent sollicitudin enim sed odio tempus sed lobortis risus ultrices. Curabitur elit tortor, molestie nec pulvinar vitae, pellentesque eget magna. Aenean rutrum magna nunc. Ut eget justo justo, eget tristique nisi. Vestibulum dignissim dapibus aliquam. Integer porttitor, mauris eu dictum commodo, neque augue tincidunt dui, quis convallis nisl ipsum eu urna. Vivamus at orci orci. Proin a felis sed est pretium blandit. Phasellus venenatis tincidunt nisi. Sed id placerat nisl.</p>\r\n\r\n<p>Praesent lacinia auctor risus id congue. Morbi nisl velit, placerat vitae blandit nec, accumsan a ligula. Sed tincidunt orci eget augue bibendum rutrum. Vestibulum convallis molestie dignissim. Nullam fermentum diam malesuada massa dapibus tempor. Maecenas molestie consequat eleifend. Suspendisse facilisis lectus sit amet sapien accumsan tristique. Curabitur et ipsum erat. In nec magna nisl. Fusce aliquam sodales dignissim. Donec ullamcorper faucibus volutpat. In vitae dolor ligula. Curabitur vehicula tempus consectetur. Cras in diam orci, sit amet tincidunt justo. Aliquam ullamcorper, sapien non pulvinar scelerisque, elit ipsum pulvinar leo, ac volutpat metus velit vitae lacus.</p>\r\n\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas ultrices nisl et dui lacinia at sodales urna placerat. Maecenas tristique ligula ac libero aliquam eget laoreet mauris dignissim. In sit amet leo non odio molestie ultricies vitae eu enim. In ut turpis nulla. Phasellus porta tellus a mauris hendrerit semper. Nam eu urna nulla. Proin purus est, adipiscing ut laoreet id, elementum sit amet magna. Nunc commodo fermentum nisl et adipiscing. Sed cursus ultrices eros, at aliquam leo tristique vitae. Cras sit amet vestibulum urna. Mauris ultrices felis a ante gravida suscipit. Pellentesque sit amet lacus mi, eget sollicitudin tortor. Etiam sit amet mauris faucibus elit tempor rhoncus id sit amet felis. Vestibulum vel ante est. Morbi et libero sem, vel congue arcu. </p>\r\n	  </td>\r\n	</tr>\r\n  </table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\"></td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>','2011-06-24','terms_&_onditions'),
(22,'User License Agreement','User License Agreement','User License Agreement','<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\r\n\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n	<tr>\r\n	  <td height=\"37\" align=\"left\" valign=\"top\" class=\"Trebuchet_27_c60000\">User License Agreement</td>\r\n	</tr>\r\n	<tr>\r\n	  <td align=\"left\" valign=\"top\" bgcolor=\"#B1B0AC\" class=\"arial_20_c40306\">\r\n		<img src=\"images/trans.gif\" width=\"1\" height=\"1\" alt=\"\">\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td align=\"left\" valign=\"top\" style=\"padding: 20px 0px 15px;\">\r\n	  <p class=\"arial_12_000\"><strong>This OUR VOICES Ltd. (herafter VOICES) Internet Product</strong> User License Agreement governs your use of and access to the <strong>VOICES Internet Product</strong> via the Internet. \r\n	  Your use of the Product is deemed acceptance of the terms and conditions herein. \r\n	  If you do not accept these terms and conditions do not access or use the Product.</p>\r\n	  <p class=\"arial_12_000\"><strong>Section 1.</strong> Grant of License. VOICES grants to User the nonexclusive right to use the information\r\nand tools accessed via VOICES Internet and available in any VOICES Internet product (\"Content\")\r\nin accordance with this Agreement and any user documentation provided online. Only an\r\nindividual to whom VOICES has assigned an individual USER ID and password may access the\r\nContent. In no event may User offer the use of any VOICES Internet product as a part of a service\r\nbureau, time-sharing, or other similar arrangement.</p>\r\n<p class=\"arial_12_000\">Content is provided to the User for the personal use of the User and not for re-sale. Content may\r\nbe used only for the purpose of User\'s political views on legislation proposed in the U.S., and for\r\nexpressing User\'s views on matters politic, and on candidates and individuals in the U.S., that\r\neffect matters, and relating to the well being of America.</p>\r\n<p class=\"arial_12_000\">User acknowledges that the Content constitutes valuable and proprietary property of VOICES or of\r\nthird parties who have contributed Content (\"Providers\"). If User wishes to use the Content in any\r\nmanner not expressly permitted by this Agreement, User may request permission from VOICES by\r\ngiving to VOICES a written description of the intended use and such other information as VOICES\r\nmay request. Only an authorized representative of VOICES may grant such permission. The\r\ngranting of such a request may entail an additional fee payable by User.</p>\r\n<p class=\"arial_12_000\">User acknowledges that the Content posted on USER and AFFILIATE PAGES IS PLACED\r\nTHERE BY USERS AND AFFILIATES AND THAT VOICES IS IN NO WAY RESPONSIBLE FOR\r\nSUCH CONTENT, AND USER AGREES;</p>\r\n<ol class=\"arial_12_000\">\r\n<li><strong>That they understand that the content provided is solely placed there by the\r\naffiliate.</strong></li>\r\n<li><strong>That the affiliate has agreed to abide by the rules of ethical behavior and that\r\nVOICES provides only a technology platform and is not responsible for the content.</strong></li>\r\n<li><strong>Further, if USER has an issue with something that USER WILL take it up with\r\nthe author of the material and notify VOICES.</strong></li>\r\n<li><strong>any interaction between USER and an affiliate for the purpose of contributing\r\nmoney or donation is strictly between the end user and the affiliate.</strong></li>\r\n<li><strong>VOICES does not certify that the organization is a 501(C)3 or that the donation\r\nwill be used in a manner represented or expected by the donor.</strong></li>\r\n</ol>\r\n<p class=\"arial_12_000\"><strong>Section 2.</strong> USER ID and Password Protection. User shall maintain as personal and confidential the\r\nVOICES-assigned unique USER ID and password. User is prohibited from transferring or sharing\r\nthe VOICES-assigned unique USER ID and from revealing the activating password to any\r\nunauthorized person. Any violation of the forgoing shall result in an immediate termination of such\r\nuser\'s access rights to any VOICES Internet product as well as liability to VOICES for all damages\r\nresulting from such breach. It is User\'s sole responsibility to protect the USER ID and activating\r\npassword from unauthorized use. User will be responsible for any charges to User\'s USER ID\r\nexcept when due to VOICES.; USER acknowledges that when USER signs a Petiton they becaome a\r\nVOICES Observer, and have the right to view all content on VOICES website, at no charge and VOICES\r\nhas the right to inform USER of all changes on VOICES website, as well as other information VOICES\r\ndeems appropriate.</p>\r\n<p class=\"arial_12_000\"><strong>Section 3.</strong> VOICES Reservation of Rights. VOICES and its Providers reserve all rights not\r\nexpressly granted to the User, including, but not limited to the right to alter, modify, update,\r\nenhance or improve the Content.\r\n<p class=\"arial_12_000\"><strong>Section 4.</strong> Term and Termination. This Agreement is effective until terminated. This Agreement\r\nshall be effective for a period of one year (\"Initial Year\") and shall automatically renew for\r\nsuccessive years (\"Additional Years\") at the fee then in effect for the option selected by the User,\r\nunless terminated as set forth herein. If assignment of the first USER ID and password by VOICES\r\nto User occurs on the 15th of the month or earlier, the Initial Year shall commence upon the first\r\nday of such month and shall continue for twelve full calendar months thereafter. If assignment of\r\nthe first USER ID and password by VOICES to User occurs on or after the 16th of the month, the\r\nInitial Year shall commence on the first day of the month following such assignment and continue\r\nthereafter for twelve full calendar months. Commencement of an Additional Year shall occur upon\r\nthe expiration of the twelve-month period established for the Initial Year. Either party shall have\r\nthe right to terminate the Agreement prior to any Additional Year upon 30 days\' prior written\r\nnotice.</p>\r\n<p class=\"arial_12_000\">This Agreement will terminate automatically without any prior notice from VOICES if User violates\r\nSections 1 or 2 of this Agreement. This Agreement may be terminated by VOICES upon prior\r\nwritten notice if User fails to comply with any other provision of this Agreement and fails to\r\nremedy such failure within thirty (30) of the date of such written notice. Upon termination, User\r\nshall no longer be permitted access to any VOICES Internet product and each User USER ID shall\r\nbe deactivated. Termination for any of the foregoing shall not affect VOICES\'s entitlement to any\r\nsums due hereunder, and User shall not be entitled to any refund of any portion of the fees paid.</p>\r\n<p class=\"arial_12_000\"><strong>Section 5.</strong> VOICES WARRANTY AND INDEMNITY. VOICES REPRESENTS AND WARRANTS TO\r\nUSER THAT VOICES HAS THE RIGHT TO GRANT THE LICENSES GRANTED HEREUNDER AND THAT\r\nUSER\'S USE OF THE CONTENT IN ACCORDANCE WITH THE TERMS AND CONDITIONS OF THIS\r\nAGREEMENT DOES NOT AND SHALL NOT VIOLATE THE INTELLECTUAL PROPERTY RIGHTS OF ANY\r\nTHIRD PARTY.</p>\r\n<p class=\"arial_12_000\"><strong>Section 6.</strong> Indemnification by User. Except with respect to third party claims of intellectual\r\nproperty infringement for which VOICES has assumed responsibility under the foregoing Section\r\n5, User shall defend, indemnify, and hold harmless VOICES and its Providers from and against any\r\nand all other claims, actions, causes of action, liabilities, damages, costs and expenses, including\r\nreasonable attorneys\' fees arising out of or related to claims or actions brought or made by third\r\nparties against VOICES or any of its Providers as a result of User\'s use or application of the\r\nContent.</p>\r\n<p class=\"arial_12_000\"><strong>Section 7.</strong> Copyright. The VOICES Internet product line is the valuable, confidential, copyrighted\r\nand trade secret property of VOICES or its Providers who have contributed thereto. As between\r\nVOICES and the User, VOICES owns all right, title and interest in and to any and all VOICES\r\nInternet products, including without limitation, all ancillary and interface software, all current and\r\nfuture enhancements, modifications, revisions, new releases and updates thereof and any\r\nderivative works based thereon and all documentation thereto, all copyrights, trade secrets and\r\npatents therein. Except as expressly permitted hereby, copying of any portion of any VOICES\r\nInternet product is prohibited.\r\nUser may make printouts of Content retrieved from any VOICES Internet product to the extent\r\npermitted under the \"fair use\" provisions of the Copyright Act of 1976 (17 U.S.C. Sec. 107), or\r\nmay download and store insubstantial portions of Content (in machine-readable form), so long as\r\nsuch downloading is consistent with the purposes authorized by this Agreement. User shall comply\r\nwith all applicable conventions regarding copyright and source of material attribution.</p>\r\n<p class=\"arial_12_000\"><strong>Section 8.</strong> USER RESPONSIBILITY. THE USER ASSUMES ALL RESPONSIBILITIES AND\r\nOBLIGATIONS WITH RESPECT TO THE SELECTION OF THE PARTICULAR VOICES INTERNET\r\nPRODUCT TO ACHIEVE USER\'S INTENDED RESULTS. USER ASSUMES ALL RESPONSIBILITIES AND\r\nOBLIGATIONS WITH RESPECT TO ANY DECISIONS OR ADVICE MADE OR GIVEN AS A RESULT OF\r\nTHE USE OR APPLICATION OF USER\'S SELECTED VOICES INTERNET PRODUCT OR ANY CONTENT\r\nRETRIEVED THEREFROM, INCLUDING THOSE TO ANY THIRD PARTY, FOR THE CONTENT,\r\nACCURACY, AND REVIEW OF SUCH RESULTS.\r\nVOICES AND ITS PROVIDERS ARE NOT ENGAGED IN RENDERING LEGAL OR OTHER\r\nPROFESSIONAL SERVICES. IF LEGAL OR OTHER EXPERT ASSISTANCE IS REQUIRED, THE\r\nSERVICES OF A COMPETENT PROFESSIONAL SHOULD BE SOUGHT.</p>\r\n<p class=\"arial_12_000\"><strong>Section 9.</strong> DISCLAIMER OF WARRANTY. CONTENT SELECTED BY USER IS PROVIDED \"AS IS\" AND\r\nVOICES AND ITS PROVIDERS MAKE NO WARRANTY AS TO ITS USE, ACCURACY, AVAILABILITY,\r\nTIMELINESS, OR COMPLETENESS. VOICES AND ITS PROVIDERS DO NOT AND CANNOT WARRANT\r\nUSER\'S RESULTS OR THAT ANY SELECTED VOICES INTERNET PRODUCT WILL BE DELIVERED\r\nUNINTERRUPTED OR ERROR FREE. EXCEPT AS PROVIDED UNDER SECTION 5, ABOVE, VOICES\r\nAND ITS PROVIDERS MAKE NO OTHER WARRANTIES, EXPRESS OR IMPLIED, INCLUDING THE\r\nWARRANTY AS TO PERFORMANCE, MERCHANTABILITY OR FITNESS FOR ANY PARTICULAR\r\nPURPOSE.\r\n<p class=\"arial_12_000\"><strong>Section 10.</strong> Limitation of VOICES\' Liability. In no event will VOICES or its Providers be liable to\r\nUser whether in contract, tort or otherwise, for any loss, liability, cost, damage or other injury of\r\nany kind whatsoever, including any consequential, incidental or special damages, including any\r\nlost profits or lost savings, even if VOICES or its Providers have been advised of the possibility of\r\nsuch damages. In addition, VOICES and its Providers shall not be liable for any claim by any third\r\nparty except when such claim is based upon infringement of its intellectual property rights. In\r\naddition, the limitation of liability shall not apply to limit the expenses or costs that may be\r\ndirectly incurred by User and reimbursable by VOICES in accordance with the obligations of\r\nVOICES under Section 5 above. IN ALL OTHER RESPECTS, VOICES\' AND ITS PROVIDERS\' ENTIRE\r\nLIABILITY AND USER\'S SOLE AND EXCLUSIVE REMEDY FOR ANY AND ALL OTHER CAUSES, AND\r\nREGARDLESS OF THE FORM OF ACTION, INCLUDING NEGLIGENCE, SHALL NOT EXCEED THE FEES\r\nPAID FOR THE SERVICE OR ACTIVITY THAT IS PRINCIPALLY ALLEGED TO GIVE RISE TO SUCH\r\nLIABILITY.\r\n<p class=\"arial_12_000\"><strong>Section 11.</strong> Force Majeure. Performance of VOICES hereunder is subject to interruption and delay\r\ndue to causes beyond its reasonable control such as acts of God, acts of any government, war or\r\nother hostilities, the elements, fire, explosion, power failure, telecommunications failure, industrial\r\nor labor dispute, inability to obtain supplies and the like, or breakdown of equipment or any other\r\ncauses beyond VOICES\'s control.\r\n<p class=\"arial_12_000\"><strong>Section 12.</strong> General. This Agreement will be governed by the laws of the State of New York,\r\nexcluding the application of its conflicts of law rules. The United Nations Convention on Contracts\r\nwill not govern this Agreement, the application of which is expressly excluded. No action arising\r\nunder this Agreement may be brought by either party more than one year after the cause of\r\naction has accrued. The exclusive jurisdiction for any action arising under this Agreement shall be\r\nthe Federal and State Courts located in Albany County, State of New York.</p>\r\n<p class=\"arial_12_000\">Any notice required under this Agreement shall be effective upon mailing by certified mail, return\r\nreceipt requested, or via facsimile transmission sent to the address or facsimile telephone number\r\nof the respective party.</p>\r\n<p class=\"arial_12_000\">If any part of this Agreement is found void and unenforceable, it will not affect the validity of the\r\nbalance of the Agreement, which shall remain valid and enforceable according to its terms. This\r\nAgreement may only be modified in writing signed by an authorized representative of VOICES.\r\nThe provisions of this Agreement shall operate for the benefit of, and may be enforced by, any\r\nProvider.</p>\r\n	  </td>\r\n	</tr>\r\n  </table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\"></td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>','2011-06-24','user_license_agreeme');

/*Table structure for table `tbl_payment_success` */

DROP TABLE IF EXISTS `tbl_payment_success`;

CREATE TABLE `tbl_payment_success` (
  `id` int(11) NOT NULL auto_increment,
  `member_id` int(11) default NULL,
  `affiliate_id` int(11) default NULL,
  `amount` float(10,2) default NULL,
  `date` date default NULL,
  `item_name` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_payment_success` */

insert into `tbl_payment_success` values 
(3,173,1,100.00,'2011-12-25','membersubscription');

/*Table structure for table `tbl_petition_alert_notification` */

DROP TABLE IF EXISTS `tbl_petition_alert_notification`;

CREATE TABLE `tbl_petition_alert_notification` (
  `subscriber_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_petition_alert_notification` */

/*Table structure for table `tbl_petition_notification_detail` */

DROP TABLE IF EXISTS `tbl_petition_notification_detail`;

CREATE TABLE `tbl_petition_notification_detail` (
  `id` int(11) NOT NULL auto_increment,
  `article_id` int(11) default NULL,
  `email` varchar(200) default NULL,
  `member_id` varchar(255) default NULL,
  `member_type` enum('affiliate','elected_official') default NULL,
  `filename` varchar(200) default NULL,
  `mail_sent` tinyint(3) default '0',
  `name` varchar(200) default NULL,
  `article_title` varchar(200) default NULL,
  `date_sent` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_petition_notification_detail` */

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
(1,206,'S','2011000','US'),
(2,206,'S','2011000','US'),
(3,206,'S','2011000','US');

/*Table structure for table `tbl_subscriber` */

DROP TABLE IF EXISTS `tbl_subscriber`;

CREATE TABLE `tbl_subscriber` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `subscriber_id` int(11) NOT NULL,
  `mail_street_address` varchar(200) default NULL,
  `mail_city` varchar(200) default NULL,
  `mail_state` varchar(200) default NULL,
  `mail_zip_code` varchar(10) default NULL,
  `mail_country` varchar(200) default 'USA',
  `is_billing` tinyint(1) default '0',
  `bill_street_address` varchar(200) default NULL,
  `bill_city` varchar(200) default NULL,
  `bill_state` varchar(200) default NULL,
  `bill_zip_code` varchar(10) default NULL,
  `bill_country` varchar(200) default 'USA',
  `prim_affiliate_id` int(11) default NULL,
  `secondary_affiliates` varchar(100) default NULL,
  `is_address_changed` enum('yes','no') default 'yes',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbl_subscriber` */

insert into `tbl_subscriber` values 
(7,171,'70 Romeyn Ave','Amsterdam','NY','12010','USA',0,'70 Romeyn Ave','Amsterdam','NY','12010','USA',1,'175','no'),
(9,173,'70 Romeyn Ave','Amsterdam','NY','12010','USA',0,'70 Romeyn Ave','Amsterdam','NY','12010','USA',1,'175','no');

/*Table structure for table `tbl_subscriber_comment_aff_article` */

DROP TABLE IF EXISTS `tbl_subscriber_comment_aff_article`;

CREATE TABLE `tbl_subscriber_comment_aff_article` (
  `id` int(11) NOT NULL auto_increment,
  `article_id` int(11) default NULL,
  `subscriber_id` int(11) default NULL,
  `subscriber_comment` text,
  `comment_made_on` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_subscriber_comment_aff_article` */

insert into `tbl_subscriber_comment_aff_article` values 
(12,4,173,'','2011-12-27 10:44:33');

/*Table structure for table `tbl_subscriber_comment_er_article` */

DROP TABLE IF EXISTS `tbl_subscriber_comment_er_article`;

CREATE TABLE `tbl_subscriber_comment_er_article` (
  `article_id` int(11) default NULL,
  `subscriber_id` int(11) default NULL,
  `subscriber_comment` text,
  `subscriber_opinion` enum('support','oppose','no_opinion') default 'support'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_subscriber_comment_er_article` */

insert into `tbl_subscriber_comment_er_article` values 
(2,173,'sdfsd fdsa fsdf dsaf sdaf dsaf sda','support'),
(2,173,'asdas das dasdasdasd as','support');

/*Table structure for table `tbl_subscriber_elected_officer` */

DROP TABLE IF EXISTS `tbl_subscriber_elected_officer`;

CREATE TABLE `tbl_subscriber_elected_officer` (
  `subscriber_id` int(11) default NULL,
  `ElectedOfficialID` varchar(255) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbl_subscriber_elected_officer` */

insert into `tbl_subscriber_elected_officer` values 
(171,'5e9bdd9b-4d8f-4bab-ac88-08812f7cdf8a'),
(171,'f7bf118e-d1e8-4c3c-873c-1de6fb111966'),
(171,'41d47c9b-0e95-446a-9017-99c7588eb83d'),
(171,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(171,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(171,'3b31b633-7516-4b46-b014-88d6b4772373'),
(171,'4f422448-e118-4604-a4ea-1643d277b669'),
(171,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(171,'4f166531-713c-4f93-97c9-14233be0a695'),
(171,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(173,'5e9bdd9b-4d8f-4bab-ac88-08812f7cdf8a'),
(173,'f7bf118e-d1e8-4c3c-873c-1de6fb111966'),
(173,'41d47c9b-0e95-446a-9017-99c7588eb83d'),
(173,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(173,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(173,'3b31b633-7516-4b46-b014-88d6b4772373'),
(173,'4f422448-e118-4604-a4ea-1643d277b669'),
(173,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(173,'4f166531-713c-4f93-97c9-14233be0a695'),
(173,'f36fe606-c94c-422c-82ed-6ac38f8c2be7');

/*Table structure for table `tbl_temp_payment_check` */

DROP TABLE IF EXISTS `tbl_temp_payment_check`;

CREATE TABLE `tbl_temp_payment_check` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `hashkey` varchar(255) default NULL,
  `user_type` varchar(255) default NULL,
  `status` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_temp_payment_check` */

/*Table structure for table `tbl_usergroups` */

DROP TABLE IF EXISTS `tbl_usergroups`;

CREATE TABLE `tbl_usergroups` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `promo_code` varchar(50) default NULL,
  `subscription_price` float(10,2) default NULL,
  `assigned_affiliates` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_usergroups` */

insert into `tbl_usergroups` values 
(1,'administrator','',0.00,NULL),
(2,'affiliate','',0.00,''),
(3,'subscriber','',100.00,''),
(4,'observer','',0.00,NULL),
(11,'elected_official','',0.00,'');

/*Table structure for table `tbl_vote_alert_notification` */

DROP TABLE IF EXISTS `tbl_vote_alert_notification`;

CREATE TABLE `tbl_vote_alert_notification` (
  `subscriber_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_vote_alert_notification` */

insert into `tbl_vote_alert_notification` values 
(173,2),
(171,2);

/*Table structure for table `tbl_vote_status` */

DROP TABLE IF EXISTS `tbl_vote_status`;

CREATE TABLE `tbl_vote_status` (
  `id` int(11) NOT NULL auto_increment,
  `affiliate_article_id` int(11) default NULL,
  `member_id` int(11) default NULL,
  `status` enum('support','oppose') default NULL,
  `date` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_vote_status` */

insert into `tbl_vote_status` values 
(3,2,173,'support','2011-12-25'),
(4,3,173,'support','2011-12-27');
