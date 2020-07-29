<?php
    session_start(); 
    ob_start();

    if ( array_key_exists("id", $_COOKIE)  ) {
       // echo $_COOKIE['email'] . "<br>";
        $_SESSION['id'] = $_COOKIE['id'];
        echo "You are now logged in" . "<br>";
        //echo "This is the session email: " . $_SESSION['email'] . "<br>";
        //echo "This is the cookie " . $_COOKIE['email'] . "<br>";
    }  
    
    if ( array_key_exists("", $_SESSION) ) {
        //echo "This is the session email: " . $_SESSION['email'] . "<br>";
        //echo "This is the cookie " . $_COOKIE['email'] . "<br>";
        echo "You are logged in again." . "<br>";
        echo "<p> Logged In! <a href = 'index.php?logout=1'> Log out </a></p>'";
    }   else    {
         header("Location: index.php");
    }

  /*    if ( $_POST['return'] ) {
        echo "Are you sure you want to log out?" . "<br>";
        //unset($_SESSION['email']); 
        //setcookie("email", "", time() - 60 * 60);
        header("Location: index.php");
        
    } */




    
    
    //   echo $_SESSION['username']; 
?>
