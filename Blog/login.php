<?php 

require __DIR__ .'/vendor/autoload.php';
$pepper = "c1isvFdxMDdmjOlvxpecFw";
$connect = new MongoDB\Client("mongodb://localhost:27017");
$db = $connect->mongophp->users;
// get the result from user find
// but we have to secure the info that need to compare
// can not let the info is found easy by hacker
if ($_SERVER['REQUEST_METHOD']=='POST'){

    if ($_POST['username']!= ''){
        $pwd_pepper2 = hash_hmac('sha256', $_POST['password'],"c1isvFdxMDdmjKOlvxpecFw");
        $user = $db->findOne(['username'=>$_POST['username']]);
        if ($user){
            echo (String)$user->password;
        }else{
            echo "notfound any";
        }
     
      
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="views/login.css">
    
</head>
<body class="page">
    <div class="loginarea">
    <form action="login.php" method="post">
    <div class="loginpage"> 
        <h3>Sign In</h3>
        <label class="labellogin" for="Username"> User Name: </label>
        <input  type="text" name="username" placeholder="Username">
        <label class="labellogin" for="Password">Password: </label>
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit">

        <p> Or <a class="a-link"href="register.php" >Sign Up</a> a User</p>
    </div>
    </form>
    </div>
    
   

</body>
</html>