<!DOCTYPE html>
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
$nameErr= $emailErr = $genderErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])){
        $nameErr= "Name is required";
    }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
        $nameErr= "Only Letter and white space is Allowed";
    }
    else{
        $name = test_input($_POST["name"]);
    }
    if (empty($_POST["email"])){
        $emailErr = "Email is required";
    }else{
        $email = test_input($_POST["email"]);
    }
  $website = test_input($_POST["website"]);
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
    Website: <input type="text" name="website">  <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea> <br><br>
    Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other 
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
?>
</body>
</html>