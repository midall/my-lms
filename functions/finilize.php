<?php

// database login information && functions
require '../config.php';
require 'dbfunctions.php';

$course_number = escape_characters( $_REQUEST [ 'course_number' ] );

// process the changes to cmi.core.total_time

// read cmi.core.total_time from the 'scorm_data' table
$result = get_scorm_data( $course_number, $user_id, VAR_TOTAL_TIME );
list ( $total_time ) = mysqli_fetch_row( $result );

// convert total time to seconds
$time = explode( ':', $total_time );
$totalSeconds = $time [0] * 60 * 60 + $time [1] * 60 + $time [2];

// read the last set cmi.core.session_time from the 'scorm_data' table
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

// return value to the calling program
print "true";

?>