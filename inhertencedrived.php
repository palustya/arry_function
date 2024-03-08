<?php
class Fruit {
    protected $name;
    protected $color;
    protected $taste;

    public function __construct($name, $color, $taste) {
        $this->name = $name;
        $this->color = $color;
        $this->taste = $taste;
    }
    public function getName() {
        return $this->name;
    }
    public function getColor() {
        return $this->color;
    }
    
}
class Vegetable extends Fruit {
    }
// Example usage:
$apple = new Fruit('Apple', 'Red', 'Sweet');
echo "Fruit: {$apple->getName()}, Color: {$apple->getColor()}\n"."<br>";

$carrot = new Vegetable('Carrot', 'Orange', true);
echo "Vegetable: {$carrot->getName()}, Color: {$carrot->getColor()}";
?><br>
// birds class inherted animal classes
<?php
class Animal {
    public $name;
    public $color;
    public $variety;
    // Constructor corrected, removed $taste parameter
    public function __construct($name, $color, $variety) {
        $this->name = $name;
        $this->color = $color;
        $this->variety = $variety;
    }
    public function getname() {
        return $this->name;
    }
    public function getcolor() {
        return $this->color;
    }
    public function getvariety() {
        return $this->variety;
    }
}
class Birds extends Animal {
}
$elephant = new Animal('elephant', 'grey', 'African');
echo "Animal: {$elephant->getname()}, Color: {$elephant->getcolor()}, Variety: {$elephant->getvariety()}<br>";
$parrot = new Birds('parrot', 'green', 'African');
echo "Birds: {$parrot->getname()}, Color: {$parrot->getcolor()}, Variety: {$parrot->getvariety()}";
?>
