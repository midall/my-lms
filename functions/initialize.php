<?php

// Config info && API functions
require '../config.php';
//require 'api_functions.php';

$course_number = trim( $_REQUEST['course_number'] );

// Check if anything is blank
if( strlen( $course_number ) != 0 )
{
	// Elements that tell the SCO which other elements are supported by this API
	$api->initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_CHILDREN, DEFAULT_CORE_CHILDREN );
	$api->initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_SCORE_CHILDREN, DEFAULT_CORE_SCORE_CHILDREN );

	// Student information
	$api->initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_STUDENT_NAME, DEFAULT_CORE_STUDENT_NAME );
	$api->initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_STUDENT_ID, DEFAULT_CORE_STUDENT_ID );

	// Mastery score
	$api->initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, ADLCP_MASTERYSCORE, DEFAULT_ADLCP_MASTERYSCORE );

	// Launch data
	$api->initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, LAUNCH_DATA, DEFAULT_LAUNCH_DATA );

	// Progress
	$api->initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_CREDIT, DEFAULT_CORE_CREDIT );
	$api->initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_LESSON_STATUS, DEFAULT_CORE_LESSON_STATUS );
	$api->initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_ENTRY, DEFAULT_CORE_ENTRY );

	// Total Time
	$api->initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_TOTAL_TIME, DEFAULT_CORE_TOTAL_TIME );

	// Session Time
	$api->clear_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_SESSION_TIME );

	// Return value to the calling program
	echo 'true';
}
else
{
	// Return value to the calling program
	echo 'false';
}
?>