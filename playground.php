<?php


$date = new DateTime('now', new DateTimeZone('America/Los_Angeles'));

$value =  $date->getTimestamp(). "000";
echo $value ."<br>";
echo date_format($date, 'Y-m-d H:i:s') . "<br>";
$utcdatetime = new MongoDB\BSON\UTCDateTime($value);
echo $utcdatetime . "<br>";
$datetime = $utcdatetime->toDateTime();
$datetime->setTimezone(new DateTimeZone('America/Los_Angeles'));
echo date_format($datetime, 'Y-m-d H:i:s');

?>
