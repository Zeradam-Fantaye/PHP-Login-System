<?php 

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

		$email = Filter::String($_POST["email"]);

		// Make sure the user does not exist. 
		$findUser = $con->prepare("SELECT user_id FROM new_table WHERE email = LOWER(:email) LIMIT 1 ");
		
		$findUser->bindParam(":email", $email, PDO::PARAM_STR);
		$findUser->execute();

		if($findUser->rowCount() == 1){
			//User exists
			// We can also check to see if they are able to log in
			$return["error"] = "You already have an account";
		}
		else{
			//User does not exist

			//This will encrypt the password
			$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

			// Make sure the user CAN be added AND is added 
			$addUser = $con->prepare("INSERT INTO new_table (email, password) values (LOWER(:email), :password)");
			$addUser->bindParam(":email", $email, PDO::PARAM_STR);
			$addUser->bindParam(":password", $password, PDO::PARAM_STR);
			$addUser->execute();

			$user_id = $con->lastInsertId();

			//Let's sign the user in
			$_SESSION["user_id"] = (int) $user_id;

			// Return the proper information back to JavaScript to redirect us.
			$return["redirect"] = "/PHP_Login_and_Registration_System/PHP-Login-System/dashboard.php?PERFECTO";

		}


		//Here, the json_encode is looking for a "$return" variable
		echo json_encode($return, JSON_PRETTY_PRINT);
		
		exit;

	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
