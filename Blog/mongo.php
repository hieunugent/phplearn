<?php
require 'c:/xampp/htdocs/phpmongodb/vendor/autoload.php'; 

$client = new MongoDB\Client("mongodb://localhost:27017");
$companyDB = $client->demo;



var_dump($result);
?>