<?php

// database login information
require '../config.php';

// read GET and POST variables
$sco_key = $_REQUEST ['sco_key'];
$sco_value = $_REQUEST ['sco_value'];
$course_number = $_REQUEST ['course_number'];

// make safe for database
$sco_key = mysqli_escape_string( $dblink, $sco_key );
$sco_value = mysqli_escape_string( $dblink, $sco_value );
$course_number = mysqli_escape_string( $dblink, $course_number );

// save data to the 'scormvars' table
$stmt = $dblink->prepare( 'DELETE FROM scorm_data WHERE course_number = ? AND sco_key = ?' );
$stmt->bind_param( 'ss', $course_number, $sco_key );
$stmt->execute();

$stmt = $dblink->prepare( 'INSERT INTO scorm_data ( course_number, sco_key, sco_value ) VALUES ( ?, ?, ? )' );
$stmt->bind_param( 'iss', $course_number, $sco_key, $sco_value );
$stmt->execute();

// return value to the calling program
print 'true';

?>