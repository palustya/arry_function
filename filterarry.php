<?php
// Custom function to filter an array based on a callback
function customFilter($array, $callback) {
    $filteredArray = [];
    foreach ($array as $key => $value) {
        if ($callback($value, $key)) {
            $filteredArray[$key] = $value;
        }
    }
    return $filteredArray;
}
// Custom function to search for a value in an array and return its key
function customSearch($array, $searchValue) {
    foreach ($array as $key => $value) {
        if ($value === $searchValue) {
            return $key; // Return the key if value is found
        }
    }
    return false; // Return false if value is not found
}
// Example usage:
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// Filtering numbers greater than 5 using customFilter function
$filteredNumbers = customFilter($numbers, function ($value) {
    return $value > 5;
});
print_r($filteredNumbers);

// Example of custom searching: Find the key of value 7
$searchKey = customSearch($numbers, 8);
if ($searchKey !== false) {
    echo "Value 7 found at index $searchKey";
} else {
    echo "Value 7 not found in the array";
}

?>
 