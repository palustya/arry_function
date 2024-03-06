<?php
class test {
    public $Public; // Public property
    public function Public() {
        return "This is a public method.";
    }
}

// Creating an object of the class
$obj = new test();
// Accessing the public property
$obj->Public = "This is for test";
// Calling the public method
$result = $obj->Public();
// Displaying the results
echo "Public: " . $obj->Public . "<br>";
echo "Public Method Result: " . $result;
?>
