<?php

// Set up constants, database and api objects
require '../config.php';

// Read GET and POST variables
$sco_key = trim( $_REQUEST['sco_key'] );
$sco_value = trim( $_REQUEST['sco_value'] );

// Check if anything is blank
if( strlen( $sco_key ) != 0 && strlen( $sco_value ) != 0 )
{
	// Clear old data and save data to the 'scorm_data' table
	$api->write_element( $sco_key, $sco_value );
	
	// Return value to the calling program
	echo 'true';	
}
else
{
	// Return value to the calling program
	echo 'false';
	exit();
}
?>