<?php

// Set up constants, database and api objects
require '../config.php';

// Set the 'lesson_status' value - if it's 'not attempted', change it to 'completed'
$core_lesson_status = read_element( CORE_LESSON_STATUS );
if( $core_lesson_status == 'not attempted' )
{
	$api->write_element( CORE_LESSON_STATUS, 'completed' );
}

// Set the 'masteryscore' value (here initialized by initialize.php, normally from imsmanifest.xml)
$adlcp_masteryscore = $api->read_element( ADLCP_MASTERYSCORE );
$adlcp_masteryscore *= 1;

if( $adlcp_masteryscore )
{
	// yes - so read the score
	$score_raw = $api->read_element( SCORE_RAW );
	$score_raw *= 1;
	
	// set 'lesson_status' to passed/failed
	if( $score_raw >= $adlcp_masteryscore )
	{
		$api->write_element( CORE_LESSON_STATUS, 'passed' );
	}
	else
	{
		$api->write_element( CORE_LESSON_STATUS, 'failed' );
	}
}

// New 'entry' value depends on 'exit'
$core_exit = read_element( CORE_EXIT );
if ($value == 'suspend')
{
	$api->write_element( CORE_ENTRY, 'resume' );
}
else
{
	$api->write_element( CORE_ENTRY, '' );
}

// Get 'total_time', 'session_time' an calculate new 'total_time'
$total_time = $api->read_element( CORE_TOTAL_TIME );
$session_time = $api->read_element( CORE_SESSION_TIME );
$new_total_time = $api->calculate_total_time( $total_time, $session_time );

// Save new total time
$api->write_element( CORE_TOTAL_TIME, $new_total_time );

// Delete the last session time
// Session Time
$api->clear_element( CORE_SESSION_TIME );

// return value to the calling program
echo "true";

?>