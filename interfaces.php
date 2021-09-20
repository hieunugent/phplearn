<?php
interface InterfaceName {
  public function someMethod1();
  public function someMethod2($name, $color);
  public function someMethod3() : string;
}
?>
<?php
interface Animal {
  public function makeSound();
}

class Cat implements Animal {
  public function makeSound() {
    echo "Meow";
  }
}
class Dog implements Animal{
    public function makeSound()
    {
        echo "Bark";
    }
}

$cat = new Cat();
$cat->makeSound();
$dog = new Dog();
$dog->makeSound();
?>