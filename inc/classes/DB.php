<?php

// If there is no constant defined called __CONFIG__, do not load this file 
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

class DB {

	protected static $con;

	private function __construct() {

		$username = "zackDB";
		$password = "612180Zz@";

		try {

			//echo "<br>YES I AM HERE LINE 1<br>";
			self::$con = new PDO( 'mysql:charset=utf8mb4;host=localhost;port=3306;dbname=login_course', $username, $password );
			//echo "<br>YES I AM HERE LINE 2<br>";

			self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );

		} catch (PDOException $e) {
			echo "Could not connect to database."; exit;
		}

	}


	public static function getConnection() {

		if (!self::$con) {
			//echo "Yes I am creating a new DB object";
			new DB();
		}

		return self::$con;
	}
}

?>
