<?php
echo easter_date() ."<br />";

echo date("M-d-Y",easter_date()) ."<br />";
echo date("M-d-Y",easter_date(1999)) . "<br/>";



$str = "Visited w3schools in w3schools the website of ";
$pattern = "/w3schools/i";
echo preg_match_all($pattern, $str);
?>
