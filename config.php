<?php

// Load the constants
require 'constants.php';

// Load main classes
require 'classes/Db.php';
require 'classes/Api.php';

// Get the course number / Check if anything is blank
if( isset( $_REQUEST['course_number'] ) || strlen( $_REQUEST['course_number'] ) == 0  )
{
	$course_number = trim( $_REQUEST['course_number'] );
}
else
{
	// Return value to the calling program
	echo 'false';
	exit();
}

// Create object
$api = new Api( DEFAULT_CORE_STUDENT_ID, $course_number );

?>