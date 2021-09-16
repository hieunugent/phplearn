<!DOCTYPE html>
<?php
$cookie_name = "user";
$cookie_value = "Alex Porter";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<html>
<body> 

<h1>My first PHP page</h1>

<?php
$names = ["John", "Lud", 'perter'];
$age = ["10", "2", "19"];
for ($i= 0; $i < count($names);$i++){
    echo "Hello $names[$i] <br>";
    echo "My Age is $age[$i] <br>";
}
function add($q, $p){
    $value = $q + $p;
    echo "<p> Value of adding $q and $p is : $value </p>";
}
 add(1, 3);
 $a = 15;
 $b = 10;
function multi(){
    $GLOBALS['a'] = $GLOBALS['a']+ $GLOBALS['b'];
}

multi();
echo "$a <br>";
class person{
    public $name;
    public $year;
    public $job;
    public function __construct($name, $year){
        $this->name = $name;
        $this->age = date("Y") - $year ;
    }
    public function message(){
        return "Your name is " .$this->name . " and your age is " .$this->age."!";

    }
}
$newperson = new person("Henry", 1988);
echo $newperson->message();
echo "<br>";



?>
<form action="index.php" method="get">
    Name:  <input type ="text" name="username">
    <input type="submit">
</form>
<br>

<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";
$nameErr= $emailErr = $websiteErr=$genderErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])){
        $nameErr= "Name is required";
    }
    else{
        $name = test_input($_POST["name"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
        $nameErr= "Only Letter and white space is Allowed";
    }
    }
    if (empty($_POST["email"])){
        $emailErr = "Email is required";
    }else{
        $email = test_input($_POST["email"]);
       
    }
    if(empty($_POST["website"])){
        $website="";
    }
  else{ $website = test_input($_POST["website"]);
   if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z)-9+&@#\/%=~_|]/i",$website)){
            $websiteErr = "Invalid URL";
        }}
  $comment = test_input($_POST["comment"]);
    if (empty($_POST["gender"])){
        $genderErr = "Gender is required";
    }else{
      $gender = test_input($_POST["gender"]);
    }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] );?>">
    <h2>PHP Form Validation Example</h2>
    <h4 style="color:red"> * required field</h4>
    Name: <input type="text" name="name"> <span style="color:red"> * <?php echo $nameErr;?> </span><br><br>
    E-mail: <input type="email" name="email"> <span style="color:red"> * <?php echo $emailErr;?></span> <br><br>
    Website: <input type="text" name="website"> <span style="color:red">  <?php echo $websiteErr;?></span>  <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea> <br><br>
    Gender:
  <input type="radio" name="gender" 
  <?php if (isset($gender)&& $gender =="female") echo "checked";?>
  value="female">Female
  <input type="radio" name="gender" 
  <?php if (isset($gender)&& $gender =="male") echo "checked";?>
  value="male">Male
  <input type="radio" name="gender" 
  <?php if (isset($gender)&& $gender =="other") echo "checked";?>
  value="other">Other 
  <span><?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;

echo "today is ". date("y/m/d"). " " . date("l");
date_default_timezone_set("America/Los_Angeles");
echo "time is ". date("h:i:sa") ."<br>";
$time =  strtotime("September 20");
echo date("Y-m-d h:i:sa", $time) ."<br>";
$time2 = ceil(($time -time())/60/60/24);
echo "there are ". $time2 . " days until new Year <br>" ;

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = " John Doe\n";
fwrite($myfile, $txt);
$txt = " Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
$myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
// echo fread($myfile, filesize("newfile.txt")) . "<br>";
while(!feof($myfile)){
    echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>
<form action="index.php" method="post" enctype="multipart/form-data">
    Select image to upload
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">


</form>
<?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check != false){
            echo "File is an image - " . $check["mime"] .".";
            $uploadOk = 1;
        }else{
            echo "file is not an image";
            $uploadOk = 0;
        }
    }
    if(file_exists($target_file)){
        echo "Sorry, file already exists";
        $uploadOk = 0;
    }
    if($_FILES["fileToUpload"]["size"]> 500000){
        echo" sorry, your file is too large";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !="jpeg" && $imageFileType!="gif"){
        echo "Sorry , only JPG, JPEG, PNG and GIF files are allowed";
        $uploadOk = 0;
    } 
    if($uploadOk == 0){
        echo "Sorry, your file was not uploaded.";
    }else{
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
            echo " The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
        }else{
            echo "Sorry , there was an error uploading your file";
        }
    }
?>

<!-- set cookie -->

<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>


</body>
</html>
<!-- PHP date and time  -->
