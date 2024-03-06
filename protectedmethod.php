<?php
class MyClass {
    protected $myProtectedProperty; // Protected property
    protected function myProtectedMethod() {
        return "This is a protected method.";
    }
}
// Creating an object of the class
$obj = new MyClass();

class AnotherClass extends MyClass {
    public function accessProtectedMethod() {
        return $this->myProtectedMethod();
    }
}
// Creating an object of the derived class
$derivedObj = new AnotherClass();
// Accessing the protected method through the derived class
$result = $derivedObj->accessProtectedMethod();
// Displaying the result
echo "Protected Method Result: " . $result;
?>
