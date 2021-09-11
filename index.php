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

?>

</body>
</html>