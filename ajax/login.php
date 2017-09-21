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

	//echo "<br><br><br> I am line 1 <br><br><br>";

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		// Always return JSON format
		//header('Content-Type: application/json');

		$return = [];

		$email = Filter::String($_POST["email"]);
		//$email = "test@test.com";

		$password = $_POST["password"]; //This never gets to the DB. So, we don't need to clean/strip it
		//$password = "testtesttest";

		// Make sure the user does not exist.
		// So here, find the user by the email address and password 
		$loginQuery = "SELECT user_id, password FROM new_table WHERE email = LOWER(:email) LIMIT 1";

		$userInfo = User::Find($loginQuery, $email);

		if($userInfo) {
		//if(true){

			//So, try to sign them in
			//We can also check to see if they are able to log in
		
			//Let's pull the user_id and password
			$User = $userInfo; 
			
			//	The above line creates an array like
			//		$User["user_id"] = 1
			//		$User["password"] = "$2y$10$O75xh1z1.4r6u7EEeLdZR.UXn3E3BcTfuxhFlWYqzSw."
			

			$user_id = (int) $User['user_id'];
			$hash = $User['password'];


			//Let's verify the password
			if(password_verify($password, $hash)) {
				//User is signed in
				$return["redirect"] = "/PHP_Login_and_Registration_System/PHP-Login-System/dashboard.php";

				//Remember session's are tiny little file saved in the server. However, cookies are files saved in the browser. 
				$_SESSION['user_id'] = $user_id;

			}else{
				//Invalid user email/password combo
				$return["error"] = "Invalid user email/password combo";
			}

			
			$return['error'] = "You already have an account";
		}

		else{

			//User does not exist
			//So here, they need to create a new account
			$return["error"] = "You do not have an account. <a href='/PHP_Login_and_Registration_System/PHP-Login-System/register.php'>Create one now?</a>"; 

			//echo "something";

		}

		//Here, the json_encode is looking for a "$return" variable
		echo json_encode($return, JSON_PRETTY_PRINT);
		
		exit;

	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}


?>


