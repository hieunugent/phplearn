<?php 
require __DIR__ .'/vendor/autoload.php';

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
        <form action="">
        <label class="label_register" for="Username"> User Name: </label>
        <input  type="text" name="username" placeholder="Username">
        <label class="label_register" for="Password">Password: </label>
        <input type="password" name="password" placeholder="Password">
        <br>
        <label class="label_register"  for="Password">Retype Password: </label>
        <input type="password" name="repassword" placeholder="retype Password">
        <input type="submit" >
        <p> Or <a class="a-link"href="login.php" >Sign In</a> a User</p>
        </form>
      
    </div>

    </div>
    
   
    

</body>
</html>