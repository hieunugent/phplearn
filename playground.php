<?php


$date = new DateTime('now');
$value =  $date->getTimestamp()+"000";
echo date_format($date, 'Y-m-d H:i:s');
$utcdatetime = new MongoDB\BSON\UTCDateTime($value);
$datetime = $utcdatetime->toDateTime();
echo $datetime->format('r');

?>
