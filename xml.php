<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("links.xml");

$x = $xmlDoc->getELementsByTagName("link")->item(1)->getELementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
echo $x . "<br>";
$cdDoc = new DOMDocument();
$cdDoc->load("cd_catalog.xml");
echo $cdDoc->getELementsByTagName("CD")->item(3)->getELementsByTagName("ARTIST")->item(0)->childNodes->item(0)->nodeValue;
?>