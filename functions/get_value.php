<?php

// database login information
require '../config.php';

$sco_key = $_REQUEST ['sco_key'];
$course_number = $_REQUEST ['course_number'];

// determine value to be returned
switch( $sco_key )
{
	
	// no variable name supplied
	case '' :
		$sco_value = '';
		break;
	
	// cmi.core._children is always the same
	case 'cmi.core._children' :
		$sco_value = 'student_id,student_name,lesson_location,credit,lesson_status,entry,score,total_time,exit,session_time';
		break;
	
	// cmi.core.student_name is a read-only element
	// Note: in a real application, read from the main LMS student database
	case 'cmi.core.student_name' :
		$sco_value = $iuser_fname . ' ' . $user_lname;
		break;
	
	// cmi.core.student_id is a read-only element
	// Note: in a real application, read from the main LMS student database
	case "cmi.core.student_id" :
		$sco_value = $user_id;
		break;
	
	// cmi.core.score._children is always the same
	case "cmi.core.score._children" :
		$sco_value = "raw";
		break;
	
	// all other variable names
	default :
		
		// make safe for database
		$sco_key = mysqli_escape_string( $dblink, $sco_key );
		$sco_value = '';
		
		// read data from the 'scorm_data' table
		$stmt = $dblink->prepare( 'SELECT sco_value FROM scorm_data WHERE course_number = ? AND user_id = ? AND sco_key = ?' );
		$stmt->bind_param( 'iis', $course_number, $user_id, $sco_key );
		$stmt->execute();
		$result = $stmt->get_result();
		
		list ( $sco_value ) = mysqli_fetch_row( $result );
}

// return value to the calling program
echo $sco_value;

?>