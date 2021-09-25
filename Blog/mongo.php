<?php
require __DIR__ .'/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->mongophp->details;
$result = $collection->insertOne(['newtext'=>"currentText"]);
echo " done show insert Data";
?>