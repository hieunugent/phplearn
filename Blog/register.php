<?php 
require __DIR__ .'/vendor/autoload.php';
$username= $usernameErr='';
$password= $passwordErr="";
$connect = new MongoDB\Client("mongodb://localhost:27017");
function checkpassword($passToCheck){
    return True;
}
if($_SERVER['REQUEST_METHOD']="POST"){
    if(isset($_POST['submit'])){
         try{
            if(empty($_POST['username'])){
              $usernameErr = "username error";
           }else{
              $username = ($_POST["username"]);
           }
           if(empty($_POST['password'])){
             $passwordErr = "password error";
           }else{
              
             if (checkpassword($_POST["password"])){
                    $password =$_POST["password"] ;
                    var_dump("Ok for password ");
             }
            
           } 
        }catch(Exception $e){
            var_dump("there is an error during register account");
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