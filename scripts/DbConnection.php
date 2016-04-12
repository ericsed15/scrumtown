<?php
 class DbConnection {
	private $dataSourceName;
	private $userName;
	private $password;
	private $db;

	public function __construct() {
		$this -> dataSourceName = 'mysql:host=localhost;dbname=team5_ACME_database;charset=utf8';
		$this -> userName = 'kermit';
		$this -> password = 'sesame';

		// creates PDO object
		try {
			$this -> db = new PDO($this -> dataSourceName, $this -> userName, $this -> password);

		} catch (PDOException $e) {
			$error_message = $e -> getMessage();
			echo "<p>An error occurred while connecting to
             the database: $error_message </p>";
			throw new DatabaseConnectException();
			return;
		}
		//echo " Connection established successfully with site visitor database <br>";

	}//constructor

	public function getDB() {
		return ($this -> db);
	}

	public function __destruct() {
		//$this->db->close();
		//not needed for PDO since PDOs have auto destructors
	}

}//class
?>
   	
	
  