<?php

// database login information && functions
require '../config.php';
require 'dbfunctions.php';

$course_number = escape_characters( $_REQUEST [ 'course_number' ] );

// process the changes to VAR_TOTAL_TIME

// read VAR_TOTAL_TIME from the 'scorm_data' table
$result = get_scorm_data( $course_number, $user_id, VAR_TOTAL_TIME );
list ( $total_time ) = mysqli_fetch_row( $result );

// convert total time to seconds
$time = explode( ':', $total_time );
$totalSeconds = $time [0] * 60 * 60 + $time [1] * 60 + $time [2];

// read the last set VAR_SESSION_TIME from the 'scorm_data' table
$result = get_scorm_data( $course_number, $user_id, VAR_SESSION_TIME );
list ( $session_time ) = mysqli_fetch_row( $result );

// convert session time to seconds
$time = explode( ':', $session_time );
$sessionSeconds = $time [0] * 60 * 60 + $time [1] * 60 + $time [2];

// new total time is ...
$totalSeconds += $sessionSeconds;

// break total time into hours, minutes and seconds
$totalHours = intval( $totalSeconds / 3600 );
$totalSeconds -= $totalHours * 3600;
$totalMinutes = intval( $totalSeconds / 60 );
$totalSeconds -= $totalMinutes * 60;

// reformat to comply with the SCORM data model
$total_time = sprintf( "%04d:%02d:%02d", $totalHours, $totalMinutes, $totalSeconds );

// save new total time to the 'scorm_data' table
delete_scorm_data( $course_number, $user_id, VAR_TOTAL_TIME );

insert_default_scorm_data( $course_number, $user_id, VAR_TOTAL_TIME, $total_time );

// delete the last session time
delete_scorm_data( $course_number, $user_id, VAR_SESSION_TIME );

// clear any existing cmi.core.entry
delete_scorm_data( $course_number, $user_id, VAR_ENTRY );

// New VAR_ENTRY value depends on VAR_EXIT
$result = get_scorm_data( $course_number, $user_id, VAR_EXIT );
list ( $exit ) = mysqli_fetch_row( $result );

if( !$exit )
{
	if ($value == 'suspend')
	{
		insert_default_scorm_data( $course_number, $user_id, VAR_ENTRY, 'resume' );
	}
	else
	{
		insert_default_scorm_data( $course_number, $user_id, VAR_ENTRY, '' );
	}
}

// Set the VAR_LESSON_STATUS value
$result = get_scorm_data( $course_number, $user_id, VAR_LESSON_STATUS );
list ( $lesson_status ) = mysqli_fetch_row( $result );

if( !$lesson_status )
{
	// if it's 'not attempted', change it to 'completed'
	if( $value == 'not attempted' )
	{
		update_default_scorm_data( $course_number, $user_id, VAR_LESSON_STATUS, 'completed' );
	}
}

// Set the VAR_MASTERYSCORE value (here initialize in initialize.php, normally from imsmanifest.xml)
$result = get_scorm_data( $course_number, $user_id, VAR_MASTERYSCORE );
list ( $masteryscore ) = mysqli_fetch_row( $result );
$masteryscore *= 1;

if( $masteryscore )
{
	// yes - so read the score
	$result = get_scorm_data( $course_number, $user_id, VAR_SCORERAW );
	list ( $scoreraw ) = mysqli_fetch_row( $result );
	$scoreraw *= 1;
	
	if( $masteryscore )
	{
		// set cmi.core.lesson_status to passed/failed
		if( $scoreraw >= $masteryscore )
		{
			update_default_scorm_data( $course_number, $user_id, VAR_LESSON_STATUS, 'passed' );
		}
		else
		{
			update_default_scorm_data( $course_number, $user_id, VAR_LESSON_STATUS, 'failed' );
		}
	}
}

// return value to the calling program
print "true";

?>