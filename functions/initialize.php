<?php

// Config info && API functions
require '../config.php';
require 'api_functions.php';

$course_number = escape_characters( $_REQUEST['course_number'] );

// Elements that tell the SCO which other elements are supported by this API
initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_CHILDREN, DEFAULT_CORE_CHILDREN );
initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_SCORE_CHILDREN, DEFAULT_CORE_SCORE_CHILDREN );

// Student information
initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_STUDENT_NAME, DEFAULT_CORE_STUDENT_NAME );
initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_STUDENT_ID, DEFAULT_CORE_STUDENT_ID );

// Mastery score
initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, ADLCP_MASTERYSCORE, DEFAULT_ADLCP_MASTERYSCORE );

// Launch data
initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, LAUNCH_DATA, DEFAULT_LAUNCH_DATA );

// Progress
initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_CREDIT, DEFAULT_CORE_CREDIT );
initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_LESSON_STATUS, DEFAULT_CORE_LESSON_STATUS );
initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_ENTRY, DEFAULT_CORE_ENTRY );

// Total Time
initialize_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_TOTAL_TIME, DEFAULT_CORE_TOTAL_TIME );

// Session Time
clear_element( $course_number, DEFAULT_CORE_STUDENT_ID, CORE_SESSION_TIME );

// Return value to the calling program
print 'true';
?>