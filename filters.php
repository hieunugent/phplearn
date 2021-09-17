<?php
$str = "<h1>Hello World!</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING);
echo $newstr;
?>

<?php
$int = 0;

if (filter_var($int, FILTER_VALIDATE_INT) === 0 ||!filter_var($int, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
  echo("Integer is not valid");
}
$email = "H#ieunugneyt@gamisn.com";
print(filter_var($email, FILTER_SANITIZE_EMAIL));
?>