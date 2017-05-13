<?php

class Admin extends Db
{
	private $user_id;
	
	/**
	 * Class Constructor
	 * Init Administrator
	 * 
	 * @param int $course_number
	 * @param int $user_id
	 * 
	*/
	public function __construct( $user_id )
    {
		 parent::__construct();
		 
		 $this->set_user_id( $user_id );
	}
	
	/**
	* Class destructor
	*/
	function __destruct()
	{
		
	}
	
	/**
	 * Set the user id
	 * 
	 * @param int $user_id
	 */
	public function set_user_id( $user_id )
	{
		 $this->user_id = $user_id;
	}
	
	/**
	 * Get the user id
	 * 
	 * @return int
	 */
	public function get_user_id()
	{
		 return $this->$user_id;
	}
	
	/**
	 * Get the scorm data for a specific user, scorm number
	 * 
	 * @param int $scorm_number
	 * 
	 * @return <array> scorm data
	 */
	public function get_scorm_courses_data( $scorm_number )
	{
		if( $scorm_number == '' )
		{
			return array();
		}
		
		$values = $this->get_course_data( $scorm_number, $this->user_id );
		
		return $values;
	}
	
	/**
	 * Clear data for a specific user, scorm number
	 * 
	 * @param int $scorm_number
	 */
	public function clear_scorm_courses_data( $scorm_number )
	{
		if( $scorm_number == '' )
		{
			return;
		}
		
		$this->delete_course_data( $scorm_number, $this->user_id );
		return;
	}
}
