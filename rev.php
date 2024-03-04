<?php
// soundex function ka istemal
$word1 = "pnkj";
$word2 = "accents";
$word3 = "delimiter";
$word4 = "selection";

// Check if the length of the words is the same before comparing soundex codes
if (strlen($word1) === strlen($word2) && strlen($word3) === strlen($word4)) {
    $soundex1 = soundex($word1);
    $soundex2 = soundex($word2);
    $soundex3 = soundex($word3);
    $soundex4 = soundex($word4);
 
    if ($soundex1 == $soundex2) {
        echo "$word1 aur $word2 ke pronunciation similar hai.";
    } else {
        echo "$word1 aur $word2 ke pronunciation alag hai.";
    }
    echo "<br>";
    if ($metaphone3 == $metaphone4){
        echo "$word3 aur $word4 ke pronunciation similar hai.";
    } else {
        echo "$word3 aur $word4 ke pronunciation alag hai.";
    }
} else {
    echo "Words should have the same length for a meaningful soundex comparison.";
}
?>
<?php
// PHP mein strcoll function ka istemal
$string1 = "sumit";
$string2 = "shyam";
// strcoll() ka istemal locale-based comparison ke liye
$comparisonResult = strcoll($string1, $string2);
// Output
if ($comparisonResult === 0) {
    echo "$string1 aur $string2 ek dusre ke barabar hain.";
} elseif ($comparisonResult < 0) {
    echo "$string1 $string2 se chota hai.";
} else {
    echo "$string1 $string2 se bada hai.";
    
}
?>

<form action="process_form.php" method="post">
    <!-- Other form fields here -->

    <label for="dropdown">Select an Option:</label>
    <select id="dropdown" name="dropdown">
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
    <?php
    $text = "Hello, World!";

$crc = crc32($text);

echo "CRC32: $crc";
?>
<?php
// PHP mein md5 function ka istemal
$string = "Hello, World!";
// md5() ka istemal MD5 hash generate karne ke liye
$md5Hash = md5($string);
// Output
echo "Original String: $string <br>";
echo "MD5 Hash: $md5Hash";
?>
    <!-- Additional form fields or submit button -->
</form>
