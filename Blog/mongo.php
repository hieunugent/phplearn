<?php
require __DIR__ .'/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
try{
$db = $client->listDatabases();
  echo "Success connected to server";
}catch(Exception $e){
  echo " fail to connect with mongodb server\n";
  echo $e->getMessage() . "\n";
}
?>