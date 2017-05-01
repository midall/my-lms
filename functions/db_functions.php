<?php

/**
 * 
 * @global mysqli connection $dblink
 * @param type $text_val
 * @return escaped string for queries
 */
function escape_characters( $text_val )
{
    global $dblink;
	
	return mysqli_escape_string( $dblink, $text_val );
}

/**
 * Get sco_value from table scorm_data, returns FALSE if not exists
 * 
 * @global mysqli connection $dblink
 * @param int $course_number
 * @param int $user_id
 * @param string $total_time_var
 * 
 * return string $value|FALSE
 */
function get_scorm_data( $course_number, $user_id, $sco_key  )
{
    global $dblink;
    
	// Escape characters
	$course_number = escape_characters( $course_number );
	$user_id = escape_characters( $user_id );
	$sco_key = escape_characters( $sco_key );
	
    $stmt = $dblink->prepare( 'SELECT sco_value FROM scorm_data WHERE course_number = ? AND user_id = ? AND sco_key = ?' );
    $stmt->bind_param( 'iis', $course_number, $user_id, $sco_key );
    $stmt->execute();
    $result = $stmt->get_result();
	
	// Get the no. of rows
	$row_count = mysqli_num_rows( $result );
	
	$value = FALSE;
	if( $row_count != 0 )
    {
		list ( $value ) = mysqli_fetch_row( $result );
	}
	
    return $value;
}

/**
 * Delete row from table scorm_data
 * 
 * @global mysqli connection $dblink
 * @param int $course_number
 * @param int $user_id
 * @param string $sco_key
 */
function delete_scorm_data( $course_number, $user_id, $sco_key )
{
    global $dblink;
    
	// Escape characters
	$course_number = escape_characters( $course_number );
	$user_id = escape_characters( $user_id );
	$sco_key = escape_characters( $sco_key );
	
    $stmt = $dblink->prepare( 'DELETE FROM scorm_data WHERE course_number = ? AND user_id = ? AND sco_key = ?' );
	$stmt->bind_param( 'iis', $course_number, $user_id, $sco_key );
	$stmt->execute();
}

/**
 * Insert row in table scorm_data
 * 
 * @global mysqli connection $dblink
 * @param int $course_number
 * @param int $user_id
 * @param string $sco_key
 * @param string $sco_value
 */
function insert_default_scorm_data( $course_number, $user_id, $sco_key, $sco_value )
{
    global $dblink;
    
	// Escape characters
	$course_number = escape_characters( $course_number );
	$user_id = escape_characters( $user_id );
	$sco_key = escape_characters( $sco_key );
	$sco_value = escape_characters( $sco_value );
	
    $stmt = $dblink->prepare( 'INSERT INTO scorm_data ( course_number, user_id, sco_key, sco_value ) VALUES ( ?, ?, ?, ? )' );
	$stmt->bind_param( 'iiss', $course_number, $user_id, $sco_key, $sco_value );
	$stmt->execute();
}

/**
 * Update row in table scorm_data
 * 
 * @global mysqli connection $dblink
 * @param int $course_number
 * @param int $user_id
 * @param string $sco_key
 * @param string $sco_value
 */
function update_default_scorm_data( $course_number, $user_id, $sco_key, $sco_value )
{
    global $dblink;
    
	// Escape characters
	$course_number = escape_characters( $course_number );
	$user_id = escape_characters( $user_id );
	$sco_key = escape_characters( $sco_key );
	$sco_value = escape_characters( $sco_value );
	
    $stmt = $dblink->prepare( 'UPDATE scorm_data SET sco_value = ? WHERE course_number = ? AND user_id = ? sco_key = ? ' );
	$stmt->bind_param( 'siis', $sco_value, $course_number, $user_id, $sco_key );
	$stmt->execute();
}

?>
