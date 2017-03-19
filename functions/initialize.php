<?php

// database login information
require '../config.php';

$course_number = $_REQUEST ['course_number'];
$course_number = mysqli_escape_string( $dblink, $course_number );

// Variables names
$total_time_var = 'cmi.core.total_time';
$session_time_var = 'cmi.core.session_time';

$time_zero = '0000:00:00';

// if not set, cmi.core.total_time should be set to '0000:00:00'
$stmt = $dblink->prepare( 'SELECT sco_value FROM scorm_data WHERE course_number = ? AND sco_key = ?' );
$stmt->bind_param( 'is', $course_number, $total_time_var );
$stmt->execute();
$result = $stmt->get_result();
list ( $totalTime ) = mysqli_fetch_row( $result );

if( ! $totalTime )
{
	$stmt = $dblink->prepare( 'DELETE FROM scorm_data WHERE course_number = ? AND sco_key = ?' );
	$stmt->bind_param( 'is', $course_number, $total_time_var );
	$stmt->execute();
	
	$stmt = $dblink->prepare( 'INSERT INTO scorm_data ( course_number, sco_key, sco_value ) VALUES ( ?, ?, ? )' );
	$stmt->bind_param( 'iss', $course_number, $total_time_var, $time_zero );
	$stmt->execute();
}

// clear any pre-existing cmi.core.session_time and set to '0000:00:00'
$stmt = $dblink->prepare( 'DELETE FROM scorm_data WHERE course_number = ? AND sco_key = ?' );
$stmt->bind_param( 'is', $course_number, $session_time_var );
$stmt->execute();

$stmt = $dblink->prepare( 'INSERT INTO scorm_data ( course_number, sco_key, sco_value ) VALUES ( ?, ?, ? )' );
$stmt->bind_param( 'iss', $course_number, $session_time_var, $time_zero );
$stmt->execute();

// return value to the calling program
print 'true';

?>