<?php

// General Details
define( 'SITE_NAME',	'My-LMS' );
define( 'VERSION',		'1.1' );
define( 'AUTHOR',		'Michael Nt' );

// Database credentials
define( 'DBNAME', 	'my-lms' );
define( 'DBHOST', 	'localhost' );
define( 'DBUSER', 	'root' );
define( 'DBPASS', 	'' );

// LMS variables names
define( 'VAR_TOTAL_TIME',		'cmi.core.total_time' );
define( 'VAR_SESSION_TIME',		'cmi.core.session_time' );
define( 'VAR_CREDIT',			'cmi.core.credit' );
define( 'VAR_LESSON_STATUS',	'cmi.core.lesson_status' );
define( 'VAR_ENTRY',			'cmi.core.entry' );
define( 'VAR_EXIT',				'cmi.core.exit' );
define( 'VAR_MASTERYSCORE',		'adlcp:masteryscore' );
define( 'VAR_SCORERAW',			'cmi.score.raw' );
define( 'VAR_LAUNCHDATA',		'cmi.launch_data' );

// LMS default values
define( 'DEFAULT_TOTAL_TIME',		'0000:00:00' );
define( 'DEFAULT_SESSION_TIME',		'0000:00:00' );
define( 'DEFAULT_CREDIT',			'credit' );
define( 'DEFAULT_LESSON_STATUS',	'not attempted' );
define( 'DEFAULT_ENTRY',			'ab initio' );
define( 'DEFAULT_EXIT',				'' );
define( 'DEFAULT_MASTERYSCORE',		'90' );
define( 'DEFAULT_LAUNCHDATA',		'' );

?>