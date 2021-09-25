<?php

require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client(
      'mongodb+srv://<username><password>@myfirstcluster.zbcul.mongodb.net/dbname?retryWrites=true&w=majority');
$customers = $client->selectCollection('sample_analytics', 'customers');
$document = $customers->findOne(['username' => 'wesley20']);
var_dump($document);
?>