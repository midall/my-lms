<?php

// database login information
require '../config.php';

$course_number = $_REQUEST ['course_number'];
$course_number = mysqli_escape_string( $dblink, $course_number );

// Variables names
$total_time_var = 'cmi.core.total_time';
$session_time_var = 'cmi.core.session_time';

// process the changes to cmi.core.total_time

// read cmi.core.total_time from the 'scorm_data' table
$stmt = $dblink->prepare( 'SELECT sco_value FROM scorm_data WHERE course_number = ? AND user_id = ? AND sco_key = ?' );
$stmt->bind_param( 'iis', $course_number, $user_id, $total_time_var );
$stmt->execute();
$result = $stmt->get_result();
list ( $totalTime ) = mysqli_fetch_row( $result );

// convert total time to seconds
$time = explode( ':', $totalTime );
$totalSeconds = $time [0] * 60 * 60 + $time [1] * 60 + $time [2];

// read the last set cmi.core.session_time from the 'scorm_data' table
$stmt = $dblink->prepare( 'SELECT sco_value FROM scorm_data WHERE course_number = ? AND user_id = ? AND sco_key = ?' );
$stmt->bind_param( 'iis', $course_number, $user_id, $session_time_var );
$stmt->execute();
$result = $stmt->get_result();
list ( $sessionTime ) = mysqli_fetch_row( $result );

// convert session time to seconds
$time = explode( ':', $sessionTime );
$sessionSeconds = $time [0] * 60 * 60 + $time [1] * 60 + $time [2];

// new total time is ...
$totalSeconds += $sessionSeconds;

// break total time into hours, minutes and seconds
$totalHours = intval( $totalSeconds / 3600 );
$totalSeconds -= $totalHours * 3600;
$totalMinutes = intval( $totalSeconds / 60 );
$totalSeconds -= $totalMinutes * 60;

// reformat to comply with the SCORM data model
$totalTime = sprintf( "%04d:%02d:%02d", $totalHours, $totalMinutes, $totalSeconds );

// save new total time to the 'scorm_data' table
$stmt = $dblink->prepare( 'DELETE FROM scorm_data WHERE course_number = ? AND user_id = ? AND sco_key = ?' );
$stmt->bind_param( 'iis', $course_number, $user_id, $total_time_var );
$stmt->execute();

$stmt = $dblink->prepare( 'INSERT INTO scorm_data ( course_number, user_id, sco_key, sco_value ) VALUES ( ?, ?, ?, ? )' );
$stmt->bind_param( 'iiss', $course_number, $user_id, $total_time_var, $totalTime );
$stmt->execute();

// delete the last session time
$stmt = $dblink->prepare( 'DELETE FROM scorm_data WHERE course_number = ? AND user_id = ? AND sco_key = ?' );
$stmt->bind_param( 'iis', $course_number, $user_id, $session_time_var );
$stmt->execute();

// return value to the calling program
print "true";

?>