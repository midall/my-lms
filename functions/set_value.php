<?php

// database login information
require '../config.php';

// read GET and POST variables
$sco_key = $_REQUEST ['sco_key'];
$sco_value = $_REQUEST ['sco_value'];

// make safe for database
$sco_key = mysqli_escape_string( $dblink, $sco_key );
$sco_value = mysqli_escape_string( $dblink, $sco_value );
$sco_number = mysqli_escape_string( $dblink, $sco_number );

// save data to the 'scormvars' table
$stmt = $dblink->prepare( 'DELETE FROM scorm_data WHERE sco_key = ?' );
$stmt->bind_param( 's', $sco_key );
$stmt->execute();

$stmt = $dblink->prepare( 'INSERT INTO scorm_data ( sco_number, sco_key, sco_value ) VALUES ( ?, ?, ? )' );
$stmt->bind_param( 'iss', $sco_number, $sco_key, $sco_value );
$stmt->execute();

// return value to the calling program
print 'true';

?>