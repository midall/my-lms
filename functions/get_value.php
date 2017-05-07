<?php

// Set up constants, database and api objects
require '../config.php';

// Read GET and POST variables
$sco_key = trim( $_REQUEST['sco_key'] );

// Determine value to be returned
switch( $sco_key )
{
	// No variable name supplied
	case '' :
		$sco_value = '';
		break;
	
	// All other variable names
	default :
		$sco_value = $api->read_element( $sco_key );
}

// Return value to the calling program
echo $sco_value;

?>