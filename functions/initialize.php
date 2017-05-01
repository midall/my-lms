<?php

// database login information && functions
require '../config.php';
require 'dbfunctions.php';

$course_number = escape_characters( $_REQUEST [ 'course_number' ] );

// if not set, VAR_TOTAL_TIME should be set to '0000:00:00'
$result = get_scorm_data( $course_number, $user_id, VAR_TOTAL_TIME );
list ( $total_time ) = mysqli_fetch_row( $result );

if( !$total_time )
{
	delete_scorm_data( $course_number, $user_id, VAR_TOTAL_TIME );
	insert_default_scorm_data( $course_number, $user_id, VAR_TOTAL_TIME, DEFAULT_TOTAL_TIME );
}

// clear any pre-existing VAR_SESSION_TIME and set to '0000:00:00'
delete_scorm_data( $course_number, $user_id, VAR_SESSION_TIME );
insert_default_scorm_data( $course_number, $user_id, VAR_SESSION_TIME, DEFAULT_SESSION_TIME );

// if not set, VAR_CREDIT should be set to 'credit'
$result = get_scorm_data( $course_number, $user_id, VAR_CREDIT );
list ( $credit ) = mysqli_fetch_row( $result );

if( !$credit )
{
	delete_scorm_data( $course_number, $user_id, VAR_CREDIT );
	insert_default_scorm_data( $course_number, $user_id, VAR_CREDIT, DEFAULT_CREDIT );
}

// if not set, VAR_LESSON_STATUS should be set to 'not attempted'
$result = get_scorm_data( $course_number, $user_id, VAR_LESSON_STATUS );
list ( $lesson_status ) = mysqli_fetch_row( $result );

if( !$lesson_status )
{
	delete_scorm_data( $course_number, $user_id, VAR_LESSON_STATUS );
	insert_default_scorm_data( $course_number, $user_id, VAR_LESSON_STATUS, DEFAULT_LESSON_STATUS );
}

// if not set, VAR_ENTRY should be set to 'ab initio'
$result = get_scorm_data( $course_number, $user_id, VAR_ENTRY );
list ( $entry ) = mysqli_fetch_row( $result );

if( !$entry )
{
	delete_scorm_data( $course_number, $user_id, VAR_ENTRY );
	insert_default_scorm_data( $course_number, $user_id, VAR_ENTRY, DEFAULT_ENTRY );
}

// if not set, set it to default (VAR_MASTERYSCORE value should be set from the LMS imsmanifest.xml file)
$result = get_scorm_data( $course_number, $user_id, VAR_MASTERYSCORE );
list ( $masteryscore ) = mysqli_fetch_row( $result );

if( ! $masteryscore )
{ 
	delete_scorm_data( $course_number, $user_id, VAR_MASTERYSCORE );
	insert_default_scorm_data( $course_number, $user_id, VAR_MASTERYSCORE, DEFAULT_MASTERYSCORE );	
}

// return value to the calling program
print 'true';
?>