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

DROP TABLE IF EXISTS `tbl_accessions`;

CREATE TABLE `tbl_accessions` (
  `id` int(9) NOT NULL auto_increment,
  `content_id` int(9) default NULL,
  `usergroup_id` int(9) default NULL,
  `capability_id` int(9) default NULL,
  `permission` enum('Y','N','N/A') default 'N/A',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1109 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_accessions` */

insert into `tbl_accessions` values 
(1078,2,21,1,'Y'),
(1077,4,21,1,'Y'),
(1108,9,2,3,'Y'),
(735,2,2,1,'Y'),
(1106,10,3,9,'Y'),
(1067,17,21,1,'N'),
(704,17,3,1,'N'),
(703,16,3,1,'Y'),
(1084,14,22,1,'Y'),
(701,14,3,1,'Y'),
(1083,16,22,1,'Y'),
(699,12,3,1,'Y'),
(1105,4,3,12,'Y'),
(697,10,3,1,'Y'),
(696,9,3,12,'Y'),
(1048,4,11,2,'Y'),
(694,9,3,1,'Y'),
(693,8,3,1,'Y'),
(692,7,3,1,'Y'),
(1104,4,11,16,'Y'),
(1103,5,11,16,'Y'),
(689,5,3,1,'Y'),
(688,4,3,1,'Y'),
(1102,10,2,3,'Y'),
(742,2,3,1,'Y'),
(684,1,3,1,'Y'),
(1068,16,21,1,'Y'),
(1070,12,21,1,'Y'),
(1085,12,22,1,'Y'),
(1071,10,21,1,'Y'),
(1069,14,21,1,'Y'),
(1072,9,21,12,'Y'),
(1079,1,21,1,'Y'),
(1073,9,21,1,'Y'),
(672,16,2,1,'Y'),
(1050,12,2,3,'Y'),
(670,14,2,1,'Y'),
(1086,10,22,1,'Y'),
(1101,8,2,3,'Y'),
(1049,5,11,2,'Y'),
(1052,5,3,9,'Y'),
(1100,10,2,16,'Y'),
(647,10,2,2,'Y'),
(646,9,2,2,'Y'),
(645,8,2,2,'Y'),
(644,12,2,1,'Y'),
(1099,8,2,16,'Y'),
(642,10,2,1,'Y'),
(641,9,2,1,'Y'),
(1045,8,2,1,'Y'),
(1046,8,3,9,'Y'),
(737,1,2,1,'Y'),
(1076,5,21,1,'Y'),
(1075,7,21,1,'Y'),
(1074,8,21,1,'Y'),
(1097,5,11,3,'Y'),
(1066,5,4,9,'N'),
(1065,8,4,9,'N'),
(1064,14,4,1,'Y'),
(1063,16,4,1,'Y'),
(1096,8,22,9,'Y'),
(1062,12,4,1,'Y'),
(729,17,2,1,'N'),
(1061,10,4,1,'Y'),
(1081,8,21,9,'Y'),
(1060,9,4,1,'Y'),
(1082,17,22,1,'N'),
(1059,8,4,1,'Y'),
(1058,7,4,1,'Y'),
(1057,5,4,1,'Y'),
(1056,4,4,1,'Y'),
(1055,2,4,1,'Y'),
(1095,5,22,9,'Y'),
(1094,1,22,1,'Y'),
(769,17,11,1,'N'),
(770,16,11,1,'Y'),
(1087,9,22,12,'Y'),
(772,14,11,1,'Y'),
(1088,9,22,1,'Y'),
(1080,5,21,9,'Y'),
(1093,2,22,1,'Y'),
(781,7,11,1,'Y'),
(1092,4,22,1,'Y'),
(1091,5,22,1,'Y'),
(784,5,11,1,'Y'),
(785,4,11,1,'Y'),
(1090,7,22,1,'Y'),
(788,2,11,1,'Y'),
(789,1,11,1,'Y'),
(1054,1,4,1,'Y'),
(1089,8,22,1,'Y'),
(1053,9,4,12,'N');

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
  `promo_code` varchar(50) default NULL,
  `banner` varchar(100) default NULL,
  `organisation_website` varchar(150) default NULL,
  `street_address` varchar(150) default NULL,
  `city` varchar(100) default NULL,
  `state` varchar(100) default NULL,
  `zip_code` varchar(10) default NULL,
  `country` varchar(100) default NULL,
  `donation_url` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_affiliate` */

insert into `tbl_affiliate` values 
(1,1,'This is default Affiliate ceareted by system as','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo turpis, ultrices eget facilisis a, ultrices at ipsum. In lacinia justo massa. Suspendisse dictum scelerisque sem non volutpat. Donec condimentum blandit massa in consectetur. In non urna purus, in congue nisl. Morbi congue bibendum diam non luctus. Morbi eu metus et ipsum venenatis rutrum. Etiam in leo at leo porta tincidunt. Vivamus accumsan nisl sed lectus gravida vel lacinia orci auctor. Cras laoreet elit sed diam hendrerit consectetur. Suspendisse fringilla aliquet ligula, vitae faucibus magna pulvinar eu. Morbi feugiat volutpat mi quis vestibulum. Praesent ac auctor sem. Vestibulum ac ornare augue.','qwerty',NULL,'1_organisation_banner.jpg','http://www.google.com','asdfs fsda fasd asd asd asd','City','State','12010','Country','http://www.google.com'),
(26,179,'onemore affiliate organisation','Upload a banner(jpg/gif/jpeg) containing organisation logo up to 900px wide and 250px high, max size 5MB','13hJMa87Sb179',NULL,'179_organisation_banner.jpg','http://www.google.com','IT park','Chandigarh','Chandigarh','190000','India',NULL),
(24,175,'Other affiliate organisation','This organization is for common people cause. This organization is for common people cause.','1B3xf26489175',NULL,'175_organisation_banner.jpg','http://www.google.com','70 Romeyn Ave','Amsterdam','NY','121121','USA',NULL),
(25,177,'Deleted affiliated organisation','Upload a banner(jpg/gif/jpeg) containing organisation logo up to 900px wide and 250px high, max size 5MB.','40gkn12496177',NULL,'177_organisation_banner.jpg','http://www.google.com','IT park','Chandigarh','Chandigarh','190000','India',NULL),
(28,193,'org','profile','JHE9BAh28M193','PRM41hiG571X2','193_organisation_banner.jpg','http://asd.com','address','city','state','234','United Kingdom',NULL),
(29,195,'Google','PTI India has strongly &quot;objected&quot; to the remark on the Golden Temple by popular US television host Jay Leno, terming it &quot;quite unfortunate&quot;.PTI India has strongly &quot;objected&quot; to the remark on the Golden Temple by popular US television host Jay Leno, terming it &quot;quite unfortunate&quot;.','5ad3B3267G195','PRMmr8g57cq95','195_organisation_banner.jpg','http://yahoo.com','68 Romeyn Ave','Amsterdam','NY','14234','NY',''),
(30,196,'yahoo','fff','c128o2U494196','PRMIpA77H7aI7',NULL,'http://www.google.com','test','e','e','34444','e',NULL),
(31,200,'Netsmartz','If status of parent ticket is changed to closed, child tickets associated with it will also close, and ticket close cause will also be escalated to all child tickets. Survey form will be sent to its customer once his ticket is closed','c1Q9Wz7qbH200','PRMS67LR396iN',NULL,'http://google.com','test','test','test','12233','test',NULL),
(32,207,'Rep of People','Organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile organisation profile ','99k727IRc8207','PRMGQ74G11h8A','207_organisation_banner.jpg','http://google.com','address','city','state','234','United Kingdom',NULL),
(33,209,'default organisation','profile','r4i6t9xWq1209','PRMt7HRz0750H','209_organisation_banner.gif','http://www.google.com','Flaani Street, Timkani County','aasa','ASs','160104','US',NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_affiliate_articles` */

insert into `tbl_affiliate_articles` values 
(2,1,'New bill added for dev final testing',480,'HR',NULL,'2011-12-25','0000-00-00','yes','2_article_attachement.pdf','New bill added for dev final testing, New bill added for dev final testing, New bill added for dev final testing.','2011-12-25','support','bill',NULL,NULL,'no',NULL,NULL,0,''),
(3,1,'New bill added for dev final testing for vote alert',1210,'HR',NULL,'2011-12-25','0000-00-00','yes','3_article_attachement.pdf','New bill added for dev final testing for vote alert','2011-12-25','support','bill',NULL,NULL,'no',NULL,NULL,0,''),
(4,1,'Test news from walmart  for testing file upload123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Test news from walmart  for testing file upload123','2011-12-27',NULL,'news',NULL,NULL,'no',NULL,NULL,0,NULL),
(5,175,'asdasd as dasdasd',0,'',NULL,'2011-12-27','2011-12-29','yes',NULL,'sad asdas  dasd','2011-12-27','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(6,175,'as dasd as das das d',0,'',NULL,'2011-12-27','2011-12-31','yes',NULL,'as das dad asd asd asd asd as d','2011-12-27','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(7,175,'Test news from walmart added by another affiliated',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Test news from walmart Test news from walmart added by another affiliated','2011-12-27',NULL,'news',NULL,NULL,'no',NULL,NULL,0,NULL),
(8,175,'Test bulletine by  from walmart added by another affiliated',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Test bulletine by  from walmart added by another affiliated','2011-12-27',NULL,'bulletin',NULL,NULL,'no',NULL,NULL,0,NULL),
(9,1,'test petition for testing',0,'',NULL,'2011-12-27','2011-12-30','yes',NULL,'test petition for testing','2011-12-27','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(10,1,'Petition1',0,'',NULL,'2011-12-28','2011-12-30','yes',NULL,'Petition1','2011-12-28','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(11,1,'Petition2',0,'',NULL,'2011-12-28','2011-12-30','yes',NULL,'Petition2','2011-12-28','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(12,1,'Petition3',0,'',NULL,'2011-12-28','2011-12-29','yes',NULL,'Petition3','2011-12-28','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(13,1,'Petition4',0,'',NULL,'2011-12-28','2011-12-30','yes',NULL,'Petition4','2011-12-28','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(14,1,'Petition5',0,'',NULL,'2011-12-28','2011-12-30','yes',NULL,'Petition5','2011-12-28','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(64,1,'Test Bulletins 2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'this is for testing.','2012-01-27',NULL,'bulletin',NULL,NULL,'no',NULL,NULL,0,NULL),
(65,1,'Test Bulletins 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'this is for testing.','2012-01-27',NULL,'bulletin',NULL,NULL,'no',NULL,NULL,0,NULL),
(66,1,'Test Bulletins 48',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'this is for testing.hjgyj','2012-01-27',NULL,'bulletin',NULL,NULL,'no',NULL,NULL,0,NULL),
(67,1,'news123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'kjkkljkl','2012-01-27',NULL,'news',NULL,NULL,'no',NULL,NULL,0,NULL),
(68,1,'bulletins 123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sufsdfkjs hdjfhjk','2012-01-27',NULL,'bulletin',NULL,NULL,'no',NULL,NULL,0,NULL),
(69,1,'Pan test new',0,'',NULL,'2012-01-27','2012-01-31','yes',NULL,'this is for testing','2012-01-27','','petition',NULL,NULL,'no',NULL,NULL,0,'Federal'),
(70,1,'Pan test petetion new',0,'',NULL,'2012-01-27','2012-01-31','yes',NULL,'this is for testing','2012-01-27','','petition',NULL,NULL,'no',NULL,NULL,0,'Federal'),
(27,1,'New bill added for &#039;dev final&#039; testing',0,'',NULL,'2011-12-29','2011-12-31','yes',NULL,'PYONGYANG, North Korea (AP) &acirc;€” North Korea prepared for another day of mourning Thursday for late leader Kim Jong Il after an emotionally charged funeral that left millions of people wailing in grief in a ceremony that cemented his youngest son as his successor.\r\n\r\nKim Jong Un, the country&#039;s next leader, was head mourner Wednesday on a bitter, snowy day in Pyongyang, walking with one hand on the black hearse that carried his father&#039;s coffin on its roof, his other hand raised in salute, his head bowed against the wind.\r\n\r\nAt the end of the 2 1/2-hour procession, rifles fired 21 times as Kim Jong Un stood flanked by the top party and military officials who are expected to be his inner circle of advisers. Kim then saluted again as goose-stepping soldiers carrying flags and rifles marched by.\r\n\r\nAlthough analysts say Kim Jong Un is on the path toward cementing his power and all moves in North Korea so far point in that direction &acirc;€” from titles giving him power over the ruling party and military and his leading position in the funeral procession &acirc;€” his age and inexperience leave questions about his long-term prospects. Whereas his father was groomed for power for 20 years before taking over, the younger Kim has had only about two years.','2011-12-29','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(29,1,'new petition',0,'',NULL,'2012-01-02','2012-01-18','yes',NULL,'summary contents','2012-01-02','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(30,1,'bill',1209,'HR',NULL,'0000-00-00','0000-00-00','no',NULL,'fdgdfgdf g','2012-01-03','oppose','bill',NULL,NULL,'no',NULL,NULL,0,''),
(31,1,'Base Minimum Wage for Tipped Employees',631,'HR',NULL,'2012-01-05','0000-00-00','yes','31_article_attachement.pdf','Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees Base Minimum Wage for Tipped Employees','2012-01-05','support','bill',NULL,NULL,'no',NULL,NULL,0,''),
(32,1,'petition newest',0,'','','2012-01-09','2012-01-09','yes','32_article_attachement.pdf','summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary summary','2012-01-09','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(34,1,'p1',0,'',NULL,'2012-01-09','2012-01-09','yes',NULL,'summary comments summary comments summary comments summary comments summary comments summary comments summary comments summary comments summary comments summary comments summary comments summary comments summary comments','2012-01-09','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(40,1,'p2',0,'',NULL,'2012-01-10','2012-01-10','yes',NULL,'summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents','2012-01-10','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(49,1,'petition XXIIV testttttttttttttttt',0,'',NULL,'2012-01-11','2012-01-12','yes',NULL,'summary comments summary comments summary comments summary comments summary comments summary comments \r\nsummary comments summary comments summary comments summary comments \r\nsummary comments summary comments','2012-01-11','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(50,1,'petition newest XII',0,'',NULL,'2012-01-11','2012-01-11','yes',NULL,'summary contents','2012-01-11','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(51,1,'petition upto jan last',0,'',NULL,'2012-01-13','2012-01-31','yes','51_article_attachement.pdf','summary comments','2012-01-13','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(53,195,'India objects to Jay Leno&#039;s remark on Golden Temple',0,'',NULL,'2012-01-23','2012-02-05','yes',NULL,'PTI India has strongly &quot;objected&quot; to the remark on the Golden Temple by popular US television host Jay Leno, terming it &quot;quite unfortunate&quot;.','2012-01-23','','petition',NULL,NULL,'no',NULL,NULL,0,'Federal'),
(54,195,'Uttar Pradesh NRHM scam: Key accused commits suicide',745,'HR',NULL,'2012-01-23','0000-00-00','yes',NULL,'A key accused in Uttar Pradesh&#039;s National Rural Health Mission (NRHM) scam has allegedly committed suicide by shooting himself dead, the police have said.','2012-01-23','support','bill',NULL,NULL,'no',NULL,NULL,0,''),
(55,200,'13/7 Mumbai blasts case cracked, 2 from Bihar arrested: ATS',0,'',NULL,'2012-01-23','2012-01-28','yes',NULL,'Maharashtra ATS on Monday claimed to have made a major breakthrough in the July 13 triple blasts in the city last year that claimed 27 lives, with the arrest of two of the accused hailing from Bihar.','2012-01-23','','petition',NULL,NULL,'no',NULL,NULL,0,'Federal'),
(56,195,'Shoe thrown at Rahul Gandhi in Uttarakhand',0,'',NULL,'2012-01-23','2012-02-03','yes',NULL,'Vikasnagar, Uttarakhand: A shoe was thrown at Congress general secretary Rahul Gandhi while he was addressing a rally in Vikasnagar in Uttarakhand today.','2012-01-23','','petition',NULL,NULL,'no',NULL,NULL,0,'State'),
(57,207,'rep of people petition',0,'',NULL,'2012-01-23','2012-01-25','yes','57_article_attachement.pdf','Summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents summary contents','2012-01-23','','petition',NULL,NULL,'no',NULL,NULL,0,'Federal'),
(58,209,'petition 123',0,'',NULL,'2012-01-23','2012-01-31','yes',NULL,'summary contents','2012-01-23','','petition',NULL,NULL,'no',NULL,NULL,0,'Federal'),
(60,0,'news1g hgfh',0,'',NULL,'0000-00-00','0000-00-00','',NULL,'summary content hhfgh','0000-00-00','','',NULL,NULL,'no',NULL,NULL,0,''),
(61,0,'news1 3333',0,'',NULL,'0000-00-00','0000-00-00','',NULL,'summary content3 34343','0000-00-00','','',NULL,NULL,'no',NULL,NULL,0,'');

/*Table structure for table `tbl_bill_authors` */

DROP TABLE IF EXISTS `tbl_bill_authors`;

CREATE TABLE `tbl_bill_authors` (
  `bill_author_id` int(11) NOT NULL auto_increment,
  `bill_id` int(11) default NULL,
  `bill_author_name` varchar(50) default NULL,
  `bill_author_party` varchar(10) default NULL,
  `bill_author_house` varchar(10) default NULL,
  PRIMARY KEY  (`bill_author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=338 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bill_authors` */

insert into `tbl_bill_authors` values 
(1,1,'Boehner','R','H'),
(2,2,'Boehner','R','H'),
(3,3,'Boehner','R','H'),
(4,4,'Young D','R','H'),
(5,5,'Waters','D','H'),
(6,6,'Boehner','R','H'),
(7,7,'Gingrey','R','H'),
(8,8,'Pitts','R','H'),
(9,9,'Boehner','R','H'),
(10,10,'Miller Ge','D','H'),
(11,11,'Hirono','D','H'),
(12,12,'Grijalva','D','H'),
(13,13,'Harper','R','H'),
(14,14,'Baca','D','H'),
(15,15,'Edwards D','D','H'),
(16,16,'Towns','D','H'),
(17,17,'Hirono','D','H'),
(18,18,'King S','R','H'),
(19,19,'Mack','R','H'),
(20,20,'Murphy T','R','H'),
(21,21,'Heller','R','H'),
(22,22,'Miller Ga','R','H'),
(23,23,'Gibbs B','R','H'),
(24,24,'Camp','R','H'),
(25,25,'Grimm','R','H'),
(26,26,'Lankford','R','H'),
(27,27,'Sensenbrenner','R','H'),
(28,28,'Gosar','R','H'),
(29,29,'Nadler','D','H'),
(30,30,'Smith L','R','H'),
(31,31,'Lamborn','R','H'),
(32,32,'Cummings','D','H'),
(33,33,'Reichert','R','H'),
(34,34,'Paul Ro','R','H'),
(35,35,'Nunes','R','H'),
(36,36,'Walz','DFL','H'),
(37,37,'Bilbray','R','H'),
(38,38,'Gosar','R','H'),
(39,39,'Frank','D','H'),
(40,40,'Rangel','D','H'),
(41,41,'Smith L','R','H'),
(42,42,'Carter','R','H'),
(43,43,'Peters','D','H'),
(44,44,'Dent','R','H'),
(45,45,'Rehberg','R','H'),
(46,46,'Rehberg','R','H'),
(47,47,'Hastings D','R','H'),
(48,48,'Kissell','D','H'),
(49,49,'Chaffetz','R','H'),
(50,50,'Dicks','D','H'),
(51,51,'Schakowsky','D','H'),
(52,52,'King P','R','H'),
(53,53,'Jackson-Lee','D','H'),
(54,54,'Issa','R','H'),
(55,55,'Jordan','R','H'),
(56,56,'Rigell','R','H'),
(57,57,'Andrews','D','H'),
(58,58,'Baca','D','H'),
(59,59,'Farr','D','H'),
(60,60,'Berkley','D','H'),
(61,61,'Boustany','R','H'),
(62,62,'Campbell','R','H'),
(63,63,'Cardoza','D','H'),
(64,64,'Courtney','D','H'),
(65,65,'Critz','D','H'),
(66,66,'Fortenberry','R','H'),
(67,67,'Fortenberry','R','H'),
(68,68,'Gardner','R','H'),
(69,69,'Griffin','R','H'),
(70,70,'Hensarling','R','H'),
(71,71,'Herger','R','H'),
(72,72,'Issa','R','H'),
(73,73,'Issa','R','H'),
(74,74,'Johnson S','R','H'),
(75,75,'Kinzinger','R','H'),
(76,76,'Lance','R','H'),
(77,77,'Latta','R','H'),
(78,78,'Lewis Jo','D','H'),
(79,79,'Lewis Jo','D','H'),
(80,80,'Lummis','R','H'),
(81,81,'Maloney','D','H'),
(82,82,'McDermott','D','H'),
(83,83,'McMorris Rodger','R','H'),
(84,84,'Miller Ga','R','H'),
(85,85,'Norton','D','H'),
(86,86,'Norton','D','H'),
(87,87,'Pascrell','D','H'),
(88,88,'McDermott','D','H'),
(89,89,'Paul Ro','R','H'),
(90,90,'Pearce','R','H'),
(91,91,'Pierluisi','NP','H'),
(92,92,'Polis','D','H'),
(93,93,'Quigley','D','H'),
(94,94,'Rogers M','R','H'),
(95,95,'Sablan','I','H'),
(96,96,'Van Hollen','D','H'),
(97,97,'Forbes','R','H'),
(98,98,'Kucinich','D','H'),
(99,99,'Woodall','R','H'),
(100,100,'Rogers H','R','H'),
(101,101,'Lungren','R','H'),
(102,102,'Nugent','R','H'),
(103,103,'Engel','D','H'),
(104,104,'Grimm','R','H'),
(105,105,'Heck J','R','H'),
(106,106,'Maloney','D','H'),
(107,107,'Maloney','D','H'),
(108,108,'Moore G','D','H'),
(109,109,'Nadler','D','H'),
(110,110,'Sablan','I','H'),
(111,111,'Sanchez Li','D','H'),
(112,112,'Leahy','D','S'),
(113,113,'Rockefeller','D','S'),
(114,114,'Landrieu','D','S'),
(115,115,'Wyden','D','S'),
(116,116,'Grassley','R','S'),
(117,117,'Casey','D','S'),
(118,118,'Wyden','D','S'),
(119,119,'Murkowski','R','S'),
(120,120,'Inhofe','R','S'),
(121,121,'Inhofe','R','S'),
(122,122,'Snowe','R','S'),
(123,123,'Snowe','R','S'),
(124,124,'Harkin','D','S'),
(125,125,'Collins','R','S'),
(126,126,'Vitter','R','S'),
(127,127,'Sanders','I','S'),
(128,128,'Reid','D','S'),
(129,129,'Kerry','D','S'),
(130,130,'Udall T','D','S'),
(131,131,'Lautenberg','D','S'),
(132,132,'Rockefeller','D','S'),
(133,133,'Bennet','D','S'),
(134,134,'Kohl','D','S'),
(135,135,'Menendez','D','S'),
(136,136,'Klobuchar','D','S'),
(137,137,'Cantwell','D','S'),
(138,138,'Leahy','D','S'),
(139,139,'Murkowski','R','S'),
(140,140,'Murkowski','R','S'),
(141,141,'Murkowski','R','S'),
(142,142,'Murkowski','R','S'),
(143,143,'Schumer','D','S'),
(144,144,'Snowe','R','S'),
(145,145,'Schumer','D','S'),
(146,146,'Lee M','R','S'),
(147,147,'Cantwell','D','S'),
(148,148,'Feinstein','D','S'),
(149,149,'Feinstein','D','S'),
(150,150,'Feinstein','D','S'),
(151,151,'Akaka','D','S'),
(152,152,'Durbin','D','S'),
(153,153,'Leahy','D','S'),
(154,154,'Stabenow','D','S'),
(155,155,'Burr','R','S'),
(156,156,'Schumer','D','S'),
(157,157,'Boxer','D','S'),
(158,158,'Baucus','D','S'),
(159,159,'Gillibrand','D','S'),
(160,160,'Gillibrand','D','S'),
(161,161,'Ensign','R','S'),
(162,162,'Hagan','D','S'),
(163,163,'Kerry','D','S'),
(164,164,'Menendez','D','S'),
(165,165,'Lautenberg','D','S'),
(166,166,'Durbin','D','S'),
(167,167,'Gillibrand','D','S'),
(168,168,'Wicker','R','S'),
(169,169,'Lugar','R','S'),
(170,170,'Woodall','R','H'),
(171,1,'Boehner','R','H'),
(172,2,'Gingrey','R','H'),
(173,3,'Pitts','R','H'),
(174,4,'Boehner','R','H'),
(175,5,'Miller Ge','D','H'),
(176,6,'Hirono','D','H'),
(177,7,'Grijalva','D','H'),
(178,8,'Harper','R','H'),
(179,9,'Baca','D','H'),
(180,10,'Edwards D','D','H'),
(181,11,'Towns','D','H'),
(182,12,'Hirono','D','H'),
(183,13,'King S','R','H'),
(184,14,'Mack','R','H'),
(185,15,'Murphy T','R','H'),
(186,16,'Heller','R','H'),
(187,17,'Miller Ga','R','H'),
(188,18,'Gibbs B','R','H'),
(189,19,'Camp','R','H'),
(190,20,'Grimm','R','H'),
(191,21,'Lankford','R','H'),
(192,22,'Sensenbrenner','R','H'),
(193,23,'Gosar','R','H'),
(194,24,'Nadler','D','H'),
(195,25,'Smith L','R','H'),
(196,26,'Lamborn','R','H'),
(197,27,'Cummings','D','H'),
(198,28,'Reichert','R','H'),
(199,29,'Paul Ro','R','H'),
(200,30,'Nunes','R','H'),
(201,31,'Walz','DFL','H'),
(202,32,'Bilbray','R','H'),
(203,33,'Gosar','R','H'),
(204,34,'Frank','D','H'),
(205,35,'Rangel','D','H'),
(206,36,'Smith L','R','H'),
(207,37,'Carter','R','H'),
(208,38,'Peters','D','H'),
(209,39,'Dent','R','H'),
(210,40,'Rehberg','R','H'),
(211,41,'Rehberg','R','H'),
(212,42,'Hastings D','R','H'),
(213,43,'Kissell','D','H'),
(214,44,'Chaffetz','R','H'),
(215,45,'Dicks','D','H'),
(216,46,'Schakowsky','D','H'),
(217,47,'King P','R','H'),
(218,48,'Jackson-Lee','D','H'),
(219,49,'Issa','R','H'),
(220,50,'Jordan','R','H'),
(221,51,'Rigell','R','H'),
(222,52,'Andrews','D','H'),
(223,53,'Baca','D','H'),
(224,54,'Farr','D','H'),
(225,55,'Berkley','D','H'),
(226,56,'Boustany','R','H'),
(227,57,'Campbell','R','H'),
(228,58,'Cardoza','D','H'),
(229,59,'Courtney','D','H'),
(230,60,'Critz','D','H'),
(231,61,'Fortenberry','R','H'),
(232,62,'Fortenberry','R','H'),
(233,63,'Gardner','R','H'),
(234,64,'Griffin','R','H'),
(235,65,'Hensarling','R','H'),
(236,66,'Herger','R','H'),
(237,67,'Issa','R','H'),
(238,68,'Issa','R','H'),
(239,69,'Johnson S','R','H'),
(240,70,'Kinzinger','R','H'),
(241,71,'Lance','R','H'),
(242,72,'Latta','R','H'),
(243,73,'Lewis Jo','D','H'),
(244,74,'Lewis Jo','D','H'),
(245,75,'Lummis','R','H'),
(246,76,'Maloney','D','H'),
(247,77,'McDermott','D','H'),
(248,78,'McMorris Rodger','R','H'),
(249,79,'Miller Ga','R','H'),
(250,80,'Norton','D','H'),
(251,81,'Norton','D','H'),
(252,82,'Pascrell','D','H'),
(253,83,'McDermott','D','H'),
(254,84,'Paul Ro','R','H'),
(255,85,'Pearce','R','H'),
(256,86,'Pierluisi','NP','H'),
(257,87,'Polis','D','H'),
(258,88,'Quigley','D','H'),
(259,89,'Rogers M','R','H'),
(260,90,'Sablan','I','H'),
(261,91,'Van Hollen','D','H'),
(262,92,'Waters','D','H'),
(263,93,'Young D','R','H'),
(264,94,'Forbes','R','H'),
(265,95,'Kucinich','D','H'),
(266,96,'Woodall','R','H'),
(267,97,'Rogers H','R','H'),
(268,98,'Lungren','R','H'),
(269,99,'Nugent','R','H'),
(270,100,'Engel','D','H'),
(271,101,'Grimm','R','H'),
(272,102,'Heck J','R','H'),
(273,103,'Maloney','D','H'),
(274,104,'Maloney','D','H'),
(275,105,'Moore G','D','H'),
(276,106,'Nadler','D','H'),
(277,107,'Sablan','I','H'),
(278,108,'Sanchez Li','D','H'),
(279,109,'Leahy','D','S'),
(280,110,'Rockefeller','D','S'),
(281,111,'Landrieu','D','S'),
(282,112,'Wyden','D','S'),
(283,113,'Grassley','R','S'),
(284,114,'Casey','D','S'),
(285,115,'Wyden','D','S'),
(286,116,'Murkowski','R','S'),
(287,117,'Inhofe','R','S'),
(288,118,'Inhofe','R','S'),
(289,119,'Snowe','R','S'),
(290,120,'Snowe','R','S'),
(291,121,'Harkin','D','S'),
(292,122,'Collins','R','S'),
(293,123,'Vitter','R','S'),
(294,124,'Sanders','I','S'),
(295,125,'Reid','D','S'),
(296,126,'Kerry','D','S'),
(297,127,'Udall T','D','S'),
(298,128,'Lautenberg','D','S'),
(299,129,'Rockefeller','D','S'),
(300,130,'Bennet','D','S'),
(301,131,'Kohl','D','S'),
(302,132,'Menendez','D','S'),
(303,133,'Klobuchar','D','S'),
(304,134,'Cantwell','D','S'),
(305,135,'Leahy','D','S'),
(306,136,'Murkowski','R','S'),
(307,137,'Murkowski','R','S'),
(308,138,'Murkowski','R','S'),
(309,139,'Murkowski','R','S'),
(310,140,'Schumer','D','S'),
(311,141,'Snowe','R','S'),
(312,142,'Schumer','D','S'),
(313,143,'Lee M','R','S'),
(314,144,'Cantwell','D','S'),
(315,145,'Feinstein','D','S'),
(316,146,'Feinstein','D','S'),
(317,147,'Feinstein','D','S'),
(318,148,'Akaka','D','S'),
(319,149,'Durbin','D','S'),
(320,150,'Leahy','D','S'),
(321,151,'Stabenow','D','S'),
(322,152,'Burr','R','S'),
(323,153,'Schumer','D','S'),
(324,154,'Boxer','D','S'),
(325,155,'Baucus','D','S'),
(326,156,'Gillibrand','D','S'),
(327,157,'Gillibrand','D','S'),
(328,158,'Ensign','R','S'),
(329,159,'Hagan','D','S'),
(330,160,'Kerry','D','S'),
(331,161,'Menendez','D','S'),
(332,162,'Lautenberg','D','S'),
(333,163,'Durbin','D','S'),
(334,164,'Gillibrand','D','S'),
(335,165,'Wicker','R','S'),
(336,166,'Lugar','R','S'),
(337,167,'Woodall','R','H');

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
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbl_bill_detail` */

insert into `tbl_bill_detail` values 
(1,3,'US','2011000','HR','Prohibit Taxpayer Funds to be Used for Abortions','2011-01-20','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Prohibits taxpayer funded abortions and to provide for conscience protect ions, and for other purposes.','From HOUSE Committee on JUDICIARY:  Reported as amended.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H3&ciq=voices&client_md=50bb121395f7e0d5c125f84a1fff9dab&mode=current_text'),
(2,5,'US','2011000','HR','Patient Access to Health Care Services','2011-01-24','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Improves patient access to health care services and provide improved Medical care by reducing the excessive burden the liability system places on the health care delivery system.','From HOUSE Committee on JUDICIARY:  Reported as amended.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H5&ciq=voices&client_md=cfa518a0273e7e3a0b92c46de4660328&mode=current_text'),
(3,358,'US','2011000','HR','Special Considerations for Abortions in Health Care Act','2011-01-20','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Relates to the Protect Life Act; amends the Patient Protection and Affordable Care Act to modify special rules relating to coverage of abortion services under such Act.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H358&ciq=voices&client_md=3f83be80dafa2d44d34c7df70a9a43f0&mode=current_text'),
(4,471,'US','2011000','HR','DC Opportunity Scholarship Program','2011-01-26','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Reauthorizes the DC opportunity scholarship program, and for other purposes.','In HOUSE. Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H471&ciq=voices&client_md=b834001e878eedb64f7658c70e00bd13&mode=current_text'),
(5,522,'US','2011000','HR','Safety Standard for Exposure to Combustible Dust','2011-02-08','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Requires the Secretary of Labor to issue an interim occupational safety and health standard regarding worker exposure to combustible dust, and for other purposes.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H522&ciq=voices&client_md=7b521cb09d8daf72eb9cccf4e156c83d&mode=current_text'),
(6,571,'US','2011000','HR','Occupational Safety and Health Plans Review Process','2011-02-09','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Requires a heightened review process by the Secretary of Labor of State occupational safety and health plans, and for other purposes.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H571&ciq=voices&client_md=074921d438a2964fea69874914eaa98e&mode=current_text'),
(7,587,'US','2011000','HR','Restore the Nations Natural and Cultural Resources','2011-02-09','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Public Lands Corps Act of 1993 to expand the authorization of the Secretaries of Agriculture, Commerce, and the Interior to provide service opportunities for young Americans; helps restore the nation\'s natural, cultural, historic, archaeological, recreational and scenic resources; trains a new generation of public land managers and enthusiasts; promotes the value of public service.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H587&ciq=voices&client_md=a619150bb03e8c6bfb55a29e700edee0&mode=current_text'),
(8,604,'US','2011000','HR','Disabled Youth Transition to Adulthood','2011-02-10','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Rehabilitation Act of 1973 to authorize grants for the transition of youths with significant disabilities to adulthood, and for other purposes.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H604&ciq=voices&client_md=9dfbfe6c240568e7039b900fa15ab949&mode=current_text'),
(9,623,'US','2011000','HR','National Commission on State Workers Compensation Laws','2011-02-10','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Establishes the National Commission on State Workers\' Compensation Laws.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H623&ciq=voices&client_md=8569e85deb164637719b2fc1a94b63a1&mode=current_text'),
(10,631,'US','2011000','HR','Base Minimum Wage for Tipped Employees','2011-02-10','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Fair Labor Standards Act of 1938 to establish a base minimum wage for tipped employees.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H631&ciq=voices&client_md=1041f8914ab053f538a9a056a8b194a3&mode=current_text'),
(11,683,'US','2011000','HR','Grants to the National Urban League for Urban Jobs','2011-02-11','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Workforce Investment Act of 1998 to authorize the Secretary of Labor to provide grants to the National Urban League for an Urban Jobs Program, and for other purposes.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H683&ciq=voices&client_md=b0c55abdc08098d869e49477a864fe2e&mode=current_text'),
(12,711,'US','2011000','HR','Establishment of Youth Corps Programs','2011-02-15','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Workforce Investment Act of 1998 to provide for the establishment of Youth Corps programs and provide for wider dissemination of the Youth Corps model.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H711&ciq=voices&client_md=b7840a38e6c7ff931d68ab6ecb665186&mode=current_text'),
(13,745,'US','2011000','HR','Wage Requirements of the Davis-Bacon Act','2011-02-16','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Repeals the wage rate requirements commonly known as the Davis-Bacon Act.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H745&ciq=voices&client_md=f68db7a8b865b9f2309a1988d50b58e4&mode=current_text'),
(14,746,'US','2011000','HR','Wage Rate Requirements','2011-02-16','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Repeals the wage rate requirements commonly known as the Davis-Bacon Act.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H746&ciq=voices&client_md=fee43a55578ac885ec09919cac45e073&mode=current_text'),
(15,840,'US','2011000','HR','Offshore Energy Exploration Drilling Permits','2011-02-28','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Allows the conduct of offshore energy exploration, development, and production operations under drilling permits previously issued by the Minerals Management Service, and for other purposes.','In HOUSE Committee on NATURAL RESOURCES:  Referred to Subcommittee on ENERGY AND MINERAL RESOURCES.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H840&ciq=voices&client_md=2b23fcf38361c6e8ae969d5deb6e9457&mode=current_text'),
(16,856,'US','2011000','HR','Clark County, Nevada Mining Laws','2011-03-01','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Relates to the Sloan Hills Withdrawal Act; withdraws certain land located in Clark County, Nevada, from location, entry, and patent under the mining Laws and disposition under all Laws pertaining to mineral and geothermal leasing or mineral materials, and for other purposes.','In HOUSE Committee on NATURAL RESOURCES:  Referred to Subcommittee on ENERGY AND MINERAL RESOURCES.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H856&ciq=voices&client_md=90bce1bae40494f02c49bfd31de48f15&mode=current_text'),
(17,861,'US','2011000','HR','Funding for the Neighborhood Stabilization Program','2011-03-01','2011-03-16','0000-00-00','','Pending','Senate Banking, Housing and Urban Affairs Committe',NULL,'Relates to the NSP Termination Act; rescinds the third round of funding for the Neighborhood Stabilization Program and to terminate the program.','To SENATE Committee on BANKING, HOUSING AND URBAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H861&ciq=voices&client_md=7bbb2fce7879aab2e0338d43d9fcb765&mode=current_text'),
(18,872,'US','2011000','HR','Pesticide Use in Near or Navigable Waters','2011-03-02','0000-00-00','0000-00-00','','Pending','House Agriculture Committee',NULL,'Amends the Federal Insecticide, Fungicide, and Rodenticide Act and the Federal Water Pollution Control Act to clarify Congressional intent regarding the regulation of the use of pesticides in or near navigable waters, and for other purposes.','In HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE:  Ordered to be reported as amended.','2011-03-16','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H872&ciq=voices&client_md=a42247a9bc8cb7674875c1f7cf2cbc52&mode=current_text'),
(19,892,'US','2011000','HR','Separation of the Great Lakes and Mississippi River','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Requires the Secretary of the Army to study the feasibility of the hydrological separation of the Great Lakes and Mississippi River Basins.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on WATER RESOURCES AND ENVIRONMENT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H892&ciq=voices&client_md=db09a8bc6aa54bea4184e9c54abee965&mode=current_text'),
(20,897,'US','2011000','HR','Programs for Residential and Commuter Tolls','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Provides authority and sanction for the granting and issuance of programs for residential and commuter toll, user fee and fare discounts by States, municipalities, other localities, and all related agencies and departments, and for other purposes.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on HIGHWAYS AND TRANSIT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H897&ciq=voices&client_md=5c4791b907341645a9ff644bb46a1c2f&mode=current_text'),
(21,899,'US','2011000','HR','Protests of Task and Order Delivery Contracts','2011-03-03','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Amends title 41, United States Code, to extend the sunset date for certain protests of task and deliver order contracts.','In HOUSE.  Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H899&ciq=voices&client_md=21d74c31d36a384370357f35a02293d8&mode=current_text'),
(22,904,'US','2011000','HR','Funding to Check Motorcycle Helmet Usage','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Prohibits the Secretary of Transportation from providing grants or any funds to a State, county, town, or township, Indian tribe, municipal or other local government to be used for any program to check helmet usage or create checkpoints for a motorcycle driver or passenger.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on HIGHWAYS AND TRANSIT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H904&ciq=voices&client_md=a8890380d24c05172e15d21a0e020a29&mode=current_text'),
(23,922,'US','2011000','HR','Protection from Flood Hazards Resulting from Wildfires','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Ensures that private property, public safety, and human life are protected from flood hazards that directly result from post-fire watershed conditions that are created by wildfires on Federal land.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on WATER RESOURCES AND ENVIRONMENT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H922&ciq=voices&client_md=1f23b319863860117f7f9bb5bd731d99&mode=current_text'),
(24,929,'US','2011000','HR','Expand and Improve Transit Training Programs','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Amends title 49, United States Code, to expand and improve transit training programs.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on HIGHWAYS AND TRANSIT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H929&ciq=voices&client_md=cd0846719ab1fe4b4cf82f0625a4acfa&mode=current_text'),
(25,1021,'US','2011000','HR','Temporary Office of Bankruptcy Judges','2011-03-10','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Prevents the termination of the temporary office of bankruptcy judges in certain judicial districts.','In HOUSE Committee on JUDICIARY:  Ordered to be reported as amended.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1021&ciq=voices&client_md=20627e14c695c7366125fb43256cc66e&mode=current_text'),
(26,1076,'US','2011000','HR','Federal Funding of National Public Radio','2011-03-15','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe',NULL,'Prohibits Federal funding of National Public Radio and the use of Federal funds to acquire radio content.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1076&ciq=voices&client_md=7c862db9676b03df26740ab5240e07cb&mode=current_text'),
(27,1144,'US','2011000','HR','Transparency of the Federal Government','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Increases the transparency of the Federal Government, and for other purposes.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1144&ciq=voices&client_md=6023bf61c17857fc8908d4cadc87c4ec&mode=current_text'),
(28,1145,'US','2011000','HR','Emergency Volunteer Liability for Negligence','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Provides construction, architectural, and engineering entities with qualified immunity from liability for negligence when providing services or equipment on a volunteer basis in response to a declared emergency or disaster.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1145&ciq=voices&client_md=41188bce6e3bb423603b1e83aaaa0fdc&mode=current_text'),
(29,1146,'US','2011000','HR','United States Membership in the United Nations','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee',NULL,'Relates to the American Sovereignty Restoration Act of 2009; ends membership of the United States in the United Nations.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1146&ciq=voices&client_md=f71efa7c8b6b2a03a2dbac276390a6ff&mode=current_text'),
(30,1147,'US','2011000','HR','Debt Reduction on Commercial Real Property','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends the Internal Revenue Code of 1986 to allow a deduction for certain payments made to reduce debt on commercial real property.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1147&ciq=voices&client_md=c8747f12ea9d7dbf6a0d670217dc5448&mode=current_text'),
(31,1148,'US','2011000','HR','Insider Trading by Members of Congress','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ethics Committee',NULL,'Prohibits commodities and securities trading based on nonpublic information relating to Congress; requires additional reporting by Members and employees of Congress of securities transactions, and for other purposes.','Additionally referred to HOUSE Committee on ETHICS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1148&ciq=voices&client_md=077d2ae981302989ab4e67da986d6a9a&mode=current_text'),
(32,1149,'US','2011000','HR','Algae-Based Biofuel Producer Credit','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends the Clean Air Act to include algae-based biofuel in the renewable fuel program and amend the Internal Revenue Code of 1986 to include algae-based biofuel in the cellulosic biofuel producer credit.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1149&ciq=voices&client_md=cebdd67dfe1d73f7f760caadd2ec7363&mode=current_text'),
(33,1150,'US','2011000','HR','Health Insurance Business Antitrust Laws','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Restores the application of the Federal antitrust Laws to the business of health insurance to protect competition and consumers.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1150&ciq=voices&client_md=bfa1f5c208c71676a48a3240fb8f8875&mode=current_text'),
(34,1151,'US','2011000','HR','Mortgage Assistance Made by Financial Companies','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee',NULL,'Requires the Secretary of the Treasury to make risk-based assessments on financial companies to recoup the amount of assistance made available for unemployed homeowners under the Emergency Mortgage Relief Program and for States and communities under the Neighborhood Stabilization Program.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1151&ciq=voices&client_md=76bd60b3adf429468d02f5575a8267d5&mode=current_text'),
(35,1152,'US','2011000','HR','Armed Forces Draft Between Ages 18 and 25','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee',NULL,'Requires all persons in the United States between the ages of 18 and 25 to perform national service, either as a member of the uniformed services or in civilian service in furtherance of the national defense and homeland security, to authorize the induction of persons in the uniformed services during wartime to meet end-strength requirements of the uniformed services, and for other purposes.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1152&ciq=voices&client_md=328a80c6a67a694c294e25854d517673&mode=current_text'),
(36,1153,'US','2011000','HR','Terrorism Prosecution in United States District Court','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Provides for consultation by the Department of Justice with other relevant Government agencies before determining to prosecute certain terrorism offenses in United States district court, and for other purposes.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1153&ciq=voices&client_md=2cdd21c15ec504eede225a80ad9b8e1b&mode=current_text'),
(37,1154,'US','2011000','HR','Service Dogs on Department of Veterans Affairs Property','2011-03-17','0000-00-00','0000-00-00','','Pending','House Veterans\' Affairs Committee',NULL,'Amends title 38, United States Code, to prevent the Secretary of Veterans Affairs from prohibiting the use of service dogs on Department of Veterans Affairs property.','To HOUSE Committee on VETERANS\' AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1154&ciq=voices&client_md=c64a8b48b8a456f58f4bd2919e0d05f7&mode=current_text'),
(38,1155,'US','2011000','HR','Terminations, Reductions, and Savings by Budget Office','2011-03-17','0000-00-00','0000-00-00','','Pending','House Rules Committee',NULL,'Establishes procedures for the expedited consideration by Congress of the recommendations set forth in the Terminations, Reductions, and Savings report prepared by the Office of Management and Budget.','Additionally referred to HOUSE Committee on RULES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1155&ciq=voices&client_md=553230d573cc1e19d37b71e320f28373&mode=current_text'),
(39,1156,'US','2011000','HR','Accepting Nationals Requested by Homeland Security','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Amends the Immigration and Nationality Act with respect to a country that denies or unreasonably delays accepting the country\'s nationals upon the request of the Secretary of Homeland Security.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1156&ciq=voices&client_md=de360e16cdd7fd6d3aac2a1c1ae5b39d&mode=current_text'),
(40,1157,'US','2011000','HR','Levee System Evaluation from Non-Federal Interests','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee',NULL,'Requires the Secretary of the Army to conduct levee system evaluations and certifications on receipt of requests from non-Federal interests.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1157&ciq=voices&client_md=ad6532df8fd6f4cd782cad28784f5045&mode=current_text'),
(41,1158,'US','2011000','HR','Mineral Rights in the State of Montana','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Authorizes the conveyance of mineral rights by the Secretary of the Interior in the State of Montana, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1158&ciq=voices&client_md=5f94894526310b56b4408b405c030862&mode=current_text'),
(42,1159,'US','2011000','HR','Limitation on Medicare Exception to Physician Referrals','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Repeals certain provisions of the Patient Protection and Affordable Care Act relating to the limitation on the Medicare exception to the prohibition on certain physician referrals for hospitals and to transparency reports and reporting of physician ownership or investment interests.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1159&ciq=voices&client_md=b1f4b271cf185398a4f469861bd5ef04&mode=current_text'),
(43,1160,'US','2011000','HR','McKinney Lake National Fish Hatchery to North Carolina','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Requires the Secretary of the Interior to convey the McKinney Lake National Fish Hatchery to the State of North Carolina, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1160&ciq=voices&client_md=5b9ad258692f80a5b69c41344a82b6a1&mode=current_text'),
(44,1161,'US','2011000','HR','State Based Alcohol Regulation','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Reaffirms state-based alcohol regulation, and for other purposes.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1161&ciq=voices&client_md=c21b410d45cba95572a29b1739946bc0&mode=current_text'),
(45,1162,'US','2011000','HR','Quileute Indian Tribe Tsunami and Flood Protection','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Provides the Quileute Indian Tribe Tsunami and Flood Protection, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1162&ciq=voices&client_md=34ff5a9ab45f8671b3016fefdf3f9090&mode=current_text'),
(46,1163,'US','2011000','HR','Income Tax Rate on Patriot Corporations','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Provides Federal contracting preferences for, and a reduction in the rate of income tax imposed on, Patriot corporations, and for other purposes.','Additionally referred to HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1163&ciq=voices&client_md=62dd24c411bcabbb865ed0a9df3d4604&mode=current_text'),
(47,1164,'US','2011000','HR','Official Language of the United States Government','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Amends title 4, United States Code, to declare English as the official language of the Government of the United States, and for other purposes.','Additionally referred to HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1164&ciq=voices&client_md=a68def2c2c07c2a617f5343737632046&mode=current_text'),
(48,1165,'US','2011000','HR','Ombudsman Office for Transportation Safety','2011-03-17','0000-00-00','0000-00-00','','Pending','House Homeland Security Committee',NULL,'Amends title 49, United States Code, to establish an Ombudsman Office within the Transportation Security Administration for the purpose of enhancing transportation security by providing confidential, informal, and neutral assistance to address work-place related problems of Transportation Security Administration employees, and for other purposes.','To HOUSE Committee on HOMELAND SECURITY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1165&ciq=voices&client_md=23c9e077f4793a8bb8a4b8d810187ecb&mode=current_text'),
(49,1166,'US','2011000','HR','Rights Relating to Trade or Commercial Names','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Modifies the prohibition on recognition by United States courts of certain rights relating to certain marks, trade names, or commercial Names.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1166&ciq=voices&client_md=58f4ce2720d250898c237c25f491ffd9&mode=current_text'),
(50,1167,'US','2011000','HR','Spending on Means Tested Welfare Programs','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Provides information on total spending on means-tested welfare programs; provides additional work requirements; provides an overall spending limit on means-tested welfare programs.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1167&ciq=voices&client_md=ce6c657b10b01075d3a6d6034a6554bf&mode=current_text'),
(51,1168,'US','2011000','HR','Matching Contributions to the Thrift Savings Fund','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Amends title 5, United States Code, to provide that matching contributions to the Thrift Savings Fund for Members of Congress be made contingent on Congress completing action on a concurrent resolution on the budget, for the fiscal year involved, which reduces the deficit, and for other purposes.','Additionally referred to HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1168&ciq=voices&client_md=e585885cca25e15f2f3847ebdabf110b&mode=current_text'),
(52,1169,'US','2011000','HR','Eligibility Age for Retirement in National Guard','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Amends titles 5, 10, and 32, United States Code, to eliminate inequities in the treatment of National Guard technicians; reduces the eligibility age for retirement for non-Regular service, and for other purposes.','Additionally referred to HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1169&ciq=voices&client_md=cd31d6c29563aa167f0cc0bfa45749b9&mode=current_text'),
(53,1170,'US','2011000','HR','Gold in Metal Content of the Medal of Honor','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee',NULL,'Amends titles 10 and 14, United States Code, to provide for the use of gold in the metal content of the Medal of Honor.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1170&ciq=voices&client_md=a01c1cefbcd4a327e829a7ec252a9a96&mode=current_text'),
(54,1171,'US','2011000','HR','Marine Debris Research, Prevention, and Reduction','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Reauthorizes and amend the Marine Debris Research, Prevention, and Reduction Act.','Additionally referred to HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1171&ciq=voices&client_md=48dc8afb06757f5c60c816aa839e47c7&mode=current_text'),
(55,1172,'US','2011000','HR','Payment for Chest Radiography Services','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends title XVIII of the Social Security Act to provide an increased payment for chest radiography (x-ray) services that use Computer Aided Detection technology for the purpose of Early detection of lung cancer.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1172&ciq=voices&client_md=a52bf7a0b8d5901b48a35eb061e95f0a&mode=current_text'),
(56,1173,'US','2011000','HR','Class Program','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Repeals the class program.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1173&ciq=voices&client_md=f6f89122ea9c7732b696116fb68ee24b&mode=current_text'),
(57,1174,'US','2011000','HR','Licensing of Internet Gambling Activities','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends title 31, United States Code, to provide for the licensing of Internet gambling activities by the Secretary of the Treasury; provides for consumer protections on the Internet; enforces the tax code, and for other purposes.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1174&ciq=voices&client_md=d21fed27555921af218431555f049bc3&mode=current_text'),
(58,1175,'US','2011000','HR','Oleoresin Capsicum Spray Pilot Program in the Prisons','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Establishes an Oleoresin Capsicum Spray Pilot Program in the Bureau of Prisons, and for other purposes.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1175&ciq=voices&client_md=d3ddd1b85b27913f682af605024d2946&mode=current_text'),
(59,1176,'US','2011000','HR','Specialty Crops to Include Farmed Shellfish','2011-03-17','0000-00-00','0000-00-00','','Pending','House Agriculture Committee',NULL,'Amends the Specialty Crops Competitiveness Act of 2004 to include farmed shellfish as specialty crops.','To HOUSE Committee on AGRICULTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1176&ciq=voices&client_md=d3b89ac01831c9d5dd3e6f078227e423&mode=current_text'),
(60,1177,'US','2011000','HR','Tax Preferred Savings Accounts for Individuals Under 26','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends the Internal Revenue Code of 1986 to provide for tax preferred savings accounts for individuals under age 26, and for other purposes.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1177&ciq=voices&client_md=e45a790515aa06f5e8d06f125d5d96bc&mode=current_text'),
(61,1178,'US','2011000','HR','Commissary and Exchange Store Privileges','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee',NULL,'Amends title 10, United States Code, to extend military commissary and exchange store privileges to veterans with a compensable service-connected disability and to their dependents.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1178&ciq=voices&client_md=15dd922a6efd69b6012a16abd99df5e3&mode=current_text'),
(62,1179,'US','2011000','HR','Specific Item and Service Coverage Requirements','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends the Patient Protection and Affordable Care Act to protect rights of conscience with regard to requirements for coverage of specific items and services.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1179&ciq=voices&client_md=e2bcd8bca9f3202345afde762987e2f1&mode=current_text'),
(63,1180,'US','2011000','HR','Small Business Start-Up Savings Account','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends the Internal Revenue Code of 1986 to establish small business start-up savings accounts.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1180&ciq=voices&client_md=b18c14c554769473dc0368461402cd9c&mode=current_text'),
(64,1181,'US','2011000','HR','State Property Firearm Exemption','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Amends title 11 of the United States Code to include firearms in the types of property allowable under the alternative provision for exempting property from the estate.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1181&ciq=voices&client_md=dc9a58a1ee0d5307c13a9e682124c548&mode=current_text'),
(65,1182,'US','2011000','HR','Conservatorships of Fannie Mae and Freddie Mac','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee',NULL,'Establishes a term certain for the conservatorships of Fannie Mae and Freddie Mac; provides conditions for continued operation of such enterprises; provides for the wind down of such operations and the dissolution of such enterprises.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1182&ciq=voices&client_md=bf76db4cc386f7e0094dae9d1441c805&mode=current_text'),
(66,1183,'US','2011000','HR','Interstate Commerce for Suicide Promotion','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Amends title 18, United States Code, to prohibit the use of interstate commerce for suicide promotion.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1183&ciq=voices&client_md=c397e6bd4c73beaa7a94a92d2bd326a0&mode=current_text'),
(67,1184,'US','2011000','HR','Criteria Used to Grant Waivers for Health Care','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Requires greater transparency concerning the criteria used to grant waivers to the job-killing health care law and to ensure that applications for such waivers are treated in a fair and consistent manner, irrespective of the applicant\'s political contributions or association with a labor union, a health plan provided for under a collective bargaining agreement, or another organized labor group.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1184&ciq=voices&client_md=d712484fe6e7769a126c338a57a06aa6&mode=current_text'),
(68,1185,'US','2011000','HR','Implementation of Health Reform Law','2011-03-17','0000-00-00','0000-00-00','','Pending','House Rules Committee',NULL,'Delays the implementation of the health reform law in the United States until there is final resolution in pending lawsuits.','Additionally referred to HOUSE Committee on RULES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1185&ciq=voices&client_md=43f6c3d9e961fbf1d7da2ae7c22ccd24&mode=current_text'),
(69,1186,'US','2011000','HR','Changes Made by Health Care Reform','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Repeals changes made by health care reform Laws to the Medicare exception to the prohibition on certain physician referrals for hospitals.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1186&ciq=voices&client_md=e7541686de1bc1fdaae706bad2e2d21b&mode=current_text'),
(70,1187,'US','2011000','HR','Incentive Payments to Federally Qualified Health Center','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends title XIX of the Social Security Act to direct Medicaid Electronic Health Record incentive payments to federally qualified health centers and rural health clinics.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1187&ciq=voices&client_md=9f6285cb54f6a10e6424cb37c04b65cc&mode=current_text'),
(71,1188,'US','2011000','HR','Incentives for Alcohol Fuels','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends the Internal Revenue Code of 1986 to terminate incentives for alcohol fuels.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1188&ciq=voices&client_md=7390ab0af6fc91cef33fb998bd25d458&mode=current_text'),
(72,1189,'US','2011000','HR','Construction of Wastewater Treatment Works','2011-03-17','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Amends the Federal Water Pollution Control Act to assist municipalities that would experience a significant hardship raising the revenue necessary to finance projects and activities for the construction of wastewater treatment works, and for other purposes.','To HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1189&ciq=voices&client_md=c248cfc6226132250a7c269635cd5bad&mode=current_text'),
(73,1190,'US','2011000','HR','Tax Deductions Equal to Fair Market Value','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends the Internal Revenue Code of 1986 to provide that a deduction equal to fair market value shall be allowed for charitable contributions of literary, musical, artistic, or scholarly compositions created by the donor.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1190&ciq=voices&client_md=d2641c5473478c684b46c169551bce7b&mode=current_text'),
(74,1191,'US','2011000','HR','Revenue Collection for Nonmilitary Purposes','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Affirms the religious freedom of taxpayers who are conscientiously opposed to participation in war, to provide that the income, estate, or gift tax payments of such taxpayers be used for nonmilitary purposes; creates the Religious Freedom Peace Tax Fund to receive such tax payments; improves revenue collection, and for other purposes.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1191&ciq=voices&client_md=8dc5906a403933e9104030e6784da040&mode=current_text'),
(75,1192,'US','2011000','HR','Royalty Rate for Soda Ash','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Extends the current royalty rate for soda ash.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1192&ciq=voices&client_md=495c75a4c4c7b8586eb5e32c669daa01&mode=current_text'),
(76,1193,'US','2011000','HR','Railroads used in Transportation to Nazi Camps','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee',NULL,'Ensures that the courts of the United States may provide an impartial forum for claims brought by United States citizens and others against any railroad organized as a separate legal entity, arising from the deportation of United States citizens and others to Nazi concentration camps on trains owned or operated by such railroad, and by the heirs and survivors of such persons, and for other purposes.','Additionally referred to HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1193&ciq=voices&client_md=38447e0e57b116f05906017dac6185c7&mode=current_text'),
(77,1194,'US','2011000','HR','Innovative Child Welfare Strategies','2011-03-17','0000-00-00','0000-00-00','','Pending','House Budget Committee',NULL,'Renews the authority of the Secretary of Health and Human Services to approve demonstration projects designed to test innovative strategies in State child welfare programs.','Additionally referred to HOUSE Committee on BUDGET.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1194&ciq=voices&client_md=bf36a48b035b04490eaa553717bbe8d2&mode=current_text'),
(78,1195,'US','2011000','HR','National Service Corps Scholarship and Loan Repayment','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends the Public Health Service Act to provide for the participation of optometrists in the National Health Service Corps scholarship and loan repayment programs, and for other purposes.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1195&ciq=voices&client_md=28dfbbb158f19449ae3076f1fb5d7901&mode=current_text'),
(79,1196,'US','2011000','HR','Incentives and Loopholes That Encourage Illegal Aliens','2011-03-17','0000-00-00','0000-00-00','','Pending','House Agriculture Committee',NULL,'Removes the incentives and loopholes that encourage illegal aliens to come to the United States to live and work; provides additional resources to local law enforcement and Federal border and immigration officers, and for other purposes.','Additionally referred to HOUSE Committee on AGRICULTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1196&ciq=voices&client_md=c3d2122022321a93fe2e83dc22d0c5dd&mode=current_text'),
(80,1197,'US','2011000','HR','District of Columbia National Guard Education Program','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Directs the Mayor of the District of Columbia to establish a District of Columbia National Guard Educational Assistance Program to encourage the enlistment and retention of persons in the District of Columbia National Guard by providing financial assistance to enable members of the National Guard of the District of Columbia to attend undergraduate, vocational, or technical courses.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1197&ciq=voices&client_md=6b3e3fb75e6d64d37b97bfc87c59f056&mode=current_text'),
(81,1198,'US','2011000','HR','Control of the District of Columbia National Guard','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee',NULL,'Extends to the Mayor of the District of Columbia the same authority over the National Guard of the District of Columbia as the Governors of the several States exercise over the National Guard of those States with respect to administration of the National Guard and its use to respond to natural disasters and other civil disturbances, while ensuring that the President retains control of the National Guard of the District of Columbia to respond to homeland defense emergencies.','Additionally referred to HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1198&ciq=voices&client_md=1f77bc51ce1ee1afcf12d439937c4e9e&mode=current_text'),
(82,1199,'US','2011000','HR','Fire Safety Education Programs on College Campuses','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Authorizes the Secretary of Education to make grants to support fire safety education programs on college campuses.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1199&ciq=voices&client_md=434b6403c9b41bd9bd602def98d6d9ff&mode=current_text'),
(83,1200,'US','2011000','HR','Health Care for Every American','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Provides for health care for every American and to control the cost and enhance the quality of the health care system.','Additionally referred to HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1200&ciq=voices&client_md=709c712ef0bc5ac1ce2876e6c5d9fbb3&mode=current_text'),
(84,1201,'US','2011000','HR','Investment Option in the Thrift Savings Fund','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Amends title 5, United States Code, to provide for the establishment of a precious metals investment option in the Thrift Savings Fund.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1201&ciq=voices&client_md=5308efb355978dabc7d5c4e01a3d0b00&mode=current_text'),
(85,1202,'US','2011000','HR','Removal of Mexican Spotted Owl to Sanctuaries','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Restarts jobs in the timber industry by providing for the protection of the Mexican Spotted Owl in sanctuaries.','Additionally referred to HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1202&ciq=voices&client_md=0d698838cc9c711a6161e5758017bc46&mode=current_text'),
(86,1203,'US','2011000','HR','Low Power Television Stations','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Amends title 17, United States Code, to include the United States territories in the application of certain statutory copyright licenses related to low power television stations.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1203&ciq=voices&client_md=ae0e3ed83e672abb4a15f7f7516fb906&mode=current_text'),
(87,1204,'US','2011000','HR','Emissions from Oil and Gas Development Sources','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends the Clean Air Act to eliminate the exemption for aggregation of emissions from oil and gas development sources, and for other purposes.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1204&ciq=voices&client_md=1225886406b8240c116a22517a246c98&mode=current_text'),
(88,1205,'US','2011000','HR','Disposal of Real Property','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Amends title 40, United States Code, to enhance authorities with regard to the disposal of real property, and for other purposes.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1205&ciq=voices&client_md=660a504e93137148e96bca0280d35e99&mode=current_text'),
(89,1206,'US','2011000','HR','Licensed Independent Insurance Producers','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends title XXVII of the Public Health Service Act to preserve consumer and employer access to licensed independent insurance producers.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1206&ciq=voices&client_md=15aa2d46704bca91b5c2ed5a8f137f70&mode=current_text'),
(90,1207,'US','2011000','HR','Establish and Operate a Visitor Facility','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Authorizes the Secretary of the Interior to establish and operate a visitor facility to fulfill the purposes of the Marianas Trench Marine National Monument, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1207&ciq=voices&client_md=b69a65ded26398ca3ae109a20ca5f6f3&mode=current_text'),
(91,1208,'US','2011000','HR','Expert Witness Fees and Others Expenses','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Individuals with Disabilities Education Act to permit a prevailing party in an action or proceeding brought to enforce the Act to be awarded expert witness fees and certain other expenses.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1208&ciq=voices&client_md=e0ec1722a1e081e7d6ead581f9e203e8&mode=current_text'),
(92,1209,'US','2011000','HR','Housing Choice Voucher Program','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee',NULL,'Reforms the housing choice voucher program under section 8 of the United States Housing Act of 1937.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1209&ciq=voices&client_md=574c618021559c9ecda37a0a675a82f0&mode=current_text'),
(93,1210,'US','2011000','HR','Maritime Liens on Fishing Permits','2011-03-17','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Provides limitations on maritime liens on fishing permits, and for other purposes.','To HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1210&ciq=voices&client_md=e86e0661da0738005e0ba156bdf66897&mode=current_text'),
(94,13,'US','2011000','HCR','The Official Motto of the United States','2011-01-26','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Reaffirms \"In God We Trust\" as the official motto of the United States and supporting and encouraging the public display of the national motto in all public buildings, public schools, and other government institutions.','In HOUSE Committee on JUDICIARY:  Ordered to be reported.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HCR13&ciq=voices&client_md=dedcb8b4337004a373a4dc03ffdd2cc8&mode=current_text'),
(95,28,'US','2011000','HCR','Removal of Armed Forces from Afghanistan','2011-03-09','0000-00-00','0000-00-00','','Failed','HOUSE',NULL,'Directs the President, pursuant to section 5(c) of the War Powers Resolution, to remove the United States Armed Forces from Afghanistan.','In HOUSE.  Failed to pass HOUSE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HCR28&ciq=voices&client_md=bd693ffb9baec0d94bcbe1ab939539c7&mode=current_text'),
(96,30,'US','2011000','HCR','Conditional Adjournment','2011-03-15','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Provides for a conditional adjournment of the House of Representatives and a conditional recess or adjournment of the Senate.','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HCR30&ciq=voices&client_md=8a7be30ec3018bc07b1dbaaceacfc03a&mode=current_text'),
(97,48,'US','2011000','HJR','Appropriations for Fiscal Year 2011','2011-03-11','0000-00-00','2011-03-18','Enacted','Enacted','Chaptered',NULL,'Makes further continuing appropriations for fiscal year 2011, and for other purposes.','Public Law No. 112-6','2011-03-18','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HJR48&ciq=voices&client_md=645dab22f87855ecf23b3f8bcbad5efc&mode=current_text'),
(98,147,'US','2011000','HRES','Expenses of Committees of the House of Representatives','2011-03-08','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Provides for the expenses of certain committees of the House of Representatives in the One Hundred Twelfth Congress.','In HOUSE.  Passed HOUSE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES147&ciq=voices&client_md=3ffdf955e6548d37c9548efd89524b5b&mode=current_text'),
(99,174,'US','2011000','HRES','Consideration of House Bill 1073','2011-03-16','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Provides for consideration of the bill (H.R. 1076) to prohibit Federal funding of National Public Radio and the use of Federal funds to acquire radio content.','In HOUSE.  Passed HOUSE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES174&ciq=voices&client_md=5197e021c074b40b2b605a486cc2a051&mode=current_text'),
(100,176,'US','2011000','HRES','Anti-Tuberculosis Programs Progress','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Commends the progress made by anti-tuberculosis programs.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES176&ciq=voices&client_md=59d5830ce2464ae1179551db27bd1928&mode=current_text'),
(101,177,'US','2011000','HRES','Lasting Peace in Sri Lanka','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee',NULL,'Expresses support for internal rebuilding, resettlement, and reconciliation within Sri Lanka that are necessary to ensure a lasting peace.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES177&ciq=voices&client_md=d7aef3f4cb94da9ecd8d093a25f77bd4&mode=current_text'),
(102,178,'US','2011000','HRES','Duplicative Program Report on Bill or Joint Resolution','2011-03-17','0000-00-00','0000-00-00','','Pending','House Rules Committee',NULL,'Amends the Rules of the House of Representatives to require a committee report on a bill or joint resolution to include a statement of whether the legislation creates any duplicative programs.','To HOUSE Committee on RULES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES178&ciq=voices&client_md=29cc831b0c6719a2402a6295deb78c21&mode=current_text'),
(103,179,'US','2011000','HRES','Heroic Human Endeavor of the People of Crete','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee',NULL,'Recognizes and appreciating the historical significance and the heroic human endeavor and sacrifice of the people of Crete during World War II and commending the PanCretan Association of America.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES179&ciq=voices&client_md=aa866a7b31cf723a3022172a3194b7c0&mode=current_text'),
(104,180,'US','2011000','HRES','Religious Freedoms of the Ecumenical Patriarchate','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee',NULL,'Urges Turkey to respect the rights and religious freedoms of the Ecumenical Patriarchate.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES180&ciq=voices&client_md=e8b49640fa48ae6f83119cf6a2b01643&mode=current_text'),
(105,181,'US','2011000','HRES','Honors Memory of Christina-Taylor Green','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Honors the memory of Christina-Taylor Green by encouraging schools to teach civic education and civil discourse in public schools.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES181&ciq=voices&client_md=311ec10f2210950830341554a76522de&mode=current_text'),
(106,182,'US','2011000','HRES','Honors Struggle to Improve Worker Safety Standards','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Recognizes the historical significance of the Triangle Fire in the struggle to improve worker safety standards and protections on the 100th anniversary of the fire.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES182&ciq=voices&client_md=8c94d266465b0b41d187094f9065fe34&mode=current_text'),
(107,183,'US','2011000','HRES','Recognizes U.S. Army Company E','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee',NULL,'Recognizes Company E, 100th Battalion, 442d Infantry Regiment of the United States Army and the sacrifice of the soldiers of Company E and their families in support of the United States.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES183&ciq=voices&client_md=93d078c00847cd3cf05665a9f5139956&mode=current_text'),
(108,184,'US','2011000','HRES','Welcome Home Vietnam Veterans Day','2011-03-17','0000-00-00','0000-00-00','','Pending','House Veterans\' Affairs Committee',NULL,'Expresses support for designation of a \"Welcome Home Vietnam Veterans Day\".','To HOUSE Committee on VETERANS\' AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES184&ciq=voices&client_md=3fec538f81e51785b5ad70ff8c97696a&mode=current_text'),
(109,193,'US','2011000','S','Sunset of Provisions of USA Patriot Act','2011-01-26','0000-00-00','0000-00-00','','Pending','SENATE',NULL,'Extends the sunset of certain provisions of the USA patriot Act, and for other purposes.','In SENATE.  Placed on SENATE Legislative Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S193&ciq=voices&client_md=f108b14cb1fc5d54ac3a600efa71fb01&mode=current_text'),
(110,307,'US','2011000','S','Federal Building and Courthouse Designation','2011-02-08','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Designates the Federal building and United States courthouse located at 217 West King Street, Martinsburg, West Virginia, as the \"W. Craig Broadwater Federal Building and United States Courthouse\".','In HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE:  Ordered to be reported.','2011-03-16','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S307&ciq=voices&client_md=0e8b9abc260ec89bb735bc561da53620&mode=current_text'),
(111,493,'US','2011000','S','SBIR and STTR Programs','2011-03-04','2011-03-16','0000-00-00','','Pending','SENATE',NULL,'Reauthorizes and improve the SBIR and STTR programs, and for other purposes.','In SENATE.  Amendment SA 244 proposed by Senator Landrieu to Amendment SA 183.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S493&ciq=voices&client_md=c964e42c67f2c0cba508f397da668980&mode=current_text'),
(112,604,'US','2011000','S','Marriage and Family Therapist Service Coverage','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Amends title XVIII of the Social Security Act to provide for the coverage of marriage and family therapist services and mental health counselor services under part B of the Medicare program, and for other purposes.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S604&ciq=voices&client_md=525875fcd0f5ccff0803bd3343328d18&mode=current_text'),
(113,605,'US','2011000','S','Place Synthetic Drugs in Schedule 1','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Amends the Controlled Substances Act to place synthetic drugs in Schedule I.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S605&ciq=voices&client_md=5167eff94b2a8dd8195b051664e656cf&mode=current_text'),
(114,606,'US','2011000','S','Incentive Program for Tropical Pediatric Diseases','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Amends the Federal Food, Drug, and Cosmetic Act to improve the priority review voucher incentive program relating to tropical and rare pediatric diseases.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S606&ciq=voices&client_md=67de0e9b6fda7674a2734b852b8406de&mode=current_text'),
(115,607,'US','2011000','S','Exchange of Lands in Oregon','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Designates certain land in the State of Oregon as wilderness; provides for the exchange of certain Federal land and non-Federal land, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S607&ciq=voices&client_md=2f85c24401dfbc7311ef378ebe75353c&mode=current_text'),
(116,608,'US','2011000','S','Maritime Liens on Fishing Licenses','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe',NULL,'Provides limitations on maritime liens on fishing licenses and for other purposes.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S608&ciq=voices&client_md=c438204d3d80fb5f70a833bd09cc5df5&mode=current_text'),
(117,609,'US','2011000','S','Effects of Federal Regulatory Mandates','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Environment and Public Works Committee',NULL,'Provides for the establishment of a committee to assess the effects of certain Federal regulatory mandates.','To SENATE Committee on ENVIRONMENT AND PUBLIC WORKS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S609&ciq=voices&client_md=45bf292fb7661d337b600013a5650d6e&mode=current_text'),
(118,610,'US','2011000','S','Conveyance of Land in Oklahoma','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Agriculture, Nutrition & Forestry Committee',NULL,'Provides for the conveyance of approximately 140 Acres of land in the Ouachita National Forest in Oklahoma to the Indian Nations Council, Inc., of the Boy Scouts of America, and for other purposes.','To SENATE Committee on AGRICULTURE, NUTRITION AND FORESTRY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S610&ciq=voices&client_md=20d065293a2664066447b83ec2a66e74&mode=current_text'),
(119,611,'US','2011000','S','Greater Technical Resources to FCC Commissioners','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe',NULL,'Provides greater technical resources to FCC Commissioners.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S611&ciq=voices&client_md=ab336b0e6ebb3e8bfcef427b98c295e1&mode=current_text'),
(120,612,'US','2011000','S','Reduce Consumption of Petroleum Products by Government','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Amends the Energy Policy and Confirmation Act to require the Secretary of Energy to develop and implement a strategic petroleum demand response plan to reduce the consumption of petroleum products by the Federal Government.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S612&ciq=voices&client_md=6e8779b526ca28c497813df26f0dcc68&mode=current_text'),
(121,613,'US','2011000','S','Expert Witness Fees','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Amends the Individuals with Disabilities Education Act to permit a prevailing party in an action or proceeding brought to enforce the Act to be awarded expert witness fees and certain other expenses.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S613&ciq=voices&client_md=01f89a6571bcf518207e199f1fdc7348&mode=current_text'),
(122,614,'US','2011000','S','Trial for Unprivileged Enemy Belligerent in Court','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Requires the Attorney General to consult with appropriate officials within the executive branch prior to making the decision to try an unprivileged enemy belligerent in Federal Court.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S614&ciq=voices&client_md=9deb7145d7770e141bf398ddd8f870d9&mode=current_text'),
(123,615,'US','2011000','S','Alternative Infrastructure to Improve Efficiency','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Homeland Security and Governmental Affairs ',NULL,'Improves the accountability and transparency in infrastructure spending by requiring a life-cycle cost analysis of major infrastructure projects; provides the flexibility to use alternate infrastructure type bidding procedures to reduce project costs; and requires the use of design standards to improve efficiency and save taxpayer dollars.','To SENATE Committee on HOMELAND SECURITY AND GOVERNMENTAL AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S615&ciq=voices&client_md=af5ac0058d1091e15d5c5259cbf7a7bf&mode=current_text'),
(124,616,'US','2011000','S','Support the Community Schools Model','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Amends the Elementary and Secondary Education Act of 1965 in order to support the community schools model.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S616&ciq=voices&client_md=82c9fcd8e04550f19903b3129eb08f08&mode=current_text'),
(125,617,'US','2011000','S','Convey Land in Elko County, Nevada','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Requires the Secretary of the Interior to convey certain Federal land to Elko County, Nevada, and to take land into trust for the Te-moak Tribe of Western Shoshone Indians of Nevada, and or other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S617&ciq=voices&client_md=e2a535bb5cf5f7bcb2b873e86a518352&mode=current_text'),
(126,618,'US','2011000','S','The Private Sector in Egypt and Tunisia','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee',NULL,'Promotes the strengthening of the private sector in Egypt and Tunisia.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S618&ciq=voices&client_md=0e64b2187a5186082e5e8a89c011bd3c&mode=current_text'),
(127,619,'US','2011000','S','Strengthens the Capacity of Elementary Schools','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Assists in the coordination among science, technology, engineering, and mathematics efforts in the States; strengthens the capacity of elementary schools, middle schools, and secondary schools to prepare students in science, technology, engineering, and mathematics, and for other purposes.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S619&ciq=voices&client_md=00c8b48afbcf2adf6237a2331f50e282&mode=current_text'),
(128,620,'US','2011000','S','Fire Safety Education Programs on College Campuses','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Authorizes the Secretary of Education to make grants to support fire safety education programs on college campuses.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S620&ciq=voices&client_md=8a816238b0a022f692690f6874e0cb7b&mode=current_text'),
(129,621,'US','2011000','S','Excess Funds Available from Surface Mining','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Amends the Surface Mining Control and Reclamation Act of 1977 to provide for use of excess funds available under that Act to provide for certain benefits, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S621&ciq=voices&client_md=f1780e3bab50b98c5b9883b1753f0967&mode=current_text'),
(130,622,'US','2011000','S','Regulation and Assessment for Public Schools','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Establishes the Commission on Effective Regulation and Assessment Systems for Public Schools.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S622&ciq=voices&client_md=a8f2bc3e60d0fb8ab0fa6c309ac65cd0&mode=current_text'),
(131,623,'US','2011000','S','Disclosures of Discovery Information in Civil Actions','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Amends chapter 111 of title 28, United States Code, relating to protective orders, sealing of cases, disclosures of discovery information in civil actions, and for other purposes.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S623&ciq=voices&client_md=ac5be4369550aad44db9ec56602b4f55&mode=current_text'),
(132,624,'US','2011000','S','Transform Neighborhoods of Extreme Poverty','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Banking, Housing and Urban Affairs Committe',NULL,'Authorizes the Department of Housing and Urban Development to transform neighborhoods of extreme poverty into sustainable, mixed-income neighborhoods with access to economic opportunities, by revitalizing severely distressed housing, and investing and leveraging investments in well-functioning services, educational opportunities, public assets, public transportation, and improved access to jobs.','To SENATE Committee on BANKING, HOUSING AND URBAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S624&ciq=voices&client_md=78a9dfeccf0b3b769604e820b2eba6c7&mode=current_text'),
(133,625,'US','2011000','S','Statewide Transportation Planning','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Environment and Public Works Committee',NULL,'Amends title 23, United States Code, to incorporate regional transportation planning organizations into statewide transportation planning, and for other purposes.','To SENATE Committee on ENVIRONMENT AND PUBLIC WORKS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S625&ciq=voices&client_md=d396437f4fb60147a60219e3f9ee7b46&mode=current_text'),
(134,626,'US','2011000','S','Incentive to Reinvest Foreign Shipping Earnings','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Amends the Internal Revenue Code of 1986 to repeal the shipping investment withdrawal rules in section 955 and to provide an incentive to reinvest foreign shipping earnings in the United States.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S626&ciq=voices&client_md=0097db78376bc3aed18c409866eb9922&mode=current_text'),
(135,627,'US','2011000','S','Processing Delays on Freedom of Information','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Establishes the Commission on Freedom of Information Act Processing Delays.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S627&ciq=voices&client_md=f78c320aacf019a301b74c5bc4bc78ff&mode=current_text'),
(136,628,'US','2011000','S','Alaskan Railroad Corporation Right of Way','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Authorizes the Secretary of the Interior to convey a railroad right of way between North Pole, Alaska, and Delta Junction, Alaska, to the Alaska Railroad Corporation.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S628&ciq=voices&client_md=8c1e68bc3bc8c54e11a545d3eac7dfc3&mode=current_text'),
(137,629,'US','2011000','S','Hydropower Improvements','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Improves hydropower, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S629&ciq=voices&client_md=854780a56b30a299164df0810f0a2d05&mode=current_text'),
(138,630,'US','2011000','S','Hydrokinetic Renewable Energy Research','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Promotes marine and hydrokinetic renewable energy research and development, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S630&ciq=voices&client_md=2cb44f573773cab9f8333f0394d6b859&mode=current_text'),
(139,631,'US','2011000','S','Tax Provisions Generated by Hydropower Resources','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Extends certain Federal benefits and income tax provisions to energy generated by hydropower resources.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S631&ciq=voices&client_md=b8c3150cd0daffde48fcde11cbfed34b&mode=current_text'),
(140,632,'US','2011000','S','Rebuilding Over-Fished Fisheries','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe',NULL,'Amends the Magnuson-Stevens Fishery Conservation and Management Act to extend the authorized period for rebuilding of certain overfished fisheries, and for other purposes.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S632&ciq=voices&client_md=7a9c966441e4b81158c426c80a7c23d7&mode=current_text'),
(141,633,'US','2011000','S','Fraud in Small Business Contracting','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Small Business and Entrepreneurship Committ',NULL,'Prevents fraud in small business contracting, and for other purposes.','To SENATE Committee on SMALL BUSINESS AND ENTREPRENEURSHIP.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S633&ciq=voices&client_md=f447408c958f83ef5b521b7fd49a93b5&mode=current_text'),
(142,634,'US','2011000','S','Deportation to Nazi Concentration Camps by Train','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Ensures that the courts of the United States may provide an impartial forum for claims brought by United States citizens and others against any railroad organized as a separate legal entity, arising from the deportation of United States citizens and others to Nazi concentration camps on trains owned or operated by such railroad, and by the heirs and survivors of such persons.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S634&ciq=voices&client_md=3d433c891dcafaf30ada6e3f9d71d118&mode=current_text'),
(143,635,'US','2011000','S','Sell Lands Suitable for Disposal','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Directs the Secretary of the Interior to sell certain Federal lands in Arizona, Colorado, Idaho, Montana, Nebraska, Nevada, New Mexico, Oregon, Utah, and Wyoming, previously identified as suitable for disposal, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S635&ciq=voices&client_md=9c247fbd86c7e2ad95a6ece0e4d28049&mode=current_text'),
(144,636,'US','2011000','S','Quileute Indian Tribe Tsunami and Flood Protection','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Indian Affairs Committee',NULL,'Provides the Quileute Indian Tribe Tsunami and Flood Protection, and for other purposes.','To SENATE Committee on INDIAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S636&ciq=voices&client_md=c43f91caf562d409d153a2bc45069d9b&mode=current_text'),
(145,637,'US','2011000','S','Guarantees for Debt Issued on Behalf of Catastrophes','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Banking, Housing and Urban Affairs Committe',NULL,'Establishes a program to provide guarantees for debt issued by or on behalf of State catastrophe insurance programs to assist in the financial recovery from earthquakes, earthquake-induced landslides, volcanic eruptions, and tsunamis.','To SENATE Committee on BANKING, HOUSING AND URBAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S637&ciq=voices&client_md=d3246dd972546e92ac99b02d1aab81a8&mode=current_text'),
(146,638,'US','2011000','S','Incarcerating Undocumented Aliens Charged with a Felony','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Amends the Immigration and Nationality Act to provide for compensation to States incarcerating undocumented aliens charged with a felony or two or more misdemeanors.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S638&ciq=voices&client_md=4f82961e5e0445926a4cf4c01c3a1e12&mode=current_text'),
(147,639,'US','2011000','S','State Criminal Alien Assistance Program','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Authorizes to be appropriated $950,000,000 for each of the fiscal years 2012 through 2015 to carry out the State Criminal Alien Assistance Program.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S639&ciq=voices&client_md=cbd15b53c944d3b1204aec9ff7e65ab6&mode=current_text'),
(148,640,'US','2011000','S','Importance of International Nuclear Safety Cooperation','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee',NULL,'Underscores the importance of international nuclear safety cooperation for operating power reactors; encourages the efforts of the Convention on Nuclear Safety; supports progress in improving nuclear safety; enhances the public availability of nuclear safety information.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S640&ciq=voices&client_md=9a650fc72d4a6c529dd8e7bf0544f6aa&mode=current_text'),
(149,641,'US','2011000','S','Provides Access to Safe Drinking Water','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee',NULL,'Provides 100,000,000 people with first-time access to safe drinking water and sanitation on a sustainable basis within six years by improving the capacity of the United States Government to fully implement the Senator Paul Simon Water for the Poor Act of 2005.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S641&ciq=voices&client_md=3925b8b7074629a6b4e64754d5b15392&mode=current_text'),
(150,642,'US','2011000','S','The EB 5 Regional Center Program','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Permanently reauthorizes the EB-5 Regional Center Program.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S642&ciq=voices&client_md=499f385cd61821be80f36848766039bc&mode=current_text'),
(151,643,'US','2011000','S','Payments to Qualified Health Centers and Rural Clinics','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Amends title XIX of the Social Security Act to direct Medicaid Electronic Health Records incentive payments to federally qualified health centers and rural health clinics.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S643&ciq=voices&client_md=ae9db59f7a905b95562174754d44f74f&mode=current_text'),
(152,644,'US','2011000','S','Coverage for Annuity Purposes','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Homeland Security and Governmental Affairs ',NULL,'Amends subchapter II of chapter 84 of title 5, United States Code, to prohibit coverage for annuity purposes for any individual hired as a Federal employee after 2012.','To SENATE Committee on HOMELAND SECURITY AND GOVERNMENTAL AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S644&ciq=voices&client_md=e2ea69e864a8c7c1b78a29fd58f73b66&mode=current_text'),
(153,645,'US','2011000','S','Permanent Background Check System','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Amends the National Child Protection Act of 1993 to establish a permanent background check system.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S645&ciq=voices&client_md=02022357b43b8999005394eabeb6c342&mode=current_text'),
(154,646,'US','2011000','S','Federal Natural Hazards Reduction Programs','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe',NULL,'Reauthorizes Federal natural hazards reduction programs, and for other purposes.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S646&ciq=voices&client_md=b97f888de1f8b3e121d605a295c02f74&mode=current_text'),
(155,647,'US','2011000','S','Mineral Rights in Montana','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Authorizes the conveyance of mineral rights by the Secretary of the Interior in the State of Montana, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S647&ciq=voices&client_md=cd154910158b52ef232250d6454211f5&mode=current_text'),
(156,648,'US','2011000','S','Waiting Period Waiver for Huntington\'s Disease','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Requires the Commissioner of Social Security to revise the medical and evaluation criteria for determining disability in a person diagnosed with Huntington\'s Disease and to waive the 24-month waiting period for Medicare eligibility for individuals disabled by Huntington\'s Disease.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S648&ciq=voices&client_md=ee119885b3b61b4cf81cda4298b83adf&mode=current_text'),
(157,649,'US','2011000','S','Awareness Activities for Bone and Skin Diseases','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Expands the research and awareness activities of the National Institute of Arthritis and Musculoskeletal and Skin Diseases and the Centers for Disease Control and Prevention with respect to scleroderma, and for other purposes.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S649&ciq=voices&client_md=b63dd5d529743658cf16fe21d3807bfb&mode=current_text'),
(158,650,'US','2011000','S','Criteria used to Grant Waivers for Health Care Law','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Requires greater transparency concerning the criteria used to grant waivers to the job-killing health care law and to ensure that applications for such waivers are treated in a fair and consistent manner, irrespective of the applicant\'s political contributions or association with a labor union, a health plan provided for under a collective bargaining agreement, or another organized labor group.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S650&ciq=voices&client_md=5ccbed0a51605b5b0a642299bde436ee&mode=current_text'),
(159,651,'US','2011000','S','McKinney Lake National Fish Hatchery to North Carolina','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Environment and Public Works Committee',NULL,'Requires the Secretary of the Interior to convey the McKinney Lake National Fish Hatchery to the State of North Carolina, and for other purposes.','To SENATE Committee on ENVIRONMENT AND PUBLIC WORKS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S651&ciq=voices&client_md=243912d7847c80e7094786268c6eef6d&mode=current_text'),
(160,652,'US','2011000','S','Efficient Investments and Infrastructure Financing','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Facilitates efficient investments and financing of infrastructure projects and new job creation through the establishment of an American Infrastructure Financing Authority; provides for an extension of the exemption from the alternative minimum tax treatment for certain tax-exempt bonds, and for other purposes.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S652&ciq=voices&client_md=1db470ff527f9e1df957c3d3ba3bf69a&mode=current_text'),
(161,51,'US','2011000','SRES','Celebrating Greek and American Democracy','2011-02-15','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Recognizes the 190th anniversary of the independence of Greece and celebrating Greek and American democracy.','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES51&ciq=voices&client_md=5bf435747072ac8d554c2dc6bdb25f03&mode=current_text'),
(162,104,'US','2011000','SRES','Campus Fire Safety Month','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Designates September 2011 as \"Campus Fire Safety Month\".','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES104&ciq=voices&client_md=379f0b29f885cc837d0d4277bb92c43f&mode=current_text'),
(163,105,'US','2011000','SRES','Belarus Elections Meeting International Standards','2011-03-17','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Condemns the December 19, 2010, elections in Belarus, and to call for the immediate release of all political prisoners and for new elections that meet international standards.','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES105&ciq=voices&client_md=e4de91da732656d49aed30062c01ce0f&mode=current_text'),
(164,106,'US','2011000','SRES','Honors Triangle Shirtwaist Company Fire in 1911','2011-03-17','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Recognizes the 100th anniversary of the Triangle Shirtwaist Company fire in New York City on March 25, 1911, and designating the week of March 21, 2011, through March 25, 2011, as the \"100th Anniversary of the Triangle Shirtwaist Factory Fire Remembrance Week\".','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES106&ciq=voices&client_md=8c1d37f022bed39cccdc94906b393dc7&mode=current_text'),
(165,107,'US','2011000','SRES','National Association of Junior Auxiliaries Day','2011-03-17','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Designates April 4, 2011, as \"National Association of Junior Auxiliaries Day\".','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES107&ciq=voices&client_md=28f7d0f65bddcd2c449f8636de9761d0&mode=current_text'),
(166,108,'US','2011000','SRES','Investment Relations Between the U.S. and Brazil','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee',NULL,'Expresses the sense of the Senate on the importance of strengthening investment relations between the United States and Brazil.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES108&ciq=voices&client_md=5360749531d016cab37b30f1eb55dac1&mode=current_text'),
(167,300,'US','2011000','HCR','Conditional Adjournment','2011-03-15','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Provides for a conditional adjournment of the House of Representatives and a conditional recess or adjournment of the Senate.','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HCR30&ciq=voices&client_md=8a7be30ec3018bc07b1dbaaceacfc03a&mode=current_text');

/*Table structure for table `tbl_bill_detail_old` */

DROP TABLE IF EXISTS `tbl_bill_detail_old`;

CREATE TABLE `tbl_bill_detail_old` (
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
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbl_bill_detail_old` */

insert into `tbl_bill_detail_old` values 
(1,440,'US','2011000','HR','DC Opportunity Scholarship Program','2011-01-26','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Reauthorizes the DC opportunity scholarship program, and for other purposes.','In HOUSE. Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H471&ciq=voices&client_md=b834001e878eedb64f7658c70e00bd13&mode=current_text'),
(2,480,'US','2011000','HR','DC Opportunity Scholarship Program','2011-01-26','0000-00-00','0000-00-00','','Adopted','HOUSE',NULL,'Reauthorizes the DC opportunity scholarship program, and for other purposes.','In HOUSE. Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H471&ciq=voices&client_md=b834001e878eedb64f7658c70e00bd13&mode=current_text'),
(3,485,'US','2011000','HR','DC Opportunity Scholarship Program','2011-01-26','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Reauthorizes the DC opportunity scholarship program, and for other purposes.','In HOUSE. Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H471&ciq=voices&client_md=b834001e878eedb64f7658c70e00bd13&mode=current_text'),
(4,1210,'US','2011000','HR','Maritime Liens on Fishing Permits','2011-03-17','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Provides limitations on maritime liens on fishing permits, and for other purposes.','To HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1210&ciq=voices&client_md=e86e0661da0738005e0ba156bdf66897&mode=current_text'),
(5,1209,'US','2011000','HR','Housing Choice Voucher Program','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee',NULL,'Reforms the housing choice voucher program under section 8 of the United States Housing Act of 1937.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1209&ciq=voices&client_md=574c618021559c9ecda37a0a675a82f0&mode=current_text'),
(6,3,'US','2011000','HR','Prohibit Taxpayer Funds to be Used for Abortions','2011-01-20','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Prohibits taxpayer funded abortions and to provide for conscience protect ions, and for other purposes.','From HOUSE Committee on JUDICIARY:  Reported as amended.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H3&ciq=voices&client_md=50bb121395f7e0d5c125f84a1fff9dab&mode=current_text'),
(7,5,'US','2011000','HR','Patient Access to Health Care Services','2011-01-24','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Improves patient access to health care services and provide improved Medical care by reducing the excessive burden the liability system places on the health care delivery system.','From HOUSE Committee on JUDICIARY:  Reported as amended.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H5&ciq=voices&client_md=cfa518a0273e7e3a0b92c46de4660328&mode=current_text'),
(8,358,'US','2011000','HR','Special Considerations for Abortions in Health Care Act','2011-01-20','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Relates to the Protect Life Act; amends the Patient Protection and Affordable Care Act to modify special rules relating to coverage of abortion services under such Act.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H358&ciq=voices&client_md=3f83be80dafa2d44d34c7df70a9a43f0&mode=current_text'),
(9,471,'US','2011000','HR','DC Opportunity Scholarship Program','2011-01-26','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Reauthorizes the DC opportunity scholarship program, and for other purposes.','In HOUSE. Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H471&ciq=voices&client_md=b834001e878eedb64f7658c70e00bd13&mode=current_text'),
(10,522,'US','2011000','HR','Safety Standard for Exposure to Combustible Dust','2011-02-08','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Requires the Secretary of Labor to issue an interim occupational safety and health standard regarding worker exposure to combustible dust, and for other purposes.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H522&ciq=voices&client_md=7b521cb09d8daf72eb9cccf4e156c83d&mode=current_text'),
(11,571,'US','2011000','HR','Occupational Safety and Health Plans Review Process','2011-02-09','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Requires a heightened review process by the Secretary of Labor of State occupational safety and health plans, and for other purposes.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H571&ciq=voices&client_md=074921d438a2964fea69874914eaa98e&mode=current_text'),
(12,587,'US','2011000','HR','Restore the Nations Natural and Cultural Resources','2011-02-09','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Public Lands Corps Act of 1993 to expand the authorization of the Secretaries of Agriculture, Commerce, and the Interior to provide service opportunities for young Americans; helps restore the nation\'s natural, cultural, historic, archaeological, recreational and scenic resources; trains a new generation of public land managers and enthusiasts; promotes the value of public service.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H587&ciq=voices&client_md=a619150bb03e8c6bfb55a29e700edee0&mode=current_text'),
(13,604,'US','2011000','HR','Disabled Youth Transition to Adulthood','2011-02-10','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Rehabilitation Act of 1973 to authorize grants for the transition of youths with significant disabilities to adulthood, and for other purposes.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H604&ciq=voices&client_md=9dfbfe6c240568e7039b900fa15ab949&mode=current_text'),
(14,623,'US','2011000','HR','National Commission on State Workers Compensation Laws','2011-02-10','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Establishes the National Commission on State Workers\' Compensation Laws.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H623&ciq=voices&client_md=8569e85deb164637719b2fc1a94b63a1&mode=current_text'),
(15,631,'US','2011000','HR','Base Minimum Wage for Tipped Employees','2011-02-10','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Fair Labor Standards Act of 1938 to establish a base minimum wage for tipped employees.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H631&ciq=voices&client_md=1041f8914ab053f538a9a056a8b194a3&mode=current_text'),
(16,683,'US','2011000','HR','Grants to the National Urban League for Urban Jobs','2011-02-11','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Workforce Investment Act of 1998 to authorize the Secretary of Labor to provide grants to the National Urban League for an Urban Jobs Program, and for other purposes.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H683&ciq=voices&client_md=b0c55abdc08098d869e49477a864fe2e&mode=current_text'),
(17,711,'US','2011000','HR','Establishment of Youth Corps Programs','2011-02-15','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Workforce Investment Act of 1998 to provide for the establishment of Youth Corps programs and provide for wider dissemination of the Youth Corps model.','In HOUSE Committee on EDUCATION & WORKFORCE:  Referred to Subcommittee on HIGHER EDUCATION AND WORKFORCE TRAINING.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H711&ciq=voices&client_md=b7840a38e6c7ff931d68ab6ecb665186&mode=current_text'),
(18,745,'US','2011000','HR','Wage Requirements of the Davis-Bacon Act','2011-02-16','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Repeals the wage rate requirements commonly known as the Davis-Bacon Act.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H745&ciq=voices&client_md=f68db7a8b865b9f2309a1988d50b58e4&mode=current_text'),
(19,746,'US','2011000','HR','Wage Rate Requirements','2011-02-16','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Repeals the wage rate requirements commonly known as the Davis-Bacon Act.','In HOUSE Committee on EDUCATION AND LABOR:  Referred to Subcommittee on WORKFORCE PROTECTIONS.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H746&ciq=voices&client_md=fee43a55578ac885ec09919cac45e073&mode=current_text'),
(20,840,'US','2011000','HR','Offshore Energy Exploration Drilling Permits','2011-02-28','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Allows the conduct of offshore energy exploration, development, and production operations under drilling permits previously issued by the Minerals Management Service, and for other purposes.','In HOUSE Committee on NATURAL RESOURCES:  Referred to Subcommittee on ENERGY AND MINERAL RESOURCES.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H840&ciq=voices&client_md=2b23fcf38361c6e8ae969d5deb6e9457&mode=current_text'),
(21,856,'US','2011000','HR','Clark County, Nevada Mining Laws','2011-03-01','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Relates to the Sloan Hills Withdrawal Act; withdraws certain land located in Clark County, Nevada, from location, entry, and patent under the mining Laws and disposition under all Laws pertaining to mineral and geothermal leasing or mineral materials, and for other purposes.','In HOUSE Committee on NATURAL RESOURCES:  Referred to Subcommittee on ENERGY AND MINERAL RESOURCES.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H856&ciq=voices&client_md=90bce1bae40494f02c49bfd31de48f15&mode=current_text'),
(22,861,'US','2011000','HR','Funding for the Neighborhood Stabilization Program','2011-03-01','2011-03-16','0000-00-00','','Pending','Senate Banking, Housing and Urban Affairs Committe',NULL,'Relates to the NSP Termination Act; rescinds the third round of funding for the Neighborhood Stabilization Program and to terminate the program.','To SENATE Committee on BANKING, HOUSING AND URBAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H861&ciq=voices&client_md=7bbb2fce7879aab2e0338d43d9fcb765&mode=current_text'),
(23,872,'US','2011000','HR','Pesticide Use in Near or Navigable Waters','2011-03-02','0000-00-00','0000-00-00','','Pending','House Agriculture Committee',NULL,'Amends the Federal Insecticide, Fungicide, and Rodenticide Act and the Federal Water Pollution Control Act to clarify Congressional intent regarding the regulation of the use of pesticides in or near navigable waters, and for other purposes.','In HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE:  Ordered to be reported as amended.','2011-03-16','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H872&ciq=voices&client_md=a42247a9bc8cb7674875c1f7cf2cbc52&mode=current_text'),
(24,892,'US','2011000','HR','Separation of the Great Lakes and Mississippi River','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Requires the Secretary of the Army to study the feasibility of the hydrological separation of the Great Lakes and Mississippi River Basins.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on WATER RESOURCES AND ENVIRONMENT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H892&ciq=voices&client_md=db09a8bc6aa54bea4184e9c54abee965&mode=current_text'),
(25,897,'US','2011000','HR','Programs for Residential and Commuter Tolls','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Provides authority and sanction for the granting and issuance of programs for residential and commuter toll, user fee and fare discounts by States, municipalities, other localities, and all related agencies and departments, and for other purposes.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on HIGHWAYS AND TRANSIT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H897&ciq=voices&client_md=5c4791b907341645a9ff644bb46a1c2f&mode=current_text'),
(26,899,'US','2011000','HR','Protests of Task and Order Delivery Contracts','2011-03-03','0000-00-00','0000-00-00','','Pending','HOUSE',NULL,'Amends title 41, United States Code, to extend the sunset date for certain protests of task and deliver order contracts.','In HOUSE.  Placed on HOUSE Union Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H899&ciq=voices&client_md=21d74c31d36a384370357f35a02293d8&mode=current_text'),
(27,904,'US','2011000','HR','Funding to Check Motorcycle Helmet Usage','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Prohibits the Secretary of Transportation from providing grants or any funds to a State, county, town, or township, Indian tribe, municipal or other local government to be used for any program to check helmet usage or create checkpoints for a motorcycle driver or passenger.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on HIGHWAYS AND TRANSIT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H904&ciq=voices&client_md=a8890380d24c05172e15d21a0e020a29&mode=current_text'),
(28,922,'US','2011000','HR','Protection from Flood Hazards Resulting from Wildfires','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Ensures that private property, public safety, and human life are protected from flood hazards that directly result from post-fire watershed conditions that are created by wildfires on Federal land.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on WATER RESOURCES AND ENVIRONMENT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H922&ciq=voices&client_md=1f23b319863860117f7f9bb5bd731d99&mode=current_text'),
(29,929,'US','2011000','HR','Expand and Improve Transit Training Programs','2011-03-03','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Amends title 49, United States Code, to expand and improve transit training programs.','In HOUSE Committee on TRANSPORTATION & INFRASTRUCTURE:  Referred to Subcommittee on HIGHWAYS AND TRANSIT.','2011-03-04','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H929&ciq=voices&client_md=cd0846719ab1fe4b4cf82f0625a4acfa&mode=current_text'),
(30,1021,'US','2011000','HR','Temporary Office of Bankruptcy Judges','2011-03-10','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Prevents the termination of the temporary office of bankruptcy judges in certain judicial districts.','In HOUSE Committee on JUDICIARY:  Ordered to be reported as amended.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1021&ciq=voices&client_md=20627e14c695c7366125fb43256cc66e&mode=current_text'),
(31,1076,'US','2011000','HR','Federal Funding of National Public Radio','2011-03-15','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe',NULL,'Prohibits Federal funding of National Public Radio and the use of Federal funds to acquire radio content.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1076&ciq=voices&client_md=7c862db9676b03df26740ab5240e07cb&mode=current_text'),
(32,1144,'US','2011000','HR','Transparency of the Federal Government','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Increases the transparency of the Federal Government, and for other purposes.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1144&ciq=voices&client_md=6023bf61c17857fc8908d4cadc87c4ec&mode=current_text'),
(33,1145,'US','2011000','HR','Emergency Volunteer Liability for Negligence','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Provides construction, architectural, and engineering entities with qualified immunity from liability for negligence when providing services or equipment on a volunteer basis in response to a declared emergency or disaster.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1145&ciq=voices&client_md=41188bce6e3bb423603b1e83aaaa0fdc&mode=current_text'),
(34,1146,'US','2011000','HR','United States Membership in the United Nations','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee',NULL,'Relates to the American Sovereignty Restoration Act of 2009; ends membership of the United States in the United Nations.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1146&ciq=voices&client_md=f71efa7c8b6b2a03a2dbac276390a6ff&mode=current_text'),
(35,1147,'US','2011000','HR','Debt Reduction on Commercial Real Property','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends the Internal Revenue Code of 1986 to allow a deduction for certain payments made to reduce debt on commercial real property.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1147&ciq=voices&client_md=c8747f12ea9d7dbf6a0d670217dc5448&mode=current_text'),
(36,1148,'US','2011000','HR','Insider Trading by Members of Congress','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ethics Committee',NULL,'Prohibits commodities and securities trading based on nonpublic information relating to Congress; requires additional reporting by Members and employees of Congress of securities transactions, and for other purposes.','Additionally referred to HOUSE Committee on ETHICS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1148&ciq=voices&client_md=077d2ae981302989ab4e67da986d6a9a&mode=current_text'),
(37,1149,'US','2011000','HR','Algae-Based Biofuel Producer Credit','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends the Clean Air Act to include algae-based biofuel in the renewable fuel program and amend the Internal Revenue Code of 1986 to include algae-based biofuel in the cellulosic biofuel producer credit.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1149&ciq=voices&client_md=cebdd67dfe1d73f7f760caadd2ec7363&mode=current_text'),
(38,1150,'US','2011000','HR','Health Insurance Business Antitrust Laws','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Restores the application of the Federal antitrust Laws to the business of health insurance to protect competition and consumers.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1150&ciq=voices&client_md=bfa1f5c208c71676a48a3240fb8f8875&mode=current_text'),
(39,1151,'US','2011000','HR','Mortgage Assistance Made by Financial Companies','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee',NULL,'Requires the Secretary of the Treasury to make risk-based assessments on financial companies to recoup the amount of assistance made available for unemployed homeowners under the Emergency Mortgage Relief Program and for States and communities under the Neighborhood Stabilization Program.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1151&ciq=voices&client_md=76bd60b3adf429468d02f5575a8267d5&mode=current_text'),
(40,1152,'US','2011000','HR','Armed Forces Draft Between Ages 18 and 25','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee',NULL,'Requires all persons in the United States between the ages of 18 and 25 to perform national service, either as a member of the uniformed services or in civilian service in furtherance of the national defense and homeland security, to authorize the induction of persons in the uniformed services during wartime to meet end-strength requirements of the uniformed services, and for other purposes.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1152&ciq=voices&client_md=328a80c6a67a694c294e25854d517673&mode=current_text'),
(41,1153,'US','2011000','HR','Terrorism Prosecution in United States District Court','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Provides for consultation by the Department of Justice with other relevant Government agencies before determining to prosecute certain terrorism offenses in United States district court, and for other purposes.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1153&ciq=voices&client_md=2cdd21c15ec504eede225a80ad9b8e1b&mode=current_text'),
(42,1154,'US','2011000','HR','Service Dogs on Department of Veterans Affairs Property','2011-03-17','0000-00-00','0000-00-00','','Pending','House Veterans\' Affairs Committee',NULL,'Amends title 38, United States Code, to prevent the Secretary of Veterans Affairs from prohibiting the use of service dogs on Department of Veterans Affairs property.','To HOUSE Committee on VETERANS\' AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1154&ciq=voices&client_md=c64a8b48b8a456f58f4bd2919e0d05f7&mode=current_text'),
(43,1155,'US','2011000','HR','Terminations, Reductions, and Savings by Budget Office','2011-03-17','0000-00-00','0000-00-00','','Pending','House Rules Committee',NULL,'Establishes procedures for the expedited consideration by Congress of the recommendations set forth in the Terminations, Reductions, and Savings report prepared by the Office of Management and Budget.','Additionally referred to HOUSE Committee on RULES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1155&ciq=voices&client_md=553230d573cc1e19d37b71e320f28373&mode=current_text'),
(44,1156,'US','2011000','HR','Accepting Nationals Requested by Homeland Security','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Amends the Immigration and Nationality Act with respect to a country that denies or unreasonably delays accepting the country\'s nationals upon the request of the Secretary of Homeland Security.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1156&ciq=voices&client_md=de360e16cdd7fd6d3aac2a1c1ae5b39d&mode=current_text'),
(45,1157,'US','2011000','HR','Levee System Evaluation from Non-Federal Interests','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee',NULL,'Requires the Secretary of the Army to conduct levee system evaluations and certifications on receipt of requests from non-Federal interests.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1157&ciq=voices&client_md=ad6532df8fd6f4cd782cad28784f5045&mode=current_text'),
(46,1158,'US','2011000','HR','Mineral Rights in the State of Montana','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Authorizes the conveyance of mineral rights by the Secretary of the Interior in the State of Montana, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1158&ciq=voices&client_md=5f94894526310b56b4408b405c030862&mode=current_text'),
(47,1159,'US','2011000','HR','Limitation on Medicare Exception to Physician Referrals','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Repeals certain provisions of the Patient Protection and Affordable Care Act relating to the limitation on the Medicare exception to the prohibition on certain physician referrals for hospitals and to transparency reports and reporting of physician ownership or investment interests.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1159&ciq=voices&client_md=b1f4b271cf185398a4f469861bd5ef04&mode=current_text'),
(48,1160,'US','2011000','HR','McKinney Lake National Fish Hatchery to North Carolina','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Requires the Secretary of the Interior to convey the McKinney Lake National Fish Hatchery to the State of North Carolina, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1160&ciq=voices&client_md=5b9ad258692f80a5b69c41344a82b6a1&mode=current_text'),
(49,1161,'US','2011000','HR','State Based Alcohol Regulation','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Reaffirms state-based alcohol regulation, and for other purposes.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1161&ciq=voices&client_md=c21b410d45cba95572a29b1739946bc0&mode=current_text'),
(50,1162,'US','2011000','HR','Quileute Indian Tribe Tsunami and Flood Protection','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Provides the Quileute Indian Tribe Tsunami and Flood Protection, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1162&ciq=voices&client_md=34ff5a9ab45f8671b3016fefdf3f9090&mode=current_text'),
(51,1163,'US','2011000','HR','Income Tax Rate on Patriot Corporations','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Provides Federal contracting preferences for, and a reduction in the rate of income tax imposed on, Patriot corporations, and for other purposes.','Additionally referred to HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1163&ciq=voices&client_md=62dd24c411bcabbb865ed0a9df3d4604&mode=current_text'),
(52,1164,'US','2011000','HR','Official Language of the United States Government','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Amends title 4, United States Code, to declare English as the official language of the Government of the United States, and for other purposes.','Additionally referred to HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1164&ciq=voices&client_md=a68def2c2c07c2a617f5343737632046&mode=current_text'),
(53,1165,'US','2011000','HR','Ombudsman Office for Transportation Safety','2011-03-17','0000-00-00','0000-00-00','','Pending','House Homeland Security Committee',NULL,'Amends title 49, United States Code, to establish an Ombudsman Office within the Transportation Security Administration for the purpose of enhancing transportation security by providing confidential, informal, and neutral assistance to address work-place related problems of Transportation Security Administration employees, and for other purposes.','To HOUSE Committee on HOMELAND SECURITY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1165&ciq=voices&client_md=23c9e077f4793a8bb8a4b8d810187ecb&mode=current_text'),
(54,1166,'US','2011000','HR','Rights Relating to Trade or Commercial Names','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Modifies the prohibition on recognition by United States courts of certain rights relating to certain marks, trade names, or commercial Names.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1166&ciq=voices&client_md=58f4ce2720d250898c237c25f491ffd9&mode=current_text'),
(55,1167,'US','2011000','HR','Spending on Means Tested Welfare Programs','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Provides information on total spending on means-tested welfare programs; provides additional work requirements; provides an overall spending limit on means-tested welfare programs.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1167&ciq=voices&client_md=ce6c657b10b01075d3a6d6034a6554bf&mode=current_text'),
(56,1168,'US','2011000','HR','Matching Contributions to the Thrift Savings Fund','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Amends title 5, United States Code, to provide that matching contributions to the Thrift Savings Fund for Members of Congress be made contingent on Congress completing action on a concurrent resolution on the budget, for the fiscal year involved, which reduces the deficit, and for other purposes.','Additionally referred to HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1168&ciq=voices&client_md=e585885cca25e15f2f3847ebdabf110b&mode=current_text'),
(57,1169,'US','2011000','HR','Eligibility Age for Retirement in National Guard','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Amends titles 5, 10, and 32, United States Code, to eliminate inequities in the treatment of National Guard technicians; reduces the eligibility age for retirement for non-Regular service, and for other purposes.','Additionally referred to HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1169&ciq=voices&client_md=cd31d6c29563aa167f0cc0bfa45749b9&mode=current_text'),
(58,1170,'US','2011000','HR','Gold in Metal Content of the Medal of Honor','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee',NULL,'Amends titles 10 and 14, United States Code, to provide for the use of gold in the metal content of the Medal of Honor.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1170&ciq=voices&client_md=a01c1cefbcd4a327e829a7ec252a9a96&mode=current_text'),
(59,1171,'US','2011000','HR','Marine Debris Research, Prevention, and Reduction','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Reauthorizes and amend the Marine Debris Research, Prevention, and Reduction Act.','Additionally referred to HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1171&ciq=voices&client_md=48dc8afb06757f5c60c816aa839e47c7&mode=current_text'),
(60,1172,'US','2011000','HR','Payment for Chest Radiography Services','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends title XVIII of the Social Security Act to provide an increased payment for chest radiography (x-ray) services that use Computer Aided Detection technology for the purpose of Early detection of lung cancer.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1172&ciq=voices&client_md=a52bf7a0b8d5901b48a35eb061e95f0a&mode=current_text'),
(61,1173,'US','2011000','HR','Class Program','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Repeals the class program.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1173&ciq=voices&client_md=f6f89122ea9c7732b696116fb68ee24b&mode=current_text'),
(62,1174,'US','2011000','HR','Licensing of Internet Gambling Activities','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends title 31, United States Code, to provide for the licensing of Internet gambling activities by the Secretary of the Treasury; provides for consumer protections on the Internet; enforces the tax code, and for other purposes.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1174&ciq=voices&client_md=d21fed27555921af218431555f049bc3&mode=current_text'),
(63,1175,'US','2011000','HR','Oleoresin Capsicum Spray Pilot Program in the Prisons','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Establishes an Oleoresin Capsicum Spray Pilot Program in the Bureau of Prisons, and for other purposes.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1175&ciq=voices&client_md=d3ddd1b85b27913f682af605024d2946&mode=current_text'),
(64,1176,'US','2011000','HR','Specialty Crops to Include Farmed Shellfish','2011-03-17','0000-00-00','0000-00-00','','Pending','House Agriculture Committee',NULL,'Amends the Specialty Crops Competitiveness Act of 2004 to include farmed shellfish as specialty crops.','To HOUSE Committee on AGRICULTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1176&ciq=voices&client_md=d3b89ac01831c9d5dd3e6f078227e423&mode=current_text'),
(65,1177,'US','2011000','HR','Tax Preferred Savings Accounts for Individuals Under 26','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends the Internal Revenue Code of 1986 to provide for tax preferred savings accounts for individuals under age 26, and for other purposes.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1177&ciq=voices&client_md=e45a790515aa06f5e8d06f125d5d96bc&mode=current_text'),
(66,1178,'US','2011000','HR','Commissary and Exchange Store Privileges','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee',NULL,'Amends title 10, United States Code, to extend military commissary and exchange store privileges to veterans with a compensable service-connected disability and to their dependents.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1178&ciq=voices&client_md=15dd922a6efd69b6012a16abd99df5e3&mode=current_text'),
(67,1179,'US','2011000','HR','Specific Item and Service Coverage Requirements','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends the Patient Protection and Affordable Care Act to protect rights of conscience with regard to requirements for coverage of specific items and services.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1179&ciq=voices&client_md=e2bcd8bca9f3202345afde762987e2f1&mode=current_text'),
(68,1180,'US','2011000','HR','Small Business Start-Up Savings Account','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends the Internal Revenue Code of 1986 to establish small business start-up savings accounts.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1180&ciq=voices&client_md=b18c14c554769473dc0368461402cd9c&mode=current_text'),
(69,1181,'US','2011000','HR','State Property Firearm Exemption','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Amends title 11 of the United States Code to include firearms in the types of property allowable under the alternative provision for exempting property from the estate.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1181&ciq=voices&client_md=dc9a58a1ee0d5307c13a9e682124c548&mode=current_text'),
(70,1182,'US','2011000','HR','Conservatorships of Fannie Mae and Freddie Mac','2011-03-17','0000-00-00','0000-00-00','','Pending','House Financial Services Committee',NULL,'Establishes a term certain for the conservatorships of Fannie Mae and Freddie Mac; provides conditions for continued operation of such enterprises; provides for the wind down of such operations and the dissolution of such enterprises.','To HOUSE Committee on FINANCIAL SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1182&ciq=voices&client_md=bf76db4cc386f7e0094dae9d1441c805&mode=current_text'),
(71,1183,'US','2011000','HR','Interstate Commerce for Suicide Promotion','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Amends title 18, United States Code, to prohibit the use of interstate commerce for suicide promotion.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1183&ciq=voices&client_md=c397e6bd4c73beaa7a94a92d2bd326a0&mode=current_text'),
(72,1184,'US','2011000','HR','Criteria Used to Grant Waivers for Health Care','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Requires greater transparency concerning the criteria used to grant waivers to the job-killing health care law and to ensure that applications for such waivers are treated in a fair and consistent manner, irrespective of the applicant\'s political contributions or association with a labor union, a health plan provided for under a collective bargaining agreement, or another organized labor group.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1184&ciq=voices&client_md=d712484fe6e7769a126c338a57a06aa6&mode=current_text'),
(73,1185,'US','2011000','HR','Implementation of Health Reform Law','2011-03-17','0000-00-00','0000-00-00','','Pending','House Rules Committee',NULL,'Delays the implementation of the health reform law in the United States until there is final resolution in pending lawsuits.','Additionally referred to HOUSE Committee on RULES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1185&ciq=voices&client_md=43f6c3d9e961fbf1d7da2ae7c22ccd24&mode=current_text'),
(74,1186,'US','2011000','HR','Changes Made by Health Care Reform','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Repeals changes made by health care reform Laws to the Medicare exception to the prohibition on certain physician referrals for hospitals.','Additionally referred to HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1186&ciq=voices&client_md=e7541686de1bc1fdaae706bad2e2d21b&mode=current_text'),
(75,1187,'US','2011000','HR','Incentive Payments to Federally Qualified Health Center','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends title XIX of the Social Security Act to direct Medicaid Electronic Health Record incentive payments to federally qualified health centers and rural health clinics.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1187&ciq=voices&client_md=9f6285cb54f6a10e6424cb37c04b65cc&mode=current_text'),
(76,1188,'US','2011000','HR','Incentives for Alcohol Fuels','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends the Internal Revenue Code of 1986 to terminate incentives for alcohol fuels.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1188&ciq=voices&client_md=7390ab0af6fc91cef33fb998bd25d458&mode=current_text'),
(77,1189,'US','2011000','HR','Construction of Wastewater Treatment Works','2011-03-17','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Amends the Federal Water Pollution Control Act to assist municipalities that would experience a significant hardship raising the revenue necessary to finance projects and activities for the construction of wastewater treatment works, and for other purposes.','To HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1189&ciq=voices&client_md=c248cfc6226132250a7c269635cd5bad&mode=current_text'),
(78,1190,'US','2011000','HR','Tax Deductions Equal to Fair Market Value','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Amends the Internal Revenue Code of 1986 to provide that a deduction equal to fair market value shall be allowed for charitable contributions of literary, musical, artistic, or scholarly compositions created by the donor.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1190&ciq=voices&client_md=d2641c5473478c684b46c169551bce7b&mode=current_text'),
(79,1191,'US','2011000','HR','Revenue Collection for Nonmilitary Purposes','2011-03-17','0000-00-00','0000-00-00','','Pending','House Ways and Means Committee',NULL,'Affirms the religious freedom of taxpayers who are conscientiously opposed to participation in war, to provide that the income, estate, or gift tax payments of such taxpayers be used for nonmilitary purposes; creates the Religious Freedom Peace Tax Fund to receive such tax payments; improves revenue collection, and for other purposes.','To HOUSE Committee on WAYS AND MEANS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1191&ciq=voices&client_md=8dc5906a403933e9104030e6784da040&mode=current_text'),
(80,1192,'US','2011000','HR','Royalty Rate for Soda Ash','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Extends the current royalty rate for soda ash.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1192&ciq=voices&client_md=495c75a4c4c7b8586eb5e32c669daa01&mode=current_text'),
(81,1193,'US','2011000','HR','Railroads used in Transportation to Nazi Camps','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee',NULL,'Ensures that the courts of the United States may provide an impartial forum for claims brought by United States citizens and others against any railroad organized as a separate legal entity, arising from the deportation of United States citizens and others to Nazi concentration camps on trains owned or operated by such railroad, and by the heirs and survivors of such persons, and for other purposes.','Additionally referred to HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1193&ciq=voices&client_md=38447e0e57b116f05906017dac6185c7&mode=current_text'),
(82,1194,'US','2011000','HR','Innovative Child Welfare Strategies','2011-03-17','0000-00-00','0000-00-00','','Pending','House Budget Committee',NULL,'Renews the authority of the Secretary of Health and Human Services to approve demonstration projects designed to test innovative strategies in State child welfare programs.','Additionally referred to HOUSE Committee on BUDGET.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1194&ciq=voices&client_md=bf36a48b035b04490eaa553717bbe8d2&mode=current_text'),
(83,1195,'US','2011000','HR','National Service Corps Scholarship and Loan Repayment','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends the Public Health Service Act to provide for the participation of optometrists in the National Health Service Corps scholarship and loan repayment programs, and for other purposes.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1195&ciq=voices&client_md=28dfbbb158f19449ae3076f1fb5d7901&mode=current_text'),
(84,1196,'US','2011000','HR','Incentives and Loopholes That Encourage Illegal Aliens','2011-03-17','0000-00-00','0000-00-00','','Pending','House Agriculture Committee',NULL,'Removes the incentives and loopholes that encourage illegal aliens to come to the United States to live and work; provides additional resources to local law enforcement and Federal border and immigration officers, and for other purposes.','Additionally referred to HOUSE Committee on AGRICULTURE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1196&ciq=voices&client_md=c3d2122022321a93fe2e83dc22d0c5dd&mode=current_text'),
(85,1197,'US','2011000','HR','District of Columbia National Guard Education Program','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Directs the Mayor of the District of Columbia to establish a District of Columbia National Guard Educational Assistance Program to encourage the enlistment and retention of persons in the District of Columbia National Guard by providing financial assistance to enable members of the National Guard of the District of Columbia to attend undergraduate, vocational, or technical courses.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1197&ciq=voices&client_md=6b3e3fb75e6d64d37b97bfc87c59f056&mode=current_text'),
(86,1198,'US','2011000','HR','Control of the District of Columbia National Guard','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee',NULL,'Extends to the Mayor of the District of Columbia the same authority over the National Guard of the District of Columbia as the Governors of the several States exercise over the National Guard of those States with respect to administration of the National Guard and its use to respond to natural disasters and other civil disturbances, while ensuring that the President retains control of the National Guard of the District of Columbia to respond to homeland defense emergencies.','Additionally referred to HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1198&ciq=voices&client_md=1f77bc51ce1ee1afcf12d439937c4e9e&mode=current_text'),
(87,1199,'US','2011000','HR','Fire Safety Education Programs on College Campuses','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Authorizes the Secretary of Education to make grants to support fire safety education programs on college campuses.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1199&ciq=voices&client_md=434b6403c9b41bd9bd602def98d6d9ff&mode=current_text'),
(88,1200,'US','2011000','HR','Health Care for Every American','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Provides for health care for every American and to control the cost and enhance the quality of the health care system.','Additionally referred to HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1200&ciq=voices&client_md=709c712ef0bc5ac1ce2876e6c5d9fbb3&mode=current_text'),
(89,1201,'US','2011000','HR','Investment Option in the Thrift Savings Fund','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Amends title 5, United States Code, to provide for the establishment of a precious metals investment option in the Thrift Savings Fund.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1201&ciq=voices&client_md=5308efb355978dabc7d5c4e01a3d0b00&mode=current_text'),
(90,1202,'US','2011000','HR','Removal of Mexican Spotted Owl to Sanctuaries','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Restarts jobs in the timber industry by providing for the protection of the Mexican Spotted Owl in sanctuaries.','Additionally referred to HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1202&ciq=voices&client_md=0d698838cc9c711a6161e5758017bc46&mode=current_text'),
(91,1203,'US','2011000','HR','Low Power Television Stations','2011-03-17','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Amends title 17, United States Code, to include the United States territories in the application of certain statutory copyright licenses related to low power television stations.','To HOUSE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1203&ciq=voices&client_md=ae0e3ed83e672abb4a15f7f7516fb906&mode=current_text'),
(92,1204,'US','2011000','HR','Emissions from Oil and Gas Development Sources','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends the Clean Air Act to eliminate the exemption for aggregation of emissions from oil and gas development sources, and for other purposes.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1204&ciq=voices&client_md=1225886406b8240c116a22517a246c98&mode=current_text'),
(93,1205,'US','2011000','HR','Disposal of Real Property','2011-03-17','0000-00-00','0000-00-00','','Pending','House Oversight and Government Reform Committee',NULL,'Amends title 40, United States Code, to enhance authorities with regard to the disposal of real property, and for other purposes.','To HOUSE Committee on OVERSIGHT AND GOVERNMENT REFORM.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1205&ciq=voices&client_md=660a504e93137148e96bca0280d35e99&mode=current_text'),
(94,1206,'US','2011000','HR','Licensed Independent Insurance Producers','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Amends title XXVII of the Public Health Service Act to preserve consumer and employer access to licensed independent insurance producers.','To HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1206&ciq=voices&client_md=15aa2d46704bca91b5c2ed5a8f137f70&mode=current_text'),
(95,1207,'US','2011000','HR','Establish and Operate a Visitor Facility','2011-03-17','0000-00-00','0000-00-00','','Pending','House Natural Resources Committee',NULL,'Authorizes the Secretary of the Interior to establish and operate a visitor facility to fulfill the purposes of the Marianas Trench Marine National Monument, and for other purposes.','To HOUSE Committee on NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1207&ciq=voices&client_md=b69a65ded26398ca3ae109a20ca5f6f3&mode=current_text'),
(96,1208,'US','2011000','HR','Expert Witness Fees and Others Expenses','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Amends the Individuals with Disabilities Education Act to permit a prevailing party in an action or proceeding brought to enforce the Act to be awarded expert witness fees and certain other expenses.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000H1208&ciq=voices&client_md=e0ec1722a1e081e7d6ead581f9e203e8&mode=current_text'),
(97,13,'US','2011000','HCR','The Official Motto of the United States','2011-01-26','0000-00-00','0000-00-00','','Pending','House Judiciary Committee',NULL,'Reaffirms \"In God We Trust\" as the official motto of the United States and supporting and encouraging the public display of the national motto in all public buildings, public schools, and other government institutions.','In HOUSE Committee on JUDICIARY:  Ordered to be reported.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HCR13&ciq=voices&client_md=dedcb8b4337004a373a4dc03ffdd2cc8&mode=current_text'),
(98,28,'US','2011000','HCR','Removal of Armed Forces from Afghanistan','2011-03-09','0000-00-00','0000-00-00','','Failed','HOUSE',NULL,'Directs the President, pursuant to section 5(c) of the War Powers Resolution, to remove the United States Armed Forces from Afghanistan.','In HOUSE.  Failed to pass HOUSE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HCR28&ciq=voices&client_md=bd693ffb9baec0d94bcbe1ab939539c7&mode=current_text'),
(99,30,'US','2011000','HCR','Conditional Adjournment','2011-03-15','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Provides for a conditional adjournment of the House of Representatives and a conditional recess or adjournment of the Senate.','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HCR30&ciq=voices&client_md=8a7be30ec3018bc07b1dbaaceacfc03a&mode=current_text'),
(100,48,'US','2011000','HJR','Appropriations for Fiscal Year 2011','2011-03-11','0000-00-00','2011-03-18','Enacted','Enacted','Chaptered',NULL,'Makes further continuing appropriations for fiscal year 2011, and for other purposes.','Public Law No. 112-6','2011-03-18','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HJR48&ciq=voices&client_md=645dab22f87855ecf23b3f8bcbad5efc&mode=current_text'),
(101,147,'US','2011000','HRES','Expenses of Committees of the House of Representatives','2011-03-08','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Provides for the expenses of certain committees of the House of Representatives in the One Hundred Twelfth Congress.','In HOUSE.  Passed HOUSE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES147&ciq=voices&client_md=3ffdf955e6548d37c9548efd89524b5b&mode=current_text'),
(102,174,'US','2011000','HRES','Consideration of House Bill 1073','2011-03-16','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Provides for consideration of the bill (H.R. 1076) to prohibit Federal funding of National Public Radio and the use of Federal funds to acquire radio content.','In HOUSE.  Passed HOUSE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES174&ciq=voices&client_md=5197e021c074b40b2b605a486cc2a051&mode=current_text'),
(103,176,'US','2011000','HRES','Anti-Tuberculosis Programs Progress','2011-03-17','0000-00-00','0000-00-00','','Pending','House Energy and Commerce Committee',NULL,'Commends the progress made by anti-tuberculosis programs.','Additionally referred to HOUSE Committee on ENERGY AND COMMERCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES176&ciq=voices&client_md=59d5830ce2464ae1179551db27bd1928&mode=current_text'),
(104,177,'US','2011000','HRES','Lasting Peace in Sri Lanka','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee',NULL,'Expresses support for internal rebuilding, resettlement, and reconciliation within Sri Lanka that are necessary to ensure a lasting peace.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES177&ciq=voices&client_md=d7aef3f4cb94da9ecd8d093a25f77bd4&mode=current_text'),
(105,178,'US','2011000','HRES','Duplicative Program Report on Bill or Joint Resolution','2011-03-17','0000-00-00','0000-00-00','','Pending','House Rules Committee',NULL,'Amends the Rules of the House of Representatives to require a committee report on a bill or joint resolution to include a statement of whether the legislation creates any duplicative programs.','To HOUSE Committee on RULES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES178&ciq=voices&client_md=29cc831b0c6719a2402a6295deb78c21&mode=current_text'),
(106,179,'US','2011000','HRES','Heroic Human Endeavor of the People of Crete','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee',NULL,'Recognizes and appreciating the historical significance and the heroic human endeavor and sacrifice of the people of Crete during World War II and commending the PanCretan Association of America.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES179&ciq=voices&client_md=aa866a7b31cf723a3022172a3194b7c0&mode=current_text'),
(107,180,'US','2011000','HRES','Religious Freedoms of the Ecumenical Patriarchate','2011-03-17','0000-00-00','0000-00-00','','Pending','House Foreign Affairs Committee',NULL,'Urges Turkey to respect the rights and religious freedoms of the Ecumenical Patriarchate.','To HOUSE Committee on FOREIGN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES180&ciq=voices&client_md=e8b49640fa48ae6f83119cf6a2b01643&mode=current_text'),
(108,181,'US','2011000','HRES','Honors Memory of Christina-Taylor Green','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Honors the memory of Christina-Taylor Green by encouraging schools to teach civic education and civil discourse in public schools.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES181&ciq=voices&client_md=311ec10f2210950830341554a76522de&mode=current_text'),
(109,182,'US','2011000','HRES','Honors Struggle to Improve Worker Safety Standards','2011-03-17','0000-00-00','0000-00-00','','Pending','House Education and the Workforce Committee',NULL,'Recognizes the historical significance of the Triangle Fire in the struggle to improve worker safety standards and protections on the 100th anniversary of the fire.','To HOUSE Committee on EDUCATION AND THE WORKFORCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES182&ciq=voices&client_md=8c94d266465b0b41d187094f9065fe34&mode=current_text'),
(110,183,'US','2011000','HRES','Recognizes U.S. Army Company E','2011-03-17','0000-00-00','0000-00-00','','Pending','House Armed Services Committee',NULL,'Recognizes Company E, 100th Battalion, 442d Infantry Regiment of the United States Army and the sacrifice of the soldiers of Company E and their families in support of the United States.','To HOUSE Committee on ARMED SERVICES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES183&ciq=voices&client_md=93d078c00847cd3cf05665a9f5139956&mode=current_text'),
(111,184,'US','2011000','HRES','Welcome Home Vietnam Veterans Day','2011-03-17','0000-00-00','0000-00-00','','Pending','House Veterans\' Affairs Committee',NULL,'Expresses support for designation of a \"Welcome Home Vietnam Veterans Day\".','To HOUSE Committee on VETERANS\' AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HRES184&ciq=voices&client_md=3fec538f81e51785b5ad70ff8c97696a&mode=current_text'),
(112,193,'US','2011000','S','Sunset of Provisions of USA Patriot Act','2011-01-26','0000-00-00','0000-00-00','','Pending','SENATE',NULL,'Extends the sunset of certain provisions of the USA patriot Act, and for other purposes.','In SENATE.  Placed on SENATE Legislative Calendar.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S193&ciq=voices&client_md=f108b14cb1fc5d54ac3a600efa71fb01&mode=current_text'),
(113,307,'US','2011000','S','Federal Building and Courthouse Designation','2011-02-08','0000-00-00','0000-00-00','','Pending','House Transportation & Infrastructure Committee',NULL,'Designates the Federal building and United States courthouse located at 217 West King Street, Martinsburg, West Virginia, as the \"W. Craig Broadwater Federal Building and United States Courthouse\".','In HOUSE Committee on TRANSPORTATION AND INFRASTRUCTURE:  Ordered to be reported.','2011-03-16','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S307&ciq=voices&client_md=0e8b9abc260ec89bb735bc561da53620&mode=current_text'),
(114,493,'US','2011000','S','SBIR and STTR Programs','2011-03-04','2011-03-16','0000-00-00','','Pending','SENATE',NULL,'Reauthorizes and improve the SBIR and STTR programs, and for other purposes.','In SENATE.  Amendment SA 244 proposed by Senator Landrieu to Amendment SA 183.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S493&ciq=voices&client_md=c964e42c67f2c0cba508f397da668980&mode=current_text'),
(115,604,'US','2011000','S','Marriage and Family Therapist Service Coverage','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Amends title XVIII of the Social Security Act to provide for the coverage of marriage and family therapist services and mental health counselor services under part B of the Medicare program, and for other purposes.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S604&ciq=voices&client_md=525875fcd0f5ccff0803bd3343328d18&mode=current_text'),
(116,605,'US','2011000','S','Place Synthetic Drugs in Schedule 1','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Amends the Controlled Substances Act to place synthetic drugs in Schedule I.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S605&ciq=voices&client_md=5167eff94b2a8dd8195b051664e656cf&mode=current_text'),
(117,606,'US','2011000','S','Incentive Program for Tropical Pediatric Diseases','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Amends the Federal Food, Drug, and Cosmetic Act to improve the priority review voucher incentive program relating to tropical and rare pediatric diseases.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S606&ciq=voices&client_md=67de0e9b6fda7674a2734b852b8406de&mode=current_text'),
(118,607,'US','2011000','S','Exchange of Lands in Oregon','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Designates certain land in the State of Oregon as wilderness; provides for the exchange of certain Federal land and non-Federal land, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S607&ciq=voices&client_md=2f85c24401dfbc7311ef378ebe75353c&mode=current_text'),
(119,608,'US','2011000','S','Maritime Liens on Fishing Licenses','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe',NULL,'Provides limitations on maritime liens on fishing licenses and for other purposes.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S608&ciq=voices&client_md=c438204d3d80fb5f70a833bd09cc5df5&mode=current_text'),
(120,609,'US','2011000','S','Effects of Federal Regulatory Mandates','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Environment and Public Works Committee',NULL,'Provides for the establishment of a committee to assess the effects of certain Federal regulatory mandates.','To SENATE Committee on ENVIRONMENT AND PUBLIC WORKS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S609&ciq=voices&client_md=45bf292fb7661d337b600013a5650d6e&mode=current_text'),
(121,610,'US','2011000','S','Conveyance of Land in Oklahoma','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Agriculture, Nutrition & Forestry Committee',NULL,'Provides for the conveyance of approximately 140 Acres of land in the Ouachita National Forest in Oklahoma to the Indian Nations Council, Inc., of the Boy Scouts of America, and for other purposes.','To SENATE Committee on AGRICULTURE, NUTRITION AND FORESTRY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S610&ciq=voices&client_md=20d065293a2664066447b83ec2a66e74&mode=current_text'),
(122,611,'US','2011000','S','Greater Technical Resources to FCC Commissioners','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe',NULL,'Provides greater technical resources to FCC Commissioners.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S611&ciq=voices&client_md=ab336b0e6ebb3e8bfcef427b98c295e1&mode=current_text'),
(123,612,'US','2011000','S','Reduce Consumption of Petroleum Products by Government','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Amends the Energy Policy and Confirmation Act to require the Secretary of Energy to develop and implement a strategic petroleum demand response plan to reduce the consumption of petroleum products by the Federal Government.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S612&ciq=voices&client_md=6e8779b526ca28c497813df26f0dcc68&mode=current_text'),
(124,613,'US','2011000','S','Expert Witness Fees','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Amends the Individuals with Disabilities Education Act to permit a prevailing party in an action or proceeding brought to enforce the Act to be awarded expert witness fees and certain other expenses.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S613&ciq=voices&client_md=01f89a6571bcf518207e199f1fdc7348&mode=current_text'),
(125,614,'US','2011000','S','Trial for Unprivileged Enemy Belligerent in Court','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Requires the Attorney General to consult with appropriate officials within the executive branch prior to making the decision to try an unprivileged enemy belligerent in Federal Court.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S614&ciq=voices&client_md=9deb7145d7770e141bf398ddd8f870d9&mode=current_text'),
(126,615,'US','2011000','S','Alternative Infrastructure to Improve Efficiency','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Homeland Security and Governmental Affairs ',NULL,'Improves the accountability and transparency in infrastructure spending by requiring a life-cycle cost analysis of major infrastructure projects; provides the flexibility to use alternate infrastructure type bidding procedures to reduce project costs; and requires the use of design standards to improve efficiency and save taxpayer dollars.','To SENATE Committee on HOMELAND SECURITY AND GOVERNMENTAL AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S615&ciq=voices&client_md=af5ac0058d1091e15d5c5259cbf7a7bf&mode=current_text'),
(127,616,'US','2011000','S','Support the Community Schools Model','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Amends the Elementary and Secondary Education Act of 1965 in order to support the community schools model.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S616&ciq=voices&client_md=82c9fcd8e04550f19903b3129eb08f08&mode=current_text'),
(128,617,'US','2011000','S','Convey Land in Elko County, Nevada','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Requires the Secretary of the Interior to convey certain Federal land to Elko County, Nevada, and to take land into trust for the Te-moak Tribe of Western Shoshone Indians of Nevada, and or other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S617&ciq=voices&client_md=e2a535bb5cf5f7bcb2b873e86a518352&mode=current_text'),
(129,618,'US','2011000','S','The Private Sector in Egypt and Tunisia','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee',NULL,'Promotes the strengthening of the private sector in Egypt and Tunisia.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S618&ciq=voices&client_md=0e64b2187a5186082e5e8a89c011bd3c&mode=current_text'),
(130,619,'US','2011000','S','Strengthens the Capacity of Elementary Schools','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Assists in the coordination among science, technology, engineering, and mathematics efforts in the States; strengthens the capacity of elementary schools, middle schools, and secondary schools to prepare students in science, technology, engineering, and mathematics, and for other purposes.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S619&ciq=voices&client_md=00c8b48afbcf2adf6237a2331f50e282&mode=current_text'),
(131,620,'US','2011000','S','Fire Safety Education Programs on College Campuses','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Authorizes the Secretary of Education to make grants to support fire safety education programs on college campuses.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S620&ciq=voices&client_md=8a816238b0a022f692690f6874e0cb7b&mode=current_text'),
(132,621,'US','2011000','S','Excess Funds Available from Surface Mining','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Amends the Surface Mining Control and Reclamation Act of 1977 to provide for use of excess funds available under that Act to provide for certain benefits, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S621&ciq=voices&client_md=f1780e3bab50b98c5b9883b1753f0967&mode=current_text'),
(133,622,'US','2011000','S','Regulation and Assessment for Public Schools','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Establishes the Commission on Effective Regulation and Assessment Systems for Public Schools.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S622&ciq=voices&client_md=a8f2bc3e60d0fb8ab0fa6c309ac65cd0&mode=current_text'),
(134,623,'US','2011000','S','Disclosures of Discovery Information in Civil Actions','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Amends chapter 111 of title 28, United States Code, relating to protective orders, sealing of cases, disclosures of discovery information in civil actions, and for other purposes.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S623&ciq=voices&client_md=ac5be4369550aad44db9ec56602b4f55&mode=current_text'),
(135,624,'US','2011000','S','Transform Neighborhoods of Extreme Poverty','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Banking, Housing and Urban Affairs Committe',NULL,'Authorizes the Department of Housing and Urban Development to transform neighborhoods of extreme poverty into sustainable, mixed-income neighborhoods with access to economic opportunities, by revitalizing severely distressed housing, and investing and leveraging investments in well-functioning services, educational opportunities, public assets, public transportation, and improved access to jobs.','To SENATE Committee on BANKING, HOUSING AND URBAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S624&ciq=voices&client_md=78a9dfeccf0b3b769604e820b2eba6c7&mode=current_text'),
(136,625,'US','2011000','S','Statewide Transportation Planning','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Environment and Public Works Committee',NULL,'Amends title 23, United States Code, to incorporate regional transportation planning organizations into statewide transportation planning, and for other purposes.','To SENATE Committee on ENVIRONMENT AND PUBLIC WORKS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S625&ciq=voices&client_md=d396437f4fb60147a60219e3f9ee7b46&mode=current_text'),
(137,626,'US','2011000','S','Incentive to Reinvest Foreign Shipping Earnings','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Amends the Internal Revenue Code of 1986 to repeal the shipping investment withdrawal rules in section 955 and to provide an incentive to reinvest foreign shipping earnings in the United States.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S626&ciq=voices&client_md=0097db78376bc3aed18c409866eb9922&mode=current_text'),
(138,627,'US','2011000','S','Processing Delays on Freedom of Information','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Establishes the Commission on Freedom of Information Act Processing Delays.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S627&ciq=voices&client_md=f78c320aacf019a301b74c5bc4bc78ff&mode=current_text'),
(139,628,'US','2011000','S','Alaskan Railroad Corporation Right of Way','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Authorizes the Secretary of the Interior to convey a railroad right of way between North Pole, Alaska, and Delta Junction, Alaska, to the Alaska Railroad Corporation.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S628&ciq=voices&client_md=8c1e68bc3bc8c54e11a545d3eac7dfc3&mode=current_text'),
(140,629,'US','2011000','S','Hydropower Improvements','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Improves hydropower, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S629&ciq=voices&client_md=854780a56b30a299164df0810f0a2d05&mode=current_text'),
(141,630,'US','2011000','S','Hydrokinetic Renewable Energy Research','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Promotes marine and hydrokinetic renewable energy research and development, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S630&ciq=voices&client_md=2cb44f573773cab9f8333f0394d6b859&mode=current_text'),
(142,631,'US','2011000','S','Tax Provisions Generated by Hydropower Resources','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Extends certain Federal benefits and income tax provisions to energy generated by hydropower resources.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S631&ciq=voices&client_md=b8c3150cd0daffde48fcde11cbfed34b&mode=current_text'),
(143,632,'US','2011000','S','Rebuilding Over-Fished Fisheries','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe',NULL,'Amends the Magnuson-Stevens Fishery Conservation and Management Act to extend the authorized period for rebuilding of certain overfished fisheries, and for other purposes.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S632&ciq=voices&client_md=7a9c966441e4b81158c426c80a7c23d7&mode=current_text'),
(144,633,'US','2011000','S','Fraud in Small Business Contracting','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Small Business and Entrepreneurship Committ',NULL,'Prevents fraud in small business contracting, and for other purposes.','To SENATE Committee on SMALL BUSINESS AND ENTREPRENEURSHIP.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S633&ciq=voices&client_md=f447408c958f83ef5b521b7fd49a93b5&mode=current_text'),
(145,634,'US','2011000','S','Deportation to Nazi Concentration Camps by Train','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Ensures that the courts of the United States may provide an impartial forum for claims brought by United States citizens and others against any railroad organized as a separate legal entity, arising from the deportation of United States citizens and others to Nazi concentration camps on trains owned or operated by such railroad, and by the heirs and survivors of such persons.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S634&ciq=voices&client_md=3d433c891dcafaf30ada6e3f9d71d118&mode=current_text'),
(146,635,'US','2011000','S','Sell Lands Suitable for Disposal','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Directs the Secretary of the Interior to sell certain Federal lands in Arizona, Colorado, Idaho, Montana, Nebraska, Nevada, New Mexico, Oregon, Utah, and Wyoming, previously identified as suitable for disposal, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S635&ciq=voices&client_md=9c247fbd86c7e2ad95a6ece0e4d28049&mode=current_text'),
(147,636,'US','2011000','S','Quileute Indian Tribe Tsunami and Flood Protection','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Indian Affairs Committee',NULL,'Provides the Quileute Indian Tribe Tsunami and Flood Protection, and for other purposes.','To SENATE Committee on INDIAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S636&ciq=voices&client_md=c43f91caf562d409d153a2bc45069d9b&mode=current_text'),
(148,637,'US','2011000','S','Guarantees for Debt Issued on Behalf of Catastrophes','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Banking, Housing and Urban Affairs Committe',NULL,'Establishes a program to provide guarantees for debt issued by or on behalf of State catastrophe insurance programs to assist in the financial recovery from earthquakes, earthquake-induced landslides, volcanic eruptions, and tsunamis.','To SENATE Committee on BANKING, HOUSING AND URBAN AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S637&ciq=voices&client_md=d3246dd972546e92ac99b02d1aab81a8&mode=current_text'),
(149,638,'US','2011000','S','Incarcerating Undocumented Aliens Charged with a Felony','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Amends the Immigration and Nationality Act to provide for compensation to States incarcerating undocumented aliens charged with a felony or two or more misdemeanors.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S638&ciq=voices&client_md=4f82961e5e0445926a4cf4c01c3a1e12&mode=current_text'),
(150,639,'US','2011000','S','State Criminal Alien Assistance Program','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Authorizes to be appropriated $950,000,000 for each of the fiscal years 2012 through 2015 to carry out the State Criminal Alien Assistance Program.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S639&ciq=voices&client_md=cbd15b53c944d3b1204aec9ff7e65ab6&mode=current_text'),
(151,640,'US','2011000','S','Importance of International Nuclear Safety Cooperation','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee',NULL,'Underscores the importance of international nuclear safety cooperation for operating power reactors; encourages the efforts of the Convention on Nuclear Safety; supports progress in improving nuclear safety; enhances the public availability of nuclear safety information.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S640&ciq=voices&client_md=9a650fc72d4a6c529dd8e7bf0544f6aa&mode=current_text'),
(152,641,'US','2011000','S','Provides Access to Safe Drinking Water','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee',NULL,'Provides 100,000,000 people with first-time access to safe drinking water and sanitation on a sustainable basis within six years by improving the capacity of the United States Government to fully implement the Senator Paul Simon Water for the Poor Act of 2005.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S641&ciq=voices&client_md=3925b8b7074629a6b4e64754d5b15392&mode=current_text'),
(153,642,'US','2011000','S','The EB 5 Regional Center Program','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Permanently reauthorizes the EB-5 Regional Center Program.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S642&ciq=voices&client_md=499f385cd61821be80f36848766039bc&mode=current_text'),
(154,643,'US','2011000','S','Payments to Qualified Health Centers and Rural Clinics','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Amends title XIX of the Social Security Act to direct Medicaid Electronic Health Records incentive payments to federally qualified health centers and rural health clinics.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S643&ciq=voices&client_md=ae9db59f7a905b95562174754d44f74f&mode=current_text'),
(155,644,'US','2011000','S','Coverage for Annuity Purposes','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Homeland Security and Governmental Affairs ',NULL,'Amends subchapter II of chapter 84 of title 5, United States Code, to prohibit coverage for annuity purposes for any individual hired as a Federal employee after 2012.','To SENATE Committee on HOMELAND SECURITY AND GOVERNMENTAL AFFAIRS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S644&ciq=voices&client_md=e2ea69e864a8c7c1b78a29fd58f73b66&mode=current_text'),
(156,645,'US','2011000','S','Permanent Background Check System','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Amends the National Child Protection Act of 1993 to establish a permanent background check system.','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S645&ciq=voices&client_md=02022357b43b8999005394eabeb6c342&mode=current_text'),
(157,646,'US','2011000','S','Federal Natural Hazards Reduction Programs','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Commerce, Science & Transportation Committe',NULL,'Reauthorizes Federal natural hazards reduction programs, and for other purposes.','To SENATE Committee on COMMERCE, SCIENCE, AND TRANSPORTATION.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S646&ciq=voices&client_md=b97f888de1f8b3e121d605a295c02f74&mode=current_text'),
(158,647,'US','2011000','S','Mineral Rights in Montana','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Energy and Natural Resources Committee',NULL,'Authorizes the conveyance of mineral rights by the Secretary of the Interior in the State of Montana, and for other purposes.','To SENATE Committee on ENERGY AND NATURAL RESOURCES.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S647&ciq=voices&client_md=cd154910158b52ef232250d6454211f5&mode=current_text'),
(159,648,'US','2011000','S','Waiting Period Waiver for Huntington\'s Disease','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Requires the Commissioner of Social Security to revise the medical and evaluation criteria for determining disability in a person diagnosed with Huntington\'s Disease and to waive the 24-month waiting period for Medicare eligibility for individuals disabled by Huntington\'s Disease.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S648&ciq=voices&client_md=ee119885b3b61b4cf81cda4298b83adf&mode=current_text'),
(160,649,'US','2011000','S','Awareness Activities for Bone and Skin Diseases','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Health, Education, Labor and Pensions Commi',NULL,'Expands the research and awareness activities of the National Institute of Arthritis and Musculoskeletal and Skin Diseases and the Centers for Disease Control and Prevention with respect to scleroderma, and for other purposes.','To SENATE Committee on HEALTH, EDUCATION, LABOR AND PENSIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S649&ciq=voices&client_md=b63dd5d529743658cf16fe21d3807bfb&mode=current_text'),
(161,650,'US','2011000','S','Criteria used to Grant Waivers for Health Care Law','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Requires greater transparency concerning the criteria used to grant waivers to the job-killing health care law and to ensure that applications for such waivers are treated in a fair and consistent manner, irrespective of the applicant\'s political contributions or association with a labor union, a health plan provided for under a collective bargaining agreement, or another organized labor group.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S650&ciq=voices&client_md=5ccbed0a51605b5b0a642299bde436ee&mode=current_text'),
(162,651,'US','2011000','S','McKinney Lake National Fish Hatchery to North Carolina','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Environment and Public Works Committee',NULL,'Requires the Secretary of the Interior to convey the McKinney Lake National Fish Hatchery to the State of North Carolina, and for other purposes.','To SENATE Committee on ENVIRONMENT AND PUBLIC WORKS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S651&ciq=voices&client_md=243912d7847c80e7094786268c6eef6d&mode=current_text'),
(163,652,'US','2011000','S','Efficient Investments and Infrastructure Financing','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Finance Committee',NULL,'Facilitates efficient investments and financing of infrastructure projects and new job creation through the establishment of an American Infrastructure Financing Authority; provides for an extension of the exemption from the alternative minimum tax treatment for certain tax-exempt bonds, and for other purposes.','To SENATE Committee on FINANCE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000S652&ciq=voices&client_md=1db470ff527f9e1df957c3d3ba3bf69a&mode=current_text'),
(164,51,'US','2011000','SRES','Celebrating Greek and American Democracy','2011-02-15','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Recognizes the 190th anniversary of the independence of Greece and celebrating Greek and American democracy.','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES51&ciq=voices&client_md=5bf435747072ac8d554c2dc6bdb25f03&mode=current_text'),
(165,104,'US','2011000','SRES','Campus Fire Safety Month','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Judiciary Committee',NULL,'Designates September 2011 as \"Campus Fire Safety Month\".','To SENATE Committee on JUDICIARY.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES104&ciq=voices&client_md=379f0b29f885cc837d0d4277bb92c43f&mode=current_text'),
(166,105,'US','2011000','SRES','Belarus Elections Meeting International Standards','2011-03-17','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Condemns the December 19, 2010, elections in Belarus, and to call for the immediate release of all political prisoners and for new elections that meet international standards.','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES105&ciq=voices&client_md=e4de91da732656d49aed30062c01ce0f&mode=current_text'),
(167,106,'US','2011000','SRES','Honors Triangle Shirtwaist Company Fire in 1911','2011-03-17','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Recognizes the 100th anniversary of the Triangle Shirtwaist Company fire in New York City on March 25, 1911, and designating the week of March 21, 2011, through March 25, 2011, as the \"100th Anniversary of the Triangle Shirtwaist Factory Fire Remembrance Week\".','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES106&ciq=voices&client_md=8c1d37f022bed39cccdc94906b393dc7&mode=current_text'),
(168,107,'US','2011000','SRES','National Association of Junior Auxiliaries Day','2011-03-17','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Designates April 4, 2011, as \"National Association of Junior Auxiliaries Day\".','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES107&ciq=voices&client_md=28f7d0f65bddcd2c449f8636de9761d0&mode=current_text'),
(169,108,'US','2011000','SRES','Investment Relations Between the U.S. and Brazil','2011-03-17','0000-00-00','0000-00-00','','Pending','Senate Foreign Relations Committee',NULL,'Expresses the sense of the Senate on the importance of strengthening investment relations between the United States and Brazil.','To SENATE Committee on FOREIGN RELATIONS.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000SRES108&ciq=voices&client_md=5360749531d016cab37b30f1eb55dac1&mode=current_text'),
(170,300,'US','2011000','HCR','Conditional Adjournment','2011-03-15','0000-00-00','2011-03-17','Enacted','Adopted','Adopted',NULL,'Provides for a conditional adjournment of the House of Representatives and a conditional recess or adjournment of the Senate.','In SENATE.  Passed SENATE.','2011-03-17','http://custom.statenet.com/public/resources.cgi?id=ID:bill:US2011000HCR30&ciq=voices&client_md=8a7be30ec3018bc07b1dbaaceacfc03a&mode=current_text');

/*Table structure for table `tbl_capabilities` */

DROP TABLE IF EXISTS `tbl_capabilities`;

CREATE TABLE `tbl_capabilities` (
  `id` int(9) NOT NULL auto_increment,
  `capability_name` varchar(200) default NULL,
  `is_active` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_capabilities` */

insert into `tbl_capabilities` values 
(1,'View',1),
(2,'Add',1),
(3,'Modify Own Content',1),
(4,'Modify Others Content',0),
(5,'Author Content',0),
(6,'Publish Content',0),
(7,'Unpublish Content',0),
(8,'Delete Content',0),
(9,'Comment',1),
(10,'Filter Content',0),
(11,'Subscribe to Content',0),
(12,'Vote on Content',1),
(13,'View Statistics',0),
(14,'Close out comments',0),
(15,'Close out voting',0),
(16,'Delete',1);

/*Table structure for table `tbl_contents` */

DROP TABLE IF EXISTS `tbl_contents`;

CREATE TABLE `tbl_contents` (
  `id` int(9) NOT NULL auto_increment,
  `section_name` varchar(200) default NULL,
  `category_name` varchar(200) default NULL,
  `is_active` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_contents` */

insert into `tbl_contents` values 
(1,'Bill Resources','Bill Summary',1),
(2,'Bill Resources','Bill Detail',1),
(3,'Bill Resources','Vote Alert',0),
(4,'ER Content','Poll',1),
(5,'ER Content','Articles',1),
(6,'ER Content','Comments',0),
(7,'ER Content','Report Card',1),
(8,'Affiliate Content','News',1),
(9,'Affiliate Content','Bills',1),
(10,'Affiliate Content','Bulletins',1),
(11,'Affiliate Content','Sponsorship',0),
(12,'Affiliate Content','Page Header',1),
(13,'Home Page','Content',1),
(14,'FAQs','',1),
(15,'About Us','Message from CEO',1),
(16,'About Us','Overview',1),
(17,'User Registration','Register',0);

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_elected_officials` */

insert into `tbl_elected_officials` values 
(1,'5e9bdd9b-4d8f-4bab-ac88-08812f7cdf8a',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2013-01-01 00:00:00',NULL,NULL,'George','','Amedore','Assemblyman','New York State Assembly','Legislative Office Building','Room 718','Albany','NY','12248','(518) 455-5197',NULL,'(518) 455-5435',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AmedoreG@assembly.state.ny.us','','http://assembly.state.ny.us/mem/George-Amedore','','; ',NULL,'2011-03-23 17:14:15',NULL),
(2,'f7bf118e-d1e8-4c3c-873c-1de6fb111966',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2013-01-01 00:00:00',NULL,NULL,'George','','Amedore','Assemblyman','New York State Assembly','Legislative Office Building','Room 718','Albany','NY','12248','(518) 455-5197',NULL,'(518) 455-4535',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AmedoreG@assembly.state.ny.us','','http://assembly.state.ny.us/mem/George-Amedore','','; ',NULL,'2011-02-14 13:34:38',NULL),
(3,'41d47c9b-0e95-446a-9017-99c7588eb83d',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2013-01-01 00:00:00',NULL,NULL,'Hugh','T.','Farley','Senator','New York State Senate','Legislative Office Building','Room 706','Albany','NY','12247','(518) 455-2181',NULL,'(518) 455-2271',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'farley@senate.state.ny.us','','http://www.nysenate.gov/senator/hugh-t-farley','','; ',NULL,'2011-02-10 11:54:36','41d47c9b-0e95-446a-9017-99c7588eb83d.jpg'),
(4,'214db873-ec51-4c9b-861d-92cf58e88abb',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2015-01-01 00:00:00',NULL,NULL,'Robert','','Duffy','Lieutenant Governor','Office of the Lieutenant Governor','NYS State Capitol Building','','Albany','NY','12224','(518) 402-2292',NULL,'(518) 473-2344',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','http://www.governor.ny.gov/contact/GovernorContactForm.php','http://www.governor.ny.gov/sl2/ltgovernor_bio','','; ',NULL,'2011-03-04 17:26:53','214db873-ec51-4c9b-861d-92cf58e88abb.jpg'),
(5,'d20dc974-5161-4b3a-8f44-4306a4c53367',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2015-01-01 00:00:00',NULL,NULL,'Andrew','M.','Cuomo','Governor','Office of the Governor of New York','','NYS State Capitol Building','Albany','NY','12224','(518) 474-8390',NULL,'(518)474-3767',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'gov.cuomo@chamber.state.ny.us','http://www.governor.ny.gov/contact/GovernorContactForm.php','http://www.governor.ny.gov/','','; ',NULL,'2011-03-07 11:20:20',NULL),
(6,'3b31b633-7516-4b46-b014-88d6b4772373',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-03 00:00:00',NULL,'2013-01-03 00:00:00',NULL,NULL,'Paul','','Tonko','Representative','United States House of Representatives','422 Cannon House Office Building','','Washington','DC','20515','(202) 225-5076',NULL,'(202) 225-5077',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','https://writerep.house.gov/writerep/welcome.shtml ','http://tonko.house.gov/','','; ',NULL,'2011-02-28 11:54:01',NULL),
(7,'4f422448-e118-4604-a4ea-1643d277b669',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-03 00:00:00',NULL,'2017-01-03 00:00:00',NULL,NULL,'Kirsten','','Gillibrand','Senator','United States Senate','478 Russell Senate Office Building','','Washington','DC','20510','(202) 224-4451',NULL,'(202) 228-0282',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'kirsten_gillibrand@gillibrand.senate.gov','http://gillibrand.senate.gov/contact/','http://gillibrand.senate.gov/','','; ',NULL,'2011-02-22 11:51:57','4f422448-e118-4604-a4ea-1643d277b669.jpg'),
(8,'d8847885-dfcc-4e4d-81af-e402c95dacb0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-03 00:00:00',NULL,'2017-01-03 00:00:00',NULL,NULL,'Charles','Ellis','Schumer','Senator','United States Senate','322 Hart Senate Office Building','','Washington','DC','20510','(202) 224-6542',NULL,'(202) 228-3027',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','https://schumer.senate.gov/Contact/contact_chuck.cfm','http://schumer.senate.gov/','','; ',NULL,'2011-09-26 10:15:52',NULL),
(9,'4f166531-713c-4f93-97c9-14233be0a695',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2009-01-20 00:00:00',NULL,'2013-01-21 00:00:00',NULL,NULL,'Joseph','','Biden','Vice President','The White House','1600 Pennsylvania Avenue NW','','Washington','DC','20500','',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','http://www.whitehouse.gov/contact-vp','http://www.whitehouse.gov/administration/vice-president-biden','','; ',NULL,'2010-01-21 00:00:00','4f166531-713c-4f93-97c9-14233be0a695.jpg'),
(10,'f36fe606-c94c-422c-82ed-6ac38f8c2be7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2009-01-20 00:00:00',NULL,'2013-01-21 00:00:00',NULL,NULL,'Barack','Hussein','Obama','President','The White House','1600 Pennsylvania Avenue NW','','Washington','DC','20500','202-456-1111',NULL,'202-456-2461',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','http://www.whitehouse.gov/contact/','http://www.whitehouse.gov/administration/president_obama/','http://www.barackobama.com/index.php','; ',NULL,'2009-08-31 00:00:00',NULL),
(11,'0b01cb11-43b9-4060-8c4d-de081982b01a',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2013-01-01 00:00:00',NULL,NULL,'Sean ','T.','Hanna','Assemblyman','New York State Assembly','Legislative Office Building','Room 543','Albany','NY','12248','(518) 455-5662',NULL,'(518) 455-5918',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hannas@assembly.state.ny.us','','http://assembly.state.ny.us/mem/Sean-T-Hanna','','; ',NULL,'2011-02-14 14:37:45',NULL),
(12,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2013-01-01 00:00:00',NULL,NULL,'James','S.','Alesi','Senator','New York State Senate','Legislative Office Building','Room 304','Albany','NY','12247','(518) 455-2015',NULL,'(518) 426-6968',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'alesi@senate.state.ny.us','','http://www.nysenate.gov/senator/james-s-alesi','','; ',NULL,'2011-03-23 11:57:20',NULL),
(13,'6a963ab3-891e-426d-be33-1e8d74ea4be8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-03 00:00:00',NULL,'2013-01-03 00:00:00',NULL,NULL,'Thomas','','Reed','Representative','United States House of Representatives','1037 Longworth  Office Building','','Washington','DC','20515','(202) 225-3161',NULL,'(202) 226-6599',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','https://reed.house.gov/contact-me/email-me ','http://reed.house.gov/','','; ',NULL,'2011-03-01 16:20:12',NULL),
(14,'14405d40-a502-4406-a03e-8e67ef4a9548',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2013-01-01 00:00:00',NULL,NULL,'Ron','','Canestrari','Assemblymember','New York State Assembly','Legislative Office Building','Room 926','Albany','NY','12248','(518) 455-4474',NULL,'(518) 455-4727',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'canestr@assembly.state.ny.us','','http://assembly.state.ny.us/mem/Ron-Canestrari','','; ',NULL,'2011-03-24 10:57:30',NULL),
(15,'5f66835e-352a-47b4-be4a-67bc861f8d0f',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2011-01-01 00:00:00',NULL,'2013-01-01 00:00:00',NULL,NULL,'Neil','D.','Breslin','Senator','New York State Senate','Capitol Building','Room 413','Albany','NY','12247','(518) 455-2225',NULL,'(518) 426-6807',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'breslin@senate.state.ny.us','','http://www.nysenate.gov/senator/neil-d-breslin','','; ',NULL,'2011-03-23 11:38:48',NULL);

/*Table structure for table `tbl_elected_officials_comments` */

DROP TABLE IF EXISTS `tbl_elected_officials_comments`;

CREATE TABLE `tbl_elected_officials_comments` (
  `elected_officer_id` varchar(255) NOT NULL,
  `article_id` int(11) NOT NULL auto_increment,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_modified` datetime default NULL,
  `article_type` enum('article','poll') default 'article',
  `support` int(3) default NULL,
  `oppose` int(3) default NULL,
  `no_opinion` int(3) default NULL,
  `modified` date default NULL,
  PRIMARY KEY  (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_elected_officials_comments` */

insert into `tbl_elected_officials_comments` values 
('41d47c9b-0e95-446a-9017-99c7588eb83d',21,'Test pan1','2012-01-27 16:48:45',NULL,'poll',NULL,NULL,NULL,NULL),
('41d47c9b-0e95-446a-9017-99c7588eb83d',24,'test pan 8','2012-01-27 17:05:46',NULL,'poll',NULL,NULL,NULL,NULL),
('41d47c9b-0e95-446a-9017-99c7588eb83d',23,'test pan 22345678','2012-01-27 16:50:10','2012-01-27 16:53:26','article',NULL,NULL,NULL,NULL),
('41d47c9b-0e95-446a-9017-99c7588eb83d',6,'H.T. Farley article','2012-01-12 11:22:43',NULL,'article',NULL,NULL,NULL,NULL),
('214db873-ec51-4c9b-861d-92cf58e88abb',8,'ER Section&gt;&gt; Reports&gt; Nothing dispalyed when click on the links available on the reports section. Refer the attached screen shot','2012-01-23 18:07:54',NULL,'article',NULL,NULL,NULL,NULL),
('214db873-ec51-4c9b-861d-92cf58e88abb',9,'ER Section&gt;&gt; Reports&gt; Nothing dispalyed when click on the links available on the reports section. Refer the attached screen shot','2012-01-23 18:08:06',NULL,'poll',NULL,NULL,NULL,NULL),
('41d47c9b-0e95-446a-9017-99c7588eb83d',10,'Advertising world has led to the emergence of many new roles within the advertising profession. In the new edge of ad world, advertising goes beyond its conventional approach. For the non-conventional','2012-01-25 10:48:58',NULL,'article',NULL,NULL,NULL,NULL),
('41d47c9b-0e95-446a-9017-99c7588eb83d',14,'Test Advertising world has led to the emergence of many new roles within the advertising profession. In the new edge of ad world, advertising goes beyond its conventional approach. For the non-','2012-01-25 12:04:00',NULL,'article',NULL,NULL,NULL,NULL),
('41d47c9b-0e95-446a-9017-99c7588eb83d',17,'Are we so good enough to encourage Are we so good enough to encourage Are we so good enough to encourage Are we so good enough to encourage Are we so good enough to encourage Are we so good enough to encourage Are we so good enough to encourage Are we so good enough to encourage Are we so good enoug','2012-01-25 17:15:54',NULL,'poll',NULL,NULL,NULL,NULL),
('41d47c9b-0e95-446a-9017-99c7588eb83d',25,'Newest poll','2012-01-27 18:38:38',NULL,'poll',NULL,NULL,NULL,NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=222 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_member` */

insert into `tbl_member` values 
(1,'First Namea','First Namea','defaultaff','anil.nautiyal@netsmartz.net','e10adc3949ba59abbe56e057f20f883e','y','affiliate','2011-07-19 18:25:23',NULL),
(194,'firstname','lastnema','myobserver','paras.shah@sebiz.net','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2012-01-22 17:02:50',NULL),
(177,'Deleted First','Deleted Last','euser','notused@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','affiliate','2011-12-27 14:52:16',NULL),
(176,'Kirsten','Gillibrand','kirstengillibra','aniltestsebiznew@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','elected_official','2011-12-26 18:16:55','4f422448-e118-4604-a4ea-1643d277b669'),
(174,'Hugh','T. Farley','hughtfarley','aniltestsebiz@gmail.com','fcea920f7412b5da7be0cf42b8c93759','y','elected_official','2011-12-25 19:17:32','41d47c9b-0e95-446a-9017-99c7588eb83d'),
(173,'Subscriber','Last Name','subscriber','anil.netsmartz@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2011-12-24 22:56:35',NULL),
(178,'mbmnbmnb','bmnbnmbn','testobserver','asd@asd.com','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2011-12-27 17:52:04',NULL),
(175,'First Name','Last Name','otheraffiliate','anilphp111@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','affiliate','2011-12-26 18:09:10',NULL),
(171,'First Name','Last Name','observer','anil.nautiyal@sebiz.net','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2011-12-24 22:44:02',NULL),
(179,'onemore','onemore','onemore','aman.kamboj@netsmartz.net','e10adc3949ba59abbe56e057f20f883e','y','affiliate','2011-12-27 19:40:53',NULL),
(180,'subscriber','anir','subscriberani','anirudh.sood@sebiz.net','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2011-12-28 11:42:54',NULL),
(184,'tets','name','onetimesubscrib','email@gmail.com','e10adc3949ba59abbe56e057f20f883e','n','Subaff','2012-01-16 10:43:49',NULL),
(181,'First Name','Last Name','onetimesubscrib','anil.nautiyal@netsmartz.net','e10adc3949ba59abbe56e057f20f883e','d','newsub','2011-12-28 12:36:19',NULL),
(182,'Joseph','Biden','joseph','asdsad@sad.com','e10adc3949ba59abbe56e057f20f883e','y','elected_official','2011-12-29 14:26:45','4f166531-713c-4f93-97c9-14233be0a695'),
(183,'Robert','Duffy','robertduffy','pranav.tiwari@netsmartz.net','ae2b1fca515949e5d54fb22b8ed95575','y','elected_official','2012-01-03 12:38:46','214db873-ec51-4c9b-861d-92cf58e88abb'),
(185,'test','lastname','usa123','new@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2012-01-18 15:10:13',NULL),
(186,'test','custnoe','usa','admin@gmail.comdf','e10adc3949ba59abbe56e057f20f883e','y','observer','2012-01-18 15:56:16',NULL),
(187,'tets','last','testuser','testemail@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','observer','2012-01-18 16:36:40',NULL),
(188,'fname','lname','tempelixir','temp@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2012-01-18 17:14:38',NULL),
(189,'test','lastname','qwerty','qwe@sdf.com','e10adc3949ba59abbe56e057f20f883e','y','observer','2012-01-18 17:40:45',NULL),
(190,'tets','name','observer123','email123@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','observer','2012-01-21 11:12:48',NULL),
(191,'tets','name','username1','myemail@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2012-01-21 12:08:42',NULL),
(193,'tets','name','usernamef','email13@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','affiliate','2012-01-21 17:12:29',NULL),
(195,'Mike','Grow','affiliate1','balramtest13@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','y','affiliate','2012-01-23 14:11:43',NULL),
(196,'test','test','affiliate2','balramtest14@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','y','affiliate','2012-01-23 14:12:49',NULL),
(197,'Himender','Chandel','observer5','himenderc@yahoo.com','ae2b1fca515949e5d54fb22b8ed95575','y','subscriber','2012-01-23 14:38:01',NULL),
(198,'Abhi','KK','observer6','balramtest1@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','y','subscriber','2012-01-23 15:46:51',NULL),
(199,'TT','SS','observer7','Blaramtest2@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','y','subscriber','2012-01-23 16:35:03',NULL),
(200,'MM','KK','affiliate3','balramtest3@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','y','affiliate','2012-01-23 16:44:36',NULL),
(201,'SS','KK','observer8','balramtest4@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','y','subscriber','2012-01-23 17:01:00',NULL),
(202,'testobject','testobject','testobject','testobject@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','observer','2012-01-23 17:57:31',NULL),
(203,'testobject','testobject','testobject1','testobject1@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','observer','2012-01-23 18:06:29',NULL),
(204,'YY','MM','observer9','balramtest5@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','y','observer','2012-01-23 18:18:59',NULL),
(205,'QQ','TT','him_obs','balramtest6@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','y','observer','2012-01-23 18:26:05',NULL),
(206,'RR','SS','him_obs1','balramtest@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','y','subscriber','2012-01-23 18:33:49',NULL),
(207,'first','last','defaultaff2','qtestemail@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','affiliate','2012-01-23 18:44:01',NULL),
(208,'first','observer','obsubs','observer6@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2012-01-23 18:51:19',NULL),
(209,'firstname','lastname','affiliate123','adminqwe@gmail.com','e10adc3949ba59abbe56e057f20f883e','y','affiliate','2012-01-23 19:35:18',NULL),
(210,'test','test','test1','test1@nomail.com','96e79218965eb72c92a549dd5a330112','y','observer','2012-01-23 20:12:20',NULL),
(211,'Test','Test','test11','test11@nomail.com','96e79218965eb72c92a549dd5a330112','y','subscriber','2012-01-23 20:14:37',NULL),
(212,'test','test','test111','test111@nomail.com','96e79218965eb72c92a549dd5a330112','y','observer','2012-01-23 20:23:30',NULL),
(213,'Ankur','Dev','test1111','test1111@nomail.com','96e79218965eb72c92a549dd5a330112','y','observer','2012-01-23 20:25:29',NULL),
(214,'Pankaj','Sharma','pans','testing@netsmartz.net','e10adc3949ba59abbe56e057f20f883e','y','observer','2012-01-27 17:36:23',NULL),
(215,'Pankaj','Sharma','userNew','testing2@netsmartz.net','e10adc3949ba59abbe56e057f20f883e','y','subscriber','2012-01-27 17:42:58',NULL),
(216,'ppppp','ssss','ps08','testing5@netsmartz.net','25d55ad283aa400af464c76d713c07ad','y','observer','2012-01-27 19:57:47',NULL),
(217,'ppp','ss','pans008','testing4@netsmartz.net','25d55ad283aa400af464c76d713c07ad','y','observer','2012-01-27 20:05:24',NULL),
(218,'ppp','sss','pans08','testing4@netsmartz.nett','25d55ad283aa400af464c76d713c07ad','y','observer','2012-01-27 20:08:55',NULL),
(219,'ppp','sss','pans0808','testing3@netsmartz.nett','25d55ad283aa400af464c76d713c07ad','y','observer','2012-01-27 20:12:56',NULL),
(220,'df','esfs','pkjs','testing8@scd.com','25d55ad283aa400af464c76d713c07ad','y','observer','2012-01-27 20:19:35',NULL),
(221,'gg','gvf','pspsps08','ps@ps.com','e10adc3949ba59abbe56e057f20f883e','y','observer','2012-01-27 20:24:13',NULL);

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
(1,'About Us','About Us','About Us','&lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n    &lt;tbody&gt;\r\n        &lt;tr&gt;\r\n            &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n            &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                &lt;tbody&gt;\r\n                    &lt;tr&gt;\r\n                        &lt;td align=&quot;left&quot; valign=&quot;top&quot; class=&quot;arial_16_c40306&quot;&gt;\r\n                        &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                            &lt;tbody&gt;\r\n                                &lt;tr&gt;\r\n                                    &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n                                    &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                        &lt;tbody&gt;\r\n                                            &lt;tr&gt;\r\n                                                &lt;td align=&quot;left&quot; valign=&quot;top&quot; class=&quot;arial_16_c40306&quot;&gt;\r\n                                                &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                    &lt;tbody&gt;\r\n                                                        &lt;tr&gt;\r\n                                                            &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                            &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                &lt;tbody&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td align=&quot;left&quot; valign=&quot;top&quot; height=&quot;37&quot; class=&quot;Trebuchet_27_c60000&quot;&gt;About Us&lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td bgcolor=&quot;#b1b0ac&quot; align=&quot;left&quot; valign=&quot;top&quot; class=&quot;arial_20_c40306&quot;&gt;&lt;img width=&quot;1&quot; height=&quot;1&quot; alt=&quot;&quot; src=&quot;images/trans.gif&quot; /&gt;&lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                                        &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                            &lt;tbody&gt;\r\n                                                                                &lt;tr&gt;\r\n                                                                                    &lt;td align=&quot;left&quot; valign=&quot;top&quot; style=&quot;padding: 20px 0px 15px;&quot;&gt;\r\n                                                                                    &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                                        &lt;tbody&gt;\r\n                                                                                            &lt;tr&gt;\r\n                                                                                                &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                                                                &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                                                    &lt;tbody&gt;\r\n                                                                                                        &lt;tr&gt;\r\n                                                                                                            &lt;td align=&quot;left&quot; width=&quot;235&quot; valign=&quot;top&quot;&gt;&lt;img width=&quot;219&quot; height=&quot;140&quot; alt=&quot;&quot; src=&quot;images/img_aboutus_body.jpg&quot; /&gt;&lt;/td&gt;\r\n                                                                                                            &lt;td align=&quot;left&quot; valign=&quot;middle&quot; class=&quot;arial_12_000&quot;&gt;\r\n                                                                                                            &lt;h4&gt;&lt;span class=&quot;arial_15_000_bold&quot;&gt;&lt;span class=&quot;Title&quot;&gt;ABOUT OUR VOICES FOR CHANGE.COM (VOICES) &lt;/span&gt;&lt;/span&gt;&lt;/h4&gt;\r\n                                                                                                            &lt;h3&gt;&amp;nbsp;&lt;/h3&gt;\r\n                                                                                                            &lt;p class=&quot;arial_12_000&quot;&gt;VOICES was created to provide tools that will allow; citizens that are frustrated at the lack of response from elected officials to be heard in a manner never before available, elected representatives a platform to inform their constituents what they are trying to accomplish for them, and advocacy organizations a method to inform their followers of their positions on issues, and rally them to action.&lt;/p&gt;\r\n                                                                                                            &lt;p class=&quot;arial_12_000&quot;&gt;VOICES provides you, as a citizen, a platform with which you can inform your state and federal officials on how you would like them to vote on legislation, and a method to track what actions the representative takes.&lt;/p&gt;\r\n                                                                                                            &lt;/td&gt;\r\n                                                                                                        &lt;/tr&gt;\r\n                                                                                                    &lt;/tbody&gt;\r\n                                                                                                &lt;/table&gt;\r\n                                                                                                &lt;/td&gt;\r\n                                                                                            &lt;/tr&gt;\r\n                                                                                        &lt;/tbody&gt;\r\n                                                                                    &lt;/table&gt;\r\n                                                                                    &lt;/td&gt;\r\n                                                                                &lt;/tr&gt;\r\n                                                                                &lt;tr style=&quot;font-family: Arial;&quot;&gt;\r\n                                                                                    &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES provides a method for individuals with a similar position on an issue to inform an elected official of their position on a collective basis, so your voice is no longer singular. &lt;br /&gt;\r\n                                                                                    &lt;br /&gt;\r\n                                                                                    For organizations that advocate a position on matters important to its members VOICES provides an unparalleled set of tools. Each time a member that has identified your group as it &amp;quot;Prime Affiliate&amp;quot; logs in to VOICES, &amp;nbsp;your Affiliate page is presented on the member&#039;s dashboard, automatically updated with all content you have posted. &lt;br /&gt;\r\n                                                                                    &lt;br /&gt;\r\n                                                                                    Each elected representative is also provided with an &amp;quot;Elected Representative&amp;quot; page, which is tied to each of his constituents dashboard. We validate that the member does in fact live in the representative&#039;s district. A powerful tool set is provided to the representative, through which they can communicate with their constituents.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;HOW VOICES WORKS FOR:&lt;/p&gt;\r\n                                                                                    &lt;link media=&quot;all&quot; href=&quot;http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css&quot; type=&quot;text/css&quot; rel=&quot;stylesheet&quot; /&gt;&lt;script src=&quot;http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;&lt;script src=&quot;http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;&lt;script&gt;\r\n	$(function() {\r\n		$( &quot;#tabs&quot; ).tabs();\r\n	});\r\n	&lt;/script&gt;\r\n                                                                                    &lt;div class=&quot;demo&quot;&gt;\r\n                                                                                    &lt;div id=&quot;tabs&quot;&gt;\r\n                                                                                    &lt;ul&gt;\r\n                                                                                        &lt;li&gt;&lt;a class=&quot;arial_12_000&quot; href=&quot;#tabs-1&quot;&gt;Advocates&lt;/a&gt;&lt;/li&gt;\r\n                                                                                        &lt;li&gt;&lt;a class=&quot;arial_12_000&quot; href=&quot;#tabs-2&quot;&gt;Citizens&lt;/a&gt;&lt;/li&gt;\r\n                                                                                        &lt;li&gt;&lt;a class=&quot;arial_12_000&quot; href=&quot;#tabs-3&quot;&gt;Elected Representatives&lt;/a&gt;&lt;/li&gt;\r\n                                                                                    &lt;/ul&gt;\r\n                                                                                    &lt;div id=&quot;tabs-1&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;For Advocates&lt;/strong&gt;&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES was created to provide a platform that will allow citizens to express their opinions to their elected representatives in a meaningful way. These citizens rely on groups such as yours that they identify with to provide opinions and positions on matters important to them. The tools provided in our platform will stimulate your membership to action because they will realize that their voices will be heard. VOICES asks its members to identify a &amp;ldquo;Prime Affiliate&amp;rdquo; and other Affiliates whose opinions they would like to consider, before they express themselves to their elected representatives. Once they do so, the Prime Affiliate&#039;s home page appears on the member&#039;s dashboard when they log in. VOICES also pays a significant referral fee to the Prime Affiliate that a member identifies when they join. When a group becomes a VOICES &amp;ldquo;Affiliate&amp;rdquo;, we create an affiliate&#039;s home page for you. Any member can view any affiliate&#039;s page. Your Affiliate&#039;s page provides for the following:&lt;/p&gt;\r\n                                                                                    &lt;ul&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Upon sign-up we create a blank page for affiliate&lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;We create space at top for banner/logo etc&lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;We allow 4 sections for your organization to post data&lt;/li&gt;\r\n                                                                                    &lt;/ul&gt;\r\n                                                                                    &lt;ol&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;News section (with comments from affiliate) informing members of position on issues\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Any topic of interest an affiliate normally take a position on i.e. economic issues (debt ceiling etc) gay marriage, healthcare, etc etc&lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;create drop-down where members can also post their comment on the article placed in this section by the Affiliate&lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Bills/petitions section\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Posting a comment on a bill creates the Bill Resource page, when a member clicks on a bill with a comment on this page they are taken to the Bill Resources page, otherwise they can just read comment&lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Petitions posted here allow for members to sign, and is listed under &amp;ldquo;validated signors&amp;rdquo; (which tells elected reps that the Petition was signed by one of their constituents).&lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Bulletins section affiliate may post articles (no comments allowed from members)\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Endorsing candidates,&lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Meeting notices&lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;etc., etc.&lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;Advertising section allows Affiliate to post;\r\n                                                                                        &lt;ul&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Sponsors list with link to sponsor site&lt;/li&gt;\r\n                                                                                            &lt;li class=&quot;arial_12_000&quot;&gt;Ads from sponsors allowing for one visual graphic&lt;/li&gt;\r\n                                                                                        &lt;/ul&gt;\r\n                                                                                        &lt;/li&gt;\r\n                                                                                    &lt;/ol&gt;\r\n                                                                                    &lt;ul&gt;\r\n                                                                                        &lt;li class=&quot;arial_12_000&quot;&gt;&amp;ldquo;DONATE&amp;rdquo;, VOICES creates and provides a link for affiliates to set up a Paypal account at which your followers can make contributions to you. When a member clicks on that link they are taken to Paypal, make a contribution, and it is credited to your account.&lt;/li&gt;\r\n                                                                                    &lt;/ul&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;div id=&quot;tabs-2&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;For Citizens&lt;/strong&gt;&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;As a citizen you have every right to expect your elected representatives to listen to the people. VOICES was created to provide you with a platform to communicate with your elected reps, after considering the opinions of those organizations you respect and identify with, and allows you to see how your elected reps act on your requests.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;HOW VOICES WORKS&lt;/strong&gt;&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;When you become a VOICES member, we identify each state and federal elected official that represent you. When you log in; each elected rep is listed &amp;nbsp;on your dashboard, and when you identify a group you support as your Prime Affiliate, their page appears on a section of your dashboard, as well. You can identify as many groups as you wish as Affiliates you might wish to view, and we provide links to their pages, only your Prime Affiliate&#039;s page appears on your dashboard.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;Each time a bill comes out of committee to be scheduled for a floor vote in a legislative body VOICES sends you an email,(VOTE ALERT) and you will be able to express your opinion to your Elected Representative (ER) how you would like him or her to vote on that bill; when you click on &amp;ldquo;VOICE MY OPINION&amp;rdquo; that ALERT will be returned to VOICES, the results tabulated, and forwarded to your ER.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;Any opinions expressed by your Affiliate(s) will be displayed on your VOTE ALERT to consider. VOICES tabulates the results of all of the opinions expressed to that ER on that particular bill. When that bill is voted on VOICES reports to you how your ER voted on that bill, and the percentage of opinions expressed supporting or opposing that bill. VOICES also creates a cumulative report on all votes the ER casts on legislation, along with the percentage of opinions supporting or opposing each bill.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES also creates a page for each elected representative. The representative is provided with a &amp;quot;feed&amp;quot; to that page by VOICES. The elected representative can use this page to keep constituents informed on initiatives he takes on their behalf. For instance, he might post that he is trying to alleviate high unemployment in the community by asking a company to move into the area creating new job opportunities, and providing them with assistance to do so. The ER can also post comments on this page as to why they voted for/against a given bill.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;You can communicate your thoughts to your elected official on that page if you wish, so long as you comply with VOICES User agreement as to profanity rules etc. VOICES also posts results of Vote Alerts on that page, as well as other information that is pertinent to that official, and allows him to post comments to his constituents on that page as well. As a VOICES member you can view the content of any Affiliate&#039;s pages. However, Affiliates can communicate ONLY with members that select them. This protects you from being inundated with opinions from organizations that you do not choose tot hear from. We do not provide your email to anyone.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;Please review our &lt;a href=&quot;http://voices4change.netsmartz.us/index.php?stage=pages&amp;amp;mode=Faq&quot;&gt;FAQ&lt;/a&gt; section to learn more about us.&lt;/p&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;div id=&quot;tabs-3&quot;&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;&lt;strong&gt;ELECTED REPRESENTATIVES&lt;/strong&gt;&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES was created to provide citizens with a platform to communicate with their elected representatives, and for those representatives to communicate with their constituentts. We create an Elected Rep&#039;s page for each elected official of each of our members. As an elected representative you can post articles on your elected rep&#039;s page to inform your constituents on efforts you are taking on their behalf.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;For example, you might inform them of efforts you are taking to bring a business into the area to provide more employment oportunities in your district. You can also create polls for your constituents to respond to on matters you consider important, including proposed legislation. You can state your position on important issues, as well. We also provide you with a link to set up an account on Paypal that will accept contributions if you have 501(c)(3) status in your campaign entity. You, of course, can also seek volunteers to work on your campaign.&lt;/p&gt;\r\n                                                                                    &lt;p class=&quot;arial_12_000&quot;&gt;VOICES platform provides a mechanism to provide you with opinions of your constituents. We have verified that these opinions are provided only by residents within your district. VOICES platform only allows members that live within your district to contact you via their elected reps pages. When a member joins VOICES we bill a small fee to their credit card. We then identify their elected reps using their home address, and incorporate that information in their user profile. Our merchamt services provider sends us an email validating that the member resides at the address the member provided. Therefore we know that the member resides in your district, is at least eighteen years of age and has a social security number.&lt;/p&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;!-- End demo --&gt;\r\n                                                                                    &lt;div class=&quot;demo-description&quot; style=&quot;display: none;&quot;&gt;\r\n                                                                                    &lt;p&gt;Click tabs to swap between content that is broken into logical sections.&lt;/p&gt;\r\n                                                                                    &lt;/div&gt;\r\n                                                                                    &lt;!-- End demo-description --&gt;&lt;/td&gt;\r\n                                                                                &lt;/tr&gt;\r\n                                                                                &lt;tr&gt;\r\n                                                                                    &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;&amp;nbsp;&lt;/td&gt;\r\n                                                                                &lt;/tr&gt;\r\n                                                                            &lt;/tbody&gt;\r\n                                                                        &lt;/table&gt;\r\n                                                                        &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                &lt;/tbody&gt;\r\n                                                            &lt;/table&gt;\r\n                                                            &lt;/td&gt;\r\n                                                        &lt;/tr&gt;\r\n                                                        &lt;tr&gt;\r\n                                                            &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;&amp;nbsp;&lt;/td&gt;\r\n                                                        &lt;/tr&gt;\r\n                                                    &lt;/tbody&gt;\r\n                                                &lt;/table&gt;\r\n                                                &lt;/td&gt;\r\n                                            &lt;/tr&gt;\r\n                                        &lt;/tbody&gt;\r\n                                    &lt;/table&gt;\r\n                                    &lt;/td&gt;\r\n                                &lt;/tr&gt;\r\n                            &lt;/tbody&gt;\r\n                        &lt;/table&gt;\r\n                        &lt;/td&gt;\r\n                    &lt;/tr&gt;\r\n                &lt;/tbody&gt;\r\n            &lt;/table&gt;\r\n            &lt;/td&gt;\r\n        &lt;/tr&gt;\r\n    &lt;/tbody&gt;\r\n&lt;/table&gt;','2012-01-29','about_us'),
(2,'Privacy Policy','Privacy Policy','Privacy Policy','<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\r\n\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n  <table width=\"100%\" border=\"0\" cellspacing=\r\n  \"0\" cellpadding=\"0\">\r\n	<tr>\r\n	  <td height=\"37\" align=\"left\" valign=\"top\"\r\n	  class=\"Trebuchet_27_c60000\">\r\n		Privacy Policy\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td align=\"left\" valign=\"top\" bgcolor=\r\n	  \"#B1B0AC\" class=\"arial_20_c40306\">\r\n		<img src=\"images/trans.gif\" width=\"1\"\r\n		height=\"1\" alt=\"\">\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td>\r\n		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo turpis, ultrices eget facilisis a, ultrices at ipsum. In lacinia justo massa. Suspendisse dictum scelerisque sem non volutpat. Donec condimentum blandit massa in consectetur. In non urna purus, in congue nisl. Morbi congue bibendum diam non luctus. Morbi eu metus et ipsum venenatis rutrum. Etiam in leo at leo porta tincidunt. Vivamus accumsan nisl sed lectus gravida vel lacinia orci auctor. Cras laoreet elit sed diam hendrerit consectetur. Suspendisse fringilla aliquet ligula, vitae faucibus magna pulvinar eu. Morbi feugiat volutpat mi quis vestibulum. Praesent ac auctor sem. Vestibulum ac ornare augue.</p>\r\n\r\n<p>Nam vitae nunc quis nisl gravida imperdiet sed eget dolor. Etiam adipiscing, erat nec fermentum gravida, orci mi blandit mi, a pulvinar risus purus eget sem. Curabitur hendrerit arcu quis quam sollicitudin nec tincidunt urna molestie. Sed vehicula mattis imperdiet. Curabitur sed sapien dolor. Aenean nec augue turpis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean a risus in enim placerat imperdiet. Morbi sit amet orci ligula. Donec id urna vitae elit vestibulum pellentesque. Cras fermentum libero in lorem faucibus consectetur. Proin nec est mauris. Etiam eu augue ac erat varius auctor volutpat et nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer luctus elementum ullamcorper. Vivamus libero felis, consequat nec placerat sit amet, adipiscing vel nibh. Aliquam tincidunt leo mattis sem elementum laoreet. Sed blandit lobortis odio, eget ultrices elit sodales in.</p>\r\n\r\n<p>Sed pretium elit in ipsum adipiscing aliquet. Praesent sollicitudin enim sed odio tempus sed lobortis risus ultrices. Curabitur elit tortor, molestie nec pulvinar vitae, pellentesque eget magna. Aenean rutrum magna nunc. Ut eget justo justo, eget tristique nisi. Vestibulum dignissim dapibus aliquam. Integer porttitor, mauris eu dictum commodo, neque augue tincidunt dui, quis convallis nisl ipsum eu urna. Vivamus at orci orci. Proin a felis sed est pretium blandit. Phasellus venenatis tincidunt nisi. Sed id placerat nisl.</p>\r\n\r\n<p>Praesent lacinia auctor risus id congue. Morbi nisl velit, placerat vitae blandit nec, accumsan a ligula. Sed tincidunt orci eget augue bibendum rutrum. Vestibulum convallis molestie dignissim. Nullam fermentum diam malesuada massa dapibus tempor. Maecenas molestie consequat eleifend. Suspendisse facilisis lectus sit amet sapien accumsan tristique. Curabitur et ipsum erat. In nec magna nisl. Fusce aliquam sodales dignissim. Donec ullamcorper faucibus volutpat. In vitae dolor ligula. Curabitur vehicula tempus consectetur. Cras in diam orci, sit amet tincidunt justo. Aliquam ullamcorper, sapien non pulvinar scelerisque, elit ipsum pulvinar leo, ac volutpat metus velit vitae lacus.</p>\r\n\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas ultrices nisl et dui lacinia at sodales urna placerat. Maecenas tristique ligula ac libero aliquam eget laoreet mauris dignissim. In sit amet leo non odio molestie ultricies vitae eu enim. In ut turpis nulla. Phasellus porta tellus a mauris hendrerit semper. Nam eu urna nulla. Proin purus est, adipiscing ut laoreet id, elementum sit amet magna. Nunc commodo fermentum nisl et adipiscing. Sed cursus ultrices eros, at aliquam leo tristique vitae. Cras sit amet vestibulum urna. Mauris ultrices felis a ante gravida suscipit. Pellentesque sit amet lacus mi, eget sollicitudin tortor. Etiam sit amet mauris faucibus elit tempor rhoncus id sit amet felis. Vestibulum vel ante est. Morbi et libero sem, vel congue arcu. </p>\r\n	  </td>\r\n	</tr>\r\n  </table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\"></td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>','2011-06-23','privacy_policy'),
(19,'FAQ','FAQ','FAQ','&lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n    &lt;tbody&gt;\r\n        &lt;tr&gt;\r\n            &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n            &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                &lt;tbody&gt;\r\n                    &lt;tr&gt;\r\n                        &lt;td align=&quot;left&quot; valign=&quot;top&quot; class=&quot;arial_16_c40306&quot;&gt;\r\n                        &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                            &lt;tbody&gt;\r\n                                &lt;tr&gt;\r\n                                    &lt;td class=&quot;arial_16_c40306&quot;&gt;\r\n                                    &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                        &lt;tbody&gt;\r\n                                            &lt;tr&gt;\r\n                                                &lt;td align=&quot;left&quot; valign=&quot;top&quot; class=&quot;arial_16_c40306&quot;&gt;\r\n                                                &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                    &lt;tbody&gt;\r\n                                                        &lt;tr&gt;\r\n                                                            &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                            &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                &lt;tbody&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td height=&quot;37&quot; align=&quot;left&quot; valign=&quot;top&quot; class=&quot;Trebuchet_27_c60000&quot;&gt;FAQs&lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td align=&quot;left&quot; bgcolor=&quot;#b1b0ac&quot; valign=&quot;top&quot; class=&quot;arial_20_c40306&quot;&gt;&lt;img height=&quot;1&quot; width=&quot;1&quot; alt=&quot;&quot; src=&quot;images/trans.gif&quot; /&gt;&lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                    &lt;tr&gt;\r\n                                                                        &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                                        &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                            &lt;tbody&gt;\r\n                                                                                &lt;tr&gt;\r\n                                                                                    &lt;td align=&quot;left&quot; valign=&quot;top&quot; style=&quot;padding: 20px 0px 15px;&quot;&gt;\r\n                                                                                    &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                                        &lt;tbody&gt;\r\n                                                                                            &lt;tr&gt;\r\n                                                                                                &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;\r\n                                                                                                &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n                                                                                                    &lt;tbody&gt;\r\n                                                                                                        &lt;tr&gt;\r\n                                                                                                            &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;&amp;nbsp;&lt;/td&gt;\r\n                                                                                                            &lt;td align=&quot;left&quot; valign=&quot;middle&quot; class=&quot;arial_12_000&quot;&gt;\r\n                                                                                                            &lt;ol&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Is my personal information secure?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Yes, our site is fully encrypted.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;All personal information is stored on a device that is not connected to the internet.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;All financial transactions occur over secure servers, and then all of that data is stored  on devices not connected to the internet.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Why is my voice more powerful on VOICES?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Currently, if you express your opinion to an elected representative, you do so singularly,  if you express your opinion on an issue via VOICES, all opinions expressed on that issue  to that elected representative on the issue are done so individually, but the results of  ALL of the opinions are tabulated by VOICES, and therefore you are expressing your  opinion COLLECTIVELY to the Representative.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;The resulting opinions on each issue are  reported back to you on that COLLECTIVE basis.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;How does VOICES work?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Each time a bill is coming up for a vote in a legislative body VOICES will send you a VOTE ALERT asking you to express your opinion to your Elected Representative [ER] asking whether you support or oppose that bill. The alert contains a kink to the text of  the bill as well if you wish to read it.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;When you send that opinion back to VOICES it is then forwarded to the ER (via an  automatically created VOICESFORCHANGE.US email we create for you).&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;VOICES also tabulates the results of all VOICES Users opinions that are sent to that  ER on all bills, along with the the percentages of all opinions sent on each bill.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;How do I know how the ER voted on that bill?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;VOICES reports back to you how the ER voted on that bill; along with the percentage  of opinions expressed via VOICES supporting or opposing that bill.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;For example, if an elected official receives notices from VOICES where 75% of the  Users support the bill, and 25% oppose it, our Report Card on that bill will tell you how  the ER voted and the percentage of VOICES Users that supported and opposed that  piece of legislation.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;VOICES also creates a &#039;cumulative Report Card&#039; as to how the ER voted on all bills in  relationship to the opinions expressed via VOICES.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Do I need to know the names of all my state and federal Elected  Representatives? &lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;No, when you sign up providing VOICES with your street address VOICES will  identify each of your state and federal Elected Representatives.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;VOICES will then provide you with the name, address, phone number and email  address of each of your Elected Representatives.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Does VOICES share my email address or any other information with any  other organization?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;NO.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li id=&quot;7&quot;&gt;&lt;strong&gt;Why does VOICES charge a fee?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;We believe that if VOICES were provided for free, as is Facebook who derive their  revenue via advertising, we would DE-legitimize VOICES because any organization  could sign up any number of fictitious VOICES Users in an attempt to &amp;ldquo;stuff the ballots  box&amp;rdquo;.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;When we bill your credit/debit card or Paypal account we are able to verify that the  account exists at your billing address (which we ask for) and therefore we prevent those  that might attempt to &amp;ldquo;stuff the ballot box&amp;rdquo; from doing so because they would need to  create a payment account at an address that is valid.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;We are trying to provide you with a powerful tool, and because of the reasons cited  above we hope that you concur that it is of value to you. VOICES will never sell lists of  our clients, and in an attempt to remain totally non-partisan, will never accept  advertising, and therefore we must remain a fee for service entity.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Will VOICES express a position on an issue?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;No, VOICES is and shall remain non-partisan.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Will anyone or any entity express an opinion to me?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Perhaps, VOICES allows advocacy groups, such as; the political advocacy groups, labor  unions, AARP or other such groups to become VOICES &#039;Affiliates&#039;.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;If you choose to do so, you can identify each group whose opinions/position on bills you might wish to see.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;If you do so your VOTE ALERT will contain that Affiliate&#039;s comments on that legislation,  if the group becomes an Affiliate.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Can I identify more than one Affiliate?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Yes, as many as you wish.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;How much does VOICES charge an Affiliate for this service?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Nothing, we are providing the service to you.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;Affiliates are allowed to participate  because they may provide you more power by bringing Users with common views  together on a position, therefore making your voice more powerful.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Does VOICES help me, or Affiliates, in other ways?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Yes, there are numerous other facets to VOICES that you will see when you visit the  VOICES website.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;One very powerful tool is available in the &amp;ldquo;Issues Provides Answers&amp;rdquo;  segment. &amp;ldquo;Issues&amp;rdquo; allows for an Affiliate to present a &#039;Petition&#039; for signatures on a Bill  that is in committee, but not yet scheduled for a vote. &amp;lt;.li&amp;gt;&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;VOICES then sends the &#039;Petition&#039;  to all VOICES Users that have identified with the Affiliate.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;Once completed, the Petition  will be sent to the Chairman of the committee, each committee member, and the  Elected Representative of each User that signed the Petition.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;We leave it you to  determine what effect that might have if such a Petition contained up to, or more than one million signatures.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Does VOICES have a method for members or Affiliates to ask for legislation  to be introduced?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Yes, just as a Petition supports or opposes a bill already introduced, a Petition may also  be used to ask that legislators introduce new legislation.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;What is an &amp;ldquo;Alliance&amp;rdquo;?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Because VOICES hopes to make your voice more powerful, we allow Affiliates to form  alliances with other VOICES Affiliates that might take a similar position on proposed  legislation to submit a Petition to their followers on a combined basis to expand the  number of possible signatures.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;To do so, the administrators of each Affiliate must  inform VOICES administration department that they wish to collaborate on the Petition.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;It  then is sent to all members of all of the Affiliates in the alliance.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                                &lt;br /&gt;\r\n                                                                                                                &lt;li&gt;&lt;strong&gt;Can I submit a Petition?&lt;/strong&gt;\r\n                                                                                                                &lt;ul&gt;\r\n                                                                                                                    &lt;li&gt;Yes, you can post a Petition on  your VOICES &amp;ldquo;Member Page&amp;rdquo; for signature.&lt;/li&gt;\r\n                                                                                                                    &lt;li&gt;It will be  more effective if you were to submit the Petition to one of your Affiliates, and ask them  to form one or more alliances with other Affiliates, because it would then go to all Users  that identified themselves with those Affiliates.&lt;/li&gt;\r\n                                                                                                                &lt;/ul&gt;\r\n                                                                                                                &lt;/li&gt;\r\n                                                                                                            &lt;/ol&gt;\r\n                                                                                                            &lt;/td&gt;\r\n                                                                                                        &lt;/tr&gt;\r\n                                                                                                    &lt;/tbody&gt;\r\n                                                                                                &lt;/table&gt;\r\n                                                                                                &lt;/td&gt;\r\n                                                                                            &lt;/tr&gt;\r\n                                                                                        &lt;/tbody&gt;\r\n                                                                                    &lt;/table&gt;\r\n                                                                                    &lt;/td&gt;\r\n                                                                                &lt;/tr&gt;\r\n                                                                                &lt;tr&gt;\r\n                                                                                    &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;&amp;nbsp;&lt;/td&gt;\r\n                                                                                &lt;/tr&gt;\r\n                                                                            &lt;/tbody&gt;\r\n                                                                        &lt;/table&gt;\r\n                                                                        &lt;/td&gt;\r\n                                                                    &lt;/tr&gt;\r\n                                                                &lt;/tbody&gt;\r\n                                                            &lt;/table&gt;\r\n                                                            &lt;/td&gt;\r\n                                                        &lt;/tr&gt;\r\n                                                        &lt;tr&gt;\r\n                                                            &lt;td align=&quot;left&quot; valign=&quot;top&quot;&gt;&amp;nbsp;&lt;/td&gt;\r\n                                                        &lt;/tr&gt;\r\n                                                    &lt;/tbody&gt;\r\n                                                &lt;/table&gt;\r\n                                                &lt;/td&gt;\r\n                                            &lt;/tr&gt;\r\n                                        &lt;/tbody&gt;\r\n                                    &lt;/table&gt;\r\n                                    &lt;/td&gt;\r\n                                &lt;/tr&gt;\r\n                            &lt;/tbody&gt;\r\n                        &lt;/table&gt;\r\n                        &lt;/td&gt;\r\n                    &lt;/tr&gt;\r\n                &lt;/tbody&gt;\r\n            &lt;/table&gt;\r\n            &lt;/td&gt;\r\n        &lt;/tr&gt;\r\n    &lt;/tbody&gt;\r\n&lt;/table&gt;','2012-01-10','faq'),
(20,'Contacts Us','Contacts Us','Contacts Us','<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"arial_16_c40306\">\r\n            <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign=\"top\" align=\"left\" class=\"arial_16_c40306\">\r\n                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                            <tbody>\r\n                               <tr>\r\n                                    <td class=\"arial_16_c40306\">\r\n                                    <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td valign=\"top\" align=\"left\" class=\"arial_16_c40306\">\r\n                                                <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td valign=\"top\" align=\"left\">\r\n                                                            <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                <tbody>\r\n                                                                    <tr>\r\n                                                                        <td valign=\"top\" height=\"37\" align=\"left\" class=\"Trebuchet_27_c60000\"> Contact Us </td>\r\n                                                                    </tr>\r\n                                                                    <tr>\r\n                                                                        <td valign=\"top\" bgcolor=\"#b1b0ac\" align=\"left\" class=\"arial_20_c40306\"> <img width=\"1\" height=\"1\" src=\"images/trans.gif\" alt=\"\" /> </td>\r\n                                                                    </tr>\r\n                                                                    <tr>\r\n                                                                        <td valign=\"top\" align=\"left\">\r\n                                                                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                            <tbody>\r\n                                                                                <tr>\r\n                                                                                    <td valign=\"top\" align=\"left\" style=\"padding: 20px 0px 15px;\"> <span class=\"arial_15_000_bold\">Lorem ipsum dolor sit amet</span><br />\r\n                                                                                    <div style=\"text-align: center;\">\r\n                                                                                    <div style=\"text-align: left;\">                                                                                     </div>\r\n                                                                                    <div style=\"text-align: left;\"><span class=\"arial_12_000\">onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span class=\"arial_12_3b393a\"></span><br />                                                                                     <span class=\"arial_12_3b393a\"></span></div>\r\n                                                                                    </div>\r\n                                                                                    <span class=\"arial_12_3b393a\"> <br /></span> </td>\r\n                                                                                </tr>\r\n                                                                                <tr>\r\n                                                                                    <td valign=\"top\" align=\"left\">\r\n                                                                                    <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                                        <tbody>\r\n                                                                                            <tr>\r\n                                                                                                <td valign=\"top\" align=\"left\">\r\n                                                                                                <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                                                    <tbody>\r\n                                                                                                        <tr>\r\n                                                                                                            <td valign=\"top\" align=\"left\">  </td>\r\n                                                                                                            <td valign=\"middle\" align=\"left\" class=\"arial_12_000\"> <span class=\"arial_15_000_bold\">Nam vitae nunc quis nisl gravida</span><br /> <span class=\"arial_12_000\">Imperdiet sed eget dolor. Etiam adipiscing, erat nec fermentum gravida, orci mi blandit mi, a pulvinar risus purus eget sem. Curabitur hendrerit arcu quis quam sollicitudin nec tincidunt urna molestie. Sed vehicula mattis imperdiet. Curabitur sed sapien dolor. Aenean nec augue turpis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean a risus in enim placerat imperdiet. Morbi sit amet orci ligula. Donec id urna vitae elit vestibulum pellentesque. Cras fermentum libero in lorem faucibus consectetur. Proin nec est mauris. Etiam eu augue ac erat varius auctor volutpat et nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer luctus elementum ullamcorper. Vivamus libero felis, consequat nec placerat sit amet, adipiscing vel nibh. Aliquam tincidunt leo mattis sem elementum laoreet. Sed blandit lobortis odio, eget ultrices elit sodales in. </span> </td>\r\n                                                                                                        </tr>\r\n                                                                                                    </tbody>\r\n                                                                                                </table>\r\n                                                                                                </td>\r\n                                                                                            </tr>\r\n                                                                                        </tbody>\r\n                                                                                    </table>\r\n                                                                                    </td>\r\n                                                                                </tr>\r\n                                                                                <tr>\r\n                                                                                    <td valign=\"top\" align=\"left\">\r\n                                                                                    <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                                                                                        <tbody>\r\n                                                                                            <tr>\r\n                                                                                                <td valign=\"top\" align=\"left\" class=\"arial_12_000\"> onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br /> <br /> onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br /> <br /> onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>\r\n                                                                                            </tr>\r\n                                                                                        </tbody>\r\n                                                                                    </table>\r\n                                                                                    </td>\r\n                                                                                </tr>\r\n                                                                            </tbody>\r\n                                                                        </table>\r\n                                                                        </td>\r\n                                                                    </tr>\r\n                                                                </tbody>\r\n                                                            </table>\r\n                                                            </td>\r\n                                                        </tr>\r\n                                                      \r\n                                                    </tbody>\r\n                                                </table>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>','2011-06-24','contacts_us'),
(21,'Terms & Conditions','Terms & Conditions','Terms & Conditions','<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\r\n\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n  <table width=\"100%\" border=\"0\" cellspacing=\r\n  \"0\" cellpadding=\"0\">\r\n	<tr>\r\n	  <td height=\"37\" align=\"left\" valign=\"top\"\r\n	  class=\"Trebuchet_27_c60000\">\r\n		Terms & Conditions\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td align=\"left\" valign=\"top\" bgcolor=\r\n	  \"#B1B0AC\" class=\"arial_20_c40306\">\r\n		<img src=\"images/trans.gif\" width=\"1\"\r\n		height=\"1\" alt=\"\">\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td>\r\n\r\n<p>Sed pretium elit in ipsum adipiscing aliquet. Praesent sollicitudin enim sed odio tempus sed lobortis risus ultrices. Curabitur elit tortor, molestie nec pulvinar vitae, pellentesque eget magna. Aenean rutrum magna nunc. Ut eget justo justo, eget tristique nisi. Vestibulum dignissim dapibus aliquam. Integer porttitor, mauris eu dictum commodo, neque augue tincidunt dui, quis convallis nisl ipsum eu urna. Vivamus at orci orci. Proin a felis sed est pretium blandit. Phasellus venenatis tincidunt nisi. Sed id placerat nisl.</p>\r\n\r\n<p>Praesent lacinia auctor risus id congue. Morbi nisl velit, placerat vitae blandit nec, accumsan a ligula. Sed tincidunt orci eget augue bibendum rutrum. Vestibulum convallis molestie dignissim. Nullam fermentum diam malesuada massa dapibus tempor. Maecenas molestie consequat eleifend. Suspendisse facilisis lectus sit amet sapien accumsan tristique. Curabitur et ipsum erat. In nec magna nisl. Fusce aliquam sodales dignissim. Donec ullamcorper faucibus volutpat. In vitae dolor ligula. Curabitur vehicula tempus consectetur. Cras in diam orci, sit amet tincidunt justo. Aliquam ullamcorper, sapien non pulvinar scelerisque, elit ipsum pulvinar leo, ac volutpat metus velit vitae lacus.</p>\r\n\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas ultrices nisl et dui lacinia at sodales urna placerat. Maecenas tristique ligula ac libero aliquam eget laoreet mauris dignissim. In sit amet leo non odio molestie ultricies vitae eu enim. In ut turpis nulla. Phasellus porta tellus a mauris hendrerit semper. Nam eu urna nulla. Proin purus est, adipiscing ut laoreet id, elementum sit amet magna. Nunc commodo fermentum nisl et adipiscing. Sed cursus ultrices eros, at aliquam leo tristique vitae. Cras sit amet vestibulum urna. Mauris ultrices felis a ante gravida suscipit. Pellentesque sit amet lacus mi, eget sollicitudin tortor. Etiam sit amet mauris faucibus elit tempor rhoncus id sit amet felis. Vestibulum vel ante est. Morbi et libero sem, vel congue arcu. </p>\r\n	  </td>\r\n	</tr>\r\n  </table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\"></td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>','2011-06-24','terms_&_onditions'),
(22,'User License Agreement','User License Agreement','User License Agreement','<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tr>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td class=\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\" class=\r\n\"arial_16_c40306\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\"\r\ncellpadding=\"0\">\r\n<tr>\r\n<td align=\"left\" valign=\"top\">\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n	<tr>\r\n	  <td height=\"37\" align=\"left\" valign=\"top\" class=\"Trebuchet_27_c60000\">User License Agreement</td>\r\n	</tr>\r\n	<tr>\r\n	  <td align=\"left\" valign=\"top\" bgcolor=\"#B1B0AC\" class=\"arial_20_c40306\">\r\n		<img src=\"images/trans.gif\" width=\"1\" height=\"1\" alt=\"\">\r\n	  </td>\r\n	</tr>\r\n	<tr>\r\n	  <td align=\"left\" valign=\"top\" style=\"padding: 20px 0px 15px;\">\r\n	  <p class=\"arial_12_000\"><strong>This OUR VOICES Ltd. (herafter VOICES) Internet Product</strong> User License Agreement governs your use of and access to the <strong>VOICES Internet Product</strong> via the Internet. \r\n	  Your use of the Product is deemed acceptance of the terms and conditions herein. \r\n	  If you do not accept these terms and conditions do not access or use the Product.</p>\r\n	  <p class=\"arial_12_000\"><strong>Section 1.</strong> Grant of License. VOICES grants to User the nonexclusive right to use the information\r\nand tools accessed via VOICES Internet and available in any VOICES Internet product (\"Content\")\r\nin accordance with this Agreement and any user documentation provided online. Only an\r\nindividual to whom VOICES has assigned an individual USER ID and password may access the\r\nContent. In no event may User offer the use of any VOICES Internet product as a part of a service\r\nbureau, time-sharing, or other similar arrangement.</p>\r\n<p class=\"arial_12_000\">Content is provided to the User for the personal use of the User and not for re-sale. Content may\r\nbe used only for the purpose of User\'s political views on legislation proposed in the U.S., and for\r\nexpressing User\'s views on matters politic, and on candidates and individuals in the U.S., that\r\neffect matters, and relating to the well being of America.</p>\r\n<p class=\"arial_12_000\">User acknowledges that the Content constitutes valuable and proprietary property of VOICES or of\r\nthird parties who have contributed Content (\"Providers\"). If User wishes to use the Content in any\r\nmanner not expressly permitted by this Agreement, User may request permission from VOICES by\r\ngiving to VOICES a written description of the intended use and such other information as VOICES\r\nmay request. Only an authorized representative of VOICES may grant such permission. The\r\ngranting of such a request may entail an additional fee payable by User.</p>\r\n<p class=\"arial_12_000\">User acknowledges that the Content posted on USER and AFFILIATE PAGES IS PLACED\r\nTHERE BY USERS AND AFFILIATES AND THAT VOICES IS IN NO WAY RESPONSIBLE FOR\r\nSUCH CONTENT, AND USER AGREES;</p>\r\n<ol class=\"arial_12_000\">\r\n<li><strong>That they understand that the content provided is solely placed there by the\r\naffiliate.</strong></li>\r\n<li><strong>That the affiliate has agreed to abide by the rules of ethical behavior and that\r\nVOICES provides only a technology platform and is not responsible for the content.</strong></li>\r\n<li><strong>Further, if USER has an issue with something that USER WILL take it up with\r\nthe author of the material and notify VOICES.</strong></li>\r\n<li><strong>any interaction between USER and an affiliate for the purpose of contributing\r\nmoney or donation is strictly between the end user and the affiliate.</strong></li>\r\n<li><strong>VOICES does not certify that the organization is a 501(C)3 or that the donation\r\nwill be used in a manner represented or expected by the donor.</strong></li>\r\n</ol>\r\n<p class=\"arial_12_000\"><strong>Section 2.</strong> USER ID and Password Protection. User shall maintain as personal and confidential the\r\nVOICES-assigned unique USER ID and password. User is prohibited from transferring or sharing\r\nthe VOICES-assigned unique USER ID and from revealing the activating password to any\r\nunauthorized person. Any violation of the forgoing shall result in an immediate termination of such\r\nuser\'s access rights to any VOICES Internet product as well as liability to VOICES for all damages\r\nresulting from such breach. It is User\'s sole responsibility to protect the USER ID and activating\r\npassword from unauthorized use. User will be responsible for any charges to User\'s USER ID\r\nexcept when due to VOICES.; USER acknowledges that when USER signs a Petiton they becaome a\r\nVOICES Observer, and have the right to view all content on VOICES website, at no charge and VOICES\r\nhas the right to inform USER of all changes on VOICES website, as well as other information VOICES\r\ndeems appropriate.</p>\r\n<p class=\"arial_12_000\"><strong>Section 3.</strong> VOICES Reservation of Rights. VOICES and its Providers reserve all rights not\r\nexpressly granted to the User, including, but not limited to the right to alter, modify, update,\r\nenhance or improve the Content.\r\n<p class=\"arial_12_000\"><strong>Section 4.</strong> Term and Termination. This Agreement is effective until terminated. This Agreement\r\nshall be effective for a period of one year (\"Initial Year\") and shall automatically renew for\r\nsuccessive years (\"Additional Years\") at the fee then in effect for the option selected by the User,\r\nunless terminated as set forth herein. If assignment of the first USER ID and password by VOICES\r\nto User occurs on the 15th of the month or earlier, the Initial Year shall commence upon the first\r\nday of such month and shall continue for twelve full calendar months thereafter. If assignment of\r\nthe first USER ID and password by VOICES to User occurs on or after the 16th of the month, the\r\nInitial Year shall commence on the first day of the month following such assignment and continue\r\nthereafter for twelve full calendar months. Commencement of an Additional Year shall occur upon\r\nthe expiration of the twelve-month period established for the Initial Year. Either party shall have\r\nthe right to terminate the Agreement prior to any Additional Year upon 30 days\' prior written\r\nnotice.</p>\r\n<p class=\"arial_12_000\">This Agreement will terminate automatically without any prior notice from VOICES if User violates\r\nSections 1 or 2 of this Agreement. This Agreement may be terminated by VOICES upon prior\r\nwritten notice if User fails to comply with any other provision of this Agreement and fails to\r\nremedy such failure within thirty (30) of the date of such written notice. Upon termination, User\r\nshall no longer be permitted access to any VOICES Internet product and each User USER ID shall\r\nbe deactivated. Termination for any of the foregoing shall not affect VOICES\'s entitlement to any\r\nsums due hereunder, and User shall not be entitled to any refund of any portion of the fees paid.</p>\r\n<p class=\"arial_12_000\"><strong>Section 5.</strong> VOICES WARRANTY AND INDEMNITY. VOICES REPRESENTS AND WARRANTS TO\r\nUSER THAT VOICES HAS THE RIGHT TO GRANT THE LICENSES GRANTED HEREUNDER AND THAT\r\nUSER\'S USE OF THE CONTENT IN ACCORDANCE WITH THE TERMS AND CONDITIONS OF THIS\r\nAGREEMENT DOES NOT AND SHALL NOT VIOLATE THE INTELLECTUAL PROPERTY RIGHTS OF ANY\r\nTHIRD PARTY.</p>\r\n<p class=\"arial_12_000\"><strong>Section 6.</strong> Indemnification by User. Except with respect to third party claims of intellectual\r\nproperty infringement for which VOICES has assumed responsibility under the foregoing Section\r\n5, User shall defend, indemnify, and hold harmless VOICES and its Providers from and against any\r\nand all other claims, actions, causes of action, liabilities, damages, costs and expenses, including\r\nreasonable attorneys\' fees arising out of or related to claims or actions brought or made by third\r\nparties against VOICES or any of its Providers as a result of User\'s use or application of the\r\nContent.</p>\r\n<p class=\"arial_12_000\"><strong>Section 7.</strong> Copyright. The VOICES Internet product line is the valuable, confidential, copyrighted\r\nand trade secret property of VOICES or its Providers who have contributed thereto. As between\r\nVOICES and the User, VOICES owns all right, title and interest in and to any and all VOICES\r\nInternet products, including without limitation, all ancillary and interface software, all current and\r\nfuture enhancements, modifications, revisions, new releases and updates thereof and any\r\nderivative works based thereon and all documentation thereto, all copyrights, trade secrets and\r\npatents therein. Except as expressly permitted hereby, copying of any portion of any VOICES\r\nInternet product is prohibited.\r\nUser may make printouts of Content retrieved from any VOICES Internet product to the extent\r\npermitted under the \"fair use\" provisions of the Copyright Act of 1976 (17 U.S.C. Sec. 107), or\r\nmay download and store insubstantial portions of Content (in machine-readable form), so long as\r\nsuch downloading is consistent with the purposes authorized by this Agreement. User shall comply\r\nwith all applicable conventions regarding copyright and source of material attribution.</p>\r\n<p class=\"arial_12_000\"><strong>Section 8.</strong> USER RESPONSIBILITY. THE USER ASSUMES ALL RESPONSIBILITIES AND\r\nOBLIGATIONS WITH RESPECT TO THE SELECTION OF THE PARTICULAR VOICES INTERNET\r\nPRODUCT TO ACHIEVE USER\'S INTENDED RESULTS. USER ASSUMES ALL RESPONSIBILITIES AND\r\nOBLIGATIONS WITH RESPECT TO ANY DECISIONS OR ADVICE MADE OR GIVEN AS A RESULT OF\r\nTHE USE OR APPLICATION OF USER\'S SELECTED VOICES INTERNET PRODUCT OR ANY CONTENT\r\nRETRIEVED THEREFROM, INCLUDING THOSE TO ANY THIRD PARTY, FOR THE CONTENT,\r\nACCURACY, AND REVIEW OF SUCH RESULTS.\r\nVOICES AND ITS PROVIDERS ARE NOT ENGAGED IN RENDERING LEGAL OR OTHER\r\nPROFESSIONAL SERVICES. IF LEGAL OR OTHER EXPERT ASSISTANCE IS REQUIRED, THE\r\nSERVICES OF A COMPETENT PROFESSIONAL SHOULD BE SOUGHT.</p>\r\n<p class=\"arial_12_000\"><strong>Section 9.</strong> DISCLAIMER OF WARRANTY. CONTENT SELECTED BY USER IS PROVIDED \"AS IS\" AND\r\nVOICES AND ITS PROVIDERS MAKE NO WARRANTY AS TO ITS USE, ACCURACY, AVAILABILITY,\r\nTIMELINESS, OR COMPLETENESS. VOICES AND ITS PROVIDERS DO NOT AND CANNOT WARRANT\r\nUSER\'S RESULTS OR THAT ANY SELECTED VOICES INTERNET PRODUCT WILL BE DELIVERED\r\nUNINTERRUPTED OR ERROR FREE. EXCEPT AS PROVIDED UNDER SECTION 5, ABOVE, VOICES\r\nAND ITS PROVIDERS MAKE NO OTHER WARRANTIES, EXPRESS OR IMPLIED, INCLUDING THE\r\nWARRANTY AS TO PERFORMANCE, MERCHANTABILITY OR FITNESS FOR ANY PARTICULAR\r\nPURPOSE.\r\n<p class=\"arial_12_000\"><strong>Section 10.</strong> Limitation of VOICES\' Liability. In no event will VOICES or its Providers be liable to\r\nUser whether in contract, tort or otherwise, for any loss, liability, cost, damage or other injury of\r\nany kind whatsoever, including any consequential, incidental or special damages, including any\r\nlost profits or lost savings, even if VOICES or its Providers have been advised of the possibility of\r\nsuch damages. In addition, VOICES and its Providers shall not be liable for any claim by any third\r\nparty except when such claim is based upon infringement of its intellectual property rights. In\r\naddition, the limitation of liability shall not apply to limit the expenses or costs that may be\r\ndirectly incurred by User and reimbursable by VOICES in accordance with the obligations of\r\nVOICES under Section 5 above. IN ALL OTHER RESPECTS, VOICES\' AND ITS PROVIDERS\' ENTIRE\r\nLIABILITY AND USER\'S SOLE AND EXCLUSIVE REMEDY FOR ANY AND ALL OTHER CAUSES, AND\r\nREGARDLESS OF THE FORM OF ACTION, INCLUDING NEGLIGENCE, SHALL NOT EXCEED THE FEES\r\nPAID FOR THE SERVICE OR ACTIVITY THAT IS PRINCIPALLY ALLEGED TO GIVE RISE TO SUCH\r\nLIABILITY.\r\n<p class=\"arial_12_000\"><strong>Section 11.</strong> Force Majeure. Performance of VOICES hereunder is subject to interruption and delay\r\ndue to causes beyond its reasonable control such as acts of God, acts of any government, war or\r\nother hostilities, the elements, fire, explosion, power failure, telecommunications failure, industrial\r\nor labor dispute, inability to obtain supplies and the like, or breakdown of equipment or any other\r\ncauses beyond VOICES\'s control.\r\n<p class=\"arial_12_000\"><strong>Section 12.</strong> General. This Agreement will be governed by the laws of the State of New York,\r\nexcluding the application of its conflicts of law rules. The United Nations Convention on Contracts\r\nwill not govern this Agreement, the application of which is expressly excluded. No action arising\r\nunder this Agreement may be brought by either party more than one year after the cause of\r\naction has accrued. The exclusive jurisdiction for any action arising under this Agreement shall be\r\nthe Federal and State Courts located in Albany County, State of New York.</p>\r\n<p class=\"arial_12_000\">Any notice required under this Agreement shall be effective upon mailing by certified mail, return\r\nreceipt requested, or via facsimile transmission sent to the address or facsimile telephone number\r\nof the respective party.</p>\r\n<p class=\"arial_12_000\">If any part of this Agreement is found void and unenforceable, it will not affect the validity of the\r\nbalance of the Agreement, which shall remain valid and enforceable according to its terms. This\r\nAgreement may only be modified in writing signed by an authorized representative of VOICES.\r\nThe provisions of this Agreement shall operate for the benefit of, and may be enforced by, any\r\nProvider.</p>\r\n	  </td>\r\n	</tr>\r\n  </table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\"></td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>\r\n</td>\r\n</tr>\r\n</table>','2011-06-24','user_license_agreeme');

/*Table structure for table `tbl_payment_success` */

DROP TABLE IF EXISTS `tbl_payment_success`;

CREATE TABLE `tbl_payment_success` (
  `id` int(11) NOT NULL auto_increment,
  `member_id` int(11) default NULL,
  `type_id` int(11) default NULL,
  `amount` float(10,2) default NULL,
  `date` date default NULL,
  `item_name` varchar(100) default NULL,
  `transaction_id` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_payment_success` */

insert into `tbl_payment_success` values 
(3,173,1,100.00,'2011-12-25','membersubscription',NULL),
(4,171,1,100.00,'2011-12-27','membersubscription',NULL),
(5,178,175,100.00,'2012-01-03','membersubscription',NULL),
(15,191,52,99.00,'0000-00-00','One Time Petition Sign Fee','63B23497DG772973D'),
(14,191,52,99.00,'0000-00-00','One Time Petition Sign Fee','63B23497DG772973D'),
(13,191,52,99.00,'0000-00-00','One Time Petition Sign Fee','63B23497DG772973D'),
(12,191,52,99.00,'0000-00-00','One Time Petition Sign Fee','63B23497DG772973D'),
(11,191,52,99.00,'0000-00-00','One Time Petition Sign Fee','63B23497DG772973D'),
(21,191,193,3.25,'0000-00-00','membersubscription','7YV14960FH801873N'),
(20,194,52,99.00,'0000-00-00','One Time Petition Sign Fee','8T472726TW426483U'),
(19,178,193,3.25,'0000-00-00','membersubscription','77W11940WC9534134'),
(22,194,193,325.00,'2012-12-01','membersubscription','I-4NJEX1FFX8PF'),
(23,188,193,3.25,'2012-01-23','membersubscription','I-YLD8KPLUDUTT'),
(24,197,53,99.00,'0000-00-00','One Time Petition Sign Fee','0DN892724S393092P'),
(25,197,0,4.95,'2012-01-23','membersubscription','I-H5D0JY9Y6SGH'),
(26,198,0,4.95,'2012-01-23','membersubscription','I-Y3FSB24R5VPU'),
(27,199,200,3.25,'2012-01-23','membersubscription','I-63YEM1LUVNVE'),
(28,201,200,3.25,'2012-01-23','membersubscription','I-YCWE584F81ES'),
(29,206,53,99.00,'0000-00-00','One Time Petition Sign Fee','1A19169865618603X'),
(30,208,57,99.00,'0000-00-00','One Time Petition Sign Fee','2FM659149Y365642M'),
(31,208,207,3.25,'2012-01-23','membersubscription','I-G266CAGF3B3W'),
(32,206,195,3.25,'2012-01-23','membersubscription','I-0VDXRPSC8ANS'),
(33,211,56,10.00,'0000-00-00','One Time Petition Sign Fee','5VR81639M4173634T'),
(34,213,53,10.00,'0000-00-00','One Time Petition Sign Fee','1T938917Y3595500L'),
(35,211,200,3.25,'2012-01-23','membersubscription','I-09MCY2NDS60W'),
(36,185,209,3.25,'2012-01-24','membersubscription','I-NH3ACP36GDVJ'),
(37,215,0,5.00,'2012-01-27','membersubscription','I-162WMC81V8XY'),
(38,221,70,10.00,'0000-00-00','One Time Petition Sign Fee','8JD59906AL9649323');

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
(3,206,'S','2011000','US'),
(7,12,'S','2011000','US'),
(7,218,'S','2011000','US'),
(9,206,'S','2011000','US'),
(22,170,'HRES','2011000','US'),
(26,498,'S','2011000','US'),
(31,69,'H','2011000','US'),
(31,174,'HRES','2011000','US'),
(98,49,'HJR','2011000','US'),
(100,167,'HRES','2011000','US'),
(102,1076,'H','2011000','US'),
(104,84,'SRES','2011000','US'),
(111,55,'SRES','2011000','US'),
(112,290,'S','2011000','US'),
(113,534,'H','2011000','US'),
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

/*Table structure for table `tbl_settings` */

DROP TABLE IF EXISTS `tbl_settings`;

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL auto_increment,
  `field_name` varchar(100) default NULL,
  `field_value` varchar(100) default NULL,
  `field_details` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_settings` */

insert into `tbl_settings` values 
(1,'One Time Petition Sign Fee','10','one time fee on petition sign by visitor or observer '),
(2,'Subscriber Membership Fee','5.00','in dollars [ to be paid on subscriber membership annually]'),
(3,'Subscriber Membership Fee Promocode','3.25','in dollars [ to be paid annually on subscriber membership with promo code ]');

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbl_subscriber` */

insert into `tbl_subscriber` values 
(7,171,'70 Romeyn Ave','Amsterdam','NY','12010','USA',0,'70 Romeyn Ave','Amsterdam','NY','12010','USA',1,'175','no'),
(9,173,'70 Romeyn Ave','Amsterdam','NY','12010','USA',0,'70 Romeyn Ave','Amsterdam','NY','12010','USA',1,'175','no'),
(10,178,'','','','','USA',0,'','','','','USA',177,'179,193,175,1','no'),
(11,180,'70 Romeyn Ave','Amsterdam','NY','12010','USA',0,'70 Romeyn Ave','Amsterdam','NY','12010','USA',175,'1','no'),
(12,181,'70 Romeyn Ave','Amsterdam','NY','12010','USA',0,NULL,NULL,NULL,NULL,'USA',NULL,NULL,'no'),
(13,184,'332 jefferson road','rochester','ny','14609','USA',0,NULL,NULL,NULL,NULL,'USA',NULL,NULL,'no'),
(14,185,'332 jefferson road','rochester','NY','14609','USA',0,'332 jefferson road','rochester','NY','14609','USA',209,'177,195,200,179,193,175,207,1,196','no'),
(15,186,'332 jefferson road','rochester','NY','14609','USA',0,'332 jefferson road','rochester','NY','14609','USA',177,'209,195,200,179,193','no'),
(16,187,'332 jefferson road','rochester','NY','14609','USA',0,'332 jefferson road','rochester','NY','14609','USA',1,'','no'),
(17,188,'332 jefferson road','rochester','ny','14609','USA',0,'332 jefferson road','rochester','ny','14609','USA',177,'179,193','no'),
(18,189,'332 jefferson road','rochester','NY','14609','USA',0,'332 jefferson road','rochester','NY','14609','USA',1,'','no'),
(19,190,'332 jefferson road','rochester','ny','14609','USA',1,'332 jefferson road','rochester','ny','14609','USA',1,'','no'),
(20,191,'332 jefferson road','rochester','NY','14609','USA',0,'332 jefferson road','rochester','NY','14609','USA',1,'179,193,175','no'),
(21,194,'332 jefferson road','rochester','NY','14609','USA',0,'332 jefferson road','rochester','NY','14609','USA',177,'179,193,175','no'),
(22,197,'70 Romeyn Ave','Amsterdam','NY','12010','USA',1,'70 Romeyn Ave','Amsterdam','NY','12010','USA',195,'177,179,193,1','no'),
(23,198,'1 Main St','Albany','NY','12204','USA',0,'1 Main St','Albany','NY','12204','USA',195,'','no'),
(24,199,'1 Main St','Albany','NY','12204','USA',0,'1 Main St','Albany','NY','12204','USA',195,'','no'),
(25,201,'70 Romeyn Ave','Amsterdam','NY','12010','USA',0,'1 Main St','Albany','NY','12204','USA',195,'','no'),
(26,202,'70 Romeyn Ave ','Amsterdam','NY','12010','USA',0,'70 Romeyn Ave ','Amsterdam','NY','12010','USA',0,'0','no'),
(27,203,'332 jefferson road','Rochester','NY','14609','USA',0,'332 jefferson road','Rochester','NY','14609','USA',0,'0','no'),
(28,204,'1 Main St','Albany','NY','12204','USA',0,'1 Main St','Albany','NY','12204','USA',0,'0','no'),
(29,205,'1 Main St','Albany','NY','12204','USA',0,'1 Main St','Albany','NY','12204','USA',0,'0','no'),
(30,206,'1 Main St','Albany','NY','12204','USA',0,'1 Main St','Albany','NY','12204','USA',200,'','no'),
(31,208,'332 jefferson road','Rochester','NY','14609','USA',0,'332 jefferson road','Rochester','NY','14609','USA',177,'195,200,179','no'),
(32,210,'332, Jefferson Road','Rochester','NY','14623','USA',0,'332, Jefferson Road','Rochester','NY','14623','USA',0,'','no'),
(33,211,'332 Jefferson Road','Rochester','NY','14623','USA',0,'332 Jefferson Road','Rochester','NY','14623','USA',209,'195,175','no'),
(34,212,'332, Jefferson Road','Rochester','NY','14623','USA',0,'332, Jefferson Road','Rochester','NY','14623','USA',0,'','no'),
(35,213,'332 Jefferson Road','Rochester','NY','14623','USA',0,'332 Jefferson Road','Rochester','NY','14623','USA',195,'','no'),
(36,214,'332 jefferson road','Rochecter','NY','14623','USA',0,'332 jefferson road','Rochecter','NY','14623','USA',0,'0','no'),
(37,215,'332 jefferson road','Rochecter','NY','14623','USA',0,'332 jefferson road','Rochecter','NY','14623','USA',209,'','no'),
(38,216,'332 jefferson road','Rochester','NY','14623','USA',0,'332 jefferson road','Rochester','NY','14623','USA',0,'','yes'),
(39,217,'332 jefferson road','Rochester','NY','','USA',0,'332 jefferson road','Rochester','NY','','USA',0,'','yes'),
(40,218,'332 jefferson road','Redmonda','NY','14623','USA',0,'332 jefferson road','Redmonda','NY','14623','USA',0,'','yes'),
(41,219,'332 jefferson road','Redmonda','NY','14623','USA',0,'332 jefferson road','Redmonda','NY','14623','USA',0,'','yes'),
(42,220,'332 Jefferson road','Rochester','NY','14623','USA',0,'332 Jefferson road','Rochester','NY','14623','USA',0,'','yes'),
(43,221,'332 jefferson road','rochester','ny','14623','USA',0,'332 jefferson road','rochester','ny','14623','USA',1,'','yes');

/*Table structure for table `tbl_subscriber_comment_aff_article` */

DROP TABLE IF EXISTS `tbl_subscriber_comment_aff_article`;

CREATE TABLE `tbl_subscriber_comment_aff_article` (
  `id` int(11) NOT NULL auto_increment,
  `article_id` int(11) default NULL,
  `subscriber_id` int(11) default NULL,
  `subscriber_comment` text,
  `comment_date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_subscriber_comment_aff_article` */

insert into `tbl_subscriber_comment_aff_article` values 
(22,4,180,'sub 2','2012-01-27 14:27:45'),
(13,26,173,'f \r\ngd\r\nfgggdhg hhjfgdhjgdhjgh gdgjhdgkjdhgfkjhkjkjhhkj','2011-12-29 13:15:28'),
(14,7,180,'added comment','2012-01-06 16:26:14'),
(23,66,180,'this is for testing\r\n','2012-01-27 17:09:56'),
(17,24,180,'my news comment','2012-01-27 11:17:09');

/*Table structure for table `tbl_subscriber_comment_er_article` */

DROP TABLE IF EXISTS `tbl_subscriber_comment_er_article`;

CREATE TABLE `tbl_subscriber_comment_er_article` (
  `id` int(11) NOT NULL auto_increment,
  `article_id` int(11) default NULL,
  `subscriber_id` int(11) default NULL,
  `subscriber_comment` text,
  `status` enum('support','oppose','no_opinion') default 'support',
  `comment_date` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_subscriber_comment_er_article` */

insert into `tbl_subscriber_comment_er_article` values 
(1,2,173,'sdfsd fdsa fsdf dsaf sdaf dsaf sda','support',NULL),
(2,2,173,'asdas das dasdasdasd as','support',NULL),
(3,2,173,'d asdsa as&#039;sad as&#039;dsad&#039;sa d&#039;sa&quot;ASDFsaf&quot;SADfsaF&quot;Dsa','support',NULL),
(14,17,180,NULL,'support','2012-01-26'),
(15,17,180,NULL,'support','2012-01-26'),
(21,23,180,'ani comments','support',NULL),
(17,17,171,NULL,'support','2012-01-26'),
(20,21,180,NULL,'support','2012-01-27'),
(19,14,180,'addede','support',NULL),
(22,23,180,'again by me','support',NULL),
(23,24,180,NULL,'support','2012-01-27');

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
(173,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(180,'5e9bdd9b-4d8f-4bab-ac88-08812f7cdf8a'),
(180,'f7bf118e-d1e8-4c3c-873c-1de6fb111966'),
(180,'41d47c9b-0e95-446a-9017-99c7588eb83d'),
(180,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(180,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(180,'3b31b633-7516-4b46-b014-88d6b4772373'),
(180,'4f422448-e118-4604-a4ea-1643d277b669'),
(180,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(180,'4f166531-713c-4f93-97c9-14233be0a695'),
(180,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(185,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(185,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(185,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(185,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(185,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(185,'4f422448-e118-4604-a4ea-1643d277b669'),
(185,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(185,'4f166531-713c-4f93-97c9-14233be0a695'),
(185,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(186,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(186,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(186,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(186,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(186,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(186,'4f422448-e118-4604-a4ea-1643d277b669'),
(186,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(186,'4f166531-713c-4f93-97c9-14233be0a695'),
(186,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(187,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(187,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(187,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(187,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(187,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(187,'4f422448-e118-4604-a4ea-1643d277b669'),
(187,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(187,'4f166531-713c-4f93-97c9-14233be0a695'),
(187,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(188,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(188,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(188,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(188,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(188,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(188,'4f422448-e118-4604-a4ea-1643d277b669'),
(188,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(188,'4f166531-713c-4f93-97c9-14233be0a695'),
(188,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(189,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(189,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(189,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(189,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(189,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(189,'4f422448-e118-4604-a4ea-1643d277b669'),
(189,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(189,'4f166531-713c-4f93-97c9-14233be0a695'),
(189,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(190,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(190,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(190,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(190,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(190,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(190,'4f422448-e118-4604-a4ea-1643d277b669'),
(190,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(190,'4f166531-713c-4f93-97c9-14233be0a695'),
(190,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(191,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(191,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(191,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(191,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(191,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(191,'4f422448-e118-4604-a4ea-1643d277b669'),
(191,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(191,'4f166531-713c-4f93-97c9-14233be0a695'),
(191,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(194,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(194,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(194,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(194,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(194,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(194,'4f422448-e118-4604-a4ea-1643d277b669'),
(194,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(194,'4f166531-713c-4f93-97c9-14233be0a695'),
(194,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(197,'5e9bdd9b-4d8f-4bab-ac88-08812f7cdf8a'),
(197,'f7bf118e-d1e8-4c3c-873c-1de6fb111966'),
(197,'41d47c9b-0e95-446a-9017-99c7588eb83d'),
(197,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(197,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(197,'3b31b633-7516-4b46-b014-88d6b4772373'),
(197,'4f422448-e118-4604-a4ea-1643d277b669'),
(197,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(197,'4f166531-713c-4f93-97c9-14233be0a695'),
(197,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(198,'14405d40-a502-4406-a03e-8e67ef4a9548'),
(198,'5f66835e-352a-47b4-be4a-67bc861f8d0f'),
(198,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(198,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(198,'3b31b633-7516-4b46-b014-88d6b4772373'),
(198,'4f422448-e118-4604-a4ea-1643d277b669'),
(198,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(198,'4f166531-713c-4f93-97c9-14233be0a695'),
(198,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(199,'14405d40-a502-4406-a03e-8e67ef4a9548'),
(199,'5f66835e-352a-47b4-be4a-67bc861f8d0f'),
(199,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(199,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(199,'3b31b633-7516-4b46-b014-88d6b4772373'),
(199,'4f422448-e118-4604-a4ea-1643d277b669'),
(199,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(199,'4f166531-713c-4f93-97c9-14233be0a695'),
(199,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(201,'5e9bdd9b-4d8f-4bab-ac88-08812f7cdf8a'),
(201,'f7bf118e-d1e8-4c3c-873c-1de6fb111966'),
(201,'41d47c9b-0e95-446a-9017-99c7588eb83d'),
(201,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(201,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(201,'3b31b633-7516-4b46-b014-88d6b4772373'),
(201,'4f422448-e118-4604-a4ea-1643d277b669'),
(201,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(201,'4f166531-713c-4f93-97c9-14233be0a695'),
(201,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(202,'5e9bdd9b-4d8f-4bab-ac88-08812f7cdf8a'),
(202,'f7bf118e-d1e8-4c3c-873c-1de6fb111966'),
(202,'41d47c9b-0e95-446a-9017-99c7588eb83d'),
(202,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(202,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(202,'3b31b633-7516-4b46-b014-88d6b4772373'),
(202,'4f422448-e118-4604-a4ea-1643d277b669'),
(202,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(202,'4f166531-713c-4f93-97c9-14233be0a695'),
(202,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(203,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(203,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(203,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(203,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(203,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(203,'4f422448-e118-4604-a4ea-1643d277b669'),
(203,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(203,'4f166531-713c-4f93-97c9-14233be0a695'),
(203,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(204,'14405d40-a502-4406-a03e-8e67ef4a9548'),
(204,'5f66835e-352a-47b4-be4a-67bc861f8d0f'),
(204,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(204,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(204,'3b31b633-7516-4b46-b014-88d6b4772373'),
(204,'4f422448-e118-4604-a4ea-1643d277b669'),
(204,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(204,'4f166531-713c-4f93-97c9-14233be0a695'),
(204,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(205,'14405d40-a502-4406-a03e-8e67ef4a9548'),
(205,'5f66835e-352a-47b4-be4a-67bc861f8d0f'),
(205,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(205,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(205,'3b31b633-7516-4b46-b014-88d6b4772373'),
(205,'4f422448-e118-4604-a4ea-1643d277b669'),
(205,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(205,'4f166531-713c-4f93-97c9-14233be0a695'),
(205,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(206,'14405d40-a502-4406-a03e-8e67ef4a9548'),
(206,'5f66835e-352a-47b4-be4a-67bc861f8d0f'),
(206,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(206,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(206,'3b31b633-7516-4b46-b014-88d6b4772373'),
(206,'4f422448-e118-4604-a4ea-1643d277b669'),
(206,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(206,'4f166531-713c-4f93-97c9-14233be0a695'),
(206,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(208,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(208,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(208,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(208,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(208,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(208,'4f422448-e118-4604-a4ea-1643d277b669'),
(208,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(208,'4f166531-713c-4f93-97c9-14233be0a695'),
(208,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(210,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(210,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(210,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(210,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(210,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(210,'4f422448-e118-4604-a4ea-1643d277b669'),
(210,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(210,'4f166531-713c-4f93-97c9-14233be0a695'),
(210,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(211,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(211,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(211,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(211,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(211,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(211,'4f422448-e118-4604-a4ea-1643d277b669'),
(211,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(211,'4f166531-713c-4f93-97c9-14233be0a695'),
(211,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(212,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(212,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(212,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(212,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(212,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(212,'4f422448-e118-4604-a4ea-1643d277b669'),
(212,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(212,'4f166531-713c-4f93-97c9-14233be0a695'),
(212,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(213,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(213,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(213,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(213,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(213,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(213,'4f422448-e118-4604-a4ea-1643d277b669'),
(213,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(213,'4f166531-713c-4f93-97c9-14233be0a695'),
(213,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(214,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(214,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(214,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(214,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(214,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(214,'4f422448-e118-4604-a4ea-1643d277b669'),
(214,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(214,'4f166531-713c-4f93-97c9-14233be0a695'),
(214,'f36fe606-c94c-422c-82ed-6ac38f8c2be7'),
(215,'0b01cb11-43b9-4060-8c4d-de081982b01a'),
(215,'71a8c1d7-ce1f-4a4f-a6c7-d6b5573e0dff'),
(215,'214db873-ec51-4c9b-861d-92cf58e88abb'),
(215,'d20dc974-5161-4b3a-8f44-4306a4c53367'),
(215,'6a963ab3-891e-426d-be33-1e8d74ea4be8'),
(215,'4f422448-e118-4604-a4ea-1643d277b669'),
(215,'d8847885-dfcc-4e4d-81af-e402c95dacb0'),
(215,'4f166531-713c-4f93-97c9-14233be0a695'),
(215,'f36fe606-c94c-422c-82ed-6ac38f8c2be7');

/*Table structure for table `tbl_temp_payment_check` */

DROP TABLE IF EXISTS `tbl_temp_payment_check`;

CREATE TABLE `tbl_temp_payment_check` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `hashkey` varchar(255) default NULL,
  `user_type` varchar(255) default NULL,
  `status` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_temp_payment_check` */

insert into `tbl_temp_payment_check` values 
(5,178,'MTUxMTc4','observer',0),
(4,178,'MTM0MTc4','observer',1),
(6,178,'MTUyMTc4','observer',0),
(8,191,'MTUyMTkx','observer',1),
(9,191,'MTUxMTkx','observer',1),
(10,194,'MTUyMTk0','observer',1),
(11,197,'MTk1NTMxOTc=','observer',1),
(12,197,'MTUxMTk3','observer',1),
(13,204,'MTk1NTMyMDQ=','observer',0),
(14,206,'MTk1NTMyMDY=','observer',1),
(15,186,'MjA3NTcxODY=','observer',1),
(16,208,'MjA3NTcyMDg=','observer',1),
(17,205,'MTk1NTMyMDU=','observer',0),
(18,186,'MjA5NTgxODY=','observer',1),
(19,211,'MTk1NTYyMTE=','observer',1),
(20,211,'MTk1NTMyMTE=','observer',1),
(21,213,'MTk1NTMyMTM=','observer',1),
(22,202,'MTY5MjAy','observer',0),
(23,221,'MTcwMjIx','observer',1);

/*Table structure for table `tbl_usergroups` */

DROP TABLE IF EXISTS `tbl_usergroups`;

CREATE TABLE `tbl_usergroups` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `promo_code` varchar(50) default NULL,
  `subscription_price` float(10,2) default NULL,
  `assigned_affiliates` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_usergroups` */

insert into `tbl_usergroups` values 
(1,'administrator','',0.00,NULL),
(2,'affiliate','',0.00,''),
(3,'subscriber','',100.00,''),
(4,'observer','',0.00,NULL),
(11,'elected_official','',1.23,'');

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_vote_status` */

insert into `tbl_vote_status` values 
(3,2,173,'support','2011-12-25'),
(4,3,173,'support','2011-12-27'),
(5,9,171,'support','2011-12-27'),
(6,9,180,'support','2011-12-28'),
(7,9,181,'support','2011-12-28'),
(8,39,180,'support','2012-01-09'),
(10,51,188,'support','2012-01-18'),
(11,51,188,'support','2012-01-18'),
(12,51,188,'support','2012-01-18'),
(13,51,189,'support','2012-01-18'),
(14,52,191,'support','2012-01-21'),
(15,53,197,'support','2012-01-23'),
(16,51,197,'support','2012-01-23'),
(17,54,197,'support','2012-01-23'),
(18,53,206,'support','2012-01-23'),
(19,57,186,'support','2012-01-23'),
(20,57,208,'support','2012-01-23'),
(21,48,180,'support','2012-01-23'),
(22,58,186,'support','2012-01-23'),
(23,56,211,'support','2012-01-23'),
(24,53,213,'support','2012-01-23'),
(25,53,211,'support','2012-01-23');
