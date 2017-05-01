<?php

require 'db_functions.php';

function read_element( $course_number, $user_id, $sco_key )
{
	$value = get_scorm_data( $course_number, $user_id, $sco_key );
	
	return $value;
}

function write_element( $course_number, $user_id, $sco_key, $sco_value )
{
	delete_scorm_data( $course_number, $user_id, $sco_key );
	insert_default_scorm_data( $course_number, $user_id, $sco_key, $sco_value );
	
	return;
}

function clear_element( $course_number, $user_id, $sco_key )
{
	delete_scorm_data( $course_number, $user_id, $sco_key );
	
	return;
}

function initialize_element( $course_number, $user_id, $sco_key, $sco_value )
{
	$value = get_scorm_data( $course_number, $user_id, $sco_key );
	
	if( ! $value )
	{
		insert_default_scorm_data( $course_number, $user_id, $sco_key, $sco_value );
	}
	
	return;
}

function calculate_total_time( $total_time, $session_time )
{
	// Convert total time to seconds
	$time = explode( ':', $total_time );
	$total_seconds = $time [0] * 60 * 60 + $time [1] * 60 + $time [2];
	
	// Convert session time to seconds
	$time = explode( ':', $session_time );
	$session_seconds = $time [0] * 60 * 60 + $time [1] * 60 + $time [2];

	// Add total and session time
	$total_seconds += $session_seconds;

	// Break total time into hours, minutes and seconds
	$total_hours = intval( $total_seconds / 3600 );
	$total_seconds -= $total_hours * 3600;
	$total_minutes = intval( $total_seconds / 60 );
	$total_seconds -= $total_minutes * 60;

	// reformat to comply with the SCORM data model
	$total_time = sprintf( "%04d:%02d:%02d", $total_hours, $total_minutes, $total_seconds );
	
	return $total_time;
}
?>