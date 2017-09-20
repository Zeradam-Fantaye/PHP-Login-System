
<?php

  //Forced the user to be logged in or redirect
  function forcedLogIn(){
        if(isset($_SESSION["user_id"])){
          // The user is allowed here

        }
        else{
          // The user is not allowed here
          header("Location: /PHP_Login_and_Registration_System/PHP-Login-System/login.php");
          exit;

        }
  }

  //Forcing the user to not touch the login/registration page while they're logged in
  function forceDashboard(){
        if(isset($_SESSION["user_id"])){
          // The user is allowed here
          header("Location: /PHP_Login_and_Registration_System/PHP-Login-System/dashboard.php");
          exit;
        }
        else{
          // The user is not allowed here
          

        }
  }






?>