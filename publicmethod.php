<?php
class Car {
    // Public property
    public $model;
        // Public method
    public function startEngine() {
        return "Engine started!";
    }
}
// Object banate hain
$myCar = new Car();
// Public property  set karte hain
$myCar->model = "ford";
// Public method ko call karte hain
$engineStatus = $myCar->startEngine();
// Output ko print karte hain
echo "Car Model: " . $myCar->model . "<br>";
echo "Engine Status: " . $engineStatus;
?>