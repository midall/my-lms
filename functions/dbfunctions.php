<?php

/**
 * 
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

function delete_scorm_data( $course_number, $user_id, $sco_key )
{
    global $dblink;
    
    $stmt = $dblink->prepare( 'DELETE FROM scorm_data WHERE course_number = ? AND user_id = ? AND sco_key = ?' );
	$stmt->bind_param( 'iis', $course_number, $user_id, $sco_key );
	$stmt->execute();
}

function insert_default_scorm_data( $course_number, $user_id, $sco_key, $sco_value )
{
    global $dblink;
    
    $stmt = $dblink->prepare( 'INSERT INTO scorm_data ( course_number, user_id, sco_key, sco_value ) VALUES ( ?, ?, ?, ? )' );
	$stmt->bind_param( 'iiss', $course_number, $user_id, $sco_key, $sco_value );
	$stmt->execute();
}
?>
