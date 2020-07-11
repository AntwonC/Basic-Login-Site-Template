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
?>

 <html> 
      <head> 

      <link rel = "stylesheet" href = "styles.css" type = "text/css">

        <title> Database Form Validation </title>
      </head> 

    <body> 
      <form method = "post"> 
      

      <div id = "email_container"> 
        <input type = "text" class = "email" id = "email" name = "email" placeholder = "Your email"> <br> 
      </div>

      <div id = "password_container">
        <input type = "password" id = "password" name = "password" placeholder = "password"> <br> 
      </div>

      <div id = "checkbox_container"> 
        <input type = "checkbox" id = "signUp_checkbox">
        <input type = "submit" value = "Sign Up">
      </div>

  
      <div id = "seperator"> </div> 

      <div id = "email_login_container"> 
        <input type = "text" class = "email" name = "email" placeholder = "Your email"> 
      </div>


      <div id = "password_login_container"> 
        <input type = "text" class = "pass" name = "password" placeholder = "Password">
     </div> 

     <div id = "login_checkbox_container"> 
       <input type = "checkbox" id = "login_checkbox"> 
       <input type = "submit" value = "Login"> 
     </div> 

      </form> 

  </body> 
</html>  

