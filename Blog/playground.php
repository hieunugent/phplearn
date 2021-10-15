<?php

// $valid_passwords = array ("mario" => "carbonell");
// $valid_users = array_keys($valid_passwords);

// $user = $_SERVER['PHP_AUTH_USER'];
// $pass = $_SERVER['PHP_AUTH_PW'];

// $validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);



// if (!$validated) {
//   header('WWW-Authenticate: Basic realm="My Realm"');
//   header('HTTP/1.0 401 Unauthorized');
//   die ("Not authorized");
// }

// // If arrives here, is a valid user.
// echo "<p>Welcome $user.</p>";
// echo "<p>Congratulation, you are into the system.</p>";
$option = ['cost'=> 9, 'salt'=>'thisismystring'];
$password = "password";
// $pepper= getConfigVariable("pepper");

$pepper = "c1isvFdxMDdmjOlvxpecFw";
echo $pepper . "<br>";
$pwd_pepper = hash_hmac('sha256', $password, $pepper);
echo "password: ". $pwd_pepper ."<br>";
$pwd_hashed = password_hash($pwd_pepper, PASSWORD_ARGON2ID);

echo $pwd_hashed."<br>";


$enterinngpassword = "password";
$pwd_pepper2 = hash_hmac('sha256', $enterinngpassword, "c1isvFdxMDdmjKOlvxpecFw");
echo "password enter: ". $pwd_pepper2."<br>";
if (password_verify($pwd_pepper2, $pwd_hashed)){
    echo "Password matches";
}else{
    echo "Password incorrect";
}

?>