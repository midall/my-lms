<?php

/**
 * Master Class for database management
 */
Class Db
{
	private $dblink;
	private $dbhost;
	private $dbname;
	private $dbuser;
	private $dbpass;
	
	/*
	* Class Constructor
	*
	* Init MySQL and connect to server based on constants
	*/
	public function __construct()
    {
		$this->dbhost = DBHOST;
		$this->dbname = DBNAME;
		$this->dbuser = DBUSER;
		$this->dbpass = DBPASS;
		
		$this->dbconnect();
	}
	
	/**
	* Class destructor
	*
	* Closes the connection to the server and frees up resources as needed
	*
	*/
	public function __destruct()
	{
		mysql_close( $this->dblink );	
	}
	
	/**
	 * Connect to the database
	 */
	private function dbconnect()
	{
		$this->dblink = mysqli_connect( $this->dbhost, $this->dbuser, $this->dbpass, $this->dbname );
	}
	
	/**
	 * Function that escape characters in string
	 * 
	 * 
	 * @param type $text_val
	 * @return escaped string for queries
	*/
   private function escape_characters( $text_val )
   {
	   return mysqli_escape_string( $this->dblink, $text_val );
   }

   /**
	* Get sco_value from table scorm_data, returns FALSE if not exists
	* 
	* @param int $course_number
	* @param int $user_id
	* @param string $total_time_var
	* 
	* return string $value|FALSE
	*/
   protected function get_scorm_data( $course_number, $user_id, $sco_key  )
   {
	   // Escape characters
	   $course_number = $this->escape_characters( $course_number );
	   $user_id = $this->escape_characters( $user_id );
	   $sco_key = $this->escape_characters( $sco_key );

	   $stmt = $this->dblink->prepare( 'SELECT sco_value FROM scorm_data WHERE course_number = ? AND user_id = ? AND sco_key = ?' );
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
	* @param int $course_number
	* @param int $user_id
	* @param string $sco_key
	*/
   protected function delete_scorm_data( $course_number, $user_id, $sco_key )
   {
	   // Escape characters
	   $course_number = $this->escape_characters( $course_number );
	   $user_id = $this->escape_characters( $user_id );
	   $sco_key = $this->escape_characters( $sco_key );

	   $stmt = $this->dblink->prepare( 'DELETE FROM scorm_data WHERE course_number = ? AND user_id = ? AND sco_key = ?' );
	   $stmt->bind_param( 'iis', $course_number, $user_id, $sco_key );
	   $stmt->execute();
   }

   /**
	* Insert row in table scorm_data
	* 
	* @param int $course_number
	* @param int $user_id
	* @param string $sco_key
	* @param string $sco_value
	*/
   protected function insert_default_scorm_data( $course_number, $user_id, $sco_key, $sco_value )
   {
	   // Escape characters
	   $course_number = $this->escape_characters( $course_number );
	   $user_id = $this->escape_characters( $user_id );
	   $sco_key = $this->escape_characters( $sco_key );
	   $sco_value = $this->escape_characters( $sco_value );

	   $stmt = $this->dblink->prepare( 'INSERT INTO scorm_data ( course_number, user_id, sco_key, sco_value ) VALUES ( ?, ?, ?, ? )' );
	   $stmt->bind_param( 'iiss', $course_number, $user_id, $sco_key, $sco_value );
	   $stmt->execute();
   }

   /**
	* Update row in table scorm_data
	* 
	* @param int $course_number
	* @param int $user_id
	* @param string $sco_key
	* @param string $sco_value
	*/
   protected function update_default_scorm_data( $course_number, $user_id, $sco_key, $sco_value )
   {
	   // Escape characters
	   $course_number = $this->escape_characters( $course_number );
	   $user_id = $this->escape_characters( $user_id );
	   $sco_key = $this->escape_characters( $sco_key );
	   $sco_value = $this->escape_characters( $sco_value );

	   $stmt = $this->dblink->prepare( 'UPDATE scorm_data SET sco_value = ? WHERE course_number = ? AND user_id = ? sco_key = ? ' );
	   $stmt->bind_param( 'siis', $sco_value, $course_number, $user_id, $sco_key );
	   $stmt->execute();
   }

   /**
	* Get scorm data from scorm_data table
	* 
	* @param int $course_number
	* @param int $user_id
	*/
   protected function get_course_data( $course_number, $user_id )
   {
	    // Escape characters
	   $course_number = $this->escape_characters( $course_number );
	   $user_id = $this->escape_characters( $user_id );

	   $stmt = $this->dblink->prepare( 'SELECT * FROM scorm_data WHERE course_number = ? AND user_id = ? ' );
	   $stmt->bind_param( 'ii', $course_number, $user_id );
	   $stmt->execute();
	   $result = $stmt->get_result();

	   // Get the no. of rows
	   $row_count = mysqli_num_rows( $result );

	   $values = array();
	   if( $row_count != 0 )
	   {
		   while( $row = mysqli_fetch_assoc( $result ) )
		   {
			   $values[] = $row;
		   }
	   }

	   return $values;
   }

   /**
	* Delete data from table scorm_data
	* 
	* @param int $course_number
	* @param int $user_id
	*/
   protected function delete_course_data( $course_number, $user_id )
   {
	   // Escape characters
	   $course_number = $this->escape_characters( $course_number );
	   $user_id = $this->escape_characters( $user_id );

	   $stmt = $this->dblink->prepare( 'DELETE FROM scorm_data WHERE course_number = ? AND user_id = ?' );
	   $stmt->bind_param( 'ii', $course_number, $user_id );
	   $stmt->execute();
   }
}
?>