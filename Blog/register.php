<?php 
require __DIR__ .'/vendor/autoload.php';
$pepper = "c1isvFdxMDdmjOlvxpecFw";
$username= $usernameErr='';
$password= $passwordErr="";
$connect = new MongoDB\Client("mongodb://localhost:27017");
$db = $connect->mongophp->users;
function validUsername($usr){
    if(strlen($usr)< 4 || strlen($usr) > 25){
        $usernameErr="the length of username is not right";
        return False;
    }
    $connect = new MongoDB\Client("mongodb://localhost:27017");
    $db = $connect->mongophp->users;
    $result = $db->findOne(['username'=>$usr]);
    if ($result){
        $usernameErr="the username has been taken, please choose others";
        return False;
    }
    return True;
    
}
function checkpassword($pass1,$pass2 ){
    // check pass length 
    if(strlen($pass1) != strlen($pass2)){
        $passwordErr= "String length retype not match ";
        return FALSE;
    }
    // check pass retype is the same
    if($pass1 != $pass2){
        $passwordErr= "String  retype not match ";
        return FALSE;
    }
    // check if it contain all letter andn number is require
    if (strlen($pass1) < 4 || strlen($pass1)> 16){
        $passwordErr = "Password length is not between 4 and 16 letters";
        return false;
    }
    // if notthing wrong return true
    return True;
}
if($_SERVER['REQUEST_METHOD']="POST"){
    if(isset($_POST['submit'])){
         try{
            if(empty($_POST['username'])){
              $usernameErr = "username error";
           }else{
              $username = ($_POST["username"]);
              var_dump("Sucessfull usename entering");
           }
            if(empty($_POST['password'])){
             $passwordErr = "password error";
           }else{
             if (checkpassword($_POST["password"], $_POST['re_password'])){
                    $password =$_POST["password"] ;
                    var_dump("Ok for password ");
             }
            
           } 
           if ($usernameErr =='' && $passwordErr==''){
          
            $pwd_pepper = hash_hmac('sha256', $password, $pepper);
            $pwd_hashed = password_hash($pwd_pepper, PASSWORD_ARGON2ID);
            $result = $db->insertOne([
                "username"=>$username,
                "password"=> $pwd_hashed,
              ]);
            header('location:login.php');
           }
           else{
               echo $usernameErr . "<br>";
               echo $passwordErr . "<br>";
           }
        }catch(Exception $e){
            die("there is an error during register account");
        }
    }
   
}

?>
<!DOCTYPE html>
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
        <form action="register.php" method="post">
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