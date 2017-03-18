
 /* CREATE DATABASE 'my-lms'; */

-- ------------------------------ --
-- Table structure for scorm_data --
-- ------------------------------ --
DROP TABLE IF EXISTS `scorm_data`;
CREATE TABLE `scorm_data` (
  `sco_id` int(11) NOT NULL AUTO_INCREMENT,
  `sco_number` int(11) DEFAULT NULL,
  `sco_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sco_value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`sco_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;