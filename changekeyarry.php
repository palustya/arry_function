<?php
// Sample array with mixed case keys
$inputArray = [
    'Name' => 'John',
    'Age' => 25,
    'Country' => 'USA'
];
// array_change_key_case() ka istemal karke saare keys ko lowercase mein convert karne ke liye
$lowercaseKeysArray = array_change_key_case($inputArray, CASE_UPPER);
// Naya array jo ki lowercase keys ke saath hoga,show hoga
print_r($lowercaseKeysArray);
?>.<br>
// FILL function
<?php
$input_array = array('a', 'b', 'c', 'd', 'e'); 
  print_r(array_chunk($input_array, 4)); 
  ?>
."<br>
// COMBINE Function 
<?php
$a=array("A","Cat","Dog","A","Dog");
print_r(array_count_values($a));
?>
."<br>
//array_diff() Function
<?php
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"black","g"=>"purple");
$a3=array("a"=>"red","b"=>"black","h"=>"yellow");
$result=array_diff($a1,$a2,$a3);
print_r($result);
?>
."<br>
// array fill
<?php
$a1=array_fill(3,4,"blue");
$b1=array_fill(0,1,"red");
print_r($a1);
echo "<br>";
print_r($b1);
?>
."<br>
//array_filter() Function
<?php
function odd($var)
  {
  return($var & 1);
  }
$a1=array(1,3,2,3,4);
print_r(array_filter($a1,"odd"));
?>
."<br>
//array flip function
<?php
// Original associative array
$Array = array(
    'pan' => 'pankaj',
    'rohi' => 'rohit',
    'sag' => 'sager',
    'dan' => 'dainesh'
    
);

// Using array_flip to swap keys and values
$flippedArray = array_flip($Array);

// Displaying the original and flipped arrays
echo "Original Array:\n";
print_r($Array);
echo "\nFlipped Array (Keys and Values Swapped):\n";
print_r($flippedArray);
?>
."<br>
  // array exit key
<?php
$a=array("Volvo"=>"XC90","BMW"=>"X5");
if (array_key_exists("Volvo",$a))
  {
  echo "Key exists!";
  }
else
  {
  echo "Key does not exist!";
  }
?>