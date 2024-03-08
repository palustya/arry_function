<?php
// Abstract class
abstract class Shape {
    // Abstract method (no implementation)
    abstract public function calculateArea();
    // Concrete method with implementation
    public function displayArea() {
        echo "The area is: " . $this->calculateArea() . PHP_EOL;
    }
}
// Concrete class extending the abstract class
class Circle extends Shape {
    // Implementation of the abstract method
    public function calculateArea() {
        $radius = 8;
        return pi() * $radius * $radius;
    }
}
// Concrete class extending the abstract class
class Square extends Shape {
    // Implementation of the abstract method
    public function calculateArea() {
        $side = 114;
        return $side * $side;
    }
}
// Creating objects of the concrete classes
$circle = new Circle();
$square = new Square();
// Calling the concrete method on objects
$circle->displayArea();
$square->displayArea();
?>
