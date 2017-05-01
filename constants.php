<?php

// General Details
define( 'SITE_NAME',	'My-LMS' );
define( 'VERSION',		'2.0beta' );
define( 'AUTHOR',		'Michael Nt' );

// Database credentials
define( 'DBNAME', 	'my-lms' );
define( 'DBHOST', 	'localhost' );
define( 'DBUSER', 	'root' );
define( 'DBPASS', 	'' );

// LMS variables names
define( 'CORE_CHILDREN',		'cmi.core._children' );
define( 'CORE_TOTAL_TIME',		'cmi.core.total_time' );
define( 'CORE_SESSION_TIME',	'cmi.core.session_time' );
define( 'CORE_CREDIT',			'cmi.core.credit' );
define( 'CORE_LESSON_STATUS',	'cmi.core.lesson_status' );
define( 'CORE_ENTRY',			'cmi.core.entry' );
define( 'CORE_EXIT',			'cmi.core.exit' );
define( 'CORE_STUDENT_ID',		'cmi.core.student_id' );
define( 'CORE_STUDENT_NAME',	'cmi.core.student_name' );
define( 'CORE_SCORE_CHILDREN',	'cmi.core.score._children' );
define( 'SCORE_RAW',			'cmi.score.raw' );
define( 'LAUNCH_DATA',			'cmi.launch_data' );
define( 'ADLCP_MASTERYSCORE',	'adlcp:masteryscore' );

// LMS default values
define( 'DEFAULT_CORE_CHILDREN',		'student_id,student_name,lesson_location,credit,lesson_status,entry,score,total_time,exit,session_time' );
define( 'DEFAULT_CORE_TOTAL_TIME',		'0000:00:00' );
define( 'DEFAULT_CORE_SESSION_TIME',	'0000:00:00' );
define( 'DEFAULT_CORE_CREDIT',			'credit' );
define( 'DEFAULT_CORE_LESSON_STATUS',	'not attempted' );
define( 'DEFAULT_CORE_ENTRY',			'ab initio' );
define( 'DEFAULT_CORE_EXIT',			'' );
// @TODO MUST REPLACE THESE DUMMY USER/STUDENT DATA WITH PROPER DB DATA
define( 'DEFAULT_CORE_STUDENT_ID',		125 );
define( 'DEFAULT_CORE_STUDENT_NAME',	'John Wick' );
define( 'DEFAULT_LAUNCH_DATA',			'' );
// @TODO MUST REPLACE THIS VALUE WITH THE PROPER VALUE FROM LMS "imsmanifest.xml" FILE
define( 'DEFAULT_ADLCP_MASTERYSCORE',	90 );
?>