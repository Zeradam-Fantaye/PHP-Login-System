<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

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

  	<div class="uk-section uk-container">

  		<?php 
  			echo "Hello world. Today is: ";
  			echo date("Y m d");
  		?> 
      
  		<p>
  			<a href="/PHP_Login_and_Registration_System/PHP-Login-System/login.php">Login</a>
  			<a href="/PHP_Login_and_Registration_System/PHP-Login-System/register.php">Register</a>
  		</p>

      <br><br>
      
      <h1>Do these for personal project to further develop the system</h1>
      <ul>

        <li>CHANGE PASSWORD AND CHANGE EMAIL ONCE LOGGED IN</li>
        <li>NEWS FEED</li>
        <li>FRIEND FEED</li>
        <li>RESET PASSWORD</li>
        <li>INVITE MODULE: INVITE A FRIEND BY PUTTING THEIR EMAIL ADDRESS AND AUTOMATICALLY SEND THEM THE INVITATION</li>
        <li>ADD FIRST NAME OR LAST NAME</li>
        <li>ADD SMS CONFIRMATION (VIA TWILIO)</li>

      </ul>

      <br><br>














  	</div>

  	<?php require_once "inc/footer.php"; ?> 
  </body>
</html>
