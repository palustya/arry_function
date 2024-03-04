
<?php
function MaxValue($arr) {
    if (empty($arr)) {
        return null;  // Return null for empty arrays
    }
    return max($arr);
}
$myArray = [1, 5, 3, 8, 58, 54, 7, 46, 33, 44, ];
$maxValue = MaxValue($myArray)."<br>";

// Display the result
echo "Maximum value in the array: $maxValue";
$numbers = [5, 2, 8, 1, 7];
$minValue = min($numbers);

echo "The minimum value in the array is: $minValue";

?>

