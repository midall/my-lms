<?php

// Config info && API functions
require '../config.php';
//require 'api_functions.php';

// Read GET and POST variables
$sco_key = trim( $_REQUEST['sco_key'] );
$sco_value = trim( $_REQUEST['sco_value'] );
$course_number = trim( $_REQUEST['course_number'] );

// Check if anything is blank
if( strlen( $sco_key ) != 0 && strlen( $sco_value ) != 0 && strlen( $course_number ) != 0 )
{
	// Clear old data and save data to the 'scorm_data' table
	$api->write_element( $course_number, DEFAULT_CORE_STUDENT_ID, $sco_key, $sco_value );
}

// return value to the calling program
print 'true';

?>