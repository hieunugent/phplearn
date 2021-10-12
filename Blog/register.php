<?php 
require __DIR__ .'/vendor/autoload.php';
$username='';
$password='';
$connect = new MongoDB\Client("mongodb://localhost:27017");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="views/register.css">
    
</head>
<body class="page">
    <div class="register_area">
    <div class="register_page"> 
        <h3>Sign In</h3>
        <form action="register.php">
        <div class="line_input">
             <label class="label_register" for="Username"> User Name: </label>
             <input class="input_box"  type="text" name="username" placeholder="Username">
        </div>
          <div class="line_input">
             <label class="label_register" for="Password">Password: </label>
             <input class="input_box" type="password" name="password" placeholder="Password">
        </div>
          <div class="line_input">
              <label class="label_register"  for="Password">Retype Password: </label>
              <input class="input_box" type="password" name="re_password" placeholder="retype Password">
          </div>
          <div class="submit_input"> 
               <input type="submit" name="submit" >
         </div>  
        <div class="prompt_line">
        <p> Or <a class="a-link"href="login.php" >Sign In</a> a User</p>

        </div>
        </form>
      
    </div>

    </div>
    
   
    

</body>
</html>