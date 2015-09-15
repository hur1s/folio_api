<?php

class DbManager
	{
	
		protected $mysqli;

		public function GetMysqli()
		{
			return $this->mysqli;
		}
		
		public function __construct()
		{
			$mysqli = new mysqli(DB_HOST, DB_UNAME, DB_PASS, DB_NAME);
			if(mysqli_connect_errno()) 
			{
				printf("Connect failed: %s\n", mysqli_connect_error());
				error_log((LOG_ERROR_TIMESTAMP . mysqli_connect_error() . "\n"), 3, LOG_PATH);
				exit();
			}
			
			if(!$mysqli->set_charset("utf8")) 
			{
				printf("Error loading character set utf8: %s\n", $mysqli->error);
				error_log((LOG_ERROR_TIMESTAMP . $mysqli->error . "\n"), 3, LOG_PATH);
				exit();
			}

			$this->mysqli = $mysqli;
		}
		
		public function Close()
		{
			$this->mysqli->close();
		}
	}

?>
