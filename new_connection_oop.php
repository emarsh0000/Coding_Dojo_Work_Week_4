<?php

class Database
{
	var $connection;  //this is going to be mysqqli object we have secretly been using

	//put data checks and initialization stuff in the construct method!
	public function __construct()
	{
		//define constants for db_host, db_user, db_pass, and db_database
		//adjust the values below to match your database settings
		define('DB_HOST', 'localhost');
		define('DB_USER', 'root');
		define('DB_PASS', 'root'); //set DB_PASS as 'root' if you're using mac
		define('DB_DATABASE', 'world'); //make sure to set your database
		$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);  //connect to database host
	}
	//only one result will be returned
	public function fetch_record($query)
	{
		$result = $this->connection->query($query);
		return mysqli_fetch_assoc($result);
	}

	//used when expecting multiple results
	public function fetch_all($query)
	{
		$data = array();
		$result = $this->connection->query($query);
		 
		while($row = mysqli_fetch_assoc($result))
		{
			$data[] = $row;
		}
		return $data;
	}
	public function run_mysql_query($query)
	{
	 	$result = $this->connection->query($query);
	 	return $this->connection->insert_id;
	}
	public function escape_this_string($string)
	{
		return $this->connection->real_escape_string($string);
	}
	public function __destruct()
	{
		//echo ;
	}
}