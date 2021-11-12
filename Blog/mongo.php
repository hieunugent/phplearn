<?php
require __DIR__ .'/vendor/autoload.php';
require __DIR__ . '/database.php';

use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();

$connect = new MongoDB\Client("mongodb+srv://" . getenv('USER') . ":" . getenv('PASSWORD') . "@cluster0.wthhp.mongodb.net/myFirstDatabase?retryWrites=true&w=majority");
// $db = $connect->mongophp->detail;
try{
$db =
  $connect->mongophp->detail->listDatabases();

  echo "Success connected to server" ;
}catch(Exception $e){
  echo " fail to connect with mongodb server\n";
  echo $e->getMessage() . "\n";
}
?>