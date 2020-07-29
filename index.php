<?php
    // Value should be static.
  // $row['id'] = 73; // Level 4 encryption. Pile up md5's and it might be more difficult to get.
  //  $salt = "eeiofdasjdsia123213"; // Level 2. Append it the md5. 

    //echo md5( md5($row['id']) . "password"); // One way encryption. The problem with this is because the encryption is one way so it will be unique. There are websites to find it.



   // setcookie("customerId", "1234", time() + 60 * 60 * 24); // This is how you set a cookie

  // setcookie("customerId", "", time() - 60 * 60); // Unset cookie and only unset on next page load. 
   // $_COOKIE["customerId"] = "test"; // Update the value of the cookie. 
   // echo $_COOKIE["customerId"]; // Wil be kept. 
  /*  session_start(); 
    ob_start();

    

 $link =  mysqli_connect("shareddb-v.hosting.stackcp.net", "userss-313437cefd", "jjkyt04bfw", "userss-313437cefd");

  if ( mysqli_connect_error() ) {
      die ("There was an error connecting to the database");
  } 

  $email_filled = false; 
  $password_filled = false; 

  if ( $_POST ) {
    if ( $_POST['email'] == "" )  {
      $email_filled = false; 
      
      //   echo $_POST['email']; 
      // echo '<br><br>';
      // echo $_POST['password'];
    }   else  {
      $email_filled = true; 
      
    }
    
    if ( $_POST['password'] == "" )  {
      $password_filled = false;
      //echo "This password field is required";
    } else  {
      $password_filled = true; 
      
    }
    
    if ( !$email_filled && !$password_filled) {
      
      echo "This email field is required".'<br>'. "This password field is required" . '<br>';

    } else  {

      $exists = false; 
      $name = $_POST['email']; 
      echo $name . '<br>';
      $query2 = "SELECT * FROM users WHERE id >= 1";
      
      if ( $result = mysqli_query($link, $query2) ) {
       // echo $result . '<br>';
        // Query was successful 
        while ( $row = mysqli_fetch_array($result)  )  {

        //  echo $row['email'] . '<br>';
          
          if ( $name == $row['email'] ) {

            echo "Already exists" . '<br>';
            $exists = true; 

          }  

        }
        
        if ( !$exists )  {
          echo 'Let us add the new entry in' . '<br>';
          $query = "INSERT INTO users (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
          mysqli_query($link, $query);

          $_SESSION['email'] = $_POST['email'];
          header("Location: http://mysqltester22-com.stackstaging.com/session.php");
         
        }
          //break;

      }
      
    }

    print_r($_POST);
  } */


  // Retrieving the data 
 // $name = "Anthony";
  // Use function mysqli_real_escape_string($link, $name); This will stop it from taking any characters that might end the query. 

 // $query = "SELECT `name` FROM  users WHERE name LIKE '$name' ";

   // if ( $result = mysqli_query($link, $query) )  {

     // echo "Query was successful!";
     //   while ( $row = mysqli_fetch_array($result) )  {
       //     print_r($row);
       // } 

    //}
    // Retrieving data ends here 

    // How to INSERT into the database here
   // $query2 = "INSERT INTO users (`email`, `password`) VALUES('rammerbot64@gmail.com', 'dkdkdkk231$%^') ";

    //mysqli_query($link, $query2); 
    // INSERT to database ends here 

    /* How to Update the database here
    $query3 = "UPDATE `users` SET password = 'dndmkkse112355$^&^%^' WHERE email = 'positivevibes@gmail.com' LIMIT 1 ";
    
    mysqli_query($link, $query3);

    Updating ends here    */


   session_start(); 
    ob_start();

    // Logs the user out 
    if ( array_key_exists("logout", $_GET) )  {

      //  echo "We are logging the user out" . "<br>";
      unset($_SESSION);
      setcookie("id", "", time() - 60*60);
      $_COOKIE["id"] = "";

    } else if ( ( array_key_exists("id", $_SESSION) && $_SESSION['id'] )  || ( array_key_exists("id", $_COOKIE) && $_COOKIE['id'] ) ) {
     
        header("Location: session.php");
    } 
    // End of logging the user out
    
    // NOTE: In an attempt to go back to the home page when we are logged in, it will redirect us to the logged in page again.
    // When logged out, the redirect knows its logged out. 
    // PROBLEM: It still thinks we are logged in when we go back originally. This is because of the unsetting of the cookie. 
    if ( array_key_exists("submit", $_POST) ) {

      $link =  mysqli_connect("shareddb-v.hosting.stackcp.net", "userss-313437cefd", "U!%&G(P'F.AT", "userss-313437cefd");
      
      if ( mysqli_connect_error() ) {
        die ("There was an error connecting to the database");
      } 
    
   

      $email_signUp = false; 
      $password_signUp = false;
      $errors = "";

      

      if ( $_POST['signUp'] == '1' )  {
       
        $signUp_email = $_POST['signUp_email']; 
        $signUp_password = md5 ( md5 ( $_POST['signUp_password'] ) ); 
        
        if ( $signUp_email == "" )  {
          $errors .= "Email field is required." . "<br>";
        } else  {
          $email_signUp = true; 
        }
        
        // Do it before the md5 
        if ( $_POST['signUp_password'] == "" ) {
          $errors .= "Password field is required." . "<br>";
       
        } else  {
          $password_signUp = true; 
        }

        
          $duplicate_email = false; 

          if ( $errors == "" )  {

            
            $signUp_query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($link, $signUp_email)."' LIMIT 1";
            
            $signUp_result = mysqli_query($link, $signUp_query);
            $rows = mysqli_num_rows($signUp_result); 
            
            echo $rows . "<br>";
            
            
            if ( mysqli_num_rows($signUp_result) > 0 )  {
              $errors = "That email address is already taken";
              
            } else  {
              $add_query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $signUp_email)."', '".mysqli_real_escape_string($link, $signUp_password)."')";
              
              if ( !mysqli_query($link, $add_query) ) {
                $errors = "<p> Could not sign you up -please try again later. </p>";
              } else  {
                
                $_SESSION['id'] = mysqli_insert_id($link);
                
                if ( $_POST['stayLoggedIn'] == '1' )  {
                  setcookie("id", mysqli_insert_id($link), time() + 60 * 60 * 24 * 365);
                }
                
                if ( $errors == "" )  {
                  echo "You are signed up!" . "<br>";
                }
                
                // header("Location: session.php");
              }
            }
          } else  {
            echo "There are errors:" . "<br>";
          }
          
        
          //echo "This is it!";





      } else  { // You have to be logging in, instead of signing up.

       // echo "WE will login instead" . "<br>";



        
          $valid_login_email = false;
          $valid_password_email = false; 
          $dupe_email_login = false;
      
          $confirmation = false;
          $password_confirmation = false;

          $login_email = $_POST['login_email']; 
          $login_password = md5 ( md5 ( $_POST['login_password'] ) );  // Password is 12345 
    
          if ( $login_email == "" )  {
            $errors .= "Email field is required." . "<br>";
          } else  {
            $valid_login_email = true; 
          }
    
          if ( $_POST['login_password'] == "" ) {
            $errors .= "Password field is required." . "<br>";
           
          } else  {
            $valid_password_email = true; 
          }
          
            $dupe_email_login = false; 

            $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $login_email)."'";

            $resultts = mysqli_query($link, $query); 


            $row = mysqli_fetch_array($resultts);
           // echo $row . "<br>";
            
           // echo $row['password'] . "<br>";
            if ( isset($row) )  {

                if ( $login_password == $row['password'] )  {

                    $_SESSION['id'] = $row['id'];

                    if ( $_POST['stayLoggedIn'] == '1' )  {
                      setcookie("id", mysqli_insert_id($link), time() + 60 * 60 * 24 * 365);
                    }

                    header("Location: session.php");

                } else  {
                  $errors .= "Password does not match database";

                  
                }
              } else  {
                $errors = "Email cannot be found in database";
                

            }

            if ( $errors == "" ) {
              echo "Error is empty so form is valid." . "<br>";
                }   else  {
              echo "Error is not empty so form is not valid" . "<br>";
              }

          }

      }

      print_r($_POST);
          
        /*  if ( $valid_login_email && $valid_password_email )  {
            // Check if there is already an existing email in the database 
              $login_email_query = "SELECT `email` from users"; 
    
              if ( $result = mysqli_query($link, $login_email_query) )  {
                    //echo "hello" . "<br>";
    
                  while ( $row = mysqli_fetch_array($result) )  {
                      
                      if ( $login_email == $row['email'] ) {
                          //  echo "The email already exists" . "<br>"; 
                            $dupe_email_login = true; 
                            break;
                        
                      } 
                  
                } 
    
                
                // NOTE: Login is a little bit different, we don't want to insert. Instead, we want 
                // to check if the email exists in the database. If it does, then proceed with login
                // else if it does not then do not proceed with login. 
                
                // Make sure that all fields are filled out for login. 
                // Checking if there is an email that already exists in the database
                // Match the password too for login to be successful.
    
                
                
                if ( $dupe_email_login )  {
                  // Exists in the database 
                 //   $login_query = "INSERT INTO users (`email`, `password`) VALUES ('$login_email', '$login_password')";
                  //  mysqli_query($link, $login_query);
    
                    echo "It exists in the database" . "<br>";
                    
                    // START: Checking password here in database to see if it matches up 
                    $pass_query = "SELECT `password` FROM users WHERE email LIKE '$login_email'";
                    // $query = "SELECT `name` FROM  users WHERE name LIKE '$name' ";
    
                    // Running the query 
                    if ( $pass_result = mysqli_query($link, $pass_query) )  {
                          // This should only get 1 thing. 
                        if ( $pass_row = mysqli_fetch_array($pass_result) ) {
                            // Check if the pass is the same 
                            if ( $pass_row['password'] == $login_password ) {
                            //  echo "The password the query got is " . $pass_row['password'] . "<br>";
                             // echo "The passwords match up" . "<br>";
    
                             // Next step: Redirect our user to the page after logged in. 
                            
                            // Check if the checkbox is checked. 
                            // Create a cookie to make sure the user is logged in.
                          //  echo "Reached the if statement before" . "<br>";
                          //echo $login_email;
                          $_SESSION['email'] = $login_email; 
    
                            if ( $_POST['stayLoggedIn'] == '1' ) {
                              
                           //   echo "The checkbox is checked!" . "<br>"; 
                              
                              setcookie("email", "true", time() + 60 * 60 * 24 * 365);
                            } 
    
                             echo "You are logged in!";
                             header("Location: session.php");
                             
                            } else  {
                              
                              echo "The passwords do not match up." . "<br>";
                              
                            }
                          }
                        }
                        // END: of checking for passwords 
                        
                        //INSERT INTO users (`email`, `password`) VALUES('rammerbot64@gmail.com', 'dkdkdkk231$%^') ";
                      } else  {
                        
                        echo "The email does not exist" . "<br>";
                        
                      }
                      
                    }
                    
                  } else  {
                    echo $errors_login;
                    print_r($_POST);
                  } */
       
    
 


 
    

              
            


    
    // END: checking if login is filled out 

    //if ( $_POST['login'] )

    // Check if checkbox is checked to be kept logged in 


   // print_r($_POST); 
