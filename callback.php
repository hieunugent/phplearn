<?php
    function my_lengthcallback($item){
        return strlen($item);
    }






$strings =["apple", "orange", "banana", "coconut"];
$lengths = array_map("my_lengthcallback", $strings);
print_r($lengths);

$inline = array_map(function($item){ return strlen($item);}, $strings);



$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
echo "<br>";
$arr = json_decode($jsonobj, true);
foreach ($arr as $key => $value){
    echo $key . " =>> " . $value . "<br>"; 
}
?>