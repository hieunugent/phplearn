<?php
class Greeting {
   public static $staticPro = "POORLY";
  protected static function getWebsiteName() {
    return "HELlO WORLDS";
  }
}

class GreetingM5 extends Greeting {
  public static $staticPro = "PROPERTY";
  public $geeting;
  public function __construct() {
    $this->geeting = parent::getWebsiteName();
  }
  public function zStatic(){
      return parent::$staticPro;
  }
}

$text = new GreetingM5;
echo $text -> geeting;
echo $text ->zStatic();
echo GreetingM5::$staticPro;

?>