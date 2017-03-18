<?php

// database login information
require '../config.php';

// read GET variable
if( ! isset( $_GET ['sco_key'] ) )
{
	return '';
	exit();
}

$sco_key= $_REQUEST ['sco_key'];

// make safe for database
$sco_key = mysqli_escape_string( $dblink, $sco_key );
$sco_value = '';

// read data from the 'scormvars' table
$stmt = $dblink->prepare( 'SELECT sco_value FROM scorm_data WHERE sco_key = ?' );
$stmt->bind_param( 's', $sco_key );
$stmt->execute();
$result = $stmt->get_result();

list ( $sco_value ) = mysqli_fetch_row( $result );

// return value to the calling program
print $sco_value;

?>