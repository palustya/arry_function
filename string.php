
<?php
$mixedArray = array(42, "apple", 7, "banana", "cherry", 18,"herry",58,"sidharth","gdfgdf",55,"gfdgdf");
function MixedArray($mixedArray){
    $numbersArray = array_filter($mixedArray, 'is_numeric');
    $oddNumbersArray = [];
    $evenNumbersArray = [];
        foreach ($numbersArray as $number) {
        if ($number % 2 == 0) {
            $evenNumbersArray[] = $number;
        } else {
            $oddNumbersArray[] = $number;
        }
    }
    sort($oddNumbersArray);
    sort($evenNumbersArray);
    $stringsArray = array_filter($mixedArray, 'is_string');
    return ['odd_numbers' => $oddNumbersArray, 'even_numbers' => $evenNumbersArray, 'strings' => $stringsArray];
}
$result = MixedArray($mixedArray);
echo "<pre>"; print_r($result);
?>
