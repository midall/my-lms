<?php

// database login information
require '../config.php';
require 'dbfunctions.php';

$course_number = $_REQUEST ['course_number'];
$course_number = mysqli_escape_string( $dblink, $course_number );

// if not set, cmi.core.total_time should be set to '0000:00:00'
$result = get_scorm_data( $course_number, $user_id, VAR_TOTAL_TIME );
list ( $totalTime ) = mysqli_fetch_row( $result );

if( ! $totalTime )
{
    delete_scorm_data( $course_number, $user_id, VAR_TOTAL_TIME );
	
    insert_default_scorm_data( $course_number, $user_id, VAR_TOTAL_TIME, DEFAULT_TOTAL_TIME );
}

// clear any pre-existing cmi.core.session_time and set to '0000:00:00'
delete_scorm_data( $course_number, $user_id, VAR_SESSION_TIME );

insert_default_scorm_data( $course_number, $user_id, VAR_CREDIT, DEFAULT_SESSION_TIME );

// if not set, cmi.core.credit  should be set to 'credit'
$result = get_scorm_data( $course_number, $user_id, VAR_CREDIT );
list ( $credit ) = mysqli_fetch_row( $result );

if( ! $credit )
{
    delete_scorm_data( $course_number, $user_id, VAR_CREDIT );
	
    insert_default_scorm_data( $course_number, $user_id, VAR_CREDIT, DEFAULT_CREDIT );
}

// if not set, cmi.core.lesson_status   should be set to 'not attempted'
$result = get_scorm_data( $course_number, $user_id, VAR_LESSON_STATUS );
list ( $lesson_status ) = mysqli_fetch_row( $result );

if( ! $lesson_status  )
{
    delete_scorm_data( $course_number, $user_id, VAR_LESSON_STATUS );
	
    insert_default_scorm_data( $course_number, $user_id, VAR_LESSON_STATUS, DEFAULT_LESSON_STATUS );
}

// if not set, cmi.core.entry   should be set to 'ab initio'
$result = get_scorm_data( $course_number, $user_id, VAR_ENTRY );
list ( $entry ) = mysqli_fetch_row( $result );

if( ! $entry  )
{
	delete_scorm_data( $course_number, $user_id, VAR_ENTRY );
    
	insert_default_scorm_data( $course_number, $user_id, VAR_ENTRY, DEFAULT_ENTRY );
}

// return value to the calling program
print 'true';

?>