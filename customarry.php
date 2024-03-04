<?php
function customArrayFilter($array,$type) {
    $filteredArray = [];
    foreach ($array as $key => $value) {
		// Call the custom callback function
        if($type == 'even'){
            if($value % 2 == 0){
				$filteredArray[$key] = $value;
			}
        }else if($type == 'odd'){
			if($value % 2 != 0){
				$filteredArray[$key] = $value;
			}
		}
		
    }
    return $filteredArray;
}
// Example usage:
$data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];


// Use the customArrayFilter function
$result = customArrayFilter($data,'even');
$result1 = customArrayFilter($data,'odd');
// Display the result
echo "<pre>";
print_r(array_values($result));
print_r(array_values($result1));
?>