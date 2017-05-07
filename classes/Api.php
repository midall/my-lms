<?php

class Api extends Db
{
	private $course_number;
	private $user_id;
	
	/**
	 * Class Constructor
	 * Init API
	 * 
	 * @param int $course_number
	 * @param int $user_id
	 * 
	*/
	public function __construct( $user_id, $course_number )
    {
		 parent::__construct();
		 
		 $this->set_user_id( $user_id );
		 $this->set_course_number( $course_number );
	}
	
	/**
	* Class destructor
	*/
	function __destruct()
	{
		
	}
	
	/**
	 * Set the course number
	 */
	public function set_course_number( $course_number )
	{
		 $this->course_number = $course_number;
	}
	
	/**
	 * Get the course number
	 * 
	 * @return int
	 */
	public function get_course_number()
	{
		 return $this->course_number;
	}
	
	/**
	 * Set the user id
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
	* Get the value of a specific data element
	* 
	* @param string $sco_key
	* @return string
	*/
   function read_element( $sco_key )
   {
	   $value = $this->get_scorm_data( $this->course_number, $this->user_id, $sco_key );

	   return $value;
   }

   /**
	* Insert a new value for a data element
	* 
	* @param string $sco_key
	* @param string $sco_value
	* @return <empty> string
	*/
   function write_element( $sco_key, $sco_value )
   {
	   $this->delete_scorm_data( $this->course_number, $this->user_id, $sco_key );
	   $this->insert_default_scorm_data( $this->course_number, $this->user_id, $sco_key, $sco_value );

	   return;
   }

   /**
	* Clear data for a specific data element
	* 
	* @param string $sco_key
	* @return <empty> string
	*/
   function clear_element( $sco_key )
   {
	   $this->delete_scorm_data( $this->course_number, $this->user_id, $sco_key );

	   return;
   }

   /**
	* Initialize the SCORM data elements
	* 
	* @param string $sco_key
	* @param string $sco_value
	* @return <empty> string
	*/
   function initialize_element( $sco_key, $sco_value )
   {
	   $value = $this->get_scorm_data( $this->course_number, $this->user_id, $sco_key );

	   if( ! $value )
	   {
		   $this->insert_default_scorm_data( $this->course_number, $this->user_id, $sco_key, $sco_value );
	   }

	   return;
   }

   /**
	* Calculates the new total time based on the old total time and the session time
	* 
	* @param string $total_time
	* @param string $session_time
	* @return string
	*/
   function calculate_total_time( $total_time, $session_time )
   {
	   // Convert total time to seconds
	   $t_time = explode( ':', $total_time );
	   $total_seconds = $t_time [0] * 60 * 60 + $t_time [1] * 60 + $t_time [2];

	   // Convert session time to seconds
	   $s_time = explode( ':', $session_time );
	   $session_seconds = $s_time [0] * 60 * 60 + $s_time [1] * 60 + $s_time [2];

	   // Add total and session time
	   $total_seconds += $session_seconds;

	   // Break total time into hours, minutes and seconds
	   $total_hours = intval( $total_seconds / 3600 );
	   $total_seconds -= $total_hours * 3600;
	   $total_minutes = intval( $total_seconds / 60 );
	   $total_seconds -= $total_minutes * 60;

	   // reformat to comply with the SCORM data model
	   $new_total_time = sprintf( '%04d:%02d:%02d', $total_hours, $total_minutes, $total_seconds );

	   return $new_total_time;
   }
}
