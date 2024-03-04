<?php
$fruits = array(
    'apple' => 'red',
    'banana' => 'yellow',
    'grape' => 'purple'
);
// Check if a key exists in the array
$searchKey = 'grape';
if (array_key_exists($searchKey, $fruits)) {
    echo "The key '$searchKey' exists in the array. Value: " . $fruits[$searchKey];
} else {
    echo "The key '$searchKey'does not exist in the array.";
}
$a1=array("red","red");
$a2=array("blue","yellow");
print_r(array_merge($a1,$a2));
?>