?>

<div id = "error"> <?php echo $errors; ?> </div>

 <html> 
      <head> 

      <link rel = "stylesheet" href = "styles.css" type = "text/css">

        <title> Database Form Validation </title>
      </head> 

    <body> 
     <!-- <form method = "post"> 
      

      <div id = "email_container"> 
        <input type = "text" class = "email" id = "email" name = "email_signUp" placeholder = "Your email"> <br> 
      </div>

      <div id = "password_container">
        <input type = "password" id = "password" name = "password_signUp" placeholder = "password"> <br> 
      </div>

      <div id = "checkbox_container"> 
        <input type = "checkbox" name = "stayLoggedIn" id = "signUp_checkbox" value = 1>
        <input type = "hidden" name = "signUp" value = "1"> 
        <input type = "submit" name = "submit" value = "Sign Up">
      </div>

  
      <div id = "seperator"> </div> 

      <div id = "email_login_container"> 
        <input type = "text" class = "email" name = "email_Login" placeholder = "Your email"> 
      </div>


      <div id = "password_login_container"> 
        <input type = "password" class = "pass" name = "password_Login" placeholder = "Password">
     </div> 

     <div id = "login_checkbox_container"> 
       <input type = "checkbox" name = "stayLoggedIn" id = "login_checkbox" value = 1> 
       <input type = "hidden" name = "login" value = "1">
       <input type = "submit" name = "submit" value = "Login"> 
     </div> 

      </form> -->
   <form method="post">

    <input type="email" name="signUp_email" placeholder="Your Email">
    
    <input type="password" name="signUp_password" placeholder="Password">
    
    <input type="checkbox" name="stayLoggedIn" value=1>
    
    <input type="hidden" name="signUp" value="1">
        
    <input type="submit" name="submit" value="Sign Up!">

</form>

<form method="post">

    <input type="email" name="login_email" placeholder="Your Email">
    
    <input type="password" name="login_password" placeholder="Password">
    
    <input type="checkbox" name="stayLoggedIn" value=1>
    
    <input type="hidden" name="signUp" value="0">
        
    <input type="submit" name="submit" value="Login!">

</form>

  </body> 
</html>  

