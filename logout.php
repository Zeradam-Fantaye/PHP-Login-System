<?php 

	session_start();
	session_destroy();
	session_write_close();
	setcookie(session_name(), "", 0, "/"); //get rid of all cookies
	session_regenerate_id(true); // regenerate any IDs

	header("Location: /PHP_Login_and_Registration_System/PHP-Login-System/index.php");


	//If you logout and try to login backagain(or go to the dashboard.php page) it won't log you in because the session is been destroyed

?>
