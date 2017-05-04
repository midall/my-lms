<?php

// Config info && API functions
require '../config.php';
//require 'api_functions.php';

$course_number = trim( $_REQUEST['course_number'] );
$sco_key = trim( $_REQUEST['sco_key'] );

// determine value to be returned
switch( $sco_key )
{
	// no variable name supplied
	case '' :
		$sco_value = '';
		break;
	
	// all other variable names
	default :
		$sco_value = $api->read_element( $course_number, DEFAULT_CORE_STUDENT_ID, $sco_key );
}

// return value to the calling program
echo $sco_value;

?>