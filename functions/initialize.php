<?php

// Set up constants, database and api objects
require '../config.php';

// Elements that tell the SCO which other elements are supported by this API
$api->initialize_element( CORE_CHILDREN, DEFAULT_CORE_CHILDREN );
$api->initialize_element( CORE_SCORE_CHILDREN, DEFAULT_CORE_SCORE_CHILDREN );

// Student information
$api->initialize_element( CORE_STUDENT_NAME, DEFAULT_CORE_STUDENT_NAME );
$api->initialize_element( CORE_STUDENT_ID, DEFAULT_CORE_STUDENT_ID );

// Mastery score
$api->initialize_element( ADLCP_MASTERYSCORE, DEFAULT_ADLCP_MASTERYSCORE );

// Launch data
$api->initialize_element( LAUNCH_DATA, DEFAULT_LAUNCH_DATA );

// Progress
$api->initialize_element( CORE_CREDIT, DEFAULT_CORE_CREDIT );
$api->initialize_element( CORE_LESSON_STATUS, DEFAULT_CORE_LESSON_STATUS );
$api->initialize_element( CORE_ENTRY, DEFAULT_CORE_ENTRY );

// Total Time
$api->initialize_element( CORE_TOTAL_TIME, DEFAULT_CORE_TOTAL_TIME );

// Session Time
$api->clear_element( CORE_SESSION_TIME );

// Return value to the calling program
echo 'true';

?>