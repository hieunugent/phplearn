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

</body>
</html>