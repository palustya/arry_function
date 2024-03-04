<?php
function applyStringOperation($strings, $operation) {
  if (!is_array($strings) || !is_callable($operation)) {
    throw new Error('Invalid input. The first parameter should be an array of strings, and the second parameter should be a string operation function.');
  }
  // Using the array map function to apply the string operation to each element
  $resultArray = array_map(function ($str) use ($operation) {
    return $operation($str);
  }, $strings);
  return $resultArray;
}
// Example string operation function: Convert each string to uppercase
function toUpperCase($str) {
  return strtoupper($str);
}
// Example string operation function: Add '123' to each string
function addString($str) {
  return $str . '123';
}
$inputStrings = ['mango', 'orange', 'banana'];
// Example 1: Convert each string to uppercase
$result1 = applyStringOperation($inputStrings, 'toUpperCase');
print_r($result1); // Output: ['APPLE', 'ORANGE', 'BANANA']
// Example 2: Add '123' to each string
$result2 = applyStringOperation($inputStrings, 'addString');
print_r($result2); // Output: ['apple123', 'orange123', 'banana123']
?>
