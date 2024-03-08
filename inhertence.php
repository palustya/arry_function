<?php
// Parent Class
class Animal {
    public $species;
    // Constructor to set the species
    public function __construct($species) {
        $this->species = $species;
    }
    // Method to make a sound
    public function makeSound() {
        return "The animal makes a generic sound.";
    }
}
// Child Class (Inheriting from Animal)
class Dog extends Animal {
    // Constructor to set the species for the dog
    public function __construct() {
        // Calling parent class constructor with a specific species for the dog
        parent::__construct("Dog");
    }
    // Method to make a sound, overriding the parent method
    public function makeSound() {
        return "The dog barks!";
    }
}
// Creating objects
$genericAnimal = new Animal("Generic");
$dog = new Dog();
// Displaying information
echo "Animal: " . $genericAnimal->species . "<br>";
echo "Sound: " . $genericAnimal->makeSound() . "<br>";
echo "Animal: " . $dog->species . "<br>";
echo "Sound: " . $dog->makeSound();
?>
