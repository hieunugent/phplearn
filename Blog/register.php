<?php 
require __DIR__ .'/vendor/autoload.php';
$pepper = "c1isvFdxMDdmjOlvxpecFw";
$username= '';
$usernameErr = $passwordErr='';
$password= '';
$connect = new MongoDB\Client("mongodb://localhost:27017");
$db = $connect->mongophp->users;
// get the result from user find
// but we have to secure the info that need to compare
// can not let the info is found easy by haker
function validUsername($usr){
    if(strlen($usr)< 4 || strlen($usr) > 25){
        $GLOBALS['usernameErr']="the length of username is not right";
        // echo $usernameErr;
        return False;
    }
    $connect = new MongoDB\Client("mongodb://localhost:27017");
    $db = $connect->mongophp->users;
    $result = $db->findOne(['username'=>$usr]);
    if ($result){
        $GLOBALS['usernameErr']="the username has been taken, please choose others";
        //  echo $usernameErr;
        return False;
    }
    return True;
    
}
function checkpassword($pass1,$pass2){
    // check pass length 
    if(strlen($pass1) != strlen($pass2)){
        $GLOBALS['passwordErr']= "String length retype not match";
        // echo $passwordErr;
        return FALSE;
    }
    // check pass retype is the same
    if($pass1 != $pass2){
        $GLOBALS['passwordErr']= "String  retype not match ";
    //    echo $passwordErr;
        return FALSE;
    }
    // check if it contain all letter and number is require
    if (strlen($pass1) < 4 || strlen($pass1) > 16){
        $GLOBALS['passwordErr']= "Password length is not between 4 and 16 letters";
        //  echo $passwordErr;
        return False;
    }
    //
    return True;
}
if($_SERVER['REQUEST_METHOD']="POST"){
    if(isset($_POST['submit'])){
         try{
            if(empty($_POST['username'])){
              $usernameErr = "username error";
            //   echo 'username can not be empty';
           }else{
              if (validUsername($_POST['username'], $usernameErr)){
                $username = $_POST["username"];
                // echo "Sucessfull usename entering";
              }
             
           }
            if(empty($_POST['password'])){
             $GLOBALS['passwordErr'] = "password error";
           }else{
             if (checkpassword($_POST["password"], $_POST['re_password'], $passwordErr)){
                    $password =$_POST["password"] ;
                    // echo "Ok for password ";
             }
            
           } 
           if ($username!= ''&& $password !=''){
          
            $pwd_pepper = hash_hmac('sha256', $password, $pepper);
            $pwd_hashed = password_hash($pwd_pepper, PASSWORD_ARGON2ID);
            $result = $db->insertOne([
                "username"=>$username,
                "password"=> $pwd_hashed,
              ]);
            header('location:login.php');
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
        <?php
            if($passwordErr || $usernameErr){ ?>
                <div> 
                    <p> <?php echo $usernameErr ?> </p>
                    <p> <?php echo $passwordErr ?>  </P>
                </div>
        <?php    }
        ?>
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