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
 * Get sco_value from table scorm_data
 * 
 * @global mysqli connection $dblink
 * @param int $course_number
 * @param int $user_id
 * @param string $total_time_var
 * 
 * return mysqli result
 */
function get_scorm_data( $course_number, $user_id, $sco_key  )
{
    global $dblink;
    
    $stmt = $dblink->prepare( 'SELECT sco_value FROM scorm_data WHERE course_number = ? AND user_id = ? AND sco_key = ?' );
    $stmt->bind_param( 'iis', $course_number, $user_id, $sco_key );
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result;
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
    
    $stmt = $dblink->prepare( 'UPDATE scorm_data SET sco_value = ? WHERE course_number = ? AND user_id = ? sco_key = ? ' );
	$stmt->bind_param( 'siis', $sco_value, $course_number, $user_id, $sco_key );
	$stmt->execute();
}
?>
