<?php

// Load the constants
require 'constants.php';

// Database credentials
$dbname = 'my-lms';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

// connect to the database
$dblink = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );

/**
 * DUMMY USER DATA (STUDENT)
 * MUST REPLACE THESE WITH PROPER DB DATA
 */

$user_id = 125;
$user_fname = 'John';
$user_lname = 'Wick';

?>