# MyLMS project

## Description
This repository is my first attempt to create, step-by-step, a basic LMS framework. My primary guidance is from [Vsscorm.net](http://www.vsscorm.net/)

Read full documentation and steps in [Vsscorm.net](http://www.vsscorm.net/)

## Languages
The languages that used are:
- PHP
- MySQL
- JavaScript
- HTML - CSS


## Installation
- Copy the files to root folder of your server (e.g. htdocs, www )
- Run the database/stracture.sql commands in MySQL Server
```sql
CREATE TABLE `scorm_data` (
  `sco_id` int(11) NOT NULL AUTO_INCREMENT,
  `sco_number` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `sco_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sco_value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`sco_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```
- Change database credentials in config.php

## Test Environment ( NOT prerequisites )
- Apache 2.4.23
- PHP 5.6.25
- MySQL 5.7.14

## Full documentation
- Proper documented [my-lms/documentation](https://github.com/midall/my-lms/tree/master/documentation)
- Documentation template from: [Documentation HTML Template](https://github.com/surjithctly/documentation-html-template)

## About me
- :link: Website: [ntallas.eu](https://ntallas.eu)
- :link: GitHub: [midall](https://github.com/midall)