<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

  //Forcing someone to login
  Page::forcedLogIn();

  //The user is accessible to us once we get passed to forcedLogin()

  //Let's get the user id
  $user_id = (int) $_SESSION["user_id"];

  $User = new User($user_id);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Page Title</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
  </head>

  <body>


      <!-- Here we need to display the user id and email address as well -->
    	<div class="uk-section uk-container">
          This is dashboard page. Here is the user INFO

          <br><br>

          <?php
            echo "user_id: " . $User->user_id . "<br>";
            echo "email: " . $User->email . "<br>";
            echo "registration time: " . $User->regDate . "<br>";

          ?>
          <br><br>
          <a href="/PHP_Login_and_Registration_System/PHP-Login-System/logout.php">Logout</a>
    	</div>



    	<?php require_once "inc/footer.php"; ?> 

  </body>
</html>
