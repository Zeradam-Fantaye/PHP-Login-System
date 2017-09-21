<?php

// If there is no constant defined called __CONFIG__, do not load this file 
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

class User{

	private $con;

	public $user_id;
	public $email;
	public $regDate;

	//Constructor for User object
	public function __construct($userID){

		$this->con = DB::getConnection();

		//Let's force our "$userID" data to be an integer
		$userID = Filter::Int($userID);

		//Now, let's know about the email and regDate. We are already informed about the user_id from userID
		$query = "SELECT user_id, email, date FROM new_table WHERE user_id = :userID LIMIT 1";
		$userInfo = $this->con->prepare($query);
		$userInfo->bindParam(":userID", $userID, PDO::PARAM_INT);
		$userInfo->execute();

		//echo "userID = " . var_dump($userID);//$userID;


		if($userInfo->rowCount() == 1){
			//User is found
			$userInfo = $userInfo->fetch(PDO::FETCH_OBJ);

			//Let's set the class variables
			$this->email = $userInfo->email;
			$this->regDate = $userInfo->date;
			$this->user_id = $userInfo->user_id;


		}else{
			//User not found
			//So, redirect to logout
			header("Location: /PHP_Login_and_Registration_System/PHP-Login-System/logout.php");

			exit;

		}



	}

	public static function setEmail($new_email){

		//Do it: Create a profile page that enables users to change thier corresponding email address. 
		//....
		//....


		//But here, we can access
		echo $this->email;
		echo $this->user_id;
	}

	public static function Find($query, $email){

		$con = DB::getConnection();
	    $findUser = $con->prepare($query);
	    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
	    $findUser->execute();


	    if($findUser->rowCount() == 1){
	      return $findUser->fetch(PDO::FETCH_ASSOC); 
	    }

	    return false;
	  }



	}



?>