<?php 

	//echo "I am line 111111111111111";
	// Allow the config
	define('__CONFIG__', true);
	
	// Require the config
	require_once "../inc/config.php"; 
	

//***********************Practice JSON  *********************************
/*		
		// Always return JSON format
		header('Content-Type: application/json');

		$array = ["test1", "test2", "test3", array("name" => "zeru", "lastname" => "fantaye")];

		echo json_encode($array, JSON_PRETTY_PRINT);

		
*/
//*************************************************************


	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		// Always return JSON format
		header('Content-Type: application/json');

		$return = [];

		//echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

		// Make sure the user does not exist. 

		// Make sure the user CAN be added AND is added 

		// Return the proper information back to JavaScript to redirect us.

		//$return['redirect'] = '/dashboard.php';
		$return["redirect"] = "/PHP_Login_and_Registration_System/PHP-Login-System/dashboard.php?this-is-a-redirect";

		$return['name'] = "Zeradam Fantaye";


		//Here, the json_encode is looking for a "$return" variable
		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('test');
	}
?>
